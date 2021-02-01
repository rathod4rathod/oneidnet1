<?php 

if ( ! defined('BASEPATH')) exit('No direct script access allowed');
if(!isset($_SESSION)){
    session_start();    
}

/******************************************************************************
 * Purpose: Controller class to handle registration of app.
 * Author: shivajyothi
 * Date Written: Apr 27, 2015
 * 
 ******************************************************************************/
class Registration extends CI_Controller {
  
    function __construct() {
      parent::__construct(); 
      $ckobj = $this->load->module("cookies");
    
//         if (!$ckobj->getUserID()) {
//            echo '<script>if(self==top)
//		{location.replace("' . base_url() . '");}else{top.location.reload();}</script>';
//            die();
//        } else if ($_REQUEST) {
//          $sobj=  $this->load->module("session_restart");
//            if (isset($_REQUEST["skey"])) {
//                $sobj->key_check($_REQUEST["skey"]);
//            }
//        }
       $modulesArray = array( 'db_api', 'memcaching', 'cookies','sessions' );
        $this->wrapperinit->loadModules( $modulesArray );        
 
    }
    function getUserId() {
      $obj = $this->load->module('cookies');
      return $obj->getUserID();
    }

//26-may-2016 by venkatesh
    function salt(){
        return "#@$786ABoneidnet";
    }

    function nregactivation(){
      if($_REQUEST["ref"]){
        $dbobj=$this->load->module("db_api");
        $refercode=$_REQUEST["ref"];
        // $nusername = $_REQUEST["username"];
        // $pass = $_REQUEST["pass"];
        $scode = $_REQUEST["store"];
        // $rlt=$dbobj->select("*","iws_profiles","Refer=".$refercode." and is_verified=0");
        // if($rlt==0){
        //   // $this->load->view("home/home_v");
        // }
        // else
        // {
          $data["refercode"] = $refercode;
          // $data["nusername"] = $nusername;
          $data["storecode"] = $scode;
          // $data["pass"] = $pass;
          $this->load->view("home/reg_refer_user",$data);
        // }
      }
    }

    // function test_input($data) {
    //     $data = trim($data);
    //     $data = stripslashes($data);
    //     $data = htmlspecialchars($data);
    //     $data = str_replace("'","&#39",$data);
    //     return $data;
    // }

