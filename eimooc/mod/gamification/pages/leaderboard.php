<?php
	// make sure only logged in users can see this page 
	gatekeeper();
	 
	 $leaderboard = elgg_get_entities_from_metadata(array('type' => 'user', 'limit' => 0, 'order_by_metadata' => array('name' => 'points', 'direction' => 'desc', 'as' => 'integer')));
	 $totalAchievements = elgg_get_entities(array('type' => 'object', 'subtype' => 'gamification_achievement', 'count' => true));
	 
	// layout the page
	$body = elgg_view_layout('content', array(
	   'content' => elgg_view('leaderboard', array('leaderboard' =>$leaderboard, 'totalAchievements' => $totalAchievements)),
	   'sidebar' => elgg_view('leaderboard_sidebar'),
	   'title' => 'Quadro de Resultados',
	   'filter_override' => ""
	));
	 
	// draw the page
	echo elgg_view_page($title, $body);
?>