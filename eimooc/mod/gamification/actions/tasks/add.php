<?php
	include 'savefile.php';
	
	// Obtenemos los datos del formulario
	$title = get_input('title');
	$description = get_input('description');
	$family = get_input('family');
	$tags = string_to_tag_array(get_input('tags'));
	$n_criteria = intval(get_input('n_criteria'));
	$points_solve = intval(get_input('points_solve'));
	$points_correction = intval(get_input('points_correction'));
	$points_correct = intval(get_input('points_correct'));
	
	// creamos el objeto e inicializamos sus valores
	$task = new ElggObject();
	$task->subtype = "gamification_task";
	$task->title = $title;
	$task->description = $description;
	$task->access_id = ACCESS_PUBLIC;
	$task->owner_guid = elgg_get_logged_in_user_guid();
	$task->points_solve = $points_solve;
	$task->points_correction = $points_correction;
	$task->points_correct = $points_correct;
	$task->visible = false;
	 
	// añadimos los metadatos extra
	$task->tags = $tags;
	$task->family = $family;

	// Lo guardamos en la BBDD
	$task_guid = $task->save();
	
	for ($i = 1; $i<=$n_criteria; $i++){
		//Obtenemos cada uno de los criterios de corrección y los guardamos como una anotación
		$criteria_description = get_input('criteria'.$i);
		$task->annotate('criteria', $criteria_description, ACCESS_PUBLIC, $task->owner_guid, "text");
	}
	$task->n_criteria = $n_criteria;
	$task->save();
	
	//Guardamos (en caso de existir) los ficheros inicial y de solución, estableciendo para cada uno su relacion correspondiente
	saveFile('initial_file', 'Fichero inicial', 'Fichero inicial de la tarea', 'initialFile', $task, $task_guid);
	saveFile('additional_files', 'Ficheros auxiliares', 'Ficheros auxiliares de la tarea', 'additionalFiles', $task, $task_guid);
	saveFile('solution_file', 'Fichero solución', 'Fichero con la solución para la tarea', 'solutionFile', $task, $task_guid);
	 
	if ($task_guid) {
	   system_message("La tarea se ha guardado correctamente");
	   //add_to_river('river/task/new', 'new', elgg_get_logged_in_user_guid(), $task_guid);
	   forward('/gamification/tasks/all');
	} else {
	   register_error("La tarea no pudo ser guardada");
	   forward(REFERER); // REFERER is a global variable that defines the previous page
	}
