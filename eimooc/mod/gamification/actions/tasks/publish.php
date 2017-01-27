<?php
	gatekeeper();
	
	// get the form inputs
	$task_guid = get_input('guid');
	$task = get_entity($task_guid);
	$task->visible = true;
	add_to_river('river/task/new', 'new', elgg_get_logged_in_user_guid(), $task_guid);
	$task->save();
	system_message("Tarea publicada correctamente");
	forward('/gamification/tasks/all');

?>