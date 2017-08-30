<!doctype html>
<html lang="en-US" class="no-js">
	<head>
		<meta charset="UTF-8">
		<meta name="description" content="">
		<!--[if lt IE 9]>
		<script src="http://sheeshor.sitemock.in/wp-content/themes/pointfinder/js/html5shiv.js"></script>
		<![endif]-->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0"><link rel="shortcut icon" href="/wp-content/uploads/sites/4/2014/11/favicon.png" type="image/x-icon"><link rel="icon" href="/wp-content/uploads/sites/4/2014/11/favicon.png" type="image/x-icon"><title>Ecommerce</title>
		<link rel='stylesheet' id='child-style-css'  href='style.css?ver=4.5.3' media='all' />
<link rel='stylesheet' id='bootstrap-css'  href='css/bootstrap.min.css?ver=3.2' media='all' />
<link rel='stylesheet' id='fontellopf-css'  href='css/fontello.min.css?ver=1.0' media='all' />
<link rel='stylesheet' id='theme-prettyphotocss-css'  href='css/prettyPhoto.css?ver=1.0' media='all' />
<link rel='stylesheet' id='theme-style-css'  href='style.css?ver=1.0' media='all' />
<link rel='stylesheet' id='theme-owlcarousel-css'  href='css/owl.carousel.min.css?ver=1.0' media='all' />
<link rel='stylesheet' id='pfcss-animations-css'  href='css/animate.min.css?ver=1.0' media='all' />
<link rel='stylesheet' id='pfsearch-goldenforms-css-css'  href='css/golden-forms.min.css?ver=1.0' media='all' />
<link rel='stylesheet' id='pf-main-compiler-local-css'  href='css/multidirectory/pf-style-main.css?ver=4.5.3' media='all' />
<link rel='stylesheet' id='pf-customp-compiler-local-css'  href='css/multidirectory/pf-style-custompoints.css?ver=4.5.3' media='all' />
<link rel='stylesheet' id='pf-pbstyles-compiler-local-css'  href='css/pf-style-pbstyles.css?ver=4.5.3' media='all' />
<link rel='stylesheet' id='pf-main-review-local-css'  href='css/multidirectory/pf-style-review.css?ver=4.5.3' media='all' />
<link rel='stylesheet' id='ultimate-google-fonts-css'  href='https://fonts.googleapis.com/css?family=Open+Sans:regular,700,600|Raleway:regular,600' media='all' />
<link type="text/css" rel="stylesheet" href="css/style2.css" />
<script type="text/javascript" src="js/jquery-1.11.0.min.js"></script>
<script type='text/javascript' src='js/jquery/jquery.js?ver=1.12.4'></script>
<script type='text/javascript' src='js/jquery/jquery-migrate.min.js?ver=1.4.1'></script>
<script type='text/javascript' src='js/js/theme-scripts-header.min.js?ver=1.0.0'></script>
 <script type="text/javascript" src="js/jquery.leanModal.min.js"></script>
<style> .admin-bar #pfheadernav { margin-top:0!important } </style><style type="text/css" title="dynamic-css" class="options-output">.wpf-footer-row-move.wpf-footer-row-movepg:before{height:0px;}.pointfinderexfooterclasspg{color:#000000;}.pointfinderexfooterclasspg a{color:#000000;}.pointfinderexfooterclasspg a:hover{color:#B32E2E;}.pointfinderexfooterclasspg{padding-top:50px;padding-right:0;padding-bottom:50px;padding-left:0;}</style><style type="text/css" data-type="vc_shortcodes-custom-css">.vc_custom_1429705649450{padding-top: 80px !important;padding-bottom: 80px !important;background-color: #ffffff !important;}.vc_custom_1429706018029{margin-bottom: -35px !important;padding-top: 50px !important;}.vc_custom_1429705876633{padding-top: 90px !important;padding-bottom: 70px !important;}.vc_custom_1452291837085{padding-top: 80px !important;padding-bottom: 80px !important;}.vc_custom_1429705740631{margin-bottom: -7px !important;}</style><noscript><style type="text/css"> .wpb_animate_when_almost_visible { opacity: 1; }</style></noscript>
</head>
<body class="home page page-id-4602 page-template-default home-page-2 wpb-js-composer js-comp-ver-4.9.2 vc_responsive" >
<?php
include('connect_file.php');
session_start();
?>
<div id="pf-loading-dialog" class="pftsrwcontainer-overlay"></div>
        <?php include('header.php'); ?>
 <div class="wpf-container">
        	<div id="pfmaincontent" class="wpf-container-inner" style="padding-bottom: 30px!important; height:200px;">
	</div>
	  <div class="pf-container" >
	  <div class="pf-row">
	  <div class="wpb_column col-lg-12 col-md-12">
	  <div class="vc_column-inner ">
	  <div class="wpb_wrapper">
