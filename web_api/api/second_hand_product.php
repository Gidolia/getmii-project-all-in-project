<?php
include "../config.php";

$de="SELECT * FROM `second_hand_category` WHERE `status`='1'";
$dc=$con->query($de);
     
     while($fetch=$dc->fetch_assoc()){
         $data[]=$fetch;
     }
     echo (json_encode($data));
?>