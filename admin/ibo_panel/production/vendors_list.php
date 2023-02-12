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

    <title>Vendors List || GETMII</title>

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
                <h3>Vendors List</h3>
              </div>
            </div>

            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Vendors List</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <h3><i class="fa fa-user" style="color:#9eeb34"></i> Trusted</h3>
                      <h3><i class="fa fa-user" style="color:#f5d1c4"></i> Paid</h3>
                    <div class="card-box table-responsive"> 
                     <table id="datatable-buttons" class="table jambo_table" >
                      <thead>
                        <tr class="headings">
                          <th>U ID</th>
                          
                          <th>Status</th>
                          <th>Shop Name</th>
                          <th>Owner Name</th>
                          <th>Mobile</th>
                          <th>Shop Category</th>
                          <th>Date/Time</th>
                          <th>City </th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
                          <?php 
                                $au=1;
                                if(isset($_GET[type]))
                                {
                                $e="SELECT * FROM `user` WHERE `shop_name`!='' AND `is_provider`='1' AND `approval_status`!='a'";
                                }else{
                                    $e="SELECT * FROM `user` WHERE `shop_name`!='' AND `is_provider`='1'";
                                }
                                $d=$con->query($e);
                                while($R=$d->fetch_assoc()){ 
                               
                                ?>
                               <tr <?php
                                if($R[trusted_status]=='1'){
                                ?>bgcolor="#9eeb34"
                                    <?php }
                                    
                                elseif($R[paid_status]=='1'){
                                ?>bgcolor="#f5d1c4"
                                    <?php }?>>
                                <td><?php echo $R['u_id'];?></td> 
                                <td>
                                    <?php
                                    if($R['approval_status']=="p")
                                    {
                                        $ac="Deactivate";
                                        $col="btn-danger";
                                        
                                    }else{
                                        $ac="Activate";
                                        $col="btn-success";
                                    }?>
                  <div class="btn-group">
                    <button type="button" class="btn <?php echo $col;?> dropdown-toggle" data-toggle="dropdown"
                      aria-haspopup="true" aria-expanded="false">
                      <?php echo $ac;?>
                    </button>
                    <div class="dropdown-menu">
                      <a class="dropdown-item" href="process_approve_vendor.php?id=<?php echo $R['u_id'];?>&s=a">Activate</a>
                      <a class="dropdown-item" href="process_approve_vendor.php?id=<?php echo $R['u_id'];?>&s=p">Deactivate</a>
                    </div>
                  </div>
                                    
                                    
                                </td>
                                <td>
                                    <?php echo $R['shop_name'];?></td>
                                <td><?php echo $R['owner_name'];?></td>
                                <td><?php echo $R['shop_mobile'];?></td>
                                <td><?php 
                                $lka="SELECT * FROM `city_category` WHERE `id`='$R[csc_id]'";
                                $rpolk=$con->query($lka);
                                $scdpoa=$rpolk->fetch_assoc();
                                echo $scdpoa['name'];?>
                                
                                
                                </td>
                               
                                
                                <td><b>Reg</b>= <?php echo $R['shop_r_date']." / ". $R['shop_r_time']; ?><br>
                                <b>Active</b> = <?php echo $R['shop_a_date']." / ". $R['shop_a_time']; ?></td>
                                  <td><?php echo $R['shop_city']; ?></td>
                                  <td><a href="edit_vendor.php?u_id=<?php echo $R['u_id'];?>" class="btn btn-sm btn-primary"><i class="fa fa-pencil"></i> Edit </a>
                                  <a href="shop_slider.php?u_id=<?php echo $R['u_id'];?>" class="btn btn-sm btn-primary"><i class="fa fa-television"></i> Sliders </a>
                                  <a href="product_fetch.php?u_id=<?php echo $R['u_id'];?>" class="btn btn-sm btn-primary"><i class="fa fa-shopping-cart"></i> Product </a>
                                  <a href="shop_paid_trusted.php?u_id=<?php echo $R['u_id'];?>" class="btn btn-sm btn-warning"><i class="fa fa-check-circle-o"></i> Status </a></td>
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
