<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

 if (!isset($_SESSION["user_id"])) {
            session_start();
        }

/* * ****************************************************************************
 * Purpose: Controller class to handle login/logout/session management of app.
 * Author: shivajyothi
 * Date Written: Apr 15, 2015
 * 
 * **************************************************************************** */

class Login extends CI_Controller {

    function __construct() {
        parent::__construct();
//        $ckobj = $this->load->module("cookies");
//        if (!$ckobj->getUserID()) {
//            echo '<script>if(self==top)
//		{location.replace("' . base_url() . '");}else{top.location.reload();}</script>';
//            die();
//        } else if ($_REQUEST) {
//            $sobj = $this->load->module("session_restart");
//            if (isset($_REQUEST["skey"])) {
//                $sobj->key_check($_REQUEST["skey"]);
//            }
//        }

       

        //Initialising all the module to be loaded for operation.
        $modulesArray = array('db_api', 'memcaching', 'cookies', "sessions");
        $this->wrapperinit->loadModules($modulesArray);
    }

    function index() {
        //$url = base_url();
        //header("Location: $url");        
    }

    //06-07-2015 by venkatesh : this function retrive the country information based on public ip address
    function country_info_based_on_ip() {
        $result = $this->db_api->select('country_id,country_code,country_name', 'iws_countries_info', "webCode= 'IN'");
        return $result;
    }

    //06-07-2015 global function by venkatesh : this function get location info based on ip adsress
    function get_ip_info() {
        $myPublicIP = trim(shell_exec("dig +short myip.opendns.com @resolver1.opendns.com"));
        $data_obj = $this->load->module("getiploc");
        $data = $data_obj->getInfo($myPublicIP);
        return $data;
    }

    //04-feb-2106 by venkatesh 
    function reset_cookie() {
        $dbobj = $this->load->module("db_api");
        $cookieobj = $this->load->module("cookies");
        $result = $dbobj->select('theme,username,first_name,middle_name,last_name,gender, profile_id,user_id,password_hash,is_verified,img_path,role, time_zone, language, country_id', 'iws_profiles', "profile_id=" . $cookieobj->getUserID());
        $s_security_code = $this->generateSecurity_Code($result[0]['profile_id'], $result[0]['password_hash'], $result[0]['time_zone'], $result[0]['role'], $result[0]['user_id'], $result[0]['language'], $result[0]['country_id']);
        $cookieobj->setCookie('oud', $s_security_code);
        $fld = ["security_code" => $s_security_code];
        $dbobj->update($fld, "iws_profiles", "profile_id=" . $cookieobj->getUserID());
    }

    //04-feb-2106 by venkatesh 
    function reset_session() {
        $dbobj = $this->load->module("db_api");
        $cookieobj = $this->load->module("cookies");
        $result = $dbobj->select('first_name,middle_name,last_name,email,360mail_key', 'iws_profiles', "profile_id=" . $cookieobj->getUserID());
        $_SESSION["user_full_name"] = $result[0]['first_name'] . " " . $result[0]['middle_name'] . " " . $result[0]['last_name'];
        $_SESSION["email"]=$result[0]['email'];
        $_SESSION["key"]=$result[0]['360mail_key'];
    }

    function loginrules($s_user_id) {

        $lr = $this->db_api->select('*', 'iws_login_rules', "user_id_fk='$s_user_id'");
        //    echo "<pre>";        print_R($lr);        echo "</pre>";
        if ($lr[0]["operating_system"] == "PARTICULAR") {

            if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
                $os = 'WINDOWS';
            } else if (strtoupper(substr(PHP_OS, 0, 3)) === 'LIN') {
                $os = 'LINUX';
            }

            if (strpos($lr[0]["operatingsystem_str"], $os) === false) {
                return 'Operating system specfication failed';
            }
        }

