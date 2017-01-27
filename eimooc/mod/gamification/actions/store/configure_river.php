<?php
	// obtenemos los campos del formulario
	$item_guid = get_input('item_guid');
	$riverBG = get_input('river_bg');
	$user_guid = elgg_get_logged_in_user_guid();
	$item = get_entity($item_guid);
	
	if (check_entity_relationship($user_guid, 'purchased', $item_guid)){
		$item->clearAnnotations(''.$user_guid);
		$item->annotate(''.$user_guid, $riverBG);
	}
	else{
		register_error("No has adquirido en la tienda el artículo necesario");
		forward(REFERER);
	}
		
	system_message("Notificación configurada correctamente.");
	forward(REFERER);