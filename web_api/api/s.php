<?php
include "../config.php";
session_start();
$_SESSION[id]='1';
$data[]=array("message"=>"0");
     
     echo (json_encode($data));
?>