<?php
/**
 * Elgg page header
 * In the default theme, the header lives between the topbar and main content area.
 */

// link back to main site.
echo elgg_view('page/elements/header_logo', $vars);

// drop-down login
echo elgg_view('core/account/login_dropdown');

// insert site-wide navigation // vjr - inserted conditional
if (elgg_is_logged_in()) {
	echo elgg_view_menu('site');
} else {
echo '<ul class="elgg-menu elgg-menu-site elgg-menu-site-default clearfix"><li><a href="http://eco.imooc.uab.pt/elgg/cursos">Cursos</a></li><li><a href="http://eco.imooc.uab.pt/elgg/activity">Atividade</a></li><li> <a href="http://eco.imooc.uab.pt/elgg/thewire/all">Curtas</a></li><li><a href="http://eco.imooc.uab.pt/elgg/blog/all">Blogs</a></li><li><a href="http://eco.imooc.uab.pt/elgg/bookmarks/all">Favoritos</a></li><li><a href="http://imooc.uab.pt">iMOOC</a></li><li class="elgg-more"><a href="#">Mais</a><ul class="elgg-menu elgg-menu-site elgg-menu-site-more"><li><a href="http://eco.imooc.uab.pt/elgg/file/all">Ficheiros</a></li><li class="elgg-state-selected"><a href="http://eco.imooc.uab.pt/elgg/members">Membros</a></li></ul><li></ul>';
}
