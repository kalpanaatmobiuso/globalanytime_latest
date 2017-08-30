<?php
include('connect_file.php');
//print_r($_POST);
//if(isset($_POST['submit'])){
// echo "lll";
		$frm = $_POST['form_fil'];
		$to = $_POST['form_to'];
		$sid = $_POST['subid'];	
		   
	  $sql = "SELECT *  FROM products WHERE sid = ".$sid." AND pro_price >= ".$frm." AND pro_price <= ".$to."";
	//  echo $sql;
$result = $conn->query($sql);
						while($row = $result->fetch_array()) {
	    
			  $sql1 = "SELECT *  FROM user_profile WHERE id = ".$row['uid']; 
$result1 = $conn->query($sql1);
$oimg='';
	$pimg='';					
	while($row1 = $result1->fetch_array()) {			 
			 $oimg  = $row1['verified'];
			 $pimg  = $row1['paid'];
			 }
			 
	  ?>
	
        <div class="item  col-xs-4 col-lg-4" style="width: 270px;">
            <div class="thumbnail" style="border-style: solid; border-width: 1px;">
               <a href="productsDes.php?pid=<?php echo $row['pid']; ?>">			   
			 <?php  if($row['thumnail_url'] != ''){ ?>
			   
			    <img class="group list-group-image" width="300px" height="250px" src="sellers/products/<?php echo $row['uid']; ?>/<?php echo $row['thumnail_url']; ?> " alt="" /></a>
					<?php if($oimg == '1'){ ?>
				<img class="cornerimage" border="0" style="margin-right:15px;" src="images/tick.png" alt=""/>		
				<?php }}else{ ?>
				 <img class="group list-group-image" width="300px" height="250px" src="images/missing-image.jpg" alt="" /></a>
					<?php if($oimg == '1'){ ?>
				<img class="cornerimage" border="0" style="margin-right:15px;" src="images/tick.png" alt=""/>		
				<?php }} ?>
                <div class="caption">
                    <h4 class="group inner list-group-item-heading">
                        <a href="productsDes.php?pid=<?php echo $row['pid']; ?>"><?php echo $row['pro_name']; ?></a> </h4>
                    <!--<p class="group inner list-group-item-text">-->
                       <!-- <?php //echo $row['description']; ?></p>-->
                      <div class="row">
                        <div class="col-xs-12 col-md-6" style="width:100%;">
                            <p class="lead">
                                Rs. <?php echo $row['pro_price']; ?></p>
                        </div></div>
						<div class="row" style="min-height:40px;">
                        <div class="col-xs-12 col-md-6" style="width:100%;">
                            <p class="lead" style="margin:0px;">
							<?php 	
	$sql2 = "SELECT * FROM user_profile where id =".$row['uid'];
									 $result2 = $conn->query($sql2);									
						while($row2 = $result2->fetch_assoc()) {	
	
	echo $row2['company_name']; 
	 } ?>
                                </p>
                        </div></div>
						<div class="row">
						 <?php if($pimg == '1'){ ?>
						<img  border="0" style="margin-left:15px; float:left; width:75px;" src="images/SmallPaid.jpg" alt=""/>	
						 <?php } ?>
                        <div class="col-xs-12 col-md-6"  style="float:right;">
						<!--poup-->
						<!-- Trigger the modal with a button -->
<button type="button" style="width:100px;" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal<?php echo $row['pid'];  ?>">Enquiry</button>

<!-- Modal -->
<div id="myModal<?php echo $row['pid'];  ?>" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="popupContainer">
      <div class="popupHeader">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Enquiry</h4>
      </div>
      <div class="modal-body">
	  <form name="enq<?php  echo $row['pid'];   ?>" id="enq<?php  echo $row['pid'];   ?>" method="post" >
        <p>Product Name: <?php echo $row['pro_name']; ?></p>
		 <p>Name: <input type="text" name="ename" id="ename" value="" /></p>
		 <p>Address: <input type="text" name="eaddress" id="eaddress" value="" /></p>
		   <p>Mobile: <input type="text" name="emobile" id="emobile" value="" /></p>
		   <p>Email: <input type="text" name="eemail" id="eemail" value="" /></p>
		   <p>Message: <input type="text" name="emessage" id="emessage" value="" /></p>
		    
      </div>
      <div class="modal-footer">
	   <button type="submit" class="btn btn-default" onClick="sendDetails('<?php  echo $row['pid'];   ?>');" >OK</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
	  </form>
    </div>

  </div>
</div>
						<!--poup-->
                          
                        </div>
                    </div>
                </div>
            </div>
        </div>
      <?php } ?>


