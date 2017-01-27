<?php
 
	$item = $vars['item'];
	$performed_by = get_entity($item->subject_guid);
	$object = get_entity($item->object_guid);
	$menu = elgg_view_menu('river', array(
		'item' => $item,
		'sort_by' => 'priority',
		'class' => 'elgg-menu-hz',
	));
	$message = 'Se ha añadido una nueva tarea!';
	$excerpt .= '<a style="font-size:16px;color:#000;" href="' . $object->getURL() . '">' . $object->title . '</a>';
	
	$item->subject_guid = $object->guid;
	echo elgg_view('river/elements/layout', array(
		'item' => $item,
		'summary' => $message,
		'message' => $excerpt
	));

		