 <?php
function random_string($length) {
    $s_key = '';
    $a_keys = array_merge(range(0, 9), range('a', 'z'));

    for ($i = 0; $i < $length; $i++) {
        $s_key .= $a_keys[array_rand($a_keys)];
    }
	mysql_connect("localhost","root","venkatesh");
		mysql_select_db("db_oneidnet");
		$data = mysql_query("SELECT store_id FROM os_all_store WHERE store_id='$s_key'");
		$rec = mysql_num_rows($data);
    
    $file = fopen("store_id.txt", "r");
      $i=0; $ferror=0;
      while(!feof($file)){
          $line = fgets($file);
          $line=trim($line,"\n");
        $arr[$i]=$line;
       if($arr[$i]==$s_key){
        $ferror=1;
       }
      $i++;
      }
		    if($rec == 0 && $ferror==0)
	            {
	            	$myfile = fopen("store_id.txt", "a") or die("Unable to open file!");
			fwrite($myfile,$s_key."\n");
		            echo $s_key." Id is Added to txt file!";
	            }else{
	               // echo "Already exist in the DB";
	            }
 	fclose($myfile);
  //  return $s_key;
}

for($target=0;$target<1000;$target++)
{
  echo random_string(8);
}

?>

