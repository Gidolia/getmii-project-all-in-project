<?php
include "../config.php";
$ro="SELECT * FROM `user` WHERE `mobile`='$_POST[mobile]'";
$dc=$con->query($ro);
if($dc->num_rows=='0')
{
    //////////////////////////////for finding max uid
    $sel="SELECT MAX(u_id) AS max FROM `user`";
    $sed=$con->query($sel);
    $ad=$sed->fetch_assoc();
    $u_id=$ad[max]+1;
    /////////////////////////////////for finding amount to give on registration
    $ams="SELECT * FROM `admin_amount_to_distribute` WHERE `aatd_id`='2'";
    $asrr=$con->query($ams);
    $vrt=$asrr->fetch_assoc();
    $ins_reg="INSERT INTO `user` (`u_id`, `name`, `password`, `photo`, `mobile`, `a_mobile`, `email`, `city`, `state`, `pincode`, `house_no`, `addreass`, `u_states`, `last_login_date`, `last_login_time`, `create_date`, `create_time`, `refer_id`, `is_provider`, `provider_type`, `shop_name`, `shop_logo`, `owner_name`, `shop_addreass`, `shop_mobile`, `shop_city`, `shop_state`, `shop_reg_no`, `shop_detail`, `paid_status`, `trusted_status`, `csc_id`, `bank_acc_no`, `ifsc`, `bank_name`, `pan_card_no`, `approval_status`, `shop_status`, `shop_color`, `u_wallet`, `shop_add_wallet`, `shop_w_wallet`, `shop_r_date`, `shop_r_time`, `shop_a_date`, `shop_a_time`, `device_id`) VALUES ('$u_id', '$_POST[name]', '', '', '$_POST[mobile]', '', '$_POST[email]', '$_POST[city]', '', '', '', '$_POST[addreass]', 'y', '', '', '$date', '$time', '$_POST[refer_id]', '0', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '$vrt[amount]', '0', '0', '', '', '', '', '$_POST[device_id]');";
    
    //$ins_reg="INSERT INTO `user` (`u_id`, `name`, `password`, `photo`, `mobile`, `a_mobile`, `email`, `city`, `state`, `pincode`, `house_no`, `addreass`, `u_states`, `last_login_date`, `last_login_time`, `create_date`, `create_time`, `refer_id`, `is_provider`, `provider_type`, `shop_name`, `shop_logo`, `owner_name`, `shop_addreass`, `shop_mobile`, `shop_city`, `shop_state`, `shop_reg_no`, `shop_detail`, `paid_status`, `trusted_status`) VALUES ('$u_id', '$_POST[name]', '$_POST[password]', '', '$_POST[mobile]', '', '$_POST[email]', '$_POST[city]', '', '', '', '', 'y', '', '', '$date', '$time', '$_POST[refer_id]', 'n', '', '', '', '', '', '', '', '', '', '', '', '');";
    $ins_w="INSERT INTO `user_wallet_history` (`uwh_id`, `u_id`, `date`, `time`, `type`, `amount`, `b_bal`, `a_bal`, `note`, `s_note`) VALUES (NULL, '$u_id', '$date', '$time', '+', '$vrt[amount]', '0', '$vrt[amount]', 'Registration Bonus', 'Registration Bonus');";
    if($con->query($ins_reg)===TRUE && $con->query($ins_w)===TRUE){
        $data[]=array("u_id"=>"$u_id", "message"=>"1");
    }
    else{
        $data[]=array("message"=>"0");
        $pla="INSERT INTO `error_reports` (`er_id`, `ip_addreass`, `date`, `time`, `url`, `fail_query`, `note`, `s_note`, `app`) VALUES (NULL, '$ipad', '$date', '$time', '$url', '', 'Registration Failed', '$_POST[mobile]', '1');";
      
        $con->query($pla);
    }
}else{
    $data[]=array("message"=>"2");
}
     echo (json_encode($data));

?>