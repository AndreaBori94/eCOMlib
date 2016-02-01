<?php
include 'image_editor.php';

function localScale($res,$newWidth,$newHight) {
      $scaledRes = imagescale($res,$newWidth,$newHight);
      imagedestroy($res);
      $res = $scaledRes;
      return true;
}



$debugImages = false;

$file2Process = urldecode(trim($_POST['filename']));
$jsonCommand = json_decode($_POST['command']);
$gender = trim($_POST['gender']);

// [{"type":"top","x":244,"y":15},{"type":"right","x":351,"y":185},{"type":"bottom","x":234,"y":310},{"type":"left","x":166,"y":182}]

foreach ($jsonCommand as $command) {
  switch ($command->type) {
    case 'top':
      $xtop = $command->x;
      $ytop = $command->y;
      break;
    case 'right':
      $xright = $command->x;
      $yright = $command->y;
      break;
    case 'bottom':
      $xbottom = $command->x;
      $ybottom = $command->y;
      break;
    case 'left':
      $xleft = $command->x;
      $yleft = $command->y;
      break;
    default:
//
      break;
  }
}

$xC = (int) round(($xtop+$xbottom)/2.);
$yC = (int) round(($ytop+$ybottom)/2.);

$hi = sqrt(pow(($xtop-$xbottom),2)+pow(($ytop-$ybottom),2));



if($xtop != $xbottom ){
// formula corrente 
  $mvi = ($ytop-$ybottom)/($xtop-$xbottom);

  if($xright != $xbottom ){
    $mp2 = ($yright-$ybottom)/($xright-$xbottom);
//    $alpha2 = atan(($mp2-$mvi)/(1.+$mp2*$mvi));
    $alpha2 = atan2(($mp2-$mvi),(1.+$mp2*$mvi));
    $l2 = sqrt(pow(($xright-$xbottom),2)+pow(($yright-$ybottom),2));
    $d2 = abs($l2 * sin($alpha2));
  } else {
    $d2 = 0.;
  }

  $height = (int) round($hi);
//  $rotation = M_PI / 2. + atan($mvi);
  $rotation = M_PI / 2. + atan2(($ytop-$ybottom),($xtop-$xbottom));
  $width = (int)round(2*$d2);
} else {
// asse verticale  
  $height = (int) round($hi);
  $rotation = 0.;
  $d2 = abs($xright-$xtop); 
  $width = (int)round(2*$d2);  
}

$hi = $height;
$wi = $width;
// qui conosco i parametri dell'ellissi
// centro H W rotazione

// converto rotazione in gradi

// per ora solo un caso cracco
// VERSIONE PRECEDENTE
/*
$hi = sqrt(pow(($xtop-$xbottom),2)+pow(($ytop-$ybottom),2));
$wi = sqrt(pow(($xright-$xleft),2)+pow(($yright-$yleft),2));
$mvi = ($ytop-$ybottom)/($xtop-$xbottom);
$mhi = ($yright-$yleft)/($xright-$xleft);
*/

// cartonato 1
/*
$xctop = 391;
$yctop = 41;
$xcright = 451;
$ycright = 125;
$xcbottom = 397;
$ycbottom = 203;
$xcleft = 342;
$ycleft = 130;
*/

// cartonato 2
/*
$xctop = 398;
$yctop = 68;
$xcright = 440;
$ycright = 136;
$xcbottom = 396;
$ycbottom = 202;
$xcleft = 354;
$ycleft = 136;
*/
// cracco-1
// cartonato 2

if($gender == 'M'){
/*
// primo tentativo  
  $xctop = 308;
  $yctop = 144;
  $xcright = 354;
  $ycright = 206;
  $xcbottom = 308;
  $ycbottom = 282;
  $xcleft = 266;
  $ycleft = 206;
*/
  $xctop = 335;
  $yctop = 156;
  $xcright = 380;
  $ycright = 224;
  $xcbottom = 335;
  $ycbottom = 302;
  $xcleft = 284;
  $ycleft = 224; 
  $stampfile = 'stamps/Cracco_scontorno_02.png';
} else {
/*
// primo tentativo
  $xctop = 312;
  $yctop = 153;
  $xcright = 347;
  $ycright = 220;
  $xcbottom = 293;
  $ycbottom = 266;
  $xcleft = 263;
  $ycleft = 217;
*/
  $xctop = 334;
  $yctop = 135;
  $xcright = 387;
//  $xcright = 349;
  $ycright = 202;
  $xcbottom = 343;
  $ycbottom = 273;
  $xcleft = 292;
//  $xcleft = 262;
  $ycleft = 206; 

  $stampfile = 'stamps/assistente_scontornata_02.png';
}

$craccoX = (int)(($xctop+$xcbottom)/2.);
$craccoY = (int)(($yctop+$ycbottom)/2.);


$hci = sqrt(pow(($xctop-$xcbottom),2)+pow(($yctop-$ycbottom),2));
$wci = sqrt(pow(($xcright-$xcleft),2)+pow(($ycright-$ycleft),2));

if($xctop != $xcbottom ){
  $mcvi = ($yctop-$ycbottom)/($xctop-$xcbottom);

  if($xright != $xbottom ){
    $mcp2 = ($ycright-$ycbottom)/($xcright-$xcbottom);
    $alphac2 = atan2(($mcp2-$mcvi),(1.+$mcp2*$mcvi));
//    $alphac2 = atan(($mcp2-$mcvi)/(1.+$mcp2*$mcvi));
    $lc2 = sqrt(pow(($xcright-$xcbottom),2)+pow(($ycright-$ycbottom),2));
    $dc2 = abs($lc2 * sin($alphac2));
  } else {
// questo caso non può essere perchè ellisse cracco non è mai schiacciata    
    $dc2 = 0.;
  }

  $cheight = (int) round($hci);  
  $rotationc = M_PI / 2. + atan2(($yctop-$ycbottom),($xctop-$xcbottom));
//  $rotationc = M_PI / 2. + atan($mcvi);
  $widthc = (int)round(2*$dc2);
} else {
// ASSE VERTICALE  
  $rotationc = 0;
  $dc2 = abs($xcright-$xctop); 
  $widthc = (int)round(2*$dc2);   
}

