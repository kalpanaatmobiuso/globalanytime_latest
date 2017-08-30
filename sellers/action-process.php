<?php
@ob_start();
session_start();
?>
<?php

include('connect.php');
include 'upload.class.php';
$apge= $_GET['apage'];
//session_start();
if($apge =='login'){

if (!empty($_POST['username'])
               && !empty($_POST['password'])) {
				$sql = "SELECT * FROM user_profile where loginname = '".$_POST['username']."' and password ='".$_POST['password']."'";
$result = $conn->query($sql);

if ($result->num_rows > 0){
            ob_start();
   session_start();
          ob_start();
   session_start();
   while($row = $result->fetch_assoc()) {

   $_SESSION['user']=$_POST['username'];
   $_SESSION['userid']=$row['id'];
   $_SESSION['isadmin']=$row['is_admin'];
    $_SESSION['paid']=$row['paid'];
    $_SESSION['stype']=$row['usertype'];
   }
   $_SESSION['user']=$_POST['username'];
                 header('Location: index.php?p=dashboard');
               }else {
                header('Location: login.php');
               }
            }
}

//logout starts

if($apge =='logout'){
//session_start();
unset($_SESSION['user']);

session_destroy(); // Is Used To Destroy All Sessions

$url = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
//echo "$url";
//header('Location: /index.php');exit();
echo "<script>location.href='index.php';</script>";
}
///category starts

