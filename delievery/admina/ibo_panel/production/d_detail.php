<?php 
include "config.php";
top_structure('Distributer detail', 0, 'warning', 'Success', 'done');
sidebar();
header_bar();?>

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Distributor Detail</h3>
              </div>
            </div>

            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>distributor Detail</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                     
                     <table class="table table-striped table-bordered">
                          <?php 
                            
                                $e="SELECT * FROM `distributor` WHERE `d_id`='$_GET[d_id]'";
                                $d=$con->query($e);
                                $R=mysqli_fetch_assoc($d); 
                                
                                $f="SELECT * FROM `kyc_adhar` WHERE `d_id`='$_GET[d_id]'";
                                $d1=$con->query($f);
                                $R1=mysqli_fetch_assoc($d1);    
                                
                                $g="SELECT * FROM `kyc_pan` WHERE `d_id`='$_GET[d_id]'";
                                $d2=$con->query($g);
                                $R2=mysqli_fetch_assoc($d2); 
                            ?>
                          
                <tr><th>ID No.</th><td><?php echo $R["d_id"]; ?></td></tr>
                <!--<tr><th>Placement ID</th><td><?php echo $R['placement_id']; ?></td></tr>-->
                <tr><th>Sponser ID</th><td><?php echo $R["s_id"]; ?></td></tr>
                <tr><th>Name</th><td><?php echo $R["name"]; ?></td></tr>
                <tr><th>Email</th><td><?php echo $R["email"]; ?></td></tr>
                <tr><th>Mobile</th><td><?php echo $R["mobile"]; ?></td></tr>
                <!--<tr><th>D.O.B</th><td><?php echo $R["dob"]; ?></td></tr>-->
                <!--<tr><th>Addreass</th><td><?php echo $R["addreass"]; ?></td></tr>-->
                <tr><th>City</th><td><?php echo $R["city"]; ?></td></tr>
                <tr><th>Adhar Number</th><td><?php echo $R1["adhar_no"]; ?></td></tr>
                <tr><th>Pan Number</th><td><?php echo $R2["pan_no"]; ?></td></tr>
               
                <tr><th>Registration Date/time</th><td><?php echo $R['r_date']." / ".$R['r_time']; ?></td></tr>
                <tr><th>Active Status (date/time)</th><td><?php  if($R['status']==1)
                                        { ?> </a> <?php echo "<button type='button' class='btn btn-success'>Active</button>"; }
                                    else {?> <button type="button" class="btn btn-danger">Not Active</button> 
                                    <?php    
                                    } 
                                    echo " ".$R['a_date']." / ".$R['a_time'];
                                    ?></td></tr>
                
                <!--<tr><th>Withdrawal Wallet</th><td><?php echo $R['withdrawal_wallet']+0; ?> &nbsp;&nbsp;<a href="add_remove_withdrawal_wallet.php?d_id=<?php echo $R['d_id']; ?>">Add/Remove</a></td></tr>-->
                <!--<tr><th>Pin Wallet 2700/-</th><td><?php echo $R['pin_wallet']+0; ?> &nbsp;&nbsp;<a href="add_remove_pin.php?d_id=<?php echo $R['d_id']; ?>">Add/Remove</a></td></tr>-->
                <!--<tr><th>Pin Wallet 5400/-</th><td><?php echo $R['pin_wallet']+0; ?> &nbsp;&nbsp;<a href="add_remove_pin.php?d_id=<?php echo $R['d_id']; ?>">Add/Remove</a></td></tr>-->
                <!--<tr><th>Pin Wallet 10800/-</th><td><?php echo $R['pin_wallet']+0; ?> &nbsp;&nbsp;<a href="add_remove_pin.php?d_id=<?php echo $R['d_id']; ?>">Add/Remove</a></td></tr>-->
                
                
                          
                    </table>
                    
                    <br>&nbsp;<br>&nbsp;<br>&nbsp;<br>
                    <h2>ID Block / Unblock </h2>
                     <?php 
                    
                                if($R['block_status']!=1)
                                {?>
                                <form action="process_block_id.php" method="get">
                                    <input type="hidden" name="d_id" value="<?php echo $R[d_id];?>">
                                    <input type="text" name="b_note">
                                    
                                    <input type="submit" name="status" class='btn btn-danger' value="block">
                                </form>
                                <?php }
                                else{ ?> 
                                <form action="process_block_id.php" method="get">
                                    <input type="hidden" name="d_id" value="<?php echo $R[d_id];?>">
                                    <input type="text" name="b_note">
                                    <input type="submit" name="status" class='btn btn-success' value="unblock">
                                </form>
                                <?php }
                                ?>
                                <a href="block_reason_list.php?d_id=<?php echo $R[d_id];?>">Block History</a>
                                <br>&nbsp;<br>&nbsp;<br>&nbsp;
                                <h2>Edit Distributor Profile </h2>
                    <a href="edit_profile.php?d_id=<?php echo $R[d_id];?>"><button type='button' class='btn btn-success'>Edit </button></a>


                    <br>&nbsp;<br>&nbsp;<br>&nbsp;<br>
                    <h2>Aadhar Pan Bank Details</h2>
                    
                    <table id="datatable" class="table table-striped table-bordered">
                        
                    <?php $a="SELECT * FROM `kyc_adhar` WHERE `d_id`='$_GET[d_id]' and `status`='c'";
                          $s=$con->query($a);
                          $d=mysqli_fetch_assoc($s)?> 
                        <tr>
                            <th>Aadhar</th>
                            <td><?php if($s->num_rows==0){ echo "The Associate KYC has not been approved";} 
                                else{?> <a href="../../../ibo_panel/production/adhar_card_img/<?php echo $_GET[d_id];?>f.jpg"  target="_blank">Click here to view adhar card front image</a><br><a href="../../../ibo_panel/production/adhar_card_img/<?php echo $_GET[d_id];?>b.jpg"  target="_blank">Click here to view adhar card back image</a><?php } ?></td>
                                
                          <td><?php if($s->num_rows!=0){ ?><a href="kyc_adhar.php?d_id=<?php echo $R[d_id];?>"><button type='button' class='btn btn-danger'>Reject</button></a><?php } ?></td>
                          
                          
                          
                        </tr>
                        <?php $b="SELECT * FROM `kyc_pan` WHERE `d_id`='$_GET[d_id]' and `status`='c'";
                          $t=$con->query($b);
                          $e=mysqli_fetch_assoc($t)?>
                        <tr>
                            <th>Pan</th>
                            <td><?php if($t->num_rows==0){ echo "The Associate KYC has not been approved";} 
                                else{?> <a href="../../../ibo_panel/production/pan_card_img/<?php echo $_GET[d_id];?>.jpg"  target="_blank">Click here to view adhar card front image</a><?php } ?></td>
                          <td><?php if($t->num_rows!=0){ ?><a href="kyc_pan.php?d_id=<?php echo $R[d_id];?>"><button type='button' class='btn btn-danger'>Reject</button></a><?php } ?></td>
                        </tr>
                        <?php $c="SELECT * FROM `kyc_bank` WHERE `d_id`='$_GET[d_id]' and `status`='c'";
                          $u=$con->query($c);
                          $f=mysqli_fetch_assoc($u)?>
                        <tr>
                            <th>Bank</th>
                            <td><?php if($u->num_rows==0){ echo "The Associate KYC has not been approved";} 
                                else{?> <a href="../../../ibo_panel/production/bank_img/<?php echo $_GET[d_id];?>.jpg" target="_blank">Click here to view Bank Passbook image</a><?php } ?></td>
                          <td><?php if($u->num_rows!=0){ ?><a href="kyc_bank.php?d_id=<?php echo $R[d_id];?>"><button type='button' class='btn btn-danger'>Reject</button></a><?php } ?></td>
                        </tr>
                     </table>  
                  
                    
                  
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

        
<?php 
bottom_structure('Digitalasset.org.in');

?>