<?php
/**
 * ElggGamificationTask Class
 * 
 */
class ElggGamificationAchievement extends ElggObject {

	/**
	 * Set subtype to thewire
	 * 
	 * @return void
	 */
	protected function initializeAttributes() {
		parent::initializeAttributes();

		$this->attributes['subtype'] = 'gamification_achievement';
	}

	/**
	 * Can a user comment on this wire post?
	 *
	 * @see ElggObject::canComment()
	 *
	 * @param int $user_guid User guid (default is logged in user)
	 * @return bool
	 * @since 1.8.0
	 */
	public function canComment($user_guid = 0) {
		return false;
	}

	public function getIconURL($size = 'medium') {
		$url = "mod/gamification/graphics/achievement_icons/" .$this->iconUrl;
		return elgg_normalize_url($url);
	}
	
}
