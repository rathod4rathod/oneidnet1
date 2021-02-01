<?php
$dbconnect=mysql_connect("localhost","root","Weldone123");
mysql_select_db("db_oneidnet");
$s_storequery="SELECT email,username,country_id FROM os_all_store stores INNER JOIN iws_profiles profiles ON stores.created_by=profiles.profile_id WHERE package='Hyper'";
$store_result=mysql_query($s_storequery);
$owner_details=array();
$arg1=$argv[1];
echo $arg1;
?>
