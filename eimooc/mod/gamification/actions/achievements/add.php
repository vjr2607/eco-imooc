<?php
	
	// Obtenemos los datos del formulario
	$title = get_input('title');
	$description = get_input('description');
	
	// creamos el objeto e inicializamos sus valores
	$achievement = new ElggObject();
	$achievement->subtype = "gamification_achievement";
	$achievement->title = $title;
	$achievement->description = $description;
	$achievement->access_id = ACCESS_PUBLIC;
	$achievement->owner_guid = elgg_get_logged_in_user_guid();

	// Lo guardamos en la BBDD
	$achievement_guid = $achievement->save();
	 
	if ($achievement_guid) {
	   system_message("Logro guardado correctamente" . $prefix);
	   forward('/gamification/achievements/all');
	} else {
	   register_error("El logro no pudo ser guardado");
	   forward(REFERER); // REFERER is a global variable that defines the previous page
	}
