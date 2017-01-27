<?php
	// make sure only logged in users can see this page 
	gatekeeper(); 
	$users = elgg_get_entities(array('type' => 'user', "limit" => 0));
	$day = 24 * 60 * 60;
	$user_nodes = array();
	
	$userID = 1;
?>
*Vertices <?php echo count($users); ?><br/>
<?php
	foreach ($users as $user){ 
		array_push($user_nodes, $user->username);
		$color = $user->isAdmin()?"Red":"Blue";
?>
	<?php echo $userID; ?>&emsp;"<?php echo $user->username; ?>" 0 0 0&emsp;[<?php echo intval(($user->time_created - 1346756830)/$day); ?>-*]<br/>
	
	<?php
		$userID++;
	}
	?>
	
*Edges<br/>

	<?php
	$userID = 1;
	$edgeID = 1;
	foreach ($users as $user){ 
		$rels = get_entity_relationships($user->guid, false);
		foreach($rels as $rel){
			if ($rel->relationship == "friend"){
				$friend = get_entity($rel->guid_two);
				$node =  array_search($friend->username, $user_nodes);
			?>
			<?php echo $userID; ?>&emsp;<?php echo ($node + 1); ?> 1 &emsp;[<?php echo intval(($rel->time_created - 1346756830)/$day); ?>-*]<br/>
			<?php
			}
		}
		/*
		
		$friends_made = $user->getFriends("", 0);
		foreach ($friends_made as $friend){
			$node =  array_search($friend->username, $user_nodes);
			$edgeID++;
		}*/
		$userID++;
	}
	?>
