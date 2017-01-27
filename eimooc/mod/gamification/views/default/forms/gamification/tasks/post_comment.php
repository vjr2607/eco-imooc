<div>
	<?php echo elgg_view('input/hidden',array('name' => 'guid', 'value' => $vars['task_guid'])); ?>
	<?php echo elgg_view('input/hidden',array('name' => 'receiver_guid', 'value' => $vars['receiver_guid'])); ?>
	 <?php echo elgg_view('input/longtext',array('name' => 'comment', 'class' => 'tinymce_longtext', 'style' => 'height:60px;')); ?>
	 <div style="text-align:right;"><?php echo elgg_view('input/submit', array('value' => "Enviar")); ?></div>
</div>
