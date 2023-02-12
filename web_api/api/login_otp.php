<?php
include "../config.php";
$message='Welcome to oranga , '.$_POST[name].' your id OR'.$_POST[mobile].' pass '.$_POST[otp].' thanks Orgwel';
	                
	                $dd = str_replace(' ', '%20', $message);
        $url = 'http://sms.hspsms.com/sendSMS?username=oranga&message='.$dd.'&sendername=ORGWEL&smstype=TRANS&numbers='.$_POST[mobile].'&apikey=67b73c31-8c2e-4406-aafd-dda03cf3d224';
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $responsew = curl_exec($ch);
        