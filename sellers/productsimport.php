
 
<?php session_start(); 




?>
 <div class="graphs">
	     <div class="xs">		 
  	       <h3 style="padding-top:0px;">Import Products</h3>		  
  	         <div class="tab-content">
						<div class="tab-pane active" id="horizontal-form">
						<fieldset>
						 <?php if(isset($_GET['e'])){?>
  	     Sorry, some problem while uploading a file.
		   <?php } ?>
								<form name="import" method="post" enctype="multipart/form-data" action="action-process.php?apage=productsimport">
<input type="file" name="file" /><br />
<input type="submit" name="submit" value="Submit" />
</form>


<div><br/><br/>
Note for uploading file :<br/>
1. It must be csv file with comma separated.<br/>
2. It must contain following format.
  <table class="table" id="selltable">

      <thead>

        <tr>

          <th>Name</th>
<th>Permalink</th>
          <th>Code</th>
 <th>Price</th>
  <th>Content</th>
      <th>Video Name</th>
<th>Video Url</th>
          <th>Meta Title</th>
 <th>Meta Keyword</th>
  <th>Meta Description</th>    
<th>Uid</th>   
          

        </tr>
</thead>
</table><br/>
Download table format <button class="btn-default btn" style="float:right;">Download</button>
</div>
								</fieldset>
								</div>
								</div>
								</div>
								</div>
	<script type="text/javascript">

$("button").click(function(){
  $("#selltable").table2excel({
  exclude: ".noExl",
   name: "Excel Document Name",
					filename: "products",
					fileext: ".xls"
					
  }); 
});
		</script>						