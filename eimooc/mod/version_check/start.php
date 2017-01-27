<?php
elgg_register_event_handler('init', 'system', 'version_check_init');
elgg_register_event_handler('pagesetup', 'system', 'version_check_pagesetup');

function version_check_init() {
    // extend admin style sheet
    elgg_extend_view('css/admin', 'version_check/admincss');
    // extend main style sheet
    elgg_extend_view('css/elgg' , 'version_check/css');
    // register this plugin for version updates
    version_check_register_plugin('version_check');
    // Add pages and menu items to the admin area
    elgg_register_admin_menu_item('administer', 'version_check', 'administer_utilities', 1);
}

function version_check_pagesetup() {
    // only run this if admin logged in and plugin is not disabled and this is not a css/js/ajax request and this is not an action
    $context = elgg_get_context();
    if ( !elgg_is_admin_logged_in() || elgg_get_plugin_setting('disabled', 'version_check') == 1
        || $context == 'css' || $context == 'js' || $context == 'ajax' || $context == 'api' || $_GET['action'] ) {
        return;
    }
    // version update frequency
    $check_freq = elgg_get_plugin_setting('check_freq', 'version_check');
    if ( !$check_freq ) {
        $check_freq = 7;
    }
    // when did we last check? should we check again?
    $last_check = elgg_get_plugin_setting('last_check', 'version_check');
    $curr_check = time();
    if ( $last_check && $check_freq != -1 ) {
        $check_now = ($curr_check - $last_check > $check_freq * 3600 * 24);
    } else {
        $check_now = true;
    }
    if ( $check_now ) {
        system_messages(null, 'version_check');
        if ( ($results = version_check_run_now()) ) {
            $checker_url = elgg_normalize_url('admin/administer_utilities/version_check');
            foreach ( $results as $plugin_id => $version_data ) {
                system_messages(elgg_echo('version_check:system_message', array(
                    $version_data['plugin_name'],
                    $version_data['plugin_url'],
                    $checker_url)),
                'version_check');
            }
        }
        // save the timestamp of the current check
        elgg_set_plugin_setting('last_check', $curr_check, 'version_check');
    }
}

function version_check_register_plugin($plugin, $url = 'default') {
    global $version_check_register;
    $version_check_register[$plugin] = $url;
}

function version_check_run_now($include_all = false) {
    global $version_check_register;
    $default_url = elgg_get_plugin_setting('url', 'version_check');
    if ( !$default_url ) {
        $default_url = 'https://tools.moodsdesign.com/elggversions/latest/%s/info';
    }
    // if we should check now, go through all registered plugins
    $results = array();
    foreach ( $version_check_register as $plugin_id => $url ) {
        $plugin = elgg_get_plugin_from_id($plugin_id);
        if ( $plugin && $plugin->isActive() ) {
            if ( $url == 'default' ) {
                $url = sprintf($default_url, $plugin_id);
            }
            $version_string = file_get_contents($url);
            if ( $version_string ) {
                $version_data = json_decode($version_string, true);
                if ( $version_data && $version_data['status'] == 1 ) {
                    $cur_version = $plugin->getManifest()->getVersion();
                    $new_version = $version_data['versions'][$plugin_id]['plugin_new_version'];
                    $ts = $version_data['versions'][$plugin_id]['plugin_timestamp'];
	                if ( empty($new_version) && $include_all ) {
		                $results[$plugin_id] = array(
			                'plugin_url' => $version_data['versions'][$plugin_id]['plugin_url'],
			                'plugin_name' => $plugin->getFriendlyName(),
			                'plugin_old_version' => $cur_version,
			                'no_data' => true,
		                );
	                } elseif ( $cur_version == $new_version && $include_all ) {
                        $results[$plugin_id] = array(
                            'plugin_url' => $version_data['versions'][$plugin_id]['plugin_url'],
                            'plugin_name' => $plugin->getFriendlyName(),
                            'plugin_old_version' => $cur_version,
                            'up_to_date' => true,
                        );
                    } elseif ( !empty($new_version) && $cur_version != $new_version ) {
		                $results[$plugin_id] = array(
			                'plugin_url' => $version_data['versions'][$plugin_id]['plugin_url'],
			                'plugin_name' => $plugin->getFriendlyName(),
			                'release_notes' => $version_data['versions'][$plugin_id]['release_notes'],
			                'plugin_new_version' => $new_version,
			                'plugin_old_version' => $cur_version,
			                'plugin_timestamp' => $ts,
			                'no_data' => false,
			                'up_to_date' => false,
		                );
	                }
                }
            }
        }
    }
    if ( empty($results) ) {
        return false;
    } else {
        return $results;
    }
}
