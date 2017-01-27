<?php
	// make sure only logged in users can see this page 
	gatekeeper();
	 
	$user = get_loggedin_user();
	$user_guid = $user->guid;
	
	 $storeItem = elgg_get_entities_from_metadata(array('type' => 'object', 'subtype' => 'store_item', 'metadata_name' => 'item_id', 'metadata_value' => 'custom-river'));
	//Comprobamos que realmente existe un item con dicho id
	if ($storeItem){
		$storeItem_guid = $storeItem[0]->getGUID();
		 if (check_entity_relationship($user_guid, 'purchased', $storeItem[0]->getGUID()) != false){
			// layout the page
			$body = elgg_view_layout('content', array(
			   'content' =>  elgg_view_form("gamification/store/configure_river", array(), array("user_guid" => $user_guid, "item" => $storeItem[0])),
			   'sidebar' => elgg_view('store/sidebar'),
			   'title' => 'Configurar notificaciones',
			   'filter_override' => ""
			));
			 
			// draw the page
			echo elgg_view_page($title, $body);
		}
		else{
			register_error("No has obtenido todavía esta propiedad!");
			forward(REFERER);
		}
	}
	
?>