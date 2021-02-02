<?php
$this->load->module('templates');
$this->templates->app_header();
$this->templates->os_mainmenu("create_store");
$package_type=$this->uri->segment(2);
?>      
<!--Oneshop Content starts Here(vinod 19-05-2015)-->
<div class="oneshop_container_sectionnew">
    <?php
    $this->load->module("stores");
    $this->stores->create_store_form($package_type);
    $this->load->module("ads");
    $this->ads->ads_view();
    ?>
</div>          
</div>
<!--Oneshop Content ends Here(vinod 19-05-2015)-->            

<?php
$this->templates->app_footer();
?>