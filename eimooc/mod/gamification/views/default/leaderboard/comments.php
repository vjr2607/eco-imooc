<?php
	//echo elgg_view('gamification_topbar');
	$count = 1;
	$leaderboard = "";
	$user_guid = elgg_get_logged_in_user_guid();
	$user_position = 0;
	$commentsCount = 0;
	$num_users = count($vars['users']);
	$i = 0;
	for($i = 0; $i < $num_users; $i++){
		if ($vars['users'][$i]->guid == $user_guid){
			$user_position = $count;
			$leaderboard .= '<li class="user">';
		}
		else
			$leaderboard .= '<li>';	
		$leaderboard .= "<div class=\"task_points\">" . $vars['comments'][$i] . " cmts.</div>";
		$leaderboard .= "<div class=\"ranking-position\">{$count}</div>";
		$leaderboard .= elgg_view_list_item($vars['users'][$i]);
		$leaderboard .='</li>';
		$commentsCount +=  $vars['comments'][$i];
		$count++;
	}
	
	$header = 'Sua posição: ' .  $user_position . '<span style="padding-left:20px">Total de Comentários: </span>' . $commentsCount;
	
	echo elgg_view('leaderboard/header', array('type' => 'comments', 'title' => $header, 'headers' => array('Comentários')));
	echo $leaderboard;
	echo '</ul>';
