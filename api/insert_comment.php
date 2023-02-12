<?php
include "../config.php";
$df="INSERT INTO `shop_like_comment` (`slc_id`, `user_id`, `shop_id`, `like`, `comment`, `date`, `time`) VALUES (NULL, '$_POST[u_id]', '$_POST[shop_id]', '', '$_POST[comment]', '$date', '$time');";
if($con->query($df)===TRUE)
    {
        $data[]=array("message"=>"1");
    }else{
        $data[]=array("message"=>"0");
        $pla="INSERT INTO `error_reports` (`er_id`, `ip_addreass`, `date`, `time`, `url`, `fail_query`, `note`, `s_note`, `app`) VALUES (NULL, '$ipad', '$date', '$time', '$url', '', 'shop follow', '$_POST[u_id]', '1');";
            $con->query($pla);
    }
    echo (json_encode($data));
?>