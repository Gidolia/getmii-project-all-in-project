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

    <title>Best Deal || GETMII</title>

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
             text: 'Best Deal Successfully Submited',
             type: 'success',
             styling: 'bootstrap3'
      });";
    }
    elseif($_GET[n]=="b_d"){
        $script="new PNotify({
             title: 'Deleted!',
             text: 'Best Deal Deleted Successfully',
             
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
                <h3>Best Deal</h3>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
				<div class="col-md-12 col-sm-12 ">
					<div class="x_panel">
						<div class="x_title">
							<h2>Insert Best Deal<small></small></h2>
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
									<label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Price</label>
									<div class="col-md-6 col-sm-6 ">
										<input type="number" class="form-control" name="price" />
									</div>
								</div>
								
								<div class="item form-group">
									<label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">End Date
									</label>
									<div class="col-md-6 col-sm-6 ">
										<input type="date" min="<?php echo $date;?>" name="e_date" class="form-control">
									</div>
								</div>
								<div class="item form-group">
									<label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">City</label>
									<div class="col-md-6 col-sm-6 ">
										<select class="form-control" name="city">
										    <option>Select City</option>
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
									<label class="col-form-label col-md-3 col-sm-3 label-align">india</label>
									<div class="col-md-6 col-sm-6 ">
										<input type="checkbox" class="form-control" name="india" value='1'>
									</div>
								</div>
								<div class="item form-group">
									<label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Best Img<span class="required">*</span>
									</label>
									<div class="col-md-6 col-sm-6 ">
										<input type="file" name="img" required="required" class="form-control">
									</div>
								</div>
								
								<div class="ln_solid"></div>
								<div class="item form-group">
									<div class="col-md-6 col-sm-6 offset-md-3">
										<button class="btn btn-primary" type="reset">Reset</button>
										<button type="submit" class="btn btn-success" name="sub_ban_ads">Submit</button>
									</div>
								</div>

							</form>
						</div>
					</div>
				</div>
			</div>
<?php 
if(isset($_POST[sub_ban_ads])){
    function password_generate($chars) 
    {
      $data = '123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
      return substr(str_shuffle($data), 0, $chars);
    }
    
    //echo $x;
    $d_id=password_generate(15);
    if (file_exists("../../../banner_img/bd".$d_id.".jpg"))
    {
        unlink("../../../banner_img/bd".$d_id.".jpg");
      
    }
    if(move_uploaded_file($_FILES["img"]["tmp_name"], "../../../banner_img/"."bd".$d_id.".jpg"))
	{
	    $imf="bd".$d_id.".jpg";
        $ins="INSERT INTO `best_deal` (`bd_id`, `price`, `s_date`, `e_date`, `city`, `india`, `img`) VALUES (NULL, '$_POST[price]', '$date', '$_POST[e_date]', '$_POST[city]', '$_POST[india]', '$imf');";
    
        if($con->query($ins)){
            echo "<script>location.href='best_deal.php?n=b_s';</script>";
        }else{
            echo "<script>location.href='best_deal.php?n=b_f';</script>";
        }
	}
}
?>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Best Deal List </h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                
                    
                    <ul class="nav nav-tabs bar_tabs" id="myTab" role="tablist">
                      <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Active Best Deal </a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Banner Best Deal History</a>
                      </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                      <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                          <h3 align="center">Active Best Deal</h3>
                        <div class="card-box table-responsive"> 
                     <table id="datatable-buttons" class="table table-striped jambo_table" >
                      <thead>
                        <tr class="headings">
                          <th width="10%">U no</th>
                          
                          <th>Img</th>
                          <th>city</th>
                          <th>India</th>
                          <th>end date</th>
                          
                          <th>Delete</th>
                        </tr>
                      </thead>
                      <tbody>
                          <?php 
                                
                              
                                $e="SELECT * FROM `best_deal` WHERE `e_date`>='$date'";
                                $d=$con->query($e);
                                while($R=$d->fetch_assoc()){
                                   
                                ?>
                               <tr>
                                <td><?php echo $R['bd_id'];?></td>     
                                
                                <td><img src="../../../banner_img/<?php echo $R['img'];?>" height="100px" width="100%"/></td>
                                
                                
                                <td><?php echo $R['city'];?></td>
                                <td><?php echo $R['india'];?></td>
                                <td>s date= <?php echo $R['s_date'];?><br>
                                e date= <?php echo $R['e_date'];?><br></td>
                                
                                <td></td>
                               </tr>
                                <?php 
                                } 
                            ?>
                      </tbody>
                    </table>
                    </div>
                      </div>
                      <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                          <h3 align="center">Best Deal History</h3>
                        <div class="card-box table-responsive"> 
                     <table id="datatable" class="table table-striped jambo_table" >
                      <thead>
                        <tr class="headings">
                          <th width="10%">U no</th>
                          
                          <th>Img</th>
                          <th>city</th>
                          <th>India</th>
                          <th>end date</th>
                          
                          <th>Delete</th>
                        </tr>
                      </thead>
                      <tbody>
                          <?php 
                                
                              
                                $e="SELECT * FROM `best_deal` WHERE `e_date`>='$date'";
                                $d=$con->query($e);
                                while($R=$d->fetch_assoc()){
                                   
                                ?>
                               <tr>
                                <td><?php echo $R['bd_id'];?></td>     
                                
                                <td><img src="../../../banner_img/<?php echo $R['img'];?>" height="100px" width="100%"/></td>
                                
                                
                                <td><?php echo $R['city'];?></td>
                                <td><?php echo $R['india'];?></td>
                                <td>s date= <?php echo $R['date'];?><br>
                                e date= <?php echo $R['end_date'];?><br></td>
                                
                                <td></td>
                               </tr>
                                <?php 
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
