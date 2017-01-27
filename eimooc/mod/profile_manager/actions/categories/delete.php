<?php 
	/**
	* Profile Manager
	* 
	* Category delete action
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
		
		if($entity instanceof ProfileManagerCustomFieldCategory){
			$options = array(
				"type" => "object",
				"subtype" => CUSTOM_PROFILE_FIELDS_PROFILE_SUBTYPE,
				"count" => true,
				"owner_guid" => $CONFIG->site_guid,
				"metadata_name_value_pairs" => array("name" => "category_guid", "value" => $guid)
			);
			
			$fields_count = elgg_get_entities_from_metadata($options);
			// remove reference to this category on related profile fields 
			if($fields_count > 0){
				$options["count"] = false;
				$options["limit"] = $fields_count;
				
				$fields = elgg_get_entities_from_metadata($options);
				
				foreach($fields as $field){
					unset($field->category_guid);
				}
			}
			
			if($entity->delete()){
				system_message(elgg_echo("profile_manager:action:category:delete:succes"));
			} else {
				register_error(elgg_echo("profile_manager:action:category:delete:error:delete"));
			}
		} else {
			register_error(elgg_echo("profile_manager:action:category:delete:error:type"));
		}
	} else {
		register_error(elgg_echo("profile_manager:action:category:delete:error:guid"));
	}
	
	forward($_SERVER["HTTP_REFERER"]);
?>