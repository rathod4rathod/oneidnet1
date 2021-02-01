<?php
if (!defined('BASEPATH'))    exit('No direct script access allowed');

class Templates extends CI_Controller {

    function get_UserId() {
        $cookies_obj = $this->load->module("cookies");
        $user_id = $cookies_obj->getUserID();
        return $user_id;
    }

    function get_store_ownerId($store_code = "") {
        $dbapi = $this->load->module("db_api");
        $store_owner_id = "";
        //$rlt=$dbapi->custom("select created_by from oshop_stores where created_by=".$this->get_UserId());
        if ($store_code == "") {
            $rlt = $dbapi->custom("select store_code,store_name from oshop_stores where created_by=" . $this->get_UserId());
        } else {
            $rlt = $dbapi->custom("select store_code,store_name from oshop_stores where store_code='" . $store_code . "'");
        }
        if ($rlt != 0) {
            foreach ($rlt as $stores_list) {
                if ($store_owner_id == "") {
                    $store_owner_id.=$stores_list["store_name"] . ":" . $stores_list["store_code"];
                } else {
                    $store_owner_id.="~" . $stores_list["store_name"] . ":" . $stores_list["store_code"];
                }
            }
        }
        return $store_owner_id;
    }

    function app_header() {
        $db_obj = $this->load->module('db_api');
        $uid = $this->get_UserId();
        $data["userid"] = $uid;
        $ntf_count = $db_obj->custom("select count(rec_aid) as notification_count from oshop_notifications where to_userid=" . $uid . " and status='0'");
        $user_profile_pic = $db_obj->custom("select profile_img from os_user_details where profile_id_fk=" . $uid);
        $data["profile_img"] = $user_profile_pic[0]["profile_img"];
        $data["notification_count"] = $ntf_count[0]["notification_count"];
        // echo "load os_mainheader";
        $this->load->view('templates/os_mainheader', $data);
    }

    function os_mainmenu($selected_menu = "") {
        $user_id = $this->get_UserId();
        $store_cod = $this->uri->segment(2);
        $role = "END_USER";
        $db_api = $this->load->module("db_api");
        if (strpos($store_cod, "ST") !== false) {
            $store_code = $store_cod;
        }
        $store_query = "SELECT role,store_aid,store_code,store_name,created_by FROM oshop_stores stores INNER JOIN oshop_staff staff ON stores.store_aid=staff.store_id_fk WHERE user_id_fk=" . $user_id;
        $store_details = $db_api->custom($store_query);
        //$manager_details=$store_details[0];
        if ($store_details[0]["role"] != "") {
            $role = $store_details[0]["role"];
        }

        $data["store_dtls"] = $store_details;
        $data["role"] = $role;
        $data["selected_menu"] = $selected_menu;
        $this->load->view('templates/os_mainmenu', $data);
    }

    // Anil modifed on (FEb 6th)
    function os_oneshopheader($store_menu = "home", $store_id = '') {
        $user_id = $this->get_UserId();
        $store_cod = $this->uri->segment(2);
        $role = "END_USER";
        if (strpos($store_cod, "ST") !== false) {
            $store_code = $store_cod;
        } else {
            $store_code = $store_id;
        }
        $manager_details = $this->store_role_user($store_code);
        if ($manager_details["role"] != "") {
            $role = $manager_details["role"];
        }
        $data["active_menu"] = $store_menu;
        $data["role"] = $role;
        $this->load->view('templates/os_oneshopheader', $data);
    }

    function os_oneshopheader1($store_menu = "home") {
        $user_id = $this->get_UserId();
        $store_cod = $this->uri->segment(2);
        if (strpos($store_cod, "ST") !== false) {
            $store_code = $store_cod;
        }
        $manager_details = $this->store_role_user($store_code);
        $order_manager = "no";
        $product_manager = "no";
        $store_owner = "no";
        $admin_owner = "no";
        $super_user = "no";
        $manager_details["role"] = strtoupper($manager_details["role"]);
        if ($manager_details["role"] != "" && $manager_details["role"] == "ORDER_MANAGER") {
            $order_manager = "yes";
            $data["store_owner_id"] = $this->get_store_ownerId($store_code);
        } else if ($manager_details["role"] != "" && $manager_details["role"] == "PRODUCT_MANAGER") {
            $product_manager = "yes";
            $data["store_owner_id"] = $this->get_store_ownerId($store_code);
        } else if ($manager_details["role"] != "" && $manager_details["role"] == "ADMIN") {
            $admin_owner = "yes";
            $store_owner = "yes";
            $data["store_owner_id"] = $this->get_store_ownerId($store_code);
        } else if ($manager_details["role"] != "" && $manager_details["role"] == "SUPER") {
            $super_user = "yes";
            $data["store_owner_id"] = $this->get_store_ownerId($store_code);
        } else {
            $store_owner_details = $this->get_store_ownerId();
            if ($store_owner_details != "") {
                $store_owner = "yes";
                $data["store_owner_id"] = $store_owner_details;
            } else {
                $store_owner = "no";
                $data["store_owner_id"] = "";
            }
        }
        $data["order_manager"] = $order_manager;
        $data["product_manager"] = $product_manager;
        $data["store_owner"] = $store_owner;
        $data["admin_owner"] = $admin_owner;
        $data["super_user"] = $super_user;
        $data["selected_menu"] = $store_menu;

        $this->load->view('templates/os_oneshopheader', $data);
    }

