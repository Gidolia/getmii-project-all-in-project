<?php include "config.php";?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="images/favicon.ico" type="image/ico" />

    <title>Edit City Category || GETMII</title>

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
    if($_GET[n]=="a_s"){
    $script="new PNotify({
             title: 'Activated Successfully!',
             text: 'This Category Will Now Show in App',
             type: 'success',
             styling: 'bootstrap3'
      });";
     }
    elseif($_GET[n]=="pla_s"){
        $script="new PNotify({
             title: 'Success!',
             text: 'Placed Changed Successfully',
             type: 'success',
             styling: 'bootstrap3'
      });";
    }
    elseif($_GET[n]=="ca_d"){
        $script="new PNotify({
             title: 'Deactivated!',
             text: 'Category Deactivated',
             
             styling: 'bootstrap3'
      });";
    }
    elseif($_GET[n]=="ca_s"){
        $script="new PNotify({
             title: 'Activated!',
             text: 'Category Activated Successfully',
             type: 'success',
             styling: 'bootstrap3'
      });";
    }
    elseif($_GET[n]=="cat_a"){
        $script="new PNotify({
             title: 'Success!',
             text: 'Category Name Added Successfully',
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
                <h3>Edit City Category</h3>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
				<div class="col-md-12 col-sm-12 ">
					<div class="x_panel">
						<div class="x_title">
							<h2>Edit City Category<small></small></h2>
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
							<?php
							$def="SELECT * FROM `city_category` WHERE `id`='$_GET[id]'";
							$gh=$con->query($def);
							$cs=$gh->fetch_assoc();
							?>
							<form class="form-horizontal form-label-left" method="post" enctype='multipart/form-data'>

								<div class="item form-group">
									<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Category Name <span class="required">*</span>
									</label>
									<div class="col-md-6 col-sm-6 ">
										<input type="text" name="category" required="required" value="<?php echo $cs[name];?>" class="form-control">
									</div>
								</div>
								<input type="hidden" name="c_id" value="<?php echo $_GET[id];?>">
								<div class="item form-group">
									<div class="col-md-6 col-sm-6 offset-md-3">
										
										<button type="submit" class="btn btn-success" name="sub_cat_name">Submit</button>
									</div>
								</div>
							</form>
							<form class="form-horizontal form-label-left" method="post" enctype='multipart/form-data'>
								<div class="ln_solid"></div>
								<div class="item form-group">
									<label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Category Img<span class="required">*</span>
									</label>
									<div class="col-md-6 col-sm-6 ">
										<input type="file" name="c_img_sub" required="required" class="form-control">
										<input type="hidden" name="c_id" value="<?php echo $_GET[id];?>">
										<input type="hidden" name="img_name" value="<?php echo $cs[photo];?>">
									</div>
								</div>
								
								<div class="item form-group">
									<div class="col-md-6 col-sm-6 offset-md-3">
										
										<button type="submit" class="btn btn-success" name="sub_cat_img">Submit</button>
									</div>
								</div>

							</form>
						</div>
					</div>
				</div>
			</div>
<?php
if(isset($_POST[sub_cat_name])){
    
    $up="UPDATE `city_category` SET `name` = '$_POST[category]' WHERE `city_category`.`id` = '$_POST[c_id]';";
    if($con->query($up)){
        echo "<script>location.href='city_category.php?n=cat_u';</script>";
    }
}
if(isset($_POST[sub_cat_img])){
    function password_generate($chars) 
    {
      $data = '123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
      return substr(str_shuffle($data), 0, $chars);
    }
    $d_id=password_generate(9);
    if (file_exists("../../../images/" .$_POST[img_name]))
    {
    unlink("../../../images/" .$_POST[img_name]);
      echo "deleted ../../../images/" .$_POST[img_name];
    }
    if(move_uploaded_file($_FILES["c_img_sub"]["tmp_name"], "../../../images/cat".$d_id.".jpg"))
	{
	    $imf="cat".$d_id.".jpg";
	    $up="UPDATE `city_category` SET `photo` = '$imf' WHERE `city_category`.`id` = '$_POST[c_id]';";
	    if($con->query($up)){
            echo "<script>location.href='city_category.php?n=cat_u';</script>";
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
