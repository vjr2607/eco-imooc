<?php
global $CONFIG;

$plugin_base_url     = "{$CONFIG->url}mod/social_connect/";
$hybridauth_base_url = "{$CONFIG->url}mod/social_connect/vendors/hybridauth/";
$assets_base_url     = "{$vars['url']}mod/social_connect/graphics/";

$version_check_disabled = $vars['entity']->disabled;
?>
<div id="version_check_site_settings">
    <p style="font-size: 14px;margin-left:10px;">
		<br /> 
		<div align="center">
        <b><a href="<?php echo elgg_normalize_url('admin/administer_utilities/version_check'); ?>" class="version_check_link_button"> <?php echo elgg_echo('version_check:settings:check_now') ?> </a></b>
        &nbsp;
        <b><a href="http://tools.moodsdesign.com/versions/" target="_blank" class="version_check_link_button"> <?php echo elgg_echo('version_check:settings:versions_server') ?> </a></b>
        &nbsp;
		<b><a href="https://moodsdesign.atlassian.net/wiki/display/ELGGVERCHK" target="_blank" class="version_check_link_button"> <?php echo elgg_echo('version_check:settings:user_guide') ?> </a></b>
		</div>
		<br /> 
	</p>

	<br />
	<h2 class="version_check_settings_header"><?php echo elgg_echo('version_check:settings:general') ?></h2>
		<div class="version_check_settings_box">
			<table width="100%">
                <thead>
                <tr>
                    <td width="25%">
                        <b><?php echo elgg_echo('version_check:settings:disabled') ?></b>
                    </td>
                    <td width="38%">
                        <select style="height:22px;margin: 3px;" name="params[disabled]">
                            <option value="1" <?php if( $version_check_disabled ) echo "selected"; ?>><?php echo elgg_echo('version_check:settings:yes') ?></option>
                            <option value="0" <?php if( !$version_check_disabled ) echo "selected"; ?>><?php echo elgg_echo('version_check:settings:no') ?></option>
                        </select>
                    </td>
                    <td width="37%">
                        &nbsp;&nbsp; <?php echo elgg_echo('version_check:settings:disabled_explain') ?>
                    </td>
                </tr>
                </thead>
			</table>
		</div> 

        <div class="version_check_settings_box">
            <table width="100%">
                <tr>
                    <td width="25%">
                        <b><?php echo elgg_echo('version_check:settings:freq') ?></b>
                    </td>
                    <td width="38%">
                        <select style="height:22px;margin: 3px;" name="params[check_freq]">
                            <option value="-1" <?php if( $vars['entity']->check_freq == -1 ) echo 'selected'; ?>><?php echo elgg_echo('version_check:settings:freq_everytime'); ?></option>
                            <option value="1" <?php if( $vars['entity']->check_freq == 1 ) echo 'selected'; ?>><?php echo elgg_echo('version_check:settings:freq_daily'); ?></option>
                            <option value="7" <?php if( !$vars['entity']->check_freq || $vars['entity']->freq == 7 ) echo 'selected'; ?>><?php echo elgg_echo('version_check:settings:freq_weekly'); ?></option>
                            <option value="30" <?php if( $vars['entity']->check_freq == 30 ) echo 'selected'; ?>><?php echo elgg_echo('version_check:settings:freq_monthly'); ?></option>
                        </select>
                    </td>
                    <td width="37%">
                        &nbsp;&nbsp; <?php echo elgg_echo('version_check:settings:freq_explain') ?>
                    </td>
                </tr>
            </table>
        </div>

    <div class="version_check_settings_box">
        <table width="100%">
            <tr>
                <td width="25%">
                    <b><?php echo elgg_echo('version_check:settings:url') ?></b>
                </td>
                <td width="38%">
                    <input type="text" style="width: 250px;margin: 3px;"
                           value="<?php echo $vars['entity']->url; ?>"
                           name="params[url]">
                </td>
                <td width="37%">
                    &nbsp;&nbsp; <?php echo elgg_echo('version_check:settings:url_explain') ?>
                </td>
            </tr>
        </table>
    </div>

</div>
