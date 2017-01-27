<?php 
	echo elgg_view('input/hidden',array('name' => 'guid', 'value' => $vars['guid'])); 
	echo elgg_view('input/submit', array('value' => "Solicitar intervención del profesor", 'class' => 'elgg-requires-confirmation elgg-button-action')); 
?>
