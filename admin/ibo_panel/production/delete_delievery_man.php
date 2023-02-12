<?php
include "config.php";
$sel="DELETE FROM `delievery_man` WHERE `id` = $_GET[id]";
if($con->query($sel)===TRUE){

     echo "<script>alert('Deleted');
                          location.href='./delievery_man.php'</script>";
}else{
     echo "<script>alert('Failed');
                          location.href='./delievery_man.php'</script>";
}


?>