<?php
include "../config.php";
//$data[]=array("message"=>"0");
$de="SELECT * FROM `coupan_shop` WHERE `cs_id`='$_POST[cs_id]';";
$dc=$con->query($de);
if($dc->num_rows==0){
  $data[]=array("message"=>"0"); 
}
else{
     $fetch=$dc->fetch_assoc();
     $ad=json_decode($fetch[data]);

//print_r ($ad);
foreach ($ad as $obj)
{
    $p_sel="SELECT * FROM `product` WHERE `p_id`='$obj->p_id'";
    $p_que=$con->query($p_sel);
    $p_fet=$p_que->fetch_assoc();
    
    
    
    
         $data[]=array("p_id"=>"$obj->p_id", "qty"=>"$obj->qty", "product_name"=>"$p_fet[product_name]", "photo1"=>"$p_fet[photo1]", "photo2"=>"$p_fet[photo2]", "photo3"=>"$p_fet[photo3]", "photo4"=>"$p_fet[photo4]", "mrp"=>"$p_fet[mrp]", "sp"=>"$p_fet[sp]", "delivery_charge"=>"$p_fet[delivery_charge]", "return_policy"=>"$p_fet[return_policy]", "long_description"=>"$p_fet[long_description]", "short_description"=>"$p_fet[short_description]", "brand_name"=>"$p_fet[brand_name]", "offer"=>"$fetch[discount]", "shop_id"=>"$fetch[shop_id]", "message"=>"1");
}
     
}
     echo (json_encode($data));
?>	