<?php
$dbconnect=mysql_connect("localhost","root","Weldone123");
mysql_select_db("db_oneidnet");
//$sql="select prods.product_aid,prods.quantity from os_products prods inner join os_all_store stores on prods.store_id=stores.store_aid where stores.store_aid=8;";
$content=file_get_contents("/home/pavani/Desktop/storeids.txt");
$file_arry=explode("\n",$content);
$i=0;
$stores_data=array();
//$products_data=array();
while($i<count($file_arry)-1){
	$products_data=array();
	$s_storeid=$file_arry[$i];
	$prods_sql="select prods.product_aid as product_id,prods.quantity,prods.name from os_products prods inner join os_all_store stores on prods.store_id=stores.store_aid where stores.store_aid=".$s_storeid;
	//echo $prods_sql."\n";
	$j=0;
	$orders_quantity=0;
	$result=mysql_query($prods_sql);	
	while($rows=mysql_fetch_array($result))
	{
		$tmp=array();
		$tmp["product_id"]=$rows["product_id"];
		$tmp["product_name"]=$rows["name"];
		$tmp["quantity"]=$rows["quantity"];
		$orders_sql="select SUM(quantity_str) AS quantity from os_orders where product_id_str='".$rows["product_id"]."'";
		$orders_result=mysql_query($orders_sql);
		$orders_data=mysql_fetch_array($orders_result);
		if($orders_data["quantity"]!=NULL){
			$tmp["orders_quantity"]=$orders_data["quantity"];			
		}else{
			$tmp["orders_quantity"]=0;
		}
		$products_data[$j]=$tmp;
		$j++;
	}
	//echo "store id:".$s_storeid."-->products count:".count($products_data)."\n";
	//var_dump($products_data);
	$stores_tmp=array("store_id"=>$s_storeid,"products"=>$products_data);
	$stores_data[$i]=$stores_tmp;
	$i++;
}
//echo "<pre>".print_r($stores_data)."</pre>";
for($k=0;$k<count($stores_data);$k++){
	echo $stores_data[$k]["store_id"]."\n";
}
?>
