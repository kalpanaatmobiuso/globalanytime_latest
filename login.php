<?php
include('connect_file.php');

if (!empty($_POST['username']) && !empty($_POST['password'])) {
			 // echo $_POST['username'];
			//   include("connect_file.php");

				$sql = "SELECT * FROM user_profile where loginname = '".$_POST['username']."' and password ='".$_POST['password']."'";
$result = $conn->query($sql);
//print_r($result->num_rows);
if ($result->num_rows > 0){
//echo 'ff';
while($row = $result->fetch_assoc()) {
            ob_start();
   session_start();

   $_SESSION['user']=$_POST['username'];
	 $_SESSION['profile_name']=$row['name'];
	 $_SESSION['userid']=$row['id'];
   $_SESSION['isadmin']=$row['is_admin'];
   $_SESSION['paid']=$row['paid'];
   $_SESSION['stype']=$row['usertype'];
	 header('Location: sellers/index.php?p=sellers-list');
 }
 }
	// 	if ($_SESSION['isadmin'] == '1')
		//{
		//	header('Location: sellers/index.php?p=dashboard-admin');
//		}
//   else
	//  {
		//	 if($_SESSION['stype'] == 'b'){
		  //           header('Location: sellers/index.php?p=dashboard');
			//	 }else{

				//  header('Location: sellers/index.php?p=dashboarddb');
	//			 }
//    }// end of else
//	}// end of while
//}// records found
	else {
         $r = '1';
   header('Location: seller.php?e='.$r);
         }
}

?>
