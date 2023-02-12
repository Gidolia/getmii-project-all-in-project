<?php
include "../config.php";
if($_POST[shop_id]>0){
    $upd="UPDATE `user` SET `bank_name` = '$_POST[bank_name]', `bank_acc_no`='$_POST[bank_acc_no]', `ifsc`='$_POST[ifsc]' WHERE `user`.`u_id` = '$_POST[shop_id]';";
    if($con->query($upd)===TRUE){
        $data[]=array("message"=>"1");
    }
    else{
        $data[]=array("message"=>"0");  
    }
      
}
 echo (json_encode($data));

?>