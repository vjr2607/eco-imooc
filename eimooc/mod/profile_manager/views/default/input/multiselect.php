<?php
	/**
	* Profile Manager
	* 
	* Multiselect
	* 
	* @package profile_manager
	* @author ColdTrick IT Solutions
	* @copyright Coldtrick IT Solutions 2009
	* @link http://www.coldtrick.com/
	*/
 
	global $multiselect;

	$selected_items = explode(", ", strtolower($vars['value']));
	
    // only include js once
    if (empty($multiselect)) {
		?>
			<link rel="stylesheet" type="text/css" href="<?php echo $vars['url'];?>mod/profile_manager/vendors/dropdown-check-list.0.5/ui.dropdownchecklist.css" />
			
			<script type="text/javascript" src="<?php echo $vars['url'];?>mod/profile_manager/vendors/dropdown-check-list.0.5/ui.core.js"></script>
			<script type="text/javascript" src="<?php echo $vars['url'];?>mod/profile_manager/vendors/dropdown-check-list.0.5/ui.dropdownchecklist.js"></script>
		<?php 
		$multiselect = 1;
    } else {
    	$multiselect++;
    }
    
    $internal_id = str_replace("]", "_", str_replace("[" , "_" ,$vars['internalname'])) . $multiselect;
	
?>
<script type="text/javascript">
	$(document).ready(function() {
    	$("#<?php echo $internal_id;?>").dropdownchecklist({ width: 200});
    });
</script>
<p style="display:inline;">
	<select id="<?php echo $internal_id;?>" name="<?php echo $vars['internalname'];?>[]" multiple="multiple" style="display:none">
	<?php	
		if(!empty($vars["options_values"])){
			foreach($vars['options_values'] as $value => $option) {
		
				$encoded_value = htmlentities($value, ENT_QUOTES, 'UTF-8');
				$encoded_option = htmlentities($option, ENT_QUOTES, 'UTF-8');
		
				if (in_array(strtolower($value), $selected_items)) {
					echo "<option value=\"$encoded_value\" selected=\"selected\">$encoded_option</option>";
				} else {
					echo "<option value=\"$encoded_value\">$encoded_option</option>";
				}
			}
		} elseif(!empty($vars["options"])){
			foreach($vars['options'] as $option) {
				$selected = "";	
				if(in_array(strtolower($option), $selected_items)){
					$selected = " selected='selected'";
				}
				echo "<option" . $selected . ">" . $option . "</option>";
			}
		}
	?>
	</select>
</p>