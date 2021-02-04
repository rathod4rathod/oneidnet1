<?php
if(!isset($_SESSION)){
    session_start();
}

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class session_restart extends CI_Controller {

    function __construct() {
        parent::__construct();
        echo $rlt = $this->session_check();
        if ($rlt == "SEXP") {
            $this->session_reset();
        }
    }

    function index() {
        
    }

    function session_check() {
        if (!isset($_SESSION["user_role"])) {
            return "SEXP";
            
        }
    }

    function session_reset() {
        $ck_obj = $this->load->module("cookies");
        $db_obj = $this->load->module("db_api");
        if (!$ck_obj->getUserID()) {
            
             echo "CLOGOUT";
            // die();
        } else {
            $login_result = $db_obj->select("login_id", "iws_login_history", 'ip_address="' . $_SERVER['REMOTE_ADDR'] . '" and profile_id=' . $ck_obj->getUserID());
            if ($login_result == 0) {
                 echo "CLOGOUT"; 
                 //           die();
            } else {
                $log_result=$db_obj->select("profile_id,username,first_name,middle_name,last_name,img_path,time_zone,role", "iws_profiles", 'profile_id=' . $ck_obj->getUserID());
                        $_SESSION['user_full_name']=$log_result[0]['first_name']." ".$log_result[0]['middle_name']." ".$log_result[0]['last_name'];
                        $_SESSION['user_id']=$log_result[0]['profile_id']; //This to be deleted, Read the data from cookie                        
                        $_SESSION['user_name']=$log_result[0]['username']; //This to be deleted, Read the data from cookie
                        $_SESSION['user_image']=$log_result[0]['img_path']; //This to be deleted, Read the data from cookie
                        $_SESSION['user_role']=$log_result[0]['role']; //This to be deleted, Read the data from cookie
                        $_SESSION['tz'] = $log_result[0]['time_zone']; //This to be deleted, Read the data from cookie
            }
        }
    }
    
    //15-feb-2016 by venkatesh key check with profile id
    function key_check($key) {
                $ck_obj = $this->load->module("cookies");
        
        
        if (ctype_xdigit($key)==1) {
            $keyar = explode("[@#$]", hex2bin($key));
//            print_R($keyar);
            if (count($keyar) == 3) {
                if ($keyar[1] != $ck_obj->getUserID() || $keyar[2] != $ck_obj->getUserIDHash()) {
                    echo  "KEYINVALID";die();
                }
            } else {
                echo  "KEYINVALID";die();
            }
        } else {
            echo  "KEYINVALID";die();
        }
    }
    //15-feb-2016 by venkatesh key check with profile id
    function key_uniqueid_check($key,$uid) {
        if (ctype_xdigit($key)==1) {
            $keyar = explode("[@#$]", hex2bin($key));
            if (count($keyar) == 3) {
                if ($keyar[2] != $uid) {
                    echo  "KEYINVALID";die();
                }
            } else {
                echo  "KEYINVALID";die();
            }
        } else {
            echo  "KEYINVALID";die();
        }
    }

}
