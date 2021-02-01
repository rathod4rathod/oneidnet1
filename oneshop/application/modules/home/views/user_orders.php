<?php
$this->load->module('templates');
$this->templates->app_header();
$this->templates->os_mainmenu();
?>
<!--Oneshop Content starts Here(Anil 11-01-2016)-->
<div class="oneshop_container_sectionnew"> 

    <?php
    $this->load->module("stores");
    $this->stores->store_orders();
    ?>

</div>
<!--Oneshop Content ends Here(Anil 11-01-2016)-->

<?php
$this->templates->app_footer();
?>
