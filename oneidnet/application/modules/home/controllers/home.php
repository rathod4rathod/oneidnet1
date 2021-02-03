<?php
// header("Access-Control-Allow-Origin: https://oneidnet.com");
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class home extends CI_Controller {

    function __construct() {
        if(!isset($_SESSION)){
            session_start();
        }        
        parent::__construct();

       $modulesArray = array('db_api', 'memcaching', 'cookies', 'sessions');
        $this->wrapperinit->loadModules($modulesArray);
        $ckobj = $this->load->module("cookies");
    }

    function getUserId() {
        $obj = $this->load->module('cookies');
        return $obj->getUserID();
    }
 
    function getUserDetails() {
        if (isset($_REQUEST["uid"])) {
            $keyName = "USRDTA_" . $_REQUEST["uid"];
        } else {
            // Generate the Memcahe Object key for the User.
            $keyName = "USRDTA_" . $this->cookies->getUserID();
        }


        $result = $this->memcaching->getKey($keyName);

        if ($result) {
            $this->processUserDetail($result);
        } else {
            $userdetailsquery = "SELECT username,first_name,middle_name,last_name, profile_id,gender,user_id,password_hash,is_verified,img_path,role, time_zone,gender,country_id FROM `iws_profiles` where profile_id = " . $this->cookies->getUserID();
            $result = $this->db_api->custom($userdetailsquery);
            $this->memcaching->setKey($keyName, $result[0]);
            $this->processUserDetail($result[0]);
        }
    }

    function getUserDetails1() {

        // Generate the Memcahe Object key for the User.
        $keyName = "USRDTA_" . $this->cookies->getUserID();

        $result = $this->memcaching->getKey($keyName);
//        print_R($result);die();
        if ($result) {
            return $result;
        } else {
            $userdetailsquery = "SELECT username,first_name,middle_name,last_name, profile_id,gender,user_id,password_hash,is_verified,img_path,role, time_zone,gender,country_id FROM `iws_profiles` where profile_id = " . $this->cookies->getUserID();
            $result = $this->db_api->custom($userdetailsquery);
            $this->memcaching->setKey($keyName, $result[0]);
            return $result;
        }
    }

    // User Details to send to client to display in the homepage.
    function processUserDetail($result) {

        if ($result['img_path'] == '') {
            if ($result['gender'] == 'MALE') {
                $userProfileImgPath = base_url() . 'assets/Images/contentImages/person.png';
            } else if ($result['gender'] == 'FEMALE') {
                $userProfileImgPath = base_url() . 'assets/Images/contentImages/female.png';
            }
        } else {
            $userProfileImgPath = base_url() . 'data/' . $result['img_path'];
        }

        $email = $result['username'] . '@oneidnet.com';
        $userFullName = ucfirst($result['first_name']) . ' ' . $result['middle_name'] . ' ' . $result['last_name'];
        $response = array($userProfileImgPath, $userFullName, $email);
        echo json_encode($response);
    }

    function getWeatherReport() {
        $keyName = 'UWEATHERDT_' . $this->cookies->getUserID();
        $result = $this->memcaching->getKey($keyName);

        if ($result) {
            echo $result;
        } else {
            $dump = $this->weather->getWeatherDetail($this->cookies->getUserTimezone());
            if ($dump != 'OIN9') {
                $this->memcaching->setKey($keyName, $dump, time() + 6 * 60 * 60);
            }

            echo $dump;
        }
    }

    function resetSessionCookie() {
        $this->cookies->destroyCookie('oud', null);
        $this->sessions->destroySession();
        $url = base_url();
        header("Location: $url");
    }

    function prepareSessionFromCookie() {
        $rlt = $this->db_api->custom('select login_id from iws_login_history where ip_address="' . $_SERVER['REMOTE_ADDR'] . '" and profile_id=' . $this->cookies->getUserID() . "  and login_time >=now() - INTERVAL 1 DAY");
	$rlt=1;
        if ($rlt == 0) {
            header("Location: login/doLogout");
        } else {
             $profile_id = $this->cookies->getUserID(); 
            $user_id = $this->cookies->getUserIDHash();
            $passwordHash = $this->cookies->getUserPasswordHash();
            $where = "profile_id='$profile_id' && user_id='$user_id' && password_hash='$passwordHash'";
            $result = $this->db_api->select('first_name,middle_name,last_name,email,360mail_key,profile_id,user_id,password_hash', $mytable = 'iws_profiles', $where);

            if ($result != 0) {
                $s_user_full_name = $result[0]['first_name'] . " " . $result[0]['middle_name'] . " " . $result[0]['last_name'];
                $email=$result[0]['email'];
                $pwd=$result[0]['360mail_key'];
                $this->sessions->createSession($s_user_full_name, $profile_id,$email,$pwd);

                
            }
        }
    }

    function index() {


		$login_result=$this->db_api->select("ip_address","iws_blacklist_users","ip_address='".$_SERVER["REMOTE_ADDR"]."'");

		if($login_result===0){
                    $ipinfo=$this->ip_info();
                    //print_r($ipinfo);
                    $ipdata=array(
                        "ip_address"     =>$ipinfo['ip'],
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
                    $ip_insert=$this->db_api->insert($ipdata,"oneidnet_hits");
        if ($this->cookies->checkCookie() ) {
            if (!isset($_SESSION['user_full_name']) && empty($_SESSION['user_full_name'])) {

                $this->prepareSessionFromCookie();
            }


            $is_varified = $this->db_api->custom("select is_verified,status,email,img_path,first_name,last_name,gender from iws_profiles where profile_id=" . $this->cookies->getUserID());

            if ($is_varified[0]["is_verified"] == 1 && $is_varified[0]["status"]=='ACTIVE') {
                $rlt = $this->db_api->custom("select is_active from iws_login_history where ip_address='" . $_SERVER['REMOTE_ADDR'] . "' and profile_id=" . $this->cookies->getUserID());
                // echo var_dump($rlt);
		          // $rlt[0]["is_active"]=0;
                 if ($rlt[0]["is_active"] == 0) {

                    $data['time'] = $this->get_Time();
                    $data['email']=$is_varified[0]["email"];
                    $data['img_path']=$is_varified[0]["img_path"];
                    $data['first_name']=$is_varified[0]["first_name"];
                    $data['last_name']=$is_varified[0]["last_name"];
                    $data['gender']=$is_varified[0]["gender"];
                    //$data['weather_report']=$this->getWeatherReport();
                    $this->load->view('home/index', $data);
                    
                } else {
                    $this->load->module("login");
                    $this->login->doLogout();
                }
            } else if($is_varified[0]["is_verified"] !=1) {

                $this->introductionPage();
            }else  if($is_varified[0]["status"] !="ACTIVE"){
              if($is_varified[0]["status"]==="TEMPORARY_DELETION" || $is_varified[0]["status"]==="PERMANENT_DELETION"){
                redirect(base_url()."myaccount/accDeletion");
              }
              else{
                redirect(base_url()."myaccount/reactiveAccount");
              }
            }
        } else {

            print_r($this->cookies->getCookieVal('oud'));
			$data["country_name"]=$this->db_api->custom("select `country_id`,`country_name` from iws_countries_info order by `country_name`");
            $this->load->view('home_v',$data);
        }
	}
	else{
		echo 'Your IP is blocked.Please contact oneidnet administrator.';
		exit();
	}
    }

    
    function sendactivationmail($tomail, $subject, $text) {
        $path = APPPATH . 'libraries/My_PHPMailer.php';
        $mailobj = new My_PHPMailer();
       return $mresult = $mailobj->send_mail($tomail, $subject, $text);
    }
     

//12-april-2016 by venkatesh
    function resendActivationLink() {

/*        $randvalue = rand(11111, 99999);
        if ($this->db_api->update(["mvs_code" => $randvalue], "iws_profiles", "profile_id=" . $this->cookies->getUserID()) == 1) {
            $rlt = $this->db_api->custom("SELECT existing_email_id FROM `iws_profiles` WHERE profile_id=" . $this->cookies->getUserID());
             $body =  $this->activationTemplate(base_url() . "registration/activation?aid=" . bin2hex($this->getUserId() . "###" . $randvalue));
             $this->sendactivationmail($rlt[0]["existing_email_id"], "Activate Your ONEIDNET Account!", $body);
            echo "ONR9";
        }*/

    $rlt = $this->db_api->custom("SELECT mvs_code,existing_email_id FROM `iws_profiles` WHERE profile_id=" . $this->cookies->getUserID());
             $body =  $this->activationTemplate(base_url() . "registration/activation?aid=" . bin2hex($this->getUserId() . "###" . $rlt[0]["mvs_code"]));
             $this->sendactivationmail($rlt[0]["existing_email_id"], "Activate Your ONEIDNET Account!", $body);
            echo "ONR9";
    }

//29-01-2016 by venkatesh
    function introductionPage() {
//        $rlt = "";
//        $rlt = $this->db_api->custom("SELECT existing_email_id,mvs_code,activationlink_sent FROM `iws_profiles` WHERE profile_id=" . $this->cookies->getUserID());
//        if ($rlt != 0) {
//            if ($rlt[0]["activationlink_sent"] == "NO") {
//                $body =  $this->activationTemplate(base_url() . "registration/activation?aid=" . bin2hex($this->getUserId() . "###" . $rlt[0]["mvs_code"]));
//                $this->sendactivationmail($rlt[0]["existing_email_id"], "ONEIDNET Avtivation link", $body);
//                
//                $dbobj = $this->load->module("db_api");
//                 $dbobj->update(["activationlink_sent" => "YES"], "iws_profiles", "profile_id=" . $this->cookies->getUserID());
//            }
//
//            $this->load->view('home/introductionPage');
//        } else {
//            redirect(base_url());
//        }
        
          $this->load->view('home/introductionPage');
    }

    function global_countries_info() {
        $country_query = "SELECT country_code, isd_code, country_name,country_id,mobile_max_length FROM `iws_countries_info` ";
        $result = $this->db_api->custom($country_query);
        return $result;
    }

    function get_Time() {
        date_default_timezone_set($this->cookies->getUserTimezone());
        $time = date('H:i a', time());
        return $time;
    }

    function getCountry_name() {
        $country_query = "SELECT country_name FROM `iws_countries_info` where country_id =85";
        $result = $this->db_api->custom($country_query);
        return $result;
    }

    function getUser_details() {
        $userdetailsquery = "SELECT profile_id ,img_path,user_id,username,email,first_name,middle_name,last_name,gender,country_id FROM `iws_profiles` where profile_id = " . $this->cookies->getUserID();
        $result = $this->db_api->custom($userdetailsquery);
        return $result;
    }

    function getUser_name() {
        $uname = $this->input->post('username');
        $tunnel_query = "SELECT username FROM `iws_profiles` where username = '" . $uname . "'";
        $result = $this->db_api->custom($tunnel_query);
        $username = $result[0]['username'];

        preg_match("/([a-zA-Z]+)(\\d+)/", $username, $matches);

        if ($username != "") {

            $tundev_a_sugg = array(); //random numbers
            $tundev_a_suggnames = array(); //available usernames
            for ($i = 0; $i < 4; $i++) {
                $randnum = rand(1, 1000);
                if ($matches[1] != "") {
                    $avluname = $matches[1] . $randnum;
                } else {
                    $avluname = $username . $randnum;
                }
                array_push($tundev_a_sugg, $avluname);
                $tunnel_query = "SELECT username FROM `iws_profiles` where username = '" . $tundev_a_sugg[$i] . "'";
                $result = $this->db_api->custom($tunnel_query);
                $username1 = $result[0]['username'];
                if ($tundev_a_sugg[$i] != $username1) {
                    array_push($tundev_a_suggnames, $tundev_a_sugg[$i]);
                }
            }
            echo json_encode($tundev_a_suggnames);
        } else {
            $tundev_a_suggnames = array();
            echo json_encode($tundev_a_suggnames);
            //echo "<span id='successmsg'>"."This User Name is Available!"."</span>";
        }
    }

    //19-08-2015 by sravani for get dealerx auction notifications
    function get_dx_aution_notifications() {
        $user_id = $this->cookies->getUserID();
        $sql = "select count(*) as notificationscount from dx_notification where user_id_fk in(SELECT dealer_id_fk from  dx_dealer_followers where user_id_fk=$user_id) and type='Auction' and status=0";
        $result = $this->db_api->custom($sql);
        return $result;
    }

//for oneidnet profile image update
    function profile_image_update() {
        $bean = $this->load->module('cookies');
        $user_id = $bean->getUserID();
        $d_date = new DateTime();
        $s_time = $d_date->format('Y-m-d-H-i-s');
        $s_uploaddir = "data/";
        $s_name = basename($_FILES['bgChangeField']['name']);
        list($txt, $ext) = explode(".", $s_name);
        $s_ppic_image_name = $s_uploaddir . 'profile_photo_' . $user_id . $s_time . "." . $ext;
        shell_exec('chmod -R 777 /var/www/html/oneidnet');
        echo 'data/profile_photo_' . $user_id . $s_time . "." . $ext;
        if (move_uploaded_file($_FILES['bgChangeField']['tmp_name'], $s_ppic_image_name)) {
            shell_exec('chmod -R 777 ' . $s_ppic_image_name);
            $s_ppic_image_name = 'profile_photo_' . $user_id . $s_time . "." . $ext;
            $a_data = array("img_path" => $s_ppic_image_name);
            $mytable = " iws_profiles";
            $where = "profile_id='" . $user_id . "'";
            $rlt = $this->db_api->update($a_data, $mytable, $where);
        } else {
            echo "fie not uploaded";
        }
    }

//for oneidnet profile image update by venkatesh feb 05 2016
    function basic_profile_image_update() {
        $bean = $this->load->module('cookies');
        $user_id = $bean->getUserID();
        $d_date = new DateTime();
        $s_time = $d_date->format('Y-m-d-H-i-s');
        $s_uploaddir = "temp/";
        $s_name = basename($_FILES['bgChangeField']['name']);
        list($txt, $ext) = explode(".", $s_name);
        $s_ppic_image_name = $s_uploaddir . 'profile_photo_' . $user_id . $s_time . "." . $ext;
        shell_exec('chmod -R 777 /var/www/html/oneidnet');

        if (move_uploaded_file($_FILES['bgChangeField']['tmp_name'], $s_ppic_image_name)) {
            
            echo 'profile_photo_' . $user_id . $s_time . "." . $ext;
        } else {
            echo "fie not uploaded";
        }
    }

    

    function aboutus() {
        $data["uid"] = $this->getUserId();
        $data["userdetails"]=$this->getUser_details();
        $data["tittle"] = "About Us - ONEIDNET";
        $this->load->view('aboutus_page', $data);
    }

    function policies() {
        $data["uid"] = $this->getUserId();
        $data["userdetails"]=$this->getUser_details();
        $data["tittle"] = "Policies - ONEIDNET";
        $this->load->view('policies_page', $data);
    }

    function foundation() {
        $data["uid"] = $this->getUserId();
        $data["userdetails"]=$this->getUser_details();
        $data["tittle"] = "Foundation - ONEIDNET";
        $this->load->view('foundation_page', $data);
    }

    function privacy() {
        $data["uid"] = $this->getUserId();
        $data["userdetails"]=$this->getUser_details();
        $data["tittle"] = "Privacy - ONEIDNET";
        $this->load->view('privacy_page', $data);
    }

    function termsconditions() {
        $data["uid"] = $this->getUserId();
         $data["userdetails"]=$this->getUser_details();
         $data["tittle"] = "Terms & Conditions - ONEIDNET";
        
        $this->load->view('termsconditions_page', $data);
    }
   function terms_conditions()
    {    $data["uid"] = $this->getUserId();
		$data["tittle"] = "Terms & Conditions - ONEIDNET";
        $this->load->view("home/terms_conditions");
    }
    function customersupport() {
        $data["uid"] = $this->getUserId();
        $data["userdetails"]=$this->getUser_details();
         $data["tittle"] = "Customer Support - ONEIDNET";
        $this->load->view('customer_support', $data);
    }

    function customersupport_form() {
        $data["uid"] = $this->getUserId();
        $data["userdetails"]=$this->getUser_details();
         $data["tittle"] = "Customer Support - ONEIDNET";
         $data["type"] = $_REQUEST["type"];
         $data["mode"] = $_REQUEST["mod"];
        $this->load->view('customer_support', $data);
    }

    function valid_support_checking(){
        $dbapi = $this->load->module("db_api");
        // $resultArr = array();
        $supp_mail = $_REQUEST['emails'];
        if ($supp_mail != "") {

            $exp_emails = explode(",", $supp_mail);
            foreach ($exp_emails as $s_email) {
                $mailQry = "SELECT email FROM iws_profiles WHERE email = '" . $s_email . "'";
                $support_res = $dbapi->custom($mailQry);
                if($support_res)
                {
                    $supportQry = "SELECT * FROM oneid_support WHERE one_email = '" . $s_email . "'";
                    $supp_mail_res = $dbapi->custom($supportQry);
                    // echo var_dump($supp_mail_res);
                    if($supp_mail_res[0]['one_email'] == $support_res[0]['email']){
                        echo "VALID_UPDATE";
                    }
                    else
                    {
                        echo "VALID";
                    }
                }
                else
                {
                    echo "INVALID_USER";
                }
            }
        }
    }

    function valid_support_insertion(){
        $dbobj=$this->load->module("db_api");
        $emails = $_POST["email"];
        $module = $_POST["module"];
        $type = $_POST["type"];
        $username = $_POST["username"];
        $pass = $_POST["pass"];
        if($type){
                $supp_arr = array(
                    "one_email" => $emails,
                    "one_module" => $module,
                    "one_type" => $type,
                    "one_username" => $username,
                    "one_password" => $pass
                );
                foreach ($supp_arr as $key => $val) {
                    $supp_arr[$key] = $this->test_input($supp_arr[$key]);
                }
                $staffRec = $dbobj->insert($supp_arr, "oneid_support");

                echo "SUPPORT_INSERTED";
        }
        else
        {
                $supp_arr = array(
                    "one_email" => $emails,
                    "one_module" => $module,
                    "one_username" => $username,
                    "one_password" => $pass
                );
                foreach ($supp_arr as $key => $val) {
                    $supp_arr[$key] = $this->test_input($supp_arr[$key]);
                }
                $staffRec = $dbobj->insert($supp_arr, "oneid_support");

                echo "SUPPORT_INSERTED";
        }
    }
// contactus page
    function contactus(){
      $data["uid"] = $this->getUserId();
      $data["userdetails"]=$this->getUser_details();
      $data["tittle"] = "Contact Us - ONEIDNET";
      $this->load->view("home/contactus_page",$data);
    }
    function allinone() {
        $data["uid"] = $this->getUserId();
         $data["userdetails"]=$this->getUser_details();
         $data["tittle"] = "All In One - ONEIDNET";
        $this->load->view('allinone_page', $data);
    }
//12-april-2016 by venkatesh
    function passwordReset($id){
        if( ctype_xdigit($id)){           
           
          $detail=explode("###",hex2bin($id));
//          echo "<pre>";print_R($detail);die();
          if(count($detail)==3){
               $dbobj=$this->load->module("db_api");
              $rlt=$dbobj->custom("select profile_id from iws_profiles where profile_id=".$detail[0]." and mvs_code=".$detail[1]." and existing_email_id='".$detail[2]."'");
              if($rlt==0){
                  redirect(base_url());
              }else{
                  $data["prfid"]=$rlt[0]["profile_id"]."###".$detail[1];
                   $data["uid"] = $this->getUserId();
              $this->load->view("home/passwordreset",$data);
              }
               
          }else{
            redirect(base_url());         
          }
        }else{
     redirect(base_url());
        }
        
    }
    
    function activationTemplate($alink){
        
         $message = "<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
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
<body paddingwidth='0' paddingheight='0'   style='padding-top: 0;  padding-bottom: 0; padding-top: 0; padding-bottom: 0; background-repeat: repeat; width: 100% !important; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; -webkit-font-smoothing: antialiased;' offset='0' toppadding='0' leftpadding='0'>
  <table width='100%' border='0' align='center' cellpadding='0' cellspacing='0'  class='tableContent bgBody'  style='font-family:helvetica, sans-serif;'>
    
    <!--  =========================== The header ===========================  -->      
    <div class='movableContent'>
                      <table width='900' border='0' cellspacing='0' cellpadding='0' align='center' valign='top'>
                        <tr>
                          <td>
                            <div class='contentEditableContainer contentImageEditable'>
                              <div class='contentEditable'>
                                <img src='".base_url()."assets/Images/bigimg.png' alt='What we do' data-default='placeholder' data-max-width='900' width='900' height='180' >
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
                                <img src='".base_urL()."assets/Images/oneidnetlogo.png' alt='OneIDNet' data-default='placeholder' data-max-width='102' width='80' height='80' style='margin-left:50px; padding-top:10px;'>
                              </div>
                            </div>
                          </td>
                          
                          <td align='' valign='middle' >
                            <div class='contentEditableContainer contentImageEditable'>
                              <div class='contentEditable' >
                                <h2 style='color:#ffffff; float:left; font-size:32px;'>Activate Your ONEIDNET Account!</h2>
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
                              <p style='color:#000;'><b style='color:#0f4666; font-weight:bold; font-size:18px;'>Dear ". $_SESSION['user_full_name']."  ,</b> <br> <br> Welcome to ONEIDNET! <br> <br> Activating your account gives you complete and free access to the ONEIDNET System.

                               ONEIDNET is an integrated System, unlike any other. Its like having sixteen websites in one; having your own personalized Internet with everything in it!.</p>
                              
                               <p style='margin-top:15px; color:#000;' >Once you sign in to the System, you will receive an instructional e-mail to help you get started with ONEIDNET.

Just confirm your e-mail address below to see the whole new world that is waiting for you inside the System. ENJOY!</p>
                              <p style='margin-top:15px; color:#000;'><a href='$alink' >Click here to activate your Account</a></p>
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
                <table width='900' border='0' cellspacing='0' cellpadding='0' align='center' valign='top'>
                  <tr><td height='15' bgcolor='#43474A'>
                 <p style='color:#069; padding-left:60px; padding-top:10px; font-size:20px; padding-bottom:10px; color:#fff;'> Watch Our System Demo </p>
                  </td></tr>
                    <tr>
                      <td>
                        <table width='900' border='0' cellspacing='0' cellpadding='0' align='center' valign='top' bgcolor='#ffffff' style='overflow:hidden;'>
                          <tr>
                            <td width='25'></td>
                            <td width='450' valign='middle'>
                              <div class='contentEditableContainer contentTextEditable'>
                                <div class='contentEditable' style='font-family:Georgia; margin-left:20px; font-style:italic;color:#0F4666;font-size:15px;line-height:19px;'>
                               <a href='https://www.youtube.com/watch?v=X-wf3iyYhDc'> 
                                  <img src='".base_url()."assets/Images/leftImg.jpg' alt='video'></a>
                                </div>
                              </div>
                            </td>  
                            <td width='450' valign='top'>
                              <div class='contentEditableContainer contentTextEditable'>
                                <div class='contentEditable' style='font-family:Georgia; margin-left:20px; font-style:italic;color:#0F4666;font-size:15px;line-height:19px;'>
                                <p style=' padding-top:15px; '>ONEIDNET Sytem contains all the social and professional networks together.</p>
                                
                                <ul style='margin-top:20px; font-style:normal; line-height:30px; list-style:none;'>
                                	<li><span style='font-size:20px; padding-right:10px;'>&raquo;</span>Connect with friends</li>
                                    <li><span style='font-size:20px; padding-right:10px;'>&raquo;</span>Job Posting and Job View</li>
                                    <li><span style='font-size:20px; padding-right:10px;'>&raquo;</span>Open a Store ,Sale Items, Buy Items</li>
                                    <li><span style='font-size:20px; padding-right:10px;'>&raquo;</span>Make prefessional Network</li>
                                </ul>
                                
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
                <table width='900' border='0' cellspacing='0' cellpadding='0' align='center' valign='top' class='bgBody' >
                
                  <tr><td height='28'></td></tr>

                  <tr>
                    <td valign='top' align='center'>
                      <div class='contentEditableContainer contentTextEditable'>
                        <div class='contentEditable' style='color:#A8B0B6; font-size:13px;line-height: 16px;'>
                          <p  style=' padding-left:40px; padding-right:30px; font-size:16px; color:#99A1A6; line-height:26px;'  > This e-mail contains confidential information; it is intended only for the individual addressed in the e-mail. Please log in to our system and start using the many free services we provide for you. If you are an existing user in the system, then you can log in directly or reset your password.
                          </p>
                          <p style=' padding-left:40px; padding-right:30px; font-size:16px; color:#99A1A6; line-height:26px;'>If you were not the initiator for this password reset, another user entered your e-mail address by mistake to initiate a password reset action. If you did not start this action, it is not necessary for you to take any further action and it is safe for you to delete this e-mail.</p>
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
  <td height='130' bgcolor='#43474A'>&nbsp;</td>
</tr>

<tr>
  <td class='bgBody'>&nbsp;  </td>
  <td class='bgBody'>&nbsp;  </td>
</tr>




</table>

      
      
     
  </body>
  </html>";
   return  $message ;
    }

    function activationnregTemplate($alink,$user,$pass){
        
         $message = "<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
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
<body paddingwidth='0' paddingheight='0'   style='padding-top: 0;  padding-bottom: 0; padding-top: 0; padding-bottom: 0; background-repeat: repeat; width: 100% !important; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; -webkit-font-smoothing: antialiased;' offset='0' toppadding='0' leftpadding='0'>
  <table width='100%' border='0' align='center' cellpadding='0' cellspacing='0'  class='tableContent bgBody'  style='font-family:helvetica, sans-serif;'>
    
    <!--  =========================== The header ===========================  -->      
    <div class='movableContent'>
                      <table width='900' border='0' cellspacing='0' cellpadding='0' align='center' valign='top'>
                        <tr>
                          <td>
                            <div class='contentEditableContainer contentImageEditable'>
                              <div class='contentEditable'>
                                <img src='".base_url()."assets/Images/bigimg.png' alt='What we do' data-default='placeholder' data-max-width='900' width='900' height='180' >
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
                                <img src='".base_urL()."assets/Images/oneidnetlogo.png' alt='OneIDNet' data-default='placeholder' data-max-width='102' width='80' height='80' style='margin-left:50px; padding-top:10px;'>
                              </div>
                            </div>
                          </td>
                          
                          <td align='' valign='middle' >
                            <div class='contentEditableContainer contentImageEditable'>
                              <div class='contentEditable' >
                                <h2 style='color:#ffffff; float:left; font-size:32px;'>Activate Your ONEIDNET Account!</h2>
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
                              <p style='color:#000;'><b style='color:#0f4666; font-weight:bold; font-size:18px;'>Dear,</b> <br> <br> Welcome to ONEIDNET! <br> <br> Your Oneidnet Credetials, <br> Username : ". $user." <br> Passwor : ". $pass." <br> Activating your account gives you complete and free access to the ONEIDNET System.

                               ONEIDNET is an integrated System, unlike any other. Its like having sixteen websites in one; having your own personalized Internet with everything in it!.</p>
                              
                               <p style='margin-top:15px; color:#000;' >Once you sign in to the System, you will receive an instructional e-mail to help you get started with ONEIDNET.

Just confirm your e-mail address below to see the whole new world that is waiting for you inside the System. ENJOY!</p>
                              <p style='margin-top:15px; color:#000;'><a href='$alink' >Click here to activate your Account</a></p>
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
                <table width='900' border='0' cellspacing='0' cellpadding='0' align='center' valign='top'>
                  <tr><td height='15' bgcolor='#43474A'>
                 <p style='color:#069; padding-left:60px; padding-top:10px; font-size:20px; padding-bottom:10px; color:#fff;'> Watch Our System Demo </p>
                  </td></tr>
                    <tr>
                      <td>
                        <table width='900' border='0' cellspacing='0' cellpadding='0' align='center' valign='top' bgcolor='#ffffff' style='overflow:hidden;'>
                          <tr>
                            <td width='25'></td>
                            <td width='450' valign='middle'>
                              <div class='contentEditableContainer contentTextEditable'>
                                <div class='contentEditable' style='font-family:Georgia; margin-left:20px; font-style:italic;color:#0F4666;font-size:15px;line-height:19px;'>
                               <a href='https://www.youtube.com/watch?v=X-wf3iyYhDc'> 
                                  <img src='".base_url()."assets/Images/leftImg.jpg' alt='video'></a>
                                </div>
                              </div>
                            </td>  
                            <td width='450' valign='top'>
                              <div class='contentEditableContainer contentTextEditable'>
                                <div class='contentEditable' style='font-family:Georgia; margin-left:20px; font-style:italic;color:#0F4666;font-size:15px;line-height:19px;'>
                                <p style=' padding-top:15px; '>ONEIDNET Sytem contains all the social and professional networks together.</p>
                                
                                <ul style='margin-top:20px; font-style:normal; line-height:30px; list-style:none;'>
                                    <li><span style='font-size:20px; padding-right:10px;'>&raquo;</span>Connect with friends</li>
                                    <li><span style='font-size:20px; padding-right:10px;'>&raquo;</span>Job Posting and Job View</li>
                                    <li><span style='font-size:20px; padding-right:10px;'>&raquo;</span>Open a Store ,Sale Items, Buy Items</li>
                                    <li><span style='font-size:20px; padding-right:10px;'>&raquo;</span>Make prefessional Network</li>
                                </ul>
                                
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
                <table width='900' border='0' cellspacing='0' cellpadding='0' align='center' valign='top' class='bgBody' >
                
                  <tr><td height='28'></td></tr>

                  <tr>
                    <td valign='top' align='center'>
                      <div class='contentEditableContainer contentTextEditable'>
                        <div class='contentEditable' style='color:#A8B0B6; font-size:13px;line-height: 16px;'>
                          <p  style=' padding-left:40px; padding-right:30px; font-size:16px; color:#99A1A6; line-height:26px;'  > This e-mail contains confidential information; it is intended only for the individual addressed in the e-mail. Please log in to our system and start using the many free services we provide for you. If you are an existing user in the system, then you can log in directly or reset your password.
                          </p>
                          <p style=' padding-left:40px; padding-right:30px; font-size:16px; color:#99A1A6; line-height:26px;'>If you were not the initiator for this password reset, another user entered your e-mail address by mistake to initiate a password reset action. If you did not start this action, it is not necessary for you to take any further action and it is safe for you to delete this e-mail.</p>
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
  <td height='130' bgcolor='#43474A'>&nbsp;</td>
</tr>

<tr>
  <td class='bgBody'>&nbsp;  </td>
  <td class='bgBody'>&nbsp;  </td>
</tr>




</table>

      
      
     
  </body>
  </html>";
   return  $message ;
    }

function claimMail(){
  //$profile_id=isset($_REQUEST["profile_id"])?$_REQUEST["profile_id"]:"";
  $dbapi=$this->load->module("db_api");
  //$rlt=$dbapi->select("existing_email_id","iws_profiles","profile_id=31");
  $rlt=$dbapi->select("username","iws_profiles","profile_id=".$this->getUserId());
  $answers_arry=array("I used profanity insults against another user"=>$_REQUEST["profanity"],"I used pornographic content"=>$_REQUEST["prono"],
      "I used drugs content"=>$_REQUEST["drugs"],"I used religious derogatory posts"=>$_REQUEST["religious"],
      "I used racial derogatory posts"=>$_REQUEST["racial"],"I sent spam content"=>$_REQUEST["spam"],
      "I sent scams to other users"=>$_REQUEST["scam"],"I am the legitimate user of this account"=>$_REQUEST["legitimate"]);
  $body=$this->claimEmailTpl($rlt[0]["username"],$answers_arry);
  $current_date=date("Y-m-d");
  $this->sendactivationmail("claim@oneidnet.com", "Claim Request - ".$rlt[0]["username"]." on ".date("d M,Y",strtotime($current_date)), $body);
  echo "end";
}

function claimEmailTpl($profile_name='',$answers_arry){
  $message = "<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
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
<body paddingwidth='0' paddingheight='0'   style='padding-top: 0;  padding-bottom: 0; padding-top: 0; padding-bottom: 0; background-repeat: repeat; width: 100% !important; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; -webkit-font-smoothing: antialiased;' offset='0' toppadding='0' leftpadding='0'>
  <table width='100%' border='0' align='center' cellpadding='0' cellspacing='0' bgcolor='#ffffff' class='tableContent bgBody'  style='font-family:helvetica, sans-serif;'>

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
                              <div class='contentEditable' >on
                                <img src='https://oneidnet.com/assets/Images/oneidlogo.png' alt='OneIDNet' data-default='placeholder' data-max-width='102' width='80' height='80' style='margin-left:50px; padding-top:10px;'>
                              </div>
                            </div>
                          </td>

                          <td align='' valign='middle' >
                            <div class='contentEditableContainer contentImageEditable'>
                              <div class='contentEditable' >
                                <h2 style='color:#ffffff; float:left; font-size:32px;'>Claim request for reactivating ONEIDNET Account!</h2>
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
                        <td  align='left' width='530'>
                          <div class='contentEditableContainer contentTextEditable'>
                            <div class='contentEditable' style='font-size:16px;color:#99A1A6;line-height:26px;'>
                              <p style='color:#000;'><b style='color:#99A1A6; font-weight:bold; font-size:18px;'>Dear Team,</b> <br> <br> Welcome to ONEIDNET!</p>
                              <p style='margin-top:15px; color:#000;'><b>".ucwords($profile_name)."</b> requesting to activate ONEIDNET account and below are the answers given for the claim points</p>
                            </div>
                          </div>
                        </td><td  width='70'></td>
                      </tr>
<tr>
                        <td width='70'></td>
                        <td  align='eft' width='530'>
                          <div class='contentEditableContainer contentTextEditable'>
                            <div class='contentEditable' style='font-size:16px;color:#99A1A6;line-height:26px;'><br>";
  foreach($answers_arry as $key=>$val){
                              $message.="<p style='color:#000;'>".$key."-".$val."</p>";
                                }
                            $message.="</div>
                          </div>
                        </td>
                        <td  width='70'></td>
                      </tr>
                      <tr><td colspan='3' height='45' ></td></tr></table>
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
  <td height='130' bgcolor='#43474A'>&nbsp;</td>
</tr>
<tr>
  <td class='bgBody'>&nbsp;  </td>
  <td class='bgBody'>&nbsp;  </td>
</tr>
</table></body></html>";
                    //echo $message;
   return  $message ;
    }
    function updateProfile(){
      $decoded_str=  base64_decode(base64_decode($_REQUEST["pid"]));
      $decoded_aid=  base64_decode(base64_decode($_REQUEST["aid"]));
      $profile_id=trim($decoded_str,"#");
      $dbapi=$this->load->module("db_api");
      $where="user_id_fk=".$profile_id." AND rec_aid=".$decoded_aid;
      $res=$dbapi->delete("iws_act_deactivation_log",$where);
      if($res!=0){
        echo "ISNT1";
      }else{
        echo "ISNT0";
      }
    }
    
    function insertContactUs(){
      //print_r($_REQUEST);
      foreach($_REQUEST as $key=>$val){
        $_REQUEST[$key]=$this->test_input($_REQUEST[$key]);
      }
      $ins_arry=array("subject"=>$_REQUEST["contact_subject"],"description"=>$_REQUEST["contact_message"],"email_id"=>$_REQUEST["contact_email"]);
      $dbapi=$this->load->module("db_api");
      $contact_ins=$dbapi->insert($ins_arry,"iws_contact_us");
      echo $contact_ins;
    }
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        $data = str_replace("'","&#39",$data);
        return $data;
    }
    
    function crossdomainchesk(){
        $this->load->view("home/crossdomainchesk");
    }
      function donations(){
            $data["uid"] = $this->getUserId();
             $data["tittle"] = "Donations - ONEIDNET";
          $this->load->view("home/donations_page",$data); 
      }
      function donationMail(){
          foreach($_REQUEST as $key=>$val){
        $_REQUEST[$key]=$this->test_input($_REQUEST[$key]);
      }
       $subject =   $_REQUEST['donation_subject'];
       $message=   $_REQUEST['donation_message'];
       $email=   $_REQUEST['donation_email'];
       $contact=$_REQUEST['contact'];
       $ins_arry=array("subject"=>$subject,"message"=>$message,"email"=>$email,"contact"=>$contact);
       $dbapi=$this->load->module("db_api");
       $result=$dbapi->insert($ins_arry,"iws_donations_enquiries");
       if($result){
       $path = APPPATH . 'libraries/My_PHPMailer.php';
       $mailobj = new My_PHPMailer();
       echo $mresult = $mailobj->send_mail('donations@oneidnet.com', $subject, $message);
       }
      }
    function ip_info($ip = NULL, $purpose = "location", $deep_detect = TRUE) {
    $output = NULL;
    if (filter_var($ip, FILTER_VALIDATE_IP) === FALSE) {
        $ip = $_SERVER["REMOTE_ADDR"];
        if ($deep_detect) {
            if (filter_var(@$_SERVER['HTTP_X_FORWARDED_FOR'], FILTER_VALIDATE_IP))
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
            if (filter_var(@$_SERVER['HTTP_CLIENT_IP'], FILTER_VALIDATE_IP))
                $ip = $_SERVER['HTTP_CLIENT_IP'];
        }
    }
    $purpose    = str_replace(array("name", "\n", "\t", " ", "-", "_"), NULL, strtolower(trim($purpose)));
    $support    = array("country", "countrycode", "state", "region", "city", "location", "address");
    $continents = array(
        "AF" => "Africa",
        "AN" => "Antarctica",
        "AS" => "Asia",
        "EU" => "Europe",
        "OC" => "Australia (Oceania)",
        "NA" => "North America",
        "SA" => "South America"
    );
    if (filter_var($ip, FILTER_VALIDATE_IP) && in_array($purpose, $support)) {
        $ipdat = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=" . $ip));
        if (@strlen(trim($ipdat->geoplugin_countryCode)) == 2) {
            switch ($purpose) {
                case "location":
                    $output = array(
                        "city"           => @$ipdat->geoplugin_city,
                        "state"          => @$ipdat->geoplugin_regionName,
                        "country"        => @$ipdat->geoplugin_countryName,
                        "country_code"   => @$ipdat->geoplugin_countryCode,
                        "continent"      => @$continents[strtoupper($ipdat->geoplugin_continentCode)],
                        "continent_code" => @$ipdat->geoplugin_continentCode,
                        "latitude" => @$ipdat->geoplugin_latitude,
                        "longitude" => @$ipdat->geoplugin_longitude,
                        "currency_code"=> @$ipdat->geoplugin_currencyCode,
                        "currency_symbol"=>@$ipdat->geoplugin_currencySymbol,
                        "currency_converter"=>@$ipdat->geoplugin_currencyConverter,
                        "zipcode"=>@$ipdat->geoplugin_zipcode,
                        "ip"=>$ip

                    );
                    break;
                case "address":
                    $address = array($ipdat->geoplugin_countryName);
                    if (@strlen($ipdat->geoplugin_regionName) >= 1)
                        $address[] = $ipdat->geoplugin_regionName;
                    if (@strlen($ipdat->geoplugin_city) >= 1)
                        $address[] = $ipdat->geoplugin_city;
                    $output = implode(", ", array_reverse($address));
                    break;
                case "city":
                    $output = @$ipdat->geoplugin_city;
                    break;
                case "state":
                    $output = @$ipdat->geoplugin_regionName;
                    break;
                case "region":
                    $output = @$ipdat->geoplugin_regionName;
                    break;
                case "country":
                    $output = @$ipdat->geoplugin_countryName;
                    break;
                case "countrycode":
                    $output = @$ipdat->geoplugin_countryCode;
                    break;
            }
        }
    }
    return $output;
}
    
function v(){
	
	$this->load->view("v");
}
function suresh(){
	
	$this->load->view("videocalls/suresh");
}
function chatlogin(){
	if(isset($_REQUEST["user"])){
        $_SESSION["vuser"]=$_REQUEST["user"];
        header('Location: v.php');
    }
	$this->load->view("chatlogin");
}
//november 23 2016 by venkatesh
function registrationActivated($id=null){
    
    
    if($id){
        $data["msg"]="Account Already activated";
    }else{
        $data["msg"]="Account activated successfully";
    }
    $this->load->view("home/registrationActivated",$data);
}

}
