<?php

$target_dir = "upload/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    //$uploadOk = 0;
}

if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}

$allowed = array ("jpg", "png", "jpeg", "gif");
$match = false;
foreach ($allowed as $type) {
	if ( $imageFileType === $type ) {
		$match = true;
	}
}
if ( !$match ) {
	echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
	$uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"] ). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}


if (isset ( $target_file ))
{
	echo "Processing: " . urldecode ( trim ( $target_file ) );
	
	$size =getimagesize($target_file);
	$image_1 = null;
	switch( $size["mime"]){
		case "image/jpeg":
			$image_1 = imagecreatefromjpeg($target_file);
			unlink($target_file);
			break;
		case "image/gif":
			$image_1 = imagecreatefromgif($target_file);
			unlink($target_file);
			break;
		case "image/png":
			$image_1 = imagecreatefrompng($target_file);
			unlink($target_file);
			break;
		default:
			$image_1 = false;
			break;
	}
	
	$origin_x = imagesx($image_1);
	$origin_y = imagesy($image_1);
	
	$to_use = $origin_y;
	$isWidth = false;
	if ( $origin_x >= $origin_y ) {
		$to_use = $origin_x;
		$isWidth = true;
	}
	
	$image_2 = imagecreatetruecolor($to_use, $to_use);
	imagesavealpha($image_2, true);
	$color = imagecolorallocatealpha($image_2, 0, 0, 0, 127);
	imagefill($image_2, 0, 0, $color);
	
	$dX = null;
	$dY = null;
	if ( $isWidth ) {
		$dX = 0;
		$dY = imagesy($image_2)/2 - ($origin_y/2);
	} else {
		$dY = 0;
		$dX = imagesx($image_2)/2 - ($origin_x/2);
	}
	
	imagealphablending ( $image_2, true );
	imagesavealpha ( $image_2, true );
	imagecopy ( $image_2, $image_1, $dX, $dY, 0, 0, $origin_x, $origin_y );

	replace_until($target_file, array (".jpg", ".png", ".jpeg", ".gif"), '.png');
	imagepng ( $image_2, $target_file );

	imagedestroy($image_1);
	imagedestroy($image_2);
	
	Header("location: test.php");
	
}


function replace_until($target, array $list, $str) {
	foreach ( $list as $type ) {
		$target = str_replace($type, $str, $target);
	}
	return $target;
}






































?> 