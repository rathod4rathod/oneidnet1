<?php
$this->load->module('templates');
$this->templates->header();
$this->templates->onenet_header("promotions");
?>
<script>
    /*var url = "http://" + window.location.hostname + "/onenetwork/promotions/generic_basicform/";
     $(document).on('click', '.basic_string', function () {
     var generic_str =$(this).attr('id');
     
     $.ajax({
     url: url,
     type: 'POST',
     data: {generic_str: generic_str},
     success: function (data) {
     alert(data);
     }
     });
     
     })*/</script>

<div class="new_wrapper">
    <div class="ondes_wrapper_main">
        <div class="ondes_module_container_wrap">
            <!--module_container start here-->
            <div class="ondes_wrapper_inner minheight600">
                <!--wrapper inner start here-->
                <div class="oneshop_getstarted mat30">
                    <div class="oneshop_getstarted_bgwrap mat40 mab30" style="position:relative; margin-top:-5%;">
                        <h1 class="acenter normal fs24" style="width:auto; border-bottom:1px #ccc solid; text-align: center; padding:0 0 10px 0; margin:30px auto; line-height:32px;"> ONE NETWORK PROMOTIONS </h1>
                        <div class="oneshop_getstarted_bg_one">
                            <div class="oneshop_getstarted_newbox">
                                <div class="oneshop_getstarted_newbox_imgleft">
                                    <a href="<?php echo base_url() . 'oneshopinfo'; ?>"><img src="<?php echo base_url() . 'assets/images/back/oneshop.png'; ?>"></a>
                                </div>
                                <div class="oneshop_getstarted_right_botvont_new">
                                    <a href="<?php echo base_url() . 'oneshopinfo'; ?>"><h2 style="color:#C5B000;"> ONESHOP </h2></a>
                                    <div class="custommarketing_connewbox">
                                        <ul>

                                            <li><a href="<?php echo base_url() . 'promotions/oneshopProductPromotions'; ?>">Product Promotion</a> </li>
                                            <li><a href="<?php echo base_url() . 'promotions/oneshopstorePromotions'; ?>">Store Promotion</a> </li>
                                            <!--<li><a href="#">Malls Promotion</a> </li>-->
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="oneshop_getstarted_newbox">
                                <div class="oneshop_getstarted_newbox_imgleft">
                                    <a href="<?php echo base_url() . 'tunnelinfo'; ?>"><img src="<?php echo base_url() . 'assets/images/back/tunnel.png'; ?>"></a>
                                </div>
                                <div class="oneshop_getstarted_right_botvont_new">
                                    <a href="<?php echo base_url() . 'tunnelinfo'; ?>"><h2 style="color:#D20001;"> Tunnel </h2></a>
                                    <div class="custommarketing_connewbox">
                                        <ul>
                                            <li> <a href="<?php echo base_url() . 'promotions/tunnelChannelPromotion'; ?>" >Tunnel Promotion</a> </li>
                                            <li> <a href="<?php echo base_url() . 'promotions/tunnelVideoPromotion'; ?>" >Video Promotion</a> </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
<!--                            <div class="oneshop_getstarted_newbox">
                                <div class="oneshop_getstarted_newbox_imgleft">
                                    <a href="<?php echo base_url() . 'traveltimeinfo'; ?>"><img src="<?php echo base_url() . 'assets/images/back/traveltime.png'; ?>"></a>
                                </div>
                                <div class="oneshop_getstarted_right_botvont_new">
                                    <a href="<?php echo base_url() . 'traveltimeinfo'; ?>"><h2 style="color:#0F7E00;"> TravelTime </h2></a>
                                    <div class="custommarketing_connewbox">
                                        <ul>

                                            <li><a href="#">Tour Package Promotion</a> </li>

                                        </ul>
                                    </div>
                                </div>
                            </div>-->
                            <div class="oneshop_getstarted_newbox">
                                <div class="oneshop_getstarted_newbox_imgleft">
                                    <a href="<?php echo base_url() . 'dealerxinfo'; ?>"><img src="<?php echo base_url() . 'assets/images/back/dealerx.png'; ?>"></a>
                                </div>
                                <div class="oneshop_getstarted_right_botvont_new">
                                    <a href="<?php echo base_url() . 'dealerxinfo'; ?>"><h2 style="color:#000000;"> DealerX </h2></a>
                                    <div class="custommarketing_connewbox">
                                        <ul>
                                            <li><a href="<?php echo base_url() . 'promotions/dealerxProfilePromotion'; ?>">Promote Your Dealers Profile</a> </li>
                                            <li><a href="<?php echo base_url() . 'promotions/dealerxAuctionPromotion'; ?>">Auction Promotion</a> </li>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="oneshop_getstarted_newbox">
                                <div class="oneshop_getstarted_newbox_imgleft">
                                    <a href="<?php echo base_url() . 'coofficeinfo'; ?>"><img src="<?php echo base_url() . 'assets/images/back/cooffice.png'; ?>"></a>
                                </div>
                                <div class="oneshop_getstarted_right_botvont_new">
                                    <a href="<?php echo base_url() . 'coofficeinfo'; ?>"><h2 style="color:#969696">Corporate Office </h2></a>
                                    <div class="custommarketing_connewbox">
                                        <ul>
                                            <li><a href="<?php echo base_url() . 'promotions/coffieCompanyPromotion'?> " >Company Profile Booster</a> </li>
                                            <li><a href="<?php echo base_url() . 'promotions/coffiejobPromotion'?>">Rocket Your Posted Jobs</a> </li>

                                        </ul>
                                    </div>
                                </div>
                            </div>
