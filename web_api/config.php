<?php

        header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
        header('Access-Control-Allow-Credentials: true');
        header('Access-Control-Max-Age: 86400');    // cache for 1 day
    
    
 
        
        if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
            // may also be using PUT, PATCH, HEAD etc
            header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
        
        if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
            header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");
    
        


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

function get_client_ip() {
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR')) 
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
       $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}
$ipad=get_client_ip();
$url = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

$asdddfghbfgbikiktyhth=file_get_contents("php://input");
$_POST=json_decode($asdddfghbfgbikiktyhth,true);
$rec_activity="INSERT INTO `activity_record` (`ar_id`, `ip_addreass`, `url`, `date`, `time`, `admin_id`, `u_id`, `s_id`, `token_id`, `city`) VALUES (NULL, '$ipad', '$url', '$date', '$time', '$_SESSION[a_id]', '$_POST[csc_id]', '$_POST[place_id]', '$_POST[c_id]', '$_POST[city]');"; 
$con->query($rec_activity);


?>