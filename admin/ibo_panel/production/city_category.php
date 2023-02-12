<?php include "config.php";
if(isset($_POST[sub_plave])){
    $ind="UPDATE `city_category` SET `place` = '$_POST[place]' WHERE `city_category`.`id` = $_POST[id];";
    $con->query($ind);
    echo "<script>location.href='city_category.php?n=pla_s';</script>";
}
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

    <title>City Category || GETMII</title>

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
    elseif($_GET[n]=="cat_u"){
        $script="new PNotify({
             title: 'Success!',
             text: 'Category Name Updated Successfully',
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
                <h3>City Category</h3>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
				<div class="col-md-12 col-sm-12 ">
					<div class="x_panel">
						<div class="x_title">
							<h2>Insert New City Category<small></small></h2>
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
									<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Category Name <span class="required">*</span>
									</label>
									<div class="col-md-6 col-sm-6 ">
										<input type="text" name="category" required="required" class="form-control">
									</div>
								</div>
								<div class="item form-group">
									<label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Category Img<span class="required">*</span>
									</label>
									<div class="col-md-6 col-sm-6 ">
										<input type="file" name="c_img" required="required" class="form-control">
									</div>
								</div>
								<div class="ln_solid"></div>
								<div class="item form-group">
									<div class="col-md-6 col-sm-6 offset-md-3">
										<button class="btn btn-primary" type="reset">Reset</button>
										<button type="submit" class="btn btn-success" name="sub_cat">Submit</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
<?php 
if(isset($_POST[sub_cat])){
    function password_generate($chars) 
    {
      $data = '123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
      return substr(str_shuffle($data), 0, $chars);
    }
    $d_id=password_generate(9);
    $sqsqqs="SELECT MAX(place) as max_id FROM `city_category` LIMIT 1";
    $qur=$con->query($sqsqqs);
    $cp=$qur->fetch_assoc();
    if (file_exists("../../../images/cat".$d_id.".jpg"))
    {
    unlink("../../../images/" .$d_id.".jpg");
      echo $d_id.".jpg" . " already exists. ";
    }
    if(move_uploaded_file($_FILES["c_img"]["tmp_name"], "../../../images/cat".$d_id.".jpg"))
	{
	    $imf="cat".$d_id.".jpg";
	    $sanl=$cp[max_id]+1;
	    $fr="INSERT INTO `city_category` (`id`, `name`, `photo`, `status`, `place`) VALUES (NULL, '$_POST[category]', '$imf', '1', '$sanl');";
        $con->query($fr);
        echo "<script>location.href='city_category.php?n=cat_a';</script>";
	}
}
?>
            
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Category List </h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="card-box table-responsive"> 
                     <table id="datatable-buttons" class="table table-striped jambo_table" >
                      <thead>
                        <tr class="headings">
                            <th hidden></th>
                          <th>ID</th>
                          <th>name</th>
                          <th>Image</th>
                          <th>status</th>
                          <th width="20%">Place</th>
                          <td>Options</td>
                        </tr>
                      </thead>
                      <tbody>
                          <?php
                                $au=1;
                                $e="SELECT * FROM `city_category` ORDER BY `city_category`.`place` ASC";
                                $d=$con->query($e);
                                while($R=$d->fetch_assoc()){
                                ?>
                               <tr>
                                <td hidden><?php echo $R['place'];?></td>
                                <td><?php echo $R['id'];?></td>     
                                <td><?php echo $R['name'];?></td>
                                <td><img src="../../../images/<?php echo $R['photo'];?>" height="100px" width="100px"></td>
                                
                                <td>
                                    
                                    <?php
                                     if($R['status']==1){
                                        $ac="Activate";
                                        $col="btn-success";
                                        
                                    }else{
                                        
                                        $ac="Deactivate";
                                        $col="btn-danger";
                                    }?>
                  <div class="btn-group">
                    <button type="button" class="btn <?php echo $col;?> dropdown-toggle" data-toggle="dropdown"
                      aria-haspopup="true" aria-expanded="false">
                      <?php echo $ac;?>
                    </button>
                    <div class="dropdown-menu">
                      <a class="dropdown-item" href="process_category_activate_deactivate.php?status=1&id=<?php echo $R[id];?>">Activate</a>
                      <a class="dropdown-item" href="process_category_activate_deactivate.php?status=0&id=<?php echo $R[id];?>">Deactivate</a>
                    </div>
                  </div>
								</td>
                                <td>
                                    <form method="post">
                                                                               <input type="hidden" name="id" value="<?php echo $R[id];?>">
                                        <div class="input-group">
										<input type="number" name="place" value="<?php echo $R[place];?>" class="form-control">
													<span class="input-group-btn">
										<button type="submit" class="btn btn-primary" name="sub_plave">Submit</button>
													</span>
												</div>
                                    </form>
                                    
                                    </td>
                                    <td>
                                        <a href="create_sub_category.php?c=<?php echo $R[id];?>" class="btn btn-sm btn-info"><i class="fa fa-plus"></i> Add Sub Category </a>
                                        <a href="banners_sub_category.php?c_id=<?php echo $R[id];?>" class="btn btn-sm btn-primary"><i class="fa fa-gear"></i> Banner Setting </a>
                                        <a href="edit_city_category.php?id=<?php echo $R[id];?>" class="btn btn-sm btn-primary"><i class="fa fa-pencil"></i> Edit Information </a>
                                        <a href="city_shop_heading_image.php?id=<?php echo $R[id];?>" class="btn btn-sm btn-primary"><i class="fa fa-telivesion"></i> Shop Cat Heading </a>
                                    </td>
                                
                               </tr>
                                <?php $au++;     
                                } 
                            ?>
                      </tbody>
                    </table>
                    
                   
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
