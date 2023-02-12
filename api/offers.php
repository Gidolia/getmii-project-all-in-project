<?php
include "../config.php";
//$data[]=array("message"=>"0");
$de="SELECT * FROM `users_offers`";
$dc=$con->query($de);
if($dc->num_rows==0){
  $data[]=array("message"=>"0");
}
else{
     while($fetch=$dc->fetch_assoc()){
        
     
     $data[]=array("uo_id"=>"$fetch[uo_id]", "name"=>"$fetch[name]", "detail"=>"$fetch[detail]", "coupon"=>"$fetch[coupan]", "till_date"=>"$fetch[till_date]", "link"=>"$fetch[link]", "image"=>"$fetch[image]", "amount"=>"$fetch[amount]", "date"=>"$fetch[date]", "time"=>"$fetch[time]", "message"=>"1");
     }
}
     echo (json_encode($data));

?>	