<?php 

$name = $_POST["username"]; 
$description = $_POST["description"]; 
$email = $_POST["email"]; 

$dbconn = pg_connect("host=localhost port=5432 dbname=testsamplephp user=postgres password=root") 
		or die('Could not connect: ' . pg_last_error());
$query = "insert into app42_user(username,email,description) values('$name','$email','$description')";
$result = pg_query($query) or die('Query failed: ' . pg_last_error());
pg_close($dbconn);

header("Location: home.php");

?>