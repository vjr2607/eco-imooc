<div>
	<?php echo elgg_view('input/hidden',array('name' => 'guid', 'value' => $vars['guid'])); ?>
	<?php echo elgg_view('input/hidden',array('name' => 'parent_guid', 'value' => $vars['parent_guid'])); ?>
    <?php echo elgg_view('input/submit', array('value' => "Solicitar corrección", 'class' => 'download-task-file ask-correction')); ?>
</div>
