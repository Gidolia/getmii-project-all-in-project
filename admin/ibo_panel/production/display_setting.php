<?php include "config.php";
$sel1="SELECT * FROM `front_display` WHERE `id`='1'";
$que1=$con->query($sel1);
$fet1=$que1->fetch_assoc();
$sel2="SELECT * FROM `front_display` WHERE `id`='2'";
$que2=$con->query($sel2);
$fet2=$que2->fetch_assoc();

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

    <title>GETMII</title>

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
             text: 'Image Changed Successfully Submited',
             type: 'success',
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

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Front Display</h3>
              </div>
            </div>

            <div class="clearfix"></div>
            <div class="row">
				<div class="col-md-6 col-sm-6 ">
					<div class="x_panel">
						<div class="x_title">
							<h2>City Shop Setting<small></small></h2>
							<ul class="nav navbar-right panel_toolbox">
                              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                              </li>
                              <li><a class="close-link"><i class="fa fa-close"></i></a>
                              </li>
                            </ul>
							<div class="clearfix"></div>
						</div>
						<div class="x_content">
							<br />
							<h6>City Shop Logo</h6>
							
							<form class="form-horizontal form-label-left" method="post" enctype='multipart/form-data'>
                                <div class="item form-group">
									<label class="col-form-label col-md-3 col-sm-3" for="last-name">Current Icon<span class="required">*</span>
									</label>
									<div class="col-md-9 col-sm-9 ">
										<img src="../../../front_display_img/<?php echo $fet1[img];?>" height="150px" width="150px">
									</div>
								</div>
								<div class="item form-group">
									<label class="col-form-label col-md-3 col-sm-3" for="last-name">Icon Image<span class="required">*</span>
									</label>
									<div class="col-md-9 col-sm-9 ">
										<input type="file" name="img" required="required" class="form-control">
									</div>
								</div>
								
								<div class="item form-group">
									<div class="col-md-6 col-sm-6 offset-md-3">
									    
										<button type="submit" class="btn btn-success" name="city_logo_submit">Submit</button>
									</div>
								</div>
							</form>
							
							
							<div class="ln_solid"></div>
							<h5>City Inside Display Small Heading</h5>
							<form class="form-horizontal form-label-left" method="post" enctype='multipart/form-data'>
                                <div class="item form-group">
									<label class="col-form-label col-md-3 col-sm-3" for="last-name">Current Icon<span class="required">*</span>
									</label>
									<div class="col-md-9 col-sm-9 ">
										<img src="../../../front_display_img/<?php echo $fet1[p_img];?>" height="150px" width="220px">
									</div>
								</div>
								<div class="item form-group">
									<label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name"> Image<span class="required">*</span>
									</label>
									<div class="col-md-6 col-sm-6 ">
										<input type="file" name="img" required="required" class="form-control">
									</div>
								</div>
								<div class="item form-group">
									<div class="col-md-6 col-sm-6 offset-md-3">
										<button type="submit" class="btn btn-success" name="city_p_submit">Submit</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
				
				<div class="col-md-6 col-sm-6 ">
					<div class="x_panel">
						<div class="x_title">
							<h2>Second Hand Product Setting<small></small></h2>
							<ul class="nav navbar-right panel_toolbox">
                              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                              </li>
                              <li><a class="close-link"><i class="fa fa-close"></i></a>
                              </li>
                            </ul>
							<div class="clearfix"></div>
						</div>
						<div class="x_content">
							<br />
							<h6>Second Hand Product Logo</h6>
							
							<form class="form-horizontal form-label-left" method="post" enctype='multipart/form-data'>
                                <div class="item form-group">
									<label class="col-form-label col-md-3 col-sm-3" for="last-name">Current Icon<span class="required">*</span>
									</label>
									<div class="col-md-9 col-sm-9 ">
										<img src="../../../front_display_img/<?php echo $fet2[img];?>" height="150px" width="150px">
									</div>
								</div>
								<div class="item form-group">
									<label class="col-form-label col-md-3 col-sm-3" for="last-name">Icon Image<span class="required">*</span>
									</label>
									<div class="col-md-9 col-sm-9 ">
										<input type="file" name="img" required="required" class="form-control">
									</div>
								</div>
								
								<div class="item form-group">
									<div class="col-md-6 col-sm-6 offset-md-3">
									    
										<button type="submit" class="btn btn-success" name="second_submit">Submit</button>
									</div>
								</div>
							</form>
							
							
							<div class="ln_solid"></div>
							<h5>Second Hand Inside Display Small Heading</h5>
							<form class="form-horizontal form-label-left" method="post" enctype='multipart/form-data'>
                                <div class="item form-group">
									<label class="col-form-label col-md-3 col-sm-3" for="last-name">Current Icon<span class="required">*</span>
									</label>
									<div class="col-md-9 col-sm-9 ">
										<img src="../../../front_display_img/<?php echo $fet2[p_img];?>" height="150px" width="220px">
									</div>
								</div>
								<div class="item form-group">
									<label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name"> Image<span class="required">*</span>
									</label>
									<div class="col-md-6 col-sm-6 ">
										<input type="file" name="img" required="required" class="form-control">
									</div>
								</div>
								<div class="item form-group">
									<div class="col-md-6 col-sm-6 offset-md-3">
										<button type="submit" class="btn btn-success" name="second_p_submit">Submit</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