    //User role check (Anil 2nd Feb 2016)
    /* function onshop_user_check_role(){
      $user_id=$this->get_UserId();
      $store_cod=$this->uri->segment(2);
      if(strpos($store_cod,"ST")!==false){
      $store_code=$store_cod;
      }
      $manager_details=$this->store_role_user($store_code);
      $order_manager="no";
      $product_manager="no";
      $store_owner="no";
      $admin_owner="no";
      $manager_details["role"] = strtoupper($manager_details["role"]);
      if($manager_details["role"]!="" && $manager_details["role"]=="ORDER_MANAGER"){
      $order_manager="yes";
      $data["store_owner_id"] = $this->get_store_ownerId($store_code);
      }
      else if($manager_details["role"]!="" && $manager_details["role"]=="PRODUCT_MANAGER"){
      $product_manager="yes";
      //$store_code=$manager_details["store_code"];
      $data["store_owner_id"] = $this->get_store_ownerId($store_code);
      }
      else if($manager_details["role"]!="" && $manager_details["role"]=="ADMIN"){
      $admin_owner="yes";
      $data["store_owner_id"] = $this->get_store_ownerId($store_code);
      }
      else{
      $store_owner_details=$this->get_store_ownerId();
      if($store_owner_details!=""){
      $store_owner="yes";
      $data["store_owner_id"] = $store_owner_details;
      }else{
      $store_owner="no";
      $data["store_owner_id"] = "";
      }
      }
      $data["order_manager"]=$order_manager;
      $data["product_manager"]=$product_manager;
      $data["store_owner"]=$store_owner;
      $data["admin_owner"]=$admin_owner;

      return $data;
      }
     */
    function app_footer() {
        $this->load->view('templates/os_footer');
    }

    function os_Store_Header() {
        $data["store_id"] = $this->store_id_return();
        $store_aid = $this->store_aid_return();
        $db_obj = $this->load->module('db_api');
        $ntf_count = $db_obj->custom("select count(rec_aid) as notification_count from os_notification where store_id=" . $store_aid . " and read_or_not='0'");
        $data["notification_count"] = $ntf_count[0]["notification_count"];
        $data["str_dtl"] = $db_obj->select("store_id,name as store_name,logo_path as store_logo", "os_all_store", "created_by=" . $this->get_store_ownerId());
        $this->load->view('templates/os_store_header', $data);
    }

    function mystore_Menu() {

        $store_uid = $this->store_uid_return();

        $manager_details = $this->store_manager_return($store_uid);
        $data["order_manager"] = $manager_details[0]["order_manager_emails"];
        $data["store_manager"] = $manager_details[0]["store_manager_emails"];
        $data["store_owner_id"] = $this->get_store_ownerId();

        $this->load->view('templates/mystore_menu', $data);
    }

    function store_manager_return($user_id) {
        $db_obj = $this->load->module("db_api");
        $query = "SELECT user_id_fk,store_name,store_aid,role,store_code FROM oshop_stores ostore INNER JOIN oshop_staff ostaff ON ostore.store_aid=ostaff.store_id_fk WHERE user_id_fk=" . $user_id;
        $staff_res = $db_obj->custom($query);
        return $staff_res[0];
    }

    function my_store_all($user_id) {
        $db_obj = $this->load->module("db_api");
        echo $storeQuery = "SELECT user_id_fk,store_name,store_aid,role,store_code FROM oshop_stores ostore INNER JOIN oshop_staff ostaff ON ostore.store_aid=ostaff.store_id_fk WHERE user_id_fk=" . $user_id;
        $myStoreRes = $db_obj->custom($storeQuery);
        return $myStoreRes;
    }

