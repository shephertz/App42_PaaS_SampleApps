<?php 
$dbconn = pg_connect("host=localhost port=5432 dbname=testsamplephp user=postgres password=root") 
		or die('Could not connect: ' . pg_last_error());
$query = "delete from app42_user";
$result = pg_query($query) or die('Query failed: ' . pg_last_error());
header("Location: index.php");
?>