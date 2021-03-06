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
    define('ONEIDNETURL', $protocol . $_SERVER['HTTP_HOST'] . '/oneidnet/');
    define('ONESHOPURL', $protocol . $_SERVER['HTTP_HOST'] . '/oneshop/');
    define('COFFICEURL', $protocol . $_SERVER['HTTP_HOST'] . '/coffice/');
} else {    
    define('ONEIDNETURL', 'https://www.oneidnet.com/');    
    define('ONESHOPURL', 'https://oneshop.oneidnet.com/');    
    define('COFFICEURL', 'https://coffice.oneidnet.com/');    
}
/* End of file constants.php */
/* Location: ./application/config/constants.php */