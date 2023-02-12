<?php
include "config.php";

if($_GET[status]==0){
$sel="UPDATE `delievery_man` SET `status` = '0' WHERE `delievery_man`.`id` = '$_GET[id]'";
$con->query($sel);
echo "<script>location.href='delievery_man.php?n=c';</script>";
}
elseif($_GET[status]==1)
{
$sel="UPDATE `delievery_man` SET `status` = '1' WHERE `delievery_man`.`id` = '$_GET[id]'";
    $con->query($sel);
echo "<script>location.href='delievery_man.php?n=c';</script>";
}

?>