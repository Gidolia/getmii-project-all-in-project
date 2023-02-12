<?php 
include "config.php";

if($_GET[n]=='s'){
    top_structure('Password Change', 1, 'success', 'Success!', 'Password Change Successfully');
}elseif($_GET[n]=='n'){
    top_structure('Password Change', 1, 'warning', 'Not Matched', 'Old Password Is Incorrect');
}elseif($_GET[n]=='f'){
    top_structure('Password Change', 1, 'warning', 'Not Matched', 'New Password and Confirm Password is Not Matched');
}
else{
    top_structure('Password Change', 0, '', '', '');
}
sidebar();
header_bar();?>
<!--Content-->
   <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Password</h3>
              </div>

            </div>

            <div class="clearfix"></div>

            <div class="row">
            <div class="col-md-6 col-sm-8 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Change Password</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                     
                    <form class="form-horizontal form-label-left" method="post">
                      
                     
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Old Password</label>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                          <input type="password" class="form-control" name="old_pass">
                          
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">New Password</label>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                          <input type="password" class="form-control" name="n_pass">
                          
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Confirm Password</label>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                          <input type="password" class="form-control" name="c_pass" >
                          
                        </div>
                      </div>
                     
                      <div class="form-group">
                        <div class="col-md-12 col-md-offset-3">
                          <input type="submit" class="btn btn-success" value="Change Password" name="submit_pass">
                        </div>
                      </div>
                     </form>

                    </div>
                  </div>
                </div>
            </div>
            

            <?php
            if(isset($_POST[submit_pass]))
            {
                
                if($_POST[old_pass]==$_SESSION[a_password])
                {
                    if($_POST[n_pass]==$_POST[c_pass])
                    {
						//echo $con;
				$update_query="UPDATE `delievery_man` SET `password` = '$_POST[n_pass]' WHERE `delievery_man`.`id` = '$_SESSION[a_id]';";
							if($con->query($update_query) === TRUE)
							{
								$_SESSION[a_password]=$_POST[n_pass];
	
								echo "<script>
		location.href='changePassword.php?n=s';</script>";
							}
						 	else
							{
							 	echo "<script>
		location.href='changePassword.php?n=n';</script>";
						 	}
                    }else{echo "<script>
		location.href='changePassword.php?n=f';</script>";}
                }
                else{echo "<script>
		location.href='changePassword.php';</script>";
                }
                
                
                
                
            }
            ?>
            
          
<?php 
bottom_structure('Digitalasset.org.in');

?>