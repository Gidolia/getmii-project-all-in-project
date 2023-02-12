<?php
include "../config.php";
$u_id=$_POST[u_id];
function password_generate($chars) 
{
  $data = '123456789abcdefghijklmnopqrstABCDEFGHIJKLMNOPQRSTUVWX';
  return substr(str_shuffle($data), 0, $chars);
}

    //echo $x;
    $d_id=password_generate(15);
    

if(file_exists("../shop_logo/" .$u_id.$d_id.".jpg"))
{
    unlink("../shop_logo/" .$u_id.$d_id.".jpg");
}
if(move_uploaded_file($_FILES["image"]["tmp_name"], "../shop_logo/" .$u_id.$d_id.".jpg"))
{   $img1=$u_id.$d_id.".jpg";
    $re="INSERT INTO `shop_sliders` (`ss_id`, `shop_id`, `img`, `date`, `time`) VALUES (NULL, '$_POST[u_id]', '$img1', '$date', '$time');";
    $con->query($re);
    $data[]=array("message"=>"1");
}else{$data[]=array("message"=>"0");}
echo (json_encode($data));
?>