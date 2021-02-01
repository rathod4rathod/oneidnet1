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
            	<h1>HOW TO OPEN A STORE<span></span></h1>
            </div>

    <p>

        To opens a store in OneShop there are two options, one option is to select the register link located at the top header of the OneShop Module. The link takes the user to the OneNetwork’s OneShop PACKAGES’ page.  In this page, users can review the different packages available for OneShop stores for the user to select the package that best matches the user’s business needs. Once the user has decided what package to select, the user at the user’s discretion may want to read over the GET STARTED tab for guides in OneNetwork for promotional services. If the user wants to go directly to the OneShop PACKAGE of choice, then the user can select the PACKAGES tab in OneNetwork and browse through the page to find the OneShop area to open a store or open a mall.  In this case the user selects the OPEN STORE link. </p>

<p> In this case the OPEN STORE link takes the user to the specific ONESHOP PACKAGES page, here the next step is for the user to select the package the user wants to activate. At this time, the user selects the desired plan and proceeds to complete the Create Your Store form. Once the form is complete, the user clicks on the proceed button to begin creating his/her store.
</p>
    <p>
        The other option is to select the CREATE STORE tab, this link takes the user immediately to the ONESHOP PACKAGES page, at this time, the user proceeds to select the plan he/she needs. After selection, the user proceeds to complete the Create Your Store form. Once the form is complete, the user clicks on the proceed button to begin creating his/her store.
    </p>
    <p>
     Once the new Store is created, the user can proceed to add products, product lists, edit store, edit store theme, add store staff, activities in the OneShop menu, manage orders, reports, store activities log, include menu categories, process enquiries, requests and view store reviews. Store owners may include their store logo and other pictures. When the user proceeds with editing the user’s store, he/she can include information about the store, store policies, and cancellation policy. Upon completion of these steps you are ready to start selling your products and services.
    </p>


    <p>

    We wish you the best success with your new store!
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
