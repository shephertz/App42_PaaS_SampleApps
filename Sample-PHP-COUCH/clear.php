<?php 
require_once "./lib/couch.php";
require_once "./lib/couchClient.php";
require_once "./lib/couchDocument.php";

$couch_dsn = "http://localhost:5984/";
$couch_db = "testsamplephp";

try{
	$client = new couchClient($couch_dsn,$couch_db);
	$response = $client->deleteDatabase();
}catch(Exception $e){
	$client = new couchClient($couch_dsn,$couch_db);
	$client->createDatabase();
}
header("Location: index.html");
?>