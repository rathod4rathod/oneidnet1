<?php
if (!defined('BASEPATH'))    exit('No direct script access allowed');

class os_package extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->module('cookies');
    }

    function get_userId() {
        $obj = $this->load->module('cookies');
        return $obj->getUserID();
    }
    function index(){     
        $db_obj = $this->load->module('db_api');
        
        if (isset($_REQUEST["type"]) && isset($_REQUEST["str"])) {
            if ($_REQUEST["type"] == "ug") {
                $data["type"] = $_REQUEST["type"];
                $data["str"] = $_REQUEST["str"];
            }
        }
        $data['stores_info'] = $db_obj->select("*", "oshop_packages", '');
        // print_r($stores_info);
        $this->load->view('os_package/os_packages_view',$data);
    }

    function os_package_packages(){
        $db_obj = $this->load->module('db_api');
        $myfields = "*";
        $mytable = "oshop_packages";
        $data['stores_info'] = $db_obj->select($myfields, $mytable, '');
        $this->load->view('os_package/os_packages_view',$data);
    }

    function store_packages() {
         $this->load->view('os_package/store_packages_cr');
    }
    
    function products_packages() {
         $this->load->view('os_package/products_packages_cr');
    }
    function malls_packages() {
         $this->load->view('os_package/malls_promotions_cr');
    }
    
    //july 04 2016 by venaktesh
    function copackages(){         
        $db_obj = $this->load->module('db_api');
        if (isset($_REQUEST["type"]) && isset($_REQUEST["str"])) {
            if ($_REQUEST["type"] == "ug") {
                $data["type"] = $_REQUEST["type"];
                $data["str"] = $_REQUEST["str"];
            }
        }
        $obj = $this->load->module('cookies');
        $data['copackages'] = $db_obj->select("*", "co_office_packages", 'country_id_fk='.$obj->getUserCountryID());
        if($data['copackages']==0){
            $data['copackages'] = $db_obj->select("*", "co_office_packages", 'country_id_fk=85');
        }
        $this->load->view('os_package/copackages',$data);
    }
    
    
    
}
