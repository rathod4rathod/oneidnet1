<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->module("db_api");
        $this->load->module("products");
        $this->load->module("imageresize");
        /* session and cookies check */

        if ($_REQUEST) {
            $sobj= $this->load->module("session_restart");
            if (isset($_REQUEST["skey"])) {
                $sobj->key_check($_REQUEST["skey"]);
            }
        }
        /* session and cookies check */
    }

    function get_UserId() {
        $cookies_obj = $this->load->module("cookies");
        $user_id = $cookies_obj->getUserID();
        return $user_id;
    }

    function usertimeline() {
        $data["title"] = 'Welcome to Oneshop';
        $data["meta_keywords"] = 'Oneidnet online shopping module';
        $data["meta_description"] = 'Oneidnet online shopping module';

        $this->load->view("home/user_timeline");
    }

    function usertimeline_data() {

        $userid = $this->get_UserId();
        $dbapi = $this->load->module("db_api");
        if (isset($_REQUEST['start_id'])) {
            $starting_index = $_REQUEST['start_id'];
        } else {
            $starting_index = 0;
        }
        $query = "SELECT op.product_aid ,op.product_code,op.product_name,op.primary_image ,os.store_name,os.store_code FROM `oshop_products`  as op
inner join oshop_stores  as os on os.store_aid = op.store_id_fk
where  store_id_fk in(SELECT  store_id_fk  FROM `oshop_followings` where user_id_fk  =$userid ) limit $starting_index ,10 ";
        $data['timelinedata'] = $dbapi->custom($query);
        $this->load->view("home/user_timelinedata", $data);
    }

    function get_UserTimezone() {
        $cookies_obj = $this->load->module("cookies");
        $user_timezone = $cookies_obj->getUserTimezone();
        return $user_timezone;
    }

    function get_store_ownerId() {
        $dbapi = $this->load->module("db_api");
        $store_owner_id = "";
        $rlt = $dbapi->custom("select created_by from os_all_store where created_by=" . $this->get_UserId());
        if ($rlt != 0) {
            $store_owner_id = $this->get_UserId();
        }

        $rltq = $db_obj->custom("select oas.created_by store_owner_id from os_store_settings oss left join os_all_store oas on oss.store_id_fk=oas.store_aid where order_manager_emails like '%~" . $this->getUser_Id() . "~%' or store_manager_emails like '%~" . $this->get_UserId() . "~%'");
        if ($rltq) {
            $store_owner_id = $rltq[0]["store_owner_id"];
        }
        return $store_owner_id;
        //return 3;
    }

    function index() {
        //$data["select_oneshop_index"] = 'yes';
        $data["title"] = 'Welcome to Oneshop';
        $data["meta_keywords"] = 'Oneidnet online shopping module';
        $data["meta_description"] = 'Oneidnet online shopping module';
        $this->load->view("home/oneshop_index", $data);
    }
    function find_categories($storeid = NULL, $catid, $subcatid) {
        $title = ucwords(str_replace("_", " ", $subcatid));
        $data["title"] = $title;
        $data["meta_description"] = 'Find products in oneshop';
        $data["meta_keywords"] = 'Find products in oneshop';
        $data["select_find_product"] = 'yes';
        $data["catid"] = strtolower($catid);
        $data["subcatid"] = strtolower($subcatid);
        $data["url"] = base_url() . "product_search/" . $storeid . "/" . $catid . "/" . $subcatid . "/";

          $store_query = "SELECT os.*, op.name as package_name, ore.renewed_on,op.price,ore.period_in_months, ore.expired_on, ore.total_orders, ore.total_products, ore.total_cancellation_products FROM oshop_stores os  " .
                "LEFT JOIN oshop_packages op ON os.current_package_id_fk = op.package_id " .
                "LEFT JOIN oshop_store_renewals_info ore ON os.store_aid = ore.store_id_fk " .
                "WHERE os.store_code = '" . $storeid . "'  and `is_renewed`=0 limit 1";
        $data ["store_details"]= $this->db_api->custom($store_query);
        $data['categories'] = $this->getcatagory_ids($storeid, $catid, $subcatid);
        if (count($data["categories"]) > 0) {
            $this->load->view("home/find_categories", $data);
        } else {
            show_404();
        }
    }

    //27-05-2015 by venkatesh : this function return sub category list based on main category id
    function getcatagory_ids($storeid,$grpId, $catId) {
        $db_obj = $this->load->module("db_api");
        $oshopStoreQry = "SELECT store_aid FROM oshop_stores WHERE store_code = '".$storeid."'";
        $storeRes = $db_obj->custom($oshopStoreQry);
        $store_aid = $storeRes[0]["store_aid"];

        $grpId = strtoupper($grpId);
		$grpId = str_replace("_"," ", $grpId);


		$catId = strtoupper($catId);
		$catId = str_replace("_", " ",$catId);

        $menuCategoryQry = "SELECT oc.category_id_fk,oc.groups,oc.category_name,oc.product   ".
                    "FROM oshop_products op ".
                    "INNER JOIN oshop_categories oc ON oc.category_id_fk = op.product_category_id_fk
                     AND oc.is_active =1 ".
                    "INNER JOIN oshop_stores os ON os.store_aid = op.store_id_fk ".
                    "WHERE op.store_id_fk = '".$store_aid."' and oc.groups='".$grpId."' and
                     oc.category_name='".$catId."' ".
                    "GROUP BY oc.groups, oc.category_name,oc.product";
        $prodCatRes = $db_obj->custom($menuCategoryQry);
        return $prodCatRes;
    }

    function find_product($storeid = NULL, $catid = NULL, $subcatid = NULL, $itemid = NULL) {
        $data["title"] = 'Find products to buy products online|oneidnet.com';
        $data["meta_description"] = 'Find products in oneshop';
        $data["meta_keywords"] = 'Find products in oneshop';
        $data["select_find_product"] = 'yes';
        $data["catid"] = $catid;
        $data["subcatid"] = $subcatid;
        $data["itemid"] = $itemid;
        $store_query = "SELECT os.*, op.name as package_name, ore.renewed_on,op.price,ore.period_in_months, ore.expired_on, ore.total_orders, ore.total_products, ore.total_cancellation_products FROM oshop_stores os LEFT JOIN oshop_packages op ON os.current_package_id_fk = op.package_id LEFT JOIN oshop_store_renewals_info ore ON os.store_aid = ore.store_id_fk WHERE os.store_code = '" . $storeid . "'";
        // echo var_dump($store_query);
        $store_res = $this->db_api->custom($store_query);
        $data["store_details"] = $store_res;
        $data["group"] = $store_res[0]['store_category'];
        $this->load->view("home/find_product", $data);
    }

    function search_product($catid = NULL, $subcatid = NULL, $itemid = NULL, $search = NULL, $storeid = NULL) {
        $data["title"] = 'Find products to buy products online|oneidnet.com';
        $data["meta_description"] = 'Find products in oneshop';
        $data["meta_keywords"] = 'Find products in oneshop';
        $data["select_find_product"] = 'no';
        $search = $this->input->post('searchparam');
        $storeid = $this->input->post('store');
        $catid = $this->input->post('cid');
        $subcatid = $this->input->post('scid');
        $itemid = $this->input->post('itid');
        $data["searchval"] = $search;
        $data["catid"] = $catid;
        $data["subcatid"] = $subcatid;
        $data["itemid"] = $itemid;
        $store_query = "SELECT os.*, op.name as package_name, ore.renewed_on,op.price,ore.period_in_months, ore.expired_on, ore.total_orders, ore.total_products, ore.total_cancellation_products FROM oshop_stores os  " .
                "LEFT JOIN oshop_packages op ON os.current_package_id_fk = op.package_id " .
                "LEFT JOIN oshop_store_renewals_info ore ON os.store_aid = ore.store_id_fk " .
                "WHERE os.store_code = '" . $storeid . "'";
        $data["store_details"] = $this->db_api->custom($store_query);
        $this->load->view("home/find_product", $data);
    }

    function store_products($store_id = NULL) {
        $stores_result = $this->getStoreDetails($store_id);
        $store_name = $stores_result[0]["store_name"];
        $data["title"] = 'Store products to buy products online|oneidnet.com';
        $data["meta_description"] = 'Store products in oneshop';
        $data["meta_keywords"] = 'Store products in oneshop';
        $data["store_id"] = $store_id;
        $data["catagories"] = $this->os_category_list();
        $data["store_code"] = $store_id;
        $data['store_details'] = $stores_result;

        $this->load->view("home/store_products", $data);
    }

    function store_sale_products($rec_id = null,$store_id = NULL) {
        // echo var_dump($store_id);
        $stores_result = $this->getStoreDetails($store_id);
        $store_name = $stores_result[0]["store_name"];
        $data["title"] = 'Store products to buy products online|oneidnet.com';
        $data["meta_description"] = 'Store Sale products in oneshop';
        $data["meta_keywords"] = 'Store Sale products in oneshop';
        $data["store_id"] = $store_id;
        $data["catagories"] = $this->os_category_list();
        $data["store_code"] = $store_id;
        $data['store_details'] = $stores_result;
        $dbobj = $this->load->module("db_api");
        $pname = "SELECT * FROM oshop_sales WHERE rec_aid = ".$rec_id." AND store_id_fk=".$stores_result[0]["store_aid"];
        // echo var_dump($pname);
        $pname_res = $dbobj->custom($pname);
        $parray = explode(', ',trim($pname_res[0]['os_products'],","));
        // echo var_dump($parray);
        $data['product'] = $parray;

        $this->load->view("home/store_sale_product", $data);
    }

    function product_view($product_name) {
        $data["product_name"] = $product_name;
        $data["subcategory_name"] = $this->db_api->custom("select os.groups,os.name as sub_category_name,os.subcategory_aid,oc.name as category_name,oc.category_aid from os_category oc left join os_subcategory os on oc.category_aid=os.category_aid_fk where oc.name='" . str_replace("%20", " ", $product_name) . "'");
        //echo"<pre>";    print_R($data["subcategory_name"]);die();
        $data["title"] = 'Buy ' . $data["subcategory_name"][0]["groups"] . " " . $product_name . ' online |oneidnet.com';
        $data["meta_description"] = $data["subcategory_name"][0]["groups"] . ',' . $product_name;
        $data["meta_keywords"] = $data["subcategory_name"][0]["groups"] . ',' . $product_name;
        $this->load->view("home/product_view", $data);
    }

    function mystore() {
        $db_obj = $this->load->module("db_api");
        $store_aid = $this->products->store_id_return();
        $store_uid = $this->products->store_unique_id($store_aid);
        $this->check_store_id($store_uid);

        $rlt = $db_obj->select("rank_weitage,review_count", "os_store_settings", "store_id_fk=" . $store_aid);
        $data["store_rating"] = $rlt[0]["rank_weitage"] / $rlt[0]["review_count"];
        $data["store_aid"] = $this->products->store_unique_id($store_aid);
        $data["number_of_orders"] = $this->number_of_orders_return($store_aid);
        $data["number_of_sales"] = $this->number_of_sales_return($store_aid);
        $data["number_of_cancels"] = $this->number_of_cancels_return($store_aid);
        $data["number_of_staff"] = $this->number_of_staff_return($store_aid);
        $data["number_of_product"] = $this->number_of_product_return($store_aid);
        $data["used_space"] = $this->used_space_return($store_aid);
        $data["select_mystore"] = 'yes';
        $data["store_title"] = "My Store home|oneidnet.com";
        $data["meta_description"] = "Store owner home page in oneshop";
        $data["meta_keywords"] = "Store owner home page in oneshop";
        $this->load->view("home/mystore", $data);
    }

    /* 10-june-2015 by venkatesh start */

    //10-june-2015 global function by venkatesh : this function return no of orders for store
    function number_of_orders_return($store_aid) {
        $db_obj = $this->load->module("db_api");
        $a_rlt = $db_obj->custom("SELECT count(store_id_fk) as order_COUNT FROM os_orders where store_id_fk=$store_aid");
        return $a_rlt[0]["order_COUNT"];
    }

    //10-june-2015 global function by venkatesh : this function return no of sales for store
    function number_of_sales_return($store_aid) {
        $db_obj = $this->load->module("db_api");
        //$a_rlt=$db_obj->custom("SELECT count(store_id_fk) as sale_COUNT FROM os_sales where store_id_fk=$store_aid");
        $a_rlt = $db_obj->custom("SELECT sum(amount) as sale_sum FROM os_sales where store_id_fk=$store_aid");
        return $a_rlt[0]["sale_sum"];
    }

    //10-june-2015 global function by venkatesh : this function return no of cancelation for store
    function number_of_cancels_return($store_aid) {
        $db_obj = $this->load->module("db_api");
        $a_rlt = $db_obj->custom("SELECT count(store_id_fk) as cancel_COUNT FROM os_cancellation where store_id_fk=$store_aid");
        return $a_rlt[0]["cancel_COUNT"];
    }

    //10-june-2015 global function by venkatesh : this function return no of cancelation for store
    function number_of_staff_return($store_aid) {
        $db_obj = $this->load->module("db_api");
        $a_rlt = $db_obj->custom("SELECT order_manager_emails,store_manager_emails FROM `os_store_settings` WHERE store_id_fk=$store_aid");
        $str = $a_rlt[0]["order_manager_emails"];
        $str.="," . $a_rlt[0]["store_manager_emails"];
        return count(explode(',', $str));
    }

    //10-june-2015 global function by venkatesh : this function return total space and used space
    function used_space_return($store_aid) {
        $db_obj = $this->load->module("db_api");
        $a_rlt = $db_obj->custom("select package,storage as total_space,used_space,visit_count from os_all_store where store_aid=$store_aid");
        return $a_rlt;
    }

    //10-june-2015 global function by venkatesh : this function return total space and used space
    function number_of_product_return($store_aid) {
        $db_obj = $this->load->module("db_api");
        $a_rlt = $db_obj->custom("select count(store_id) as noof_products from os_products where store_id=$store_aid");
        return $a_rlt[0]["noof_products"];
    }

    /* 10-june-2015 by venkatesh end */

    function mystore_Myproducts() {
        $store_id = $this->products->store_id_return();
        $store_uid = $this->products->store_unique_id($store_id);
        $stores_result = $this->getStoreDetails($store_uid);
        $store_name = $stores_result[0]["name"];
        $data["store_title"] = 'My store products-' . $store_name . '|oneidnet.com';
        $data["meta_description"] = 'My store products in oneshop';
        $data["meta_keywords"] = "My store products in oneshop";
        $data["select_mystore_myproducts"] = 'yes';
        $this->load->view("home/mystore_myproducts", $data);
    }

    function mystore_Myorders() {
        $data["select_mystore_myorders"] = 'yes';
        $store_id = $this->products->store_id_return();
        $data["store_id"] = $this->products->store_unique_id($store_id);
        $store_uid = $data["store_id"];
        $stores_result = $this->getStoreDetails($store_uid);
        $store_name = $stores_result[0]["name"];
        $data["store_title"] = 'My store orders-' . $store_name . '|oneidnet.com';
        $data["meta_description"] = 'My store orders in oneshop';
        $data["meta_keywords"] = "My store orders in oneshop";
        $this->load->view("home/mystore_myorders", $data);
    }

