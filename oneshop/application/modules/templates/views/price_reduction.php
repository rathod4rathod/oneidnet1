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
            	<h1>PRICE REDUCTION NOTIFICATIONS  <span></span></h1>
</div>

    <p>

        When OneShop Stores have initiated sales or price reductions for their products or services, the Store owner’s network is immediately notified regarding the Store’s sale.  Price reductions are sure to make sales increase for any Store in OneShop. This is one of the most important incentives for a Store’s customer base to pick a given store over other stores. Of course, shipping charges, transactions charges, quality, quantity and location play big factors in the sales of the OneShop Stores’ products and services, but in the end the customer wants to get what they are shopping for at reduced cost. </p>

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
