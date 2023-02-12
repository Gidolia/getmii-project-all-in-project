<?php
include "../config.php";
//$data[]=array("message"=>"0");
$de="SELECT * FROM `cart` WHERE `u_id`='$_GET[u_id]'";
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
         if($fetch[qty]<=$ascs[stock])
         {
             $st=1;
         }else{
             $st=0;
         }
         $data[]=array("cart_id"=>"$fetch[cart_id]", "u_id"=>"$fetch[u_id]", "p_id"=>"$fetch[p_id]", "qty"=>"$fetch[qty]", "mrp"=>"$ascs[mrp]", "sp"=>"$ascs[sp]", "name"=>"$ascs[product_name]", "delivery_charge"=>"$ascs[delivery_charge]", "img"=>"$ascs[photo1]", "stock"=>"$st", "cs_id"=>"$fetch[cs_id]", "message"=>"1");
     }
}
     echo (json_encode($data));

?>	