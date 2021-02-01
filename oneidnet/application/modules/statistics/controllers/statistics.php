<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class statistics extends CI_Controller {

    function __construct() {
        session_start();
        parent::__construct();
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
        $modulesArray = array('db_api', 'memcaching', 'cookies', 'sessions');
        $this->wrapperinit->loadModules($modulesArray);
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

    function statistics_info() {
      $dbapi=$this->load->module("db_api");
      $profiles=$dbapi->select("profile_id,reg_date","iws_profiles","profile_id=".$this->user_id());
      $data["profiles_data"]=$profiles;
      $data["is_oneidnet_statisticstab_active"] = "Yes";
      $this->load->view("statistics_page",$data);
    }
    function getMWTimeSpentChart(){
      $dbapi=$this->load->module("db_api");
      //echo "SELECT * FROM iws_time_spent_stats WHERE user_id_fk=".$this->user_id();
      $result=$dbapi->custom("SELECT * FROM iws_time_spent_stats WHERE user_id_fk=".$this->user_id());
      $module_arry=array("MAIL"=>0,"CVBANK"=>0,"TUNNEL"=>0,"TRAVELTIME"=>0,"NETPRO"=>0,"CLICK"=>0,"BUZZIN"=>0,"DEALERX"=>0,"ONEVISION"=>0,"ONESHOP"=>0,"ONEIDSHIP"=>0,"VCOM"=>0,"ONENETWORK"=>0,"FINDIT"=>0,"ISNEWS"=>0,"COOFFICE"=>0);
      //$module_arry=array("CVBANK"=>0,"TUNNEL"=>0,"TRAVELTIME"=>0,"NETPRO"=>0,"CLICK"=>0,"ONESHOP"=>0,"ONEIDSHIP"=>0,"ONENETWORK"=>0,"FINDIT"=>0,"COOFFICE"=>0);
      $data_points=array();
      //print_r($module_arry);
      $all_modules_cnt=0;
      $total_time=$this->getTotalTimeSpent();
      foreach($module_arry as $key=>$val){
        if($key=="TUNNEL"){
          $module_name="tunnel_notify";
          $chart_name="Tunnel";
        }else{
          $module_name=  strtolower($key);
          $chart_name=ucfirst($module_name);
        }
        if($result[0][$module_name]!=0 || $result[0][$module_name]!=""){
          //$module_val=floor(ceil(ceil(($result[0][$module_name])/60)/$total_time)*100);
          $module_val=ceil((ceil($result[0][$module_name]/60)/$total_time)*100);
        }else{
          $module_val=0;
        }
        //$all_modules_cnt+=$module_val;
        array_push($data_points,array("x"=>$chart_name,"y"=>$module_val,"name"=>$chart_name));
      }
      //array_push($data_points,array("x"=>"All Modules","y"=>$module_val,"name"=>"All Modules"));
      echo json_encode($data_points, JSON_NUMERIC_CHECK);
    }
    function getTotalTimeSpent(){
      $dbapi=$this->load->module("db_api");
      $total_cnt=0;
      $result=$dbapi->custom("SELECT mail,cvbank,isnews,oneidship,tunnel_notify,netpro,traveltime,vcom,click,buzzin,dealerx,onevision,onenetwork,cooffice,oneshop,findit FROM iws_time_spent_stats WHERE user_id_fk=".$this->user_id());
      foreach($result[0] as $key=>$val){
        $total_cnt+=$val;
      }
      $total_time_spent=$total_cnt/60;
      return ceil($total_time_spent);
    }
    function getLoginAttemptsChart(){
      $dbapi=$this->load->module("db_api");
      $result=$dbapi->custom("SELECT COUNT(*) AS cnt,device_type FROM iws_login_history WHERE profile_id=".$this->user_id()." GROUP BY device_type");
      $device_arry=array("TAB"=>0,"COMPUTER"=>0,"MOBILE"=>0);
      $data_points=array();
      $all_devices_cnt=0;
      foreach($result as $list){
        $device_type=  ucfirst(strtolower($list["device_type"]));
        $all_devices_cnt+=$list["cnt"];
        array_push($data_points,array("x"=>$device_type,"y"=>$list["cnt"],"name"=>$device_type));
      }
      //array_push($data_points,array("x"=>"All","y"=>$all_devices_cnt,"name"=>"All"));
      echo json_encode($data_points,JSON_NUMERIC_CHECK);
    }
    function getSocProChart(){
      $dbapi=$this->load->module("db_api");
      $result=$dbapi->custom("SELECT * FROM iws_time_spent_stats WHERE user_id_fk=".$this->user_id());
      $module_arry=array("MAIL"=>0,"CVBANK"=>0,"TUNNEL"=>0,"TRAVELTIME"=>0,"NETPRO"=>0,"CLICK"=>0,"BUZZIN"=>0,"DEALERX"=>0,"ONEVISION"=>0,"ONESHOP"=>0,"ONEIDSHIP"=>0,"VCOM"=>0,"ONENETWORK"=>0,"FINDIT"=>0,"ISNEWS"=>0,"COOFFICE"=>0);
      //$module_arry=array("CVBANK"=>0,"TUNNEL"=>0,"TRAVELTIME"=>0,"NETPRO"=>0,"CLICK"=>0,"ONESHOP"=>0,"ONEIDSHIP"=>0,"ONENETWORK"=>0,"FINDIT"=>0,"COOFFICE"=>0);
      $data_points=array();
      //print_r($module_arry);
      $all_modules_cnt=0;
      $social_cnt=0;
      $professional_cnt=0;
      $utility_cnt=0;
      $total_time=$this->getTotalTimeSpent();
      foreach($module_arry as $key=>$val){
        if($key=="TUNNEL"){
          $module_name="tunnel_notify";
        }else{
          $module_name=  strtolower($key);
        }
        if($result[0][$module_name]!=0 || $result[0][$module_name]!=""){
          $module_val=ceil(ceil(($result[0][$module_name])/60)/$total_time)*100;
          if($key=="TUNNEL"||$key=="TRAVELTIME"||$key=="CLICK"||$key=="BUZZIN"){
            $social_cnt+=$result[0][$module_name];
          }
          else if($key=="COOFFICE"||$key=="CVBANK"||$key=="NETPRO"||$key=="DEALERX"||$key=="ONESHOP"||$key=="ISNEWS"){
            $professional_cnt+=$result[0][$module_name];
          }else{
            $utility_cnt+=$result[0][$module_name];
          }
        }else{
          $module_val=0;
        }
      }
      /*array_push($data_points,array("x"=>"Social","y"=>ceil((($social_cnt/60)/$total_time)*100),"name"=>"Social"));
      array_push($data_points,array("x"=>"Professional","y"=>ceil((($professional_cnt/60)/$total_time)*100),"name"=>"Professional"));
      array_push($data_points,array("x"=>"Utility","y"=>ceil((($utility_cnt/60)/$total_time)*100),"name"=>"Utilities"));*/
      array_push($data_points,array("x"=>"Social","y"=>ceil((ceil($social_cnt/60)/$total_time)*100),"name"=>"Social"));
      array_push($data_points,array("x"=>"Professional","y"=>ceil((ceil($professional_cnt/60)/$total_time)*100),"name"=>"Professional"));
      array_push($data_points,array("x"=>"Utility","y"=>ceil((ceil($utility_cnt/60)/$total_time)*100),"name"=>"Utility"));
      //array_push($data_points,array("x"=>"All Modules","y"=>$module_val,"name"=>"All Modules"));
      echo json_encode($data_points, JSON_NUMERIC_CHECK);
    }
}


