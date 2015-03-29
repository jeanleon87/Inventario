<?php

# Include the Dropbox SDK libraries
require_once "dropbox-sdk/Dropbox/autoload.php";
use \Dropbox as dbx;

$appInfo = dbx\AppInfo::loadFromJsonFile("app-info.json");
$webAuth = new dbx\WebAuthNoRedirect($appInfo, "PHP-Example/1.0");

$authorizeUrl = $webAuth->start();
/*
echo "1. Go to: " . $authorizeUrl . "\n";
echo "2. Click \"Allow\" (you might have to log in first).\n";
echo "3. Copy the authorization code.\n";
$authCode = "mh8Lv8YmEb4AAAAAAAABqicn-s-ZfnBYZy9E4QEKaus";
 * 
 */
$accessToken="mh8Lv8YmEb4AAAAAAAABq7CSEE-Q81Md4WRjzbqQSqn7_wF7MG4estMZ34UC1Gty";

//list($accessToken, $dropboxUserId) = $webAuth->finish($authCode);
//print "Access Token: " . $accessToken . "\n";

$dbxClient = new dbx\Client($accessToken, "PHP-Example/1.0");
$accountInfo = $dbxClient->getAccountInfo();

//print_r($accountInfo);

$folderMetadata = $dbxClient->getMetadataWithChildren("/");
//print_r($folderMetadata);

$f = fopen("_backup/db_restore_SERVER.sql", "w+b");
$fileMetadata = $dbxClient->getFile("/inventario/db.sql", $f);
fclose($f);
//print_r($fileMetadata);
if($fileMetadata){
    Yii::app()->runController('backup/default/clean');
	Yii::app()->runController('backup/default/restore');
	echo json_encode(array('respuesta'=>'1','op'=>'restore'));
}
else{
	echo json_encode(array('respuesta'=>'2'));
}
