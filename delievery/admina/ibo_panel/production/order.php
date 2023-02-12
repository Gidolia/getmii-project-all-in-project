<?php 
include "config.php";
top_structure('Order List', 0, 'warning', 'Success', 'done');
sidebar();
header_bar();?>
 <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>ALL Order List</h3>
              </div>
            </div>

            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>All Order List</h2>
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
                          <th>#</th>
                          <th>ID</th>
                          <th>Name</th>
                          <th>Email</th>
                          <th>Mobile</th>
                          <th>Address/Pincode</th>
                          <th>City</th>
                          <th>Status</th>
                          <th>Action</th>
                       
                          
                        </tr>
                      </thead>
                      <tbody>
                          <?php 
                        //   WHERE `position`='$_GET[position]'
                                $au=1;
                                $e="SELECT * FROM `orders` WHERE `delivery_man_id`='$_SESSION[a_id]'";
                                $d=$con->query($e);
                                while($R=$d->fetch_assoc()){ 
                               
                                ?>
                               <tr>
                                   <td><?php echo $au;?></td>
                                   <td><?php echo $R[o_id];?></td>
                                   <td><?php echo $R[c_name];?></td>
                                   <td><?php echo $R[c_email];?></td>
                                   <td><?php echo $R[c_mob];?></td>
                                   <td><?php echo $R[c_addreass];?> / <?php echo $R[c_pincode];?> </td>
                                   <td><?php echo $R[c_city];?></td>
                                   <!--<td>Rs.<?php echo $R[total_price];?></td>-->
                                   <td><?php if($R[status]=='c'){?>
                                   <button class="btn btn-warning">Confirmed</button>
                                   <?php }elseif($R[status]=='p'){?>
                                   <button class="btn btn-danger">Pending</button>
                                   <?php }else{?>
                                   <button class="btn btn-success">Delievered</button>
                                   <?php }?>
                                   </td>
                                   <td><a href="order_details.php?o_id=<?php echo $R[o_id];?>"><button class="btn btn-primary">View </button></a></td>
                                </tr>
                                
                                <?php $au++;     
                                } ?>
                      </tbody>
                    </table>
                    </div> 
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
       
<?php 
bottom_structure('Digitalasset.org.in');

?>