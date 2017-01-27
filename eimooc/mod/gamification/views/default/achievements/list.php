<?php //echo elgg_view('gamification_topbar'); ?>
<div class="achievements-list">
	<br/>
	<?php 
		echo elgg_view_entity_list($vars['achievemens_list'], array('list_type' => 'list')); 
		echo '<br/>';
		//Mostramos el botón para ver las estadisticas globales
		?>
		<div class="menu-on-tabs">
		<?php
		echo elgg_view('output/url', array('text' => "Ver estatísticas gerais", 'href' => "gamification/achievements/stats", 'class' => 'elgg-button elgg-button-action')) . "  ";
		
		if ( elgg_is_admin_logged_in() ){
			echo elgg_view('output/url', array('text' => "Conceder crachás", 'href' => "gamification/achievements/give", 'class' => 'elgg-button elgg-button-action'));
		}
		
	?>
	</div>
</div>

	