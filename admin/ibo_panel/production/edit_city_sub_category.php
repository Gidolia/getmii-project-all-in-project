<?php include "config.php";
$csc_id=$_GET[id];
$selk="SELECT * FROM `city_sub_category` WHERE `csc_id`='$csc_id'";
$def=$con->query($selk);
$fet=$def->fetch_assoc();

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

    <title>edit City Sub Category || GETMII</title>
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
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
    <!-- bootstrap-wysiwyg -->
    <link href="../vendors/google-code-prettify/bin/prettify.min.css" rel="stylesheet">
    <!-- Select2 -->
    <link href="../vendors/select2/dist/css/select2.min.css" rel="stylesheet">
    <!-- Switchery -->
    <link href="../vendors/switchery/dist/switchery.min.css" rel="stylesheet">
    <!-- starrr -->
    <link href="../vendors/starrr/dist/starrr.css" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    
   <!-- Datatables -->
    
    <link href="../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
    <!-- CDN links -->
<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
<link rel="stylesheet" type="text/css" href="amsify.suggestags.css">

<!-- Amsify Plugin -->
<script type="text/javascript" src="jquery.amsify.suggestags.js"></script>
    
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
                <h3>City Sub Category</h3>
              </div>
            </div>

            <div class="clearfix"></div>
            <div class="row">
				<div class="col-md-12 col-sm-12 ">
					<div class="x_panel">
						<div class="x_title">
							<h2>Edit Sub Category<small></small></h2>
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
									<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Category Name<span class="required">*</span>
									</label>
									<div class="col-md-6 col-sm-6 ">
										
										<select name="c_id" class="form-control">
										    <?php
										    $selssssa="SELECT * FROM `city_category`";
										    $querttt=$con->query($selssssa);
										    while($der=$querttt->fetch_assoc()){
										    ?>
										    <option value="<?php echo $der[id];?>" <?php if($fet[c_id]==
$der[id]){?>selected<?php }?>>
										        <?php echo $der[name];?>
										    </option>
										    <?php }?>
										</select>
									</div>
								</div>
								<div class="item form-group">
									<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Sub Category Name <span class="required">*</span>
									</label>
									<div class="col-md-6 col-sm-6 ">
										<input type="text" name="su_name" required="required" value="<?php echo $fet[name];?>" class="form-control">
									</div>
								</div>
								
								<div class="item form-group">
									<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name"> Shipping Charge<span class="required">*</span>
									</label>
									<div class="col-md-6 col-sm-6 ">
										<input type="text" name="shipping" required="required" value="<?php echo $fet[ship_amount];?>" class="form-control">
									</div>
								</div>
								<div class="item form-group">
									<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name"> Color Required<span class="required">*</span>
									</label>
									<div class="col-md-6 col-sm-6 ">
										<input type="radio" class="flat" name="color_r" value="1" <?php if($fet[color_req]=='1'){?>checked=""<?php }?> required />Yes<br>
                                        <input type="radio" class="flat" name="color_r" value="0" <?php if($fet[color_req]=='0'){?>checked=""<?php }?> />No
									</div>
								</div>
								
								<div class="ln_solid"></div>
								<h2>Add Attributes</h2>
								<div class="item form-group">
									<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name"> Keywords<span class="required">*</span>
									</label>
									<div class="col-md-6 col-sm-6 ">
										<input type="text" name="key_words[]" class="form-control">
									</div>
								</div>
								<div class="item form-group">
									<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name"> Keywords Values
									</label>
									<div class="col-md-6 col-sm-6 ">
										<input type="text" class="form-control" name="ah_opt[]" />
										
									</div>
                                    
								</div>
								
	
                                
					<div id="newinput"></div>
					<button id="rowAdder" type="button"
						class="btn btn-dark">
						<span class="bi bi-plus-square-dotted">
						</span> ADD
					</button>
				
<script type="text/javascript">

		$("#rowAdder").click(function () {
			newRowAdd ='<div id="row"><div class="ln_solid"></div>'+
			'<h2>Add New Attributes</h2>'+
			'<div class="item form-group">' +
			'<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name"> Keywords'+
			'</label>'+
			'<div class="col-md-6 col-sm-6 ">'+
				'<input type="text" name="key_words[]" class="form-control">'+
				'<button class="btn btn-primary" id="DeleteRow" type="button">' +
				'<i class="bi bi-trash"></i> Delete</button>'+
			'</div></div>'+
			'<div class="item form-group">'+
				'<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name"> Keywords Values<span class="required">*</span>'+
				'</label>'+
				'<div class="col-md-6 col-sm-6 ">'+
					'<input type="text" class="form-control" name="ah_opt[]" />'+
				'</div>'+
			'</div>'+
			'</div>';
			$('#newinput').append(newRowAdd);
		});

		$("body").on("click", "#DeleteRow", function () {
			$(this).parents("#row").remove();
		})
	</script>
	<script type="text/javascript">
	
	
	$('input[name="ah_opt[]"]').amsifySuggestags({
		type : 'amsify',
		
	});
