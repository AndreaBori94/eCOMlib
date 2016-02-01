    <?php
    /*
     Author : Trev Tune (Jayzantel@gmail.com)
     Name : Simple Image Editor (SImEdi)
     Description : Allows you to edit your images on the fly using the available plugin.
    */

    class SImEdi {
     public $type='png'; //Type of Image (png,gif,jpeg or bmp)
     public $img;//Path to image
     public $img_res;//Do not reset this
     public $loaded_plugins=array();
     public $error;

      public function __construct($img=false) {
     if($img) 
        $this->load($img);
     }

     /*Creates a new image with the name provided
     *@$h=height of image
     *@$w=width of image
     */
     public function create($name='uploads/simedi_image.png',$w=1360,$h=768) {
      if($this->img_res=imagecreatetruecolor($w,$h)) {
          $this->img=$name;
          $this->save($name);
          $this->load($name);
          return $this->img_res;
     }
     return false();
     }

     //Loads the image specified by $file
    function load($file) {

     //if it does not exist
     if(!is_file($file)) {
         $this->error='The image does not exist.';
          return false;
     }
      //detect type  and process accordingly

         $size =getimagesize($file);
         switch( $size["mime"]){
          case "image/jpeg":
          $this->img_res =imagecreatefromjpeg($file);
          $this->type="jpeg";
     break;
     case "image/gif":

          $this->img_res =imagecreatefromgif($file);

          $this->type="gif";
     break;
     case "image/png":

          $this->img_res =imagecreatefrompng($file);
          $this->type='png';
     break;
     default:
 $this->error='Invalid extension.';     
  $this->img_res =false;
     break;
     }

      $this->height= imagesx($this->img_res);
      $this->width= imagesy($this->img_res);
      $this->img=$file;

    return $this->img_res;

    }

    /*
    Saves the image
    $to=name of image e.g path/to/img.jpg
    */
     public function save($to=false) {
      $to=$to ? $to:$this->image;
    if(is_file($to))
       unlink($to);

    //detect type  and process accordingly

    switch($this->type){
    case "jpeg":
       $ret=@ imagejpeg($this->img_res,$to);
    break;
    case "gif":
       $ret=@ imagegif($this->img_res,$to);
    break;
    case "png":
       $ret=@ imagepng($this->img_res,$to);
    break;
    default:
       $ret =false;
    break;
    }
    if(!$ret)
       $this->error='Image could not be saved';
    return $ret;
    }

    /*
    *The real editing is done by plugins.
    *This function loads the specified plugin (check examples)
    */
    function plugin($name) {
       if(is_array($name)) {
    foreach ($name as $i) {
       $this->plugin($i);
      }
     return;
    }
    //If it is already loaded
    if(in_array($name,$this->loaded_plugins))
      return true;
    $namef='SE_' . strtolower($name);
      if (! is_file('plugins/' . $namef . '.php')) {
      $this->error='No Such Plugin ( ' . $name . ')';
      return false;
    }
    include 'plugins/' . $namef . '.php';
    $this-> {$name}=new $namef ($this);
    $this->loaded_plugins[]=$name;
    return true;
   }

     function color($r=25,$g=0,$b=255) {
        return imagecolorallocate($this->img_res,$r,$g,$b);
       }


     function display() {
// non va      
        return imagewbmp($this->img_res);
       }

     function clean() {
// non va      
        return imagedestroy($this->img_res);
       }

    }//End of class