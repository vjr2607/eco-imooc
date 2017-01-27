	<?php 
		//echo elgg_view('gamification_topbar');
		echo elgg_view('input/hidden',array('name' => 'user', 'value' => $vars['user_guid'])); 
		echo elgg_view('input/hidden',array('name' => 'item_guid', 'value' => $vars['item']->guid)); 
		
	?>
	<script type="text/javascript"> 
		//Script para hacer que se auto-oculten las 
		$(function() {	
			$('.customize-river .configure').live('click', function(){
				$('.customize-river .configure').removeClass("active");
				$(this).addClass("active");
			});
		});
	</script>
	Selecciona una de las opciones que te presentamos a continuación para personalizar tus notificaciones en la sección de "Actividad".
	<ul class="elg-input-radios elgg-horizontal customize-river">
	<?php 
		$previousBG = $vars['item']->getAnnotations(''. $vars['user_guid']);
		$bgs = array("bg01", "bg02", "bg03", "bg04", "bg05", "bg06");
		foreach($bgs as $bg){
		?>
			<li>
				<label class="custom-river <?php echo $bg; ?> <?php if ($previousBG[0]->value == $bg) echo "active"; ?> configure">
				<input type="radio" name="river_bg" value="<?php echo $bg; ?>"  <?php if ($previousBG[0]->value == $bg) echo 'checked="true"'; ?>> </label>	
			</li>
		<?php
		}
	?>
	
		<li> 
			<label class="custom-river configure <?php if((!$previousBG) || ($previousBG[0]->value == "none")) echo "active"; ?> none" >
			<input type="radio" name="river_bg" value="none" <?php if((!$previousBG) || ($previousBG[0]->value == "none")) echo 'checked="true"'; ?>>ninguno</label>
		</li>
	</ul>
    <?php 
		echo elgg_view('input/submit', array('value' => "Guardar cambios")); 
		echo elgg_view('output/url', array('text' => "Volver", 'href' => "gamification/store", 'class' => 'elgg-button elgg-button-action'));
	?>
	