<?php

$tabs = array(
	'all' => array(
		'title' => "Todas",
		'url' => "gamification/tasks/admin/all",
		'selected' => $vars['selected'] == 'all',
	),
	'uncorrected' => array(
		'title' => "Sin corregir",
		'url' => "gamification/tasks/admin/uncorrected",
		'selected' => $vars['selected'] == 'uncorrected',
	),
	'waiting' => array(
		'title' => "A la espera de corrección",
		'url' => "gamification/tasks/admin/waiting",
		'selected' => $vars['selected'] == 'waiting',
	)
);

echo elgg_view('navigation/tabs', array('tabs' => $tabs));
