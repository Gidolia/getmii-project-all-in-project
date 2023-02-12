<?php
include "../config.php";
$fro="SELECT * FROM `admin_advertisement_banner_detail` WHERE `banner_position`='4' AND `end_date`>='$date' AND `city`='$_POST[city]'";
$dc=$con->query($fro);
if($dc->num_rows==0){
  $data[]=array("message"=>"0");
}
else{
   
    while($fetch=$dc->fetch_assoc()){
     $data[]=$fetch;
    }
    
}
    
     echo (json_encode($data));
?>