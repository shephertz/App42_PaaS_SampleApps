<?php 
try{
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
#$conn = new Mongo('localhost:27017');
#$conn = new Mongo("mongodb://$user:$password@$ip:$port");
$conn = new Mongo("mongodb://$ip:$port");
 // access database
$db = $conn->$dbName;
 // access collection
$collection = $db->user;
 // remove collection
$cursor = $collection->remove();
$conn->close();
} catch (MongoConnectionException $e) {
  die('Error connecting to MongoDB server');
} catch (MongoException $e) {
  die('Error: ' . $e->getMessage());
}

header("Location: index.php");
?>