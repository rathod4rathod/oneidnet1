<?php

if (!defined('BASEPATH'))  exit('No direct script access allowed');

class OnenetworkNotifs extends CI_Controller {

    function __construct() {
        //session_start();
        parent::__construct();
        $this->load->module('db_api');
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

    function index() {
        
    }

    function getNotifcount() {
        $bean = $this->load->module('cookies');
        $db_api = $this->load->module('db_api');
        $userid = $bean->getUserID();
        $date = Date('Y-m-d ');
        $active_staus = 1;
       $campaign = "select campaign_id,campaign_name from on_campaigns where created_by=$userid and is_active =$active_staus and is_payment_done=$active_staus and created_on like '%$date%'";
        $camdetails = $db_api->custom($campaign);
        if ($camdetails == 0) {
            echo '0';
        } else {
            echo count($camdetails);
        }
    }

    function getOnenetworkNotifs() {
        $db_api = $this->load->module('db_api');
        $bean = $this->load->module('cookies');
        $userid = $bean->getUserID();
        $date = Date('Y-m-d ');
        $active_staus = 1;
        $campaign = "select campaign_id,campaign_name from on_campaigns where created_by=$userid and is_active =$active_staus and is_payment_done=$active_staus and created_on like '%$date%'";
        $camdetails = $db_api->custom($campaign);
        $count_cam = count($camdetails);
        if ($count_cam > 1) {
            $section = array_rand($camdetails, $count_cam);
            foreach ($section as $k => $v) {
                $arry[] = $camdetails[$v]['campaign_name'];
            }
            echo $cam = implode(",", $arry);
        } elseif ($count_cam == 1) {
            echo $camdetails[0]['campaign_name'];
        } else {
            echo "No events";
        }
    }

    function getNotifNocount() {
        $db_api = $this->load->module('db_api');
        $bean = $this->load->module('cookies');
        $userid = $bean->getUserID();
        $date = Date('Y-m-d ');
        $active_staus = 1;
        $campaign = "select campaign_id,campaign_name from on_campaigns where created_by=$userid and is_active =$active_staus and is_payment_done=$active_staus and created_on like '%$date%'";
        $camdetails = $db_api->custom($campaign);
        if ($camdetails == 0) {
            echo 'no';
        } else {
            echo count($camdetails);
        }
    }

}