<div class="container" style="padding-bottom:60px;">
	<div id="modal1" class="popupContainer" style="display:block;">
		<header class="popupHeader" >
			<span class="header_title">Post Request</span>
			<!--<span class="modal_close"><i class="fa fa-times"></i></span>-->
		</header>
		<section class="popupBody1">
		<?php
			 $s = isset($_GET['s']);
			if($s != ''){
			 if( $_GET['s'] == '1') { ?>
		<div>Thank you for your post requirement.</div>
		<?php }
		 }
		 if ($_SESSION['isadmin'] != '1')
		 {
			 $sql_user = "SELECT * FROM company_profile as c, user_profile as u where c.user_id = u.id and c.user_id =".$_SESSION['userid'];
			 $result_user = $conn->query($sql_user);
			 if ($result_user->num_rows <= 0) {?>
				   <div>Please first create company profile to get access to this feature</div>
<?php				 exit;
			 }
				} 		 ?>
			<!-- Register Form -->
			<div class="user_login1">
				 <form method = "post" name="uregister" action="postreq.php" onSubmit="return formValidation();" ><br/>
				  <label>Product / Service Name</label>
					<input type="text" class="text" name="pname" id="pname" style="width:200px;" value=""  ><div id="pname1"></div><br/><br/>
				   <label>Message</label> <textarea style="min-width:300px;" name="message" id="message" value=""  ></textarea><div id="message1"></div><br/><br/>
				   <input type="hidden" id="uid" name="uid" value="<?php  echo $_SESSION['userid'];   ?>" />
					 <div class="panel-footer">
					 	<div class="row">
					 		<div class="col-sm-8 col-sm-offset-2">
					 			<input type="submit" name="submit" id="submit" value="Submit" style="padding: 8px 15px;">
					 			<button class="btn-default btn"><a href="index.php">Cancel</a></button>
					 		</div>

					 	</div>
					  </div>

				</div>
				</form>
			</div>

		</section>
	</div>
</div></div></div>
</div></div></div></div></div></div>
            <div id="pf-membersystem-dialog"></div>
            <a title="" class="pf-up-but"><i class="pfadmicon-glyph-859"></i></a>
            <div class="wpf-footer-row-move"></div>
                        <footer class="wpf-footer">
            <div class="pf-container"><div class="pf-row clearfix">            <div class="wpf-footer-text col-lg-12">
              ? Copyright  - <a href=""></a> - <a href=""></a>
            </div>
            <ul class="pf-footer-menu pfrightside"><li id="menu-item-4704" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-4704"><a href="">Terms &#038; Conditions</a></li>
</ul>            </div></div>            </footer>


 <script type="text/javascript">

 function formValidation()
{
//alert('dd');
var proname = document.getElementById('pname').value;
if (proname ==null || proname ==""){
document.getElementById("pname1").innerHTML="Product Name can't be blank";
  return false;
}
var msg = document.getElementById('message').value;
if (msg ==null || msg ==""){
document.getElementById("message1").innerHTML="Message can't be blank";
  return false;
}
  return true;
}
 </script>
<script type='text/javascript' src='js/js/pointfinder.min.package.js?ver=1.0'></script>
<script type='text/javascript' src='js/js/owl.carousel.min.js?ver=1.3.2'></script>
<script type='text/javascript' src='js/js/responsive_menu.min.js?ver=1.0.0'></script>
<script type='text/javascript' src='js/js/theme-scripts.min.js?ver=1.0.0'></script>
<script type='text/javascript' src='js/js/jquery.infinitescroll.min.js?ver=2.0'></script>
</body>
</html>
