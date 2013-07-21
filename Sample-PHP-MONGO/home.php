<html>
<body>
<title>App42 Sample Php-Mongo Application</title>
<body>
<table border='1'><tr><td><b>Id</b></td><td><b>Data</b></td></tr>
<?php 
try{
//connection to the database
$conn = new Mongo('localhost:27017');
 // access database
$db = $conn->testsamplephp;
 // access collection
$collection = $db->user;
 // retrieve all documents
$cursor = $collection->find();
foreach ($cursor as $obj) {
	echo "<tr><td>" . $obj['_id']. "</td>";
    #echo "<td>" . $obj. "</td></tr>";
    echo "<td>" ;
	print_r($obj);
	echo "</td></tr>";
    #echo "<td>" . $obj['description'] . "</td></tr>";
  }
  
$conn->close();
} catch (MongoConnectionException $e) {
  die('Error connecting to MongoDB server');
} catch (MongoException $e) {
  die('Error: ' . $e->getMessage());
}
?>
</table><div align="left"><form action="clear.php" method="get"><input type="submit" value="Clear Data" /></form></div><br/><br/><a href="index.php">Create Post</a>
</body>
</html>