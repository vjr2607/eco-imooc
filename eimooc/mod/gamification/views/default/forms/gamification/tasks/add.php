<script type="text/javascript"> 
	//Script para añadir/quitar criterios
	$(function() {	
		var n_criteria = $('.criteria').length;
		var hiddenInput = $('#n_criteria');
		hiddenInput.attr('value', n_criteria);
		var criteriaClone = $('.criteria').eq(0).clone();
		var criteria_list = $('#criterias');
		
		$('#add-criteria-button').click(function(){
			n_criteria++;
			criteriaClone.clone()
				.find('input').attr('name', 'criteria' + n_criteria).end()
				.find('label').html('Criterio ' + n_criteria).end()
				.appendTo(criteria_list);
			hiddenInput.attr('value', n_criteria);
		});
		
		$('#remove-criteria-button').click(function(){
			if (n_criteria <= 0) return;
			n_criteria--;
			$('.criteria').last().remove();
			hiddenInput.attr('value', n_criteria);
		});
	}); 
</script>

<div>
    <label><?php echo elgg_echo("title"); ?></label><br />
    <?php echo elgg_view('input/text',array('name' => 'title')); ?>
</div>

 <div>
    <label>Familia de tareas</label><br />
	<?php 
		$families = elgg_get_entities_from_metadata(array('type' => 'object', 'subtype' => 'gamification_family', 'limit' => 0,
																			'order_by_metadata' => array('name'=>'order', 'direction'=>'ASC')));
		$option_values = array();
		foreach($families as $family){
			$option_values[$family->family_id] = $family->title;
		}
		echo elgg_view('input/dropdown', array('name' => family, 'options_values' => $option_values)); ?>
</div>

<div>
    <label>Descripción</label><br />
    <?php echo elgg_view('input/longtext',array('name' => 'description')); ?>
</div>

<div>
	<label>Fichero inicial</label><br />
	<?php echo elgg_view('input/file', array('name' => 'initial_file')); ?>
</div>

<div>
	<label>Ficheros auxiliares</label><br />
	<?php echo elgg_view('input/file', array('name' => 'additional_files')); ?>
</div>

<div>
	<label>Fichero solución</label><br />
	<?php echo elgg_view('input/file', array('name' => 'solution_file')); ?>
</div>

<div>
    <h3>Criterios de corrección</h3>
	<ul id="criterias">
		<li class="criteria"><label>Criterio 1</label><?php echo elgg_view('input/text',array('name' => 'criteria1', )); ?></li>
		<li class="criteria"><label>Criterio 2</label><?php echo elgg_view('input/text',array('name' => 'criteria2', )); ?></li>
		<li class="criteria"><label>Criterio 3</label><?php echo elgg_view('input/text',array('name' => 'criteria3', )); ?></li>
	</ul>
	<br/>
	<?php echo elgg_view('input/hidden', array('name' => 'n_criteria', 'id' => 'n_criteria')); ?>
	<?php echo elgg_view('output/url', array('text' => "Añadir criterio", 'id' => 'add-criteria-button', 'rel' => 'toggle', 'href' => "#", 'class' => 'elgg-button elgg-button-action')) . "  "; ?>
    <?php echo elgg_view('output/url', array('text' => "Eliminar criterio", 'id' => 'remove-criteria-button', 'rel' => 'toggle', 'href' => "#", 'class' => 'elgg-button elgg-button-action')) . "  "; ?>
</div>

<div>
    <label>Puntos por realizar la tarea</label><br />
    <?php echo elgg_view('input/text',array('name' => 'points_solve', 'value' => 10)); ?>
	<label>Puntos por corregir la tarea</label><br />
    <?php echo elgg_view('input/text',array('name' => 'points_correction', 'value' => 20)); ?>
	<label>Puntos por tenerla correcta</label><br />
    <?php echo elgg_view('input/text',array('name' => 'points_correct', 'value' => 20)); ?>
</div>

<div>
    <label><?php echo elgg_echo("tags"); ?></label><br />
    <?php echo elgg_view('input/tags',array('name' => 'tags')); ?>
</div>
 
<div>
    <?php echo elgg_view('input/submit', array('value' => elgg_echo('save'))); ?>
</div>
