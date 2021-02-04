<?php
if (!defined('BASEPATH'))  exit('No direct script access allowed');

class Templates extends CI_Controller {
    function __construct() {
            parent::__construct();
            $homeObj=$this->load->module('home');
    }
    function index(){}
    function header(){
        $db_obj = $this->load->module('db_api');
        $homeObj=$this->load->module('home');
        $user_id=$homeObj->get_userId();        
        $sql="select first_name,last_name,profile_id,middle_name,img_path,profile_id from iws_profiles where profile_id=".$user_id;
        $data['userdata']=$db_obj->custom($sql);
        $cbobj=$this->load->module("cookies");
        $data["cid"]=$cbobj->getUserID();
        $data["user_id"]=$cbobj->getUserIDHash();
        $this->load->view('templates/headertpl',$data);
    }
    
    function onenet_header($active="home") {
        $data["active_menu_item"]=$active;
        $this->load->view('templates/onenet_header_tpl',$data);
    }
    function right_container(){
        $this->load->view("templates/rcontainer_view");
    }
    function specialSuggestions(){
        $this->load->view("templates/spl_suggestions_view");
    }
    function footer(){
        $this->load->view('templates/footertpl');
    }
    function breadcrumbs(){
        $this->load->view('templates/breadcrubms');
    }
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        $data = str_replace("'","&#39",$data);
        return $data;
    }
    function insert_new_report(){
        $db_obj = $this->load->module('db_api');
        $homeObj=$this->load->module('home');
        $user_id=$homeObj->get_userId();     
        $ppic_image_name = "";
        if ($_FILES["report_snap"]["name"]) {
            $snapshot_path = $_FILES["report_snap"]["name"];
            $path = explode("/", $snapshot_path);
            $filename = end($path);
            $date = new DateTime();
            $time = $date->format('Y-m-d-H-i-s');

            $uploaddir = "pdata/images/report_snap_shots/";

            list($txt, $ext) = explode(".", $filename);
            $snap=$user_id . $time . "." . $ext;
            $ppic_image_name = $uploaddir .$snap;
            shell_exec('chmod -R 777 /var/www/html/onenetwork');
            if (move_uploaded_file($_FILES['report_snap']['tmp_name'], $ppic_image_name)) {
                shell_exec('chmod -R 777 ' . $ppic_image_name);
            } else {
                echo "fie not uploaded";
            }
        }
        $netdev_a_data = array(
            'module' => "One Network",
            'title_of_problem' => $_REQUEST["report_prob_name"],
            'description' => $_REQUEST["report_desc"],
            'attach_snapshot' => $snap,
            'reported_by' => $user_id
        );
        //print_r($netdev_a_data);
        //$tundev_a_fields="module,title_of_problem,description,attach_snapshot";
        foreach ($netdev_a_data as $key => $val) {
            $netdev_a_data[$key] = $this->test_input($netdev_a_data[$key]);
        }
         $result = $db_obj->insert($netdev_a_data, "iws_reported_problem");
         if($result){
                $rlt=$db_obj->custom("select reporttoken from iws_reported_problem where reported_by=".$user_id." order by rec_aid desc limit 1 ");
                if($rlt!=0){
                    echo "ON9###".$rlt[0]["reporttoken"];
                }
            }else{
                echo "Sever busy,Please try after some time";
            }
    }
    function privacyPage(){
        $this->load->view("templates/privacy_view");
    }
    function helppage(){
        $this->load->view("templates/help_view");
    }
    
