<?php
	// make sure only logged in users can see this page 
	gatekeeper();
	
	$friends = array();
	$users = elgg_get_entities(array('type' => 'user', "limit" => 0));
	foreach ($users as $user){
		$friends_count = count($user->getFriendsOf("", 0));
		array_push($friends, $friends_count);
	}
	array_multisort($friends, SORT_DESC, $users);
	// layout the page
	$body = elgg_view_layout('content', array(
	   'content' => elgg_view('leaderboard/friends', array('users' =>$users, 'friends' => $friends)),
	   'sidebar' => elgg_view('leaderboard/leaderboard_sidebar'),
	   'title' => 'Quadro de Resultados',
	   'filter_override' => ""
	));
	 
	// draw the page
	echo elgg_view_page($title, $body);
?>