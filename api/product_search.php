<?php
include "../config.php";
//$data[]=array("message"=>"0");
$de="SELECT * FROM `product` WHERE `product_name` LIKE '%$_GET[name]%' LIMIT 10";
$dc=$con->query($de);
if($dc->num_rows==0){
  $data[]=array("message"=>"0");  
}
else{
     while($fetch=$dc->fetch_assoc()){
         $data[]=array("p_id"=>"$fetch[p_id]", "product_name"=>"$fetch[product_name]", "message"=>"1");
     }
}
     echo (json_encode($data));

?>	