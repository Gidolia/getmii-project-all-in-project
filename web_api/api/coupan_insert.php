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
                  //"image"=>"https://cdn.pixabay.com/photo/2015/04/23/22/00/tree-736885__480.jpg",
                
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

$counn="SELECT * FROM `coupan` WHERE `coun_id`='$_POST[coun_id]'";
$countddd=$con->query($counn);
if($countddd->num_rows > 0){
    $reo=$countddd->fetch_assoc();
    
    $sld="SELECT MAX(cs_id) AS max FROM `coupan_shop`";
    $sed=$con->query($sld);
    $def=$sed->fetch_assoc();
    $cs_id=$def[max]+1;
    $e_date=date('Y-m-d', strtotime($date. ' + '.$reo[expiry_days].' days'));
    
    
    $df="INSERT INTO `coupan_shop` (`cs_id`, `coun_id`, `shop_id`, `c_date`, `c_time`, `e_date`, `status`, `discount`, `data`) VALUES (NULL, '$_POST[coun_id]', '$_POST[u_id]', '$date', '$time', '$e_date', '1', '$_POST[amount]', '$_POST[data]');";
    
    if($con->query($df)===TRUE)
    {
        $pro="SELECT u_id,shop_name FROM `user` WHERE `u_id`='$_POST[u_id]'";
        $prod=$con->query($pro);
        $s_fet=$prod->fetch_assoc();
        $fg_sel="SELECT user_id FROM `shop_like_comment` WHERE `shop_id`='$_POST[u_id]' AND `like`='1'";
        $fg_que=$con->query($fg_sel);
        while($f_fet=$fg_que->fetch_assoc())
        {
            fcm($s_fet[shop_name], 'Created New Offers', '', $f_fet[user_id], 'shop', 'New Coupan Launched');
        }
        
            $data[]=array("message"=>"1");
    }else{
        $data[]=array("message"=>"0");
        $pla="INSERT INTO `error_reports` (`er_id`, `ip_addreass`, `date`, `time`, `url`, `fail_query`, `note`, `s_note`, `app`) VALUES (NULL, '$ipad', '$date', '$time', '$url', '', 'coupan insert', '$_POST[shop_id]', '1');";
            $con->query($pla);
    }
}else{
    $data[]=array("message"=>"0");
}
        echo (json_encode($data));
?>