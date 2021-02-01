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
            	<h1>STORES' RESPONSIBILITIES <span></span></h1>
            </div>

    <p>

        Store owners must also declare the Store’s Responsibilities to its customers. Customers must be informed at all times regarding the extent and limitations of the Store’s Responsibilities pertaining to the customer’s purchases. For example, the Store owner must decide if his/her Store will carry damage insurance, if the Store will carry in transit insurance, what type if any of insurance the Store owner provides for high valued merchandise, liability insurance, professional insurance, etc. The Store owner should declare to its customers the specifics about what the Store is responsible for in any given situation. For example, what is the Store’s responsibility for delays? What happens if a shipment gets lost? What happens if the Store Staff make mistakes with the products, processing, paperwork, etc.? </p>


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
