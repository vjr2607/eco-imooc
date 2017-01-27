<?php
	// make sure only logged in users can see this page 
	gatekeeper();
	 
	$user = get_loggedin_user();
	$user_guid = $user->guid;
	if (isset($user->spent_points)){
		$spent_points = $user->spent_points;
		$available_points = $user->points - $spent_points;
	}
	else{
		$spent_points = 0;
		$available_points = $user->points;
	}	
	
	$store_items = elgg_get_entities_from_metadata(array('type' => 'object', 'subtype' => 'store_item', 'limit' => 0,
																			'order_by_metadata' => array('name'=>'order', 'direction'=>'ASC')));
	
	 $storeItemsList = array();
	 foreach ($store_items as $store_item){
		$item = new ElggObject();
		$item->subtype = "user_storeItem";
		$item->title = $store_item->title;
		$item->description = $store_item->description;
		$item->iconUrl = $store_item->iconUrl;
		$item->user_guid = $user_guid;
		$item->item_guid = $store_item->guid;
		$item->item_id = $store_item->item_id;
		$item->points = $store_item->points;
		$item->available = ($item->points < $available_points);
		$item->rebuy = $store_item->rebuy;
		$item->purchased = (check_entity_relationship($user_guid, 'purchased', $store_item->guid) != false);
		if ($item->rebuy){
			//Si es un item comprable muchas veces, comprobamos el número de veces que lo tiene
			$item->max_purchases = $store_item->max_purchases;
			if( $item->purchased){
				$purchases = $store_item->getAnnotations(''.$user_guid);
				$item->purchases = $purchases[0]->value;
				if ($item->purchases >= $item->max_purchases){
					$item->purchased = true;
				}
				else{
					$item->purchased = false;
				}
			}
			else
				$item->purchases = 0;
		}
		array_push($storeItemsList, $item);		
	 }

	// layout the page
	$body = elgg_view_layout('content', array(
	   'content' => elgg_view('store/list', array('store_items' => $storeItemsList, 'user_points' => $user->points, 'available_points' => $available_points, 'spent_points' => $spent_points)),
	   'sidebar' => elgg_view('store/sidebar'),
	   'title' => 'Tienda',
	   'filter_override' => ""
	));
	 
	// draw the page
	echo elgg_view_page($title, $body);
?>