<div>
	<?php 
		if (isset($vars['new_solution']) && ($vars['new_solution'] == 'false'))
			echo elgg_view('input/hidden',array('name' => 'new_solution', 'value' => 'false'));
		else
			echo elgg_view('input/hidden',array('name' => 'new_solution', 'value' => 'true'));
		echo elgg_view('input/hidden',array('name' => 'guid', 'value' => $vars['guid'])); 
	?>
	
	<h3 style="display:inline;">Subir solución a la tarea </h3> (máximo 10 Mb)
	<?php echo elgg_view('input/file', array('name' => 'solution_file')); ?>
    <?php echo elgg_view('input/submit', array('value' => "Subir tarea")); ?>
</div>
