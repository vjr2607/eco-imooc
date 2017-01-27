<?php
	
	include 'savefile.php';
	
	// get the form inputs
	$corrector_guid = get_input('corrector_guid');
	$correcting_guid = get_input('correcting_guid');
	$comment = get_input("comment");
	$correction_made = false;
	$new_correction = get_input("new_correction");
	
	//obtenemos las dos tareas (corrector y corregido)
	$task_corrector = get_entity($corrector_guid);
	$task_correcting = get_entity($correcting_guid);
	$parent_task = get_entity($task_corrector->container_guid);
	$task_previous_correction = $task_correcting->correction;
	$n_criteria = $parent_task->n_criteria;
	$correction = "right";
	$right_criteria = 0;
	$user_corrector = get_entity($task_corrector->owner_guid);
	$user_correcting = get_entity($task_correcting->owner_guid);
	
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
			$task_correcting->correction = false;
		}
	}
	else{
		$correction_made = true;
		$task_correcting->correction = true;
	}
	
	if ($correction_made){
		//por la parte del corrector, añadimos en su tarea que ya ha corregido una
		$task_corrector->corrected = true;
		$task_corrector->corrected_date = time();
		//En la tarea corregida actualizamos los datos correspondientes
		$task_correcting->correction_asked = true;
		$task_correcting->correction_made = true;
		$task_correcting->correction_made_date = time();
		$task_correcting->corrected_by = $task_corrector->owner_guid;
		$task_correcting->right_criteria = $right_criteria;
		if ($comment != "")
		//Si hay un comentario, añadimos una anotación a la tarea con el mismo
			$task_correcting->annotate('comment', $comment, ACCESS_PUBLIC, $task_corrector->owner_guid, "text");
			
		//Si antes estaba corregida, tenemos que borrar las correciones anteriores de cada criterio
		$task_correcting->deleteAnnotations('correction');
		
		//Añadimos la corrección de cada uno de los criterios
		for ($i = 1; $i<=$n_criteria; $i++){
			$criteria_correction = get_input('criteria'.$i);
			if ($criteria_correction == "wrong"){
				$task_correcting->annotate('correction', "wrong", ACCESS_PUBLIC, $task_corrector->owner_guid, "text");
			}
			else{
				$task_correcting->annotate('correction', "right", ACCESS_PUBLIC, $task_corrector->owner_guid, "text");
			}
		}
		
		if ($new_correction == 'true'){
			//Si es una nueva corrección, se le suman al corrector los puntos de la tarea
			$task_corrector->earned_points += $parent_task->points_correction;
			if (!isset($user_corrector->points)) $user_corrector->points = 0;
			$user_corrector->points += $parent_task->points_correction;
			//Si la corrección ha sido positiva, se le suma a dicha tarea los puntos por tenerla correcta
			if ($task_correcting->correction){ 
				$task_correcting->earned_points += $parent_task->points_correct;
				if (!isset($user_correcting->points)) $user_correcting->points = 0;
				$user_correcting->points += $parent_task->points_correct;
			}
			
			//Enviamos un mensaje interno informando al usuario de que su tarea ha sido corregida		
			$message = elgg_view("tasks/message/post_correction", array("corrector" => $user_corrector, 
				"task_correcting" => $task_correcting, "task_corrector" => $task_corrector, "new_correction" => true, "admin" => false));
			notify_user($task_correcting->owner_guid, $task_corrector->owner_guid, "Una tarea tuya ha sido corregida!", $message);
			
			//Añadimos el evento al river de Actividad (el que lo realiza es el corrector, el objeto implicado es el corregido)
			add_to_river('river/user_task/corrected', 'corrected', $task_corrector->owner_guid, $correcting_guid);
			trigger_plugin_hook('gamification:corrected','task', array('task_correcting' => $task_correcting, 'task_corrector' => $task_corrector), false);
		}
		else{
			//Si antes estaba marcado como correcta y se pasa a marcar como incorrecta, se quitan los puntos de la tarea
			if ($task_previous_correction && !$task_correcting->correction){
				$task_correcting->earned_points -= $parent_task->points_correction;
				$user_correcting->points -= $parent_task->points_correction;
			}
			//En cambio, si se pasa de incorrecta a correcta, se suman los puntos a la tarea
			else if (!$task_previous_correction && $task_correcting->correction){
				$task_correcting->earned_points += $parent_task->points_correction;
				$user_correcting->points += $parent_task->points_correction;
			}
			
			$message = elgg_view("tasks/message/post_correction", array("corrector" => $user_corrector, 
				"task_correcting" => $task_correcting, "task_corrector" => $task_corrector, "new_correction" => false, "admin" => false));
			
			//Enviamos un mensaje interno informando al usuario de que su tarea ha sido re-corregida
			notify_user($task_correcting->owner_guid, $task_corrector->owner_guid, "Se ha modificado la corrección de una de tus tareas!", $message);
			
			//Añadimos el evento al river de Actividad (el que lo realiza es el corrector, el objeto implicado es el corregido)
			//add_to_river('river/user_task/corrected', 'corrected', $task_corrector->owner_guid, $correcting_guid);
			trigger_plugin_hook('gamification:corrected','task', array('task_correcting' => $task_correcting, 'task_corrector' => $task_corrector), false);
		}
		
		forward('/gamification/tasks/view/' . $task_corrector->container_guid . '#tab-task-correcting');
	}
	else {
	   register_error("En caso de dar la tarea por incorrecta, es necesario añadir un comentario.");
	   forward('/gamification/tasks/view/' . $task_corrector->container_guid . '#tab-task-correcting');
	}
