NodeId&emsp;Label&emsp;ColorName&emsp;StartTime&emsp;EndTime<br/>

<?php
	// make sure only logged in users can see this page 
	gatekeeper(); 
	$users = elgg_get_entities(array('type' => 'user', "limit" => 0));
	
	$user_nodes = array();
	
	$userID = 1;
	foreach ($users as $user){ 
		array_push($user_nodes, $user->username);
		$color = $user->isAdmin()?"Red":"Blue";
?>
	<?php echo $userID; ?>&emsp;<?php echo $user->username; ?>&emsp;<?php echo $color; ?>&emsp;<?php echo ($user->time_created - 1346751830)/100; ?>&emsp;532177.95<br/>
	
	<?php
		$userID++;
	}
	?>
FromId&emsp;ToId&emsp;StartTime&emsp;EndTime&emsp;ArcWeight<br/>
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
			<?php echo $userID; ?>&emsp;<?php echo ($node + 1); ?>&emsp;<?php echo ($rel->time_created - 1346751830)/100; ?>&emsp;532177&emsp;1<br/>
			<?php
			}
		}
		/*$friends_made = $user->getFriends("", 0);
		foreach ($friends_made as $friend){
			$node =  array_search($friend->username, $user_nodes);
			$edgeID++;
		}*/
		$userID++;
	}
	?>
