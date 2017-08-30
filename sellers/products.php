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
     url: 'action-process.php?apage=products&act=subcat&cid='+val,
     data: {
       get_option:val
     },
     success: function (response) {
	 //alert(response);
       document.getElementById("sub-category").innerHTML=response;
     }
   });
}

</script>
<!--<?php session_start(); ?>-->
 <div class="graphs">
	     <div class="xs">
		 <?php if(isset($_GET['pid'])){?>
  	       <h3 style="padding:0px;">Edit Products</h3>
		   <?php }else{ ?>
		    <h3 style="padding:0px;">Add Products</h3>
		   <?php } ?>
  	         <div class="tab-content">
						<div class="tab-pane active" id="horizontal-form">
						<fieldset><legend>General Information</legend>
					<?php	if(isset($_GET['pid'])){
              $sql = "SELECT * FROM products where pid = ".$_GET['pid'];
$result = $conn->query($sql);

if ($result->num_rows > 0) {
						while($row1 = $result->fetch_assoc()) {
						?>
						<form class="form-horizontal" enctype="multipart/form-data" method="POST" onSubmit="return formValidation();" action="action-process.php?apage=products&act=edt">
							<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Category</label>
									<div class="col-sm-8">
		                             <select name="category" id="category" onchange="fetch_select(this.value);">
									 <option value="0">Select</option>
									 <?php
									 $sql = "SELECT * FROM category ";
									 $result = $conn->query($sql);
									 if ($result->num_rows > 0) {
						while($row = $result->fetch_assoc()) {
									 ?>
									 <option <?php if($row1['cid']==$row['cid']){echo "selected";} ?> value="<?php echo $row['cid']; ?>"><?php echo $row['name'];?></option>

									 <?php } }?>
									 </select>
									</div>

								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Sub Category</label>
									<div class="col-sm-8">
		                             <select name="sub-category" id="sub-category">
									 <option value="0">select</option>
									 <?php
									 $sql = "SELECT * FROM sub_category ";
									 $result = $conn->query($sql);
									 if ($result->num_rows > 0) {
						while($row = $result->fetch_assoc()) {
									 ?>
									 <option <?php if($row1['sid']==$row['sid']){echo "selected";} ?> value="<?php echo $row['sid']; ?>"><?php echo $row['sname'];?></option>

									 <?php } }?>
									 </select>
									</div>

								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Product Name</label>
									<div class="col-sm-8">
										<input type="text" class="form-control1" id="pro-name" name="pro-name" value="<?php echo stripslashes($row1['pro_name']);  ?>" placeholder="Default Input">
									</div>
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Permalink</label>
									<div class="col-sm-8">
										<input type="text" class="form-control1" id="pro-permalink" name="pro-permalink" value="<?php echo $row1['pro_permalink'];  ?>" placeholder="Default Input">
                    <input type="hidden"  id="pro-code" value="<?php echo $row1['pro_code'];  ?>" name="pro-code" >
                  </div>
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Product price</label>
									<div class="col-sm-8">
										<input type="text" class="form-control1" id="pro-price" value="<?php echo $row1['pro_price'];  ?>" name="pro-price" placeholder="Enter Product Price. Its a mandatory field">
                  <div id="pro-price1" style= "font-size:12px;" ></div>
                  </div>
								</div>
                <div class="form-group">
                <label for="focusedinput" class="col-sm-2 control-label">Supplier Type</label>
                <div class="col-sm-8">
                <?php
                $sql_comp = "SELECT * FROM company_profile where id = ".$row1['comp_id'];
                $result_comp = $conn->query($sql_comp);
                if ($result_comp->num_rows > 0)
                {
                 while($row1_comp = $result_comp->fetch_assoc())
                 {
                  $comp_supid = $row1_comp['supplier'];
                  $prd_supid =  $row1['supplier_id'];
                  $compArray = $prdArray ="";
                  if ($comp_supid != "")
                  {
                      $compArray = explode(',',$comp_supid);
                  }else {?>
                    <div style= "font-size:12px;" >Supplier Type not defined. Kindly update company detail.</div>
                <?php  }
                  if ($prd_supid != "")
                  {
                      $prdArray = explode(',',$prd_supid);
                  }
                    $num_comp = count ($compArray);
                    $num_prd = count ($prdArray);
                    $i=$j=0; $bPresent=false;
                    while($i <= $num_comp-1 )
                    {
                      if (!empty($compArray[$i]))
                      {
                        $bPresent = false;
                        $j=0;
                        while ($j <= $num_prd-1 )
                        {
                          if (!empty ($prdArray[$j]) and $compArray[$i]==$prdArray[$j])
                          {
                            $bPresent = true;
                            break;
                          }
                          else
                          {
                        //    echo $prdArray[$j];
                            $j++;
                          }

                  //while
                        }?>
                        <input type="checkbox" name="suppliers[]"  value="<?php echo $compArray[$i]; ?>"
                         <?php if($bPresent) { echo 'checked'; } ?> />
                          <?php echo $compArray[$i];?> <br/>
                <?php }
                      $i++;
                    } //outer while loop
                  }// fetching while
              }?>
              </div>
              </div>
            		<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Upload Thumbnail Image</label>
									<div class="col-sm-8">
										<input type="file" class="form-control1" id="imgThumToUpload" name="imgThumToUpload" placeholder="Default Input">
                    <input type="hidden" name="imgThumToUpload1" id ="imgThumToUpload1" value="<?php echo $row1['thumnail_url']; ?>" />
                  </div>
								</div>
                <div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Upload Image</label>
									<div class="col-sm-8">
										<input type="file" name="imgToUpload[]" multiple="" />('Please select all images at one time upload.(by pressing ctrl)')
                    <input type="hidden" name="imgToUpload1" value="<?php echo $row1['img_url']; ?>" />
                	</div>
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Description</label>
									<div class="col-sm-8">

								<textarea name="content" class="form-control1" id="content" name="content" style="width: 100%; background-color:#fff;">
<?php echo stripslashes($row1['pro_content']);  ?></textarea>
									</div>
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Video Name</label>
									<div class="col-sm-8">
										<input type="text" value="<?php echo stripslashes($row1['video_name']);  ?>" class="form-control1" name="video_name" id="video_name" placeholder="Default Input">
									</div>
								</div>
									<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Video Url</label>
									<div class="col-sm-8">
										<input type="text" value="<?php echo stripslashes($row1['video_url']);  ?>" class="form-control1" name="video_url" id="video_url" placeholder="Default Input">
									</div>
								</div>
								<div class="form-group">
								<legend style="margin-left:50px; font-size:15px;">
								following meta title and keywords is for SEO.
								</legend>
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Meta Title</label>
									<div class="col-sm-8">
										<input type="text" class="form-control1" name="meta-title" id="meta-tile" value="<?php echo stripslashes($row1['meta_title']);  ?>" placeholder="Default Input">
									</div>
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Keywords</label>
									<div class="col-sm-8">

										<input type="text" class="form-control1" name="keyword" value="<?php echo stripslashes($row1['keyword']);  ?>" id="keyword" placeholder="Default Input">
									</div>
								</div>

								<input type="hidden" id="pid" name="pid" value="<?php echo $_GET['pid']; ?>" />
                  <input type="hidden"  id="compid" name="compid" value ="<?php echo $row1['comp_id']; ?>" />
								<div class="panel-footer">
		<div class="row">
			<div class="col-sm-8 col-sm-offset-2">
        <input type="submit" name="submit" id="submit" value="Submit">
				<button class="btn-default btn"><a href="index.php?p=products-list">Cancel</a></button>

			</div>
		</div>
	 </div>
								</form>

						<?php }}}else{ ?>
							<form class="form-horizontal" enctype="multipart/form-data" method="POST" action="action-process.php?apage=products&act=ins">
							<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Category</label>
									<div class="col-sm-8">
		               <select name="category" id="category" onchange="fetch_select(this.value);">
									 <option value="0">Select</option>
									 <?php
									 $sql = "SELECT * FROM category ";
									 $result = $conn->query($sql);
									 if ($result->num_rows > 0) {
						while($row = $result->fetch_assoc()) {
									 ?>
									 <option value="<?php echo $row['cid']; ?>"><?php echo $row['name'];?></option>

									 <?php } }?>
									 </select>
									</div>

								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Sub Category</label>
									<div class="col-sm-8">
		                             <select name="sub-category" id="sub-category">
									 <option value="0">select</option>
									 <?php
									 $sql = "SELECT * FROM category ";
									 $result = $conn->query($sql);
									 if ($result->num_rows > 0) {
						while($row = $result->fetch_assoc()) {
									 ?>
									 <option value="<?php echo $row['cid']; ?>"><?php echo $row['name'];?></option>

									 <?php } }?>
									 </select>
									</div>
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Product Name</label>
									<div class="col-sm-8">
										<input type="text" class="form-control1" id="pro-name" name="pro-name" placeholder="Default Input">
									</div>
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Permalink</label>
									<div class="col-sm-8">
										<input type="text" class="form-control1" id="pro-permalink" name="pro-permalink" placeholder="Default Input">
                  </div>
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Product price</label>
									<div class="col-sm-8">
										<input type="text" class="form-control1" id="pro-price" name="pro-price" placeholder="Default Input">
                    <div id="pro-price1" style= "font-size:15px;" ></div>
                  </div>
								</div>
                <div class="form-group">
                <label for="focusedinput" class="col-sm-2 control-label">Supplier Type</label>
                <div class="col-sm-8">
                  <?php
                  if($_SESSION['isadmin'] != '1' && $_SESSION['stype'] =='s' )
            			 {
            			 $sql_comp = "SELECT * from company_profile where user_id = ".$_SESSION['userid'];
            			 $comp_id ='';
            			   $result_comp = $conn->query($sql_comp);
            			   if ($result_comp->num_rows > 0) {
            			       while($row_comp = $result_comp->fetch_assoc()) {
            			          $compid= $row_comp['id'];
            								$comppincode= $row_comp['id'];
            								$supplierid= $row_comp['supplier'];
            			       }
            			   }
            			 }?>
                   <?php
                   if (isset($compid) && isset($comppincode))
                    {?>
                    <input type="hidden"  id="compid" name="compid" value ="<?php echo $compid; ?>" />
                    <?php   $date = date('Y-m-dH:i:s');
                      //echo $date;
                      ?>
                   <input type="hidden"  id="pro-code" name="pro-code" value ="<?php echo "PRD".$compid.$comppincode.$date; ?>" />
                 <?php } ?>
                 <?php if (isset($supplierid))
                 {
                   //echo         $supplierid;
                   $supArray = explode(',',$supplierid);
                   $i=0;
                   if ( !empty ($supArray ))
                  {
                       $num = count ($supArray);
                      // echo $num;
                       while($i <= $num-1 ) {?>
                        <?php if (!empty($supArray[$i]))
                        {?>
                      <input type="checkbox" name="suppliers[]"  value="<?php echo $supArray[$i]; ?>"
                         />
                         <?php echo $supArray[$i]; ?>
                      <?php } ?>
                        <?php $i++; ?>
                    <?php   }
                  }
                 }?>
                   </div>
               </div>

               <div class="form-group">
                 <label for="focusedinput" class="col-sm-2 control-label">Upload Thumbnail Image</label>
                 <div class="col-sm-8">
                   <input type="file" class="form-control1" id="thumb-img" name="imgThumToUpload" placeholder="Default Input">
                  <input type="hidden"  name="imgThumToUpload1" />
                 </div>
               </div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Upload Image</label>
									<div class="col-sm-8">
										<input type="file" name="imgToUpload[]" multiple="" />('Please select all images at one time upload.(by pressing ctrl)')
                    <input type="hidden"  name="imgToUpload1" />
									</div>
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Description</label>
									<div class="col-sm-8">

									<textarea name="content" class="form-control1" id="content" style="width: 100%; background-color:#fff;">
</textarea>

									</div>
								</div>
									<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Video Name</label>
									<div class="col-sm-8">
										<input type="text" value="" class="form-control1" name="video_name" id="video_name" placeholder="Default Input">
									</div>
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Video Url</label>
									<div class="col-sm-8">
										<input type="text" value=" " class="form-control1" name="video_url" id="video_url" placeholder="Default Input">
									</div>
								</div>
								<div class="form-group">
								<legend style="margin-left:50px; font-size:15px;">
								following meta title and keywords is for SEO.
								</legend>
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Meta Title</label>
									<div class="col-sm-8">
										<input type="text" value=" " class="form-control1" name="meta-title" id="meta-tile" placeholder="Default Input">
									</div>
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Keywords</label>
									<div class="col-sm-8">
										<input type="text" class="form-control1" name="keyword" id="keyword" placeholder="Default Input">
									</div>
								</div>

								<div class="panel-footer">
		<div class="row">
			<div class="col-sm-8 col-sm-offset-2">
				<input type="submit" name="submit" id="submit" value="Submit">
				<button class="btn-default btn"><a href="index.php?p=products-list">Cancel</a></button>

			</div>
		</div>
	 </div>
								</form>
								<?php } ?>
								</fieldset>
								</div>
								</div>
								</div>
								</div>

<script type="text/javascript">
function formValidation()
{
//  alert('dd');
  var prdname = document.getElementById('pro-name').value;
  if (prdname==""){
      document.getElementById("pro-name").innerHTML="Enter Product Name. Its a mandatory field";
   return false;
 }
 var prdprice = document.getElementById('pro-price').value;
 if (isNaN(prdprice)){
 document.getElementById("pro-price1").innerHTML="Enter Numeric value only ";
 return false;
}
 //alert (imagename);
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
