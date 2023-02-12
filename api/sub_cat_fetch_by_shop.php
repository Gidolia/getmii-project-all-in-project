<?php
include "../config.php";

$sh="SELECT * FROM `user` WHERE `u_id`='$_GET[shop_id]'";
$ed=$con->query($sh);
$dce=$ed->fetch_assoc();

//////////////////find their Sub category List
$de="SELECT * FROM `city_sub_category` WHERE `status`='1' AND `c_id`='$dce[csc_id]'";
$dc=$con->query($de);
if($dc->num_rows>0){
     while($fetch=$dc->fetch_assoc()){
         
         $ope="SELECT * FROM `product` WHERE `shop_id`='$_GET[shop_id]' AND `sc_id`='$fetch[csc_id]'";
         $xapo=$con->query($ope);
         $cou=$xapo->num_rows;
         if($cou>0){
             
            $data[]=array("csc_id"=>"$fetch[csc_id]", "c_id"=>"$fetch[c_id]", "name"=>"$fetch[name]", "ship_amount"=>"$fetch[ship_amount]", "color_req"=>"$fetch[color_req]", "photo"=>"$fetch[photo]", "p_qty"=>"$cou", "message"=>"1");
         }else{
             $data[]=array("message"=>"0"); 
         }
         //$data[]=$fetch;
     }
}else{ 
    $data[]=array("message"=>"0");
}
     echo (json_encode($data));


?>