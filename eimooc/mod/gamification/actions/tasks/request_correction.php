<?php
	// obtenemos los campos del formulario
	$parent_task_guid = get_input('parent_guid');
	$task_guid = get_input('guid');
	$user_guid = elgg_get_logged_in_user_guid();

	//Obtenemos la lista de tareas de usuario que todavía no hayan sido asignadas para corregir
	$available_tasks = elgg_get_entities_from_metadata(array('type' => 'object', 
							'subtype' => 'user_task', 
							'container_guids' => array($parent_task_guid),
							 'order_by' => 'time_created ASC',
							'metadata_name_value_pairs' => array(array('name' => 'correction_asked', 'value' => 0, 'operand' => '='))
							));
	
	$task_asigned = false;
	if ($available_tasks) {
		$task_asigned = true;
		//Obtenemos la primera tarea en la lista de disponibles
		$task = $available_tasks[0];
		if ($task->getGUID() == $task_guid){
			if  (count($available_tasks) == 1)
				//Si la única tarea que hay disponible es la del propio usuario, no le asignamos ninguna
				$task_asigned = false;
			else
				//Si hay más de una, le asignamos la segunda de la lista
				$task = $available_tasks[1];
		}	
		
		if($task_asigned){
			//Si es posible asignar la tarea, actualizamos sus datos
			$task->correction_asked = true;
			$task->save();
			//Creamos la relación entre ambas tareas
			add_entity_relationship ($task->getGUID(), 'correcting', $task_guid);
		}
	}	
	
	if ($task_asigned)
	   forward('/gamification/tasks/view/' . $parent_task_guid . '#tab-task-correcting');
	 else {
	   register_error("Actualmente no hay ninguna tarea disponible para corregir. <br/>Vuelve a intentarlo más tarde!");
	   forward('/gamification/tasks/view/' . $parent_task_guid . '#tab-task-correcting');
	}
