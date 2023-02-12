<?php
include "../config.php";

$de="SELECT * FROM `attributes_manual` WHERE `csc_id`='$_POST[csc_id]'";
$dc=$con->query($de);
if($dc->num_rows>0){
     while($fetch=$dc->fetch_assoc()){
         $data[]=array("am_id"=>"$fetch[am_id]", "csc_id"=>"$fetch[csc_id]", "name"=>"$fetch[name]", "message"=>"1");
         //$data[]=$fetch;
     }
}else{ 
    $data[]=array("message"=>"0");
}
     echo (json_encode($data));
?>