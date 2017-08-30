<?php
include('connect_file.php');
//print_r($_POST);
if(isset($_POST['submit'])){
// echo "lll";
$pname = $_POST['pname'];
		///$uname = $_POST['username'];
		//$uemail = $_POST['user_email'];
	//	$mobile = $_POST['user_mobileno'];
	//	$address = $_POST['user_add'];
		$message = $_POST['message'];
		$uid = $_POST['uid'];
	 $sql1 = "INSERT INTO postrequest (pro_name,message,uid) VALUES
	 ('".$pname."','".$message."','".$uid."')";
		//exit;
	//print_r($sql1);
	$subject = 'Post Request';
  $comment = 'Following are the details,<br>';
  $comment .= 'Product Name: '.$pname.'<br>';
	  $comment .= 'Message: '.$message.'<br>';
 $headers = "MIME-Version: 1.0\n";
				$headers .= "Content-type: text/html; charset=iso-8859-1\n";
				$headers .= "From: info@noreplay.com";
				// mail($uemail, $subject, $comment, $headers);
		if ($conn->query($sql1) === TRUE) {
			header('Location: prequest.php?s=1');
		}
		else {
			echo '2';
		}

	}
?>
