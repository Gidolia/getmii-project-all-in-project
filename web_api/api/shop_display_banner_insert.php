<?php
include "../config.php";
$u_id=$_POST['u_id'];
function password_generate($chars) 
{
  $data = '123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
  return substr(str_shuffle($data), 0, $chars);
}

    //echo $x;
    $d_id=password_generate(15);
    
///////////////////////////////////for single img
if($_POST[a]==1)
{
    if(file_exists("../shop_display/" .$u_id.$d_id."1.jpg"))
    {
        unlink("../shop_display/" .$u_id.$d_id."1.jpg");
    }
    if(move_uploaded_file($_FILES["img1"]["tmp_name"], "../shop_display/" .$u_id.$d_id."1.jpg"))
    {   $img1=$u_id.$d_id."1.jpg";
        $re="INSERT INTO `shop_poster` (`sp_id`, `shop_id`, `img_no`, `img`, `img2`, `img3`, `img4`, `c_date`, `c_time`, `color`) VALUES (NULL, '$_POST[u_id]', '1', '$img1', '', '', '', '$date', '$time', '$_POST[color]');";
        $con->query($re);
        $data[]=array("message"=>"1");
    }else{$data[]=array("message"=>"3");}
}
elseif($_POST[a]==2)
{
    if(file_exists("../shop_display/" .$u_id.$d_id."1.jpg") && file_exists("../shop_display/" .$u_id.$d_id."2.jpg"))
    {
        unlink("../shop_display/" .$u_id.$d_id."1.jpg");
        unlink("../shop_display/" .$u_id.$d_id."2.jpg");
    }
    if(move_uploaded_file($_FILES["img1"]["tmp_name"], "../shop_display/" .$u_id.$d_id."1.jpg") && move_uploaded_file($_FILES["img2"]["tmp_name"], "../shop_display/" .$u_id.$d_id."2.jpg"))
    {   $img1=$u_id.$d_id."1.jpg";
        $img2=$u_id.$d_id."2.jpg";
        $re="INSERT INTO `shop_poster` (`sp_id`, `shop_id`, `img_no`, `img`, `img2`, `img3`, `img4`, `c_date`, `c_time`, `color`) VALUES (NULL, '$_POST[u_id]', '2', '$img1', '$img2', '', '', '$date', '$time', '$_POST[color]');";
        $con->query($re);
        $data[]=array("message"=>"1");
    }else{$data[]=array("message"=>"0");}
}
elseif($_POST[a]==4)
{
    if(file_exists("../shop_display/" .$u_id.$d_id."1.jpg") && file_exists("../shop_display/" .$u_id.$d_id."2.jpg") && file_exists("../shop_display/" .$u_id.$d_id."3.jpg") && file_exists("../shop_display/" .$u_id.$d_id."4.jpg"))
    {
        unlink("../shop_display/" .$u_id.$d_id."1.jpg");
        unlink("../shop_display/" .$u_id.$d_id."2.jpg");
        unlink("../shop_display/" .$u_id.$d_id."3.jpg");
        unlink("../shop_display/" .$u_id.$d_id."4.jpg");
    }
    if(move_uploaded_file($_FILES["img1"]["tmp_name"], "../shop_display/" .$u_id.$d_id."1.jpg") && move_uploaded_file($_FILES["img2"]["tmp_name"], "../shop_display/" .$u_id.$d_id."2.jpg") && move_uploaded_file($_FILES["img3"]["tmp_name"], "../shop_display/" .$u_id.$d_id."3.jpg") && move_uploaded_file($_FILES["img4"]["tmp_name"], "../shop_display/" .$u_id.$d_id."4.jpg"))
    {   $img1=$u_id.$d_id."1.jpg";
        $img2=$u_id.$d_id."2.jpg";
        $img3=$u_id.$d_id."3.jpg";
        $img4=$u_id.$d_id."4.jpg";
        $re="INSERT INTO `shop_poster` (`sp_id`, `shop_id`, `img_no`, `img`, `img2`, `img3`, `img4`, `c_date`, `c_time`, `color`) VALUES (NULL, '$_POST[u_id]', '4', '$img1', '$img2', '$img3', '$img4', '$date', '$time','$_POST[color]');";
        $con->query($re);
        $data[]=array("message"=>"1");
    }else{$data[]=array("message"=>"0");}
}else{$data[]=array("message"=>"0");}
echo (json_encode($data));
?>