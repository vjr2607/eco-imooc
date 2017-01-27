<?php
	// make sure only logged in users can see this page 
	gatekeeper();
	 
	// set the title
	// for distributed plugins, be sure to use elgg_echo() for internationalization
	$title = "Tareas";
	if ( !isset($vars['page']) || (($vars['page'] != 'pending') && ($vars['page'] != 'uncorrected')) ) $vars['page'] = 'all';
	$tasks = elgg_get_entities (array('type' => 'object', 'subtype' => 'gamification_task', 'limit' => 0, 'order_by' => 'time_created ASC'));
	$user_guid = elgg_get_logged_in_user_guid();
	$taskList = array();
	
	foreach ($tasks as $gamification_task){
		//Por cada tarea encontrada, creamos un objeto para la vista de lista
		$task = new ElggObject();
		$task->task_guid = $gamification_task->guid;
		$task->subtype = "tasklist_view";
		$task->title = $gamification_task->title;
		$task->description = $gamification_task->description;
		$task->family = $gamification_task->family;
		$task->points = $gamification_task->points_solve + $gamification_task->points_correction + $gamification_task->points_correct;
		$task->visible = $gamification_task->visible;
		//Obtenemos la tarea del usuario (si existe) asociada a la tarea padre
		$user_task = elgg_get_entities(array( 'type' => 'object', 
								'subtype' => 'user_task', 
								'owner_guids' => array($user_guid),
								'container_guids' => array($gamification_task->guid)
							));
		
		if ($user_task != false){
			//Si la tarea existe, ponemos los valores actuales de la misma
			$task->done = true;
			$task->corrected = $user_task[0]->corrected;
			$task->correction = $user_task[0]->correction;
			$task->correction_made = $user_task[0]->correction_made;
			$task->earned_points = $user_task[0]->earned_points;
		}
		else{
			//Si no existe la tarea, ponemos todos los valores a falso
			$task->done = false;
			$task->corrected = false;
			$task->correction = false;
			$task->correction_made = false;
			$task->earned_points = 0;
		}
		//Dependiendo de la pestaña en la que estemos, añadimos unas u otras tareas a la lista final
		if ( ($vars['page'] == 'all')  || 
			(($vars['page'] == 'pending') && ($user_task == false)) || 
			(($vars['page'] == 'uncorrected') && ($task->corrected == false) && ($user_task != false)) ){
			if (elgg_is_admin_logged_in() || ($task->visible == true))
				array_push($taskList, $task);
		}
	}
	
	 $params = array(
		//Mostramos en la columna principal la lista de tareas
		'content' => elgg_view('tasks/list', array('task_list' => $taskList)),
		//Mostramos en el lateral la leyenda de los iconos de las tareas
		'sidebar' => elgg_view('tasks/legend'),
		'title' => $title,
		'filter_override' => elgg_view('tasks/nav', array('selected' => $vars['page'])),
	);
	
	// layout the page
	$body = elgg_view_layout('content', $params);
	// draw the page
	echo elgg_view_page($title, $body);
