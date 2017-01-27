<?php 
	$user_guid = $vars['user_guid'];
	$storeItem = elgg_get_entities_from_metadata(array('type' => 'object', 'subtype' => 'store_item', 'metadata_name' => 'item_id', 'metadata_value' => 'custom-profile-img'));
	
	if ($storeItem){
		$storeItem_guid = $storeItem[0]->getGUID();
		 if (check_entity_relationship($user_guid, 'purchased', $storeItem[0]->getGUID()) != false){
			if (elgg_get_logged_in_user_guid() == $user_guid) {
				echo '<div class="solve-form">';
				echo "<h3>Añadir imagen personalizada</h3>";
				echo '<div style=" width:200px;">' . elgg_view('input/file', array('name' => 'custom_profile')) . '</div>';
				echo elgg_view('input/submit', array('value' => "Subir"));
				echo '</div>';
			}
			$relationships = get_entity_relationships($user_guid, true);
			foreach ($relationships as $relationship){
				//Si tiene una relación de tipo "initalFile", guardamos en la vista el guid del archivo
				if ($relationship['relationship'] == "custom_profile"){
					echo '<img src="'. $vars['url'] .'file/download/' . $relationship['guid_one'] . '" style="position:absolute; top:56px; left:247px; max-width:725px; max-height:455px;z-index:-1">';
				}
			}
			
			
		 }	 
	}
	