//05-06-2015 by venkatesh
    function mystore_Settings() {
        $store_id = $this->products->store_id_return();
        $store_uid = $this->products->store_unique_id($store_id);
        $data['staff_info'] = $this->staff_details($store_uid);
        $db_obj = $this->load->module("db_api");
        $myfields = "*";
        $where = "store_id='$store_uid'";
        $mytable = 'os_all_store';
        $data['store_info'] = $db_obj->select($myfields, $mytable, $where);
        $data['state_info'] = $this->state_info_basedon_countryid($data['store_info'][0]["country"]);
        $data['city_info'] = $this->city_info_basedon_stateid($data['store_info'][0]["state"]);
        $data['country_info'] = $this->country_info_basedon_countryid($data['store_info'][0]["country"]);
        $data['notification_settings'] = $this->notification_settings_info($data['store_info'][0]['store_aid']);
        $this->load->view("home/mystore_settings", $data);
    }

    //08-05-2015 by venkatesh
    function notification_settings_info($store_aid) {
        $db_obj = $this->load->module("db_api");
        $myfields = "notify_new_orders,notify_out_of_stock,notify_report,notify_cancel";
        $where = "store_id_fk='$store_aid'";
        $mytable = 'os_store_settings';
        $country_result = $db_obj->select($myfields, $mytable, $where);
        return $country_result;
    }

    //05-06-2015 by venkstesh: this function return the country information based on country id
    function country_info_basedon_countryid($country_id) {
        $db_obj = $this->load->module("db_api");
        $myfields = "country_name,country_id";
        $where = "country_id='$country_id'";
        $mytable = 'iws_countries_info';
        $country_result = $db_obj->select($myfields, $mytable, $where);
        return $country_result;
    }
     //05-02-2021 by Rajesh Rathod: this function return the state name
     function getCountryStateCityName($id,$tablename) {
        $db_obj = $this->load->module("db_api");
        if($tablename == 'iws_countries_info'){
            $myfields = "country_name";
            $where = "country_id='$id'";
        }
        if($tablename == 'global_states_info'){
            $myfields = "state_name";
            $where = "state_id='$id'";
        }
        if($tablename == 'global_cities_info'){
            $myfields = "city_name";
            $where = "city_id='$id'";
        }
        
        $state_result = $db_obj->select($myfields, $tablename, $where);
        return $state_result;
    }
    //05-06-2015 by venkstesh: this function return the state information based on country id
    function state_info_basedon_countryid($country_id) {
        $db_obj = $this->load->module("db_api");
        $myfields = "state_id,state_name";
        $where = "country_id='$country_id'";
        $mytable = 'global_states_info';
        $state_result = $db_obj->select($myfields, $mytable, $where);
        return $state_result;
    }

    //05-06-2015 by venkstesh: this function return the city information based on state id
    function city_info_basedon_stateid($state_id) {
        $db_obj = $this->load->module("db_api");
        $myfields = "city_id,city_name";
        $where = "state_id='$state_id'";
        $mytable = 'global_cities_info';
        $city_result = $db_obj->select($myfields, $mytable, $where);
        return $city_result;
    }

    function product_Posting($store_id) {
      $dbapi=$this->load->module("db_api");
      $stores_result = $this->getStoreDetails($store_id);
      $user_id=$this->get_UserId();
      $staff_details=$dbapi->select("role","oshop_staff","store_id_fk=".$stores_result[0]["store_aid"]." AND user_id_fk=".$user_id);
      if($staff_details==0 && $staff_details[0]["role"]!="PRODUCT_MANAGER"){
        redirect(base_url());
      }
      $store_name = $stores_result[0]["store_name"];
      $store_per_sale=$dbapi->custom("SELECT op.initial_percentage_on_sale as oneidnet_charge FROM oshop_stores os LEFT JOIN oshop_packages op ON os.current_package_id_fk = op.package_id LEFT JOIN oshop_store_renewals_info ore ON os.store_aid = ore.store_id_fk WHERE os.store_code = '". $store_id . "' AND is_renewed=0");
      $data["store_title"] = 'Add products to your stores for sale-' . $store_name . '|oneidnet.com';
      $data["meta_description"] = 'Create/Add products to your store in oneshop';
      $data["meta_keywords"] = "Create/Add products to your store in oneshop";
      $data["select_product_posting"] = 'yes';
      $data["catagories"] = $this->os_category_list();
      $data["store_code"] = $store_id;
      $data['store_oneidcharge'] = $store_per_sale;
      $data['store_details'] = $stores_result;
      $this->load->view("home/new_product_posting", $data);
     }

    function product_updating($store_id,$product_id) {
      $dbapi=$this->load->module("db_api");
      $stores_result = $this->getStoreDetails($store_id);
      $user_id=$this->get_UserId();
      $staff_details=$dbapi->select("role","oshop_staff","store_id_fk=".$stores_result[0]["store_aid"]." AND user_id_fk=".$user_id);
      if($staff_details==0 && $staff_details[0]["role"]!="PRODUCT_MANAGER"){
        redirect(base_url());
      }
      $store_name = $stores_result[0]["store_name"];
      $store_per_sale=$dbapi->custom("SELECT op.initial_percentage_on_sale as oneidnet_charge FROM oshop_stores os LEFT JOIN oshop_packages op ON os.current_package_id_fk = op.package_id LEFT JOIN oshop_store_renewals_info ore ON os.store_aid = ore.store_id_fk WHERE os.store_code = '". $store_id . "' AND is_renewed=0");
      $prod_det=$dbapi->custom("SELECT * FROM oshop_products WHERE product_code = '".$product_id."'");
      $data["store_title"] = 'Update products to your stores for sale-' . $store_name . '|oneidnet.com';
      $data["meta_description"] = 'Update products to your store in oneshop';
      $data["meta_keywords"] = "Update products to your store in oneshop";
      $data["select_product_posting"] = 'no';
      $data["catagories"] = $this->os_category_list();
      $data["store_code"] = $store_id;
      $data['store_oneidcharge'] = $store_per_sale;
      $data['store_details'] = $stores_result;
      $data['product_detail'] = $prod_det;
      $this->load->view("home/edit_product_posting", $data);
     }

    // Code By Uravashi Start For Inventory 03-09-2020
    function store_inventory($store_id) 
    {
        $dbapi=$this->load->module("db_api");
      $stores_result = $this->getStoreDetails($store_id);
        $user_id=$this->get_UserId();
        $staff_details=$dbapi->select("role","oshop_staff","store_id_fk=".$stores_result[0]["store_aid"]." AND user_id_fk=".$user_id);
        if($staff_details==0 && $staff_details[0]["role"]!="PRODUCT_MANAGER"){
            redirect(base_url());
        }
        $store_name = $stores_result[0]["store_name"];
        $data["store_title"] = 'Add products to your stores for sale-' . $store_name . '|oneidnet.com';
        $data["meta_description"] = 'Create/Add products to your store in oneshop';
        $data["meta_keywords"] = "Create/Add products to your store in oneshop";
        $sql=" SELECT pros.product_name,pros.product_aid  FROM oshop_products as pros inner join  oshop_stores as oshs  on oshs.store_aid = pros.store_id_fk";
        $data["productlist"] = $dbapi->custom($sql);
        // $data["productlist"] = $this->os_product_list();
        $data["store_code"] = $store_id;
        $data['store_details'] = $stores_result;
        $this->load->view("home/inventory_posting", $data);
        //$this->load->view("home/inventory_posting", $data);
      }

    function productlist(){
        $connect = mysqli_connect("localhost","root","Admin@2020","db_oneidnet");
        $searchTerm = $_GET['term'];
        $scode = $_GET['store'];
        $sql="SELECT product_name FROM oshop_products as op inner join  oshop_stores as oshs  on oshs.store_aid = op.store_id_fk WHERE store_code='".$scode."' AND product_name LIKE '%".$searchTerm."%' ORDER BY product_name ASC LIMIT 10";
        $result = mysqli_query($connect,$sql);
        // echo var_dump($result);
        while($row = mysqli_fetch_array($result)){
            $json[] = $row['product_name'];
        }
        echo json_encode($json);
    }

    #Creayed By - Mitesh
    function store_promo($store_id) 
    {
        $dbapi=$this->load->module("db_api");
        $stores_result = $this->getStoreDetails($store_id);
        $user_id=$this->get_UserId();
        $staff_details=$dbapi->select("role","oshop_staff","store_id_fk=".$stores_result[0]["store_aid"]." AND user_id_fk=".$user_id);
        if($staff_details==0 && $staff_details[0]["role"]!="PRODUCT_MANAGER"){
            redirect(base_url());
        }
        $store_name = $stores_result[0]["store_name"];
        $data["store_title"] = 'Add products to your stores for sale-' . $store_name . '|oneidnet.com';
        $data["meta_description"] = 'Create/Add products to your store in oneshop';
        $data["meta_keywords"] = "Create/Add products to your store in oneshop";
        $sql="SELECT *  FROM oshop_sales as osale inner join  oshop_stores as oshs  on oshs.store_aid = osale.store_id_fk";
        $data["promolist"] = $dbapi->custom($sql);
        // $data["productlist"] = $this->os_product_list();
        $data["store_code"] = $store_id;
        $data['store_details'] = $stores_result;
        $this->load->view("home/promo_sales", $data);
        //$this->load->view("home/inventory_posting", $data);
    }

    

    function mystore_Profile_Page($store_id = null) {

        if ($store_id == null) {
            $store_aid = $this->products->store_id_return();
            $store_id = $this->products->store_unique_id($store_aid);
        }
        $this->check_store_id($store_id);
        $dev_store_result["store_rating"] = $this->store_rating($store_id);
        $db_obj = $this->load->module("db_api");
        $myfields = "store_aid,name,store_id,logo_path,cover_path,created_by";
        $where = "store_id='$store_id'";
        $mytable = 'os_all_store';
        $dev_store_result['results_store'] = $db_obj->select($myfields, $mytable, $where);
        $db_obj->custom("update os_all_store set visit_count=visit_count+1 where store_id='$store_id'");
        $id = $this->get_store_ownerId();
        $dev_store_result['results_store'][0]["own_store_id"] = $this->products->store_uniqueid_return($id);
        $dev_store_result["title"] = "Buy products online from " . $dev_store_result['results_store'][0]["name"] . "|oneidnet.com";
        $dev_store_result["meta_description"] = $dev_store_result['results_store'][0]["name"];
        $dev_store_result["meta_keywords"] = $dev_store_result['results_store'][0]["name"];
        $this->load->view("home/mystore_profile_page", $dev_store_result);
    }

    function user_Profile_Page1() {
        /* $data["user_details"] = $this->userdetails_return();
          $data["friendstores"]= $this->getfriendsStore();
          $data["savedproducts"]= $this->getsavedproducts();
          $data["useractivity"]= $this->Useractivity();

          $data['orderhistory']=  $this->getOrderHistory();
          $data['timezone']=$this->get_UserTimezone(); */
        $this->load->view("home/user_profile_page");
    }

    function user_Profile_Page() {
        $profile_id=isset($_REQUEST["profile_id"])?$_REQUEST["profile_id"]:$this->get_UserId();
        // echo var_dump($profile_id);
        $data["user_details"] = $this->userdetails_return($profile_id);
        $db_api = $this->load->module("db_api");

       $sql=" SELECT profile_id_fk ,os.profile_name  ,os.profile_img ,os.profile_cover_img ,iw.user_id  FROM os_user_details as os

              inner join  iws_profiles as iw  on os.profile_id_fk = iw.profile_id
               where os.profile_id_fk=".$profile_id ;
        $data["user_details"] = $db_api->custom($sql);

        $this->load->view("home/user_profile_page", $data);
    }

    function purchaseHistory() {
        $db_api = $this->load->module("db_api");
        $user_id=$this->get_UserId();
        $filter_val=($this->input->post("filter_val")!="")?$this->input->post("filter_val"):"";
        $sql = "select * from oshop_orders where ordered_by=".$user_id;
        if($filter_val!=""){
            $status="";
            if($filter_val=="order_placed"){
                $status="JUST_PLACED";
            }else if($filter_val=="order_delivered"){
                $status="DELIVERED";
            }else if($filter_val=="order_cancelled"){
                $status="CANCELLED";
            }else if($filter_val=="order_process"){
                $status="PROCESSING";
            }
            $sql.=" AND status='".$status."'";
        }
        $order_result = $db_api->custom($sql);
        $sid = "select created_by from oshop_stores where store_aid=".$order_result[0]["store_id_fk"];
        $sid_result = $db_api->custom($sid);
        $soid = "select * from iws_profiles where profile_id=".$sid_result[0]["created_by"];
        $soid_result = $db_api->custom($soid);
        $data["orderhistory"] = $order_result;
        $data["owner_contact"] = $soid_result;
        $storecode = "ST1".$order_result[0]["store_id_fk"];
        $data["storeid"] = $storecode;
        // echo var_dump($soid_result);
        $data["is_accessible"]="yes";
        $data['timezone'] = $this->get_UserTimezone();
        $this->load->view("home/purchase_history_tpl", $data);
    }

    //Pavani : For user activity
    function Useractivity() {
		$userid = $this->get_UserId();
        $dbapi = $this->load->module("db_api");
        $filter_by=($this->input->post("filter_val")!="")?$this->input->post("filter_val"):"ALL";
        $userid = $this->get_UserId();
        $sreviews_result=0;
        $previews_result=0;
        $cancel_result=0;
        $orders_result=0;
        if($filter_by=="ALL" || $filter_by=="order_placed"){
            $orders_query = "SELECT orders.time,order_code,order_aid,primary_image,product_name,store_aid,store_name,store_code,product_aid FROM oshop_orders orders INNER JOIN oshop_products prods ON orders.product_id_fk=prods.product_aid INNER JOIN oshop_stores stores ON orders.store_id_fk=stores.store_aid WHERE ordered_by=" . $userid;
            if($filter_by!="" && $filter_by=="order_placed"){
                $orders_query.=" AND orders.status='JUST_PLACED'";
            }
            $orders_result = $dbapi->custom($orders_query);
        }
        if($filter_by=="ALL" || $filter_by=="store_review"){
            $sreviews_query = "SELECT store_name,store_aid,store_code,review_text,commented_on,profile_image_path FROM oshop_store_reviews reviews INNER JOIN oshop_stores stores ON reviews.store_id_fk=stores.store_aid WHERE user_id_fk=" . $userid;
            $sreviews_result = $dbapi->custom($sreviews_query);
        }
        if($filter_by=="ALL" || $filter_by=="product_review"){
          $previews_query = "SELECT product_name,(SELECT store_code FROM oshop_stores WHERE store_aid=store_id_fk) as code,rating_on,text,rating,product_aid,product_code,primary_image FROM oshop_product_reviews rviews INNER JOIN oshop_products prods ON rviews.product_aid_fk=prods.product_aid WHERE user_id_fk=" . $userid;
          $previews_result = $dbapi->custom($previews_query);
        }
        if($filter_by=="ALL" || $filter_by=="order_cancellation"){
            $cancel_query = "SELECT order_code,orders.time,prods.primary_image,stores.store_name,store_code,store_aid,order_aid,product_aid FROM oshop_cancellation cancel INNER JOIN oshop_orders orders ON cancel.order_id_fk=orders.order_aid INNER JOIN oshop_products prods ON orders.product_id_fk=prods.product_aid INNER JOIN oshop_stores stores ON orders.store_id_fk=stores.store_aid WHERE ordered_by=" . $userid;
            $cancel_result = $dbapi->custom($cancel_query);
        }

        $users["orders"] = $orders_result;
        $users["store_reviews"] = $sreviews_result;
        $users["product_reviews"] = $previews_result;
        $users["order_cancellations"] = $cancel_result;
        $this->load->view("home/user_activity_tpl", $users);
        //return $users;
    }

    function getsavedproducts() {
		$user_id = $this->get_UserId();
        $db_api = $this->load->module("db_api");
        //$user_id = $this->get_UserId();
        $query = "SELECT  os.store_code, op.product_aid,op.product_code,op.product_name,op.primary_image ,op.cost_price    FROM `oshop_saved_products` osp  join oshop_products as op
        on product_id_fk = product_aid join `oshop_stores` as os  on os.store_aid=op.store_id_fk where osp.profile_id=$user_id";
        $product_result = $db_api->custom($query);
        $data["savedproducts"] = $product_result;
        //return $product_result;
        $this->load->view("home/saved_products_tpl", $data);
    }

    function get_MYStore() {
		$user_id = $this->get_UserId();
        $db_api = $this->load->module("db_api");
        //$query = "SELECT store_aid,store_code,store_name,profile_image_path FROM `oshop_stores` where created_by in (SELECT friend_id FROM `iws_friends_list` where iws_profile_id=$user_id ) ";
         $query = "SELECT store_aid,store_code,store_name,profile_image_path FROM `oshop_stores` where created_by =".$user_id;
        $store_result = $db_api->custom($query);
        $data["friendstores"] = $store_result;
        //return $store_result;
        $this->load->view("home/friends_store_tpl", $data);
    }

    function filter_orderhistory() {
        $no_days = $this->input->post("days");
        $db_api = $this->load->module("db_api");
        $user_id = $this->get_UserId();
        $sql = "select * from oshop_orders where DATEDIFF(NOW(),time) > $no_days and ordered_by=$user_id ";
        $data['orderhistory'] = $db_api->custom($sql);
        $data['timezone'] = $this->get_UserTimezone();
        $this->load->view('home/tab1data', $data);
    }

    public function product_Detail_View1() {
        echo $_REQUEST["product_id"];
    }

    public function product_Detail_View12() {
        //print_r($_REQUEST);
        if (!$_REQUEST["product_id"]) {
            redirect(base_url());
        }
        $product_id = base64_decode(base64_decode($_REQUEST["product_id"]));
        $this->product_id_check($product_id);
        $user_id = $this->get_UserId();
        $loggedin_res = $this->db_api->select("img_path", "iws_profiles", "profile_id=" . $user_id);
        $data["loggedinuser_img"] = $loggedin_res[0]["img_path"];
        $products_res = $this->db_api->custom("select oas.store_aid as store_id,oas.store_code as store_code,oas.store_name as store_name,oas.profile_image_path as logo_path, op.product_aid, op.product_code,op.cost_price, op.sale_price, op.product_name, op.discount, op.specification,osc.groups as category_name, osc.category_name as subcategory_name,op.primary_image as prod_img1,op.secondary_image as prod_img2,op.tertiary_image as prod_img3,op.quaternary_image as prod_img4 from oshop_products op left join oshop_stores oas on op.store_id_fk=oas.store_aid left join oshop_categories osc on op.product_category_id_fk=osc.category_id_fk where op.product_aid=" . $product_id);
        $data["product_details"] = $products_res;
        //$this->db_api->custom("update os_product_more_info set viewed_count=viewed_count+1 where product_aid=" . $product_id);
        //$data["product_details"][0]["mode"]=$mode;
        //var_dump($data);
        $data["title"] = "Buy " . $data["product_details"][0]["product_name"] . " online--" . $data["product_details"][0]["store_name"] . "|oneidnet.com";
        //$data["meta_description"] = $data["product_details"][0]["Category_name"].",".$data["product_details"][0]["subcategory_name"].",".$data["product_details"][0]["store_name"];
        //$data["meta_keywords"] = $data["product_details"][0]["Category_name"].",".$data["product_details"][0]["subcategory_name"].",".$data["product_details"][0]["store_name"];
        
        $this->load->view("home/product_detail_view", $data);
    }

    //On 01-june-2015 to show  the products in edit mode by ramadevi
    /*function product_edit() {
        $product_id = $_GET["id"];
        $product_id = base64_decode(base64_decode(base64_decode($product_id)));
        $this->product_check($product_id);

        $db_obj = $this->load->module("db_api");
        $dev_product_result['results_products'] = $db_obj->custom("select  op.*,oas.store_id as store_unique_id from os_products op left join  os_all_store oas on op.store_id=oas.store_aid  where  product_aid=" . $product_id);
        $dev_product_result['os_category_list'] = $this->os_category_list();
        $dev_product_result['results_products'][0]["subcategory_name"] = $this->subcategory_Name($dev_product_result['results_products'][0]["subcategory_id"]);
        //echo"<pre>";print_R($dev_product_result['results_products']);echo"</pre>";
        $this->load->view("home/product_edit", $dev_product_result);
    }*/
     function product_edit($store_code,$product_code) {
		 $prod_qry = "SELECT * FROM oshop_products WHERE product_code = '".$product_code."'";
         $prod_res = $this->db_api->custom($prod_qry);
         $data['store_prod']=$prod_res;
         $data['cost_price']="cost_price";
         // echo $prod_res[0]['product_name'];
//Edited By Mitesh => edit product list
         $this->load->view("home/product_edit1",$data);
         //print_r( $prod_res);
	 }
