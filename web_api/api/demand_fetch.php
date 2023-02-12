<?php
include "../config.php";
$sel="SELECT * FROM `demands` WHERE `u_id`='$_POST[u_id]'";
$que=$con->query($sel);
if($que->num_rows==0){
    $data[]=array("message"=>"0");
}else{
    while($fetch=$que->fetch_assoc())
    {
    //$data[]=array("d_id"=>"$fetch[d_id]", "u_id"=>"$fetch[u_id]", "product_name"=>"$fetch[product_name]", "amount"=>"$fetch[amount]", "image1"=>"$fetch[image1]", "demand_status"=>"$fetch[demand_status]", "description"=>"$fetch[description]", "message"=>"1");
    $data[]=array("id"=>"$fetch[d_id]", "user_id"=>"$fetch[u_id]", "product_name"=>"$fetch[product_name]", "amount"=>"$fetch[amount]", "image1"=>"$fetch[image1]", "demand_status"=>"$fetch[demand_status]", "description"=>"$fetch[description]", "message"=>"1");
    }
}
 echo (json_encode($data));
?>
