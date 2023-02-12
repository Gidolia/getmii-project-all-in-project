
<?php
include "../config.php";
if($_GET[o_id]>0)
{
    $dert="UPDATE `orders` SET `o_confirmed` = '1', `delivery_by` = '$_GET[delivered_by]', `status`='c' WHERE `orders`.`o_id` = '$_GET[o_id]';";
    
    $ins="INSERT INTO `order_manager` (`om_id`, `o_id`, `o_confirmed`, `date`, `time`) VALUES (NULL, '$_GET[o_id]', '1', '$date', '$time');";
    
    if($con->query($dert)===TRUE && $con->query($ins)===TRUE){
        $response[] = array("message"=>"1");
    }else{
        $response[] = array("message"=>"0");
    }
}else{
     $response[] = array("message"=>"0");
     }
     echo (json_encode($response));
?>