<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

/***
 * Purpose: To handle redirection of inner modules.
 * Author: MD Danish
 * Date Written: Jan 18, 2016
 */
class Redirection extends CI_Controller {

    function __construct(  ) {
        parent::__construct();
        $modulesArray = array( 'cookies' );
        $this->wrapperinit->loadModules( $modulesArray );          
    }

    function index( ) {        
        $url = $this->input->get('url');        
        if( !is_null( $url ) ) {            
            if( $this->isURL( $url ) ) {                
                $response = $this->isOneidnetDomain( $url );
                if( $response ) { 
                    $this->cookies->setCookieByName( 'rdc',$url );         
//                    echo "<pre>";print_r($_COOKIE);echo "</pre>";
                    redirect( base_url() );                    
                } else { 
                   echo "We can't redirect, Foreign URL is detected!!!";
                }
                
            } else {
                // Redirect URL to Broken Page.
                echo "Sorry, We can't redirect this url, Either it's a invalid url or outsider url";
            }                  
        } else {            
            // Redirect URL to Broken Page.
            echo "It seems no URL is passed in URL";
        }
    }
    
    // Function to check for valid URL.
    function isURL( $url ) {
        $validity = filter_var( $url, FILTER_VALIDATE_URL );          
        return $validity;
    }
    
    //Function to check domain of link
    function isOneidnetDomain( $url ) {
        //Currently we are using localhost, so just passing         
        $status = false;
        $domain = $this->get_domain( $url );
        if( is_string( $domain ) ){
            if ( $domain==="oneidnet.com" || $domain=="localhost" ) {
                $status = true;
            }            
        } 
        return $status;
    }
    
    // Function to return the domain of given url i.e. google.com or oneidnet.com,
    function get_domain($url) {
//        return "localhost"; //To be deleted this line during go live, It is just work around for localhost exception.
        $pieces = parse_url( $url );
        $domain = isset($pieces['host']) ? $pieces['host'] : '';
        if (preg_match('/(?P<domain>[a-z0-9][a-z0-9\-]{1,63}\.[a-z\.]{2,6})$/i', $domain, $regs )) {
          return $regs['domain'];
        }
        return false;
    }
    
    
}
