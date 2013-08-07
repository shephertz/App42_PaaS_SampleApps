<?php 
require_once "./lib/couch.php";
require_once "./lib/couchClient.php";
require_once "./lib/couchDocument.php";

$name = $_POST["name"]; 
$description = $_POST["description"]; 
$email = $_POST["email"]; 

//connection to the database
$lines = file("Config.properties");
$user;
$dbName;
$ip;
$port;
$password; 
foreach ($lines as $line) {
        list($k, $v) = explode('=', $line);
		if (rtrim(ltrim($k)) == rtrim(ltrim("app42.paas.db.username"))) {
			$user = rtrim(ltrim($v));
        }if (rtrim(ltrim($k)) == rtrim(ltrim("app42.paas.db.port"))) {
			$port = rtrim(ltrim($v));
        }if (rtrim(ltrim($k)) == rtrim(ltrim("app42.paas.db.password"))) {
			$password = rtrim(ltrim($v));
        }if (rtrim(ltrim($k)) == rtrim(ltrim("app42.paas.db.ip"))) {
			$ip = rtrim(ltrim($v));
        }if (rtrim(ltrim($k)) == rtrim(ltrim("app42.paas.db.name"))) {
			$dbName = rtrim(ltrim($v));
        }
 }
$couch_dsn = "http://$ip:$port/";
$couch_db = $dbName;
$options = array();
$options['user'] = $user; 
$options['pass'] = $password;
try{
	$client = new couchClient($couch_dsn,$couch_db,$options);
}catch(Exception $e){
	$client = new couchClient($couch_dsn,$couch_db,$options);
	$client->createDatabase();
}
$data = new stdClass();
$data->name = $name;
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