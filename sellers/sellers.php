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

function fetch_select(val)
{
//alert(val);
   $.ajax({
     type: 'post',
     async: false,
     url: 'action-process.php?apage=company&act=user&id='+val,
     data: {
       get_option:val
     },
     success: function (response) {
        document.getElementById("user_id1").innerHTML="";
       if (jQuery.trim(response)== 'b' || jQuery.trim(response)== 'B')
       {
          document.getElementById("supplier_div").style.visibility = "hidden";
       }
       else  if (jQuery.trim(response)== 'T')
          {
            document.getElementById("user_id").value=0;
            document.getElementById("user_id1").innerHTML="Company already created for the selected user. Kindly link different user";
          }
          else
        document.getElementById("supplier_div").style.visibility = "visible";
    }
   });
}

</script>

 <div class="graphs">
	     <div class="xs">
	  	  <div class="tab-content">
						<div class="tab-pane active" id="horizontal-form">
						<fieldset><legend>General Information</legend></fieldset>
              <?php
              if( $_SESSION['isadmin'] == '1')
              {
              ?>
						<form class="form-horizontal" enctype="multipart/form-data" method="POST" onsubmit="return formValidation();" action="action-process.php?apage=company&act=ins">
                <div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Company Name</label>
									<div class="col-sm-8">
										<input type="text" class="form-control1" id="comp_name" name="comp_name" placeholder="Please enter company name. Mandatory field"><div id="comp_name1" style="font-size:15px;" ></div>
									</div>
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Compmany Address</label>
									<div class="col-sm-8">
										<input type="text" class="form-control1" id="comp_add" name="comp_add" placeholder="Please enter company address. Mandatory field"><div id="comp_add1"></div>
									</div>
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Company Phone Number</label>
									<div class="col-sm-8">
										<input type="text" class="form-control1" id="phoneno" name="phoneno" placeholder="Default Input"><div id="phoneno1"></div>
									</div>
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Mobile Number</label>
									<div class="col-sm-8">
										<input type="text" class="form-control1" id="mobileno" name="mobileno" placeholder="Default Input"><div id="mobileno1"></div>
									</div>
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Pin Code</label>
									<div class="col-sm-8">
										<input type="text" class="form-control1" id="pin_code" value="" name="pin_code" placeholder="Default Input"><div id="pin_code1"></div>
									</div>
								</div>
                <div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Email</label>
									<div class="col-sm-8">
										 <input type="text" class="form-control1" name="uemail" id="uemail"  placeholder="Default Input" /><div id="uemail1"></div>
									</div>
								</div>

                <div class="form-group">
                    <label for="focusedinput" class="col-sm-2 control-label">Linked User Profile</label>
                    <div class="col-sm-8">
                     <select name="user_id" id="user_id"  onchange="fetch_select(this.value);">
                     <option value="0">Select</option>
                     <?php
                     $sql_user = "SELECT * FROM user_profile where is_admin != '1'";
                     $result_user = $conn->query($sql_user);
                     if ($result_user->num_rows > 0) {
                while($row_user = $result_user->fetch_assoc()) {
                     ?>
                     <option value="<?php echo $row_user['id']; ?>"><?php echo $row_user['name'];?></option>

                     <?php } }?>
                     </select>

                     <div id="user_id1"></div>
                       <input type="hidden" id="sellertype" name="sellertype"/>

                    </div>
                  </div>
                  <div class="form-group" id ="supplier_div">
                <label for="focusedinput" class="col-sm-2 control-label">Suppliers</label>
                <div class="col-sm-8">
                  <?php
                  $sql_sup = "SELECT * FROM suppliers ";
                  $result_sup = $conn->query($sql_sup);
                  if ($result_sup->num_rows > 0) {
                    while($row1_sup = $result_sup->fetch_assoc()){
                 ?>
                 <input type="checkbox" id ="supplier_checkbox" name="suppliers[]"  value="<?php echo $row1_sup['name']; ?>"
                 />
                   <?php echo $row1_sup['name'];?> <br/>
                     <?php } ?>
                     <?php } ?>
                   </div>
               </div>
  <div id="supplier1"></div>
	<div class="panel-footer">
		<div class="row">
			<div class="col-sm-8 col-sm-offset-2">
				<input type="submit" name="submit" id="submit" value="Submit">
				<button class="btn-default btn"><a href="index.php?p=sellers-list">Cancel</a></button>
			</div>
		</div>
	 </div>
							</form>
                <?php      }
               	else {?>
                        <form class="form-horizontal" enctype="multipart/form-data" method="POST" onsubmit="return formValidation();" action="action-process.php?apage=company&act=ins">
                                <div class="form-group">
                                  <label for="focusedinput" class="col-sm-2 control-label">Company Name</label>
                                  <div class="col-sm-8">
                                    <input type="text" class="form-control1" id="comp_name" name="comp_name" placeholder="Please enter company name. Mandatory field"><div id="comp_name1" style="font-size:15px;" ></div>
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label for="focusedinput" class="col-sm-2 control-label">Compmany Address</label>
                                  <div class="col-sm-8">
                                    <input type="text" class="form-control1" id="comp_add" name="comp_add" placeholder="Please enter company address. Mandatory field"><div id="comp_add1"></div>
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label for="focusedinput" class="col-sm-2 control-label">Company Phone Number</label>
                                  <div class="col-sm-8">
                                    <input type="text" class="form-control1" id="phoneno" name="phoneno" placeholder="Default Input"><div id="phoneno1"></div>
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label for="focusedinput" class="col-sm-2 control-label">Mobile Number</label>
                                  <div class="col-sm-8">
                                    <input type="text" class="form-control1" id="mobileno" name="mobileno" placeholder="Default Input"><div id="mobileno1"></div>
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label for="focusedinput" class="col-sm-2 control-label">Pin Code</label>
                                  <div class="col-sm-8">
                                    <input type="text" class="form-control1" id="pin_code" value="" name="pin_code" placeholder="Default Input"><div id="pin_code1"></div>
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label for="focusedinput" class="col-sm-2 control-label">Email</label>
                                  <div class="col-sm-8">
                                     <input type="text" class="form-control1" name="uemail" id="uemail"  placeholder="Default Input" /><div id="uemail1"></div>
                                  </div>
                                </div>
                               <div id="user_id1"></div>
                                <input type="hidden" id="user_id" name="user_id" value ="<?php echo $_SESSION['userid']?>"/>
                               <input type="hidden" id="sellertype" name="sellertype"/>

                               <?php if ($_SESSION['stype'] != 'b')
                               { ?>
                                <div class="form-group" id ="supplier_div">
                                <label for="focusedinput" class="col-sm-2 control-label">Suppliers</label>
                                <div class="col-sm-8">
                                  <?php
                                  $sql_sup = "SELECT * FROM suppliers ";
                                  $result_sup = $conn->query($sql_sup);
                                  if ($result_sup->num_rows > 0) {
                                    while($row1_sup = $result_sup->fetch_assoc()){
                                 ?>
                                 <input type="checkbox" id ="supplier_checkbox" name="suppliers[]"  value="<?php echo $row1_sup['name']; ?>"
                                 />
                                   <?php echo $row1_sup['name'];?> <br/>
                                     <?php } ?>
                                     <?php } ?>
                                   </div>
                               </div>
                            <?php  } ?>
                               <div id="supplier1"></div>
                    <div class="panel-footer">
                    <div class="row">
                      <div class="col-sm-8 col-sm-offset-2">
                        <input type="submit" name="submit" id="submit" value="Submit">
                        <button class="btn-default btn"><a href="index.php?p=sellers-list">Cancel</a></button>
                      </div>
                    </div>
                   </div>
                 </form>
               <?php      }
                       ?>
          </div>
          </div>
          </div>
          </div>

<script type="text/javascript">

  function formValidation()
  {
    var comname = document.getElementById('comp_name').value;
    if (comname==""){
         //document.getElementById("comp_name1").innerHTML="Enter Company Name. Its a mandatory field";
     return false;
   }
   var comadd = document.getElementById('comp_add').value;
   if (comadd==""){
        //document.getElementById("comp_add1").innerHTML="Enter Add Name. Its a mandatory field";
    return false;
  }

  var phono = document.getElementById('phoneno').value;
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

   var userno =document.getElementById('user_id').value;
  if (userno == '0'){
   document.getElementById("user_id1").innerHTML="Please link valid user name ";
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