</script>


                                    <div class="ln_solid"></div>
								<h2>Add Manual Keywords</h2>
								<div class="item form-group">
									<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name"> Keywords
									</label>
									<div class="col-md-6 col-sm-6 ">
										<input type="text" name="man_key_words[]" required="required" class="form-control">
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
			'<div class="item form-group">' +
			'<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name"> Keywords'+
			'</label>'+
			'<div class="col-md-6 col-sm-6 ">'+
				'<input type="text" name="man_key_words[]" required="required" class="form-control">'+
				'<button class="btn btn-primary" id="DeleteRow" type="button">' +
				'<i class="bi bi-trash"></i> Delete</button>'+
			'</div></div>'+
			
			'</div>';

			$('#newinputr').append(newRowAddr);
		});

		$("body").on("click", "#DeleteRow", function () {
			$(this).parents("#row").remove();
		})
	</script>
								
								<div class="ln_solid"></div>
								<div class="item form-group">
									<div class="col-md-6 col-sm-6 offset-md-3">
										<button class="btn btn-primary" type="reset">Reset</button>
										<button type="submit" class="btn btn-success" name="sub_cat_up">Submit</button>
									</div>
								</div>

							</form>
						</div>
					</div>
				</div>
			</div>
<?php 
if(isset($_POST[sub_cat_up])){
    $csc_sel="SELECT MAX(csc_id) AS `max` FROM `city_sub_category`";
    $csc_yu=$con->query($csc_sel);
    $csc_f=$csc_yu->fetch_assoc();
    $csc_id=$csc_f[max]+1;
   // echo $csc_id;
    function password_generate($chars) 
    {
      $data = '123456789ABCDEFGHIJKLMNOPQRSTabcdefghijkl';
      return substr(str_shuffle($data), 0, $chars);
    }
    
        $d_id=password_generate(25);
    if (file_exists("../../../images/" .$csc_id.$d_id.".jpg"))
    {
    unlink("../../../images/" .$csc_id.$d_id.".jpg");
      echo $d_id.".jpg" . " already exists. ";
    }
    if(move_uploaded_file($_FILES["c_img"]["tmp_name"], "../../../images/".$csc_id.$d_id.".jpg"))
	{
	    $imf=$csc_id.$d_id.".jpg";
        $fr="INSERT INTO `city_sub_category` (`csc_id`, `c_id`, `color_req`, `name`, `ship_amount`, `photo`, `status`) VALUES (NULL, '$_POST[c_id]', '$_POST[color_r]', '$_POST[su_name]', '$_POST[shipping]', '$imf', '1');";
        if($con->query($fr)===TRUE)
        {echo "success";
            $num=count($_POST['key_words']);
            echo $num;
            for($t=0; $t<$num; $t++){
                if(trim($_POST[key_words][$t]) !='')
                {
                    $keyw=$_POST[key_words][$t];
                    $ah_sel="SELECT MAX(ah_id) AS `max_ah` FROM `attributes_hundler`";
                    $ah_que=$con->query($ah_sel);
                    $ah_fet=$ah_que->fetch_assoc();
                    $ah_id=$ah_fet[max_ah]+1;
                    $sa="INSERT INTO `attributes_hundler` (`ah_id`, `csc_id`, `name`) VALUES ('$ah_id', '$csc_id', '$keyw');";
                    if($con->query($sa)===TRUE){
                        $string = $_POST[ah_opt][$t]; 
                        $str_arr = preg_split ("/\,/", $string); 
                        $scount=count($str_arr);
                        for($i=0; $i<$scount; $i++)
                        {
                            if(trim($str_arr[$i]) !='')
                            {
                                $inh="INSERT INTO `attributes_hundler_select` (`ahs_id`, `ah_id`, `name`) VALUES (NULL, '$ah_id', '$str_arr[$i]');";
                                $con->query($inh);
                            }
                        }
                    }
                }
            }
            $num_m=count($_POST['man_key_words']);
            for($tt=0; $tt<$num_m; $tt++){
                if(trim($_POST[man_key_words][$tt]) !='')
                {
                    $val=$_POST[man_key_words][$tt];
                    echo $val;
                    $dervt="INSERT INTO `attributes_manual` (`am_id`, `csc_id`, `name`) VALUES (NULL, '$csc_id', '$val');";
                    $con->query($dervt);
                }
            }
        }
	}
	echo "<script>alert('SubCategory Added Successfully');location.href='create_sub_category.php?c=".$_POST[c_id]."';</script>";
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
    <!-- bootstrap-progressbar -->
    <script src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="../vendors/iCheck/icheck.min.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="../vendors/moment/min/moment.min.js"></script>
    <script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- bootstrap-wysiwyg -->
    <script src="../vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
    <script src="../vendors/jquery.hotkeys/jquery.hotkeys.js"></script>
    <script src="../vendors/google-code-prettify/src/prettify.js"></script>
    <!-- jQuery Tags Input -->
    <script src="../vendors/jquery.tagsinput/src/jquery.tagsinput.js"></script>
    <!-- Switchery -->
    <script src="../vendors/switchery/dist/switchery.min.js"></script>
    <!-- Select2 -->
    <script src="../vendors/select2/dist/js/select2.full.min.js"></script>
    <!-- Parsley -->
    <script src="../vendors/parsleyjs/dist/parsley.min.js"></script>
    <!-- Autosize -->
    <script src="../vendors/autosize/dist/autosize.min.js"></script>
    <!-- jQuery autocomplete -->
    <script src="../vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script>
    <!-- starrr -->
    <script src="../vendors/starrr/dist/starrr.js"></script>
    
   
    
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
