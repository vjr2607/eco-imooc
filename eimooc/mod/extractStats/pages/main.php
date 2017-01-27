<?php
	// make sure only logged in users can see this page 
	
	$content = "<br/><br/>";
	$content .= elgg_view('output/url', array('text' => "Ver CSV con estadísticas", 'href' => "extractStats/view", 'class' => 'elgg-button elgg-button-action')) . '<br/><br/>';
	$content .= elgg_view('output/url', array('text' => "Ver XML (formato graphML) con el grafo de usuarios", 'href' => "extractStats/graph", 'class' => 'elgg-button elgg-button-action')) . '<br/><br/>';
	$content .= elgg_view('output/url', array('text' => "Ver .XML (formato GEXF) con evolución de la red", 'href' => "extractStats/gefx", 'class' => 'elgg-button elgg-button-action')) . '<br/><br/>';
	$content .= elgg_view('output/url', array('text' => "Ver .SON (formato SoNIA) con evolución de la red", 'href' => "extractStats/network", 'class' => 'elgg-button elgg-button-action')) . '<br/><br/>';
	$content .= elgg_view('output/url', array('text' => "Ver .NET (formato Pajek) con evolución de la red", 'href' => "extractStats/pajek", 'class' => 'elgg-button elgg-button-action')) . '<br/><br/>';
	$title = "Estadísticas";
	//$body = elgg_view_layout('two_column_left_sidebar', '', elgg_view_title($title) . $content);
	
	$body = elgg_view_layout('two_column_left_sidebar', array(
		'content' => $content,
		'title' => elgg_view_title($title),
	));
	
	page_draw($title, $body);
		
	?>
	<br/>