//Edited By Mitesh => Delete produt function call from product_search_result;
    function product_delete($store_code,$product_code) {
        $prod_qry = "DELETE FROM oshop_products WHERE product_code = '".$product_code."'";
        $prod_res = $this->db_api->custom($prod_qry);
        redirect(base_url()."store_products/".  $store_code);         
         //print_r( $prod_res);
     }

//25-06-2015 by venaktesh : this function check product belogongs to current store id not
    function product_check($pid) {
        $os_own_id = $this->get_store_ownerId();
        $db_obj = $this->load->module("db_api");
        $rlt = $db_obj->custom("select ops.product_aid from os_products ops left join os_all_store oas on ops.store_id=oas.store_aid where ops.product_aid=$pid and oas.created_by=$os_own_id");
        if ($rlt == 0) {
            redirect(base_url());
        }
    }

    //On 01-june-2015 to update the product information by ramadevi.
    function update_product_info() {
        $templates_obj = $this->load->module("templates");
        $products_obj = $this->load->module("products");
        $rlt = $templates_obj->store_manager_return($products_obj->store_id_return());
        $rlt[0]["store_manager_emails"] = str_replace("~", "R", $rlt[0]["store_manager_emails"]);
        $rlt[0]["store_manager_emails"] = str_replace("RR", "R,R", $rlt[0]["store_manager_emails"]);

        if (preg_match("/\bR" . $_SESSION['user_id'] . "R\b/i", $rlt[0]["store_manager_emails"]) || $_SESSION['store_owner_id'] == $_SESSION['user_id']) {
            $product_aid = $_REQUEST["product_aid"];
            $a_data = array(
                "cost_price" => $_REQUEST["product_costprice"],
                "sell_price" => $_REQUEST["product_sellprice"],
                "name" => $_REQUEST['Product_name'],
                "discount" => $_REQUEST['product_discount'],
                "manufactering_date" => $_REQUEST["product_mdate"],
                "quantity" => $_REQUEST["product_quantity"],
                "specification" => $_REQUEST["product_specification"],
                "description" => $_REQUEST["product_description"],
                "category" => $_REQUEST["product_category"]
            );
            foreach ($a_data as $key => $val) {
                $a_data[$key] = $this->test_input($a_data[$key]);
            }
            $mytable = "os_products";
            $s_where = "product_aid =" . $product_aid;
            $result = ( $this->db_api->update($a_data, $mytable, $s_where));
            echo $result;
            $product_edit["product_aid"] = $product_aid;
            $this->load->module("notification");
            $this->notification->product_edit_notification($product_edit);

            /* $product_aid = $_REQUEST["product_aid"];
              $product_edit["product_aid"]=$product_aid;
              $this->load->module("notification");
              $this->notification->product_edit_notification($product_edit); */
        } else {
            echo "expire";
            unset($_SESSION["store_owner_id"]);
        }
    }

    //Pavani on 10-06-2015
    function cart_Items($store_id = 0) {
        $dbobj = $this->load->module("db_api");
        $userid = $this->get_UserId();
        //echo $store_id;
        $s_query = "SELECT * FROM os_cart_items cart INNER JOIN os_all_store stores ON cart.store_id_fk=stores.store_aid WHERE profile_id=" . $userid . " GROUP BY store_id_fk";
        //echo $s_query;
        $carts_res = $dbobj->custom($s_query);
        //var_dump($carts_res);
        $data["cart_stores"] = $carts_res;
        //$this->load->view('mycart/mycart_stores',$data);
        $data["select_cart_items"] = 'yes';
        $data["storeid"] = $store_id;
        $data["title"] = "Cart items|oneidnet.com";
        $data["meta_description"] = "cart itmes in oneshop";
        $data["meta_keywords"] = "cart itmes in oneshop";
        $this->load->view("home/cart_items", $data);
    }

    function mystore_Products() {
        $stores_result = $this->getStoreDetails($store_id);
        $store_name = $stores_result[0]["store_name"];
        $data["store_title"] = 'View products to your stores for sale-' . $store_name . '|oneidnet.com';
        $data["meta_description"] = 'View products to your store in oneshop';
        $data["meta_keywords"] = "View products to your store in oneshop";
        $data["select_product_posting"] = 'yes';
        $data["catagories"] = $this->os_category_list();
        $data["store_code"] = $store_id;
        $data['store_details'] = $stores_result;
        $this->load->view("home/mystore_products");
    }

    function item_Shipping_Address() {
        $this->load->view("home/item_shipping_address");
    }

    function mystore_Reports($store_code) {
        $db_api = $this->load->module("db_api");
        $staff_result=$this->getStaffDetails($store_code);
        
        if($staff_result[0]["cnt"]==0||$staff_result[0]["cnt"]=="PRODUCT_MANAGER"||$staff_result[0]["cnt"]=="ORDER_MANAGER"){
          redirect(base_url());
        }

        $result = $db_api->select("store_aid,store_name,store_code,profile_image_path,is_active ", "oshop_stores", "store_code='" . $store_code . "'");
        $store_name = $result[0]["store_name"];
        $data["store_details"] = $result;
        $data["store_title"] = "My store reports-" . $store_name . "|oneidnet.com";
        $data["meta_description"] = "Oneshop store owners reports";
        $data["meta_keywords"] = "Oneshop store owners reports";
        $this->load->view("home/mystore_reports", $data);
    }

