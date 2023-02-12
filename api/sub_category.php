<?php
include "../config.php";

$de="SELECT * FROM `city_sub_category` WHERE `status`='1' AND `c_id`='$_GET[c_id]'";
$dc=$con->query($de);
if($dc->num_rows>0){
     while($fetch=$dc->fetch_assoc()){
         $data[]=array("csc_id"=>"$fetch[csc_id]", "c_id"=>"$fetch[c_id]", "name"=>"$fetch[name]", "ship_amount"=>"$fetch[ship_amount]", "color_req"=>"$fetch[color_req]", "photo"=>"$fetch[photo]", "message"=>"1");
         //$data[]=$fetch;
     }
}else{ 
    $data[]=array("message"=>"0");
}
     echo (json_encode($data));
?>