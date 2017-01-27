<?php
	
	//elgg_register_action("register", elgg_get_plugins_path() . "gamification/actions/register.php");
	
	elgg_register_action("gamification/tasks/add", elgg_get_plugins_path() . "gamification/actions/tasks/add.php");
	elgg_register_action("gamification/tasks/publish", elgg_get_plugins_path() . "gamification/actions/tasks/publish.php");
	elgg_register_action("gamification/tasks/delete", elgg_get_plugins_path() . "gamification/actions/tasks/delete.php");
	elgg_register_action("gamification/tasks/solve", elgg_get_plugins_path() . "gamification/actions/tasks/solve.php");
	elgg_register_action("gamification/tasks/post_correction", elgg_get_plugins_path() . "gamification/actions/tasks/post_correction.php");
	elgg_register_action("gamification/tasks/admin_correction", elgg_get_plugins_path() . "gamification/actions/tasks/admin_correction.php");
	elgg_register_action("gamification/tasks/request_correction", elgg_get_plugins_path() . "gamification/actions/tasks/request_correction.php");
	elgg_register_action("gamification/tasks/deassign_correction", elgg_get_plugins_path() . "gamification/actions/tasks/deassign_correction.php");
	elgg_register_action("gamification/tasks/post_comment", elgg_get_plugins_path() . "gamification/actions/tasks/post_comment.php");
	elgg_register_action("gamification/tasks/delete_user", elgg_get_plugins_path() . "gamification/actions/tasks/delete_user.php");
	elgg_register_action("gamification/tasks/ask_teacher", elgg_get_plugins_path() . "gamification/actions/tasks/ask_teacher.php");
	elgg_register_action("gamification/achievements/add", elgg_get_plugins_path() . "gamification/actions/achievements/add.php");
	elgg_register_action("gamification/achievements/give", elgg_get_plugins_path() . "gamification/actions/achievements/give.php");
	elgg_register_action("gamification/store/purchase", elgg_get_plugins_path() . "gamification/actions/store/purchase.php");
	elgg_register_action("gamification/store/configure_river", elgg_get_plugins_path() . "gamification/actions/store/configure_river.php");
	elgg_register_action("gamification/store/image_profile", elgg_get_plugins_path() . "gamification/actions/store/image_profile.php");
	
	elgg_register_event_handler('create','all','createHandler');
	elgg_register_event_handler('profileiconupdate','user','profileIconHandler');
	elgg_register_event_handler('profileupdate','user','profileHandler');
	
	elgg_register_page_handler('gamification', 'gamification_page_handler');
	$item = new ElggMenuItem('gamification', "Gamification", 'gamification');
	elgg_register_menu_item('site', $item);
	
	elgg_register_plugin_hook_handler('container_permissions_check', 'all', 'myaccess_permissions_check');
	elgg_register_plugin_hook_handler('gamification:corrected','task', 'taskCorrected_handler');
	elgg_register_plugin_hook_handler('gamification:purchased','store_item', 'itemPurchased_handler');
	
	// Extend system CSS with our own styles
	elgg_extend_view('css/elgg','gamification/css');
	
	include elgg_get_plugins_path() . "gamification/actions/achievements/giveAchievement.php";
	
	function createHandler($event, $object_type, $object){
		
		if ($object_type == 'friend'){
			
			$friends_made = count(get_entity($object["guid_one"])->getFriends("", 50));
			$friends_received = count(get_entity($object["guid_two"])->getFriendsOf("", 50));
			
			if ($friends_made >= 25){
				giveAchievement($object["guid_one"], 'friends-made');
			}
			
			if ($friends_received >= 25){
				giveAchievement($object["guid_two"], 'friends-received');
			}
			
		}

		if ($object_type == 'object'){
			
			$subtype = $object->getSubtype();
			
			/*if ($subtype == "answer"){
				$answers =  elgg_get_entities_from_metadata(array("count" => true, 'type' => 'object', 'subtype' => 'answer', 'owner_guid' => $object->owner_guid, 'limit' => 0));
				if ($answers >= 10){
					giveAchievement($object->owner_guid, 'answers-done');
				}
			}
			else*/
			if ($subtype == "thewire"){
				$tweets = elgg_get_entities(array("count" => true, "type" => "object", "subtype" => "thewire", "owner_guid" =>$object->owner_guid, "limit" => 0));
				if ($tweets > 50){
					giveAchievement($object->owner_guid, 'tweets-done');
				}
			}
			else if ($subtype == "blog"){
				$blogs = elgg_get_entities(array('count' => true, 'type' => 'object', 'subtype' => 'blog', 'owner_guid' => $object->owner_guid, 'limit' => 0));
				if ($blogs >= 1)
					giveAchievement($object->owner_guid, 'first-blog');
				if ($blogs >= 15)
					giveAchievement($object->owner_guid, 'commentator');
			}
			else if ($subtype == "bookmarks"){
				$bookmarks = elgg_get_entities(array('count' => true, 'type' => 'object', 'subtype' => 'bookmarks', 'owner_guid' => $object->owner_guid, 'limit' => 0));
				if ($bookmarks >= 15)
					giveAchievement($object->owner_guid, 'collaborator');
			}
			/*else if ($subtype == "question"){
				$questions = elgg_get_entities(array('count' => true, 'type' => 'object', 'subtype' => 'question', 'owner_guid' => $object->owner_guid, 'limit' => 0));
				if ($questions >= 3)
					giveAchievement($object->owner_guid, 'questions-done');
			}
			else if ($subtype == "user_task"){
				//Comprobamos logros relativos a tareas realizadas
				$family = $object->family;
				
				//Obtenemos el número de tareas que hay para esa familia
				$familyTotal = elgg_get_entities_from_metadata(array('type' => 'object', 
									'subtype' => 'gamification_task',
									'count' => true, 'limit' => 0,
									metadata_name_value_pairs => array('name' => 'family', 'value' =>	$family, 'operand' => '=', 'case_sensitive' => false)
									));
				
				//Comprobamos si el usuario ha realizado todas las tareas de una familia
				$familyCount = elgg_get_entities_from_metadata(array('type' => 'object', 'subtype' => 'user_task', 
										'owner_guids' => array($object->owner_guid), 'count' => true, 'limit' => 0,
										metadata_name_value_pairs => array('name' => 'family', 'value' => $family, 'operand' => '=', 'case_sensitive' => false)	
										));
										
				if ($familyCount >= $familyTotal){
					$achiever = $object->owner_guid;
					//El usuario ha hecho todas las tareas de esa familia, concedemos logro
					giveAchievement($achiever, $family . '-done');
				}
				
				return true;
			}*/
			return true;
		}
		else if ($object_type == 'annotation'){
			if ($object->name == 'likes'){
				//Si era un like, comprobamos el número de likes que ha obtenido ese elemento
				$objectLiked = $object->getEntity();
				$n_likes = count($objectLiked->getAnnotations('likes'));
				if ($n_likes >= 25){
					//El usuario ha recibido más de n-likes en un elemento, se le da el logro
					$achiever = $objectLiked->owner_guid;
					giveAchievement($achiever, 'likes-received');
				}
				
				/*//Por otra parte, comprobamos el número de likes que ha realizado el usuario
				$n_likes = elgg_get_annotations(array('count' => true, 'annotation_names' => array('likes'), 'annotation_owner_guids' => array($object->owner_guid), "limit" => 0)); 
				if ($n_likes >= 25){
					//El usuario ha realizado más de n-likes, se le da el logro
					$achiever = $object->owner_guid;
					giveAchievement($achiever, 'likes-done');
				}
				if ($n_likes >= 50){
					//El usuario ha realizado más de n-likes, se le da el logro
					$achiever = $object->owner_guid;
					giveAchievement($achiever, 'likes2-done');
				}*/
				
			}
			else if (($object->name == 'comment') || ($object->name == 'generic_comment')){
				//Si era un comentario, comprobamos el número de comentarios que ha obtenido ese elemento
				$objectCommented = $object->getEntity();
				$n_comments = count($objectCommented->getAnnotations('comment'));
				$n_comments += count($objectCommented->getAnnotations('generic_comment'));
				if ($n_comments >= 5){
					//El usuario ha recibido más de n comentarios en un elemento, se le da el logro
					$achiever = $objectCommented->owner_guid;
					giveAchievement($achiever, 'comments-received');
				}
				
				//Por otra parte, comprobamos el número de comentarios que ha realizado el usuario
				$comments = elgg_get_annotations(array('count' => true, 'annotation_names' => array('comment'), 'annotation_owner_guids' => array($object->owner_guid), "limit" => 0)); 
				$g_comments = elgg_get_annotations(array('count' => true, 'annotation_names' => array('generic_comment'), 'annotation_owner_guids' => array($object->owner_guid), "limit" => 0)); 
				$n_comments = $comments + $g_comments;
				
				if ($n_comments >= 25){
					//El usuario ha realizado más de n comentarios, se le da el logro
					$achiever = $object->owner_guid;
					giveAchievement($achiever, 'comments-done');
				}
			}
		}

		return true;
	}
	
	//Handler para cuando una tarea es corregida
	function taskCorrected_handler($hook, $type, $value, $params){
		$user_corrected = $params['task_correcting']->owner_guid;
		$user_corrector = $params['task_corrector']->owner_guid;
		$family = $params['task_correcting']->family;
		$parent_task = get_entity($params['task_corrector']->container_guid);
		
		//Obtenemos el número de tareas que hay para esa familia
		$familyTotal = elgg_get_entities_from_metadata(array('type' => 'object', 
								'subtype' => 'gamification_task',
								'count' => true, 
								metadata_name_value_pairs => array('name' => 'family', 'value' =>	$family, 'operand' => '=', 'case_sensitive' => false)
								));
		
		//Obtenemos todas las tareas del usuario para ver cuántas ha corregido
		$user_tasks = elgg_get_entities(array('type' => 'object', 'subtype' => 'user_task', "owner_guid" => $user_corrector, "limit" => 0));
		$totalCorrected = 0;
		foreach ($user_tasks as $user_task){
			if ($user_task->corrected)
				$totalCorrected++;
		}
		if ($totalCorrected >= 7){
			//Logro por el total de tareas corregidas
			$achiever = $user_corrector;
			giveAchievement($achiever, 'general-correction');
		}
		
		//Comprobamos si el usuario corrector ha corregido todas las tareas de esa familia
		$user_tasks = elgg_get_entities(array('type' => 'object', 'subtype' => 'user_task', "owner_guid" => $user_corrector, "limit" => 0,
								metadata_name_value_pairs => array(	array('name' => 'family', 'value' => $family, 'operand' => '=', 'case_sensitive' => false))
								));
								
		$familyCorrected = 0;
		foreach ($user_tasks as $user_task){
			if ($user_task->corrected)
				$familyCorrected++;
		}
		
		if ($familyCorrected >= $familyTotal){
			//Se han corregido todas las tareas de esa familia, concedemos logro
			$achiever = $user_corrector;
			giveAchievement($achiever, $family . '-correction');
		}
		
		if ($params['task_correcting']->correction == true){
			//Solo tiene sentido realizar la comprobación en el caso de que esta tarea sea correcta
			//Comprobamos si el usuario corregido tiene todas las tareas de esa familia bien
			$familyCount = elgg_get_entities_from_metadata(array('type' => 'object', 'subtype' => 'user_task', 
									'owner_guids' => array($user_corrected),	'count' => true, 
									metadata_name_value_pairs => array(
										array('name' => 'family', 'value' => $family, 'operand' => '=', 'case_sensitive' => false),
										array('name' => 'correction', 'value' => true, 'operand' => '=', 'case_sensitive' => false)
									)));
			
			if ($familyCount >= $familyTotal){
				//Si ha realizado correctamente todas las tareas, le concedemos el logro asociado a esa familia
				$achiever = $user_corrected;
				giveAchievement($achiever, $family . '-corrected');
			}
		}
		
	}
	
	function itemPurchased_handler($hook, $type, $value, $params){
		$user = $params['user_purchasing'];
		
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
		if ($itemsPurchased >= 3){
			giveAchievement($user->guid, 'buys-done');
		}
	}
	
	//Handler para cuando se sube una nueva imagen de perfil
	function profileIconHandler($event, $object_type, $object){
		giveAchievement($object->getGUID(), 'imageprofile-update');
	}
	
	//Handler para cuando se actualiza el perfil
	function profileHandler($event, $object_type, $object){
		giveAchievement($object->getGUID(), 'profile-update');
	}
	
	function gamification_page_handler($page) {
		
		$gamification_landing_page = 'start';
		
		if (!isset($page[0])) {
			$page[0] = $gamification_landing_page;
		}
		
		 switch ($page[0]) {
			case 'leaderboard':
				if (!isset($page[1])) $page[1] = 'points';
			   switch ($page[1]) {
					case 'tweets':
						include elgg_get_plugins_path() . 'gamification/pages/leaderboard/tweets.php';
					   break;
					   
					case 'comments':
						include elgg_get_plugins_path() . 'gamification/pages/leaderboard/comments.php';
					   break;
					   
					case 'friends':
						include elgg_get_plugins_path() . 'gamification/pages/leaderboard/friends.php';
					   break;
					   
					case 'points':
					default:
						include elgg_get_plugins_path() . 'gamification/pages/leaderboard/points.php';
					   break;
				}
			   return true;
			
			case 'store':
				if (isset($page[1]) && ($page[1] == "configure_river"))
					include elgg_get_plugins_path() . 'gamification/pages/store/configure_river.php';
				else
					include elgg_get_plugins_path() . 'gamification/pages/store/store.php';
			    return true;
			
			case 'start':
				include elgg_get_plugins_path() . 'gamification/pages/startpage.php';
				return true;
			
			case 'achievements':
				if (!isset($page[1])) $page[1] = 'all';
				switch ($page[1]) {
					case 'give':
						include elgg_get_plugins_path() . 'gamification/pages/achievements/give.php';
					   break;
					
					case 'remove':
						include elgg_get_plugins_path() . 'gamification/pages/achievements/remove.php';
					   break;
					
					case 'add':
					   include elgg_get_plugins_path() . 'gamification/pages/achievements/add.php';
					   break;
					   
					case 'stats':
						include elgg_get_plugins_path() . 'gamification/pages/achievements/stats.php';
						break;
		
					case 'all':
					default:
					   include elgg_get_plugins_path() . 'gamification/pages/achievements/list.php';
					   break;
					   
			   }
			   return true;
			   
			  case 'tasks':
				if (isset($page[1])){
					if (($page[1] == 'view') && isset($page[2])){
						$task_guid = $page[2];
						if (isset($page[3])) $view_target = $page[3];
						if (elgg_is_admin_logged_in())
							include elgg_get_plugins_path() . 'gamification/pages/tasks/admin_view.php';
						else
							include elgg_get_plugins_path() . 'gamification/pages/tasks/view.php';
						return true;
					}
					else if($page[1] == 'add'){
						include elgg_get_plugins_path() . 'gamification/pages/tasks/add.php';
						return true;
					}
					else if($page[1] == 'admin'){
						$vars['page'] = $page[2];
						include elgg_get_plugins_path() . 'gamification/pages/tasks/admin_list.php';
						return true;
					}
				}
				
				$vars = array();
				$vars['page'] = $page[1];
				require_once elgg_get_plugins_path() . 'gamification/pages/tasks/list.php';
				
				return true;
			  
		}
		return false;
	}
	
	function myaccess_permissions_check($hook_name, $entity_type, $return_value, $parameters) {	
		return true;
	} 
?>
