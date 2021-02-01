<?php
//-- Danish
if (!defined('BASEPATH'))    exit('No direct script access allowed');

function force_ssl_redirect(  ) {
    
    if( !isset($_SERVER['HTTPS']) || $_SERVER['HTTPS'] != "on" ) {
        $ssl_url = "https://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
        redirect( $ssl_url );
        exit;
    }
    
        
}