if($apge =='category')
{
      $act= $_GET['act'];
		if($act=='del'){

		$sql = "delete  from category  WHERE cid= ".$_GET['cid']."";

		if ($conn->query($sql) === TRUE) {
		echo "Record deleted successfully";
		} else {
		echo "Error delete record: " . $conn->error;
		}
		}

 if(isset($_POST['submit'])){
 //echo "lll";
		$cname = $_POST['cat-name'];
		$cdes = $_POST['cat-des'];
		$frontp = $_POST['frontp'];
		$imgThumToUpload = $_FILES['imgThumToUpload']['name'];
    echo "imgThumToUpload";
    echo $imgThumToUpload;

		$imgThumToUpload1 = $_POST['imgThumToUpload1'];
    echo "imgThumToUpload1";
    echo "$imgThumToUpload1";

		$imgToUpload = $_FILES['imgToUpload']['name'];


		 $photo_name =  $_FILES['imgThumToUpload']['name'];
		$photo_type = $_FILES['imgThumToUpload']['type'];
		$photo_size = $_FILES['imgThumToUpload']['size'];
		$photo_tmp  = $_FILES['imgThumToUpload']['tmp_name'];
    echo "$photo_tmp";
    echo "photo_tmp";
		$photo_error= $_FILES['imgThumToUpload']['error'];

		$photo_name1 = $_FILES['imgToUpload']['name'];
		$photo_type1 = $_FILES['imgToUpload']['type'];
		$photo_size1 = $_FILES['imgToUpload']['size'];
		$photo_tmp1  = $_FILES['imgToUpload']['tmp_name'];
		$photo_error1= $_FILES['imgToUpload']['error'];
		//exit;
	//include 'upload.class.php';
	$size    = 300;
	$dir =   'uploads/';
	$newdir= 'resized/';
	$img = $upload->photoUpload($imgThumToUpload,$photo_name,$photo_type,$photo_size,$photo_tmp,$photo_error);
	$img1 = $upload->photoUpload($imgToUpload,$photo_name1,$photo_type1,$photo_size1,$photo_tmp1,$photo_error1);


	$max_w = 150;
	$max_h = 150;
	$th_w = 100;
	$th_h = 100;
	//$upload->resizejpeg($dir, $newdir, $img, $max_w, $max_h, $th_w, $th_h);

if($_FILES['imgThumToUpload']['name'] == '' && $act=='edt' )
{
$imgThumToUpload = $imgThumToUpload1;
}
//echo 'yes';
if($act=='ins'){
		$sql = "INSERT INTO category (name, cat_description, thumbnail_img,image_url,uid,frontp)
		VALUES ('".$cname."', '".$cdes."', '".$imgThumToUpload."','".$imgToUpload."','".$_SESSION['userid']."','".$frontp."')";

		if ($conn->query($sql) === TRUE) {
			header('Location: index.php?p=category-list');
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
}elseif($act=='edt'){
if(isset($_POST['cid'])){ $cid = $_POST['cid']; }
//echo "kkk";
		$sql = "UPDATE category SET name='".$cname."',cat_description='".$cdes."', thumbnail_img='".$imgThumToUpload."',image_url ='".$imgToUpload."',frontp = '".$frontp."'  WHERE cid= ".$cid."";

		if ($conn->query($sql) === TRUE) {
			header('Location: index.php?p=category-list');
		} else {
			echo "Error updating record: " . $conn->error;
		}
}

}
}

//sub-category starts
if($apge =='sub-category'){
$act= $_GET['act'];
if($act=='del'){

		$sql = "delete  from sub_category  WHERE sid= ".$_GET['sid']."";

		if ($conn->query($sql) === TRUE) {
			echo "Record deleted successfully";
		} else {
			echo "Error delete record: " . $conn->error;
		}
}

 if(isset($_POST['submit'])){
 //print_r($_POST);
// echo "lll";
  $cid = $_POST['category'];
 $sname = $_POST['sub-name'];
 $sdes = $_POST['sub-des'];
 $imgThumToUpload = $_FILES['imgThumToUpload']['name'];

 $imgToUpload = $_FILES['imgToUpload']['name'];
		$photo_name =  $_FILES['imgThumToUpload']['name'];
		$photo_type = $_FILES['imgThumToUpload']['type'];
		$photo_size = $_FILES['imgThumToUpload']['size'];
		$photo_tmp  = $_FILES['imgThumToUpload']['tmp_name'];
		$photo_error= $_FILES['imgThumToUpload']['error'];

		$photo_name1 = $_FILES['imgToUpload']['name'];
		$photo_type1 = $_FILES['imgToUpload']['type'];
		$photo_size1 = $_FILES['imgToUpload']['size'];
		$photo_tmp1  = $_FILES['imgToUpload']['tmp_name'];
		$photo_error1= $_FILES['imgToUpload']['error'];


	$size    = 300;
	$dir =   'uploads/';
	$newdir= 'resized/';
	$img = $upload->photoUpload($imgThumToUpload,$photo_name,$photo_type,$photo_size,$photo_tmp,$photo_error);
	$img1 = $upload->photoUpload($imgToUpload,$photo_name1,$photo_type1,$photo_size1,$photo_tmp1,$photo_error1);
	$max_w = 150;
	$max_h = 150;
	$th_w = 100;
	$th_h = 100;
	//$upload->resizejpeg($dir, $newdir, $img, $max_w, $max_h, $th_w, $th_h);

//echo 'yes';

if($_FILES['imgThumToUpload']['name'] == '' && $act=='edt' )
{

$imgThumToUpload = $imgThumToUpload1;
}
if($act=='ins'){
		$sql = "INSERT INTO sub_category (cid,sname,description, thumb_img,img,uid)
		VALUES ('".$cid."','".$sname."', '".$sdes."', '".$imgThumToUpload."','".$imgToUpload."','".$_SESSION['userid']."')";

		if ($conn->query($sql) === TRUE) {
			//echo "New record created successfully";
			header('Location: index.php?p=sub-category-list');
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
}elseif($act=='edt'){
if(isset($_POST['sid'])){ $sid = $_POST['sid']; }
		$sql = "UPDATE sub_category SET cid='".$cid."', sname='".$sname."',description='".$sdes."', thumb_img='".$imgThumToUpload."',img ='".$imgToUpload."'  WHERE sid= ".$sid."";

		if ($conn->query($sql) === TRUE) {
			header('Location: index.php?p=sub-category-list');
		} else {
			echo "Error updating record: " . $conn->error;
		}
}

}
}
////product action starts
if($apge =='products'){
$act = $_GET['act'];
if($act=='del'){

		$sql = "delete  from products  WHERE pid= ".$_GET['pid']."";

		if ($conn->query($sql) === TRUE) {
			echo "Record deleted successfully";
		} else {
			echo "Error delete record: " . $conn->error;
		}
}
if($act == 'subcat'){
//echo "kk";
 $find="select sid,sname from sub_category where cid=".$_GET['cid'];
 //echo $find;
  $result = $conn->query($find);
		if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
       echo "<option value=".$row['sid'].">".$row['sname']."</option>";
          }
   }
     exit;
}
if($act == 'user'){
//echo "kk";
 $find="select * from company_profile as c, user_profile as u where c.user_id = u.id and u.id=".$_GET['id'];
 //echo $find;
  $result = $conn->query($find);
		if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
      echo $row['supplier'] ;
    }
   }
     exit;
}

