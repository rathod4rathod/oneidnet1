<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Templates extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    function index() {
        
    }

    function app_header() {
        $this->load->view('templates/reg_header');
    }

    function app_footer() {
        $this->load->view('templates/reg_footer');
    }

    function index_header() {
        $bean=  $this->load->module('cookies');
        $data['theme'] = $bean->getthemeCookie();
        $this->load->view('templates/index_header',$data);
    }

    function introduction_header() {
        $this->load->view('templates/introduction_header');
    }
function paybookheader(){

        $this->load->view("templates/paybookheader");
    }
//03-feb-2015 by venkatesh
    function basic_info_header(){

        $this->load->view("templates/basic_info_header");
    }
    function basic_info_subheader(){

        $this->load->view("templates/basic_info_subheader");
    }
    function paybook_subheader(){

        $this->load->view("templates/paybook_subheader");
    }
    
//03-feb-2015 by venkatesh
    function basic_info_footer(){
        $this->load->view("templates/basic_info_footer");
    }
    
    
    
    function content_header()
    {    
        $this->load->view("templates/contentpage_header");
    }
    
    /**
     * This Function is used to store the user time
     * spent on each module
     * 
     */ 
    function setTimeSpent() {
		$clickContainer = $_POST['container'];
        echo $clickContainer;
		$bean=  $this->load->module('cookies');
        $user_id = $bean->getUserID();
        echo $user_id;
        $this->load->library('session');
        
		if (!$this->session->userdata('active_from') || !$this->session->userdata('active_module') ) {
			$data['active_module'] = $clickContainer;
			$data['active_from'] = date('m-d-Y h:i:s');
            echo var_dump($data);
			$this->session->set_userdata($data);
	    } else {
			$sField = $this->session->userdata('active_module');
			$active_from = $this->session->userdata('active_from');
			$active_till = date('m-d-Y h:i:s');
			$mindiff = round(abs(strtotime($active_till) - strtotime($active_from)) / 60);
			if($mindiff == 0) {
			    $mindiff = 1;
			} 
			
			$db_obj=$this->load->module("db_api");
			$checkUser = $db_obj->custom('select rec_aid,'.$sField.' from iws_time_spent_stats where user_id_fk='.$user_id);
			$s_tbl ="iws_time_spent_stats";
            echo var_dump($checkUser);
			if(!$checkUser) {
				$fieldid = $this->session->userdata('active_module');
				$a_data =array(
					"user_id_fk" => $user_id,
					$fieldid     => $mindiff,
				);
				
				$insert_result = $db_obj->insert($a_data, $s_tbl);
			} else {
				$a_data =array(
					$sField	 => $checkUser[0][$sField]+$mindiff,
				);
				$where = " rec_aid='" . $checkUser[0]['rec_aid'] . "'";
				$insert_result = $this->db_api->update($a_data, $s_tbl, $where);
			}
			
			if($insert_result==1){
				$this->session->unset_userdata('active_module');
				$this->session->unset_userdata('active_from');
				
				$data['active_module'] = $clickContainer;
				$data['active_from'] = date('m-d-Y h:i:s');;
				$this->session->set_userdata($data);
			}
		}
	}
}
