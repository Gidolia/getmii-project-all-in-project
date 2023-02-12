<?php
include "../config.php";
$ins="INSERT INTO `help` (`h_id`, `shop_id`, `mobile`, `email`, `message`, `date`, `time`) VALUES (NULL, '$_POST[u_id]', '$_POST[mobile]', '$_POST[email]', '$_POST[message]', '$date', '$time');";
if($con->query($ins)===TRUE){
        $data[]=array("message"=>"1");
    }else{
        $data[]=array("message"=>"0");
        $pla="INSERT INTO `error_reports` (`er_id`, `ip_addreass`, `date`, `time`, `url`, `fail_query`, `note`, `s_note`, `app`) VALUES (NULL, '$ipad', '$date', '$time', '$url', '', 'insert Help', '$_POST[u_id]', '1');";
        $con->query($pla);
    }
    echo (json_encode($data));
?>