<?php
include "../config.php";
//$data[]=array("message"=>"0");
$de="SELECT * FROM `add_type`";
$dc=$con->query($de);
if($dc->num_rows==0){
  $data[]=array("message"=>"0");  
}
else{
     while($fetch=$dc->fetch_assoc()){
         $data[]=array("at_id"=>"$fetch[at_id]", "name"=>"$fetch[name]", "image"=>"$fetch[image]", "amount"=>"$fetch[amount]", "message"=>"1");
     }
}
     echo (json_encode($data));
?>	