<?php
include "../config.php";

$ro="SELECT * FROM `user` WHERE `mobile`='$_POST[mobile]'";

$dc=$con->query($ro);
     if($dc->num_rows>'0')
     {
         $otp=rand(1000,9999);
         $fetch=$dc->fetch_assoc();
         $response[]=array("u_id"=>"$fetch[u_id]", "name"=>"$fetch[name]","owner_name"=>"$fetch[owner_name]","shop_name"=>"$fetch[shop_name]","shop_mobile"=>"$fetch[shop_mobile]",
         "bank_acc_no"=>"$fetch[bank_acc_no]", "shop_address"=>"$fetch[shop_addreass]","shop_city"=>"$fetch[shop_city]",
         "shop_logo"=>"$fetch[shop_logo]",
         "mobile"=>"$fetch[mobile]", "photo"=>"$fetch[photo]", "city"=>"$fetch[city]", "email"=>"$fetch[email]", "refer_id"=>"$fetch[refer_id]", "addreass"=>"$fetch[addreass]", "message"=>"1", "otp"=>"$otp");
         
         $message='Welcome to oranga , '.$fetch[name].' your id OR'.$otp.' pass '.$otp.' thanks Orgwel';
	                
	                $dd = str_replace(' ', '%20', $message);
        $url = 'http://sms.hspsms.com/sendSMS?username=oranga&message='.$dd.'&sendername=ORGWEL&smstype=TRANS&numbers='.$fetch[mobile].'&apikey=67b73c31-8c2e-4406-aafd-dda03cf3d224';
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $responsew = curl_exec($ch);
        
        
     }else{
     $response[] = array("message"=>"0");
     }
     
     echo (json_encode($response));
     
        
?>