//    function contribution(){
//        $this->load->view("templates/contributions_insights");
//    }
//    function contributors(){
//        $this->load->view("templates/contributors_list");
//    }
    function contributor_user(){
        $this->load->view("templates/contributor_user_detail");
    }

    function businessleadpage(){
        
        $this->load->view("templates/businesslead");
    }
    function customersupport(){
        
        $this->load->view("templates/customer_support");
    }
    function insertEnquiry(){
        $dbapi=$this->load->module("db_api");
        $homeObj=$this->load->module('home');
        $user_id=$homeObj->get_userId(); 
        $contact_no="";
        if($_REQUEST["enq_contact"]!=""){
            $contact_no="+".$_REQUEST["contact_ext"].$_REQUEST["enq_contact"];
        }        
        $enquiry_fields=array("subject"=>$_REQUEST["enq_subject"],"purpose"=>$_REQUEST["enq_purpose"],"other_purpose"=>$_REQUEST["enq_other_purpose"],"preferred_contact_no"=>$contact_no,"preferred_email_address"=>$_REQUEST["enq_email"],"description"=>$_REQUEST["enq_desc"],"submitted_by"=>$user_id);
        //print_r($enquiry_fields);
        $result=$dbapi->insert($enquiry_fields,"iws_enquiry");
        echo $result;
    }
    function  donations()
    {
        $this->load->view("templates/donations");
    }
    function donationEnquiry(){
       
        $dbapi=$this->load->module("db_api");
        $homeObj=$this->load->module('home');
        $user_id=$homeObj->get_userId();
        $subject=$this->test_input($_POST["donation_subject"]);
        $message=$this->test_input($_POST["donation_message"]);
        $contactnumber=$this->test_input($_POST["contact"]);
        $email=$this->test_input($_POST["donation_email"]);
        //donations@oneidnet.com
        $enquiry_fields=array("subject"=>$subject,"message"=>$message,"sent_on"=>date('Y-m-d H:i:s'),"email"=>$email,"contact"=>$contactnumber,"sent_by"=>$user_id);
        $result=$dbapi->insert($enquiry_fields,"iws_donations_enquiries");
        if($result==1)
        {
         //echo 1;
        $path = APPPATH . 'libraries/My_PHPMailer.php';
        require_once($path);
        $lib=new My_PHPMailer();
        $mail=$lib->send_mail("donations@oneidnet.com",$subject,$message);
        if($mail)
        {
           echo 1;
        }
        }
    }
	// function to display the top 3 contributors by Pavani
    function contribution(){
      $dbapi=$this->load->module("db_api");
      $result=$dbapi->custom("SELECT first_name,last_name,middle_name,img_path,profile_id,user_id,all_dev_bugs,design_issue,feedback,security_loophole FROM iws_contributors cons INNER JOIN iws_profiles profiles ON cons.user_id_fk=profiles.profile_id ORDER BY rank DESC LIMIT 3");
      $data["top_contributors"]=$result;
      $this->load->view("templates/contributions_insights",$data);
    }
    function contributors(){
      $this->load->view("templates/contributors_list");
    }
    function getContributorsList(){
      $dbapi=$this->load->module("db_api");
      $type=isset($_REQUEST["type"])?$_REQUEST["type"]:"All";
      $cont_qury="SELECT rank,crown_type,first_name,last_name,middle_name,img_path,all_dev_bugs,design_issue,feedback,security_loophole FROM iws_contributors cons INNER JOIN iws_profiles profiles ON cons.user_id_fk=profiles.profile_id";
      $where="";
      if($type!="All"){
        $where=" WHERE crown_type='".$type."'";
      }
      $cont_qury.=$where." ORDER BY rank";
      $result=$dbapi->custom($cont_qury);
      $data["contributors_list"]=$result;
      $this->load->view("templates/contributors_list_tpl",$data);
    }
	// function to display the search results by Pavani on 06-07-2016
    function getSearchData(){
      $search_text=$_REQUEST["search_txt"];
      $search_type=$_REQUEST["srch_typ"];
      $dbapi=$this->load->module("db_api");
      $search_qry="";
      if($search_type=="Promotions"){
        $search_qry="SELECT promo_code,promo_name FROM onetwork_promotions WHERE promo_name LIKE '%".$search_text."%'";
      }
      if($search_type=="GMA"){
        $search_qry="SELECT campaign_code,campaign_name FROM onetwork_gm_advertisments WHERE campaign_name LIKE '%".$search_text."%'";
      }
      $result=$dbapi->custom($search_qry);
      $search_str="";

      if($search_type=="Promotions" || $search_type=="GMA"){
        if($result!=0){
          foreach($result as $list){
            if($search_str==""){
              if($search_type=="Promotions"){
                $search_str=base64_encode(base64_encode($list["promo_code"])).":".$list["promo_name"];
              }else{
                $search_str=base64_encode(base64_encode($list["campaign_code"])).":".$list["campaign_name"];
              }
            }else{
              if($search_type=="Promotions"){
                $search_str.="~".base64_encode(base64_encode($list["promo_code"])).":".$list["promo_name"];
              }else{
                $search_str.="~".base64_encode(base64_encode($list["campaign_code"])).":".$list["campaign_name"];
              }
            }
          }
        }
      }
      else{
        //$packages_arry=array("new"=>"New","basic"=>"Basic","regular"=>"Regular","bronze"=>"Bronze","silver"=>"Silver","gold"=>"Gold","platinum"=>"Platinum","unlimited"=>"Unlimited","small"=>"Small","medium"=>"Medium","large"=>"Large");
        $packages_arry=array("New","Basic","Regular","Bronze","Silver","Gold","Platinum","Unlimited","Small","Medium","Large");
        for($j=0;$j<count($packages_arry);$j++){
          $key=  lcfirst($packages_arry[$j]);
          $pos=strpos($key,$search_text );
          $module="";
          if($key=="small"||$key=="medium"||$key=="large"){
            $module="copackages";
          }else{
            $module="os_package";
          }
          if($pos!==false){
            if($search_str==""){
              $search_str=$module.":".$packages_arry[$j];
            }else{
              $search_str.="~".$module.":".$packages_arry[$j];
            }
          }
        }
      }
      //}
      echo $search_str;
    }

    function displaySearchResult(){
      $search_term=$_REQUEST["search_term"];
      $search_type=$_REQUEST["search_type"];
      $dbapi=$this->load->module("db_api");
      $search_query="";
      $search_rslt=["promotions_result"=>0,"gma_result"=>0,"packages_result"=>0];
      if($search_type=="Promotions"){
        $search_query="SELECT promo_code,promo_name FROM onetwork_promotions WHERE promo_name LIKE '%".$search_term."%'";
        $result=$dbapi->custom($search_query);
        $search_rslt["promotions_result"]=$result;
      }
      if($search_type=="GMA"){
        $search_query="SELECT campaign_code,campaign_name FROM onetwork_gm_advertisments WHERE campaign_name LIKE '%".$search_term."%'";
        $result=$dbapi->custom($search_query);
        $search_rslt["gma_result"]=$result;
      }
      if($search_type=="Packages"){
//        $packages_arry=array("oneshop"=>"oneshop","cooffice"=>"cooffice");
//        $pkgs_str="";
//        foreach($packages_arry as $key=>$val){
//          if(strpos($key,$search_term)!==false){
//            $pkgs_str.=",".$key;
//          }
//        }
        $search_str="";
        $packages_arry=array("New","Basic","Regular","Bronze","Silver","Gold","Platinum","Unlimited","Small","Medium","Large");
        for($j=0;$j<count($packages_arry);$j++){
          $key=  lcfirst($packages_arry[$j]);
          $pos=strpos($key,$search_term);
          $module="";
          if($key=="small"||$key=="medium"||$key=="large"){
            $module="copackages";
          }else{
            $module="os_package";
          }
          if($pos!==false){
            if($search_str==""){
              $search_str=$module.":".$packages_arry[$j];
            }else{
              $search_str.="~".$module.":".$packages_arry[$j];
            }
          }
        }
        $search_rslt["packages_result"]=$search_str;
      }
      //print_r($search_rslt);
      $data["search_result"]=$search_rslt;
      $data["search_term"]=$search_term;
      $this->load->view("templates/searchResult",$data);
    }

    function composeMsgPopup()
    {
      $data["friends_list"]=$this->usersList();
      $this->load->view("templates/headertpl",$data);
    }

    function usersList()
    {
      $obj = $this->load->module('db_api');
       $sql="SELECT profile_id,user_id,replace(concat(first_name,' ',middle_name,' ',last_name),'  ',' ') as fullname FROM `blog_users_connections` buc left join iws_profiles ip on buc.my_id_fk=ip.profile_id WHERE `friend_id_fk`='".$this->getUserId()."' and followed_via_module='ONENETWORK' and buc.`status`='ACPT' order by `connected_time` desc";
      return $obj->custom($sql);
    }

    function pprofile(){
      $profile_id=$_REQUEST["user_id"];
      $this->load->module("db_api");
      $profiles_result=$this->db_api->custom("SELECT user_id,profile_id,role,status,img_path,username,first_name,middle_name,last_name,all_dev_bugs,design_issue,feedback,security_loophole FROM iws_contributors conts INNER JOIN iws_profiles profiles ON conts.user_id_fk=profiles.profile_id WHERE user_id='".$profile_id."'");
      $data["profiles_data"]=$profiles_result;
      $this->load->view("templates/profile_page",$data);
    }
	function servicespage()
    {
        $this->load->view("templates/services");
    }
}