    function nregactivation_email(){
      $this->load->module("db_api");
      // $nreg_email = $this->input->post("nemail");
      $nreg_username = str_replace(array('.', ' ', "\n", "\t", "\r"), '', $this->input->post("nusername"));
      $nreg_password = str_replace(array('.', ' ', "\n", "\t", "\r"), '', $this->input->post("npass"));
      $nreg_refer = str_replace(array('.', ' ', "\n", "\t", "\r"), '', $this->input->post("nrefer"));
// str_replace('ST1','',$this->input->post("nstore"));
      $nreg_storeid = $this->input->post("nstore");

      $result = $this->db_api->custom( "select profile_id as count from iws_profiles where username='".$nreg_username."'");
      
      if($result[0]['count']== 0){
        $a_data = array(
          "user_id" => $this->uuid->v4(),
          "username"=>$nreg_username,
          "email"=>$nreg_username."@oneidnet.com",
          "password_hash" => "{SSHA512}".base64_encode(hash('sha512', $nreg_password.$this->salt(), true).$this->salt()), 
          "aams_code" => rand(10000,99999), 
          "mvs_code" => rand(10000,99999), 
          "arms_code" => rand(10000,99999), 
          "360mail_key" => $this->encrypt($nreg_password),
          "Refer" => $nreg_refer  
        );

        $a_data=$this->test_input($a_data);
        $s_tbl ="iws_profiles";
        $insert_result = $this->db_api->insert($a_data, $s_tbl); 
        if($insert_result==1){
          $countquery = "select * from iws_profiles where username='".$nreg_username."'";
          $nresult = $this->db_api->custom( $countquery);
          // redirect(base_url() . "registration/activation?aid=" . bin2hex($nresult[0]["profile_id"] . "###" . $nresult[0]["mvs_code"]));
          echo "registration/activation?aid=" . bin2hex($nresult[0]["profile_id"] . "###" . $nresult[0]["mvs_code"]);
        }
      }
      else
      {
        echo "exist";
      }
      // if($nreg_email){
      //   $emailerror = $this->db_api->custom("select profile_id,existing_email_id  from iws_profiles where existing_email_id='".$nreg_email."'");

      //   if($emailerror!=0){
      //       echo "Existing Mail Already Exist";
      //       die();
      //   }

      //   $rlt_nuser = $this->db_api->custom("SELECT * FROM iws_profiles WHERE Refer='".$nreg_refer."' and is_verified=0");
      //   // echo var_dump($rlt_nuser);
      //   if($rlt_nuser){

      //       $a_fields = array("user_id_fk" => $rlt_nuser[0]['profile_id'], "store_id_fk" => $nreg_storeid);
      //       foreach ($a_fields as $key => $val) {
      //           $a_fields[$key] = $this->test_input($a_fields[$key]);
      //       }
      //       $result = $this->db_api->insert($a_fields, "oshop_followings");
      //       // $a_fields = array("store_id_fk" => $nreg_storeid, "user_id_fk" => $this->getUserId());
      //       // $ins_result = $this->db_api->insert($a_fields, "oshop_followings");

      //     $nemail_update = $this->db_api->custom("UPDATE iws_profiles SET existing_email_id='$nreg_email' WHERE Refer='".$nreg_refer."' and is_verified=0");
         
      //     $imvscode = $this->db_api->custom("SELECT * FROM iws_profiles WHERE Refer='".$nreg_refer."' and is_verified=0");
      //      $s_user_id  = $imvscode[0]['profile_id']; 
      //      $s_user_full_name  = $imvscode[0]['first_name']." ".$imvscode[0]['middle_name']." ".$imvscode[0]['last_name']; 
      //     $log_obj=$this->load->module("login");
      //     $s_security_code = $log_obj->generateSecurity_Code( $imvscode[0]['profile_id'], $imvscode[0]['password_hash'], "", $imvscode[0]['role'], $imvscode[0]['user_id'], $imvscode[0]['language'], "" );  
      //     $this->sessions->createSession( $s_user_full_name, $s_user_id ); // User id to be removed later from session.
      //     $this->cookies->setCookie('oud', $s_security_code );
      //     $this->cookies->theme_setCookie("Clouds");
      //     $log_obj->updateLogin_History($s_user_id);
      //     $_SESSION['user_full_name']=$s_user_full_name;
      //     $fields = array('email'=>$imvscode[0]["username"]."@oneidnet.com",'security_code'=>$s_security_code);
      //     $this->db_api->update( $fields , "iws_profiles" ,"username='".$nreg_username."'" ) ; 
      //     $hobj=$this->load->module("home");
      //     $body =  $hobj->activationnregTemplate(base_url() . "registration/activation?aid=" . bin2hex($imvscode[0]["profile_id"] . "###" . $imvscode[0]["mvs_code"]),$nreg_username,$nreg_password);
      //     $hobj->sendactivationmail($nreg_email, "ONEIDNET Activation Link", $body);

      //     echo "success";
      //    }
      //    else
      //    {
      //     echo "expired";          
      //    }
      //     // return redirect()->to(base_url());
      // }
      // else
      // {
      //   echo "no input found";
      // }

    }
    
