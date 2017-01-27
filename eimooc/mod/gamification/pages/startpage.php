<?php
	// make sure only logged in users can see this page 
	gatekeeper(); 
	 
	// layout the page
	$body = elgg_view_layout('content', array(
	   'content' => elgg_view('startpage'),
	   'sidebar' => '',
	   'title' => 'Gamification',
	   'filter_override' => ""
	));
	 
	// draw the page
	echo elgg_view_page($title, $body);
?>