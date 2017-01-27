<?php
	// obtenemos los campos del formulario
	
	$user = get_loggedin_user();
	

	ob_start();
	var_dump($_FILES);
	$result = ob_get_clean();

	
	if (!isset($_FILES['custom_profile']['name']) || empty($_FILES['custom_profile']['name'])) {
		register_error("No se ha subido ningún archivo!" . $result);
		//forward(REFERER); // REFERER is a global variable that defines the previous page
	}
	else{
	
		//Eliminamos la imagen antigua
		$relationships = get_entity_relationships($user->guid, true);
		foreach ($relationships as $relationship){
			//Si tiene una relación de tipo "initalFile", guardamos en la vista el guid del archivo
			if ($relationship['relationship'] == "custom_profile"){
				$profile_image = get_entity($relationship['guid_one']);
				//eliminamos el fichero anterior y todos los elementos que estuviesen sub-relacionados con ella
				$profile_image->delete(true);
			}
		}
	
		$file = new ElggFile();
		$file->subtype = "file";
		$file->title = $user->name . " - customprofile";
		$file->description = "custom profile";
		$file->access_id = ACCESS_PUBLIC;
		$file->container_guid = $user->guid;
		$prefix = "file/";
		$filestorename = elgg_strtolower(time().$_FILES['custom_profile']['name']);
		$file->setFilename($prefix . $filestorename);
		$mime_type = ElggFile::detectMimeType($_FILES['custom_profile']['tmp_name'], $_FILES['custom_profile']['type']);

		//Establecemos manualmente el mimetype si es un formato actual de Office
		$info = pathinfo($_FILES['custom_profile']['name']);
		
		//Añadimos la información relativa al mimetype y al nombre del archivo
		$file->setMimeType($mime_type);
		$file->originalfilename = $_FILES['custom_profile']['name'];
		$file->simpletype = file_get_simple_type($mime_type);
		
		// Abrimos el archivo para garantizar que existe
		$file->open("write");
		$file->close();
		move_uploaded_file($_FILES['custom_profile']['tmp_name'], $file->getFilenameOnFilestore());
		$file->save();
		
		//añadimos la relación especificada entre el archivo guardado y la tarea
		add_entity_relationship ($file->getGUID(), 'custom_profile', $user->guid);
		system_message("Archivo guardado");
	}
	