    //Add by Anil
    function store_role_user($store_code) {
        $db_obj = $this->load->module("db_api");
        $user_id = $this->get_UserId();
        $query = "SELECT user_id_fk,store_name,store_aid,role,store_code FROM oshop_stores ostore INNER JOIN oshop_staff ostaff ON ostore.store_aid=ostaff.store_id_fk WHERE ostore.store_code='" . $store_code . "' AND user_id_fk=" . $user_id;
        $staff_res = $db_obj->custom($query);
        return $staff_res[0];
    }

    //28-05-2015 by venkatesh : this function return store auto increment id based on current user id
    function store_aid_return() {
        $db_obj = $this->load->module("db_api");
        $myfields = "store_aid";
        $where = "created_by=" . $this->get_store_ownerId();
        $mytable = "os_all_store";
        $result = $db_obj->select($myfields, $mytable, $where);
        return $result[0]["store_aid"];
    }

    function getFollowList($store_code) {
        $user_id = $this->get_UserId();
        $dbapi = $this->load->module("db_api");
        $store_obj = $this->load->module("stores");
        $stores_result = $store_obj->getStoreDetailsByStoreCode($store_code);
        $store_aid = $stores_result[0]["store_aid"];
        $follow_query = "select(select count(*) from oshop_followings where store_id_fk=" . $store_aid . "  ) as follow_cnt,count(*) as cnt FROM `oshop_followings` WHERE user_id_fk=" . $user_id . " and store_id_fk=" . $store_aid;
        $follow_result = $dbapi->custom($follow_query);
        return $follow_result;
    }

    function insertFollow() {
        $user_id = $this->get_UserId();
        $dbapi = $this->load->module("db_api");
        $store_code = $this->input->post("store_code");
        $store_obj = $this->load->module("stores");
        $stores_result = $store_obj->getStoreDetailsByStoreCode($store_code);
        $store_aid = $stores_result[0]["store_aid"];
        $a_fields = array("user_id_fk" => $user_id, "store_id_fk" => $store_aid);
        $chrono_fields = array("storeid" => $store_aid, "chrono_type"=>"2", "userid" => $user_id);
        $homeObj = $this->load->module("home");
        foreach ($chrono_fields as $key => $val) {
            $chrono_fields[$key] = $homeObj->test_input($chrono_fields[$key]);
        }
        //$homeObj->test_input();
        $chrono_insert = $dbapi->insert($chrono_fields,"chronoline_order");
        foreach ($a_fields as $key => $val) {
            $a_fields[$key] = $homeObj->test_input($a_fields[$key]);
        }
        echo $result = $dbapi->insert($a_fields, "oshop_followings");
    }

    function insertUnfollow() {
        $user_id = $this->get_UserId();
        $dbapi = $this->load->module("db_api");
        $store_code = $this->input->post("store_code");
        $store_obj = $this->load->module("stores");
        $stores_result = $store_obj->getStoreDetailsByStoreCode($store_code);
        $store_aid = $stores_result[0]["store_aid"];
        $dbapi->delete("chronoline_order", "userid=" . $user_id . " AND storeid=" . $store_aid);
        echo $result = $dbapi->delete("oshop_followings", "user_id_fk=" . $user_id . " AND store_id_fk=" . $store_aid);
    }

    function privacyPage() {
        $this->load->view("templates/privacy_view");
    }
	function servicePage() {
        $this->load->view("templates/services");
    }

    function helpPage() {
        $this->load->view("templates/help_view");
    }

    function quicklink() {
        $this->load->view("templates/quilck_link");
    }

    function linkstore() {
        $this->load->view("templates/link_store");
    }

    function storepolicy() {
        $this->load->view("templates/store_policy");
    }

    function storeresponce() {
        $this->load->view("templates/store_responce");
    }

    function customeright() {
        $this->load->view("templates/customer_right");
    }

    function ontop() {
        $this->load->view("templates/on_top");
    }

    function trending() {
        $this->load->view("templates/trending_products");
    }

    function compareprices() {
        $this->load->view("templates/compare_prices");
    }

    function price() {
        $this->load->view("templates/price_reduction");
    }

    function deals() {
        $this->load->view("templates/best_deals");
    }

    function malls() {
        $this->load->view("templates/create_malls");
    }
    //december 06 2016 by venkatesh
function oneshopNotificationCount(){
    $db_obj=$this->load->module("db_api");
    	$notifications_result = $db_obj->custom("select COUNT(*) AS cnt from oshop_notifications where to_userid=" . $this->get_UserId() . " AND status='0'");
        echo  $notifications_result[0]["cnt"];
}
}
