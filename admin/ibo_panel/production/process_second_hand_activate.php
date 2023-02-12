<?php
include "config.php";
if($_GET[status]==0){
$sel="UPDATE `second_hand_category` SET `status` = '0' WHERE `second_hand_category`.`id` = '$_GET[id]';";
$con->query($sel);
echo "<script>location.href='second_hand_category.php?n=ca_d';</script>";
}elseif($_GET[status]==1)
{
    $sel="UPDATE `second_hand_category` SET `status` = '1' WHERE `second_hand_category`.`id` = '$_GET[id]';";
    $con->query($sel);
echo "<script>location.href='second_hand_category.php?n=ca_s';</script>";
}

?>