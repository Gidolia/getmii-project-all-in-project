<div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.php" class="site_title"><i class="fa fa-paw"></i> <span>GETMII ADMIN</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="images/img.jpg" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2><?php echo $d_detail[name];?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a href="index.php"><i class="fa fa-home"></i> Home</a>
                  </li>
                  <li><a><i class="fa fa-sitemap"></i> Banners <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="banners.php">Banners</a></li>
                      <li><a href="banners_sub_category.php">subcategory Banners</a></li>
                    </ul>
                  </li>
                  <li><a href="demand.php"><i class="fa fa-home"></i> Demands</a>
                  
                   <li><a><i class="fa fa-sitemap"></i> Delievery Man <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="./register.php">Add Delievery Man</a></li>
                      <li><a href="./delievery_man.php">Deleivery  Man List</a></li>
                    </ul>
                  </li>
                  <!--<li><a href="./delievery_man.php"><i class="fa fa-home"></i>Deleivery  Man</a>-->
                  <!--</li>-->
                  <li><a href="best_deal.php"><i class="fa fa-home"></i> Best Deal</a>
                  </li>
                
                  </li>
                  <li><a><i class="fa fa-sitemap"></i> LIST <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="list_users.php">Users List</a></li>
                      <li><a href="vendors_list.php">Vendors List</a></li>
                      <li><a href="vendors_list.php?type=1">New Vendors List</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-sitemap"></i> City Shop Setting <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="city_category.php">City Category</a></li>
                      <li><a href="create_sub_category.php">City Sub Category</a></li>
                      <li><a href="banners.php?c=1">City Banner</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-sitemap"></i> Order List <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="user_orders.php">All Order List</a></li>
                      <li><a href="delievery_by_getmii.php">Delievery By Getmii</a></li>
                    </ul>
                  </li>
                  <li><a href="product_fetch.php"><i class="fa fa-shopping-cart"></i> Product List</a>
                    
                  </li>
                  <li><a><i class="fa fa-sitemap"></i> Second Hand Category <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="second_hand_category.php">Category</a></li>
                      <li><a href="second_hand_product.php">Product</a></li>
                      <li><a href="second_hand_product.php?type=0">Product Pending</a></li>
                      <li><a href="banners.php?c=4">Banner</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-user"></i>Add Section<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="create_add_page_description.php">Add Page Description
</a></li>
                        <li><a href="add_banners.php">Ads Banners
                        </a></li>
                        <li><a href="shop_add_approve.php">Shop Add
                        </a></li>
                    </ul>
                  </li>
                  
                </ul>
              </div>
              <div class="menu_section">
                <h3>Live On</h3>
                <ul class="nav side-menu">
                  <li><a href="display_setting.php"><i class="fa fa-gear"></i> Front Display Setting</a>
                  </li>
                  <li><a href="suscriber_request.php"><i class="fa fa-gear"></i> Suscriber Request</a>
                  </li>
                  <li><a href="eror_report.php"><i class="fa fa-bug"></i> System Fail Report</a>
                  </li>
                  
                  <li><a><i class="fa fa-user"></i>Profile<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="change_pass.php">Change Password</a></li>
                    </ul>
                  </li>                  
                  
                </ul>
                <ul class="nav side-menu">
                  <li><a href="default_amount_edit.php"><i class="fa fa-circle"></i> Set Default Amount</a>
                  </li>
                  <li><a><i class="fa fa-user"></i>Coupans<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="create_coupans.php">Coupans Type</a></li>
                        <li><a href="create_offers.php">Create Offers</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-user"></i>Paid / Trusted<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="paid_edit.php">Paid</a></li>
                        <li><a href="trust_edit.php">Trusted</a></li>
                    </ul>
                  </li>
                  <li><a href="privacy_web_view.php"><i class="fa fa-user"></i>Privacy Description
</a></li>
                  <li><a><i class="fa fa-user"></i>Profile<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="change_pass.php">Change Password</a></li>
                    </ul>
                  </li>                  
                  
                </ul>
              </div>

            </div>
            <!-- /sidebar menu -->
            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>
