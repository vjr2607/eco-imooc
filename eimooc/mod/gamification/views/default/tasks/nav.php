<?php
$tabs = array(
	'all' => array(
		'title' => "Todas",
		'url' => "gamification/tasks/all",
		'selected' => $vars['selected'] == 'all',
	),
	'pending' => array(
		'title' => "Pendientes",
		'url' => "gamification/tasks/pending",
		'selected' => $vars['selected'] == 'pending',
	),
		'uncorrected' => array(
		'title' => "Sin corregir",
		'url' => "gamification/tasks/uncorrected",
		'selected' => $vars['selected'] == 'uncorrected',
	)
);

echo elgg_view('navigation/tabs', array('tabs' => $tabs));
