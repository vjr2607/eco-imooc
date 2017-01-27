<?php
/**
 * Elgg user display (details)
 * @uses $vars['entity'] The user entity
 */

$user = elgg_get_page_owner_entity();
$profile_fields = elgg_get_config('profile_fields');

$totalAchievements = elgg_get_entities(array('type' => 'object', 'subtype' => 'gamification_achievement', 'count' => true));
$relations = get_entity_relationships($user->guid);
$achievementsCount = 0;
$achievementTitles = array();
$achievementIds = array();
$achievementImages = array();
foreach ($relations as $relation)
	if ($relation->relationship == "achieved"){
		$achievementsCount++;
		$achievement = get_entity($relation->guid_two);
		array_push($achievementImages, $achievement->iconUrl);
		array_push($achievementTitles, $achievement->title);
		array_push($achievementIds, $achievement->achievement_id);
	}
?>
	
<div id="profile-details" class="elgg-body pll">
	<h2> <?php echo $user->name; ?></h2>
	<div class="user_points"><?php echo $user->points; ?> pontos conseguidos </div>
	
	<div class="achievements"><span><?php echo " {$achievementsCount} de {$totalAchievements} crachás "?></span>
		<div class="criteria-percent">
			<div class="progress elgg-button-submit" style="width:<?php echo (($achievementsCount / $totalAchievements) * 100);?>%;"></div>
		</div>
	</div>
	<br/>
	
<?php echo elgg_view("profile/status", array("entity" => $user));

$even_odd = null;
if (is_array($profile_fields) && sizeof($profile_fields) > 0) {
	foreach ($profile_fields as $shortname => $valtype) {
		if (($shortname == "description") || ($shortname == "fullname") || ($shortname == "dni")){
			// skip about me and put at bottom
			continue;
		}
		$value = $user->$shortname;
		if (!empty($value)) {
			//This function controls the alternating class
			$even_odd = ( 'odd' != $even_odd ) ? 'odd' : 'even';
			?>
			<div class="<?php echo $even_odd; ?>">
				<b><?php echo elgg_echo("profile:{$shortname}"); ?>:</b>
				<?php
					echo elgg_view("output/{$valtype}", array('value' => $user->$shortname));
				?>
			</div>
			<?php
		}
	}
}

if (!elgg_get_config('profile_custom_fields')) {
	if ($user->isBanned()) {
		echo "<p class='profile-banned-user'>";
		echo elgg_echo('banned');
		echo "</p>";
	} else {
		if ($user->description) {
			echo "<p class='profile-aboutme-title'><b>" . elgg_echo("profile:aboutme") . "</b></p>";
			echo "<div class='profile-aboutme-contents'>";
			echo elgg_view('output/longtext', array('value' => $user->description, 'class' => 'mtn'));
			echo "</div>";
		}
	}
}
?>

	<div class="profile-achievements">

<?php
	
	for($i=0; $i<$achievementsCount; $i++){ ?>
		
		<img class="custom_fields_more_info" src="<?php echo $vars['url']; ?>mod/gamification/graphics/achievement_icons/<?php echo $achievementImages[$i]; ?>" title="<?php echo $achievementTitles[$i]; ?>" id="more_info_<?php echo $achievementIds[$i]; ?>" />
		<!--<span class="custom_fields_more_info_text"-->
		<span class="texto" id="text_more_info_<?php echo $achievementIds[$i]; ?>"><?php echo $achievementTitles[$i]; ?></span>
		<br/>
	<?php }
?>
	</div>

<?php
echo elgg_view_form("gamification/store/image_profile", array('enctype' => 'multipart/form-data'), array("user_guid" => $user->guid));

echo '</div>';