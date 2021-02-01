<?php
include("My_PHPMailer.php");
$dbconnect=mysql_connect("localhost","root","Weldone123");
mysql_select_db("db_oneidnet");
$current_date=date("Y-m-d H:i:s");
$report_mode=$argv[1];
if($report_mode=="Hyper"){
  $yesterday_date=date("Y-m-d",strtotime("-1 day"));
  $start_date=$yesterday_date." 00:00:00";
  $end_date=$yesterday_date." 23:59:59";
}else{
  $month_date=date("Y-m-d",strtotime("-30 days"));
  $start_date=$month_date." 00:00:00";
  $end_date=$month_date." 23:59:59";
}
$s_storequery="SELECT store_aid,email,username,country_id FROM os_all_store stores INNER JOIN iws_profiles profiles ON stores.created_by=profiles.profile_id WHERE package='".$report_mode."'";
$store_result=mysql_query($s_storequery);
$owner_details=array();
$i=0;
$filepath="/home/pavani/Desktop/stores/";
$sno=1;
while($rows=mysql_fetch_array($store_result)){
  $store_dir=$filepath.$rows["store_aid"];	
  if(!file_exists($store_dir)){
    $result=mkdir($store_dir,0777);
  }
  $owner_details[$i]["owner_email"]=$rows["email"];
  $owner_details[$i]["username"]=$rows["username"];
  $owner_details[$i]["store_id"]=$rows["store_aid"];
  $i++;
}
$categories=array();

$result=mysql_query("select category_aid,category.name as cat_name,subcat.name as subcat_name,subcategory_aid from os_category category inner join os_subcategory subcat on category.category_aid=subcat.category_aid_fk");
$c=0;
while($rows=mysql_fetch_array($result)){
	//$tmp=array();
	$categories[$c]["category_id"]=$rows["category_aid"];
	$categories[$c]["category_name"]=$rows["cat_name"];
	$categories[$c]["subcategory_id"]=$rows["subcategory_aid"];
	$categories[$c]["subcategory_name"]=$rows["subcat_name"];
	$c++;
}
//var_dump($categories);

