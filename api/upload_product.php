<?php
include "../config.php";
    
    $selcscsss="SELECT * FROM `user` WHERE `u_id`='$_POST[u_id]'";
    $aspxxxx=$con->query($selcscsss);
    $cscss_fet=$aspxxxx->fetch_assoc();
    
    $selcsc="SELECT * FROM `city_sub_category` WHERE `csc_id`='$_POST[csc_id]'";
    $asp=$con->query($selcsc);
    $csc_fet=$asp->fetch_assoc();
    function password_generate($chars) 
    {
      $data = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
      return substr(str_shuffle($data), 0, $chars);
    }
        $d_id=password_generate(15);
        $sela="SELECT MAX(p_id) AS `maxp_id` FROM `product`";
        $apoe=$con->query($sela);
        $p_fet=$apoe->fetch_assoc();
        $p_id=$p_fet[maxp_id]+1;
    if (file_exists("../images/" .$p_id.$d_id.".jpg"))
    {
    unlink("../images/" .$p_id.$d_id.".jpg");
      echo $d_id.".jpg" . " already exists. ";
    }
    if(move_uploaded_file($_FILES["img"]["tmp_name"], "../images/".$p_id.$d_id.".jpg"))
	{
	    $imf=$p_id.$d_id.".jpg";
	    if(move_uploaded_file($_FILES["img1"]["tmp_name"], "../images/".$p_id.$d_id."2.jpg"))
	    {
	        $imf2=$p_id.$d_id."2.jpg";
	    }
	    if(move_uploaded_file($_FILES["img2"]["tmp_name"], "../images/".$p_id.$d_id."3.jpg"))
	    {
	        $imf3=$p_id.$d_id."3.jpg";
	    }
	    if(move_uploaded_file($_FILES["img3"]["tmp_name"], "../images/".$p_id.$d_id."4.jpg"))
	    {
	        $imf4=$p_id.$d_id."4.jpg";
	    }
	    if(move_uploaded_file($_FILES["img4"]["tmp_name"], "../images/".$p_id.$d_id."5.jpg"))
	    {
	        $imf5=$p_id.$d_id."5.jpg";
	    }
	    $dp=100-($_POST[sp]*100/$_POST[mrp]);
        $fr="INSERT INTO `product` (`p_id`, `pm_id`, `c_id`, `sc_id`, `product_name`, `type1name`, `type1value`, `color_name`, `type4`, `short_description`, `long_description`, `photo1`, `photo2`, `photo3`, `photo4`, `photo5`, `stock`, `shop_id`, `brand_name`, `mrp`, `sp`, `d_percentage`, `delivery_charge`, `message`, `delivery_time`, `city`, `return_policy`, `shop_color`, `status`, `country`) VALUES ('$p_id', '$p_id', '$csc_fet[c_id]', '$_POST[csc_id]', '$_POST[name]', '', '', '$_POST[color]', '', '$_POST[short_description]', '$_POST[long_description]', '$imf', '$imf2', '$imf3', '$imf4', '$imf5', '$_POST[stock]', '$_POST[u_id]', '$_POST[brand_name]', '$_POST[mrp]', '$_POST[sp]', '$dp', '', '1', '$_POST[shippingtime]', '$cscss_fet[shop_city]', '$_POST[returnpolicy]', '$cscss_fet[shop_color]', '1', '$_POST[country]');";
        //echo $fr;
        if($con->query($fr)===TRUE){
            $edp="INSERT INTO `product_information` (`pi_id`, `p_id`, `attributes_name`, `attributes_value`) VALUES (NULL, '$p_id', '$_POST[manual_data]', '$_POST[select_data]');";
                    $con->query($edp);
                    
           /* $num=count($_POST['ahs_name']);
            //echo $num;
            for($t=0; $t<$num; $t++){
                if(trim($_POST[ahs_name][$t]) !='')
                {
                    $a_name=$_POST[ahs_name][$t];
                    $a_value=$_POST[ahs_value][$t];
                    $edp="INSERT INTO `product_information` (`pi_id`, `p_id`, `attributes_name`, `attributes_value`) VALUES (NULL, '$p_id', '$a_name', '$a_value');";
                    $con->query($edp);
                }
            }*/
            $data[]=array("message"=>"1");  
        }else{
            $pla="INSERT INTO `error_reports` (`er_id`, `ip_addreass`, `date`, `time`, `url`, `fail_query`, `note`, `s_note`, `app`) VALUES (NULL, '$ipad', '$date', '$time', '$url', '', 'Add product api', '$_GET[u_id]', '1');";
            $con->query($pla);
            $data[]=array("message"=>"0");  
        }
	}
     echo (json_encode($data));
