<?php
include "../config.php";
session_start();
//$_SESSION[id]='1';
//echo $_SESSION[id];
$data[]=array("message"=>"$_SESSION[id]");
     
     echo (json_encode($data));
?>