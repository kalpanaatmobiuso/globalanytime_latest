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
  	 <h3 style="padding-top:0px;">Pages</h3>
  	<div class="bs-example4" data-example-id="contextual-table">
    <table class="table">
      <thead>
        <tr>
          <th>#</th>
          <th>Title</th>
          <th colspan="2">Action</th>

        </tr>
      </thead>
      <tbody>

	  <?php
	  include('connect.php');
	  $sql = "SELECT * FROM pages";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
	$i=2;
    while($row = $result->fetch_assoc()) {
	echo "<tr>";
	echo "<th>".$i."</th>";
	echo "<th>".$row["title"]."</th>";
	echo "<th><a href=index.php?p=pages&pid=".$row["pid"].">Edit</a> </th>";
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
