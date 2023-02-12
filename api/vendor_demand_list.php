<?php
include "../config.php";
$c_id=$_GET[c_id];
$sel="SELECT * FROM `demands` WHERE `c_id`='$c_id' AND `city` LIKE '$_GET[city]' AND `send_to_vendors`='y'";
$que=$con->query($sel);
    

    while($fetch=$que->fetch_assoc())
    {
        $data[]=array("d_id"=>"$fetch[d_id]","shop_id"=>"$fetch[u_id]", "product_name"=>"$fetch[product_name]", "c_id"=>"$fetch[c_id]", "description"=>"$fetch[description]", "amount"=>"$fetch[amount]", "image1"=>"$fetch[image1]", "image2"=>"$fetch[image2]", "image3"=>"$fetch[image3]", "demand_status"=>"$fetch[demand_status]", "vendor_id"=>"$fetch[vendor_id]", "c_date"=>"$fetch[c_date]", "c_time"=>"$fetch[c_time]", "message"=>"1");
    }


 echo (json_encode($data));
?>
