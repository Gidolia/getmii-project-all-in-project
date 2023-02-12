<?php
include "../config.php";

$de="SELECT * FROM `product` WHERE `shop_id` = '$_POST[shop_id]' AND `status`='1'";
$dc=$con->query($de);
     if($dc->num_rows>0)
     {
         while($fetch=$dc->fetch_assoc()){
             $data[]=$fetch;
         }
     }else{
         $data[]=array("message"=>"0");
     }
     echo (json_encode($data));
?>