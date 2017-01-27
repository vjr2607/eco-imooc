<?php
/**
 * version_check.php
 * Author: Federico Mestrone
 * Created: 14/12/2012 17:59
 * Copyright: 2012, Moodsdesign Ltd
 */
echo '<hr>';
echo '<br>';

system_messages(null, 'version_check');

$results = version_check_run_now(true);

if ( $results ) {
    foreach ( $results as $plugin_id => $version_data ) {
	    if ( $version_data['no_data'] ) {
		    $imagename = 'no_data';
	    } elseif ( $version_data['up_to_date'] ) {
		    $imagename = 'up-to-date';
	    } else {
		    $imagename = 'update_available';
	    }
	    $image = elgg_view('output/img', array('src'=>"mod/version_check/graphics/$imagename.png"));
        $version_data['plugin_id'] = $plugin_id;
        echo '<br>';
        echo elgg_view_image_block($image, elgg_view('version_check/version_info', $version_data));
        echo '<hr style="border-style: dotted;">';
    }
} else {
    echo '<br>';
    echo '<p>' . elgg_echo('version_check:list:noupdates') . '</p>';
}
