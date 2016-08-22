<?php
/**
 * For the purpose of streamlining the grading and learning-process status definition
 * outside of tests, SCORM courses e.t.c. the ManualAssessment is used.
 * It caries a LPStatus, which is set manually.
 *
 * @author Denis Klöpfer <denis.kloepfer@concepts-and-training.de>
 */


require_once 'Services/Object/classes/class.ilObject.php';
require_once 'Modules/ManualAssessment/classes/Settings/class.ilManualAssessmentSettings.php';
require_once 'Modules/ManualAssessment/classes/Settings/class.ilManualAssessmentSettingsStorageDB.php';
require_once 'Modules/ManualAssessment/classes/Members/class.ilManualAssessmentMembersStorageDB.php';
require_once 'Modules/ManualAssessment/classes/AccessControl/class.ilManualAssessmentAccessHandler.php';
class ilObjManualAssessment extends ilObject {

	protected $lp_active = null;

	public function __construct($a_id = 0, $a_call_by_reference = true) {
		global $DIC;
		$this->type = 'mass';
		parent::__construct($a_id, $a_call_by_reference);
		$this->settings_storage = new ilManualAssessmentSettingsStorageDB($DIC['ilDB']);
		$this->members_storage =  new ilManualAssessmentMembersStorageDB($DIC['ilDB']);
		$this->access_handler = new ilManualAssessmentAccessHandler(
				 $DIC['ilAccess']
				,$DIC['rbacadmin']
				,$DIC['rbacreview']
				,$DIC['ilUser']);

	}

	/**
	 * @inheritdoc
	 */
	public function create() {
		parent::create();
		$this->settings = new ilManualAssessmentSettings($this);
		$this->settings_storage->createSettings($this->settings);
	}

	/**
	 * @inheritdoc
	 */
	public function read() {
		parent::read();
		global $DIC;
		$settings_storage = new ilManualAssessmentSettingsStorageDB($DIC['ilDB']);
		$this->settings = $settings_storage->loadSettings($this);
	}

	/**
	 * @inheritdoc
	 */
	public function getSettings() {
		if(!$this->settings) {
			$this->settings = $this->settings_storage->loadSettings($this);
		}
		return $this->settings;
	}

	/**
	 * Get the members object associated with this.
	 *
	 * @return	ilManualAssessmentMembers
	 */
	public function loadMembers() {
		return $this->members_storage->loadMembers($this);
	}

	/**
	 * Update the members object associated with this.
	 *
	 * @param	ilManualAssessmentMembers	$members
	 */
	public function updateMembers(ilManualAssessmentMembers $members) {
		$members->updateStorageAndRBAC($this->members_storage, $this->access_handler);
	}

	/**
	 * @inheritdoc
	 */
	public function delete() {
		$this->settings_storage->deleteSettings($this);
		$this->members_storage->deleteMembers($this);
		parent::delete();
	}

	/**
	 * @inheritdoc
	 */
	public function update() {
		parent::update();
		$this->settings_storage->updateSettings($this->settings);
	}

	/**
	 * Get the member storage object used by this.
	 *
	 * @return ilManualAssessmentMembersStorage
	 */
	public function membersStorage() {
		return $this->members_storage;
	}

	/**
	 * @inheritdoc
	 */
	public function initDefaultRoles() {
		$this->access_handler->initDefaultRolesForObject($this);
	}

	/**
	 * Get the access handler of this.
	 *
	 * @return	ManualAssessmentAccessHandler
	 */
	public function accessHandler() {
		return $this->access_handler;
	}

	/**
	 * @inheritdoc
	 */
	public function cloneObject($a_target_id,$a_copy_id = 0) {
		$new_obj = parent::cloneObject($a_target_id,$a_copy_id);
		$settings = $this->getSettings();
		$new_settings = new ilManualAssessmentSettings($new_obj, $settings->content(),$settings->recordTemplate());
		$new_obj->settings = $new_settings;
		$new_obj->settings_storage->updateSettings($new_settings);
		return $new_obj;
	}

	/**
	 * Check wether the LP is activated for current object.
	 *
	 * @return bool
	 */
	public function isActiveLP() {
		if($this->lp_active === null) {
			require_once 'Modules/ManualAssessment/classes/LearningProgress/class.ilManualAssessmentLPInterface.php';
			$this->lp_active = ilManualAssessmentLPInterface::isActiveLP($this->getId());
		}
		return $this->lp_active;
	}
}