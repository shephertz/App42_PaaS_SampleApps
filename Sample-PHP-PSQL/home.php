<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>App42 Sample Php-PostgreSql Application</title>
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
                        <td>Name</td>
                        <td>Email</td>
                        <td>Description</td>
                        </tr>
                	</thead><tbody>
<?php 
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
$dbconn = pg_connect("host=$ip port=$port dbname=$dbName user=$user password=$password") 
		or die('Could not connect: ' . pg_last_error());
$query = "select * from app42_user";
$result = pg_query($query) or die('Query failed: ' . pg_last_error());
$numrows = pg_numrows($result);
for($ri = 0; $ri < $numrows; $ri++) {
	$row = pg_fetch_array($result, $ri);
	echo "<tr><td>" . $row['name']. "</td>";
	echo "<td>" . $row['email']. "</td>";
	echo "<td>" . $row['description']. "</td></tr>";
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