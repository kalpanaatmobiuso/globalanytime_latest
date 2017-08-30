 <div class="graphs">
	     <div class="xs">
  	       <h3>Add Sub-Category</h3>
  	         <div class="tab-content">
						<div class="tab-pane active" id="horizontal-form">
						<fieldset><legend>General Information</legend>
						<?php
						include('connect.php'); 
						if(isset($_GET['sid'])){ 
						//echo "edit";
						$sql = "SELECT * FROM sub_category where sid = ".$_GET['sid'];
$result = $conn->query($sql);
if ($result->num_rows > 0) {
						while($row = $result->fetch_assoc()) {
						?>
						<form class="form-horizontal" enctype="multipart/form-data" method="POST" action="action-process.php?apage=sub-category&act=edt">

						<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Category</label>
									<div class="col-sm-8">
		                             <select name="category" id="category">
									 <?php 
									 $sql = "SELECT * FROM category ";
									 $result = $conn->query($sql);
									 if ($result->num_rows > 0) {
									 while($row1 = $result->fetch_assoc()) {										 

									 ?>
									 <option <?php if($row['cid']== $row1['cid']) { echo 'selected'; }?> value="<?php echo $row1['cid']; ?>"><?php echo $row1['name'];?></option>

									 <?php } }?>
									 </select>
									</div>								

								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Name</label>
									<div class="col-sm-8">
										<input type="text" class="form-control1" name="sub-name" id="sub-name" placeholder="Default Input" value="<?php echo $row['sname']; ?>">
									</div>								</div>

								
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Content</label>
									<div class="col-sm-8">
										<input type="text" class="form-control1" name="sub-des" id="sub-des" value="<?php echo $row['description']; ?>" placeholder="Default Input">
									</div>
								</div>

								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Upload Thumbnail Picture</label>
									<div class="col-sm-8">
										<input type="file" name="imgThumToUpload" id="imgThumToUpload">
<input type="hidden" name="imgThumToUpload1" value="<?php echo $row['thumb_img']; ?>" />
									</div>
								</div>

								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Upload Image</label>
									<div class="col-sm-8">
										<input type="file" name="imgToUpload"  id="imgToUpload">
									</div>
								</div>

								<input type="hidden" id="sid" name="sid" value="<?php echo $_GET['sid']; ?>" />
								 <div class="panel-footer">
		<div class="row">
			<div class="col-sm-8 col-sm-offset-2">
				<input type="submit" name="submit" id="submit" value="Submit">
				<button class="btn-default btn"><a href="index.php?p=sub-category-list">Cancel</a></button>
			</div>
		</div>
	 </div>
								</form>						

	<?php			}}					

						}else{

						?>
							<form class="form-horizontal" method="POST" enctype="multipart/form-data" action="action-process.php?apage=sub-category&act=ins">
							<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Category</label>
									<div class="col-sm-8">
		                             <select name="category" id="category">
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
										<input type="text" class="form-control1" name="sub-name" id="sub-name" placeholder="Default Input">
									</div>
								</div>							

								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Content</label>
									<div class="col-sm-8">
										<input type="text" class="form-control1" name="sub-des" id="sub-des" placeholder="Default Input">
									</div>
								</div>

								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Upload Thumbnail Picture</label>
									<div class="col-sm-8">
										<input type="file" name="imgThumToUpload" id="imgThumToUpload">
									</div>
								</div>

								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Upload Image</label>
									<div class="col-sm-8">
										<input type="file" name="imgToUpload" id="imgToUpload">
									</div>
								</div>							

								 <div class="panel-footer">
		<div class="row">
			<div class="col-sm-8 col-sm-offset-2">
				<input type="submit" name="submit" value="Submit">
				<a href="index.php?p=sub-category-list"><button class="btn-default btn">Cancel</button></a>
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

				