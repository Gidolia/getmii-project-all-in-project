<?php
include "../config.php";
$seel="SELECT * FROM `shop_poster` WHERE `shop_poster`.`sp_id` = '$_POST[sp_id]'";
$quee=$con->query($seel);
$fet=$quee->fetch_assoc();
if(unlink("../shop_display/" .$fet[img]))
{
    unlink("../shop_display/" .$fet[img2]);
    unlink("../shop_display/" .$fet[img3]);
    unlink("../shop_display/" .$fet[img4]);
    
    $del="DELETE FROM `shop_poster` WHERE `shop_poster`.`sp_id` = '$_POST[sp_id]'";
    if($con->query($del)===TRUE){
        $data[]=array("message"=>"1");
    }else{$data[]=array("message"=>"0");}
}else{$data[]=array("message"=>"0");}
     echo (json_encode($data));