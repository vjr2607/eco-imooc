<?php
/**
 * Elgg footer
 * The standard HTML footer that displays across the site
 *
 * @package Elgg
 * @subpackage Core
 *
 */

echo elgg_view_menu('footer', array('sort_by' => 'priority', 'class' => 'elgg-menu-hz'));

$powered_url = elgg_get_site_url() . "_graphics/powered_by_elgg_badge_drk_bckgnd.gif";

echo '<div class="mts clearfloat float-alt">';
echo elgg_view('output/url', array(
	'href' => 'http://blog.wisb.me',
	'text' => elgg_echo('WISB:footer_wisblog'),
	'class' => '',
	'is_trusted' => true,
));
echo (' · ');
echo elgg_view('output/url', array(
	'href' => 'http://developers.wisb.me',
	'text' => elgg_echo('WISB:footer_developers'),
	'class' => '',
	'is_trusted' => true,
));
echo (' · ');
echo elgg_view('output/url', array(
	'href' => 'http://www.wisb.me',
	'text' => elgg_echo('WISB:footer_wisb'),
	'class' => '',
	'is_trusted' => true,
));
echo '</div>';
