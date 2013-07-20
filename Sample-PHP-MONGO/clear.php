<?php 
try{
//connection to the database
$conn = new Mongo('localhost:27017');
 // access database
$db = $conn->testsamplephp;
 // access collection
$collection = $db->user;
 // remove collection
$cursor = $collection->remove();
$conn->close();
} catch (MongoConnectionException $e) {
  die('Error connecting to MongoDB server');
} catch (MongoException $e) {
  die('Error: ' . $e->getMessage());
}

header("Location: index.html");
?>