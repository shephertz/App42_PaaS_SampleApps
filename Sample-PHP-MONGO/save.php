<?php 

$name = $_POST["name"]; 
$description = $_POST["description"]; 
$email = $_POST["email"]; 
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
// create connection
$conn = new Mongo("mongodb://$ip:$port");
// access database
$db = $conn->$dbName;
// authenticate
$db->authenticate($user, $password);
// access collection
$collection = $db->user;
// insert a new document
$item = array(
    'name' => $name,
    'email' => $email,
    'description' => $description
  );
$collection->insert($item);
 // disconnect from server
$conn->close();
} catch (MongoConnectionException $e) {
  die('Error connecting to MongoDB server');
} catch (MongoException $e) {
  die('Error: ' . $e->getMessage());
}
header("Location: home.php");

?>