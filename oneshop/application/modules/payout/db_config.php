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
define("DB_HOST", "localhost", false);
define("DB_USERNAME", "root", false);
define("DB_PASSWORD", "Admin@2020", false);
define("DB_DATABASE", "db_oneidnet", false);  
class Database {

    function __construct() {

        ini_set('display_errors', 1);
        error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
        error_reporting(1);
        $this->db_connect();
    }

    function db_connect() {
        global $connection;
        global $db;
       
        $connection = mysqli_connect( DB_HOST, DB_USERNAME, DB_PASSWORD  ); 
        // mysqli_set_charset('utf8',$connection);
        $db = mysqli_select_db($connection, DB_DATABASE);
        // Check connection
        if ( mysqli_connect_errno( ) ) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }    
        if(isset($db)) {               
            return $db;
        }
    }

}
?>