<?php 
function password_generate($chars) 
{
  $data = '123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
  return substr(str_shuffle($data), 0, $chars);
}
$d_id=password_generate(15);
if(isset($_POST[city_logo_submit])){
    
    
    if (file_exists("../../../front_display_img/" .$fet[img]))
    {
    unlink("../../../front_display_img/" .$fet[img]);
      echo $fet[img] . " already exists. ";
    }
    if(move_uploaded_file($_FILES["img"]["tmp_name"], "../../../front_display_img/".$d_id.".jpg"))
	{
	    $imf=$d_id.".jpg";
        $fr="UPDATE `front_display` SET `img` = '$imf' WHERE `front_display`.`id` = 1;";
        if($con->query($fr)===TRUE){
            echo "<script>location.href='display_setting.php?n=b_s';</script>";
        }else{
            echo "<script>alert('Deleted');location.href='display_setting.php?n=b_f';</script>";
        }
	}
}
if(isset($_POST[city_p_submit])){
    
    
    if (file_exists("../../../front_display_img/" .$fet1[p_img]))
    {
    unlink("../../../front_display_img/" .$fet1[p_img]);
      echo $fet1[img] . " already exists. ";
    }
    if(move_uploaded_file($_FILES["img"]["tmp_name"], "../../../front_display_img/".$d_id.".jpg"))
	{
	    $imf=$d_id.".jpg";
        $fr="UPDATE `front_display` SET `p_img` = '$imf' WHERE `front_display`.`id` = 1;";
        if($con->query($fr)===TRUE){
            echo "<script>location.href='display_setting.php?n=b_s';</script>";
        }else{
            echo "<script>alert('Deleted');location.href='display_setting.php?n=b_f';</script>";
        }
	}
}
if(isset($_POST[second_submit])){
    
    
    if (file_exists("../../../front_display_img/" .$fet2[img]))
    {
    unlink("../../../front_display_img/" .$fet2[img]);
      echo $fet1[img] . " already exists. ";
    }
    if(move_uploaded_file($_FILES["img"]["tmp_name"], "../../../front_display_img/".$d_id.".jpg"))
	{
	    $imf=$d_id.".jpg";
        $fr="UPDATE `front_display` SET `img` = '$imf' WHERE `front_display`.`id` = 2;";
        if($con->query($fr)===TRUE){
            echo "<script>location.href='display_setting.php?n=b_s';</script>";
        }else{
            echo "<script>alert('Deleted');location.href='display_setting.php?n=b_f';</script>";
        }
	}
}
if(isset($_POST[second_p_submit])){
    if (file_exists("../../../front_display_img/" .$fet2[p_img]))
    {
    unlink("../../../front_display_img/" .$fet2[p_img]);
      echo $fet2[img] . " already exists. ";
    }
    if(move_uploaded_file($_FILES["img"]["tmp_name"], "../../../front_display_img/".$d_id.".jpg"))
	{
	    $imf=$d_id.".jpg";
        $fr="UPDATE `front_display` SET `p_img` = '$imf' WHERE `front_display`.`id` = 2;";
        if($con->query($fr)===TRUE){
            echo "<script>location.href='display_setting.php?n=b_s';</script>";
        }else{
            echo "<script>alert('Deleted');location.href='display_setting.php?n=b_f';</script>";
        }
	}
}

?>
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
