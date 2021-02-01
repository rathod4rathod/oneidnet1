<?php
$this->load->module('templates');
$this->templates->app_header();
$this->templates->os_mainmenu();
?>      
<input type="hidden" id="storeaid" value="<?php echo $store_id; ?>" >
<!--Oneshop Content starts Here(Anil 30-12-2015)-->
<div class="oneshop_container_sectionnew">
    <?php
    $this->load->module("stores");
    $this->stores->edit_store_form();
    ?>
</div>
<!--Oneshop Content ends Here(Anil 30-12-2015)-->            
<?php
$this->templates->app_footer();
?>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/microjs/editstore.js"></script>
<div class="oneshop_currencyConvertorPopup" id="image_crop_pp" >
    <div class="snapshop_editimage_wrap">
        <p class="oneshop_currencyConvertorCloseBtn_two" id="crp_pop_cnl">X</p>
        <div class="fll np_des_mab20 np_des_mat10 wi100pstg">
            <h1 class="acenter normal fs18"> Change Your Profile Picture!  </h1>
        </div>

        <div class="snap_edit_wrap">
            <form id="oneshop_profile_image" method="post" enctype="multipart/form-data">
                <input type="file" id="oneshop_profile_image_path" name="bgChangeField">
            </form>
            <div id="crp"></div>

        </div>
    </div>
</div>
