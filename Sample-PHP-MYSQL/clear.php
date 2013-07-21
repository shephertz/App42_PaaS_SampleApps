<?php 
//connection to the database
$dbhandle = mysql_connect("10.0.0.52:36514", "d3nih43ocwg1awyl", "v6jctfjy074tcee0t56xsqbax75k5wec", "testsamplejava")
  or die("Unable to connect to MySQL");
$selected = mysql_select_db("testsamplejava",$dbhandle);
$result = mysql_query("delete from user");

header("Location: index.html");
?>