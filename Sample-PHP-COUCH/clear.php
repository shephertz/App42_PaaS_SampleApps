<?php 
require_once "./lib/couch.php";
require_once "./lib/couchClient.php";
require_once "./lib/couchDocument.php";

$couch_dsn = "http://10.0.0.52:29005/";
$couch_db = "testsamplephp";
$options = array();
$options['user'] = "23h4ngu5erxu9aty"; 
$options['pass'] = "95zkrt6zlfu2racvaboccae9nklpwks3";

try{
	$client = new couchClient($couch_dsn,$couch_db,$options);
	$response = $client->deleteDatabase();
}catch(Exception $e){
	$client = new couchClient($couch_dsn,$couch_db,$options);
	$client->createDatabase();
}
header("Location: index.php");
?>