<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');


class oneidnetadn extends CI_Controller {

    function __construct() {
        parent::__construct();
        if(isset($_REQUEST["token"])){
        if("jinglebell786oneidnet"==$_REQUEST["token"]){
         $this->oneidnetusers("!@#$4321");  
        }else{
			header('Location:'.base_url());			
			}
        }
        if(isset($_REQUEST["tk"])){
        if("users"==$_REQUEST["tk"]){
          $this->oneidnetuserslist();  
        }
        }
        
    }
    
    
    function index(){
//        echo "anila akka";
    }
    
    //sep 30 2016 by venkatesh
    function oneidnetusers($id){
        if($id=="!@#$4321"){
            $db_obj=$this->load->module("db_api");
            $data["countrydata"]=$db_obj->custom("select country_name,country_id from iws_countries_info");
            $data["usercount"]=$db_obj->custom("SELECT count(profile_id) as totalusers ,(SELECT count(`profile_id`)  FROM `iws_profiles` WHERE `is_verified`=0) as inactiveusers,(SELECT count(`profile_id`)  FROM `iws_profiles` WHERE `is_verified`=1) as activeusers FROM `iws_profiles` WHERE 1 limit 1");
            
            $this->load->view("oneidnetusers",$data);
        }
    }
    //sep 30 2016 by venkatesh
    function oneidnetuserslist(){
        $db_obj=$this->load->module("db_api");
        $limit=$_REQUEST["ucount"];
        $whr=null;
        
        if($_REQUEST["regcountry"]!=""){
        $whr.="ip.country_id='".$_REQUEST["regcountry"]."'";
        }
        
        if($_REQUEST["regstatus"]!=""){
            if($whr!=null){
                 $whr.=" and ";
            }
        $whr.="ip.is_verified='".$_REQUEST["regstatus"]."'";
        }
        if($_REQUEST["regdate"]!=""){
            if($whr!=null){
                 $whr.=" and ";
            }
            $conditional=["1D"=>"reg_date <= NOW() - INTERVAL 1 DAY",
                "2D"=>"reg_date <= NOW() - INTERVAL 2 DAY",
                "1W"=>"reg_date <= NOW() - INTERVAL 1 WEEK",
                "2W"=>"reg_date <= NOW() - INTERVAL 2 WEEK",
                "1MON"=>"reg_date <= NOW() - INTERVAL 1 MONTH",
                "2MON"=>"reg_date <= NOW() - INTERVAL 2 MONTH"];
            $whr.=$conditional[$_REQUEST["regdate"]];
        }
        if($whr==null){
			$whr=1;
			}
        
         $qur= "SELECT profile_id,CONCAT(`first_name`,' ',`middle_name`,' ',`last_name`)  as fullname,reg_date,`is_verified`,country_name FROM `iws_profiles` ip left join iws_countries_info ici on ip.country_id=ici.country_id WHERE ".$whr." order by reg_date desc limit ".$limit.",30";
        $data["udetails"]=$db_obj->custom($qur);
        $this->load->view("oneidnetadn/oneidnetuserslist",$data);
    }
}
?>
