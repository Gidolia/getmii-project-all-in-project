<?php
include "config.php";
if(isset($_POST[sub_postion]))
{
    $ro="UPDATE `shop_add` SET `banner_position` = '$_POST[position]', `status` = '1' WHERE `shop_add`.`sa_id` = '$_POST[sa_id]';";
    $con->query($ro);
echo "<script>location.href='shop_add_approve.php?n=ca_s';</script>";
}

?>