
<?php
@ob_start();
//session_start();
?>
<script>
function myFunction() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
        x.className += " responsive";
    } else {
        x.className = "topnav";
    }
}
</script>
<style>

ul.topnav {
  list-style-type: none;
  margin: 0;
  padding: 16px 0;
  overflow: hidden;
}

ul.topnav li {float: left;}

ul.topnav li a {
  display: inline-block;
  color: #000000;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  transition: 0.3s;
  /*font-size: 17px;*/
}

ul.topnav li a:hover {color:#04a4cc;}

ul.topnav li.icon {display: none;}

@media screen and (max-width:680px) {
  ul.topnav li:not(:first-child) {display: none;}
  ul.topnav li.icon {
    float: right;
    display: inline-block;
  }
  ul.topnav li a.active {

    display: none;
  }
}

@media screen and (max-width:680px) {
  ul.topnav.responsive {position: relative;}
  ul.topnav.responsive li.icon {
    position: absolute;
    right: 0;
    top: 0;
  }
  ul.topnav.responsive li {
    float: none;
    display: inline;
  }
  ul.topnav.responsive li a {
    display: block;
    text-align: left;
  }
}
</style>
<header class="wpf-header hidden-print" id="pfheadernav">

        	        	<div class="pftopline wpf-transition-all">

        		<div class="pf-container">
					<div class="pf-row">

						<div class="col-lg-12 col-md-12">

														<div class="wpf-toplinewrapper">

																<div class="pf-toplinks-left clearfix">
														<span style="color:#FFFFFF; margin-left:100px; float:left; padding:5px;">
                              <!-- <?php      ob_start();
session_start();
//print_r($_SESSION);
if($_SESSION['user'] != ''){
echo $_SESSION['user'] ." | <a href='/sellers/index.php?p=editprofile' > Profile ";
}
?>-->
<?php
 if (isset($_SESSION['user']))
 {
   if ($_SESSION['user'] !='')
   echo $_SESSION['user'] ." | <a href='/sellers/index.php?p=editprofile' > Profile ";
 }?>
 </span>

									<ul class="pf-sociallinks"> <li class="pf-sociallinks-item facebook wpf-transition-all"><a href="#" target="_blank"><i class="pfadmicon-glyph-770"></i></a></li><li class="pf-sociallinks-item twitter wpf-transition-all"><a href="#" target="_blank"><i class="pfadmicon-glyph-769"></i></a></li><li class="pf-sociallinks-item linkedin wpf-transition-all"><a href="#" target="_blank"><i class="pfadmicon-glyph-824"></i></a></li><li class="pf-sociallinks-item google-plus wpf-transition-all"><a href="#" target="_blank"><i class="pfadmicon-glyph-813"></i></a></li><li class="pf-sociallinks-item pinterest wpf-transition-all"><a href="#" target="_blank"><i class="pfadmicon-glyph-810"></i></a></li><li class="pf-sociallinks-item instagram wpf-transition-all"><a href="#" target="_blank"><i class="pfadmicon-glyph-954"></i></a></li><li class="pf-sociallinks-item rss wpf-transition-all"><a href="#" target="_blank"><i class="pfadmicon-glyph-914"></i></a></li> <li class="pf-sociallinks-item pf-infolinks-item envelope wpf-transition-all"> <a href="#"><i class="pfadmicon-glyph-765"></i> <span class="pf-infolink-item-text">001 (123) 123 12 34</span></a></li> <li class="pf-sociallinks-item pf-infolinks-item pflast envelope wpf-transition-all"><a href="#"><i class="pfadmicon-glyph-823"></i><span class="pf-infolink-item-text">info@demo.com</span></a></li> </ul>

								</div>
								<div class="pf-toplinks-right clearfix container">

									<nav id="pf-topprimary-nav" class="pf-topprimary-nav pf-nav-dropdown clearfix hidden-sm hidden-xs">



										<ul class="pf-nav-dropdown pfnavmenu pf-topnavmenu ">
											<li class="pf-my-account pfloggedin">

											</li>


																					</ul>
									</nav>
								</div>
															</div>
						</div>
					</div>
				</div>
        	</div>
			<!-- topbar end -->
                        <div class="wpf-navwrapper">
	            					<a id="pf-primary-nav-button" title="Menu"><i class="pfadmicon-glyph-500"></i></a>

								<a id="pf-topprimary-nav-button" title="User Menu"><i class="pfadmicon-glyph-632"></i></a>
				<a id="pf-topprimary-nav-button2" title="User Menu"><i class="pfadmicon-glyph-787"></i></a>
								<a id="pf-primary-search-button" title="Search"><i class="pfadmicon-glyph-627"></i></a>
				<div class="pf-container pf-megamenu-container">
					<div class="pf-row">

																		<div class="col-lg-3 col-md-3">
							<a class="pf-logo-container" style="height:30px;margin:20px 0;" href="index.php"><img src="images/globalanytime.png" width="50" height="50" /></a>
						</div>
												<!--<div class="col-lg-9 col-md-9" id="pfmenucol1">
							<div class="pf-menu-container">

								<nav id="pf-primary-nav" class="pf-nav-dropdown clearfix">
									<ul class="pf-nav-dropdown pfnavmenu pf-topnavmenu">
										<li id="nav-menu-item-4710" class="main-menu-item  menu-item-even menu-item-depth-0 menu-item menu-item-type-post_type menu-item-object-page current-menu-item page_item page-item-4602 current_page_item menu-item-has-children"><a href="index.php" class="menu-link main-menu-link" style=" line-height:90px;">Home</a>

</li>
<li id="nav-menu-item-4705" class="main-menu-item  menu-item-even menu-item-depth-0 menu-item menu-item-type-post_type menu-item-object-page"><a href="pages.php?p=1" class="menu-link main-menu-link"  style=" line-height:90px;">About Us</a></li>
<li id="nav-menu-item-4674" class="main-menu-item  menu-item-even menu-item-depth-0 menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children pf-megamenu-main"><a href="pages.php?p=2" class="menu-link main-menu-link"  style=" line-height:90px;">Contact Us</a>

</li>
	<li id="nav-menu-item-2352" class="sub-menu-item  menu-item-odd menu-item-depth-1 menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children"><a href="#"  style=" line-height:90px;" class="menu-link pf-megamenu-hidedesktop sub-menu-link">Profile</a>

</li>
	<li id="nav-menu-item-2353" class="sub-menu-item  menu-item-odd menu-item-depth-1 menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children"><a href="#"  style=" line-height:90px;" class="menu-link pf-megamenu-hidedesktop sub-menu-link">Download App</a>

</li>
	<li id="nav-menu-item-2354" class="sub-menu-item  menu-item-odd menu-item-depth-1 menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children"><a href="seller.php"  style=" line-height:90px;" class="menu-link pf-megamenu-hidedesktop sub-menu-link">Sellers</a>

</li>
<li id="nav-menu-item-2354" class="sub-menu-item  menu-item-odd menu-item-depth-1 menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children"><a href="prequest.php"  style=" line-height:90px;" class="menu-link pf-megamenu-hidedesktop sub-menu-link">Post Request</a>

</li>
</ul>
								</nav>


							</div>
						</div>-->
                        <div class="col-lg-9 col-md-9" id="pfmenucol1">
                        <div class="pf-menu-container">
                                <ul class="topnav" id="myTopnav">
                                  <li><a class="active" href="index.php">Home</a></li>
                                  <li><a href="pages.php?p=1">About Us</a></li>
                                  <li><a href="pages.php?p=2">Contact Us</a></li>
                                  <li><a href="#">Profile</a></li>
                                  <li><a href="#">Download App</a></li>

                                         <?php
                                          if (isset($_SESSION['user']))
                                          {?>
                                            <li><a href="sellers/action-process.php?apage=logout">
                                          Logout</a></li>
                                          <li><a href="prequest.php">Post Request</a></li>
                                          <li><a href="sellers/index.php?p=sellers-list">Dashboard</a></li>
                                    <!--      <?php
                                          if ($_SESSION['isadmin'] == '1')
                                          {?>
                                              <li><a href="sellers/index.php?p=dashboard-admin">Dashboard</a></li>

                                        <?php  }
                                          else
                                          {
                                             if($_SESSION['stype'] == 'b'){?>
                                                  <li><a href="sellers/index.php?p=dashboard">Dashboard</a></li>

                                              <?php }else{ ?>
                                                 <li><a href="sellers/index.php?p=dashboardb">Dashboard</a></li>
                                              <?php  }
                                          }?>-->
                                          <?php } else {?>
                                            <li><a href="seller.php">
                            Login</a></li>
                             <li><a href="seller.php">Post Request</a></li>
                                <?php          }?>



                <li class="icon">
                                    <a href="javascript:void(0);" style="font-size:15px;" onclick="myFunction()">☰</a>
                                  </li>
                                </ul>
                            </div>
                        </div>
											</div>


				</div>

			</div>

        </header>
