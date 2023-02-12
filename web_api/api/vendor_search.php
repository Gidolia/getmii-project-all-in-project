<?php
include "../config.php";
//$data[]=array("message"=>"0");
$de="SELECT * FROM `user` WHERE `shop_name` LIKE '%$_POST[name]%' LIMIT 10";
$dc=$con->query($de);
if($dc->num_rows==0){
  $data[]=array("message"=>"0");  
}
else{
     while($fetch=$dc->fetch_assoc()){
         $data[]=array("u_id"=>"$fetch[u_id]", "shop_name"=>"$fetch[shop_name]","image"=>"$fetch[photo]", "message"=>"1");
         
     }
}
     echo (json_encode($data));

?>	