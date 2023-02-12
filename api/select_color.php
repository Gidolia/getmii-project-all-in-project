<?php
include "../config.php";

$de="SELECT * FROM `colors`";
$dc=$con->query($de);
if($dc->num_rows>0){
     while($fetch=$dc->fetch_assoc()){
         $data[]=array("id"=>"$fetch[id]", "color_name"=>"$fetch[color_name]", "color_value"=>"$fetch[color_value]", "message"=>"1");
         //$data[]=$fetch;
     }
}else{ 
    $data[]=array("message"=>"0");
}
     echo (json_encode($data));
?>