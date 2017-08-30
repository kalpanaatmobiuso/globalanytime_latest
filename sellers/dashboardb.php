
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
  	 <h3 style="padding-top:0px;">Enquiry
</h3>
<?php if ($_SESSION['isadmin'] != '1')
{
  $sql_user = "SELECT * FROM company_profile as c, user_profile as u where c.user_id = u.id and c.user_id =".$_SESSION['userid'];
  $result_user = $conn->query($sql_user);
  if ($result_user->num_rows > 0) {
?>
  	<div class="bs-example4" data-example-id="contextual-table">

    <table class="table" id="subtable">

      <thead>

        <tr>

          <th>#</th>
		   <?php

	  include('connect.php');
//ob_start();
//session_start();

?>
<th>Product Name</th>
<th>Buyer Name</th>
  <th>Date</th>
  <th>Status</th>
          <th class="noExl">Action</th>
               </tr>

      </thead>

      <tbody>

	  <?php

	  $sql = "SELECT * FROM `products` as p , `user_enquiry` as u ,
    `company_profile` c  WHERE c.id = p.comp_id and u.pid = p.pid and u.status !='Done' and c.user_id =".$_SESSION['userid'];
//echo $sql;
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    // output data of each row

	$i=1;

    while($row = $result->fetch_assoc()) {

	echo "<tr>";

	echo "<td>".$i."</td>";
	//if($_SESSION['isadmin'] == '1'){
 $sql1 = "SELECT * FROM user_profile  WHERE id = ".$row['uid'];

$result1 = $conn->query($sql1);
$buyername ="";
 while($row1 = $result1->fetch_assoc()) {
$buyername = $row1['name'];
//}
}
echo "<td>".$row["pro_name"]."</td>";
	echo "<td>".$buyername."</td>";
	echo "<td>".$row["datetime"]."</td>";
  echo "<td>".$row["status"]."</td>";
	echo "<td class='noExl'><a href=index.php?p=enquiry-view&oid=".$row["oid"].">View</a> </td>";

        echo"</tr>";

		$i++;

    }

} else {
echo "<tr>";

    echo "<td>0 results</td>";
  echo"</tr>";

}
	  ?>
      </tbody>
    </table>
  <?php }
  else
  {?>
    <div>Please first create company profile to get access to this feature</div>
  <?php	}} ?>
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
