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
                        <td>Data</td>
                        </tr>
                	</thead><tbody>
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
</tbody>
         </table>
			<div align="left"><form action="clear.php" method="get"><input type="submit" value="Clear Data" /></form></div><br/><br/><a href="index.php">Create Post</a>
            </div>
            </div>
    	</div>
    </div>
</body>
</html>