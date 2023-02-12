<?php
include "../config.php";
if($_POST[shop_id]>0){
    $upd="UPDATE `user` SET `owner_name` = '$_POST[owner_name]', `shop_name`='$_POST[shop_name]', `shop_mobile`='$_POST[shop_mobile]', `shop_city`='$_POST[shop_city]', `shop_addreass`='$_POST[shop_addreass]', `about_us`='$_POST[shop_detail]', `fb_link`='$_POST[fb]', `linkedin_link`='$_POST[linked]', `insta_link`='$_POST[insta]', `web_link`='$_POST[web]', `bank_name`='$_POST[b_name]', `bank_acc_no`='$_POST[b_account]', `ifsc`='$_POST[b_ifsc]' WHERE `user`.`u_id` = '$_POST[shop_id]';";
    if($con->query($upd)===TRUE){
        $data[]=array("message"=>"1");
    }
    else{
        $data[]=array("message"=>"0");  
    }
      
}
 echo (json_encode($data));

?>