<?php 
include "config.php";
if(isset($_GET[b_id]))
{
    
    $sdsd="DELETE FROM `banners` WHERE `banners`.`b_id` = '$_GET[b_id]';";
    $con->query($sdsd);
    echo "<script>location.href='banners.php?n=b_d';</script>";
}


?>