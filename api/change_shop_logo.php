<?php
include "../config.php";
$u_id=$_POST[u_id];
if(file_exists("../shop_logo/" .$u_id.".jpg"))
{
    unlink("../shop_logo/" .$u_id.".jpg");
}
if(move_uploaded_file($_FILES["logo"]["tmp_name"], "../shop_logo/" .$u_id.".jpg"))
{   $img1=$u_id.".jpg";
    $re="UPDATE `user` SET `shop_logo` = '$img1' WHERE `user`.`u_id` = '$u_id';";
    $con->query($re);
    $data[]=array("message"=>"1");
}
echo (json_encode($data));
?>