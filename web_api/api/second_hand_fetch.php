<?php
include "../config.php";
//$data[]=array("message"=>"0");
$de="SELECT * FROM `second_hand_product` WHERE `shc_id`='$_POST[shc_id]' AND `city` LIKE '$_POST[city]'";
$dc=$con->query($de);
if($dc->num_rows==0){
  $data[]=array("message"=>"0");
}
else{
     while($fetch=$dc->fetch_assoc()){
         $dlk="SELECT * FROM `user` WHERE `u_id`='$fetch[u_id]'";
         $poi=$con->query($dlk);
         $su=$poi->fetch_assoc();
     
     $data[]=array("shp_id"=>"$fetch[shp_id]", "shc_id"=>"$fetch[shc_id]", "u_id"=>"$fetch[u_id]", "name"=>"$fetch[name]", "old"=>"$fetch[old]", "product_description"=>"$fetch[product_description]", "amount"=>"$fetch[amount]", "main_img"=>"$fetch[main_img]", "img2"=>"$fetch[img2]", "img3"=>"$fetch[img3]", "status"=>"$fetch[status]", "city"=>"$fetch[city]", "date"=>"$fetch[date]", "time"=>"$fetch[time]", "message"=>"1", "mobile"=>"$su[mobile]", "addreass"=>"$su[addreass]", "seller_name"=>"$su[name]");
     }
}
     echo (json_encode($data));

?>	