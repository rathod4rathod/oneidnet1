<?php
$this->load->module('templates');
$this->templates->app_header();
?>
<div class="oneshop_navigationBar os_bckwdndfrwdwrap">
    <ul>
        <li id="os_backword_btn" title="Click to go back"><i class="fa fa-angle-left"></i></li>
        <li id="os_forward_btn"  title="Click to go forward"><i class="fa fa-angle-right"></i></li>
    </ul>
   <!-- <span class="oneshop_navigation"><h6 class="os_backword_btn" id="os_backword_btn"><< Backward |</h6 ><h6 class="os_forward_btn" id="os_forward_btn"> Forward >></h6></span>-->
</div>
<div class="np_des_module_container_wrap"> <!--module_container start here-->

    <div class="np_des_wrapper-inner"><!--wrapper inner start here-->


        <div class="np_des_left_container fll cms_contentwrap"> <!--left container start here-->
            <div class="hd_heading">
                <h1>CREATING MALLS  <span></span></h1>
            </div>

            <p>

                Any group of Stores whose OneShop Store owners desire to form a Partnership in this ONEIDNET System Module can confer upon themselves and upon OneNetwork’s authorized representatives to request for and apply to bring together their groups of Stores to create an online Mall in the OneShop Module.  Creating an online Mall in the OneShop Module gives an important advantage to the partners of the Mall, which is that now the Created Mall is able to reduce their prices to make their products and services yet more competitive and attract yet far more ONEIDNET System users as potential customers. </p>
            <p>

                We at ONEIDNET wish you the best results in your OneShop Stores and business startup ventures!
            </p>
        </div> <!--left container end here-->

        <div class="np_des_right_container flr"> <!--right container start here-->

            <?php $url = str_replace('/oneshop', '/onenetwork', base_url()); ?>
            <a href="<?php echo $url . 'oneshopinfo'; ?>" target="_self"><img src="<?php echo base_url() . "assets/"; ?>images/ad1.jpg" class="hotel_news_imgbox"></a>




        </div> <!--right container end here-->

    </div> <!--wrapper inner closed here-->
</div> <!--module container end here-->
<div class="clearfix"></div>
<?php
$this->load->module('templates');
$this->templates->app_footer();
?>
