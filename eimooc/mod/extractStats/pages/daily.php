<?php

	$offset = get_input('offset');
	$count = get_input('count');
	$user = get_input('user');
	set_input('view', 'json');

	$log_entries = get_system_log($user, "create", "", "","", $count, $offset, false,0, 0 ,0, false);
	$logins = get_system_log($user, "login", "", "","", $count, $offset, false, 0, 0,0, false);
	$log_entries = array_merge($log_entries, $logins);
	echo elgg_view('stats/chart', array("log_entries" => $log_entries));
	//var_dump($log_entries);
	