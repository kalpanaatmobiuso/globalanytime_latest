 <div class="graphs">
	     <div class="xs">
  	       <h3 style="padding:0px;">Enquiry</h3>
  	         <div class="tab-content">
						<div class="tab-pane active" id="horizontal-form">
						<fieldset><legend>Edit Enquiry</legend>
						<?php
						include('connect.php');
						//session_start();

						$sql = "SELECT * FROM `products` as p , user_enquiry as u WHERE p.pid = u.pid and oid = ".$_GET['oid'];
$result = $conn->query($sql);

if ($result->num_rows > 0) {
						while($row = $result->fetch_assoc()) {
						?>
						<form class="form-horizontal" method="POST" enctype="multipart/form-data" onSubmit="return formValidation();"  action="action-process.php?apage=editenquiry&act=edt">
						<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Product Name</label>
									<div class="col-sm-8">
									<input type="text" class="text"  name="pro_name" id="pro_name" readonly="true" value="<?php echo $row['pro_name']; ?>"  >
									</div>

								</div>
					<?php
//session_start();

if($_SESSION['isadmin'] == '1'){
				?>


								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Name</label>
									<div class="col-sm-8">
									<input type="text" class="text"  name="name" id="name" value="<?php echo $row['name']; ?>"  >
									</div>

								</div>
									<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Address</label>
									<div class="col-sm-8">
										<textarea  name="address" class="form-control1" id="address" value="" ><?php echo $row['address']; ?></textarea>
									</div>
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Mobile no</label>
									<div class="col-sm-8">
										<input type="text" class="text" class="form-control1" name="mobileno" id="mobileno" value="<?php echo $row['mobileno']; ?>" maxlength="12" >
									<div id="mobileno1"></div></div>
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Email</label>
									<div class="col-sm-8">
										 <input type="text" value="<?php echo $row['email']; ?>" class="text" name="email" id="email" ><div id="email1"></div>
									</div>
								</div>

								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Messages</label>
									<div class="col-sm-8">
										<textarea  name="messages" class="form-control1" id="messages" value="" ><?php echo $row['messages']; ?></textarea>
									</div>
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Datetime</label>
									<div class="col-sm-8">
										<input type="text" readonly value="<?php echo $row['datetime']; ?>" class="text" name="datetime" id="datetime" >
									</div>
								</div>
							<?php } else{ ?>

								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Name </label>
									<div class="col-sm-8">
									<input type="text" class="text"  name="name" id="name" readonly value="<?php echo $row['name']; ?>"  >
									</div>

								</div>
									<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Address</label>
									<div class="col-sm-8">
										<textarea  name="address" class="form-control1" readonly id="address" value="" ><?php echo $row['address']; ?></textarea>
									</div>
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Mobile no</label>
									<div class="col-sm-8">
										<input type="text" class="text" class="form-control1"  readonly name="mobileno" id="mobileno" value="<?php echo $row['mobileno']; ?>" maxlength="12" >
									</div>
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Email</label>
									<div class="col-sm-8">
										 <input type="text" value="<?php echo $row['email']; ?>" readonly class="text" name="email" id="email" >
									</div>
								</div>

								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Messages</label>
									<div class="col-sm-8">
										<textarea  name="messages" class="form-control1" id="messages" readonly value="" ><?php echo $row['messages']; ?></textarea>
									</div>
								</div>
							<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Datetime</label>
									<div class="col-sm-8">
										<input type="text" readonly value="<?php echo $row['datetime']; ?>" class="text" name="datetime" id="datetime" >
									</div>
								</div>
							<?php } ?>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Status</label>
									<div class="col-sm-8">
										<select name="status" id="status">
										<option value="">Select</option>
										<option value="pending">Pending</option>
										<option value="Done">Done</option>
										</select>
									</div>
								</div>

								<input type="hidden" id="oid" name="oid" value="<?php echo $_GET['oid']; ?>" />
								 <div class="panel-footer">
		<div class="row">
			<div class="col-sm-8 col-sm-offset-2">
				<input type="submit" name="submit" value="Submit">
				<button class="btn-default btn"><a href="index.php?p=dashboard">Cancel</a></button>

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
//alert('hh');
var x= document.getElementById('email').value;
var mob = document.getElementById('mobileno').value;
var atposition=x.indexOf("@");
var dotposition=x.lastIndexOf(".");
//alert(x);
if (atposition<1 || dotposition<atposition+2 || dotposition+2>=x.length){
  document.getElementById("email1").innerHTML= "Please enter a valid e-mail address ";
  return false;
  }else if (isNaN(mob)){
  document.getElementById("mobileno1").innerHTML="Enter Numeric value only";
  return false;
}
  return true;
}
</script>
