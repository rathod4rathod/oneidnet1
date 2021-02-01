<?php
error_reporting(0);
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

    $result = mysqli_query($connection, $query);
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
    *
    *
    *
    * Updated and Modified function by SANTHOSH KUMAR
    * Returns 0 and Error description on failure of updation
    * Returns 1 on success
    * Returns a fine description of problem if there are any changes in query. Ex: changing UPDATE to SELECT, SHOW, DESCRIBE or EXPLAIN
    * Updated the function due to deprication of mysql_* functions by PHP.5.3.0 and its future releases. So please upgrade to mysqli_* or OBJECT ORIENTED MySQL.
  **************************************************************/

  function update( $fields, $mytable, $where ) {
    global $connection;
    $i=0;$FIELD='';
    $index = sizeof( $fields );
    foreach($fields as $key => $value ){
      $i++;
      $FIELD .=  "`".$key."` = "."'".$value."'";

      if ( $index != $i ){
            $FIELD .= ",";
      }
    }
    $query = "UPDATE $mytable SET $FIELD WHERE $where";
    return mysqli_query($connection, $query);
}


  /***************************************************************
    Manual: function to retrieve the record from database
      $myfields = "first_name,last_name";
      $mytable = "iws_profiles";
      $where = "profile_id='1' AND is_verified=1";
      var_dump($this->select( $myfields , $mytable ,$where ) );
    Usage: $this->select($myfields,$mytable,$where);



    Updated and modified by SANTHOSH KUMAR
    Updated due to new mysqli_* functions. Upgrade to MySQL Improved version style coding. In future releases of MySQL, mysql_* functions will be depricated.
  ***************************************************************/

function select( $fields, $mytable, $where )
{
    global $connection;
    if(!empty($where) )
    {
         $query = "SELECT $fields FROM $mytable WHERE $where";
    }
    else
    {
        $query = "SELECT $fields FROM $mytable";
    }
    $result = mysqli_query($connection, $query);
    $i_total_result = mysqli_num_rows($result);
    $mydata = array();
    while($row=mysqli_fetch_array($result))
    {
        $mydata[]=$row;
    }
    if($i_total_result === 0 )
    {
      return 0;
    }
    else
    {
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
       global $connection;
    $fields = array_keys($a_data);
     $sql = "INSERT INTO ".$tbl_name." (`".implode('`,`', $fields)."`) VALUES('".implode("','", $a_data)."')";
    $msg="[Inside insert function]query is:".$sql;
    log_message('info',$msg);
    $result=mysqli_query($connection,$sql);
    $affected_rows=mysqli_affected_rows($connection);
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
    $result=mysqli_query($connection, $query_str );
    $num_rows=mysqli_num_rows($result);
    while( $row = mysqli_fetch_assoc( $result ) ){
      $mydata[] = $row;
    }
    if($num_rows!=0){return $mydata;}
    else{return 0;}
  }

    function reportError($errorMessage)
    {
        $errorMessage=addslashes($errorMessage);
        $hostname="localhost";
        $username="root";
        $password="secure149";
        $database="errorReports";
        $link=mysqli_connect($hostname, $username, $password, $database) or die(mysqli_error($link));
        $errorDetails=explode("#", $errorMessage);
        $errorClass=count($errorDetails);
        if($errorClass==5)
        {
            $queryStatement="INSERT INTO `cvbankErrors` (`errorType`, `errorNo`, `lastsqlState`, `errorDesc`, `faultyMethod`, `errorTime`, `errorPriority`, `errorStatus`) VALUES ('$errorDetails[0]', '$errorDetails[1]', '$errorDetails[2]', '$errorDetails[3]', '$errorDetails[4]','$errorDetails[5]', CURRENT_TIMESTAMP, '1', '1')";
            $result55=mysqli_query($link, $queryStatement);
            if($result55==FALSE)
            {
                print_r(mysqli_error_list($link));
            }

        }
        else
        {
            //do nothing..
        }
    mysqli_close($link);
    }
}
?>
