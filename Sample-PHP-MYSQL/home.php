<html>
<body>
<title>App42 Sample Php-MySql Application</title>
<body>
<table border='1'><tr><td><b>Username</b></td><td><b>Email</b></td><td><b>Description</b></td></tr>
<?php 
//connection to the database
$dbhandle = mysql_connect("10.0.0.52:36514", "d3nih43ocwg1awyl", "v6jctfjy074tcee0t56xsqbax75k5wec", "testsamplejava")
  or die("Unable to connect to MySQL");
$selected = mysql_select_db("testsamplejava",$dbhandle);
$result = mysql_query("select * from user");
$size = sizeof(mysql_fetch_array($result));
$result = mysql_query("select * from user");
while ($row = mysql_fetch_array($result)) {
   echo "<tr><td>".$row{'username'}."</td><td>".$row{'email'}."</td><td>".$row{'description'}."</td></tr>";
}
?>
</table><div align="left"><form action="clear.php" method="get"><input type="submit" value="Clear Data" /></form></div><br/><br/><a href="index.php">Create Post</a>
</body>
</html>