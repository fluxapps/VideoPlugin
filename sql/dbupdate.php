<#1>
<?php
require_once 'Customizing/global/plugins/Services/Repository/RepositoryObject/Video/classes/class.ilVideoData.php';
$fields = array(
	'id' => array(
		'type' => 'integer',
		'length' => 4,
		'notnull' => true
	),
	'is_online' => array(
		'type' => 'integer',
		'length' => 1,
		'notnull' => false
	)
);

if(!$ilDB->tableExists(ilVideoData::TABLE_NAME)) {
    $ilDB->createTable(ilVideoData::TABLE_NAME, $fields);
    $ilDB->addPrimaryKey(ilVideoData::TABLE_NAME, array("id"));
}
?>