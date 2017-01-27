<?php 
	$group_tasks = array();
	$group_families = array();
	foreach ($vars['task_list'] as $task){
		if (!isset($group_tasks[$task->family])){
			$group_tasks[$task->family] = array();
			array_push($group_families, $task->family);
		}
		array_push($group_tasks[$task->family], $task);
	}
?>

<?php //echo elgg_view('gamification_topbar'); ?>

<div class="tasks-accordion" style="clear:both;">
<?php
	//Vista para mostrar la lista de tareas
	
	foreach ($group_families as $family){
		$familyObj = elgg_get_entities_from_metadata(array('type' => 'object', 'subtype' => 'gamification_family', 'metadata_name' => 'family_id', 'metadata_value' => $family));
		//Comprobamos que realmente exista un logro con dicho id
		if ($familyObj){
			$family_name = $familyObj[0]->title;
		}
		else{
			$family_name = $family;
		}
		?>
		<h3 class="tasklist" style="background-image:url('<?php echo $vars['url']; ?>mod/gamification/graphics/family_icons/<?php echo $familyObj[0]->iconUrl; ?>');">
			<div class="task_icons header"><div>Tu tarea</div><div>Corrección</div></div>
			<?php echo $family_name; ?> (<?php echo count($group_tasks[$family]); ?>)
		</h3>
<?php
		//echo '<h3 class="tasklist" style="background-image:url(\'' .  $vars['url'] . 'mod/gamification/graphics/family_icons/' . $familyObj[0]->iconUrl . '\');">' . $family_name . ' (' . count($group_tasks[$family]) . ')</h3>';
		echo '<div>' . elgg_view_entity_list($group_tasks[$family], array('list_type' => 'list', 'list_class' => 'task_list')) . '</div>';
	}
	//echo elgg_view_entity_list($vars['task_list'], array('list_type' => 'list'));
?>
</div>
	
<script type="text/javascript">
	$(function() {
		$( ".tasks-accordion" ).accordion({collapsible:true, active:0, header: "h3.tasklist"});
		$( ".tasks-accordion" ).find('.ui-accordion-content').css('height', 'auto');
		
  });
</script>

<?php
	if ( elgg_is_admin_logged_in() ){ ?>
	<br/>
	<div class="menu-on-tabs">
		<div class="content">
	<?php
		if (isset($vars['show_admin']))
			echo elgg_view('output/url', array('text' => "Volver a vista normal", 'href' => "gamification/tasks", 'class' => 'elgg-button elgg-button-action'));
		else{
			echo elgg_view('output/url', array('text' => "Añadir tarea", 'href' => "gamification/tasks/add", 'class' => 'elgg-button elgg-button-action'));
			echo ' ';
			echo elgg_view('output/url', array('text' => "Ver tareas de usuarios", 'href' => "gamification/tasks/admin", 'class' => 'elgg-button elgg-button-action'));
		}
	?>
		</div>
	</div>
	
	<?php
	}
	?>
	 