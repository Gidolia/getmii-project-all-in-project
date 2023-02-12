<?php
include "config.php";
if($_GET[id]!="")
{
    $dsd="SELECT * FROM `user` WHERE `u_id`='$_GET[id]'";
    $cde=$con->query($dsd);
    $cdf=$cde->fetch_assoc();
    
$dep="UPDATE `user` SET `approval_status` = '$_GET[s]', `shop_a_date`='$date', `shop_a_time`='$time' WHERE `user`.`u_id` = '$_GET[id]';";
$con->query($dep);
if($_GET[s]=="p"){
    echo "<script>location.href='vendors_list.php?n=ap_p';</script>";
}else{
    echo "<script>location.href='vendors_list.php?n=ap_s';</script>";
    fcm($cdf[owner_name], "Your Shop Get Approved for life time", $img, $_GET[id], 'seller', 'Shop Approved');
}
}
?>