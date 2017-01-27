<?php
/**
 * Profile owner block
 */

$user = elgg_get_page_owner_entity();

if (!$user) {
	// no user so we quit view
	echo elgg_echo('viewfailure', array(__FILE__));
	return TRUE;
}

$icon = elgg_view_entity_icon($user, 'large', array(
	'use_hover' => false,
	'use_link' => false,
));

// grab the actions and admin menu items from user hover
$menu = elgg_trigger_plugin_hook('register', "menu:user_hover", array('entity' => $user), array());
$builder = new ElggMenuBuilder($menu);
$menu = $builder->getMenu();
$actions = elgg_extract('action', $menu, array());
$admin = elgg_extract('admin', $menu, array());

$profile_actions = '';
if (elgg_is_logged_in() && $actions) {
	$profile_actions = '<ul class="elgg-menu profile-action-menu mvm">';
	foreach ($actions as $action) {
		$profile_actions .= '<li>' . $action->getContent(array('class' => 'elgg-button elgg-button-action')) . '</li>';
	}
	$profile_actions .= '</ul>';
}

// if admin, display admin links
$admin_links = '';
if (elgg_is_admin_logged_in() && elgg_get_logged_in_user_guid() != elgg_get_page_owner_guid()) {
	$text = elgg_echo('admin:options');

	$admin_links = '<ul class="profile-admin-menu-wrapper">';
	$admin_links .= "<li><a rel=\"toggle\" href=\"#profile-menu-admin\">$text&hellip;</a>";
	$admin_links .= '<ul class="profile-admin-menu" id="profile-menu-admin">';
	foreach ($admin as $menu_item) {
		$admin_links .= elgg_view('navigation/menu/elements/item', array('item' => $menu_item));
	}
	$admin_links .= '<li class="elgg-menu-item-resetpassword"><a href="' .  $vars['url'] . 'gamification/achievements/give?user=' . $user->username . '">Conceder logros...</a></li>';
	$admin_links .= '<li class="elgg-menu-item-resetpassword"><a href="' .  $vars['url'] . 'extractStats/chart?user=' . $user->username . '">Ver gráficas de participación</a></li>';
	$admin_links .= '</ul>';
	$admin_links .= '</li>';
	$admin_links .= '</ul>';	
}

// content links
/*$content_menu = elgg_view_menu('owner_block', array(
	'entity' => elgg_get_page_owner_entity(),
	'class' => 'profile-content-menu',
));*/
$content_menu = '<ul class="elgg-menu elgg-menu-owner-block profile-content-menu elgg-menu-owner-block-default"><li class="elgg-menu-item-blog"><a href="http://192.168.0.107/elgg/blog/owner/' . $user->username . '">Blogs</a></li><li class="elgg-menu-item-thewire"><a href="http://192.168.0.107/elgg/thewire/owner/' . $user->username . '">Posts</a></li><li class="elgg-menu-item-videolist"><a href="http://192.168.0.107/elgg/videolist/owner/' . $user->username . '">Vídeos</a></li></ul>';


echo <<<HTML

<div id="profile-owner-block">
	$icon
	$profile_actions
	
	$admin_links
</div>

HTML;
