  <script type="text/javascript" src="http://js.nicedit.com/nicEdit-latest.js"></script> <script type="text/javascript">
//<![CDATA[
        bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
		jQuery("#testa").css("background-color:#fff");
		jQuery("#description").css("background-color:#fff");
  //]]>

  function hideCategory()
  {
    document.getElementById("category").style.visibility = "hidden";
  }
  function showCategory()
  {
    document.getElementById("category").style.visibility = "visible";
  }

  </script>


 <div class="graphs">
	     <div class="xs">

  	         <div class="tab-content">
						<div class="tab-pane active" id="horizontal-form">
						<fieldset>
						<?php
						include('connect.php');

						if(isset($_GET['pid']) && $_GET['pid'] == 'hs' )
            {
              if($_GET['act'] =="edt")
              {
                $sql = "SELECT * FROM homeslider ";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                while($rowSlider = $result->fetch_assoc()) {
                //  if ($rowSlider['cid'] == '0' )
                  //  echo "hideCategory()";
           ?>

						<legend>Edit  Slider</legend>

						<form class="form-horizontal" method="POST" enctype="multipart/form-data" onSubmit="return formValidation();" action="action-process.php?apage=homeslider&act=edt">
              <div class="form-group">
                  <label for="focusedinput" class="col-sm-2 control-label">Type of slider</label>
                  <div class="col-sm-8">
                    <input type="radio" <?php if( $rowSlider['slidertype'] == 'h' ){echo "checked";} ?> name="flag" id="flag" value="h"  onchange="hideCategory()"/>Home Page
                    <input type="radio" <?php if( $rowSlider['slidertype'] == 'c' ){echo "checked";} ?> name="flag" id="flag" style="margin-left:25px;" value="c" onchange="showCategory()"/>Sub-Category Page
                  </div>
                  <div id = "flag1" ></div>
                  <input type="hidden" id ="id" name ="id"  value ="<?php echo $rowSlider['id'] ?>"/>
                </div>
                <div class="form-group">
                <?php if( $rowSlider['slidertype'] == 'c' )
                { ?>
  									<label for="focusedinput" class="col-sm-2 control-label">Category</label>
  									<div class="col-sm-8">
  		               <select name="category" id="category" >
  									 <option value="0">Select</option>
  									 <?php
  									 $sql = "SELECT * FROM category ";
  									 $result = $conn->query($sql);
  									 if ($result->num_rows > 0) {
  						while($row = $result->fetch_assoc()) {
  									 ?>
  									 <option <?php if( $row['cid'] == $rowSlider['cid'] ){echo "selected";} ?> value="<?php echo $row['cid']; ?>"><?php echo $row['name'];?></option>
  									 <?php } }?>
  									 </select>
  									</div>
                  <?php }
                  else { ?>
                    <input type="hidden" id="category" name="category" value="0"/>
              <?php    } ?>
                  </div>
                <div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Image1</label>
									<div class="col-sm-8">
										<input type="file" class="form-control1" id="img1" name="img1" placeholder="Default Input">
                    <input type="hidden" name="imgToUpload1" id ="imgToUpload1" value="<?php echo $rowSlider['img1']; ?>" />
                    <div id ="uploadimage"></div>
									</div>
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Image2</label>
									<div class="col-sm-8">
										<input type="file" class="form-control1" id="img2" name="img2" placeholder="Default Input">
									</div>
								</div>
							<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Image3</label>
									<div class="col-sm-8">
										<input type="file" class="form-control1" id="img3" name="img3" placeholder="Default Input">
									</div>
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Image4</label>
									<div class="col-sm-8">
										<input type="file" class="form-control1" id="img4" name="img4" placeholder="Default Input">
									</div>
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Image5</label>
									<div class="col-sm-8">
										<input type="file" class="form-control1" id="img5" name="img5" placeholder="Default Input">
									</div>
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Image6</label>
									<div class="col-sm-8">
										<input type="file" class="form-control1" id="img6" name="img6" placeholder="Default Input">
									</div>
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Image7</label>
									<div class="col-sm-8">
										<input type="file" class="form-control1" id="img7" name="img7" placeholder="Default Input">
									</div>
								</div>
							<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Image8</label>
									<div class="col-sm-8">
										<input type="file" class="form-control1" id="img8" name="img8" placeholder="Default Input">
									</div>
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Image9</label>
									<div class="col-sm-8">
										<input type="file" class="form-control1" id="img9" name="img9" placeholder="Default Input">
									</div>
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Image10</label>
									<div class="col-sm-8">
										<input type="file" class="form-control1" id="img10" name="img10" placeholder="Default Input">
									</div>
								</div>
								 <div class="panel-footer">
		<div class="row">
			<div class="col-sm-8 col-sm-offset-2">
        <input type="submit" name="submit" value="Submit"/>
				<button class="btn-default btn"><a href="index.php?p=HomeSliderList">Cancel</a></button>

			</div>
		</div>
	 </div>
								</form>
          <?php     }}}else { ?>

            <legend>Add Slider</legend>

						<form class="form-horizontal" method="POST" onSubmit="return formValidation();" enctype="multipart/form-data" action="action-process.php?apage=homeslider&act=ins">
              <div class="form-group">
                  <label for="focusedinput" class="col-sm-2 control-label">Type of slider</label>
                  <div class="col-sm-8">
                    <?php $sqltype ="select * from homeslider where slidertype ='h' ";
                    $resulttype = $conn->query($sqltype);
                    if ($resulttype->num_rows > 0) {?>
                      <input type="radio" <?php {echo "checked";} ?> name="flag" id="flag" style="margin-left:25px;" value="c" onchange="showCategory()"/>Sub-Category Page
                    <?php } else { ?>
                      <input type="radio" <?php {echo "checked";} ?> name="flag" id="flag" value="h"  onchange="hideCategory()"/>Home Page
                      <input type="radio" name="flag" id="flag" style="margin-left:25px;" value="c" onchange="showCategory()"/>Sub-Category Page
                    <?php } ?>
                  </div>

                </div>
                <div class="form-group">

  									<label for="focusedinput" class="col-sm-2 control-label">Category</label>
  									<div class="col-sm-8">
  		               <select name="category" id="category" >
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
                    <div id = "category1"></div>
  								</div>
                <div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Image1</label>
									<div class="col-sm-8">
										<input type="file" class="form-control1" id="img1" name="img1" placeholder="Default Input">
                    <div id ="uploadimage"></div>
                  </div>
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Image2</label>
									<div class="col-sm-8">
										<input type="file" class="form-control1" id="img2" name="img2" placeholder="Default Input">
									</div>
								</div>
							<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Image3</label>
									<div class="col-sm-8">
										<input type="file" class="form-control1" id="img3" name="img3" placeholder="Default Input">
									</div>
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Image4</label>
									<div class="col-sm-8">
										<input type="file" class="form-control1" id="img4" name="img4" placeholder="Default Input">
									</div>
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Image5</label>
									<div class="col-sm-8">
										<input type="file" class="form-control1" id="img5" name="img5" placeholder="Default Input">
									</div>
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Image6</label>
									<div class="col-sm-8">
										<input type="file" class="form-control1" id="img6" name="img6" placeholder="Default Input">
									</div>
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Image7</label>
									<div class="col-sm-8">
										<input type="file" class="form-control1" id="img7" name="img7" placeholder="Default Input">
									</div>
								</div>
							<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Image8</label>
									<div class="col-sm-8">
										<input type="file" class="form-control1" id="img8" name="img8" placeholder="Default Input">
									</div>
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Image9</label>
									<div class="col-sm-8">
										<input type="file" class="form-control1" id="img9" name="img9" placeholder="Default Input">
									</div>
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Image10</label>
									<div class="col-sm-8">
										<input type="file" class="form-control1" id="img10" name="img10" placeholder="Default Input">
									</div>
								</div>
								 <div class="panel-footer">
		<div class="row">
			<div class="col-sm-8 col-sm-offset-2">
				<input type="submit" name="submit" value="Submit"/>
				<button class="btn-default btn"><a href="index.php?p=HomeSliderList">Cancel</a></button>
			</div>
		</div>
	 </div>
								</form>
    <?php      }

  }else{if(isset($_GET['pid'])){?>
               <h3 style="padding-top:0px;">Edit page</h3>
						//echo "edit";
						<?php $sql = "SELECT * FROM pages where pid = ".$_GET['pid'];
$result = $conn->query($sql);

if ($result->num_rows > 0) {
						while($row = $result->fetch_assoc()) {
						?>
						<form class="form-horizontal" method="POST" enctype="multipart/form-data" action="action-process.php?apage=pages&act=edt">
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Title</label>
									<div class="col-sm-8">
										<input type="text" readonly class="form-control1" name="cat-name" id="cat-name" placeholder="Default Input" value="<?php echo $row['title']; ?>">
									</div>
								</div>

								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Description</label>
									<div class="col-sm-8">
											<textarea name="content" class="form-control1" id="content" name="content" style="width: 100%; background-color:#fff;">
<?php echo $row['pag_content']; ?></textarea>
									</div>
								</div>

								<input type="hidden" id="pid" name="pid" value="<?php echo $_GET['pid']; ?>" />
								 <div class="panel-footer">
		<div class="row">
			<div class="col-sm-8 col-sm-offset-2">
				<input type="submit" name="submit" value="Submit"/>
				<button class="btn-default btn">Cancel</button>

			</div>
		</div>
	 </div>
								</form>

	<?php			}}}	}?>



								</fieldset>
								</div>
								</div>
								</div>
								</div>

<script>
function formValidation()
{
  //alert('dd');
  var flag = document.getElementById('flag').value;
  var cat = document.getElementById('category').value;
//  alert (flag);
  if (flag== "c" && cat=="0"){
  //  alert(cat);
       document.getElementById("category1").innerHTML="Please select valie category name. Its a mandatory field";
  //alert("error") ;
   return false;
}

var img1 = document.getElementById('img1').value;
if (img1 =="")
{
  document.getElementById("uploadimage").innerHTML="Please select image to upload. Its a mandatory field";
  //alert("error") ;
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
