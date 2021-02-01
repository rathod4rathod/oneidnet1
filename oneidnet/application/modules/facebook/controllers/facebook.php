<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class facebook extends CI_Controller {

    function __construct() {
        parent::__construct();
   }

    function test(  ) {
	$this->load->view("success_callback");
    }
}
