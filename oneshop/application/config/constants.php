<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

define('FILE_READ_MODE', 0644);
define('FILE_WRITE_MODE', 0666);
define('DIR_READ_MODE', 0755);
define('DIR_WRITE_MODE', 0777);
define('FOPEN_READ',							'rb');
define('FOPEN_READ_WRITE',						'r+b');
define('FOPEN_WRITE_CREATE_DESTRUCTIVE',		'wb'); // truncates existing file data, use with care
define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE',	'w+b'); // truncates existing file data, use with care
define('FOPEN_WRITE_CREATE',					'ab');
define('FOPEN_READ_WRITE_CREATE',				'a+b');
define('FOPEN_WRITE_CREATE_STRICT',				'xb');
define('FOPEN_READ_WRITE_CREATE_STRICT',		'x+b');
$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
if ($_SERVER['HTTP_HOST'] == "localhost" || $_SERVER['HTTP_HOST'] == "127.0.0.1") {
    define('ONENETWORKURL', $protocol . $_SERVER['HTTP_HOST'] . '/onenetwork/');
    define('ONEIDNETURL', $protocol . $_SERVER['HTTP_HOST'] . '/oneidnet/');
	define('VCOMURL', $protocol . $_SERVER['HTTP_HOST'] . '/vcom/');
	define('360MAIL', $protocol . $_SERVER['HTTP_HOST'] . '/360mail/');
	define('STORE_PATH',$protocol.$_SERVER["HTTP_HOST"]."/oneshop/stores/");
} else {
	define('VCOMURL', 'https://vcom.oneidnet.com/');
    define('ONENETWORKURL', 'https://onenetwork.oneidnet.com/'); 
    define('ONEIDNETURL', 'https://www.oneidnet.com/'); 
	define('360MAIL', 'https://tszmail.oneidnet.com/');
	define('STORE_PATH',$protocol.$_SERVER["HTTP_HOST"]."/stores/");
}
define('STORE_WEB_ROOT',$_SERVER["DOCUMENT_ROOT"]."stores/");

/* End of file constants.php */
/* Location: ./application/config/constants.php */
