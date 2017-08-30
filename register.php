<?php
include('connect_file.php');

//print_r($_POST);
//exit;
if(isset($_POST['submit'])){
// echo "lll";
		$uname = $_POST['uname'];
		$usname = $_POST['user_name'];
		$passw = $_POST['passw'];
		$stype= $_POST['stype_new'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $admin ='0';
$sql = "SELECT * FROM user_profile where loginname = '".$usname."' ";
$result = $conn->query($sql);
if ($result->num_rows > 0){
       header('Location: seller.php?s=3');
               }else {

    $sql = "INSERT INTO user_profile (loginname,password,name,usertype,is_admin,mobile,email)
    VALUES ('".$usname."','".$passw."', '".$uname."', '".$stype."','".$admin."','".$phone."','".$email."')";
echo $sql;
 	  if ($conn->query($sql) === TRUE) {
		 //mail("kalpanaunadkat@gmail.com", $subject, $comment,  $headers);
			header('Location: seller.php?s=1');
		}


	}

//		}

	}

?>
