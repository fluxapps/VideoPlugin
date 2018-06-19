<?php

include_once "./Services/Repository/classes/class.ilObjectPluginListGUI.php";
require_once("./Customizing/global/plugins/Services/Repository/RepositoryObject/Video/classes/class.ilObjVideoAccess.php");

/**
 * handles the presentation in container items (categories, courses, ...)
 * together with the corresponding ...Access class.
 *
 * PLEASE do not create instances of larger classes here. Use the
 * ...Access class to get DB data and keep it small.
 */
class ilObjVideoListGUI extends ilObjectPluginListGUI {

	/**
	 * Init type
	 */
	function initType() {
		$this->setType(ilVideoPlugin::PLUGIN_ID);
	}


	/**
	 * Get name of gui class handling the commands
	 */
	function getGuiClass() {
		return ilObjVideoGUI::class;
	}


	/**
	 * Get commands
	 */
	function initCommands() {
		return array(
			array(
				"permission" => "read",
				"cmd" => ilObjVideoGUI::CMD_SHOW_CONTENT,
				"default" => true
			),
			array(
				"permission" => "write",
				"cmd" => ilObjVideoGUI::CMD_EDIT_PROPERTIES,
				"txt" => $this->txt("edit"),
				"default" => false
			),
		);
	}


	/**
	 * Get item properties
	 *
	 * @return        array                array of property arrays:
	 *                                "alert" (boolean) => display as an alert property (usually in red)
	 *                                "property" (string) => property name
	 *                                "value" (string) => property value
	 */
	function getProperties() {
		$props = array();

		$this->plugin->includeClass("class.ilObjVideoAccess.php");
		if (!ilObjVideoAccess::checkOnline($this->obj_id)) {
			$props[] = array(
				"alert" => true,
				"property" => $this->txt("status"),
				"value" => $this->txt("offline")
			);
		}

		return $props;
	}
}

?>