<?php
    include "../config.php";
    $rf="SELECT * FROM `wishlist` WHERE `u_id`='$_POST[u_id]'";
    $da=$con->query($rf);
    if($da->num_rows==0){
         $data[]=array("message"=>"1");  
    }else{
     
    while($sa=$da->fetch_assoc())
    {
        $p_sel="SELECT * FROM `product` WHERE `p_id`='$sa[p_id]'";
        $p_que=$con->query($p_sel);
        $p_fet=$p_que->fetch_assoc();
        if($p_fet[stock]>0){$st='1';}else{$st='0';}
        $data[]=array("w_id"=>"$sa[w_id]", "u_id"=>"$fetch[u_id]", "p_id"=>"$sa[p_id]", "name"=>"$p_fet[product_name]", "mrp"=>"$p_fet[mrp]", "sp"=>"$p_fet[sp]", "delivery_charge"=>"$ascs[delivery_charge]", "img"=>"$p_fet[photo1]", "stock"=>"$st");
    }
}
    echo (json_encode($data));
?>