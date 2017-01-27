	<?php 
		echo elgg_view('input/hidden', array('name' =>'item_guid', 'value' => $vars['item_guid'])); 
		echo elgg_view('input/hidden',array('name' => 'user', 'value' => $vars['user_guid'])); 
	?>
	
    <?php echo elgg_view('input/submit', array('value' => "Comprar")); ?>