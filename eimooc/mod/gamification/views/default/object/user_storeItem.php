
<div class="store_item">
	<div class="pricetag">
		<img src="<?php echo $vars['url'] . 'mod/gamification/graphics/store_icons/' . $vars['entity']->iconUrl; ?>">
		<div class="price"><?php echo $vars['entity']->points; ?> Pts</div>
	</div>
	<div class="description">
	<h2><?php echo $vars['entity']->title; ?></h2>
	<div><?php echo $vars['entity']->description; ?></div><br/>
	
	<?php 
		if($vars['entity']->rebuy){
			echo '<div class="rebuy"><span>Canjeado ' . $vars['entity']->purchases . '/' . $vars['entity']->max_purchases . ' veces</span></div>';
		}
	
		
		if ($vars['entity']->purchased){
				echo '<div class="purchased">Comprado!</div> ';
				if (isset($vars['entity']->item_id) && ($vars['entity']->item_id == "custom-river")){
					echo '<span style="margin-left:10px;">';
					echo elgg_view('output/url', array('text' => "Configurar", 'href' => "gamification/store/configure_river", 'class' => 'elgg-button elgg-button-action')) . "   </span>";
				}
				else if (isset($vars['entity']->item_id) && ($vars['entity']->item_id == "custom-profile-img")){
					echo '<span style="margin-left:10px;">';
					echo 'Para configurarlo, visita tu perfil' . " </span>";
				}
			}
		else if ($vars['entity']->available){
				echo '<div class="buy">' . elgg_view_form("gamification/store/purchase", array(), array("item_guid" => $vars['entity']->item_guid, "user_guid" => $vars['entity']->user_guid)) . '</div>'; 
		}
		else{
			echo '<div class="not-available">No tienes suficientes puntos para obtener este artículo</div>';
		}
	?>
	</div>	
</div>