//26-05-2015 global function by venkatesh : this function get location info based on ip adsress
    function get_ip_info() {
        $myPublicIP = trim(shell_exec("dig +short myip.opendns.com @resolver1.opendns.com"));
        require APPPATH . '/libraries/GetIP_loc.php';
        $data_obj = new GetIP_loc();
        $data = $data_obj->getInfo($myPublicIP);
        return $data["country_code"];
    }

//26-05-2015 global function by venkatesh : this function return public ip address
    function get_client_ip() {
        $myPublicIP = trim(shell_exec("dig +short myip.opendns.com @resolver1.opendns.com"));
        return $myPublicIP;
    }

//26-05-2015 global function by venkatesh : this function return time zone
    function time_zone() {
        return date_default_timezone_get();
    }

//27-o5-2015 by venkatesh : this function retrive the country information based on public ip address
    function country_info_based_on_ip() {
        $db_obj = $this->load->module("db_api");
        $myfields = "country_id,country_code,country_name";
        //$where = "webCode='" . $this->get_ip_info()."'";
        $where = "webCode= 'IN'";
        $mytable = "iws_countries_info";
        $result = $db_obj->select($myfields, $mytable, $where);
        return $result;
    }

//27-05-2015 by venkatesh : this function retrive the state information based on country id
    function state_info() {
        $myfields = "state_id,state_name";
        $where = "country_id= " . $_REQUEST["country_id"];
        $mytable = "global_states_info";
        $result = $this->db_api->select($myfields, $mytable, $where);
        echo "<option value=''>--Select State--</option>";
        for ($i = 0; $i < count($result); $i++) {
            echo "<option value=" . $result[$i]["state_id"] . ">" . $result[$i]["state_name"] . "</option>";
        }
    }

    //27-05-2015 by venkatesh : this function return cities list based on state id
    function city_info() {
        $myfields = "city_id,city_name";
        $where = "state_id= " . $_REQUEST["state_id"];
        $mytable = "global_cities_info";
        $result = $this->db_api->select($myfields, $mytable, $where);
        echo "<option value=''>--Select city--</option>";
        for ($i = 0; $i < count($result); $i++) {
            echo "<option value=" . $result[$i]["city_id"] . ">" . $result[$i]["city_name"] . "</option>";
        }
    }

//27-05-2015 by venkatesh : this function return category list
    function os_category_list() {
        $myfields = "*";
        $where = 1;
        $mytable = "os_category";
        $dbapi = $this->load->module("db_api");
        $result = $dbapi->select($myfields, $mytable, $where);
        return $result;
    }

    function oshop_category_list() {
        $myfields = "*";
        $where = 1;
        $mytable = "os_category";
        $dbapi = $this->load->module("db_api");
        $result = $dbapi->select($myfields, $mytable, $where);
        return $result;
    }

    //01-06-2015 by venkatesh : this function return caragory name
    function catagoryname($catagory_id) {
        $myfields = "name";
        $where = "category_aid=" . $catagory_id;
        $mytable = "os_category";
        $result = $this->db_api->select($myfields, $mytable, $where);
        return $result[0]["name"];
    }

    function subcategory_Name($subcategory_id) {
        $myfields = "name";
        $where = "subcategory_aid=" . $subcategory_id;
        $mytable = "os_subcategory";
        $result = $this->db_api->select($myfields, $mytable, $where);
        return $result[0]["name"];
    }

    function paypalView() {
        $this->load->view('paypalpage');
    }

    /* function to save details of user payment */

    function buynow() {
        //$this->load->module('db_api');
        $msg = "";
        $id = $this->get_UserId();
        if ($_REQUEST['txn_id'] != 0 && $_REQUEST['payer_status'] == 'verified') {
            $mc_gross = $_REQUEST['mc_gross'];
            $order_no = $this->retrieve_order_number();
            $payer_email = $_REQUEST['payer_email'];
            $item_number = $_REQUEST['item_number'];
            $quantity = $_REQUEST["quantity"];
            $txn_id = $_REQUEST['txn_id'];
            $order_dt = date("Y-m-d H:i:s");
            $prods = $this->load->module("products");
            $store_id = $_REQUEST['custom'];
            if ($store_id != "public") {
                $store_aid = $prods->store_aid_return($store_id);
                $fields = array('ordered_by' => $id, 'order_num' => $order_no, 'payer_email' => $payer_email, 'product_id_str' => $item_number, 'transaction_id' => $txn_id, 'total_amount_str' => $mc_gross, 'store_id_fk' => $store_id, "quantity_str" => $quantity, "order_date" => $order_dt);
            } else {
                $store_aid = 0;
                $fields = array('ordered_by' => $id, 'order_num' => $order_no, 'payer_email' => $payer_email, 'product_id_str' => $item_number, 'transaction_id' => $txn_id, 'total_amount_str' => $mc_gross, 'store_id_fk' => $store_aid, "quantity_str" => $quantity, "order_date" => $order_dt);
            }
            foreach($fields as $key=>$val){
                $fields[$key] = $this->test_input($fields[$key]);
            }
            $save_paypal_details = $this->db_api->insert($fields, 'os_orders');
            //echo "result:".$save_paypal_details;
            if ($save_paypal_details) {
                if ($store_id != "public") {
                    $s_uquery = "UPDATE os_products SET quantity=quantity-$quantity WHERE product_aid=" . $item_number;
                    $result = $this->db_api->custom($s_uquery);
                }
                /* updating the order number in shipping detail after successful payment */
                $s_where = "profile_id=" . $id . " ORDER BY created_on DESC LIMIT 1";
                $ship_result = $this->db_api->select("*", "os_shipping_detail", $s_where);
                $rec_aid = $ship_result[0]["rec_aid"];
                $s_ushipquery = "UPDATE os_shipping_detail SET order_id='" . $order_no . "' WHERE rec_aid=" . $rec_aid;
                $ship_res = $this->db_api->custom($s_ushipquery);
                /* updating the order number in shipping detail after successful payment */
                $msg = "SUCCESS";
                $this->orderMail($store_id, $order_no);
            } else {
                $msg = "ERROR";
            }
            $this->deleteOrder_id();
            echo $msg;
            $this->load->module("notification");
            if ($store_id != "public") {
                $this->notification->purchage_order_notifications($fields);
            } else {
                $this->notification->purchase_order_notifications($fields);
            }
        }
        /*   $msg = "";
          $id = $this->get_UserId();
          $rv=1;
          if ($rv==1) {
          $mc_gross = 123456;
          $order_no=$this->retrieve_order_number();
          $payer_email = "venkatesh@gmail.com";
          $item_number = 23;
          $store_id ="ag1s0mso";
          $quantity=23;
          $txn_id = "er343423er";
          $order_dt=date("Y-m-d H:i:s");
          $prods=$this->load->module("products");
          $store_aid=$prods->store_aid_return($store_id);
          $fields = array('ordered_by' => $id,'order_num'=>$order_no, 'payer_email' => $payer_email, 'product_id_str' => $item_number, 'transaction_id' => $txn_id, 'total_amount_str' => $mc_gross, 'store_id_fk' => $store_aid,"quantity_str"=>$quantity,"order_date"=>$order_dt);
          //echo "<pre>";print_R($fields);echo "</pre>";
          $save_paypal_details = $this->db_api->insert($fields, 'os_orders');
          $this->deleteOrder_id();
          $this->load->module("notification");
          $this->notification->purchage_order_notifications($fields);
          }
         */
    }

    //19-06-2015 by venkatesh this function using for create unique order number
    function retrieve_order_number() {
        $myfile = fopen("assets/order_id.txt", "r") or die("Unable to open file!");
        while (!feof($myfile)) {
            $line = fgets($myfile);
            $line = trim($line);
            $lines[] = $line;
        }
        return $lines[0];
    }

    //19-06-2015 by venkatesh : this function using for delete first line from uniqueid.txt file
    function deleteOrder_id() {
        $furl = "assets/order_id.txt";
        $lines = file($furl);
        unset($lines[0]);
        $file = fopen($furl, 'w');
        fwrite($file, implode('', $lines));
        fclose($file);
    }

    // function to send mail to store owner and user on order of item by Pavani on 16-06-2015
    function orderMail($storeid, $order_no) {
        $dbapi = $this->load->module("db_api");
        $s_where = "store_id_fk=" . $storeid;
        $mresult = $dbapi->select("*", "os_store_settings", $s_where);
        $order_status = $mresult[0]["notify_new_orders"];
        if ($order_status == "Y") {
            $s_cquery = "select orders.payer_email,orders.order_num,stores.store_aid,profiles.profile_id,profiles.username,profiles.email from os_orders orders inner join os_all_store stores on cancel.store_id_fk=stores.store_aid inner join iws_profiles profiles on stores.created_by=profiles.profile_id where orders.order_num='" . $order_no . "' limit 1;";
            $cresult = $dbapi->custom($s_cquery);
            $emailid_to = $cresult[0]["email"];
            $customer_email = $cresult[0]["payer_email"];
            $to_emails = $emailid_to . "," . $customer_email;
            $path = APPPATH . 'libraries/My_PHPMailer.php';
            $mailobj = new My_PHPMailer();
            $subject = "Order cancelled:" . $order_no;
            $mresult = $mailobj->send_mail($to_emails, $subject, "This is the mail to test the mail services");
        }
    }

    function cancel() {
        $this->load->view('paypalpage');
    }

    /* 29-05-2015 by Pavani */
    /* function sendMail(){
      $path=APPPATH.'libraries/My_PHPMailer.php';
      $mailobj=new My_PHPMailer();
      $result=$mailobj->send_mail("pavani5642@gmail.com","first test mail","This is the mail to test the mail services");
      echo $result;
      } */

    //04-05-2015 by venkatesh this function using for
    function userdetails_return($profile_id="") {
        $db_obj = $this->load->module("db_api");
        if($profile_id==""){
            $where = "profile_id_fk=" . $this->get_UserId();
        }else{
            $where="profile_id_fk=".$profile_id;
        }
        // echo var_dump($profile_id);
        $userdetails = $db_obj->select("*", "os_user_details", $where);
        return $userdetails;
    }

    function dataenter() {
        $db_obj = $this->load->module("db_api");
        for ($i = 1; $i < 146; $i++) {
            $db_obj->custom("insert into os_product_more_info (product_aid) values (" . $i . ")");
        }
    }

//9 june 2015 to update mySettings.by ramadevi
    function mySettings() {
        $data['countries_info'] = $this->globalCountriesInfo();
        $cookies_obj = $this->load->module("cookies");
        $country_id = $cookies_obj->getUserCountryID();
        $db_obj = $this->load->module("db_api");
        $user_id = $this->get_UserId();
        //$country_info=$this->country_info_based_on_ip();
        //$country_id=$_SESSION["COUNTRY_ID"];
        $myfields = "*";
        $where = "profile_id_fk=$user_id";

        $mytable = "os_user_details";
        $data['user_information'] = $db_obj->select($myfields, $mytable, $where);
        $dev_os_country_id = $data['user_information'][0][country];
        //echo $dev_os_country_id;
        $data['country_info'] = $db_obj->custom("select country_name,country_id from global_countries_info where country_id=$country_id");


        $dev_os_state_id = $data['user_information'][0][state];
        $data['states_info'] = $db_obj->custom("select state_name,state_id from global_states_info where state_id=$dev_os_state_id");

        $dev_os_city_id = $data['user_information'][0][city];
        $data['cities_info'] = $db_obj->custom("select city_name,city_id from global_cities_info where city_id=$dev_os_city_id");

        $data['countries_states_info'] = $db_obj->custom("select state_name,state_id from global_states_info where country_id=$country_id");
        $data['countries_cities_info'] = $db_obj->custom("select city_name,city_id  from global_cities_info where state_id=$dev_os_state_id");

        $this->load->view("home/mySettings", $data);
    }

