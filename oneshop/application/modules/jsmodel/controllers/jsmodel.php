<?php
if (!defined('BASEPATH'))  exit('No direct script access allowed');
if (!isset($_SESSION)) {
  session_start();
}

class Jsmodel extends CI_Controller {
    /*** 27-07-2015 display Bannar ads ***/
    function getCampaigns(){
        $homeObj=$this->load->module('home');
        $user_id=$homeObj->get_UserId();
        $dbapi=$this->load->module("db_api");
        include("/var/www/html/includes/".$user_id."/".$user_id.".php");
        $arr = json_decode($promotions);
        $flash_Id = $arr[0]->flash;
        if(count($flash_Id) != 0){
            $campaign_Id = $arr[0]->flash;
            $adtype = "flash";
        }else{
            $campaign_Id = $arr[0]->banners;
            $adtype = "banner";
        }
        //print_r($campaign_Id);
        if($campaign_Id){
        $campaign_details = array();
        $cdate = date('Y-m-d');
        for($i=0;$i<count($campaign_Id);$i++){
             //$s_where="campaign_id='".$campaign_Id[$i]."' AND campaign_size='618*222px'";
             $res = $dbapi->custom("SELECT cp.campaign_id,cp.file_path,cp.campaign_size FROM on_campaigns cp JOIN `on_campaign_targets` ct ON cp.campaign_id = ct.campaign_id_fk WHERE cp.campaign_id='".$campaign_Id[$i]."' AND cp.campaign_size='618*222px' AND ct.date='".$cdate."' AND ct.module='Oneshop' AND ct.user_id_fk='".$user_id."'");
             //$res = $dbapi->select("campaign_id,file_path,campaign_size","on_campaigns",$s_where);
             if($res != 0)
                {
                $campaign_details[] = $res;
                }
            }
            $section = array_rand($campaign_details);
            $arry[] = $campaign_details[$section][0];
      //print_r($campaign_details);
        $result['campaigns'] = $arry;
        $result['adtype'] = $adtype;
        $this->load->view('ads/banner_ads',$result);
        }
  }
   /*** 24-07-2015 display Right side ads ***/
  function getCampaignIds(){
        $homeObj=$this->load->module('home');
        $user_id=$homeObj->get_UserId();
        $dbapi=$this->load->module("db_api");
        include("/var/www/html/includes/".$user_id."/".$user_id.".php");
     
        $arr = json_decode($promotions);
        $campaign_Id = $arr[0]->banners;
        if($campaign_Id){
        $campaign_details = array();
        $cdate = date('Y-m-d');
        for($i=0;$i<count($campaign_Id);$i++){
            $res = $dbapi->custom("SELECT cp.campaign_id,cp.file_path,cp.campaign_size FROM on_campaigns cp JOIN `on_campaign_targets` ct ON cp.campaign_id = ct.campaign_id_fk WHERE cp.campaign_id='".$campaign_Id[$i]."' AND cp.campaign_size='250*200px' AND ct.date='".$cdate."' AND ct.module='Oneshop' AND ct.user_id_fk='".$user_id."'");
                //$s_where="campaign_id='".$campaign_Id[$i]."' AND campaign_size='250*200px'";
                //$res = $dbapi->select("campaign_id,file_path,campaign_size","on_campaigns",$s_where);
                if($res != 0)
                {
                $campaign_details[] = $res;
                }
            }
            //print_r($campaign_details);
            if(count($campaign_details) > 2){
                $section = array_rand($campaign_details,3);
                foreach($section as $k=>$v){
                   $arry[] = $campaign_details[$v][0];
                }
            }else if(count($campaign_details) == 2){
                    $section = array_rand($campaign_details,2);
                    foreach($section as $k=>$v){
                        $arry[] = $campaign_details[$v][0];
                     }
                }
                else{
                    $section = array_rand($campaign_details);
                    $arry[] = $campaign_details[$section][0];
                } 
        $result['campaigns'] = $arry;
        $this->load->view('ads/ads_view',$result);
        }
  }
  
