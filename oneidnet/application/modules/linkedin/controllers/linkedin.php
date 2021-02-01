<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class linkedin extends CI_Controller {

    function __construct() {
        parent::__construct();
	//$this->load->view('jio');
    }

    function index() {
 	$this->load->view("jio");
    }

    function test(  ) {
	$this->load->view("success_callback");
    }

       // $data['result']=  $this->db_api->custom($sql);
       // $this->load->view("celebraties_info_page",$data);


}
