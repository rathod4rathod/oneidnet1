<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Explorepeople extends CI_Controller {

    function get_UserId() {
        $cookies_obj=$this->load->module("cookies");
        $user_id=$cookies_obj->getUserID();
        return $user_id;
    }
    function index(){
		
		$data["title"] = "Welcome to Oneshop";
        $data["meta_description"] = '';
        $data["meta_keywords"] = '';
        $this->load->view("explorepeople",$data);        
 
		}
	function myfollowings(){
		
		$data["title"] = "Welcome to Oneshop";
        $data["meta_description"] = '';
        $data["meta_keywords"] = '';
        $this->load->view("myfollowings",$data);        
 
		}	
	function myfollowers(){
		
		$data["title"] = "Welcome to Oneshop";
        $data["meta_description"] = '';
        $data["meta_keywords"] = '';
        $this->load->view("myfollowers",$data);        
 
		}
	function userFollowings(){
		if (isset($_REQUEST['start_id'])) {
            $starting_index = $_REQUEST['start_id'];
        } else {
            $starting_index = 0;
		}
		$db_obj = $this->load->module("db_api");
		if (isset($_REQUEST['serchConnection'])) {
			$serchConnection = $_REQUEST['serchConnection'];
			$data['userfollowing'] = $db_obj->custom("SELECT distinct(os. profile_id_fk ) ,os.profile_name  ,os.profile_img ,iw.user_id  FROM `oshop_explore` as oe
			inner join os_user_details as os  on profile_id_fk = user_id_fk 
			inner join  iws_profiles as iw  on os.profile_id_fk = iw.profile_id
			where oe.associated_id_fk=".$this->get_UserId() ." AND os.status='ACTIVE' AND os.profile_name LIKE '%$serchConnection%' limit  $starting_index ,10 ");
		
        } else {
			$data['userfollowing'] = $db_obj->custom("SELECT distinct(os. profile_id_fk ) ,os.profile_name  ,os.profile_img ,iw.user_id  FROM `oshop_explore` as oe
			inner join os_user_details as os  on profile_id_fk = user_id_fk 
			inner join  iws_profiles as iw  on os.profile_id_fk = iw.profile_id
			where oe.associated_id_fk=".$this->get_UserId() ." AND os.status='ACTIVE' limit  $starting_index ,10 ");
        }
                  
			//    print_r($data['userfollowing']);die;
        $this->load->view("explorepeople/following",$data);

	}
	function userFollowers(){
	if (isset($_REQUEST['start_id'])) {
            $starting_index = $_REQUEST['start_id'];
        } else {
            $starting_index = 0;
        }
	    $db_obj = $this->load->module("db_api");
            
	    $data['usersfollowers'] = $db_obj->custom("SELECT distinct(ip.profile_id), ip.user_id ,od.profile_name ,od.profile_img     FROM `oshop_explore` as oe
inner join os_user_details as od on profile_id_fk = associated_id_fk
inner join iws_profiles as ip on profile_id = associated_id_fk
       where  oe.user_id_fk=".$this->get_UserId() ." AND od.status='ACTIVE'
	");
	     // limit $starting_index ,10
        $this->load->view("explorepeople/followers",$data);
	}
	function unFollowing(){
	    $followerid = $_REQUEST['followerid'];
	    $db_obj = $this->load->module("db_api");
	     $s_where =" associated_id_fk =".$this->get_UserId()." and user_id_fk =".$followerid;
	     $result=$db_obj->delete("oshop_explore",$s_where);
	    if($result){
			$this->userFollowings();
		}
        
	}
	function unFollowers(){
	    $followerid = $_REQUEST['followerid'];
	    $db_obj = $this->load->module("db_api");
	    $s_where =" associated_id_fk =".$followerid." and user_id_fk =".$this->get_UserId();
	    $result=$db_obj->delete("oshop_explore",$s_where);
	    if($result){
	  
			$this->userFollowers();
			}
	}
	function explorePeopledata(){	
		 if (isset($_REQUEST['start_id'])) {
            $starting_index = $_REQUEST['start_id'];
        } else {
            $starting_index = 0;
        }
		$db_obj = $this->load->module("db_api");               
		$data['exploredata'] = $db_obj->custom("SELECT distinct(iw.profile_id),od.profile_name ,od.profile_img ,iw.user_id   FROM   os_user_details as od left join  iws_profiles as iw  on od.profile_id_fk = iw.profile_id WHERE  od.profile_id_fk  NOT  IN (SELECT user_id_fk  FROM  `oshop_explore` WHERE associated_id_fk=".$this->get_UserId().") and  iw.profile_id NOT  IN ( SELECT associated_id_fk FROM  `oshop_explore` WHERE user_id_fk=".$this->get_UserId().")limit $starting_index  ,20");
        $this->load->view("explorepeople/explore_data",$data);        
	}

	function getExplorePeople(){

        $search_keyword=$_REQUEST["search_val"];
		$db_obj = $this->load->module("db_api");

		$data['exploredata'] = $db_obj->custom("SELECT distinct(iw.profile_id),od.profile_name ,od.profile_img ,iw.user_id FROM os_user_details as od left join iws_profiles as iw on od.profile_id_fk = iw.profile_id WHERE od.profile_id_fk NOT IN (SELECT user_id_fk FROM `oshop_explore` WHERE associated_id_fk=".$this->get_UserId().") and iw.profile_id NOT IN ( SELECT associated_id_fk FROM `oshop_explore` WHERE user_id_fk=".$this->get_UserId().") and od.profile_name LIKE '%".$search_keyword."%'");

        $this->load->view("explorepeople/explore_data",$data);     
	}


	function  userfollow(){
		$profileid = $_REQUEST['profileid'];
		$data=array('user_id_fk'=>$profileid ,'associated_id_fk'=>$this->get_UserId());
		$chronodata=array('associateid'=>$profileid, 'chrono_type'=>'1', 'userid'=>$this->get_UserId());
		$db_obj = $this->load->module("db_api");
		$chrono_result  = $db_obj->insert($chronodata,"chronoline_order");
		$result  = $db_obj->insert($data,"oshop_explore");
		if($result){ echo 1; }else{ echo 0 ; } 
		
		}

}
