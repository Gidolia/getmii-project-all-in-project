<?php 
include "../config.php";
if($_GET[shop_id]>0){
    $ref="INSERT INTO `request_suscribe` (`rs_id`, `shop_id`, `plan_type`, `date`, `time`, `status`) VALUES (NULL, '$_GET[shop_id]', '$_GET[plan_type]', '$date', '$time', 'p');";
    if($con->query($ref)===TRUE){
        $data[]=array("message"=>"1");  
    }else{
        $pla="INSERT INTO `error_reports` (`er_id`, `ip_addreass`, `date`, `time`, `url`, `fail_query`, `note`, `s_note`, `app`) VALUES (NULL, '$ipad', '$date', '$time', '$url', '', 'Request Suscribe', '$_GET[shop_id]', '1');";
        $con->query($pla);
        $data[]=array("message"=>"0");  
    }
  
}
  echo (json_encode($data));

?>