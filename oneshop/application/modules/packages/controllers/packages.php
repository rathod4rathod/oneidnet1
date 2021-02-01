<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

    class packages extends CI_Controller {

        function __construct() {
        parent::__construct();
        $this->load->module('home');
        $this->load->module('imageresize');
        /* session and cookies check */
        
        if ($_REQUEST) {
            $sobj = $this->load->module("session_restart");
            if (isset($_REQUEST["skey"])) {
                $sobj->key_check($_REQUEST["skey"]);
            }
        }
        /* session and cookies check */
    }

    
    function get_UserId() {
        $cookies_obj=$this->load->module("cookies");
        $user_id=$cookies_obj->getUserID();
        return $user_id;
    }
    //june 30 by venkatesh 
    function upgradePackage($pid=null,$type=null,$scode=null){
        if(isset($pid) && isset($type) && isset($scode)){
            if($type=="ug" && ctype_xdigit($scode)){
                $scode=hex2bin($scode);                
                $dbobj=$this->load->module("db_api");
                $data["current_package"]=$dbobj->custom("SELECT os.store_aid,os.store_name,op.name as package_name,osri.renewal_pckg_id,osri.package_id_fk,osri.period_in_months,osri.total_products,osri.expired_on FROM `oshop_packages` op left join oshop_store_renewals_info osri on op.`package_id`=osri.package_id_fk left join oshop_stores os on os.store_aid=osri.store_id_fk WHERE is_renewed=0 and store_code='$scode'");
                $data["new_package"]=$dbobj->custom("SELECT package_id as newpackageId,name as newpackagename ,price as newpackageprice,total_products as newpackageProducts from oshop_packages where package_id=".$pid);
                if($data["current_package"]!=0 && $data["new_package"]!=0){                   
                    $data["title"] = 'Oneshop Store package Upgrade';
                    $this->load->view("packages/upgradePkg",$data);                          
                }else{
                    redirect(base_url());
                }                
            }else{
                redirect(base_url());
            }
        }else{
            redirect(base_url());
        }

       
    }
    
     //june 30 by venkatesh
    function getPackageHistory(){   
        $data["title"]="Oneshop Package History";
       $uid= $this->get_UserId();
        $qur="SELECT os.store_aid,os.store_name FROM `oshop_staff` ost left join oshop_stores os on os.store_aid=ost.`store_id_fk`  WHERE ost.user_id_fk=$uid and role='ADMIN'";
        $packagequr="SELECT DISTINCT(osri.package_id_fk),op.name as package_name FROM `oshop_staff` ost left join oshop_store_renewals_info osri on osri.store_id_fk=ost.`store_id_fk` left join oshop_packages op on osri.package_id_fk=op.package_id WHERE ost.user_id_fk='$uid' and role='ADMIN'";
        $dbobj=$this->load->module("db_api");
        $data["storesdtl"]=$dbobj->custom($qur);
        $data["packagedtls"]=$dbobj->custom($packagequr);
        $this->load->view("packages/packageHistory",$data);
    }
    //july 01 by venkatesh
    function storepackageHistory(){
        $dbobj=$this->load->module("db_api");
        $uid= $this->get_UserId();
        $qur="SELECT os.store_aid,os.store_name,os.is_active,osri.total_products,osri.period_in_months,osri.renewed_on,osri.is_renewed,osri.expired_on,op.package_id,op.name as packagename FROM `oshop_store_renewals_info` osri left join oshop_stores os on osri.`store_id_fk`=os.store_aid left join oshop_packages op on osri.`package_id_fk`=op.package_id
left join oshop_staff ost on ost.store_id_fk=osri.store_id_fk WHERE ost.user_id_fk=".$uid." and ost.role='ADMIN'";
    $data["storepackage"]= $dbobj->custom($qur);
        $this->load->view("packages/storepackageHistory",$data);
    }
}