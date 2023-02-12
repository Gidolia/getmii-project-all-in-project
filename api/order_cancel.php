<?php
include "../config.php";
$sel="SELECT * FROM `orders` WHERE `o_id`='$_GET[o_id]'";
$quee=$con->query($sel);
$fetc=$quee->fetch_assoc();

$ins="UPDATE `orders` SET `status` = 'd' WHERE `orders`.`o_id` = '$_GET[o_id]';";
if($con->query($ins)===TRUE){
        $data[]=array("message"=>"1");
    }else{
        $data[]=array("message"=>"0");
        $pla="INSERT INTO `error_reports` (`er_id`, `ip_addreass`, `date`, `time`, `url`, `fail_query`, `note`, `s_note`, `app`) VALUES (NULL, '$ipad', '$date', '$time', '$url', '', 'Cancel Order', '$_GET[o_id]', '1');";
        $con->query($pla);
    }

    echo (json_encode($data));
?>