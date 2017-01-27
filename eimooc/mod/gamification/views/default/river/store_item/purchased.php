<?php
	
	$item = $vars['item'];
	$performed_by = get_entity($item->subject_guid);
	$object = get_entity($item->object_guid);
	
	$summary = '<a href="' . $performed_by->getURL() . '">' . $performed_by->name . '</a> ha comprado un artículo de la <a href="' . $vars['url'] . 'gamification/store"> tienda!</a>';
	$excerpt = '<div class="achieved"><img src="' . $object->getIconURL() . '">';
	$excerpt .= '<strong>' . $object->title . '. </strong><br/>' . $object->description . '</div>';
	
	echo elgg_view('river/elements/layout', array(
		'item' => $item,
		'summary' => $summary,
		'message' => $excerpt,
		'noMenu' => true
	));
