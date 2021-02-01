<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class friends_store extends CI_Controller {

    function __construct(  ) 	{ 
        parent::__construct(  ); 
    }
    function get_UserId()   {
        $cookies_obj=$this->load->module("cookies");
          $user_id=$cookies_obj->getUserID();
          return $user_id;
     }
	
  // to display the count of stores by Pavani on 02-06-2015 ---> code starts here
  function friends_store_search(){
    $stores_cnt=$this->getFrndsStoresCnt("default");
    $data["stores_count"]=$stores_cnt[0]["cnt"];
    //$this->getFrndsList();
    $this->load->view('friends_store/friends_store_search',$data);  	
  }
  function friends_store_search_result($search_val="default"){
    $start=0;
    $dbobj=$this->load->module("db_api");
    $records_per_page       =   8; // records to show per page    
    $page=$this->input->post("p");  
    $stateid=$this->input->post("stateid");
    $countryid=$this->input->post("countryid");
    //echo $stateid;
    if($page!=""){
      $current_page           =   $page - 1;      
      $start                  =   $current_page * $records_per_page;
    }  
    if($search_val!="default"){
      $a_frnds=$this->getFrndsList($search_val,"list");
      $s_frnds=$this->getFrndsList($search_val,"str"); 
    }else{
      $a_frnds=$this->getFrndsList('',"list");
      $s_frnds=$this->getFrndsList('',"str"); 
    }
    
	$uid = $this->get_UserId();
    $os_stores_res=$dbobj->custom("select * from oshop_stores where created_by in (select friend_id_fk from click_friends_requests where user_id_fk = ".$uid.")");
    $i=0;
    foreach($a_frnds as $list){
      $profile_id=$list["profile_id"];
      $store_arry=$this->checkIfExists($profile_id,$os_stores_res);      
      $a_frnds[$i]["store_aid"]= $store_arry["storeid"];
      $a_frnds[$i]["store_name"]= $store_arry["store_name"];
      $a_frnds[$i]["store_code"]= $store_arry["storeuid"];
      $a_frnds[$i]["profile_image_path"]= $store_arry["logo_path"];
      $a_frnds[$i]["cover_image_path"]= $store_arry["cover_path"];
      $a_frnds[$i]["reported_count"]= $store_arry["visit_count"];
      $i++;
    }
      
    $data["stores_data"]=$os_stores_res; 
    $this->load->view('friends_store/friends_store_search_result',$data);  	
  }
  
  function checkIfExists($profileid,$list){
    $tmp=array();
    foreach($list as $rows){
      if($rows["created_by"]==$profileid){
        $tmp["storeid"]=$rows["store_aid"];
        $tmp["store_name"]=$rows["name"];
        $tmp["storeuid"]=$rows["store_id"];
        $tmp["logo_path"]=$rows["logo_path"];
        $tmp["cover_path"]=$rows["cover_path"];
        $tmp["visit_count"]=$rows["visit_count"];
      }
    }
    return $tmp;
  }  
  // Function to get the friends list of the loggedin user
  function getFrndsList($search='',$mode="list"){
    $userid=$this->get_UserId();
    $dbapi=$this->load->module("db_api");
    $s_query="SELECT profile.profile_id,profile.first_name,profile.last_name,users.profile_img,users.profile_cover_img FROM iws_friends_list friends INNER JOIN iws_profiles profile ON friends.friend_id=profile.profile_id LEFT JOIN os_user_details users ON profile.profile_id=users.profile_id_fk WHERE friends.iws_profile_id=".$userid." AND friends.friend_via='Click' AND users.status='ACTIVE'";
    if($search!=""){
      $s_query.=" AND (profile.first_name LIKE '%".$search."%' OR profile.last_name LIKE '%".$search."%')";
    }
    //echo $s_query;
    $frnds_list=$dbapi->custom($s_query);    
    $s_frnds="";
    $i=0; 
    foreach($frnds_list as $list){
      if($i==count($frnds_list)-1){
        $s_frnds.=$list["profile_id"];
      }else{
        $s_frnds.=$list["profile_id"].",";
      }
      $i++;
    }
    if($mode!="list"){
      return $s_frnds;
    }else{
      return $frnds_list;
    }    
  }
	function getFrndsStoresCnt($mode){
    $dbapi=$this->load->module("db_api");
    //$userid=$this->get_UserId();
    $s_frnds=  $this->getFrndsList('',"str");
    $s_query="SELECT COUNT(*) AS cnt FROM os_all_store WHERE created_by IN ($s_frnds)";
    $cnt_res=$dbapi->custom($s_query);
    return $cnt_res;
  }
  // Pavani on 02-06-2015 ----- code ends here
	
	
}
