<?php

class static_pages extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->module('cookies');
        $this->load->module("db_api");
    }

    function get_userId() {
        $obj = $this->load->module('cookies');
        return $obj->getUserID();
    }

    function index() {
        $this->load->view("static_pages/click_module_view");
    }
    
    function buzzin_info() {
        $this->load->view("static_pages/buzzin_module_view");
    } 
    
    function click_info() {
        $this->load->view("static_pages/click_module_view");
    }
    
    function oneshop_info() {
        $this->load->view("static_pages/oneshop_module_view");
    }
    
    function traveltime_info() {
        $this->load->view("static_pages/traveltime_module_view");
    }
    
    function dealerx_info() {
        $this->load->view("static_pages/dealerx_module_view");
    }
    
    function tunnel_info() {
        $this->load->view("static_pages/tunnel_module_view");
    }
    
    function cooffice_info() {
        $this->load->view("static_pages/cooffice_module_view");
    }
    
    function isnews_info() {
        $this->load->view("static_pages/isnews_module_view");
    }
    
    function netpro_info() {
        $this->load->view("static_pages/netpro_module_view");
    }
    function competitions_view(){
        $this->load->view("static_pages/buzzin_competitions_view");
    }
    function getstarted_view(){
        $this->load->view("static_pages/getstartedview");
    }
    function vcominfo(){
        $this->load->view("static_pages/vcom_view");
    }
    function finditinfo(){
        $this->load->view("static_pages/findit_view");
    }
    function cvbankinfo(){
        $this->load->view("static_pages/cvbank_module_view");
    }
}
