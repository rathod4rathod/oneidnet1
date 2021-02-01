<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class invitefriend extends CI_Controller {

    function __construct() {
        session_start();
        parent::__construct();
        $modulesArray = array('db_api', 'memcaching', 'cookies', 'sessions');
        $this->wrapperinit->loadModules($modulesArray);
        $ckobj = $this->load->module("cookies");
         if (!$ckobj->getUserID()) {
            echo '<script>if(self==top)
		{location.replace("' . base_url() . '");}else{top.location.reload();}</script>';
            die();
        } else if ($_REQUEST) {
          $sobj=  $this->load->module("session_restart");
            if (isset($_REQUEST["skey"])) {
                $sobj->key_check($_REQUEST["skey"]);
            }
        }
    }

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        $data = str_replace("'", "&#39;", $data);
        return $data;
    }

    function user_id() {
        $obj = $this->load->module('cookies');
        return $obj->getUserID();
    }

    function invite_friend() {
        $data["is_oneidnet_invitefriendstab_active"] = "Yes";
        $this->load->view("invite_friend",$data);
    }

}
