<?php
	// make sure only logged in users can see this page 
	gatekeeper();
	 
	// set the title
	$parent_task = get_entity($task_guid);
	if (get_subtype_from_id($parent_task->subtype) != 'gamification_task'){
		 forward(404); 
	}
	$title = $parent_task->title;
	$user_guid = elgg_get_logged_in_user_guid();
	
	
	$view_params = array();
	$view_params['parent_task'] = $parent_task;
	if (isset($view_target)) $view_params['view_target'] = $view_target;
	$relationships = get_entity_relationships($task_guid, true);
	foreach ($relationships as $relationship){
		//Si tiene una relación de tipo "initalFile", guardamos en la vista el guid del archivo
		if ($relationship['relationship'] == "initialFile")
			$view_params['initialFile'] = $relationship['guid_one'];
		//Si tiene una relación de tipo "initalFile", guardamos en la vista el guid del archivo
		if ($relationship['relationship'] == "additionalFiles")
			$view_params['additionalFiles'] = $relationship['guid_one'];
		//Si tiene una relación de tipo "solutionFile", guardamos en la vista el guid del archivo
		else if ($relationship['relationship'] == "solutionFile")
			$view_params['solutionFile'] = $relationship['guid_one'];
	}
	
	// Obtenemos la tarea del usuario, sabiendo que es el propietario y que el contenedor de 
	// la tarea es la tarea padre que estamos viendo 
	$task = elgg_get_entities(array( 'type' => 'object', 
								'subtype' => 'user_task', 
								'owner_guids' => array($user_guid),
								'container_guids' => array($task_guid)
							));
	
	if ($task != false){
		//Si existe la tarea del usuario, la guardamos para pasarla a la vista
		$view_params['task'] = $task[0];
		//Obtenemos las posibles relaciones que haya con esta tarea
		$task_correction = get_entity_relationships($task[0]->getGUID(), true);
		foreach ($task_correction as $relationship){
			//Si existe una relación "correcting", es que el usuario tiene asignada esta tarea para corregir
			if ($relationship['relationship'] == 'correcting'){
				$view_params['correcting'] =  get_entity($relationship['guid_one']);
				// en la propia tarea "correcting" no tenemos la fecha en la que fue asignada, así que lo guardamos
				// en una variable extra "correction_request" para pasarsela a la vista
				$view_params['correction_request'] = $relationship['time_created'];
				
				//Obtenemos las relaciones con la tarea asignada para corregir
				$rels = get_entity_relationships($relationship['guid_one'], true);
				foreach ($rels as $rel){
					//Buscamos la relación del tipo "userSolutionFile", guardamos en la vista el guid del archivo
					if ($rel['relationship'] == "userSolutionFile")
						$view_params['correctingFile'] = $rel['guid_one'];
				}
			}
		}
	}
	
	 $params = array(
		//Mostramos la vista en detalle de la tarea en el bloque principal
		'content' => elgg_view('tasks/single', array('params' => $view_params)),
		//Mostramos el historial de la tarea en el menú lateral
		'sidebar' => elgg_view('tasks/single/history',  array('params' => $view_params)),
		'title' => $title,
		'filter_override' => "",
	);
	
	// layout the page
	$body = elgg_view_layout('content', $params);
	// draw the page
	echo elgg_view_page($title, $body);
