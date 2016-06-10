<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Code extends MY_Controller {
    
    private $font     = '';
    private $fontSize = 10;   // GD1 in px ; GD2 in point
    private $marge    = 10;   // between barcode and hri in pixel
    private $x        = 125;  // barcode center
    private $y        = 125;  // barcode center
    private $height   = 50;   // barcode height in 1D ; module size in 2D
    private $width    = 2;    // barcode height in 1D ; not use in 2D
    private $angle    = 0;      // rotation in degrees : nb : non horizontable barcode might not be usable because of pixelisation
    private $type     = 'code128';
    private $code     = '123'; // barcode, of course ;)
    
    public function __construct() {
        parent::__construct();
        $this->font = FCPATH . 'vendor/font/captcha/captcha5.ttf';
        require_once APPPATH . 'third_party/barcode.php';
    }
    
    public function index()
    {
        // -------------------------------------------------- //
        //            ALLOCATE GD RESSOURCE
        // -------------------------------------------------- //
        $im     = imagecreatetruecolor(300, 300);
        $black  = ImageColorAllocate($im,0x00,0x00,0x00);
        $white  = ImageColorAllocate($im,0xff,0xff,0xff);
        $red    = ImageColorAllocate($im,0xff,0x00,0x00);
        $blue   = ImageColorAllocate($im,0x00,0x00,0xff);
        imagefilledrectangle($im, 0, 0, 300, 300, $white);
        
        // -------------------------------------------------- //
        //                      BARCODE
        // -------------------------------------------------- //
        $data = Barcode::gd($im, $black, $this->x, $this->y, $this->angle, $this->type, array('code'=>$this->code), $this->width, $this->height);
        
        // -------------------------------------------------- //
        //                        HRI
        // -------------------------------------------------- //
        if ( isset($this->font) ){
          $box = imagettfbbox($this->fontSize, 0, $this->font, $data['hri']);
          $len = $box[2] - $box[0];
          Barcode::rotate(-$len / 2, ($data['height'] / 2) + $this->fontSize + $this->marge, $this->angle, $xt, $yt);
          imagettftext($im, $this->fontSize, $this->angle, $this->x + $xt, $this->y + $yt, $blue, $this->font, $data['hri']);
        }
        
        
        $rot = imagerotate($im, -90, $white);
        imagedestroy($im);
        $im     = imagecreatetruecolor(900, 300);
        $black  = ImageColorAllocate($im,0x00,0x00,0x00);
        $white  = ImageColorAllocate($im,0xff,0xff,0xff);
        $red    = ImageColorAllocate($im,0xff,0x00,0x00);
        $blue   = ImageColorAllocate($im,0x00,0x00,0xff);
        imagefilledrectangle($im, 0, 0, 900, 300, $white);

        // Barcode rotation : 90�
        $angle = 90;
        $data = Barcode::gd($im, $black, $this->x, $this->y, $angle, $this->type, array('code'=>$this->code), $this->width, $this->height);
        Barcode::rotate(-$len / 2, ($data['height'] / 2) + $this->fontSize + $this->marge, $angle, $xt, $yt);
        imagettftext($im, $this->fontSize, $angle, $this->x + $xt, $this->y + $yt, $blue, $this->font, $data['hri']);
        imagettftext($im, 10, 0, 60, 290, $black, $this->font, 'BARCODE ROTATION : 90�');

        // barcode rotation : 135
//        $angle = 135;
//        Barcode::gd($im, $black, $this->x+300, $this->y, $angle, $this->type, array('code'=>$this->code), $this->width, $this->height);
//        Barcode::rotate(-$len / 2, ($data['height'] / 2) + $this->fontSize + $this->marge, $angle, $xt, $yt);
//        imagettftext($im, $this->fontSize, $angle, $this->x + 300 + $xt, $this->y + $yt, $blue, $font, $data['hri']);
//        imagettftext($im, 10, 0, 360, 290, $black, $font, 'BARCODE ROTATION : 135�');

        // last one : image rotation
        imagecopy($im, $rot, 580, -50, 0, 0, 300, 300);
        imagerectangle($im, 0, 0, 299, 299, $black);
        imagerectangle($im, 299, 0, 599, 299, $black);
        imagerectangle($im, 599, 0, 899, 299, $black);
        imagettftext($im, 10, 0, 690, 290, $black, $this->font, 'IMAGE ROTATION');
        /**/
  
        // -------------------------------------------------- //
        //                    MIDDLE AXE
        // -------------------------------------------------- //
        imageline($im, $this->x, 0, $this->x, 250, $red);
        imageline($im, 0, $this->y, 250, $this->y, $red);
        
        // -------------------------------------------------- //
        //                  BARCODE BOUNDARIES
        // -------------------------------------------------- //
        for($i=1; $i<5; $i++){
          $this->drawCross($im, $blue, $data['p'.$i]['x'], $data['p'.$i]['y']);
        }

        // -------------------------------------------------- //
        //                    GENERATE
        // -------------------------------------------------- //
        header('Content-type: image/gif');
        imagegif($im);
        imagedestroy($im);
       // exit;
    }
    
    private function drawCross($im, $color, $x, $y){
        imageline($im, $x - 10, $y, $x + 10, $y, $color);
        imageline($im, $x, $y- 10, $x, $y + 10, $color);
    }
}