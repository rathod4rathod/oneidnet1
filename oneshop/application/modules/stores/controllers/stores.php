<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class stores extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->module('home');
        $this->load->module('imageresize');

        $this->load->library('upload');
        /* session and cookies check */
      if ($_REQUEST) {
            $sobj = $this->load->module("session_restart");
            if (isset($_REQUEST["skey"])) {
                $sobj->key_check($_REQUEST["skey"]);
            }
        }
        /* session and cookies check */
    }

    function update_profile_pic() {
//    print_R($_REQUEST);//    print_R($_FILES);
        $uploaddir = "data/profile/orig/";
        $product_image = basename($_FILES['profile_pic_update']['name']);
        //list($txt, $ext) = explode(".", $product_image);
        $ext = end(explode(".", $product_image));
        $uid = $this->get_UserId();
        $user_profilepic_name = $uid . $product_image . "." . $ext;
        if ($_REQUEST["current_profilepic"] != "avatar.png") {
            unlink("data/profile/li/" . $_REQUEST["current_profilepic"]);
            unlink("data/profile/mi/" . $_REQUEST["current_profilepic"]);
            unlink("data/profile/si/" . $_REQUEST["current_profilepic"]);
        }
        shell_exec('chmod -R 777 /data/');
        if (move_uploaded_file($_FILES['profile_pic_update']['tmp_name'], $uploaddir . $user_profilepic_name)) {
            shell_exec('chmod -R 777 ' . $uploaddir . $user_profilepic_name);
            $this->imageresize->resize($uploaddir . $user_profilepic_name, "data/profile/li/" . $user_profilepic_name, 300, 300);
            $this->imageresize->resize($uploaddir . $user_profilepic_name, "data/profile/mi/" . $user_profilepic_name, 150, 150);
            $this->imageresize->resize($uploaddir . $user_profilepic_name, "data/profile/si/" . $user_profilepic_name, 50, 50);
            unlink($uploaddir . $user_profilepic_name);
        }
        $db_obj = $this->load->module("db_api");
        $db_obj->custom("update os_user_details set profile_img= '" . $user_profilepic_name . "' where profile_id_fk=" . $this->get_UserId());
        echo $user_profilepic_name;
    }

    //june 16 by venkatesh 
    function cropimg() {
        $userid = $this->get_UserId();
        if ($_REQUEST['x']) {
            $targ_w = $targ_h = 150;
            $jpeg_quality = 90;
            $ini_filename = 'temp/' . $_REQUEST["temp_name"];
            if (end(explode(".", $_REQUEST['temp_name'])) == "jpg") {
                $im = imagecreatefromjpeg($ini_filename);
            } else {
                $im = imagecreatefrompng($ini_filename);
            }
            // echo $im;
            $ini_x_size = getimagesize($ini_filename)[0];
            $ini_y_size = getimagesize($ini_filename)[1];
            $crop_measure = min($ini_x_size, $ini_y_size);
            if (isset($_REQUEST["acpt_ratio"])) {
                $_REQUEST['x'] = $_REQUEST['x'] * $_REQUEST['acpt_ratio'];
                $_REQUEST['y'] = $_REQUEST['y'] * $_REQUEST['acpt_ratio'];
                $_REQUEST['w'] = $_REQUEST['w'] * $_REQUEST['acpt_ratio'];
                $_REQUEST['h'] = $_REQUEST['h'] * $_REQUEST['acpt_ratio'];
            }
            $to_crop_array = array('x' => $_REQUEST['x'], 'y' => $_REQUEST['y'], 'width' => $_REQUEST['w'], 'height' => $_REQUEST['h']);
            $thumb_im = imagecrop($im, $to_crop_array);
            if (end(explode(".", $_REQUEST['temp_name'])) == "jpg") {

                imagejpeg($thumb_im, "data/profile/orig/" . $_REQUEST['temp_name'], 100);
            } else {
                imagepng($thumb_im, "data/profile/orig/" . $_REQUEST['temp_name']);
            }
            $orig_path = "data/profile/orig/" . $_REQUEST['temp_name'];
            $result = $this->convertfile->convertImage("data/profile/orig/" . $_REQUEST['temp_name'], $orig_path, 100);

            if ($result) {
                $this->imageresize->resize($orig_path, "data/profile/li/" . $_REQUEST['temp_name'], 600, 600);
                $this->imageresize->resize($orig_path, "data/profile/mi/" . $_REQUEST['temp_name'], 400, 400);
                $this->imageresize->resize($orig_path, "data/profile/si/" . $_REQUEST['temp_name'], 150, 150);
                unlink($orig_path);
                $this->unlinkprofilepic($userid, $_REQUEST['temp_name']);
            } else {
                echo "false";
            }
        } else {
            $pimage_path = "data/profile/orig/" . $_REQUEST['temp_name'];
            $result = $this->convertfile->convertImage("temp/" . $_REQUEST['temp_name'], $pimage_path, 150);
            if ($result) {
                $this->imageresize->resize($pimage_path, "data/profile/li/" . $_REQUEST['temp_name'], 600, 400);
                $this->imageresize->resize($pimage_path, "data/profile/mi/" . $_REQUEST['temp_name'], 180, 150);
                $this->imageresize->resize($pimage_path, "data/profile/si/" . $_REQUEST['temp_name'], 45, 45);
                $this->unlinkprofilepic($userid, $_REQUEST['temp_name']);
            } else {
                echo "false";
            }
        }
    }

    function unlinkprofilepic($userid, $temp_name) {
        $db_obj = $this->load->module("db_api");
        $rlt = $db_obj->custom("SELECT profile_img FROM `os_user_details` WHERE `profile_id_fk`=" . $userid);
        if ($rlt[0]["profile_img"]) {
            unlink($_SERVER['DOCUMENT_ROOT'] . "data/profile/li/" . $rlt[0]["profile_img"]);
            unlink($_SERVER['DOCUMENT_ROOT'] . "data/profile/mi/" . $rlt[0]["profile_img"]);
            unlink($_SERVER['DOCUMENT_ROOT'] . "data/profile/si/" . $rlt[0]["profile_img"]);
            unlink($_SERVER['DOCUMENT_ROOT'] . "/oneshop/temp/" . $temp_name);
        }
        
        $db_obj->custom("update os_user_details set profile_img= '" . $temp_name . "' where profile_id_fk=" . $userid);
        echo base_url() . "data/profile/mi/" . $temp_name;
    }

    function update_cover_pic() {
        $uploaddir = "data/cover/orig/";
        $product_image = basename($_FILES['profile_banner']['name']);
        //list($txt, $ext) = explode(".", $product_image);
        $ext = end(explode(".", $product_image));
        $uid = $this->get_UserId();
        $user_profilepic_name = $uid . rand(00, 99) . "." . $ext;
        if ($_REQUEST["current_banner"] != "banner.jpg") {
            unlink("data/cover/li/" . $_REQUEST["current_banner"]);
            unlink("data/cover/mi/" . $_REQUEST["current_banner"]);
            unlink("data/cover/si/" . $_REQUEST["current_banner"]);
        }
        shell_exec('chmod -R 777 /data/');
        if (move_uploaded_file($_FILES['profile_banner']['tmp_name'], $uploaddir . $user_profilepic_name)) {
            shell_exec('chmod -R 777 ' . $uploaddir . $user_profilepic_name);
            $this->imageresize->resize($uploaddir . $user_profilepic_name, "data/cover/li/" . $user_profilepic_name, 900, 300);
            $this->imageresize->resize($uploaddir . $user_profilepic_name, "data/cover/mi/" . $user_profilepic_name, 600, 200);
            $this->imageresize->resize($uploaddir . $user_profilepic_name, "data/cover/si/" . $user_profilepic_name, 300, 100);
            unlink($uploaddir . $user_profilepic_name);
        }
        $db_obj = $this->load->module("db_api");
        $db_obj->custom("update os_user_details set profile_cover_img= '" . $user_profilepic_name . "' where profile_id_fk=" . $this->get_UserId());
        echo $user_profilepic_name;
    }

    function get_UserId() {
        $cookies_obj = $this->load->module("cookies");
        $user_id = $cookies_obj->getUserID();
        return $user_id;
        //return  $_SESSION['user_id'];
    }

    function create_store_form($type = "") {
        $db_obj = $this->load->module("db_api");
        $list = $this->countriesList();
        $categorylist = $this->categoryList();
        $data["country_info"] = $list;
        $data["category_list"] = $categorylist;
        $pckgList = $this->packageList();
        $data["package_list"] = $pckgList;
        $data["timezone_list"] = $this->timeZoneList();
        $data["currency_list"] = $this->currencyList();
        $data["selected_package_type"] = $type;
        $package_result = $db_obj->custom("select * from oshop_packages where  package_id = $type");
        if ($package_result != 0) {
            $this->load->view('stores/create_store_form', $data);
        } else {
            $CI = &get_instance();
            $CI->load->view("show_error");
        }
    }

    function countriesList() {
        $countries_str = "";
        $dbapi = $this->load->module("db_api");
        $result = $dbapi->select("country_id,country_name", "iws_countries_info");
        return $result;
    }

    function categoryList() {
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
        // $categories_str = "";
        // $dbapi = $this->load->module("db_api");
        // $result = $dbapi->custom("select * from oshop_categories Group By groups");
        // return $result;
    }

    //Get all timezones
    function timeZoneList() {
        $timeZoneArr = array();
        $dbapi = $this->load->module("db_api");
        $tzResult = $dbapi->select("rec_aid,timezone_name", "iws_timezones", "");
        foreach ($tzResult as $tzList) {
            $timeZoneArr[$tzList["timezone_name"]] = $tzList["timezone_name"];
        }
        return $timeZoneArr;
    }

    //Get all Currenciess
    function currencyList() {
        $currencyArr = array();
        $dbapi = $this->load->module("db_api");
        $curResult = $dbapi->select("rec_aid,sc,name", "iws_currencies", "");
        foreach ($curResult as $curList) {
            $currencyArr[$curList["sc"]] = $curList["sc"] . " (" . $curList["name"] . ")";
        }
        return $currencyArr;
    }

    //Get All Store Services used @ Edit Store
    function getStoreUsedServices() {
        //Service Array
        $servicesArr = array();
        $dbapi = $this->load->module("db_api");
        $setColumnQry = "SHOW COLUMNS FROM oshop_stores LIKE 'services'";
        $service_res = $dbapi->custom($setColumnQry);
        $setTypeData = $service_res[0]['Type'];
        $savedSetServices = substr($setTypeData, 5, strlen($setTypeData) - 7); // Remove "set(" at start and ");" at end
        $servicesSetArr = preg_split("/','/", $savedSetServices);
        foreach ($servicesSetArr as $serviceVal) {
            if ($serviceVal == "NONE")
                continue;

            if ($serviceVal == "IT PROJECTS")
                $servicesArr[$serviceVal] = "IT Projects";
            else
                $servicesArr[$serviceVal] = ucwords(strtolower($serviceVal));
        }

        return $servicesArr;
    }

    //Edit Store Form
    function edit_store_form() {
        $list = $this->countriesList();
        $data["time_zone_list"]=$this->timeZoneList();
        $data["currency_list"] = $this->currencyList();
        $data["country_info"] = $list;
        $pckgList = $this->packageList();
        $data["package_list"] = $pckgList;
        $data["store_all_services"] = $this->getStoreUsedServices();
        $this->load->view('stores/edit_store_form', $data);
    }

    //Store Staff //modified by venkatesh
    function store_staff_settings($store_code) {
        $data["store_details"] = $this->getStoreDetailsByStoreCode($store_code);
        if($data["store_details"]!=0){
            $this->load->view('stores/store_staff_settings', $data);
        }else{
            redirect(base_url());
        }
        
    }

    function get_staff_record(){
        $dbapi = $this->load->module("db_api");
        $staff_id= $_REQUEST["id"];
        $getrecord = "SELECT *,iws.email FROM oshop_staff as os INNER JOIN iws_profiles as iws ON os.user_id_fk = iws.profile_id Where rec_aid = '". $staff_id ."'";
        $get_res = $dbapi->custom($getrecord);
        list($a, $b) = explode(' Year And ', $get_res[0]["w_since"]);
        $data = array(
            "rec_aid" => $get_res[0]["rec_aid"],
            "user_id_fk" => $get_res[0]["user_id_fk"],
            "f_name" => $get_res[0]["f_name"],
            "l_name" => $get_res[0]["l_name"],
            "role" => $get_res[0]["role"],
            "email" => $get_res[0]["email"],
            "sloc" => $get_res[0]["s_loc"],
            "sbio" => $get_res[0]["bio"],
            "syear" => $a,
            "smonth" => $b,
        );
        // echo var_dump(json_encode($data));
         echo json_encode($data);
    }

    //Delete Staff User
    function valid_staff_remove() {
        $dbapi = $this->load->module("db_api");
        $staff_id= $_REQUEST["id"];
        $deleteStaffQry = "DELETE FROM oshop_staff WHERE rec_aid = '" . $staff_id . "'";
        $del_res = $dbapi->custom($deleteStaffQry);
        if($del_res==0){
            echo  "DELETED";
        }
    }

    function sale_remove() {
        $dbapi = $this->load->module("db_api");
        $staff_id= $_REQUEST["id"];
        $deleteStaffQry = "DELETE FROM oshop_sales WHERE rec_aid = '" . $staff_id . "'";
        $del_res = $dbapi->custom($deleteStaffQry);
        if($del_res==0){
            echo  "DELETED";
        }
    }

    //Staff Admin Role Check(Anil added on 18th FEb 2016)
    function staffRoleCheck($userID, $store_code, $role_check) {
        $dbapi = $this->load->module("db_api");
        $storeQry = "SELECT store_aid FROM oshop_stores WHERE store_code = '" . $store_code . "'";
        $store_res = $dbapi->custom($storeQry);
        $store_aid = $store_res[0]["store_aid"];

        //Stores staff check by role wise
        $staffQry = "SELECT count(*) as cnt FROM oshop_staff where user_id_fk = '" . $userID . "' AND store_id_fk='" . $store_aid . "' AND role = '" . $role_check . "'";
        $staff_res = $dbapi->custom($staffQry);
        $staff_cnt = $staff_res[0]["cnt"];
        return $staff_cnt;
    }

    //STore Valid check 
    function valid_staff_checking() {
        $dbapi = $this->load->module("db_api");
        $resultArr = array();
        if ($_REQUEST["order_emails"] != "") {
            $profile_save_id = "";
            if (isset($_REQUEST["profile_save_id"]) && $_REQUEST["profile_save_id"] != "") {
                $profile_save_id = $_REQUEST["profile_save_id"];
            }

            $store_code = $_REQUEST["store_code"];
            $exp_emails = explode(",", $_REQUEST["order_emails"]);
            foreach ($exp_emails as $staff_email) {
                $storeQry = "SELECT store_aid FROM oshop_stores WHERE store_code = '" . $store_code . "'";
                $store_res = $dbapi->custom($storeQry);
                $store_aid = $store_res[0]["store_aid"];
                $statusStaff = "VALID";

                $profQry = "SELECT profile_id FROM iws_profiles WHERE email = '" . $staff_email . "'";
                $prof_res = $dbapi->custom($profQry);
                $profile_id = $prof_res[0]['profile_id'];
                if ($profile_id != "") {
                    $staffQry = "SELECT rec_aid FROM oshop_staff WHERE user_id_fk = '" . $profile_id . "' AND store_id_fk = '" . $store_aid . "'";
                    $staff_res = $dbapi->custom($staffQry);
                    if ($staff_res[0]["rec_aid"] != "") {
                        if ($profile_save_id == $profile_id){
                            $statusStaff = "VALID_UPDATE";
                            $resultArr[$staff_email] = $statusStaff;
                        }
                        else{
                            $statusStaff = "EXISTING_STAFF_USER";
                            $resultArr[$staff_email] = $statusStaff;
                        }
                    }else {
                        $statusStaff = "VALID";
                        $resultArr[$staff_email] = $statusStaff;
                    }
                } else {

                    $statusStaff = "INVALID_USER";
                    $resultArr[$staff_email] = $statusStaff;
                }
            }
        }

        // if ($profile_save_id != "")
        //     echo $statusStaff;
        // else
            echo json_encode($resultArr);
    }

    //Valid manager 
    function valid_order_manager() {
        print_r($_POST);
        exit;
        $dbapi = $this->load->module("db_api");
        $store_name = $_REQUEST["store_name"];
        $setColumnQry = "SELECT * FROM iws_profiles WHERE ";
        $service_res = $dbapi->custom($setColumnQry);
        $setTypeData = $service_res[0]['Type'];
    }

    function services_store() {
        $data["recent_products"] = $this->getRecentAddedProducts();
        $this->load->view('stores/services_data_store', $data);
    }

    function store_staff_detail() {
        $this->load->view('stores/store_staff_detail');
    }



    function sstaff_detail($store_code) {
        $this->load->module("db_api");
        $search = isset($_REQUEST["search_val"])?$_REQUEST["search_val"]:'';
        $store_query = "SELECT * FROM oshop_stores WHERE store_code = '" . $store_code . "'";
        $store_res = $this->db_api->custom($store_query);
        $store_id = $store_res[0]["store_aid"];
        $sstaff_query = "SELECT * FROM oshop_staff WHERE f_name LIKE '%".$search."%' OR l_name LIKE '%".$search."%' AND store_id_fk = '" . $store_id . "'";
        $sstaff_res = $this->db_api->custom($sstaff_query);
        $data['ss_details'] = $sstaff_res;
        // echo var_dump($data);
        // $data['store_ptype'] = "privacy_policy";
        $this->load->view("stores/store_staff_detail1", $data);
    }

    function aboutus_store() {
        $data["recent_products"] = $this->getRecentAddedProducts();
        $this->load->view('stores/aboutus_data_store', $data);
    }

    function agreement_store() {
        $this->load->view('stores/agreement_data_store');
    }

    //Function for Get all Package List 
    function packageList() {
        $pckg_str = "";
        $dbapi = $this->load->module("db_api");
        $result = $dbapi->select("package_id, name", "oshop_packages", "");
        foreach ($result as $list) {
            if ($pckg_str == "") {
                $pckg_str.=$list["package_id"] . "-" . $list["name"];
            } else {
                $pckg_str.="," . $list["package_id"] . "-" . $list["name"];
            }
        }
        return $pckg_str;
    }

    function new_store_package() {
        $this->load->view('stores/new_store_agree');
    }

    function basic_store_package() {
        $this->load->view('stores/basic_store_agree');
    }
    function regular_store_package() {
        $this->load->view('stores/regular_store_agree');
    }
    function bronze_store_package() {
        $this->load->view('stores/bronze_store_agree');
    }
    function silver_store_package() {
        $this->load->view('stores/silver_store_agree');
    }
    function gold_store_package() {
        $this->load->view('stores/gold_store_agree');
    }
    function platinum_store_package() {
        $this->load->view('stores/platinum_store_agree');
    }
    function unlimited_store_package() {
        $this->load->view('stores/unlimited_store_agree');
    }
    //Function for get all stores from particular user(Mainly use at Store home page)
    function getStoresFromJson($userid) {
        $storeArr = array();
        $storeJsonStr = file_get_contents(BASEPATH . "../users/" . $userid . "/stores.json");
        if ($storeJsonStr != "") {
            $storeArr = json_decode($storeJsonStr);
        }
        return $storeArr;
    }

    //Function for Tags insertion 
    function insert_store_tags() {
        $secondary_category = $_REQUEST["secondary_category"];
        $store_id = $_REQUEST["store_id"];
        $store_res = $this->db_api->select("store_tags", "oshop_stores", "store_aid=" . $store_id);
        if ($store_res[0]["store_tags"] == "")
            $tagStr = $secondary_category;
        else {
            $storeTagsArr = explode(",", $store_res[0]["store_tags"]);
            if (!in_array($secondary_category, $storeTagsArr)) {
                $storeTagsArr[] = $secondary_category;
            }
            $tagStr = implode(",", $storeTagsArr);
        }
        $updStoreSql = "UPDATE oshop_stores SET store_tags = '" . $tagStr . "' WHERE store_aid = '" . $store_id . "'";
        $this->db_api->custom($updStoreSql);
        echo "Successfully Updated";
    }

    //List Tags Display at edit store page
    function list_tags_display() {
        $store_id = $_REQUEST["store_id"];
        $store_res = $this->db_api->select("store_tags", "oshop_stores", "store_aid=" . $store_id);
        $storeTagsArr = explode(",", $store_res[0]["store_tags"]);
        $offset = 0;
        if (count($storeTagsArr) > 0) {
            foreach ($storeTagsArr as $storeTag) {
                if ($storeTag != "") {
                    $listStr .= '<div class="wi100pstg bgcolor4 fll mat5">
                             <p class="pat5 pab5 pal5 fll"> ' . $storeTag . ' </p>
                             <p class="flr mar10 pat7"> <span class="flr blue"> <a href="javascript:del_store_tag(' . $store_id . ',' . $offset . ');"> Delete </a> </span> </p>
                             </div>';
                    $offset++;
                }
            }
        }
        echo $listStr;
    }

    //Function for delete tag used @ edit store page
    function delete_tag_store() {
        $offset_check = $_REQUEST["offset_check"];
        $store_id = $_REQUEST["store_id"];
        $store_res = $this->db_api->select("store_tags", "oshop_stores", "store_aid=" . $store_id);
        $storeTagsArr = explode(",", $store_res[0]["store_tags"]);
        unset($storeTagsArr[$offset_check]);
        $tagStr = implode(",", $storeTagsArr);
        $updStoreSql = "UPDATE oshop_stores SET store_tags = '" . $tagStr . "' WHERE store_aid = '" . $store_id . "'";
        $this->db_api->custom($updStoreSql);
        echo "tag deleted";
    }

    //Store names stored in a json file
    function directory_user_json_store($userid, $store_aid) {
        if (!is_dir(BASEPATH . "../users/" . $userid)) {
            mkdir(BASEPATH . "../users/" . $userid, 0777);
            shell_exec('chmod -R 777 ' . BASEPATH . "../users/" . $userid);
        }
        $store_result = $this->getStoreDetails($store_aid, "store_name, store_code");
        $store_code = $store_result[0]["store_code"];
        $store_name = $store_result[0]["store_name"];
        $infoArr = array();
        $infoArr[] = $store_code;
        $infoArr[] = $store_name;

        $skipCheck = false;
        if (!is_file(BASEPATH . "../users/" . $userid . "/stores.json")) {
            $jsonfileGet = fopen(BASEPATH . "../users/" . $userid . "/stores.json", "w");
            $skipCheck = true;
        }
        $storeJsonStr = file_get_contents(BASEPATH . "../users/" . $userid . "/stores.json");
        if ($storeJsonStr != "") {
            $storeArr = json_decode($storeJsonStr);
            $storeArr[] = $infoArr;
        } else {
            $storeArr = array();
            $storeArr[] = $infoArr;
        }
        $jsonFileStr = json_encode($storeArr);
        if ($skipCheck == false) {
            $jsonfileGet = fopen(BASEPATH . "../users/" . $userid . "/stores.json", "w");
        }
        fwrite($jsonfileGet, $jsonFileStr);
        fclose($jsonfileGet);
        shell_exec('chmod -R 777 ' . BASEPATH . "../users/" . $userid . "/stores.json");
    }

    //Edit store form update action function
    function stores_updation() {
//edited by mitesh - store updation for currency & store_name;
        //All POST fields applied strip tags
        //$_REQUEST = array_map('strip_tags', $_REQUEST);
        $store_id = $_REQUEST["store_aid"];
        $store_name = $_REQUEST["store_name"];
        if($_REQUEST["currency"] != ""){
            $currency = $_REQUEST["currency"];
        }
        else
        {
            $currency = $_REQUEST["currency_store"];
        }
        // print_r($currency);
        $store_about = $_REQUEST["store_about"];
        $store_privacy_policy = $_REQUEST["store_privacy_policy"];
        $store_cancellation_policy = $_REQUEST["store_cancellation_policy"];
        $store_damage_policy = $_REQUEST["store_security_policy"];
        $store_security_policy = $_REQUEST["store_secure_policy"];
        $store_return_policy = $_REQUEST["store_return_policy"];
        $store_agreement = $_REQUEST["store_agreement"];
        $store_del_policy = $_REQUEST["store_del_policy"];
        $crd_policy = $_REQUEST["crd_policy"];
        $delivery_mode = $_REQUEST["delivery_mode"];
        $enquiry_number = $_REQUEST["enquiry_number"];
        $timezone=$_REQUEST["store_timezone"];
        $service_email=$_REQUEST["service_email"];
        $store_services = array();
        foreach ($_REQUEST as $key => $val) {
          if($key!="right_services"){
            $_REQUEST[$key] = $this->test_input($_REQUEST[$key]);
          }
        }
        //print_r($_REQUEST);
        if (isset($_REQUEST["right_services"])){
          $store_services = $_REQUEST["right_services"];
        }
        $servicesStr="";
        if (count($store_services) > 0) {
          foreach($store_services as $key=>$val){
            if($servicesStr==""){
              $servicesStr.=$val;
            }else{
              $servicesStr.=",".$val;
            }
          }
        }
        else{
          $servicesStr="NONE";
        }
    
        /* uncommented for not working the update query in edit store::22-06-2016 by suresh*/
        
       $store_code = trim($_REQUEST["store_code"]);
        //Update oshop store
        /*$updStoreSql = "UPDATE oshop_stores SET store_about = '" . addslashes($store_about) . "', " .
                "store_privacy_policy = '" . addslashes($store_privacy_policy) . "', " .
                "store_cancellation_policy = '" . addslashes($store_cancellation_policy) . "', " .
                "enquiry_number = '" . addslashes($enquiry_number) . "', " .
                "delivery_mode = '" . addslashes($delivery_mode) . "', " .
                "profile_image_path = '" . $savefileName . "', " .
                " services='" . $servicesStr . "',timezone='".$timezone."',enquiry_email='".$service_email."' WHERE store_aid = '" . $store_id . "'";*/
//edited by mitesh - update query for store_name & currency editable.
       $updStoreSql = "UPDATE oshop_stores SET store_name = '" . addslashes($store_name) ."', store_about = '" . addslashes($store_about) . "', " .
                "store_privacy_policy = '" . addslashes($store_privacy_policy) . "', " .
                "store_cancellation_policy = '" . addslashes($store_cancellation_policy) . "', " .
                "store_security_policy = '" . addslashes($store_security_policy) . "', " .
                "store_damage_policy = '" . addslashes($store_damage_policy) . "', " .
                "store_return_policy = '" . addslashes($store_return_policy) . "', " .
                "store_agreement = '" . addslashes($store_agreement) . "', " .
                "store_del_policy = '" . addslashes($store_del_policy) . "', " .
                "crd_policy = '" . addslashes($crd_policy) . "', " .
                "currency = '" . addslashes($currency) . "', " .
                "enquiry_number = '" . addslashes($enquiry_number) . "', " .
                "delivery_mode = '" . addslashes($delivery_mode) . "', ".
                " services='" . $servicesStr . "',timezone='".$timezone."',enquiry_email='".$service_email."' WHERE store_aid = '" . $store_id . "'";
              $result=$this->db_api->custom($updStoreSql);
              if($result==0) echo "Updated Successfully";
    }

    //Function for store creation
    function stores_creation() {
        $store_name = $_REQUEST["store_name"];
        //Store Check Availablity
        $storeID = $this->checkStoreNameAvaiable($store_name);
        if ($storeID != "") {
            echo "already_created";
        } else {
            //All POST fields applied strip tags 
            $_REQUEST = array_map('strip_tags', $_REQUEST);

            $id = $this->get_UserId();
            // get the package id from package name

            $packagedata_res = $this->db_api->select("package_id , price", "oshop_packages", "package_id=" . $_REQUEST["package_type_selected"]);
            /*$a_data = array(
                "store_name" => addslashes($_REQUEST["store_name"]),
                "city" => $_REQUEST['City'], "state" => $_REQUEST['State'], "country" => $_REQUEST["Country"],
                "zip_code" => $_REQUEST["Zip_code"], "enquiry_number" => $_REQUEST["Enquiry_mobile_number"],
                "enquiry_email" => $_REQUEST["Service_Email"], "timezone" => $_REQUEST["Time_Zone"], "delivery_mode" => $_REQUEST["Sdelivery_mode"],
                "created_by" => $id, "current_package_id_fk" => $_REQUEST["package_type_selected"], "currency" => $_REQUEST["Currency"]
            );*/
            $a_data = array(
                "store_name" => addslashes($_REQUEST["store_name"]),"address"=>$_REQUEST["store_address"],
                "city" => $_REQUEST['City'], "state" => $_REQUEST['State'], "country" => $_REQUEST["Country"], "store_category" => $_REQUEST["Category"],
                "zip_code" => $_REQUEST["Zip_code"], "created_by" => $id, "current_package_id_fk" => $_REQUEST["package_type_selected"], "currency" => $_REQUEST["Currency"]
            );
            foreach ($a_data as $key => $val) {
                $a_data[$key] = $this->test_input($a_data[$key]);
            }

            $result_arry = array();
            $status;
            if (strlen($store_name) == 0) {
                $result_arry['osdev_store_name'] = "error";
            }
            if (strlen($_REQUEST["Category"]) == 0) {
                $result_arry['osdev_Category'] = "error";
            }
            if (strlen($_REQUEST["Country"]) == 0) {
                $result_arry['osdev_Country'] = "error";
            }
            if (strlen($_REQUEST["State"]) == 0) {
                $result_arry['osdev_State'] = "error";
            }
            if (strlen($_REQUEST["City"]) == 0) {
                $result_arry['osdev_City'] = "error";
            }
            //if ((strlen($_REQUEST["Zip_code"]) == 0) || (strlen($_REQUEST["Zip_code"]) < 6) || ($this->validations->is_AplhabeticnumberOnly($_REQUEST["Zip_code"]) == 0)) {
            if ((strlen($_REQUEST["Zip_code"]) == 0) || (strlen($_REQUEST["Zip_code"]) < 3)) {
                $result_arry['osdev_Zipcode'] = "error";
            }
//            if ((strlen($_REQUEST["Enquiry_mobile_number"]) == 0) || strlen($_REQUEST["Enquiry_mobile_number"]) < 8) {
//                $result_arry['osdev_Enquirymobilenumber'] = "error";
//            }
//            if (strlen($_REQUEST["Time_Zone"]) == 0) {
//                $result_arry['Time_Zone'] = "error";
//            }
//            if (($this->validations->is_Valid_Email($_REQUEST["Service_Email"]) == 0) || strlen($_REQUEST["Service_Email"]) == 0) {
//                $result_arry['osdev_ServiceEmail'] = "error";
//            }
            if (strlen($_REQUEST["Currency"]) == 0) {
                $result_arry['Currency'] = "error";
            }

            if (strlen($_REQUEST["package_type_selected"]) == 0) {
                $result_arry['osdev_PackageType'] = "error";
            }
            if (strlen($_REQUEST["SPackage_period"]) == 0) {
                $result_arry['osdev_PackagePeriod'] = "error";
            }
//            if (strlen($_REQUEST["Sdelivery_mode"]) == 0) {
//                $result_arry['osdev_Delivery_Mode'] = "error";
//            }
            if (count($result_arry) != 0) {

                echo $status = json_encode($result_arry);
            } else {
                $rlt = $this->db_api->insert($a_data, "oshop_stores");
                if ($rlt == 1) {
                    $lastinserted_storeid = $this->checkStoreNameAvaiable($store_name);

                    if ($packagedata_res != "") {
                        $package_price = $packagedata_res[0]["price"];
                        $no_months = $_REQUEST["SPackage_period"];
                        $renewal_price = $package_price * $no_months;
                        $date = new DateTime();
                        $date->modify("+" . $no_months . " MONTH");
                        $expired_on = $date->format('Y-m-d H:i:s');
                    }

                    //Renewal Package Insertion
                    $pkgs_data=$this->db_api->select("total_products","oshop_packages","package_id=".$_REQUEST["SPackage_Type"]);
                    $renew_arr = array(
                        "store_id_fk" => $lastinserted_storeid,
                        "package_id_fk" => $_REQUEST["SPackage_Type"],
                        "price" => $renewal_price,
                        "period_in_months" => $no_months,
                        "expired_on" => $expired_on,
                        "total_products"=>$pkgs_data[0]["total_products"]
                    );
                    // strip tags validation
                    foreach ($renew_arr as $key => $val) {
                        $renew_arr[$key] = $this->test_input($renew_arr[$key]);
                    }
                    $renew = $this->db_api->insert($renew_arr, "oshop_store_renewals_info");
                    //Staff Insertion
                    $staff_arr = array(
                        "user_id_fk" => $id,
                        "store_id_fk" => $lastinserted_storeid,
                        "role" => 'ADMIN',
                        "added_on" => date("Y-m-d H:i:s"),
                        "added_by" => $id
                    );
                    // strip tags validation
                    foreach ($staff_arr as $key => $val) {
                        $staff_arr[$key] = $this->test_input($staff_arr[$key]);
                    }

                    $staffRec = $this->db_api->insert($staff_arr, "oshop_staff");
                    
                    $latest_renewal_data = $this->db_api->select("renewal_pckg_id", "oshop_store_renewals_info", "store_id_fk=" . $lastinserted_storeid);
                    $renewal_pckg_id = $latest_renewal_data[0]["renewal_pckg_id"];

                    //Update oshop store
                    $updStoreSql = "UPDATE oshop_stores SET renewal_package_aid_fk = '" . $renewal_pckg_id . "' WHERE store_aid = '" . $lastinserted_storeid . "'";
                    $this->db_api->custom($updStoreSql);

                    //Get Trigger Store Code
                    $s_store_code = $this->getTriggerStoreCode($lastinserted_storeid);

                    //Creation of directories as per trigger store code
                    $this->directory_creation($s_store_code);

                    //Get the role
                    $getRole = "admin";
                    $onshopGlanArr = array();
                    $ownership_str = "";
                    $ownership_res = $this->db_api->select("oneshop", "iws_users_ownership_glance", "user_id_fk=" . $id);
                    if ($ownership_res != 0) {
                        $onshopGlanArr = (array) json_decode($ownership_res[0]["oneshop"]);
                        $onshopGlanArr[$getRole][] = $s_store_code;
                    } else {
                        $onshopGlanArr[$getRole][] = $s_store_code;
                    }
                    $ownership_str = json_encode($onshopGlanArr);

                    //Update owner glance table to oshop coloumn
                    $sql = "update iws_users_ownership_glance set oneshop= '" . $ownership_str . "' where user_id_fk=" . $this->get_UserId();
                    $this->db_api->custom($sql);
                    $_SESSION['store_owner_id'] = $_SESSION['user_id'];

                    //Store information placed in a Json file 
                    $this->directory_user_json_store($id, $lastinserted_storeid);
                }
                echo $s_store_code;
            }
        }
    }

    function newregister(){

        $username = $_REQUEST["username"];
        $pass = $_REQUEST["pass"];
        $scode = $_SESSION['storecode'];
        // echo var_dump($scode);
        echo "Ref".$this->get_UserId()."&store=".$scode;
    }

    function sale_posting(){
        $db_obj = $this->load->module("db_api");
        $userId = $this->get_UserId();
        // $sempty = preg_split('/,/', $_POST['product'], -1, PREG_SPLIT_NO_EMPTY);
        // echo var_dump($sempty);
        //explode(',', $sempty)
        $sproducts = $_POST['product'];
        $stype = $_POST["type"];
        $stitle = $_POST["title"];
        $smsg = $_POST["msg"];
        $sfdate = $_POST["fdate"];
        $sedate = $_POST["edate"];
        $storeSql = "SELECT store_aid FROM oshop_stores WHERE store_code = '" . $_POST["store_code"] . "'";
        $store_det = $db_obj->custom($storeSql);
        $store_aid = $store_det[0]["store_aid"];

        $sale_arr = array(
            "os_type" => $stype,
            "os_title" => $stitle,
            "os_products" => $sproducts,
            "os_msg" => $smsg,
            "store_id_fk" => $store_aid,
            "os_ft_date" => $sfdate,
            "os_ed_date" => $sedate,
            "os_added_by" => $userId
        );
        foreach ($sale_arr as $key => $val) {
            $sale_arr[$key] = $this->test_input($sale_arr[$key]);
        }
        $saleRec = $db_obj->insert($sale_arr, "oshop_sales");
        $salerec_aid = mysql_insert_id();
        $this->load->module('notification');
        $this->notification->all_notification("SALE","",$salerec_aid,$_POST["store_code"],"");
        if($saleRec){
            echo 'done';
        }

    }

    function salt(){
        return "#@$786ABoneidnet";
    }
    //Staff Update 
    function valid_staff_update() {
        $userId = $this->get_UserId();
        $store_code = $_POST["store_code"];
        $staff_id = $_POST["staff_id"];
        $role_type = $_POST["role_type"];
        $db_obj = $this->load->module("db_api");
        
        $store_det = $db_obj->custom("SELECT store_aid FROM oshop_stores WHERE store_code = '" . $store_code . "'");
        $store_aid = $store_det[0]["store_aid"];
        
        foreach ($_POST["emails"] as $staffEmail) {
            $profSql = "SELECT profile_id FROM iws_profiles WHERE email = '" . trim($staffEmail) . "'";
            $user_res = $db_obj->custom($profSql);
             $profile_id = $user_res[0]["profile_id"];

            if ($profile_id != "") {
                $staffUpdQry = "UPDATE oshop_staff SET user_id_fk = '" . $profile_id . "', store_id_fk='" . $store_aid . "', role='" . $role_type . "' WHERE rec_aid = '" . $staff_id . "'";
                $db_obj->custom($staffUpdQry);
                //Ownership Glance table update with store informaton
                $getRole = $role_type;
                $onshopGlanArr = array();
                $ownership_str = "";
                $ownership_res = $db_obj->select("oneshop", "iws_users_ownership_glance", "user_id_fk=" . $profile_id);
                if ($ownership_res != 0) {
                    $onshopGlanArr = (array) json_decode($ownership_res[0]["oneshop"]);
                    $onshopGlanArr[$getRole][] = $store_code;
                } else {
                    $onshopGlanArr[$getRole][] = $store_code;
                }
                $ownership_str = json_encode($onshopGlanArr);

                //Update owner glance table to oshop coloumn
                $sql = "update iws_users_ownership_glance set oneshop= '" . $ownership_str . "' where user_id_fk=" . $profile_id;
                $db_obj->custom($sql);
            }
        }

        echo "STAFF_UPDATED";
    }

    //Staffs insertion 
    function valid_staff_insertion() {
        $userId = $this->get_UserId();
        $db_obj = $this->load->module("db_api");
        if(!empty($_POST['update']) && $_POST['update'] == 'update') {
            $role_type = $_POST["role_type"];
            $fname = $_POST["fname"];
            $lname = $_POST["lname"];
            $sloc = $_POST["sloc"];
            $sbio = $_POST["sbio"];
            $syear = $_POST["syear"];
            $smonth = $_POST["smonth"];
            $get_recid = $db_obj->custom("SELECT iws.profile_id,os.rec_aid FROM iws_profiles as iws INNER JOIN oshop_staff as os ON os.user_id_fk = iws.profile_id  WHERE email = '" . $_POST["emails"]. "' AND os.added_by = '".$this->get_UserId()."'");
                $staff_arr = array(
                    "f_name" => $fname,
                    "l_name" => $lname,
                    "s_loc" => $sloc,
                    "bio" => $sbio,
                    "role" => $role_type,
                    "w_since" => $syear." Year And ".$smonth
                );
            $db_obj->update($staff_arr,"oshop_staff","rec_aid=".$get_recid[0]['rec_aid']);
            echo "STAFF_UPDATED";
        }
        else{
        $staffemail = $_POST["emails"];
        $store_code = $_POST["store_code"];
        $role_type = $_POST["role_type"];
        $fname = $_POST["fname"];
        $lname = $_POST["lname"];
        $sloc = $_POST["sloc"];
        $sbio = $_POST["sbio"];
        $syear = $_POST["syear"];
        $smonth = $_POST["smonth"];
        $storeSql = "SELECT store_aid FROM oshop_stores WHERE store_code = '" . $store_code . "'";
        $store_det = $db_obj->custom($storeSql);
        $store_aid = $store_det[0]["store_aid"];
        // foreach ($_POST["emails"] as $staffEmail) {
            $profSql = "SELECT profile_id FROM iws_profiles WHERE email = '" . $staffemail. "'";
            $user_res = $db_obj->custom($profSql);
            $profile_id = $user_res[0]["profile_id"];

            if ($profile_id != "") {
                //Staff Insertion
                $staff_arr = array(
                    "user_id_fk" => $profile_id,
                    "store_id_fk" => $store_aid,
                    "f_name" => $fname,
                    "l_name" => $lname,
                    "s_loc" => $sloc,
                    "bio" => $sbio,
                    "role" => $role_type,
                    "w_since" => $syear." Year And ".$smonth,
                    "added_on" => date("Y-m-d H:i:s"),
                    "added_by" => $userId
                );
                foreach ($staff_arr as $key => $val) {
                    $staff_arr[$key] = $this->test_input($staff_arr[$key]);
                }
                $staffRec = $db_obj->insert($staff_arr, "oshop_staff");

                //Ownership Glance table update with store informaton
                $getRole = $role_type;
                $onshopGlanArr = array();
                $ownership_str = "";
                $ownership_res = $db_obj->select("oneshop", "iws_users_ownership_glance", "user_id_fk=" . $profile_id);
                if ($ownership_res != 0) {
                    $onshopGlanArr = (array) json_decode($ownership_res[0]["oneshop"]);
                    $onshopGlanArr[$getRole][] = $store_code;
                } else {
                    $onshopGlanArr[$getRole][] = $store_code;
                }
                $ownership_str = json_encode($onshopGlanArr);

                //Update owner glance table to oshop coloumn
                $sql = "update iws_users_ownership_glance set oneshop= '" . $ownership_str . "' where user_id_fk=" . $profile_id;
                $db_obj->custom($sql);
                echo "STAFF_INSERTED";
            }
        }
        // }

    }

    function promosale_list(){
        $connect = mysqli_connect("localhost","root","Admin@2020","db_oneidnet");
            // $db_obj = $this->load->module("db_api");
            $sqlQuery = "SELECT * FROM oshop_sales WHERE os_added_by = '". $this->get_UserId() ."'";
            if(!empty($_POST["search"]["value"])){
                $sqlQuery .= ' AND (rec_aid LIKE "%'.$_POST["search"]["value"].'%" OR os_type LIKE "%'.$_POST["search"]["value"].'%" OR os_title LIKE "%'.$_POST["search"]["value"].'%")';     
            }
            if(!empty($_POST["order"]))
            {
                $sqlQuery .= ' ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
            } 
            else {
                 $sqlQuery .= ' ORDER BY rec_aid DESC';
            }
                
            if($_POST["length"] != -1){
                $sqlQuery .= ' LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
            }
           
            $result = mysqli_query($connect, $sqlQuery);

            $displayRecords = mysqli_num_rows($result);
                
            $allRecords = mysqli_num_rows(mysqli_query($connect,"SELECT * FROM oshop_sales WHERE os_added_by='". $this->get_UserId() ."'"));

            $data = array();     
            while($record = mysqli_fetch_array($result))
            {              
                $rows = array();            
                $rows[] = $record['rec_aid'];
                $rows[] = $record['os_type'];
                $rows[] = $record['os_title'];
                $rows[] = $record['os_ed_date'];                        
                $rows[] = '<button type="button" name="delete" id="'.$record['rec_aid'].'"
             class="btn delete" style="background-color: red;color: white;padding: 3px 20px;">Delete</button>';
                $data[] = $rows;
            }
            $output = array(
                "draw"  =>  intval($_POST["draw"]),         
                "recordsTotal" =>  $allRecords,
                "recordsFiltered"  =>  $displayRecords,
                "data"  =>  $data
            );
            echo json_encode($output);
    }

    function staff_list(){
            $connect = mysqli_connect("localhost","root","Admin@2020","db_oneidnet");
            // $db_obj = $this->load->module("db_api");
            $sqlQuery = "SELECT * FROM oshop_staff WHERE added_by = '". $this->get_UserId() ."'";
            if(!empty($_POST["search"]["value"])){
                $sqlQuery .= ' AND (rec_aid LIKE "%'.$_POST["search"]["value"].'%" OR f_name LIKE "%'.$_POST["search"]["value"].'%" OR l_name LIKE "%'.$_POST["search"]["value"].'%" OR role LIKE "%'.$_POST["search"]["value"].'%")';     
            }
            if(!empty($_POST["order"]))
            {
                $sqlQuery .= ' ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
            } 
            else {
                 $sqlQuery .= ' ORDER BY rec_aid DESC';
            }
                
            if($_POST["length"] != -1){
                $sqlQuery .= ' LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
            }
           
            $result = mysqli_query($connect, $sqlQuery);

            $displayRecords = mysqli_num_rows($result);
                
            $allRecords = mysqli_num_rows(mysqli_query($connect,"SELECT * FROM oshop_staff WHERE added_by='". $this->get_UserId() ."'"));

            $data = array();     
            while($record = mysqli_fetch_array($result))
            {              
                $rows = array();            
                $rows[] = $record['rec_aid'];
                $rows[] = $record['f_name']." ".$record['l_name'];
                $rows[] = $record['role']; 
                $rows[] = '<button type="button" name="update" id="'.$record['rec_aid'].'"
             class="btn update" style="background-color: #ffcc00;padding: 3px 20px;">Update</button>';
                $rows[] = '<button type="button" name="delete" id="'.$record['rec_aid'].'"
             class="btn delete" style="background-color: red;color: white;padding: 3px 20px;">Delete</button>';
                $data[] = $rows;
            }
            $output = array(
                "draw"  =>  intval($_POST["draw"]),         
                "recordsTotal" =>  $allRecords,
                "recordsFiltered"  =>  $displayRecords,
                "data"  =>  $data
            );
            echo json_encode($output);
    }

    //Staff display function 
    function getSavedStaffDetails($store_code) {
        $db_obj = $this->load->module("db_api");
        $storeSql = "SELECT store_aid FROM oshop_stores WHERE store_code = '" . $store_code . "'";
        $store_det = $db_obj->custom($storeSql);
        $store_aid = $store_det[0]["store_aid"];
        $staffQry = "SELECT DISTINCT ost.user_id_fk, ost.role, iwp.email, CONCAT(iwp.first_name, ' ', iwp.middle_name, ' ', iwp.last_name) as user_full_name, ost.rec_aid FROM oshop_staff ost " .
                "INNER JOIN iws_profiles iwp ON ost.user_id_fk = iwp.profile_id " .
                "WHERE ost.store_id_fk = '" . $store_aid . "'";
        $staffRes = $db_obj->custom($staffQry);
        return $staffRes;
    }

    //Get staff role by store id 
    function getStaffRole($store_aid) {
        $staff_role = "";
        $staff_res = $this->db_api->select("role", "oshop_staff", "store_id_fk=" . $store_aid);
        if ($staff_res != 0) {
            $staff_role = $staff_res[0]["role"];
        }

        return $staff_role;
    }

    //Get user id by email 
    function getUserIdByEmail($email) {
        $user_res = $this->db_api->select("profile_id", "iws_profiles", "email=" . $email);
        if ($user_res != 0) {
            $profile_id = $user_res[0]["profile_id"];
        }

        return $profile_id;
    }

    //Getting Triggger Store Code By Store Id 
    function getTriggerStoreCode($store_aid) {
        $store_code = "";
        $store_res = $this->db_api->select("store_code", "oshop_stores", "store_aid=" . $store_aid);
        if ($store_res != 0) {
            $store_code = $store_res[0]["store_code"];
        }
        return $store_code;
    }

    //Getting Store Details 
    function getStoreDetails($store_aid, $cols_select = "*") {
        $store_res = $this->db_api->select($cols_select, "oshop_stores", "store_aid=" . $store_aid);
        return $store_res;
    }

    //Getting Store Details (ANIL_NEW)
    function getStoreDetailsByStoreCode($store_code, $cols_select = "*") {
        $db_obj = $this->load->module("db_api");
        $store_res = $db_obj->select($cols_select, "oshop_stores", "store_code='" . $store_code . "'");
        return $store_res;
    }

    //Getting Store Review Details (ANIL_NEW)
    function getStoreReviewDetailsByStoreCode($store_code) {
        $db_obj = $this->load->module("db_api");
        $userId = $this->get_UserId();
        $store_res = $this->getStoreDetailsByStoreCode($store_code, "store_aid");
        $store_aid = $store_res[0]["store_aid"];
        $reviewQry = "SELECT avg(`rating`) as avgrating  FROM oshop_store_reviews WHERE store_id_fk = " . $store_aid;
        $reviewRes = $db_obj->custom($reviewQry);
        return $reviewRes;
    }

    //Store Name Available Check function
    function checkStoreNameAvaiable($store_name) {
        $store_aid = "";
        $store_res = $this->db_api->select("store_aid", "oshop_stores", "store_name='" . $store_name . "'");
        if ($store_res != 0) {
            $store_aid = $store_res[0]["store_aid"];
        }
        return $store_aid;
    }

    // to display the stores list by Pavani on 01-06-2015
    function store_search($mode = "default") {
        $stores_cnt = $this->storesCnt($mode);
        $data["stores_count"] = $stores_cnt[0]["cnt"];
        $this->load->view('stores/store_search', $data);
    }

    // to display the stores list --> Pavani on 01-06-2015--starts here
    function store_search_result($store_name = "no", $country_id = 0, $state_id = 0, $mode = "default") {
        $start = 0;
        $dbobj = $this->load->module("db_api");
        $records_per_page = 8; // records to show per page
        $page = $this->input->post("p");
        //echo "store name:".$store_name;
        //$store_name=$this->input->post("search_val");
        if ($page != "") {
            $current_page = $page - 1;
            $start = $current_page * $records_per_page;
        }
//   $home_obj=$this->load->module("home");
//   $country=$home_obj->country_info_based_on_ip();
        if ($country_id != 0) {
            $s_where = "country=" . $country_id;
        } else {
            $cookies_obj = $this->load->module("cookies");
            $country_id = $cookies_obj->getUserCountryID();
            $s_where = "country=" . $country_id;
        }
        if ($state_id != 0) {
            $s_where.=" AND state=$state_id";
        } else if ($store_name != "no") {
            $s_where.=" AND name LIKE '%" . $store_name . "%'";
        }
        $s_where.=" ORDER BY visit_count DESC LIMIT $start,$records_per_page";
        $os_stores_res = $dbobj->select("*", "os_all_store", $s_where);
//echo $s_where;
        if ($mode == "find") {
            $stores_cnt = $this->storesCnt($mode, $store_name, $country_id, $state_id);
            $data["stores_count"] = $stores_cnt;
        }
        $data["stores_data"] = $os_stores_res;
        $this->load->view('stores/store_search_result', $data);
    }

    function storesCnt($mode = "default", $search = "", $country_id = 0, $stateid = 0) {
        $dbobj = $this->load->module("db_api");
        if ($mode != "find") {
            $os_stores_cnt = $dbobj->select("COUNT(*) as cnt", "os_all_store");
        } else {
            $s_where = "";
            if ($country_id != 0) {
                if ($s_where == "") {
                    $s_where = "country=" . $country_id;
                } else {
                    $s_where = " AND country=" . $country_id;
                }
            }
            if ($search != "") {
                if ($s_where == "") {
                    $s_where = "name LIKE '%" . $search . "%'";
                } else {
                    $s_where = " AND name LIKE '%" . $search . "%'";
                }
            }
            if ($stateid != 0) {
                if ($s_where == "") {
                    $s_where = "state=" . $stateid;
                } else {
                    $s_where = " AND state=" . $stateid;
                }
            }
            $os_stores_cnt = $dbobj->select("COUNT(*) as cnt", "os_all_store", $s_where);
        }
        return $os_stores_cnt;
    }

