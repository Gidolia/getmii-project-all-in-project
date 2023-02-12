<?php
include "../config.php";

$rfe="UPDATE `user` SET `is_provider` = '1', `shop_name`='$_POST[shop_name]', `owner_name`='$_POST[owner_name]', `shop_addreass`='$_POST[shop_address]', `shop_mobile`='$_POST[shop_number]', `shop_reg_no`='$_POST[gst]', `bank_acc_no`='$_POST[bank_account]', `ifsc`='$_POST[ifsc]', `bank_name`='$_POST[bank_name]', `shop_detail`='$_POST[shop_detail]', `shop_city`='$_POST[shop_city]', `pan_card_no`='$_POST[message]', `provider_type`='shop', `approval_status`='p', `shop_r_date`='$date', `shop_r_time`='$time', `shop_status`='1', `csc_id`='$_POST[c_id]' WHERE `user`.`u_id` = '$_POST[u_id]';";
if($con->query($rfe)===TRUE)
{
     $data[]=array("message"=>"1", "u_id"=>"$_POST[u_id]");
     
}else{
    
    $data[]=array("message"=>"0");
     $pla="INSERT INTO `error_reports` (`er_id`, `ip_addreass`, `date`, `time`, `url`, `fail_query`, `note`, `s_note`, `app`) VALUES (NULL, '$ipad', '$date', '$time', '$url', '', 'Update shop registration', 'Update shop registration', '1');";
        $con->query($pla);
}
echo (json_encode($data));

?>