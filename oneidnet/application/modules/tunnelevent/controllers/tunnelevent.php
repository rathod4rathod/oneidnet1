<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
//if(!$_SESSION){
//  session_start();
//  
//}
class tunnelevent extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->module('db_api');
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
        
    }
function getUserId(){
	$bean = $this->load->module('cookies');
	return $bean->getUserID();  
}


    function index() {
        $data['tunnelvideo_suggetion'] =$this->video_suggession();
        
        $this->load->view('tunnelBroadCast_v',$data);
    
    }
    function video_suggession(){
      $where="iws_profile_id=1";
      $a_sub_result=$this->db_api->select("video_id","tunnel_watch_later_list",$where); 
      $i_rslt_cnt=count($a_sub_result);
      $i=1;
      $s_condition="";
      foreach($a_sub_result as $list){   
        if($i<$i_rslt_cnt){
            $s_condition=$s_condition.$list["video_id"].",";          
        }else{
            $s_condition=$s_condition.$list["video_id"];
        }
        $i++;
      } 
      if($s_condition!=''){
        $s_where="country=85 AND rec_id NOT IN (".$s_condition.") LIMIT 4";
      }else{
        $s_where="country=85 LIMIT 4";
      }      
      $a_result=$this->db_api->select("video_path,rec_id","tunnel_all_videos",$s_where);      
      return $a_result;
    }   
    //19-08-2015 by venkatesh
    function tunnel_mdl()    {
      $this->load->view("tunnelevent/tunnel_mdl");
    }
    //19-8-2015 by venkatesh
    function tunnel_notification_slide_view() {
    $db_obj = $this->load->module('db_api');
    $query = "SELECT notification_type, COUNT(*) TotalCount FROM tunnel_notification where  read_or_not='0' and user_id_fk=".$this->getUserId()." GROUP BY notification_type HAVING COUNT(*)";
    $data["notify_type"] = $db_obj->custom($query);
    $this->load->view("tunnelevent/tunnel_notification_slide_view",$data);
  }

}
