<?php
require 'dbapi/db_api.php';
require 'oneidnet_rc.php';


$dbobj=new Db_api();


$dbConnections_params = array(
			'HOST'=>'192.168.22.14',
			'USER'=>'oneidnetmSuper',
			'PASSWORD'=>'OneidnetMailsNations786@India',
			'DATABASE'=>'vmail'
		);
		
		
		// Function to initiate database connection ...
	function db_connect( $params ) {		
		 $connection = mysqli_connect( $params['HOST'] , $params['USER'], $params['PASSWORD'], $params['DATABASE'] ) or $this->errorLogComposer( mysqli_connect_errno($connection),"DB CONNECTION ERROR" );
		if($connection){
			return $connection;
		} else {
			return false; // Unable to Create Connection String			
		}
	}
	db_connect($dbConnections_params);
	$result = mysqli_query( db_connect($dbConnections_params), "select local_part from mailbox " );
	while( $row=mysqli_fetch_assoc($result) ) {
							$data.="'".$row["local_part"]."',";
						}
				

 $qur="select username,first_name,middle_name,last_name,password_hash from iws_profiles where username not in(".rtrim($data,',').") and is_verified='1'";
$rlt=$dbobj->custom($qur);				
	if($rlt!=0){
		
		
		
$mailobj=new oneidnet_rc();
for($i=0;$i<count($rlt);$i++){
echo $mailobj->addMailbox( $rlt[$i]["username"],  $rlt[$i]["first_name"]." ".$rlt[$i]["middle_name"]." ".$rlt[$i]["last_name"],$rlt[$i]["password_hash"], $quota_in_mb=100 );		
}
		
	}

echo "<pre>";print_R($data);echo "</pre>";
echo "<pre>";print_R($rlt);echo "</pre>";
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

