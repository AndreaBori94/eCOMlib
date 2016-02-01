    <?php
    /*
    @package : Effects plugin
    @author : Trev Tune (http://phpmyseo.tk ) (jayzantel@gmail.com)
    WARNING : MOST OF THE FUNCTIONS ARE SELF EXPLANATORY SO LITTLE COMMENTING IS INCLUDED.
            TESTED WITH .PNG AND .JPG ONLY

    */
    class SE_effects {

    private $main;

    function __construct($main) {

       $this->main=$main;
    }

    function blur($level=2) {

      for( ;$level>0;$level--) {
        imagefilter($this->main->img_res, IMG_FILTER_GAUSSIAN_BLUR);
    }
   }

    function sharpen($level=3) {
     for( ;$level>0;$level--){
       $matrix = array(array(-1,-1,-1),array(-1,16,-1),array(-1,-1,-1));
        $divisor =8;
        $offset =0;
    imageconvolution($this->main->img_res,$matrix,$divisor,$offset);
      }
    }

    function emboss() {
       imagefilter($this->main->img_res, IMG_FILTER_EMBOSS);
    }

    //Reverses all colors of the image
    function negate() {

       imagefilter($this->main->img_res, IMG_FILTER_NEGATE);

    }

    //Converts the image into grayscale.
       function gray_scale() {
           imagefilter($this->main->img_res, IMG_FILTER_GRAYSCALE);
    }

    //Changes the brightness of the image.
    //-255 is minimum level and 255 is maximum level
    function brightness($level=80) {
       imagefilter($this->main->img_res, IMG_FILTER_BRIGHTNESS,$level);
    }

    //Changes the contrast of the image
    //-100 maximum contrast 100 minimum contrast
    function contrast($level=-50) {
       imagefilter($this->main->img_res, IMG_FILTER_CONTRAST,$level);
    }

    function colorize($red=250,$green=25,$blue=200) {
       imagefilter($this->main->img_res,IMG_FILTER_COLORIZE,$red,$green,$blue);
    }

    //highlight the edges in the image
    function edge() {
       imagefilter($this->main->img_res, IMG_FILTER_EDGEDETECT);
    }

    //achieve a "sketchy" effect.
     function sketch() {
        imagefilter($this->main->img_res,IMG_FILTER_MEAN_REMOVAL );
    }

    function sepia() {
        imagefilter($this->main->img_res,IMG_FILTER_GRAYSCALE);
        imagefilter($this->main->img_res,IMG_FILTER_COLORIZE,90,60,40);
       }
     }//End of class    