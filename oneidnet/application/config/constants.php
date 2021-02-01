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
    define('MAILURL', $protocol . $_SERVER['HTTP_HOST'] . '/360mail/');
    define('NETPROURL', $protocol . $_SERVER['HTTP_HOST'] . '/netpro/');
    define('CVBANKURL', $protocol . $_SERVER['HTTP_HOST'] . '/cvbank/');
    define('FINDITURL', $protocol . $_SERVER['HTTP_HOST'] . '/fi/');
    define('ONESHOPURL', $protocol . $_SERVER['HTTP_HOST'] . '/oneshop/');
    define('COFFICEURL', $protocol . $_SERVER['HTTP_HOST'] . '/coffice/');
    define('CLICKURL', $protocol . $_SERVER['HTTP_HOST'] . '/click/');
    define('BUZZINURL', $protocol . $_SERVER['HTTP_HOST'] . '/buzzin/');
    define('TUNNELURL', $protocol . $_SERVER['HTTP_HOST'] . '/tunnel/');
    define('DEALERXURL', $protocol . $_SERVER['HTTP_HOST'] . '/dealerx/');
    define('ONENETWORKURL', $protocol . $_SERVER['HTTP_HOST'] . '/onenetwork/');
    define('ISNEWSURL', $protocol . $_SERVER['HTTP_HOST'] . '/isnews/');
    define('VCOMURL', $protocol . $_SERVER['HTTP_HOST'] . '/vcom/');
    define('ONEVISIONURL', $protocol . $_SERVER['HTTP_HOST'] . '/onevision/');
    define('ONEIDSHIPURL', $protocol . $_SERVER['HTTP_HOST'] . '/oneidnetship/');
    define('TRAVELTIMEURL', $protocol . $_SERVER['HTTP_HOST'] . '/traveltime/');
    
} else {
     define('ONEIDNETURL', $protocol .  'www.oneidnet.com/');
    define('MAILURL', $protocol . '192.168.0.14/');
    define('NETPROURL', $protocol . 'netpro.oneidnet.com/');
    define('CVBANKURL', $protocol . 'cvbank.oneidnet.com/');
    define('FINDITURL', $protocol . 'fi.oneidnet.com/');
    define('ONESHOPURL', $protocol . 'oneshop.oneidnet.com/');
    define('COFFICEURL', $protocol . 'coffice.oneidnet.com/');
    define('CLICKURL', $protocol . 'click.oneidnet.com/');
    define('BUZZINURL', $protocol . 'buzzin.oneidnet.com/');
    define('TUNNELURL', $protocol . 'tunnel.oneidnet.com/');
    define('DEALERXURL', $protocol . 'dealerx.oneidnet.com/');
    define('ONENETWORKURL', $protocol . 'onenetwork.oneidnet.com/');
    define('ISNEWSURL', $protocol . 'isnews.oneidnet.com/');
    define('VCOMURL', $protocol . 'vcom.oneidnet.com/');
    define('ONEVISIONURL', $protocol . 'onevision.oneidnet.com/');
    define('ONEIDSHIPURL', $protocol . 'oneidnetship.oneidnet.com/');
    define('TRAVELTIMEURL', $protocol . 'traveltime.oneidnet.com/');
}

/* End of file constants.php */
/* Location: ./application/config/constants.php */