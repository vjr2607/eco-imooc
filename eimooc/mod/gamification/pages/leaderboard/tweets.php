<?php
	// make sure only logged in users can see this page
	gatekeeper();
	 
	$tweets = array();
	$users = elgg_get_entities(array('type' => 'user', "limit" => 0));
	foreach ($users as $user){
		$tweets_count =  elgg_get_entities(array("count" => true, "type" => "object", "subtype" => "thewire", "owner_guid" => $user->guid, "limit" => 0));
		array_push($tweets, $tweets_count);
	}
	array_multisort($tweets, SORT_DESC, $users);
	
	// layout the page
	$body = elgg_view_layout('content', array(
	   'content' => elgg_view('leaderboard/tweets', array('users' =>$users, 'tweets' => $tweets)),
	   'sidebar' => elgg_view('leaderboard/leaderboard_sidebar'),
	   'title' => 'Quadro de Resultados',
	   'filter_override' => ""
	));
	 
	// draw the page
	echo elgg_view_page($title, $body);
?>