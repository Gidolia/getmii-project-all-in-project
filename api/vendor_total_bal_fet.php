<?php
include "../config.php";

$de="SELECT u_id,shop_add_wallet,shop_w_wallet FROM `user` WHERE `u_id`='$_POST[u_id]'";

$dc=$con->query($de);
     if($dc->num_rows>0)
     {
         $fer=$dc->fetch_assoc();
         $total=$fer[shop_w_wallet]+$fer[shop_add_wallet];
         $data[]=array("u_id"=>"$fer[u_id]", "shop_add_wallet"=>"$fer[shop_add_wallet]", "shop_w_wallet"=>"$fer[shop_w_wallet]", "total_bal"=>"$total", "message"=>"1");
     }else{
       $data[]=array("message"=>"0");
     
     }
     echo (json_encode($data));
     
?>