   function activation(){
       if(ctype_xdigit($_REQUEST["aid"])){
           $dbobj=$this->load->module("db_api");
          $detail=explode("###",hex2bin($_REQUEST["aid"]));
          if(count($detail)==2){
            // echo var_dump($detail[0],$detail[1]);
         $rlt=$dbobj->select("profile_id,username,first_name,middle_name,last_name,password_hash,is_verified","iws_profiles","profile_id=".$detail[0]." and mvs_code=".$detail[1]);
         if($rlt==0){
              redirect(base_url());
         }else if($rlt[0]["is_verified"]=='0'){
            
             $urlt=$dbobj->update(["is_verified"=>1,"mvs_code"=>rand(11111,99999),"is_vip" => 1],"iws_profiles","profile_id=".$detail[0]);
            if($urlt==1){
                $this->load->library('oneidnet_rc');

                $this->oneidnet_rc->addMailbox($rlt[0]["username"],  $rlt[0]["first_name"]." ".$rlt[0]["middle_name"]." ".$rlt[0]["last_name"],$rlt[0]["password_hash"], $quota_in_mb=100 );

                $countquery = "select email,theme,username,first_name,middle_name,last_name, profile_id,user_id,password_hash,is_verified,img_path,role,gender, time_zone, language, country_id,360mail_key from iws_profiles where profile_id=".$detail[0];
                
                $result = $this->db_api->custom( $countquery);

                /* Welcome email to user after registration */
                $home_obj=$this->load->module("home");                
                $body=$this->welcomeEmailTpl($result[0]["username"],$this->decrypt($result[0]["360mail_key"]));
                $home_obj->sendactivationmail($result[0]["email"],"Welcome to ONEIDNET",$body);
                $email_body=$this->instructionsEmailTpl();
                $home_obj->sendactivationmail($result[0]["email"],"ONEIDNET quick instructions",$email_body);
                /* Welcome email to user after registration and verification*/
				// blogs users details insertion
                $user_fullname=$s_firstname." ".$s_lastname;
                $blogs_users_name_arry=array("FINDIT"=>"","COFFICE"=>"","ONEIDSHIP"=>"","ONENETWORK"=>"","ONEIDNET"=>$user_fullname);
                $fullname_json=json_encode($blogs_users_name_arry);
                $blogs_users_ppic_arry=array("FINDIT"=>"","COFFICE"=>"","ONEIDSHIP"=>"","ONENETWORK"=>"","ONEIDNET"=>"");
                
                $ppic_json=json_encode($blogs_users_ppic_arry);                
                $discussion_str='{"CLICK":0,"BUZZIN":0,"ONENETWORK":0,"ONEVISION":0,"ONEIDNET":0,"ONEIDSHIP":0,"VCOM":0,"DEALERX":0,"COFFICE":0,"TRAVELTIME":0,"ISNEWS":0,"PAYBOOK":0,"CAREER":0,"TUNNEL":0,"NETPRO":0,"CVBANK":0,"FINDIT":0}';

                $blogs_users_arry=array("user_id_fk"=>$result[0]["profile_id"],"full_name_str"=>$fullname_json,"profile_pic_str"=>$ppic_json,"total_discussions_str"=>$discussion_str,"total_comments_str"=>$discussion_str);

                $this->db_api->insert($blogs_users_arry,"blog_users_details");
                // blogs users details insertion
                $s_user_id  = $result[0]['profile_id']; 
                $s_user_full_name  = $result[0]['first_name']." ".$result[0]['middle_name']." ".$result[0]['last_name']; 
                $_SESSION['user_id']=$result[0]['profile_id']; //This to be deleted, Read the data from cookie                        
                $log_obj=$this->load->module("login");
                $s_security_code = $log_obj->generateSecurity_Code( $result[0]['profile_id'], $result[0]['password_hash'], $result[0]['time_zone'], $result[0]['role'], $result[0]['user_id'], $result[0]['language'], $result[0]['country_id'] );  
                $this->sessions->createSession( $s_user_full_name, $s_user_id ); // User id to be removed later from session.
                $this->cookies->setCookie( 'oud', $s_security_code );
                $this->cookies->theme_setCookie( $result[0]['theme'] );
                $_SESSION['user_full_name']=$s_user_full_name;
                $_SESSION['user_image']=$result[0]['img_path']; //This to be deleted, Read the data from cookie
                $_SESSION['user_role']=$result[0]['role']; //This to be deleted, Read the data from cookie
                $_SESSION['tz'] = $result[0]['time_zone']; //This to be deleted, Read the data from cookie
                $_SESSION['key']=$result[0]['360mail_key'];
                $_SESSION['email']=$result[0]['email'];

                $keyName = "USRDTA_".$this->cookies->getUserID();
                $this->memcaching->setKey( $keyName , $result[0] ); 
                $fields = array('security_code'=>$s_security_code);
                $this->db_api->update( $fields , "iws_profiles" ,"profile_id=".$detail[0] ) ; 
                redirect(base_url()."home/registrationActivated");
              }else{
                  redirect(base_url());
              }
           }else{
               redirect(base_url()."home/registrationActivated/1");
           }
          }else{
              redirect(base_url());
          } 
         
       }else{
           redirect(base_url());
       }
   } 
   
   
   
