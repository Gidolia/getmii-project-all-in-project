<?php
include "../config.php";

    $de="DELETE FROM `cart` WHERE `cart`.`p_id` = '$_POST[p_id]' AND `cart`.`u_id` = '$_POST[u_id]'";
    if($con->query($de)===TRUE)
    {
        
    }
    else{
            
        $pla="INSERT INTO `error_reports` (`er_id`, `ip_addreass`, `date`, `time`, `url`, `fail_query`, `note`, `s_note`, `app`) VALUES (NULL, '$ipad', '$date', '$time', '$url', '', 'cart delete', 'cart delete', '1');";
        $con->query($pla);
        }
?>