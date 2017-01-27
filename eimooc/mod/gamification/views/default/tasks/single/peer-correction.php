<?php
	$parent_task =  $vars['params']['parent_task'];
	
	$criteria = $parent_task->getAnnotations('criteria');
	$corrections = $vars['params']['correcting']->getAnnotations('correction');
	echo elgg_view('tasks/single/criteria', array('criteria' => $criteria, 'corrections' => $corrections, 'n_criteria' => $parent_task->n_criteria, 'right_criteria' => $vars['params']['correcting']->right_criteria));

	//Obtenemos la lista de comentarios
	$comments_correction = $vars['params']['correcting']->getAnnotations('comment');
	if ($comments_correction){
		//Si hay comentarios, mostramos la lista de comentarios con el formato predeterminado
		echo '<h4>Discusión</h4>';
		echo elgg_view_annotation_list($comments_correction);
	}
	echo '<br/>';
	//Mostramos el boton y el formulario para añadir comentarios
	echo elgg_view('output/url', array('text' => "Añadir comentario", 'rel' => 'toggle', 'href' => "#peer-comment-form", 'class' => 'elgg-button elgg-button-action hide-on-click')) . "  ";
	echo elgg_view_form("gamification/tasks/post_comment", array('id' => 'peer-comment-form', 'style' => 'display:none;'), array('receiver_guid' => $vars['params']['correcting']->owner_guid, 'task_guid' => $vars['params']['correcting']->guid));
	
	if (!isset($vars['params']['admin_view']) || ($vars['params']['admin_view'] == false)){
		//Si estamos en la vista de administrador, no tenemos que mostrar el formulario para la corrección (ya que la tarea no es nuestra)
		echo elgg_view('output/url', array('text' => "Modificar corrección", 'rel' => 'toggle', 'href' => "#modify-correction-form", 'class' => 'elgg-button elgg-button-action hide-on-click')) . "  ";
		echo elgg_view_form("gamification/tasks/post_correction", 
							array('class' => 'post-correction-form', 'id' => 'modify-correction-form',  'style' => 'display:none;'), 
							array('parent_task' => $parent_task, 'guid' => $vars['params']['task']->guid, 'correcting' => $vars['params']['correcting']->guid, 'new_correction' => 'false'));
	
		echo '<div style="display:inline-block;vertical-align:bottom;">';
		echo elgg_view_form("gamification/tasks/ask_teacher", array(), array('guid' => $vars['params']['correcting']->guid));
		echo '</div>';
	}
