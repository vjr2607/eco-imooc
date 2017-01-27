	<?php 
		//echo elgg_view('gamification_topbar');
		$username = get_input('user');
	?>
	<script type="text/javascript"> 
		//Script para hacer que se auto-oculten las 
		$(function() {	
			$('.give-achievements .configure').live('click', function(){
				$('.give-achievements .configure').removeClass("active");
				$(this).addClass("active");
			});
		});
	</script>
	<div>
		<label>Utilizador</label>:
		<?php
			if ($username){
				echo elgg_view('input/text', array('name' => 'user_selected', 'value' => get_user_by_username($username)->name, 'disabled' => true)); 
				echo elgg_view('input/hidden', array('name' => 'username', 'value' => $username));
			}else
				echo elgg_view('input/text', array('name' => 'username')); 
		?>
	</div>
	<label>Crachá para conceder:</label>
	<ul class="elgg-input-radios give-achievements">
	<?php 
		foreach($vars['achievements'] as $achievement){
		?>
			<li>
				<label class="give-achievement configure">
					<input type="radio" name="achievement_id" value="<?php echo $achievement->achievement_id; ?>" > 
					 <img src="<?php echo $vars['url'] . 'mod/gamification/graphics/achievement_icons/' . $achievement->iconUrl; ?>" title=" <?php echo $achievement->title;  ?>" />
				</label>
			</li>
		<?php
		}
	?>
	</ul>
	<br/>
    <?php 
		echo elgg_view('input/submit', array('value' => "Conceder crachás")); 
		echo '<br/><br/>';
		echo elgg_view('output/url', array('text' => "Regressar", 'href' => "gamification/achievements", 'class' => 'elgg-button elgg-button-action'));
	?>
	