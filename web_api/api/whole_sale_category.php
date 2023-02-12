<?php
include "../config.php";

$de="SELECT * FROM `whole_sale_category` WHERE `status`='1'";
$dc=$con->query($de);
     
     while($fetch=$dc->fetch_assoc()){
         $data[]=$fetch;
     }
     echo (json_encode($data));
?>