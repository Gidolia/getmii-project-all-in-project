<?php
include "config.php";
if($_GET[status]==0){
$sel="UPDATE `city_category` SET `status` = '0' WHERE `city_category`.`id` = '$_GET[id]';";
$con->query($sel);
echo "<script>location.href='city_category.php?n=ca_d';</script>";
}elseif($_GET[status]==1)
{
    $sel="UPDATE `city_category` SET `status` = '1' WHERE `city_category`.`id` = '$_GET[id]';";
    $con->query($sel);
echo "<script>location.href='city_category.php?n=ca_s';</script>";
}

?>