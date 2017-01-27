<?php
	// make sure only logged in users can see this page 
	gatekeeper();
	 
	// set the title
	// for distributed plugins, be sure to use elgg_echo() for internationalization
	$title = "Tareas";
	if ( !isset($vars['page']) || (($vars['page'] != 'waiting') && ($vars['page'] != 'uncorrected') && ($vars['page'] != 'groupby')) ) $vars['page'] = 'all';
	$tasks = elgg_get_entities (array('type' => 'object', 'subtype' => 'user_task', 'limit' => 0, 'order_by' => 'time_created ASC'));
	$user_guid = elgg_get_logged_in_user_guid();
	$taskList = array();

	foreach ($tasks as $user_task){
		//Por cada tarea encontrada, creamos un objeto para la vista de lista
		$task = new ElggObject();
		$gamification_task = get_entity($user_task->container_guid);
		$user = get_user($user_task->owner_guid);
		$task->task_guid = $user_task->guid;
		$task->subtype = "tasklist_view";
		
		$task->title = '<span class="date">' . elgg_view_friendly_time($user_task->time_created) . ' </span> <span style="font-size:14px"> ' . $gamification_task->title . '</span><img src="'.  elgg_format_url($user->getIconURL('tiny')) . '"><span style="font-size:11px">' . $user->name  . ' (' . count($user_task->getAnnotations('comment')) . ')</span>';
		if (($user_task->correction_made == false) && ($user_task->correction_asked == true)){
			$rels = get_entity_relationships($user_task->guid, false);
			foreach ($rels as $rel){
				if ($rel['relationship'] == 'correcting'){
					$task->title .= '<span style="color:#00aeef;font-size:12px"> ' . elgg_view_friendly_time($rel['time_created']) . '</span>';
				}
			}
		}
		$task->description = $gamification_task->description;
		$task->family = $gamification_task->family;
		$task->visible = $gamification_task->visible;
		$task->done = true;
		$task->corrected = $user_task->corrected;
		$task->correction = $user_task->correction;
		$task->correction_made = $user_task->correction_made;

		//Dependiendo de la pestaña en la que estemos, añadimos unas u otras tareas a la lista final
		if ( ($vars['page'] == 'all')  ||  ($vars['page'] == 'groupby')  || 
			(($vars['page'] == 'pending') && ($user_task == false)) || 
			(($vars['page'] == 'uncorrected') && ($task->corrected == false) && ($user_task != false)) ||
			(($vars['page'] == 'waiting') && ($task->corrected == true) && ($user_task->correction_made == false))){
			array_push($taskList, $task);
		}
	}
	
	if ($vars['page'] == 'groupby')
		$content = elgg_view('tasks/list_groupby', array('task_list' => $taskList, 'show_admin' => true));
	else
		$content = elgg_view('tasks/list', array('task_list' => $taskList, 'show_admin' => true));
	
	 $params = array(
		//Mostramos en la columna principal la lista de tareas
		'content' => $content,
		//Mostramos en el lateral la leyenda de los iconos de las tareas
		'sidebar' => elgg_view('tasks/legend'),
		'title' => $title,
		'filter_override' => elgg_view('tasks/admin_nav', array('selected' => $vars['page'])),
	);
	
	// layout the page
	$body = elgg_view_layout('content', $params);
	// draw the page
	echo elgg_view_page($title, $body);
