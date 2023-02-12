<?php
    include "../config.php";
    $ed="SELECT * FROM `cart` WHERE `cart_id`='$_POST[cart_id]'";
    $dsf=$con->query($ed);
    $fet=$dsf->fetch_assoc();
    if($_POST[operation]==1)
    {
        $qrt=$fet[qty]+$dsf;
        $de="UPDATE `cart` SET `qty` = '$qrt' WHERE `cart`.`cart_id` = '$_POST[cart_id]';";
    }
    if($_POST[operation]==0)
    {
        $qrt=$fet[qty]-$dsf;
        if($qrt>0){
            $de="UPDATE `cart` SET `qty` = '$qrt' WHERE `cart`.`cart_id` = '$_POST[cart_id]';";
        }else{
            $de="DELETE FROM `cart` WHERE `cart`.`cart_id` = '$_POST[cart_id]'";
        }
    }
    
    $con->query($de);
?>