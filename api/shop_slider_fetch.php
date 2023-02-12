<?php
include "../config.php";
$sel="SELECT * FROM `shop_sliders` WHERE `shop_id`=$_GET[u_id]";
$dc=$con->query($sel);
       if($dc->num_rows>0)
        {
         while($fetch=$dc->fetch_assoc()){
             $data[]=$fetch;
         }
     }else{
         $data[]=array("message"=>"1");
     }
echo (json_encode($data));

?>