<?php
include "../config.php";
//$data[]=array("message"=>"0");
$de="SELECT * FROM `coupan_shop` WHERE `e_date`>='$date' AND `status`='1' AND `shop_id`='$_GET[shop_id]' ;";
$dc=$con->query($de);
if($dc->num_rows==0){
  $data[]=array("message"=>"0"); 
}
else{
     while($fetch=$dc->fetch_assoc()){
         $data[]=array("cs_id"=>"$fetch[cs_id]", "coun_id"=>"$fetch[coun_id]", "shop_id"=>"$fetch[shop_id]", "c_date"=>"$fetch[c_date]", "e_date"=>"$fetch[e_date]", "status"=>"$fetch[status]", "discount"=>"$fetch[discount]", "data"=>"$fetch[data]", "message"=>"1");
     }
}
     echo (json_encode($data));
?>	