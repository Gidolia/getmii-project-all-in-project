<?php 
include "../config.php";
$sed="SELECT * FROM `cart` WHERE `u_id`='$_POST[u_id]'";
$co=$con->query($sed);
$count=$co->num_rows;
$data[]=array("cart_count"=>"$count");  
echo (json_encode($data));
?>