<script type="text/javascript">

//$("document").ready(function(){

function myDeleteFunction(s){

//alert(s);

$.ajax({

    type: "GET",

    url: 'action-process.php?apage=homeslider&act=del&id='+s,

    success: function(data){

        alert(data);

    }

});

}


</script>

<div class="col-md-12 graphs">

	   <div class="xs">

  	 <h3 style="padding-top:0px;">Sliders List

        <a href="index.php?p=pages&pid=hs&act=ins" style="float:right;">Add</a> &nbsp;&nbsp;&nbsp;&nbsp;
</h3>

  	<div class="bs-example4" data-example-id="contextual-table">

    <table class="table" id="selltable">

      <thead>
        <tr>
          <th>#</th>
          <th>Type of Slider</th>
          <th>Category Id</th>
          <th>Category Name</th>
          <th>Image 1</th>
          <th>Image 2</th>
          <th>Image 3</th>
          <th>Image 4</th>
          <th  class="noExl">Action</th>
        </tr>
      </thead>
        <tbody>
	  <?php
	  include('connect.php');
  //if ($_SESSION['isadmin'] == '1')
  {
   $sql = "SELECT * FROM `homeslider` ";
  }

$result = $conn->query($sql);
if ($result->num_rows > 0) {
	$i=1;
  while($row = $result->fetch_assoc()) {
	echo "<tr>";

	echo "<td>".$i."</td>";
  if ($row["slidertype"] =='h')
  {
	echo "<td>Home Slider</td>";
  echo "<td>".$row["cid"]."</td>";
  echo "<td>---</td>";
  }
  else
  {
    $sql_cat = "SELECT c.name FROM CATEGORY AS C, HOMESLIDER AS H WHERE C.CID = H.CID AND C.CID =".$row['cid'];
    $catname ="";
    $result_cat = $conn->query($sql_cat);
    if ($result_cat->num_rows > 0) {
    	$i=1;
      while($row_cat = $result_cat->fetch_assoc()) {
        $catname = $row_cat['name'];
        }
      }
  echo "<td>Category Slider</td>";
  echo "<td>".$row["cid"]."</td>";
  echo "<td>".$catname."</td>";
  }

  echo "<td>".$row["img1"]."</td>";
	echo "<td>".$row["img2"]."</td>";
  echo "<td>".$row["img3"]."</td>";
  echo "<td>".$row["img4"]."</td>";

    echo "<td class='noExl'><a href=index.php?p=pages&pid=hs&act=edt&id=".$row["id"].">Edit</a> | <a href='' onclick='myDeleteFunction(".$row["id"].");'>Delete</a></td>";
  //echo "<td class='noExl'><a href=index.php?p=pages&pid=hs?cid=".$row["id"].>Edit</a> | <a href='' onclick='myDeleteFunction(".$row["id"].");'>Delete</a></td>";
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

		</script>
