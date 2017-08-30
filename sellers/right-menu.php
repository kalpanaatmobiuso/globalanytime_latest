
<div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                      <li><a href="index.php?p=sellers-list"><i class="fa fa-laptop nav_icon"></i>Company Profile<span class="fa arrow"></span></a></li>

            <?php   if($_SESSION['isadmin'] == '1')
                    {?>
                      <li>
                     <a href="index.php?p=dashboard-admin"><i class="fa fa-laptop nav_icon"></i>Enquiry<span class="fa arrow"></span></a>
                     </li>

                    <?php
                    }
                    else
                    {
                        if($_SESSION['stype'] == 'b'){
                        ?>
                         <li>
                        <a href="index.php?p=dashboard"><i class="fa fa-laptop nav_icon"></i>Enquiry<span class="fa arrow"></span></a>
                        </li>
                        <?php }
                        else{ ?>
                        <li>
                        <a href="index.php?p=dashboardb"><i class="fa fa-laptop nav_icon"></i>Enquiry<span class="fa arrow"></span></a>
                        <!--<a href="index.php?p=dashboard"><i class="fa fa-laptop nav_icon"></i>Dashboard<span class="fa arrow"></span></a>-->
                        </li>
                        <?php }
                      }
                      if ($_SESSION['isadmin'] == '1')
                      { ?>
                        <!--<li><a href="index.php?p=post-request-admin"><i class="fa fa-laptop nav_icon"></i>Post Request<span class="fa arrow"></span></a></li> -->
                          <li><a href="index.php?p=post-request-seller"><i class="fa fa-laptop nav_icon"></i>Post Request<span class="fa arrow"></span></a></li>
                    <?php  }
                      else {
                      if ($_SESSION['stype'] =='b') {?>
                      <li><a href="index.php?p=post-request"><i class="fa fa-laptop nav_icon"></i>Post Request<span class="fa arrow"></span></a></li>
                    <?php  }  else {
                     ?>
                      <li><a href="index.php?p=post-request-seller"><i class="fa fa-laptop nav_icon"></i>Post Request<span class="fa arrow"></span></a></li>
                      <li><a href="index.php?p=post-request-seller-request"><i class="fa fa-laptop nav_icon"></i>Ny Own Requests<span class="fa arrow"></span></a></li>
                    <?php  }
                      }
                       if($_SESSION['isadmin'] == '1'){
                            ?>
                            <li><a href="index.php?p=products-list-admin"><i class="fa fa-laptop nav_icon"></i>Products<span class="fa arrow"></span></a></li>
                          </li>
                              <li><a href="index.php?p=pages-list"><i class="fa fa-laptop nav_icon"></i>Pages<span class="fa arrow"></span></a></li>
                              <li><a href="index.php?p=users-list"><i class="fa fa-laptop nav_icon"></i>Users<span class="fa arrow"></span></a></li>
                              <li><a href="index.php?p=HomeSliderList"><i class="fa fa-laptop nav_icon"></i>Sliders<span class="fa arrow"></span></a></li>
                              <li>
                                <a href="index.php?p=category-list"><i class="fa fa-laptop nav_icon"></i>Category<span class="fa arrow"></span></a>
                              </li>
                              <li>
                                <a href="index.php?p=sub-category-list"><i class="fa fa-laptop nav_icon"></i>Sub Category<span class="fa arrow"></span></a>
                              </li>
                        <?php }
                        if ($_SESSION['stype'] == 's')
                           {?>
                               <li><a href="index.php?p=products-list"><i class="fa fa-laptop nav_icon"></i>Products<span class="fa arrow"></span></a></li>

                             </li>

                           <?php }?>
                  </ul>
                            <!-- /.nav-second-level -->
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
