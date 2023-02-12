<?php
include "../config.php";
//$data[]=array("message"=>"0");
$de="SELECT * FROM `coupan`";
$dc=$con->query($de);
if($dc->num_rows==0){
  $data[]=array("message"=>"0");  
}
else{
     while($fetch=$dc->fetch_assoc()){
         $data[]=array("coun_id"=>"$fetch[coun_id]", "img"=>"$fetch[img]", "expiry_days"=>"$fetch[expiry_days]", "status"=>"$fetch[status]", "message"=>"1");
     }
}
     echo (json_encode($data));
?>	