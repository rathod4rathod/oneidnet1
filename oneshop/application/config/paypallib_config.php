<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

// ------------------------------------------------------------------------
// Paypal IPN Class
// ------------------------------------------------------------------------

// Use PayPal on Sandbox or Live
$config['sandbox'] = TRUE; // FALSE for live environment 
 
$config['business'] = 'sb-dw6523386168@business.example.com'; 
 
$config['paypal_lib_currency_code'] = 'USD'; 
 
// Where is the button located at? (optional) 
$config['paypal_lib_button_path'] = 'assets/images/'; 
 
// If (and where) to log ipn response in a file 
$config['paypal_lib_ipn_log'] = FALSE; 
$config['paypal_lib_ipn_log_file'] = BASEPATH . 'logs/paypal_ipn.log';

?>
