<?php
/*
include "config.php";
$se="SELECT * FROM `users`";
$re=$con->query($se);
while($sad=$re->fetch_assoc())
{
    if($sad[shop_name]!=""){
        $iss=1;
    }else{
        $iss=0;
    }
    $de="INSERT INTO `user` (`u_id`, `name`, `password`, `photo`, `mobile`, `a_mobile`, `email`, `city`, `state`, `pincode`, `house_no`, `addreass`, `u_states`, `last_login_date`, `last_login_time`, `create_date`, `create_time`, `refer_id`, `is_provider`, `provider_type`, `shop_name`, `owner_name`, `shop_addreass`, `shop_mobile`, `shop_city`, `shop_state`, `shop_reg_no`, `shop_detail`, `paid_status`, `trusted_status`, `csc_id`) VALUES ('$sad[id]', '$sad[name]', '$sad[password]', '$sad[photo]', '$sad[mobile]', '', '$sad[email]', '$sad[city]', '$sad[state]', '', '', '$sad[addreass]', 'y', '', '', '', '', '', '$iss', 'shop', '$sad[shop_name]', '$sad[owner_name]', '$sad[shop_address]', '$sad[shop_number]', '$sad[shop_city]', '$sad[shop_state]', '$sad[reg_number]', '$sad[shop_details]', '$sad[paid_status]', '', '$sad[cat_id]');";
    $con->query($de);
}

*/


include "config.php";
$se="SELECT * FROM `users`";
$re=$con->query($se);
while($sad=$re->fetch_assoc())
{
    if($sad[shop_name]!=""){
        $iss=1;
        if($sad[trusted_status]>0){
            $trust=1;
            $val=2000;
            $paid=0;
        }elseif($sad[paid_status]>0){
            $paid=1;
            $val=1000;
            $trust=0;
        }else{
            $val=70;
            $trust=0;
            $paid=0;
        }
    }else{
        $iss=0;
    }
    
    
    $de="INSERT INTO `user`(`u_id`, `name`, `password`, `photo`, `mobile`, `a_mobile`, `email`, `city`, `state`, `pincode`, `house_no`, `addreass`, `u_states`, `last_login_date`, `last_login_time`, `create_date`, `create_time`, `refer_id`, `is_provider`, `provider_type`, `shop_name`, `shop_logo`, `owner_name`, `shop_addreass`, `shop_mobile`, `shop_city`, `shop_state`, `shop_reg_no`, `shop_detail`, `paid_status`, `trusted_status`, `csc_id`, `bank_acc_no`, `ifsc`, `bank_name`, `pan_card_no`, `approval_status`, `shop_status`, `shop_color`, `u_wallet`, `shop_add_wallet`, `shop_w_wallet`, `shop_r_date`, `shop_r_time`, `shop_a_date`, `shop_a_time`, `device_id`, `about_us`, `fb_link`, `insta_link`, `linkedin_link`, `web_link`) 
    VALUES('$sad[id]', '$sad[name]', '$sad[password]', '', '$sad[mobile]', '', '$sad[email]', '$sad[city]', '$sad[state]', '', '', '$sad[address]', 'y', '', '', '', '', '', '$iss', 'shop', '$sad[shop_name]','', '$sad[owner_name]', '$sad[shop_address]', '$sad[shop_number]', '$sad[shop_city]', '$sad[state]', '$sad[reg_number]', '$sad[shop_details]', '$paid', '$trust','$sad[cat_id]','$sad[back_acc_number]','$sad[ifsc_code]','$sad[bank_name]','','','','','','$val','','','','','','','','','','', '');";
    $res=$con->query($de);
    // print_r($de);
    // die;
    if($res==TRUE){
        echo "Success";
    }else{
        echo "Failed $sad[id]";
    }
    echo "<br>";
}
?>