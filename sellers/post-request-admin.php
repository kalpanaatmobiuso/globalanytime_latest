<script type="text/javascript">
//$("document").ready(function(){
function myDeleteFunction(s){
//alert(s);
$.ajax({
    type: "GET",
    url: 'action-process.php?apage=sub-category&act=del&sid='+s,
    success: function(data){
        alert(data);
    }
});
}
//});
</script>
<div class="col-md-12 graphs">
	   <div class="xs">
  	 <h3 style="padding-top:0px;">Post Request
</h3>
<?php if ($_SESSION['isadmin'] != '1')
{
  $sql_user = "SELECT * FROM company_profile as c, user_profile as u where c.user_id = u.id and c.user_id =".$_SESSION['userid'];
  $result_user = $conn->query($sql_user);
  if ($result_user->num_rows <= 0) { ?>
      <div>Please first create company profile to get access to this feature</div>
      <?php exit;
       }
  } ?>
  	<div class="bs-example4" data-example-id="contextual-table">
    <table class="table" id="subtable">
      <thead>
        <tr>
          <th>#</th>
		   <?php
	  include('connect.php');
  if ($_SESSION['isadmin'] =='1')
  {?>
    <th>Product Name</th>
    <th>Seller Comapny Name</th>
    <th>Email Id</th>
    <th>Mobile Number</th>
       <th>Message</th>
       <th>Buyer Name</th>
       <th>Buyer Company Name</th>
       <th>Email Id</th>
       <th>Mobile Number</th>
       <th>Date</th>
       <th>Status</th>
    <?php    if ($_SESSION['isadmin'] =='1') ?>
          <th>Action</th>
  <?php }
  else
  {?>
    <th>Product Name</th>
       <th>Message</th>
       <th>Buyer Name</th>
       <th>Buyer Company Name</th>
       <th>Email Id</th>
       <th>Mobile Number</th>
       <th>Date</th>
       <th>Status</th>
  <?php } ?>

        </tr>
      </thead>
      <tbody>
	  <?php
    $sql ="";
	if ($_SESSION['stype'] == 's' || $_SESSION['isadmin'] == '1')
  {

$sql = "SELECT p.pro_name, p.message, u.name, c.company_name, c.email , c.mobile, p.datetime, p.status FROM postrequest as p,
company_profile as c, user_profile as u where p.uid = u.id and u.id = c.user_id " ;
$result = $conn->query($sql);
 echo $sql;
$i=1;
  if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {

	echo "<tr>";
	echo "<td>".$i."</td>";
  echo "<td>".$row["pro_name"]."</td>";
  echo "<td>".$row["message"]."</td>";
	echo "<td>".$row["name"]."</td>";
  echo "<td>".$row["company_name"]."</td>";
  echo "<td>".$row["email"]."</td>";
  echo "<td>".$row["mobile"]."</td>";
	echo "<td>".$row["datetime"]."</td>";
	echo "<td>".$row["status"]."</td>";
  if ($_SESSION['isadmin'] =='1')
  {
    echo "<td class='noExl'><a href='index.php?p=post-request-edit&oid='>Edit</a> </td>";
    echo"</tr>";
  }
  echo"</tr>";
	$i++;
}
	}
}
  ?>
      </tbody>
    </table>

   </div>
	</div>
	<script type="text/javascript">
$(document).ready(function(){
     $('#subtable').dataTable().columnFilter();
});
$("button").click(function(){
  $("#subtable").table2excel({
  exclude: ".noExl",
   name: "Excel Document Name",
					filename: "UserEnquiry",
					fileext: ".xls"

  });
});
		</script>
