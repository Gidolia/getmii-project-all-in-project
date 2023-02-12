<?php
include "../config.php";

$de="SELECT * FROM `city_sub_category` WHERE `status`='1' AND `csc_id`='$_POST[csc_id]'";
$dc=$con->query($de);
if($dc->num_rows>0){
     $fetch=$dc->fetch_assoc();
         $data[]=array("csc_id"=>"$fetch[csc_id]", "ship_amount"=>"$fetch[ship_amount]", "message"=>"1");
         $data[]=array("csc_id"=>"$fetch[csc_id]", "ship_amount"=>"Free", "message"=>"1");
         //$data[]=$fetch;
     
}else{ 
    $data[]=array("message"=>"0");
}
     echo (json_encode($data));
?>