<?php
include "../config.php";

$de="SELECT * FROM `product` WHERE `p_id` = '$_POST[p_id]'";
$dc=$con->query($de);
     if($dc->num_rows>0)
     {
         while($fetch=$dc->fetch_assoc()){
             $data[]=$fetch;
         }
     }else{
         $data[]=array("message"=>"0");
     }
     echo (json_encode($data));
?>