<?php
/******************************************************************************
 * 
 * Function: 
 * It returns the array consist of City Name, Sunset and sunrise time, sky, 
 * date based on ip address as per user's timezone.
 * 
 * Author: MD Danih <danish@oneidnet.com>
 * Date Written: Nov 26, 2015
 * Return Type: Array
 * 
 * USAGE: var_dump( $this->getip_loc->getInfo ('49.205.98.227') );
 * 
 ******************************************************************************/

class Weather {  
   
    function getWeatherDetail( $timezone ) {
        return $this->getCityWeather( $timezone );      
    }
      
     function getCityWeather( $timezone ) {         
         $ip = $this->getIPAddress();
         
         if( !is_null( $ip ) ) {
                $cityDump = $this->getCityName( $ip ); 
                if( $cityDump =='OIN10' ) {
                   return "OIN10"; 
                } else {
                    $weatherDump = $this->getWeather( $cityDump['city'] );
                    if( $weatherDump == 'OIN10') {
                        return "OIN10";
                    } else {                        
                       return $this->prepareData( $weatherDump, $timezone, $ip  );    
                    }
                                     
                }

            } else {
                return "OIN10";
        } 
     }
     
     function getLocalTime( $utc , $timezone ) {
        date_default_timezone_set($timezone);                      
        return date("h:i:s", $utc);         
     }
     
     function getLocalDate( $utc, $timezone  ) {
        date_default_timezone_set($timezone);                      
        return date("(D) M d, Y", $utc);          
     }
     
     function prepareData( $weatherDump, $timezone, $ip ) {         
         $decodedDt = json_decode($weatherDump); 
         $sunsetTime = $this->getLocalTime( $decodedDt->sys->sunset , $timezone );
         $sunriseTime = $this->getLocalTime( $decodedDt->sys->sunrise , $timezone );
         $localDate = $this->getLocalDate($decodedDt->dt, $timezone );               
                 
         $modifiedData = array(
             'pressure'=>$decodedDt->main->pressure,
             'min_temp'=>$decodedDt->main->temp_min - 273.15 ,
             'max_temp'=>$decodedDt->main->temp_max - 273.15 ,
             'dt'=>$decodedDt->dt,
             'sunset'=>$sunsetTime,
             'sunrise'=>$sunriseTime,
             'city'=> $decodedDt->name,
             'humidity'=>$decodedDt->main->humidity,
             'sky'=>$decodedDt->weather[0]->main,
             'dt'=>$localDate,
             'ip'=>$ip    );
         
         return json_encode($modifiedData);         
     }
     
     
    function getWeather( $cityName ) {
       $url = "http://api.openweathermap.org/data/2.5/weather?q={$cityName}&appid=d77325f5521cf2f81003219f5d89e048"; 
       $json = file_get_contents( $url );
       if( !$json ) {
          return "OIN10"; 
       } else {
          return $json;   
       }     
            
    }
    
    function getCityName ( $ip ) {
      $key="9dcde915a1a065fbaf14165f00fcc0461b8d0a6b43889614e8acdb8343e2cf15";
      $url = "http://api.ipinfodb.com/v3/ip-city/?key=$key&ip=$ip&format=json";
      $cont = file_get_contents($url);
      if( !$cont ) {
          return "OIN10"; 
      } 
      
      $data = json_decode($cont , true);  
      
      if( $data['statusCode']=='ERROR' ) { // Status code holds two values i.e. OK or ERROR
          return "OIN10";
      } elseif( $data['statusCode']=='OK' ) {
        if(strlen($data['latitude'])) {
            $a_result = array(
                'ip' => $data['ipAddress'] ,
                'region_name' => $data['regionName'] ,
                'city' => $data['cityName'] 
            );
        }  
        return $a_result;          
      }
      


    }    
  
    function getIPAddress(  ) {
      $myPublicIP = trim(shell_exec("dig +short myip.opendns.com @resolver1.opendns.com"));
      if( empty($myPublicIP) ) {
          return null;
      } else {
         return $myPublicIP; 
      }
      
    }
  

}
