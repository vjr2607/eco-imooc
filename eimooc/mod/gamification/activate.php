<?php

	if (get_subtype_id('object', 'gamification_task')) {
		update_subtype('object', 'gamification_task', 'ElggGamificationTask');
	} else {
		add_subtype('object', 'gamification_task', 'ElggGamificationTask');
	}
	
	if (get_subtype_id('object', 'gamification_achievement')) {
		update_subtype('object', 'gamification_achievement', 'ElggGamificationAchievement');
	} else {
		add_subtype('object', 'gamification_achievement', 'ElggGamificationAchievement');
	}
	
	if (get_subtype_id('object', 'store_item')) {
		update_subtype('object', 'store_item', 'ElggStoreItem');
	} else {
		add_subtype('object', 'store_item', 'ElggStoreItem');
	}

/**
 * Creamos todos los logros necesarios en el sistema, cargandolos desde el JSON
 */
	$json_data = file_get_contents(elgg_get_plugins_path() . "gamification/achievements.json");
	$jsonObject = json_decode($json_data, true);
	$achievements = $jsonObject["achievements"];
	foreach ($achievements as $gamification_achievement){
		$achievement = new ElggObject();
		$achievement->achievement_id = $gamification_achievement["id"];
		$achievement->subtype = "gamification_achievement";
		$achievement->title =$gamification_achievement["name"];
		$achievement->description = $gamification_achievement["description"];
		$achievement->iconUrl = $gamification_achievement["icon"];
		$achievement->access_id = ACCESS_PUBLIC;
		$achievement->owner_guid = elgg_get_logged_in_user_guid();
		$achievement->order = $gamification_achievement["order"];
		$achievement->points = $gamification_achievement["points"];
		$achievement->save();
	}
	
/**
 * Creamos los elementos de la tienda, cargandolos desde el JSON
 */	
	$json_data = file_get_contents(elgg_get_plugins_path() . "gamification/store_items.json");
	$jsonObject = json_decode($json_data, true);
	$store_items = $jsonObject["store_items"];
	foreach ($store_items as $store_item){
		$item = new ElggObject();
		$item->subtype = "store_item";
		$item->item_id = $store_item["id"];
		$item->title =$store_item["name"];
		$item->description = $store_item["description"];
		$item->iconUrl = $store_item["icon"];
		$item->access_id = ACCESS_PUBLIC;
		$item->owner_guid = elgg_get_logged_in_user_guid();
		$item->order = $store_item["order"];
		$item->points = $store_item["points"];
		$item->rebuy = $store_item["rebuy"];
		if ($item->rebuy)
			$item->max_purchases = $store_item["max_purchases"];
		$item->save();
	}
	
/**
 * Creamos los elementos de la tienda, cargandolos desde el JSON
 */	
	$json_data = file_get_contents(elgg_get_plugins_path() . "gamification/tasks_families.json");
	$jsonObject = json_decode($json_data, true);
	$families = $jsonObject["families"];
	foreach ($families as $fam){
		$family = new ElggObject();
		$family->subtype = "gamification_family";
		$family->family_id = $fam["id"];
		$family->title =$fam["name"];
		$family->description = $fam["description"];
		$family->iconUrl = $fam["icon"];
		$family->access_id = ACCESS_PUBLIC;
		$family->owner_guid = elgg_get_logged_in_user_guid();
		$family->order = $fam["order"];
		$family->save();
	}


/**
 * Ponemos los puntos de todos los usuarios a cero
 */
	$users = elgg_get_entities(array('type' => 'user', "limit" => 0));
	foreach ($users as $user){
		$user->points = 0;
		$user->save();
	}	