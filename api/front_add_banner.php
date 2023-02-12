<?php
include "../config.php";
$fro="SELECT * FROM `admin_advertisement_banner_detail` WHERE `banner_position`='$_GET[banner_position]' AND `end_date`>='$date' AND `city`='$_GET[city]'";
$dc=$con->query($fro);
if($dc->num_rows==0){
    $froq="SELECT * FROM `admin_advertisement_banner_detail` WHERE `banner_position`='$_GET[banner_position]' AND `end_date`>='$date' AND `india`='1'";
    $dcq=$con->query($froq);
    if($dcq->num_rows==0){
        $data[]=array("message"=>"0");
    }else{
         while($fetch=$dcq->fetch_assoc()){
         $data[]=$fetch;
        }
    }
}
else{
    $froq="SELECT * FROM `admin_advertisement_banner_detail` WHERE `banner_position`='$_GET[banner_position]' AND `end_date`>='$date' AND `india`='1'";
    $dcq=$con->query($froq);
    
         while($fetch=$dcq->fetch_assoc()){
         $data[]=$fetch;
        }
    
    while($fetch=$dc->fetch_assoc()){
     $data[]=$fetch;
    }
    
}
    
     echo (json_encode($data));
?>