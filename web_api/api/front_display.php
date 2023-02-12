<?php
include "../config.php";
$fro="SELECT * FROM `front_display`";
$dc=$con->query($fro);
   
    while($fetch=$dc->fetch_assoc()){
     $data[]=$fetch;
    }
    
     echo (json_encode($data));
?>