<?php
$this->load->module('templates');
$this->templates->app_header();
$this->templates->os_mainmenu();
?>      
<!--Oneshop Content starts Here(Anil 30-12-2015)-->
<div class="oneshop_container_sectionnew">
    <?php
    $store_code=$this->uri->segment(2);
    $this->load->module("stores");
    $this->stores->store_staff_settings($store_code);
    ?>
</div>
<!--Oneshop Content ends Here(Anil 30-12-2015)-->            

<?php
$this->templates->app_footer();
?>
