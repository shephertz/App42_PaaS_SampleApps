<?php 

$name = $_POST["username"]; 
$description = $_POST["description"]; 
$email = $_POST["email"]; 
//connection to the database
$dbhandle = mysql_connect("localhost", "root", "")
  or die("Unable to connect to MySQL");
echo "Connected to MySQL<br>";
$selected = mysql_select_db("testsamplephp",$dbhandle) ;
$result = mysql_query("INSERT INTO user(username,email,description) VALUES('$name','$email','$description')");

header("Location: home.php");

?>