if(isset($_POST['submit'])){
 //print_r(count($_FILES['pro-img']['name'][0]));
 //exit;
  $cid = $_POST['category'];
  $sid = $_POST['sub-category'];
  $proname = $_POST['pro-name'];
  $propermalink = $_POST['pro-permalink'];
  $procode = $_POST['pro-code'];
  $proprice = $_POST['pro-price'];
  $video_url = $_POST['video_url'];
  $video_name = $_POST['video_name'];
  $content = $_POST['content'];
  $metatitle = $_POST['meta-title'];
  $keywords = $_POST['keyword'];
  $compid = $_POST['compid'];
  $verified = "0";
  if (isset($_POST['verified']))
  $verified = $_POST['verified'];
  //$description = $_POST['description'];
if (!isset($_POST['suppliers']))
{
  $prefix = $comma_separated = '';
}
else {
  $sp = $_POST['suppliers'];
  $prefix = $comma_separated = '';
  $prefix = ',';
  foreach ($sp as $sps)
  {
    echo $sps;
    $comma_separated .= $prefix.$sps;
  }
  $comma_separated .= $prefix;
  //echo $comma_separated; // lastname,email,phone
}
$dirname = $_SESSION['userid'];
$filename = $_SESSION['userid'];
$Sitename =$upload->UploadPath();
$Sitename .=UPLOAD_DIR1;

if(file_exists($Sitename.$dirname)) {
  echo UPLOAD_DIR1;
  echo $filename;
$path = $filename;
}
else {
  echo "file doesn't exist";
    mkdir($Sitename.$dirname, 0777,true);
    $path = $dirname;
}
$imgThumToUpload = $_FILES['imgThumToUpload']['name'];
$imgThumToUpload1 = $_POST['imgThumToUpload1'];
//echo "imgThumToUpload1";
//echo "$imgThumToUpload1";


   $photo_name =  $_FILES['imgThumToUpload']['name'];
   $photo_type = $_FILES['imgThumToUpload']['type'];
   $photo_size = $_FILES['imgThumToUpload']['size'];
   $photo_tmp  = $_FILES['imgThumToUpload']['tmp_name'];
   //echo "photo temp";
   //echo $photo_tmp;
   $photo_error= $_FILES['imgThumToUpload']['error'];


$max_file_size = 2097152; //2 MB

if($_FILES['imgThumToUpload']['name'] == '' && $act=='edt' )
{
//echo "Inside edit with blank";
//echo "photoname";
$photo_name = $imgThumToUpload1;
}
else {
echo $img = $upload->photoUpload1($imgThumToUpload,$photo_name,$photo_type,$photo_size,$photo_tmp,$photo_error,$path);
}
$count = 0;
echo "image upload starting";
//echo $_FILES['imgToUpload']['name'];
$count = count($_FILES['imgToUpload']['name']);
//foreach ($_FILES['imgToUpload'] as $file)
echo $count;
$photo_name_array ="";
$imgToUpload1 = $_POST['imgToUpload1'];
$editTrue = false;
for($i = 0; $i < $count; $i++)
{
  $imgToUpload = $_FILES['imgToUpload']['name'][$i];
  $photo_name1 = $_FILES['imgToUpload']['name'][$i];
  $photo_type1 = $_FILES['imgToUpload']['type'][$i];
  $photo_size1 = $_FILES['imgToUpload']['size'][$i];
  $photo_tmp1  = $_FILES['imgToUpload']['tmp_name'][$i];

  $photo_error1= $_FILES['imgToUpload']['error'][$i];
  echo "Image Photo name -----";
  if($i == 0 && $_FILES['imgToUpload']['name'][$i]=='' && $act=='edt' )
  {
  echo "Inside edit image upload";
  $photo_name_array = $imgToUpload1;
  $editTrue = true;
  break;
  }
  else
  {
  echo $imgToUpload;
  $photo_name_array .= ",".$_FILES['imgToUpload']['name'][$i];
  echo $img1 = $upload->photoUpload1($imgToUpload,$photo_name1,$photo_type1,$photo_size1,$photo_tmp1,$photo_error1,$path);
  }
}
if (!$editTrue)
  $photo_name_array .= ",";

if($act == 'ins'){
$sql = "INSERT INTO products (verified,pro_name,pro_permalink,pro_code,pro_price,pro_content,video_name,video_url,meta_title,keyword,comp_id,cid,sid,thumnail_url,img_url,supplier_id)
VALUES ('".$verified."','".addslashes($proname)."', '".$propermalink."','".$procode."','".$proprice."','".addslashes($content)."','".addslashes($video_name)."','".addslashes($video_url)."','".addslashes($metatitle)."','".addslashes($keywords)."','".$compid."',
'".$cid."','".$sid."','".$photo_name."','".$photo_name_array."','".$comma_separated."')";

		if ($conn->query($sql) === TRUE) {
		echo "New record created successfully";
			header('Location: index.php?p=products-list');
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
}elseif($act == 'edt'){
if(isset($_POST['pid'])){
  $pid = $_POST['pid'];
}
		 $sql = "UPDATE products SET verified='".$verified."', supplier_id='".$comma_separated."', pro_name = '".addslashes($proname)."' ,pro_permalink = '".$propermalink."',pro_code='".$procode."',pro_price='".$proprice."',pro_content='".addslashes($content)."',video_name='".addslashes($video_name)."',video_url= '".addslashes($video_url)."',meta_title='".addslashes($metatitle)."',keyword='".addslashes($keywords)."',
     cid='".$cid."', sid ='".$sid."',thumnail_url='".$photo_name."',img_url='".$photo_name_array."'  WHERE pid= ".$pid."";
     echo $sql;
		if ($conn->query($sql) === TRUE) {
      echo " record updated successfully";

		} else {
			echo "Error updating record: " . $conn->error;
		}

}
}//end of post submit
}
//eidt profile

