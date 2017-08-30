 <div class="graphs">
	     <div class="xs">
  	       <h3 style="padding-top:5px;">Edit Profile</h3>
  	         <div class="tab-content">
						<div class="tab-pane active" id="horizontal-form">
						<!--<fieldset><legend>Edit Profile</legend>-->
						<?php
						include('connect.php');

						$sql = "SELECT * FROM company_profile where id = ".$_GET['sid'];
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
						while($row = $result->fetch_assoc()) {
						?>
						<form class="form-horizontal" method="POST" enctype="multipart/form-data" onSubmit="return formValidation();" action="action-process.php?apage=company&act=edt&ad=1">
					     <div class="form-group">
                  <label for="focusedinput" class="col-sm-2 control-label">Company Name</label>
                  <div class="col-sm-8">
                    <input type="text" class="text" class="form-control1" name="comp_name" id="comp_name" value="<?php echo $row['company_name']; ?>"  /><div id="comp_name1"></div>
                      <input type="hidden" id="id" name="id" value="<?php echo $_GET['sid']; ?>" />
                  </div>
                </div>
                <div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Company Address</label>
									<div class="col-sm-8">
										<!--<textarea name="comaddress" class="form-control1" id="comaddress" <?php echo $row['company_address']; ?> </textarea><div id="comaddress1"></div>-->
                      <input type="text" class="text" class="form-control1" name="comp_add" id="comp_add" value="<?php echo $row['company_address']; ?>"  /><div id="comp_add1"></div>
									</div>
								</div>
                <div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Compnay Phone No</label>
									<div class="col-sm-8">
										<input type="text" class="text" name="phoneno" class="form-control1" id="phoneno" value="<?php echo $row['phoneno']; ?>" maxlength="12" /><div id="phoneno1"></div>
									</div>
								</div>
                <div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Mobile no</label>
									<div class="col-sm-8">
										<input type="text" class="text" class="form-control1" name="mobileno" id="mobileno" value="<?php echo $row['mobile']; ?>" maxlength="12" /><div id="mobileno1"></div>
									</div>
								</div>
                <div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Pincode</label>
									<div class="col-sm-8">
                      <input type="text" class="text" class="form-control1" name="pin_code" id="pin_code" value="<?php echo $row['pincode']; ?>"  /><div id="pin_code1"></div>
									</div>
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Email</label>
									<div class="col-sm-8">
										 <input type="text" value="<?php echo $row['email']; ?>" class="text" name="uemail" id="uemail" /><div id="uemail1"></div>
									</div>
								</div>
                <?php if ($_SESSION['isadmin'] == '1')
                { ?>
                    <label for="focusedinput" class="col-sm-2 control-label">Linked User Profile</label>
                    <div class="form-group">
                    <div class="col-sm-8">
                     <select name="user_id" id="user_id"  onchange="fetch_select(this.value);">
                     <option value="0">Select</option>
                     <?php
                     $sql_user = "SELECT * FROM user_profile where is_admin != '1'";
                     $result_user = $conn->query($sql_user);
                     if ($result_user->num_rows > 0) {
                while($row_user = $result_user->fetch_assoc()) {
                     ?>
                     <option <?php if ($row_user['id'] == $row['user_id']) { echo  "selected" ;}?> value="<?php echo $row_user['id']; ?>"><?php echo $row_user['name'];?></option>
                     <?php } }?>
                     </select>
                    </div>
                    <div id="user_id1"></div>
                     <input type="hidden" id="sellertype" name="sellertype"/>
                  </div>
              <?php  }
              else
              { ?>
                  <input type="hidden" id="user_id" name="user_id" value="<?php echo $row['user_id']; ?>" />
            <?php  } ?>
                <?php
                $sql_user = "SELECT * FROM user_profile  where id = ".$row['user_id'];
                $result_user = $conn->query($sql_user);
                $userType = '';
                if ($result_user->num_rows > 0) {
                  while($row_user = $result_user->fetch_assoc()){
                    $userType = $row_user['usertype'];
                  }
                }?>



              <?php  if (rtrim($userType) == 's' || rtrim($userType) == 'S')
                {?>
                  <div class="form-group">
                  <label for="focusedinput" class="col-sm-2 control-label">Supplier</label>
                  <div class="col-sm-8">
                    <?php
    $sql_sup = "SELECT * FROM suppliers ";
    $result_sup = $conn->query($sql_sup);
    if ($result_sup->num_rows > 0) {
   while($row1_sup = $result_sup->fetch_assoc()){
   $myArray = explode(',', $row['supplier']);
   $i=0;
          if ( !empty ($myArray ))
          {
            $num = count ($myArray);
            $bPresent = false;
           while($i <= $num-1 ) {
             if (!empty ($myArray[$i]) && $row1_sup['name']==$myArray[$i])
             {
               $bPresent = true;
             }
            $i++;
           }
           ?>
         <input type="checkbox" name="suppliers[]"  value="<?php echo $row1_sup['name']; ?>"
          <?php if($bPresent) { echo 'checked'; } ?> />
           <?php echo $row1_sup['name'];?> <br/>

     <?php    }
       }
     }?>
									</div>
								</div>
            <?php  } ?>

								 <div class="panel-footer">
		<div class="row">
			<div class="col-sm-8 col-sm-offset-2">
				<input type="submit" name="submit" value="Submit"/>
        <button class="btn-default btn"><a href="index.php?p=sellers-list">Cancel</a></button>
			<!--	<a href="index.php?p=sellers-list"><button class="btn-default btn">Cancel</button></a> -->

			</div>
		</div>
	 </div>
								</form>

	<?php			}}	?>
							<!--	</fieldset>-->
								</div>
								</div>
								</div>
								</div>
				<script type="text/javascript">

function formValidation()
{
  var comname = document.getElementById('comp_name').value;
  if (comname==""){
       document.getElementById("comp_name1").innerHTML="Enter Company Name. Its a mandatory field";
   return false;
 }
 var comadd = document.getElementById('comp_add').value;
 if (comadd==""){
      document.getElementById("comp_add1").innerHTML="Enter Compnay Add. Its a mandatory field";
  return false;
}

var phono = document.getElementById('phoneno').value;
if (phono==""){
     document.getElementById("phoneno1").innerHTML="Enter Phone number. Its a mandatory field";
 return false;
}
if (isNaN(phono)){
   document.getElementById('phoneno').value="";
 document.getElementById("phoneno1").innerHTML="Enter Numeric value only";
 return false;
}

var mob = document.getElementById('mobileno').value;
if (isNaN(mob)){
document.getElementById('mobileno').value="";
document.getElementById("mobileno1").innerHTML="Enter Numeric value only";
return false;
}

var pincode = document.getElementById('pin_code').value;
if (isNaN(pincode)){
 document.getElementById('pin_code').value="";
document.getElementById("pin_code1").innerHTML="Enter Numeric value only";
return false;
}
  var x= document.getElementById('uemail').value;
  var atposition=x.indexOf("@");
  var dotposition=x.lastIndexOf(".");
  if (atposition<1 || dotposition<atposition+2 || dotposition+2>=x.length){
   document.getElementById("uemail1").innerHTML= "Please enter a valid e-mail address ";
   return false;
 }
   return true;
}


 </script>
