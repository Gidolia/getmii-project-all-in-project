<?php
include "../config.php";
if($_POST[u_id]>0){
    $upd="UPDATE `user` SET `name` = '$_POST[name]', `email`='$_POST[email]', `city`='$_POST[city]', `pincode`='$_POST[pincode]', `addreass`='$_POST[addreass]' WHERE `user`.`u_id` = '$_POST[u_id]';";
    if($con->query($upd)===TRUE){
        $data[]=array("message"=>"1");  
    }
    else{
        $data[]=array("message"=>"0");  
    }
      
}
 echo (json_encode($data));

?>