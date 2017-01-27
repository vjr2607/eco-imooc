<?php
/**
 * Eliminamos los logros y articulos de la tienda creados
 */

	$achievements = elgg_get_entities (array('type' => 'object', 'subtype' => 'gamification_achievement', 'limit' => 0));
	foreach ($achievements as $gamification_achievement){
		$gamification_achievement->delete(true);
	}
	
	$store_items = elgg_get_entities (array('type' => 'object', 'subtype' => 'store_item', 'limit' => 0));
	foreach ($store_items as $store_item){
		$store_item->delete(true);
	}
	
	$families = elgg_get_entities (array('type' => 'object', 'subtype' => 'gamification_family', 'limit' => 0));
	foreach ($families as $family){
		$family->delete(true);
	}