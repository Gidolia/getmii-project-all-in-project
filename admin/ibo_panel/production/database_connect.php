<?php
//error_reporting(E_ERROR | E_PARSE);
$host="localhost";
$username="getmii";
$pass="Getmii@123";
$db_name="getmii_new";

/////////////////connection
$con=new MySQLi($host, $username, $pass, $db_name);

if($con->connect_error){
	die("connection failed: " . $con->connect_error);
}
else
date_default_timezone_set('Asia/Calcutta');
$time=date("H:i:s");
$date=date("Y-m-d");

?>