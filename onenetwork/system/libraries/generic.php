<?php
if(!$_SESSION)
{
  session_start();
 // $_SESSION["user_id"] = 1;
}
/*******************************************************************************
 * 
 * Function:This is used for deleting the string in json
 *
 *
 * Return Type: Json Array
 * Author :anila
 *  USAGE:  
 * 
 *******************************************************************************/

class jsonstring
{
//by anila
	function array_insert($userid,&$array, $position, $insert,$arr1)
	{
	    include("/var/www/html/includes/".$userid."/".$userid.".php");
	    if (is_int($position)) {
		array_splice($array, $position, 0, $insert);
    
	    } else {
		$pos   = array_search($position, array_keys($array));
		$array = array_merge(array_slice($array, 0, $pos),$insert, array_slice($array, $pos));
	    }
		$json1=json_encode($arr1);
		$str=file_get_contents("/var/www/html/includes/".$userid."/".$userid.".php");
		$str=str_replace($promotions, $json1,$str);
		file_put_contents("/var/www/html/includes/".$userid."/".$userid.".php",$str);
	}

//by anila
	function custom_unset($userid,&$array=array(), $val,$arr1) {
	include("/var/www/html/includes/".$userid."/".$userid.".php");
		if(($key = array_search($val, $array)) !== false) {
		    unset($array[$key]);
		  $array = array_values($array);
		}
		$json2=json_encode($arr1);
		$str=file_get_contents("/var/www/html/includes/".$userid."/".$userid.".php");
		$str=str_replace($promotions, $json2,$str);
		file_put_contents("/var/www/html/includes/".$userid."/".$userid.".php",$str);
	}
}
?>