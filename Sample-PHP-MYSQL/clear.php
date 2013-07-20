<?php 
//connection to the database
$dbhandle = mysql_connect("localhost", "root", "")
  or die("Unable to connect to MySQL");
$selected = mysql_select_db("testsamplephp",$dbhandle);
$result = mysql_query("delete from user");

header("Location: index.html");
?>