<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/******************************************************************************
 * 
 * Purpose: Global class to handle all CRUD operation with Database
 * ----DON'T TOUCH THIS FILE It is prime important file
 * Author: MD Danish <danish@oneidnet.com>
 * Date Written: Feb 26, 2015
 * 
 ******************************************************************************/

class Db_api extends CI_Controller {  


  var $table = "pb_cards";  
  var $select_column = array("card_id", "card_name", "card_number", "usage_purpose","card_type");  
  var $order_column = array("card_id", null, null, null, null); 

  function __construct() {
    parent::__construct();     
  }
  
  function index(){      
    //show_404('Direct access is forbidden');
	}
  

  
/***************************************************************
  Manual: function to retrieve the record from database
  $myfields = "first_name,last_name";
  $where = "profile_id='1' AND is_verified=1";      
  Usage: $this->select($myfields,$mytable='iws_profiles',$where);    
  STATUS: TESTED OK --- DON'T TOUCH THIS FUNCTION
***************************************************************/
  function select( $myfields , $mytable ,$where) {
    require_once 'crud.php';
    $obj = new CRUD();   
    return $obj->select( $myfields , $mytable ,$where ) ;
  }

  
/*****************************************************
 * require 'crud.php';
 * $mytable = "iws_profiles";
 * $where = "profile_id='3'";
 * USAGE:  var_dump($this->delete( $mytable ,$where ) );   
 * STATUS: TESTED OK 
 *****************************************************/  
  function delete( $mytable ,$where ) {
    require_once 'crud.php';
    $obj = new CRUD();
    return $s_result = $obj->delete( $mytable ,$where );    
  }
    
/*****************************************************
     
    $fields = array(	'first_name'=>'Mohammad1','last_name'=>'Danish');
    $mytable = "iws_profiles";
    $where = "profile_id='1' AND is_verified=1";
    var_dump($this->update( $fields , $mytable ,$where ) );  
 
 *****************************************************/  
  function update( $a_fields, $s_table, $s_where ) {
    
    require_once 'crud.php';
    $obj = new CRUD();
    return $obj->update( $a_fields, $s_table, $s_where ) ;     
  }
  
  /***************************************************************
    require 'crud.php';
    $a_data = array("skill_name"=>"Jquery");
    var_dump($this->insert($s_table_name="iws_skills", $a_data ) );     
   ****************************************************************/    
  function insert( $a_fields, $s_table ) {
    require_once 'crud.php';
    $obj = new CRUD();
    return $obj->insert( $a_fields, $s_table ) ;     
  }
  
  function custom($custom_qry) {
  
    require_once 'crud.php';
    $obj = new CRUD();   
    return $obj->custom($custom_qry) ;
  }
}
