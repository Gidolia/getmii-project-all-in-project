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

    <title>Vendor Edit || GETMII</title>

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
                <h3>Shop Edit</h3>
              </div>
            </div>

            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Edit Shop Detail</h2>
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
                    <?php 
                    $sdfbghy="SELECT * FROM `user` WHERE `u_id`='$_GET[u_id]'";
                    $cds=$con->query($sdfbghy);
                    $ax=$cds->fetch_assoc();
                    ?>
                    
                    <form class="form-horizontal form-label-left" method="post">
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Shop ID <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="text" required="required" class="form-control " name="u_id" value="<?php echo $ax[u_id];?>"  readonly>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Shop Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="text" required="required" class="form-control " name="shop_name" value="<?php echo $ax[shop_name];?>">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Category <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <select name="csc_id" class="form-control ">
                                <option value="" selected>Select</option>
                                <?php
                                $lka="SELECT * FROM `city_category`";
                                $rpolk=$con->query($lka);
                                
                                while($scdpoa=$rpolk->fetch_assoc())
                                {
                                ?>
                                
                                <option value="<?php echo $scdpoa[id];?>" 
                                <?php if($ax[csc_id]==$scdpoa[id]){ echo "selected";}?>><?php echo $scdpoa[name];?></option>
                                <?php }?>
                            </select>
                            
                         
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Owner Name<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="text" required="required" class="form-control " name="owner_name" value="<?php echo $ax[owner_name];?>">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Shop Mobile
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="number" class="form-control " name="shop_mobile" value="<?php echo $ax[shop_mobile];?>">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Shop Addreass
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="text" class="form-control " name="shop_addreass" value="<?php echo $ax[shop_addreass];?>">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">City 
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <select name="shop_city" class="form-control ">
                              <?php
                              $selhn="SELECT * FROM `cities`";
                              $caer=$con->query($selhn);
                              while($rfd=$caer->fetch_assoc())
                              {
                              ?>
                              <option value="<?php echo $rfd[city];?>" <?php if($ax[shop_city]==$rfd[city]){echo "selected";}?>><?php echo $rfd[city];?></option>
                              <?php }?>
                          </select>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Shop Reg No.
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="text" class="form-control " name="shop_reg_no" value="<?php echo $ax[shop_reg_no];?>">
                        </div>
                      </div>
                      
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">shop_detail <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="text" class="form-control " name="shop_detail" value="<?php echo $ax[shop_detail];?>">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Bank Acc No
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="text" class="form-control " name="bank_acc_no" value="<?php echo $ax[bank_acc_no];?>">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">ifsc <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="text" class="form-control " name="ifsc" value="<?php echo $ax[ifsc];?>">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Bank Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="text" class="form-control " name="bank_name" value="<?php echo $ax[bank_name];?>">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Pan Card No <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="text" class="form-control " name="pan_card_no" value="<?php echo $ax[pan_card_no];?>">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">About Us <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="text" class="form-control " name="about_us" value="<?php echo $ax[about_us];?>">
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="item form-group">
                        <div class="col-md-6 col-sm-6 offset-md-3">
                          
						  <button class="btn btn-primary" type="reset">Reset</button>
                          <button type="submit" name="sub_up" class="btn btn-success">Submit</button>
                        </div>
                      </div>

                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
          <?php
          if(isset($_POST[sub_up]))
         {
          $dcpo="UPDATE `user` SET `shop_name`='$_POST[shop_name]',`owner_name`='$_POST[owner_name]',`shop_addreass`='$_POST[shop_addreass]',`shop_mobile`='$_POST[shop_mobile]',`shop_city`='$_POST[shop_city]',`shop_reg_no`='$_POST[shop_reg_no]',`shop_detail`='$_POST[shop_detail]',`bank_acc_no`='$_POST[bank_acc_no]',`ifsc`='$_POST[ifsc]',`bank_name`='$_POST[bank_name]',`pan_card_no`='$_POST[pan_card_no]',`about_us`='$_POST[about_us]',`csc_id`='$_POST[csc_id]' WHERE `user`.`u_id` = '$_POST[u_id]';";
          $con->query($dcpo);
          echo "<script>alert('Shop Detail Successfully Updated!');location.href='edit_vendor.php?u_id=".$_POST[u_id]."';</script>";
          
         }
          ?>
          
          
          
          
          
        
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

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
	
  </body>
</html>
