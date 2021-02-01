<?php
if (!defined('BASEPATH'))  exit('No direct script access allowed');

class storeproducts extends CI_Controller {

    function __construct() {
        parent::__construct();
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
    $cookies_obj=$this->load->module("cookies");
    $user_id=$cookies_obj->getUserID();
    return $user_id;
  }

  function top_Sold_Products() {
    $this->load->view('storeproducts/top_pold_products');
  }

  function featured_Products() {
    $this->load->view('storeproducts/featured_products');
  }

  function os_store_Products() {
    $this->load->view('storeproducts/os_store_products');
  }
  
  
//for click profile image update by venkatesh june 16 2016
    function basic_profile_image_update() {
        $user_id = $this->get_UserId();
        $d_date = new DateTime();
        $s_time = $d_date->format('Y-m-d-H-i-s');
        $s_uploaddir = "temp/";
        
        $s_name = basename($_FILES['bgChangeField']['name']);
        list($txt, $ext) = explode(".", $s_name);
        
        $s_ppic_image_name = $s_uploaddir . 'profile_photo_' . $user_id . $s_time . "." . $ext;
        
        if (move_uploaded_file($_FILES['bgChangeField']['tmp_name'], $s_ppic_image_name)) {
            
            $data["crp_img"]= 'profile_photo_' . $user_id . $s_time . "." . $ext;
            $this->load->view("storeproducts/crop_image", $data);
        } else {
            echo "fie not uploaded";
        }
    }

}
