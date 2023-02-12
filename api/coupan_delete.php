<?php
include "../config.php";
if($_POST[cs_id]>0)
{
   $del="DELETE FROM `coupan_shop` WHERE `coupan_shop`.`cs_id` = '$_POST[cs_id]'";
   if($con->query($del)===TRUE)
   {
       $data[]=array("message"=>"1");  
   }else{
       $data[]=array("message"=>"0");  
   }
}else{
       $data[]=array("message"=>"0");  
   }
echo (json_encode($data));

?>

