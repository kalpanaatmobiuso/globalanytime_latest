<!--

Author: W3layouts

Author URL: http://w3layouts.com

License: Creative Commons Attribution 3.0 Unported

License URL: http://creativecommons.org/licenses/by/3.0/

-->

<!DOCTYPE HTML>

<html>

<head>

<title>Modern an Admin Panel Category Flat Bootstarp Resposive Website Template | Home :: w3layouts</title>

<meta name="viewport" content="width=device-width, initial-scale=1">

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<meta name="keywords" content="Modern Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template,

Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />

<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

 <!-- Bootstrap Core CSS -->

<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />

<!-- Custom CSS -->

<link href="css/style.css" rel='stylesheet' type='text/css' />

<!-- Graph CSS -->

<link href="css/lines.css" rel='stylesheet' type='text/css' />

<link href="css/font-awesome.css" rel="stylesheet">
	<style type="text/css" media="screen">
			@import "css/demo_page.css";
			@import "css/demo_table.css";
			@import "http://www.datatables.net/media/css/site_jui.ccss";
			@import "css/demo_table_jui.css";
			@import "css/themes/base/jquery-ui.css";
			@import "css/themes/smoothness/jquery-ui-1.7.2.custom.css";
			/*
			 * Override styles needed due to the mix of three different CSS sources! For proper examples
			 * please see the themes example in the 'Examples' section of this site
			 */
			.dataTables_info { padding-top: 0; }
			.dataTables_paginate { padding-top: 0; }
			.css_right { float: right; }
			#example_wrapper .fg-toolbar { font-size: 0.8em }
			#theme_links span { float: left; padding: 2px 10px; }
		</style>
<!-- jQuery -->

<script src="js/jquery.min.js"></script>

<!----webfonts--->

<link href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet' type='text/css'>

<!---//webfonts--->

<!-- Nav CSS -->

<link href="css/custom.css" rel="stylesheet">

<!-- Metis Menu Plugin JavaScript -->

<script src="js/metisMenu.min.js"></script>

<script src="js/custom.js"></script>

<!-- Graph JavaScript -->

<script src="js/d3.v3.js"></script>

<script src="js/rickshaw.js"></script>
<script type="text/javascript" src="media/js/complete.js"></script>
		<script src="media/js/jquery-1.4.4.min.js" type="text/javascript"></script>
        	<script src="media/js/jquery.dataTables.min.js" type="text/javascript"></script>
		<script type="text/javascript" src="media/js/jquery.dataTables.columnFilter.js"></script>
		<script src="js/jquery.table2excel.js"></script>

</head>

<body>

<?php include('connect.php');

session_start();

//include 'config.php';
$sql = "SELECT * FROM user_profile where id = ".$_SESSION['userid'];
$result = $conn->query($sql);

if ($result->num_rows > 0) {
						while($row = $result->fetch_assoc()) {
						$_SESSION['userid'] = $row['id'];
						$_SESSION['isadmin'] = $row['is_admin'];
						}}


if (empty($_SESSION['user']) && parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) != '/index.php') {

    header('Location: login.php');
echo "index logout";
    exit;

}



?>

<div id="wrapper">

     <!-- Navigation -->

        <nav class="top1 navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0 ">

            <div class="navbar-header">

              <a class="navbar-brand" href="index.php?p=sellers-list">
							 <?php echo ucfirst($_SESSION['user']); ?>

							 </a>

            </div>

            <!-- /.navbar-header -->



		 <ul class="nav navbar-nav navbar-right">

					<li class="dropdown">

	        		<a href="action-process.php?apage=logout" >Logout</a>

					</li>

			</ul>
<ul class="nav navbar-nav navbar-right">

					<li class="dropdown">
<a  href="../">
							 Home
							 </a></li>
							 <li class="dropdown">
	        		<a href="index.php?p=editprofile" >Edit Profile</a>

					</li>

			</ul>

            <!--include -->

		<?php	include('right-menu.php'); ?>



            <!-- /.navbar-static-side -->

        </nav>

        <div id="page-wrapper">

        <!-- include innerpage -->

		<?php
		$spage = $_GET['p'];
	 $spage = $spage.'.php';
		include($spage); ?>

       </div>

      <!-- /#page-wrapper -->

   </div>

    <!-- /#wrapper -->

    <!-- Bootstrap Core JavaScript -->

</body>

</html>
