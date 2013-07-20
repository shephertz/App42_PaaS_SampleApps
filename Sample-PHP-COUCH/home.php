<html>
<body>
<title>App42 Sample Php-Couch Application</title>
<body>
<table border='1'><tr><td><b>Id</b></td><td><b>Data</b></td></tr>
<?php 
require_once "./lib/couch.php";
require_once "./lib/couchClient.php";
require_once "./lib/couchDocument.php";

$couch_dsn = "http://localhost:5984/";
$couch_db = "testsamplephp";

try{
	$client = new couchClient($couch_dsn,$couch_db);
}catch(Exception $e){
	$client = new couchClient($couch_dsn,$couch_db);
	$client->createDatabase();
}

try {
	$response = $client->getAllDocs();
	#print_r($response);
  foreach ($response->rows as $row ) {
     echo "<tr><td>" . $row->id. "</td>";
     echo "<td>" ;
	 print_r($client->asArray()->getDoc($row->id));
	 echo "</td></tr>";
 }

} catch (Exception $ex) {
	#echo "<h1>No Data Found</h1>";
}

?>
</table><div align="left"><form action="clear.php" method="get"><input type="submit" value="Clear Data" /></form></div><br/><br/><a href="index.html">Create Post</a>
</body>
</html>