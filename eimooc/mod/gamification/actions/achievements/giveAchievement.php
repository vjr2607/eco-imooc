<?php
	function giveAchievement($user_guid, $achievement_id){
		
		//Obtenemos el objeto del logro
		$achievements = elgg_get_entities_from_metadata(array('type' => 'object', 'subtype' => 'gamification_achievement', 'metadata_name' => 'achievement_id', 'metadata_value' => $achievement_id));
		//Comprobamos que realmente exista un logro con dicho id
		if ($achievements){
			$achievement_guid = $achievements[0]->getGUID();
			//Comprobamos si ya le ha sido concedido ese logro al usuario
			if (!check_entity_relationship($user_guid, 'achieved', $achievement_guid)){
				//En caso de que no lo tuviera, se lo concedemos
				add_entity_relationship ($user_guid, 'achieved', $achievement_guid);
				if (isset($achievements[0]->points))
					get_entity($user_guid)->points += $achievements[0]->points;

				//Añadimos dicho hecho al river
				add_to_river('river/gamification_achievement/achieved', 'achieved', $user_guid, $achievement_guid);
				$message = elgg_view("achievements/message", array("achievement" => $achievements[0]));
				notify_user($user_guid, $user_guid, "Conseguiste um novo objetivo!", $message, array("class"=>"achievement-message"));
				
				//Comprobamos si ya ha conseguido todos para darle el logro "terminator" y el logro "bootcamp"
				$achievements = elgg_get_entities_from_metadata(array('type' => 'object', 'subtype' => 'gamification_achievement', 'limit' => 0,
																				'order_by_metadata' => array('name'=>'order', 'direction'=>'ASC')));	
				$achievements_completed = 0;
				$achievements_bootcamp = 0;
				foreach ($achievements as $gamification_achievement){					
					//Comprobamos si el usuario ha conseguido el logro
					if (check_entity_relationship($user_guid, 'achieved', $gamification_achievement->guid) != false)
					{
						$achievements_completed++;
						if ($gamification_achievement->achievement_id == "profile-update")
							$achievements_bootcamp++;
						if ($gamification_achievement->achievement_id == "imageprofile-update")
							$achievements_bootcamp++;
						if ($gamification_achievement->achievement_id == "first-blog")
							$achievements_bootcamp++;
					}
				}
				
				if ($achievements_bootcamp == 3)
					giveAchievement($user_guid, 'bootcamp');
				
				//***** IMPORTANTE CAMBIAR EL NUMERO TOTAL DE LOGROS *****//
				//$totalAchievements = elgg_get_entities(array('type' => 'object', 'subtype' => 'gamification_achievement', 'count' => true));
				//if ($achievements_completed == $totalAchievements)
				if ($achievements_completed == 12)
				{
					giveAchievement($user_guid, 'terminator');
				}
			}
		}
	}