//5 june 2015 to get countrieslist by ramadevi.
    function globalCountriesInfo() {
        $db_obj = $this->load->module("db_api");
        $myfields = "country_name,country_id";
        $where = "";
        $mytable = "iws_countries_info";
        $result = $db_obj->select($myfields, $mytable, $where);
        return $result;
    }

    function updateMySettings() {

        $address1 = $_REQUEST["dev_os_addr1"];
        $adress2 = $_REQUEST["dev_os_addr2"];
        $zip_code = $_REQUEST["zip_code"];
        $city = $_REQUEST["dev_os_cities_list"];
        $state = $_REQUEST["state"];

        if ($address1 == '' || $adress2 == '' || $zip_code == '' || $city == '' || $state == '') {

            echo "Please enter all the information.";
        } else {
            $user_id = $this->get_UserId();
            $db_obj = $this->load->module("db_api");
            $a_data = array(
                "addressline1" => $_REQUEST["dev_os_addr1"],
                "addressline2" => $_REQUEST["dev_os_addr2"],
                "state" => $_REQUEST["state"],
                "city" => $_REQUEST["dev_os_cities_list"],
                "zip_code" => $_REQUEST["zip_code"],
                "country" => $_REQUEST["os_country"]
            );
            foreach ($a_data as $key => $val) {
                $a_data[$key] = $this->test_input($a_data[$key]);
            }
            $mytable = "os_user_details";
            $s_where = "profile_id_fk =" . $user_id;

            $result = $db_obj->update($a_data, $mytable, $s_where);
            echo $result;
        }
    }

//11 june 2015 by ramadevi .
    function upgradePackage() {
        $store_aid = $this->products->store_id_return();
        $storeid = $this->products->store_unique_id($store_aid);
        $dbapi = $this->load->module("db_api");
        $pkg_name = $this->input->post("package");
        $s_query = "select packages.storage,packages.price,packages.package_name,packages.package_id,stores.renewed_on,stores.expired_on,stores.store_id_fk from os_store_renewals_info stores inner join os_store_packages packages on stores.package_id_fk=packages.package_id where stores.store_id_fk=$store_aid and packages.country_id_fk=85 order by renewed_on desc limit 1;";
        $store_res = $dbapi->custom($s_query);
        $stores_data = array();
        $stores_data["created_on"] = $store_res[0]["renewed_on"];
        $stores_data["expired_on"] = $store_res[0]["expired_on"];
        $stores_data["package_id"] = $store_res[0]["package_id"];
        $stores_data["package_name"] = $store_res[0]["package_name"];
        $stores_data["price"] = $store_res[0]["price"];
        $stores_data["space_storage"] = $store_res[0]["storage"];
        //var_dump($stores_data);
        $data["store_id"] = $store_aid;
        $data["stores_data"] = $stores_data;
        $this->load->view("home/upgrade_package", $data);
    }

    function detailsOfPackage() {
        $dbobj = $this->load->module("db_api");
        $package_name = $this->input->post("package");
        $s_where = "country_id_fk=85 AND package_name='" . $package_name . "'";
        $pkg_result = $dbobj->select("*", "os_store_packages", $s_where);
        $pkg_str = "";
        foreach ($pkg_result as $rows) {
            $pkg_str = $pkg_str . $rows["package_id"] . "~" . $rows["package_name"] . "~" . $rows["storage"] . "~" . $rows["price"];
        }
        echo $pkg_str;
    }

//12june 2015 function for my_order cancellations by ramadevi.
    function orderCancellation() {
        $store_aid = $this->products->store_id_return();
        $storeid = $this->products->store_unique_id($store_aid);
        $data["store_id"] = $storeid;
        $this->load->view('home/myorder_cancellation', $data);
    }

    function productData($p_id) {
        $db_obj = $this->load->module("db_api");
        $s_where = "product_aid=$p_id";
        $order_data_canceled = $db_obj->select("name,image_path", "os_products", $s_where);
        $image_paths = $order_data_canceled[0]['image_path'];
        // echo  $order_data_canceled[0]['image_path'];
        $img_arry = explode(",", $image_paths);
        echo $img_arry[0];
        echo "," . $order_data_canceled[0]['name'];
    }

//16-06-2015 by venkatesh
    function staff_edit($store_uid) {
        $data['staff_info'] = $this->staff_details($store_uid);
        $db_obj = $this->load->module("db_api");
        $myfields = "*";
        $where = "store_id='$store_uid'";
        $mytable = 'os_all_store';
        $data['store_info'] = $db_obj->select($myfields, $mytable, $where);
        $this->load->view("home/staff_detail_edit", $data);
    }

//16-06-2015 by venkatesh
    function staff_details($store_uid = null) {
        $this->load->module("products");
        $store_aid = $this->products->store_aid_return($store_uid);

        $db_obj = $this->load->module("db_api");
        $rlt = $db_obj->select("order_manager_emails,store_manager_emails", "os_store_settings", "store_id_fk=$store_aid");


        $order_manager_emails = str_replace("~~", ",", $rlt[0]["order_manager_emails"]);
        $order_manager_emails = trim($order_manager_emails, "~");
        $order_manager_emails = explode(",", $order_manager_emails);
        $store_manager_emails = str_replace("~~", ",", $rlt[0]["store_manager_emails"]);
        $store_manager_emails = trim($store_manager_emails, "~");
        $store_manager_emails = explode(",", $store_manager_emails);

        for ($i = 0; $i < count($order_manager_emails); $i++) {
            $rltt[$i]["order_manager_emails"] = $db_obj->select("profile_id,first_name,middle_name,last_name,email", "iws_profiles", "profile_id=$order_manager_emails[$i]");
            $rltt[$i]["store_manager_emails"] = $db_obj->select("profile_id,first_name,middle_name,last_name,email", "iws_profiles", "profile_id=$store_manager_emails[$i]");
        }
        return $rltt;
    }

//16-06-2015 by venkatesh :this function shows store staff details page
    function staf_detail_view($store_uid) {
        $data['staff_info'] = $this->staff_details($store_uid);
        $db_obj = $this->load->module("db_api");
        $myfields = "*";
        $where = "store_id='$store_uid'";
        $mytable = 'os_all_store';
        $data['store_info'] = $db_obj->select($myfields, $mytable, $where);
        $this->load->view("home/staff_detail_view", $data);
    }

// function to send mail to the newly assigned owner by Pavani on 17-06-2015
    function adminMail() {
        $to_email = $this->input->post("useremail");
        $store_uid = $this->input->post("storeuid");
        $dbapi = $this->load->module("db_api");
        $s_query = "select * from os_all_store stores inner join iws_profiles profiles on stores.created_by=profiles.profile_id where stores.store_id='" . $store_uid . "'";
        $storeres = $dbapi->custom($s_query);
        $owner_email = $storeres[0]["email"];
        //$owner_email="pradeepkumarc3@gmail.com";
        $to_emails = $to_email . "," . $owner_email;
        //$s_where="store_id='".$store_uid."'";
        //$a_fields=array("created_by"=>);
        //$s_uresult=$dbapi->update("os_all_store",$s_where);
        $path = APPPATH . 'libraries/My_PHPMailer.php';
        $mailobj = new My_PHPMailer();
        $result = $mailobj->send_mail($to_emails, "Access Privileges", "This is to inform that you will be the owner of the store");
        echo $result;
    }

    // function to make payment for package upgradation by Pavani on 18-06-2015
    function upgradePkg() {
        $msg = "";
        $id = $this->get_UserId();
        if ($_REQUEST['txn_id'] != 0 && $_REQUEST['payer_status'] == 'verified') {
            //$mc_gross = $_REQUEST['mc_gross'];
            //$payer_email = $_REQUEST['payer_email'];
            $custom = $_REQUEST['custom'];
            $renew_dt = date("Y-m-d H:i:s");
            $expires_on = date("Y-m-d H:i:s", strtotime("+30 days"));
            $custom_arry = explode("~", $custom);
            $package_id = $custom_arry[0];
            $store_id = $custom_arry[1];
            $fields = array('package_id_fk' => $package_id, 'store_id_fk' => $store_id, 'renewed_on' => $renew_dt, 'is_renewed' => 1, 'expired_on' => $expires_on);
            foreach($fields as $key=>$val){
                $fields[$key] = $this->test_input($fields[$key]);
            }
            $save_paypal_details = $this->db_api->insert($fields, 'os_store_renewals_info');
            if ($save_paypal_details) {
                $s_uwhere = "store_aid=" . $store_id;
                $a_ufields = array("is_package_active" => "Yes");
                $s_uresult = $this->db_api->update($a_ufields, "os_all_store", $s_uwhere);
                $msg = "SUCCESS";
            } else {
                $msg = "ERROR";
            }
            if ($msg == "SUCCESS") {
                $surl = base_url() . "home/mystore/";
                header("Location:" . $surl);
            }
        }
    }

    //16 june 2015 by ramadevi
    function shippingAddress($dev_product_id, $store_uid = "", $custom = "") {
        $store_aid = $this->store_aid_return($store_uid);
        $db_obj = $this->load->module("db_api");
        $s_swhere = "store_aid=" . $store_uid;
        //$country_info=$this->country_info_based_on_ip();
        //$country_id=$_SESSION["COUNTRY_ID"];
        $cookies_obj = $this->load->module("cookies");
        $country_id = $cookies_obj->getUserCountryID();
        //$dev_product_result['country_info'] = $this->country_info_basedon_countryid($country_id);
        $stores_obj = $this->load->module("stores");
        $dev_product_result['country_info'] = $stores_obj->countriesList();
        if ($store_uid != "public") {
            if (strpos($dev_product_id, "~") > 0) {
                $product_str = str_replace("~", ",", $dev_product_id);
                $s_where = "product_aid IN ($product_str) and store_id=$store_aid";
            } else {
                $s_where = "product_aid=$dev_product_id and store_id=$store_aid";
            }
            $dev_product_result['product_results'] = $db_obj->select("*", "os_products", $s_where);
            $dev_product_result['store_unique_id'] = $store_uid;
            $dev_product_result['mode'] = "stores";
        } else {
            $s_where = "product_aid=$dev_product_id";
            $dev_product_result['product_results'] = $db_obj->select("product_name as name,sell_price,specifcation as specification,product_image_str as image_path", "os_public_products", $s_where);
            $dev_product_result['mode'] = "public";
        }
        $iws_profile_id = $this->get_UserId();
        $where = "profile_id_fk=$iws_profile_id";
        $dev_product_result['profile_id_address'] = $db_obj->select("*", "os_user_details", $where);
        $state_id = $dev_product_result['profile_id_address'][0]['state'];
        $city_id = $dev_product_result['profile_id_address'][0]['city'];
        $where1 = "state_id=$state_id";
        $dev_product_result['state_name'] = $db_obj->select("state_name", "global_states_info", $where1);
        $where2 = "city_id=$city_id";
        $dev_product_result['city_name'] = $db_obj->select("city_name", "global_cities_info", $where2);
        $where_country_id = "country_id=$country_id";
        $dev_product_result['states_list'] = $db_obj->select("state_name,state_id", "global_states_info", $where_country_id);
        $dev_product_result["custom"] = $custom;
        $this->load->view("home/item_shipping_address", $dev_product_result);
    }

    //to show the new billing adress tpl .by ramadevi 17 june 2015.
    function newBillingAddress() {
        // $country_info=$this->country_info_based_on_ip();
        //$country_id=$_SESSION["COUNTRY_ID"];
        $cookies_obj = $this->load->module("cookies");
        $country_id = $cookies_obj->getUserCountryID();
        //$dev_os_billingaddress['country_info'] = $this->country_info_basedon_countryid($country_id);
        $dev_os_billingaddress['country_info'] = "";

        $this->load->view('home/address_info', $dev_os_billingaddress);
    }

    function store_aid_return($store_u_id) {
        $db_obj = $this->load->module("db_api");
        $myfields = "store_aid";
        //Imp //$where = "country_code='" . $this->get_ip_info()."'";
        $where = "store_id='" . $store_u_id . "'";
        $mytable = "os_all_store";
        $result = $db_obj->select($myfields, $mytable, $where);
        return $result[0]["store_aid"];
    }

