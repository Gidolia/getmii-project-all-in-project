<?php
include "../config.php";
$u_id=$_POST[u_id];
$sel="SELECT * FROM `shop_like_comment` WHERE `user_id`='$u_id' AND `like`='1'";
$que=$con->query($sel);
if($que->num_rows==0){
    $data[]=array("message"=>"0");
}else{
    while($fetch=$que->fetch_assoc())
    {
        $al="SELECT * FROM `user` WHERE `u_id`='$fetch[shop_id]'";
        $axop=$con->query($al);
        $fetv=$axop->fetch_assoc();
        $data[]=array("shop_id"=>"$fetch[shop_id]", "shop_name"=>"$fetv[shop_name]", "shop_mobile"=>"$fetv[shop_mobile]", "shop_addreass"=>"$fetv[shop_addreass]", "shop_logo"=>"$fetv[shop_logo]", "message"=>"1");
    }
}
 echo (json_encode($data));
?>
