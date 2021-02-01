<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class people extends CI_Controller {

    function __construct() {
        session_start();
        parent::__construct();
        $modulesArray = array('db_api', 'memcaching', 'cookies', 'sessions');
        $this->wrapperinit->loadModules($modulesArray);
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

    function people_info() {
        $data['is_oneidnet_peopletab_active'] = "Yes";

        $this->load->view("people_info_page",$data);
    }

    function social_users()
    {
       $value = trim($this->input->post('value'));
       if($value=="")
       $sql="select user_id_fk,profile_name,logo from click_users_details where user_id_fk !=".$this->user_id()." ORDER BY rand() LIMIT 21" ;
       else
       $sql="select user_id_fk,profile_name,logo from click_users_details where user_id_fk !=".$this->user_id()." and  profile_name like '$value%' ORDER BY rand() LIMIT 21" ;
       $data['result']=  $this->db_api->custom($sql);
       $this->load->view("social_info_page",$data);
    }
    function professional_users()
    {
        $value = trim($this->input->post('value'));
        if($value=="")
        $sql="select nus.user_id_fk,nus.profile_name,nus.image_path,ip.user_id from netpro_users_settings nus left join iws_profiles ip on nus.user_id_fk = ip.profile_id where nus.user_id_fk !=".$this->user_id()." ORDER BY rand() LIMIT 21" ;
        else
        $sql="select nus.user_id_fk,nus.profile_name,nus.image_path,ip.user_id from netpro_users_settings nus left join iws_profiles ip on nus.user_id_fk = ip.profile_id where nus.user_id_fk !=".$this->user_id()." and nus.profile_name like '$value%' ORDER BY rand() LIMIT 21" ;
        $data['result']=  $this->db_api->custom($sql);
        $this->load->view("professional_info_page",$data);
    }
    function celebraties_users()
    {
        $value = trim($this->input->post('value'));
        if($value=="")
        $sql="select bcd.id,bcd. orignal_name ,bud.profile_image_path from buzzin_celebraties_details bcd left join buzzin_user_details bud on bcd.id=bud.user_id_fk where bcd.id !=".$this->user_id()." ORDER BY rand() LIMIT 21" ;
        else
        $sql="select bcd.id,bcd.orignal_name,bud.profile_image_path from buzzin_celebraties_details bcd left join buzzin_user_details bud on bcd.id=bud.user_id_fk where bcd.id !=".$this->user_id()."  and bcd.buzzin_username like '$value%' ORDER BY rand() LIMIT 21" ;
        $data['result']=  $this->db_api->custom($sql);
        $this->load->view("celebraties_info_page",$data);
    }
    //november 22 2016
function findpeople(){
    $dbobj=$this->load->module("db_api");
    $uid=$this->user_id();
    $data["connectSuggestion"]=$dbobj->custom("SELECT `profile_id`,`user_id`,replace(concat(first_name,' ',last_name),' ',' ') as fullname,`img_path` FROM `iws_profiles` WHERE concat(first_name,' ',last_name) like '%".$_REQUEST["searchval"]."%' limit 6");
    $this->load->view("people/friendsuggestions",$data);
}

//november 22 2016 by venkatesh
function connectionsuggtions(){    
    $limit=$_REQUEST["load_mtn_count"];
    $uid=$this->user_id();
    $dbobj=$this->load->module("db_api");
    $where="";
    if (filter_var($_REQUEST['val'], FILTER_VALIDATE_EMAIL)) {
            $where .= "email='" . $_REQUEST['val'] . "'";
        } else if ($_REQUEST["val"] != "null") {
            $where .= "replace(concat(`first_name`,' ',`middle_name`,' ',`last_name`),'  ',' ') like '%" . $_REQUEST["val"] . "%' limit $limit,30";
        } else if ($_REQUEST["uid"] != "null") {
            $where .= "profile_id=" . hex2bin($_REQUEST["uid"]);
        } else {
            $where .= "profile_id!=$uid limit $limit,30";
        }
        $qur="SELECT `profile_id`,`user_id`,replace(concat(`first_name`,' ',`middle_name`,' ',`last_name`),'  ',' ') as fullname,`img_path`,(select request from  iws_contacts ic where ic.associate_id_fk=profile_id and user_id=$uid) as request FROM `iws_profiles` where ".$where;
    $data["contactsug"]=$dbobj->custom($qur);
    $data["uid"]=$uid;
    $this->load->view("people/connectionsuggtions",$data);
}
//november 23 2016 ny venkatesh
function connectionInsert() {
        $uid = $this->user_id();
        $dbobj = $this->load->module("db_api");
        $fid = hex2bin($_REQUEST["assoc_id"]);
        $dbobj->insert(["iws_profile_id" => $uid, "friend_id" => $fid], "tunnel_followers");
        $dbobj->insert(["user_id_fk" => $uid, "friend_id_fk" => $fid], "click_friends_requests");
        $dbobj->insert(["user_id_fk" => $fid, "assosiate_id_fk" => $uid], "netpro_connection");
        $dbobj->insert(["friend_id_fk" => $fid, "my_id_fk" => $uid], " dx_connections");
        $dbobj->insert(["user_id_fk" => $fid, "assosiate_id_fk" => $uid], " cvbank_connection");
        $dbobj->insert(["user_id_fk" => $fid, "associated_id_fk" => $uid], "oshop_explore");
        $dbobj->insert(["user_id_fk" => $uid, "follower_id_fk" => $fid], "isn_user_followers");
		$dbobj->insert(["my_id_fk" => $uid, "friend_id_fk" => $fid,"followed_via_module"=>"COFFICE"], "blog_users_connections");
		$dbobj->insert(["my_id_fk" => $uid, "friend_id_fk" => $fid,"followed_via_module"=>"ONENETWORK"], "blog_users_connections");
		$dbobj->insert(["my_id_fk" => $uid, "friend_id_fk" => $fid,"followed_via_module"=>"FINDIT"], "blog_users_connections");				
		$dbobj->insert(["user_id_fk" => $fid,"follower_id_fk" => $uid], "buzzin_followers");
        echo $dbobj->insert(["associate_id_fk" => $fid, "user_id" => $uid], "iws_contacts");
    }

}
