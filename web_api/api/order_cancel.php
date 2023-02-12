<?php
include "../config.php";
$sel="SELECT * FROM `orders` WHERE `o_id`='$_POST[o_id]'";
$quee=$con->query($sel);
$fetc=$quee->fetch_assoc();
if($fetc[o_confirmed]=='0')
{
$ins="UPDATE `orders` SET `o_confirmed` = '2' WHERE `orders`.`o_id` = '$_POST[o_id]';";
if($con->query($ins)===TRUE){
        $data[]=array("message"=>"1");
    }else{
        $data[]=array("message"=>"0");
        $pla="INSERT INTO `error_reports` (`er_id`, `ip_addreass`, `date`, `time`, `url`, `fail_query`, `note`, `s_note`, `app`) VALUES (NULL, '$ipad', '$date', '$time', '$url', '', 'Cancel Order', '$_POST[o_id]', '1');";
        $con->query($pla);
    }
}else{
    $data[]=array("message"=>"0");
        $pla="INSERT INTO `error_reports` (`er_id`, `ip_addreass`, `date`, `time`, `url`, `fail_query`, `note`, `s_note`, `app`) VALUES (NULL, '$ipad', '$date', '$time', '$url', '', 'Cancel Order', '$_POST[o_id]', '1');";
        $con->query($pla);
}
    echo (json_encode($data));
?>