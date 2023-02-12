<?php
 include "../config.php";
 $de="SELECT * FROM `product` WHERE `p_id`='$_GET[p_id]' AND `status`='1'";
$dc=$con->query($de);
if($dc->num_rows==0){
  $data[]=array("message"=>"0");  
}
else{
     $fetch=$dc->fetch_assoc();
     $ytre="SELECT shop_name FROM `user` WHERE `u_id`='$fetch[shop_id]'";
     $oper=$con->query($ytre);
     $nur=$oper->fetch_assoc();
         $data[]=array("p_id"=>"$fetch[p_id]", "pm_id"=>"$fetch[pm_id]", "c_id"=>"$fetch[c_id]", "sc_id"=>"$fetch[sc_id]", "product_name"=>"$fetch[product_name]", "short_description"=>"$fetch[short_description]", "long_description"=>"$fetch[long_description]", "photo1"=>"$fetch[photo1]", "photo2"=>"$fetch[photo2]", "photo3"=>"$fetch[photo3]", "photo4"=>"$fetch[photo4]", "photo5"=>"$fetch[photo5]", "stock"=>"$fetch[stock]", "shop_id"=>"$fetch[shop_id]", "brand_name"=>"$fetch[brand_name]", "mrp"=>"$fetch[mrp]", "sp"=>"$fetch[sp]", "d_percentage"=>"$fetch[d_percentage]", "delivery_charge"=>"$fetch[delivery_charge]", "delivery_time"=>"$fetch[delivery_time]", "city"=>"$fetch[city]", "return_policy"=>"$fetch[return_policy]", "shop_color"=>"$fetch[shop_color]", "shop_name"=>"$nur[shop_name]", "country"=>"$fetch[country]", "cod"=>"$fetch[cod]", "message"=>"1");
     
}
     echo (json_encode($data));


?>