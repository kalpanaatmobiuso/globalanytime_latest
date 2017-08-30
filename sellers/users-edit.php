 <div class="graphs">
	     <div class="xs">
  	       <h3 style="padding-top:5px;">Edit Profile</h3>
  	         <div class="tab-content">
						<div class="tab-pane active" id="horizontal-form">
						<fieldset><legend>Edit Profile</legend>
						<?php
						include('connect.php');
						//session_start();

						$sql = "SELECT * FROM user_profile where id = ".$_GET['sid'];
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
						while($row = $result->fetch_assoc()) {
						?>
						<form class="form-horizontal" name="useredit" id = "useredit" method="POST" enctype="multipart/form-data" onSubmit="return formValidation();" action="action-process.php?apage=editprofile&act=edt&ad=1">
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Name</label>
									<div class="col-sm-8">
									<input type="text" class="text"  name="uname" id="uname" value="<?php echo $row['loginname']; ?>"  /><div id="uname1"></div>
									</div>
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Login Name</label>
									<div class="col-sm-8">
										<input type="text" class="text" name="user_name" class="form-control1" id="user_name" value="<?php echo $row['name']; ?>" /><div id="user_name1"></div>
									</div>
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Password</label>
									<div class="col-sm-8">
										<input type="text" class="text" name="passw" class="form-control1" id="passw" value="<?php echo $row['password']; ?>" /><div id="passw1"></div>
									</div>
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Verified</label>
									<div class="col-sm-8">
										<input type="checkbox" id="verified" name="verified" <?php if($row['verified'] == '1'){ echo 'checked'; }  ?> value="1"></input>
									</div>
								</div>
									<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Paid</label>
									<div class="col-sm-8">
										<input type="checkbox" id ="paid" name="paid" <?php if($row['paid'] == '1'){ echo 'checked'; }  ?> value="1"></input>
                    <input type="hidden" id="id" name="id" value="<?php echo $_GET['sid']; ?>" />
									</div>
								</div>
                <div class="form-group">
                  <label for="focusedinput" class="col-sm-2 control-label">Type of User</label>
									<div class="col-sm-8">
										<input type="radio" name="stype" id="stype" value="b" <?php if($row['usertype']=='b'){ echo 'checked'; } ?> />Buyers
                    <input type="radio" name="stype" id="stype" style="margin-left:25px;" <?php if($row['usertype']=='s'){ echo 'checked'; } ?> value="s" />Sellers
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
				<input type="submit" name="submit" value="Submit"/>
        <button class="btn-default btn"><a href="index.php?p=users-list">Cancel</a></button>
			<!--	<a href="index.php?p=sellers-list"><button class="btn-default btn">Cancel</button></a> -->

			</div>
		</div>
	 </div>
								</form>

	<?php			}}	?>
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
if(!useredit.terms1.checked) {
alert("Please accept the Terms and Conditions");
return false;
}
return true;
}






 </script>
