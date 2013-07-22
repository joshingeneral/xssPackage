<?php
####################################
# File created by @joshingeneral   #
# part of the xssPackage           #
# date 07/01/2013                  #
####################################
include('config.php');
//running this file should:
//1) create all the tables required for this project
//2) inserts all the test data required for this project
echo "<html>
	<center>";
$sqlusers = 'CREATE TABLE `capture` (`cookie` VARCHAR(1028) NULL) ENGINE = MyISAM';
@$db = new mysqli($hostname, $db_username, $db_password, $dbname);

if($db->connect_error){
        echo "Error 100 :" . $db->connect_error . "<br>"; 
        echo "Attempting to create database <br>";
        @$db2 = new mysqli($hostname, $db_username, $db_password);
	$sqlcreatedb = "CREATE DATABASE IF NOT EXISTS $dbname";
	$result = $db2->query($sqlcreatedb);	
	@$db = new mysqli($hostname, $db_username, $db_password, $dbname);
}
$sqldrop = "drop tables if exists capture";
$result = $db->query($sqldrop);
if($result){
        echo "capture table dropped <br>";
}
else{
        echo "Error 101 : " . $db->error . "<br>";
}
$result = $db->query($sqlusers);
if($result){
        echo "capture table created. <br>";
}
else{
        echo "Error 102 : " . $db->error . "<br>";
}
$db->close();

echo "</center>
	</html>";
?>

