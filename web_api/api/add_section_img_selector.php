<?php
include "../config.php";
$de="SELECT * FROM `add_type`";
$dc=$con->query($de);
     while($fetch=$dc->fetch_assoc()){
         $data[]=$fetch;
     }
     echo (json_encode($data));
?>