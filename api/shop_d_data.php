<?php
include "../config.php";
$shop_id=$_GET[shop_id];
$u_id=$_GET[u_id];
$ro="SELECT * FROM `user` WHERE `u_id`='$shop_id'";

$dc=$con->query($ro);
     if($dc->num_rows>'0')
     {      $fetch=$dc->fetch_assoc();
     
            $liap="SELECT * FROM `shop_like_comment` WHERE `shop_id`='$fetch[u_id]' AND `like`='1' AND `u_id`='$shop_id'";
             $acpp=$con->query($liap);
             if($acpp->num_rows>0)
             {$followed=1;}else{
                 $followed=0;
             }
             
             
             $lia="SELECT * FROM `shop_like_comment` WHERE `shop_id`='$fetch[u_id]' AND `like`='1'";
             $acp=$con->query($lia);
             $arcd=$acp->num_rows;
             
             $folw="SELECT * FROM `shop_like_comment` WHERE `user_id`='$u_id' AND `shop_id`='$fetch[u_id]' AND `like`='1'";
             //echo $folw;
             $fol_que=$con->query($folw);
             $fol_us=$fol_que->num_rows;
             
             $lias="SELECT * FROM `shop_like_comment` WHERE `shop_id`='$fetch[u_id]' AND `comment`!=''";
             $acps=$con->query($lias);
             $arcds=$acps->num_rows;
             $liasaaa="SELECT * FROM `product` WHERE `shop_id`='$fetch[u_id]' AND `status`='1'";
             $acpsaa=$con->query($liasaaa);
             $arcdsaa=$acpsaa->num_rows;
         
         $response[]=array("u_id"=>"$fetch[u_id]", "name"=>"$fetch[name]","owner_name"=>"$fetch[owner_name]","shop_name"=>"$fetch[shop_name]","shop_mobile"=>"$fetch[shop_mobile]","bank_ifsc"=>"$fetch[ifsc]","bank_acc_no"=>"$fetch[bank_acc_no]","bank_name"=>"$fetch[bank_name]", "shop_address"=>"$fetch[shop_addreass]","shop_city"=>"$fetch[shop_city]",
         "shop_logo"=>"$fetch[shop_logo]","shop_color"=>"$fetch[shop_color]",
         "mobile"=>"$fetch[mobile]", "photo"=>"$fetch[photo]", "email"=>"$fetch[email]", "message"=>"1", "shop_reg_no"=>"$fetch[shop_reg_no]", "shop_detail"=>"$fetch[shop_detail]","addreass"=>"$fetch[addreass]","city"=>"$fetch[city]","trusted_status"=>"$fetch[trusted_status]","paid_status"=>"$fetch[paid_status]","pincode"=>"$fetch[pincode]", "shop_status"=>"$fetch[shop_status]","like_count"=>"$arcd", "comment_count"=>"$arcds", "total_product"=>"$arcdsaa", "follow_s"=>"$fol_us", "c_id"=>"$fetch[csc_id]", "about_us"=>"$fetch[about_us]", "fb_link"=>"$fetch[fb_link]", "insta_link"=>"$fetch[insta_link]", "linkedin_link"=>"$fetch[linkedin_link]", "web_link"=>"$fetch[web_link]");
        
        
     }else{
     $response[] = array("message"=>"0");
     }
     
     echo (json_encode($response));
     
        
?>