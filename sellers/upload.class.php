 <?php
/**
 * +------------------------------------------------------------------------+
 * | upload.class.php                                                       |
 * +------------------------------------------------------------------------+
 * | @author : Erkan AY  			                                              |
 * |------------------------------------------------------------------------+
 * | Email         info@erkanay.com                                         |
 * | Web           http://erkanay.com                                       |
 * +------------------------------------------------------------------------+
 *
 */
define("UPLOAD_DIR", "/sellers/uploads/");
define("UPLOAD_DIR1", "/sellers/products/");
define("UPLOAD_DIR2","/sellers/homeimg/");
define('APP_NAME',"Seeshor");
define('HTTP_SERVER', 'http://localhost/');
define('SITE_NAME', 'http://localhost/');



class Uploader{
  public function UploadPath ()
  {
    $Imagepath =  $_SERVER['DOCUMENT_ROOT'] ;
    $Imagepath .= "/";
    $Imagepath .= APP_NAME;
    $Imagepath .= "/";
    $Imagepath .= APP_NAME;

    return $Imagepath;
  }
	public function photoUpload($fname,$photo_name,$photo_type,$photo_size,$photo_tmp,$photo_error){

    $Sitename =$this->UploadPath();
    $Sitename .=UPLOAD_DIR;
    //$Sitename .=$path;
    //$Sitename .= "/";

		$file_ext   = array('jpg','png','gif','bmp','JPG');
    $explode_temp = explode('.',$fname);
		$post_ext   = end($explode_temp);
		//move_uploaded_file($photo_tmp,"uploads/".$photo_name);
		if((($photo_type == 'image/jpeg') || ($photo_type == 'image/gif')   ||
		   ($photo_type == 'image/png') || ($photo_type == 'image/pjpeg')) &&
		   ($photo_size < 2000000) && in_array($post_ext,$file_ext)){
			if($photo_error > 0 ){
				echo 'Error '.$photo_error;
				exit;
			}else{
				echo $photo_name.' Uploaded !';
			}

			if(file_exists($Sitename.$photo_name)){
				echo 'There is '.$photo_name;
			}else{

				$new_name = explode('.',$photo_name);
				//$photo_name = 'erkan_'.md5($new_name[0]).'.'.$new_name[1];
               $photo_name = $photo_name;

			$success = move_uploaded_file($photo_tmp,$Sitename.$photo_name);
    if (!$success) {
        echo "<p>Unable to save file.</p>";
        exit;
    }else{
      echo "Moved file";
	return $photo_name;
	}

			}
		}
		else{
			echo 'The uploaded file has invalid rules';
		}
	}

