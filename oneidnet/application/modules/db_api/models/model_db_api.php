<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_db_api extends CI_Model  {
  
  function __construct() {
    parent::__construct();
  }
 
  function getEntity(  $s_id, $s_table_name, $a_fields  ) {
    $query = $this->db->select( $a_fields );
    $query = $this->db->get_where( $s_table_name, $s_id);
    $j_result = json_encode($query->result());
    return $j_result;
  }
  
  function getEntities( $a_ids, $s_table_name, $a_fields, $s_field ) {    
    $query_line = "SELECT $a_fields FROM $s_table_name WHERE $s_field IN ($a_ids) ";  
    $query_line = $this->db->query($query_line);
    return $query_line->result();    
  }
  
 //global function for inserttion 
  public function data_insert($table_name,$data)  {
    $this->db->insert($table_name, $data);
    $afftectedRows = $this->db->affected_rows();
    return $afftectedRows;       
  }
  
  //global function for update
  public function data_update($where_condition,$a_data,$s_table_name) {
    $this->db->update($s_table_name, $a_data, $where_condition);
    $afftectedRows = $this->db->affected_rows();
    return $afftectedRows; 
  }
  //global function for delete
  public function data_delete($s_table_name,$where_condition) {
    $this->db->delete($s_table_name, $where_condition); 
    $afftectedRows = $this->db->affected_rows();
    return $afftectedRows;     
  }
  
  //global function for get data
  function data_select($s_table_name,$where_condition = NULL,$fields = NULL) {   
    if($where_condition!=NULL &&  strlen($fields)!=0) {        
      $this->db->select($fields);
      $query = $this->db->get_where($s_table_name,$where_condition);
      return $this->output_Json_Format($query);      
    }
    
    if($where_condition==NULL  &&  strlen($fields)!=0) {
      $this->db->select($fields);
      $query = $this->db->get($s_table_name);
      return $this->output_Json_Format($query);
    }
    
    if($where_condition!=NULL &&  strlen($fields)==0) {       
       $query = $this->db->get_where($s_table_name,$where_condition);
       return $this->output_Json_Format($query);       
    }
    
    if(isset($s_table_name)) {
      $query = $this->db->get($s_table_name);
      return $this->output_Json_Format($query);    
    }
  }
  
  function data_custom_query($que) {
    $flag=$this->db->query($que);
    return $flag;
  }
  
  function output_Json_Format($rlt)  {
    $d=0;
    foreach($rlt->result() as $row) {
      $jsonoutput[$d]=$row;
      $d++;
    }
    if(isset($jsonoutput)) {
      return $jsonoutput;      
    }else {
      return "NO_DATA";
    }
  }  
  

  public function test1() {
    return "I am working";
  }
  
  
}
