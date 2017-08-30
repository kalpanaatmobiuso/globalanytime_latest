<!doctype html>
<html lang="en-US" class="no-js">
	<head>
		<meta charset="UTF-8">
				
		<meta name="description" content="">
		<!--[if lt IE 9]>
		<script src="http://sheeshor.sitemock.in/wp-content/themes/pointfinder/js/html5shiv.js"></script>
		<![endif]-->
		<title>
		<?php    include('connect_file.php');
	  $sql = "SELECT * FROM pages where pid = ".$_GET['p'];
$result = $conn->query($sql);
//print_r($result->num_rows);
//if ($result->num_rows > 0) {
						while($row = $result->fetch_array()) {
	  
	  echo $row['title'];
	}  ?>
		</title>
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

<script type='text/javascript' src='js/js/theme-scripts-header.min.js?ver=1.0.0'></script>


<style> .admin-bar #pfheadernav { margin-top:0!important } </style><style type="text/css" title="dynamic-css" class="options-output">.wpf-footer-row-move.wpf-footer-row-movepg:before{height:0px;}.pointfinderexfooterclasspg{color:#000000;}.pointfinderexfooterclasspg a{color:#000000;}.pointfinderexfooterclasspg a:hover{color:#B32E2E;}.pointfinderexfooterclasspg{padding-top:50px;padding-right:0;padding-bottom:50px;padding-left:0;}</style><style type="text/css" data-type="vc_shortcodes-custom-css">.vc_custom_1429705649450{padding-top: 80px !important;padding-bottom: 80px !important;background-color: #ffffff !important;}.vc_custom_1429706018029{margin-bottom: -35px !important;padding-top: 50px !important;}.vc_custom_1429705876633{padding-top: 90px !important;padding-bottom: 70px !important;}.vc_custom_1452291837085{padding-top: 80px !important;padding-bottom: 80px !important;}.vc_custom_1429705740631{margin-bottom: -7px !important;}</style><noscript><style type="text/css"> .wpb_animate_when_almost_visible { opacity: 1; }</style></noscript>
</head>
<body class="home page page-id-4602 page-template-default home-page-2 wpb-js-composer js-comp-ver-4.9.2 vc_responsive" >
<?php 

session_start();


?>
<div id="pf-loading-dialog" class="pftsrwcontainer-overlay"></div>
        <?php include('header.php'); ?>
 <div class="wpf-container">
        	<div id="pfmaincontent" class="wpf-container-inner" style="padding-bottom: 30px!important; height:200px;">
		

<!--<img data-u="image" width="100%" src="img/01.jpg"  /> -->


	  
	<!-- end slider -->
	

	
	</div>
	
	
	  <div class="pf-container" >
	  <div class="pf-row">
	  <div class="wpb_column col-lg-12 col-md-12">
	  <div class="vc_column-inner ">
	  
	  
	  <div class="wpb_wrapper">
	  


<div class="container" style="padding-bottom:60px; min-height:400px;">

	<?php    
	  $sql = "SELECT * FROM pages where pid = ".$_GET['p'];
$result = $conn->query($sql);
//print_r($result->num_rows);
//if ($result->num_rows > 0) {
						while($row = $result->fetch_array()) {
	  
	  echo $row['pag_content'];
	}  ?>

	  
	  
	  
	</div></div>

	  
	
	 
</div></div></div></div></div>            <div id="pf-membersystem-dialog"></div>
            <a title="" class="pf-up-but"><i class="pfadmicon-glyph-859"></i></a>
            <div class="wpf-footer-row-move"></div>
                        <footer class="wpf-footer">
            <div class="pf-container"><div class="pf-row clearfix">            <div class="wpf-footer-text col-lg-12">
              ? Copyright  - <a href=""></a> - <a href=""></a>
            </div>
            <ul class="pf-footer-menu pfrightside"><li id="menu-item-4704" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-4704"><a href="">Terms &#038; Conditions</a></li>
</ul>            </div></div>            </footer>
 

 
   


<script type='text/javascript' src='js/js/pointfinder.min.package.js?ver=1.0'></script>

<script type='text/javascript' src='js/js/responsive_menu.min.js?ver=1.0.0'></script>

<script type='text/javascript' src='js/js/theme-scripts.min.js?ver=1.0.0'></script>
<script type='text/javascript' src='js/js/jquery.infinitescroll.min.js?ver=2.0'></script>



</body>
</html>