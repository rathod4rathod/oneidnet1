<?php
/******************************************************************************
 * 
 * Function: 
 * It returns the array consist of Country code, country name, city name, 
 * region name, zip code, latitude, longitude & timezone based on public 
 * ip address.
 * 
 * Author: Sravani <sravani@oneidnet.com>
 * Date Written: Feb 17, 2015
 * Return Type: Array
 * 
 * 
 * USAGE: var_dump( $this->getip_loc->getInfo ('49.205.98.227') );
 * 
 ******************************************************************************/

class GetIP_loc {  
  

    function getInfo( $ip ) {
      if ($this->is_networkAvailable()==1) {
        $a_result = $this->collectData( $ip );
      }else {
        $a_result='NO_NETWORK';
      }
     return  $a_result;
    }
    
  function is_networkAvailable(  ) {
    $connected = @fsockopen("www.google.com", 80); 
    //website, port  (try 80 or 443)
    if ($connected){
      $is_conn = 1; //action when connected
      fclose($connected);
    }else{
      $is_conn = 0; //action in connection failure
    }
      return $is_conn;
  }  
  
  function collectData( $ip ) {
    $key="9dcde915a1a065fbaf14165f00fcc0461b8d0a6b43889614e8acdb8343e2cf15";
    //$ip=$_SERVER['REMOTE_ADDR'];
    $url = "http://api.ipinfodb.com/v3/ip-city/?key=$key&ip=$ip&format=json";
    $cont = file_get_contents($url);
    $data = json_decode($cont , true);
    if(strlen($data['latitude'])) {
        $a_result = array(
            'ip' => $data['ipAddress'] ,
            'country_code' => $data['countryCode'] ,
            'country_name' => $data['countryName'] ,
            'region_name' => $data['regionName'] ,
            'city' => $data['cityName'] ,
            'zip_code' => $data['zipCode'] ,
            'latitude' => $data['latitude'] ,
            'longitude' => $data['longitude'] ,
            'time_zone' => $data['timeZone'] ,
        );
    }  // End IF  
    return $a_result;
    //array(9) { ["ip"]=> string(13) "49.205.98.227" ["country_code"]=> string(2) "IN" ["country_name"]=> string(5) "India" ["region_name"]=> string(9) "Telangana" ["city"]=> string(9) "Hyderabad" ["zip_code"]=> string(6) "500026" ["latitude"]=> string(7) "17.3753" ["longitude"]=> string(7) "78.4744" ["time_zone"]=> string(6) "+05:30" }
  }
  //function converts the currency to 
  function convertCurrency($amount, $from, $to){

    $apikey = '626734a396f7e6e4bce2';

    // $from_Currency = urlencode($from);
    // $to_Currency = urlencode($to);
    $query =  "{$from}_{$to}";
    $query1 = http_build_query(array('q'=>$query, 'compact'=>'ultra', 'apiKey'=>$apikey));
    $json = file_get_contents("https://free.currconv.com/api/v7/convert?". $query1);
    $obj = json_decode($json, true);

    $val = floatval($obj["$query"]);
    $total = $val * $amount;
    return number_format($total, 2);

    // $url  = "https://finance.google.com/finance/converter?a=$amount&from=$from&to=$to";
    // $data = file_get_contents($url);
    // echo var_dump($data);
    // preg_match("/<span class=bld>(.*)<\/span>/",$data, $converted);
    // $converted = preg_replace("/[^0-9.]/", "", $converted[1]);

    // return round($converted, 3);
  }
    
}
