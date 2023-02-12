<?php
 include "../config.php";
$se="DELETE FROM `wishlist` WHERE `wishlist`.`w_id` = '$_POST[w_id]'";
if($con->query($se)===TRUE)
{
    
}else{
$pla="INSERT INTO `error_reports` (`er_id`, `ip_addreass`, `date`, `time`, `url`, `fail_query`, `note`, `s_note`, `app`) VALUES (NULL, '$ipad', '$date', '$time', '$url', '$de', 'cart delete', 'cart delete', '1');";
        $con->query($pla);}
?>