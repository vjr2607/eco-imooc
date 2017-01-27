<?php
		gatekeeper();
	
	if (isset($_GET["id"]) && isset($_GET["user"])){
		$user_guid = get_user_by_username($_GET["user"])->guid;
		$achievement_id = $_GET["id"];
	
		//Obtenemos el objeto del logro
		$achievements = elgg_get_entities_from_metadata(array('type' => 'object', 'subtype' => 'gamification_achievement', 'metadata_name' => 'achievement_id', 'metadata_value' => $achievement_id));
		//Comprobamos que realmente exista un logro con dicho id
		if ($achievements){
			$achievement_guid = $achievements[0]->getGUID();
			//Comprobamos si ya le ha sido concedido ese logro al usuario
			if (check_entity_relationship($user_guid, 'achieved', $achievement_guid)){
				//En caso de que lo tuviera, se lo quitamos
				remove_entity_relationship($user_guid, 'achieved', $achievement_guid);
				if (isset($achievements[0]->points))
					get_entity($user_guid)->points -= $achievements[0]->points;
					echo 'Hecho!';
			}
		}
	}
