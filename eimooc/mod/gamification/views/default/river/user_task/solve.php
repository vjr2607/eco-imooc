<?php
 
	$item = $vars['item'];
	$performed_by = get_entity($item->subject_guid);
	$object = get_entity($item->object_guid);
	$url = $object->getURL();
	$timestamp = elgg_view_friendly_time($item->getPostedTime());
	
	$message = '<a href="' . $performed_by->getURL() . '">' . $performed_by->name . '</a>';
	$message .= ' ha subido su solución para la tarea ';
	$message .= '<a href="gamification/tasks/view/' . $object->guid . '">' . $object->title . '</a>';
	
	echo elgg_view('river/elements/layout', array(
		'item' => $item,
		'summary' => $message,
		'noMenu' => true
	));