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

    <title>Shop Add List || GETMII</title>

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
    elseif($_GET[n]=="ca_s"){
        $script="new PNotify({
             title: 'Approved!',
             text: 'Position Given Successfully',
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
                <h3>Shop ADD List</h3>
              </div>
            </div>

            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Shop ADD List</h2>
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
                          <th>No.</th>
                          
                          <th>Shop Name(id)</th>
                          <th>Img No.</th>
                          <th>days</th>
                          <th>Amount</th>
                          <th>City</th>
                          <th>Date</th>
                          <th>Location</th>
                          
                          
                        </tr>
                      </thead>
                      <tbody>
                          <?php 
                                $au=1;
                                $e="SELECT * FROM `shop_add`";
                                $d=$con->query($e);
                                while($R=$d->fetch_assoc()){ 
                                    
                                    $u_sel="SELECT * FROM `user` WHERE `u_id`='$R[shop_id]'";
                                    $u_que=$con->query($u_sel);
                                    $u_fet=$u_que->fetch_assoc();
                                ?>
                               <tr>
                                <td <?php if($R[status]==1){?>bgcolor="green"<?php }?>><?php echo $au;?></td> 
                                
                                <td><?php echo $u_fet['shop_name'];?></td>
                                <td>
                                    <?php if($R[img_no]=='1'){
                                    $ss_sel="SELECT * FROM `shop_sliders` WHERE `ss_id`='$R[banner]'";
                                    $ss_que=$con->query($ss_sel);
                                    $ss_fet=$ss_que->fetch_assoc();
                                        
                                        ?>
                                    <img src="../../../shop_logo/<?php echo $ss_fet[img];?>" height="120px" width="250px">    
                                        
                                        <?php 
                                    }
                                    elseif($R[img_no]>'1'){
                                    $ss_selw="SELECT * FROM `product` WHERE `p_id`='$R[p_id1]'";
                                    $ss_quew=$con->query($ss_selw);
                                    $ss_fetw=$ss_quew->fetch_assoc();
                                        
                                        ?>
                                    <img src="../../../images/<?php echo $ss_fetw[photo1];?>" height="80px" width="80px">    
                                        
                                        <?php
                                        if($R[img_no]>'1'){
                                    $ss_selw="SELECT * FROM `product` WHERE `p_id`='$R[p_id2]'";
                                    $ss_quew=$con->query($ss_selw);
                                    $ss_fetw=$ss_quew->fetch_assoc();
                                        
                                        ?>
                                    <img src="../../../images/<?php echo $ss_fetw[photo1];?>" height="80px" width="80px">
                                        <?php
                                        }if($R[img_no]>'3'){
                                    $ss_selw="SELECT * FROM `product` WHERE `p_id`='$R[p_id3]'";
                                    $ss_quew=$con->query($ss_selw);
                                    $ss_fetw=$ss_quew->fetch_assoc();
                                        
                                        ?>
                                    <img src="../../../images/<?php echo $ss_fetw[photo1];?>" height="80px" width="80px">
                                        <?php
                                        }if($R[img_no]>'3'){
                                    $ss_selw="SELECT * FROM `product` WHERE `p_id`='$R[p_id4]'";
                                    $ss_quew=$con->query($ss_selw);
                                    $ss_fetw=$ss_quew->fetch_assoc();
                                        
                                        ?>
                                    <img src="../../../images/<?php echo $ss_fetw[photo1];?>" height="80px" width="80px">
                                        <?php
                                    }}
                                    ?>
                                    
                                    
                                </td>
                                <td><?php echo $R[days];?></td>
                                <td><?php echo $R['amount'];?></td>
                                <td><?php echo $R['city'];?></td>
                                <td> <b>S Date</b> = <?php echo $R['c_date'];?><br>
                                   <b>End Date</b> = <?php echo $R['e_date'];?>
                                
                                
                                </td>
                                <td>
                                    <form method="post" action="process_shop_add_active.php">                        <input type="hidden" name="sa_id" value="<?php echo $R[sa_id];?>">
                                        <div class="input-group">
                                        <select name="position" class="form-control">
                                            <option value="">Select</option>
                                            <option value="1" <?php if($R[banner_position]==1){echo "selected";}?>>1</option>
                                            <option value="2"<?php if($R[banner_position]==2){echo "selected";}?>>2</option>
                                            <option value="3" <?php if($R[banner_position]==3){echo "selected";}?>>3</option>
                                            <option value="4" <?php if($R[banner_position]==4){echo "selected";}?>>4</option>
                                            <option value="5" <?php if($R[banner_position]==5){echo "selected";}?>>5</option>
                                            <option value="6" <?php if($R[banner_position]==6){echo "selected";}?>>6</option>
                                            <option value="7" <?php if($R[banner_position]==7){echo "selected";}?>>7</option>
                                            <option value="8" <?php if($R[banner_position]==8){echo "selected";}?>>8</option>
                                            <option value="9" <?php if($R[banner_position]==9){echo "selected";}?>>9</option>
                                            
                                        </select>
										
										<span class="input-group-btn">
										<button type="submit" class="btn btn-primary" name="sub_postion"><i class="fa fa-arrow-right"></i></button>
													</span>
												</div>
                                    </form>
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