$subcategory_result=mysql_query("SELECT * FROM os_subcategory");
for($i=0;$i<count($owner_details);$i++){
	// code to generate the order report
	$orders_query="SELECT orders.order_num,prods.name,orders.transaction_id,orders.order_date,orders.quantity_str,orders.total_amount_str FROM os_orders orders inner join os_products prods on orders.product_id_str=prods.product_aid  WHERE store_id_fk=".$owner_details[$i]["store_id"];
	$orders_result=mysql_query($orders_query);
	$orders_cnt=mysql_num_rows($orders_result);
	if($orders_cnt>0){
		$filename=$filepath."/".$owner_details[$i]["store_id"]."/orders.xls";
		$ofile=fopen($filename,"a");
		$oheader="S.No.\tOrder Number\tProduct Name\tTransaction Id\tOrder date\tQuantity\tAmount\n";
		fwrite($ofile,$oheader);
		$sno=1;
		$total_amt=0;
		while($orows=mysql_fetch_array($orders_result)){
			$data_str="";
			$data_str=$sno."\t".$orows["order_num"]."\t".$orows["name"]."\t".$orows["transaction_id"]."\t".$orows["order_date"]."\t".$orows["quantity_str"]."\t".$orows["total_amount_str"]."\n";
			$total_amt+=$orows["total_amount_str"];
			fwrite($ofile,$data_str);
			$sno++;
		}//while loop end
		$ofooter="Total\t\t\t\t\t\t".$total_amt."\n";
		fwrite($ofile,$ofooter);
		fclose($ofile);
	} //if condition ends here
	// code to generate the cancellation report	
	$cancel_query="SELECT cancel.order_num,prods.name,cancel.transaction_id,cancel.ordered_on,cancel.quantity_str,cancel.total_amount_str,cancel.order_cancel_date FROM os_cancellation cancel inner join os_products prods on cancel.product_id_str=prods.product_aid  WHERE cancel.store_id_fk=".$owner_details[$i]["store_id"];
	//echo $cancel_query;
	$cancel_result=mysql_query($cancel_query);
	$cancel_cnt=mysql_num_rows($cancel_result);
	if($cancel_cnt>0){
		$total_amount=0;
		$filename=$filepath."/".$owner_details[$i]["store_id"]."/cancel.xls";
		$cfile=fopen($filename,"a");
		$cheader="S.No.\tOrder Number\tProduct Name\tTransaction Id\tOrder date\tQuantity\tAmount\tCancellation Date\n";
		fwrite($cfile,$cheader);
		$sno=1;
		while($crows=mysql_fetch_array($cancel_result)){
			$cdata_str="";
			$cdata_str=$sno."\t".$crows["order_num"]."\t".$crows["name"]."\t".$crows["transaction_id"]."\t".$crows["ordered_on"]."\t".$crows["quantity_str"]."\t".$crows["total_amount_str"]."\t".$crows["order_cancel_date"]."\n";
			$total_amount+=$crows["total_amount_str"];
			fwrite($cfile,$cdata_str);
			$sno++;
		}//while loop end
		$cfooter="Total\t\t\t\t\t\t".$total_amount."\t"."\n";
		fwrite($ofile,$cfooter);
		fclose($cfile);
	} //if condition ends here
	// code to generate the product wise report
	$psales_query="SELECT count(*) as orders_cnt,sales.product_id_str,sales.order_no,sum(sales.amount) as amount_cnt,prods.name,prods.Category,prods.subcategory_id FROM os_sales sales inner join os_products prods on sales.product_id_str=prods.product_aid  WHERE sales.store_id_fk=".$owner_details[$i]["store_id"]." group by product_id_str;";
	//echo $cancel_query;
	$psales_result=mysql_query($psales_query);
	$psales_cnt=mysql_num_rows($psales_result);
	if($psales_cnt>0){
		$total_amount=0;
		$filename=$filepath."/".$owner_details[$i]["store_id"]."/productwise_sales.xls";
		$pfile=fopen($filename,"a");
		$pheader="S.No.\tCategory Name\tSubcategory Name\tProduct Name\tNo of Orders\tAmount\n";
		fwrite($pfile,$pheader);
		$sno=1;
		while($prows=mysql_fetch_array($psales_result)){
			$pdata_str="";
			$pdata_str=$sno."\t";
			for($j=0;$j<count($categories);$j++){
				if($categories[$j]["subcategory_id"]==$prows["subcategory_id"]){
					$pdata_str.=$categories[$j]["category_name"]."\t".$categories[$j]["subcategory_name"]."\t";
				}
			}
			$pdata_str.=$prows["name"]."\t".$prows["orders_cnt"]."\t".$prows["amount_cnt"]."\n";
			$total_amount+=$prows["amount_cnt"];
			fwrite($pfile,$pdata_str);
			$sno++;
		}//while loop end
		$pfooter="Total\t\t\t\t\t".$total_amount."\t"."\n";
		fwrite($pfile,$pfooter);
		fclose($pfile);
	} //if condition ends here
	// code to generate the category wise report
	$csales_query="SELECT count(*) as orders_cnt,sales.product_id_str,sales.order_no,sum(sales.amount) as amount_cnt,prods.name,prods.Category,prods.subcategory_id FROM os_sales sales inner join os_products prods on sales.product_id_str=prods.product_aid  WHERE sales.store_id_fk=".$owner_details[$i]["store_id"]." group by prods.subcategory_id;";
	//echo $cancel_query;
	$csales_result=mysql_query($csales_query);
	$csales_cnt=mysql_num_rows($csales_result);
	if($csales_cnt>0){
		$total_amount=0;
		$filename=$filepath."/".$owner_details[$i]["store_id"]."/category_sales.xls";
		$sfile=fopen($filename,"a");
		$cheader="S.No.\tCategory Name\tSubcategory Name\tNo of Orders\tAmount\n";
		fwrite($sfile,$cheader);
		$sno=1;
		while($salesrows=mysql_fetch_array($csales_result)){
			$cdata_str="";
			$cdata_str=$sno."\t";
			for($j=0;$j<count($categories);$j++){
				if($categories[$j]["subcategory_id"]==$salesrows["subcategory_id"]){
					$cdata_str.=$categories[$j]["category_name"]."\t".$categories[$j]["subcategory_name"]."\t";
				}
			}
			$cdata_str.=$salesrows["orders_cnt"]."\t".$salesrows["amount_cnt"]."\n";
			$total_amount+=$salesrows["amount_cnt"];
			fwrite($sfile,$cdata_str);
			$sno++;
		}//while loop end
		$cfooter="Total\t\t\t\t".$total_amount."\t"."\n";
		fwrite($sfile,$cfooter);
		fclose($sfile);
	} //if condition ends here
	$email=$owner_details[$i]["owner_email"]."\n";
	$zipfile=$filepath.$owner_details[$i]["store_id"]."/".$owner_details[$i]["store_id"].".zip";
	$lcmd="cd ".$filepath.$owner_details[$i]["store_id"]." && zip -r ".$zipfile." .";
	exec($lcmd);
	$mailobj=new My_PHPMailer();
	$subject="Please find the attached document for the reports\n";
	$mresult=$mailobj->send_mail($email,"Reports",$subject,"",$zipfile);
} // for loop ends here

?>
