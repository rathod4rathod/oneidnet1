<?php
$this->load->module('templates');
$this->templates->header();
?>
<div class="click_popUp" id="os_popup">
</div>    <?php
$this->templates->onenet_header();
?>

<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/jquery-ui.css"> 
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-ui.js"></script>

<div class="clr">&nbsp;</div>
<div class="new_wrapper">
    <div class="ondes_wrapper_main">
        <div class="ondes_module_container_wrap">
            <!--module_container start here-->
            <div class="ondes_wrapper_inner minheight600">
                <!--wrapper inner start here-->
                <div class="oneshop_getstarted mat30">
                    <div class="oneshop_getstarted_bgwrap mat40 mab30" style="position:relative; margin-top:-5%;">
                        <h1 class="normal fs24" style="width:880px; border-bottom:1px #ccc solid; padding:0 0 10px 0; margin:0 auto; line-height:32px;">Buzzin Qpics Promotion </h1>
                        <div style="width:880px; padding:0 0 5px 0; margin:20px 0 0 0; line-height:24px;" class="bold borderbottom"> 
                            <span> <a href="#"> Promotions </a> &nbsp;&nbsp;&gt;&nbsp;&nbsp; </span> <span> <a href="#"> Tunnel </a> &nbsp;&nbsp;&gt;&nbsp;&nbsp; </span> 
                            <span> <a href="#"> Category </a> &nbsp;&nbsp;&gt;&nbsp;&nbsp;</span> <span> <a href="#"> Channel </a></span>
                        </div>
                        <p class="fs18 fll mat30 bgcolor3 wi100pstg"> <span class="fll"> <img  src="<?PHP echo base_url() . 'assets/images/next.png'; ?>" width="22" height="22"> </span> <span class="fll mal10"> Complete your Compaign </span>  </p>
                        <div class="mat20 fll" style="width:500px;">
                            <div class="click_tabs_wrap"> 
                                <ul id="tabs">
                                    <li><a id="current" name="#tab1" class="oneiddev_budbase" href="<?PHP echo base_url() . 'budget_page' ?>" name="#tab1"> 1 </a> <p style="float:left; font-weight:bold; padding:0 0 0 0; margin:65px 0px 10px -85px;"> BASIC INFORMATION </p> </li>
                                    <li><a href="" name="#tab2" id="oneiddev_budthrd"> 2 </a> <p style="float:left; font-weight:bold; padding:0 0 0 0; margin:65px 0 10px -50px;"> PAYMENT</p>   </li>
                                </ul>
                            </div>
                            <div id="content">
                                <div style="display: block; margin-left:80px;" id="tab1">
                                    <p class="bold fs12 mat20">  BASIC INFORMATION  </p>
                                    <input type="hidden" id="buzz_oneidev" name="buzz_oneidev" >
                                    <div class="basic_info">
                                        <div class=" mab10 mat10 form_width">
                                            <p class="label_name mat20 fll"> Promotion Name </p>
                                            <p> <input type="text" class="oneshop_productfield_textbox" id="buzz_pr_name" name="buzz_pr_name" onclick="removeerror(this.id)"> </p>
                                                <input type="hidden" class="oneshop_productfield_textbox" value="BUZZIN_QVIDS"  id="promotiontype" >

                                        </div>
                                        <div class=" mab10 mat10 form_width">
                                            <p class="label_name mat20 fll"> Promotion Abstract </p>
                                            <p> <textarea type="text" class="oneshop_productfield_textbox" id="buzz_pr_abs" name="buzz_pr_abs" onclick="removeerror(this.id)"></textarea></p>
                                        </div>
                                        <div class="mab10 mat10 form_width">
                                            <p class="label_name"> Competition Type </p>
                                            <p> <input type="hidden" placeholder="BUZZIN_QVIDS" class="oneshop_productfield_textbox" id="oneBuzz_compt" name="oneBuzz_compt" onclick="removeerror(this.id)"></p>
                                        </div>
                                        <div class="mab10 mat10 form_width">
                                            <p class="label_name"> Choose Competition Theme Pic</p>
                                            <p> <select name="onenetwork_channels" id="oneBuzz_theme" name="oneBuzz_theme" class="flight_searchfield_adult_and_childcontainer" onchange="removeerror(this.id)">
                                                    <option value="">Select Quick video</option>
                                                    <option value="FUNNIEST">Funniest</option>
                                                    <option value="EMOTIONAL">Emotional</option>
                                                    <option value="Documentary">Documentary</option>
                                                    <option value="SCIENCE FRICTION">Science Friction</option>
                                                    <option value="STRATEGY">Strategy</option>
                                                    <option value="CULTURAL">Cultural</option>
                                                    <option value="DANCE">Dance</option>
                                                    <option value="SHOWS">Shows</option>
                                                    <option value="GAMES">Games</option>
                                                    <option value="NATURE">Nature</option>
                                                    <option value="AWARENESS">Awareness</option>
                                                    <option value="INSPIRATION">Inspiration</option>
                                                    <option value="INVENTIONS">Inventions</option>
                                                    <option value="IDEAS">Ideas</option>
                                                    <option value="POLITICS">Politics</option>
                                                    <option value="FASHION">Fashion</option>
                                                    <option value="PROMO">Promo</option>
                                                    <option value="BEAUTY">Beauty</option>
                                                    <option value="LANDSCAPE">Landscape</option>
                                                    <option value="COMPILATIONS">Compilations</option>
                                                    <option value="WILDLIFE">Wildlife</option>
                                                    <option value="WEDDING">Wedding</option>
                                                    <option value="PLACES">Places</option>
                                                </select> </p>
                                        </div>
                                        <div class="mab10 mat10 form_width">
                                            <div  id="buzzin_devpic" style="margin:10px;height:210px;">
                                                <?php
                                                $this->load->module('home');
                                                $this->home->buzzinQuickvids();
                                                ?>
                                            </div>
                                        </div>
                                        
                                    </div> 
                                    <div class="clearfix"></div>
                                    <div class="mat20 mar10"> <input type="button" value="NEXT" class="np_des_checkout_btn quick_pic_cr" name="button">  </div>
                                </div>
                                <div  id="tab2">
                                    <p class="bold fs12 mat20" style="margin-left:50px;">   CONFIRM COMPAIGN DETAILS </p>
                                    <div class="details">
                                        <div class="details_left_nox">
                                            <div class="fll mab10 mat10 form_width_cards_new">
                <p class="label_name"> <strong>Promotion Name</strong> </p>
                <p id="PromotionName"></p>
            </div>
            <div class="fll mab10 mat10 form_width_cards_new">
                <p class="label_name"> <strong>Promotion Abstract </strong> </p>
                <p id="PromotionAbstract"></p>
            </div>
            <div class="fll mab10 mat10 form_width_cards_new">
                <p class="label_name"> <strong>Competition Snap </strong> </p>
                <p id="ChooseCompetitionSnap"></p>
            </div>
            
                                        </div>
                                        <div class="details_newtextarea_box">
                                            <div class="fll mab10 mat10 form_width_cards">
                                                <p class="label_name fs18"> <strong>Places</strong> </p>
                                            </div>
                                            <div class="place_remove">
                                                <span class="place_name"> Hyderabad </span>
                                                <span class="place_name_remove_new">X</span>
                                            </div>
                                            <div class="place_remove">
                                                <span class="place_name"> Delhi </span>
                                                <span class="place_name_remove_new">X</span>
                                            </div>
                                            <div class="place_remove">
                                                <span class="place_name"> Karnataka </span>
                                                <span class="place_name_remove_new">X</span>
                                            </div>
                                            <div class="place_remove">
                                                <span class="place_name"> Hyderabad </span>
                                                <span class="place_name_remove_new">X</span>
                                            </div>
                                            <div class="place_remove">
                                                <span class="place_name">India</span>
                                                <span class="place_name_remove_new">X</span>
                                            </div>
                                        </div>
                                        <div class="details_newtextarea_box">
                                            <div class="fll mab10 mat10 form_width_cards">
                                                <p class="label_name fs18"> <strong>Places</strong> </p>
                                            </div>
                                            <div class="place_remove">
                                                <span class="place_name"> Hyderabad </span>
                                                <span class="place_name_remove_new">X</span>
                                            </div>
                                            <div class="place_remove">
                                                <span class="place_name"> Delhi </span>
                                                <span class="place_name_remove_new">X</span>
                                            </div>
                                            <div class="place_remove">
                                                <span class="place_name"> Karnataka </span>
                                                <span class="place_name_remove_new">X</span>
                                            </div>
                                            <div class="place_remove">
                                                <span class="place_name"> Hyderabad </span>
                                                <span class="place_name_remove_new">X</span>
                                            </div>
                                            <div class="place_remove">
                                                <span class="place_name">India</span>
                                                <span class="place_name_remove_new">X</span>
                                            </div>
                                        </div>
                                        <div class="onenetwork_homepage_payeenewbox mat30">
                                            <div class="amount_msg"> The domain lpsum.com may be for sale. Click here to make an offer may be for sale. Click here to make an offer or call 877-588-1085 to speak with one of our domain experts. You have to <span class="red bold red_bold"></span> towards ONEIDNET account. </div>
                                            <div class="amount_msg_clarity">Are you ready to pay? <span class="red bold red_bold"></span></div>
                                            <div class="clearfix"></div>
                                            <div class="amount_msg_buttons">   
                                                <button name=" " class="button_new_payeebtn" value="YES" type="button" id="buzzzinPaymentYes">YES</button>
                                                <button name=" " class="button_new_payeebtn" value="NO" type="button">NO</button>
                                            </div>
                                        </div>
                                    </div>
                                      <input type="hidden" id="total_price" value="">
                                </div>
                            </div>
                        </div>   
                        <div id="onedev_content" class="hotel_pachagesummary_box mab10 mat40 fll">
