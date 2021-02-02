<?php
$this->load->module('templates');
$this->templates->app_header();
$this->templates->os_mainmenu("friends_stores");
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
            	<h1>Friends  Stores  <span></span></h1>
            </div>
        

        <div class="featured_product_product_mainwrap">
            <div id="friend_storeresult">

            </div>
        </div>

        <div class="clearfix"></div>

        <div class="wi100pstg fll">
            <div class="osdes_rightbar_headingsbg_wrap mat20"  style="display:none;" id="oneshop_nomoredata" >

                <div class="nodata_found_bgwrap">
                    <p> We could not find any more of your friend’s store!</p>

                </div>

            </div>
        </div>
    </div>
</div>


<?php
$this->templates->app_footer();
?>
<script src="<?php echo base_url() . 'assets/microjs/friendstore.js' ?>" ></script>

