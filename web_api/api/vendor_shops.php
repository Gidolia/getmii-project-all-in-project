<?php
include "../config.php";

$de="SELECT u_id,shop_name,shop_city,owner_name,shop_mobile,shop_addreass,	csc_id, shop_logo,trusted_status,paid_status FROM `user` WHERE `shop_name`!='' AND `shop_city` LIKE '%$_POST[city]%' AND `csc_id` = '$_POST[c_id]' AND `approval_status`!='p' AND `shop_status`='1'";

$dc=$con->query($de);
     if($dc->num_rows>0)
     {
         while($fetch=$dc->fetch_assoc()){
             
             $liap="SELECT * FROM `shop_like_comment` WHERE `shop_id`='$fetch[u_id]' AND `like`='1' AND `u_id`='$_POST[u_id]'";
             $acpp=$con->query($liap);
             if($acpp->num_rows>0)
             {$followed=1;}else{
                 $followed=0;
             }
             
             
             $lia="SELECT * FROM `shop_like_comment` WHERE `shop_id`='$fetch[u_id]' AND `like`='1'";
             $acp=$con->query($lia);
             $arcd=$acp->num_rows;
             $lias="SELECT * FROM `shop_like_comment` WHERE `shop_id`='$fetch[u_id]' AND `comment`!=''";
             $acps=$con->query($lias);
             $arcds=$acps->num_rows;
             $liasaaa="SELECT * FROM `product` WHERE `shop_id`='$fetch[u_id]' AND `status`='1'";
             $acpsaa=$con->query($liasaaa);
             $arcdsaa=$acpsaa->num_rows;
             
             $data[]=array("id"=>"$fetch[u_id]", "shop_name"=>"$fetch[shop_name]", "shop_city"=>"$fetch[shop_city]", "shop_area"=>"$fetch[shop_area]", "owner_name"=>"$fetch[owner_name]", "shop_number"=>"$fetch[shop_number]", "shop_address"=>"$fetch[shop_address]", "cat_id"=>"$fetch[cat_id]", "shop_logo"=>"$fetch[shop_logo]", "like_count"=>"$arcd", "comment_count"=>"$arcds", "total_product"=>"$arcdsaa", "shop_color"=>"$fetch[shop_color]", "followed"=>"$followed", "message"=>"1", "paid_status"=>"$fetch[paid_status]", "trusted_status"=>"$fetch[trusted_status]");
           
         }
     }else{
       $data[]=array("message"=>"0", "c_id"=>"$_POST[c_id]");
     
     }
     echo (json_encode($data));
     
?>
