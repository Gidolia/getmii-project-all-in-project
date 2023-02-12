<?php
include "../config.php";

$up="UPDATE `orders` SET `o_confirmed` = '$_GET[o_confirmed]' WHERE `orders`.`o_id` = '$_GET[o_id]';";
$ins="INSERT INTO `order_manager` (`om_id`, `o_id`, `o_confirmed`, `date`, `time`) VALUES (NULL, '$_GET[o_id]', '$_GET[o_confirmed]', '$date', '$time');";

if($con->query($up)===TRUE && $con->query($ins)===TRUE){
        $data[]=array("message"=>"1");
    }else{
        $data[]=array("message"=>"0");
        $pla="INSERT INTO `error_reports` (`er_id`, `ip_addreass`, `date`, `time`, `url`, `fail_query`, `note`, `s_note`, `app`) VALUES (NULL, '$ipad', '$date', '$time', '$url', '', 'o_confirmed', '$_GET[o_id]', '1');";
        $con->query($pla);
    }

    echo (json_encode($data));
?>