// potrebbe essere l'inverso
$rapph = $hi/$hci;
$rappw = $wi/$wci;
//$avalfa = rad2deg(($alphav+$alphah)/2.);
$avalfa = rad2deg($rotation - $rotationc);
// if($avalfa > 135.) {$avalfa -= 180.; }

  $imageSize = getimagesize($file2Process);
$ihe = $imageSize[1];
$iwi = $imageSize[0];
	$se=new SImEdi();
	$se->create();
	$se->load($file2Process);

// calcolo dimesioni max quadrato possibile intorno a centro
  $sh = ((($ihe-$yC)<$yC)?($ihe-$yC):$yC);
  $sw = ((($iwi-$xC)<$xC)?($iwi-$xC):$xC);

if($debugImages) $se->save('uploads/debug/0-originale.png');

// crop
  $xbase = $xC - $sw;
  $ybase = $yC - $sh;
  $wid = 2 * $sw;
  $hei = 2 * $sh;
  $se->plugin('basic');
  $retVal = $se->basic->crop($hei,$wid,$xbase,$ybase); 

if($debugImages) $se->save('uploads/debug/1-primocrop.png');


  $imageWidth = imagesx($se->img_res);
  $imageHeight = imagesy($se->img_res);
  $imageCenterX = (int) ($imageWidth / 2.);
  $imageCenterY = (int) ($imageHeight / 2.);

// rotate
  $retVal = null;
  $retVal = $se->basic->rotate($avalfa);   

  if($retVal){
    $rotMsg = 'Rotazione OK';
  } else {
    $rotMsg = 'Rotazione non riuscita';
  }

if($debugImages) $se->save('uploads/debug/2-rotazione.png');


  $imageWidth = imagesx($se->img_res);
  $imageHeight = imagesy($se->img_res);
  $imageCenterX = (int) ($imageWidth / 2.);
  $imageCenterY = (int) ($imageHeight / 2.);

// vedremo se serve crop


// resize


// FACCIO QUI

//////////////////////////////////////////////////////////////////////////////////////

//the resize will be a percent of the original size
$xpercent = 1./ $rappw;
$ypercent = 1. / $rapph;

$mynewwidth = $imageWidth * $xpercent;
$mynewheight = $imageHeight * $ypercent;



$se->plugin('manipulation');
$retVal = $se->manipulation->scale2($mynewwidth, $mynewheight);

/* QUESTO FINISCE NELLA CALL

$thumb = imagecreatetruecolor($mynewwidth, $mynewheight);
imagecopyresized($thumb, $source, 0, 0, 0, 0, $mynewwidth, $mynewheight, $imageWidth, $imageHeight);  
imagepng($thumb,'uploads/debug/thumb.png');


imagedestroy($source);

$source = imagecreatetruecolor($mynewwidth, $mynewheight);
$retVal = imagecopy($source,$thumb,0,0,0,0,$mynewwidth, $mynewheight);


imagepng($source,'uploads/debug/sourceafter.png');

$se->img_res = $source;


//  $retVal = localScale($se->img_res,(int)($imageWidth/$rappw),(int)($imageHeight/$rapph)); 

//  $se->plugin('manipulation');
//  $retVal = $se->manipulation->scale2((int)($imageWidth/$rappw),(int)($imageHeight/$rapph)); 
//  $retVal = $se->manipulation->scale2((int)($rappw*$wid),(int)($rapph*$hei)); 

*/

  if($debugImages) $se->save('uploads/debug/3-resize.png');

  $imageWidth = imagesx($se->img_res);
  $imageHeight = imagesy($se->img_res);
  $imageCenterX = (int) ($imageWidth / 2.);
  $imageCenterY = (int) ($imageHeight / 2.);

	$se->save($file2Process);
	$se->clean();	
  $imageSize = getimagesize($file2Process);

$se->create('uploads/simedi_image.png',620,618);

$faccia =new SImEdi();
$faccia->create();
$faccia->load($file2Process);
$facciaW  = imagesx($faccia->img_res);
$facciaH  = imagesy($faccia->img_res);
$dst_x = $craccoX - (int)($facciaW/2);
$dst_y = $craccoY - (int)($facciaH/2);
// sposta immagine
$retValMerge = imagecopymerge($se->img_res, $faccia->img_res, $dst_x, $dst_y, 0, 0, $facciaW, $facciaH, 100);
$se->save($file2Process);
$imageWidth = imagesx($se->img_res);
$imageHeight = imagesy($se->img_res);
if($debugImages) $se->save('uploads/debug/4-riposizionata.png');

// $se->plugin('manipulation');

$se->manipulation->impose2($file2Process,$stampfile,$imageWidth,$imageHeight);

 if($debugImages) $se->save('uploads/debug/5-finale.png');

//  $se->load('stamps/cartonato2.png');
  $se->save($file2Process);
  $se->clean(); 

$imageSize = getimagesize($file2Process);

$json = json_encode(array(
  'name' => '',
  'type' => '',
  'dataUrl' => '',
  'imagesize' => $imageSize,
  'width' => $imageSize[0],
  'height' => $imageSize[1],
  'extension' => '',
  'targetfile' => $file2Process,
  'rotazione' => $avalfa,
  'stato_rotazione' => $rotMsg
));

echo $json;
?>