<?php
	
	include 'savefile.php';
	
	// get the form inputs
	$task_guid = get_input('guid');
	$user_guid = elgg_get_logged_in_user_guid();
	$new_solution = get_input('new_solution');
	
	if (!isset($_FILES['solution_file']['name']) || empty($_FILES['solution_file']['name'])) {
		register_error("No se ha subido ningún archivo!");
		forward(REFERER); // REFERER is a global variable that defines the previous page
	}
	
	if ($new_solution == 'true'){
	
		$previous_task = elgg_get_entities(array( 'type' => 'object', 
								'subtype' => 'user_task', 
								'owner_guids' => array($user_guid),
								'container_guids' => array($task_guid)
							));
	
		if ($previous_task != false){
			//Si existe una tarea previa, no le dejamos subir la solución
			register_error("Ya has subido tu solución para esta tarea!");
			forward(REFERER); // REFERER is a global variable that defines the previous page
		}
		
		//Creamos la tarea e inicializamos todos sus datos
		$parent_task = get_entity($task_guid);
		
		$task = new ElggObject();
		$task->subtype = "user_task";
		$task->title = "tarea " . $task_guid ." - solucion";
		$task->description = "solution";
		$task->access_id = ACCESS_PUBLIC;
		$task->owner_guid = $user_guid;
		$task->container_guid = $task_guid;
		$task->family = $parent_task->family;
		
		//inicializamos todos los metadatos a falso
		$task->corrected = false;
		$task->correction = false;
		$task->correction_asked = false;
		$task->correction_made = false;
		$task->earned_points = $parent_task->points_solve;
		$current_user = get_entity($user_guid);
		
		//Sumamos los puntos de la tarea al usuario
		if (!isset($current_user->points))
			$current_user->points = 0;
		$current_user->points += $task->earned_points;
		
		//guardamos la tarea en la BBDD
		$newTask_guid = $task->save();
		
		//guardamos el fichero de la solucion, asociándolo a la tarea
		saveFile('solution_file', ' ', 'Fichero solución de la tarea', 'userSolutionFile', $task, $newTask_guid);
		
		if ($newTask_guid) {
		   system_message("Tarea subida correctamente");
		   //Añadimos el evento al river de actividades
		   add_to_river('river/user_task/solve', 'solve', $user_guid, $task_guid);
		   forward('/gamification/tasks/view/' . $task_guid);
		} else {
		   register_error("La tarea no pudo ser subida");
		   forward(REFERER); // REFERER is a global variable that defines the previous page
		}
	}
	else{
		//Si es una nueva solución para una tarea ya realizada
		//en este caso el task_guid hace referencia a la tarea de usuario
		$task_relationships = get_entity_relationships($task_guid, true);
		foreach ($task_relationships as $relationship){
			//Buscamos la relación del tipo "userSolutionFile" para encontrar el fichero antiguo
			if ($relationship['relationship'] == "userSolutionFile"){
				$previous_file_guid = $relationship['guid_one'];
				$previous_file = get_entity($previous_file_guid);
				//eliminamos el fichero anterior y todos los elementos que estuviesen sub-relacionados con ella
				$previous_file->delete(true);
				
				$task = get_entity($task_guid);
				//Guardamos el nuevo fichero
				saveFile('solution_file', ' ', 'Fichero solución de la tarea', 'userSolutionFile', $task, $task_guid);
				$message = elgg_view("tasks/message/new_solution", array("user_solving" => $user_guid, "task_guid" => $task->container_guid));
				notify_user($task->corrected_by, $user_guid, "Se ha subido una nueva solución a una tarea que corriges", $message);
				
				//add_to_river('river/user_task/solve', 'solve', $user_guid, $task->container_guid);
				forward(REFERER);
			}
		}
	}
