<?php
	// make sure only logged in users can see this page 
	gatekeeper();
	 
	$comments = array();
	$users = elgg_get_entities(array('type' => 'user', "limit" => 0));
	foreach ($users as $user){
		$comments_count = elgg_get_annotations(array('count' => true, 'annotation_names' => array('comment'), 'annotation_owner_guids' => array($user->guid), "limit" => 0)); 
		$comments_count += elgg_get_annotations(array('count' => true, 'annotation_names' => array('generic_comment'), 'annotation_owner_guids' => array($user->guid), "limit" => 0)); 
		array_push($comments, $comments_count);
	}
	array_multisort($comments, SORT_DESC, $users);
	// layout the page
	$body = elgg_view_layout('content', array(
	   'content' => elgg_view('leaderboard/comments', array('users' =>$users, 'comments' => $comments)),
	   'sidebar' => elgg_view('leaderboard/leaderboard_sidebar'),
	   'title' => 'Quadro de Resultados',
	   'filter_override' => ""
	));
	 
	// draw the page
	echo elgg_view_page($title, $body);
?>