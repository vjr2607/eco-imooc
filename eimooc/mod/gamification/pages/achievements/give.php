<?php
	// make sure only logged in users can see this page 
	gatekeeper();
	
	$title = "Conceder crachás";
	$achievements = elgg_get_entities_from_metadata(array('type' => 'object', 'subtype' => 'gamification_achievement', 'limit' => 0,
																			'order_by_metadata' => array('name'=>'order', 'direction'=>'ASC')));
																													
																			
	 $params = array(
		'content' => elgg_view_form("gamification/achievements/give",  array(), array('achievements' => $achievements)),
		'title' => $title,
		'sidebar' => '',
		'filter_override' => "",
		);
	
	// layout the page
	$body = elgg_view_layout('content', $params);
	// draw the page
	echo elgg_view_page($title, $body);