<?php
include "../config.php";

if($_POST[a]==1){
    
$date1 = date("Y-m-d", strtotime($date.'+ '.$_POST[days].' days'));

$sad="INSERT INTO `shop_add` (`sa_id`, `at_id`, `header_name`, `img_no`, `amount`, `banner`, `days`, `color`,  `c_date`, `c_time`, `e_date`, `e_time`, `city`, `shop_id`) VALUES (NULL, '$_POST[at_id]', '$_POST[header_name]', '$_POST[a]', '$_POST[amount]', '$_POST[ss_id]', '$_POST[days]','$_POST[color]', '$date', '$time', '$date1', '', '$_POST[city]', '$_POST[shop_id]');";
if($con->query($sad)===TRUE){
     $data[]=array("message"=>"1");
}else{
     $data[]=array("message"=>"0");
}
}
///////////////////////for 2 section
if($_POST[a]>1){
    
$date1 = date("Y-m-d", strtotime($date.'+ '.$_POST[days].' days'));

$sad="INSERT INTO `shop_add` (`sa_id`, `at_id`, `header_name`, `img_no`, `amount`, `banner`, `days`,`color`, `c_date`, `c_time`, `e_date`, `e_time`, `city`, `p_id1`, `p_id2`, `p_id3`, `p_id4`, `shop_id`) VALUES (NULL, '$_POST[at_id]', '$_POST[header_name]', '$_POST[a]', '$_POST[amount]', '', '$_POST[days]','$_POST[color]', '$date', '$time', '$date1', '', '$_POST[city]', '$_POST[p_id1]', '$_POST[p_id2]', '$_POST[p_id3]', '$_POST[p_id4]', '$_POST[shop_id]');";
if($con->query($sad)===TRUE){
     $data[]=array("message"=>"1");
}else{
     $data[]=array("message"=>"0");
}
}
echo (json_encode($data));
?>