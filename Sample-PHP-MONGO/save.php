<?php 

$name = $_POST["username"]; 
$description = $_POST["description"]; 
$email = $_POST["email"]; 
try{
//connection to the database
$conn = new Mongo('localhost:27017');
 // access database
$db = $conn->testsamplephp;
 // access collection
$collection = $db->user;
 // insert a new document
$item = array(
    'username' => $name,
    'email' => $email,
    'description' => $description
  );
$collection->insert($item);
 // disconnect from server
$conn->close();
} catch (MongoConnectionException $e) {
  die('Error connecting to MongoDB server');
} catch (MongoException $e) {
  die('Error: ' . $e->getMessage());
}
header("Location: home.php");

?>