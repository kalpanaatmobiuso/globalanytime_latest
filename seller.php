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


<!--<img data-u="image" width="100%" src="img/01.jpg"  /> -->



	<!-- end slider -->



	</div>


	  <div class="pf-container" >
	  <div class="pf-row">
	  <div class="wpb_column col-lg-12 col-md-12">
	  <div class="vc_column-inner ">


	  <div class="wpb_wrapper">



<div class="container" style="padding-bottom:60px;">

	<div id="modal1" class="popupContainer" style="display:block;">
		<header class="popupHeader" >

			<span class="header_title">Login</span>
			<!--<span class="modal_close"><i class="fa fa-times"></i></span>-->
		</header>

		<section class="popupBody">


		<?php
			 $s = isset($_GET['s']);

			if($s != ''){
			 if( $_GET['s'] == '1') { ?>

		<div class="sucRegister">Thank you for registration.</div>

		<?php }
		if( $_GET['s'] == '2') { ?>

		<div>Email already exits.</div>

		<?php }

		if( $_GET['s'] == '3') { ?>

		<div class="usernameError">Username already exits.</div>

		<?php }


		 } ?>


			<!-- Social Login -->
			<div class="user_login">
				 <form method = "post" id="loginform" name="loginform" onSubmit="return formValidation1();" action="login.php">
		<label>Login Name</label><input type="text" class="text" name="username" id="username" value=""  ><div id="username1"></div><br/><br/>
		<label>Password</label><input type="password" value="" name="password" id="password" ><div id="password1"></div><br/><br/>
		<input type="checkbox" name="terms1"> I accept the <u>Terms and Conditions</u><br/><br/>



			<?php
			$ee = isset($_GET['e']);

			 if( $ee != '') { ?>
				<div name="erroru" id="erroru">Invalid Username and Password </div>
<?php } ?>
				<br/>

				<div class="action_btns">

					<div class="one_half last"><input type="submit"  name="submit" id="submit" value="Login" style="padding: 10px 30px;
    border-radius: 4px;
    border: 1px solid transparent;
    background-color: #f4f4f2;"></div>
					<div class="one_half last"><a href="#" id="register_form" class="btn">Sign up</a></div>
					</form>
				</div>
			</div>


			<!-- Register Form -->
			<div class="user_register">
				 <form method = "post" name="uregister" action="register.php" onSubmit="return formValidation();" >
				  <label>Name</label> <input type="text" class="text1" name="uname" id="uname" value=""  /><div id="uname1"></div><br/><br/>
					<label>Login Name</label> <input type="text" class="text1" name="user_name" id="user_name" value=""  /><div id="user_name1"></div><br/><br/>
				   <label>Password</label><input type="text" class="text1" name="passw" id="passw" value=""  /><div id="passw1"></div><br/><br/>
					 <label>Phone / Mobile Number</label> <input type="text" class="text1" name="phone" id="phone" value=""  /><div id="phone1"></div><br/><br/>
 				   <label>Email Id</label><input type="text" class="text1" name="email" id="email" value=""  /><div id="email1"></div><br/><br/>
				  <label>Type of user</label>
					<input type="radio" name="stype_new" id="stype" value="b"  /> Buyers
					<input type="radio" name="stype_new" id="stype" style="margin-left:10px;" value="s" />Sellers<br/><br/>
					<input type="checkbox" name="terms"> I accept the <u>Terms and Conditions</u><br/><br/>
					<div class="action_btns">
						<div class="one_half"><a href="#" class="btn back_btn"><i class="fa fa-angle-double-left"></i> Back</a></div>
						<div class="one_half last"><input type="submit" name="submit" id="submit" value="Register" style="padding: 10px 30px;
    border-radius: 4px;
    border: 1px solid transparent;
    background-color: #f4f4f2;"></div>

					</div>
				</form>
			</div>
		</section>
	</div>






</div>

<script type="text/javascript">
	jQuery("#modal_trigger").leanModal({top : 200, overlay : 0.6, closeButton: ".modal_close" });
jQuery(".user_login").show();
	jQuery(function(){
		// Calling Login Form
		jQuery("#login_form").click(function(){
			jQuery(".social_login").hide();
			jQuery(".user_login").show();
			return false;
		});

		// Calling Register Form
		jQuery("#register_form").click(function(){
			jQuery(".user_login").hide();
			jQuery(".usernameError").hide();
			jQuery(".sucRegister").hide();
			jQuery(".user_register").show();
			jQuery(".header_title").text('Register');
			return false;
		});

		// Going back to Social Forms
		jQuery(".back_btn").click(function(){
			jQuery(".user_login").show();
			jQuery(".user_register").hide();

			jQuery(".header_title").text('Login');
			return false;
		});

	})
</script>






	</div></div>




</div></div></div></div></div></div>
            <div id="pf-membersystem-dialog"></div>
            <a title="" class="pf-up-but"><i class="pfadmicon-glyph-859"></i></a>
            <div class="wpf-footer-row-move"></div>
                        <footer class="wpf-footer">
            <div class="pf-container"><div class="pf-row clearfix">            <div class="wpf-footer-text col-lg-12">
              � Copyright  - <a href=""></a> - <a href=""></a>
            </div>
            <ul class="pf-footer-menu pfrightside"><li id="menu-item-4704" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-4704"><a href="">Terms &#038; Conditions</a></li>
</ul>            </div></div>            </footer>


 <script type="text/javascript">
function formValidation1()
{

var username = document.getElementById('username').value;
if (username == null || username ==""){
 //alert("Name can't be blank");
document.getElementById("username1").innerHTML="User Name can't be blank";
  return false;
}
var password = document.getElementById('password').value;

 if (password == null || password ==""){
 //alert("Email can't be blank");
document.getElementById("password1").innerHTML="Password can't be blank";
  return false;
}else if(!loginform.terms1.checked) {
alert("Please accept the Terms and Conditions");
return false;
}
  return true;
}
 function formValidation()
{
//alert('dd');
document.getElementById("uname1").innerHTML="";
document.getElementById("user_name1").innerHTML="";
document.getElementById("passw1").innerHTML="";
var ename = document.getElementById('uname').value;
if (ename == null || ename ==""){
 //alert("Name can't be blank");
document.getElementById("uname1").innerHTML="Name can't be blank";
  return false;
}

var uname = document.getElementById('user_name').value;
 if (uname == null || uname ==""){
 document.getElementById("user_name1").innerHTML="Login Name can't be blank";
  return false;
}
var passwd = document.getElementById('passw').value;
 if (passwd == null || passwd ==""){
 document.getElementById("passw1").innerHTML="Password  can't be blank";
  return false;
}

var phone = document.getElementById('phone').value;
 if (phone == null || phone ==""){
 document.getElementById("phone1").innerHTML="Phone Number can't be blank";
  return false;
}
if(isNaN(phone))
{
	document.getElementById("phone1").innerHTML="Phone Number should be numeric";
   return false;
}

var email = document.getElementById('email').value;
 if (email == null || email ==""){
 document.getElementById("email1").innerHTML="Email Id  can't be blank";
  return false;
}
var x= document.getElementById('email').value;
var atposition=x.indexOf("@");
var dotposition=x.lastIndexOf(".");

if (atposition<1 || dotposition<atposition+2 || dotposition+2>=x.length){
 document.getElementById("email1").innerHTML= "Please enter a valid e-mail address ";
 return false;
 }

if(!uregister.terms.checked) {
alert("Please accept the Terms and Conditions");
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
