<?php
if(!isset($_SESSION))
  {
  session_start(); 
  }
if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class ads extends CI_Controller {

  function __construct() {
    parent::__construct();
  }

  function get_UserId() {
    return 1;
  }

  function ads_view() {
    $this->load->view('ads/ads_view');
  }

  function fixed_Width_Ads_View() {
    $this->load->view('ads/fixed_width_ads_view');
  }

}
