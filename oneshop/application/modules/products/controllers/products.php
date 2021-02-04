<?php
if (!defined('BASEPATH'))   exit('No direct script access allowed');

class products extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->module("db_api");
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

    function get_store_ownerId() {
        $dbapi = $this->load->module("db_api");
        $store_owner_id = "";
        $rlt = $dbapi->custom("select created_by from os_all_store where created_by=" . $this->get_UserId());
        if ($rlt != 0) {
            $store_owner_id = $this->get_UserId();
        }
        return $store_owner_id;
    }

    function products_search() {
        $products_cnt = $this->getProdsCnt("default");
        $data["products_count"] = $products_cnt[0]["cnt"];
        $this->load->view('products/products_search', $data);
    }

    function myproduct_list() {
        $db_obj = $this->load->module("db_api");
        $current_url = $_SERVER['PATH_INFO'];
        $store_unique_id = END(explode("/", $current_url));
        $store_aid = $this->store_aid_return($store_unique_id);
        $dev_product_result['results_products'] = $db_obj->custom("select p.product_aid,p.name,p.store_id,p.image_path,p.sell_price,p.category,
		c.category_aid,c.name as category_name from os_products p,os_category c  where p.store_id=$store_aid and p.category=c.category_aid limit 0,8");
        $user_id = $this->store_owner_id($store_aid);
        $dev_product_result["store_uid"] = $this->store_uniqueid_return($user_id);
        $this->load->view('products/myproduct_list', $dev_product_result);
    }

    // to get the list of products by Pavani on 01-06-2015
    function products_search_result($catid = NULL, $subcatid = NULL, $itemid = NULL, $searchparam = NULL,$store_id='') {
        $start = 0;
        $dbobj = $this->load->module("db_api");
        $records_per_page = 12; // records to show per page    
        $page = $this->input->post("p");

        if ($page != "") {
            //$current_page           =   $page - 1;      
            $start = $page * $records_per_page;
        }

        $s_where = "";
        $filetrs = $this->input->post('osdev_filters');
        if ($filetrs != "") {

            $catid = $this->input->post('categid');
            $subcatid = $this->input->post('subcatid');
            $itemid = $this->input->post('itemid');

            //$filetrs = '{"osdev_operating_system":["Android"],"osdev_mobile_type":["Smart Phones"],"osdev_camera_type":["Back Camera"],"osdev_internal_storage":["16 GB"]}';
            $json = json_decode($filetrs, true);
            foreach ($json as $key => $value) {
                $key = str_ireplace('osdev_', $itemid.'_', $key);
                $total = count($value);
                $i = 1;
                foreach ($value as $prop) {
                    
                    if($key == $itemid."_discount") {
						$prop = explode("-",$prop);
						$s_where = $s_where . " prods.discount between " . $prop[0] . " and ".$prop[1]." ";
					} else {
						$s_where = $s_where . " osf.$key like '%" . $prop . "%'";
					}
                    if ($i < $total) {
                        $s_where = $s_where . " OR ";
                    }
                    $i++;
                }
                if (count($value) > 0) {
                    $s_where = $s_where . " and ";
                }
            }
        }
        if ($searchparam) {
            $s_where = $s_where . " prods.product_name like '%" . $searchparam . "%'";
        }

        $cattablename = $catid;
        
        if($catid  && $subcatid && $itemid) {

			$catId = $this->getCategoryId($catid, $subcatid, $itemid);
			if($catId) {
				$s_where = $s_where . " product_category_id_fk= '".$catId."' ";
			}
		}
		if(!$s_where) {
			$s_where =" 1 ";
		}
        if($store_id!=""){
          $s_where.=" AND store_id_fk=".$store_id;
        }
        $s_where = $s_where . " LIMIT $start,$records_per_page";
        
        $s_query = "SELECT  oc.category_name,prods.product_name,prods.product_aid,prods.cost_price as price,prods.sale_price,
        prods.primary_image,prods.secondary_image,prods.tertiary_image,prods.quaternary_image 
        left join oshop_categories oc on oc.category_id_fk=prods.product_category_id_fk
        FROM oshop_filtration_electronics osf 
        RIGHT JOIN oshop_products prods on osf.product_aid_fk = prods.product_aid WHERE " . $s_where;
        $os_products_res = $dbobj->custom($s_query);
        $store_details=$dbobj->select("*","oshop_stores","store_aid=".$store_id);
        $store_owner="no";
        if($store_details[0]["created_by"]===$this->get_UserId()){
          $store_owner="yes";
        }
        $data["products_count"] = $stores_cnt;
        $data["products_data"] = $os_products_res;
        $data["store_owner"]=$store_owner;
        $data["store_code"]=$store_details[0]["store_code"];
        //echo "<pre>";print_R($os_products_res);echo "</pre>";
        $this->load->view('products/products_search_result', $data);
    }
	function getCategoryId($catid, $subcatid, $itemid) {
		$dbobj = $this->load->module("db_api");
		$cQuery = $dbobj->custom("select category_id_fk from oshop_categories WHERE groups like '%".$catid."%' and category_name LIKE '%".$subcatid."%' AND product LIKE '%".$itemid."%'");
		return $cQuery[0]['category_id_fk'];
	}
    // to get the list of products by Pavani on 01-06-2015
//EDITED By Mitesh => change in query => Line no - 163;
    function store_products_result($storeid = NULL) {
        $user_id = $this->get_UserId();
        $start = 0;
        $dbobj = $this->load->module("db_api");
        $records_per_page = 12; // records to show per page    
        $page = $this->input->post("p");
        $owner_credentials = "no";

        if ($page != "") {
            //$current_page           =   $page - 1;      
            $start = $page * $records_per_page;
        }
        $cookies_obj = $this->load->module("cookies");
        $country_id = $cookies_obj->getUserCountryID();
        $storedata = $this->load->module("home")->getStoreDetails($storeid);
        $storeid = $storedata[0]["store_aid"];
        if ($storeid) {
            $s_where = " store_id_fk = " . $storeid . " and ";
        }
        $s_where = $s_where . "1";
        $s_where = $s_where . " LIMIT $start,$records_per_page";
        $s_query = "SELECT prods.product_name,prods.product_aid,prods.cost_price as price,prods.sale_price,prods.primary_image,prods.secondary_image,prods.tertiary_image,prods.quaternary_image FROM oshop_filtration_electronics osf right join oshop_products prods on osf.product_aid_fk = prods.product_aid WHERE store_id_fk = '" . $storeid . "'";
        // echo $s_query;
        $os_products_res = $dbobj->custom($s_query);
        $store_query = "SELECT COUNT(*) as cnt,(SELECT COUNT(*) AS cnt FROM oshop_staff WHERE store_id_fk=" . $storeid . " AND user_id_fk=" . $user_id . ") AS staff_cnt FROM oshop_stores WHERE created_by=" . $user_id . " AND store_aid=" . $storeid;
        $store_res = $dbobj->custom($store_query);
        if ($store_res != 0) {
            if ($store_res[0]["staff_cnt"] != 0 || $store_res[0]["cnt"] != 0) {
                $owner_credentials = "yes";
            }
        }
        $data["products_count"] = $stores_cnt;
        $data["products_data"] = $os_products_res;
        $data["store_owner"] = $owner_credentials;
        $this->load->view('products/products_search_result', $data);
    }

    // to get the list of products by Pavani on 01-06-2015
    function getfeaturedproducts($storeid = NULL, $mode = "home") {
        $user_id=$this->get_UserId();
		$dbobj = $this->load->module("db_api");
         $s_where = $s_where . "1";
        //$s_query = "SELECT prods.product_name,prods.product_aid,prods.cost_price as price,prods.sale_price,prods.primary_image,prods.secondary_image,prods.tertiary_image,prods.quaternary_image,prods.store_id_fk as store_id FROM oshop_products prods where " . $s_where . " ORDER BY RAND() LIMIT 8";
        $s_query = "select oc.category_name,ost.store_code,prods.product_code,prods.product_name,prods.product_aid,prods.cost_price as price,prods.sale_price,prods.primary_image,prods.secondary_image,prods.tertiary_image,prods.quaternary_image,prods.store_id_fk as store_id,(SELECT COUNT(*) FROM oshop_cart_items WHERE product_id_fk=prods.product_aid AND profile_id=".$user_id.") AS cart_cnt FROM oshop_products prods ".
                    "INNER JOIN oshop_stores ost ON prods.store_id_fk = ost.store_aid ".
                    "left join oshop_categories oc on oc.category_id_fk=prods.product_category_id_fk".
                    " where created_by!=".$user_id." ORDER BY RAND() LIMIT 20";

        $os_products_res = $dbobj->custom($s_query);

        $data["products_count"] = $stores_cnt;
        $data["products_data"] = $os_products_res;
        $data["mode"] = $mode;
        $this->load->view('products/featured_products', $data);
    }
    //june 29 2016 by venkatesh 
    function storeCategoryProducts($prdname,$scode){
        $dbobj = $this->load->module("db_api");
        $s_query = "SELECT ost.store_code,prods.product_code,prods.product_name,prods.product_aid,prods.cost_price as price,prods.sale_price,prods.primary_image,prods.secondary_image,prods.tertiary_image,prods.quaternary_image,prods.store_id_fk as store_id FROM oshop_products prods INNER JOIN oshop_stores ost ON prods.store_id_fk = ost.store_aid 
                left join oshop_categories oc on oc.category_id_fk=prods.product_category_id_fk
                where store_code='$scode' and category_name='$prdname'  ORDER BY RAND() LIMIT 20";        
        $data["products_data"] = $dbobj->custom($s_query);
     $this->load->view('products/storeCategoryProducts', $data);
    }
    
    // to get the list of products by Pavani on 01-06-2015
    function getrecentproducts($storeid = NULL) {
        $start = 0;
        $dbobj = $this->load->module("db_api");
        $records_per_page = 12; // records to show per page    
        $page = $this->input->post("p");

        if ($page != "") {
            //$current_page           =   $page - 1;      
            $start = $page * $records_per_page;
        }
        $cookies_obj = $this->load->module("cookies");
        $country_id = $cookies_obj->getUserCountryID();
        if($storeid!=""){
            $s_query = "SELECT prods.product_code,prods.product_name,prods.product_aid,prods.cost_price as price,prods.sale_price,prods.primary_image,prods.secondary_image,prods.tertiary_image,prods.quaternary_image,prods.store_id_fk as store_id,os.store_code FROM oshop_products prods inner join oshop_stores os on prods.store_id_fk = os.store_aid where os.store_code = '" . $storeid . "' ORDER BY prods.added_on LIMIT 3";
        }else{
            $s_query = "SELECT prods.product_code,prods.product_name,prods.product_aid,prods.cost_price as price,prods.sale_price,prods.primary_image,prods.secondary_image,prods.tertiary_image,prods.quaternary_image,prods.store_id_fk as store_id,os.store_code FROM oshop_products prods inner join oshop_stores os on prods.store_id_fk = os.store_aid ORDER BY prods.added_on DESC LIMIT 9";
        }
        $os_products_res = $dbobj->custom($s_query);

        $data["products_count"] = $stores_cnt;
        $data["products_data"] = $os_products_res;

        $this->load->view('products/recent_products', $data);
    }

    // to get the count of products by Pavani on 01-06-2015
    function getProdsCnt($mode = "default", $search = "", $s_params = "") {
        $dbapi = $this->load->module("db_api");
        if ($search != "") {
            $s_query = "SELECT COUNT(*) AS cnt FROM os_products prods INNER JOIN os_all_store stores ON prods.store_id=stores.store_aid WHERE stores.country=85 AND prods.name LIKE '%" . $search . "%'";
        } elseif ($subcategory != "" || $category != "") {
            if ($subcategory_name != "") {
                $s_res = $this->getListCategories($category_name, $subcategory_name);
            } else {
                $s_res = $this->getListCategories($category_name);
            }
            $s_query = "SELECT COUNT(*) FROM os_products prods INNER JOIN os_all_store stores ON prods.store_id=stores.store_aid INNER JOIN os_product_more_info more ON prods.product_aid=more.product_aid WHERE stores.country=85 AND prods.Category IN ($s_res) ORDER BY more.viewed_count DESC;";
        } else {
            $s_query = "SELECT COUNT(*) AS cnt FROM os_products prods INNER JOIN os_all_store stores ON prods.store_id=stores.store_aid WHERE stores.country=85";
        }
        $rescnt = $dbapi->custom($s_query);
        return $rescnt;
    }

    function getListCategories($category = "", $subcategory = "") {
        $db_api = $this->load->module("db_api");
        $s_query = "SELECT * FROM os_category WHERE groups='" . $category . "'";
        //echo "getListCategories:".$subcategory;
        if ($subcategory != "") {
            $s_query = $s_query . " AND name='" . $subcategory . "'";
        }
        //echo $s_query;
        $a_res = $db_api->custom($s_query);
        $s_list = "";
        $count = 0;
        $category_cnt = count($a_res);
        foreach ($a_res as $rows) {
            if ($count == $category_cnt - 1) {
                $s_list = $s_list . $rows["category_aid"];
            } else {
                $s_list = $s_list . $rows["category_aid"] . ",";
            }
            $count++;
        }
        return $s_list;
    }

    function mystore_myproduct_search() {
        $user_id = $this->get_store_ownerId();
        $store_unique_id = $this->store_uniqueid_return($user_id);
        $store_aid = $this->store_aid_return($store_unique_id);
        $db_obj = $this->load->module("db_api");
        //  echo"SELECT p.product_aid,p.category,c.category_aid,c.name FROM os_products p,os_category c WHERE p.store_id=$store_aid and p.category=c.category_aid";
        $dev_find_store['results_category'] = $db_obj->custom("SELECT p.product_aid,p.category,c.category_aid,c.name FROM os_products p,os_category c WHERE p.store_id=$store_aid and p.category=c.category_aid group by c.name");
        /* $category_id=$dev_find_store['results_category'][0]['category_aid'];
          echo "this is".$category_id; */
        $dev_find_store['sub_categories'] = $db_obj->custom("SELECT c.category_aid,s.subcategory_aid,s.name FROM os_category c,os_subcategory s WHERE c.category_aid=23 and c.category_aid=s.category_aid_fk");
        $this->load->view('products/mystore_myproduct_search', $dev_find_store);
    }

    //by venkatesh 
    function mystore_myproduct_list($store_aid) {
        echo "<center><div class='topviewproduct' style=''><strong>Store Products</strong></div></center>";
        $db_obj = $this->load->module("db_api");
        $dev_product_result['results_products'] = $db_obj->custom("select p.product_aid,p.name,p.store_id,p.image_path,p.sell_price,p.category,opmi.review_count,opmi.rank_weitage,
		c.category_aid,c.name as category_name from os_products p left join os_category c on p.Category=c.category_aid left join os_product_more_info opmi on p.product_aid=opmi.product_aid  where p.store_id=$store_aid and p.category=c.category_aid limit 0,8");
        $user_id = $this->store_owner_id($store_aid);
        $dev_product_result["store_uid"] = $this->store_uniqueid_return($user_id);
        $this->load->view('products/mystore_myproduct_list', $dev_product_result);
    }

    //by venkatesh : this function shows store's product list
    function load_product_list() {
         $load_product_count = $_REQUEST["load_product_count"];
        $store_aid = $_REQUEST["os_store_aid"];
        $db_obj = $this->load->module("db_api");
        $dev_product_result['results_products'] = $db_obj->custom("select p.product_aid,p.name,p.store_id,p.image_path,p.sell_price,p.category,opmi.review_count,opmi.rank_weitage,       c.category_aid,c.name as category_name from os_products p left join os_category c on p.Category=c.category_aid left join os_product_more_info opmi on p.product_aid=opmi.product_aid  where p.store_id=$store_aid and p.category=c.category_aid limit  " . $load_product_count . ",8");
        $this->load->module("stores");
        $dev_product_result["store_uid"] = $this->store_unique_id($store_aid);
        $this->load->view('products/mystore_myproduct_list', $dev_product_result);
    }

    // by venkatesh : this function show's similar products in product details view
    function similar_Products($category_id, $product_category, $product_aid) {
        $db_obj = $this->load->module("db_api");
        //echo "select op.product_code,stores.store_code,stores.store_name,stores.store_aid,op.primary_image as prod_img,product_aid,product_name,sale_price from oshop_products op left join oshop_categories osc on op.product_category_id_fk=osc.category_id_fk left join oshop_stores stores ON op.store_id_fk=stores.store_aid where product='" . $product_category . "' and product_category_id_fk=" . $category_id . " and product_aid!=" . $product_aid;
        $data["similar_products"] = $db_obj->custom("select osc.category_name,stores.currency,op.product_code,stores.store_code,stores.store_name,stores.store_aid,op.primary_image as prod_img,product_aid,product_name,sale_price,cost_price from oshop_products op left join oshop_categories osc on op.product_category_id_fk=osc.category_id_fk left join oshop_stores stores ON op.store_id_fk=stores.store_aid where osc.product ='" . $product_category . "' and product_category_id_fk='" . $category_id . "' and product_aid != '" . $product_aid."'");
        $this->load->view('products/similar_products', $data);
    }

    //03-june-2015 by venkatesh: this function retrive the  category wise products
    function product_view_tpl($category_name = null) {
        if ($_REQUEST["category_name"]) {
            $category_name = $_REQUEST["category_name"];
        }
        //    $home_obj=$this->load->module("home");
        //    $country=$home_obj->country_info_based_on_ip();
        $cookies_obj = $this->load->module("cookies");
        $country_id = $cookies_obj->getUserCountryID();
        $db_obj = $this->load->module("db_api");
        $data['category_products'] = $db_obj->custom("select op.product_aid, op.cost_price, op.sell_price, op.name as product_name, op.discount, op.waranty_if_any, op.quantity, op.specification, op.description, op.marked_price, op.image_path, oc.name as category_name, oas.store_id as store_unique_id, oas.name as store_name, oas.logo_path as store_logo_path, opmf.rank_weitage,opmf.review_count from os_products op left join os_category oc on op.Category=oc.category_aid left join os_all_store oas on oas.store_aid=op.store_id left join os_product_more_info opmf on op.product_aid=opmf.product_aid where oc.name='" . $category_name . "' and oas.country =" . $country_id . " limit 0,8");
        $this->load->view('products/product_view_tpl', $data);
    }

    function catagory_ids_menu() {
        $fileName = FCPATH . "/registeries/GROUPS";
        $dirs = scandir($fileName);
        $groups[] = "";
        foreach ($dirs as $dir) {
            if (is_dir($fileName . "/" . $dir)) {
                if ($dir != '.' && $dir != '..') {
                    $groups[] = ucwords(str_replace("_", " ", $dir));
                }
            }
        }
        return $groups;
    }

    //27-05-2015 by RaviTeja : this function return category list based on group 
    function catagory_ids() {
        $catId = $_REQUEST["Group_id"];
        // print_r($catId);
        $catId = str_replace(" ", "_", strtolower($catId));
        // print_r($catId + "main category");
        $fileName = FCPATH . "/registeries/GROUPS/" . $catId;
        $dirs = scandir($fileName);
		echo "<option>--Select Category</option>";
        foreach ($dirs as $dir) {
            if (is_dir($fileName . "/" . $dir)) {
                if ($dir != '.' && $dir != '..') {
                    echo "<option value=" . $dir . ">" . ucwords(str_replace("_", " ", $dir)) . "</option>";
                }
            }
        }
        echo "<option value='others'>Others</option>";
    }

    //27-05-2015 by venkatesh : this function return sub category list based on main category id  
    function subcatagory_ids() {
        $grpId = $_REQUEST["Group_id"];
        $grpId = str_replace(" ", "_", strtolower($grpId));
        $catId = $_REQUEST["Category_id"];
        $catId = str_replace(" ", "_", strtolower($catId));
        $fileName = FCPATH . "/registeries/GROUPS/" . $grpId . "/" . $catId;

        $dirs = scandir($fileName);
		echo "<option>--Select Sub Category</option>";
        if (count($dirs) >= 4) {
                
            foreach ($dirs as $dir) {
                if (is_dir($fileName . "/" . $dir)) {
                    if ($dir != '.' && $dir != '..') {
                        echo "<option value=" . $dir . ">" . ucwords(str_replace("_", " ", $dir)) . "</option>";
                    }
                }
            }
        } else {
            $fileName = FCPATH . "/registeries/GROUPS/" . $grpId . "/" . $catId . "/" . $catId . ".json";
            if (file_exists($fileName)) {
                $str = file_get_contents($fileName);
                $json = json_decode($str, true);
                foreach ($json['config'] as $key => $item) {
                    if ($key == "brands" && $item == true) {
                        $this->getfilterBrands($json);
                    }
                    if ($key == "parameters_applicable" && $item == true) {
                        $this->getfilterParameters($json);
                    }
                }
            }
            
        }
    }

    //27-05-2015 by RaviTeja : this function return sub category list based on main category id  
    function getspecifications() {
        $grpId = $_REQUEST["Group_id"];
        $grpId = str_replace(" ", "_", strtolower($grpId));
        $catId = $_REQUEST["Category_id"];
        $catId = str_replace(" ", "_", strtolower($catId));
        $subcatId = $_REQUEST["subCat_id"];
        $subcatId = str_replace(" ", "_", strtolower($subcatId));
        $fileName = FCPATH . "/registeries/GROUPS/" . $grpId . "/" . $catId . "/" . $subcatId . "/" . $subcatId . ".json";
        if (file_exists($fileName)) {
            $str = file_get_contents($fileName);
            $json = json_decode($str, true);
			echo '<div class="subheading_prdts"><h5> Set Specifications</h5></div>';
            foreach ($json['config'] as $key => $item) {
                if ($key == "brands" && $item == true) {
                    $this->getBrands($json);
                }
                if ($key == "parameters_applicable" && $item == true) {
                    $this->getParameters($json);
                }
            }
        }
    }

    //27-05-2015 by RaviTeja : this function return sub category list based on main category id  
    function getfilterSpecifications($catid = NULL, $subcatid = NULL, $itemid = NULL) {
        $fileName = FCPATH . "/registeries/GROUPS/" . $catid . "/" . $subcatid . "/" . $itemid . "/" . $itemid . ".json";
        if (file_exists($fileName)) {
            $str = file_get_contents($fileName);
            $json = json_decode($str, true);

            foreach ($json['config'] as $key => $item) {
                if ($key == "brands" && $item == true) {
                    $this->getfilterBrands($json);
                }
                if ($key == "parameters_applicable" && $item == true) {
                    $this->getfilterParameters($json);
                }
            }
        }
    }

    function getfilterParameters($specs) {
        foreach ($specs['option_type'] as $key => $item) {
            echo '<h5 class="black mab10 bgcolor wi100pstg borderbottom bold">' . ucwords(str_replace("_", " ", $key)) . "</h5>";
            echo '<input type="hidden" id="osdev_' . $key . '" name="' . $key . '" value="">';
            $i = 0;
            foreach ($specs['product_param'][$key] as $option) {
                echo "<input class='filterCheck' type='checkbox' name='osdev_" . $key . "' value='" . $option . "'> " . $option . "<br/>";
                $i++;
            }
            echo "<br/>";
        }
    }

    function getfilterBrands($specs) {
        echo '<h5 class="black mab10 bgcolor wi100pstg borderbottom bold">Brand</h5>';
        echo '<input type="hidden" id="osdev_brand" name="osv_brand" value="">';
        $i = 0;
        foreach ($specs['brands'] as $key => $item) {
            echo "<input class='filterCheck' type='checkbox' name='osdev_" . $key . "'  value='" . $item . "'> " . $item . "<br/>";
            $i++;
        }
        echo "<br/>";
    }

    function getBrands($specs) {
        echo "<div class='oneshop_fieldsbox'><div class='wi100pstg select'><select class='oneshop_specifiedselect_new' id='osdev_Brand' name='osdev_Brand'><option>--Select Brand</option>";
        foreach ($specs['brands'] as $key => $item) {
            echo "<option value='" . $key . "'> " . $item . "</option>";
        }
        echo "</select></div></div>";
    }

    function getParameters($specs) {
        foreach ($specs['option_type'] as $key => $item) {
            echo "<div class='oneshop_fieldsbox'><label>" . ucwords(str_replace("_", " ", $key)) . "</label><br/>";
            if ($item == "enum") {
                echo "<div class='wi100pstg select'><select class='oneshop_specifiedselect_new' id='osdev_" . $key . "' name='osdev_" . $key . "'><option>--Select--</option>";
                foreach ($specs['product_param'][$key] as $option) {
                    echo "<option value='" . $option . "'> " . $option . "</option>";
                }
                echo "</select></div></div>";
            } elseif ($item == "set") {
                $i = 0;
                foreach ($specs['product_param'][$key] as $option) {

                    echo "<input type='checkbox' name='osdev_" . $key . "[]' value='" . $option . "'> " . $option . "<br/>";
                    $i++;
                }
                echo "<br/>";
            } else {
                
            }
        }
    }
	function checkProductExists($prod_name){
      $dbapi=$this->load->module("db_api");
      $result=$dbapi->custom("SELECT COUNT(*) as cnt FROM oshop_products WHERE product_name='".$prod_name."'");
      return $result[0]["cnt"];
    }

    function product_updation(){
      $store_code = $this->input->post('store_code');
      $productid = $this->input->post('product_id');
      $dbapi=$this->load->module("db_api");
      //$store_code="ST1073";
      $userid=$this->get_UserId();
      $ret_result="";
      $result=$dbapi->custom("SELECT role,user_id_fk,store_name,store_aid,store_code FROM oshop_stores stores INNER JOIN oshop_staff staff ON stores.store_aid=staff.store_id_fk where stores.store_code='".$store_code."' and user_id_fk=".$userid);
      if($result[0]["user_id_fk"]!==$userid && $result[0]["role"]=="ORDER_MANAGER"){
        $ret_result="##OSPRODADDUNAUTH##";
      }else{
          $i_store_id=$result[0]["store_aid"];
          foreach ($_REQUEST as $key => $val) {
            $_REQUEST[$key] = $this->strip_data($_REQUEST[$key]);
          }
          $img_paths="";
          $category = $_REQUEST["Group"];
          $selectcatid = $this->db_api->custom("SELECT category_id_fk FROM oshop_categories WHERE groups LIKE '".$category."'");
          if($_REQUEST["Shipping"]=='' || $_REQUEST["Handling"]=='')
          {
            $ship=0;
            $handle=0;
          }
          else
          {
            $ship=$_REQUEST["Shipping"];
            $handle=$_REQUEST["Handling"];
          }
          if($_REQUEST["Sell_Price"] == ''){
            $selp = '0';
          }
          else
          {
            $selp = $_REQUEST["Sell_Price"];
          }
          if($_REQUEST["Discount"] == ''){
            $disc = '0';
          }
          else
          {
            $disc = $_REQUEST["Discount"];
          }

          $hex_code = Uuid::v4();
          if($_REQUEST["Group"]==="others"){
            $a_data = array("cost_price" => $_REQUEST["Cost_Price"],"sale_price" => $selp,"product_name" =>$_REQUEST['Product_Name'],"hex_code" => $hex_code, "bulk_quantity" => $_REQUEST["bulk_quantity"], "bulk_price" => $_REQUEST["bulk_price"], "quantity" => $_REQUEST["Quantity"],"discount" => $disc,"store_id_fk" => $i_store_id,"product_category_id_fk" => $selectcatid[0]['category_id_fk'],"description" => $_REQUEST['Description'],"added_by"=>$this->get_UserId(),"warranty"=>$_REQUEST["Warranty"],"warranty_type"=>$_REQUEST["warranty_type"],"others_cateogry_name"=>$_REQUEST["Category"],"others_subcategory_name"=>$_REQUEST["Sub_Category"],"shipping" => $ship,"handling" => $handle);
          }
          else{
            $a_data = array("cost_price" => $_REQUEST["Cost_Price"],"sale_price" => $selp,"product_name" =>$_REQUEST['Product_Name'],"hex_code" => $hex_code, "bulk_quantity" => $_REQUEST["bulk_quantity"], "bulk_price" => $_REQUEST["bulk_price"], "quantity" => $_REQUEST["Quantity"],"discount" => $disc,"store_id_fk" => $i_store_id,"product_category_id_fk" => $selectcatid[0]['category_id_fk'],"others_cateogry_name"=>$_REQUEST["Category"],"others_subcategory_name"=>$_REQUEST["Sub_Category"],"description" => $_REQUEST['Description'],"added_by"=>$this->get_UserId(),"warranty"=>$_REQUEST["Warranty"],"warranty_type"=>$_REQUEST["warranty_type"],"product_tags"=>$_REQUEST["product_tags"],"shipping" => $ship,"handling" => $handle);
          }
        $ins_result=$dbapi->update($a_data,"oshop_products","product_aid=".$productid);
        $last_inserted_id=$productid;
        $product_path=$_SERVER["DOCUMENT_ROOT"]."stores/".$store_code."/products/";
        if(!file_exists($product_path)){
          mkdir($product_path);
          shell_exec("chmod -R 777 ".$product_path);
        }
        $product_path.=$last_inserted_id."/";
        //echo $product_path;
        if(!file_exists($product_path)){
          mkdir($product_path);
          shell_exec("chmod -R 777 ".$product_path);
        }
        $orig_path=$product_path."orig";
        $li_path=$product_path."li";
        $si_path=$product_path."si";
        $mi_path=$product_path."mi";
        if(!file_exists($orig_path)){
          mkdir($orig_path);
          shell_exec("chmod -R 777 ".$orig_path);
        }
        if(!file_exists($li_path)){
          mkdir($li_path);
          shell_exec("chmod -R 777 ".$li_path);
        }
        if(!file_exists($si_path)){
          mkdir($si_path);
          shell_exec("chmod -R 777 ".$si_path);
        }
        if(!file_exists($mi_path)){
          mkdir($mi_path);
          shell_exec("chmod -R 777 ".$mi_path);
        }
        
          for ($i = 0; $i < count($_FILES["productImg"]["name"]); $i++) {
            //$current_date=date("YmdHis");
            $current_date=  time();
            //$paths.="~".$_FILES['productImg']['name'][$i];
            $product_image = basename($_FILES['productImg']['name'][$i]);
            $ext = end(explode(".", $product_image));
            $product_img_name = $i_store_id.$current_date .$i."." . $ext;
            if($_FILES['productImg']['name'][$i]!=""){
              $img_paths.="~".$product_img_name;
              $imgdata[] = array("", "", "", "");
              $upd_arry=array();
              if (move_uploaded_file($_FILES['productImg']['tmp_name'][$i], $orig_path . "/" . $product_img_name)) {
                $imgdata[$i] = $product_img_name;
                if($i==0){
                  $upd_arry["primary_image"]=$product_img_name;
                }
                if($i==1){
                  $upd_arry["secondary_image"]=$product_img_name;
                }
                if($i==2){
                  $upd_arry["tertiary_image"]=$product_img_name;
                }
                if($i==3){
                  $upd_arry["quaternary_image"]=$product_img_name;
                }
                $this->imageresize->resize($orig_path . "/" . $product_img_name, $li_path . "/" . $product_img_name, 600, 400);
                $this->imageresize->resize($orig_path . "/" . $product_img_name, $mi_path . "/" . $product_img_name, 180, 150);
                $this->imageresize->resize($orig_path . "/" . $product_img_name, $si_path . "/" . $product_img_name, 45, 45);
                unlink($orig_path . "/" . $product_img_name);
              }
              $dbapi->update($upd_arry,"oshop_products","product_aid=".$last_inserted_id);
              //print_r($upd_arry);
            }
          }
          $products_res=$dbapi->select("product_code","oshop_products","product_aid=".$last_inserted_id);
          //$ins_result=$dbapi->insert($a_data,"oshop_products");
          if($ins_result==1){
            echo "##OSPRODINS1##"."~".$store_code."~".$products_res[0]["product_code"];
          }else{
            echo "##OSPRODINS0##";
          }
      }
    }
    
    function product_insertion() {
      $store_code = $this->input->post('store_code');
      $dbapi=$this->load->module("db_api");
      //$store_code="ST1073";
      $userid=$this->get_UserId();
      $ret_result="";
      $result=$dbapi->custom("SELECT role,user_id_fk,store_name,store_aid,store_code FROM oshop_stores stores INNER JOIN oshop_staff staff ON stores.store_aid=staff.store_id_fk where stores.store_code='".$store_code."' and user_id_fk=".$userid);
      if($result[0]["user_id_fk"]!==$userid && $result[0]["role"]=="ORDER_MANAGER"){
        $ret_result="##OSPRODADDUNAUTH##";
      }else{
        if($this->checkProductExists($_REQUEST["Product_Name"])){
          echo "##OSPRODEXISTS##";
        }else{
          $i_store_id=$result[0]["store_aid"];
          foreach ($_REQUEST as $key => $val) {
            $_REQUEST[$key] = $this->strip_data($_REQUEST[$key]);
          }
          $img_paths="";
          $category = $_REQUEST["Group"];
          $selectcatid = $this->db_api->custom("SELECT category_id_fk FROM oshop_categories WHERE groups LIKE '".$category."'");
          if($_REQUEST["Shipping"]=='' || $_REQUEST["Handling"]=='')
          {
            $ship=0;
            $handle=0;
          }
          else
          {
            $ship=$_REQUEST["Shipping"];
            $handle=$_REQUEST["Handling"];
          }
          if($_REQUEST["Sell_Price"] == ''){
            $selp = '0';
          }
          else
          {
            $selp = $_REQUEST["Sell_Price"];
          }
          if($_REQUEST["Discount"] == ''){
            $disc = '0';
          }
          else
          {
            $disc = $_REQUEST["Discount"];
          }

          $hex_code = Uuid::v4();
          if($_REQUEST["Group"]==="others"){
            $a_data = array("cost_price" => $_REQUEST["Cost_Price"],"sale_price" => $selp,"product_name" =>$_REQUEST['Product_Name'],"hex_code" => $hex_code, "bulk_quantity" => $_REQUEST["bulk_quantity"], "bulk_price" => $_REQUEST["bulk_price"], "quantity" => $_REQUEST["Quantity"],"discount" => $disc,"store_id_fk" => $i_store_id,"product_category_id_fk" => $selectcatid[0]['category_id_fk'],"description" => $_REQUEST['Description'],"added_by"=>$this->get_UserId(),"warranty"=>$_REQUEST["Warranty"],"warranty_type"=>$_REQUEST["warranty_type"],"others_cateogry_name"=>$_REQUEST["Category"],"others_subcategory_name"=>$_REQUEST["Sub_Category"],"shipping" => $ship,"handling" => $handle);
          }
          else{
            $a_data = array("cost_price" => $_REQUEST["Cost_Price"],"sale_price" => $selp,"product_name" =>$_REQUEST['Product_Name'],"hex_code" => $hex_code, "bulk_quantity" => $_REQUEST["bulk_quantity"], "bulk_price" => $_REQUEST["bulk_price"], "quantity" => $_REQUEST["Quantity"],"discount" => $disc,"store_id_fk" => $i_store_id,"product_category_id_fk" => $selectcatid[0]['category_id_fk'],"others_cateogry_name"=>$_REQUEST["Category"],"others_subcategory_name"=>$_REQUEST["Sub_Category"],"description" => $_REQUEST['Description'],"added_by"=>$this->get_UserId(),"warranty"=>$_REQUEST["Warranty"],"warranty_type"=>$_REQUEST["warranty_type"],"product_tags"=>$_REQUEST["product_tags"],"shipping" => $ship,"handling" => $handle);
          }
          $ins_result=$dbapi->insert($a_data,"oshop_products");
          $last_inserted_id=mysql_insert_id();
          $this->load->module("notification");
          $this->notification->insert_notification($i_store_id,$last_inserted_id,$_REQUEST['Product_Name']);
          $tid = $_POST["tid"];  
          $tname = $_POST["tname"]; 
          $tperc = $_POST["tperc"]; 
          for($i=0; $i<count($tid); $i++)  
            {  
                if(trim($tid[$i] != '') && trim($tname[$i] != '') && trim($tperc[$i] != ''))  
                {  
                    $a_data=array("tax_store_id" => $i_store_id,"tax_product_id" => $last_inserted_id,"tax_id" =>$tid[$i],"tax_name" =>$tname[$i],"tax_perc" =>$tperc[$i]); 
                    $tax_result=$dbapi->insert($a_data,"oshop_tax_details"); 
                }  
                echo "Tax Inserted";  
            }  
        $product_path=$_SERVER["DOCUMENT_ROOT"]."stores/".$store_code."/products/";
        if(!file_exists($product_path)){
          mkdir($product_path);
          shell_exec("chmod -R 777 ".$product_path);
        }
        $product_path.=$last_inserted_id."/";
        //echo $product_path;
        if(!file_exists($product_path)){
          mkdir($product_path);
          shell_exec("chmod -R 777 ".$product_path);
        }
        $orig_path=$product_path."orig";
        $li_path=$product_path."li";
        $si_path=$product_path."si";
        $mi_path=$product_path."mi";
        if(!file_exists($orig_path)){
          mkdir($orig_path);
          shell_exec("chmod -R 777 ".$orig_path);
        }
        if(!file_exists($li_path)){
          mkdir($li_path);
          shell_exec("chmod -R 777 ".$li_path);
        }
        if(!file_exists($si_path)){
          mkdir($si_path);
          shell_exec("chmod -R 777 ".$si_path);
        }
        if(!file_exists($mi_path)){
          mkdir($mi_path);
          shell_exec("chmod -R 777 ".$mi_path);
        }
        
          for ($i = 0; $i < count($_FILES["productImg"]["name"]); $i++) {
            //$current_date=date("YmdHis");
            $current_date=  time();
            //$paths.="~".$_FILES['productImg']['name'][$i];
            $product_image = basename($_FILES['productImg']['name'][$i]);
            $ext = end(explode(".", $product_image));
            $product_img_name = $i_store_id.$current_date .$i."." . $ext;
            if($_FILES['productImg']['name'][$i]!=""){
              $img_paths.="~".$product_img_name;
              $imgdata[] = array("", "", "", "");
              $upd_arry=array();
              if (move_uploaded_file($_FILES['productImg']['tmp_name'][$i], $orig_path . "/" . $product_img_name)) {
                $imgdata[$i] = $product_img_name;
                if($i==0){
                  $upd_arry["primary_image"]=$product_img_name;
                }
                if($i==1){
                  $upd_arry["secondary_image"]=$product_img_name;
                }
                if($i==2){
                  $upd_arry["tertiary_image"]=$product_img_name;
                }
                if($i==3){
                  $upd_arry["quaternary_image"]=$product_img_name;
                }
                $this->imageresize->resize($orig_path . "/" . $product_img_name, $li_path . "/" . $product_img_name, 600, 400);
                $this->imageresize->resize($orig_path . "/" . $product_img_name, $mi_path . "/" . $product_img_name, 180, 150);
                $this->imageresize->resize($orig_path . "/" . $product_img_name, $si_path . "/" . $product_img_name, 45, 45);
                unlink($orig_path . "/" . $product_img_name);
              }
              $dbapi->update($upd_arry,"oshop_products","product_aid=".$last_inserted_id);
              //print_r($upd_arry);
            }
          }
          $products_res=$dbapi->select("product_code","oshop_products","product_aid=".$last_inserted_id);
          //$ins_result=$dbapi->insert($a_data,"oshop_products");
          if($ins_result==1){
            echo "##OSPRODINS1##"."~".$store_code."~".$products_res[0]["product_code"];
          }else{
            echo "##OSPRODINS0##";
          }
        }
      }
    }


     // Add Inventory Code Start by Uravashi 04-09-2020
     function inventory_insertion() 
     {
         $store_code = $this->input->post('store_code');
         $dbapi=$this->load->module("db_api");
         //$store_code="ST1073";
         $a_data = array("idproduct" => $_REQUEST["idproduct"],"qty" => $_REQUEST["qty"],"costprice" =>$_REQUEST['costprice'],"type" => $_REQUEST['type'],"remark"=>$_REQUEST["remark"],"createddate"=>date('Y-m-d H:i:s'));
         // print_r($a_data); exit;
         $ins_result=$dbapi->insert($a_data,"oshop_tblinventory");
         if($ins_result==1){
             echo "##OSPRODINS1##"."~".$store_code;
         }
         else
         {
             echo "##OSPRODINS0##";
         }
     }
     function productdetails() {
         $db_api = $this->load->module("db_api");
         $previews_query = "SELECT prods.product_name,prods.product_code,ost.qty,ost.costprice,ost.type FROM   oshop_products as  prods
             INNER JOIN oshop_tblinventory as ost on ost.idproduct=prods.product_aid";
         $previews_result = $db_api->custom($previews_query);
         $data["product_data"]=$previews_result;
         $this->load->view("productdetailTpl",$data);
         //return $previews_result;
     }
     function productsummarydata() 
     {
         $db_api = $this->load->module("db_api");
         $previews_query = "SELECT prods.product_name,prods.product_code,sum(ost.qty) as totalqty,sum(ost.costprice) as totalprice,ost.type FROM   oshop_products as  prods
             INNER JOIN oshop_tblinventory as ost on ost.idproduct=prods.product_aid group by ost.idproduct";
         $previews_result = $db_api->custom($previews_query);
         $data["product_data"]=$previews_result;
         $this->load->view("productsummaryTpl",$data);
         //return $previews_result;
     }
     // Add Inventory Code Start by Uravashi 04-09-2020



    //27-05-2015 by RaviTeja -END
    //28-05-2015 by venkatesh : this function insert the product details into data base
    function product_insertion1() {
        $userid = $this->input->post('store_code');

        $templates_obj = $this->load->module("templates");
        $rlt = $templates_obj->store_manager_return($this->store_id_return());
        $rlt[0]["store_manager_emails"] = str_replace("~", "R", $rlt[0]["store_manager_emails"]);
        $rlt[0]["store_manager_emails"] = str_replace("RR", "R,R", $rlt[0]["store_manager_emails"]);
        if (preg_match("/\bR" . $_SESSION['user_id'] . "R\b/i", $rlt[0]["store_manager_emails"]) || $_SESSION['store_owner_id'] == $_SESSION['user_id']) {
            require('application/libraries/oneshopconfig.php');
            $home = $this->load->module("home");
            $i_store_id = $home->getStoreDetails($userid);
            $i_store_id = $i_store_id[0]["store_aid"];
            foreach ($_REQUEST as $key => $val) {
                $_REQUEST[$key] = $this->strip_data($_REQUEST[$key]);
            }
            $category = $_REQUEST["Sub_Category"];
            $cattable = "oshop_categories";
            $where = "product like '" . $category . "'";
            $selectcatid = $this->db_api->select("category_id_fk", $cattable, $where);
            $hex_code = Uuid::v4();
            $a_data = array(
                "cost_price" => $this->validateinput($_REQUEST["Cost_Price"]),
                "sale_price" => $this->validateinput($_REQUEST["Sell_Price"]),
                "product_name" => $this->validateinput($_REQUEST['Product_Name']),
                "hex_code" => $this->validateinput($hex_code),
                "discount" => $this->validateinput($_REQUEST['Discount']),
                "store_id_fk" => $this->validateinput($i_store_id),
                "product_category_id_fk" => $this->validateinput($selectcatid[0]['category_id_fk']),
                "description" => $this->validateinput($_REQUEST['Description']),
            );
            foreach ($a_data as $key => $val) {
                $a_data[$key] = $this->strip_data($a_data[$key]);
            }
             $result_arry=array();
             $status;
			if(($this->validations->is_AplhabeticSeriesOnly(substr($_REQUEST["Product_Name"],0,1))==0)||$this->validations->is_Alphanumeric_underscore($_REQUEST["Product_Name"])==0){
				 $result_arry['osdev_Product_Name']="error";
				}
			 if((strlen($_REQUEST["Product_Market_Price"])==0)){
				 $result_arry['osdev_Product_Market_Price']="error";
			 }
			 if((strlen($_REQUEST["Group"])==0)){
				 $result_arry['osdev_Group']="error";
			 }
			 if((strlen($_REQUEST["Category"])==0)){
				 $result_arry['osdev_Category']="error";
			 }
			 if((strlen($_REQUEST["Sub_Category"])==0)){
				 $result_arry['osdev_SubCategory']="error";
			 }
			 if((strlen($_REQUEST["Description"])==0)){
				 $result_arry['osdev_Description']="error";
			 }
			 if(($this->validations->is_number($_REQUEST["Warranty"])==0)||($_REQUEST["Warranty"]<0)){
				 $result_arry['osdev_warrenty']="error";
			 }
			 if(($this->validations->is_number($_REQUEST["warranty_type"])==0)||($_REQUEST["warranty_type"]<0)){
				 $result_arry['osdev_warranty_type']="error";
			 }
			 if(($this->validations->is_number($_REQUEST["Discount"])==0)||($_REQUEST["Discount"]<0)){
				 $result_arry['osdev_Discount']="error";
			 }
			 if(($this->validations->is_number($_REQUEST["Quantity"])==0)||($_REQUEST["Quantity"]<0)){
				 $result_arry['osdev_Quantity']="error";
			 }
			 if(($this->validations->is_number($_REQUEST["Cost_Price"])==0)||($_REQUEST["Cost_Price"]<0)){
			
				 $result_arry['osdev_CostPrice']="error";
			 }
			 
            if(count($result_arry)!=0){
			 
			  echo $status=json_encode($result_arry);
			  }else{

            $mytable = "oshop_products";
            $rlt = $this->db_api->insert($a_data, $mytable);
            $where = "hex_code='" . $hex_code . "'";
            $selectqry = $this->db_api->select("product_aid", $mytable, $where);
            $paid = $selectqry[0]['product_aid'];
            $dirPath = FCPATH . "stores/" . $userid . "/products/";
            $maindir = $dirPath . $selectqry[0]['product_aid'] . "/";
            if (!is_dir($maindir)) {
                mkdir($maindir);
                chmod($maindir, 0777);
            }
            require('application/libraries/oneshopconfig.php');
            $prdct_img = "";
            for ($i = 0; $i < count($_FILES["productImg"]["name"]); $i++) {

                $origdir = $maindir . "/orig";
                if (!is_dir($origdir)) {
                    mkdir($origdir);
                    chmod($origdir, 0777);
                }
                $lidir = $maindir . "/li";
                if (!is_dir($lidir)) {
                    mkdir($lidir);
                    chmod($lidir, 0777);
                }
                $midir = $maindir . "/mi";
                if (!is_dir($midir)) {
                    mkdir($midir);
                    chmod($midir, 0777);
                }
                $sidir = $maindir . "/si";
                if (!is_dir($sidir)) {
                    mkdir($sidir);
                    chmod($sidir, 0777);
                }
                //echo $_FILES["productImg"]["name"][$i];
                $date = new DateTime();
                $date = $date->format('Y-m-d-H-i-s');

                $product_image = basename($_FILES['productImg']['name'][$i]);
                //list($txt, $ext) = explode(".", $product_image);
                $ext = end(explode(".", $product_image));
                $store_logo_image_name = $i . "." . $ext;
                $imgdata[] = array("", "", "", "");
                if (move_uploaded_file($_FILES['productImg']['tmp_name'][$i], $origdir . "/" . $store_logo_image_name)) {
                    $imgdata[$i] = $store_logo_image_name;
                    $this->imageresize->resize($origdir . "/" . $store_logo_image_name, $lidir . "/" . $store_logo_image_name, 600, 400);
                    $this->imageresize->resize($origdir . "/" . $store_logo_image_name, $midir . "/" . $store_logo_image_name, 180, 150);
                    $this->imageresize->resize($origdir . "/" . $store_logo_image_name, $sidir . "/" . $store_logo_image_name, 45, 45);
                    unlink($origdir . "/" . $store_logo_image_name);
                }
            }
            $dbImg = array(
                "primary_image" => $imgdata[0],
                "secondary_image" => $imgdata[1],
                "tertiary_image" => $imgdata[2],
                "quaternary_image" => $imgdata[3],
            );
            foreach ($dbImg as $key => $val) {
                $dbImg[$key] = $this->strip_data($dbImg[$key]);
            }

            $where = "hex_code='" . $hex_code . "'";
            $s_tbl = "oshop_products";
            $this->db_api->update($dbImg, $s_tbl, $where);

            $this->storeSpecifications($selectqry[0]['product_aid']);

            $size = $this->folder_Size($origdir);
            $a_data = array("used_space" => $size);
            $s_where = "store_aid =" . $i_store_id;
            $s_tbl = "os_all_store";
            $this->db_api->update($a_data, $s_tbl, $s_where);

            //$product_insert_notification["i_store_id"] = $i_store_id;
            $product_insert_notification = $_REQUEST['Product_Name'];
            $this->load->module("notification");
            $this->notification->insert_notification("ADMIN_PRODUCT_ADDED",$i_store_id,$paid,$product_insert_notification);
        }
        } else {
            echo "expire";
            unset($_SESSION["store_owner_id"]);
        }
        $product_url = base_url() . "product_detail_view?product_id=" . base64_encode(base64_encode($selectqry[0]['product_aid']));
        echo $product_url;
    }

    function storeSpecifications($productaid) {
       $features = implode(',', $_POST['osdev_mobile_features']);
       
        $sub_cat = $_REQUEST["Sub_Category"]."_";
        
        foreach ($ele_data as $key => $val) {
            $ele_data[$key] = $this->strip_data($ele_data[$key]);
        }
        if ($_REQUEST["Group"] == "Electronics") {
			$ele_data = array(
				"product_aid_fk"           => $productaid,
				"mobiles_brand"            => $_REQUEST["osdev_Brand"],
				"mobiles_operating_system" => $_REQUEST["osdev_operating_system"],
				"mobiles_resolution_size"  => $_REQUEST['osdev_resolution_size'],
				"mobiles_types"            => $_REQUEST['osdev_mobile_type'],
				"mobiles_camera_type"      => $_REQUEST["osdev_camera_type"],
				"mobiles_camera_pixels"    => $_REQUEST["osdev_camera_pixels"],
				"mobiles_internal_storage" => $_REQUEST["osdev_internal_storage"],
				"mobiles_features"         => $features,
			);
			$a_data  = $ele_data;
			$a_table = "oshop_filtration_electronics";
		} else if ($_REQUEST["Group"] == "Jewelry") {
			$jw_data = array(
				"product_aid_fk"      => $productaid,
				$sub_cat."material"    => $_REQUEST["osdev_material"],
				$sub_cat."gemstones"   => $_REQUEST["osdev_gemstones"],
				$sub_cat."gold_purity" => $_REQUEST["osdev_gold_purity"],
			);
			$a_data  = $jw_data;
			$a_table = "oshop_filtration_jewelry";
		} else if ($_REQUEST["Group"] == "Fitness") {
			$a_data = array(
				"product_aid_fk"           => $productaid,
				$sub_cat."type"            => $_REQUEST["osdev_type"],
                $sub_cat."quantity"        => $_REQUEST["osdev_quantity"],
                $sub_cat."form"            => $_REQUEST["osdev_form"],
                $sub_cat."food_preference" => $_REQUEST["osdev_food_preference"],
                $sub_cat."usage time"      => $_REQUEST["osdev_usage time"],
                $sub_cat."pattern"         => $_REQUEST["osdev_pattern"],
                $sub_cat."length"          => $_REQUEST["osdev_length"],               
                $sub_cat."weight"          => $_REQUEST["osdev_weight"],
                $sub_cat."color"           => $_REQUEST["osdev_color"],
                $sub_cat."size_num"        => $_REQUEST["osdev_size_num"],
                $sub_cat."size"            => $_REQUEST["osdev_size"],
                $sub_cat."height"          => $_REQUEST["osdev_height"],
                $sub_cat."width"           => $_REQUEST["osdev_width"],
                $sub_cat."features"        => $_REQUEST["osdev_features"],
                $sub_cat."power"           => $_REQUEST["osdev_power"],
                $sub_cat."Level"           => $_REQUEST["osdev_Level"],
			);
			$a_table = "oshop_filtration_fitness";
		} else {
			
		}
                foreach($a_data as $key => $val) {
                    $a_data[$key] = $this->test_input($a_data[$key]);
                }
		if ($a_data && $a_table) {
			$rlt = $this->db_api->insert($a_data, $a_table);
		}
    }
	
    //28-05-2015 by venkatesh : this function return store auto increment id based on current user id
    function store_id_return() {
        $db_obj = $this->load->module("db_api");
        $myfields = "store_aid";
        $where = "created_by=" . $this->get_store_ownerId();
        $mytable = "os_all_store";
        $result = $db_obj->select($myfields, $mytable, $where);
        return $result[0]["store_aid"];
    }

    //28-05-2015 by venkatesh :this function store aid return based on store unique id
    function store_aid_return($store_u_id) {
        $db_obj = $this->load->module("db_api");
        $myfields = "store_aid";
        //Imp //$where = "country_code='" . $this->get_ip_info()."'"; 
        $where = "store_id='" . $store_u_id . "'";
        $mytable = "os_all_store";
        $result = $db_obj->select($myfields, $mytable, $where);
        return $result[0]["store_aid"];
    }

    //28-05-2015 by venkatesh :this function store aid return based on store unique id
    function store_unique_id($store_id) {
        $db_obj = $this->load->module("db_api");
        $myfields = "store_id";
        //Imp //$where = "country_code='" . $this->get_ip_info()."'"; 
        $where = "store_aid='" . $store_id . "'";
        $mytable = "os_all_store";
        $result = $db_obj->select($myfields, $mytable, $where);
        return $result[0]["store_id"];
    }

    //28-05-2015 by venkatesh : this function return store unique Id based on user id
    function store_uniqueid_return($userid) {
        $db_obj = $this->load->module("db_api");
        $myfields = "store_id";
        $where = "created_by=" . $userid;
        $mytable = "os_all_store";
        $result = $db_obj->select($myfields, $mytable, $where);
        return $result[0]["store_id"];
    }

    //28-05-2015 by venkatesh : this function return folder size
    function folder_Size($uploaddir) {
        $str = exec("du -sh $uploaddir");
        $arry = preg_split("/[\s,]+/", $str);
        $size = $arry[0];
        return number_format($this->convertSize($size), 5);
    }

    function convertSize($size) {
        $format = substr($size, -1);
        $d = "";
        $siz = substr($size, 0, strlen($size) - 1);
        if ($format == "K") {
            $d = $siz / (1024 * 1024);
        } elseif ($format == "M") {
            $d = $siz / 1024;
        }
        return $d;
    }

    //29-05-2015 by venkatesh : this function return store owner iws profile id based on store unique id
    function store_owner_id($id) {
        $db_obj = $this->load->module("db_api");
        $myfields = "created_by";
        $where = "	store_aid=" . $id;
        $mytable = "os_all_store";
        $result = $db_obj->select($myfields, $mytable, $where);
        return $result[0]["created_by"];
    }

    //01-06-2015 by venkatesh : this function return caragory name 
    function catagoryname($catagory_id) {
        $db_obj = $this->load->module("db_api");
        $myfields = "name";
        $where = "category_aid=" . $catagory_id;
        $mytable = "os_category";
        $result = $db_obj->select($myfields, $mytable, $where);
        return $result[0]["name"];
    }

    //01-06-2015 by venkatesh : this function return sub caragory name 
    function subcategory_Name($subcategory_id) {
        $db_obj = $this->load->module("db_api");
        $myfields = "name";
        $where = "subcategory_aid=" . $subcategory_id;
        $mytable = "os_subcategory";
        $result = $db_obj->select($myfields, $mytable, $where);
        return $result[0]["name"];
    }

    //03-june-2015 by venkatesh: this function load the category wise product details
    function load_category_product_list() {
        // print_R($_REQUEST);
        $product_limit_count = $_REQUEST["product_limit_count"];
        $db_obj = $this->load->module("db_api");
        $data['category_products'] = $db_obj->custom("select    op.product_aid,     op.cost_price,     op.sell_price,     op.name as product_name,     op.discount,     op.waranty_if_any,     op.quantity,     op.specification,     op.description,     op.marked_price,     op.image_path,     oc.name as category_name,     oas.store_id as store_unique_id,     oas.name as store_name,     oas.logo_path as store_logo_path,     opmf.rank_weitage,    opmf.review_count    from    os_products op left join os_category oc on op.Category=oc.category_aid 
		left join os_all_store oas on oas.store_aid=op.store_id
		left join os_product_more_info opmf on op.product_aid=opmf.product_aid
		where oc.name='" . $_REQUEST["CATEGORY_NAME"] . "' limit " . $product_limit_count . ",8");
        //    echo "<pre>";print_R($data['category_products']);die();
        $this->load->view('products/product_view_tpl', $data);
    }

    //03-june-2015 by venkatesh: this function load the sub category wise product details
    function load_subcategory_product_list() {
        //print_R($_REQUEST["subcategory_id"]);
        $db_obj = $this->load->module("db_api");
        $data['category_products'] = $db_obj->custom("select    op.product_aid,    op.cost_price,     op.sell_price,     op.name as product_name,     op.discount,     op.waranty_if_any,     op.quantity,     op.specification,     op.description,     op.marked_price,    op.image_path,     osc.name as category_name,     oas.store_id as store_unique_id,     oas.name as store_name,     oas.logo_path as store_logo_path,     opmf.rank_weitage,    opmf.review_count    from
		os_products op left join os_subcategory osc on op.subcategory_id=osc.subcategory_aid 
		left join os_all_store oas on oas.store_aid=op.store_id
		left join os_product_more_info opmf on op.product_aid=opmf.product_aid
		where op.subcategory_id='" . $_REQUEST["subcategory_id"] . "' limit 0,8");
        $this->load->view('products/product_view_tpl', $data);
    }

    //03-june-2015 by venkatesh: this function load the sub category wise product details
    function load_subcategory_loadproduct_list() {
        $limit = $_REQUEST["product_subcategory_limit_count"];
        $db_obj = $this->load->module("db_api");
        $data['category_products'] = $db_obj->custom("select
		op.product_aid,    op.cost_price,     op.sell_price,     op.name as product_name,     op.discount,     op.waranty_if_any,     op.quantity,     op.specification,
		op.description,     op.marked_price,     op.image_path,     osc.name as category_name,     oas.store_id as store_unique_id,     oas.name as store_name,     oas.logo_path as store_logo_path,     opmf.rank_weitage,    opmf.review_count    from
		os_products op left join os_subcategory osc on op.subcategory_id=osc.subcategory_aid 
		left join os_all_store oas on oas.store_aid=op.store_id
		left join os_product_more_info opmf on op.product_aid=opmf.product_aid
		where op.subcategory_id='" . $_REQUEST["product_subcategory_id"] . "' limit " . $limit . ",8");
        $this->load->view('products/product_view_tpl', $data);
    }

    //8 june 2015 to load all products and find myproducts by ramadevi.
    function myproduct_total_list() {
        $db_obj = $this->load->module("db_api");
        $user_id = $this->get_store_ownerId();
        $store_u_id = $this->store_uniqueid_return($user_id);
        $store_aid = $this->store_aid_return($store_u_id);
        // echo "this is".$store_aid;
        if ($_REQUEST['search_data'] == "") {
            $dev_product_result['results_products'] = $db_obj->custom("select p.*,c.category_aid,c.name as catname,r.product_aid,r.review_count from os_products p, os_category c,os_product_more_info r where p.store_id=$store_aid and c.category_aid=p.category and p.product_aid=r.product_aid limit " . $_REQUEST['starting'] . ",8");
            $dev_product_result['store_uid'] = $store_u_id;

            //echo "select p.*,c.category_aid,c.name as catname,r.product_aid,r.review_count from os_products p, os_category c,os_product_more_info r where p.store_id=$store_aid and c.category_aid=p.category and p.product_aid=r.product_aid limit ".$_REQUEST['starting'].",8";
        } else {
            // echo "select p.*,c.category_aid,c.name as catname,r.product_aid,r.review_count from os_products p, os_category c,os_product_more_info r where p.store_id=$store_aid and p.name LIKE '%".$_REQUEST['search_data']."%'and c.category_aid=p.category and p.product_aid=r.product_aid limit ".$_REQUEST['starting'].",8";

            $dev_product_result['results_products'] = $db_obj->custom("select p.*,c.category_aid,c.name as catname,r.product_aid,r.review_count from os_products p, os_category c,os_product_more_info r where p.store_id=$store_aid and p.name LIKE '%" . $_REQUEST['search_data'] . "%'and c.category_aid=p.category and p.product_aid=r.product_aid limit " . $_REQUEST['starting'] . ",8");
            $dev_product_result['store_uid'] = $store_u_id;
        }
        // print_R($results_products);
        $this->load->view('products/myproduct_list', $dev_product_result);
    }

    //03-june-2015 by venkatesh this function update product images
    function product_image_update() {
        //    echo $_REQUEST["product_aid"];//    echo $_REQUEST["store_unique_id"];//    echo $_REQUEST["current_image"]."</br>";//    echo $_REQUEST["total_img"];
        unlink("stores/" . $_REQUEST["store_unique_id"] . "/products/li/" . $_REQUEST["current_image"]);
        unlink("stores/" . $_REQUEST["store_unique_id"] . "/products/si/" . $_REQUEST["current_image"]);
        unlink("stores/" . $_REQUEST["store_unique_id"] . "/products/mi/" . $_REQUEST["current_image"]);
        $product_image = basename($_FILES['updatedimae']['name']);
        $ext = end(explode(".", $product_image));
        $imgname = explode('.', $_REQUEST["current_image"]);
        $imgname[count($imgname) - 1] = $ext;
        $upload_imgname = implode(".", $imgname);
        $update_path = str_replace($_REQUEST["current_image"], $upload_imgname, $_REQUEST["total_img"]);
        shell_exec('chmod -R 777 /var/www/html/oneshop/stores/');
        if (move_uploaded_file($_FILES['updatedimae']['tmp_name'], "stores/" . $_REQUEST["store_unique_id"] . "/products/orig/" . $upload_imgname)) {
            shell_exec("chmod -R 777 stores/" . $_REQUEST["store_unique_id"] . "/products/orig/" . $upload_imgname);
            $this->imageresize->resize("stores/" . $_REQUEST["store_unique_id"] . "/products/orig/" . $upload_imgname, "stores/" . $_REQUEST["store_unique_id"] . "/products/li/" . $upload_imgname, 600, 400);
            $this->imageresize->resize("stores/" . $_REQUEST["store_unique_id"] . "/products/orig/" . $upload_imgname, "stores/" . $_REQUEST["store_unique_id"] . "/products/mi/" . $upload_imgname, 180, 150);
            $this->imageresize->resize("stores/" . $_REQUEST["store_unique_id"] . "/products/orig/" . $upload_imgname, "stores/" . $_REQUEST["store_unique_id"] . "/products/si/" . $upload_imgname, 45, 45);
            unlink("stores/" . $_REQUEST["store_unique_id"] . "/products/orig/" . $upload_imgname);
        }
        echo $this->db_api->custom("update os_products set image_path='" . $update_path . "' where product_aid=" . $_REQUEST["product_aid"]);
    }

    //3rd june 2015 by ramadevi
    function add_image_update() {
        $db_obj = $this->load->module("db_api");
        require('application/libraries/oneshopconfig.php');
        // print_R($_FILES);die;
        $store_unique_id = $_REQUEST["add_store_unique_id"];
        $date = new DateTime();
        $date = $date->format('Y-m-d-H-i-s');
        $uploaddir = STORE_UP_PATH . "/" . $store_unique_id . "/";
        $product_image = basename($_FILES['add_img12']['name']);
        //list($txt, $ext) = explode(".", $product_image);
        $ext = end(explode(".", $product_image));
        $store_logo_image_name = $_REQUEST["product_name"] . $date . "." . $ext;
        $prdct_img = "," . $store_logo_image_name;
        // echo "this is else".$prdct_img;
        shell_exec('chmod -R 777 /var/www/html/oneshop/stores/');
        if (move_uploaded_file($_FILES['add_img12']['tmp_name'], $uploaddir . "products/orig/" . $store_logo_image_name)) {
            shell_exec('chmod -R 777 ' . $uploaddir . "products/orig/" . $store_logo_image_name);
            $this->imageresize->resize($uploaddir . "products/orig/" . $store_logo_image_name, $uploaddir . "products/li/" . $store_logo_image_name, 600, 400);
            $this->imageresize->resize($uploaddir . "products/orig/" . $store_logo_image_name, $uploaddir . "products/mi/" . $store_logo_image_name, 180, 150);
            $this->imageresize->resize($uploaddir . "products/orig/" . $store_logo_image_name, $uploaddir . "products/si/" . $store_logo_image_name, 45, 45);
            unlink($uploaddir . "products/orig/" . $store_logo_image_name);
        }
        // echo $prdct_img;
        $product_id = $_REQUEST["add_product_aid"];
        // echo "update os_products set image_path='$prdct_img' where product_aid=$product_id";
        $previous_product_img_path = $db_obj->custom("select image_path from os_products  where product_aid=$product_id");
        $previous_product_img_path1 = $previous_product_img_path[0]['image_path'];
        //echo $previous_product_img_path1;
        echo $added_product_img_path = $previous_product_img_path1 . $prdct_img;
        echo "update os_products set image_path='$added_product_img_path' where product_aid=$product_id";
        var_dump($db_obj->custom("update os_products set image_path='$added_product_img_path' where product_aid=$product_id"));
    }

    function update_product_rating() {
        $db_obj = $this->load->module("db_api");
        $rlt = $db_obj->custom("update os_product_more_info set rank_weitage=rank_weitage+" . $_REQUEST["rating"] . ",review_count=review_count+1 where product_aid=" . $_REQUEST["product_id"]);
    }

    //11june2015 by ramadevi.
    function findProductBycategory() {
        $db_obj = $this->load->module("db_api");
        $user_id = $this->get_UserId();
        $store_u_id = $this->store_uniqueid_return($user_id);
        $store_aid = $this->store_aid_return($store_u_id);
        $category_id = $_REQUEST['category'];
        $subcategory_id = $_REQUEST['sub_category'];
        if ($_REQUEST['search_data'] != "" && $_REQUEST['category'] !== "" && $_REQUEST['sub_category'] !== "") {
            $searchStr = $_REQUEST['search_data'];
            $category = $_REQUEST['category'];
            $subcategory = $_REQUEST['sub_category'];
            //echo "SELECT p.*,c.category_aid,c.name as catname FROM os_products p,os_category c WHERE p.category=$category_id and c.category_aid=$category_id and p.subcategory_id=$subcategory and store_id=$store_aid and p.name like '%$searchStr%' limit ".$_REQUEST['starting'].",".$_REQUEST['ending']."";     
            $dev_product_result['results_products'] = $db_obj->custom("SELECT p.*,c.category_aid,c.name as catname FROM os_products p,os_category c WHERE p.category=$category_id and c.category_aid=$category_id and p.subcategory_id=$subcategory and store_id=$store_aid and p.name like '%$searchStr%' limit " . $_REQUEST['starting'] . ",8");
            $dev_product_result['store_uid'] = $store_u_id;
        } else if ($_REQUEST['search_data'] != "" && $_REQUEST['category'] !== "") {
            $searchStr = $_REQUEST['search_data'];
            $category = $_REQUEST['category'];
            //echo"SELECT p.*,c.category_aid,c.name as catname FROM os_products p,os_category c WHERE p.category=$category_id and store_id=$store_aid and c.category_aid=$category_id and p.name like '%$searchStr%' limit ".$_REQUEST['starting'].",".$_REQUEST['ending']."";
            $dev_product_result['results_products'] = $db_obj->custom("SELECT p.*,c.category_aid,c.name as catname FROM os_products p,os_category c WHERE p.category=$category_id and p.store_id=$store_aid and c.category_aid=$category_id and p.name like '%$searchStr%' limit " . $_REQUEST['starting'] . ",8");
            $dev_product_result['store_uid'] = $store_u_id;
        } else if ($_REQUEST['category'] !== "" && $_REQUEST['sub_category'] !== "") {
            $category_id = $_REQUEST['category'];
            $sub_category_id = $_REQUEST['sub_category'];

            //echo "SELECT p.*,c.category_aid,c.name as catname FROM os_products p,os_category c WHERE p.category=$category_id and c.category_aid=$category_id and p.subcategory_id=$sub_category_id and p.store_id=$store_aid limit ".$_REQUEST['starting'].",".$_REQUEST['ending']."" ;
            $dev_product_result['results_products'] = $db_obj->custom("SELECT p.*,c.category_aid,c.name as catname FROM os_products p,os_category c WHERE p.category=$category_id and c.category_aid=$category_id and p.subcategory_id=$sub_category_id and p.store_id=$store_aid limit " . $_REQUEST['starting'] . ",8");
            $dev_product_result['store_uid'] = $store_u_id;
        } else if ($_REQUEST['category'] !== "" || $_REQUEST['sub_category'] !== "") {
            if ($_REQUEST['category'] !== "") {
                //echo "SELECT p.*,c.category_aid,c.name as catname FROM os_products p,os_category c WHERE p.category=$category_id and c.category_aid=$category_id and p.store_id=$store_aid limit ".$_REQUEST['starting'].",".$_REQUEST['ending']."";
                $dev_product_result['results_products'] = $db_obj->custom("SELECT p.*,c.category_aid,c.name as catname FROM os_products p,os_category c WHERE p.category=$category_id and c.category_aid=$category_id and p.store_id=$store_aid limit " . $_REQUEST['starting'] . ",8");
            }
            if ($_REQUEST['sub_category'] !== "") {
                //echo "SELECT p.*,c.category_aid,c.name as catname,s.* FROM os_products p,os_category c,os_subcategory s WHERE p.category=$category_id and c.category_aid=$category_id and s.category_aid_fk=$category_id and s.subcategory_aid=$subcategory_idand p.store_id=$store_aid limit ".$_REQUEST['starting'].",".$_REQUEST['ending']."";
                $dev_product_result['results_products'] = $db_obj->custom("SELECT p.*,c.category_aid,c.name as catname,s.* FROM os_products p,os_category c,os_subcategory s WHERE p.category=$category_id and c.category_aid=$category_id and s.category_aid_fk=$category_id and s.subcategory_aid=$subcategory_id and p.store_id=$store_aid limit " . $_REQUEST['starting'] . ",8");
            }
            $dev_product_result['store_uid'] = $store_u_id;
        }
        $dev_product_result['store_uid'] = $store_u_id;

        $this->load->view('products/myproduct_list', $dev_product_result);
    }

    //11 june 2015 find product by category by ramadevi
    function findProductSearch() {
        $user_id = $this->get_UserId();
        $store_unique_id = $this->store_uniqueid_return($user_id);
        $store_aid = $this->$store_aid_return($store_aid);
        $db_obj = $this->load->module("db_api");
        $dev_find_store[''] = $db_obj->custom("SELECT p.product_aid,p.category,c.category_aid,c.name FROM os_products p,os_category c WHERE p.store_id=$store_aid and p.category=c.category_aid");
    }

    //26-06-2015 by venkatesh : this function shows store top viewed products
    function mystore_top_view_products($store_aid) {
        echo "<center><div class='topviewproduct' style=''><strong>Top viewed Products</strong></div></center>";
        $db_obj = $this->load->module("db_api");
        $dev_product_result['results_products'] = $db_obj->custom("select p.product_aid,p.name,p.store_id,p.image_path,p.sell_price,p.category,opmi.review_count,opmi.rank_weitage,
		c.category_aid,c.name as category_name from os_products p left join os_category c on p.Category=c.category_aid left join os_product_more_info opmi on p.product_aid=opmi.product_aid  where p.store_id=$store_aid and p.category=c.category_aid  order by opmi.viewed_count desc limit 0,4");
        $user_id = $this->store_owner_id($store_aid);
        $dev_product_result["store_uid"] = $this->store_uniqueid_return($user_id);
        $this->load->view('products/mystore_myproduct_list', $dev_product_result);
    }

    function mystore_featured_products($store_aid) {
        $db_obj = $this->load->module("db_api");
        echo "<center><div class='topviewproduct' style=''><strong>Featured Products</strong></div></center>";
        $dev_product_result['results_products'] = $db_obj->custom("select p.product_aid,p.name,p.store_id,p.image_path,p.sell_price,p.category,opmi.review_count,opmi.rank_weitage,
		c.category_aid,c.name as category_name from os_products p left join os_category c on p.Category=c.category_aid left join os_product_more_info opmi on p.product_aid=opmi.product_aid  where p.store_id=$store_aid and p.category=c.category_aid  order by p.discount desc limit 0,4");
        $user_id = $this->store_owner_id($store_aid);
        $dev_product_result["store_uid"] = $this->store_uniqueid_return($user_id);
        $this->load->view('products/mystore_myproduct_list', $dev_product_result);
    }

    function product_share() {
        $db_obj = $this->load->module("db_api");
        if ($_REQUEST["share_module"] == "Buzzin") {
            $img_src = $_REQUEST["prd_img_src"];
            $os_share_privacy = $_REQUEST["os_share_privacy"];
            $string = "<a href=" . base_url() . "><h3>ONESHOP</h3></a> </br><img src=$img_src>";
            $user_id = $this->get_UserId();
            $a_data = array("buzz_text" => $string, "posted_by_fk" => $user_id, "privacy" => $os_share_privacy);
            $mytable = "buzzin_post";
            foreach($a_data as $key => $val) {
                $a_data[$key] = $this->test_input($a_data[$key]);
            }
            $rlt = $db_obj->insert($a_data, $mytable);
            echo $rlt;
        }
    }

    // function to strip html tags
    function strip_data($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    //Raviteja - function for get category list
    function oshop_category_list($storeid) {
        $storeid = 2;
        $db_obj = $this->load->module("db_api");

        $result = $db_obj->custom("select cat.groups,cat.category_name,cat.product from oshop_categories cat left join oshop_products prod on cat.category_id_fk = prod.product_category_id_fk where
		prod.store_id_fk=" . $storeid);
        //var_dump($result);
        $prodarray = array();
        foreach ($result as $cat) {
            $prodarray[] = $cat['product'];
            $catarray[] = $cat['category_name'];
        }

        $result = array(
            'electronics' => array(
                'computer_world' => array('Laptops', 'Keyboards'),
                'mobiles_tablets' => array('Mobiles', 'Tablets')
            ),
            'mens' => array(
                'Clothings' => array('T-Shirts', 'Formal Shirts'),
                'lens' => array('Flat Lense', 'Value B')
            ),
        );
        return $result;
    }

    // function to display the product reviews
    function productReviewsTpl1($product_id) {
        $records = ($this->input->post("counter") != "") ? $this->input->post("counter") : 0;
        $db_api = $this->load->module("db_api");
        $query = "SELECT rating,rating_on,text,username,img_path,first_name,middle_name,last_name FROM oshop_product_reviews opr INNER JOIN iws_profiles profiles ON opr.user_id_fk=profiles.profile_id WHERE product_aid_fk=" . $product_id . " ORDER BY rating_on DESC LIMIT " . ($records * 5) . ",5";
        $result = $db_api->custom($query);
        $data["review_details"] = $result;
        $data["product_id"] = $product_id;
        $this->load->view("products/products_reviews_tpl", $data);
    }

    // function to insert the product reviews by pavani on 05-02-2016
    function insertReviews() {
        $review_txt = $this->input->post("comment_txt");
        $product_id = $this->input->post("product_id");
        $rating = $this->input->post("rating");
        $dbapi = $this->load->module("db_api");
        $user_id = $this->get_UserId();
        $a_fields = array("user_id_fk" => $user_id,"rating"=>$rating ,"product_aid_fk" => $product_id, "text" => $review_txt);
        foreach ($a_fields as $key => $val) {
            $a_fields[$key] = $this->test_input($a_fields[$key]);
        }
        $ins_res = $dbapi->insert($a_fields, "oshop_product_reviews");
        $inserted_id=mysql_insert_id();
        $chrono_fields = array("recordid" => $inserted_id, "chrono_type" => "4", "userid" => $user_id);
        $this->$db_api->insert($chrono_fields, "chronoline_order");
        if($ins_res==1){
            $notification=$this->load->module("notification");
            $notification->all_notification("PRODUCT_REVIEW",$product_id,'','','');
        }
        echo $ins_res;
    }

    //Add items to Cart (Anil / 3 Feb 2016)
    function addItemsToCart() {
        $user_id = $this->get_UserId();
        $product_aid = $_POST["product_id"];
        $store_code = $_POST["store_code"];
        $scurr = $_POST["scurr"];
        $mode = ($this->input->post("mode") != "") ? $this->input->post("mode") : "cart";
        $db_api = $this->load->module("db_api");
        $storeQuery = "SELECT store_aid FROM oshop_stores WHERE store_code = '" . $store_code . "'";
        $storeRes = $db_api->custom($storeQuery);
        $store_aid = $storeRes[0]["store_aid"];
        if($mode=="cart"){
            $oshopCartQry = "SELECT count(*) as cnt FROM oshop_cart_items WHERE product_id_fk = '" . $product_aid . "' AND profile_id = '" . $user_id . "' AND store_id_fk = '" . $store_aid . "'";
            $cartRes = $db_api->custom($oshopCartQry);
            $cartCnt = $cartRes[0]["cnt"];
            $statusChk = "Product Already Added to card";
            if ($cartCnt == 0) {
                $insQry = "INSERT INTO oshop_cart_items (product_id_fk, profile_id, store_id_fk, added_on) VALUES " .
                        "('" . $product_aid . "', '" . $user_id . "', '" . $store_aid . "', now())";
                $db_api->custom($insQry);
                $statusChk = "ADDEDTOCART";
            }
            echo $statusChk;
        }
        else if($mode=="buy"){
            $cart_item=$db_api->custom("SELECT store_id_fk FROM oshop_cart_items WHERE profile_id = '".$user_id."' ORDER BY cart_aid DESC LIMIT 1");
            $cart_item_res=$cart_item[0]["store_id_fk"];

            // $cart_curr=$db_api->custom("SELECT currency FROM oshop_stores WHERE store_aid = '".$cart_item_res."'");
            // $curr_res=$cart_curr[0]["currency"];
            if($cart_item){
                    $cart_a_fields=array("store_id_fk"=>$store_aid,"product_id_fk"=>$product_aid,"profile_id"=>$user_id);
                    foreach ($cart_a_fields as $key => $val) {
                        $cart_a_fields[$key] = $this->test_input($cart_a_fields[$key]);
                    }
                    $cart_res=$db_api->insert($cart_a_fields,"oshop_cart_items");
                    $cart_inserted_id=  mysql_insert_id();
                    if($cart_res==1){
                        echo "INSERTED-".$cart_inserted_id;              
                    }   
            }
            else
            {
                $cart_a_fields=array("store_id_fk"=>$store_aid,"product_id_fk"=>$product_aid,"profile_id"=>$user_id);
                    foreach ($cart_a_fields as $key => $val) {
                        $cart_a_fields[$key] = $this->test_input($cart_a_fields[$key]);
                    }
                    $cart_res=$db_api->insert($cart_a_fields,"oshop_cart_items");
                    // if(){

                    // }
                    $cart_inserted_id=  mysql_insert_id();
                    if($cart_res==1){
                        echo "INSERTED-".$cart_inserted_id;              
                    }   
            }
                     
        }
    }
    function removeCartItem(){
        $user_id = $this->get_UserId();
        $product_aid = $_POST["product_id"];
        $store_code = $_POST["store_code"];
        $dbapi = $this->load->module("db_api");
        $result=$dbapi->delete("oshop_cart_items","product_id_fk=".$product_aid." AND profile_id=".$user_id);
        if($result==1){
            echo "DELETED";
        }
        //echo $result;
    }
    //Get Cart Count (Anil 3rd Feb 2016)
    function cartCount($store_code) {
        $user_id = $this->get_UserId();
        $db_api = $this->load->module("db_api");
        $storeQuery = "SELECT store_aid FROM oshop_stores WHERE store_code = '" . $store_code . "'";
        $storeRes = $db_api->custom($storeQuery);
        $store_aid = $storeRes[0]["store_aid"];
        $oshopCartQry = "SELECT count(*) as cnt FROM oshop_cart_items WHERE profile_id = '" . $user_id . "' AND store_id_fk = '" . $store_aid . "'";
        $cartRes = $db_api->custom($oshopCartQry);
        return $cartRes[0]["cnt"];
    }

    // function to display the product reviews by Pavani
    function product_review() {
        //$product_id=$_REQUEST["product_id"];
        $product_id = base64_decode(base64_decode($_REQUEST["product_id"]));
        $user_id = $this->get_UserId();
        $dbapi = $this->load->module("db_api");
        $user_details = $dbapi->select("img_path,username,first_name,last_name", "iws_profiles", "profile_id=" . $user_id);
        $prod_query = "SELECT created_by,store_code,store_name,store_aid,product_name,product_aid,primary_image,product_code ,total_views FROM oshop_stores stores INNER JOIN oshop_products prods ON prods.store_id_fk=stores.store_aid WHERE product_aid=" . $product_id;
        $product_details = $dbapi->custom($prod_query);
        $store_code = $product_details[0]["store_code"];
        //$order_details=$dbapi->select("order_code","oshop_orders","store_id_fk=".$product_details[0]["store_aid"]." AND ordered_by=".$this->get_UserId());
        $orders_query="SELECT order_code FROM oshop_orders orders INNER JOIN oshop_order_items items ON orders.order_aid=items.order_id_fk WHERE ordered_by=".$this->get_UserId()." AND product_id_fk=".$product_id;
        $order_details=$dbapi->custom($orders_query);
        //print_r($order_details);
        $is_store_owner=0;
        if($user_id==$product_details[0]["created_by"]){
          $is_store_owner=1;
        }
        //print_r($product_details);
        $store_obj = $this->load->module("stores");
        $data["store_details"] = $store_obj->getStoreDetailsByStoreCode($store_code);
        $data["user_details"] = $user_details;
        $data["store_code"] = $store_code;
        $data["productavg"] =$this->db_api->custom("SELECT avg(`rating`) as avgrating FROM `oshop_product_reviews` WHERE  `product_aid_fk` =".$product_id);
        $data["product_details"] = $product_details;
        $data["order_details"]=$order_details;
        $data["store_owner"]=$is_store_owner;
        $this->load->view("products/product_review", $data);
    }
    // template function to display the product reviews given by the user by Pavani
    function productReviewsTpl($product_id) {
        //$records=($this->input->post("counter")!="")?$this->input->post("counter"):0;
        $db_api = $this->load->module("db_api");
        $query = "SELECT rating,rating_on,text,username,img_path,first_name,middle_name,last_name FROM oshop_product_reviews opr INNER JOIN iws_profiles profiles ON opr.user_id_fk=profiles.profile_id WHERE product_aid_fk=" . $product_id . " ORDER BY rating_on DESC";
        $result = $db_api->custom($query);
        $data["review_details"] = $result;
        $data["product_id"] = $product_id;
        $this->load->view("products/product_reviews_tpl", $data);
    }
    function validateinput($val) {
        $trim_val = trim($val);
        $strip_val = strip_tags($val);
        return $strip_val;
    }
    // function to insert the star rating given by the user for the product by Pavani
    function insertProdRating(){
        $db_api=$this->load->module("db_api");
        $user_id=$this->get_UserId();
        $product_id=$this->input->post("product_id");
        $rating=$this->input->post("rate");
        $presult=$db_api->select("*","oshop_product_ratings","rating_by=".$user_id." and product_aid_fk=".$product_id);
        $ins_result="";
        if($presult!=0){
            $a_fields=array("score"=>$rating);
            foreach ($a_fields as $key => $val) {
                $a_fields[$key] = $this->test_input($a_fields[$key]);
            }
            $ins_result=$db_api->update($a_fields,"oshop_product_ratings","rating_by=".$user_id." and product_aid_fk=".$product_id);
        }else{
            $a_fields=array("score"=>$rating,"product_aid_fk"=>$product_id,"rating_by"=>$user_id);
            foreach ($a_fields as $key => $val) {
                $a_fields[$key] = $this->test_input($a_fields[$key]);
            }
            $ins_result=$db_api->insert($a_fields,"oshop_product_ratings");
            if($ins_result==1){
                $notifications=$this->load->module("notification");                
                $notifications->all_notification('PRODUCT_RATING',$product_id,'','','');
            }
        }
        echo $ins_result;
        //print_r($presult);
    }
    // function to get the list of prodcuts in find product on 12-02-2016
    function search_products_result(){
        $dbapi=$this->load->module("db_api");
        //$search_category=$this->input->post("search_by");
        $search_term=$this->input->post("search");
        //$products_result=0;
        //$stores_result=0;
        //echo "product_tags LIKE '%".$search_term."%'";
        //if($search_category=="find_products"){
            $search=  str_replace(" ", ",", $search_term);
            $search_query="SELECT prods.product_aid,prods.primary_image,prods.product_name,prods.product_code,stores.store_code,stores.store_name,stores.store_aid FROM oshop_products prods INNER JOIN oshop_stores stores ON prods.store_id_fk=stores.store_aid WHERE product_tags LIKE '%".$search."%'";
            $products_result=$dbapi->custom($search_query);  
        //}else{
            $search_query="SELECT store_aid,store_name,profile_image_path,store_code,services FROM oshop_stores WHERE services LIKE '%".$search_term."%'";
            $stores_result=$dbapi->custom($search_query);  
        //} 
        $data["stores_list"]=$stores_result;
        $data["products_list"]=$products_result;
        $data["category"]=$search_category;
        $this->load->view("products/search_products_result",$data);
    }
    function autoSuggest1(){
        $db_api=$this->load->module("db_api");
        //$search_keyword=$this->input->post("search_term");        
        //$product_tags=$this->input->post("product_tags");
        $search_keyword=$_GET["term"];
        //$search_keyword='mobile';
        $search_term=  str_replace(" ", ",", $search_keyword);
        $result=$db_api->select("product_tags","oshop_products","product_tags LIKE '%".$search_term."%'");
        $options_arry=[];
        $prev_prod_tag="";
        $current_prod="";
        foreach($result as $rows){
            //$current_prod=$rows["product_tags"];
            if($prev_prod_tag==""){
                $prev_prod_tag=$rows["product_tags"];
                $current_prod=$rows["product_tags"];
                $product_tag=  str_replace(",", " ", $current_prod);
                array_push($options_arry,$product_tag);
            }else{
                $current_prod=$rows["product_tags"];
                //var_dump(strpos($prev_prod_tag,$current_prod));
                if(strpos($prev_prod_tag,$current_prod)===false){ 
                    $prev_prod_tag=$rows["product_tags"]; 
                    $product_tag=  str_replace(",", " ", $current_prod);
                    array_push($options_arry,$product_tag);
                }
            }
            
        }
        //$result=$db_api->select("services","oshop_products","product_tags LIKE '%".$search_term."%'");
        $sresult=$db_api->custom("SELECT DISTINCT services FROM oshop_stores WHERE services LIKE '%".$search_term."%' AND services!='NONE'");
        if($sresult!=0){
            foreach($sresult as $rows){
                //$current_prod=$rows["product_tags"];
                if($prev_prod_tag==""){
                    $prev_prod_tag=$rows["services"];
                    $current_prod=$rows["services"];
                    $product_tag=  str_replace(",", " ", $current_prod);
                    array_push($options_arry,$product_tag);
                }else{
                    $current_prod=$rows["services"];
                    //var_dump(strpos($prev_prod_tag,$current_prod));
                    if(strpos($prev_prod_tag,$current_prod)===false){ 
                        $prev_prod_tag=$rows["services"]; 
                        $product_tag=  str_replace(",", " ", $current_prod);
                        array_push($options_arry,$product_tag);
                    }
                }            
            }
        }
        echo json_encode($options_arry);
    }
    function autoSuggest(){
        $db_api=$this->load->module("db_api");
        //$search_keyword=$this->input->post("search_term");        
        //$product_tags=$this->input->post("product_tags");
        $search_keyword=$_GET["term"];
        //$search_keyword='mobile';
        $search_term=  str_replace(" ", ",", $search_keyword);
        $result=$db_api->select("product_tags","oshop_products","product_tags LIKE '%".$search_term."%'");
        $options_arry=[];
        $prev_prod_tag="";
        $current_prod="";
        foreach($result as $rows){
            //$current_prod=$rows["product_tags"];
            if($prev_prod_tag==""){
                $prev_prod_tag=$rows["product_tags"];
                $current_prod=$rows["product_tags"];
                $product_tag=  str_replace(",", " ", $current_prod);
                array_push($options_arry,$product_tag);
            }else{
                $current_prod=$rows["product_tags"];
                //var_dump(strpos($prev_prod_tag,$current_prod));
                if(strpos($prev_prod_tag,$current_prod)===false){ 
                    $prev_prod_tag=$rows["product_tags"]; 
                    $product_tag=  str_replace(",", " ", $current_prod);
                    array_push($options_arry,$product_tag);
                }
            }
            
        }
        //$result=$db_api->select("services","oshop_products","product_tags LIKE '%".$search_term."%'");
        $sresult=$db_api->custom("SELECT DISTINCT services FROM oshop_stores WHERE services LIKE '%".$search_term."%' AND services!='NONE'");
        if($sresult!=0){
            foreach($sresult as $rows){
                //$current_prod=$rows["product_tags"];
                if($prev_prod_tag==""){
                    $prev_prod_tag=$rows["services"];
                    $current_prod=$rows["services"];
                    $product_tag=  str_replace(",", " ", $current_prod);
                    array_push($options_arry,$product_tag);
                }else{
                    $current_prod=$rows["services"];
                    //var_dump(strpos($prev_prod_tag,$current_prod));
                    if(strpos($prev_prod_tag,$current_prod)===false){ 
                        $prev_prod_tag=$rows["services"]; 
                        $product_tag=  str_replace(",", " ", $current_prod);
                        array_push($options_arry,$product_tag);
                    }
                }            
            }
        }
        echo json_encode($options_arry);
    }
    function delSavedItem(){
        $dbapi=$this->load->module("db_api");
        $product_id=($this->input->post("product_aid")!="")?$this->input->post("product_aid"):"";
        $mode=($this->input->post("mode")!="")?$this->input->post("mode"):"";
        $userid=$this->get_UserId();
        $s_where="product_id_fk=".$product_id." AND profile_id=".$userid;
        if($mode=="BULK"){
            $s_where="profile_id=".$userid." AND product_id_fk IN (".$product_id.")";
        }
        $del_result=$dbapi->delete("oshop_saved_products",$s_where);
        if($del_result==1){
            echo $product_id;
        }else{
            echo "ERROR";
        }
    }
    // function to display the products of the store in the store home page by Pavani
    function getStoreProducts1($store_code){
        $user_id=$this->get_UserId();
        $start = 0;
        $dbobj = $this->load->module("db_api");
        $records_per_page = 8; // records to show per page    
        $page = $this->input->post("p"); 
        $search_keyword=$_REQUEST["search_val"];
        if ($page != "") {
            //$current_page           =   $page - 1;      
            $start = $page * $records_per_page;
        }
        $s_query = "SELECT ost.store_code,prods.product_code,prods.product_name,prods.product_aid,prods.cost_price as price,prods.sale_price,prods.primary_image,prods.secondary_image,prods.tertiary_image,prods.quaternary_image,prods.store_id_fk as store_id,(SELECT COUNT(*) FROM oshop_cart_items WHERE product_id_fk=prods.product_aid AND profile_id=".$user_id.") AS cart_cnt FROM oshop_products prods INNER JOIN oshop_stores ost ON prods.store_id_fk = ost.store_aid WHERE ost.store_code='".$store_code."'";
        if($search_keyword!=""){
            $s_query.=" AND prods.product_name LIKE '%".$search_keyword."%' LIMIT 8";
        }else{
            $s_query.=" LIMIT 8";
        }
        //echo $s_query;
        $os_products_res = $dbobj->custom($s_query);        
        //$data["products_count"] = $stores_cnt;
        $data["products_data"] = $os_products_res;
        $data["mode"] = "store";
        $this->load->view('products/store_products', $data);
    }
   
function getStoreProducts($store_code){
        $user_id=$this->get_UserId();
        $dbobj = $this->load->module("db_api");
        $start=0;
        $records_per_page = 9; // records to show per page
        $page = $this->input->post("p");
        $search_keyword=isset($_REQUEST["search_val"])?$_REQUEST["search_val"]:'';
        if ($page != "") {
            $start = $page * $records_per_page;
        }
        $s_query = "SELECT ost.store_code,prods.product_code,prods.product_name,prods.product_aid,prods.cost_price as price,prods.sale_price,prods.primary_image,prods.secondary_image,prods.tertiary_image,prods.quaternary_image,prods.store_id_fk as store_id,(SELECT COUNT(*) FROM oshop_cart_items WHERE product_id_fk=prods.product_aid AND profile_id=".$user_id.") AS cart_cnt FROM oshop_products prods INNER JOIN oshop_stores ost ON prods.store_id_fk = ost.store_aid WHERE ost.store_code='".$store_code."'";
        if($search_keyword!=""){
            $s_query.=" AND prods.product_name LIKE '%".$search_keyword."%' LIMIT $start,".$records_per_page;
        }else{
            $s_query.=" LIMIT $start,".$records_per_page;
        }
        //echo $s_query;
        $os_products_res = $dbobj->custom($s_query);
        //$data["products_count"] = $stores_cnt;
        $data["products_data"] = $os_products_res;
        $data["mode"] = "store";
        $this->load->view('products/store_products', $data);
    }
    function getStoreProductsCnt($store_code){
      $dbobj = $this->load->module("db_api");
      $s_query = "SELECT COUNT(*) AS store_prods_cnt FROM oshop_products prods ".
                  "INNER JOIN oshop_stores ost ON prods.store_id_fk = ost.store_aid WHERE ost.store_code='".$store_code."'";
      //echo $s_query;
      $os_products_res = $dbobj->custom($s_query);
      return $os_products_res[0]["store_prods_cnt"];
    }
    // function to strip tags
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        $data = str_replace("'","&#39",$data);
        return $data;
    }
}
