<?php
include "../config.php";
$de="SELECT * FROM `best_deal`";
$dc=$con->query($de);
if($dc->num_rows==0){
  $data[]=array("message"=>"0");  
}
else{
    $data[]=array("bd_id"=>"$fetch[bd_id]", "price"=>"$fetch[price]", "s_date"=>"$fetch[s_date]", "e_date"=>"$fetch[e_date]", "city"=>"$fetch[city]", "india"=>"$fetch[india]", "img"=>"$fetch[img]", "c_id"=>"$fetch[c_id]", "heading"=>"$fetch[heading]", "message"=>"1");
}
 echo (json_encode($data));
?>