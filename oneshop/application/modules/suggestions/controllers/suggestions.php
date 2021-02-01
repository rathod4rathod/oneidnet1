<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class suggestions extends CI_Controller {

    function __construct() {
        parent::__construct();
        /* session and cookies check */
        $this->load->module('imageresize');
         if ($_REQUEST) {
            $sobj = $this->load->module("session_restart");
            if (isset($_REQUEST["skey"])) {
                $sobj->key_check($_REQUEST["skey"]);
            }
        }
        /* session and cookies check */
    }

    function getUserId() {
        $cookies_obj = $this->load->module("cookies");
        $user_id = $cookies_obj->getUserID();
        return $user_id;
    }

    function getStoreSuggestions() {
        $this->load->view('suggestions/store_suggestions');
    }

    function getStoreSuggestionsTpl() {
        $dbapi = $this->load->module("db_api");
        $query="SELECT store_aid,store_name,store_code,profile_image_path FROM oshop_stores stores INNER JOIN os_user_details users ON stores.created_by=users.profile_id_fk WHERE created_by!=" . $this->getUserId() . " AND users.status='ACTIVE' AND store_aid NOT IN (SELECT store_id_fk FROM oshop_followings WHERE user_id_fk=" . $this->getUserId() . " ) AND users.status='ACTIVE' AND is_active=1 ORDER BY RAND() LIMIT 5";
        //$query = "SELECT store_aid,store_name,store_code,profile_image_path FROM oshop_stores WHERE created_by!=" . $this->getUserId() . " AND store_aid NOT IN (SELECT store_id_fk FROM oshop_followings WHERE user_id_fk=" . $this->getUserId() . " ) ORDER BY RAND() LIMIT 5";
        $result = $dbapi->custom($query);
        //print_r($result);
        $data["stores_data"] = $result;
        $this->load->view('suggestions/store_suggestions_tpl', $data);
    }

    function getProductSuggestions() {
        $dbapi = $this->load->module("db_api");
        $query = "SELECT product_aid,product_code,product_name,store_code,primary_image,sale_price FROM oshop_products prods INNER JOIN oshop_stores stores ON prods.store_id_fk=stores.store_aid INNER JOIN os_user_details users ON stores.created_by=users.profile_id_fk WHERE created_by!=" . $this->getUserId() . " AND product_aid NOT IN (SELECT product_id_fk FROM oshop_cart_items WHERE profile_id=" . $this->getUserId() . ") AND users.status='ACTIVE' AND stores.is_active=1 ORDER BY RAND() LIMIT 5";
        $result = $dbapi->custom($query);
        $data["products_data"] = $result;
        $this->load->view('suggestions/product_suggestions', $data);
    }

    function followStore() {
        $store_id = $this->input->post("store_id");
        $dbapi = $this->load->module("db_api");
        $chrono_fields = array("storeid" => $store_id, "chrono_type"=>'2', "userid" => $this->getUserId());
        $a_fields = array("store_id_fk" => $store_id, "user_id_fk" => $this->getUserId());
        $ins_result = $dbapi->insert($a_fields, "oshop_followings");
        $ch_result = $dbapi->insert($chrono_fields, "chronoline_order");
        if ($ins_result == 1) {
            $this->getStoreSuggestionsTpl();
        }
    }

    //june 16 by venkatesh 
    function storeImageCropimg() {
        $this->load->module("db_api");
        $userid = $this->getUserId();
        $store_details = $this->db_api->custom("select store_aid,store_code,profile_image_path from oshop_stores where store_aid=" . $_REQUEST["storeaid"] . " and created_by=" . $userid);
         $store_code = $store_details[0]["store_code"];
        if (!is_dir(BASEPATH . "../stores/" . $store_code . "/logo")) {
            mkdir(BASEPATH . "../stores/" . $store_code . "/logo", 0777);
            shell_exec('chmod -R 777 ' . BASEPATH . "../stores/" . $store_code . "/logo");
        }
        $savefileName = $store_code . "_" . $_REQUEST["temp_name"];
        if ($_REQUEST['x']) {
            $targ_w = $targ_h = 150;
            $jpeg_quality = 90;
            $ini_filename = 'temp/' . $_REQUEST["temp_name"];
            if (end(explode(".", $_REQUEST['temp_name'])) == "jpg") {
                $im = imagecreatefromjpeg($ini_filename);
            } else {
                $im = imagecreatefrompng($ini_filename);
            }
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
              imagejpeg($thumb_im, "stores/" . $store_code . "/logo/orig/" . $_REQUEST['temp_name'], 100);
            } else {
              imagepng($thumb_im, "stores/" . $store_code . "/logo/orig/" . $_REQUEST['temp_name']);
            }
            $orig_path = "stores/" . $store_code . "/logo/orig/" . $_REQUEST['temp_name'];
            $result = $this->convertfile->convertImage($orig_path, $orig_path, 100);

            if ($result) {
              // $this->imgResize($orig_path,$_REQUEST['storeaid']);
                $this->imageresize->resize($orig_path, "stores/".$store_code."/logo/li/" . $_REQUEST['temp_name'], 600, 600);
                $this->imageresize->resize($orig_path, "stores/".$store_code."/logo/mi/" . $_REQUEST['temp_name'], 400, 400);
                $this->imageresize->resize($orig_path, "stores/".$store_code."/logo/si/" . $_REQUEST['temp_name'], 200, 200);
                unlink($orig_path);
              $img_path=$this->unlinkprofilepic($userid, $_REQUEST['temp_name'], $_REQUEST['storeaid'],$store_code);
               
            } else {
                echo "false";
            }
        } else {
          $pimage_path = "stores/" . $store_code . "/logo/orig/" . $_REQUEST['temp_name'];
            $result = $this->convertfile->convertImage("temp/" . $_REQUEST['temp_name'], $pimage_path, 150);
            if ($result) {
              // $this->imgResize($pimage_path,$_REQUEST['storeaid']);
                $this->imageresize->resize($orig_path, "stores/".$store_code."/logo/li/" . $_REQUEST['temp_name'], 600, 600);
                $this->imageresize->resize($orig_path, "stores/".$store_code."/logo/mi/" . $_REQUEST['temp_name'], 180, 180);
                $this->imageresize->resize($orig_path, "stores/".$store_code."/logo/si/" . $_REQUEST['temp_name'], 45, 45);
              $img_path=$this->unlinkprofilepic($userid, $_REQUEST['temp_name'], $_REQUEST['storeaid'],$store_code);
            }else{
                echo "false";
            }
        }
    }

    function unlinkprofilepic($userid, $temp_name, $storeaid,$store_code) {
        $db_obj = $this->load->module("db_api");
        $rlt = $db_obj->custom("SELECT profile_image_path FROM `oshop_stores` WHERE store_aid = '" . $storeaid . "' and `created_by`=" . $userid);
        if ($rlt[0]["profile_image_path"]) {
            //unlink("stores/" . $store_code . "/SDT/" . $profile_image_path);
          unlink($_SERVER['DOCUMENT_ROOT'] . "stores/" . $store_code . "/logo/li/" . $rlt[0]["profile_image_path"]);
          unlink($_SERVER['DOCUMENT_ROOT'] . "stores/" . $store_code . "/logo/mi/" . $rlt[0]["profile_image_path"]);
          unlink($_SERVER['DOCUMENT_ROOT'] . "stores/" . $store_code . "/logo/si/" . $rlt[0]["profile_image_path"]);
          unlink($_SERVER['DOCUMENT_ROOT'] . "/oneshop/temp/" . $temp_name);
        }
        $updStoreImageSql = "UPDATE oshop_stores SET profile_image_path = '" . $temp_name . "'  WHERE store_aid = '" . $storeaid . "' and created_by=" . $userid;        
        $this->db_api->custom($updStoreImageSql);
        //echo base_url() . "stores/".$store_code."/SDT/" . $temp_name;
        echo base_url() . "stores/".$store_code."/logo/si/" . $temp_name;
    }
    // function imgResize($path,$s_store_id){
    //   $img_rz=$this->load->module('imageresize');
    //   $oneshop_path=$_SERVER["DOCUMENT_ROOT"]."/".$path;
    //   shell_exec('chmod -R 777 ' . $path);
    //   $path_arry=explode("/",$path);
    //   $img_rz->resize($oneshop_path, "stores/" . $path_arry[1] . "/logo/li/" . $path_arry[4], 600, 600);
    //   $img_rz->resize($oneshop_path, "stores/" . $path_arry[1] . "/logo/mi/" . $path_arry[4], 400, 400);
    //   $img_rz->resize($oneshop_path, "stores/" . $path_arry[1] . "/logo/si/" . $path_arry[4], 200, 200);
    //   //echo "stores/" . $path_arry[1] . "/logo/li/" . $path_arry[4];
    // }
}