        if ($lr[0]["device_type"] == "PARTICULAR") {
            if (strpos($lr[0]["device_str"], $this->checkDevice()) === false) {
                return 'Device specfication failed';
            }
        }
        if ($lr[0]["browsers"] == "PARTICULAR") {

            $u_agent = $_SERVER['HTTP_USER_AGENT'];
            $bname = 'Unknown';
            $ub = 'Unknown';
            // Next get the name of the useragent yes seperately and for good reason
            if (preg_match('/MSIE/i', $u_agent) && !preg_match('/Opera/i', $u_agent)) {
                $bname = 'Internet Explorer';
                $ub = "MSIE";
            } elseif (preg_match('/Firefox/i', $u_agent)) {
                $bname = 'Mozilla Firefox';
                $ub = "Firefox";
            } elseif (preg_match('/Chrome/i', $u_agent)) {
                $bname = 'Google Chrome';
                $ub = "Chrome";
            } elseif (preg_match('/Safari/i', $u_agent)) {
                $bname = 'Apple Safari';
                $ub = "Safari";
            } elseif (preg_match('/Opera/i', $u_agent)) {
                $bname = 'Opera';
                $ub = "Opera";
            } elseif (preg_match('/Netscape/i', $u_agent)) {
                $bname = 'Netscape';
                $ub = "Netscape";
            }



            if (strpos($lr[0]["browser_str"], strtoupper($ub)) === false) {
                return 'Browser specfication failed';
            }
        }
    }


    function doLogin() {
        $s_username = $_REQUEST["logindev_username"];
        $s_password = $_REQUEST["logindev_password"];
        if (isset($s_username) && ($s_username != '') && isset($s_password) && ($s_password != '')) {
            $result = $this->db_api->custom('select theme,ip.username,email,360mail_key,first_name,middle_name,last_name,gender, profile_id,user_id,password_hash,is_verified,img_path,role, time_zone, language, country_id,ibu.username as isblocked from iws_profiles ip left join iws_blacklist_users ibu on ip.username=ibu.username where ip.username="'.$s_username.'"');
            if ($result != 0) { 
               if($result[0]["isblocked"]){
                 echo "BLCK7";
                 exit();
               }else{
               $regobj= $this->load->module("registration");
                               $s_password_hash = "{SSHA512}".base64_encode(hash('sha512', $s_password.$regobj->salt(), true).$regobj->salt());
                if ($s_password_hash == $result[0]['password_hash']) {
                    $s_user_id = $result[0]['profile_id'];
                    $logrules = $this->loginrules($s_user_id);
                    if ($logrules) {
                        echo $logrules;
                        die();
                    }
                    //written by suresh for count hits::23-09-2016
                    /*$hmobj=$this->load->module("home");
                    $ipinfo=$hmobj->ip_info();                    
                    $ipdata=array(
                        "ip_address"     =>$ipinfo['ip'],
                        "profile_id"     =>$s_user_id,
                        "city"           =>$ipinfo['city'],
                        "state"          =>$ipinfo['state'],
                        "country"        =>$ipinfo['country'],
                        "zipcode"        =>$ipinfo['zipcode'],
                        "lattitude"      =>$ipinfo['latitude'],
                        "langitude"      =>$ipinfo['longitude'],
                        "currency_code"  =>$ipinfo['currency_code'],
                        "currency_symbol" =>$ipinfo['currency_symbol'],
                        "currency_converter"=>$ipinfo['currency_converter'],
                        );
                    $ip_insert=$this->db_api->insert($ipdata,"oneidnet_hits");*/
                    // The user name will be the same in all modules regardless of their display name unless user changes from Oneidnet Settings Page.
                    $s_user_full_name = $result[0]['first_name'] . " " . $result[0]['middle_name'] . " " . $result[0]['last_name'];

                    // This is the encripted string contains useful data about the user.
                    $s_security_code = $this->generateSecurity_Code($s_user_id, $s_password_hash, $result[0]['time_zone'], $result[0]['role'], $result[0]['user_id'], $result[0]['language'], $result[0]['country_id']);

                    $this->sessions->createSession($s_user_full_name, $s_user_id); // User id to be removed later from session.

                    $this->cookies->setCookie('oud', $s_security_code); 

		    //$this->cookies->setCookie('oud', "oneidnetcookie"); 
                    $this->cookies->setCookie('theme',$result[0]['theme']);

                    $_SESSION['user_full_name'] = $s_user_full_name;
                    
                    $_SESSION['user_id'] = $s_user_id; //This to be deleted, Read the data from cookie                        
                    $_SESSION['user_name'] = $result[0]['username']; //This to be deleted, Read the data from cookie
                    $_SESSION['user_image'] = $result[0]['img_path']; //This to be deleted, Read the data from cookie
                    $_SESSION['user_role'] = $result[0]['role']; //This to be deleted, Read the data from cookie
                    $_SESSION['tz'] = $result[0]['time_zone']; //This to be deleted, Read the data from cookie
                    //$_SESSION['key']=$this->encrypt($_REQUEST["logindev_password"]);
                    $_SESSION['key']=$result[0]['360mail_key'];;
                    $_SESSION['email']=$result[0]['email'];
     
                    $this->updateLogin_History($s_user_id);
                    $keyName = "USRDTA_" . $this->cookies->getUserID();
                    $this->memcaching->setKey($keyName, $result[0]);
                    $fields = array('is_online' => 1);
                    $this->db_api->update($fields, "iws_profiles", "profile_id=" . $s_user_id);

                    echo 'OIN9';
                } else {
                  //session to counter the login attempts
                  $msg="The username or password you entered is incorrect.";
                  if(!(isset($_SESSION["login_attempts"]))){
                    $_SESSION["login_attempts"]=1;
                    $_SESSION["last_login_attempt_time"]=date("Y-m-d H:i:s");
                  }
                  else{
                    $current_datetime=date("Y-m-d H:i:s");
                    //echo $_SESSION["login_attempts"];
                    if($_SESSION["login_attempts"]<10){
                      $login_diff=ceil((strtotime($current_datetime)-strtotime($_SESSION["last_login_attempt_time"]))/60);
                      if(isset($_SESSION["login_attempts"])){
                        $msg.="You tried to login with incorrect credentials about ".$_SESSION['login_attempts']." time(s)";
                      }
                      if($login_diff<=1){
                        $_SESSION["login_attempts"]++;
                        $_SESSION["last_login_attempt_time"]=date("Y-m-d H:i:s");
                      }else{
                        session_unset($_SESSION["login_attempts"]);
                        session_unset($_SESSION["last_login_attempt_time"]);
                      }
                    }
                    else{
                      $msg.="Your login attempts exceeded 10 time(s)";
                      $ip_address=$_SERVER['REMOTE_ADDR'];
                      $username=$result[0]['username'];
                      $ins_data=array("username"=>$username,"ip_address"=>$ip_address);
                      $this->db_api->insert($ins_data,"iws_blacklist_users");
                      session_unset($_SESSION["login_attempts"]);
                      session_unset($_SESSION["last_login_attempt_time"]);
                    }
                  }
                  echo $msg;
                }
               }
            } else {
                echo "You are not a registered user!";
            }
        }
    }
 
    //may-16-2016 by venkatesh
    function forgotUsercheck(){
        $existingemail=$_REQUEST["existingemail"];
            
            $where = "existing_email_id='$existingemail'";
            $result = $this->db_api->select('first_name , middle_name , last_name  , profile_id,username,existing_email_id', 'iws_profiles', $where);
//            print_R($result);
        if($result!=0){
                   $s_name = $result[0]['first_name']." ".$result[0]['middle_name']." ".$result[0]['last_name'] ;
			             $templateBody  =$this->usernameTemplate($s_name , $result[0]["username"]);
                   $homeobj = $this->load->module("home");
                   $homeobj->sendactivationmail($result[0]["existing_email_id"], "Recover Your ONEIDNET Account User ID! ",$templateBody );
                 echo "ON9";
        }else{
                echo "Please Enter Correct Existing E-Mail Address!";;            
        }
    }
   
    function forgot_mobilecheck() {
        $s_mobileno = $this->input->post("existingemail");

        if (isset($s_mobileno) && ($s_mobileno != '')) {
            $where = "existing_email_id='$s_mobileno' or username='" . $s_mobileno . "'";
            $result = $this->db_api->select('first_name , middle_name , last_name  , profile_id,existing_email_id,mvs_code,is_verified', 'iws_profiles', $where);
            if ($result != 0) {
				$s_name = $result[0]['first_name']." ".$result[0]['middle_name']." ".$result[0]['last_name'] ;
				$templatBody = $this->passwordTemplate($s_name ,base_url() . "home/passwordReset/" . bin2hex($result[0]["profile_id"] . "###" . $result[0]["mvs_code"] . "###" . $result[0]["existing_email_id"]));
                $homeobj = $this->load->module("home");
                $homeobj->sendactivationmail($result[0]["existing_email_id"], "Reset Your ONEIDNET Account Password!",$templatBody );
                $message = "We have sent reset link to your Alternate Existing E-Mail Address!";
                $resultarray = array(
                    'status' => '0',
                    'message' => $message
                );
            } else {
                $message = "You are not a registered user!";
                $resultarray = array(
                    'status' => '0',
                    'message' => $message
                );
            }
        } else {
            $message = "Please Enter Your Alternate E-Mail Address";
            $resultarray = array(
                'status' => '0',
                'message' => $message
            );
        }
        echo json_encode($resultarray);
    }

    function otp_check() {
        $s_mobileno = $this->input->post("forgotdev_phoneno");
        $s_otpassword = $this->input->post("forgotdev_otp");
        $s_password = $this->input->post("forgotdev_password");
        $s_conpassword = $this->input->post("forgotdev_conpassword");
        if (isset($s_otpassword) && ($s_otpassword != '')) {
            if ($s_password == $s_conpassword) {
                $query = "SELECT count(*) as counts  FROM `iws_profiles`  WHERE mobile_no=$s_mobileno and arms_code= $s_otpassword";
                $otpcount = $this->db_api->custom($query);
                if ($otpcount[0]['counts'] > 0) {
                    $s_password = sha1($s_password);
                    $fields = array('password_hash' => $s_password);
                    $mytable = "iws_profiles";
                    $where = "mobile_no=$s_mobileno ";
                    $result = $this->db_api->update($fields, $mytable, $where);
                    echo $result;
                } else {
                    echo"You are entered wrong otp ";
                }
            } else {
                echo"please enter password and confirm password equal ";
            }
        } else {
            echo"Please enter otp ";
        }
    }

    //Function to generate the security code with user id and password hash
    function generateSecurity_Code($s_intl_profile_id, $s_pswd_hash, $time_zone, $user_role, $user_identity_hash, $language, $countryID) {
        $start_guard_bit = sha1("<?!%&_WORLD_IS_ONE_&%_@_ONEIDNET#!");
        $end_guard_bit = sha1("!%&_WORLD_IS_ONE_&%_@_ONEIDNET#!/>");
        $oud = $start_guard_bit . "*" . $s_pswd_hash . "*" . $s_intl_profile_id . "*" . $user_identity_hash . "*" . $time_zone . "*" . $user_role . "*" . $language . "*" . $countryID . "*" . $end_guard_bit;
        return $oud;
    }

    //Function to handle logout event
    function doLogout() {
        $db_obj = $this->load->module("db_api");
        $mem_obj = $this->load->module("memcaching");
        $cook_obj = $this->load->module("cookies");
        $ses_obj = $this->load->module("sessions");
        $fields = array('is_online' => 0);
        $db_obj->update($fields, "iws_profiles", "profile_id=" . $cook_obj->getUserID());
        $this->login_history_reset();
        $keyName = "USRDTA_" . $cook_obj->getUserID();
        $mem_obj->deleteKey($keyName); 
//Edited By Mitesh -> change functions
        $this->session->sess_destroy();
        delete_cookie("oud");
        delete_cookie("theme");
        // $ses_obj->destroySession();

        return redirect(base_url());
 
        // header("Location: $url");
    }

    function login_history_reset() {
        $db_obj = $this->load->module("db_api");
        $cook_obj = $this->load->module("cookies");
        $fields1 = array('is_active' => 0);
        $db_obj->update($fields1, "iws_login_history", 'ip_address="' . $_SERVER['REMOTE_ADDR'] . '" and profile_id=' . $cook_obj->getUserID());
    }

    function checkDevice() {
        $s_device_type = '';
        if ($this->mobile_detect->isMobile()) {
            $s_device_type = 'MOBILE';
        } else if ($this->mobile_detect->isTablet()) {
            $s_device_type = 'TAB';
        } else {
            $s_device_type = 'COMPUTER';
        }
        return $s_device_type;
    }

    //Function to Insert the record of success Login into "iws_login_history" table.
    function updateLogin_History($s_user_id) {

        $current_time = date("Y-m-d H:i:s");
//    $a_cst_info = $this->get_ip_info();       
//     if ( sizeof($a_cst_info)!=1 ) {
//         $countryres=$this->db_api->custom("SELECT  country_id FROM `global_countries_info` where country_code='".$a_cst_info['country_code']."'"); 
//      $a_loc_dump = array( 'country_code' => $a_cst_info['country_code'], 
//          		   'country_name' => $a_cst_info['country_name'],                     
//          		   'region_name' => $a_cst_info['region_name'], 
//          		   'city' => $a_cst_info['city'], 
//          		   'zip_code' => $a_cst_info['zip_code'],
//          		   'time_zone' => $a_cst_info['time_zone']);
//      $j_loc_dump = json_encode($a_loc_dump);
//      $d_lat = $a_cst_info['latitude'];
//      $d_long = $a_cst_info['longitude'];
        $s_device_type = $this->checkDevice();
        $s_user_agent = $_SERVER['HTTP_USER_AGENT'];
        $a_data = array(
            //            'latitude'=> $d_lat,
//            'longitude'=> $d_long,
//            'country_id'=> $countryres[0]['country_id'],
//            'loc_dump'=> $j_loc_dump,
            "profile_id" => $s_user_id,
            'device_type' => $s_device_type,
            'user_agent' => $s_user_agent,
            'ip_address' => $_SERVER['REMOTE_ADDR'],
            'is_active' => 1,
            'login_time' => $current_time);
        $dbobj = $this->load->module("db_api");
        $rlt = $dbobj->custom('select login_id from iws_login_history where ip_address="' . $_SERVER['REMOTE_ADDR'] . '" and profile_id=' . $s_user_id);
        if ($rlt == 0) {
            $result = $dbobj->insert($a_data, "iws_login_history");
        } else {
            $result = $dbobj->update($a_data, "iws_login_history", 'ip_address="' . $_SERVER['REMOTE_ADDR'] . '" and profile_id=' . $s_user_id);
        }

        $msg = "[login]:result value is-" . $result;
        log_message("info", $msg);
        return $result;
//    }
    }

    //23-07-2015 by venkatesh
    function afterLogin() {

        $rlt = $this->country_info_based_on_ip();
        $_SESSION["COUNTRY_ID"] = $rlt[0]["country_id"];

        $this->updateLogin_History($_SESSION['user_id']);
        $this->db_api->custom("update iws_profiles set is_online=1 where profile_id=" . $_SESSION['user_id']);
        $rlt = $this->db_api->custom("select created_by from os_all_store where created_by=" . $_SESSION['user_id']);
        if ($rlt != 0) {
            $_SESSION['store_owner_id'] = $_SESSION['user_id'];
        }

        $rltq = $this->db_api->custom("select oas.created_by store_owner_id from os_store_settings oss left join os_all_store oas on oss.store_id_fk=oas.store_aid where order_manager_emails like '%~" . $_SESSION['user_id'] . "~%' or store_manager_emails like '%~" . $_SESSION['user_id'] . "~%'");
        if ($rltq) {
            $_SESSION['store_owner_id'] = $rltq[0]["store_owner_id"];
        }
    }

    //23-07-2015 by venkatesh
    function forgetPasswordReset() {
        $ppppid = explode("###", hex2bin($_REQUEST["ppppid"]));
        $onp = $_REQUEST["onp"];
        $ocp = $_REQUEST["ocp"];
        $dbobj = $this->load->module("db_api");
        $regobj= $this->load->module("registration");  
        $db_obj = $this->load->module('db_api');
        $rlt = $db_obj->select("username", "iws_profiles", "profile_id=" . $ppppid[0] );
        $passwordhash="{SSHA512}".base64_encode(hash('sha512', $ocp.$regobj->salt(), true).$regobj->salt());
        $mail360_pass_hash=$regobj->encrypt($ocp);
                
        if ($dbobj->update(["password_hash" =>$passwordhash ,"360mail_key"=>$mail360_pass_hash,"mvs_code" => rand(11111, 99999)], "iws_profiles", "profile_id=" . $ppppid[0] . " and  mvs_code=" . $ppppid[1]) == 1) {
            $this->load->library('oneidnet_rc');
            $this->oneidnet_rc->changeMailboxPassword( $username=$rlt[0]["username"], $password_hash=$passwordhash);
            echo "ON9";
        } else {
            echo "Invalid passwordReset URL";
        }
    }
    function usernameTemplate($name , $username){
		$message="<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml'>
<head>
  <meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
  <title>ONEIDNET Email Newsletter </title>
  <style type='text/css'>
  body {
   padding-top: 0 !important;
   padding-bottom: 0 !important;
   padding-top: 0 !important;
   padding-bottom: 0 !important;
   margin:0 !important;
   width: 100% !important;
   -webkit-text-size-adjust: 100% !important;
   -ms-text-size-adjust: 100% !important;
   -webkit-font-smoothing: antialiased !important;
   background:#000;
 }
 .tableContent img {
   border: 0 !important;
   display: block !important;
   outline: none !important;
 }

p, h2{
  margin:0;
}

div,p,ul,h2,h2{
  margin:0;
}

h2.bigger,h2.bigger{
  font-size: 32px;
  font-weight: normal;
}

h2.big,h2.big{
  font-size: 21px;
  font-weight: normal;
}

a.link1{
  color:#62A9D2;font-size:13px;font-weight:bold;text-decoration:none;
}

a.link2{
  padding:8px;background:#62A9D2;font-size:13px;color:#ffffff;text-decoration:none;font-weight:bold;
}

a.link3{
  background:#62A9D2; color:#ffffff; padding:8px 10px;text-decoration:none;font-size:13px;
}
.bgBody{
background: #202020;

}
.bgItem{
background: #ffffff;
}
</style>
<script type='colorScheme' class='swatch active'>
  {
    'name':'Default',
    'bgBody':'F6F6F6',
    'link':'62A9D2',
    'color':'999999',
    'bgItem':'ffffff',
    'title':'555555'
  }
</script>

</head>
<body paddingwidth='0' paddingheight='0'   style='padding-top: 0; padding-bottom: 0; padding-top: 0; padding-bottom: 0; background-repeat: repeat; width: 100% !important; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; -webkit-font-smoothing: antialiased;' offset='0' toppadding='0' leftpadding='0'>
  <table width='100%' border='0' align='center' cellpadding='0' cellspacing='0' bgcolor='#ffffff' class='tableContent bgBody'  style='font-family:helvetica, sans-serif;'>
    
    <!--  =========================== The header ===========================  -->      
    <div class='movableContent'>
                      <table width='900' border='0' cellspacing='0' cellpadding='0' align='center' valign='top'>
                        <tr>
                          <td>
                            <div class='contentEditableContainer contentImageEditable'>
                              <div class='contentEditable'>
                                <img src='http://oneidnet.com/assets/images/bigimg.png' alt='What we do' data-default='placeholder' data-max-width='900' width='900' height='180' >
                              </div>
                            </div>
                          </td>
                        </tr>
                        
                      </table>
                    </div>
    
          <!--  =========================== The body ===========================  -->   
          

          <tr>
            <td class='movableContentContainer'>              
              <div class='movableContent'>
                <table width='900' border='0' cellspacing='0' cellpadding='0' align='center' valign='top'>
                  <tr>
                    <td bgcolor='#43474A' valign='top'>
                      <table width='900' border='0' cellspacing='0' cellpadding='0' align='center' valign='top'>
                        <tr>
                          <td align='left' valign='middle' >
                            <div class='contentEditableContainer contentImageEditable'>
                              <div class='contentEditable' >
                                <img src='http://oneidnet.com/assets/images/oneidnetlogo.png' alt='OneIDNet' data-default='placeholder' data-max-width='102' width='80' height='80' style='margin-left:50px; padding-top:10px;'>
                              </div>
                            </div>
                          </td>
                          
                          <td align='' valign='middle' >
                            <div class='contentEditableContainer contentImageEditable'>
                              <div class='contentEditable' >
                                <h2 style='color:#ffffff; float:left; font-size:32px;'>Recover Your ONEIDNET Account User ID!</h2>
                              </div>
                            </div>
                          </td>
                        </tr>
                      </table>
                    </td>
                  </tr>
                </table>
              </div>

              <div class='movableContent'>
                <table width='900' border='0' cellspacing='0' cellpadding='0' align='center' valign='top'>
                  <tr><td height='5' bgcolor='#43474A'></td></tr>

                <tr><td height='5' bgcolor='#62A9D2'></td></tr>

                <tr><td height='40' class='bgItem'></td></tr>

                <tr>
                  <td>
                    <table width='900' border='0' cellspacing='0' cellpadding='0' align='center' valign='top' class='bgItem'>
                      <tr>
                        <td  width='70'></td>
                        <td  align='left' width='900'>
                          <div class='contentEditableContainer contentTextEditable'>
                          </div>
                        </td>
                        <td  width='70'></td>
                      </tr>

                      <tr><td colspan='3' height='22' ></td></tr>

                      <tr>
                        <td width='70'></td>
                        <td  align='eft' width='530'>
                          <div class='contentEditableContainer contentTextEditable'>
                            <div class='contentEditable' style='font-size:16px;color:#99A1A6;line-height:26px;'>
                             <p style='font-size:18px; color: #0f4666;'> <b> Dear $name , </b> </p> <br /> 
            
                                <p style='margin-top:0px; color:#000;' >
                               You forgot your ONEIDNET account user ID, not a problem, we’ll help you fix that.<br/>                               <br />
                                User name: <b>$username </b>
                                </p>
                             </div>
  
                          </div>
                        </td>
                        <td  width='70'></td>
                      </tr>

                      <tr><td colspan='3' height='45' ></td></tr>

                    </table>
                  </td>
                </tr>
                </table>
              </div>
              <div class='movableContent'>
                <table width='900' border='0' cellspacing='0' cellpadding='0' align='center' valign='top' class='bgBody' >
                
                  <tr><td height='28'></td></tr>

                  <tr>
                    <td valign='top' align='center'>
                      <div class='contentEditableContainer contentTextEditable'>
                        <div class='contentEditable' style='color:#A8B0B6; font-size:13px;line-height: 16px;'>
                          <p  style=' padding-left:40px; padding-right:30px; font-size:16px; color:#99A1A6; line-height:26px;'  >This e-mail contains confidential information; it is intended only for the individual addressed in the e-mail. Please log in to our system and start using the many free services we provide for you. If you are an existing user in the system, then you can log in directly or reset your password.
                          </p>
                        </div>
                      </div>
                      </td>
                    </tr>

                    <tr><td height='28'></td></tr>

                    <tr>
                      <td valign='top' align='center'>
                        <div class='contentEditableContainer contentTextEditable'>
                          <div class='contentEditable' style='color:#A8B0B6; font-weight:bold;font-size:13px;line-height: 30px;'>
                            <p >ONEIDNET - The World's unique Internet Web Operating System</p>
                          </div>
                        </div>
                        <div class='contentEditableContainer contentTextEditable'>
                          <div class='contentEditable' >
                            Follow us on <a target='_blank' href='https://www.facebook.com/oneidnet/' >Facebook</a> | <a target='_blank' href='https://twitter.com/oneidnet' >Twitter</a> | <a target='_blank' href='https://www.linkedin.com/company/oneidnet-information-technologies-private-limited' >LinkedIn</a>
                          </div>
                        </div>
                      </td>
                    </tr>
                </table>
              </div>

              <!--  =========================== The footer ===========================  -->
      </td>
    </tr>   

    

      <tr><td height='28'>&nbsp;</td></tr>

    </table>
  </td>
  
</tr>

<tr>
  <td class='bgBody'>&nbsp;  </td>
  <td class='bgBody'>&nbsp;  </td>
</tr>




</table>

      
      
     
  </body>
  </html>
";
		return $message ;
		}
    function passwordTemplate($name , $alink){
		$message ="<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml'>
<head>
  <meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
  <title>ONEIDNET Email Newsletter </title>
  <style type='text/css'>
  body {
   padding-top: 0 !important;
   padding-bottom: 0 !important;
   padding-top: 0 !important;
   padding-bottom: 0 !important;
   margin:0 !important;
   width: 100% !important;
   -webkit-text-size-adjust: 100% !important;
   -ms-text-size-adjust: 100% !important;
   -webkit-font-smoothing: antialiased !important;
   background:#000;
 }
 .tableContent img {
   border: 0 !important;
   display: block !important;
   outline: none !important;
 }

p, h2{
  margin:0;
}

div,p,ul,h2,h2{
  margin:0;
}

h2.bigger,h2.bigger{
  font-size: 32px;
  font-weight: normal;
}

h2.big,h2.big{
  font-size: 21px;
  font-weight: normal;
}

a.link1{
  color:#62A9D2;font-size:13px;font-weight:bold;text-decoration:none;
}

a.link2{
  padding:8px;background:#62A9D2;font-size:13px;color:#ffffff;text-decoration:none;font-weight:bold;
}

a.link3{
  background:#62A9D2; color:#ffffff; padding:8px 10px;text-decoration:none;font-size:13px;
}
.bgBody{
background: #202020;

}
.bgItem{
background: #ffffff;
}
</style>
<script type='colorScheme' class='swatch active'>
  {
    'name':'Default',
    'bgBody':'F6F6F6',
    'link':'62A9D2',
    'color':'999999',
    'bgItem':'ffffff',
    'title':'555555'
  }
</script>

</head>
<body paddingwidth='0' paddingheight='0'   style='padding-top: 0; padding-bottom: 0; padding-top: 0; padding-bottom: 0; background-repeat: repeat; width: 100% !important; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; -webkit-font-smoothing: antialiased;' offset='0' toppadding='0' leftpadding='0'>
  <table width='100%' border='0' align='center' cellpadding='0' cellspacing='0' bgcolor='#ffffff' class='tableContent bgBody'  style='font-family:helvetica, sans-serif;'>
    
    <!--  =========================== The header ===========================  -->      
    <div class='movableContent'>
                      <table width='900' border='0' cellspacing='0' cellpadding='0' align='center' valign='top'>
                        <tr>
                          <td>
                            <div class='contentEditableContainer contentImageEditable'>
                              <div class='contentEditable'>
                                <img src='http://oneidnet.com/assets/images/bigimg.png' alt='What we do' data-default='placeholder' data-max-width='900' width='900' height='180' >
                              </div>
                            </div>
                          </td>
                        </tr>
                        
                      </table>
                    </div>
    
          <!--  =========================== The body ===========================  -->   
          

          <tr>
            <td class='movableContentContainer'>              
              <div class='movableContent'>
                <table width='900' border='0' cellspacing='0' cellpadding='0' align='center' valign='top'>
                  <tr>
                    <td bgcolor='#43474A' valign='top'>
                      <table width='900' border='0' cellspacing='0' cellpadding='0' align='center' valign='top'>
                        <tr>
                          <td align='left' valign='middle' >
                            <div class='contentEditableContainer contentImageEditable'>
                              <div class='contentEditable' >
                                <img src='http://oneidnet.com/assets/images/oneidnetlogo.png' alt='OneIDNet' data-default='placeholder' data-max-width='102' width='80' height='80' style='margin-left:50px; padding-top:10px;'>
                              </div>
                            </div>
                          </td>
                          
                          <td align='' valign='middle' >
                            <div class='contentEditableContainer contentImageEditable'>
                              <div class='contentEditable' >
                                <h2 style='color:#ffffff; float:left; font-size:32px;'>Reset Your ONEIDNET Account Password!</h2>
                              </div>
                            </div>
                          </td>
                        </tr>
                      </table>
                    </td>
                  </tr>
                </table>
              </div>

              <div class='movableContent'>
                <table width='900' border='0' cellspacing='0' cellpadding='0' align='center' valign='top'>
                  <tr><td height='5' bgcolor='#43474A'></td></tr>

                <tr><td height='5' bgcolor='#62A9D2'></td></tr>

                <tr><td height='40' class='bgItem'></td></tr>

                <tr>
                  <td>
                    <table width='900' border='0' cellspacing='0' cellpadding='0' align='center' valign='top' class='bgItem'>
                      <tr>
                        <td  width='70'></td>
                        <td  align='left' width='900'>
                          <div class='contentEditableContainer contentTextEditable'>
                          </div>
                        </td>
                        <td  width='70'></td>
                      </tr>

                      <tr><td colspan='3' height='22' ></td></tr>

                      <tr>
                        <td width='70'></td>
                        <td  align='eft' width='530'>
                          <div class='contentEditableContainer contentTextEditable'>
                            <div class='contentEditable' style='font-size:16px;color:#99A1A6;line-height:26px;'>
                             <p style='font-size:18px; color:#0f4666;'> <b> Dear $name , </b> </p>
                              <br /> 
                            
                              
                               
                                <p style='margin-top:0px; color:#000;' >                                                             
                                You forgot your ONEIDNET account password, not a problem, we will help you fix that. <br /><br/>                                
 				Click on the <a href='$alink'> link </a> below to reset your password or copy and paste the following link in your browsers' tab:<br/> $alink <br/>                                                                
                                </p>                                
                            </div>
                         
                          </div>
                        </td>
                        <td  width='70'></td>
                      </tr>

                      <tr><td colspan='3' height='45' ></td></tr>

                    </table>
                  </td>
                </tr>
                </table>
              </div>

  

              <div class='movableContent'>
                <table width='900' border='0' cellspacing='0' cellpadding='0' align='center' valign='top' class='bgBody' >
                
                  <tr><td height='28'></td></tr>

                  <tr>
                    <td valign='top' align='center'>
                      <div class='contentEditableContainer contentTextEditable'>
                        <div class='contentEditable' style='color:#A8B0B6; font-size:13px;line-height: 16px;'>
                          <p  style=' padding-left:40px; padding-right:30px; font-size:16px; color:#99A1A6; line-height:26px;'  >This e-mail contains confidential information; it is intended only for the individual addressed in the e-mail. Please log in to our system and start using the many free services we provide for you. If you are an existing user in the system, then you can log in directly or reset your password.
                          </p>
                        </div>
                      </div>
                      </td>
                    </tr>

                    <tr><td height='28'></td></tr>

                    <tr>
                      <td valign='top' align='center'>
                        <div class='contentEditableContainer contentTextEditable'>
                          <div class='contentEditable' style='color:#A8B0B6; font-weight:bold;font-size:13px;line-height: 30px;'>
                            <p >ONEIDNET - The World's unique Internet Web Operating System</p>
                          </div>
                        </div>
                        <div class='contentEditableContainer contentTextEditable'>
                          <div class='contentEditable' >
                            Follow us on <a target='_blank' href='https://www.facebook.com/oneidnet/' >Facebook</a> | <a target='_blank' href='https://twitter.com/oneidnet' >Twitter</a> | <a target='_blank' href='https://www.linkedin.com/company/oneidnet-information-technologies-private-limited' >LinkedIn</a>
                          </div>
                        </div>
                      </td>
                    </tr>
                </table>
              </div>

              <!--  =========================== The footer ===========================  -->
      </td>
    </tr>   

    

 

    </table>
  </td>
  
</tr>
</table>

      
      
     
  </body>
  </html>
";
		return $message ;
		}

}
