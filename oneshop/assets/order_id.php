 <?php
$count=1;


function random_string($length) {
    $s_key = '';
    $a_keys = array_merge(range(0, 9));

    for ($i = 0; $i < $length; $i++) {
        $s_key .= $a_keys[array_rand($a_keys)];
    }
$s_key="OS".$s_key;
	mysql_connect("localhost","root","venkatesh");
		mysql_select_db("db_oneidnet");
		$data = mysql_query("SELECT order_num FROM os_orders WHERE order_num='$s_key'");
		$rec = mysql_num_rows($data);
     $file = fopen("order_id.txt", "r");
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
	            	$myfile = fopen("order_id.txt", "a") or die("Unable to open file!");
			fwrite($myfile,$s_key."\n");
		            echo $s_key." Id is Added to txt file!";

	            }else{
	               // echo "Already exist in the DB";
	            }
 	fclose($myfile);

}
for($target=1;$target<=1000;$target++)
{
random_string(20);
}



?>

