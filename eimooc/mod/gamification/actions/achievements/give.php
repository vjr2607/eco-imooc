<?php
	// make sure only logged in users can see this page 
	gatekeeper();
	
	$user =  get_user_by_username(get_input("username"));
	$achievement_id =  get_input("achievement_id");
	giveAchievement($user->guid, $achievement_id);
	
	system_message("Logro concedido! ");
	forward(REFERER);