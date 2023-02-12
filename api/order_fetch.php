
<?php
include "../config.php";
//$data[]=array("message"=>"0");
$de="SELECT * FROM `orders` WHERE `u_id`='$_GET[u_id]'";
$dc=$con->query($de);
if($dc->num_rows==0){
  $data[]=array("message"=>"0");  
}
else{
     
     while($fetch=$dc->fetch_assoc()){
         $das="SELECT * FROM `product` WHERE `p_id`='$fetch[p_id]'";
         $asc=$con->query($das);
         $ascs=$asc->fetch_assoc();
         //$data[]=$fetch;
         
         $data[]=array("o_id"=>"$fetch[o_id]", "u_id"=>"$fetch[u_id]", "p_id"=>"$fetch[p_id]", "qty"=>"$fetch[qty]", "mrp"=>"$ascs[mrp]", "sp"=>"$ascs[sp]", "name"=>"$ascs[product_name]", "delivery_charge"=>"$ascs[delivery_charge]", "img"=>"$ascs[photo1]", "t_mrp"=>"$fetch[t_mrp]", "t_sp"=>"$fetch[t_sp]", "t_delivery_charge"=>"$fetch[t_delivery_charge]", "date"=>"$fetch[date]", "time"=>"$fetch[time]", "o_confirmed"=>"$fetch[o_confirmed]", "message"=>"1", "c_name"=>"$fetch[c_name]", "c_mob"=>"$fetch[c_mob]", "c_city"=>"$fetch[c_city]", "c_email"=>"$fetch[c_email]", "c_pincode"=>"$fetch[c_pincode]", "c_addreass"=>"$fetch[c_addreass]", "picked"=>"$fetch[picked]", "shop_id"=>"$fetch[shop_id]", "dly_p_id"=>"$fetch[dly_p_id]", "status"=>"$fetch[status]", "delivery_by"=>"$fetch[delivery_by]", "picked"=>"$fetch[picked]", "cs_id"=>"$fetch[cs_id]", "coupon_discount"=>"$fetch[coun_discount]", "discount"=>"$fetch[discount]", "total_price"=>"$fetch[total_price]");
     }
}
     echo (json_encode($data));

?>	