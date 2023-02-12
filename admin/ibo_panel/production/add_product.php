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

    <title>Add Product || GETMII</title>
<link rel="stylesheet" href=
"//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<link rel="stylesheet" href=
"https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
	<script src="//ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js">
	</script>
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
                <h3>Product Upload</h3>
              </div>
            </div>

            <div class="clearfix"></div>
            <div class="row">
				<div class="col-md-12 col-sm-12 ">
					<div class="x_panel">
						<div class="x_title">
							<h2>Upload Product<small></small></h2>
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
									<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Select Position <span class="required">*</span>
									</label>
									<div class="col-md-6 col-sm-6 ">
<script> function urlHandler(value) {                               
    window.location.assign(`${value}`);
}</script>
										<select class="form-control" name="place_id" id="url" onchange="urlHandler(this.value)">
										    <option selected>Select Sub Category</option>
			<?php 
			$selce="SELECT * FROM `city_category`";
			$ere=$con->query($selce);
			while($fetc=$ere->fetch_assoc()){?>
							<optgroup label="<?php echo $fetc[name];?>">
							    <?php 
			    $selcsc="SELECT * FROM `city_sub_category` WHERE `c_id`='$fetc[id]'";
			    $scop=$con->query($selcsc);
			    while($fetcsc=$scop->fetch_assoc()){?>
                              <option value="add_product.php?csc_id=<?php echo $fetcsc[csc_id];?>"  <?php if($_GET[csc_id]==$fetcsc[csc_id]){?>selected<?php }?>><?php echo $fetcsc[name];?></option>
                    <?php }?>          
                            </optgroup>
                            <?php }?>
										</select>
									</div>
								</div>
								<input type="hidden" name="csc_id" value="<?php echo $_GET[csc_id];?>">
								<div class="item form-group">
									<label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Product Name</label>
									<div class="col-md-6 col-sm-6 ">
										<input type="text" class="form-control" name="product_name">
									</div>
								</div>
								<?php 
								$sel_cdc="SELECT * FROM `city_sub_category` WHERE `csc_id`='$_GET[csc_id]'";
								$sedc=$con->query($sel_cdc);
								$sefet=$sedc->fetch_assoc();
								if($sefet[color_req]==1){
								?>
								<div class="item form-group">
									<label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Select Color</label>
									<div class="col-md-6 col-sm-6 ">
										<select class="form-control" name="color">
										    <?php 
										    $sel_color="SELECT * FROM `colors`";
										    $sel_que=$con->query($sel_color);
										    while($col_fet=$sel_que->fetch_assoc())
										    {
										    ?>
										    <option value="<?php echo $col_fet[color_value];?>" style="background: <?php echo $col_fet[color_value];?>; color: black;"><?php echo $col_fet[color_name];?></option>
										    <?php }?>
										</select>
										
									</div>
								</div>
								<?php }?>
								<div class="ln_solid"></div>
								<h4 align="center">Attributes</h4>
								
<?php   if(isset($_GET[csc_id]))
        {
            $selatr="SELECT * FROM `attributes_hundler` WHERE `csc_id`='$_GET[csc_id]'";
            $atr_que=$con->query($selatr);
            if($atr_que->num_rows>0){
            while($fet_ar=$atr_que->fetch_assoc()){?>
            <input type="hidden" name="ahs_name[]" value="<?php echo $fet_ar[name];?>">
                                <div class="item form-group">
									<label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align"><?php echo $fet_ar[name];?></label>
									<div class="col-md-6 col-sm-6 ">
									    <select class="form-control" name="ahs_value[]">
					<?php 
					$sel_ahs="SELECT * FROM `attributes_hundler_select` WHERE `ah_id`='$fet_ar[ah_id]'";
					$ahs_que=$con->query($sel_ahs);
					while($ahs_fet=$ahs_que->fetch_assoc()){
					?>
                                            <option value="<?php echo $ahs_fet[name];?>"><?php echo $ahs_fet[name];?></option>
                    <?php }?></select>
									</div>
								</div>
              <?php  
            }
            }
       }	?>
								
								
<?php   if(isset($_GET[csc_id]))
        {
            $selatr="SELECT * FROM `attributes_manual` WHERE `csc_id`='$_GET[csc_id]'";
            $atr_que=$con->query($selatr);
            if($atr_que->num_rows>0){
            while($fet_ar=$atr_que->fetch_assoc()){?>
            <input type="hidden" name="ahs_name[]" value="<?php echo $fet_ar[name];?>">
                    <div class="item form-group">
						<label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align"><?php echo $fet_ar[name];?></label>
						<div class="col-md-6 col-sm-6 ">
						    <input type="text" name="ahs_value[]" class="form-control">
						</div>
					</div>
              
              <?php  
            }
            }
       }	?>									
				<div class="ln_solid"></div>
				<h4 align="center">images</h4>
				                <div class="item form-group">
									<label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Main Img</label>
									<div class="col-md-6 col-sm-6 ">
									    <input type="file" name="img" class="form-control">
									</div>
								</div>
								
	                <div id="newinputr"></div>
					<button id="rowAdders" type="button"
						class="btn btn-dark">
						<span class="bi bi-plus-square-dotted">
						</span> ADD
					</button>
