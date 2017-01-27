<?php
	/**
	* Profile Manager
	* 
	* Extended registerpage view
	* 
	* @package profile_manager
	* @author ColdTrick IT Solutions
	* @copyright Coldtrick IT Solutions 2009
	* @link http://www.coldtrick.com/
	*/

	$profile_icon = get_plugin_setting("profile_icon_on_register", "profile_manager");
	$profile_type_selection = get_plugin_setting("profile_type_selection", "profile_manager");
	
	$tabbed = false;
	if(get_plugin_setting("edit_profile_mode", "profile_manager") == "tabbed"){
		$tabbed = true;
	}
		
	// mandatory profile icon
	if($profile_icon == "yes"){
		echo elgg_view("input/profile_icon");
	}

	$categorized_fields = profile_manager_get_categorized_fields(null, true, true);
	$fields = $categorized_fields['fields'];
	$cats = $categorized_fields['categories'];
	
	$bounced_values = $_SESSION["register_post_backup"];
	
	if($profile_type_selection != "admin"){
		$types_options = array(
				"type" => "object",
				"subtype" => CUSTOM_PROFILE_FIELDS_PROFILE_TYPE_SUBTYPE,
				"limit" => 0,
				"owner_guid" => $vars["config"]->site_guid
			);
			
		if($types = elgg_get_entities($types_options)){
			
			$types_options_values = array();
			$types_options_values[""] = elgg_echo("profile_manager:profile:edit:custom_profile_type:default");
			
			foreach($types as $type){
				$types_options_values[$type->guid] = $type->getTitle();
				
				// preparing descriptions of profile types
				$description = $type->getDescription();
				
				if(!empty($description)){
					$types_description .= "<div id='" . $type->guid . "' class='custom_profile_type_description'>";
					$types_description .= $description;
					$types_description .= "</div>";
				}
			}
			
			$selected_profile_type = $bounced_values['custom_profile_fields_custom_profile_type'];
			if(empty($selected_profile_type)){
				$selected_profile_type = get_plugin_setting("default_profile_type", "profile_manager");
			}
			
			$types_result = "<div>";
			$types_result .= "<label>" . elgg_echo("profile_manager:profile:edit:custom_profile_type:label") . "</label><br />";
			$types_result .= elgg_view("input/pulldown", array(
											"internalname" => "custom_profile_fields_custom_profile_type",
											"internalid" => "custom_profile_fields_custom_profile_type",
											"options_values" => $types_options_values,
											"js" => "onchange='changeProfileType();'",
											"value" => $selected_profile_type)
										);
			
			$types_result .= $types_description;
			$types_result .= "</div>";
		}	
	
		echo $types_result;
	}
	
	if(count($fields) > 0){
		
		foreach($cats as $cat_guid => $cat){
			
			$linked_profile_types = array(0);
			if($cat instanceof ProfileManagerCustomFieldCategory){
				$linked_profile_types = $cat->getLinkedProfileTypes();	
			}
			
			$fields_result = "";
			foreach($fields[$cat_guid] as $field){
				$metadata_type = $field->metadata_type;
				if($metadata_type == "longtext"){
					// bug when showing tinymce on register page (when moving) newer versions of tinymce are working correctly
					$metadata_type = "plaintext";
				}
				
				$value = $bounced_values["custom_profile_fields_" . $field->metadata_name];
				
				if(is_array($value)){
					$value = implode(", ", $value);
				}
				$class = "";
				if($field->mandatory == "yes"){
					$class = " class='mandatory'";
				} 
				
				$fields_result .= "<div" . $class . ">";
				
				if(!empty($field->metadata_hint)){ 
				
					
					$fields_result .= "<span class='custom_fields_more_info' id='more_info_" . $field->metadata_name . "'></span>"; 		
					$fields_result .= "<span class='custom_fields_more_info_text' id='text_more_info_" . $field->metadata_name . "'>" . $field->metadata_hint . "</span>";
				} 
				
				$fields_result .= "<label>" . $field->getTitle() . "</label><br />";
				$fields_result .= elgg_view("input/{$metadata_type}", array(
														"internalname" => "custom_profile_fields_" . $field->metadata_name,
														"value" => $value,
														"options" => $field->getOptions()
														)); 
				$fields_result .= "</div>";
			}
			
			$class = "category_" . $cat_guid;
			foreach($linked_profile_types as $type_guid){
				$class .= " profile_type_" . $type_guid;
			}
			$cat_result = "<div class='profile_manager_register_category " . $class . "'>";
				
			if(count($cats) > 1){
				// make nice title
				if($cat_guid == 0){
					$title = elgg_echo("profile_manager:categories:list:default");
				} else {
					$title = $cat->getTitle();
				}
				if($tabbed){
					$tabbed_cat_titles .= "<li class='" . $class . "'><a href='javascript:void(0);' onclick='toggle_tabbed_nav(\"" . $cat_guid . "\", this);'>" . $title . "</a></li>";
				} else {
					$cat_result .= "<h3 class='settings'>" . $title . "</h3>";
				} 
			}
			
			$cat_result .= $fields_result;
			$cat_result .= "</div>";
			
			if($tabbed){
				$tabbed_cat_content .= $cat_result;
			} else {
				echo $cat_result;
			}
		}
		if($tabbed){
			if($tabbed_cat_titles){
				echo "<div id='elgg_horizontal_tabbed_nav'>";
				echo "<ul id='profile_manager_register_tabbed'>";
				echo $tabbed_cat_titles;
				echo "</ul>";
				echo "</div>";
				echo "<div>";
				echo $tabbed_cat_content;
				echo "</div>";
			} else {
				echo $tabbed_cat_content;
			}
		}
	} 	
?>