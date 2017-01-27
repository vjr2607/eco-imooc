<?php
	/**
	* Profile Manager
	* 
	* Admin settings
	* 
	* @package profile_manager
	* @author ColdTrick IT Solutions
	* @copyright Coldtrick IT Solutions 2009
	* @link http://www.coldtrick.com/
	*/

	global $CONFIG;

	$yesno_options = array(
		"yes" => elgg_echo("option:yes"),
		"no" => elgg_echo("option:no")
	);
	
	$extra_fields_options = array(
		"extend" => elgg_echo("profile_manager:admin:registration:extra_fields:extend"),
		"beside" => elgg_echo("profile_manager:admin:registration:extra_fields:beside")
	);

	$plugins = get_plugin_list();
	// check plugin order
	if(array_search("profile", $plugins) > array_search("profile_manager", $plugins)){
		?>
		<h3 class='settings'><?php echo elgg_echo('profile_manager:admin:warning:profile');?></h3>
		<?php 
	}
	
	$profile_types = array();
	
	$profile_types_options = array(
		"type" => "object",
		"subtype" => CUSTOM_PROFILE_FIELDS_PROFILE_TYPE_SUBTYPE,
		"owner_guid" => $CONFIG->site_guid,
		"limit" => false
	); 

	$profile_type_entities = elgg_get_entities($profile_types_options);
	
	if(!empty($profile_type_entities)){
		$profile_types[""] = elgg_echo("profile_manager:profile:edit:custom_profile_type:default");
		foreach($profile_type_entities as $type){		
			$profile_types[$type->guid] = $type->getTitle();
		}
	}
?>

