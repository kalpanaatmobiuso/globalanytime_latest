<script type="text/javascript">

//$("document").ready(function(){

function myDeleteFunction(s){

//alert(s);

$.ajax({

    type: "GET",

    url: 'action-process.php?apage=sellers&act=del&sid='+s,

    success: function(data){

        alert(data);

    }

});

}

//});



</script>



<div class="col-md-12 graphs">

	   <div class="xs">

  	 <h3 style="padding-top:0px;">Users List
       <!--<button class="btn-default btn" style="float:right;">Export</button>-->
       <a href="index.php?p=users" style="float:right;">Add </a> &nbsp;&nbsp;&nbsp;&nbsp;
</h3>

  	<div class="bs-example4" data-example-id="contextual-table">

    <table class="table" id="selltable">

      <thead>

        <tr>

          <th>#</th>
          <th>Name</th>
 <th>Login Name</th>
            <th colspan="2" class="noExl">Action</th>



        </tr>

      </thead>

      <tbody>

	  <?php

	  include('connect.php');
ob_start();
//session_start();

	  $sql = "SELECT * FROM `user_profile` ";

$result = $conn->query($sql);



if ($result->num_rows > 0) {

    // output data of each row

	$i=1;

    while($row = $result->fetch_assoc()) {

	echo "<tr>";

	echo "<td>".$i."</td>";
//echo "<td>".$row["name"]."</td>";
	echo "<td>".$row["name"]."</td>";
	echo "<td>".$row["loginname"]."</td>";

	echo "<td class='noExl'><a href=index.php?p=users-edit&sid=".$row["id"].">Edit</a> | <a href='' onclick='myDeleteFunction(".$row["id"].");'>Delete</a></td>";

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

   </div>
	</div>
	<script type="text/javascript">
$(document).ready(function(){
     $('#subtable').dataTable().columnFilter();
});
$("button").click(function(){
  $("#selltable").table2excel({
  exclude: ".noExl",
   name: "Excel Document Name",
					filename: "SellersList",
					fileext: ".xls"

  });
});
		</script>
