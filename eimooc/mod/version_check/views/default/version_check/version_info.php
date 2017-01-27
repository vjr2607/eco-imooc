<?php
/**
 * version_info.php
 * Author: Federico Mestrone
 * Created: 14/12/2012 18:27
 * Copyright: 2012, Moodsdesign Ltd
 */
?>
<p>
    <?php if ( $vars['no_data'] ) { ?>
		<?php echo elgg_echo('version_check:info:no_updates', array($vars['plugin_name'], $vars['plugin_id'])); ?>
	<?php } elseif ( $vars['up_to_date'] ) { ?>
		<?php echo elgg_echo('version_check:info:up_to_date', array($vars['plugin_name'], $vars['plugin_id'])); ?>
    <?php } else { ?>
		<?php echo elgg_echo('version_check:info:update_avail', array($vars['plugin_name'], $vars['plugin_id'], $vars['plugin_new_version'], elgg_get_friendly_time($vars['plugin_timestamp']))); ?>
    <?php } ?>
    <br/><?php echo elgg_echo('version_check:info:current', array($vars['plugin_old_version'])); ?>
</p>
<?php if ( $vars['release_notes'] ) { ?>
<p>
    <b><?php echo elgg_echo('version_check:info:release_notes') ;?></b>
    <?php echo $vars['release_notes'] ?>
</p>
<?php } ?>
<?php if ( $vars['plugin_new_version'] && $vars['plugin_url'] ) { ?>
<p style="text-align: center">
    <a href="<?php echo $vars['plugin_url'] ?>" target="_blank" class="version_check_link_button"><?php echo elgg_echo('version_check:info:link_button', array($vars['plugin_name'])); ?></a>
</p>
<?php } ?>
