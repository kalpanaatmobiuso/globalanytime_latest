<?php
@ob_start();
//session_start();
?>
  <script type="text/javascript" src="http://js.nicedit.com/nicEdit-latest.js"></script> <script type="text/javascript">
//<![CDATA[
        bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
		jQuery("#testa").css("background-color:#fff");
		jQuery("#description").css("background-color:#fff");
  //]]>
  </script>
<script type="text/javascript">

</script>

<?php

if( $_SESSION['isadmin'] == '1')
{
?>

 <div class="graphs">
	     <div class="xs">
	  	         <div class="tab-content">
						<div class="tab-pane active" id="horizontal-form">
						<fieldset><legend>General Information</legend>
						<form class="form-horizontal" id = "useradd" name= "useradd" enctype="multipart/form-data" onSubmit="return formValidation();" method="POST" action="action-process.php?apage=editprofile&act=ins&ad=1">
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Name</label>
									<div class="col-sm-8">
										<input type="text" class="form-control1" id="uname" name="uname" placeholder="Please enter name"><div id="uname1"></div>
									</div>
								</div>
                <div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Login Name</label>
									<div class="col-sm-8">
										<input type="text" class="form-control1" id="user_name" name="user_name" placeholder="Please enter login name"><div id="user_name1"></div>
									</div>
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Password</label>
									<div class="col-sm-8">
										<input type="text" class="form-control1" id="passw" name="passw" placeholder="Enter  password"><div id="passw1"></div>
									</div>
								</div>
                <div class="form-group">
                <label for="focusedinput" class="col-sm-2 control-label">Verified</label>
                <div class="col-sm-8">
                  <input type="checkbox" name="verified" value="1"></input>
                </div>
              </div>
                <div class="form-group">
                <label for="focusedinput" class="col-sm-2 control-label">Paid</label>
                <div class="col-sm-8">
                  <input type="checkbox" name="paid"value="1"></input>
                              <input type="hidden" id="id" name="id" value="<?php echo $_GET['sid']; ?>" />
                </div>
              </div>
                <div class="form-group">
                  <label for="focusedinput" class="col-sm-2 control-label">Type of User</label>
									<div class="col-sm-8">
										<input type="radio" name="stype" id="stype" value="b"  />Buyers
                    <input type="radio" name="stype" id="stype" style="margin-left:25px;" value="s" />Sellers
									</div>
								</div>
                <div class="form-group">
                  <label for="focusedinput" class="col-sm-2 control-label"></label>
                  <div class="col-sm-8">
                    <input type="checkbox" name="terms1"> I accept the <u>Terms and Conditions</u>
                  </div>
                </div>
              <div class="panel-footer">
		<div class="row">
			<div class="col-sm-8 col-sm-offset-2">
				<input type="submit" name="submit" id="submit" value="Submit">
				<button class="btn-default btn"><a href="index.php?p=users-list">Cancel</a></button>

			</div>
		</div>
	 </div>
								</form>
        <?php      }
              ?>
								</fieldset>
								</div>
								</div>
								</div>
								</div>
<script type="text/javascript">
function formValidation()
{
  //alert('dd');
  var ename = document.getElementById('uname').value;
  //alert(ename);
  if (ename == ""){
   document.getElementById("uname1").innerHTML="Name is mandatory.";
   return false;
   }
  var uname = document.getElementById('user_name').value;
  if (uname == ""){
   document.getElementById("user_name1").innerHTML="Login Name can't be blank";
   return false;
  }
  var password = document.getElementById('passw').value;
  if (password == ""){
   document.getElementById("passw1").innerHTML="Password can't be blank";
   return false;
  }
  if(!useradd.terms1.checked) {
  alert("Please accept the Terms and Conditions");
  return false;
  }
  return true;
}
</script>
								<style type="text/css">
/*<![CDATA[*/
#myInstance1 {
        border: 2px dashed #fff;
		 background-color: #fff !important;
}
.nicEdit-selected {
        border: 2px solid #fff !important;
		 background-color: #fff !important;
}

.nicEdit-panel {
        background-color: #fff !important;
}

.nicEdit-button {
        background-color: #fff !important;
}
. nicEdit-main{
       background-color: #fff !important;
}
/*]]>*/
</style>
