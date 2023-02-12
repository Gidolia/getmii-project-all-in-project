<?php
include "../config.php";
$u_id='$_POST[u_id]';
$cart_sel="SELECT * FROM `cart` WHERE `u_id`='$_POST[u_id]'";
$cart_que=$con->query($cart_sel);
if($cart_que->num_rows>0){
while($cart_fet=$cart_que->fetch_assoc())
    {
        $p_sel="SELECT * FROM `product` WHERE `p_id`='$cart_fet[p_id]'";
        $p_que=$con->query($p_sel);
        $p_fet=$p_que->fetch_assoc();
        if($cart_fet[qty]<=$p_fet[stock])
        {
            $t_mrp=$p_fet[mrp]*$cart_fet[qty];
            $t_sp=$p_fet[sp]*$cart_fet[qty];
            $t_delivery_charge=$p_fet[delivery_charge]*$cart_fet[qty];
            $t_discount=$t_mrp-$t_sp;
            $left_cart=$p_fet[stock]-$cart_fet[qty];
            if($cart_fet[cs_id]!=''){
                $der="SELECT * FROM `coupan_shop` WHERE `cs_id`='$cart_fet[cs_id]'";
                $apoddd=$con->query($der);
                $apoddds=$apoddd->fetch_assoc();
                $discount=$apoddds[discount]*$cart_fet[qty];
            
            }else{$discount='0';}
            $total_price=$t_sp+$t_delivery_charge-$discount;
            $orders_ins="INSERT INTO `orders` (`o_id`, `u_id`, `p_id`, `qty`, `mrp`, `sp`, `delivery_charge`, `t_mrp`, `t_sp`, `t_delivery_charge`, `date`, `time`, `c_name`, `c_mob`, `c_city`, `c_email`, `c_pincode`, `c_addreass`, `shop_id`, `o_confirmed`, `dly_p_id`, `picked`, `status`, `delivery_by`, `total_price`, `cs_id`, `coun_discount`, `discount`) VALUES (NULL, '$_POST[u_id]', '$cart_fet[p_id]', '$cart_fet[qty]', '$p_fet[mrp]', '$p_fet[sp]', '$p_fet[delivery_charge]', '$t_mrp', '$t_sp', '$t_delivery_charge', '$date', '$time', '$_POST[name]', '$_POST[mob]', '$_POST[city]', '$_POST[email]', '$_POST[pincode]', '$_POST[address]', '$p_fet[shop_id]', '0', '1', '0', 'p', '', '$total_price', '$cart_fet[cs_id]', '$discount', '$t_discount');";
            $up_p="UPDATE `product` SET `stock` = '$left_cart' WHERE `product`.`p_id` = '$cart_fet[p_id]';";
            $cart_del="DELETE FROM `cart` WHERE `cart`.`cart_id` = '$cart_fet[cart_id]'";
            if($con->query($orders_ins)===TRUE && $con->query($up_p)===TRUE && $con->query($cart_del)===TRUE ){
                $d='1';
            }
            else{
                $d='0';
            }
        }
        else{
            $d='0';
        }
        
    }
}else{
        $d='0';
    }
$data[]=array("message"=>"$d");
     echo (json_encode($data));
    
?>