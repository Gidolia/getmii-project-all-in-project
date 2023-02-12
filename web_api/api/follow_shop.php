<?php
include "../config.php";
/////////////////////////////////find amount to give on follow shop
$sel_folo_a="SELECT * FROM `admin_amount_to_distribute` WHERE `name`='shop_follow'";
$que_folo_a=$con->query($sel_folo_a);
$fet_folo_a=$que_folo_a->fetch_assoc();
$follow_amount=$fet_folo_a[amount]+0;



$sel="SELECT * FROM `shop_like_comment` WHERE `user_id`='$_POST[u_id]' AND `shop_id`='$_POST[shop_id]' AND `like`='1'";
$sx=$con->query($sel);
if($sx->num_rows==0)
{
    $df="INSERT INTO `shop_like_comment` (`slc_id`, `user_id`, `shop_id`, `like`, `comment`, `date`, `time`) VALUES (NULL, '$_POST[u_id]', '$_POST[shop_id]', '1', '', '$date', '$time');";
    /////////////////////////////////give amount to shop keeper
    $us_sel="SELECT * FROM `user` WHERE `u_id`='$_POST[shop_id]'";
    $us_que=$con->query($us_sel);
    $us_fet=$us_que->fetch_assoc();
    $shop_wal=$us_fet[shop_add_wallet]+$follow_amount;
    
    $dspssss="SELECT * FROM `shop_add_wallet_history` WHERE `shop_id`='$_POST[shop_id]' AND `followed_id`='$_POST[u_id]'";
    $operty=$con->query($dspssss);
    if($operty->num_rows==0){
    
        $ins_wl_h="INSERT INTO `shop_add_wallet_history` (`sawh_id`, `u_id`, `date`, `time`, `type`, `amount`, `b_bal`, `a_bal`, `note`, `followed_id`, `s_note`, `follow_amount`) VALUES (NULL, '$_POST[shop_id]', '$date', '$time', '+', '$follow_amount', '$us_fet[shop_add_wallet]', '$shop_wal', 'User Follows', '$_POST[u_id]', 'User Follows', 'y');";
        $up_wl="UPDATE `user` SET `shop_add_wallet` = '$shop_wal' WHERE `user`.`u_id` = '$_POST[shop_id]';";
        $con->query($ins_wl_h);
        $con->query($up_wl);
    }
    if($con->query($df)===TRUE)
    {
        $data[]=array("message"=>"1");
    }else{
        $data[]=array("message"=>"2");
        $pla="INSERT INTO `error_reports` (`er_id`, `ip_addreass`, `date`, `time`, `url`, `fail_query`, `note`, `s_note`, `app`) VALUES (NULL, '$ipad', '$date', '$time', '$url', '', 'shop follow', '$_POST[u_id]', '1');";
            $con->query($pla);
    }
}else{
    $slc_fet=$sx->fetch_assoc();
    $df="DELETE FROM `shop_like_comment` WHERE `shop_like_comment`.`slc_id` = '$slc_fet[slc_id]'";
    if($con->query($df)===TRUE)
    {
        $data[]=array("message"=>"0");
    }else{
        $data[]=array("message"=>"2");
        $pla="INSERT INTO `error_reports` (`er_id`, `ip_addreass`, `date`, `time`, `url`, `fail_query`, `note`, `s_note`, `app`) VALUES (NULL, '$ipad', '$date', '$time', '$url', '', 'shop follow', '$_POST[u_id]', '1');";
            $con->query($pla);
    }
    $data[]=array("message"=>"2");
}
 echo (json_encode($data));
?>