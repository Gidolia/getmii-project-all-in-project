<?php
include "config.php";
if($_GET[del]==1 && $_GET[p_id]>0){
    unlink("../../../images/" .$_GET[img_src]);
    
    if($_GET[img]=='2'){
    $dd="UPDATE `product` SET `photo2` = '' WHERE `product`.`p_id` = '$_GET[p_id]';";
    }elseif($_GET[img]=='3'){
    $dd="UPDATE `product` SET `photo3` = '' WHERE `product`.`p_id` = '$_GET[p_id]';";
    }elseif($_GET[img]=='4'){
    $dd="UPDATE `product` SET `photo4` = '' WHERE `product`.`p_id` = '$_GET[p_id]';";
    }elseif($_GET[img]=='5'){
    $dd="UPDATE `product` SET `photo5` = '' WHERE `product`.`p_id` = '$_GET[p_id]';";
    }
    if($con->query($dd)===TRUE){
        echo "<script>location.href='edit_product_img.php?n=b_d&p_id=".$_GET[p_id]."';</script>";
    }
}
elseif(isset($_POST[sub_plave])){
    
    function password_generate($chars) 
    {
      $data = '123456789ABCDEGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
      return substr(str_shuffle($data), 0, $chars);
    }
    
        //echo $x;
        $d_id=password_generate(15);

    if(move_uploaded_file($_FILES["img"]["tmp_name"], "../../../images/".$_POST[p_id].$d_id.$_POST[img_n].".jpg"))
	{echo "1";
	    $imf=$_POST[p_id].$d_id.$_POST[img_n].".jpg";
	    unlink("../../../images/" .$_POST[img_src]);
    
    if($_POST[img_n]=='1'){
    $dd="UPDATE `product` SET `photo1` = '$imf' WHERE `product`.`p_id` = '$_POST[p_id]';";
    }elseif($_POST[img_n]=='2'){
    $dd="UPDATE `product` SET `photo2` = '$imf' WHERE `product`.`p_id` = '$_POST[p_id]';";
    }elseif($_POST[img_n]=='3'){
    $dd="UPDATE `product` SET `photo3` = '$imf' WHERE `product`.`p_id` = '$_POST[p_id]';";
    }elseif($_POST[img_n]=='4'){
    $dd="UPDATE `product` SET `photo4` = '$imf' WHERE `product`.`p_id` = '$_POST[p_id]';";
    }elseif($_POST[img_n]=='5'){
    $dd="UPDATE `product` SET `photo5` = '$imf' WHERE `product`.`p_id` = '$_POST[p_id]';";
    }
    
    
    
    
    if($con->query($dd)===TRUE){
        echo "<script>location.href='edit_product_img.php?n=b_s&p_id=$_POST[p_id]';</script>";
    }else{
        echo "<script>location.href='edit_product_img.php?n=b_f&p_id=".$_POST[p_id]."';</script>";
    }
	}
    
}