<?php
if(!isset($_SESSION)){
    session_start();
}
if (!defined('BASEPATH'))    exit('No direct script access allowed');

/***
 * Purpose: To handle all Session related operation in the App.
 * Author: MD Danish
 * Date Written: November 27, 2015
 */

class Sessions extends CI_Controller {
    
    function __construct() {    
        parent::__construct();
        $modulesArray = array( 'db_api', 'cookies' );
        $this->wrapperinit->loadModules( $modulesArray );         
    }

    //Function to generate the session -
    function createSession($user_full_name, $profile_id,$email,$mail360) {      
       //$sessionData = array( 'user_full_name' => $user_full_name );
       $_SESSION['user_full_name'] = $user_full_name;
       $_SESSION['user_id'] = $profile_id;
       $_SESSION["email"]=$email;
       $_SESSION["key"]=$mail360;
       //$this->load->library('session');
       //$this->session->set_userdata( $sessionData );         
     }   
    
    function destroySession() {
        session_destroy();            
      
    }
    
    
    function changeSession() {
        
        
    }
    
    
    function restartSession() {
        $this->load->library('session');    
        
        $user_id = $this->cookies->getUserID();         
        
        $result = $this->db_api->select( 'first_name,middle_name,last_name,email,360mail_key', 'iws_profiles', "profile_id='$user_id'" );    
        $s_user_full_name  = $result[0]['first_name']." ".$result[0]['middle_name']." ".$result[0]['last_name'];
        $email=$result[0]['email'];
        $mail360=$result[0]['360mail_key'];
        
        $sessionData = array( 'user_full_name' => $s_user_full_name, 'user_id' =>  $user_id, 'email'=>$email,'key'=>$mail360); // User_id to be removed from session.
        $this->session->set_userdata( $sessionData );    
        
        
    }
    
  
   
}
