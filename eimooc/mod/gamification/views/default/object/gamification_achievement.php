<div class="achievement <?php if($vars['entity']->achieved) echo "achieved"; ?>">
	<img src="<?php $vars['entity']->getIconURL(); ?>">
	<h2><?php echo $vars['entity']->title; ?></h2>
	<?php echo $vars['entity']->description; ?>
	
</div>