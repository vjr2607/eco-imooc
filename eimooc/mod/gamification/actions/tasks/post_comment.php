<?php
	include 'savefile.php';
	
	// obtenemos los campos del formulario
	$guid = get_input('guid');
	$receiver_guid = get_input('receiver_guid');
	$user_guid = elgg_get_logged_in_user_guid();
	$comment = get_input('comment');

	// obtenemos la tarea de la base de datos
	$task = get_entity($guid);
	
	// añadimos una anotación a la tarea con el nuevo comentario
	$task->annotate('comment', $comment, ACCESS_PUBLIC, $user_guid, "text");
	
	$message = elgg_view("tasks/message/post_comment", array("commenter" => $user_guid, "task_guid" => $task->container_guid, "comment" => $comment));
	notify_user($receiver_guid,  $user_guid, "Nuevo comentario en una tarea", $message);
	
	if ($user_guid ==$task->owner_guid)
		forward('/gamification/tasks/view/' . $task->container_guid);
	else
		forward('/gamification/tasks/view/' . $task->container_guid . '#tab-task-correcting');
	