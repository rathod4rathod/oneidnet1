<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
$route['default_controller'] = "home";
//$route['promotiopns']        = "home/getpromotions";
$route['channelpromotiopns']        = "promotions/tunnel_channelpromotions";
$route['videopromotiopns']        = "promotions/tunnel_videopromotions";
$route['tourpromotiopns']        = "promotions/traveltime_tourpromotions";
$route['agentpromotiopns']        = "promotions/traveltime_agentpromotions";
$route['campaignDV']         = "campaigns/campaign_detailview";
$route['store_promotions']     = "promotions/oshop_store_view";
$route['product_promotions']   = "promotions/oshop_product_view";
$route['malls_promotions']     = "promotions/oshop_malls_view";
$route['tourPromotiopns']        = "promotions/traveltimeTourpromotions";
$route['agentPromotiopns']        = "promotions/traveltimeAgentpromotions";
$route['snapCompitationpromotions']        = "promotions/buzzinSnapcompitation";
$route['videoCompitationpromoitions']        = "promotions/buzzinFlimcompitation";
$route['vipPromotions']        = "promotions/buzzinVip";
$route['clickinfo']        = "static_pages/click_info";
$route['buzzininfo']        = "static_pages/buzzin_info";
$route['cvbankinfo']        = "static_pages/cvbankinfo";
$route['oneshopinfo']        = "static_pages/oneshop_info";
$route['traveltimeinfo']        = "static_pages/traveltime_info";
$route['dealerxinfo']        = "static_pages/dealerx_info";
$route['tunnelinfo']        = "static_pages/tunnel_info";
$route['coofficeinfo']        = "static_pages/cooffice_info";
$route['isnewsinfo']        = "static_pages/isnews_info";
$route['businesslead']        = "templates/businessleadpage";
$route['netproinfo']        = "static_pages/netpro_info";
$route['admprofile/(:any)']        = "administration/admprofile/$1";
$route['admCaseDetails/(:any)']        = "admCases/admCaseDetails/$1";
$route['admteam/(:any)']        = "administration/empteam/$1";
$route['addempprofile/(:any)']        = "administration/addempprofile/$1";

$route['livechat/(:any)/(:any)/(:any)']        = "livechat/$1/$2/$3";
/* End of file routes.php */
/* Location: ./application/config/routes.php */
