
<?php
include "../config.php";

function password_generate($chars) 
{
  $data = '123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
  return substr(str_shuffle($data), 0, $chars);
}

    $d_id=password_generate(9);
    

if (file_exists("../second_hand_img/" .$d_id."1.jpg"))
{
unlink("../second_hand_img/" .$d_id."1.jpg");
  
}
if(move_uploaded_file($_FILES["image1"]["tmp_name"], "../second_hand_img/".$d_id."1.jpg"))
{   $img1=$d_id."1.jpg";
    if(move_uploaded_file($_FILES["image2"]["tmp_name"], "../second_hand_img/".$d_id."2.jpg")){$img2=$d_id."2.jpg";}
    if(move_uploaded_file($_FILES["image3"]["tmp_name"], "../second_hand_img/".$d_id."3.jpg")){$img3=$d_id."3.jpg";}
    
    
    $s="INSERT INTO `second_hand_product` (`shp_id`, `shc_id`, `u_id`, `name`, `old`, `product_description`, `amount`, `main_img`, `img2`, `img3`, `status`, `city`, `date`, `time`) VALUES (NULL, '$_POST[shc_id]', '$_POST[u_id]', '$_POST[name]', '$_POST[old]', '$_POST[p_description]', '$_POST[amount]', '$img1', '$img2', '$img3', '0', '$_POST[city]', '$date', '$time');";
    if($con->query($s)===TRUE){
        $data[]=array("message"=>"1");
    }else{
        $data[]=array("message"=>"0");
        $pla="INSERT INTO `error_reports` (`er_id`, `ip_addreass`, `date`, `time`, `url`, `fail_query`, `note`, `s_note`, `app`) VALUES (NULL, '$ipad', '$date', '$time', '$url', '', 'second hand entry', '$_POST[u_id]', '1');";
        $con->query($pla);
    }
}else{
    $data[]=array("message"=>"0");
    $pla="INSERT INTO `error_reports` (`er_id`, `ip_addreass`, `date`, `time`, `url`, `fail_query`, `note`, `s_note`, `app`) VALUES (NULL, '$ipad', '$date', '$time', '$url', '', 'second hand Image upload', '$_POST[u_id]', '1');";
        $con->query($pla);
}echo (json_encode($data));
?>