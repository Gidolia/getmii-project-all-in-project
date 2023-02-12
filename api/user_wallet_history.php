
<?php
include "../config.php";
//$data[]=array("message"=>"0");
$de="SELECT * FROM `user_wallet_history` WHERE `u_id`='$_GET[u_id]'";
$dc=$con->query($de);
if($dc->num_rows==0){
  $data[]=array("message"=>"0");  
}
else{
     while($fetch=$dc->fetch_assoc()){
         if($fetch[type]=='+'){$type=1;}else{$type=0;}
         $data[]=array("uwh_id"=>"$fetch[uwh_id]", "u_id"=>"$fetch[u_id]", "type"=>"$type", "date"=>"$fetch[date]", "time"=>"$fetch[time]", "amount"=>"$fetch[amount]", "b_bal"=>"$fetch[b_bal]", "a_bal"=>"$fetch[a_bal]", "note"=>"$fetch[note]", "message"=>"1");
     }
}
     echo (json_encode($data));

?>	