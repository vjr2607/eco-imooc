<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>No 1</title>
	</head>
	<body>
<?php
	// make sure only logged in users can see this page 
	//set_context('admin');
	elgg_set_context('admin');
	admin_gatekeeper();
	
	$users = elgg_get_entities(array('type' => 'user', "limit" => 0));
	echo "nombre,username,nombre_completo,dni,email,preguntas,respuestas,blogs,tweets,videos,likes,mensajes,comentarios,seguidores,siguiendo,logins,total_interacciones,tareas,logros,puntos,compras,corregidas";
	
	foreach ($users as $user){
		$questions = elgg_get_entities(array("count" => true, "type" => "object", "subtype" => "question", "owner_guid" => $user->guid, "limit" => 0));
		$tweets = elgg_get_entities(array("count" => true, "type" => "object", "subtype" => "thewire", "owner_guid" => $user->guid, "limit" => 0));
		$videos = elgg_get_entities(array("count" => true, "type" => "object", "subtype" => "videolist_item", "owner_guid" => $user->guid, "limit" => 0));
		$answers = elgg_get_entities(array("count" => true, "type" => "object", "subtype" => "answer", "owner_guid" => $user->guid, "limit" => 0));
		$blogs = elgg_get_entities(array("count" => true, "type" => "object", "subtype" => "blog", "owner_guid" => $user->guid, "limit" => 0));
		$n_likes = elgg_get_annotations(array('count' => true, 'annotation_names' => array('likes'), 'annotation_owner_guids' => array($user->guid), "limit" => 0)); 
		$comments = elgg_get_annotations(array('count' => true, 'annotation_names' => array('comment'), 'annotation_owner_guids' => array($user->guid), "limit" => 0)); 
		$g_comments = elgg_get_annotations(array('count' => true, 'annotation_names' => array('generic_comment'), 'annotation_owner_guids' => array($user->guid), "limit" => 0)); 
		$messages = elgg_get_entities(array("count" => true, "type" => "object", "subtype" => "messages", "owner_guid" => $user->guid, "limit" => 0));
		$total_inter = get_system_log($user->guid, "", "", "","", 0, 0, true, 0, 0,0, false);
		
		$friends_made = count($user->getFriends("", 0));
		$friends_received = count($user->getFriendsOf("", 0));
		$logs = get_system_log($user->guid, "login", "", "","", 0, 0, true, 0, 0,0, false);
		$user_tasks = elgg_get_entities(array('type' => 'object', 'subtype' => 'user_task', "owner_guid" => $user->guid, "limit" => 0));
		$tasks = count($user_tasks);
		
		$corrected_tasks = 0;
		foreach ($user_tasks as $user_task){
			if ($user_task->corrected)
				$corrected_tasks++;
		}
		
		if (isset($user->points))
			$points = $user->points;
		else
			$points = 0;
		$achievements = elgg_get_entities_from_metadata(array('type' => 'object', 'subtype' => 'gamification_achievement', 'limit' => 0,
																			'order_by_metadata' => array('name'=>'order', 'direction'=>'ASC')));
		$achievements_completed = 0;
		foreach ($achievements as $gamification_achievement){
			//Comprobamos si el usuario ha conseguido el logro
			if (check_entity_relationship($user->guid, 'achieved', $gamification_achievement->guid) != false)
				$achievements_completed++;
		}
		
		$storeItems = elgg_get_entities_from_metadata(array('type' => 'object', 'subtype' => 'store_item', 'limit' => 0));
		$itemsPurchased = 0;
		 foreach ($storeItems as $store_item){
			if (check_entity_relationship($user->guid, 'purchased', $store_item->guid) != false){
				if ($store_item->rebuy){
					$purchases = $store_item->getAnnotations(''.$user->guid);
					$itemsPurchased += $purchases[0]->value;
				}
				else{
					$itemsPurchased++;
				}
			}
		 }
		 
		
	?>
	<br/>
	
		<?php echo $user->name; ?>,<?php echo $user->username; ?>,<?php echo $user->fullname; ?>,<?php echo $user->dni; ?>,<?php echo $user->email; ?>,<?php echo $questions; ?>,<?php echo $answers; ?>,<?php echo $blogs; ?>,<?php echo $tweets; ?>,<?php echo $videos; ?>,<?php echo $n_likes; ?>,<?php echo $messages; ?>,<?php echo ($comments + $g_comments); ?>,<?php echo $friends_received; ?>,<?php echo $friends_made; ?>,<?php echo $logs; ?>,<?php echo $total_inter; ?>,<?php echo $tasks; ?>,<?php echo $achievements_completed; ?>,<?php  echo $points; ?>,<?php echo $itemsPurchased; ?>,<?php echo $corrected_tasks; ?>
	<?php
	}
	
	 /*
	<br/>
		name: "<?php echo $user->name; ?>",<br/>
		user: "<?php echo $user->username; ?>",<br/>
		email: "<?php echo $user->email; ?>",<br/>
		preguntas: <?php echo $questions; ?><br/>
		respuestas: <?php echo $answers; ?><br/>
		blogs: <?php echo $blogs; ?><br/>
		tweets: <?php echo $tweets; ?><br/>
		videos: <?php echo $videos; ?><br/>
		likes: <?php echo $n_likes; ?><br/>
		mensajes: <?php echo $messages; ?><br/>
		comentarios: <?php echo ($comments + $g_comments); ?><br/>
		seguidores: <?php echo $friends_received; ?><br/>
		siguiendo: <?php echo $friends_made; ?><br/>
		inters:</br>
		<?php 
			foreach ($interactions as $interaction){
			?>
				inter-name: <?php echo $interaction->getSubtype(); ?><br/>
			
			<?php
			}
	}	
	?>
	*/
	?>
	</body>
	</html>