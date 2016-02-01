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
// Check file size
/*
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
*/

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
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











/*
 include "image_editor.php";
if ( isset($target_file) ) {
	echo "Processing: " . urldecode(trim($target_file));
	
	$se=new SImEdi();
	$se->create();
	$se->load($target_file);

	$iw = imagesx($se->img_res);
	$ih = imagesy($se->img_res);
	$mw = (int) round($iw /2);
	$mh = (int) round($ih /2);
	

	$test = new SImEdi();
	$isW = false;
	if ( $iw >= $ih ) {
		echo "Lunga" . ($iw-$ih);
		$test->create('uploads/background_image.png', $iw, $iw);
		$isW = true;
	} else {
		echo "Alta" . ($ih-$iw);
		$test->create('upload/background_image.png', $ih, $ih);		
	}
	$test->plugin('manipulation');
	$test->save('upload/background_image.png');
	
	/*
	 if ( $isW ) {
		$test->manipulation->impose2(
				'upload/background_image.png',
				$target_file,
				$iw,$iw);
	} else {
		$test->manipulation->impose2(
				'upload/background_image.png',
				$target_file,
				$ih,$ih);
	}
	 //END * /
	if ( $isW ) {
		$test->manipulation->impose($target_file, 0, 0, $iw, $iw, 0);
	} else {
		//add other version
	}
	$test->save("upload/final.jpg");
	$se->save($target_file);
	
	echo "Resolution: " . $iw . "x" . $ih;
	echo "Res Middle: " . $mw . "x" . $mh;
}
 */


include "image_editor.php";


if ( isset($target_file) ) {
	echo "Processing: " . urldecode(trim($target_file));

	$se=new SImEdi();
	$se->create();
	$se->load($target_file);
	
	$iw = imagesx($se->img_res);
	$ih = imagesy($se->img_res);
	$isWidthBigger = false;
	$square_var = $ih;
	if ( $iw >= $ih ) {
		$isWidthBigger = true;
		$square_var = $iw;
	}
	
	$se->plugin('manipulation');
	
	try {
		if ( !$se->manipulation->impose($target_file, 100, 100, 0, 0, 1) ) {
			echo $se->error;
		}
		echo "<br /> impose ($target_file)";
	} catch (Exception $e) {
		echo $e;
	}
	$se->save();
	
}





















































?> 