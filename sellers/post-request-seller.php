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

function fetch_select(s){
//alert(s);
var reqid = document.getElementById('requestid').value;
$.ajax({
    type: "GET",
    url: 'action-process.php?apage=request&act=edt&status='+s+'&id='+reqid,
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
       <th>Message</th>
       <th>Buyer Name</th>
       <th>Buyer Company Name</th>
       <th>Email Id</th>
       <th>Mobile Number</th>
       <th>Date</th>
       <th>Status</th>

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
 //echo $sql;
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

  if ($_SESSION['isadmin'] =='1')
  {echo "<td>"?>

    <form method="post" action="">
        <input type="hidden" id ="requestid" name="requestid" value="<?php echo $row['id']; ?>">
        <select  data-id="<?php echo $row['id']; ?>" class="status" name="status" size="1" onchange="fetch_select(this.value)">
            <option value="Pending" <?php if ($row['status'] == 'Pending' || $row['status'] == 'pending' ) echo "selected"; ?>>Pending</option>
            <option value="Done" <?php if ($row['status'] == 'Done' || $row['status'] == 'done' ) echo "selected"; ?>>Done</option>
        </select>
    </form>
<?php
      echo "</td>";
  }
  else {
 echo "<td>".$row["status"]."</td>";
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
