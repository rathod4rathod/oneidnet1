<?php
if (!defined('BASEPATH'))    exit('No direct script access allowed');

/***
 * Purpose: To handle all Cookies related Operation.
 * Author: MD Danish
 * Date Written: November 24, 2015
 */
class Cookies extends CI_Controller {
    
    function __construct() {    
        parent::__construct();
    }

    function getUserID() {
        if ( !is_null($this->getCookie() ) ) {            
            $cookieData = explode('*',$_COOKIE['oud']);
            return $cookieData[2];            
        } else {
            return null;
        }
    }
    
    function getUserPasswordHash ( ) {
        if ( !is_null($this->getCookie() ) ) {            
            $cookieData = explode('*',$_COOKIE['oud']);
            return $cookieData[1];            
        } else {
            return null;
        }
    }    
      
    function getUserIDHash() {
        if ( !is_null($this->getCookie() ) ) {            
            $cookieData = explode('*',$_COOKIE['oud']);
            return $cookieData[3];            
        } else {
            return null;
        }
    }
      
    function getUserRole() {
        if ( !is_null($this->getCookie() ) ) {            
            $cookieData = explode('*',$_COOKIE['oud']);
            return $cookieData[5];            
        } else {
            return null;
        }
    }
    
    function getUserLanguage() {
        if ( !is_null($this->getCookie() ) ) {            
            $cookieData = explode('*',$_COOKIE['oud']);
            return $cookieData[6];            
        } else {
            return null;
        }        
    }        
    
    function getUserCountryID(  ) {
        if ( !is_null($this->getCookie() ) ) {            
            $cookieData = explode('*',$_COOKIE['oud']);
            return $cookieData[7];            
        } else {
            return null;
        }        
    }    

    function getUserTimezone() {
        if ( !is_null($this->getCookie() ) ) {            
            $cookieData = explode('*',$_COOKIE['oud']);
            return $cookieData[4];            
        } else {
            return null;
        }
    }
    
    function getUserFullName(){
        return $_SESSION['user_full_name'];     
    }
    
    function getCookie() {
        if( $this->checkCookie() ) {
            return $_COOKIE['oud'];
        } else {
            return null;
        }
    }
    function getthemeCookie() {
        if( $this->checkCookie() ) {
            return $_COOKIE['theme'];
        } else {
            return null;
        }
    }
    
    function setCookie( $name, $value ){
      $cookie_data = array(
          'name' => $name,
          'value' => $value,
          'expire' => time() + (86400*30),
          'path'   => '/'
      );  

setcookie($name, $value, time() + (86400 * 30), "/","localhost"); // 86400 = 1 day
      ///$this->input->set_cookie($cookie_data);   

     $this->setCookieByName('rdc','null');
    }
    function theme_setCookie($value ){
      $cookie_data = array(
          'name' => "theme",
          'value' => $value,
          'expire' => time()+86500,
          'path'   => '/'
      );  
      $this->input->set_cookie($cookie_data);   

      $this->setCookieByName('rdc','null');
    }
    
    function checkCookie() {
        if(!isset($_COOKIE['oud'])) {
            return false;
        } else {
            return true;
        }        
    }
    
    function chkCookieByName( $name ) {
        if(!isset($_COOKIE["$name"])) {
            return false;
        } else {
            return true;
        }          
    }
    
    function setCookieByName( $name, $value ) {
      $redirectionCookie =  array(
          'name' => $name,
          'value' => $value,
          'expire' => time()+86500,
          'path'   => '/'
      );          
      $this->input->set_cookie( $redirectionCookie );     
    }
    
    function getCookieVal( $name ) {    
        if( $this->chkCookieByName( $name ) ) {
            return $_COOKIE["$name"];
        } else {
            return null;
        }    
    }
    

    function destroyCookie( $name, $value ) {
      $cookie_data = array('name' => $name,'value' => $value, 'expire' => 0, 'path'   => '/');  
      
     setcookie($cookie_data);   
	// setcookie($name, $value, 1, "/","localhost"); // 86400 = 1 day
    }
 
   
}
