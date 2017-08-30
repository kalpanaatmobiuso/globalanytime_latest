<script type="text/javascript">

//$("document").ready(function(){

function myDeleteFunction(s){
$.ajax({
    type: "GET",
  url: 'action-process.php?apage=products&act=del&pid='+s,
        success: function(data){
        alert(data);
    }
});
}
</script>

<div class="col-md-12 graphs">
	   <div class="xs">
  	 <h3 style="padding-top:0px;">List of Produts
       <?php // first find the linked company id for the current user_id
       $compid ='';
       if($_SESSION['isadmin'] != '1' && $_SESSION['stype'] =='s' )
        {
        $sql_comp = "SELECT * from company_profile where user_id = ".$_SESSION['userid'];
          $result_comp = $conn->query($sql_comp);
          if ($result_comp->num_rows > 0) {
              while($row_comp = $result_comp->fetch_assoc()) {
                 $compid= $row_comp['id'];
                 $compname = $row_comp ['company_name'];
                 $comppincode= $row_comp['id'];
               $supplierid= $row_comp['supplier'];
             }
           }
         else
         { ?>
             <div>Please first create company profile to get access to this feature</div>
          <?php    exit;
         }
       }
if ($_SESSION['isadmin'] != '1' && $compid !="")
{ ?>
       <a href="index.php?p=products" style="float:right;">Add </a> &nbsp;&nbsp;&nbsp;&nbsp; <a href="index.php?p=productsimport" style=" float:right; padding-right:30px;">Import</a>&nbsp;&nbsp;&nbsp;&nbsp;</h3>
<?php
} ?>
</h3>

<div class="bs-example4" data-example-id="contextual-table">
    <table class="table" id="selltable">
      <thead>
        <tr>
          <th>#</th>
          <th>Category</th>
          <th>Sub-Category</th>
          <th>Product Name</th>
          <th>Product Code</th>
          <th>Price</th>
          <th colspan="2" class="noExl">Action</th>
        </tr>
      </thead>
      <tbody>
<?php
include('connect.php');
if($_SESSION['isadmin'] != '1' && $compid !="" ){
$wr = ' where comp_id ='.$compid;
}else{
$wr = '';
}

$sqlProd = "SELECT pid,cid,sid,pro_name,pro_code,pro_price FROM products".$wr;
$resultPrd = $conn->query($sqlProd);
if ($resultPrd->num_rows > 0) {
	$i=1;
while($rowPrd = $resultPrd->fetch_assoc()) {
//fetch category detail
  $sqlCat = "SELECT name FROM category where cid = ".$rowPrd['cid'];
  $resultCat = $conn->query($sqlCat);
    if ($resultCat->num_rows > 0) {
    while($rowCat = $resultCat->fetch_assoc()) {
      $cname = $rowCat['name'];
    }
  }
  else{
    $cname = "--";
  }

  $sqlsbCat = "SELECT sname FROM sub_category where sid = ".$rowPrd['sid'];
  $resultsbct = $conn->query($sqlsbCat);
  if ($resultsbct->num_rows > 0)
  {
    while($rowsbcat = $resultsbct->fetch_assoc()) {
      $sname = $rowsbcat['sname'];
    }
  }else{
      $sname = "--";
  }
  	echo "<tr>";
  	echo "<td>".$i."</td>";
    echo "<td>".$cname."</td>";
    echo "<td>".$sname."</td>";
    echo "<td>".$rowPrd['pro_name']."</td>";
    echo "<td>".$rowPrd['pro_code']."</td>";
    echo "<td>".$rowPrd['pro_price']."</td>";
  	echo "<td><a href='index.php?p=products&pid=".$rowPrd['pid']."'>Edit</a> | <a href='' onclick='myDeleteFunction(".$rowPrd['pid'].");'>Delete</a></td>";
    echo"</tr>";
  		$i++;
    }
}//prd if close
else {
    echo "<tr>";
    echo "<td>0 results</td>";
    echo"</tr>";
}
?>
 </tbody>
</table>
 </div>
</div>

<script type="text/javascript">
$(document).ready(function(){
     $('#selltable').dataTable().columnFilter();
});

</script>
