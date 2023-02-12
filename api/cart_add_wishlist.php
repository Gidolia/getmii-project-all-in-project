<?php
    include "../config.php";
    $ed="SELECT * FROM `cart` WHERE `cart_id`='$_POST[cart_id]'";
    $dsf=$con->query($ed);
    $fet=$dsf->fetch_assoc();
    
    $w_sel="SELECT * FROM `wishlist` WHERE `u_id`='$fet[u_id]' AND `p_id`='$fet[p_id]'";
    $w_que=$con->query($w_sel);
    if($w_que->num_rows==0){
        $de="DELETE FROM `cart` WHERE `cart`.`cart_id` = '$_POST[cart_id]'";
        $sd="INSERT INTO `wishlist` (`w_id`, `u_id`, `p_id`) VALUES (NULL, '$fet[u_id]', '$fet[p_id]');";
        if($dc=$con->query($de)===TRUE && $con->query($sd)===TRUE)
        {
          $data[]=array("message"=>"1"); 
        }
        else{
            $data[]=array("message"=>"0"); 
        $pla="INSERT INTO `error_reports` (`er_id`, `ip_addreass`, `date`, `time`, `url`, `fail_query`, `note`, `s_note`, `app`) VALUES (NULL, '$ipad', '$date', '$time', '$url', '', 'wishlist insert cart insert', 'wishlist insert cart insert', '1');";
        $con->query($pla);
     
        }
    }else{
        $de="DELETE FROM `cart` WHERE `cart`.`cart_id` = '$_POST[cart_id]'";
        if($dc=$con->query($de)===TRUE)
        {
          $data[]=array("message"=>"1"); 
        }
        else{
            $data[]=array("message"=>"0"); 
        $pla="INSERT INTO `error_reports` (`er_id`, `ip_addreass`, `date`, `time`, `url`, `fail_query`, `note`, `s_note`, `app`) VALUES (NULL, '$ipad', '$date', '$time', '$url', '', 'wishlist insert cart insert', 'wishlist insert cart insert', '1');";
        $con->query($pla);
     
        }
    }
?>