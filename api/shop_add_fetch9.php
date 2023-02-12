<?php
include "../config.php";
//$data[]=array("message"=>"0");
if($_POST[shop_id]>0)
{
$de="SELECT * FROM `shop_add` WHERE `shop_id`='$_POST[shop_id]'";
$dc=$con->query($de);
if($dc->num_rows==0){
  $data[]=array("message"=>"0");
}
else{
     while($fetch=$dc->fetch_assoc())
     {
         $psa="SELECT * FROM `product` WHERE `p_id` = '$fetch[p_id1]'";
         $pque=$con->query($psa);
         $p_fet1=$pque->fetch_assoc();
         $psa2="SELECT * FROM `product` WHERE `p_id` = '$fetch[p_id2]'";
         $pque2=$con->query($psa2);
         $p_fet2=$pque2->fetch_assoc();
         $psa3="SELECT * FROM `product` WHERE `p_id` = '$fetch[p_id3]'";
         $pque3=$con->query($psa3);
         $p_fet3=$pque3->fetch_assoc();
         $psa4="SELECT * FROM `product` WHERE `p_id` = '$fetch[p_id4]'";
         $pque4=$con->query($psa4);
         $p_fet4=$pque4->fetch_assoc();
         
          $psa5="SELECT * FROM `shop_sliders` WHERE `ss_id` ='$fetch[banner]'";
         $pque5=$con->query($psa5);
         $p_fet5=$pque5->fetch_assoc();
       
         
     $data[]=array("sa_id"=>"$fetch[sa_id]", "at_id"=>"$fetch[at_id]", "header_name"=>"$fetch[header_name]", "img_no"=>"$fetch[img_no]", "amount"=>"$fetch[amount]", "banner"=>"$fetch[banner]", "days"=>"$fetch[days]", "color"=>"$fetch[color]", "date"=>"$fetch[c_date]", "e_date"=>"$fetch[e_date]", "city"=>"$fetch[city]", "p_id1"=>"$fetch[p_id1]", "p_id2"=>"$fetch[p_id2]", "p_id3"=>"$fetch[p_id3]", "p_id"=>"$fetch[p_id4]", "p_img1"=>"$p_fet1[photo1]", "p_img2"=>"$p_fet2[photo1]", "p_img3"=>"$p_fet3[photo1]", "p_img4"=>"$p_fet4[photo1]", "p_img5"=>"$p_fet5[img]", "p1_mrp"=>"$p_fet1[mrp]", "p2_mrp"=>"$p_fet2[mrp]", "p3_mrp"=>"$p_fet3[mrp]", "p4_mrp"=>"$p_fet4[mrp]", "p1_sp"=>"$p_fet1[sp]", "p2_sp"=>"$p_fet2[sp]",  "p3_sp"=>"$p_fet3[sp]", "p4_sp"=>"$p_fet4[sp]", "p1_name"=>"$p_fet1[product_name]", "p2_name"=>"$p_fet2[product_name]", "p3_name"=>"$p_fet3[product_name]", "p4_name"=>"$p_fet4[product_name]", "p1_d_percentage"=>"$p_fet1[d_percentage]", "p2_d_percentage"=>"$p_fet2[d_percentage]", "p3_d_percentage"=>"$p_fet3[d_percentage]", "p4_d_percentage"=>"$p_fet4[d_percentage]", "shop_id"=>"$fetch[shop_id]",  "message"=>"1");
     }
}
}else{
$de="SELECT * FROM `shop_add` WHERE `city` LIKE '%$_POST[city]%' AND `banner_position`='9' AND `status`='1' AND `e_date`>='$date'";
$dc=$con->query($de);
if($dc->num_rows==0){
  $data[]=array("message"=>"0");
}
else{
     while($fetch=$dc->fetch_assoc())
     {
        $psa="SELECT * FROM `product` WHERE `p_id` = '$fetch[p_id1]'";
         $pque=$con->query($psa);
         $p_fet1=$pque->fetch_assoc();
         $psa2="SELECT * FROM `product` WHERE `p_id` = '$fetch[p_id2]'";
         $pque2=$con->query($psa2);
         $p_fet2=$pque2->fetch_assoc();
         $psa3="SELECT * FROM `product` WHERE `p_id` = '$fetch[p_id3]'";
         $pque3=$con->query($psa3);
         $p_fet3=$pque3->fetch_assoc();
         $psa4="SELECT * FROM `product` WHERE `p_id` = '$fetch[p_id4]'";
         $pque4=$con->query($psa4);
         $p_fet4=$pque4->fetch_assoc();
         
         $psa5="SELECT * FROM `shop_sliders` WHERE `ss_id` ='$fetch[banner]'";
         $pque5=$con->query($psa5);
         $p_fet5=$pque5->fetch_assoc();
         
        $data[]=array("sa_id"=>"$fetch[sa_id]", "at_id"=>"$fetch[at_id]", "header_name"=>"$fetch[header_name]", "img_no"=>"$fetch[img_no]", "amount"=>"$fetch[amount]", "banner"=>"$fetch[banner]", "days"=>"$fetch[days]", "color"=>"$fetch[color]", "date"=>"$fetch[c_date]", "e_date"=>"$fetch[e_date]", "city"=>"$fetch[city]", "p_id1"=>"$fetch[p_id1]", "p_id2"=>"$fetch[p_id2]", "p_id3"=>"$fetch[p_id3]", "p_id4"=>"$fetch[p_id4]", "p_img1"=>"$p_fet1[photo1]", "p_img2"=>"$p_fet2[photo1]", "p_img3"=>"$p_fet3[photo1]", "p_img4"=>"$p_fet4[photo1]", "p_img5"=>"$p_fet5[img]", "p1_mrp"=>"$p_fet1[mrp]", "p2_mrp"=>"$p_fet2[mrp]", "p3_mrp"=>"$p_fet3[mrp]", "p4_mrp"=>"$p_fet4[mrp]", "p1_sp"=>"$p_fet1[sp]", "p2_sp"=>"$p_fet2[sp]",  "p3_sp"=>"$p_fet3[sp]", "p4_sp"=>"$p_fet4[sp]", "p1_name"=>"$p_fet1[product_name]", "p2_name"=>"$p_fet2[product_name]", "p3_name"=>"$p_fet3[product_name]", "p4_name"=>"$p_fet4[product_name]", "p1_d_percentage"=>"$p_fet1[d_percentage]", "p2_d_percentage"=>"$p_fet2[d_percentage]", "p3_d_percentage"=>"$p_fet3[d_percentage]", "p4_d_percentage"=>"$p_fet4[d_percentage]", "shop_id"=>"$fetch[shop_id]",  "message"=>"1");
     }
}
}
     echo (json_encode($data));

?>	