<?php
include "../config.php";

$de="SELECT * FROM `shipping_time`";
$dc=$con->query($de);
if($dc->num_rows>0){
     while($fetch=$dc->fetch_assoc()){
         $data[]=array("st_id"=>"$fetch[st_id]", "name"=>"$fetch[text]", "message"=>"1");
         //$data[]=$fetch;
     }
}else{ 
    $data[]=array("message"=>"0");
}
     echo (json_encode($data));
?>