<!--                            <div class="oneshop_getstarted_newbox">
                                <div class="oneshop_getstarted_newbox_imgleft">
                                    <a href="<?php echo base_url() . 'isnewsinfo'; ?>"><img src="<?php echo base_url() . 'assets/images/back/isnews.png'; ?>"></a>
                                </div>
                                <div class="oneshop_getstarted_right_botvont_new">
                                    <a href="<?php echo base_url() . 'isnewsinfo'; ?>"><h2 style="color:#550000">I.S NEWS </h2></a>
                                    <div class="custommarketing_connewbox">
                                        <ul>
                                            <li><a href="#">Sponsored News</a> </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>-->
                            <div class="oneshop_getstarted_newbox">
                                <div class="oneshop_getstarted_newbox_imgleft">
                                    <a href="<?php echo base_url() . "clickinfo" ?>"><img src="<?php echo base_url() . 'assets/images/back/click.png'; ?>"></a>
                                </div>
                                <div class="oneshop_getstarted_right_botvont_new">
                                    <a href="<?php echo base_url() . 'clickinfo'; ?>"><h2 style="color:#7578AB">Click</h2></a>
                                    <div class="custommarketing_connewbox">
                                        <ul>
                                            <li><a href="<?php echo base_url() . 'promotions/pagePromotions'; ?>">Page Promotion</a> </li>
                                            <li><a href="<?php echo base_url() . 'promotions/groupPromotions'; ?>">Click Promotion</a> </li>
                                            <li><a href="<?php echo base_url() . 'promotions/eventPromotions'; ?>">Event Promotion</a> </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="oneshop_getstarted_newbox">
                                <div class="oneshop_getstarted_newbox_imgleft">
                                    <a href="<?php echo base_url() . 'buzzininfo'; ?>"><img src="<?php echo base_url() . 'assets/images/back/buzzin.png'; ?>"></a>
                                </div>
                                <div class="oneshop_getstarted_right_botvont_new">
                                    <a href="<?php echo base_url() . 'buzzininfo'; ?>"><h2 style="color:#00A3FE;">Buzzin </h2></a>
                                    <div class="custommarketing_connewbox">
                                        <ul>
<!--                                            <li><a href="<?php echo base_url() . 'snapCompitationpromotions'; ?>">Snappers Arena</a> </li>-->
<!--                                            <li><a href="<?php echo base_url() . 'videoCompitationpromoitions'; ?>">Video Arena</a> </li>-->
                                            <li><a href="<?php echo base_url() . 'vipPromotions'; ?>">Are You VIP?</a> </li>


                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="oneshop_getstarted_newbox">
                                <div class="oneshop_getstarted_newbox_imgleft">
                                    <a href="<?php echo base_url() . 'netproinfo'; ?>"><img src="<?php echo base_url() . 'assets/images/back/netpro.png'; ?>"></a>
                                </div>
                                <div class="oneshop_getstarted_right_botvont_new">
                                    <a href="<?php echo base_url() . 'netproinfo'; ?>"><h2 style="color:#61A0A0">NetPro </h2></a>
                                    <div class="custommarketing_connewbox">
                                        <ul>
                                            <li><a href="<?php echo base_url() . 'promotions/netproGroupPromotions'; ?>">Group Promotion</a> </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mat30">
                            <div class="fll leftbox">
                                <ul id="demo">
                                    <li>
                                        <p> “If your heart sets out to do good things, things will only get better.”
                                        <p style="margin:0 auto; text-align:center; padding:20px 0 0 0;">
                                            <img src="<?php echo base_url() . 'assets/images/avatar-1.jpg'; ?>" class="testi_img">
                                        <p class=""> Jaime Martinez </p>
                                        </p>
                                        </p>
                                    </li>
                                    <li>
                                        <p> TWO ipsum dolor sit amet, consectetur adipisicing elit. Quam totam nulla est, illo molestiae maxime officiis, quae ad, ipsum vitae deserunt molestias eius alias.
                                        <p style="margin:0 auto; text-align:center; padding:20px 0 0 0;">
                                            <img src="<?php echo base_url() . 'assets/images/avatar-2.jpg'; ?> " class="testi_img ">
                                        <p class=" "> Rickey Ponting </p>
                                        </p>
                                        </p>
                                    </li>
                                    <li> <p> Three ipsum dolor sit amet, consectetur adipisicing elit. Necessitatibus ea, perferendis error fuga temporibus. Unde omnis, consequuntur.
                                        <p style="margin:0 auto; text-align:center; padding:20px 0 0 0;">
                                            <img src="<?php echo base_url() . 'assets/images/avatar-3.jpg'; ?>" class="testi_img">
                                        <p class=""> Yuvraj Singh </p>


                                        </p>
                                    </li>
                                </ul>
                            </div>
                           
                        </div>
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