if($apge =='editprofile'){
$act = $_GET['act'];

if(isset($_POST['submit'])){
    $uname = $_POST['uname'];
		$usname = $_POST['user_name'];
		$passw = $_POST['passw'];
		$pid = $_POST['id'];
		$rd = $_GET['ad'];
		$verfi= $_POST['verified'];
		$paid = $_POST['paid'];
		$stype = $_POST['stype'];
}
if($act=='edt'){
		$sql = "UPDATE user_profile SET loginname ='".$usname."',password='".$passw."', name='".$uname."', verified ='".$verfi."', paid ='".$paid."',usertype ='".$stype."'  WHERE id= ".$pid."";
} elseif ($act=='ins') {
  # code...
  $admin = '';
  $sql = "INSERT INTO user_profile (loginname,password,name,verified,paid,usertype,is_admin)
  VALUES ('".$usname."','".$passw."', '".$uname."',  '".$verfi."', '".$paid."', '".$stype."','".$admin."')";
}
echo $sql;

		if ($conn->query($sql) === TRUE) {
		if($rd == 1){
		header('Location: index.php?p=users-list');
		}else{
			header('Location: index.php?p=dashboard');
			}
		} else {
			echo "Error updating record: " . $conn->error;
		}
}


// for company
if($apge =='company'){
$act = $_GET['act'];
if($act=='del'){

		$sql = "delete  from company_profile  WHERE id= ".$_GET['sid']."";

		if ($conn->query($sql) === TRUE) {
			echo "Record deleted successfully";
		} else {
			echo "Error delete record: " . $conn->error;
		}
    exit;
}
if($act == 'user'){
//echo "kk";
$find="select * from company_profile where user_id=".$_GET['id'];
//echo $find;
 $result = $conn->query($find);
   if ($result->num_rows > 0) {
   while($row = $result->fetch_assoc()) {
      echo "T";
      exit;
         }
  }

 $find="select * from user_profile where id=".$_GET['id'];
 //echo $find;
  $result = $conn->query($find);
		if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
       echo $row['usertype'];
          }
   }

     exit;
}

