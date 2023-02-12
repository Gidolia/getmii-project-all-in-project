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

    <title>Product List || GETMII</title>

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

    if($_GET[n]=="ap_p"){
        $script="new PNotify({
             title: 'Deactivated!',
             text: 'Shop Deactivated Successfully',
             
             styling: 'bootstrap3'
      });";
    }
    elseif($_GET[n]=="ap_s"){
        $script="new PNotify({
             title: 'Activated!',
             text: 'Shop Activated Successfully',
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
                <h3>Product List</h3>
              </div>
            </div>

            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Product List</h2>
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
                          <th>Img no.</th>
                          <th>Old Img</th>
                          <th>New Image</th>
                        </tr>
                      </thead>
                      <tbody>
                          <?php 
                                $au=1;
                                $e="SELECT * FROM `product` WHERE `p_id`='$_GET[p_id]'";
                                $d=$con->query($e);
                                $ds=$d->fetch_assoc();
                                ?>
                            <tr>
                                <td>Main Photo</td>
                                <td><img src="../../../images/<?php echo $ds[photo1];?>" height="120px" width="120px">
                                </td>
                                <td>
                                    <form method="post" action="process_edit_product_img.php" enctype='multipart/form-data'>
                                                                               <input type="hidden" name="p_id" value="<?php echo $ds[p_id];?>">
                                        <input type="hidden" name="img_n" value="1">
                                        <input type="hidden" name="img_src" value="<?php echo $ds[photo1];?>">
                                        <div class="input-group">
										<input type="file" name="img" class="form-control">
													<span class="input-group-btn">
										<button type="submit" class="btn btn-primary" name="sub_plave">Submit</button>
													</span>
												</div>
                                    </form>
                                </td>
                            </tr>
                            <tr>
                                <td>Photo 2</td>
                                <td><img src="../../../images/<?php echo $ds[photo2];?>" height="120px" width="120px"><a href="process_edit_product_img.php?p_id=<?php echo $ds[p_id];?>&img=2&img_src=<?php echo $ds[photo2];?>&del=1" class="btn btn-danger">Delete</a></td>
                                <td><form method="post" action="process_edit_product_img.php" enctype='multipart/form-data'>
                                                                               <input type="hidden" name="p_id" value="<?php echo $ds[p_id];?>">
                                        <input type="hidden" name="img_n" value="2">
                                        <input type="hidden" name="img_src" value="<?php echo $ds[photo2];?>">
                                        <div class="input-group">
										<input type="file" name="img" class="form-control">
													<span class="input-group-btn">
										<button type="submit" class="btn btn-primary" name="sub_plave">Submit</button>
													</span>
												</div>
                                    </form></td>
                            </tr>
                            <tr>
                                <td>Photo 3</td>
                                <td><img src="../../../images/<?php echo $ds[photo3];?>" height="120px" width="120px"><a href="process_edit_product_img.php?p_id=<?php echo $ds[p_id];?>&img=3&img_src=<?php echo $ds[photo3];?>&del=1" class="btn btn-danger">Delete</a></td>
                                <td><form method="post" action="process_edit_product_img.php" enctype='multipart/form-data'>
                                                                               <input type="hidden" name="p_id" value="<?php echo $ds[p_id];?>">
                                        <input type="hidden" name="img_n" value="3">
                                        <input type="hidden" name="img_src" value="<?php echo $ds[photo3];?>">
                                        <div class="input-group">
										<input type="file" name="img" class="form-control">
													<span class="input-group-btn">
										<button type="submit" class="btn btn-primary" name="sub_plave">Submit</button>
													</span>
												</div>
                                    </form></td>
                            </tr>
                            <tr>
                                <td>Photo 4</td>
                                <td><img src="../../../images/<?php echo $ds[photo4];?>" height="120px" width="120px"><a href="process_edit_product_img.php?p_id=<?php echo $ds[p_id];?>&img=4&img_src=<?php echo $ds[photo4];?>&del=1" class="btn btn-danger">Delete</a></td>
                                <td><form method="post" action="process_edit_product_img.php" enctype='multipart/form-data'>
                                                                               <input type="hidden" name="p_id" value="<?php echo $ds[p_id];?>">
                                        <input type="hidden" name="img_n" value="4">
                                        <input type="hidden" name="img_src" value="<?php echo $ds[photo4];?>">
                                        <div class="input-group">
										<input type="file" name="img" class="form-control">
													<span class="input-group-btn">
										<button type="submit" class="btn btn-primary" name="sub_plave">Submit</button>
													</span>
												</div>
                                    </form></td>
                            </tr>
                            <tr>
                                <td>Photo 5</td>
                                <td><img src="../../../images/<?php echo $ds[photo5];?>" height="120px" width="120px"><a href="process_edit_product_img.php?p_id=<?php echo $ds[p_id];?>&img=5&img_src=<?php echo $ds[photo5];?>&del=1" class="btn btn-danger">Delete</a></td>
                                <td><form method="post" action="process_edit_product_img.php" enctype='multipart/form-data'>
                                                                               <input type="hidden" name="p_id" value="<?php echo $ds[p_id];?>">
                                        <input type="hidden" name="img_n" value="5">
                                        <input type="hidden" name="img_src" value="<?php echo $ds[photo5];?>">
                                        <div class="input-group">
										<input type="file" name="img" class="form-control">
													<span class="input-group-btn">
										<button type="submit" class="btn btn-primary" name="sub_plave">Submit</button>
													</span>
												</div>
                                    </form></td>
                            </tr>
                                
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
