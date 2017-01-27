<?php
	// obtenemos los campos del formulario
	$item_guid = get_input('item_guid');
	$user = get_loggedin_user();
	$item = get_entity($item_guid);
	
	if ($item->points > $user->points){
		register_error("No tienes puntos suficientes para adquirir este artículo");
		forward(REFERER);
	}
	
	if ($item->rebuy == true){
		if (!check_entity_relationship($user->guid, 'purchased', $item_guid)){
			//En caso de que no lo tuviera, se lo concedemos
			add_entity_relationship ($user->guid, 'purchased', $item_guid);
			$item->annotate(''.$user->guid, 1);
		}
		else{
			//Si ya lo tenía, tenemos que comprobar el numero de veces
			$purchases = $item->getAnnotations(''.$user->guid);
			if ($purchases[0]->value < $item->max_purchases){
				$item->clearAnnotations(''.$user->guid);
				$item->annotate(''.$user->guid, $purchases[0]->value + 1);
			}
			else{
				register_error("Ya habías adquirido este artículo todas las veces posibles");
				forward(REFERER);
			}
		}
	}
	else if (!check_entity_relationship($user->guid, 'purchased', $item_guid)){
		//En caso de que no lo tuviera, se lo concedemos
		add_entity_relationship ($user->guid, 'purchased', $item_guid);
	}
	else{
		//Si ya lo tenía, no tiene sentido concedérselo una vez más
		register_error("Ya habías adquirido este artículo");
		forward(REFERER);
	}
	
	if (!isset($user->spent_points))
			$user->spent_points = 0;
		$user->spent_points += $item->points;
	
	add_to_river('river/store_item/purchased', 'purchased', $user->guid, $item_guid);
	trigger_plugin_hook('gamification:purchased','store_item', array("user_purchasing" => $user), false);
	system_message("Artículo \"" . $item->title . "\" comprado!");
	forward(REFERER);