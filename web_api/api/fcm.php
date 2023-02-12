<?php
include "../config.php";

$message = 'fcm boss';
$device_id = 'ewEWCKyiQxa5FRM4dscTtX:APA91bFY9OTLFyz9UhmJ77rZkgNhLNj7COzXRGtK24ppScGroLwAkc8hsCCFsSyd5PkReDR5EfKK7jc65OKwwX-jZZQX6FZt_Wm6cJ03VQB1WWVzyzG8ySGTeED-BhgaGnx0ERtNbmCp';

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
                 "title" => 'deepak',
                 "content" => 'new offer',
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