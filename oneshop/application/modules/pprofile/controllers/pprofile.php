<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/* * ******************************************************************************
 * Purpose: Controller class to load the buzzin index page management of app.
 * Date Written: Apr 29, 2015
 * ***************************************************************************** */
if (!isset($_SESSION)) {
    session_start();
}

class pprofile extends CI_Controller {

    function __construct() {
         parent::__construct();
        $this->load->module("db_api");
         /* session and cookies check */
       
        if ($_REQUEST) {
            $sobj= $this->load->module("session_restart");
            if (isset($_REQUEST["skey"])) {
                $sobj->key_check($_REQUEST["skey"]);
            }
        }
    }

    /* venkatesh test input */

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        $data = str_replace("'","&#39",$data);
        return $data;
    }

    function user_id() {
        $obj = $this->load->module('cookies');
        return $obj->getUserID();
    }

    function index() {
        
    }

    function profilepage1($pid) {
		 
			 
            $result = $this->db_api->custom("select 	profile_id from  iws_profiles where  user_id	= '$pid' ");
            if($result!=0){
                     $uid = $result[0]['profile_id'];
		     $data["user_details"] = $this->userdetails_return($uid);
		     $data["user_id_fk"] =$result[0]['profile_id'];
		     $data["userstores"] =$this->getStores($uid);
		     $data["store_reviews"] =$this->storeActivity($uid);
		     
		     $data["product_reviews"] =$this->productActivity($uid);
		     $data['userfollow'] = $this->db_api->custom("select count(*) as followcount from oshop_explore where (user_id_fk =".$this->user_id()." and  associated_id_fk =$uid ) or (user_id_fk =$uid and  associated_id_fk = " .$this->user_id().") ");

     		$this->load->view('profile_page' ,$data);
            }else{
                redirect(base_url());
            }
		
	}
    function profilepage($pid) {
      $dbapi=$this->load->module("db_api");  
      $uid=$this->user_id();
      $data["user_details"] = $dbapi->custom("select profile_id,profile_name,profile_img,profile_cover_img from iws_profiles profiles inner join os_user_details users on profiles.profile_id=users.profile_id_fk where user_id = '$pid' ");
      $data["follow_details"]=$dbapi->custom("SELECT COUNT(*) AS cnt FROM oshop_explore exp WHERE user_id_fk=".$data["user_details"][0]["profile_id"]." AND associated_id_fk=".$uid);      
      $data["loggedin_user"]=$uid;
      $data["myfollower"]=$dbapi->custom("SELECT associated_id_fk,(select email from iws_profiles where profile_id=".$data["user_details"][0]["profile_id"].") email FROM oshop_explore exp WHERE user_id_fk=".$uid." AND associated_id_fk=".$data["user_details"][0]["profile_id"]);      
//      echo "<pre>";      print_R($data["myfollower"]);      echo "</pre>";
      $this->load->view('profile_page',$data);
    }
    function profileActivityTpl() {
        $db_api = $this->load->module("db_api");
        $userid=$_REQUEST["userid"];
        $previews_query = "SELECT product_name,product_code,rating_on,text,rating,product_aid,product_code,primary_image ,store_code FROM   oshop_products as  prods
            INNER JOIN oshop_stores as os on os.store_aid=prods.store_id_fk
            INNER JOIN  oshop_product_reviews rviews ON rviews.product_aid_fk=prods.product_aid WHERE user_id_fk=" .$userid;
        $previews_result = $db_api->custom($previews_query);
        $sreviews_query = "SELECT store_name,store_aid,store_code,review_text,commented_on,profile_image_path FROM oshop_store_reviews reviews INNER JOIN oshop_stores stores ON reviews.store_id_fk=stores.store_aid WHERE user_id_fk=" . $userid;
        $sreviews_result = $db_api->custom($sreviews_query);
        $data["product_reviews"]=$previews_result;
        $data["store_reviews"]=$sreviews_result;
        $this->load->view("pprofileActivityTpl",$data);
        //return $previews_result;
    }
    function getUserStoreTpl(){
      $db_api = $this->load->module("db_api");
      $user_id=$_REQUEST["userid"];
      $query = "SELECT store_aid,store_code,store_name,profile_image_path FROM `oshop_stores` where created_by =".$user_id;
      $store_result = $db_api->custom($query);
      $data["userstores"]=$store_result;
      $this->load->view("pprofileStoresTpl",$data);
    }
	function userdetails_return($profile_id="") {
        $db_obj = $this->load->module("db_api");
        if($profile_id==""){
            $where = "profile_id_fk=" . $this->user_id();
        }else{
            $where="profile_id_fk=".$profile_id;
        }
        $userdetails = $db_obj->select("*", "os_user_details", $where);        
        return $userdetails;
    }
	 function getStores($user_id) {
        $db_api = $this->load->module("db_api"); 
        $store_result=0;       
        $query = "SELECT store_aid,store_code,store_name,profile_image_path FROM `oshop_stores` where created_by =".$user_id;
        $store_result = $db_api->custom($query);        
        return $store_result;
        
    }
    function storeActivity($userid) {
        $db_api = $this->load->module("db_api");        
        $sreviews_result=0;
            $sreviews_query = "SELECT store_name,store_aid,store_code,review_text,commented_on,profile_image_path FROM oshop_store_reviews reviews INNER JOIN oshop_stores stores ON reviews.store_id_fk=stores.store_aid WHERE user_id_fk=" . $userid;        
            $sreviews_result = $db_api->custom($sreviews_query);
       
           
        return $sreviews_result;
        
    }
     function productActivity($userid) {
        $db_api = $this->load->module("db_api");        
        $previews_result=0;
            $previews_query = "SELECT product_name,product_code,rating_on,text,rating,product_aid,product_code,primary_image ,store_code FROM   oshop_products as  prods
            INNER JOIN oshop_stores as os on os.store_aid=prods.store_id_fk
            INNER JOIN  oshop_product_reviews rviews ON rviews.product_aid_fk=prods.product_aid WHERE user_id_fk=" . $userid;
            $previews_result = $db_api->custom($previews_query);
     
           
        return $previews_result;
        
    }
   function userFollow(){
    $profileid = $this->input->post('followerid');
		$data=array('user_id_fk'=>$profileid,'associated_id_fk'=>$this->user_id());
    $chronodata=array('userid'=>$this->user_id(), 'chrono_type'=>'1', 'associateid'=>$profileid);
	  $db_obj = $this->load->module("db_api");
		$result  = $db_obj->insert($data,"oshop_explore");
    $chronoresult  = $db_obj->insert($chronodata,"chronoline_order");
		if($result){echo 1;}else{echo 0 ;} 
	    
   }
   function userUnfollow(){
                $profileid = $this->input->post('followerid');
		 $where ="user_id_fk= $profileid and associated_id_fk =".$this->user_id();    
	   $db_obj = $this->load->module("db_api");
		 $result  = $db_obj->delete("oshop_explore",$where);
		if($result){ echo 1; }else{ echo 0 ; } 
	    
   }

   //november 21 2016 by venkatesh
   function exploreFollowers() {
       $uid = $this->user_id();
        $db_obj = $this->load->module("db_api");
        if (isset($_REQUEST["requestforupdate"])) {
           $db_obj->custom("UPDATE `oshop_explore` SET `read_or_not`='1' WHERE `user_id_fk`=$uid and `read_or_not`='0'"); 
        }
        
        $data["Followersdetails"] = $db_obj->custom("SELECT oe.`date`,oud.profile_id_fk,oud.profile_name,oud.profile_img,ip.user_id FROM `oshop_explore` oe left join os_user_details oud on oe.`associated_id_fk`=oud.profile_id_fk 
                        left join iws_profiles ip on oe.`associated_id_fk`=ip.profile_id
                        WHERE oe.`user_id_fk`=$uid   and oe.date >= DATE_ADD(CURDATE(), INTERVAL -10 DAY) order by date desc");
        $this->load->view("pprofile/exploreFollowers",$data);
    }
    //november 21 2016 by venkatesh
function exploreFollowerscount(){
    $db_obj = $this->load->module("db_api");
   $rlt=$db_obj->custom("SELECT count(`rec_aid`) as cnt FROM `oshop_explore` WHERE  `user_id_fk`=".$this->user_id()." and `read_or_not`='0'"); 
   echo $rlt[0]["cnt"];
}
//november 21 2016 by venkatesh
function exploreFollowerdelete(){
    $db_obj = $this->load->module("db_api");
    echo $db_obj->delete("oshop_explore","`user_id_fk`=".$this->user_id()." and `associated_id_fk`=".hex2bin($_REQUEST["profileid"]));
}
}
