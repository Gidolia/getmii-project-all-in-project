<?php
include "../config.php";
$sel_s="SELECT * FROM `user` WHERE `u_id`='$_POST[shop_id]'";
$que_s=$con->query($sel_s);
$s_fet=$que_s->fetch_assoc();
$s_bal=$s_fet[shop_w_wallet]+$_POST[amount];

$sel_u="SELECT * FROM `user` WHERE `u_id`='$_POST[u_id]'";
$que_u=$con->query($sel_u);
$u_fet=$que_u->fetch_assoc();
$u_lbal=$u_fet[u_wallet]-$_POST[amount];
if($u_lbal>=0){
    $u_note="Paid to ".$s_fet[shop_name];
   $u_user="INSERT INTO `user_wallet_history` (`uwh_id`, `u_id`, `date`, `time`, `type`, `amount`, `b_bal`, `a_bal`, `note`, `s_note`) VALUES (NULL, '$_POST[u_id]', '$date', '$time', '-', '$_POST[amount]', '$u_fet[u_wallet]', '$u_lbal', '$u_note', '$_POST[shop_id]');";
   $u_up="UPDATE `user` SET `u_wallet` = '$u_lbal' WHERE `user`.`u_id` = $_POST[u_id];";
   
   $s_note="Received From ".$u_fet[name];
   $s_ins="INSERT INTO `shop_w_wallet_history` (`swwh_id`, `shop_id`, `type`, `date`, `time`, `amount`, `b_bal`, `a_bal`, `note`, `s_note`) VALUES (NULL, '$_POST[shop_id]', '+', '$date', '$time', '$_POST[amount]', '$s_fet[shop_w_wallet]', '$s_bal', 'Received', '$_POST[u_id]');";
   $s_up="UPDATE `user` SET `shop_w_wallet` = '$s_bal' WHERE `user`.`u_id` = '$_POST[shop_id]';";
   if($con->query($u_user)===TRUE && $con->query($u_up)===TRUE && $con->query($s_up)===TRUE && $con->query($s_ins)===TRUE)
   {
       $data[]=array("message"=>"1");  
   }else{
       $data[]=array("message"=>"0");  
   }
}else{$data[]=array("message"=>"2");  
}
echo (json_encode($data));

?>

