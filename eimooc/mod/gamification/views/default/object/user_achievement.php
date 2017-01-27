<div class="achievement <?php if($vars['entity']->achieved) echo "achieved"; ?>">
	<?php if(!$vars['entity']->achieved)
		echo '<div class="achievement-points"><span>+' . $vars['entity']->points . '</span></div>';
	?>
	<img src="<?php echo $vars['entity']->iconUrl; ?>">
	<h2><?php echo $vars['entity']->title; ?></h2>
	<?php echo $vars['entity']->description; ?>
</div>
<?php if (isset($vars['entity']->percent)){ ?>
		<div class="stats <?php if($vars['entity']->achieved) echo "achieved"; ?>">
			El <?php echo $vars['entity']->percent; ?>% de utilizadores conseguiram este crachá <br/>
			<div class="criteria-percent">
				<div class="progress elgg-button-submit" style="width:<?php echo $vars['entity']->percent; ?>%;"></div>
			</div>
		</div>
<?php } ?>