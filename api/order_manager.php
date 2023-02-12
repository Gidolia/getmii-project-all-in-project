<?php
include "../config.php";


$de="SELECT * FROM `order_manager` WHERE `o_id`='$_GET[o_id]'";
$dc=$con->query($de);

if($dc->num_rows==0){
  $data[]=array("message"=>"0"); 
}
else{
    while($geta=$dc->fetch_assoc()){
    $data[]=array("om_id"=>"$geta[om_id]", "o_id"=>"$geta[o_id]", "o_confirmed"=>"$geta[o_confirmed]", "date"=>"$geta[date]", "time"=>"$geta[time]", "message"=>"1");
    }
    
}
    echo (json_encode($data));