<script type="text/javascript">

//$("document").ready(function(){

function myDeleteFunction(s){

//alert(s);

$.ajax({

    type: "GET",

    url: 'action-process.php?apage=company&act=del&sid='+s,

    success: function(data){

        alert(data);

    }

});

}

//});



</script>



<div class="col-md-12 graphs">

	   <div class="xs">

  	 <h3 style="padding-top:0px;">Company List
       <?php
        $compid ='';
       if($_SESSION['isadmin'] != '1'  )
        {
        $sql_comp = "SELECT * from company_profile where user_id = ".$_SESSION['userid'];
          $result_comp = $conn->query($sql_comp);
          if ($result_comp->num_rows > 0) {
              while($row_comp = $result_comp->fetch_assoc()) {
                 $compid= $row_comp['id'];
              }
          }
        }
        if ($compid == '')
        {?>
          <a href="index.php?p=sellers" style="float:right;">Add</a> &nbsp;&nbsp;&nbsp;&nbsp;
      <?php  }
        ?>



</h3>

  	<div class="bs-example4" data-example-id="contextual-table">

    <table class="table" id="selltable">
    <?php if ($_SESSION['isadmin'] =='1')
    {?>
      <thead>
        <tr>
          <th>#</th>
          <th>Email</th>
          <th>Mobile no</th>
          <th>Company Name</th>
          <th>Name</th>
          <th  class="noExl">Action</th>
        </tr>
      </thead>
    <?php }
    else { ?>
      <thead>
        <tr>
          <th>#</th>
          <th>Email</th>
          <th>Mobile no</th>
          <th>Company Name</th>
          <th  class="noExl">Action</th>
        </tr>
      </thead>
  <?php  } ?>
      <tbody>
	  <?php
	  include('connect.php');
  if ($_SESSION['isadmin'] == '1')
  {
   $sql = "SELECT c.id,c.email,c.mobile,c.company_name,u.name FROM `company_profile` as c , `user_profile` as u where u.id = c.user_id  ";
  }
  else
   {
      $sql = "SELECT * FROM `company_profile` where  user_id = ".$_SESSION['userid'] ;
   }
$result = $conn->query($sql);
if ($result->num_rows > 0) {
	$i=1;
  while($row = $result->fetch_assoc()) {
	echo "<tr>";

	echo "<td>".$i."</td>";

	echo "<td>".$row["email"]."</td>";
	echo "<td>".$row["mobile"]."</td>";
	echo "<td>".$row["company_name"]."</td>";
  if($_SESSION['isadmin'] == '1')
echo "<td>".$row["name"]."</td>";
  echo "<td class='noExl'><a href=index.php?p=sellers-edit&sid=".$row["id"].">Edit</a> | <a href='' onclick='myDeleteFunction(".$row["id"].");'>Delete</a></td>";
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
     $('#selltable').dataTable().columnFilter();
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
