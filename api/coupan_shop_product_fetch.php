<?php
include "../config.php";
//$data[]=array("message"=>"0");
$de="SELECT * FROM `coupan_shop` WHERE `cs_id`='$_GET[cs_id]';";
$dc=$con->query($de);
if($dc->num_rows==0){
  $data[]=array("message"=>"0"); 
}
else{
     $fetch=$dc->fetch_assoc();
     $ad=json_decode($fetch[data]);

//print_r ($ad);
foreach ($ad as $obj)
{
    
    
         $data[]=array("p_id"=>"$obj->p_id", "qty"=>"$obj->qty", "message"=>"1");
}
     
}
     echo (json_encode($data));
?>	