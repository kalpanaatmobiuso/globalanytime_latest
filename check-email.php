<?php

include('connect_file.php');
if (!empty($_GET['aemail']) ) {
			 // echo $_POST['username'];
			//   include("connect_file.php");

				$sql = "SELECT user_email FROM user_profile where user_email = '".$_GET['aemail']."' ";
$result = $conn->query($sql);
//print_r($result->num_rows);
if ($result->num_rows > 0){
       echo "Email Already Exist";
               }else {		  

              echo 'OK';
               }
            }

?>