//by ramadevi on 22062015
    function insertShippingAddress() {

        $iws_profile_id = $this->get_UserId();
        $db_obj = $this->load->module('db_api');

        $date = $date = date('Y-m-d H:i:s');
        $dev_os_delivery_type = $_REQUEST["deliver_type"];
        // echo $dev_os_delivery_type;
        $a_data = array(
            "profile_id" => $iws_profile_id,
            "address_line1" => $_REQUEST["user_details_addres1"],
            "address_line2" => $_REQUEST["user_details_addres2"],
            "country" => $_REQUEST['dev_billing_os_country'],
            "state" => $_REQUEST['dev_billing_os_state_list'],
            "city" => $_REQUEST["dev_os_billing_citieslist"],
            "zip_code" => $_REQUEST["user_details_zipcode"],
            "created_on" => $date
        );
        $mytable = "os_shipping_detail";
        foreach ($a_data as $key => $val) {
            $a_data[$key] = $this->test_input($a_data[$key]);
        }
        $result = $db_obj->insert($a_data, $mytable);
        echo $result;
    }

    function updateUserAddress() {
        $delivery_type = $_REQUEST['deliver_type'];
        $iws_profile_id = $this->get_UserId();
        $a_data = array(
            "addressline1" => $_REQUEST["user_details_addres1"],
            "addressline2" => $_REQUEST["user_details_addres2"],
            "country" => $_REQUEST['dev_billing_os_country'],
            "state" => $_REQUEST['dev_billing_os_state_list'],
            "city" => $_REQUEST["dev_os_billing_citieslist"],
            "zip_code" => $_REQUEST["user_details_zipcode"]
        );
        foreach ($a_data as $key => $val) {
            $a_data[$key] = $this->test_input($a_data[$key]);
        }
        $where = "profile_id_fk=$iws_profile_id";
        $mytable = "os_user_details";
        $result = ( $this->db_api->update($a_data, $mytable, $where));
        // echo $result;
        $confirmation_insert = $_REQUEST['insert_shipping'];
        if ($confirmation_insert == "insert_shipping") {
            $result1 = $this->insertShippingAddress();
            echo $result1;
        }
    }

//24-06-2015 by venkatesh : this function return store rating
    function store_rating($store_uid) {
        $db_obj = $this->load->module("db_api");
        $store_aid = $this->products->store_aid_return($store_uid);
        $rlt = $db_obj->select("rank_weitage,review_count", "os_store_settings", "store_id_fk=" . $store_aid);
        return $rlt[0]["rank_weitage"] / $rlt[0]["review_count"];
    }

