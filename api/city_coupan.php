<?php
include "../config.php";
//$data[]=array("message"=>"0");
$de="SELECT * FROM `coupan_shop` WHERE `city`='$_GET[city]' AND `e_date`>='$date'";
$dc=$con->query($de);
if($dc->num_rows==0){
  $data[]=array("message"=>"0");  
}
else{
     while($fetch=$dc->fetch_assoc()){
         
        $pro="SELECT * FROM `user` WHERE `u_id`='$fetch[shop_id]'";
        $prod=$con->query($pro);
        $s_fet=$prod->fetch_assoc();
        
         $data[]=array("cs_id"=>"$fetch[cs_id]", "img"=>"$fetch[img]", "e_date"=>"$fetch[e_date]", "discount"=>"$fetch[discount]", "status"=>"$fetch[status]", "shop_id"=>"$fetch[shop_id]", "shop_name"=>"$s_fet[shop_name]", "shop_logo"=>"$s_fet[shop_logo]", "message"=>"1");
     }
}
     echo (json_encode($data));
?>	