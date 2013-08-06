<?php 

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
$dbhandle = mysql_connect("$ip:$port", $user, $password, $dbName)
  or die("Unable to connect to MySQL");
echo "Connected to MySQL<br>";
$selected = mysql_select_db($dbName,$dbhandle) or die(mysql_error());
try{
	$sql = "CREATE TABLE user(name VARCHAR(255), email VARCHAR(355), description TEXT)";
	mysql_query($sql,$dbhandle);
}catch(Exception $e){
	 print_r("Table Already Created");
}
$result = mysql_query("INSERT INTO user(name,email,description) VALUES('$name','$email','$description')");

header("Location: home.php");


?>