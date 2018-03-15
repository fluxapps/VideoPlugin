<?php

include_once("./Services/Repository/classes/class.ilRepositoryObjectPlugin.php");

/**
 */
class ilVideoPlugin extends ilRepositoryObjectPlugin {

	const PLUGIN_ID = 'xvvv';
	const PLUGIN_NAME = 'Video';


	// must correspond to the plugin subdirectory
	function getPluginName() {
		return self::PLUGIN_NAME;
	}


	protected function uninstallCustom() {
		// TODO Delete videos folder
		return true;
	}
}

?>