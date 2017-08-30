<?php
include('connect_file.php');
//print_r($_POST);
//if(isset($_POST['submit'])){
// echo "lll";
		$uname = $_GET['ename'];
		$uaddress = $_GET['eaddress'];
		$mobile = $_GET['emobile'];
		$email1 = $_GET['eemail'];
		$message = $_GET['emessage'];
		$pid = $_GET['pid'];
		$uid = $_GET['uid'];
$sql = "INSERT INTO user_enquiry (messages,pid,status,uid)
		VALUES ('".$message."','".$pid."','pending','".$uid."')";
		if ($conn->query($sql) === TRUE) {
			echo '1';
		}else{
		echo '2';
		}
		
	//}	
	$find="select * from products where pid=".$_GET['pid'];
 //echo $find;
  $result = $conn->query($find);
		if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {	
		$pname = $row['pro_name'];
		
		
		$find1="select * from category where cid=".$row['cid'];
 //echo $find;
  $result1 = $conn->query($find1);
		if ($result1->num_rows > 0) {
		while($row1 = $result1->fetch_assoc()) {	
		$cname = $row1['name'];
		
		}}
		
		
		
		$find2="select * from sub_category where sid=".$row['sid'];
 //echo $find;
  $result2 = $conn->query($find2);
		if ($result2->num_rows > 0) {
		while($row2 = $result2->fetch_assoc()) {	
		$sname = $row2['sname'];		
		}}
		
		$find3="select * from user_profile where id=".$row['uid'];
 //echo $find;
  $result3 = $conn->query($find3);
		if ($result3->num_rows > 0) {
		while($row3 = $result3->fetch_assoc()) {	
		$semail = $row3['user_email'];		
		}}
		
		
		}}
	 //Email information
  $admin_email = "rhnsyal349@gmail.com";
  $seller_email = $semail;
  // $seller_email = "kajal.katakdhond@gmail.com";
  $email = "krnsyal147@gmail.com";
  $subject = 'User Enquiry ';
  $comment = 'Category: '.$cname.'<br>';
  $comment .= 'Sub Category: '.$sname.'<br>';
  $comment .= 'Product Name: '.$pname.'<br>';
  
	  $comment .= 'Message: '.$message.'<br>';
 $headers = "MIME-Version: 1.0\n";
				$headers .= "Content-type: text/html; charset=iso-8859-1\n";
				$headers .= "From: info@noreplay.com";
  //send email
  mail($admin_email, $subject, $comment, $headers);
  mail($seller_email, $subject, $comment, $headers);
  $comment1 = 'Thank you for enquiry. we will get back soon.';
  mail($email1, "$subject", $comment1, $headers);
  
  //Email response
  echo "Thank you for contacting us!";
 // }

?>