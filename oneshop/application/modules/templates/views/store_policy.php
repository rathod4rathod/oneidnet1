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
                <h1>STORES' POLICIES<span></span></h1>
            </div>
            <p>
                Every OneShop Store owner is fully responsible for his/her own OneShop Store Policies. The reason for this is that every Store owner is responsible for his/her Store activities. Purchasing, selling, delivery, transactions, cancellations, damages, government rules & regulations, taxes, fees, insurance, and every requirement for the Store owner to run and operate his/her store is the Store owner’s responsibility.  ONEIDNET’s service in the OneShop Module is to provide a vehicle under which stores can sell their products and services.  It is recommended that Store owners at minimum prepare the Store’s Store Policy, Privacy Policy, Purchasing Policy, Cancellation Policy, Delivery Policy, Damages Policy, Returns Policy and Payment Policy to display them in their Store for the Store owner’s customers to read, understand and agree upon.
            </p>
            <p>
                In the OneShop Store Edit area the Store owner can prepare and make use of his/her Store Policies.
            </p>

        </div> <!--left container end here-->


        <div class="np_des_right_container flr"> <!--right container start here-->

            <?php $url = str_replace('/oneshop', '/onenetwork', base_url()); ?>
            <a href="<?php echo $url . 'oneshopinfo'; ?>" target="_self"><img src="<?php echo base_url() . "assets/"; ?>images/ad1.jpg" class="hotel_news_imgbox"></a>
            <a href="<?php echo $url . 'oneshopinfo'; ?>" target="_self"><img src="<?php echo base_url() . "assets/"; ?>images/ad2.jpg" class="hotel_news_imgbox"></a>

        </div> <!--right container end here-->

    </div> <!--wrapper inner closed here-->
</div> <!--module container end here-->
<div class="clearfix"></div>
<?php
$this->load->module('templates');
$this->templates->app_footer();
?>
