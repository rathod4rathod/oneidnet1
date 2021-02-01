<?php
/******************************************************************************
 * 
 * Function: 
 * It Converts the uploaded images into the real images and 
 * checks whether any malware in present in the image. If there is any
 * malware detected it returns the false
 * 
 * Author: Raviteja <raviteja@oneidnet.com>
 * Date Written: Mar 28, 2016
 * Return Type: Array
 *
 * 
 ******************************************************************************/

class ConvertFile {  
  
	//25032016 - RAVITEJA
	function convertImage($originalImage, $outputImage, $quality)
	{
	  // jpg, png, gif or bmp?
	  $exploded = explode('.',$originalImage);
	  $ext = $exploded[count($exploded) - 1]; 
	  $size = getimagesize($originalImage);
	  if(is_array($size)) {
		  switch($size["mime"]){
			case "image/jpeg":
				$im = imagecreatefromjpeg($originalImage); //jpeg file
				break;
			case "image/gif":
				$im = imagecreatefromgif($originalImage); //gif file
				break;
			case "image/png":
				$im = imagecreatefrompng($originalImage); //png file
				break;
			default: 
				$im=false;
				break;
			}
			if($im) {
			  // quality is a value from 0 (worst) to 100 (best)
			  imagejpeg($im, $outputImage, $quality);
			  imagedestroy($im);
			  return $outputImage;
			} else {
				unlink($originalImage);
				return false;
			}
		} else {
			unlink($originalImage);
			return false;
		}
	} 
}
