<html>
<body>
<title>App42 Sample Php-Couch Application</title>
<body>
<table border='1'><tr><td><b>Id</b></td><td><b>Data</b></td></tr>
<?php 
require_once "./lib/couch.php";
require_once "./lib/couchClient.php";
require_once "./lib/couchDocument.php";

$couch_dsn = "http://10.0.0.52:29005/";
$couch_db = "testsamplephp";
$options = array();
$options['user'] = "23h4ngu5erxu9aty"; 
$options['pass'] = "95zkrt6zlfu2racvaboccae9nklpwks3";
try{
	$client = new couchClient($couch_dsn,$couch_db,$options);
}catch(Exception $e){
	$client = new couchClient($couch_dsn,$couch_db,$options);
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
</table><div align="left"><form action="clear.php" method="get"><input type="submit" value="Clear Data" /></form></div><br/><br/><a href="index.php">Create Post</a>
</body>
</html>