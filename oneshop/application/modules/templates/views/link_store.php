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
            	<h1>LINK STORE TO ONEIDSHIP<span></span></h1>
            </div>
    <p>

        In the ONEIDNET System there is a substantial amount of System Modules Interface.  Every Module is interfaced to the other System Modules in one way or another.  Much like any other System Module, interface between the OneShop and OneIDShip is paramount.  This interface makes the process for store owners cheaper, faster and easier. Given that every single user in the ONEIDNET System has a OneIDShip profile as well as a OneShop profile, the user’s information and details are already established in the OneIDShip Module as to match with the OneShop profile. Since the user already also now completed his/her Paybook profile, now the Modules and the Paybook Gateway are already interfaced. This is the same process within the ONEIDNET System for every user, whether the user owns a OneShop Store or not. </p>


    <p>

   So the way the process works is, a ONEIDNET System user identifies an item from a OneShop Store he/she would like to purchase. The user pays for the item by using the Paybook Gateway. Upon receipt of approved payment from the user who purchased the store’s item, the store owner then selects to ship the item, for this the store owner schedules a OneIDShip pickup or drop off.  The OneIDShip Module already has the details and payment information for the OneShop store owner to make payment for delivery through Paybook.  In this manner, the transactions from every user become automatic in the OneShop Module. This is the same process and interface management in all the ONEIDNET System Modules.
</p>

</div> <!--left container end here-->


<div class="np_des_right_container flr"> <!--right container start here-->

  <?php  $url = str_replace('/oneshop', '/onenetwork', base_url());?>
    <a href="<?php echo $url.'oneshopinfo';  ?>" target="_self"><img src="<?php echo base_url() . "assets/"; ?>images/ad1.jpg" class="hotel_news_imgbox"></a>
    <a href="<?php echo $url.'oneshopinfo';  ?>" target="_self"><img src="<?php echo base_url() . "assets/"; ?>images/ad2.jpg" class="hotel_news_imgbox"></a>


</div> <!--right container end here-->

</div> <!--wrapper inner closed here-->
</div> <!--module container end here-->
<div class="clearfix"></div>
<?php
$this->load->module('templates');
$this->templates->app_footer();
?>
