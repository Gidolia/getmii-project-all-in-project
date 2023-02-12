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

$d_id=$_POST[d_id];
$shop_id=$_POST[shop_id];
if($d_id>0){
    $upd="UPDATE `demands` SET `demand_status` = 'accept', `vendor_id`='$shop_id' WHERE `demands`.`d_id` = '$d_id';";
    if($con->query($upd)===TRUE){
        $data[]=array("message"=>"1");
        $sel_d="SELECT * FROM `demands` WHERE `d_id`='$d_id'";
        $que_d=$con->query($sel_d);
        $fet_d=$que_d->fetch_assoc();
        
        $s_sel="SELECT shop_name FROM `user` WHERE `u_id`='$shop_id'";
        $s_que=$con->query($s_sel);
        $s_fet=$s_que->fetch_assoc();
        
        fcm($s_fet[shop_name], "Accepted Your Request", "http://eibo.in/getmii/demand_img/".$fetd[image1], $fet_d[u_id], "my_demand", "Demand Accepted");
    }
    else{
        $data[]=array("message"=>"0");  
    }
      
}else{
    $data[]=array("message"=>"2");
}
 echo (json_encode($data));

?>