<?php
	// make sure only logged in users can see this page 
	gatekeeper();
	
	$user_guid = elgg_get_logged_in_user_guid();
	giveAchievement($user_guid, 'achievement-welcome');
	 
	$num_users = elgg_get_entities(array('types' => 'user', 'limit' => 0, 'count' => true));
	 
	$title = "Crachás: estatísticas";
	$achievements = elgg_get_entities_from_metadata(array('type' => 'object', 'subtype' => 'gamification_achievement', 'limit' => 0,
																			'order_by_metadata' => array('name'=>'order', 'direction'=>'ASC')));
	
	$achievementsList = array();
	$achievements_completed = 0;
	foreach ($achievements as $gamification_achievement){
		//Por cada logro encontrado, creamos un objeto para la vista de lista
		$user_achievement = new ElggObject();
		$user_achievement->subtype = "user_achievement";
		$user_achievement->title = $gamification_achievement->title;
		$user_achievement->description = $gamification_achievement->description;
		$user_achievement->iconUrl = $gamification_achievement->getIconURL();
		$user_achievement->points = $gamification_achievement->points;
		$num_achieved = count(get_entity_relationships($gamification_achievement->guid, true));
		$user_achievement->percent = intval(($num_achieved / $num_users) * 100);
		
		//Comprobamos si el usuario ha conseguido el logro
		$achieved = (check_entity_relationship($user_guid, 'achieved', $gamification_achievement->guid) != false);
		$user_achievement->achieved = $achieved;
		if ($achieved) $achievements_completed++;
		array_push($achievementsList, $user_achievement);
	}
	
	 $params = array(
		//Mostramos en la columna principal la lista de tareas
		'content' => elgg_view('achievements/stats', array('achievemens_list' => $achievementsList, 'completed' => $achievements_completed, 'num_users' => $num_users)),
		//Mostramos en el lateral la leyenda de los iconos de las tareas
		'title' => $title,
		'sidebar' => elgg_view('achievements/sidebar', array('achievemens_list' => $achievementsList, 'completed' => $achievements_completed)),
		'filter_override' => "",
		);
	
	// layout the page
	$body = elgg_view_layout('content', $params);
	// draw the page
	echo elgg_view_page($title, $body);
