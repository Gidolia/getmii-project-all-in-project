<?php
include "../config.php";


$de="SELECT * FROM `city_category` WHERE `status`='1'  ORDER BY `city_category`.`place` ASC";
$dc=$con->query($de);
     
     while($fetch=$dc->fetch_assoc()){
         $data[]=$fetch;
     }
     echo (json_encode($data));
?>