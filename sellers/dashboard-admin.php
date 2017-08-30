<?php
@ob_start();
//session_start();
?>
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

var enqid = document.getElementById('enquiryid').value;
$.ajax({
    type: "GET",
    url: 'action-process.php?apage=enquiry&act=edt&status='+s+'&id='+enqid,
    success: function(data){
      alert(data);
    }
});
}
//});
</script>
<div class="col-md-12 graphs">
	   <div class="xs">
  	 <h3 style="padding-top:0px;">Enquiry<button class="btn-default btn" style="float:right;">Export</button>
</h3>

  	<div class="bs-example4" data-example-id="contextual-table">

    <table class="table" id="dastable">
      <thead>
        <tr>
          <?php
       include('connect.php');
       if($_SESSION['isadmin'] =='1')
       {?>

<th>#</th>
<th>Company Name</th>
<th>Product Name</th>
<th>Seller Name</th>
<th>Buyer Company Name</th>
 <th>Buyer Name</th>
 <th>Message</th>
 <th>Date</th>
<th>Status</th>
  </tr>
<?php } ?>
      </thead>
      <tbody>
	  <?php
$wr;

$p = '';
//}
$sql = "SELECT * FROM `products` as p , `user_enquiry` as q, `company_profile` as c, `user_profile` as u WHERE
 p.pid = q.pid and p.comp_id = c.id and c.user_id = u.id ";
//echo $sql;
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
	$i=1;
    while($row = $result->fetch_assoc()) {
	$sql1 = "SELECT * FROM `company_profile` as c, `user_profile` as u WHERE c.user_id = u.id and c.user_id = ".$row['uid'];
$result1 = $conn->query($sql1);
//echo count($result1->fetch_assoc());
$compname = $buyername= '';
if ($result1->num_rows > 0) {
while($row1 = $result1->fetch_assoc()) {
$compname = $row1['company_name'];
$buyername = $row1["name"];
}
}
	echo "<tr>";

	echo "<td>".$i."</td>";
echo "<td>".$row["company_name"]."</td>";
echo "<td>".$row["pro_name"]."</td>";
echo "<td>".$row["name"]."</td>";
echo "<td>".$compname."</td>";
echo "<td>".$buyername."</td>";
	echo "<td>".$row["messages"]."</td>";
	echo "<td>".$row["datetime"]."</td>";
  echo "<td>"?>

    <form method="post" action="">
        <input type="hidden" id ="enquiryid" name="enquiryid" value="<?php echo $row['oid']; ?>">
        <select  data-id="<?php echo $row['oid']; ?>" class="status" name="status" size="1" onchange="fetch_select(this.value)">
            <option value="Pending" <?php if ($row['status'] == 'Pending' || $row['status'] == 'pending' ) echo "selected"; ?>>Pending</option>
            <option value="Done" <?php if ($row['status'] == 'Done' || $row['status'] == 'done' ) echo "selected"; ?>>Done</option>
        </select>
    </form>
<?php
      echo "</td>";
        echo"</tr>";
		$i++;
    }

} else {
//echo "<tr>";

    echo "0 results";
 // echo"</tr>";

}
	  ?>
      </tbody>
    </table>

   </div>
	</div>
	<script type="text/javascript">
$(document).ready(function(){
     $('#dastable').dataTable().columnFilter();
});
$("button").click(function(){
  $("#dastable").table2excel({
  exclude: ".noExl",
   name: "Excel Document Name",
					filename: "UserEnquiry",
					fileext: ".xls"

  });
});
		</script>
