<?php
include "../config.php";
//$data[]=array("message"=>"0");
$de="SELECT * FROM `user` WHERE `u_id`='$_POST[u_id]' AND `is_provider`='1'";
$dc=$con->query($de);
if($dc->num_rows==0){
  $data[]=array("message"=>"0");
}
else{
     $fetch=$dc->fetch_assoc();
     if($fetch[approval_status]=="p"){
         $data[]=array("message"=>"2");  
     }else{
     $data[]=array("provider_type"=>"$fetch[provider_type]", "u_id"=>"$fetch[u_id]", "shop_name"=>"$fetch[shop_name]", "shop_logo"=>"$fetch[shop_logo]", "owner_name"=>"$fetch[owner_name]", "shop_addreass"=>"$fetch[shop_addreass]", "shop_mobile"=>"$fetch[shop_mobile]", "shop_city"=>"$fetch[shop_city]", "shop_reg_no"=>"$fetch[shop_reg_no]", "shop_detail"=>"$fetch[shop_detail]", "paid_status"=>"$fetch[paid_status]", "trusted_status"=>"$fetch[trusted_status]", "csc_id"=>"$fetch[csc_id]", "bank_acc_no"=>"$fetch[bank_acc_no]", "ifsc"=>"$fetch[ifsc]", "bank_name"=>"$fetch[bank_name]", "pan_card_no"=>"$fetch[pan_card_no]", "approval_status"=>"$fetch[approval_status]", "message"=>"1");
     }
}
     echo (json_encode($data));

?>	