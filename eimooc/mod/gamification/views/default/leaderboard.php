<?php
	echo elgg_view('gamification_topbar');
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
		$leaderboard .= "<div class=\"achievements\"><span>{$achievementsCount}/{$totalAchievements} logros </span></div>";
		$leaderboard .= "<div class=\"task_points\">{$user->points} Pts </div>";
		
		$leaderboard .= "<div class=\"ranking-position\">{$count}</div>";
		$leaderboard .= elgg_view_list_item($user);
		$leaderboard .='</li>';
		
		$count++;
	}
	
	?>
	<ul class="leaderboard elgg-list elgg-list-entity">
	<li class="header">
		<div class="achievements">Logros</div>
		<div class="task_points">Puntos</div>
		Tu posición: <?php echo $user_position; ?>
	</li>
	<?php echo $leaderboard;
	echo '</ul>';
