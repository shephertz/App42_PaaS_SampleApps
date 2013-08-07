<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>App42 PaaS Sample Php-Couch Application</title>
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
require_once "./lib/couch.php";
require_once "./lib/couchClient.php";
require_once "./lib/couchDocument.php";

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
$couch_dsn = "http://$ip:$port/";
$couch_db = $dbName;
$options = array();
$options['user'] = $user; 
$options['pass'] = $password;
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
</tbody>
         </table>
			<div align="left"><form action="clear.php" method="get"><input type="submit" value="Clear Data" /></form></div><br/><br/><a href="index.php">Create Post</a>
            </div>
            </div>
    	</div>
    </div>
</body>
</html>