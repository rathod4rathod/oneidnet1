<?php
if(!$_SESSION)
{
  session_start();
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
	function array_insert(&$array, $position, $insert,$arr1)
	{
	    include("includes/".$_SESSION['user_id']."/".$_SESSION['user_id'].".php");
	    if (is_int($position)) {
		array_splice($array, $position, 0, $insert);
    
	    } else {
		$pos   = array_search($position, array_keys($array));
		$array = array_merge(array_slice($array, 0, $pos),$insert, array_slice($array, $pos));
	    }
		$json1=json_encode($arr1);
		$str=file_get_contents("includes/".$_SESSION['user_id']."/".$_SESSION['user_id'].".php");
		$str=str_replace($adverts, $json1,$str);
		file_put_contents("includes/".$_SESSION['user_id']."/".$_SESSION['user_id'].".php",$str);
	}

//by anila
	function custom_unset(&$array=array(), $val=0,$arr1) {
	include("includes/".$_SESSION['user_id']."/".$_SESSION['user_id'].".php");
		if(($key = array_search($val, $array)) !== false) {
		    unset($array[$key]);
		  $array = array_values($array);
		}
		$json2=json_encode($arr1);
		$str=file_get_contents("includes/".$_SESSION['user_id']."/".$_SESSION['user_id'].".php");
		$str=str_replace($adverts, $json2,$str);
		file_put_contents("includes/".$_SESSION['user_id']."/".$_SESSION['user_id'].".php",$str);
	}
  function displayname()
  {
    echo "pavani madam";
  }
}
?>
