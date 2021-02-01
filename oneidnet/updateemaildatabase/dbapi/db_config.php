<?php

/* * *****************************************t***********************************
 * 
 * Function: Class deals with making connection with database
 *  
 * Author: MD Danish <danish@oneidnet.com>
 * Optimized By: MD Danish <danish@oneidnet.com>
 * Date Written: Feb 24, 2015
 * Return Type: String (Connetion Resource String)
 * 
 * USAGE: No direct usage
 * 
 * **************************************************************************** */

class Database {
    function __construct() {
       // ini_set('display_errors', 1);
        //error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
       // error_reporting(0);
        $this->db_connect();
    }

    function db_connect() {
        global $connection;
        global $db;
         $HOST = "mightymysqli.oneidnet.com";        
        $USER = "oneidnetSuper";
        $PASSWORD = 'OneidnetAppsNations786@Zeferrius';
        $DATABASE = "db_oneidnet";
         $connection = mysqli_connect($HOST, $USER, $PASSWORD,$DATABASE);
if (mysqli_connect_errno())
  {
	  $this->db_connect();
  }
    }
}

