<?php
    include "../config.php";
    
    $sel="SELECT * FROM `cart` WHERE `u_id`='$_GET[u_id]' AND `p_id`='$_GET[p_id]'";
    $cpo=$con->query($sel);
    
    $count=$cpo->num_rows;
    if($count>0){
        $fetg=$cpo->fetch_assoc();
        $cago=$fetg[qty]+1;
        $update="UPDATE `cart` SET `qty` = '$cago' WHERE `cart`.`cart_id` = '$fetg[cart_id]';";
        if($con->query($update)===TRUE){
            $st=1;
        }else{
            $st=0;
        }
    }else{
        $de="INSERT INTO `cart` (`cart_id`, `u_id`, `p_id`, `qty`, `add_date`, `add_time`, `cs_id`) VALUES (NULL, '$_GET[u_id]', '$_GET[p_id]', '1', '$date', '$time', '$_GET[cs_id]');";
        if($dc=$con->query($de)===TRUE)
        {
            $st=1;
        }
        else{
            
        $pla="INSERT INTO `error_reports` (`er_id`, `ip_addreass`, `date`, `time`, `url`, `fail_query`, `note`, `s_note`, `app`) VALUES (NULL, '$ipad', '$date', '$time', '$url', '', 'cart insert', 'cart insert', '1');";
        $con->query($pla);
        $st=0;
        }
    }
    $data[]=array("message"=>"$st");
     echo (json_encode($data));
?>