<table>
	<tr>
		<td colspan="2">
			<h3 class="settings"><?php echo elgg_echo("profile_manager:settings:registration"); ?></h3>
		</td>
	</tr>
	<tr>
		<td>
			<?php echo elgg_echo('profile_manager:admin:profile_icon_on_register'); ?>
		</td>
		<td>
			<?php echo elgg_view("input/pulldown", array("internalname" => "params[profile_icon_on_register]", "options_values" => array_reverse($yesno_options), "value" => $vars['entity']->profile_icon_on_register)); ?>
		</td>
	</tr>
	<tr>
		<td colspan="2">
			<?php echo elgg_echo('profile_manager:admin:registration:terms'); ?>
		</td>
	</tr>
	<tr>
		<td colspan="2">
			<?php echo elgg_view("input/text", array("internalname" => "params[registration_terms]", "value" => $vars['entity']->registration_terms)); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php echo elgg_echo('profile_manager:admin:registration:login_by_email'); ?>
		</td>
		<td>
			<?php echo elgg_view("input/pulldown", array("internalname" => "params[login_by_email]", "options_values" => array_reverse($yesno_options), "value" => $vars['entity']->login_by_email)); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php echo elgg_echo('profile_manager:admin:registration:extra_fields'); ?>
		</td>
		<td>
			<?php echo elgg_view("input/pulldown", array("internalname" => "params[registration_extra_fields]", "options_values" => $extra_fields_options, "value" => $vars['entity']->registration_extra_fields)); ?>
		</td>
	</tr>
	<?php if(!empty($profile_types)){?>
	<tr>
		<td>
			<?php echo elgg_echo('profile_manager:admin:default_profile_type'); ?>
		</td>
		<td>
			<?php echo elgg_view("input/pulldown", array("internalname" => "params[default_profile_type]", "options_values" => $profile_types, "value" => $vars['entity']->default_profile_type)); ?>
		</td>
	</tr>
	<?php } ?>
	<tr>
		<td colspan="2">
			<?php echo elgg_echo('profile_manager:admin:registration:free_text'); ?>
		</td>
	</tr>
	<tr>
		<td colspan="2">
			<?php echo elgg_view("input/longtext", array("internalname" => "params[registration_free_text]", "value" => $vars['entity']->registration_free_text)); ?>
		</td>
	</tr>
	<tr>
		<td colspan="2">
			<h3 class="settings"><?php echo elgg_echo("profile_manager:settings:edit_profile"); ?></h3>
		</td>
	</tr>
	<tr>
		<td>
			<?php echo elgg_echo('profile_manager:admin:simple_access_control'); ?>
		</td>
		<td>
			<?php echo elgg_view("input/pulldown", array("internalname" => "params[simple_access_control]", "options_values" => array_reverse($yesno_options), "value" => $vars['entity']->simple_access_control)); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php echo elgg_echo('profile_manager:admin:hide_non_editables'); ?>
		</td>
		<td>
			<?php echo elgg_view("input/pulldown", array("internalname" => "params[hide_non_editables]", "options_values" => array_reverse($yesno_options), "value" => $vars['entity']->hide_non_editables)); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php echo elgg_echo('profile_manager:admin:edit_profile_mode'); ?>
		</td>
		<td>
			<?php
				$edit_profile_mode_options = array("list" => elgg_echo('profile_manager:admin:edit_profile_mode:list'), "tabbed" => elgg_echo('profile_manager:admin:edit_profile_mode:tabbed')); 
				echo elgg_view("input/pulldown", array("internalname" => "params[edit_profile_mode]", "options_values" => $edit_profile_mode_options, "value" => $vars['entity']->edit_profile_mode)); 
			?>		
		</td>
	</tr>
	<tr>
		<td>
			<?php echo elgg_echo('profile_manager:admin:profile_type_selection'); ?>
		</td>
		<td>
			<?php 
				$profile_type_selection_options = array("user" => elgg_echo('profile_manager:admin:profile_type_selection:option:user'), "admin" => elgg_echo('profile_manager:admin:profile_type_selection:option:admin')); 
				echo elgg_view("input/pulldown", array("internalname" => "params[profile_type_selection]", "options_values" => $profile_type_selection_options, "value" => $vars['entity']->profile_type_selection));
			?>
		</td>
	</tr>
	<tr>
		<td colspan="2">
			<h3 class="settings"><?php echo elgg_echo("profile_manager:settings:view_profile"); ?></h3>
		</td>
	</tr>
	<tr>
		<td>
			<?php echo elgg_echo('profile_manager:admin:show_full_profile_link'); ?>
		</td>
		<td>
			<?php echo elgg_view("input/pulldown", array("internalname" => "params[show_full_profile_link]", "options_values" => array_reverse($yesno_options), "value" => $vars['entity']->show_full_profile_link)); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php echo elgg_echo('profile_manager:admin:show_profile_type_on_profile'); ?>
		</td>
		<td>
			<?php echo elgg_view("input/pulldown", array("internalname" => "params[show_profile_type_on_profile]", "options_values" => $yesno_options, "value" => $vars['entity']->show_profile_type_on_profile)); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php echo elgg_echo('profile_manager:admin:display_categories'); ?>
		</td>
		<td>
			<?php
				$display_categories_options = array("plain" => elgg_echo('profile_manager:admin:display_categories:option:plain'), "accordion" => elgg_echo('profile_manager:admin:display_categories:option:accordion')); 
				echo elgg_view("input/pulldown", array("internalname" => "params[display_categories]", "options_values" => $display_categories_options, "value" => $vars['entity']->display_categories)); 
			?>
		</td>
	</tr>
	<tr>
		<td>
			<?php echo elgg_echo('profile_manager:admin:display_system_category'); ?>
		</td>
		<td>
			<?php echo elgg_view("input/pulldown", array("internalname" => "params[display_system_category]", "options_values" => array_reverse($yesno_options), "value" => $vars['entity']->display_system_category)); ?>
		</td>
	</tr>
	<tr>
		<td colspan="2">
			<h3 class="settings"><?php echo elgg_echo("profile_manager:settings:other"); ?></h3>
		</td>
	</tr>
	<tr>
		<td>
			<?php echo elgg_echo('profile_manager:admin:show_members_search'); ?>
		</td>
		<td>
			<?php echo elgg_view("input/pulldown", array("internalname" => "params[show_members_search]", "options_values" => array_reverse($yesno_options), "value" => $vars['entity']->show_members_search)); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php echo elgg_echo('profile_manager:admin:enable_profile_completeness_widget'); ?>
		</td>
		<td>
			<?php echo elgg_view("input/pulldown", array("internalname" => "params[enable_profile_completeness_widget]", "options_values" => array_reverse($yesno_options), "value" => $vars['entity']->enable_profile_completeness_widget)); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php echo elgg_echo('profile_manager:admin:show_admin_stats'); ?>
		</td>
		<td>
			<?php echo elgg_view("input/pulldown", array("internalname" => "params[show_admin_stats]", "options_values" => array_reverse($yesno_options), "value" => $vars['entity']->show_admin_stats)); ?>
		</td>
	</tr>
</table>