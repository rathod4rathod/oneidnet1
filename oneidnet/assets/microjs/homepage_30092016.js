
$(function(){function e(){globalGet(oneidnet_url+"index.php/home/getUserDetails",function(e){var t=jQuery.parseJSON(e);$("#profile_image_tag,#nhpfpath").attr("src",t[0]),$("#userFullName_home,#nhpname").html(t[1]),$("#email_homepg").html(t[2])})}e(),globalGet(oneidnet_url+"index.php/home/getWeatherReport",function(e){if("OIN9"===$.trim(e)||"OIN10"===$.trim(e))$("#tempDeg_home").html("-- &deg C"),$("#city_home").html("City unavailable");else{var t=jQuery.parseJSON(e);$("#tempDeg_home").html(t.max_temp+"&deg C"),$("#city_home").html(t.city)}})});
