<html>
<body>
<title>App42 Sample Php-Postgres Application</title>
<body>
<table border='1'><tr><td><b>Username</b></td><td><b>Email</b></td><td><b>Description</b></td></tr>
<?php 
$dbconn = pg_connect("host=localhost port=5432 dbname=testsamplephp user=postgres password=root") 
		or die('Could not connect: ' . pg_last_error());
$query = "select * from app42_user";
$result = pg_query($query) or die('Query failed: ' . pg_last_error());
$numrows = pg_numrows($result);
for($ri = 0; $ri < $numrows; $ri++) {
	$row = pg_fetch_array($result, $ri);
	echo "<tr><td>" . $row['username']. "</td>";
	echo "<td>" . $row['email']. "</td>";
	echo "<td>" . $row['description']. "</td></tr>";
}

?>
</table><div align="left"><form action="clear.php" method="get"><input type="submit" value="Clear Data" /></form></div><br/><br/><a href="index.html">Create Post</a>
</body>
</html>