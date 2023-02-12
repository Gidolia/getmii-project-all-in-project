<?php
include "../config.php";
$sel="SELECT * FROM `product` WHERE `sc_id`='$_POST[csc_id]' AND `city` LIKE '%$_POST[city]%' AND `status`='1'";
$sed=$con->query($sel);
if($sed->num_rows>0){
    while($fetg=$sed->fetch_assoc())
    {
        $data[]=$fetg;
    }
   }else{
         $data[]=array("message"=>"0");
     }
echo (json_encode($data));

?>