	public function photoUpload1($fname,$photo_name,$photo_type,$photo_size,$photo_tmp,$photo_error,$path){

echo "document root";
$Sitename =$this->UploadPath();
$Sitename .=UPLOAD_DIR1;
$Sitename .=$path;
$Sitename .= "/";
echo $Sitename;

		$file_ext   = array('jpg','png','gif','bmp','JPG');
    $explode_res = explode('.',$fname);
    echo "fname";
    echo $fname;
  	$post_ext   = end($explode_res);
    if((($photo_type == 'image/jpeg') || ($photo_type == 'image/gif')   ||
       ($photo_type == 'image/png') || ($photo_type == 'image/pjpeg')) &&
       ($photo_size < 2000000) && in_array($post_ext,$file_ext)){
      if($photo_error > 0 ){
        echo 'Error '.$photo_error;
        header('Location: index.php?p=dashboard');
      }else{
        echo $photo_name.' Uploaded !';
      }
		if(file_exists($Sitename.$photo_name)){
		echo 'There is '.$photo_name.'plz rename and try again';
    }else{
	//		echo 'ggg';
				//new photo name and encryption
				//$new_name = explode('.',$photo_name);
				//$photo_name = 'erkan_'.md5($new_name[0]).'.'.$new_name[1];
          //     $photo_name = $photo_name;
			$success = move_uploaded_file($photo_tmp,$Sitename.$photo_name);
    if (!$success) {
        echo "<p>Unable to save file.</p>";
        header('Location: index.php?p=dashboard');
    }else{
echo "success";
	return $photo_name;
	}
}

			}

	}

public function photoUpload3($fname,$photo_name,$photo_type,$photo_size,$photo_tmp,$photo_error){

  echo "document root";
  $Sitename =$this->UploadPath();
  $Sitename .=UPLOAD_DIR2;
//  $Sitename .=$path;
//  $Sitename .= "/";
  echo $Sitename;

		$file_ext   = array('jpg','png','gif','bmp','JPG');
		//$post_ext   = end(explode('.',$fname));
    $explode_res = explode('.',$fname);
    echo "fname";
    echo $fname;
    $post_ext   = end($explode_res);
		//move_uploaded_file($photo_tmp,"uploads/".$photo_name);
		if((($photo_type == 'image/jpeg') || ($photo_type == 'image/gif')   ||
		   ($photo_type == 'image/png') || ($photo_type == 'image/pjpeg')) &&
		   ($photo_size < 2000000) && in_array($post_ext,$file_ext)){
			if($photo_error > 0 ){
				echo 'Error '.$photo_error;
				exit;
			}else{
				//echo $photo_name.' Uploaded !';
			}

			if(file_exists($Sitename.$photo_name)){
				echo 'There is '.$photo_name.'. Change the image name.';
			//	header('Refresh: 3;url=index.php?p=pages&pid=hs');
				//exit;
			}else{
			//echo 'ggg';
				//new photo name and encryption
				$new_name = explode('.',$photo_name);
				//$photo_name = 'erkan_'.md5($new_name[0]).'.'.$new_name[1];
               $photo_name = $photo_name;
				//move to directory

			$success = move_uploaded_file($photo_tmp,$Sitename.$photo_name);
    if (!$success) {
        echo "<p>Unable to save file.</p>";
        exit;
    }else{
	return $photo_name;
	}
				//if(move_uploaded_file($path,$photo_name)){

				//	return $photo_name;
				//}

			}
		}
		else{
			echo 'The uploaded file has invalid rules';
		}
	}

	public function resizejpeg($dir, $newdir, $img, $max_w, $max_h, $th_w, $th_h){
	    // set destination directory
	    if (!$newdir) $newdir = $dir;

	    // get original images width and height
	    list($or_w, $or_h, $or_t) = getimagesize($dir.$img);

	    // make sure image is a jpeg
	    if ($or_t == 2) {

	        // obtain the image's ratio
	        $ratio = ($or_h / $or_w);

	        // original image
	        $or_image = imagecreatefromjpeg($dir.$img);

	        // resize image?
	        if ($or_w > $max_w || $or_h > $max_h) {

	            // resize by height, then width (height dominant)
	            if ($max_h < $max_w) {
	                $rs_h = $max_h;
	                $rs_w = $rs_h / $ratio;
	            }
	            // resize by width, then height (width dominant)
	            else {
	                $rs_w = $max_w;
	                $rs_h = $ratio * $rs_w;
	            }

	            // copy old image to new image
	            $rs_image = imagecreatetruecolor($rs_w, $rs_h);
	            imagecopyresampled($rs_image, $or_image, 0, 0, 0, 0, $rs_w, $rs_h, $or_w, $or_h);
	        }
	        // image requires no resizing
	        else {
	            $rs_w = $or_w;
	            $rs_h = $or_h;

	            $rs_image = $or_image;
	        }

	        // generate resized image
	        imagejpeg($rs_image, $newdir.$img, 100);

	        $th_image = imagecreatetruecolor($th_w, $th_h);

	        // cut out a rectangle from the resized image and store in thumbnail
	        $new_w = (($rs_w / 2) - ($th_w / 2));
	        $new_h = (($rs_h / 2) - ($th_h / 2));

	        imagecopyresized($th_image, $rs_image, 0, 0, $new_w, $new_h, $rs_w, $rs_h, $rs_w, $rs_h);

	        // generate thumbnail
	        imagejpeg($th_image, $newdir.'thumb_'.$img, 100);

	        return true;
	    }

	    // Image type was not jpeg!
	    else {
	        return false;
	    }
     }
  public function dumpPhoto($thumb,$dir){
  	$thumb = 'thumb_'.$thumb;
		$img   = $dir.$thumb;
		$dump  = "<img src=$img />";
		return $dump;
	}
}
$upload = new Uploader();
?>
