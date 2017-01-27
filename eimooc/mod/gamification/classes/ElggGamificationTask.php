<?php
/**
 * ElggGamificationTask Class
 * 
 */
class ElggGamificationTask extends ElggObject {

	/**
	 * Set subtype to thewire
	 * 
	 * @return void
	 */
	protected function initializeAttributes() {
		parent::initializeAttributes();

		$this->attributes['subtype'] = 'gamification_task';
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
		$familyObj = elgg_get_entities_from_metadata(array('type' => 'object', 'subtype' => 'gamification_family', 'metadata_name' => 'family_id', 'metadata_value' => $this->family));
		$url = "mod/gamification/graphics/family_icons/" . $familyObj[0]->iconUrl;
		return elgg_normalize_url($url);
	}
	
	 public function getURL() {
		$url = "gamification/tasks/view/" . $this->guid;
		return elgg_normalize_url($url);
	 }
	
}
