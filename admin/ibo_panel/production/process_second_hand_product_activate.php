<?php
include "config.php";
if($_GET[status]==0){
$sel="UPDATE `second_hand_product` SET `status` = '0' WHERE `second_hand_product`.`shp_id` = '$_GET[id]';";
$con->query($sel);
echo "<script>location.href='second_hand_product.php?n=ca_d';</script>";
}elseif($_GET[status]==1)
{
    $sel="UPDATE `second_hand_product` SET `status` = '1' WHERE `second_hand_product`.`shp_id` = '$_GET[id]';";
    $con->query($sel);
$heading=$_GET[name]." is Now Live";
$message="Your Second Hand Product is Now Active";

fcm($heading, $message, $img, $_GET[u_id], "my_second_hand", "Second Hand Product");
echo "<script>location.href='second_hand_product.php?n=ca_s';</script>";
}

?>