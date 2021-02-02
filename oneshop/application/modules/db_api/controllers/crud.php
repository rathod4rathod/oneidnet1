<?php
require_once('db_config.php');
new Database;
new CRUD;

class CRUD {  
  function __construct(){ } 
  
  /**************************************************************
    Manual: Function to delete the record from database     
      $mytable = "iws_profiles";
      $where = "profile_id='4'";
      var_dump($this->delete( $mytable ,$where ) ); 
     Usage: $this->delete($mytable,$where); 
    return : 0 on failure or 1 on success
  **************************************************************/    
  function delete( $mytable, $where ) {
    global $connection;
    if( !empty( $where ) ) {
      $query = "DELETE FROM $mytable WHERE $where";
    } else {
      $query = "DELETE FROM $mytable WHERE 1";
    }
    
    $result = mysql_query( $query,$connection );
    return $result;	
  }    
 
  /**************************************************************
    Manual: function to update the record into database
    $fields = array(	'first_name'=>'MD','last_name'=>'Danish');
    $mytable = "iws_profiles";
    $where = "profile_id='1' AND is_verified=1";
    var_dump($this->update( $fields , $mytable ,$where ) ); 
    Usage: $this->update($fields,$mytable,$where); 
    return : 0 on failure or 1 on success 
  **************************************************************/
    
  function update( $fields, $mytable, $where ) {	
    global $connection;
    $i=0;$FIELD='';
    $index = sizeof( $fields );
    foreach($fields as $key => $value ){
      $i++;
      $FIELD .=  $key." = "."'".$value."'"; 

      if ( $index != $i ){
            $FIELD .= ",";
      }	
    }
    $query = "UPDATE $mytable SET $FIELD WHERE $where";   
    $result = mysql_query( $query,$connection );
    if(!empty($result)) {
      return 1;
    } else {
      return 0;
    }
  }

    
  /***************************************************************
    Manual: function to retrieve the record from database
      $myfields = "first_name,last_name";
      $mytable = "iws_profiles";
      $where = "profile_id='1' AND is_verified=1";
      var_dump($this->select( $myfields , $mytable ,$where ) );
    Usage: $this->select($myfields,$mytable,$where);    
  ***************************************************************/

  function select( $fields, $mytable, $where ){
    global $connection;  
    if( !empty($where) ) {
      $query = "SELECT $fields FROM $mytable WHERE $where";
      
    } else {
        $query = "SELECT $fields FROM $mytable";
    }    
    
    $result = mysql_query( $query,$connection );
    $i_total_result = mysql_num_rows($result);      
    while( $row = mysql_fetch_assoc( $result ) ){
      $mydata[] = $row;
    }
   //echo $query;
    if( $i_total_result === 0 ){
      return 0;
    } else {       
      return $mydata;
    }	
  }
  /***************************************************************
    Manual: function to insert the record from database      
      $tbl_name = "iws_profiles";
      $a_data=array("username"=>"nalini","email"=>"nalini@gmail.com","mobile_no"=>"9642031819","zip_code"=>"500072");
      var_dump($this->insert( $myfields , $mytable ,$where ) );
    Usage: $this->insert($myfields,$mytable,$where); 
    return  : 0 on failure or 1 on success
  ***************************************************************/  
  function insert($a_data,$tbl_name)  {    
    $fields = array_keys($a_data); 
    $sql = "INSERT INTO ".$tbl_name." (`".implode('`,`', $fields)."`) VALUES('".implode("','", $a_data)."')";	
    $msg="[Inside insert function]query is:".$sql;
    log_message('info',$msg);
    $result=mysql_query($sql);
    $affected_rows=mysql_affected_rows();
    if(isset($result)){
      log_message('info','if condition of the result');
    }
    else{
      log_message('info','else condition of teh result');
    }
    $msg="affected rows after insertion is:".$affected_rows;
    log_message('info',$msg);
    return $result;
  }

  function custom($query_str){
    global $connection;  
    $result=mysql_query($query_str,$connection);
    $msg="[Inside custom function]query is:".$query_str;
    log_message('info',$msg);
    $num_rows=mysql_num_rows($result);      
    while( $row = mysql_fetch_assoc( $result ) ){      
      $mydata[] = $row;        
    }    
    if($num_rows!=0){
      return $mydata;
    }
    else{      
      return 0;    
    }
  }   
}
  
?>
