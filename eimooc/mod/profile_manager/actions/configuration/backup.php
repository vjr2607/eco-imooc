<?php 
	/**
	* Profile Manager
	* 
	* Backup of profile fields config
	* 
	* @package profile_manager
	* @author ColdTrick IT Solutions
	* @copyright Coldtrick IT Solutions 2009
	* @link http://www.coldtrick.com/
	*/

	global $CONFIG;

	admin_gatekeeper();

	// We'll be outputting a txt
	header("Content-Type: text/plain");
		
	// It will be called custom_profile_fields.backup.json.txt
	header('Content-Disposition: attachment; filename="custom_profile_fields.backup.json.txt"');
	
	$fieldtype = get_input("fieldtype" , CUSTOM_PROFILE_FIELDS_PROFILE_SUBTYPE);
	
	$options = array(
			"type" => "object",
			"subtype" => $fieldtype,
			"count" => true,
			"owner_guid" => $CONFIG->site_guid
		);
	
	$entities_count = elgg_get_entities($options);
	
	$options["count"] = false;
	$options["limit"] = $entities_count;
	
	$entities = elgg_get_entities($options);

	$manifest = load_plugin_manifest("profile_manager");
	
	$info = array(
			"plugin_version" => $manifest["version"],	
			"fieldtype" => $fieldtype
		);
	
	$fields = array();
	foreach($entities as $entity){
		$fields[] = array(
			"metadata_name" => $entity->metadata_name,
			"metadata_label" => $entity->metadata_label,
			"metadata_hint" => $entity->metadata_hint,
			"metadata_type" => $entity->metadata_type,
			"metadata_options" => $entity->metadata_options,
			"show_on_register" => $entity->show_on_register,
			"mandatory" => $entity->mandatory,
			"user_editable" => $entity->user_editable,
			"output_as_tags" => $entity->output_as_tags,
			"admin_only" => $entity->admin_only,
			"order" => $entity->order
		);
	}
		
	$md5 = md5(print_r($fields, true));
	$info["md5"] = $md5;
	
	$json = json_encode(array(
					"info" => $info,
					"fields" => $fields
					));
	
	echo $json;
	
	exit();
?>