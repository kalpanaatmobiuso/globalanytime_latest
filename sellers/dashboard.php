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
  //      alert(data);
    }
});
}
function fetch_select(s){
//alert(s);
var enqid = document.getElementById('enquiryid').value;
$.ajax({
    type: "GET",
    url: 'action-process.php?apage=enquiry&act=edt&status='+s+'&id='+enqid,
    success: function(data){
    alert(data);

        //alert(enqid);
    }
});
}



//});
</script>
<div class="col-md-12 graphs">
	   <div class="xs">
  	 <h3 style="padding-top:0px;">Enquiry<button class="btn-default btn" style="float:right;">Export</button>
     </h3>
     <?php if ($_SESSION['isadmin'] != '1')
		 {
			 $sql_user = "SELECT * FROM company_profile as c, user_profile as u where c.user_id = u.id and c.user_id =".$_SESSION['userid'];
			 $result_user = $conn->query($sql_user);
			 if ($result_user->num_rows > 0) {
		 ?>
  	<div class="bs-example4" data-example-id="contextual-table">

    <table class="table" id="dastable">
      <thead>
        <tr>
          <?php
       include('connect.php');
       if($_SESSION['isadmin'] !='1' && $_SESSION['stype'] =='b')
       {?>

<th>#</th>
<th>Company Name</th>
<th>Product Name</th>
 <th>Company Email</th>
 <th>Mobile no</th>
 <th>Message</th>
 <th>Date</th>
<th>Status</th>

  </tr>
<?php } ?>
      </thead>
      <tbody>
	  <?php
$wr;
if($_SESSION['isadmin'] != '1' && $_SESSION['stype'] =='b')
$wr = ' and  q.uid ='.$_SESSION['userid'];
//}else{
//$wr = '';
//}
//if($_SESSION['paid'] != '1' && $_SESSION['isadmin'] != '1' ){/
//$p = ' limit 0,30';
//}else{
$p = '';
//}
$sql = "SELECT * FROM `products` as p , `user_enquiry` as q, `company_profile` as c, `user_profile` as u WHERE
 p.pid = q.pid and p.comp_id = c.id and c.user_id = u.id ".$wr.$p;
//echo $sql;
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
	$i=1;
    while($row = $result->fetch_assoc()) {
$comn ='';
$comn = $row['company_name'];
	echo "<tr>";
	echo "<td>".$i."</td>";
 echo "<td>".$comn."</td>";
echo "<td>".$row["pro_name"]."</td>";
echo "<td>".$row["email"]."</td>";
	echo "<td>".$row["mobileno"]."</td>";
	echo "<td>".$row["messages"]."</td>";
	echo "<td>".$row["datetime"]."</td>";

  echo "<td>"?>
    <?php if ($row['status'] == 'Pending' || $row['status'] == 'pending' )
    {?>
    <form method="post" action="">
        <input type="hidden" id ="enquiryid" name="enquiryid" value="<?php echo $row['oid']; ?>">
        <select  data-id="<?php echo $row['oid']; ?>" class="status" name="status" size="1" onchange="fetch_select(this.value)">
            <option value="Pending" <?php if ($row['status'] == 'Pending' || $row['status'] == 'pending' ) echo "selected"; ?>>Pending</option>
            <option value="Done" <?php if ($row['status'] == 'Done' || $row['status'] == 'done' ) echo "selected"; ?>>Done</option>
        </select>
    </form>
 <?php  }
 else
  echo  $row["status"];

"</td>";
	//echo "<td class='noExl'><a href='index.php?p=enquiry-edit&oid=".$row['oid']."'>Edit</a> </td>";
        echo"</tr>";
		$i++;
}
} else {

    echo "0 results";
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
