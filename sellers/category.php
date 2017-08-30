 <div class="graphs">

	     <div class="xs">

  	       <h3>Add Category</h3>

  	         <div class="tab-content">

						<div class="tab-pane active" id="horizontal-form">

						<fieldset><legend>General Information</legend>

						<?php

						include('connect.php');

						if(isset($_GET['cid'])){

						//echo "edit";

						$sql = "SELECT * FROM category where cid = ".$_GET['cid'];

$result = $conn->query($sql);



if ($result->num_rows > 0) {

						while($row = $result->fetch_assoc()) {

						?>

						<form class="form-horizontal" method="POST" enctype="multipart/form-data" action="action-process.php?apage=category&act=edt">

								<div class="form-group">

									<label for="focusedinput" class="col-sm-2 control-label">Name</label>

									<div class="col-sm-8">

										<input type="text" class="form-control1" name="cat-name" id="cat-name" placeholder="Default Input" value="<?php echo $row['name']; ?>">

									</div>



								</div>



								<div class="form-group">

									<label for="focusedinput" class="col-sm-2 control-label">Category Description</label>

									<div class="col-sm-8">

										<input type="text" class="form-control1" name="cat-des" id="cat-des" value="<?php echo $row['cat_description']; ?>" placeholder="Default Input">

									</div>

								</div>

								<div class="form-group">

									<label for="focusedinput" class="col-sm-2 control-label">Upload Thumbnail Picture</label>

									<div class="col-sm-8">

										<input type="file" name="imgThumToUpload" value="" id="imgThumToUpload">
<input type="hidden" name="imgThumToUpload1" value="<?php echo $row['thumbnail_img']; ?>" />
									</div>

								</div>

								<div class="form-group">

									<label for="focusedinput" class="col-sm-2 control-label">Upload Image</label>

									<div class="col-sm-8">

										<input type="file" name="imgToUpload" value="<?php echo $row['img_url']; ?>" id="imgToUpload">

									</div>

								</div>
								<?php
                            ob_start();
//session_start();
if($_SESSION['isadmin'] == '1'){

?>
                                <div class="form-group">

									<label for="focusedinput" class="col-sm-2 control-label">View Front Page</label>

									<div class="col-sm-8">

										<input type="checkbox" name="frontp" <?php if($row['frontp'] == '1'){ echo 'checked'; }  ?> value="1"></input>
									</div>

								</div>
<?php } ?>
								<input type="hidden" id="cid" name="cid" value="<?php echo $_GET['cid']; ?>" />

								 <div class="panel-footer">

		<div class="row">

			<div class="col-sm-8 col-sm-offset-2">

				<input type="submit" name="submit" value="Submit">

				<button class="btn-default btn"><a href="index.php?p=category-list">Cancel</a></button>




			</div>

		</div>

	 </div>

								</form>



	<?php			}}





						}else{

						?>

							<form class="form-horizontal" method="POST" enctype="multipart/form-data" action="action-process.php?apage=category&act=ins">

								<div class="form-group">

									<label for="focusedinput" class="col-sm-2 control-label">Name</label>

									<div class="col-sm-8">

										<input type="text" class="form-control1" name="cat-name" id="cat-name" placeholder="Default Input">

									</div>



								</div>



								<div class="form-group">

									<label for="focusedinput" class="col-sm-2 control-label">Category Description</label>

									<div class="col-sm-8">

										<input type="text" class="form-control1" name="cat-des" id="cat-des" placeholder="Default Input">

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
								<?php
                            ob_start();
//session_start();
if($_SESSION['isadmin'] == '1'){

?>
								<div class="form-group">

									<label for="focusedinput" class="col-sm-2 control-label">View Front Page</label>

									<div class="col-sm-8">

										<input type="checkbox" name="frontp" value="1"></input>
									</div>

								</div>

						<?php } ?>

								 <div class="panel-footer">

		<div class="row">

			<div class="col-sm-8 col-sm-offset-2">



				<input type="submit" name="submit" value="Submit">

				<button class="btn-default btn"><a href="index.php?p=category-list">Cancel</a></button>


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
