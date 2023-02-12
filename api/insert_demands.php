
<?php
include "../config.php";

function password_generate($chars) 
{
  $data = '123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
  return substr(str_shuffle($data), 0, $chars);
}

    $d_id=password_generate(9);
    

if (file_exists("../demand_img/" .$d_id."1.jpg"))
{
unlink("../demand_img/" .$d_id."1.jpg");
  
}
if(move_uploaded_file($_FILES["image1"]["tmp_name"], "../demand_img/".$d_id."1.jpg"))
{   $img1=$d_id."1.jpg";
    if(move_uploaded_file($_FILES["image2"]["tmp_name"], "../demand_img/".$d_id."2.jpg")){$img2=$d_id."2.jpg";}
    if(move_uploaded_file($_FILES["image3"]["tmp_name"], "../demand_img/".$d_id."3.jpg")){$img3=$d_id."3.jpg";}
    
    
    
    $s="INSERT INTO `demands` (`d_id`, `u_id`, `product_name`, `c_id`, `description`, `amount`, `image1`, `image2`, `image3`, `send_to_vendors`, `demand_status`, `vendor_id`, `c_date`, `c_time`, `a_date`, `a_time`, `city`) VALUES (NULL, '$_POST[u_id]', '$_POST[name]', '$_POST[c_id]', '$_POST[description]', '$_POST[amount]', '$img1', '$img2', '$img3', 'n', 'pending', '', '$date', '$time', '', '', '$_POST[city]');";
    if($con->query($s)===TRUE){
        $data[]=array("message"=>"1");
    }else{
        $data[]=array("message"=>"0");
        $pla="INSERT INTO `error_reports` (`er_id`, `ip_addreass`, `date`, `time`, `url`, `fail_query`, `note`, `s_note`, `app`) VALUES (NULL, '$ipad', '$date', '$time', '$url', '', 'damands entry', '$_POST[u_id]', '1');";
        $con->query($pla);
    }
}else{
    $data[]=array("message"=>"0");
    $pla="INSERT INTO `error_reports` (`er_id`, `ip_addreass`, `date`, `time`, `url`, `fail_query`, `note`, `s_note`, `app`) VALUES (NULL, '$ipad', '$date', '$time', '$url', '', 'demands Image upload', '$_POST[u_id]', '1');";
        $con->query($pla);
}echo (json_encode($data));
?>