  /** 24-07-2015 Report the ads (update campaigns_roi table)***/
  function updateCampaigns()
  {
        $homeObj=$this->load->module('home');
        $user_id=$homeObj->get_UserId();
        $dbapi=$this->load->module("db_api");
        $user_det=$dbapi->select("*","iws_profiles","profile_id=$user_id");
        
        $campaign_id = $this->input->post('campaignid');
        $report_ad = $this->input->post('report_ad');
        $s_where = "campaign_id_fk = $campaign_id";
        
        if($report_ad == 1){
            $result=$dbapi->select("not_interested_count","on_campaign_roi",$s_where);
            $count = $result[0]['not_interested_count'] + 1;
            $a_data = array("not_interested_count" => $count);
            /** Remove campaign id from user.php file**/
            include('system/libraries/generic.php');
            include("/var/www/html/includes/".$user_id."/".$user_id.".php");
            $pp=new jsonstring();
            
            $arr1 = json_decode($promotions, true);
            /*** 28-07-2015 Campaigns details***/
            $cpdata = $dbapi->select("campign_type,total_reach", "on_campaigns","campaign_id='$campaign_id'");
           if($cpdata[0]['campign_type'] == "Banner Marketing"){
                $pp->custom_unset($user_id,$arr1[0]['banners'],trim($campaign_id,"\n"),$arr1);
            }
            else if($cpdata[0]['campign_type'] == "Flash Marketing"){
                $pp->custom_unset($user_id,$arr1[0]['flash'],trim($campaign_id,"\n"),$arr1);
            }
            else if($cpdata[0]['campign_type'] == "Tunnel: Channel Promotion"){
                $pp->custom_unset($user_id,$arr1[0]['tunnel_video'],trim($campaign_id,"\n"),$arr1);
            }
            else if($cpdata[0]['campign_type'] == "Corporate Office: Company Page Promotion"){
                $pp->custom_unset($user_id,$arr1[0]['company_page_promotions'],trim($campaign_id,"\n"),$arr1);
            }
            else if($cpdata[0]['campign_type'] == "Buzzin: Celebrity Account Promotion"){
                $pp->custom_unset($user_id,$arr1[0]['buzzin_account_promotions'],trim($campaign_id,"\n"),$arr1);
            }
            else if($cpdata[0]['campign_type'] == "Oneshop: Store Promotion"){
                $pp->custom_unset($user_id,$arr1[0]['oneshop_promotions'],trim($campaign_id,"\n"),$arr1);
            }
        }else if($report_ad == 2){
            $result=$dbapi->select("irrevalent_count,male_reach,female_reach","on_campaign_roi",$s_where);
            $count = $result[0]['irrevalent_count'] + 1;
            if($user_det[0]['gender'] == "MALE"){
               $malereach_count = $result[0]['male_reach'] + 1;
               $a_data = array("irrevalent_count" => $count,"male_reach"=>$malereach_count);
            }
            if($user_det[0]['gender'] == "FEMALE"){
               $femalereach_count = $result[0]['female_reach'] + 1;
               $a_data = array("irrevalent_count" => $count,"female_reach"=>$femalereach_count);
            }
            
        }else if($report_ad == 3){
            $result=$dbapi->select("repetitive_count,male_reach,female_reach","on_campaign_roi",$s_where);
            $count = $result[0]['repetitive_count'] + 1;
            if($user_det[0]['gender'] == "MALE"){
               $malereach_count = $result[0]['male_reach'] + 1;
               $a_data = array("repetitive_count" => $count,"male_reach"=>$malereach_count);
            }
            if($user_det[0]['gender'] == "FEMALE"){
               $femalereach_count = $result[0]['female_reach'] + 1;
               $a_data = array("repetitive_count" => $count,"female_reach"=>$femalereach_count);
            }
            
        }
        $mytable = "on_campaign_roi";
        
       echo $result = $this->db_api->update($a_data, $mytable, $s_where);
       /*** Update user see ad in on_campaign_target table***/
       $filed_data = array("seen"=>1);
       $s_where_ct = "campaign_id_fk = '$campaign_id' AND user_id_fk = '$user_id'";
       $result = $this->db_api->update($filed_data, "on_campaign_targets", $s_where_ct);
  }
}
?>
