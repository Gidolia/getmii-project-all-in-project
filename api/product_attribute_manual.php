<?php
include "../config.php";

$de="SELECT * FROM `product_information` WHERE `p_id`='$_GET[p_id]'";
$dc=$con->query($de);
if($dc->num_rows>0){
     while($fetch=$dc->fetch_assoc()){
         echo $fetch[attributes_name];
        //  echo $fetch[attributes_value];
         //$dati[]=$fetch[attributes_name];
         //$data[]=$fetch;
     }
}else{
    $dati[]=array("message"=>"0");
    echo (json_encode($dati));
}
     
?>