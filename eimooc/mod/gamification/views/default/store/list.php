<?php
	//echo elgg_view('gamification_topbar');
?>
	
<h3 class="store-points">
Puntos totales conseguidos: <span style="color:#000;"><?php echo $vars['user_points']; ?></span><br/>
Puntos gastados: <span style="color:#000;"><?php echo $vars['spent_points']; ?></span><br/>
Puntos restantes: <span style="color:#000;"><?php echo $vars['available_points']; ?></span><br/>
</h3>
<br/><br/>
<h2>Artículos disponibles</h2>

<?php
	foreach ($vars['store_items'] as $store_item){
		echo elgg_view_entity($store_item);
	}
?>