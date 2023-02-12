<?php
include "../config.php";
if($_POST[p_id]>0)
{
    $dert="UPDATE `product` SET `status` = '0' WHERE `product`.`p_id` = '$_POST[p_id]';";
    if($con->query($dert)===TRUE){
        $response[] = array("message"=>"1");
    }else{
        $response[] = array("message"=>"0");
    }
}else{
     $response[] = array("message"=>"0");
     }
     echo (json_encode($response));
?>