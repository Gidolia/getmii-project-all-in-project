<?php include "config.php";
$e1="SELECT * FROM `delievery_man` WHERE `id`='$_GET[id]'";
$d1=$con->query($e1);
$val1=$d1->fetch_assoc();

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="images/favicon.ico" type="image/ico" />

    <title>Edit Delievery Man || GETMII</title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
	
    <!-- bootstrap-progressbar -->
    <link href="../vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="../vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
   <!-- Datatables -->
    
    <link href="../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
<!-- PNotify -->
    <link href="../vendors/pnotify/dist/pnotify.css" rel="stylesheet">
    <link href="../vendors/pnotify/dist/pnotify.buttons.css" rel="stylesheet">
    <link href="../vendors/pnotify/dist/pnotify.nonblock.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
    <?php

    if($_GET[n]=="b_f"){
        $script="new PNotify({
             title: 'Failed',
             text: 'Plz Try Again! Query Failed',
             type: 'error',
             styling: 'bootstrap3'
      });";
    }
    elseif($_GET[n]=="b_s"){
        $script="new PNotify({
             title: 'Success!',
             text: 'Banners Successfully Submited',
             type: 'success',
             styling: 'bootstrap3'
      });";
    }
    elseif($_GET[n]=="b_d"){
        $script="new PNotify({
             title: 'Deleted!',
             text: 'Banners Deleted Successfully',
             
             styling: 'bootstrap3'
      });";
    }
    
?>
  </head>

  <body class="nav-md" onLoad="<?php echo $script;?>">
    <div class="container body">
      <div class="main_container">
        <?php include "include/sidebar.php";?>
        <!-- top navigation -->
        <?php include "include/header.php";?>
        <!-- /top navigation -->

<!--Page Content-->

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Edit Delievery Man </h3>
              </div>
            </div>

            <div class="clearfix"></div>
            <div class="row">
        <div class="col-md-12 col-sm-12 ">
          <div class="x_panel">
            <div class="x_title">
              <h2>Edit Delievery Man<small></small></h2>
              <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                  
                </li>
                <li><a class="close-link"><i class="fa fa-close"></i></a>
                </li>
              </ul>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
              <br />
              <form class="form-horizontal form-label-left" method="post" enctype='multipart/form-data'>

                <div class="item form-group">
                  <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Delievery Man Img<span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 ">
                      <img src="./delievery_man/<?php echo $val1[photo]?>" style="height:100px;width:100px;">
                    <input type="file" name="img" class="form-control">
                  </div>
                </div>
                
                <div class="item form-group">
                  <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Name
                  </label>
                  <div class="col-md-6 col-sm-6 ">
                    <input type="text" name="name" class="form-control" value="<?php echo $val1[name];?>">
                  </div>
                </div>
                <div class="item form-group">
                  <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Password<span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 ">
                    <input type="text" name="pwd" class="form-control" value="<?php echo $val1[password];?>">
                  </div>
                  
                </div>
               
                <div class="item form-group">
                  <label class="col-form-label col-md-3 col-sm-3 label-align">Mobile No</label>
                  <div class="col-md-6 col-sm-6 ">
                    <input type="text" class="form-control" name="mob" value="<?php echo $val1[mobile_no];?>">
                  </div>
                </div>

                 <div class="item form-group">
                  <label class="col-form-label col-md-3 col-sm-3 label-align">Adhar Card No</label>
                  <div class="col-md-6 col-sm-6 ">
                    <input type="text" class="form-control" name="adhar" value="<?php echo $val1[adhar_card_no];?>">
                  </div>
                </div>
                <div class="item form-group">
                  <label class="col-form-label col-md-3 col-sm-3 label-align">City</label>
                  <div class="col-md-6 col-sm-6 ">
                    <select class="form-control" name="city">
										    <option value="">Select City</option>
										    <?php
										    $selc="SELECT * FROM `cities`";
										    $ao=$con->query($selc);
										    while($dcp=$ao->fetch_assoc())
										    {
										    echo "<option value=".$dcp[city].">".$dcp[city]."</option>";
										    }?>
										</select>
                  </div>
                </div>
                <div class="item form-group">
                  <label class="col-form-label col-md-3 col-sm-3 label-align">Driving Licence</label>
                  <div class="col-md-6 col-sm-6 ">
                    <input type="text" class="form-control" name="d_l" >
                  </div>
                </div>
                
                <div class="ln_solid"></div>
                <div class="item form-group">
                  <div class="col-md-6 col-sm-6 offset-md-3">
                    <button class="btn btn-primary" type="reset">Reset</button>
                    <button type="submit" class="btn btn-success" name="submit_reg">Submit</button>
                  </div>
                </div>

              </form>
            </div>
          </div>
        </div>
      </div>
       </div>
<?php
if(isset($_POST[submit_reg]))
{
    $num=rand(1000,9999);
        $filename1 = "dm".$num.".jpg";
        $tempname1 = $_FILES["img"]["tmp_name"];
        $folder1 = "./delievery_man/" . $filename1;
        move_uploaded_file($tempname1, $folder1);
        
    // $sel="INSERT INTO `delievery_man` (`id`,`name`,`password`,`photo`,`mobile_no`,`adhar_card_no`) VALUES('NULL','$_POST[name]','$_POST[pwd]','$filename1','$_POST[mob]','$_POST[adhar]')";
    $sel="UPDATE `delievery_man` SET `name`='$_POST[name]',`password`='$_POST[pwd]',`photo`='$filename1',`adhar_card_no`='$_POST[adhar]',`mobile_no`='$_POST[mob]',`city`='$_POST[city]',`d_lisence_no`='$_POST[d_l]' WHERE `id`='$_GET[id]'";
    $res=$con->query($sel);
    if ($res===TRUE)
    {  
      echo "<script>location.href='./delievery_man.php';</script>";
    }
    else{
        //echo "fdwe";
        echo "<script>
      location.href='register.php';</script>";
    }
}
?>
           
           
            
                  
                    </div> 
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        
        <!-- /page content -->
        <!-- footer content -->
        <footer>
          <div class="pull-right">
            <?php include "include/footer.php";?>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- Chart.js -->
    <script src="../vendors/Chart.js/dist/Chart.min.js"></script>
    
    <!-- bootstrap-progressbar -->
    <script src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
   
    
    <!-- Datatables -->
    <script src="../vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="../vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="../vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="../vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="../vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="../vendors/jszip/dist/jszip.min.js"></script>
    <script src="../vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="../vendors/pdfmake/build/vfs_fonts.js"></script>
    <!-- PNotify -->
    <script src="../vendors/pnotify/dist/pnotify.js"></script>
    <script src="../vendors/pnotify/dist/pnotify.buttons.js"></script>
    <script src="../vendors/pnotify/dist/pnotify.nonblock.js"></script>


    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
  
  </body>
</html>