<script type="text/javascript">

//$("document").ready(function(){

function myDeleteFunction(s){

//alert(s);

$.ajax({

    type: "GET",

    url: 'action-process.php?apage=category&act=del&cid='+s,

    success: function(data){

        alert(data);

    }

});

}

//});



</script>



<div class="col-md-12 graphs">

	   <div class="xs">

  	 <h3 style="padding-top:0px;">Category <a href="index.php?p=category" style=" float:right;">Add </a></h3>

  	<div class="bs-example4" data-example-id="contextual-table">

    <table class="table" id="cattable">

      <thead>

        <tr>

          <th>#</th>

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
	 $sql = "SELECT cid,name FROM category".$wr;

$result = $conn->query($sql);



if ($result->num_rows > 0) {

    // output data of each row

	$i=1;

    while($row = $result->fetch_assoc()) {

	echo "<tr>";

	echo "<td>".$i."</td>";

	echo "<td>".$row["name"]."</td>";

	echo "<td><a href=index.php?p=category&cid=".$row["cid"].">Edit</a> | <a href='' onclick='myDeleteFunction(".$row["cid"].");'>Delete</a></td>";

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
     $('#cattable').dataTable().columnFilter();
});

		</script>