    //26-05-2015 global function by venkatesh : this function create directory structure
  function directory_creation($id) {
    $dir_path = "stores/" . $id;
    $old_umask = umask(0);
    mkdir($dir_path, 0777);
    $create_path = $dir_path . "/cover/";
    mkdir($create_path, 0777);
        umask($old_umask);
  }
    
    function index(){
         }
    function test (){
      $this->load->view('test'); 
    }

	 function doRegistration(){
      $s_user_id            =    $this->uuid->v4();
      $s_firstname          =    $this->input->post("regdev_firstname");
      $s_lastname           =    $this->input->post("regdev_lastname");
      $s_username           =    $this->input->post("regdev_username");
      $s_email              =    $s_username."@oneidnet.com";
      $s_password           =    $this->input->post("regdev_password");
      $s_country          =    $this->input->post("regdev_country");
      $s_password_hash      =    "{SSHA512}".base64_encode(hash('sha512', $s_password.$this->salt(), true).$this->salt()); 
      $s_existing_email     =    $this->input->post("regdev_existemail");
      $mail360_pass_hash    =    $this->encrypt($s_password);
      $i_aams_code          =    rand(10000,99999);
      $i_mvs_code           =    rand(10000,99999);
      $i_arms_code          =    rand(10000,99999);
      
      $emailerror = $this->db_api->custom( "select profile_id,existing_email_id  from iws_profiles where existing_email_id='".$s_existing_email."'");

      if($emailerror!=0){
          echo "Alternate E-mail Already Exists";
          die();
      }

      $result = $this->db_api->custom( "select profile_id as count from iws_profiles where username='".$s_username."'");
      
      if($result[0]['count']== 0){
      $a_data =array("user_id"=>$s_user_id,
                     "username"=>$s_username,
                     "email"=>$s_email,
                     "first_name"=>$s_firstname,
                     "last_name"=>$s_lastname, 
                     "password_hash"=>$s_password_hash, 
                     "aams_code"=>$i_aams_code,
                     "existing_email_id"=>$s_existing_email,
                     "mvs_code"=>$i_mvs_code,
                     "arms_code"=>$i_arms_code,
                     "language"=>'eng',
                     "country_id"=>$s_country,
                     "time_zone"=>"Asia/Kolkata",
                     "360mail_key"=>$mail360_pass_hash
          );
      
     $a_data=$this->test_input($a_data);
                        $s_tbl ="iws_profiles";
                        $insert_result = $this->db_api->insert($a_data, $s_tbl); 
                        if($insert_result==1){
                        $countquery = "select username,first_name,middle_name,last_name, profile_id,user_id,password_hash,is_verified,img_path,role,gender, time_zone, language, country_id from iws_profiles where username='".$s_username."'";
                        $result = $this->db_api->custom( $countquery);
                         $s_user_id  = $result[0]['profile_id']; 
                        $s_user_full_name  = $result[0]['first_name']." ".$result[0]['middle_name']." ".$result[0]['last_name']; 
                        $_SESSION['user_id']=$result[0]['profile_id']; //This to be deleted, Read the data from cookie                        
                        $log_obj=$this->load->module("login");
                        $s_security_code = $log_obj->generateSecurity_Code( $result[0]['profile_id'], $result[0]['password_hash'], $result[0]['time_zone'], $result[0]['role'], $result[0]['user_id'], $result[0]['language'], $result[0]['country_id'] );  
                        $this->sessions->createSession( $s_user_full_name, $s_user_id ); // User id to be removed later from session.
                        $this->cookies->setCookie( 'oud', $s_security_code );
                        $this->cookies->theme_setCookie("Clouds");
                        $loginobj=$this->load->module("login");
                        $loginobj->updateLogin_History($s_user_id);
                        $_SESSION['user_full_name']=$s_user_full_name;
                        $_SESSION['user_image']=$result[0]['img_path']; //This to be deleted, Read the data from cookie
                        $_SESSION['user_role']=$result[0]['role']; //This to be deleted, Read the data from cookie
                        $_SESSION['tz'] = $result[0]['time_zone']; //This to be deleted, Read the data from cookie
                        $_SESSION['key']=$result[0]['360mail_key'];
                        $_SESSION['email']=$result[0]['email'];

                        $keyName = "USRDTA_".$this->cookies->getUserID();
                        $this->memcaching->setKey( $keyName , $result[0] );
                        $fields = array('security_code'=>$s_security_code);
                        $this->db_api->update( $fields , "iws_profiles" ,"username='".$s_username."'" ) ; 
                        //sending activation mail
                        $hobj=$this->load->module("home");
                        $body =  $hobj->activationTemplate(base_url() . "registration/activation?aid=" . bin2hex($result[0]["profile_id"] . "###" . $i_mvs_code));
                        $hobj->sendactivationmail($s_existing_email, "ONEIDNET Activation Link", $body);
                        
                        }
          
      if (!file_exists("../tunnel/includes/" . $result[0]["profile_id"])) {
      $dir_path = "../tunnel/includes/" . $result[0]["profile_id"];
      $old_umask = umask(0);
      mkdir($dir_path, 0777);
      $myfile = fopen($dir_path . "/" . $result[0]["profile_id"] . ".php", "w");
      fclose($myfile);
      umask($old_umask);
      $sour_file = "../tunnel/includes/empty_json.php";
      $target_file = $dir_path . "/" . $result[0]["profile_id"] . ".php";
      copy($sour_file, $target_file);
      $this->click_directory_creation($result[0]["profile_id"]);
    } 
   
      //26-05-2015 global function by venkatesh : this function create directory structure
   
    
echo 'ONR9';
//    $this->load->view('introductionPage');
      
    }else{
          
          echo"Username already exist";
      }
                
    }
	
	
	//written by suresh on 23-09-2016
function encrypt($string, $key = "abc#oneidnet!@#$%123456789!@#$%")
    {
    //return trim(base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $salt, $text, MCRYPT_MODE_ECB, mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB), MCRYPT_RAND))));
    $iv = mcrypt_create_iv(
    mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC),
    MCRYPT_DEV_URANDOM
    );

$encrypted = base64_encode(
    $iv .
    mcrypt_encrypt(
        MCRYPT_RIJNDAEL_128,
        hash('sha256', $key, true),
        $string,
        MCRYPT_MODE_CBC,
        $iv
    )
 
);
return $encrypted;
    }
  function decrypt($string, $key = "abc#oneidnet!@#$%123456789!@#$%")
    {
        $IV_SIZE = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC);
        $combo = base64_decode($string);
        $iv = substr($combo, 0, $IV_SIZE);
        $crypt = substr($combo, $IV_SIZE, strlen($combo));
        $payload = mcrypt_decrypt(MCRYPT_RIJNDAEL_128, hash('sha256', $key, true), $crypt, MCRYPT_MODE_CBC, $iv);
        
        return rtrim($payload,"\0");
    }
    
        
