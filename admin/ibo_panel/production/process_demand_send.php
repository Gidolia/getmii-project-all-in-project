<?php
include "config.php";
$d_id=$_POST[d_id];
$c_id=$_POST[c_id];
$sel_d="SELECT * FROM `demands` WHERE `d_id`='$d_id'";
$que_d=$con->query($sel_d);
$fet_d=$que_d->fetch_assoc();



$up="UPDATE `demands` SET `send_to_vendors` = 'y' WHERE `demands`.`d_id` = '$d_id';";
if($con->query($up)===TRUE){
    $s_sel="SELECT u_id FROM `user` WHERE `csc_id`='$c_id'";
    $s_que=$con->query($s_sel);
    while($s_fet=$s_que->fetch_assoc()){
        
        fcm("New Demand", "New Demand Created By Users", "http://eibo.in/getmii/demand_img/".$fet_d[image1], $s_fet[u_id], "vendor_demand", "Demand Sending");
    }
    echo "<script>location.href='demand.php?n=d_s';</script>";
}else{
    echo "Failed Plz Try Again";
}
//echo "<script>location.href='demand.php?n=d_s';</script>";
