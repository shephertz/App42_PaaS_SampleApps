<?php 
require_once "./lib/couch.php";
require_once "./lib/couchClient.php";
require_once "./lib/couchDocument.php";

$name = $_POST["username"]; 
$description = $_POST["description"]; 
$email = $_POST["email"]; 

$couch_dsn = "http://localhost:5984/";
$couch_db = "testsamplephp";
try{
	$client = new couchClient($couch_dsn,$couch_db);
}catch(Exception $e){
	$client = new couchClient($couch_dsn,$couch_db);
	$client->createDatabase();
}
$data = new stdClass();
$data->username = $name;
$data->email= $email;
$data->description = $description;

try {
	$response = $client->storeDoc($data);
} catch (Exception $e) {
	echo "Error: ".$e->getMessage()." (errcode=".$e->getCode().")\n";
	exit(1);
}

header("Location: home.php");

?>