//  function displayStores(){
//    $storename=$this->input->post("search_val");
//    $stateid=$this->input->post("stateid");
//    $country_id=$this->input->post("country_id");
//    //$this->store_search("find", $storename);
//    $this->store_search_result($storename,$country_id,$stateid,"find");
//  }
    function getStates($country_id) {
        $dbapi = $this->load->module("db_api");
        $states_res = $dbapi->select("state_id,state_name", "global_states_info", "country_id=$country_id ORDER BY state_name");
        $options = "";
        foreach ($states_res as $state) {
            $id = $state["state_id"];
            $name = $state["state_name"];
            $options.="<option value='" . $id . "'>" . $name . "</option>";
        }
        echo $options;
    }

    function getCountries1() {
        $dbapi = $this->load->module("db_api");
        $countries_res = $dbapi->select("country_id,country_name", "iws_countries_info", "1");
        return $countries_res;
    }

    // Pavani on 01-06-2015--ends here

    function about_store() {
        $this->load->view('stores/aboutus_data_store');
    }

    function home_store($store_id) {
      $db_obj = $this->load->module("db_api");
      $orders_rslt=$db_obj->custom("select count(*) as cnt from oshop_orders where store_id_fk=".$store_id);
      $orders_cnt=$orders_rslt[0]["cnt"];
      $cancel_rslt=$db_obj->custom("select count(*) as cnt from oshop_cancellation can inner join oshop_orders orders on can.order_id_fk=orders.order_aid where store_id_fk=".$store_id);
      $cancel_cnt=$cancel_rslt[0]["cnt"];
      $products_result=$db_obj->custom("SELECT COUNT(*) AS cnt FROM oshop_products WHERE store_id_fk=".$store_id);
      $staff_result=$db_obj->custom("SELECT COUNT(*) AS cnt FROM oshop_staff WHERE store_id_fk=".$store_id);
      $followers_result=$db_obj->custom("SELECT COUNT(*) AS cnt FROM oshop_followings WHERE store_id_fk=".$store_id);
      $data["staff_count"]=$staff_result[0]["cnt"];
      $data["order_count"]=$orders_cnt;
      $data["cancels_count"]=$cancel_cnt;
      $data["products_count"]=$products_result[0]["cnt"];
      $data["followers_cnt"]=$followers_result[0]["cnt"];
      $this->load->view('stores/home_store',$data);
    }

    function store_orders() {
        $this->load->view('stores/store_orders');
    }   

    function International_Brands() {
        $db_obj = $this->load->module("db_api");
//    $home_obj=$this->load->module("home");
//   $country_id= $home_obj->country_info_based_on_ip();    
        $cookies_obj = $this->load->module("cookies");
        $country_id = $cookies_obj->getUserCountryID();
        $data["international_brand"] = $db_obj->custom("select osp.product_aid,osp.brand_name,osp.image_path,opmi.viewed_count,oas.store_id from 
os_products osp left join os_product_more_info opmi on osp.product_aid=opmi.product_aid 
left join os_all_store oas on osp.store_id=oas.store_aid where oas.country=" . $country_id . "
order by opmi.viewed_count desc limit 8;");
        $this->load->view('stores/International_Brands', $data);
    }

    function Friends_Stores() {
        $data["title"] = 'Friends Stores |oneidnet.com';
        $data["meta_description"] = 'Friends Stores in oneshop';
        $data["meta_keywords"] = 'Friends Stores in oneshop';
        $this->load->view("Friends_Stores", $data);
    }

    function friends_Storesdata() {
        $starting_index = 0;
        if (isset($_REQUEST['start_id'])) {
            $starting_index = $_REQUEST['start_id'];
        }
        $db_api = $this->load->module("db_api");
         $query = "SELECT store_aid,store_code,store_name,profile_image_path,total_visitors FROM `oshop_stores` where created_by in (SELECT associated_id_fk FROM `oshop_explore` where user_id_fk=" . $this->get_UserId() . " ) limit $starting_index ,20 ";
        $store_result = $db_api->custom($query);
        $data["friendstores"] = $store_result;
        $this->load->view("friends_storedata", $data);
    }

    function Recomended_Stores() {
        $db_obj = $this->load->module("db_api");
        $id = $this->get_UserId();
        $data["recomended_stores"] = $db_obj->custom("SELECT store_aid,store_code,store_name,profile_image_path FROM `oshop_stores` ORDER BY store_aid DESC LIMIT 0,6");
        $this->load->view('stores/Recomended_Stores', $data);
    }

    //26-05-2015 global function by venkatesh : this function create directory structure
    function directory_creation($id) {
        $dir_path = "stores/" . $id;
        $old_umask = umask(0);
        mkdir($dir_path, 0777);
        $create_path = $dir_path . "/cover/";
        mkdir($create_path, 0777);
        $create_path = $dir_path . "/cover/li";
        mkdir($create_path, 0777);
        $create_path = $dir_path . "/cover/mi";
        mkdir($create_path, 0777);
        $create_path = $dir_path . "/cover/orig";
        mkdir($create_path, 0777);
        $create_path = $dir_path . "/logo/";
        mkdir($create_path, 0777);
        $create_path = $dir_path . "/logo/li";
        mkdir($create_path, 0777);
        $create_path = $dir_path . "/logo/si";
        mkdir($create_path, 0777);
        $create_path = $dir_path . "/logo/mi";
        mkdir($create_path, 0777);
        $create_path = $dir_path . "/logo/orig";
        mkdir($create_path, 0777);
        $create_path = $dir_path . "/products/";
        mkdir($create_path, 0777);
        $create_path = $dir_path . "/products/li/";
        mkdir($create_path, 0777);
        $create_path = $dir_path . "/products/si/";
        mkdir($create_path, 0777);
        $create_path = $dir_path . "/products/mi/";
        mkdir($create_path, 0777);
        $create_path = $dir_path . "/products/orig/";
        mkdir($create_path, 0777);
        umask($old_umask);
    }

//27-05-2015 by venkatesh : this function create the store in oneshop
    function stores_insertion() {
        $id = $this->get_UserId();
        $s_store_id = trim($this->retrieveStore_id(), "\n");
        // print_R($_REQUEST);    //echo $_REQUEST["store_name"];    //echo $_REQUEST["Description"];    //echo $_REQUEST["Country"];     //echo $_REQUEST["State"];       //echo $_REQUEST["City"];        //echo $_REQUEST["Zip_code"];        //echo $_REQUEST["Helpline_Number"];        //echo $_REQUEST["Enquiry_mobile_number"];       //echo $_REQUEST["Customer_Care_Number"];        //echo $_REQUEST["Service_Email"];        //echo $_REQUEST["Problem_Reporting_Email"];        //echo $_REQUEST["Curency"];        //echo $_REQUEST["Is_Official"];    //echo $_REQUEST["Package_Type"];   // print_R($_FILES);
        $this->directory_creation($s_store_id);
        if ($_FILES['Store_Cover_Picture']['name']) {
            $date = new DateTime();
            $uploaddir = "data/images/channels/logo/li/";
            $cover_name = basename($_FILES['Store_Cover_Picture']['name']);
            //list($txt, $ext) = explode(".", $cover_name);
            $ext = end(explode(".", $cover_name));
            $store_cover_image_name = $s_store_id . "." . $ext;
            shell_exec('chmod -R 777 /var/www/html/oneshop');
            if (move_uploaded_file($_FILES['Store_Cover_Picture']['tmp_name'], "stores/" . $s_store_id . "/cover/orig/" . $store_cover_image_name)) {
                shell_exec('chmod -R 777 ' . "stores/" . $s_store_id . "/cover/orig/" . $store_cover_image_name);
                $this->imageresize->resize("stores/" . $s_store_id . "/cover/orig/" . $store_cover_image_name, "stores/" . $s_store_id . "/cover/li/" . $store_cover_image_name, 800, 600);
                $this->imageresize->resize("stores/" . $s_store_id . "/cover/orig/" . $store_cover_image_name, "stores/" . $s_store_id . "/cover/mi/" . $store_cover_image_name, 400, 300);
                unlink("stores/" . $s_store_id . "/cover/orig/" . $store_cover_image_name);
            }
        }
        if ($_FILES['Store_Logo']['name']) {
            $date = new DateTime();
            $uploaddir = "data/images/channels/logo/li/";
            $cover_name = basename($_FILES['Store_Logo']['name']);
            //list($txt, $ext) = explode(".", $cover_name);
            $ext = end(explode(".", $cover_name));
            $store_logo_image_name = $s_store_id . "." . $ext;
            shell_exec('chmod -R 777 /var/www/html/oneshop');
            if (move_uploaded_file($_FILES['Store_Logo']['tmp_name'], "stores/" . $s_store_id . "/logo/orig/" . $store_logo_image_name)) {
                shell_exec('chmod -R 777 ' . "stores/" . $s_store_id . "/logo/orig/" . $store_cover_image_name);
                $this->imageresize->resize("stores/" . $s_store_id . "/logo/orig/" . $store_logo_image_name, "stores/" . $s_store_id . "/logo/li/" . $store_logo_image_name, 130, 150);
                $this->imageresize->resize("stores/" . $s_store_id . "/logo/orig/" . $store_logo_image_name, "stores/" . $s_store_id . "/logo/mi/" . $store_logo_image_name, 70, 90);
                $this->imageresize->resize("stores/" . $s_store_id . "/logo/orig/" . $store_logo_image_name, "stores/" . $s_store_id . "/logo/si/" . $store_logo_image_name, 35, 35);
                unlink("stores/" . $s_store_id . "/logo/orig/" . $store_logo_image_name);
            }
        }
        $date->modify('+30 days');
        $expired_on = $date->format('Y-m-d H:i:s');
        /* if ($_REQUEST["Is_Official"] == "Yes") {
          $Is_Official = 1;
          } else {
          $Is_Official = 0;
          } */
        $package_id = $_REQUEST["hpackage_id"];
        $a_data = array(
            "store_id" => $s_store_id, "name" => $_REQUEST["store_name"], "package" => $_REQUEST['SPackage_Type'], "city" => $_REQUEST['City'], "state" => $_REQUEST['State'], "country" => $_REQUEST["Country"], "zip_code" => $_REQUEST["Zip_code"], "enq_mobile_number" => $_REQUEST["Enquiry_mobile_number"], "helpline_number" => $_REQUEST["Helpline_Number"], "service_email" => $_REQUEST["Service_Email"], "prob_reporting_email" => $_REQUEST["Problem_Reporting_Email"], "timezone" => $_REQUEST["Time_Zone"], "logo_path" => $store_logo_image_name, "cover_path" => $store_cover_image_name, "expired_on" => $expired_on, "created_by" => $id, "storage" => $this->storage_space($_REQUEST["Country"], $_REQUEST["SPackage_Type"]), "package_id_fk" => $package_id
        );
        $mytable = "os_store_tmp";
        foreach ($_REQUEST as $key => $val) {
            $_REQUEST[$key] = $this->test_input($_REQUEST[$key]);
        }
        $ownership_str = "";
        $ownership_res = $this->db_api->select("oneshop", "iws_users_ownership_glance", "user_id_fk=" . $id);
        if ($ownership_res != 0) {
            $ownership_str = $ownership_res[0]["oneshop"] . "," . $s_store_id;
        } else {
            $ownership_str = $s_store_id;
        }
        $a_owner_data = array("user_id_fk" => $id, "oneshop" => $ownership_str);
        foreach ($a_owner_data as $key => $val) {
            $a_owner_data[$key] = $this->test_input($a_owner_data[$key]);
        }
        $this->db_api->insert($a_owner_data, "iws_users_ownership_glance");
        $rlt = $this->db_api->insert($a_data, $mytable);

        if ($rlt == 1) {
            $lastinserted_storeid = $this->db_api->last_insertid();
            $sql = "update iws_users_ownership_glance set oneshop= CASE "
                    . "WHEN oneshop = '' THEN CONCAT_WS(oneshop , ' $lastinserted_storeid') "
                    . "WHEN oneshop != '' THEN CONCAT(oneshop , ', $lastinserted_storeid') "
                    . "ELSE oneshop   END where user_id_fk=" . $this->get_UserId();
            $this->db_api->custom($sql);
            $_SESSION['store_owner_id'] = $_SESSION['user_id'];
        }
        $this->storeUniqIdDelete();
        $os_c_notify["s_store_id"] = $s_store_id;
        $os_c_notify["store_name"] = $_REQUEST["store_name"];
        $os_c_notify["created_by"] = $id;
        $this->load->module("notification");
        $this->notification->store_creation_notification($os_c_notify);
        /* $id = $this->get_UserId();
          $os_c_notify["s_store_id"]=trim($this->retrieveStore_id(), "\n");
          $os_c_notify["store_name"]=$_REQUEST["store_name"];
          $os_c_notify["created_by"]=$id;
          $this->load->module("notification");
          $this->notification->store_creation_notification($os_c_notify); */
    }

    //27-05-2015 by venkatesh this function using for create random string
    function retrieveStore_id() {
        $myfile = fopen("assets/store_id.txt", "r") or die("Unable to open file!");
        while (!feof($myfile)) {
            $line = fgets($myfile);
            $line = trim($line);
            $lines[] = $line . "\n";
        }
        return $lines[0];
    }

//27-05-2015 by venkatesh : this function using for delete first line from uniqueid.txt file
    function storeUniqIdDelete() {
        $lines = file('assets/store_id.txt');
        unset($lines[0]);
        $file = fopen('assets/store_id.txt', 'w');
        fwrite($file, implode('', $lines));
        fclose($file);
    }

//28-05-2015 by venkatesh : this function return storage space based in country
    function storage_space($country_id, $package) {

        $myfields = "storage";
        $where = "country_id_fk= " . $country_id . " and package_name= '" . $package . "'";
        $mytable = "os_store_packages";
        $result = $this->db_api->select($myfields, $mytable, $where);
        return $result[0]["storage"];
    }

    function displaySearch($search_type = "stores") {
        $s_query = "";
        $search_value = $this->input->post("search_val");
        if ($search_type == "stores") {
            $s_query = "SELECT * FROM os_all_store WHERE name LIKE '%" . $search_value . "%'";
            $res = $this->db_api->custom($s_query);
        }
        //echo $s_query;
        //$res=$this->db_api->custom($s_query);    
        $s_search = "";
        $search_cnt = count($res);
        $i = 0;
        foreach ($res as $rows) {
            if ($i == $search_cnt - 1) {
                $s_search.=$rows["store_id"] . ":" . $rows["name"];
            } else {
                $s_search.=$rows["store_id"] . ":" . $rows["name"] . "~";
            }
            $i++;
        }
        //$s_search=$search_cnt.":".$s_search;
        echo $s_search;
    }

//05-06-2015 by venaktesh : this function update store info based on store id
    function store_info_update() {
        //    print_R($_REQUEST);//    echo $_REQUEST["STORE_ID"];//    echo $_REQUEST["country_id"];//    echo $_REQUEST["state_id"];//    echo $_REQUEST["city_id"];//    echo $_REQUEST["Time_Zone"];//    echo $_REQUEST["Is_Official"];//    echo $_REQUEST["Zip_code"];//    echo $_REQUEST["Helpline_Number"];//    echo $_REQUEST["Enquiry_mobile_number"];//    echo $_REQUEST["Service_Email"];//    echo $_REQUEST["Problem_Reporting_Email"];
        $STORE_ID = $_REQUEST["STORE_ID"];
        $a_data = array(
            "city" => $_REQUEST["city_id"],
            "state" => $_REQUEST["state_id"],
            "zip_code" => $_REQUEST['Zip_code'],
            "enq_mobile_number" => $_REQUEST['Enquiry_mobile_number'],
            "helpline_number" => $_REQUEST["Helpline_Number"],
            "service_email" => $_REQUEST["Service_Email"],
            "prob_reporting_email" => $_REQUEST["Problem_Reporting_Email"],
            "is_official" => $_REQUEST["Is_Official"]
        );
        // trim and html strip validation
        foreach ($a_data as $key => $val) {
            $a_data[$key] = $this->test_input($a_data[$key]);
        }
        $mytable = "os_all_store";
        $s_where = "store_id ='" . $STORE_ID . "'";
        $result = ( $this->db_api->update($a_data, $mytable, $s_where));
        print_R($result);
    }

    //05-june-2015 by venkatesh : this function the given email is exist or not in database
    function email_check() {
        $one_idnet_email = $_REQUEST["email"];

        $myfields = "profile_id";
        $where = "email= '" . $one_idnet_email . "'";
        $mytable = "iws_profiles";
        $result = $this->db_api->select($myfields, $mytable, $where);

        if ($result != 0) {
            $result = $this->db_api->select("created_by", "os_all_store", "created_by=" . $result[0]["profile_id"]);
            if ($result != 0) {
                echo 2;
            } else {
                echo 1;
            }
        } else {
            //print_R($result[][]);
            if ($result == 0) {
                echo 2;
            } else {
                echo 1;
            }
        }
    }

    //05-june-2015 by venkatesh : this function insert the store my staff details
    function staff_insertion() {
        //print_R($_REQUEST);    print_R($_REQUEST["STORE_ID"]);    print_R($_REQUEST["order_manager_id"]);    print_R($_REQUEST["stock_manager_id"]);

        $this->load->module("products");
        $store_aid = $this->products->store_aid_return($_REQUEST["STORE_ID"]);
        for ($a = 1; $a <= (count($_REQUEST) - 1) / 2; $a++) {


            if ($a == 1) {
                $order_manager_emails = "~" . $this->userid_return_basedon_email($_REQUEST["order_manager_id" . $a . ""]) . "~";
            } else {
                $order_manager_emails.="~" . $this->userid_return_basedon_email($_REQUEST["order_manager_id" . $a]) . "~";
            }
            if ($a == 1) {
                $store_manager_emails = "~" . $this->userid_return_basedon_email($_REQUEST["stock_manager_id" . $a]) . "~";
            } else {
                $store_manager_emails.="~" . $this->userid_return_basedon_email($_REQUEST["stock_manager_id" . $a]) . "~";
            }
        }

        $a_data = array(
            "order_manager_emails" => $order_manager_emails,
            "store_manager_emails" => $store_manager_emails,
        );
        foreach ($a_data as $key => $val) {
            $a_data[$key] = $this->test_input($a_data[$key]);
        }
        $mytable = "os_store_settings";
        $s_where = "store_id_fk ='" . $store_aid . "'";
        $result = $this->db_api->update($a_data, $mytable, $s_where);
        if ($result == 1) {
            $this->staffMail($order_manager_emails, $store_manager_emails, $store_aid);
        }
        echo $result;
    }

// function to send mail to store owner and managers when store owner assign any user as manager by Pavani on 16-06-2015
    function staffMail($order_manager_emails = "5,4", $store_manager_emails = '6,3', $store_aid = 8) {
        $dbapi = $this->load->module("db_api");
        $s_query = "SELECT * FROM os_store_settings settings WHERE settings.store_id_fk=" . $store_aid;
        $settings_data = $dbapi->custom($s_query);
        $s_squery = "SELECT * FROM os_all_store WHERE store_aid=" . $store_aid;
        $stores_data = $dbapi->custom($s_squery);
        $to_users = $stores_data[0]["created_by"];
        $s_profiles = "";
        $omanagers_arry = explode(",", $order_manager_emails);
        $smanagers_arry = explode(",", $store_manager_emails);
        $managers_arry = array_merge($omanagers_arry, $smanagers_arry);
        $s_profiles.=$settings_data[0]["order_manager_emails"] . "," . $settings_data[0]["store_manager_emails"];
        if ($settings_data != 0) {
            $profiles_arry = explode(",", $s_profiles);
            for ($i = 0; $i < count($managers_arry); $i++) {
                $item = $managers_arry[$i];
                if (!(in_array($item, $profiles_arry))) {
                    $to_users.="," . $managers_arry[$i];
                }
            }
        } else {
            $to_users.=$s_profiles;
        }
        $s_pwhere = "profile_id IN ($to_users)";
        $rslt = $dbapi->select("*", "iws_profiles", $s_pwhere);
        //var_dump($rslt);
        $to_address = "";
        foreach ($rslt as $res) {
            if ($to_address == "") {
                $to_address = $to_address . $res["email"];
            } else {
                $to_address = $to_address . "," . $res["email"];
            }
        }
        $path = APPPATH . 'libraries/My_PHPMailer.php';
        $mailobj = new My_PHPMailer();
        $subject = "Store privileges";
        $mresult = $mailobj->send_mail($to_address, $subject, "This is the mail to test the mail services");
    }

    //06-june-2015 by venkatesh : this function return user profile id based on email
    function userid_return_basedon_email($email) {
        $one_idnet_email = $email;
        $myfields = "profile_id";
        $where = "email= '" . $one_idnet_email . "'";
        $mytable = "iws_profiles";
        $result = $this->db_api->select($myfields, $mytable, $where);
        return $result[0]["profile_id"];
    }

    //08-june-2015 by venkatesh : this function update the notification settings
    function notification_update() {
        $this->load->module("products");
        $store_aid = $this->products->store_aid_return($_REQUEST["STORE_ID"]);
        $a_data = array(
            "notify_new_orders" => $_REQUEST["osdev_order_recived"],
            "notify_out_of_stock" => $_REQUEST["osdev_outof_stock"],
            "notify_report" => $_REQUEST['osdev_reported_onstore'],
            "notify_cancel" => $_REQUEST['osdev_cancle_order']
        );
        foreach ($a_data as $key => $val) {
            $a_data[$key] = $this->test_input($a_data[$key]);
        }
        $mytable = "os_store_settings";
        $s_where = "store_id_fk ='" . $store_aid . "'";
        $result = ( $this->db_api->update($a_data, $mytable, $s_where));
        print_R($result);
    }

// 17-06-2015 by Venkatesh
    function report_on_store() {
        //print_R($_REQUEST);    print_R($_FILES);
        $user_id = $this->get_UserId();
        $store_logo_image_name = '';
        if ($_FILES['report_snapshot']['name']) {
            $date = new DateTime();
            $date = $date->format('Y_m_d_H_i_s');
            $uploaddir = "data/report_snapshot/";
            $cover_name = basename($_FILES['report_snapshot']['name']);
            //list($txt, $ext) = explode(".", $cover_name);
            $ext = end(explode(".", $cover_name));
            $store_logo_image_name = $_REQUEST["store_aid"] . $user_id . $date . "." . $ext;
            shell_exec('chmod -R 777 /var/www/html/oneshop');
            if (move_uploaded_file($_FILES['report_snapshot']['tmp_name'], $uploaddir . $store_logo_image_name)) {
                shell_exec('chmod -R 777 ' . $uploaddir . $store_logo_image_name);
            }
        }
        $a_data = array(
            "store_id" => $_REQUEST['store_aid'],
            "title" => $_REQUEST["report_title"],
            "description" => $_REQUEST['report_description'],
            "reported_by" => $user_id,
            "attachment_path" => $store_logo_image_name
        );
        foreach ($a_data as $key => $val) {
            $a_data[$key] = $this->test_input($a_data[$key]);
        }
        $mytable = "os_store_problems";
        $rlt = $this->db_api->insert($a_data, $mytable);
        print_R($rlt);
        $this->load->module("notification");
        $this->notification->report_onstore_notification($a_data);

        /*  $store_logo_image_name='';
          $a_data = array(
          "store_id" => 8,
          "title" => "thokkalo problem",
          "description" => "thokkalo description",
          "reported_by" => 1,
          "attachment_path" => $store_logo_image_name
          );
          $this->load->module("notification");
          $this->notification->report_onstore_notification($a_data); */
    }

//24-june-2015 by venkatesh : this function insert the user rating to store
    function store_rating() {
        $db_obj = $this->load->module("db_api");
        $rlt = $db_obj->custom("update os_store_settings set rank_weitage=rank_weitage+" . $_REQUEST["rating"] . ",review_count=review_count+1 where store_id_fk=" . $_REQUEST["os_store_aid"]);
    }

    function brand_store_results($bname = null) {

        $db_obj = $this->load->module("db_api");
        $hm_obj = $this->load->module("home");
        // $cnt=$hm_obj->country_info_based_on_ip();
        $cookies_obj = $this->load->module("cookies");
        $country_id = $cookies_obj->getUserCountryID();
        if ($_REQUEST["load_product_count"]) {
            $bname = $_REQUEST["brand_name"];
            $load_product_count = $_REQUEST["load_product_count"];
            $qury = "select distinct(oas.store_aid),oas.store_id,oas.name,oas.logo_path,oas.visit_count from os_all_store oas left join os_products osp on oas.store_aid=osp.store_id where osp.brand_name='$bname' and oas.country=" . $country_id . " limit $load_product_count,8";
        } else {
            $qury = "select distinct(oas.store_aid),oas.store_id,oas.name,oas.logo_path,oas.visit_count from os_all_store oas left join os_products osp on oas.store_aid=osp.store_id where osp.brand_name='$bname' and oas.country=" . $country_id . " limit 0,8";
        }

        $rlt = $db_obj->custom($qury);
        $data["stores_data"] = $rlt;
        $this->load->view("stores/brand_store_results", $data);
    }

    //26 june 2015 by ramadevi to insert official persons data
    function officialStoreInfo() {
        $db_obj = $this->load->module('db_api');
        // print_R($_REQUEST);
        $a_data = array(
            "store_id_fk" => $_REQUEST['custom'],
            "store_name" => $_REQUEST['official_storename'],
            "reference_name" => $_REQUEST['official_helpline'],
            "reference_number" => $_REQUEST['official_enquirynumber'],
            "description" => $_REQUEST['official_description'],
            "current_country" => $_REQUEST['official_country_id'],
            "current_state" => $_REQUEST['dev_os_state_list_official'],
            "current_city" => $_REQUEST['dev_os_cities_list_official'],
            "address_line1" => $_REQUEST['official_addressline1'],
            "address_line2" => $_REQUEST['official_addressline2'],
            "zipcode" => $_REQUEST['official_zipcode'],
            "personal_mob_no" => $_REQUEST['official_mobile_num'],
            "personal_email_id" => $_REQUEST['official_emailId'],
            "company_name" => $_REQUEST['official_company'],
            "website" => $_REQUEST['official_website'],
            "company_turnover" => $_REQUEST['official_turnover'],
            "landline_no" => $_REQUEST['official_landline_number'],
            "landline_extn" => $_REQUEST['official_landline_number_ext']
        );
        foreach ($a_data as $key => $val) {
            $a_data[$key] = $this->test_input($a_data[$key]);
        }
        $mytable = "os_store_official";
        $reuslt = $db_obj->insert($a_data, $mytable);
        echo $reuslt;
    }

    // function to check whether store official details exists or not by Pavani on 30-06-2015
    function getOfficialStatus() {
        $store_id = $this->input->post("store_aid");
        $db_obj = $this->load->module('db_api');
        $official_result = $db_obj->select("COUNT(*) AS cnt", "os_store_official", "store_id_fk=$store_id");
        echo $official_result[0]["cnt"];
    }

    // function to display the quotation by Pavani on 29-06-2015
    function quotation($store_id) {
        $dbapi = $this->load->module("db_api");
        $s_query = "select * from os_store_tmp tmp inner join os_store_packages packages on tmp.package_id_fk=packages.package_id where tmp.store_id='" . $store_id . "'";
        $result = $dbapi->custom($s_query);
        $data["store_id"] = $result[0]["store_id"];
        $data["amount"] = $result[0]["price"];
        $data["package_name"] = $result[0]["package_name"];
        $data["storage"] = $result[0]["storage"];
        $this->load->view("stores/quotation", $data);
    }

    // function to save details after making payment for the stores by Pavani on 29-06-2015
    function buyStores() {
        $id = $this->get_UserId();
        if ($_REQUEST['txn_id'] != 0 && $_REQUEST['payer_status'] == 'verified') {
            $mc_gross = $_REQUEST['mc_gross'];
            $payer_email = $_REQUEST['payer_email'];
            $item_number = $_REQUEST['item_number'];
            $store_id = $_REQUEST['custom'];
            $dbapi = $this->load->module("db_api");
            $result = $dbapi->select("*", "os_store_tmp", "store_id='$store_id'");
            $a_data = array(
                "store_id" => $result[0]["store_id"], "name" => $result[0]["name"], "package" => $result[0]['package'], "city" => $result[0]['city'], "state" => $result[0]['state'], "country" => $result[0]["country"], "zip_code" => $result[0]["zip_code"], "enq_mobile_number" => $result[0]["enq_mobile_number"], "helpline_number" => $result[0]["helpline_number"], "service_email" => $result[0]["service_email"], "prob_reporting_email" => $result[0]["prob_reporting_email"], "timezone" => $result[0]["timezone"], "logo_path" => $result[0]["logo_path"], "cover_path" => $result[0]["cover_path"], "expired_on" => $result[0]["expired_on"], "is_official" => 0, "created_by" => $id, "storage" => $result[0]["storage"]
            );
            foreach ($a_data as $key => $val) {
                $a_data[$key] = $this->test_input($a_data[$key]);
            }
            $mytable = "os_all_store";
            $rlt = $dbapi->insert($a_data, $mytable);
            if ($rlt == 1) {
                $s_where = "store_id='$store_id'";
                $stores_data = select("MAX(store_aid) as store_aid", "os_all_store", $s_where);
                $current_date = date("Y-m-d H:i:s");
                $expired_on = date("Y-m-d H:i:s", strtotime("+30 days"));
                $a_rfields = array("store_id_fk" => $stores_data[0]["store_aid"], "package_id_fk" => $result[0]["package_id_fk"], "renewed_on" => $current_date, "expired_on" => $expired_on, "is_renewed" => 1);
                $s_dwhere = "store_id='" . $result[0]["store_id"] . "'";
                $dbapi->delete("os_store_tmp", $s_dwhere);
                $surl = base_url() . "home/mystore_Profile_Page/" . $result[0]["store_id"];
                header("Location:$surl");
            }
        }
    }

    function publicStores() {
        $db_obj = $this->load->module("db_api");
        $id = $this->get_UserId();
        $data["public_stores"] = $db_obj->custom("SELECT * FROM os_public_products WHERE is_sold=0");
        //var_dump($data);
        $this->load->view("stores/public_stores", $data);
    }

    /*     * * 03-08-2015 Srujan Kumar Promoted Stores *** */

    function promoted_Stores() {
        $homeObj = $this->load->module('home');
        $user_id = $homeObj->get_UserId();
        $dbapi = $this->load->module("db_api");
        include("/var/www/html/includes/" . $user_id . "/" . $user_id . ".php");

        $arr = json_decode($promotions);
        $campaign_Id = $arr[0]->oneshop_promotions;
        if ($campaign_Id) {
            $campaign_details = array();
            $cdate = date('Y-m-d');
            for ($i = 0; $i < count($campaign_Id); $i++) {
                $res = $dbapi->custom("SELECT cp.campaign_id,cp.campaign_name,cp.created_by FROM on_campaigns cp JOIN `on_campaign_targets` ct ON cp.campaign_id = ct.campaign_id_fk WHERE cp.campaign_id='" . $campaign_Id[$i] . "' AND cp.campign_type = 'Oneshop: Store Promotion' AND ct.date='" . $cdate . "' AND ct.user_id_fk='" . $user_id . "'");
                if ($res != 0) {
                    $campaign_details[] = $res;
                }
            }
            foreach ($campaign_details as $res) {
                $result[] = $dbapi->custom("SELECT os.store_aid,os.store_id,os.name,os.logo_path,cp.campaign_name FROM `os_all_store` os JOIN on_campaigns cp ON cp.created_by = os.created_by WHERE os.created_by='" . $res[0]['created_by'] . "' AND cp.campaign_id='" . $res[0]['campaign_id'] . "'");
            }
            $data["promoted_stores"] = $result;
            $this->load->view('stores/promoted_stores', $data);
        }
    }

    function getAllStoreProdCategories($store_code) {

        $db_obj = $this->load->module("db_api");
        $oshopStoreQry = "SELECT store_aid FROM oshop_stores WHERE store_code = '" . $store_code . "'";
        $storeRes = $db_obj->custom($oshopStoreQry);
        $store_aid = $storeRes[0]["store_aid"]; 
        $menuCategoryQry = "SELECT oc.groups,oc.category_name,oc.product FROM oshop_products op INNER JOIN oshop_categories oc ON oc.category_id_fk = op.product_category_id_fk AND oc.is_active =1 INNER JOIN oshop_stores os ON os.store_aid = op.store_id_fk WHERE op.store_id_fk = '" . $store_aid . "' GROUP BY oc.groups, oc.category_name,oc.product";
        $prodCatRes = $db_obj->custom($menuCategoryQry);
        return $prodCatRes;

    }

    function getRecentAddedProducts() {
        $db_obj = $this->load->module("db_api");
        $prodQry = "SELECT prods.product_name, prods.product_aid, prods.cost_price AS price, prods.primary_image, prods.secondary_image, prods.tertiary_image, prods.quaternary_image " .
                "FROM oshop_filtration_electronics osf " .
                "RIGHT JOIN oshop_products prods ON osf.product_aid_fk = prods.product_aid " .
                "ORDER BY product_aid DESC LIMIT 0,3";
        $prodRes = $db_obj->custom($prodQry);
        return $prodRes;
    }

    //Activity Display results @admin home page
    function getRecentActivitys($store_id) {
      $db_obj = $this->load->module("db_api");
      //$storeActQry = "SELECT osr.* FROM oshop_store_reviews osr INNER JOIN oshop_stores os ON os.store_aid = osr.store_id_fk WHERE os.store_code = '" . $store_code . "' ORDER BY os.store_aid DESC LIMIT 0,5";
      $storeActQry = "SELECT commented_on,review_text,rating,profile_name FROM oshop_store_reviews osr INNER JOIN os_user_details os ON os.profile_id_fk = osr.user_id_fk WHERE osr.store_id_fk = '" . $store_id . "' AND DATE(commented_on)=CURDATE()";
      $activityRes = $db_obj->custom($storeActQry);
      $cancelQry = "select order_code,profile_name,(select product_name from oshop_products where product_aid=cancel.product_id_fk) AS product_name,cancellation_time FROM oshop_cancellation cancel inner join oshop_orders orders on cancel.order_id_fk=orders.order_aid inner join os_user_details users on orders.ordered_by=users.profile_id_fk where store_id_fk=".$store_id." AND DATE(cancellation_time)=CURDATE()";
      $cancel_res = $db_obj->custom($cancelQry);
      //echo "SELECT product_code,product_name,profile_name FROM oshop_products prods inner join os_user_details users ON prods.added_by=users.profile_id_fk WHERE DATE(added_on)=CURDATE() AND store_id_fk=".$store_id;
      $products_result=$db_obj->custom("SELECT product_code,product_name,profile_name,added_on FROM oshop_products prods inner join os_user_details users ON prods.added_by=users.profile_id_fk WHERE DATE(added_on)=CURDATE() AND store_id_fk=".$store_id);
      $orders_query="SELECT profile_name,product_name,order_code,total_amount,time FROM oshop_orders orders INNER JOIN oshop_order_items items ON orders.order_aid=items.order_id_fk INNER JOIN oshop_products prods ON items.product_id_fk=prods.product_aid INNER JOIN os_user_details users WHERE orders.store_id_fk=".$store_id." AND users.profile_id_fk=orders.ordered_by AND orders.status='JUST_PLACED' AND DATE(time)=CURDATE()";
      $orders_res = $db_obj->custom($orders_query);
      $data["today_orders"]=$orders_res;
      //$products_result=$db_obj->custom("SELECT product_code,product_name,profile_name FROM oshop_products prods inner join os_user_details users ON prods.added_by=users.profile_id_fk WHERE DATE(added_on)=CURDATE() AND store_id_fk=".$store_id);
      $data["today_reviews"]=$activityRes;
      $data["cancellations"]=$cancel_res;
      $data["products_added"]=$products_result;
      //$data["today_orders"]=$orders_result;
      return $data;
      //return $activityRes;
    }

    //ADDED BY RAVITEJA - 24012016
    function storeReviews($store_code) {
        $data["store_details"] = $this->getStoreDetailsByStoreCode($store_code);
        $home_obj=$this->load->module("home");
        $staff_result=$home_obj->getStaffDetails($store_code);
        $this->load->view("stores/store_reviews", $data);
    }

    function storeReviewsTpl($store_code) {
        $db_obj = $this->load->module("db_api");
        //$storeActQry = "SELECT osr.* FROM oshop_store_reviews osr INNER JOIN oshop_stores os ON os.store_aid = osr.store_id_fk WHERE os.store_code = '".$store_code."' ORDER BY osr.rating DESC LIMIT 0,5";
        $stores_result = $this->getStoreDetailsByStoreCode($store_code);
        $store_aid = $stores_result[0]["store_aid"];
        //$storeActQry = "SELECT osr.review_text,osr.rating,commented_on,profiles.user_id,profiles.first_name,profiles.middle_name,profiles.last_name,profiles.img_path FROM oshop_store_reviews osr INNER JOIN iws_profiles profiles ON osr.user_id_fk=profiles.profile_id WHERE osr.store_id_fk=" . $store_aid . " LIMIT 0,5";
        $storeActQry = "SELECT osr.review_text,osr.rating,commented_on,profiles.profile_id_fk,profiles.profile_img,profiles.profile_name,(SELECT user_id FROM iws_profiles WHERE profile_id=profile_id_fk) as user_id FROM oshop_store_reviews osr INNER JOIN os_user_details profiles ON osr.user_id_fk=profiles.profile_id_fk WHERE osr.store_id_fk=" . $store_aid;
        $activityRes = $db_obj->custom($storeActQry);
        $data['totalreviews'] = $activityRes;
        $this->load->view("stores/store_reviews_tpl", $data);
    }

    function getUserinfo($user_id) {
        $db_obj = $this->load->module("db_api");
        $userQry = "SELECT first_name,middle_name,last_name,img_path FROM iws_profiles WHERE profile_id ='" . $user_id . "'";
        $activityRes = $db_obj->custom($userQry);
        $uinfo['fullName'] = $activityRes[0]['first_name'] . " " . $activityRes[0]['middle_name'] . " " . $activityRes[0]['last_name'];
        $uinfo['img_path'] = $activityRes[0]['img_path'];
        return $uinfo;
    }

    // function to display the stores suggestions by Pavani on 25-01-2016
    function getStoresList() {
        $db_api = $this->load->module("db_api");
        $user_id = $this->get_UserId();
        $stores_res = $db_api->custom("SELECT store_code,profile_image_path,store_aid,store_name FROM oshop_stores WHERE created_by!=" . $user_id . " ORDER BY RAND() LIMIT 10");
        // echo $stores_res[0]["store_name"];
        return $stores_res;
    }

    // function to display the store activity log on 25-01-2016 by Pavani
    function storeActivityLog($store_code) {
      $home_obj=$this->load->module("home");
        $staff_result=$home_obj->getStaffDetails($store_code);
        if($staff_result[0]["cnt"]==0||$staff_result[0]["cnt"]=="PRODUCT_MANAGER"||$staff_result[0]["cnt"]=="ORDER_MANAGER"){
          redirect(base_url());
        }
        $data["store_details"] = $this->getStoreDetailsByStoreCode($store_code);
        $data["store_code"] = $store_code;
        $this->load->view("stores/store_activity_log", $data);
    }

    function getStoreReviewsDetails($store_id) {
        $db_api = $this->load->module("db_api");
        $store_rating_query = "SELECT profile_id,first_name,last_name,username,img_path,commented_on,review_text FROM oshop_store_reviews osr inner join iws_profiles profiles on osr.user_id_fk=profiles.profile_id WHERE store_id_fk=" . $store_id . " ORDER BY commented_on DESC LIMIT 6";
        $store_ratings_res = $db_api->custom($store_rating_query);
        return $store_ratings_res;
    }

    function getProductReviewsDetails($store_id, $filter_date) {
        $db_api = $this->load->module("db_api");
        $product_ratings_query = "SELECT profile_id,first_name,last_name,username,img_path as profile_image,text,rating,product_aid,product_code,product_name,primary_image,rating_on FROM oshop_product_reviews opr INNER JOIN oshop_products op ON opr.product_aid_fk=op.product_aid INNER JOIN iws_profiles profiles ON opr.user_id_fk=profiles.profile_id WHERE store_id_fk=".$store_id." ORDER BY opr.rating_on DESC LIMIT 6";
        $product_ratings_res = $db_api->custom($product_ratings_query);
        return $product_ratings_res;
    }

    function getCancellationDetails($store_id) {
        $db_api = $this->load->module("db_api");
        $query = "SELECT product_aid,product_name,orders.ordered_by,cancellation_time,profiles.profile_id,profiles.username,profiles.img_path,profiles.first_name,profiles.last_name FROM `oshop_cancellation` oc inner join oshop_orders orders on oc.order_id_fk=orders.order_aid inner join oshop_order_items oitems on orders.order_aid=oitems.order_id_fk inner join oshop_products prods on oitems.product_id_fk=prods.product_aid inner join iws_profiles profiles on orders.ordered_by=profiles.profile_id where orders.store_id_fk=" . $store_id . " ORDER BY cancellation_time DESC LIMIT 6";
        $result = $db_api->custom($query);
        return $result;
    }

    function getCartDetails($store_id) {
        $db_api = $this->load->module("db_api");
        $query = "select first_name,last_name,profile_id,product_aid,product_code,product_name,username,img_path,primary_image,ocart.added_on from oshop_cart_items ocart inner join oshop_products prods on ocart.product_id_fk=prods.product_aid inner join iws_profiles profiles on ocart.profile_id=profiles.profile_id where ocart.store_id_fk=" . $store_id . " ORDER BY ocart.added_on DESC";
        $cart_details = $db_api->custom($query);
        return $cart_details;
    }

    function getWishlistDetails($store_id) {
        $db_api = $this->load->module("db_api");
        $query = "select first_name,last_name,product_aid,product_code,product_name,username,profile_id,img_path,primary_image,owish.added_on from os_wishlist owish inner join oshop_products prods on owish.product_id_fk=prods.product_aid inner join iws_profiles profiles on owish.profile_id=profiles.profile_id where store_id_fk=" . $store_id . " order by owish.added_on desc";
        $result = $db_api->custom($query);
        return $result;
    }

    function getOrderDetails($store_id) {
        $db_api = $this->load->module("db_api");
        $orders_query = "select first_name,last_name,product_aid,product_name,username,profile_id,orders.time as order_date,img_path from oshop_orders orders inner join oshop_order_items oitems on orders.order_aid=oitems.order_id_fk inner join oshop_products prods on oitems.product_id_fk=prods.product_aid left join iws_profiles profiles on orders.ordered_by=profiles.profile_id where orders.store_id_fk=" . $store_id;
        $orders_res = $db_api->custom($orders_query);
        return $orders_res;
    }

    function getOrderDetails1($store_id) {
        $db_api = $this->load->module("db_api");
        $orders_query = "SELECT * FROM os_orders WHERE store_id_fk=" . $store_id . " ORDER BY order_date DESC LIMIT 6";
        $orders_res = $db_api->custom($orders_query);
        $product_str = "";
        foreach ($orders_res as $olist) {
            $prd_str = $olist["product_id_str"];
            if (strpos($prd_str, "~") != "") {
                $product_id_str = $olist["product_id_str"];
                $prod_str = str_replace("~", ",", $product_id_str);
            } else {
                $prod_str = $olist["product_id_str"];
            }
            if ($product_str == "") {
                $product_str = $prod_str;
            } else {
                $product_str = "," . $prod_str;
            }
        }
        $orders_qry = "select first_name,last_name,product_aid,product_name,ordered_by,username,img_path,primary_image from os_orders orders inner join oshop_products prods on orders.store_id_fk=prods.store_id_fk inner join iws_profiles profiles on orders.ordered_by=profiles.profile_id where product_aid IN (" . $product_str . ")";
        $orders_result = $db_api->custom($orders_qry);
        return $orders_result;
        /* echo "<pre>";
          print_r($orders_result);
          echo "</pre>"; */
        //select product_aid,product_name,ordered_by,username,img_path,primary_image from os_orders orders inner join oshop_products prods on orders.store_id_fk=prods.store_id_fk inner join iws_profiles profiles on orders.ordered_by=profiles.profile_id where product_aid IN (58);
        //return $orders_result;
    }

    function storeActivityLogTpl($store_code) {
        $db_api = $this->load->module("db_api");
        $filter_by = ($this->input->post("filter_by") != "") ? $this->input->post("filter_by") : "default";
        $store_result = $db_api->select("store_aid,store_code,store_name", "oshop_stores", "store_code='" . $store_code . "'");
        $store_id = $store_result[0]["store_aid"];
        //$this->storeActivityLogTpl($store_id);        
        $data["store_info"] = $store_result;
        if ($filter_by == "order_cancellations" || $filter_by == "default") {
            $data["order_cancellations"] = $this->getCancellationDetails($store_id);
        } else {
            $data["order_cancellations"] = 0;
        }
        if ($filter_by == "orders" || $filter_by == "default") {
            $data["order_details"] = $this->getOrderDetails($store_id);
        } else {
            $data["order_details"] = 0;
        }
        if ($filter_by == "cart_items" || $filter_by == "default") {
            $data["cart_details"] = $this->getCartDetails($store_id);
        } else {
            $data["cart_details"] = 0;
        }
        if ($filter_by == "wishlist" || $filter_by == "default") {
            $data["wishlist_details"] = $this->getWishlistDetails($store_id);
        } else {
            $data["wishlist_details"] = 0;
        }
        if ($filter_by == "product_reviews" || $filter_by == "default") {
            $data["product_ratings"] = $this->getProductReviewsDetails($store_id);
        } else {
            $data["product_ratings"] = 0;
        }
        if ($filter_by == "store_reviews" || $filter_by == "default") {
            $data["store_ratings"] = $this->getStoreReviewsDetails($store_id);
        } else {
            $data["store_ratings"] = 0;
        }
        $data["filter_mode"]=$filter_by;
        $this->load->view("stores/store_activity_log_tpl", $data);
    }

    // function to get the stores details by store code
    function getStoreDtlsByStoreId($store_id) {
        $db_api = $this->load->module("db_api");
        $store_result = $db_api->select("*", "oshop_stores", "store_aid='" . $store_id . "'");
        return $store_result;
    }

    //Get Order details by Store(Anil 12/Feb/2016)
    function getOrdersByStoreCode($store_code) {
        $db_api = $this->load->module("db_api");
        $oshopStoreQry = "SELECT store_aid FROM oshop_stores WHERE store_code = '" . $store_code . "'";
        $storeRes = $db_api->custom($oshopStoreQry);
        $store_aid = $storeRes[0]["store_aid"];
        $orderQry = "SELECT osr.*,op.* FROM oshop_orders osr " .
                "INNER JOIN oshop_products op ON osr.product_id_fk = op.product_aid " .
                "WHERE osr.store_id_fk = '" . $store_aid . "'";
        $store_order_result = $db_api->custom($orderQry);
        return $store_order_result;
    }

    function updateorder() {
        $db_api = $this->load->module("db_api");
        $sid = $this->input->post("sid");
        $status = $this->input->post("status");
        $ddstatus = $this->input->post("ddstatus");
        $sql = "update oshop_orders set status='$status',order_delivery_detail='$ddstatus' where order_aid=$sid";
        $result = $db_api->custom($sql);
        /* notification for changing the order */
        //if($result!=0){
        $notification = $this->load->module("notification");
        $notification->all_notification('ORDER_CHANGE', '', $sid, '', $status);
        //}
        /* notification for changing the order */
        $status = $db_api->select("status", "oshop_orders", "order_aid=$sid");
        echo $status[0]["status"];
    }

    //shiva jyothi : following store detlais
    function followingStores_Info() {
        $dbapi = $this->load->module("db_api");
        $userid = $this->get_UserId();
        $sql = "SELECT os.store_aid , os.store_name  ,  avg(osr.rating) as rating, os.store_code,os.profile_image_path ,os.cover_image_path ,of.user_id_fk FROM `oshop_followings` as of 
left join `oshop_stores` as os on of.store_id_fk = os.store_aid 
left join 	`oshop_store_reviews` as osr  on  osr.store_id_fk =os.store_aid
where of.user_id_fk =$userid  group by store_aid limit 0,10  ";
        $data['store'] = $dbapi->custom($sql);
        $this->load->view('stores/following_stores', $data);
    }

//shiva jyothi : unfollow  store 
    function store_unfollow() {
        $dbapi = $this->load->module("db_api");
        $store_id = $this->input->post('store_id');
        $userid = $this->get_UserId();
        $sql = "DELETE from `oshop_followings` where  user_id_fk =$userid   and store_id_fk =$store_id ";
        echo $dbapi->custom($sql);
    }

    //Find  all stores Details:Gouthami
    /* function getStoreDetails_Info() {
      $dbapi = $this->load->module("db_api");
      //$userid = $this->get_UserId();
      $sql = "select * from oshop_stores order by  rand() ";
      $data['store'] = $dbapi->custom($sql);
      if ($data['store'] == 0) {
      echo '<b>No Stores Found</b>';
      } else {
      $this->load->view('store_search_result', $data);
      }
      } */
    //june 28 2016 by venkatesh
    function getStoreDetails_Info() {        
        $dbapi = $this->load->module("db_api");
        $page_count = ($this->input->post("page_count") != "" ? $this->input->post("page_count") : 0);        
        $category = ($this->input->post("category") != "" ? $this->input->post("category") : "");
        $sub_category = ($this->input->post("category_filter") != "" ? $this->input->post("category_filter") : "");
        $search_name = ($this->input->post("store_name") != "" ? $this->input->post("store_name") : "");
        $where = "";
        $sql = 'SELECT store_aid,store_code,store_name,profile_image_path,avg_rating,is_official FROM oshop_stores';
        if (trim($category) == "Category") {
            $where.=" WHERE store_category='". $sub_category."'";
        }elseif (trim($category) == "Country") {
            $where.=" WHERE country='" . $sub_category."'";
        } elseif (trim($category) == "City") {
            //  $where.=" WHERE city=".$sub_category;
            $where.=" WHERE city LIKE '%" . $sub_category . "%'";
            ;
        } elseif (trim($category) == "Services") {
            $where.=" WHERE services LIKE '%" . $sub_category . "%'";
        }
        if (trim($search_name) != "") {            
            if ($where != "") {
                $where.=" AND store_name LIKE '%" . $search_name . "%'";
            }else{
                $where.=" WHERE store_name LIKE '%" . $search_name . "%'";
            }
        }
         $sql = $sql . $where . ' ORDER BY registered_on DESC LIMIT ' . $page_count . ',8';     
        $data['store'] = $dbapi->custom($sql);
        $this->load->view('store_search_result', $data);
    }
    //Find stores :Pavani
    function getCountries() {
        $dbapi = $this->load->module("db_api");
        $countries_res = $dbapi->custom("SELECT country_id,country_name FROM iws_countries_info ORDER BY country_name");
        $options = "";
        for ($i = 0; $i < count($countries_res); $i++) {
            if ($options == "") {
                $options = $countries_res[$i]["country_id"] . ":" . $countries_res[$i]["country_name"];
            } else {
                $options.="~" . $countries_res[$i]["country_id"] . ":" . $countries_res[$i]["country_name"];
            }
        }
        echo $options;
    }

    function getCategories() {
        $dbapi = $this->load->module("db_api");
        $categories_res = $dbapi->custom("SELECT category_id_fk,category_name FROM oshop_categories GROUP BY category_name");
        $options = "";
        for ($i = 0; $i < count($categories_res); $i++) {
            if ($options == "") {
                $options = $categories_res[$i]["category_id_fk"] . ":" . $categories_res[$i]["category_name"];
            } else {
                $options.="~" . $categories_res[$i]["category_id_fk"] . ":" . $categories_res[$i]["category_name"];
            }
        }
        echo $options;
    }

    function getFriend_Info() {
        $dbapi = $this->load->module("db_api");
        $userid = $this->get_UserId();
        echo $sql = "SELECT ifd.friend_id as friend_id,iws.first_name, iws.middle_name,iws.last_name FROM `iws_friends_list` as ifd left join iws_profiles as iws on iws.profile_id=ifd.friend_id where ifd.iws_profile_id=$userid group by username";
        $frnd_res = $dbapi->custom($sql);
        $options = "";
        for ($i = 0; $i < count($frnd_res); $i++) {
            $options.="<option value='" . $frnd_res[$i]["friend_id"] . "'>" . $frnd_res[$i]["first_name"] . "&nbsp" . $frnd_res[$i]["middle_name"] . "&nbsp" . $frnd_res[$i]["last_name"] . "</option>";
        }
        echo $options;
    }

    //Find stores :Gouthami
    function setStoreSearchCountry_Info() {
        $dbapi = $this->load->module("db_api");
        $userid = $this->get_UserId();
        $storename = $this->input->post("search_val");
        //$cityid=$this->input->post("sub_cities");
        $country_id = $this->input->post("country_id");
        $sql = "select * from oshop_stores  where store_name like'%$storename%' and country=$country_id  and created_by=$userid order by  rand()";
        $data['storedta'] = $dbapi->custom($sql);
        // print_r($data);
        if ($data['storedta'] == 0) {
            echo '<b>No Stores Found</b>';
        } else {
            //print_r($data);
            $this->load->view('search_storeres', $data);
        }
    }

    function setStoreSearchFriend_Info() {
        $dbapi = $this->load->module("db_api");
        $userid = $this->get_UserId();
        $storename = $this->input->post("search_val");
        //$cityid=$this->input->post("sub_cities");
        $suser_id = $this->input->post("country_id");
        $sql = "select * from oshop_stores  where store_name like'%$storename%' and created_by=$suser_id order by  rand()";
        $data['storedta'] = $dbapi->custom($sql);
        // print_r($data);
        if ($data['storedta'] == 0) {
            echo '<b>No Stores Found</b>';
        } else {
            $this->load->view('search_storeres', $data);
        }
    }

    function promoPopup() {
        $store_code = $this->input->post("store_code");
        $db_api = $this->load->module("db_api");
        $result = $db_api->select("store_aid", "oshop_stores", "store_code='" . $store_code . "'");
        $data["store_result"] = $result;
        $this->load->view("stores/promo_popup", $data);
    }

    // function to display the popup when the call request is called
    function callRequestPopup() {
        $store_code = $this->input->post("store_code");
        $db_api = $this->load->module("db_api");
        $result = $db_api->select("store_code,store_name,store_aid,services", "oshop_stores", "store_code='" . $store_code . "'");
        $data["store_result"] = $result;
        $this->load->view("stores/call_request_popup", $data);
    }

    function insertCallReq() {
        $dbapi = $this->load->module("db_api");
        $subject = $this->input->post("subject");
        $service_enquiry = $this->input->post("service_enquiry");
        $order_no = ($this->input->post("order_number") != "") ? $this->input->post("order_number") : "";
        $service_type = $this->input->post("service_type");
        $description = $this->input->post("desc");
        $store_id = $this->input->post("store_aid");
        $user_id = $this->get_UserId();
        $store_owner=$dbapi->select("created_by","oshop_stores","store_aid=".$store_id);
        $user_email=$dbapi->select("email","iws_profiles","profile_id=".$store_owner[0]['created_by']);
        $user_details=$dbapi->select("profile_name,profile_img,profile_id_fk","os_user_details","profile_id_fk=".$user_id);
        $user_fullname=$user_details[0]["profile_name"];
        $msg='You received a report from <b>'.$user_fullname.'</b> to Your Store</a>';
        //echo $subject."->".$service_enquiry."->".$description."->".$service_type;
        $a_fields = array("submitted_by" => $user_id, "service" => $service_type, "query_area" => $service_enquiry, "subject" => $subject, "description" => $description, "store_id_fk" => $store_id, "order_number" => $order_no);
        foreach ($a_fields as $key => $val) {
            $a_fields[$key] = $this->test_input($a_fields[$key]);
        }
        $result = $dbapi->insert($a_fields, "oshop_query_submissions");
        if ($result != "") {
            $notification = $this->load->module("notification");
            $notification->all_notification("STORE_REPORT", '', '', $store_id, '');
            $body=$this->storeReport($msg,$service_enquiry,$order_no,$subject,$description);
            $this->sendactivationmail($user_email[0]["email"],"Request Query Form",$body);
        }
        echo $result;
    }

    function storeReport($msg,$senquiry,$orderno,$sub,$desc){
      $html='<html><head><title>Request Query Form</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        </head>
        <body bgcolor="grey" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
        <table id="Table_01" width="800" height="2376" border="0" cellpadding="0" cellspacing="0" align="center">
        <tr>
         <td colspan="3"><p style="color:#000;""><b style="color:#ededed; font-weight:bold; font-size:18px;">Dear,</b> <br> <br> "'. $msg.'" <br> <br> Enquiry Type : "'. $senquiry.'" <br> Order No : "'. $orderno.'" <br> Subject : "'. $sub.'" <br> Message : "'. $desc.'" <br></p></td>
        </table>
        </body>
        </html>';
      return $html;
    }

    function sendactivationmail($tomail, $subject, $text) {
        $path = APPPATH . 'libraries/My_PHPMailer.php';
        $mailobj = new My_PHPMailer();
       return $mresult = $mailobj->send_mail($tomail, $subject, $text);
    }

    function storeReviewPopup() {
        // if($_SESSION['start'] != ''){
        //     unset($_SESSION['start']);
        // }
        $dbapi=$this->load->module("db_api");
        $store_code = $this->input->post("store_code");
        $result = $this->getStoreDetailsByStoreCode($store_code);
        $orders_list=$dbapi->select("order_code","oshop_orders","store_id_fk=".$result[0]["store_aid"]." AND ordered_by=".$this->get_UserId());
        $data["store_details"] = $result;
        $data["order_details"]=$orders_list;
        $this->load->view("stores/store_reviews_popup", $data);
    }

    function insertStoreReview() {
        $db_api = $this->load->module("db_api");
        $user_id = $this->get_UserId();
        $store_id = $this->input->post("store_aid");
        $review_text = $this->input->post("review_text");
        $rate = $this->input->post("rate");
        $store_res = $db_api->select("COUNT(*) AS cnt", "oshop_store_reviews", "store_id_fk=" . $store_id . " AND user_id_fk=" . $user_id);
        $a_fields = array("store_id_fk" => $store_id, "rating" => $rate, "review_text" => $review_text, "user_id_fk" => $user_id);
        foreach ($a_fields as $key => $val) {
            $a_fields[$key] = $this->test_input($a_fields[$key]);
        }
        $result = $db_api->insert($a_fields, "oshop_store_reviews");
        $inserted_id=mysql_insert_id();
        $chrono_fields = array("recordid" => $inserted_id, "chrono_type" => "5", "userid" => $user_id);
        $this->$db_api->insert($chrono_fields, "chronoline_order");
        if ($result == 1) {
            $notifications = $this->load->module("notification");
            $notifications->all_notification("STORE_REVIEW", '', '', $store_id, '');
        }
        echo $result;
    }

    function storeThemes($store_code) {
        $data["store_details"] = $this->getStoreDetailsByStoreCode($store_code);
        $home_obj=$this->load->module("home");
        $staff_result=$home_obj->getStaffDetails($store_code);
        if($staff_result[0]["cnt"]==0||$staff_result[0]["cnt"]=="PRODUCT_MANAGER"||$staff_result[0]["cnt"]=="ORDER_MANAGER"){
          redirect(base_url());
        }
        $this->load->view("stores/store_themes", $data);
    }

    function savetheme() {
        $selected = $this->input->post("imgselected");
        $store_code = $this->input->post("store_code");
        $db_api = $this->load->module("db_api");
        $a_fields = array("theme_selected" => $selected);
        $mytable = "oshop_stores";
        $s_where = "store_code='" . $store_code . "'";
        $result = ( $this->db_api->update($a_fields, $mytable, $s_where));
        $surl = base_url() . "themes/" . $store_code;
        header("Location:$surl");
    }

    function getthemeselected($store_code) {
        $db_api = $this->load->module("db_api");
        $store_res = $db_api->select("theme_selected", "oshop_stores", "store_code='" . $store_code . "'");
        return $store_res[0]['theme_selected'];
    }

    function getCities() {
        $dbapi = $this->load->module("db_api");
        //$search_keyword=$this->input->post("search_keyword");
        $search_keyword = "al";
        $countries_res = $dbapi->custom("SELECT city_id,city_name FROM global_cities_info WHERE city_name LIKE '%" . $search_keyword . "'");
        $cities_arry = $countries_res[0];
        $return_arry = [];
        foreach ($countries_res as $list) {
            //$name = $list['city_id'].'|'.$list['city_name'];            
            $data['id'] = $list['city_id'];
            $data['value'] = $list['city_name'];
            array_push($return_arry, $data);
        }
        echo json_encode($return_arry);
        flush();
        //echo json_encode($countries_res);
    }

    // function to strip tags
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        $data = str_replace("'", "&#39", $data);
        return $data;
    }

    function getCityName() {
        $keyword = $_POST['kw'];
        $dbapi = $this->load->module("db_api");
        $cityDump = $dbapi->select("city_string", "global_cities_info", "city_string like '$keyword%' limit 4");
        foreach ($cityDump as $row) {
            $cities[] = $row['city_string'];
        }
        echo json_encode($cities);
    }

    function getCurrency($store_code) {
        $db_api = $this->load->module("db_api");
        // $storeQry = "SELECT symbol FROM iws_currencies AS iws INNER JOIN oshop_stores AS osh ON osh.currency = iws.sc WHERE osh.store_code= '" . $store_code . "'";
        // $store_res1 = $dbapi->custom($storeQry);
        // echo $store_res1[0]["symbol"];
        $store_res = $db_api->custom("select sc,symbol FROM iws_currencies AS iws INNER JOIN oshop_stores AS osh ON osh.currency = iws.sc WHERE osh.store_code='".$store_code."'");
        return $store_res[0]['symbol'];
        // return $store_res[0]['currency'];
    }