if(isset($_POST['submit'])){
  $keyword='';
    $comp_name = $_POST['comp_name'];
		$comp_add = $_POST['comp_add'];
		$mobile = $_POST['mobileno'];
		$phoneno = $_POST['phoneno'];
    $pin_code = $_POST['pin_code'];
    $user_id = $_POST['user_id'];
    $email = $_POST['uemail'];

    $compid = $_POST['id'];
  		//$sp = $_POST['suppliers'];
    if (!isset($_POST['suppliers']))
    {
        $prefix = $comma_separated = '';
    }
    else {

      $sp = $_POST['suppliers'];
      $prefix = $comma_separated = '';
      $prefix = ',';
      foreach ($sp as $sps)
      {
        $comma_separated .= $prefix.$sps;
      }
      $comma_separated .= $prefix;
      echo $comma_separated; // lastname,email,phone
    }
  }

  if($act=='ins')
  {
    $sql = "INSERT INTO company_profile (email, pincode, user_id, mobile,company_name, company_address,phoneno,supplier)
    VALUES ('".$email."','".$pin_code."','".$user_id."','".$mobile."', '".$comp_name."', '".$comp_add."','".$phoneno."','".$comma_separated."')";
  }
  elseif($act=='edt')
  {
  $sql = "UPDATE company_profile SET
  email = '".$email."', pincode='".$pin_code."', user_id='".$user_id."', mobile='".$mobile."',company_name='".$comp_name."',company_address='".$comp_add."',phoneno='".$phoneno."', supplier ='".$comma_separated."'  WHERE id= ".$compid."";
  }
  echo $sql;
	if ($conn->query($sql) === TRUE) {
    echo "Successfully updated";
  header('Location: index.php?p=sellers-list');
			} else {
		echo "Error updating record: " . $conn->error;
    //header('Location: index.php?p=sellers.php?err=1');
	}
}

// for sellers
if($apge =='sellers')
{
$act = $_GET['act'];
if($act=='del'){

$sql = "delete  from user_profile  WHERE id= ".$_GET['sid']."";

if ($conn->query($sql) === TRUE) {
echo "Record deleted successfully";
} else {
echo "Error delete record: " . $conn->error;
}
}
}
//for pages
if($apge =='pages')
{
      $act= $_GET['act'];
 if(isset($_POST['submit'])){
 //echo "lll";
		$cdes = $_POST['content'];

if($act=='edt'){
if(isset($_POST['pid'])){
$pid = $_POST['pid'];
//echo "kkk";
		$sql = "UPDATE pages SET pag_content='".$cdes."'  WHERE pid= '".$pid."'";

		if ($conn->query($sql) === TRUE) {
			header('Location: index.php?p=pages-list');
		} else {
			echo "Error updating record: " . $conn->error;
		}

}}}}
//update pos-request status from dashboard
if($apge =='request')
{
  $act = $_GET['act'];
  if($act=='edt')
  {
    $status =  $_GET['status'];
    $id = $_GET['id'];
    $sql = "UPDATE postrequest SET status='".$status."'  WHERE id= '".$id."'";
    //echo $sql;
		if ($conn->query($sql) === TRUE) {
	 echo "Record updated successfully";
		} else {
			echo "Error updating record: " . $conn->error;
		}

  //  echo "update";
  }
}

//update enquiry status from dashboard
if($apge =='enquiry')
{
  $act = $_GET['act'];
  if($act=='edt')
  {
    $status =  $_GET['status'];
    $id = $_GET['id'];
    $sql = "UPDATE user_enquiry SET status='".$status."'  WHERE oid= '".$id."'";
    //echo $sql;
		if ($conn->query($sql) === TRUE) {
	 echo "Record updated successfully";
		} else {
			echo "Error updating record: " . $conn->error;
		}

  //  echo "update";
  }
}
//eidt enquiry
if($apge =='editenquiry'){
$act = $_GET['act'];
if($act=='edt'){
if(isset($_POST['submit'])){
       $name = $_POST['name'];
	   $address = $_POST['address'];
	   	$mobileno = $_POST['mobileno'];
		$email = $_POST['email'];
		//$sid = $_POST['suppliers'];
		$messages = $_POST['messages'];
		$status = $_POST['status'];

		$pid = $_POST['oid'];
		$sql = "UPDATE user_enquiry SET name ='".$name."',address='".$address."',mobileno='".$mobileno."',email='".$email."',messages='".$messages."', status='".$status."' WHERE oid= ".$pid;
//echo $sql;
		if ($conn->query($sql) === TRUE) {
			header('Location: index.php?p=dashboard');
		} else {
			echo "Error updating record: " . $conn->error;
		}
}
}

}

