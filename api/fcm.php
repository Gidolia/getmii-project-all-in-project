<?php
include "../config.php";

$message = 'Your Order Confirmed';
$device_id = 'ecrxxNNcTkmeSFzPowScld:APA91bEQyxwrc2wFSyXEuiXBgAu-DpjBWbZ6lNi8ibjCT7YCmKNLXt2o00c-9U6tZkkucRg1iHzEJJnjYKEdLK7sQ0Jy4HrfzN-0FaGkc0oXDF6IPfek2vjLupki1Gi6z8mpjCijDNEV';

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
                "message" => $message,
                 "title" => 'sameer thakur',
                 "content" => 'Your Order Get Confirmed',
                  "click_action" => 'new1',
                
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
      echo $result;
    curl_close($ch);
 
    // echo json_encode($fields)


?>	