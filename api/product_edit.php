<?php
include "../config.php";
if($_POST[p_id]>0){
    $dp=100-($_POST[sp]*100/$_POST[mrp]);
    
    $erdf="UPDATE `product` SET `product_name` = '$_POST[product_name]', `mrp` = '$_POST[mrp]', `sp` = '$_POST[sp]', `d_percentage` = '$dp', `delivery_charge` = '$_POST[delivery_charge]', `delivery_time` = '$_POST[delivery_time]', `return_policy` = '$_POST[return_policy]', `stock` = '$_POST[stock]', `country` = '$_POST[country]', `short_description` = '$_POST[short_description]', `long_description` = '$_POST[long_description]' WHERE `product`.`p_id` = '$_POST[p_id]';";
    if($con->query($erdf)===TRUE){
        $data[]=array("message"=>"1");  
    }else{
        $pla="INSERT INTO `error_reports` (`er_id`, `ip_addreass`, `date`, `time`, `url`, `fail_query`, `note`, `s_note`, `app`) VALUES (NULL, '$ipad', '$date', '$time', '$url', '', 'Edit product', '$_POST[p_id]', '1');";
        $con->query($pla);
        $data[]=array("message"=>"0");  
    }
    
}else{
    $data[]=array("message"=>"0");  
}
echo (json_encode($data));
?>