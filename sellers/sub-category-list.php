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

  	 <h3 style="padding-top:0px;">Sub Category<a href="index.php?p=sub-category" style=" float:right;">Add </a></h3>

  	<div class="bs-example4" data-example-id="contextual-table">

    <table class="table" id="subtable">

      <thead>

        <tr>

          <th>#</th>

          <th>Sub Category Name</th>
 <th>Category Name</th>
          <th colspan="2">Action</th>



        </tr>

      </thead>

      <tbody>

	  <?php

	  include('connect.php');
ob_start();
//session_start();
$wr;

if($_SESSION['isadmin'] != '1'){
$wr = ' where uid ='.$_SESSION['userid'];
}else{
$wr = '';
}
	  $sql = "SELECT * FROM sub_category".$wr;

$result = $conn->query($sql);



if ($result->num_rows > 0) {

    // output data of each row

	$i=1;

    while($row = $result->fetch_assoc()) {

	echo "<tr>";

	echo "<td>".$i."</td>";

	echo "<td>".$row["sname"]."</td>";

	 $sql1 = "SELECT * FROM category where cid =".$row['cid'];

$result1 = $conn->query($sql1);
if ($result->num_rows > 0) {
	 while($row1 = $result1->fetch_assoc()) {

	echo "<td>".$row1["name"]."</td>";
   }}else{

   echo "<td>--</td>";
   }
	echo "<td><a href=index.php?p=sub-category&sid=".$row["sid"].">Edit</a> | <a href='' onclick='myDeleteFunction(".$row["sid"].");'>Delete</a></td>";

        echo"</tr>";

		$i++;

    }

} else {

    echo "0 results";

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

		</script>
