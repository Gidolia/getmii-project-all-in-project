<?php
include "../config.php";

$de="SELECT * FROM `shop_add`";
$dc=$con->query($de);
     
     while($fetch=$dc->fetch_assoc()){
         $data[]=$fetch;
     }
     echo (json_encode($data));
?>