<?php
include "../config.php";
if(isset($_POST[u_id]))
{
    $upd="UPDATE `user` SET `shop_color` = '$_POST[color]' WHERE `user`.`u_id` = '$_POST[u_id]';";
    if($con->query($upd)===TRUE){
        $data[]=array("message"=>"1");
    }
    else{
        $data[]=array("message"=>"0");
    $pla="INSERT INTO `error_reports` (`er_id`, `ip_addreass`, `date`, `time`, `url`, `fail_query`, `note`, `s_note`, `app`) VALUES (NULL, '$ipad', '$date', '$time', '$url', '', 'Shop color change', '$_POST[u_id]', '1');";
        $con->query($pla);
    }
}else{
    $data[]=array("message"=>"0");
}
echo (json_encode($data));