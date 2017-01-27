<?php
	
	function stats_init() {
		// Register public external pages
		elgg_register_plugin_hook_handler('public_pages', 'walled_garden', 'stats_public');
	}

	elgg_register_simplecache_view('js/extractStats/chart');
	$js_url = elgg_get_simplecache_url('js', 'extractStats/chart');
	elgg_register_js('extractStats', $js_url);
	
	elgg_register_page_handler('extractStats', 'extractStats_page_handler');
	//register_elgg_event_handler('pagesetup', 'system', 'stats_pagesetup');
	elgg_register_event_handler('pagesetup', 'system', 'stats_pagesetup');
	
	function extractStats_page_handler($page) {
		if ( (isset($page[0])) && ($page[0] == "graph")) {
			include elgg_get_plugins_path() . 'extractStats/pages/graph.php';
		}
		else if ( (isset($page[0])) && ($page[0] == "view")) {
			include elgg_get_plugins_path() . 'extractStats/pages/view.php';
		}
		else if ( (isset($page[0])) && ($page[0] == "users")) {
			include elgg_get_plugins_path() . 'extractStats/pages/users.php';
		}
		else if ( (isset($page[0])) && ($page[0] == "network")) {
			include elgg_get_plugins_path() . 'extractStats/pages/network.php';
		}
		else if ( (isset($page[0])) && ($page[0] == "gefx")) {
			include elgg_get_plugins_path() . 'extractStats/pages/gefx.php';
		}
		else if ( (isset($page[0])) && ($page[0] == "pajek")) {
			include elgg_get_plugins_path() . 'extractStats/pages/pajek.php';
		}
		else if ( (isset($page[0])) && ($page[0] == "daily")) {
			include elgg_get_plugins_path() . 'extractStats/pages/daily.php';
		}
		else if ( (isset($page[0])) && ($page[0] == "user")) {
			include elgg_get_plugins_path() . 'extractStats/pages/user.php';
		}
		else if ( (isset($page[0])) && ($page[0] == "chart")) {
			include elgg_get_plugins_path() . 'extractStats/pages/chart.php';
		}
		else
			include elgg_get_plugins_path() . 'extractStats/pages/main.php';
		return true;
		
	}
	
	function stats_pagesetup(){
		global $CONFIG;
		//if (get_context() == 'admin' && isadminloggedin()) {
		if (elgg_get_context() == 'admin' && elgg_is_admin_logged_in()) {
			add_submenu_item_admin('Estadísticas', $CONFIG->url . 'extractStats/');
			//elgg_register_menu_item('Estadísticas', $CONFIG->url . 'extractStats/');
		}
	}

	elgg_register_event_handler('init', 'system', 'stats_init');



	function stats_public($hook, $handler, $return, $params){
		$pages = array('extractStats/daily', 'extractStats/users');
		return array_merge($pages, $return);
	}


/** MODIFICADA LA FUNCION PARA AÑADIR UN SUBMENU EN EL MENU DE ADMIN
 * Deprecated by elgg_register_menu_item(). Set $menu_name to 'page'.
 *
 * @see elgg_register_menu_item()
 * @deprecated 1.8 Use the new menu system
 *
 * @param string  $label    The label
 * @param string  $link     The link
 * @param string  $group    The group to store item in
 * @param boolean $onclick  Add a confirmation when clicked?
 * @param boolean $selected Is menu item selected
 *
 * @return bool
 */
function add_submenu_item_admin($label, $link, $group = 'default', $onclick = false, $selected = NULL) {

	// submenu items were added in the page setup hook usually by checking
	// the context.  We'll pass in the current context here, which will
	// emulate that effect.
	// if context == 'main' (default) it probably means they always wanted
	// the menu item to show up everywhere.
	$context = elgg_get_context();

	if ($context == 'main') {
		$context = 'all';
	}

	$item = array('name' => $label, 'text' => $label, 'href' => $link, 'context' => $context,
		'section' => $group,);

	if ($selected) {
		$item['selected'] = true;
	}

	if ($onclick) {
		$js = "onclick=\"javascript:return confirm('" . elgg_echo('deleteconfirm') . "')\"";
		$item['vars'] = array('js' => $js);
	}

	return elgg_register_menu_item('page', $item);
}
	
	
?>