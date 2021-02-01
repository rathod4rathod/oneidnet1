<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class preferences extends CI_Controller {

    function __construct() {
        session_start();
        parent::__construct();
        
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
        $modulesArray = array('db_api', 'memcaching', 'cookies', 'sessions');
        $this->wrapperinit->loadModules($modulesArray);
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

    function preferences_info() {
        $data["is_oneidnet_preferencestab_active"] = "Yes";
        $data["netpro"] = $this->get_netpro_data();
        $data["buzzin"]= $this->get_buzzin_data();

        $data["click"]= $this->get_click_data();
        $data["tunnel"]= $this->get_tunnel_data();
        $data["countrydata"]=$this->get_countries();
        $data["activitydata"]=$this->login_activity();

        $data['symanticsdata']=  $this->get_symantics();
        $countryids = $data['symanticsdata'][0]['country_str'];
        if($countryids!=""){
        $sql="SELECT country_name  FROM global_countries_info WHERE country_id in($countryids)";
        $data['countrynames']=$this->db_api->custom($sql);}
        $this->load->view("preferences",$data);
    }

    function get_netpro_data()
    {
        $sql="select profile_privacy from netpro_users_settings where user_id_fk=".$this->user_id();
        $netpro_result=$this->db_api->custom($sql);
        return $netpro_result;
    }
    function get_buzzin_data()
    {
        $sql="select privacy from buzzin_users_settings where user_id_fk=".$this->user_id();
        $buzzin_result=$this->db_api->custom($sql);
        return $buzzin_result;
    }
    function get_click_data()
    {
        $sql="select profile_privacy from click_users_details where user_id_fk=".$this->user_id();
        $click_result=$this->db_api->custom($sql);
        return $click_result;
    }
    function get_tunnel_data()
    {
        $sql="select profile_privacy from tunnel_user_settings where user_id_fk=".$this->user_id();
        $tunnel_result=$this->db_api->custom($sql);
        return $tunnel_result;
    }

    function get_countries()
    {
        $sql="select * from  global_countries_info";
        $countries_result=$this->db_api->custom($sql);
        return $countries_result;
    }

    function get_symantics()
    {
        $sql="select * from iws_login_rules where user_id_fk=".$this->user_id();
        $symantics_result=$this->db_api->custom($sql);
        return $symantics_result;
    }

    function netpro_update_preferences()
    {
        $s_value = $this->input->post('value');
        $fields = array("profile_privacy" => $s_value);
        $mytable = "netpro_users_settings";
        $where = "user_id_fk=" . $this->user_id();
        $this->db_api->update($fields, $mytable, $where);
    }
    function buzzin_update_preferences()
    {
        $s_value = $this->input->post('value');
        $fields = array("privacy" => $s_value);
        $mytable = "buzzin_users_settings";
        $where = "user_id_fk=" . $this->user_id();
        $this->db_api->update($fields, $mytable, $where);
    }
    function click_update_preferences()
    {
        $s_value = $this->input->post('value');
        $fields = array("profile_privacy" => $s_value);
        $mytable = "click_users_details";
        $where = "user_id_fk=" . $this->user_id();
        $this->db_api->update($fields, $mytable, $where);
    }
    function tunnel_update_preferences()
    {
        $s_value = $this->input->post('value');
        $fields = array("profile_privacy" => $s_value);
        $mytable = "tunnel_user_settings";
        $where = "user_id_fk=" . $this->user_id();
        $this->db_api->update($fields, $mytable, $where);
    }



    function save_symantics()
    {
        $userid = $this->user_id();
        $location_access = $_POST['location_access'];
        $device_access = $_POST['device_access'];
        $browser_access = $_POST['browser_access'];
        $os_access = $_POST['os_access'];
        if($location_access!='ANY')
            {
                $cdata = implode(',',$_POST['countries']);
            }
            else
            {
                $cdata = '';
            }

        if($device_access!='ANY')
            {
                $ddata = implode(',',$_POST['devices']);
            }
            else
            {
                $ddata = '';
            }

        if($browser_access!='ANY')
            {
                $bdata = implode(',',$_POST['browsers']);
            }
            else
            {
                $bdata = '';
            }

        if($os_access!='ANY')
            {
                $osdata = implode(',',$_POST['operatingsystems']);
            }
            else
            {
                $osdata = '';
            }


        $sql="update iws_login_rules set location_access='$location_access',device_type='$device_access',browsers='$browser_access',operating_system='$os_access',"
                . "country_str='$cdata',device_str='$ddata',browser_str='$bdata',operatingsystem_str='$osdata' where user_id_fk=$userid";
        $result=  $this->db_api->custom($sql);

    }
function login_activity(){
        $userid = $this->user_id();
        $sql="select * from `iws_login_history` where profile_id=$userid";
        $activity_result=$this->db_api->custom($sql);
        return $activity_result ;
    }
    //feb-08-2016 by venkatesh
    function update_login_history(){
        $flds=["is_active"=>0];
     echo  $this->db_api->update($flds,"iws_login_history","login_id=".$_REQUEST["lgid"]." and profile_id=".$this->user_id());
    }
}
