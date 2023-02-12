<?php
include "../config.php";

$ro="SELECT * FROM `user` WHERE `mobile`='$_POST[mobile]'";

$dc=$con->query($ro);
     if($dc->num_rows>'0')
     {
         
         $fetch=$dc->fetch_assoc();
         $response[]=array("u_id"=>"$fetch[u_id]", "name"=>"$fetch[name]","owner_name"=>"$fetch[owner_name]","shop_name"=>"$fetch[shop_name]","shop_mobile"=>"$fetch[shop_mobile]",
         "bank_acc_no"=>"$fetch[bank_acc_no]", "shop_address"=>"$fetch[shop_addreass]","shop_city"=>"$fetch[shop_city]",
         "shop_logo"=>"$fetch[shop_logo]",
         "mobile"=>"$fetch[mobile]", "photo"=>"$fetch[photo]", "city"=>"$fetch[city]", "email"=>"$fetch[email]", "refer_id"=>"$fetch[refer_id]", "addreass"=>"$fetch[addreass]","u_wallet"=>"$fetch[u_wallet]", "message"=>"1");
         
         
        
        
     }else{
     $response[] = array("message"=>"0");
     }
     
     echo (json_encode($response));
     
        
?>