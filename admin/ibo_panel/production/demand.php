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

    <title>Demand List || GETMII</title>

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
    <!-- PNotify -->
    <link href="../vendors/pnotify/dist/pnotify.css" rel="stylesheet">
    <link href="../vendors/pnotify/dist/pnotify.buttons.css" rel="stylesheet">
    <link href="../vendors/pnotify/dist/pnotify.nonblock.css" rel="stylesheet">
    <?php

    if($_GET[n]=="d_s"){
        $script="new PNotify({
             title: 'Sended !',
             text: 'Demand Sended To Vendors',
             type: 'success',
             styling: 'bootstrap3'
      });";
    }
     if($_GET[n]=="d_d"){
        $script="new PNotify({
             title: 'Deleted !',
             text: 'Demand Deleted',
             type: 'danger',
             styling: 'bootstrap3'
      });";
    }?>
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
                <h3>Demands List</h3>
              </div>
            </div>

            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Demands List</h2>
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
                          <th>D ID</th>
                          <th>U ID</th>
                          <th>Name</th>
                          <th>Category</th>
                          <th>image</th>
                          <th>Description</th>
                          <th>Date/Time</th>
                          <th>Vendor Name (id) </th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
                          <?php 
                                $au=1;
                                $e="SELECT * FROM `demands`";
                                $d=$con->query($e);
                                while($R=$d->fetch_assoc()){ 
                                    $sel_c="SELECT * FROM `city_category`";
                                    $que_c=$con->query($sel_c);
                                    
                                $u_sel="SELECT name FROM `user` WHERE `u_id`='$R[u_id]'";
                                $u_que=$con->query($u_sel);
                                $u_fet=$u_que->fetch_assoc();
                                ?>
                               <tr>
                                <td><?php echo $R['d_id'];?></td> 
                                <td><?php echo $u_fet[name];?> (<?php echo $R['u_id'];?>)</td>
                                <td><?php echo $R['product_name'];?></td>
                                <td><?php if($R[send_to_vendors]=="n"){?>
                                    <form class="form-label-left" method="post" action="process_demand_send.php">
                                    <select class="form-control" name="c_id">
                                    <?php 
                                    while($cat_fet=$que_c->fetch_assoc())
                                    {
                                        if($R[c_id]==$cat_fet[id]){
                                            $a="selected";
                                            //echo "Selected";
                                        }
                                        echo "<option ".$a." value='".$cat_fet[id]."'>".$cat_fet[name]."</option>";
                                        $a="";
                                    }
                                    ?>
                                    </select>
                                    <input type="hidden" name="d_id" value="<?php echo $R['d_id'];?>">
                                    <span class="input-group-btn">
										<button type="submit" class="btn btn-success" name="city_logo_submit">Send</button>
									</span>
                                    </form><?php }else{
                                    $sel_ced="SELECT * FROM `city_category`";
                                    $que_ced=$con->query($sel_ced);
                                    $que_ced_fet=$que_ced->fetch_assoc();
                                    echo $que_ced_fet[name];
                                    }?>
                                    
                                </td>
                                <td><img src="../../../demand_img/<?php echo $R[image1];?>" height="100px" width="100px" /></td>
                                <td><?php echo $R['description'];?></td>
                                
                                <td><?php echo $R["c_date"]." / ". $R["c_time"]; ?></td>
                                
                                  <td><?php 
                                  $ven_sel="SELECT * FROM `user` WHERE `u_id`='$R[u_id]'";
                                  $ven_que=$con->query($ven_sel);
                                  $ven_fet=$ven_que->fetch_assoc();
                                  echo $ven_fet[shop_name]." (".$R['vendor_id'].")"; ?></td>
                                  <td><a href="process_delete_demand.php?d_id=<?php echo $R['d_id'];?>" class="btn btn-danger">Delete</a></td>
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
