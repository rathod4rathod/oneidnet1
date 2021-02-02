<?php

$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
define('CURRENT_URL', $protocol.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
if ($_SERVER['HTTP_HOST'] == "localhost" || $_SERVER['HTTP_HOST'] == "127.0.0.1") {
  define('HOST_NAME',$protocol.$_SERVER["HTTP_HOST"]."/oneshop/");
} else {
  define('HOST_NAME',$protocol.$_SERVER["HTTP_HOST"]."/");
}
//define('HOST_NAME', $protocol.$_SERVER['HTTP_HOST']);
define('PROTOCOL', $protocol);
/*PATHS configuration*/
$upload_dir=HOST_NAME."stores/";
//$upload_dir=HOST_NAME."/oneshop/stores/";
define("STORE_PATH",$upload_dir);
$profile_dir=HOST_NAME."data/";
//$profile_dir=HOST_NAME."/oneshop/data/";
define("PROFILE_COVER",$profile_dir."cover/");
define("PROFILE_LOGO",$profile_dir."profile/");
define("PROFILE_DEFAULT_PATH",$profile_dir);
define("STORE_UP_PATH","stores");
/*PATHS configuration*/
?>
