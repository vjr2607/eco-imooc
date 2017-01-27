<div>
    <label><?php echo elgg_echo("title"); ?></label><br />
    <?php echo elgg_view('input/text',array('name' => 'title')); ?>
</div>

<div>
    <label>Descripción</label><br />
    <?php echo elgg_view('input/longtext',array('name' => 'description')); ?>
</div>

<div>
	<label>Icono</label><br />
	<?php echo elgg_view('input/file', array('name' => 'achievement_icon')); ?>
</div>

<div>
    <?php echo elgg_view('input/submit', array('value' => elgg_echo('save'))); ?>
</div>
