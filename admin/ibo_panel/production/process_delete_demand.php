<?php
include "config.php";
if($_GET[d_id]>0){
    $sel="SELECT * FROM `demands` WHERE `d_id`='$_GET[d_id]'";
    $prs=$con->query($sel);
    if($prs->num_rows>0)
    {
        $fer=$prs->fetch_assoc();
        unlink("../../../demand_img/" .$fer[image1]);
        unlink("../../../demand_img/" .$fer[image2]);
        unlink("../../../demand_img/" .$fer[image3]);
        $sel="DELETE FROM `demands` WHERE `demands`.`d_id` = '$_GET[d_id]'";
        $con->query($sel);
    }
echo "<script>location.href='demand.php?n=d_d';</script>";
}
?>