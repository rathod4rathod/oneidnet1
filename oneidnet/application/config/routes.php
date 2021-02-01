<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
$route['default_controller'] = "home";
$route['basic_info'] = "basicinfo/basic_info";
$route['preferences'] = "preferences/preferences_info";
$route['people'] = "people/people_info";
$route['deactive'] = "myaccount/deactivateAccount";
$route['statistics'] = "statistics/statistics_info";
$route['invite'] = "invitefriend/invite_friend";
$route['myaccount'] = "myaccount/myaccountdetails";
$route['mycards'] = "myaccount/mycarddetails";
$route['pendingtransactions'] = "myaccount/pendingtransactions";
$route['transactionhistory'] = "myaccount/transactionhistory";
$route['contacts'] = "basicinfo/contacts";




$route['404_override'] = 'errors/error_general';


/* End of file routes.php */
/* Location: ./application/config/routes.php */
