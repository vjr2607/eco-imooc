<?php 
	/**
	* Profile Manager
	* 
	* Profile Type Delete action
	* 
	* @package profile_manager
	* @author ColdTrick IT Solutions
	* @copyright Coldtrick IT Solutions 2009
	* @link http://www.coldtrick.com/
	*/

	admin_gatekeeper();
	
	$guid = get_input("guid");
	
	if(!empty($guid)){
		$entity = get_entity($guid);
		
		if($entity->getSubtype() == CUSTOM_PROFILE_FIELDS_PROFILE_TYPE_SUBTYPE){	
			if($entity->delete()){
				$meta_name = "custom_profile_type";
				// remove corresponding profile type metadata from userobjects
				
				$options = array(
						"type" => "user",
						"count" => true,
						"metadata_name_value_pairs" => array("name" => $meta_name, "value" => $guid)
					);
				
				$entities_count = elgg_get_entities_from_metadata($options);
				if($entities_count > 0){
					
					$options["count"] = false; 
					$options["limit"] = $entities_count;  
					
	  				$entities = elgg_get_entities_from_metadata($options);
					
	  				foreach($entities as $entity){
	  					// unset currently deleted profile type for user
	  					unset($entity->$meta_name);
	  				}
				}
				
				system_message(elgg_echo("profile_manager:action:profile_types:delete:succes"));
			} else {
				register_error(elgg_echo("profile_manager:action:profile_types:delete:error:delete"));
			}
		} else {
			register_error(elgg_echo("profile_manager:action:profile_types:delete:error:type"));
		}
	} else {
		register_error(elgg_echo("profile_manager:action:profile_types:delete:error:guid"));
	}
	
	forward($_SERVER["HTTP_REFERER"]);
?>