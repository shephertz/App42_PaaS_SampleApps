<?php 
require_once "./lib/couch.php";
require_once "./lib/couchClient.php";
require_once "./lib/couchDocument.php";

$name = $_POST["username"]; 
$description = $_POST["description"]; 
$email = $_POST["email"]; 

$couch_dsn = "http://10.0.0.52:29005/";
$couch_db = "testsamplephp";
$options = array();
$options['user'] = "23h4ngu5erxu9aty"; 
$options['pass'] = "95zkrt6zlfu2racvaboccae9nklpwks3";
try{
	$client = new couchClient($couch_dsn,$couch_db,$options);
}catch(Exception $e){
	$client = new couchClient($couch_dsn,$couch_db,$options);
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