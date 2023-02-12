<?php
include "../config.php";

$de="SELECT * FROM `return_policy`";
$dc=$con->query($de);
if($dc->num_rows>0){
     while($fetch=$dc->fetch_assoc()){
         $data[]=array("returnp_id"=>"$fetch[returnp_id]", "policy_duration"=>"$fetch[policy_duration]", "name"=>"$fetch[policy_text]", "message"=>"1");
         //$data[]=$fetch;
     }
}else{ 
    $data[]=array("message"=>"0");
}
     echo (json_encode($data));
?>