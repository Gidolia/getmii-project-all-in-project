<?php
include "../config.php";


$seel="SELECT * FROM `shop_sliders` WHERE `ss_id`='$_POST[ss_id]' AND `shop_id`='$_POST[u_id]'";
$quee=$con->query($seel);
$fet=$quee->fetch_assoc();
if(unlink("../shop_logo/" .$fet[img]))
{
    $del="DELETE FROM `shop_sliders` WHERE `shop_sliders`.`ss_id` = '$_POST[ss_id]'";
    if($con->query($del)===TRUE){
        $data[]=array("message"=>"1");
    }else{$data[]=array("message"=>"0");}
}else{$data[]=array("message"=>"0");}
     echo (json_encode($data));