<script type="text/javascript">

		$("#rowAdders").click(function () {
			newRowAddr ='<div id="row">'+
			'<div class="item form-group">'+
									'<label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Images</label>'+
									'<div class="col-md-6 col-sm-6 ">'+
									    '<input type="file" name="img2[]" class="form-control">'+
									'</div>'+
			'</div></div>'+
			
			'</div>';

			$('#newinputr').append(newRowAddr);
		});

		$("body").on("click", "#DeleteRow", function () {
			$(this).parents("#row").remove();
		})
	</script>
	                            <div class="ln_solid"></div>
								<h4 align="center">Info</h4>
	                            <div class="item form-group">
									<label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">MRP</label>
									<div class="col-md-6 col-sm-6 ">
										<input type="text" class="form-control" name="mrp">
									</div>
								</div>
								<div class="item form-group">
									<label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Selling Price</label>
									<div class="col-md-6 col-sm-6 ">
										<input type="text" class="form-control" name="sp">
									</div>
								</div>
								<div class="item form-group">
									<label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Stock Quantity</label>
									<div class="col-md-6 col-sm-6 ">
										<input type="text" class="form-control" name="qty">
									</div>
								</div>
								<div class="item form-group">
									<label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Brand Name</label>
									<div class="col-md-6 col-sm-6 ">
										<input type="text" class="form-control" name="brand_name">
									</div>
								</div>
								<div class="item form-group">
									<label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Short Description</label>
									<div class="col-md-6 col-sm-6 ">
										<input type="text" class="form-control" name="s_description">
									</div>
								</div>
								<div class="item form-group">
									<label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Long Description</label>
									<div class="col-md-6 col-sm-6 ">
										<input type="text" class="form-control" name="l_description">
									</div>
								</div>
								
								<div class="item form-group">
									<label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Delivery Time</label>
									<div class="col-md-6 col-sm-6 ">
										<select class="form-control" name="delivery_time">
										    <?php 
										    $sel_del="SELECT * FROM `shipping_time`";
										    $sel_delque=$con->query($sel_del);
										    while($del_fet=$sel_delque->fetch_assoc())
										    {
										    ?>
										    <option value="<?php echo $del_fet[text];?>"><?php echo $del_fet[text];?></option>
										    <?php }?>
										</select>
										
									</div>
								</div>
								<div class="item form-group">
									<label for="middle-name" class="col-form-label col-md-3 col-sm-3">Return Policy</label>
									<div class="col-md-9 col-sm-9 ">
										<select class="form-control" name="return_policy">
										    <?php 
										    $sel_rut="SELECT * FROM `return_policy` ORDER BY `return_policy`.`returnp_id` ASC";
										    $sel_rutque=$con->query($sel_rut);
										    while($rut_fet=$sel_rutque->fetch_assoc())
										    {
										    ?>
										    <option value="<?php echo $rut_fet[policy_duration];?>"><?php echo $rut_fet[policy_text];?></option>
										    <?php }?>
										</select>
										
									</div>
								</div>
								
				
								
								<div class="ln_solid"></div>
								<div class="item form-group">
									<div class="col-md-6 col-sm-6 offset-md-3">
										<button class="btn btn-primary" type="reset">Reset</button>
										<button type="submit" class="btn btn-success" name="sub_banp">Submit</button>
									</div>
								</div>

							</form>
						</div>
					</div>
				</div>
			</div>
<?php 
if(isset($_POST[sub_banp])){
    $selcsc="SELECT * FROM `city_sub_category` WHERE `csc_id`='$_POST[csc_id]'";
    $asp=$con->query($selcsc);
    $csc_fet=$asp->fetch_assoc();
    function password_generate($chars) 
    {
      $data = '123456789ABCDEFGHIJKLMNOPQRSTabcdefghijkl';
      return substr(str_shuffle($data), 0, $chars);
    }
        $d_id=password_generate(9);
        $sela="SELECT MAX(p_id) AS `maxp_id` FROM `product`";
        $apoe=$con->query($sela);
        $p_fet=$apoe->fetch_assoc();
        $p_id=$p_fet[maxp_id]+1;
    
    if (file_exists("../../../images/" .$p_id.$d_id.".jpg"))
    {
    unlink("../../../images/" .$p_id.$d_id.".jpg");
      echo $d_id.".jpg" . " already exists. ";
    }
    if(move_uploaded_file($_FILES["img"]["tmp_name"], "../../../images/".$p_id.$d_id.".jpg"))
	{
	    $imf=$p_id.$d_id.".jpg";
	    $dp=100-($_POST[sp]*100/$_POST[mrp]);
        $fr="INSERT INTO `product` (`p_id`, `pm_id`, `c_id`, `sc_id`, `product_name`, `type1name`, `type1value`, `color_name`, `type4`, `short_description`, `long_description`, `photo1`, `photo2`, `photo3`, `photo4`, `photo5`, `stock`, `shop_id`, `brand_name`, `mrp`, `sp`, `d_percentage`, `delivery_charge`, `message`, `delivery_time`, `city`, `return_policy`) VALUES ('$p_id', '$p_id', '$csc_fet[c_id]', '$_POST[csc_id]', '$_POST[product_name]', '', '', '$_POST[color]', '', '$_POST[s_description]', '$_POST[l_description]', '$imf', '', '', '', '', '$_POST[qty]', '0', '$_POST[brand_name]', '$_POST[mrp]', '$_POST[sp]', '$dp', '', '1', '$_POST[delivery_time]', '', '$_POST[return_policy]');";
        
        if($con->query($fr)===TRUE){
            $num=count($_POST['ahs_name']);
            //echo $num;
            for($t=0; $t<$num; $t++){
                if(trim($_POST[ahs_name][$t]) !='')
                {
                    $a_name=$_POST[ahs_name][$t];
                    $a_value=$_POST[ahs_value][$t];
                    $edp="INSERT INTO `product_information` (`pi_id`, `p_id`, `attributes_name`, `attributes_value`) VALUES (NULL, '$p_id', '$a_name', '$a_value');";
                    $con->query($edp);
                }
            }
        }else{
            
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

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
	
  </body>
</html>
