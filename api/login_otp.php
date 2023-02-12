<?php
$mr='Your code is {'.$_POST[otp].'} - Regards getmii';
//$message='Welcome to oranga , '.$_POST[name].' your id OR'.$_POST[mobile].' pass '.$_POST[otp].' thanks Orgwel';

	                $dd = str_replace(' ', '%20', $mr);
	   $url = 'http://sms.rootstechnology.in/index.php/smsapi/httpapi/?secret=VB2q2z83r1Kp36Xbn1UV&sender=GETMII&tempid=1207162408262913331&receiver='.$_POST[mobile].'&route=TA&msgtype=1&sms='.$dd;
	   //echo $url;
    
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $responsew = curl_exec($ch);
        //echo $responsew;
        