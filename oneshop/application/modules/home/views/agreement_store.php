<?php
$this->load->module('templates');
$this->templates->app_header();
$this->templates->os_mainmenu();
?>      
<!--Oneshop Content starts Here(Anil 07-01-2016)-->
<div class="oneshop_container_sectionnew">
    <?php
    $this->load->module("stores");
    $this->stores->agreement_store();
    ?>     
</div>
<!--Oneshop Content ends Here(Anil 07-01-2016)-->            

<?php
$this->templates->app_footer();
?>
