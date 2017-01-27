<?php
	gatekeeper();
	
	// get the form inputs
	$task_guid = get_input('guid');
	$task = get_entity($task_guid);
	//eliminamos la tarea y todos los elementos que estuviesen sub-relacionados con ella
	$success = $task->delete(true);

	if ($success) {
	   system_message("Tarea eliminada correctamente");
	   forward('/gamification/tasks/all');
	} else {
	   register_error("La tarea no pudo ser eliminada");
	   forward(REFERER); // REFERER is a global variable that defines the previous page
	}
?>