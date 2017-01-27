<?php
	
	include 'savefile.php';
	gatekeeper();
	
	
	// get the form inputs
	$task_guid = get_input('task_guid');
	$comment = get_input("comment");
	$correction_made = false;
	$new_correction = get_input("new_correction");
	
	//obtenemos la tarea
	$task = get_entity($task_guid);
	$parent_task = get_entity($task->container_guid);
	$task_previous_correction = $task->correction;
	$n_criteria = $parent_task->n_criteria;
	$correction = "right";
	$right_criteria = 0;
	$user_corrector = get_entity(elgg_get_logged_in_user_guid());
	$user_correcting = get_entity($task->owner_guid);
	
	//Recorremos la corrección de todos los criterios para obtener el número de correctos
	for ($i = 1; $i<=$n_criteria; $i++){
		$criteria_correction = get_input('criteria'.$i);
		if ($criteria_correction == "right")
			$right_criteria++;
	}
	
	//Con que haya uno marcado como incorrecto, damos la tarea por inválida
	if ($right_criteria < $n_criteria)
			$correction = "wrong";
	
	if ($correction == "wrong"){
		//Si la corrección da la tarea por inválida, es obligatorio poner un comentario
		if ($comment != ""){
			$correction_made = true;
			$task->correction = false;
		}
	}
	else{
		$correction_made = true;
		$task->correction = true;
	}
	
	if ($correction_made){
		//En la tarea corregida actualizamos los datos correspondientes
		$task->correction_asked = true;
		$task->correction_made = true;
		$task->correction_made_date = time();
		$task->corrected_by = $user_corrector->guid;
		$task->right_criteria = $right_criteria;
		if ($comment != "")
		//Si hay un comentario, añadimos una anotación a la tarea con el mismo
			$task->annotate('comment', $comment, ACCESS_PUBLIC, $user_corrector->guid, "text");
			
		//Si antes estaba corregida, tenemos que borrar las correciones anteriores de cada criterio
		$task->deleteAnnotations('correction');
		
		//Añadimos la corrección de cada uno de los criterios
		for ($i = 1; $i<=$n_criteria; $i++){
			$criteria_correction = get_input('criteria'.$i);
			if ($criteria_correction == "wrong"){
				$task->annotate('correction', "wrong", ACCESS_PUBLIC, $user_corrector->guid, "text");
			}
			else{
				$task->annotate('correction', "right", ACCESS_PUBLIC, $user_corrector->guid, "text");
			}
		}
		
		if ($new_correction == 'true'){
			//Si la corrección ha sido positiva, se le suma a dicha tarea los puntos por tenerla correcta
			if ($task->correction){ 
				$task->earned_points += $parent_task->points_correct;
				if (!isset($user_correcting->points)) $user_correcting->points = 0;
				$user_correcting->points += $parent_task->points_correct;
			}
			//Enviamos un mensaje interno informando al usuario de que su tarea ha sido corregida
			$message = '<a href="profile/' . $user_corrector->guid . '">' . $user_corrector->name . '</a> ha corregido tu tarea ';
			$message .= elgg_view('output/url', array('text' => $parent_task->title, 'href' => "gamification/tasks/view/". $task->container_guid ));
			$message .= '. <br/><br/>Puedes ir a verla y comprobar qué resultado has obtenido (a criterio de tu compañero). Si no estás de acuerdo con la corrección, en la propia vista de la tarea tienes la posibilidad de iniciar una discusión privada con tu compañero.';
			notify_user($task->owner_guid, $user_corrector->guid, "Una tarea tuya ha sido corregida!", $message);
			
			//Añadimos el evento al river de Actividad (el que lo realiza es el corrector, el objeto implicado es el corregido)
			add_to_river('river/user_task/corrected', 'corrected', $user_corrector->guid, $task_guid);
			trigger_plugin_hook('gamification:corrected','task', array('task_correcting' => $task, 'task_corrector' => $task), false);
		}
		else{
			//Si antes estaba marcado como correcta y se pasa a marcar como incorrecta, se quitan los puntos de la tarea
			if ($task_previous_correction && !$task->correction){
				$task->earned_points -= $parent_task->points_correction;
				$user_correcting->points -= $parent_task->points_correction;
			}
			//En cambio, si se pasa de incorrecta a correcta, se suman los puntos a la tarea
			else if (!$task_previous_correction && $task->correction){
				$task->earned_points += $parent_task->points_correction;
				$user_correcting->points += $parent_task->points_correction;
			}

			//Enviamos un mensaje interno informando al usuario de que su tarea ha sido re-corregida
			$message = '<a href="profile/' . $user_corrector->guid . '">' . $user_corrector->name . '</a> ha cambiado la corrección inicial que hizo de tu tarea ';
			$message .= elgg_view('output/url', array('text' => $parent_task->title, 'href' => "gamification/tasks/view/". $task->container_guid ));
			$message .= '. <br/><br/>Puedes ir a verla y comprobar qué resultado has obtenido (a criterio de tu compañero). Si no estás de acuerdo con la corrección, en la propia vista de la tarea tienes la posibilidad de iniciar una discusión privada con tu compañero.';
			notify_user($task->owner_guid, $user_corrector->guid, "Se ha modificado la corrección de una de tus tareas!", $message);
			
			//Añadimos el evento al river de Actividad (el que lo realiza es el corrector, el objeto implicado es el corregido)
			//add_to_river('river/user_task/corrected', 'corrected', $task_corrector->owner_guid, $correcting_guid);
			trigger_plugin_hook('gamification:corrected','task', array('task_correcting' => $task, 'task_corrector' => $task), false);
		}
		
		forward(REFERER);
	}
	else {
	   register_error("En caso de dar la tarea por incorrecta, es necesario añadir un comentario.");
	   forward(REFERER);
	}
