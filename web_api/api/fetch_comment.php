
<?php
include "../config.php";
//$data[]=array("message"=>"0");
$de="SELECT * FROM `shop_like_comment` WHERE `shop_id`='$_POST[shop_id]' AND `like`!='1'";
$dc=$con->query($de);
if($dc->num_rows==0){
  $data[]=array("message"=>"0");  
}
else{
     
     while($fetch=$dc->fetch_assoc()){
         $das="SELECT * FROM `user` WHERE `u_id`='$fetch[user_id]'";
         $asc=$con->query($das);
         $ascs=$asc->fetch_assoc();
         //$data[]=$fetch;
         
         $data[]=array("slc_id"=>"$fetch[slc_id]", "u_id"=>"$fetch[u_id]", "name"=>"$ascs[name]", "date"=>"$fetch[date]", "time"=>"$fetch[time]", "comment"=>"$fetch[comment]", "message"=>"1");
     }
}
     echo (json_encode($data));

?>	