<?php
include "../config.php";
$sel="SELECT * FROM `demands` WHERE `u_id`='$_GET[u_id]'";
$que=$con->query($sel);
if($que->num_rows==0){
    $data[]=array("message"=>"0");
}else{
    while($fetch=$que->fetch_assoc())
    {
    
    
    $data[]=array("id"=>"$fetch[d_id]", "user_id"=>"$fetch[u_id]", "product_name"=>"$fetch[product_name]", "amount"=>"$fetch[amount]", "image1"=>"$fetch[image1]", "image2"=>"$fetch[image2]", "image3"=>"$fetch[image3]", "demand_status"=>"$fetch[demand_status]", "description"=>"$fetch[description]","shop_id"=>"$fetch[vendor_id]", "message"=>"1");
    }
}
 echo (json_encode($data));
?>
