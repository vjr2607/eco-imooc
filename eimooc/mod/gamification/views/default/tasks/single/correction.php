<?php
	$parent_task = $vars['params']['parent_task'];

	if (isset($vars['params']['task']) && ($vars['params']['task']->correction_made == true)){
		//Si la tarea ya ha sido corregida por otro usuario, mostramos el resultado
		echo '<div class="elgg-head clearfix"><h3>Corrección</h3></div>';
		
		$criteria = $parent_task->getAnnotations('criteria');
		$corrections = $vars['params']['task']->getAnnotations('correction');
		echo elgg_view('tasks/single/criteria', array('criteria' => $criteria, 'corrections' => $corrections, 'n_criteria' => $parent_task->n_criteria, 'right_criteria' => $vars['params']['task']->right_criteria));
		
		//Obtenemos la lista de comentarios
		$comments = $vars['params']['task']->getAnnotations('comment');
		if ($comments){
			//Si hay comentarios, mostramos la lista de comentarios con el formato predeterminado
			echo '<h4>Discusión</h4>';
			echo elgg_view_annotation_list($comments);
		}
		echo '<br/>';
		
		//Mostramos el boton y el formulario para añadir comentarios
		echo elgg_view('output/url', array('text' => "Añadir comentario", 'id' => 'own-comment-button', 'rel' => 'toggle', 'href' => "#own-comment-form", 'class' => 'elgg-button elgg-button-action hide-on-click')) . "  ";
		echo elgg_view_form("gamification/tasks/post_comment", array('id' => 'own-comment-form', 'style' => 'display:none;'), array('receiver_guid' => $vars['params']['task']->corrected_by, 'task_guid' => $vars['params']['task']->guid));
		
		if ((!isset($vars['params']['admin_view']) || ($vars['params']['admin_view'] == false )) && (!$vars['params']['task']->correction)){
			//Si estamos en la vista de administrador, no tenemos que mostrar el formulario para poder resubir la tarea
			echo elgg_view('output/url', array('text' => "Subir tarea corregida", 'rel' => 'toggle', 'href' => "#reupload-task-form", 'class' => 'elgg-button elgg-button-action hide-on-click')) . "  ";
		?>
		<div id="reupload-task-form" style="display:none;">
			<br/>
			<div class="hint">
				<div class="close"></div>
				Puedes volver a subir una nueva solución para tareas ya realizadas que hayan sido corregidas con un resultado negativo. El compañero que te la corrigió recibirá un mensaje interno informándole de que has subido la nueva tarea y podrá modificar su corrección.<br/>
			</div>
		<?php
			echo elgg_view_form("gamification/tasks/solve", 
								array('enctype' => 'multipart/form-data', 'class' => 'solve-form'), 
								array('guid' => $vars['params']['task']->guid, 'new_solution' => 'false'));
		?>
		</div>
		
		<?php
			echo '<div style="display:inline-block;vertical-align:bottom;">';
			echo elgg_view_form("gamification/tasks/ask_teacher", array(), array('guid' => $vars['params']['task']->guid));
			echo '</div>';
		}
		
	}
	else if (isset($vars['params']['task'])){
		//El usuario ha hecho la tarea pero todavía no ha sido corregida
	?>
		<div class="hint">
			<div class="close"></div>
			Una vez has realizado una tarea, tendrás que esperar a que otro compañero la corrija. Una vez esté corregida, aquí aparecerá el resultado y podréis discutir sobre la corrección en caso de no estar de acuerdo.<br/>
			<strong>Puntos por obtener una corrección positiva en esta tarea: <?php echo $parent_task->points_correct; ?> </strong>
		</div>
	<?php 
	
	}
	if (isset($vars['params']['task']) && isset($vars['params']['admin_view']) && ($vars['params']['admin_view'] == true)){ 
			echo elgg_view('output/url', array('text' => "Corregir tarea como profesor", 'rel' => 'toggle', 'href' => "#admin-correction", 'class' => 'elgg-button elgg-button-action hide-on-click')) . "  ";
		?>
			<div id="admin-correction" style="display:none;">
				<div style="text-align:center">
					<a href="<?php echo $vars['url']; ?>file/download/<?php echo $vars['params']['userFile']; ?>"  class="download-task-file download-solution">Descargar práctica a corregir</a>
				</div>
				
				<?php
					$new_correction = ($vars['params']['task']->correction_made == true)?'false':'true';
				
					echo elgg_view_form("gamification/tasks/admin_correction", 
							array('class' => 'post-correction-form'), 
							array('parent_task' => $parent_task, 'guid' => $vars['params']['task']->guid, 'new_correction' => $new_correction)); ?>
			</div>
	<?php }
