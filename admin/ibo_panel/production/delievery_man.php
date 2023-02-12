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

    <title>Delievery Man List || GETMII</title>

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

    // if($_GET[n]=="ap_p"){
    //     $script="new PNotify({
    //          title: 'Deactivated!',
    //          text: 'Shop Deactivated Successfully',
             
    //          styling: 'bootstrap3'
    //   });";
    // }
    // elseif($_GET[n]=="ap_s"){
    //     $script="new PNotify({
    //          title: 'Activated!',
    //          text: 'Shop Activated Successfully',
    //          type: 'success',
    //          styling: 'bootstrap3'
    //   });";
    // }
    
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
                <h3>Delievery Man List</h3>
              </div>
            </div>

            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Delievery Man List</h2>
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
                          <th>ID</th>
                          <th>Name</th>
                          <th>Img</th>
                          <th>Mobile</th>
                          <th>Adhar Card</th>
                          <th>D Licence</th>
                          <th>City</th>
                          <th>Status</th>
                          <!--<th>Stock</th>-->
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                          <?php 
                                $au=1;
                                //if(isset($_GET[u_id])){
                                $e="SELECT * FROM `delievery_man`";
                                // else{
                                //     $e="SELECT * FROM `product`";}
                                
                                $d=$con->query($e);
                                while($R=$d->fetch_assoc()){
                                ?>
                               <tr>
                                <td><?php echo $R['id'];?></td>
                                <td><?php echo $R['name'];?></td>
                                <td><img src="./delievery_man/<?php echo $R[photo];?>" height="70px" width="70px"></td>
                                <td><?php echo $R['mobile_no'];?></td>
                                <td><?php echo $R['adhar_card_no'];?></td>
                                
                                <td><?php echo $R['d_lisence_no'];?></td>
                                <td><?php echo $R['city'];?></td>
                                
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
                      <a class="dropdown-item" href="process_delievery_activate_deactivate.php?status=1&id=<?php echo $R[id];?>">Activate</a>
                      <a class="dropdown-item" href="process_delievery_activate_deactivate.php?status=0&id=<?php echo $R[id];?>">Deactivate</a>
                    </div>
                  </div>
                                </td>
                                
                                <td>
                                    <a href="./edit_delievery_man.php?id=<?php echo $R[id];?>" ><button class="btn btn-primary">Edit</button></a>
                                    <a href="./delete_delievery_man.php?id=<?php echo $R[id];?>" ><button class="btn btn-danger">Delete</button></a>
                                </td>
                                <!--<td><a href="edit_product_img.php?p_id=<?php echo $R[p_id];?>" class="btn btn-primary">Edit Product Img</a></td>-->
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
