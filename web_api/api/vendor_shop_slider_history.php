
<?php
include "../config.php";
//$data[]=array("message"=>"0");
$de="SELECT * FROM `shop_sliders` WHERE `shop_id`='$_POST[u_id]'";
$dc=$con->query($de);
if($dc->num_rows==0){
  $data[]=array("message"=>"0");  
}
else{
     while($fetch=$dc->fetch_assoc()){
         
         $data[]=array("ss_id"=>"$fetch[ss_id]", "shop_id"=>"$fetch[shop_id]", "img"=>"$fetch[img]", "date"=>"$fetch[date]", "time"=>"$ascs[time]", "message"=>"1");
     }
}
     echo (json_encode($data));

?>	