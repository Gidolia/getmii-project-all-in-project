<?php
include "../config.php";

$de="SELECT * FROM `cart` WHERE `u_id`='$_GET[u_id]'";
$dc=$con->query($de);
     
     while($fetch=$dc->fetch_assoc()){
         
         $cs_sel="SELECT * FROM `coupan_shop` WHERE `cs_id`='$fetch[cs_id]'";
         $cs_que=$con->query($cs_sel);
         $cs_fet=$cs_que->fetch_assoc();
         
         
         $das="SELECT * FROM `product` WHERE `p_id`='$fetch[p_id]'";
         $asc=$con->query($das);
         $ascs=$asc->fetch_assoc();
         //$data[]=$fetch;
         $catt=$ascs[sp]*$fetch[qty];
        
         $cattm=$ascs[mrp]*$fetch[qty];
         $mrp=$mrp+$cattm;
         $dd=$ascs[delivery_charge]*$fetch[qty];
         $delivery_c=$delivery_c+$dd;
         $dic = ($ascs[mrp]-$ascs[sp])*$fetch[qty];
         $sdfs=$sdfs+$catt;
         $c_discount=$cs_fet[discount]*$fetch[qty];
         $t_c_discount=$t_c_discount+$c_discount+0;
         
     }
     $final_price=$sdfs-$t_c_discount+$delivery_c;
     $data[]=array("t_sp"=>"$sdfs", "t_mrp"=>"$mrp","t_dic"=>"$dic", "delivery"=>"$delivery_c", "t_c_discount"=>"$t_c_discount", "final_price"=>"$final_price");
     echo (json_encode($data));

?>	