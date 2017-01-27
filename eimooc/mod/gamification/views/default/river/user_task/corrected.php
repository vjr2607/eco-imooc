<?php
 
	$item = $vars['item'];
	$performed_by = get_entity($item->subject_guid); // $statement->getSubject();
	$task = get_entity($item->object_guid);
	$performed_to = get_user($task->owner_guid);
	$parent_task = get_entity($task->container_guid);
	$timestamp = elgg_view_friendly_time($item->getPostedTime());
	

	$summary = '<a href="' . $performed_by->getURL() . '">' . $performed_by->name . '</a>';
	$summary .= ' ha corregido la tarea ';
	$summary .= '<a href="gamification/tasks/view/' . $parent_task->guid . '">' . $parent_task->title . '</a>';
	$summary .= ' a <a href="' . $performed_to->getURL() . '">' . $performed_to->name . '</a>';

	$excerpt = elgg_view_entity_icon($parent_task, 'tiny') . '<span style="font-size:14px;position:relative;top:-10px;"> : </span>';
	$excerpt .= elgg_view_entity_icon($performed_by, 'tiny');
	$excerpt .= '<span class="elgg-icon elgg-icon-arrow-right "></span>';
	$excerpt .= elgg_view_entity_icon($performed_to, 'tiny');
	/*
	if ($task->correction == true)
		$excerpt .= '<span style="padding-left:10px;"> Solución correcta!</span><div class="river-correction right"></div>';
	else
		$excerpt .= '<span style="padding-left:10px;"> Solución incorrecta!</span><div class="river-correction wrong"></div>';
	*/
	
	echo elgg_view('river/elements/layout', array(
		'item' => $item,
		'summary' => $summary,
		'message' => $excerpt,
		'noMenu' => true
	));
	/*
	echo elgg_view('page/components/image_block', array(
		'image' => elgg_view('river/elements/image', $vars),
		'body' => $message,
		'class' => 'elgg-river-item',
	));*/