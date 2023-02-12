<?php
include "../config.php";
//$date1 = date("Y-m-d", strtotime($date.'+ '.$_POST[days].' days'));

$sad="UPDATE `user` SET `device_id` = '$_POST[device_id]' WHERE `user`.`u_id` = '$_POST[u_id]';";
if($con->query($sad)===TRUE){
     $data[]=array("message"=>"1");
}else{
     $data[]=array("message"=>"0");
}echo (json_encode($data));
?>