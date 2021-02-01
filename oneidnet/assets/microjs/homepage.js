
$(function(){globalGet(oneidnet_url+"index.php/home/getWeatherReport",function(e){if("OIN9"===$.trim(e)||"OIN10"===$.trim(e))$("#tempDeg_home").html("-- &deg C"),$("#city_home").html("City unavailable");else{var t=jQuery.parseJSON(e);$("#tempDeg_home").html(t.max_temp+"&deg C"),$("#city_home").html(t.city)}})});
