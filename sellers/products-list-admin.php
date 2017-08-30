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

<?php if ($_SESSION['isadmin'] == '1')
{ ?>
       <a href="index.php?p=products-admin" style="float:right;">Add </a> &nbsp;&nbsp;&nbsp;&nbsp; <a href="index.php?p=productsimport" style=" float:right; padding-right:30px;">Import</a>&nbsp;&nbsp;&nbsp;&nbsp;</h3>
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
          <th>Company Name</th>
          <th>User Name</th>
          <th>Product Name</th>
          <th>Product Code</th>
          <th>Price</th>
          <th  class="noExl">Action</th>
        </tr>
      </thead>
      <tbody>
<?php
include('connect.php');

$sqlProd = "SELECT pid,cid,sid,pro_name,pro_code,pro_price,c.company_name,u.name FROM products p, company_profile c, user_profile u
 where u.id = c.user_id and c.id = p.comp_id";
 //echo $sqlProd;
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
    echo "<td>".$rowPrd['company_name']."</td>";
    echo "<td>".$rowPrd['name']."</td>";
    echo "<td>".$rowPrd['pro_name']."</td>";
    echo "<td>".$rowPrd['pro_code']."</td>";
    echo "<td>".$rowPrd['pro_price']."</td>";
  	echo "<td><a href='index.php?p=products-admin&pid=".$rowPrd['pid']."'>Edit</a> | <a href='' onclick='myDeleteFunction(".$rowPrd['pid'].");'>Delete</a></td>";
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