//25-06-2015 by venkatesh
    function intbrnads() {
        $brand_name = base64_decode(base64_decode(base64_decode($_REQUEST["brnd_name"])));
        $data["brand_name"] = $brand_name;
        $data["title"] = "Buy " . $brand_name . " online|oneidnet.com";
        $data["meta_description"] = "Buy " . $brand_name . " online";
        $data["meta_keywords"] = "Buy " . $brand_name . " online";
        $this->load->view("home/brand_stores", $data);
    }

    //26-june-2015 venkatesh :
    function check_store_id($store_uid) {
        if (!$store_uid) {
            redirect(base_url());
        }
        // $country=$this->country_info_based_on_ip();
        $db_obj = $this->load->module("db_api");
        //$rlt=$db_obj->select("store_id","os_all_store","store_id='".$store_uid."' and country=".$_SESSION["COUNTRY_ID"]."");
        $rlt = $db_obj->select("store_id", "os_all_store", "store_id='" . $store_uid . "'");
        //print_R($rlt);
        if ($rlt == 0) {
            redirect(base_url());
        }
    }

    //26-june-2015 by venaktesh
    function product_id_check($p_id) {
        $db_obj = $this->load->module("db_api");
        if (!$p_id) {
            redirect(base_url());
        } else {
            // $country=$this->country_info_based_on_ip();
            $cookies_obj = $this->load->module("cookies");
            $country_id = $cookies_obj->getUserCountryID();
            //echo "select osp.product_aid from oshop_products osp left join oshop_stores oas on osp.store_id_fk=oas.store_aid where   osp.product_aid=$p_id and oas.country=".$country_id;
            $rlt = $db_obj->custom("select osp.product_aid from oshop_products osp left join oshop_stores oas on osp.store_id_fk=oas.store_aid where   osp.product_aid=" . $p_id);
            if ($rlt == 0) {
                redirect(base_url());
            }
        }
    }

    //25 june 2015 by ramadevi.This function retuns the product details based on product id
    function cartProductsMore($product_id) {
        $db_obj = $this->load->module("db_api");
        /* $store_aid=3;
          $prods_obj=$this->load->module('products');
          $s_u_id=$prods_obj->store_unique_id($store_aid); */
        //echo $s_u_id;
        $s_where = "product_aid=" . $product_id;
        $a_result = $db_obj->select("*", "os_products", $s_where);
        return $a_result;
    }

    function getStoreDetails($store_id) {
        $dbobj = $this->load->module("db_api");
        $s_where = "store_code='" . $store_id . "'";
        $result = $dbobj->select("*", "oshop_stores", $s_where);
        return $result;
    }

    // function to strip html tags
    function strip_data($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    //anil - 09012016 - store related
    function create_store($package_type = NULL) {
        $data["select_create_store"] = 'yes';
        //$data["country_info"] = $this->country_info_based_on_ip();
        $data["time_zone"] = $this->time_zone();
        $data["title"] = 'Create store to sell your products|oneidnet.com';
        $data["meta_keywords"] = 'Create store in oneshop';
        $data["meta_description"] = 'Create store in oneshop';
        $data["selected_package_type"] = $package_type;
        $this->load->view("home/create_store", $data);
    }

    function edit_store($store_code, $upd_status = 0) {
        $this->load->module("db_api");

        /*$store_query = "SELECT os.*, op.name as package_name, ore.period_in_months, ore.expired_on FROM oshop_stores os  " .
                "LEFT JOIN oshop_packages op ON os.current_package_id_fk = op.package_id " .
                "LEFT JOIN oshop_store_renewals_info ore ON os.store_aid = ore.store_id_fk " .
                "WHERE os.store_code = '" . $store_code . "' and created_by=".$this->get_UserId();*/
        $store_query = "SELECT os.*, op.name as package_name, ore.period_in_months, ore.expired_on FROM oshop_stores os  " .
                "LEFT JOIN oshop_packages op ON os.current_package_id_fk = op.package_id " .
                "LEFT JOIN oshop_store_renewals_info ore ON os.store_aid = ore.store_id_fk " .
                "WHERE os.store_code = '" . $store_code . "' AND is_renewed=0";
        $store_res = $this->db_api->custom($store_query);
        $staff_details=$this->getStaffDetails($store_code);
        //print_r($staff_details);
        if($store_res!=0 && ($staff_details[0]["role"]=="ADMIN"|| $staff_details[0]["role"]=="SUPER")){
          $store_id = $store_res[0]["store_aid"];
          $data["store_id"] = $store_id;
          $data["upd_status"] = $upd_status;
          $data['store_details'] = $store_res;
          //Json Read store categories
          $storeCategoriesArr = array();
          $storeJsonStr = file_get_contents(BASEPATH . "../vardefs/store_categories.json");
          if ($storeJsonStr != "") {
              $storeCategoriesArr = json_decode($storeJsonStr);
          }
          $data['store_categories'] = $storeCategoriesArr;
          $this->load->view("home/edit_store", $data);
        }else{
            redirect(base_url());
        }

    }

    function services_store($store_code) {
        $this->load->module("db_api");
        $store_query = "SELECT os.* FROM oshop_stores os WHERE os.store_code = '" . $store_code . "'";
        $store_res = $this->db_api->custom($store_query);
        $store_id = $store_res[0]["store_aid"];
        $data['store_details'] = $store_res;
        $this->load->view("home/services_store", $data);
    }

    function aboutus_store($store_code) {
        $this->load->module("db_api");
        $store_query = "SELECT * FROM oshop_stores os  " .
                "WHERE os.store_code = '" . $store_code . "'";
        $store_res = $this->db_api->custom($store_query);
        $store_id = $store_res[0]["store_aid"];
        $data['store_details'] = $store_res;
        $data['store_ptype'] = "aboutus";
        $this->load->view("home/aboutus_store", $data);
    }

    function store_staff($store_code) {
        $dbapi = $this->load->module("db_api");
        $staff_details=$this->getStaffDetails($store_code);
        if($staff_details[0]["cnt"]==0||$staff_details[0]["role"]=="PRODUCT_MANAGER"||$staff_details[0]["role"]=="ORDER_MANAGER"){
          redirect(base_url());
        }
        $this->load->view("home/store_staff");
    }

    function storestaff_detail($store_code) {
        $this->load->module("db_api");
        $store_query = "SELECT * FROM oshop_stores WHERE store_code = '" . $store_code . "'";
        $store_res = $this->db_api->custom($store_query);
        $store_id = $store_res[0]["store_aid"];
        $sstaff_query = "SELECT * FROM oshop_staff WHERE store_id_fk = '" . $store_id . "'";
        $sstaff_res = $this->db_api->custom($sstaff_query);
        $data['sstaff_details'] = $sstaff_res;
        $data['store_details'] = $store_res;
        $data['store_ptype'] = "privacy_policy";
        $this->load->view("home/storestaff", $data);
    }

    function privacy_store($store_code) {
        $this->load->module("db_api");
        $store_query = "SELECT * FROM oshop_stores WHERE store_code = '" . $store_code . "'";
        $store_res = $this->db_api->custom($store_query);
        $store_id = $store_res[0]["store_aid"];
        $data['store_details'] = $store_res;
        $data['store_ptype'] = "privacy_policy";
        $this->load->view("home/aboutus_store", $data);
    }

    function agreement_store($store_code) {
        $this->load->module("db_api");
        $store_query = "SELECT * FROM oshop_stores WHERE store_code = '" . $store_code . "'";
        $store_res = $this->db_api->custom($store_query);
        $store_id = $store_res[0]["store_aid"];
        $data['store_details'] = $store_res;
        $data['store_ptype'] = "store_agreement";
        $this->load->view("home/agreement_store", $data);
    }

    function user_home1($store_code = NULL) {
      $this->load->module("db_api");
      $store_query = "SELECT os.*, op.name as package_name, ore.renewed_on,op.price,ore.period_in_months, ore.expired_on, ore.total_orders, ore.total_products, ore.total_cancellation_products FROM oshop_stores os  " .
              "LEFT JOIN oshop_packages op ON os.current_package_id_fk = op.package_id " .
              "LEFT JOIN oshop_store_renewals_info ore ON os.store_aid = ore.store_id_fk " .
              "WHERE os.store_code = '" . $store_code . "'";
      $store_res = $this->db_api->custom($store_query);
      $user_id=$this->get_UserId();
      $store_id = $store_res[0]["store_aid"];
      if($store_res[0]["created_by"]!=$user_id){
          $update_query="UPDATE oshop_stores SET search_weightage=search_weightage+0.0001,total_visitors=total_visitors+1 WHERE store_aid=".$store_id;
          $this->db_api->custom($update_query);
      }
      $data['store_details'] = $store_res;
      if($store_res[0]['is_active']==1){
        $this->load->view("home/user_home", $data);
      }else{
        $this->load->view("home/store_inactive", $data);
      }
    }
    function user_home($store_code = NULL) {
      $this->load->module("db_api");
      $store_query = "SELECT os.*, op.name as package_name, ore.renewed_on,op.price,ore.period_in_months, ore.expired_on, ore.total_orders, ore.total_products, ore.total_cancellation_products FROM oshop_stores os  " .
              "LEFT JOIN oshop_packages op ON os.current_package_id_fk = op.package_id " .
              "LEFT JOIN oshop_store_renewals_info ore ON os.store_aid = ore.store_id_fk " .
              "WHERE os.store_code = '" . $store_code . "' AND is_renewed=0";
      $store_res = $this->db_api->custom($store_query);
      //print_r($store_res);
      $user_id=$this->get_UserId();
      $store_id = $store_res[0]["store_aid"];
      if($store_res[0]["created_by"]!=$user_id){
          $update_query="UPDATE oshop_stores SET search_weightage=search_weightage+0.0001,total_visitors=total_visitors+1 WHERE store_aid=".$store_id;
          $this->db_api->custom($update_query);
      }
      $data['store_details'] = $store_res;
      $data['staff_details']=$this->getStaffDetails($store_code);
      $_SESSION['storecode']=$store_id;
      $su_order = $this->db_api->select("order_code","oshop_orders","store_id_fk=".$store_id." AND ordered_by=".$user_id);
      $st_review = $this->db_api->select("*","oshop_store_reviews","store_id_fk=".$store_id." AND user_id_fk=".$user_id);
      $ststaff = $this->getStaffDetails($store_code);
      if($ststaff[0]['cnt'] == 0){
        if($su_order){
            if($st_review == 0){
                $_SESSION['start'] = time();
            }
        }
      }
      //print_r($this->getStaffDetails($store_code));
      if($store_res[0]['is_active']==1){
        $this->load->view("home/user_home", $data);
      }else{
        $this->load->view("home/store_inactive", $data);
      }
    }

    function getStaffDetails($store_id){
      $user_id=$this->get_UserId();
      $dbapi=$this->load->module("db_api");
      $result=$dbapi->custom("SELECT COUNT(*) AS cnt,role FROM oshop_staff staff INNER JOIN oshop_stores stores ON staff.store_id_fk=stores.store_aid WHERE user_id_fk=".$user_id." AND store_code='".$store_id."'");
      //print_r($result);
      return $result;
    }

    function store_orders($store_code) {
        $stores_result = $this->getStoreDetails($store_code);
        $staff_result=$this->getStaffDetails($stores_result[0]["store_code"]);
        if($staff_result[0]["cnt"]==0||$staff_result[0]["cnt"]=="PRODUCT_MANAGER"){
          redirect(base_url());
        }
        $data["store_code"] = $store_id;
        $data['store_details'] = $stores_result;
        $this->load->module("db_api");
        $store_query = "SELECT order_aid,order_code,time,status,order_delivery_detail FROM oshop_orders WHERE store_id_fk =(select store_aid from oshop_stores where store_code='$store_code') order by time desc";
        $store_res = $this->db_api->custom($store_query);
        $data['order_details'] = $store_res;
        $this->load->view("home/user_orders", $data);
    }



    function searchOrder(){
        $storecode = $this->input->post("storecode");
        $searchtxt = $this->input->post("searchtxt");
        if($searchtxt=='onemonth'){
           $query ="SELECT order_aid,order_code,time,status,order_delivery_detail FROM `oshop_orders` where  DATE(time)>=DATE_SUB(CURDATE(), INTERVAL  1 MONTH) and store_id_fk =(select store_aid from oshop_stores where store_code='$storecode') order by time desc";
        }elseif($searchtxt=='oneweek'){
            $query ="SELECT order_aid,order_code,time,status,order_delivery_detail  FROM `oshop_orders` where DATE(time)>=DATE_SUB(CURDATE(), INTERVAL 7 DAY) and store_id_fk =(select store_aid from oshop_stores where store_code='$storecode') order by time desc";

        }elseif($searchtxt=='oneday'){
            $query ="SELECT order_aid,order_code,time,status,order_delivery_detail FROM `oshop_orders` where DATE(time)=DATE_SUB(CURDATE(), INTERVAL 1 DAY) and store_id_fk =(select store_aid from oshop_stores where store_code='$storecode') order by time desc ";

        }else if($searchtxt=='all'){
            $query = "SELECT order_aid,order_code,time,status,order_delivery_detail FROM oshop_orders WHERE store_id_fk =(select store_aid from oshop_stores where store_code='$storecode') order by time desc";

         }

         $this->load->module("db_api");
         $data['order_details'] = $this->db_api->custom($query);
        $this->load->view("home/search_orders_tpl", $data);
    }

    function searchOrderBystatus(){
        $storecode = $this->input->post("storecode");
        $searchtxt = $this->input->post("searchtxt");

        if($searchtxt!=''){

            $query = "SELECT order_aid,order_code,time,status,order_delivery_detail FROM oshop_orders WHERE status='$searchtxt' And store_id_fk =(select store_aid from oshop_stores where store_code='$storecode') ";

            $this->load->module("db_api");
            $data['order_details'] = $this->db_api->custom($query);

            $this->load->view("home/search_orders_tpl", $data);
        }
    }

    function searchOrderBydate(){
        $storecode = $this->input->post("storecode");
        $odate = $this->input->post("odate");
        $ndate = date("Y-m-d", strtotime($odate));
        if($odate!=''){

            $query = "SELECT order_aid,order_code,time,status,order_delivery_detail FROM oshop_orders WHERE time LIKE '%".$ndate."%' And store_id_fk =(select store_aid from oshop_stores where store_code='$storecode') ";

            $this->load->module("db_api");
            $data['order_details'] = $this->db_api->custom($query);

            $this->load->view("home/search_orders_tpl", $data);
        }
    }

    function updateOrder(){
        $this->load->module("db_api");
        $orderstatus = $this->input->post("orderstatus");
        $id = $this->input->post("id");

        if($orderstatus != ''){
                $updateUser = "UPDATE oshop_orders SET
                        status='".$orderstatus."' WHERE order_aid in(".$id.")";
            $this->db_api->custom($updateUser);
            print_r($updateUser);
            echo "Update Successfully";
        }
        else{
            echo "Update Failed";
        }
    }

    //Used in ajax level
    function json_store_category_check() {
        $catOptStr = '<select name="secondary_category" id="secondary_category" class="oneshop_basicinfobox_textbox mal10" style="width:130px;"><option value=""> -- select -- </option>';
        $matchedArr = array();
        $matchedCat = $_REQUEST["cat_check"];
        //Json Read store categories
        $storeCategoriesArr = array();
        $storeJsonStr = file_get_contents(BASEPATH . "../vardefs/store_categories.json");
        if ($storeJsonStr != "") {
            $storeCategoriesArr = json_decode($storeJsonStr);
            foreach ($storeCategoriesArr as $catKey => $catArr) {
                if ($matchedCat == $catKey) {
                    $matchedArr = $catArr;
                }
            }
        }
        if (count($matchedArr) > 0) {
            foreach ($matchedArr as $matchArrVal) {
                $catOptStr .= '<option value="' . $matchArrVal . '">' . $matchArrVal . '</option>';
            }
        }
        $catOptStr .= '</select>';
        echo $catOptStr;
    }

    //shivajyothi : my following stores
    function following_stores() {
        $data["title"] = 'My following stores available online|oneidnet.com';
        $data["meta_description"] = 'My following stores in oneshop';
        $data["meta_keywords"] = 'My following stores  in oneshop';
        $this->load->view("home/following_stores", $data);
    }

    //RaviTeja - find Stores
    function find_stores() {
        $data["title"] = 'Find stores available online|oneidnet.com';
        $data["meta_description"] = 'Find stores in oneshop';
        $data["meta_keywords"] = 'Find stores in oneshop';
        $this->load->view("home/find_stores", $data);
    }

    function find_products($store_code) {
        $data["title"] = 'Find products to buy products online|oneidnet.com';
        $data["meta_description"] = 'Find products in oneshop';
        $data["meta_keywords"] = 'Find products in oneshop';
        $data["select_find_product"] = 'yes';
        $data["searchparam"] = $this->input->post('searchparam');
        $store_obj = $this->load->module("stores");
        $store_result = $store_obj->getStoreDetailsByStoreCode($store_code);
        $data["store_details"] = $store_result;
        //$data["searchparam"] = $_REQUEST['searchparam'];
        //print_r($_REQUEST);
        $this->load->view("home/find_products", $data);
    }

    // function to display the home page
    function os_homepage() {
      $dbapi=$this->load->module("db_api");
      $result=$dbapi->select("status","os_user_details","profile_id_fk=".$this->get_UserId());
      if($result[0]["status"]=="ACTIVE"){
        $this->load->view("home/index_oshop");
      }
    }

    public function order_view() {
        $this->load->view("home/order_view");
    }

    function popups() {
        $this->load->view("home/popups");
    }
	 
    // product detail view by Pavani on 05-02-2016
    function product_Detail_View($store_code,$product_code) {
        $prod_qry = "SELECT product_aid FROM oshop_products WHERE product_code = '".$product_code."'";
        $prod_res = $this->db_api->custom($prod_qry);
        $product_id = $prod_res[0]["product_aid"];
        $this->product_id_check($product_id);
        $user_id = $this->get_UserId();
        $currencies_list=$this->getCurrencyList();
        $loggedin_res = $this->db_api->select("img_path", "iws_profiles", "profile_id=" . $user_id);
        $data["loggedinuser_img"] = $loggedin_res[0]["img_path"];
        $products_res = $this->db_api->custom("select oas.created_by,op.description,op.product_category_id_fk,oas.store_aid as store_id,oas.store_code as store_code,oas.store_name as store_name,oas.store_agreement as purchase_policy,oas.profile_image_path as logo_path, op.product_aid,op.total_views, op.product_code,op.cost_price, op.sale_price, op.product_name, op.discount, op.specification,UPPER(op.others_cateogry_name) as category_name, UPPER(op.others_subcategory_name) as subcategory_name,osc.product as category,op.primary_image as prod_img1,op.secondary_image as prod_img2,op.tertiary_image as prod_img3,op.quaternary_image as prod_img4,warranty_type,warranty,bulk_quantity,bulk_price,quantity,Discount,shipping,handling,product_tags from oshop_products op left join oshop_stores oas on op.store_id_fk=oas.store_aid left join oshop_categories osc on op.product_category_id_fk=osc.category_id_fk where op.product_aid='". $product_id ."'");
        if($products_res[0]["created_by"]!=$user_id){
            $update_query="UPDATE oshop_products SET total_views=total_views+1,search_weightage=search_weightage+0.0001 WHERE product_aid=".$product_id;
            $update_res=$this->db_api->custom($update_query);
        }
        $store_code = $products_res[0]["store_code"];
        $data["product_details"] = $products_res;
        $data["productavg"] =$this->db_api->custom("SELECT avg(`rating`) as avgrating FROM `oshop_product_reviews` WHERE  `product_aid_fk` =".$product_id);
        $store_obj = $this->load->module("stores");
        $data["store_details"] = $store_obj->getStoreDetailsByStoreCode($store_code);
        $data["store_code"] = $store_code;
        $data["currencies_list"]=$currencies_list;
        $data["title"] = "Buy " . $data["product_details"][0]["product_name"] . " online--" . $data["product_details"][0]["store_name"] . "|oneidnet.com";
        $this->load->view("home/product_detail_view", $data);
    }
    // function to search products by Pavani on 15-02-2016
    function search_products(){
        $this->load->view("products/search_products");
    }
    // function to search products/stores
    function searchSuggestions(){
        $search_term=$this->input->post("search_term");
        $search_type=$this->input->post("search_type");
        $dbapi=$this->load->module("db_api");
        $query="";
        if($search_type=="Stores"){
            $query="SELECT store_name,store_aid,store_code,is_official,profile_image_path FROM oshop_stores WHERE store_name LIKE '%".$search_term."%' LIMIT 10";
        }else if($search_type=="Products"){
            $query="SELECT prods.product_aid,prods.primary_image,prods.product_name,prods.product_code,stores.store_code,stores.store_name,stores.store_aid FROM oshop_products prods INNER JOIN oshop_stores stores ON prods.store_id_fk=stores.store_aid WHERE product_name LIKE '%".$search_term."%' LIMIT 10";
        }else if($search_type=="People"){
           $query = "SELECT  distinct(ip.profile_id) , ous.profile_name,ip.user_id FROM os_user_details ous
              left join iws_profiles ip on ous.profile_id_fk = ip.profile_id  WHERE ous.profile_id_fk!=" . $this->get_UserId() . " and ous.profile_name LIKE '%" . $search_term . "%' and ous.status='ACTIVE' LIMIT 10";

        }else if($search_type=="Category"){
           $query = "SELECT category_name FROM oshop_categories WHERE category_name LIKE '%" . $search_term . "%' GROUP BY category_name LIMIT 10";
        }else if($search_type=="Group"){
           $query = "SELECT groups FROM oshop_categories WHERE groups LIKE '%" . $search_term . "%' GROUP BY groups LIMIT 10";
        }
        $result=$dbapi->custom($query);
        echo json_encode($result);
    }
    function searchStoresProds(){
        $search_type=$_REQUEST["search_type"];
        $search_term=$_REQUEST["search"];
        $data["search_type"]=$search_type;
        $data["search_term"]=$search_term;
        $this->load->view("home/search",$data);
    }
    function search_result(){
        $search_type=$_REQUEST["search_type"];
        $search_term=$_REQUEST["search_term"];
        $stores_data=0;
        $products_data=0;
        $cats_data=0;
        $group_data=0;
        $user_data = 0;
        $dbapi=$this->load->module("db_api");
        if($search_type=="Products"){
            $query="SELECT prods.product_aid,prods.primary_image,prods.product_name,prods.product_code,stores.store_code,stores.store_name,stores.store_aid FROM oshop_products prods INNER JOIN oshop_stores stores ON prods.store_id_fk=stores.store_aid WHERE product_name LIKE '%".$search_term."%'";
            $products_data=$dbapi->custom($query);
        }else if($search_type=="Stores"){
            $query="SELECT store_aid,store_code,store_name,profile_image_path FROM oshop_stores WHERE store_name LIKE '%".$search_term."%'";
            $stores_data=$dbapi->custom($query);
        }else if($search_type=="Category"){
            $query="SELECT prods.product_aid,prods.primary_image,prods.product_name,prods.product_code,stores.store_code,stores.store_name,stores.store_aid,categories.category_name FROM oshop_products prods INNER JOIN oshop_stores stores ON prods.store_id_fk=stores.store_aid INNER JOIN oshop_categories categories ON categories.category_id_fk=prods.product_category_id_fk WHERE category_name LIKE '%".$search_term."%'";
            $cat_data=$dbapi->custom($query);
        }else if($search_type=="Group"){
            $query="SELECT prods.product_aid,prods.primary_image,prods.product_name,prods.product_code,stores.store_code,stores.store_name,stores.store_aid,categories.category_name,categories.groups FROM oshop_products prods INNER JOIN oshop_stores stores ON prods.store_id_fk=stores.store_aid INNER JOIN oshop_categories categories ON categories.category_id_fk=prods.product_category_id_fk WHERE groups LIKE '%".$search_term."%'";
            $group_data=$dbapi->custom($query);
        }else{
            $query = "SELECT distinct(ip.profile_id) ,ous.profile_name,ip.user_id ,ous.profile_img FROM os_user_details ous
              left join iws_profiles ip on ous.profile_id_fk = ip.profile_id  WHERE ous.profile_id_fk!=" . $this->get_UserId() . " and ous.profile_name LIKE '%" . $search_term . "%' and ous.status='ACTIVE' LIMIT 5";
             $user_data = $dbapi->custom($query);
        }
        $data["search_type"]=$search_type;
        $data["stores_data"]=$stores_data;
        $data["products_data"]=$products_data;
        $data["cat_data"]=$cat_data;
        $data["group_data"]=$group_data;
        $data["user_data"]=$user_data;
        $this->load->view("home/search_result",$data);
    }
    // function to strip tags
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        $data = str_replace("'","&#39",$data);
        return $data;
    }

    function browseProducts(){
        $this->load->view("home/browse");
    }
    
    function getUserMessages(){
        $db_obj = $this->load->module('db_api');
         $query= "SELECT distinct(store_aid),store_code ,store_name,profile_image_path  FROM `oshop_store_messages` inner join oshop_stores
                 on store_aid =store_id_fk where user_id_fk = ".$this->get_UserId();
        $data['storedata'] =$db_obj->custom($query);
        $this->load->view("home/user_messages",$data);
    }
    function getStoreMessages($store_code){
        $db_obj = $this->load->module('db_api');
        $store_query = "SELECT * FROM oshop_stores  WHERE store_code = '" . $store_code . "'";
        $store_res = $db_obj->custom($store_query);
        $store_id = $store_res[0]["store_aid"];
        $createdby = $store_res[0]["created_by"]; 
        $con ='';
        if($createdby != $this->get_UserId()){
			$con = " and  user_id_fk = ".$this->get_UserId() ;
		}
		$query="SELECT  distinct(profile_id_fk) ,ou.profile_name ,ou.profile_img FROM `oshop_store_messages` as sm
                inner join  os_user_details as ou on ou.profile_id_fk  = sm.user_id_fk where sm.store_id_fk =  $store_id ".$con ;
        $data['userdata'] =$db_obj->custom($query);
        $data['subjectdata'] =$db_obj->custom("select * FROM `oshop_store_messages` where store_id_fk =  $store_id  ".$con." order by sent_on asc ");
          $this->load->view("home/store_messages", $data);
    }
    function get_messages(){
        if (isset($_REQUEST['start_id'])) {
            $starting_index = $_REQUEST['start_id'];
        } else {
            $starting_index = 0;
        }
        $db_obj = $this->load->module('db_api');
        if($_REQUEST['type']=='user'){
            $store_code = $this->input->post('storecode');
            $userid =$this->get_UserId();
        }else{
            $store_code  = $this->input->post('storecode');
            $userid = $this->input->post('userid');

        }
       $store_query = "SELECT * FROM oshop_stores  WHERE store_code = '" . $store_code . "'";
            $store_res = $db_obj->custom($store_query);
            $store_id = $store_res[0]["store_aid"];

         $subjectdata =$db_obj->custom("select * FROM `oshop_store_messages` where store_id_fk =  $store_id  and  user_id_fk =  $userid   order by sent_on asc limit $starting_index ,8  ");
        if($subjectdata!=0){
            foreach($subjectdata as $sdata){ ?>
             <P <?php if($sdata['representative_id_fk']==0){ ?>class="mab30 fs14 lh20  bgcolor5 " <?php } else{ ?>class="mab30 fs14 lh20  bgcolor6 " <?php } ?> > <span class="fs25">"</span> <?php  echo ucfirst($sdata['message']);  ?>
             <span <?php if($sdata['representative_id_fk']==0){ ?> class="fs11 mar10 mal10 yellow" <?php } else{ ?> class="fs11 mar10 mal10 blue"<?php } ?> > <?php  echo date('d M Y ',  strtotime($sdata['sent_on']));  ?>  </span> <span class="fs25">"</span> </P>
            <?php }
        }else{
            echo 0;
        }

   }

    function getCurrencyList(){
      $dbapi=$this->load->module("db_api");
      $result=$dbapi->custom("SELECT sc,name FROM iws_currencies");
      $currency_str="";
      foreach($result as $clist){
       if($currency_str==""){
         $currency_str=$clist["sc"]."-".$clist["name"];
       }
       else{
         $currency_str.="~".$clist["sc"]."-".$clist["name"];
       }
      }
      return $currency_str;
    }

    function getCurrencyData(){
      $from=$this->input->post("from");
      $to=$this->input->post("to");
      $price_to_convert=$this->input->post("current_price");
      require_once APPPATH."libraries/GetIP_loc.php";
      $lib_obj=new GetIP_loc();
      $result=$lib_obj->convertCurrency($price_to_convert,$from,$to);
      echo $result;
      // print_r($result); 
      // return $result;
    }
    function getUserActivities(){
      $this->load->view("home/myActivityLog");
    }
    function getUsrActivityLogTpl(){
        $dbapi=$this->load->module("db_api");
        $start=($_REQUEST["start"]!="")?$_REQUEST["start"]:0;
        if($frnds_str!==""){
        $user_data=array();
        $chrono_result=$dbapi->custom("SELECT 
            CASE 
            WHEN chronoline_order.associateid IS NOT NULL  THEN '1'
            ELSE '0'
            END AS `USER_FOLLOWS`,  
            CASE 
            WHEN chronoline_order.recordid IS NULL AND chronoline_order.associateid IS NULL AND chronoline_order.productid IS NULL AND ostore.registered_on IS NULL THEN '1'
            ELSE '0'
            END AS `STORE_FOLLOWS`,
            CASE 
            WHEN chronoline_order.recordid IS NULL AND chronoline_order.associateid IS NULL AND chronoline_order.storeid IS NULL THEN '1'
            ELSE '0'
            END AS `SAVED_PRODUCT`,
            CASE 
            WHEN chronoline_order.recordid IS NOT NULL AND chronoline_order.storeid IS NOT NULL THEN '1'
            ELSE '0'
            END AS `STORE_REVIEW`,
            CASE 
            WHEN chronoline_order.recordid IS NOT NULL AND chronoline_order.productid IS NOT NULL THEN '1'
            ELSE '0'
            END AS `PRODUCT_REVIEW`,            
            CASE 
            WHEN ostore.registered_on IS NOT NULL THEN '1'
            ELSE '0'
            END AS `STORE_CREATED`,os_user_details.profile_name,os_user_details.profile_img,iws_profiles.user_id,os_cust.profile_name as f_username,os_cust.profile_img as f_userimg,iwsfollow.user_id as f_userid,oshop_stores.store_aid,oshop_stores.store_name,oshop_stores.follower_count, oshop_stores.profile_image_path,ostore.registered_on,oshop_stores.store_code,oshop_stores.created_by,oshop_followings.following_since,oshop_store_reviews.commented_on,oshop_store_reviews.store_id_fk,oshop_products.product_aid,oshop_products.store_id_fk,oshop_products.product_code,oshop_products.primary_image,oshop_products.product_name,oshop_product_reviews.product_aid_fk,oshop_product_reviews.rating_on,oshop_product_reviews.rating,oshop_saved_products.product_id_fk,oshop_saved_products.added_on,chronoline_order.t_stamp,date
        from chronoline_order 
        LEFT JOIN oshop_explore on oshop_explore.associated_id_fk = chronoline_order.userid  
        LEFT JOIN iws_profiles on iws_profiles.profile_id = chronoline_order.userid 
        LEFT JOIN os_user_details on os_user_details.profile_id_fk = iws_profiles.profile_id
        LEFT JOIN iws_profiles AS iwsfollow on iwsfollow.profile_id = chronoline_order.associateid
        LEFT JOIN os_user_details AS os_cust on os_cust.profile_id_fk = chronoline_order.associateid
        LEFT JOIN oshop_stores  on oshop_stores.store_aid = chronoline_order.storeid
        LEFT JOIN oshop_stores as ostore  on ostore.store_aid = chronoline_order.storeid AND ostore.created_by = chronoline_order.userid
        LEFT JOIN oshop_followings on  oshop_followings.user_id_fk = chronoline_order.userid AND oshop_followings.store_id_fk = chronoline_order.storeid
        LEFT JOIN oshop_store_reviews on oshop_store_reviews.rec_aid = chronoline_order.recordid AND oshop_store_reviews.store_id_fk = oshop_stores.store_aid
        LEFT JOIN oshop_products  on oshop_products.product_aid = chronoline_order.productid
        LEFT JOIN oshop_saved_products  on oshop_saved_products.profile_id = chronoline_order.userid AND oshop_saved_products.product_id_fk = oshop_products.product_aid
        LEFT JOIN oshop_product_reviews on oshop_product_reviews.rec_aid = chronoline_order.recordid AND oshop_product_reviews.product_aid_fk = oshop_products.product_aid
        WHERE chronoline_order.userid = ".$this->get_UserId()." GROUP BY chronoline_order.t_stamp DESC LIMIT $start,1");

       $data["chronoline_order"]=$chrono_result;
        }
        else{
            $data["chronoline_order"]=0;
        }
        $this->load->view("home/myActivityLogTpl",$data);
    }
    function frndsActivityLog(){
      $this->load->view("home/frndsActivity");
    }
    function frndsActivityLogTpl(){
      $dbapi=$this->load->module("db_api");
      $start=($_REQUEST["start"]!="")?$_REQUEST["start"]:0;
      $user_id=$this->get_UserId();
      $frnds_result=$dbapi->select("user_id_fk","oshop_explore","associated_id_fk=".$user_id);
      //print_r($frnds_result);
      $frnds_str="";
      if($frnds_result!==0){
        foreach($frnds_result as $flist){
          if($frnds_str==""){
            $frnds_str.=$flist["user_id_fk"];
          }else{
            $frnds_str.=",".$flist["user_id_fk"];
          }
        }
      }
      if($frnds_str!==""){
        $user_data=array();

        $chrono_result=$dbapi->custom("SELECT 
            CASE 
            WHEN chronoline_order.associateid IS NOT NULL  THEN '1'
            ELSE '0'
            END AS `USER_FOLLOWS`,  
            CASE 
            WHEN chronoline_order.recordid IS NULL AND chronoline_order.associateid IS NULL AND chronoline_order.productid IS NULL AND ostore.registered_on IS NULL THEN '1'
            ELSE '0'
            END AS `STORE_FOLLOWS`,
            CASE 
            WHEN chronoline_order.recordid IS NULL AND chronoline_order.associateid IS NULL AND chronoline_order.storeid IS NULL THEN '1'
            ELSE '0'
            END AS `SAVED_PRODUCT`,
            CASE 
            WHEN chronoline_order.recordid IS NOT NULL AND chronoline_order.storeid IS NOT NULL THEN '1'
            ELSE '0'
            END AS `STORE_REVIEW`,
            CASE 
            WHEN chronoline_order.recordid IS NOT NULL AND chronoline_order.productid IS NOT NULL THEN '1'
            ELSE '0'
            END AS `PRODUCT_REVIEW`,            
            CASE 
            WHEN ostore.registered_on IS NOT NULL THEN '1'
            ELSE '0'
            END AS `STORE_CREATED`,os_user_details.profile_name,os_user_details.profile_img,iws_profiles.user_id,os_cust.profile_name as f_username,os_cust.profile_img as f_userimg,iwsfollow.user_id as f_userid,oshop_stores.store_aid,oshop_stores.store_name,oshop_stores.follower_count, oshop_stores.profile_image_path,ostore.registered_on,oshop_stores.store_code,oshop_stores.created_by,oshop_followings.following_since,oshop_store_reviews.commented_on,oshop_store_reviews.store_id_fk,oshop_products.product_aid,oshop_products.store_id_fk,oshop_products.product_code,oshop_products.primary_image,oshop_products.product_name,oshop_product_reviews.product_aid_fk,oshop_product_reviews.rating_on,oshop_product_reviews.rating,oshop_saved_products.product_id_fk,oshop_saved_products.added_on,chronoline_order.t_stamp,date
        from chronoline_order 
        LEFT JOIN oshop_explore on oshop_explore.user_id_fk = chronoline_order.associateid  
        LEFT JOIN iws_profiles on iws_profiles.profile_id = chronoline_order.userid 
        LEFT JOIN os_user_details on os_user_details.profile_id_fk = iws_profiles.profile_id
        LEFT JOIN iws_profiles AS iwsfollow on iwsfollow.profile_id = chronoline_order.associateid
        LEFT JOIN os_user_details AS os_cust on os_cust.profile_id_fk = chronoline_order.associateid
        LEFT JOIN oshop_stores  on oshop_stores.store_aid = chronoline_order.storeid
        LEFT JOIN oshop_stores as ostore  on ostore.store_aid = chronoline_order.storeid AND ostore.created_by = chronoline_order.userid
        LEFT JOIN oshop_followings on  oshop_followings.user_id_fk = chronoline_order.userid AND oshop_followings.store_id_fk = chronoline_order.storeid
        LEFT JOIN oshop_store_reviews on oshop_store_reviews.rec_aid = chronoline_order.recordid AND oshop_store_reviews.store_id_fk = oshop_stores.store_aid
        LEFT JOIN oshop_products  on oshop_products.product_aid = chronoline_order.productid
        LEFT JOIN oshop_saved_products  on oshop_saved_products.profile_id = chronoline_order.userid AND oshop_saved_products.product_id_fk = oshop_products.product_aid
        LEFT JOIN oshop_product_reviews on oshop_product_reviews.rec_aid = chronoline_order.recordid AND oshop_product_reviews.product_aid_fk = oshop_products.product_aid
        WHERE chronoline_order.userid IN ($frnds_str) GROUP BY chronoline_order.t_stamp DESC LIMIT $start,2");

	   $data["chronoline_order"]=$chrono_result;
      }
      else{
        $data["chronoline_order"]=0;
      }
      $this->load->view("home/frndsActivityTpl",$data);
    }
}