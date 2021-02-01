<?php
 require('system/libraries/Image_lib.php');
 
class imageresize extends CI_Controller {  

  function __construct() {
    parent::__construct();     
  }
/***************************************************************
  Manual: function to resize the image
  $source_image = image path ex:path/ima.jpg
  $target_image =   image path ex:path/ima.jpg
  $width = 45
  $height = 40
  
***************************************************************/
  
  function resize( $source_image , $target_image ,$width,$height) {
    
        $configi['image_library'] = 'gd2';
        $configi['source_image']	=$source_image;
        $configi['new_image']	=$target_image;
        $configi['create_thumb'] = false;
        $configi['maintain_ratio'] = false;
        $configi['width']	= $width;
        $configi['height']	= $height;
        $Image_lib=new CI_Image_lib($configi);
        $Image_lib->resize();
  }

}