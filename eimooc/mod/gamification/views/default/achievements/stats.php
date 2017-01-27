<?php //echo elgg_view('gamification_topbar'); ?>
<div class="achievements-list">
	<br/>
	Número atual de utilizadores na plataforma: <?php echo $vars['num_users']; ?>
	<?php 
		echo elgg_view_entity_list($vars['achievemens_list'], array('list_type' => 'list')); 
		echo '<br/><div class="menu-on-tabs">';
		//Mostramos el botón para ver las estadisticas globales
		echo elgg_view('output/url', array('text' => "Regressar à visão normal", 'href' => "gamification/achievements", 'class' => 'elgg-button elgg-button-action')) . "  </div>";
	?>
</div>

	