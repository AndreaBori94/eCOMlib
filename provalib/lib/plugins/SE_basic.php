     <?php
     /*
     @author => trev Tune (http://phpmyseo.tk)
     @licence => GPL 2
     */
    class SE_basic {
    private $main;

    function __construct($main) {

      $this->main=$main;
    }

    function rotate($angle,$color=0) {
    $r=imagerotate($this->main->img_res,$angle,$color);
if($r) 
return $this->reload($r);
}

//Flips an image /gives a mirror effect

function flip ($x=0,$y=0)
{
        $tmp = imagecreatetruecolor(1, $this->main->height);
    
    $x2 = $x +$this->main->width - 1;
    for ($i = (int) floor(($this->main->width - 1) / 2); $i >= 0; $i--)
    {
        // Backup right stripe    
     imagecopy($tmp,   $this->main->img_res, 0,0,  $x2 - $i, $y, 1, $this->main->height);
        // Copy left stripe to the right.
        imagecopy($this->main->img_res, $this->main->img_res, $x2 - $i, $y, $x + $i,  $y, 1, $this->main->height);
        // Copy backuped right stripe to the left.
        imagecopy($this->main->img_res, $tmp,   $x + $i,  $y, 0, 0,  1, $this->main->height);
    }
    imagedestroy($tmp);
    return true;

} 
    //Not working on some hosts
    function resize($w=300,$h=200) {
       $temp = imagecreatetruecolor($w, $h);
        imagecopyresampled($temp, $this->main->img_res, 0, 0, 0, 0, $w,$h, $this->main->width, $this->main->height);
        $this->reload($temp);
        imagedestroy($temp);
    }
    function crop($h,$w,$x=0,$y=0) {

    if($this->main->img_res){
    // Create a blank image
      $destination_handle=ImageCreateTrueColor($w,$h); 
        // Put the cropped area onto the blank image
    $check=ImageCopyResampled($destination_handle,$this->main->img_res,0,0,$x,$y,$w,$h,$w,$h);
    $this->reload($destination_handle);
   }
    }

    function add_text($string,$color=array('red'=>0,'green'=>5,'blue'=>200),$x=0,$y=0,$font=5) {
    $color=$this->main->color($color['red'],$color['green'],$color['blue']);

   if(!imagestring($this->main->img_res,$font,$x,$y,$string,$color)) {
    $this->error='Can not add text to image';
   return false;
  }
 }
    function reload($res=false) {
    if($res) {
$fn='image' . $this->main->type;
    $fn($res,$this->main->img);
     $this->main->load($this->main->img);
    }
   }
  }//End of class                                         