//import products
if($apge =='productsimport'){
if(isset($_POST["submit"]))
{
//echo "ggg";
$file = $_FILES['file']['tmp_name'];

$handle = fopen($file, "r");
$c = 1;
$fileop = fgetcsv ($handle, 1000, ",");
while(($filesop = fgetcsv($handle, 1000, ",")) !== false)
{
echo $name = $filesop[0];
//echo "<br/>";
 $project = $filesop[1];

$sql = "INSERT INTO products (pro_name,pro_permalink,pro_code,pro_price,pro_content,video_name,video_url,meta_title,keyword,description,uid) VALUES ('".addslashes($filesop[0])."', '".$filesop[1]."','".$filesop[2]."','".$filesop[3]."','".addslashes($filesop[4])."','".addslashes($filesop[5])."','".addslashes($filesop[6])."','".addslashes($filesop[7])."','".addslashes($filesop[8])."','".addslashes($filesop[9])."','".$_SESSION['userid']."')";

	if($conn->query($sql) === TRUE){
header('Location: index.php?p=products-list');
}else{
header('Location: index.php?p=productsimport&e=1');
}
echo $c = $c + 1;
}
}
}
//home slider
//eidt profile

if($apge =='homeslider'){
  $act = $_GET['act'];
  if($act=='del'){
  $sql = "delete  from homeslider  WHERE id= ".$_GET['id']."";

  if ($conn->query($sql) === TRUE) {
  echo "Record deleted successfully";
  } else {
  echo "Error delete record: " . $conn->error;
  }
  }

if(isset($_POST['submit'])){
    $flag = $_POST['flag'];
    echo $flag;
    $category="0";
    if(isset($_POST['category']));
     $category =$_POST['category'];
     echo $category;


          $photo_name1 =  $_FILES['img1']['name'];
          $photo_type1 = $_FILES['img1']['type'];
          $photo_size1 = $_FILES['img1']['size'];
          $photo_tmp1  = $_FILES['img1']['tmp_name'];
          $photo_error1 = $_FILES['img1']['error'];
          $img = $upload->photoUpload3($photo_name1,$photo_name1,$photo_type1,$photo_size1,$photo_tmp1,$photo_error1);

          $photo_name2 =  $_FILES['img2']['name'];
          $photo_type2 = $_FILES['img2']['type'];
          $photo_size2 = $_FILES['img2']['size'];
          $photo_tmp2  = $_FILES['img2']['tmp_name'];
          $photo_error2 = $_FILES['img2']['error'];
          $img = $upload->photoUpload3($photo_name2,$photo_name2,$photo_type2,$photo_size2,$photo_tmp2,$photo_error2);
          $photo_name3 =  $_FILES['img3']['name'];
          $photo_type3 = $_FILES['img3']['type'];
          $photo_size3 = $_FILES['img3']['size'];
          $photo_tmp3  = $_FILES['img3']['tmp_name'];
          $photo_error3 = $_FILES['img3']['error'];
          if($photo_name3 != '')
          $img = $upload->photoUpload3($photo_name3,$photo_name3,$photo_type3,$photo_size3,$photo_tmp3,$photo_error3);
          $photo_name4 =  $_FILES['img4']['name'];
          $photo_type4 = $_FILES['img4']['type'];
          $photo_size4 = $_FILES['img4']['size'];
          $photo_tmp4  = $_FILES['img4']['tmp_name'];
          $photo_error4 = $_FILES['img4']['error'];
          if($photo_name4 != '')
          $img = $upload->photoUpload3($photo_name4,$photo_name4,$photo_type4,$photo_size4,$photo_tmp4,$photo_error4);
          $photo_name5 =  $_FILES['img5']['name'];
          $photo_type5 = $_FILES['img5']['type'];
          $photo_size5 = $_FILES['img5']['size'];
          $photo_tmp5  = $_FILES['img5']['tmp_name'];
          $photo_error5 = $_FILES['img5']['error'];
          if($photo_name5 != '')
          $img = $upload->photoUpload3($photo_name5,$photo_name5,$photo_type5,$photo_size5,$photo_tmp5,$photo_error5);
          $photo_name6 =  $_FILES['img6']['name'];
          $photo_type6 = $_FILES['img6']['type'];
          $photo_size6 = $_FILES['img6']['size'];
          $photo_tmp6  = $_FILES['img6']['tmp_name'];
          $photo_error6 = $_FILES['img6']['error'];
          if($photo_name6 != '')
          $img = $upload->photoUpload3($photo_name6,$photo_name6,$photo_type6,$photo_size6,$photo_tmp6,$photo_error6);
          $photo_name7 =  $_FILES['img7']['name'];
          $photo_type7 = $_FILES['img7']['type'];
          $photo_size7 = $_FILES['img7']['size'];
          $photo_tmp7  = $_FILES['img7']['tmp_name'];
          $photo_error7 = $_FILES['img7']['error'];
          if($photo_name7 != '')
          $img = $upload->photoUpload3($photo_name7,$photo_name7,$photo_type7,$photo_size7,$photo_tmp7,$photo_error7);
          $photo_name8 =  $_FILES['img8']['name'];
          $photo_type8 = $_FILES['img8']['type'];
          $photo_size8 = $_FILES['img8']['size'];
          $photo_tmp8  = $_FILES['img8']['tmp_name'];
          $photo_error8 = $_FILES['img8']['error'];
          if($photo_name8 != '')
          $img = $upload->photoUpload3($photo_name8,$photo_name8,$photo_type8,$photo_size8,$photo_tmp8,$photo_error8);
          $photo_name9 =  $_FILES['img9']['name'];
          $photo_type9 = $_FILES['img9']['type'];
          $photo_size9 = $_FILES['img9']['size'];
          $photo_tmp9  = $_FILES['img9']['tmp_name'];
          $photo_error9 = $_FILES['img9']['error'];
          if($photo_name9 != '')
          $img = $upload->photoUpload3($photo_name9,$photo_name9,$photo_type9,$photo_size9,$photo_tmp9,$photo_error9);
          $photo_name10 =  $_FILES['img10']['name'];
          $photo_type10 = $_FILES['img10']['type'];
          $photo_size10 = $_FILES['img10']['size'];
          $photo_tmp10  = $_FILES['img10']['tmp_name'];
          $photo_error10 = $_FILES['img10']['error'];
          if($photo_name10 != '')
          $img = $upload->photoUpload3($photo_name10,$photo_name10,$photo_type10,$photo_size10,$photo_tmp10,$photo_error10);

     if($act=='edt'){
       if($_FILES['img1']['name'] == ''  )
       {
       $photo_name1 = $_POST['imgToUpload1'];
    //   echo "blankfile";
       }
		$sql = "UPDATE homeslider SET cid = '".$category."', slidertype ='".$flag."'  ,
    img1  = '".$photo_name1."',img2  = '".$photo_name2."',img3  = '".$photo_name3."',img4  = '".$photo_name4."',img5  = '".$photo_name5."',img6  = '".$photo_name6."',img7  = '".$photo_name7."',img8  = '".$photo_name8."',img9  = '".$photo_name9."',img10  = '".$photo_name10."' WHERE id=".$_POST['id'];
		echo $sql;
		//exit;
} else
{

  $sql = "INSERT INTO homeslider  (cid,slidertype,img1,img2,img3,img4,img5,img6,img7,img8,img9,img10)
  VALUES ('".$category."', '".$flag."','".$photo_name1."','".$photo_name2."','".$photo_name3."', '".$photo_name4."','".$photo_name5."', '".$photo_name6."','".$photo_name7."','".$photo_name8."','".$photo_name9."','".$photo_name10."')";

  echo $sql;
}
		if ($conn->query($sql) === 'TRUE') {
		header('Location: index.php?p=HomeSliderList');
		} else {
			echo "Error updating record: " . $conn->error;
		}
}
}


?>
