<?php
include "config.php";
if($_GET[shp_id]>0){
    $sel="SELECT * FROM `second_hand_product` WHERE `shp_id`='$_GET[shp_id]'";
    $prs=$con->query($sel);
    if($prs->num_rows>0)
    {
        $fer=$prs->fetch_assoc();
        unlink("../../../second_hand_img/" .$fer[main_img]);
        unlink("../../../second_hand_img/" .$fer[img2]);
        unlink("../../../second_hand_img/" .$fer[img3]);
        $sel="DELETE FROM `second_hand_product` WHERE `second_hand_product`.`shp_id` = '$_GET[shp_id]'";
        $con->query($sel);
    }
echo "<script>location.href='second_hand_product.php?n=sh_d';</script>";
}
?>