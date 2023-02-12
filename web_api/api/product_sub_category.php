<?php
include "../config.php";

$de="SELECT * FROM `product` WHERE `sc_id`='$_POST[sc_id]'";
$dc=$con->query($de);
     
     while($fetch=$dc->fetch_assoc()){
         $data[]=$fetch;
     }
     echo (json_encode($data));
?>