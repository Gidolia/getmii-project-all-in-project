<?php
include "../config.php";
$fro="SELECT * FROM `admin_advertisement_banner_detail` WHERE `banner_position`='$_POST[banner_position]'";
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