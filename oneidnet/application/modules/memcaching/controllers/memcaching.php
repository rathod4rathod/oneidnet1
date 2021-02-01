<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Aim to support memcahing features to App!!!
 * Author: MD Danish <trade.danish@gmail.com>
 * Date Written: Nov 24, 2015
 */

class Memcaching extends CI_Controller {
    
  function __construct() {
    parent::__construct();
          
  }
  
  function mconnect() {    
    $mem = new Memcached();
    $mem->addServer("127.0.0.1", 11211);// 127.0.0.1 to be replaced when go live
    return $mem;  
  }
  
  function setKey( $key, $value,$time=null ){
      $mem = $this->mconnect();
       if(isset($time)){
          $mem->set( $key , $value, $time);            
      }else{

          $mem->set( $key , $value);            
      }
      
  }
  
  function getKey( $key ){
      $mem = $this->mconnect();
      return $mem->get( $key );
  }
  
  
  function showKey() {
      $mem = $this->mconnect();
      $s = $mem->get( 'USRDTA_31' );          
      print_r($s);
      
  }
  function dk(){
      $mem = $this->mconnect();
      $mem->delete( 'USRDTA_61' );          
      
  }
  
  
  function updateKey( $key, $value ){
      
  }
  
  
  
  function deleteKey( $keyname ){
      $mem = $this->mconnect();
      $mem->delete( $keyname );      
  }
  
  function testshowKeyValue() {
      $mem = $this->mconnect();
      echo $mem->delete('UWEATHERDT_31');          
  }
  
  
 
}
