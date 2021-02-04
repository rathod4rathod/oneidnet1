<?php
$this->load->module('templates');
$this->templates->header();
$this->templates->onenet_header("packages");
?>
<div class="clr">&nbsp;</div>
<div class="new_wrapper">
    <div class="ondes_wrapper_main">
        <div class="ondes_module_container_wrap">
            <!--module_container start here-->
            <div class="ondes_wrapper_inner minheight600">
                <!--wrapper inner start here-->
                <div class="oneshop_getstarted mat30">
                    <div class="oneshop_getstarted_bgwrap mat40 mab30" style="position:relative; margin-top:-5%;">
                        <h1 class="acenter normal fs24" style="width:auto; border-bottom:1px #ccc solid; text-align: center; padding:0 0 10px 0; margin:30px auto; line-height:32px;"> ONE NETWORK PACKAGES </h1>
                        <section id="pricePlans">
                            <ul id="plans">       
                                <li class="plan">
                                    <ul class="planContainer">
                                        <a href="<?php echo  base_url().'oneshopinfo'; ?>"><li class="title">
                                                <h2 class="bestPlanTitle" style="background:#ffcc00;">
                                                    <p><img src="<?php echo base_url() . 'assets/images/moduleIcons/oneshop.png'; ?>" width="50" height="45"></p> 
                                                    <p style="margin:10px 0 0 0"> ONESHOP </p>
                                                    <!--<p style="margin-top:15px;"><img class="testi_img" src="<?php echo base_url() . 'assets/images/avatar-1.jpg'; ?>"></p>-->
                                                </h2>
                                            </li></a>
                                        <li class="price">
                                            <p class="bestPlanPrice">  </p>
                                        </li>

                                        <li> <a href="<?PHP echo base_url() . 'os_package'; ?>" class="pricingaction"> OPEN STORE </a>
                                            <!--<a href="<?PHP echo base_url() . 'os_package'; ?>" class="pricingaction"> OPEN MALL </a>-->
                                        </li>
                                    </ul>
                                </li>

                                <li class="plan">
                                    <ul class="planContainer">
                                    <a href="<?php echo base_url()."coofficeinfo"; ?>"> <li class="title">
                                            <h2 class="bestPlanTitle" style="background:#565656;"> 
                                                <p><img src="<?php echo base_url() . 'assets/images/moduleIcons/cooffice.png'; ?>" width="50" height="45"></p> 
                                                <p style="margin:10px 0 0 0"> CO - OFFICE </p>
                                                <!--<p style="margin-top:15px;"><img class="testi_img" src="<?php echo base_url() . 'assets/images/avatar-3.jpg'; ?>"></p>-->
                                            </h2>
                                        </li></a>
                                        <li class="price">
                                            <p class="bestPlanPrice">  </p>
                                        </li>

                                        <li>
                                            <!--<a href="#" class="pricingaction"> READMORE </a>--> 
                                            <a href="<?PHP echo base_url() . 'os_package/copackages'; ?>" class="pricingaction">  REGISTER YOUR COMPANY </a> </li>
                                    </ul>
                                </li>

                            </ul>
                            <!-- End ul#plans -->
                        </section>
                    </div>
                </div>
            </div>
            <!--wrapper inner closed here-->
        </div>
        <!--module container end here-->
    </div>
    <!--wrapper main closed here-->

    <?php $this->templates->right_container(); ?>
</div>
<!--module container end here-->
<?php
$this->templates->footer();
?>
