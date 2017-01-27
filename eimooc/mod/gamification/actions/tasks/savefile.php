<?php
	//Función para guardar un fichero (añadiendo la relación correspondiente)
	function saveFile($input_name, $title, $description, $relation_name, $task, $task_guid){
		if (isset($_FILES[$input_name]['name']) && !empty($_FILES[$input_name]['name'])) {
	
			$file = new ElggFile();
			$file->subtype = "file";
			$file->title = $task->title . ' ' . $title;
			$file->description = $description . ' ' . $task->title;
			$file->access_id = ACCESS_PUBLIC;
			$file->container_guid = $task_guid;
			$prefix = "file/";
			$filestorename = elgg_strtolower(time().$_FILES[$input_name]['name']);
			$file->setFilename($prefix . $filestorename);
			$mime_type = ElggFile::detectMimeType($_FILES[$input_name]['tmp_name'], $_FILES[$input_name]['type']);

			//Establecemos manualmente el mimetype si es un formato actual de Office
			$info = pathinfo($_FILES[$input_name]['name']);
			$office_formats = array('docx', 'xlsx', 'pptx');
			if ($mime_type == "application/zip" && in_array($info['extension'], $office_formats)) {
				switch ($info['extension']) {
					case 'docx': $mime_type = "application/vnd.openxmlformats-officedocument.wordprocessingml.document";	break;
					case 'xlsx': $mime_type = "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet";	break;
					case 'pptx': $mime_type = "application/vnd.openxmlformats-officedocument.presentationml.presentation"; break;
				}
			}

			// Comprobamos si ha detectado incorrectamente el formato ppt
			if ($mime_type == "application/vnd.ms-office" && $info['extension'] == "ppt") {
				$mime_type = "application/vnd.ms-powerpoint";
			}

			//Añadimos la información relativa al mimetype y al nombre del archivo
			$file->setMimeType($mime_type);
			$file->originalfilename = $_FILES['upload']['name'];
			$file->simpletype = file_get_simple_type($mime_type);
			
			// Abrimos el archivo para garantizar que existe
			$file->open("write");
			$file->close();
			move_uploaded_file($_FILES[$input_name]['tmp_name'], $file->getFilenameOnFilestore());
			$file->save();
			
			//añadimos la relación especificada entre el archivo guardado y la tarea
			add_entity_relationship ($file->getGUID(), $relation_name, $task_guid);
			system_message("Archivo guardado");
		} 
	}