//edited by mitesh -> getcurrencyName;
    function getCurrencyName($store_code) {
        $db_api = $this->load->module("db_api");
        $store_res = $db_api->custom("select sc FROM iws_currencies AS iws INNER JOIN oshop_stores AS osh ON osh.currency = iws.sc WHERE osh.store_code='".$store_code."'");
        return $store_res[0]['sc'];
    }

//june 28 2016 by venkatesh
    function getFriendStoreDetails_Info() {
         $starting_index = 0;
        if (isset($_REQUEST['start_id'])) {
            $starting_index = $_REQUEST['start_id'];
        }
        $db_api = $this->load->module("db_api");
        $category = ($this->input->post("category") != "" ? $this->input->post("category") : "");
        $sub_category = ($this->input->post("category_filter") != "" ? $this->input->post("category_filter") : "");
        $search_name = ($this->input->post("store_name") != "" ? $this->input->post("store_name") : "");
        
          $where = "";
        $sql = 'SELECT store_aid,store_code,store_name,profile_image_path,avg_rating,total_visitors,is_official FROM oshop_stores';
        if (trim($category) == "Category") {
            $where.=" WHERE store_category='". $sub_category."'";
        }elseif (trim($category) == "Country") {
            $where.=" WHERE country='" . $sub_category."'";
        } elseif (trim($category) == "City") {
            //  $where.=" WHERE city=".$sub_category;
            $where.=" WHERE city LIKE '%" . $sub_category . "%'";
            ;
        } elseif (trim($category) == "Services") {
            $where.=" WHERE services LIKE '%" . $sub_category . "%'";
        }
        if (trim($search_name) != "") {            
            if ($where != "") {
                $where.=" AND store_name LIKE '%" . $search_name . "%'";
            }else{
                $where.=" WHERE store_name LIKE '%" . $search_name . "%'";
            }
        }
        $where.=  " and created_by in (SELECT associated_id_fk FROM `oshop_explore` where user_id_fk=" . $this->get_UserId().")";
     $sql = $sql . $where . ' ORDER BY registered_on DESC LIMIT ' . $starting_index . ',20';   
//         $query = "SELECT store_aid,store_code,store_name,profile_image_path FROM `oshop_stores` where created_by in (SELECT friend_id FROM `iws_friends_list` where iws_profile_id=" . $this->get_UserId() . " ) limit $starting_index ,20 ";       
        $store_result = $db_api->custom($sql);
        $data["friendstores"] = $store_result;
        $this->load->view("friends_storedata", $data);
    }
    
}
