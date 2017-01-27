[
	<?php
	
	$users = $vars['users'];
	$count = count($users);
	for($i=0; $i<$count; $i++){
		$user = $users[$i];
		?>
		{ 
			"id" : "<?php echo $user->guid; ?>", 
			"username" : "<?php echo $user->username; ?>",
			"name" : "<?php echo $user->name; ?>",
			"email" : "<?php echo $user->email; ?>"
		}
	
	<?php
		if ($i < ($count-1)) echo ",";
	}
	?>
]
