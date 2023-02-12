<?php
include "../config.php";

$de="SELECT * FROM `attributes_hundler_select` WHERE `ah_id`='$_POST[ah_id]'";
$dc=$con->query($de);
if($dc->num_rows>0){
     while($fetch=$dc->fetch_assoc()){
         $data[]=array("ahs_id"=>"$fetch[ahs_id]", "ah_id"=>"$fetch[ah_id]", "name"=>"$fetch[name]", "message"=>"1");
         //$data[]=$fetch;
     }
}else{ 
    $data[]=array("message"=>"0");
}
     echo (json_encode($data));
?>