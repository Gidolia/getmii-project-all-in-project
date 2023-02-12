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

    <title>Getmii Details|| GETMII</title>

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

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
    
  </head>

  <body class="nav-md">
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
                <h3>Details</h3>
              </div>
            </div>

            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Details</h2>
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
                           <?php 
                                $au=1;
                                $e="SELECT * FROM `orders` WHERE `o_id`='$_GET[o_id]'";
                                $d=$con->query($e);
                                $val=$d->fetch_assoc();
                               
                                ?>
                           
                     <table  class="table table-bordered " >
                         <tr >
                           <td>Customer Name</td>
                           <td><?php echo $val[c_name];?></td>
                        </tr>
                          <tr >
                           <td>Customer Mobile</td>
                           <td><?php echo $val[c_mob];?></td>
                        </tr>
                        <tr >
                           <td>Email</td>
                           <td><?php echo $val[c_email];?></td>
                        </tr>
                        <tr >
                           <td>City</td>
                           <td><?php echo $val[c_city];?></td>
                        </tr>
                         <tr >
                           <td>Address/Pincode</td>
                           <td><?php echo $val[c_addreass];?> / <?php echo $val[c_pincode];?></td>
                        </tr>
                          <tr >
                           <td>Date/Time</td>
                           <td><?php echo $val[date];?> / <?php echo $val[time];?></td>
                        </tr>
                        <tr >
                           <td>Order Id</td>
                           <td><?php echo $val[o_id];?></td>
                        </tr>
                        <tr >
                           <td>Quantity</td>
                           <td><?php echo $val[qty];?></td>
                        </tr>
                          <tr >
                           <td>M.R.P</td>
                           <td>Rs.<?php echo $val[mrp];?></td>
                        </tr>
                          <tr >
                           <td>Selling Price</td>
                           <td>Rs.<?php echo $val[sp];?></td>
                        </tr>
                          <tr >
                           <td>Delivery Charge</td>
                           <td><?php echo $val[delivery_charge];?></td>
                        </tr>
                          <tr >
                           <td>T M.R.P</td>
                           <td>Rs.<?php echo $val[t_mrp];?></td>
                        </tr>  <tr >
                           <td>T Selling Price</td>
                           <td>Rs.<?php echo $val[t_sp];?></td>
                        </tr>
                        <tr >
                           <td>T Delivery Charge</td>
                           <td>Rs.<?php echo $val[t_delivery_charge];?></td>
                        </tr>
                         <tr >
                           <td>Shop Id</td>
                           <td>Rs.<?php echo $val[shop_id];?></td>
                        </tr>
                        <tr >
                           <td>Status</td>
                           <td>
                               <?php 
                               if($val[status]=='c'){
                               ?>
                               <button class="btn btn-success">Confirmed</button>
                               <?php }elseif($val[status]=='p'){?>
                                 <button class="btn btn-warning">Pending</button>
                                 <?php }else{?>
                                 <button class="btn btn-primary">Delievered</button>
                                 <?php }?>
                           </td>
                        </tr>
                        <tr >
                           <td>Deliever By</td>
                           <td><?php echo $val[delivery_by];?></td>
                        </tr>
                         <tr >
                           <td>Total Price</td>
                           <td>Rs.<?php echo $val[total_price];?></td>
                        </tr>
                        <?php
                        $e1="SELECT * FROM `user` WHERE `u_id`='$val[shop_id]'";
                                $d1=$con->query($e1);
                                $val1=$d1->fetch_assoc();
                        
                        $e2="SELECT * FROM `product` WHERE `p_id`='$val[p_id]'";
                                $d2=$con->query($e2);
                                $val2=$d2->fetch_assoc();
                                
                        ?>
                        <tr>
                            <td colspan="2" style="background-color:skyblue;font-weight:bold;text-align:center;font-size:18px;">PICK UP FROM</td>
                        </tr>
                         <tr >
                           <td>Shop Name</td>
                           <td><?php echo $val1[shop_name];?></td>
                        </tr>
                         <tr >
                           <td>Owner Name</td>
                           <td><?php echo $val1[owner_name];?></td>
                        </tr>
                         <tr >
                           <td>Mobile No.</td>
                           <td><?php echo $val1[shop_mobile];?></td>
                        </tr>
                        <tr >
                           <td>Shop Address</td>
                           <td><?php echo $val1[shop_addreass];?> / <?php echo $val1[shop_city];?></td>
                        </tr>
                         <tr>
                            <td colspan="2" style="background-color:skyblue;font-weight:bold;text-align:center;font-size:18px;">Deliever To</td>
                        </tr>
                        <tr>
                            <td>Product Name</td>
                           <td><?php echo $val2[product_name];?> </td>
                        </tr>
                        <tr >
                           <td>Delievery To</td>
                           <td><?php echo"<span style='color:red;font-weight:bolder'>".$val[c_name]."</span>";?></td>
                        </tr>
                        <tr>
                            <td>Product Image</td>
                           <td><img src="../../../images/<?php echo $val2[photo1]?>" style="height:100px;width:100px;"></td>
                        </tr>
                        
                      
                      
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
    <!--<script src="../vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>-->
    <!--<script src="../vendors/datatables.net-buttons/js/buttons.print.min.js"></script>-->
    <script src="../vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="../vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="../vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="../vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="../vendors/jszip/dist/jszip.min.js"></script>
    <script src="../vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="../vendors/pdfmake/build/vfs_fonts.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
	
  </body>
</html>
