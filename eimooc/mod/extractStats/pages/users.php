<?php

	set_input('view', 'json');

	$users = elgg_get_entities(array('type' => 'user', "limit" => 0));
	echo elgg_view('stats/users', array("users" => $users));
	//var_dump($log_entries);
	