// removes files and non-empty directories
function rrmdir($dir) {
  if (is_dir($dir)) {
    $files = scandir($dir);
    foreach ($files as $file)
    if ($file != "." && $file != "..") $this->rrmdir("$dir/$file");
    rmdir($dir);
  }
  else if (file_exists($dir)) unlink($dir);
}

// by venakesh: copies files and non-empty directories
    function rcopy($src, $dst) {
        if (file_exists($dst))
            rrmdir($dst);
        if (is_dir($src)) {
            if (!file_exists($dst)) {
                mkdir($dst);
                shell_exec('chmod -R 777 ' . $dst);
                $files = scandir($src);
                foreach ($files as $file) {
                    if ($file != "." && $file != "..")
                        $this->rcopy("$src/$file", "$dst/$file");
                }
            }
        }
        else if (file_exists($src))
            copy($src, $dst);
    }
//by venakesh:create directory structure for new register user
    function click_directory_creation($uaid) {
        //netpro directory structure
        $netpath = "../netpro/safebox/";
        $netprosafebox = scandir($netpath);
        foreach ($netprosafebox as $netprosafeboxf) {
            if ($netprosafeboxf != "." && $netprosafeboxf != "..") {
                $dirpath = $netpath . $netprosafeboxf . "/" . $uaid;
                if (!file_exists($dirpath)) {
                    mkdir($dirpath, 0777);
                    shell_exec('chmod -R 777 ' . $dirpath);
                }
            }
        }
        $src = "clickdirectory";
        $dst = "../click/udata/" . $uaid;
        $this->rcopy($src, $dst);
    }

    //Function to generate the security code with user id and password hash
    function generateSecurity_Code( $s_intl_profile_id, $s_pswd_hash, $time_zone, $user_role, $user_identity_hash, $language, $countryID ) {  
        $start_guard_bit = sha1("<?!%&_WORLD_IS_ONE_&%_@_ONEIDNET#!");
        $end_guard_bit = sha1("!%&_WORLD_IS_ONE_&%_@_ONEIDNET#!/>");
        $oud = $start_guard_bit."*".$s_pswd_hash."*".$s_intl_profile_id."*".$user_identity_hash."*".$time_zone."*".$user_role."*".$language."*".$countryID."*".$end_guard_bit;   
        return $oud;
     }
     
    function setCookie( $s_securityCode ) { 
      $cookie_data = array(
          'name' => 'oud',
          'value' => $s_securityCode,
          'expire' => time()+86500,
          'path'   => '/',
      );  
      
      $this->input->set_cookie($cookie_data);
    }  
    
    
    function country_suggestions(){
      $countryname = $this->input->post("countryname");
      $country_query = "SELECT * FROM `iws_countries_info` where 	country_name like '$countryname%' ";
      $countrydata = $this->db_api->custom($country_query);  
     if($countrydata!=0){
        foreach($countrydata as $countryresult) { ?>
                        <a class="countryinfodata" cmaxlength="<?php echo  $countryresult['mobile_max_length']; ?>" cisdcode="<?php echo $countryresult['isd_code']; ?>" cid="<?php echo $countryresult['country_id']; ?>" cname="<?php echo $countryresult['country_name']; ?>" cimage="flags/<?php echo $countryresult['country_code']; ?>.png"><div class="selectArea1">
				<img src="<?php echo base_url().'assets/flags/'. $countryresult['country_code']; ?>.png" class="cuntryFlag">
				<span class="cuntryName"><?php echo $countryresult['country_name']; ?></span><span class="cuntryName"><?php echo "+".$countryresult['isd_code']; ?></span>
			</div>
			</a>
			<?php  }  
     }
        
    }
         function country_data(){
      $countryname = $this->input->post("countryname");
      $country_query = "SELECT * FROM `iws_countries_info` where 	country_name like '$countryname%' ";
       $countrydata = $this->db_api->custom($country_query);  
     
        foreach($countrydata as $countryresult) { ?>
                        <a class="countryinfodata" cmaxlength="10"<?php // echo  $countryresult['mobile_max_length']; ?> cisdcode="<?php echo $countryresult['isd_code']; ?>" cid="<?php echo $countryresult['country_id']; ?>" cname="<?php echo $countryresult['country_name']; ?>" cimage="flags/<?php echo $countryresult['country_code']; ?>.png"><div class="selectArea1">
				<img src="<?php echo base_url().'assets/flags/'. $countryresult['country_code']; ?>.png" class="cuntryFlag">
				<span class="cuntryName"><?php echo $countryresult['country_name']; ?></span><span class="cuntryName"><?php echo "+".$countryresult['isd_code']; ?></span>
			</div>
			</a>
			<?php  } 
    }
    //k shivajyothi 27-07-2015
    // mobile otp checking and verify the user 
    function verify_user(){
     $pid=$this->cookies->getUserID(  );
     
//       $result = $this->db_api->custom("select count(aams_code) as count  from iws_profiles where  profile_id = '".$pid."' and aams_code='".$this->input->post("oneid_aamscode")."'");
       $result = $this->db_api->custom("select aams_code from iws_profiles where  profile_id =".$pid);
     
       if($result[0]['aams_code']!=$_REQUEST["oneid_aamscode"]){
          echo "Invalid OTP";
      }else{
     
         $data = array("is_verified" => 1,"aams_code"=>rand(10000,99999));
         echo $this->db_api->update($data, "iws_profiles","profile_id=".$pid);
      }   
    }
    function introductionPage(){
        $this->load->view("introductionPage");
    }
    function welcomeEmailTpl($user,$pass){
      $html='<html><head><title>Welcome to ONEIDNET</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        </head>
        <body bgcolor="grey" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
        <table id="Table_01" width="800" height="2376" border="0" cellpadding="0" cellspacing="0" align="center">
  <tr>
         <td colspan="3"><p style="color:#000;""><b style="color:#0f4666; font-weight:bold; font-size:18px;">Dear,</b> <br> <br> Welcome to ONEIDNET! <br> <br> Your Oneidnet Credetials, <br> Username : "'. $user.'" <br> Passwor : "'. $pass.'" <br> Activating your account gives you complete and free access to the ONEIDNET System.ONEIDNET is an integrated System, unlike any other. Its like having sixteen websites in one; having your own personalized Internet with everything in it!.</p></td>
  </tr>
	<tr>
            <td colspan="3"><img src="'.base_url().'assets/Images/mail/final-welcome-email-content_01.png" width="800" height="86" alt=""></td>
	</tr>
	<tr>
            <td rowspan="8"><img src="'.base_url().'assets/Images/mail/final-welcome-email-content_02.png" width="710" height="2290" alt=""></td>
            <td><a href="https://www.facebook.com/oneidnet"><img src="'.base_url().'assets/Images/mail/final-welcome-email-content_03.png" width="41" height="41" border="0" alt=""></a></td>
            <td rowspan="8"><img src="'.base_url().'assets/Images/mail/final-welcome-email-content_04.png" width="49" height="2290" alt=""></td>
	</tr>
	<tr>
            <td><img src="'.base_url().'assets/Images/mail/final-welcome-email-content_05.png" width="41" height="9" alt=""></td>
	</tr>
	<tr>
            <td><a href="https://plus.google.com/104428151477235979638"><img src="'.base_url().'assets/Images/mail/final-welcome-email-content_06.png" width="41" height="36" border="0" alt=""></a></td>
	</tr>
	<tr>
            <td><img src="'.base_url().'assets/Images/mail/final-welcome-email-content_07.png" width="41" height="14" alt=""></td>
	</tr>
	<tr>
            <td><a href="https://www.linkedin.com/company/oneidnet-information-technologies-private-limited"><img src="'.base_url().'assets/Images/mail/final-welcome-email-content_08.png" width="41" height="34" border="0" alt=""></a></td>
	</tr>
	<tr>
            <td><img src="'.base_url().'assets/Images/mail//final-welcome-email-content_09.png" width="41" height="10" alt=""></td>
	</tr>
	<tr>
            <td><a href="https://twitter.com/oneidnet"><img src="'.base_url().'assets/Images/mail/final-welcome-email-content_10.png" width="41" height="36" border="0" alt=""></a></td>
	</tr>
	<tr><td><img src="images/final-welcome-email-content_11.png" width="41" height="2110" alt=""></td></tr>
        </table></body></html>';
      return $html;
    } 
    function instructionsEmailTpl(){
        $html='<html><head><title>SecondMail</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body bgcolor="#ccc" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<table id="Table_01" width="800" height="1227" border="0" cellpadding="0" cellspacing="0" align="center">
	<tr>
		<td colspan="9">
			<img src="images/SecondMail_01.png" width="800" height="41" alt=""></td>
	</tr>
	<tr>
		<td rowspan="4">
			<img src="'.base_url().'assets/Images/mail/SecondMail_02.png" width="34" height="1186" alt=""></td>
		<td colspan="6">
			<img src="'.base_url().'assets/Images/mail/SecondMail_03.png" width="604" height="130" alt=""></td>
		<td colspan="2" rowspan="2">
			<img src="'.base_url().'assets/Images/mail/SecondMail_04.png" width="162" height="582" alt=""></td>
	</tr>
	<tr>
		<td colspan="6">
			<img src="'.base_url().'assets/Images/mail/SecondMail_05.png" width="604" height="452" alt=""></td>
	</tr>
	<tr>
		<td>
			<img src="'.base_url().'assets/Images/mail/SecondMail_06.png" width="135" height="124" alt=""></td>
		<td rowspan="2">
			<img src="'.base_url().'assets/Images/mail/SecondMail_07.png" width="72" height="604" alt=""></td>
		<td>
			<img src="'.base_url().'assets/Images/mail/SecondMail_08.png" width="132" height="124" alt=""></td>
		<td rowspan="2">
			<img src="'.base_url().'assets/Images/mail/SecondMail_09.png" width="68" height="604" alt=""></td>
		<td>
			<img src="'.base_url().'assets/Images/mail/SecondMail_10.png" width="132" height="124" alt=""></td>
		<td rowspan="2">
			<img src="'.base_url().'assets/Images/mail/SecondMail_11.png" width="65" height="604" alt=""></td>
		<td>
			<img src="'.base_url().'assets/Images/mail/SecondMail_12.png" width="136" height="124" alt=""></td>
		<td rowspan="2">
			<img src="'.base_url().'assets/Images/mail/SecondMail_13.png" width="26" height="604" alt=""></td>
	</tr>
	<tr>
            <td><img src="'.base_url().'assets/Images/mail/SecondMail_14.png" width="135" height="480" alt=""></td>
            <td><img src="'.base_url().'assets/Images/mail/SecondMail_15.png" width="132" height="480" alt=""></td>
            <td><img src="'.base_url().'assets/Images/mail/SecondMail_16.png" width="132" height="480" alt=""></td>
            <td><img src="'.base_url().'assets/Images/mail/SecondMail_17.png" width="136" height="480" alt=""></td>
	</tr>
    </table></body></html>';
        return $html;
    }

function connectapp(){
$this->load->view("connect_app");
}    
function appdetails(){
$this->load->view("appdetails");
}    
function integratedapp(){
$this->load->view("integratedapp");
}    
    
    /* by venkatesh test input */
        function test_input($data) {
        foreach($data as $key=>$val){
        $data[$key] = trim($data[$key]);
        $data[$key] = stripslashes($data[$key]);
        $data[$key] = htmlspecialchars($data[$key]);
        $data[$key] = str_replace("'", "&#39", $data[$key]);    
        }
        return $data;
    }
}
