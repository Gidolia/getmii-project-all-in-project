<?php
include "../config.php";
$awo="SELECT * FROM `shop_add` WHERE `sa_id`='$_GET[sa_id]'";
$re=$con->query($awo);
$sc=$re->fetch_assoc();
$a_count=$sc[count_click]+1;
$eds="UPDATE `shop_add` SET `count_click` = '$a_count' WHERE `shop_add`.`sa_id` = '$_GET[sa_id]';";
$con->query($eds);