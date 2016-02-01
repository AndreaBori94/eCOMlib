 <?php
     /*
     @author => Roberto Maiocco (http://www.cgmconsulting.it)
     @licence => GPL 2
     */
    class SE_manipulation {
    private $main;

    function __construct($main) {

      $this->main=$main;
    }

   function impose($sourceimage='test.jpg',$dx=0,$dy=0,$sx=0,$sy=0,$scale=0) {
// carica immagine
     if(!is_file($sourceimage)) {
         $this->error='The image does not exist.';
          return false;
     }
      //detect type  and process accordingly

		 $srcImg = new stdClass();

     $size =getimagesize($sourceimage);
     switch( $size["mime"]){
          case "image/jpeg":
          $srcImg->res =imagecreatefromjpeg($sourceimage);
          $srcImg->type="jpeg";
     break;
     case "image/gif":

          $srcImg->res =imagecreatefromgif($sourceimage);

          $srcImg->type="gif";
     break;
     case "image/png":

          $srcImg->res =imagecreatefrompng($sourceimage);
          $srcImg->type='png';
     break;
     default:
			$srcImg->res =false;
     break;
     }
		if($srcImg->res){
			if($scale != 0){
				$sw = imagesx($srcImg->res);
				$scalew =  (int) ($sw * $scale /100);
				$scaledRes = imagescale($srcImg->res,$scalew);
				imagedestroy($srcImg->res);
				$srcImg->res = $scaledRes;
			}     
			$sw = imagesx($srcImg->res);
			$sh = imagesy($srcImg->res);

			imagecolortransparent($srcImg->res, imagecolorat($srcImg->res, 0, 0));

// imagealphablending($srcImg->res, false);
// imagesavealpha($srcImg->res, true);
			return imagecopymerge($this->main->img_res, $srcImg->res,  $dx, $dy, $sx, $sy, $sw, $sh, 100);	
		} else {
			return false;
		}
    }


private function caricaImmagine($sourceimage){
     if(!is_file($sourceimage)) {
          return false;
     }
//detect type  and process accordingly

     $size =getimagesize($sourceimage);
     switch( $size["mime"]){
          case "image/jpeg":
          return imagecreatefromjpeg($sourceimage);
     break;
     case "image/gif":
          return imagecreatefromgif($sourceimage);
     break;
     case "image/png":
          return imagecreatefrompng($sourceimage);
     break;
     default:
      return false;
     break;
     }  
}


   function impose2($bgFile,$imageFile,$width,$height) {

// $bgFile = __DIR__ . "/uploads/debug/4-riposizionata.jpg"; // 580*597
// $imageFile = __DIR__ . "/stamps/cracco-1.png"; // 580*597

      $x = $width;
      $y = $height;

      // dimensions of the final image
      $final_img = imagecreatetruecolor($x, $y);

      // Create our image resources from the files

      $image_1 = $this->caricaImmagine($bgFile);
      $image_2 = $this->caricaImmagine($imageFile);

      // $image_1 = imagecreatefrompng($bgFile);
      // $image_2 = imagecreatefrompng($imageFile);

      // Enable blend mode and save full alpha channel
      imagealphablending($final_img, true);
      imagesavealpha($final_img, true);

      // Copy our image onto our $final_img
      imagecopy($final_img, $image_1, 0, 0, 0, 0, $x, $y);
      imagecopy($final_img, $image_2, 0, 0, 0, 0, $x, $y);

// imagepng($final_img, 'uploads/nuova_immagine.png');
      imagedestroy($this->main->img_res);
      $this->main->img_res = $final_img;
      return true;
}

   function scale($newWidth) {

      $sw = imagesx($this->main->img_res);
      $sh = imagesy($this->main->img_res);
      $newHight = (int) ($newWidth*$sh/$sw);
      return $this->scale2($newWidth,$newHight);
    }

   function scale2($newWidth,$newHighth) {
      $imageWidth = imagesx($this->main->img_res);
      $imageHeight = imagesy($this->main->img_res);

      $source = $this->main->img_res;
      $thumb = imagecreatetruecolor($newWidth, $newHighth);
      imagecopyresized($thumb, $source, 0, 0, 0, 0, $newWidth, $newHighth, $imageWidth, $imageHeight);
//      imagepng($thumb,'uploads/debug/thumb.png');

      imagedestroy($source);

      $source = imagecreatetruecolor($newWidth, $newHighth);
      $retVal = imagecopy($source,$thumb,0,0,0,0,$newWidth, $newHighth);

//      imagepng($source,'uploads/debug/sourceafter.png');

      $this->main->img_res = $source;

      return true;
    }

   function scale3($newWidth,$newHight) {
      return $this->scale2($newWidth,$newHight);
    }
   function rotate($angle) {
      $rotatedRes = imagerotate($this->main->img_res,$angle);
      imagedestroy($this->main->img_res);
      $this->main->img_res = $rotatedRes;
      return true;
    }                 
}