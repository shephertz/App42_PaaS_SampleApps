<?php 

$name = $_POST["username"]; 
$description = $_POST["description"]; 
$email = $_POST["email"]; 
//connection to the database
$dbhandle = mysql_connect("10.0.0.52:36514", "d3nih43ocwg1awyl", "v6jctfjy074tcee0t56xsqbax75k5wec", "testsamplejava")
  or die("Unable to connect to MySQL");
echo "Connected to MySQL<br>";
$selected = mysql_select_db("testsamplejava",$dbhandle) ;
$result = mysql_query("INSERT INTO user(username,email,description) VALUES('$name','$email','$description')");

header("Location: home.php");

?>