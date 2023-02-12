<?php
include "../config.php";
if($_POST[cart_id]>0){
    $de="DELETE FROM `cart` WHERE `cart`.`cart_id` = '$_POST[cart_id]'";
    if($con->query($de)===TRUE)
    {
        
    }
    else{
            
        $pla="INSERT INTO `error_reports` (`er_id`, `ip_addreass`, `date`, `time`, `url`, `fail_query`, `note`, `s_note`, `app`) VALUES (NULL, '$ipad', '$date', '$time', '$url', '', 'cart delete', 'cart delete', '1');";
        $con->query($pla);
        }
}
