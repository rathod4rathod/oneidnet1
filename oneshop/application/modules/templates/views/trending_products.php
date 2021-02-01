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
            	<h1>TRENDING PRODUCTS <span></span></h1>
            </div>

    <p>

        In the ONEIDNET OneShop Module, the most popular products that are selling fast and by large amounts, will be posted in the front covers of the OneShop Module home page. These trending products are showcased with their Store name and information so that the System users will be informed about the products that are popular in the market place. </p>
<p>

        If your Store has a trending product, don’t hesitate to send ONEIDNET a request to post your product in our OneShop home page. </p>

</div> <!--left container end here-->


<div class="np_des_right_container flr"> <!--right container start here-->

   <?php  $url = str_replace('/oneshop', '/onenetwork', base_url());?>
    <a href="<?php echo $url.'oneshopinfo';  ?>" target="_self"><img src="<?php echo base_url() . "assets/"; ?>images/ad1.jpg" class="hotel_news_imgbox"></a>


</div> <!--right container end here-->

</div> <!--wrapper inner closed here-->
</div> <!--module container end here-->
<div class="clearfix"></div>
<?php
$this->load->module('templates');
$this->templates->app_footer();
?>