<!--                            <div id="tab1right">
                                <p class="bgcolor3 bold fs14"> Quick Links ! </p>
                                <ul>
                                    <li><p class="fll mat3 mar5"> <img width="10" height="14" src="<?php echo base_url() . "assets/images/downarrow2.png"; ?>"> </p> Initiated Yet. </li>
                                    <li><p class="fll mat3 mar5"> <img width="10" height="14" src="<?php echo base_url() . "assets/images/downarrow2.png"; ?>"> </p> This Shipment. </li>
                                    <li><p class="fll mat3 mar5"> <img width="10" height="14" src="<?php echo base_url() . "assets/images/downarrow2.png"; ?>"> </p> Hasn't Initiated Yet. </li>
                                    <li><p class="fll mat3 mar5"> <img width="10" height="14" src="<?php echo base_url() . "assets/images/downarrow2.png"; ?>"> </p> This Shipment Initiated Yet. </li>
                                    <li><p class="fll mat3 mar5"> <img width="10" height="14" src="<?php echo base_url() . "assets/images/downarrow2.png"; ?>"> </p> Shipment hasn't Initiated Yet. </li>
                                    <li><p class="fll mat3 mar5"> <img width="10" height="14" src="<?php echo base_url() . "assets/images/downarrow2.png"; ?>"> </p> This Shipment. </li>
                                    <li><p class="fll mat3 mar5"> <img width="10" height="14" src="<?php echo base_url() . "assets/images/downarrow2.png"; ?>"> </p> Hasn't Initiated Yet. </li>
                                    <li><p class="fll mat3 mar5"> <img width="10" height="14" src="<?php echo base_url() . "assets/images/downarrow2.png"; ?>"> </p> This Shipment Initiated Yet. </li>
                                    <li><p class="fll mat3 mar5"> <img width="10" height="14" src="<?php echo base_url() . "assets/images/downarrow2.png"; ?>"> </p> Shipment hasn't Initiated Yet. </li>
                                    <li><p class="fll mat3 mar5"> <img width="10" height="14" src="<?php echo base_url() . "assets/images/downarrow2.png"; ?>"> </p> This Shipment. </li>
                                    <li><p class="fll mat3 mar5"> <img width="10" height="14" src="<?php echo base_url() . "assets/images/downarrow2.png"; ?>"> </p> Hasn't Initiated Yet. </li>
                                    <li><p class="fll mat3 mar5"> <img width="10" height="14" src="<?php echo base_url() . "assets/images/downarrow2.png"; ?>"> </p> This Shipment Initiated Yet. </li>
                                    <li><p class="fll mat3 mar5"> <img width="10" height="14" src="<?php echo base_url() . "assets/images/downarrow2.png"; ?>"> </p> Shipment hasn't Initiated Yet. </li>
                                </ul>-->
                            </div> 
                        </div>
                    </div>
                </div>
            </div>            <!--wrapper inner closed here-->
        </div>        <!--module container end here-->
    </div>    <!--wrapper main closed here-->
    <?php $this->templates->right_container(); ?>
</div>
<div class="clr"></div>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/microjs/buzzinPromotion.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/microjs/promotionPayment.js"></script>
