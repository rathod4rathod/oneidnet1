<?php 
/******************************************************************************
 * 
 * Function: Aim to find the unique URL domain.
 * Author: Sujata <sujata@oneidnet.com>
 * Optimized By: MD Danish <danish@gmail.com>
 * Date Written: Feb 17, 2015
 * Return Type: Array
 * 
 * USAGE:  var_dump( $this->getunique_domains->parseInput( $string ) );  
 * 
 * TESTED: OKAY         
 * 
 ******************************************************************************/


class GetUnique_Domains{
    
    //Function returns unique domains from passed string.
    function parseInput( $string ) {
        //$regex = '/\b(https?|ftp|file):\/\/[-A-Z0-9+&@#\/%?=~_|$!:,.;]*[A-Z0-9+&@#\/%=~_|$]/i'; // This rex not working of https domains
        $regex = '/https?\:\/\/[^\" ]+/i';
        preg_match_all($regex, $string, $matches);
        $urls = $matches[0];
        $data='';
        
        // get host name from URL
        for($i=0; $i<sizeof($urls); $i++ )
        {
            preg_match("/^(http:\/\/)?([^\/]+)/i", $urls[$i], $matches);
            $host = $matches[2]; 

            // get last two segments of host name
            preg_match("/[^\.\/]+\.[^\.\/]+$/", $host, $matches);
            $data .= $matches[0]." ";

        }        
        return $this->uniqueUrls( $data );
             
    }
    
    //Function returns unique element from passed array.
    function uniqueUrls( $data ){
        $dataarray = explode(" ",$data);
        return array_unique($dataarray);        
    }
    
}
?>







