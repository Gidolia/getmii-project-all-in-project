<?php
include "../config.php";

function shop_add_bal_manager($shop_id, $amount, $note){
    global $con,$date,$time;
    $selss="SELECT * FROM `user` WHERE `u_id`='$shop_id'";
    $sda=$con->query($selss);
    $rpk=$sda->fetch_assoc();
    
    $ad_w_bal=$rpk[shop_add_wallet]-$amount;
    if($ad_w_bal>=0){
        //echo "add_wallet".$ad_w_bal."<br>";
        $up_ad="UPDATE `user` SET `shop_add_wallet` = '$ad_w_bal' WHERE `user`.`u_id` = '$shop_id';";
        //echo $up_ad;
        $ins_ad="INSERT INTO `shop_add_wallet_history` (`sawh_id`, `u_id`, `date`, `time`, `type`, `amount`, `b_bal`, `a_bal`, `note`, `followed_id`, `s_note`, `follow_amount`) VALUES (NULL, '$shop_id', '$date', '$time', '-', '$amount', '$rpk[shop_add_wallet]', '$ad_w_bal', '$note', '', '$note', '');";
        $con->query($up_ad);
        $con->query($ins_ad);
        $a=1;
    }else{
        $left_amt=abs($ad_w_bal);
        $c=$amount-$left_amt;
        $ad_w_bal=0;
        $shop_w_bal=$rpk[shop_w_wallet]-$left_amt;
        if($shop_w_bal>=0){
            $up_ad="UPDATE `user` SET `shop_add_wallet` = '$ad_w_bal' WHERE `user`.`u_id` = '$shop_id';";
            $ins_ad="INSERT INTO `shop_add_wallet_history` (`sawh_id`, `u_id`, `date`, `time`, `type`, `amount`, `b_bal`, `a_bal`, `note`, `followed_id`, `s_note`, `follow_amount`) VALUES (NULL, '$shop_id', '$date', '$time', '-', '$c', '$rpk[shop_add_wallet]', '$ad_w_bal', '$note', '', '$note', '');";
            $up_w="UPDATE `user` SET `shop_w_wallet` = '$shop_w_bal' WHERE `user`.`u_id` = '$shop_id';";
            $ins_w="INSERT INTO `shop_w_wallet_history` (`swwh_id`, `shop_id`, `type`, `date`, `time`, `amount`, `b_bal`, `a_bal`, `note`, `s_note`) VALUES (NULL, '$shop_id', '-', '$date', '$time', '$left_amt', '$rpk[shop_w_wallet]', '$shop_w_bal', '$note', '$note');";
            $con->query($up_ad);
            $con->query($ins_ad);
            $con->query($up_w);
            $con->query($ins_w);
            $a=1;
        }else{$a=0;}
    }
    
    return $a;
}
//echo shop_add_bal_manager('1', '1', "shop Add");



$selss="SELECT * FROM `user` WHERE `u_id`='$_POST[shop_id]'";
$sda=$con->query($selss);
$rpk=$sda->fetch_assoc();

if($_POST[a]==1){
    
$date1 = date("Y-m-d", strtotime($date.'+ '.$_POST[days].' days'));

/////////////////////////////select amount

$am_sel="SELECT * FROM `add_type` WHERE `at_id`='1'";
$am_que=$con->query($am_sel);
$am_fet=$am_que->fetch_assoc();

$total_am=$am_fet[amount]*$_POST[days];
////
if(shop_add_bal_manager($shop_id, $_POST[amount], "Shop Add")==1){

    $sad="INSERT INTO `shop_add` (`sa_id`, `at_id`, `header_name`, `img_no`, `amount`, `banner`, `days`, `color`,  `c_date`, `c_time`, `e_date`, `e_time`, `city`, `shop_id`) VALUES (NULL, '$_POST[at_id]', '$_POST[header_name]', '$_POST[a]', '$_POST[amount]', '$_POST[ss_id]', '$_POST[days]','$_POST[color]', '$date', '$time', '$date1', '', '$rpk[shop_city]', '$_POST[shop_id]');";
    if($con->query($sad)===TRUE){
         $data[]=array("message"=>"1");
    }else{
         $data[]=array("message"=>"0");
    }
}else{$data[]=array("message"=>"2");}
}
///////////////////////for 2 section
if($_POST[a]>1){
    
$date1 = date("Y-m-d", strtotime($date.'+ '.$_POST[days].' days'));
if(shop_add_bal_manager($shop_id, $_POST[amount], "Shop Add")==1){
    $sad="INSERT INTO `shop_add` (`sa_id`, `at_id`, `header_name`, `img_no`, `amount`, `banner`, `days`,`color`, `c_date`, `c_time`, `e_date`, `e_time`, `city`, `p_id1`, `p_id2`, `p_id3`, `p_id4`, `shop_id`) VALUES (NULL, '$_POST[at_id]', '$_POST[header_name]', '$_POST[a]', '$_POST[amount]', '', '$_POST[days]','$_POST[color]', '$date', '$time', '$date1', '', '$rpk[shop_city]', '$_POST[p_id1]', '$_POST[p_id2]', '$_POST[p_id3]', '$_POST[p_id4]', '$_POST[shop_id]');";
    if($con->query($sad)===TRUE){
         $data[]=array("message"=>"1");
    }else{
         $data[]=array("message"=>"0");
    }
}else{
    $data[]=array("message"=>"2");
}
}
echo (json_encode($data));
?>