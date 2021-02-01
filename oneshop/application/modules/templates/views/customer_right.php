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
            	<h1>CUSTOMER'S RIGHTS <span></span></h1>
            </div>

    <p>

       The Store owner must also clearly identify in their Store where the rights are viable by every visiting customer to the owner’s Store, the Customer’s Rights as it pertains to the owner’s OneShop Store. The customer should understand his/her rights clearly and should be able to exercise those rights at any time during and after the customer’s transaction with any given OneShop Store.  The Store owner is also responsible for the preparation of the Store’s Customer’s Rights. </p>


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
