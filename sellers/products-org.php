
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
<?php session_start(); ?>
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
						//echo "edit";
						$sql = "SELECT * FROM products where pid = ".$_GET['pid'];
$result = $conn->query($sql);

if ($result->num_rows > 0) {
						while($row1 = $result->fetch_assoc()) {
						?>


						<form class="form-horizontal" enctype="multipart/form-data" method="POST" action="action-process.php?apage=products&act=edt">
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
									<label for="focusedinput" class="col-sm-2 control-label">Name</label>
									<div class="col-sm-8">
										<input type="text" class="form-control1" id="pro-name" name="pro-name" value="<?php echo stripslashes($row1['pro_name']);  ?>" placeholder="Default Input">
									</div>

								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Permalink</label>
									<div class="col-sm-8">
										<input type="text" class="form-control1" id="pro-permalink" name="pro-permalink" value="<?php echo $row1['pro_permalink'];  ?>" placeholder="Default Input">
									</div>
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Product Code</label>
									<div class="col-sm-8">
										<input type="text" class="form-control1" id="pro-code" value="<?php echo $row1['pro_code'];  ?>" name="pro-code" placeholder="Default Input">
									</div>
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Product price</label>
									<div class="col-sm-8">
										<input type="text" class="form-control1" id="pro-price" value="<?php echo $row1['pro_price'];  ?>" name="pro-price" placeholder="Default Input">
									</div>
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Pin Code</label>
									<div class="col-sm-8">
										<input type="text" class="form-control1" id="pin-code" value="<?php echo $row1['pincode'];  ?>" name="pin-code" placeholder="Default Input">
									</div>
								</div>

									<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Suppliers</label>
									<div class="col-sm-8">

									 <?php
									 $sql = "SELECT * FROM suppliers ";
									 $result = $conn->query($sql);
									 if ($result->num_rows > 0) {
									 $i=1;
						while($row = $result->fetch_assoc()) {
                          $myArray = explode(',', $row1['supplier']);

									 ?>
									<input type="checkbox" name="suppliers[]"   value="<?php echo $row['id']; ?>" <?php if($row['id']==$myArray[$i]){ echo 'checked'; } ?> /><?php echo $row['name'];?><br/>

									 <?php $i++; } }?>

									</div>
								</div>v vcxz


								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Upload Thumbnail Image</label>
									<div class="col-sm-8">
										<input type="file" class="form-control1" id="thumb-img" name="thumb-img" placeholder="Default Input">
									</div>
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Upload Image</label>
									<div class="col-sm-8">
										<input type="file" name="pro-img[]" multiple="" />
										<input type="hidden" name="pro-img1" value="<?php echo $row1['img_url'];  ?>" />
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
								<div class="panel-footer">
		<div class="row">
			<div class="col-sm-8 col-sm-offset-2">
				<input type="submit" name="submit" id="submit" value="submit"/>
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
									<label for="focusedinput" class="col-sm-2 control-label">Name</label>
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
									<label for="focusedinput" class="col-sm-2 control-label">Product Code</label>
									<div class="col-sm-8">
										<input type="text" class="form-control1" id="pro-code" name="pro-code" placeholder="Default Input">
									</div>
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Product price</label>
									<div class="col-sm-8">
										<input type="text" class="form-control1" id="pro-price" name="pro-price" placeholder="Default Input">
									</div>
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Pin Code</label>
									<div class="col-sm-8">
										<input type="text" class="form-control1" id="pin-code" value="" name="pin-code" placeholder="Default Input">
									</div>
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Suppliers</label>
									<div class="col-sm-8">

									 <?php
									 $sql = "SELECT * FROM suppliers ";
									 $result = $conn->query($sql);
									 if ($result->num_rows > 0) {
									 $i=1;
						while($row1 = $result->fetch_assoc()) {
                         // $myArray = explode(',', $row['supplier']);

									 ?>
									<input type="checkbox" name="suppliers[]"   value="<?php echo $row1['sid']; ?>" /><?php echo $row1['name'];?><br/>

									 <?php $i++; } }?>

									</div>
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Upload Thumbnail Image</label>
									<div class="col-sm-8">
										<input type="file" class="form-control1" id="thumb-img" name="thumb-img" placeholder="Default Input">
									</div>
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Upload Image</label>
									<div class="col-sm-8">
										<input type="file" name="pro-img[]" multiple="" />('Please select all images at one time upload.(by pressing ctrl)')
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
