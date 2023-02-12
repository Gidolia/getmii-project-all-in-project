<?php
include "../config.php";

function fcm($heading, $message, $img, $u_id, $activity, $note){
    global $con, $date, $time;
    
    $dsd="SELECT device_id FROM `user` WHERE `u_id`='$u_id'";
    $cde=$con->query($dsd);
    $cdf=$cde->fetch_assoc();
    
    $device_id = $cdf[device_id];

    //API URL of FCM
    $url = 'https://fcm.googleapis.com/fcm/send';

    /*api_key available in:
    Firebase Console -> Project Settings -> CLOUD MESSAGING -> Server key*/
    $api_key = 'AAAAs1IX9j4:APA91bGuD7XkMfCW3B37mq1hysdbjpl1jVvVH0U_VACmvtKclVcOQTOS38DnJ0ODFZuGuolZvRBdNoRF3o-ogxHGYNMP5_an2R7QGLCMkAQNurh3GDEnrxTuIVfsLfDA74FVq6-g48hA';
                
    $fields = array (
        'registration_ids' => array (
                $device_id
        ),
        'data' => array (
            
                 "title" => $heading,
                 "content" => $message,
                 "click_action" => $activity,
                 "image"=>$img,
                  
                
        )
    );
    //header includes Content type and api key
    $headers = array(
        'Content-Type:application/json',
        'Authorization:key='.$api_key
    );
                
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
    $result = curl_exec($ch);
    if ($result === FALSE) {
        die('FCM Send Error: ' . curl_error($ch));
        echo failed;
    }
      $ins="INSERT INTO `fcm_record` (`fcm_id`, `u_id`, `heading`, `descp`, `img`, `activity`, `device_id`, `s_note`, `note`, `date`, `time`, `response`) VALUES (NULL, '$u_id', '$heading', '$message', '$img', '$activity', '$device_id', '$note', '', '$date', '$time', '$result');";
      $con->query($ins);
    curl_close($ch);
}

//fcm("dscvcxbxvbvxb", "ascdscds", $img, '1', "sdcsdcs", "dsfscdzx");



/////////////////////////////////find amount to give on follow shop
$sel_folo_a="SELECT * FROM `admin_amount_to_distribute` WHERE `name`='shop_follow'";
$que_folo_a=$con->query($sel_folo_a);
$fet_folo_a=$que_folo_a->fetch_assoc();
$follow_amount=$fet_folo_a[amount]+0;



$sel="SELECT * FROM `shop_like_comment` WHERE `user_id`='$_GET[u_id]' AND `shop_id`='$_GET[shop_id]' AND `like`='1'";
$sx=$con->query($sel);
if($sx->num_rows==0)
{
    $user_sel="SELECT * FROM `user` WHERE `u_id`='$_GET[u_id]'";
    $user_que=$con->query($user_sel);
    $user_fet=$user_que->fetch_assoc();
    $heading=$user_fet[name]." Follows Your Shop";
    fcm($heading, $message, $img, '$_GET[u_id]', "follow_list", "User Follows");
    
    $df="INSERT INTO `shop_like_comment` (`slc_id`, `user_id`, `shop_id`, `like`, `comment`, `date`, `time`) VALUES (NULL, '$_GET[u_id]', '$_GET[shop_id]', '1', '', '$date', '$time');";
    
    
    /////////////////////////////////give amount to shop keeper
    $us_sel="SELECT * FROM `user` WHERE `u_id`='$_GET[shop_id]'";
    $us_que=$con->query($us_sel);
    $us_fet=$us_que->fetch_assoc();
    $shop_wal=$us_fet[shop_add_wallet]+$follow_amount;
    
    $dspssss="SELECT * FROM `shop_add_wallet_history` WHERE `u_id`='$_GET[shop_id]' AND `followed_id`='$_GET[u_id]'";
    $operty=$con->query($dspssss);
    if($operty->num_rows==0){
    
        $ins_wl_h="INSERT INTO `shop_add_wallet_history` (`sawh_id`, `u_id`, `date`, `time`, `type`, `amount`, `b_bal`, `a_bal`, `note`, `followed_id`, `s_note`, `follow_amount`) VALUES (NULL, '$_GET[shop_id]', '$date', '$time', '+', '$follow_amount', '$us_fet[shop_add_wallet]', '$shop_wal', 'User Follows', '$_GET[u_id]', 'User Follows', 'y');";
        $up_wl="UPDATE `user` SET `shop_add_wallet` = '$shop_wal' WHERE `user`.`u_id` = '$_GET[shop_id]';";
        $con->query($ins_wl_h);
        $con->query($up_wl);
        ////////////////for sending notification to user
        
    }
    if($con->query($df)===TRUE)
    {
        $data[]=array("message"=>"1");
    }else{
        $data[]=array("message"=>"2");
        $pla="INSERT INTO `error_reports` (`er_id`, `ip_addreass`, `date`, `time`, `url`, `fail_query`, `note`, `s_note`, `app`) VALUES (NULL, '$ipad', '$date', '$time', '$url', '', 'shop follow', '$_GET[u_id]', '1');";
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
        $pla="INSERT INTO `error_reports` (`er_id`, `ip_addreass`, `date`, `time`, `url`, `fail_query`, `note`, `s_note`, `app`) VALUES (NULL, '$ipad', '$date', '$time', '$url', '', 'shop follow', '$_GET[u_id]', '1');";
            $con->query($pla);
    }
    $data[]=array("message"=>"2");
}
 echo (json_encode($data));
?>