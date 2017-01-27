<div class="correction">
	<h3>Formulario de corrección</h3>
	<?php echo elgg_view('input/hidden',array('name' => 'corrector_guid', 'value' => $vars['guid'])); ?>
	<?php echo elgg_view('input/hidden',array('name' => 'correcting_guid', 'value' => $vars['correcting'])); ?>
	<?php echo elgg_view('input/hidden',array('name' => 'new_correction', 'value' => $vars['new_correction'])); ?>

	<?php 
		$parent_task = $vars['parent_task'];
		$criterias = $parent_task->getAnnotations('criteria');
		$i = 1;
		foreach ($criterias as $criteria){
			echo '<div class="criteria-entry">' . $criteria->value . '</div>';
			echo elgg_view('input/radio', array('name' => 'criteria'.$i, 'class' => 'correction-options', 'options' => array('correcta' => 'right', 'incorrecta' => 'wrong'))); 
			echo '<br/>';
			$i++;
		}
		
	?><br/><br/>
	<label>Comentario</label>(obligatorio en caso de marcar algún criterio como incorrecto)
    <?php echo elgg_view('input/longtext',array('name' => 'comment', 'class' => 'tinymce_longtext', 'style' => 'height:60px;')); ?>
    <div style="text-align:center;">
	<?php echo elgg_view('input/submit', array('value' => "Corregir", 'class' => 'elgg-button-submit post-correction', 'src' => elgg_get_site_url() . 'mod/gamification/graphics/correct-task.png')); ?>
	</div>

</div>
