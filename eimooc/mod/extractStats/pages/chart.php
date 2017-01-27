<?php
	$username = get_input("user");
	$user =  get_user_by_username($username);
	elgg_load_js('extractStats');
	$content = '<style type="text/css">@media print{.elgg-page-topbar{display:none;}.elgg-menu{display:none;}.elgg-heading-site,h2{color:#000;}}#charts{ width:80%; margin:auto; } .chart{margin-bottom: 30px; } h2{margin-bottom:10px; }</style><script type="text/javascript" src="http://cdn.jsdelivr.net/jqplot/1.0.8/jquery.jqplot.min.js"></script><script type="text/javascript" src="http://cdn.jsdelivr.net/jqplot/1.0.8/plugins/jqplot.dateAxisRenderer.min.js"></script><script type="text/javascript" src="http://cdn.jsdelivr.net/jqplot/1.0.8/plugins/jqplot.barRenderer.min.js"></script><script type="text/javascript" src="http://cdn.jsdelivr.net/jqplot/1.0.8/plugins/jqplot.canvasAxisLabelRenderer.min.js"></script><script type="text/javascript" src="http://cdn.jsdelivr.net/jqplot/1.0.8/plugins/jqplot.canvasTextRenderer.min.js"></script><link type="text/css" rel="stylesheet" href="http://cdn.jsdelivr.net/jqplot/1.0.8/jquery.jqplot.min.css" /></script><br/><div id="loading" style="display:none;text-align:center;"><div class="elgg-ajax-loader"></div><br/>Cargando... (obtenidos <span>23</span> registros)</div><div id="charts"></div><div style="display:none;" id="user_guid">' . $user->guid . '</div>';
	$title = "Estadísticas: " . $user->name;
	//$body = elgg_view_layout('one_column', elgg_view_title($title) . $content);
	
	$body = elgg_view_layout('one_column', array(
		'content' => $content,
		'title' => elgg_view_title($title),
	));
	
	page_draw($title, $body);

	?>