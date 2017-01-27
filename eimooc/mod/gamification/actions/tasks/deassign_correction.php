<?php
	// obtenemos los campos del formulario
	$task_guid = get_input('guid');
	$task = get_entity($task_guid);

	$task->correction_asked = false;
	$task->save();
	//Eliminamos la relación entre ambas tareas
	remove_entity_relationships($task_guid, 'correcting');
	
	system_message("Corrección desasignada");
	forward(REFERER);