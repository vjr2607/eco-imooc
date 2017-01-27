<?php
	//echo elgg_view('gamification_topbar');
	$count = 1;
	$leaderboard = "";
	$user_guid = elgg_get_logged_in_user_guid();
	$user_position = 0;
	$totalAchievements = $vars['totalAchievements'];
	
	foreach ($vars['leaderboard'] as $user){
		if ($user->guid == $user_guid){
			$user_position = $count;
			$leaderboard .= '<li class="user">';
		}
		else
			$leaderboard .= '<li>';	
		
		$relations = get_entity_relationships($user->guid);
		$achievementsCount = 0;
		foreach ($relations as $relation){
			if ($relation->relationship == "achieved") $achievementsCount++;
		}
		$leaderboard .= "<div class=\"achievements\"><span>{$achievementsCount}/{$totalAchievements} crachás </span></div>";
		$leaderboard .= "<div class=\"task_points\">{$user->points} Pts </div>";
		
		$leaderboard .= "<div class=\"ranking-position\">{$count}</div>";
		$leaderboard .= elgg_view_list_item($user);
		$leaderboard .='</li>';
		
		$count++;
	}
	$header = 'Sua posição:' .  $user_position;
	
	echo elgg_view('leaderboard/header', array('type' => 'points', 'title' => $header, 'headers' => array('Crachás', 'Pontos')));
	echo $leaderboard;
	echo '</ul>';
