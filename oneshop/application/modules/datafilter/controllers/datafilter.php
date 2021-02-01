<?php

require('application/libraries/Datafilters.php');

class datafilter extends CI_Controller {

  function __construct() {
    parent::__construct();
  }

  function datafilter_result($s_string) {
    $data_filter = new Datafilters();
    $result = $data_filter->profanityFilter($s_string);
    return $result;
  }

}

?>
