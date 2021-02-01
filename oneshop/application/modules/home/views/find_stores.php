<?php
$this->load->module('templates');
$this->templates->app_header();
$this->templates->os_mainmenu("find_stores");
?>   

<link rel="stylesheet" href="<?php echo base_url() . 'assets/css/jquery-ui.css' ?>">
<script src="<?php echo base_url() . 'assets/scripts/jquery-ui.js' ?>"></script>
<!--Oneshop Content starts Here(Raviteja 31-12-2015)-->
<div class="oneshop_contentSection">
    <?php
    $this->load->module('stores');
    $this->stores->store_search();
    ?>
    <div class="oneshop_findStorePage">
    	<div class="hd_heading">
                    <input type="hidden" name="hcountry_id" value=""/>
            	<h1>Stores Directory <span></span></h1>
            </div>
        <!--<div class="titlecontainer acenter">
                    <input type="hidden" name="hcountry_id" value=""/>

            <div class="titledeco">
                <h4 class="title-text fkinlineblock black">  Stores Directory  </h4>
            </div>
        </div>-->

        <div class="featured_product_product_mainwrap">
            <div id="store_search_result">
                
            </div>
        </div>

        <div class="osdes_rightbar_headingsbg_wrap mat20"  style="display:none;" id="oneshop_nomoredata" >

            <div class="nodata_found_bgwrap">
                <p>  Sorry, No More Store to show at this moment! </p>

            </div>
        </div>
    </div>
    <?php
    $this->templates->app_footer();
    ?>
    <script src="<?php echo base_url() . 'assets/microjs/find_stores.js' ?>"></script>          
