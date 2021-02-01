<?php
$dir    = 'temp';
$files2 = scandir($dir, 1);
for($i=0;$i<count($files2)-2;$i++){
	$file= rtrim($files2[$i],'.jpg');
  $file= substr($file,-19,10)."<br>";
  $cdate = new DateTime();
 $cdate1 =$cdate->format('Y-m-d')."<br>";
if($file!=$cdate1){
	echo unlink ($dir."/".$files2[$i]); 
}
}
?>
