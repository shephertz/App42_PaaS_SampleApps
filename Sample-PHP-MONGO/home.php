<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>App42 Sample Php-Mongo Application</title>
<link href="css/style-User-Input-Form.css" rel="stylesheet" type="text/css">
</head>

<body>
	<div class="App42PaaS_header_wrapper">
    	<div class="App42PaaS_header_inner">
        	<div class="App42PaaS_header">  
                <div class="logo"> 
                    <a href="http://paas.shephertz.com"><img border="0" alt="App42PaaS" src="images/logo.png"></img></a>
                 </div>     
            </div> 
    	</div>
	</div>
<!------------------------------------Header Closed------------------------------------------->
	<div class="App42PaaS_body_wrapper">
    	<div class="App42PaaS_body">
        	<div class="App42PaaS_body_inner">
            <div class="contactPage_title">
            	<table>
                	<thead class="table-head">
                    	<tr>
                        <td>Id</td>
                        <td>Result</td>
                        </tr>
                	</thead><tbody>
<?php 
try{
//connection to the database
$lines = file("Config.properties");
$user;
$dbName;
$ip;
$port;
$password; 
foreach ($lines as $line) {
        list($k, $v) = explode('=', $line);
		if (rtrim(ltrim($k)) == rtrim(ltrim("app42.paas.db.username"))) {
			$user = rtrim(ltrim($v));
        }if (rtrim(ltrim($k)) == rtrim(ltrim("app42.paas.db.port"))) {
			$port = rtrim(ltrim($v));
        }if (rtrim(ltrim($k)) == rtrim(ltrim("app42.paas.db.password"))) {
			$password = rtrim(ltrim($v));
        }if (rtrim(ltrim($k)) == rtrim(ltrim("app42.paas.db.ip"))) {
			$ip = rtrim(ltrim($v));
        }if (rtrim(ltrim($k)) == rtrim(ltrim("app42.paas.db.name"))) {
			$dbName = rtrim(ltrim($v));
        }
 }
// create connection
$conn = new Mongo("mongodb://$ip:$port");
// access database
$db = $conn->$dbName;
// authenticate
$db->authenticate($user, $password);
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
</tbody>
         </table>
			<div align="left"><form action="clear.php" method="get"><input type="submit" value="Clear Data" /></form></div><br/><br/><a href="index.php">Create Post</a>
            </div>
            </div>
    	</div>
    </div>
</body>
</html>