<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);
include "../../../config.php";
session_start();

$rec_activitey="INSERT INTO `activity_record` (`ar_id`, `ip_addreass`, `url`, `date`, `time`, `admin_id`, `u_id`, `s_id`, `token_id`, `city`) VALUES (NULL, '$ipad', '$url', '$date', '$time', '$_SESSION[a_id]', '', '', '', '');"; 
$con->query($rec_activitey);

                //echo $_SESSION[d_id];
		     // echo $_SESSION[d_password];
    $que="SELECT * FROM `admin` WHERE `a_id`='$_SESSION[a_id]' AND `password`='$_SESSION[a_password]'";
    $res=$con->query($que);
		  if ($res->num_rows != 1)
		  {
			   echo "<script>location.href='login.php';</script>";
		  }
		  else
			  include("functions.php");
			  $d_detail=mysqli_fetch_assoc($res);
////////////////////////////////////////////function for sending notificatuion			  
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
?>