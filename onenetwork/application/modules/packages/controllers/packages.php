<?php

class Packages extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->module('cookies');
    }

    function get_userId() {
        $obj = $this->load->module('cookies');
        return $obj->getUserID();
    }

    function index() {
        $this->load->view('packages');
    }
    

}
