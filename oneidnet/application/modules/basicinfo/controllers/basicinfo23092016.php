<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class basicinfo extends CI_Controller {

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
//12-feb-2016 by venkatesh 
    function redirect() {
        redirect(base_url());
    }

    /* venkatesh test input */

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

    //03-feb-2016 by venkatesh
    function basic_info() {
        $data["is_oneidnet_basicinfotab_active"] = "Yes";
        $data["theme"] = $this->db_api->select("theme", "iws_profiles", "profile_id=" . $this->user_id());
        $this->load->view("basic_info", $data);
    }

    //03-feb-2016 by venkatesh
    function personal_info() {
        $db_obj = $this->load->module('db_api');
        $data["prf_dtls"] = $db_obj->custom("select first_name,middle_name,last_name,mobile_no,dob,gender,existing_email_id from iws_profiles where profile_id=" . $this->user_id());
        $this->load->view("personal_info", $data);
    }

    //03-feb-2016 by venkatesh
    function personal_info_update() {
        $db_obj = $this->load->module('db_api');
        $data["prf_dtls"] = $db_obj->custom("select first_name,middle_name,last_name,mobile_no,dob,gender,existing_email_id from iws_profiles where profile_id=" . $this->user_id());
        
      
        $this->load->view("personal_info_update", $data);
    }

    //03-feb-2016 by venkatesh
    function personal_db_update() {
        $existingemail=$_REQUEST["existingemail"];
        $rlt=$this->db_api->select("profile_id", "iws_profiles", "existing_email_id='".$existingemail."' and profile_id!=" . $this->user_id());
        if($rlt==0){
        $fields = ["first_name" => $_REQUEST["firstname"],"mobile_no"=>$_REQUEST["mbno"], "middle_name" => $_REQUEST["middlename"], "last_name" => $_REQUEST["lastname"], "dob" => $_REQUEST["dob"], "gender" => $_REQUEST["gender"],"existing_email_id"=>$_REQUEST["existingemail"]];
        foreach ($fields as $key => $val) {
            $fields[$key] = $this->test_input($fields[$key]);
        }
        echo $this->db_api->update($fields, "iws_profiles", "profile_id=" . $this->user_id());
        $this->memcach_reset();
        $this->load->module("login");
        $this->login->reset_session();            
        }else{
            Echo "Existing e-mail is already being used in ONEIDNET";
        }
        

    }

//03-feb-2016 by venkatesh
    function pw_chng_form() {
        $this->load->view("pw_chng_form");
    }

    //03-feb-2016 by venkatesh
    function password_change() {
//        $_REQUEST["crnt_pw"] $_REQUEST["new_pw"] $_REQUEST["cnf_pw"]
        $uid = $this->user_id();
        $db_obj = $this->load->module('db_api');          
         $currentpw =$_REQUEST["crnt_pw"];          
        $rlt = $db_obj->select("username,password_hash", "iws_profiles", "profile_id=" . $uid );
        if ($rlt != 0) {
          $regobj= $this->load->module("registration");  
            if($rlt[0]["password_hash"]=="{SSHA512}".base64_encode(hash('sha512', $currentpw.$regobj->salt(), true).$regobj->salt())){
                $newpw=$_REQUEST["new_pw"];
                $fields = ["password_hash" =>"{SSHA512}".base64_encode(hash('sha512', $newpw.$regobj->salt(), true).$regobj->salt())];
                $uprlt= $db_obj->update($fields, "iws_profiles", "profile_id=" . $uid);
                if($uprlt==1){
                     $this->load->library('oneidnet_rc');
                     $this->oneidnet_rc->changeMailboxPassword( $username=$rlt[0]["username"], $password_hash=$fields["password_hash"]);
                    $this->load->module("login");
                    $this->login->reset_cookie();    
                    echo true;
                }
                
            }else{
                            echo "Current password was incorrect";
            }
        } else {
            redirect(base_url());
        }
    }

    //03-feb-2016 by venkatesh
    function system_settings() {
        $data["sys_setting"] = $this->system_settings_data_return();
//        print_R($data["sys_setting"] );
        $this->load->view("system_settings", $data);
    }

    //03-feb-2016 by venkatesh
    function system_settings_update() {
        $data["sys_setting"] = $this->system_settings_data_return();

        $data["time_zone"] = $this->timezone_return();
        $data["country"] = $this->getCountries();
        $data["state"] = $this->state_details_return($data["sys_setting"][0]["country_id"]);
        if ($data["sys_setting"][0]["state_id"] != 0) {
            $data["city"] = $this->city_detail_basedon_state_id($data["sys_setting"][0]["state_id"]);
        }

        $this->load->view("system_settings_update", $data);
    }

    function system_settings_data_return() {
        $db_obj = $this->load->module("db_api");


        return $db_obj->custom("select ip.city_id,ip.state_id,ip.country_id,ip.time_zone,ip.language,ic.country_name,gs.state_name,gc.city_name from iws_profiles ip
left join iws_countries_info ic on ip.country_id=ic.country_id
left join global_states_info gs on gs.state_id=ip.state_id
left join global_cities_info gc on gc.city_id=ip.city_id
where profile_id=" . $this->user_id());
    }

    function timezone_return() {
        $db_obj = $this->load->module("db_api");
        return $db_obj->custom("select * from iws_timezones");
    }

    //14-july-2015 by venaktesh
    function state_details_return($country_id) {
        $db_obj = $this->load->module("db_api");
        $rlt = $db_obj->select("state_id,state_name", "global_states_info", "country_id=" . $country_id);
        return $rlt;
    }

// function to get the country id based on the country code passed as parameter in the function by Pavani on 23-07-2015
    function getCountries() {
        $dbapi = $this->load->module("db_api");
        $cresult = $dbapi->select("country_name,country_id", "iws_countries_info", "1");
        return $cresult;
    }

    //22-july-2015 by venkatesh: city details return based on country id
    function city_detail_basedon_state_id($state) {

        $db_obj = $this->load->module("db_api");
        $rlt = $db_obj->select("city_id,city_name", "global_cities_info", "state_id=" . $state);
        return $rlt;
    }

    //03-feb-2016 by venkatesh
    function system_settings_update_data() {
        $db_obj = $this->load->module("db_api");
        $fields = ["city_id" => $_REQUEST["city"], "state_id" => $_REQUEST["state"], "country_id" => $_REQUEST["country"], "time_zone" => $_REQUEST["tz"], "language" => $_REQUEST["system_language"]];
        echo $db_obj->update($fields, "iws_profiles", "profile_id=" . $this->user_id());
        $this->load->module("login");
        $this->login->reset_cookie();
    }

    //04-feb-2016 by venkatesh
    function change_theme() {

        $fields = ["theme" => $_REQUEST["tm"]];
        $db_obj = $this->load->module("db_api");
        $this->cookies->theme_setCookie($_REQUEST["tm"]);
        echo $db_obj->update($fields, "iws_profiles", "profile_id=" . $this->user_id());
    }

    //05-feb2016
    //05-feb2016
    //05-feb2016
    //05-feb2016
    function profile_change() {
        $this->load->view("profile_pic_change");
    }

    function crop_here($crop_img) {

        $data["crp_img"] = $crop_img;
        $this->load->view("crop_image", $data);
    }

    function cropimg() {

        if ($_REQUEST['x']) {

            $targ_w = $targ_h = 150;
            $jpeg_quality = 90;
     	 $ini_filename ='temp/' . $_REQUEST["temp_name"];
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
                imagejpeg($thumb_im, "data/" . $_REQUEST['temp_name'], 100);
            } else {

                imagepng($thumb_im, "data/" . $_REQUEST['temp_name']);
            }



            unlink("temp/" . $_REQUEST['temp_name']);


            $a_data = array("img_path" => $_REQUEST['temp_name']);
            $rlt = $this->db_api->update($a_data, "iws_profiles", "profile_id='" . $this->user_id() . "'");
            if ($rlt == 1) {
                $this->memcach_reset();
            }
            unlink("data/" . end(explode("/", $_REQUEST['currentpp'])));
        } else {
//            echo "venaktesh";
            copy("temp/" . $_REQUEST['temp_name'], "data/" . $_REQUEST['temp_name']);
            unlink("temp/" . $_REQUEST['temp_name']);


            $a_data = array("img_path" => $_REQUEST['temp_name']);
            $rlt = $this->db_api->update($a_data, "iws_profiles", "profile_id='" . $this->user_id() . "'");
            if ($rlt == 1) {
                $this->memcach_reset();
            }
            unlink("data/" . end(explode("/", $_REQUEST['currentpp'])));
        }
    }

//reset mamcache key by venkatesh
    function memcach_reset() {
        $keyName = "USRDTA_" . $this->cookies->getUserID();
        $userdetailsquery = "SELECT username,first_name,middle_name,last_name, profile_id,gender,user_id,password_hash,is_verified,img_path,role, time_zone,gender,country_id FROM `iws_profiles` where profile_id = " . $this->cookies->getUserID();
        $result = $this->db_api->custom($userdetailsquery);
        $this->memcaching->setKey($keyName, $result[0]);
//            $this->load->module("home");
    }

    //13-july-2015 by venaktesh
    function state_details() {
        $db_obj = $this->load->module("db_api");
        $rlt = $db_obj->select("state_id,state_name", "global_states_info", "country_id=" . $_REQUEST["country_id"]);

        echo "<option value=''>--Select--</option>";
        if ($rlt != 0) {
            for ($i = 0; $i < count($rlt); $i++) {
                echo "<option value='" . $rlt[$i]["state_id"] . "'>" . $rlt[$i]["state_name"] . "</option>";
            }
        }
    }

    //13-july-2015 by venaktesh
    function city_details() {
        $db_obj = $this->load->module("db_api");
        $rlt = $db_obj->select("city_id,city_name", "global_cities_info", "state_id=" . $_REQUEST["state_id"]);
        echo "<option value=''>--Select--</option>";
        if ($rlt != 0) {
            for ($i = 0; $i < count($rlt); $i++) {
                echo "<option value='" . $rlt[$i]["city_id"] . "'>" . $rlt[$i]["city_name"] . "</option>";
            }
        }
    }

}
