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
$dbconn = pg_connect("host=$ip port=$port dbname=$dbName user=$user password=$password") 
		or die('Could not connect: ' . pg_last_error());
try{
	pg_query("CREATE TABLE app42_user(name VARCHAR(255), email VARCHAR(355), description TEXT)");
}catch(Exception $e){
	print_r("Table Already Created");
}		
		
$query = "insert into app42_user(name,email,description) values('$name','$email','$description')";
$result = pg_query($query) or die('Query failed: ' . pg_last_error());
pg_close($dbconn);

header("Location: home.php");

?>