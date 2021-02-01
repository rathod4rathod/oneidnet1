<?php
//geoip_time_zone_by_country_and_region is the php function to get the timezone based on the country code passed as the parameter to it.
include("My_PHPMailer.php");
$date=date("Y-m-d H:i");
$nextday=date('Y-m-d H:i',strtotime($date .'+1 day'));
#echo "current datetime".$date."----".$nextday;
$content=file_get_contents("/home/pavani/Desktop/edata.txt");
//print_r($content);
//echo $content;
$file_arry=explode("\n",$content);
$i=0;
while($i<count($file_arry)-1){
	$s_file_content=$file_arry[$i];
	$s_contents_arry=explode("~",$s_file_content);
	$expire_date=$s_contents_arry[1];
	$s_datetime="";
	$date_arry=explode(" ",$expire_date);
	$date_str=$date_arry[0];	
	$time_str=$date_arry[1];
	$time_arry=explode(":",$time_str);
	$s_datetime=$date_str." ".$time_arry[0].":".$time_arry[1];
	//echo $expire_date."\n";
	if(strtotime($s_datetime)==strtotime($nextday)){
		//echo "equal";
		$mailobj=new My_PHPMailer();
		$mresult=$mailobj->send_mail("pavani5642@gmail.com","test mail","Once again test mail to test the mails");
	}
$i++;
}

?>
