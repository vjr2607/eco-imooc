<?php
	// obtenemos los campos del formulario
	$task_guid = get_input('guid');
	$task = get_entity($task_guid);

	//Eliminamos la relación entre ambas tareas
	remove_entity_relationships($task_guid, 'correcting');
	$task->delete(true);
	system_message("Tarea eliminada");
	forward($vars['url'] . 'gamification/tasks/admin');