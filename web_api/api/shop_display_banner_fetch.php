<?php
include "../config.php";

$de="SELECT * FROM `shop_poster` WHERE `shop_id`='$_POST[shop_id]'";
$dc=$con->query($de);
if($dc->num_rows>0){
     while($fetch=$dc->fetch_assoc()){
         $data[]=array("sp_id"=>"$fetch[sp_id]", "shop_id"=>"$fetch[shop_id]", "img_no"=>"$fetch[img_no]", "img1"=>"$fetch[img]", "img2"=>"$fetch[img2]", "img3"=>"$fetch[img3]", "img4"=>"$fetch[img4]", "c_date"=>"$fetch[c_date]", "c_time"=>"$fetch[c_time]", "color"=>"$fetch[color]", "message"=>"1");
         //$data[]=$fetch;
     }
}else{ 
    $data[]=array("message"=>"0");
}
     echo (json_encode($data));
?>