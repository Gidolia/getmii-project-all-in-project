<?php
include "../config.php";

$de="SELECT * FROM `suscription_price` WHERE `sp_id`='1'";
$dc=$con->query($de);
if($dc->num_rows>0){
     $fetch=$dc->fetch_assoc();
         $data[]=array("sp_id"=>"$fetch[sp_id]", "paid"=>"$fetch[paid]", "trusted"=>"$fetch[trusted]", "plan"=>"$fetch[plan]", "message"=>"1");
         
     
}else{ 
    $data[]=array("message"=>"0");
}
     echo (json_encode($data));
?>