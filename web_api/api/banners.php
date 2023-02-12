<?php
include "../config.php";

///////////////////////////for home screen banner
if($_POST[place_id]==0)
{
    $sdf="SELECT * FROM `banners` WHERE `place_id`='0' AND `status`='1' AND `india`='1'";
    $vdf=$con->query($sdf);
    if($vdf->num_rows>0)
    {
        while($fet=$vdf->fetch_assoc()){
            $data[]=array("b_id"=>"$fet[b_id]", "img"=>"$fet[img]", "city"=>"$fet[city]", "india"=>"$fet[india]", "message"=>"1", "place_id"=>"$_POST[place_id]", "url"=>"$fet[url]", "link_type"=>"$fet[link_type]");
        }
        $sdfw="SELECT * FROM `banners` WHERE `place_id`='0' AND `status`='1' AND `city` LIKE '%$_POST[city]%' ";
        $vdfw=$con->query($sdfw);
        if($vdfw->num_rows>0)
        {
            while($fetw=$vdfw->fetch_assoc()){
                $data[]=array("b_id"=>"$fetw[b_id]", "img"=>"$fetw[img]", "city"=>"$fet[city]", "message"=>"1", "place_id"=>"$_POST[place_id]", "url"=>"$fet[url]", "link_type"=>"$fet[link_type]");
            }
        }
    }else{
        
        $sdf="SELECT * FROM `banners` WHERE `place_id`='0' AND `status`='1' AND `city` LIKE '%$_POST[city]%' ";
        $vdf=$con->query($sdf);
        if($vdf->num_rows>0)
        {
            while($fet=$vdf->fetch_assoc()){
                $data[]=array("b_id"=>"$fet[b_id]", "img"=>"$fet[img]", "message"=>"1", "place_id"=>"$_POST[place_id]", "url"=>"$fet[url]", "link_type"=>"$fet[link_type]");
            }
        }else{
            $data[]=array("message"=>"0", "place_id"=>"$_POST[place_id]");
        }
    }
}

////////////////////////////slider for city banners
if($_POST[place_id]==1)
{
    $sdf="SELECT * FROM `banners` WHERE `place_id`='1' AND `status`='1' AND `india`='1'";
    $vdf=$con->query($sdf);
    if($vdf->num_rows>0)
    {
        while($fet=$vdf->fetch_assoc()){
            $data[]=array("b_id"=>"$fet[b_id]", "img"=>"$fet[img]", "city"=>"$fet[city]", "india"=>"$fet[india]", "message"=>"1", "url"=>"$fet[url]", "link_type"=>"$fet[link_type]");
        }
        $sdf="SELECT * FROM `banners` WHERE `place_id`='1' AND `status`='1' AND `city` LIKE '%$_POST[city]%' ";
        $vdf=$con->query($sdf);
        if($vdf->num_rows>0)
        {
            while($fet=$vdf->fetch_assoc()){
                $data[]=array("b_id"=>"$fet[b_id]", "img"=>"$fet[img]", "message"=>"1");
            }
        }
    }else{
        
        $sdf="SELECT * FROM `banners` WHERE `place_id`='1' AND `status`='1' AND `city` LIKE '%$_POST[city]%' ";
        $vdf=$con->query($sdf);
        if($vdf->num_rows>0)
        {
            while($fet=$vdf->fetch_assoc()){
                $data[]=array("b_id"=>"$fet[b_id]", "img"=>"$fet[img]", "message"=>"1", "url"=>"$fet[url]", "link_type"=>"$fet[link_type]");
            }
        }else{
            $data[]=array("message"=>"0");
        }
    }
}
////////////////////////////slider for city banners
if($_POST[place_id]==2)
{
    $sdf="SELECT * FROM `banners` WHERE `place_id`='2' AND `status`='1' AND `india`='1' AND `csc_id`='$_POST[csc_id]'";
    $vdf=$con->query($sdf);
    if($vdf->num_rows>0)
    {
        while($fet=$vdf->fetch_assoc()){
            $data[]=array("b_id"=>"$fet[b_id]", "img"=>"$fet[img]", "city"=>"$fet[city]", "india"=>"$fet[india]", "message"=>"1", "url"=>"$fet[url]", "link_type"=>"$fet[link_type]");
        }
        $sdf="SELECT * FROM `banners` WHERE `place_id`='1' AND `status`='1' AND `city` LIKE '%$_POST[city]%'  AND `csc_id`='$_POST[csc_id]' ";
        $vdf=$con->query($sdf);
        if($vdf->num_rows>0)
        {
            while($fet=$vdf->fetch_assoc()){
                $data[]=array("b_id"=>"$fet[b_id]", "img"=>"$fet[img]", "message"=>"1", "url"=>"$fet[url]", "link_type"=>"$fet[link_type]");
            }
        }
    }else{
        
        $sdf="SELECT * FROM `banners` WHERE `place_id`='1' AND `status`='1' AND `city` LIKE '%$_POST[city]%'  AND `csc_id`='$_POST[csc_id]'";
        $vdf=$con->query($sdf);
        if($vdf->num_rows>0)
        {
            while($fet=$vdf->fetch_assoc()){
                $data[]=array("b_id"=>"$fet[b_id]", "img"=>"$fet[img]", "message"=>"1", "url"=>"$fet[url]", "link_type"=>"$fet[link_type]");
            }
        }else{
            $data[]=array("message"=>"0");
        }
    }
}
////////////////////////////slider for shop portel home page banners
if($_POST[place_id]==11)
{
    $sdf="SELECT * FROM `banners` WHERE `place_id`='11' AND `status`='1' AND `india`='1'";
    $vdf=$con->query($sdf);
    if($vdf->num_rows>0)
    {
        while($fet=$vdf->fetch_assoc()){
            $data[]=array("b_id"=>"$fet[b_id]", "img"=>"$fet[img]", "city"=>"$fet[city]", "india"=>"$fet[india]", "message"=>"1");
        }
        $sdf="SELECT * FROM `banners` WHERE `place_id`='1' AND `status`='1' AND `city` LIKE '%$_POST[city]%' ";
        $vdf=$con->query($sdf);
        if($vdf->num_rows>0)
        {
            while($fet=$vdf->fetch_assoc()){
                $data[]=array("b_id"=>"$fet[b_id]", "img"=>"$fet[img]", "message"=>"1", "url"=>"$fet[url]", "link_type"=>"$fet[link_type]");
            }
        }
    }else{
        
        $sdf="SELECT * FROM `banners` WHERE `place_id`='11' AND `status`='1' AND `city` LIKE '%$_POST[city]%' ";
        $vdf=$con->query($sdf);
        if($vdf->num_rows>0)
        {
            while($fet=$vdf->fetch_assoc()){
                $data[]=array("b_id"=>"$fet[b_id]", "img"=>"$fet[img]", "message"=>"1", "url"=>"$fet[url]", "link_type"=>"$fet[link_type]");
            }
        }else{
            $data[]=array("message"=>"0");
        }
    }
}
echo (json_encode($data));
?>