<?php
include "../config.php";

$ins="UPDATE `user` SET `shop_status` = '$_POST[status]' WHERE `user`.`u_id` = '$_POST[u_id]';";
if($con->query($ins)===TRUE){
        $data[]=array("message"=>"1");
    }else{
        $data[]=array("message"=>"0");
        $pla="INSERT INTO `error_reports` (`er_id`, `ip_addreass`, `date`, `time`, `url`, `fail_query`, `note`, `s_note`, `app`) VALUES (NULL, '$ipad', '$date', '$time', '$url', '', 'Update Shop Status', '$_POST[u_id]', '1');";
        $con->query($pla);
    }
    echo (json_encode($data));
?>