<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
$route['default_controller'] = "home/os_homepage";
$route['create_store'] = "home/create_store";
$route['create_store/(:any)'] = "home/create_store/$1";
$route['store_payment'] = "mycart/paybookOspackage";
$route['store_payment/(:any)'] = "mycart/paybookOspackage/$1";
$route['edit_store/(:any)'] = 'home/edit_store/$1';
$route['edit_store/(:any)/(:any)'] = 'home/edit_store/$1/$2';
$route['services/(:any)'] = "home/services_store/$1";
$route['about/(:any)'] = "home/aboutus_store/$1";
$route['policy/(:any)'] = "home/privacy_store/$1";
$route['storestaff/(:any)'] = "home/storestaff_detail/$1";
$route['store_agreement/(:any)'] = "home/agreement_store/$1";
$route['store_home'] = "home/user_home";
$route['store_home/(:any)'] = "home/user_home/$1";
$route['staffs/(:any)'] = "home/store_staff/$1";
$route['staffs/(:any)/(:any)'] = "home/store_staff/$1/$1";
$route['orders/(:any)']="home/store_orders/$1";
$route['inventory/(:any)']="home/store_inventory/$1";
$route['sendStoremessage/(:any)']="oshop_popup/sendStoremessage/$1";
$route['wishlist']="orders/addtowishlist";
$route['store_reviews/(:any)'] = 'stores/storeReviews/$1'; // to display the store reviews
$route['product_reviews'] = 'products/product_review'; // to display the product reviews
$route['store_activities/(:any)']='stores/storeActivityLog/$1'; // to display the store activity log
$route['product_search/(:any)/(:any)'] = "home/find_product/$1/$2";
$route['category_search/(:any)/(:any)/(:any)'] = "home/find_categories/$1/$2/$3";
$route['product_search/(:any)/(:any)/(:any)/(:any)'] = "home/find_product/$1/$2/$3/$4";
$route['store_products/(:any)'] = "home/store_products/$1";
$route['product_posting/(:any)'] = "home/product_Posting/$1";
$route['mystore_reports/(:any)'] = "home/mystore_Reports/$1";
$route['themes/(:any)'] = 'stores/storeThemes/$1';
$route['search_products'] = "home/search_products";
$route['cancel_order']='orders/user_order_cancel';
$route['storemessages/(:any)']='home/getStoremessages/$1';


$route['find_stores'] = "home/find_stores";
$route['find_products'] = "home/find_products";
/*$route['friends_stores'] = "home/find_friends_stores";*/
$route['product_search'] = "home/find_product";
$route['mystore'] = "home/mystore";
$route['mystore_myproducts'] = "home/mystore_Myproducts";
$route['mystore_myorders'] = "home/mystore_Myorders";
$route['mystore_settings'] = "home/mystore_Settings";
$route['mystore_profile_page'] = "home/mystore_Profile_Page";
$route['user_profile_page'] = "home/user_Profile_Page";
$route['product_detail_view/(:any)/(:any)'] = "home/product_Detail_View/$1/$2";
$route['product_updating/(:any)/(:any)'] = "home/product_updating/$1/$2";
$route['order_view'] = "orders/order_view";
$route['product_edit'] = "home/product_edit";
$route['cart_items'] = "home/cart_Items";
$route['mystore_products'] = "home/mystore_Products";
$route['shipping_address'] = "home/item_Shipping_Address";
$route['mySettings'] ="home/mySettings";
$route['myorder_cancel'] ="home/orderCancellation";
$route["orderDetails"]="orders/orderDetailedView/"; //order detailed view
$route["orderDetailsTpl"]="orders/orderDetailedTpl/"; //order detailed tpl
//$route["cancel_order"]="orders/orderCancel/"; //order detailed tpl
$route['404_override'] = 'pagenotfound'; // adding custom controller.

//$route['report_problem'] = 'home/report_problem';

/* End of file routes.php */
/* Location: ./application/config/routes.php */
