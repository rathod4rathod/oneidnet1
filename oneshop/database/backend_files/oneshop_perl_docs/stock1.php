<?php
include("My_PHPMailer.php");
$dbconnect=mysql_connect("localhost","root","Weldone123");
mysql_select_db("db_oneidnet");
//$sql="select prods.product_aid,prods.quantity from os_products prods inner join os_all_store stores on prods.store_id=stores.store_aid where stores.store_aid=8;";
$content=file_get_contents("/home/pavani/Desktop/storeids.txt");
$file_arry=explode("\n",$content);
$i=0;
$stores_data=array();
//$products_data=array();

while($i<count($file_arry)-1){
	$file_str=$file_arry[$i];
	//echo $file_str."\n";
	$store_arry=explode("~",$file_str);
	$s_storeid=$store_arry[0];
	$s_owneremail=$store_arry[1];
	$prods_sql="select stores.store_aid,prods.product_aid as product_id,prods.quantity,prods.name from os_products prods inner join os_all_store stores on prods.store_id=stores.store_aid where stores.store_aid=".$s_storeid;
	$result=mysql_query($prods_sql);
	$j=0;	
	$tmp=array();
	$s_msg="";
	while($rows=mysql_fetch_array($result))
	{		
		//echo $rows["product_id"]."->".$rows["quantity"]."->".$rows["store_aid"]."\n";
		if($rows["quantity"]<=5){
			$tmp["store_id"]=$s_storeid;
			$tmp["owner_email"]=$s_owneremail;
			if($s_msg==""){
				$s_msg.=$rows["product_id"].":".$rows["name"];
			}
			else{
				$s_msg.="\n".$rows["product_id"].":".$rows["name"];
			}
			$tmp["msg"]=$s_msg;
		}
		
		$j++;
	}
	$stores_data[$i]=$tmp;	
	$i++;
}
//var_dump($stores_data);
/*for($k=0;$k<count($stores_data);$k++){
	if($stores_data[$k]!=0){
		echo $stores_data[$k]["store_id"]."\n";
	}
}*/
foreach($stores_data as $key=>$value){
	if(empty($value)){
		echo "empty array";
	}
	else{
		//echo $value["store_id"]."->".$value["owner_email"];
		$mailobj=new My_PHPMailer();
		$email=$value["owner_email"];
		$subject=$value["msg"];
		$mresult=$mailobj->send_mail($email,"Out of Stock",$subject);
		echo $mresult;
	}
}
?>
