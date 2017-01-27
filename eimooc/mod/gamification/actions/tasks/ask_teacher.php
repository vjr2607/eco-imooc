<?php
	gatekeeper();
	
	// get the form inputs
	$task_guid = get_input('guid');
	$task = get_entity($task_guid);
	$user_guid = elgg_get_logged_in_user_guid();
	
	$message = elgg_view("tasks/message/ask_teacher", array("task" => $task, "user_guid" =>$user_guid));
	
	$users = elgg_get_entities(array(
		'types' => 'user',
		'limit' => false,
	));
	
	foreach ($users as $user){
		if ($user->isAdmin())
			notify_user($user->guid, $user_guid, "Solicitud de intervención de profesor", $message);
	}
	
	
	
	
	system_message("Los profesores han recibido una notificación para que intervengan en la correción de la tarea");
	forward(REFERER); // REFERER is a global variable that defines the previous page

?>