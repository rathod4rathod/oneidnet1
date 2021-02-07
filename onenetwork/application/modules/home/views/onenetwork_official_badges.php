<?php
$this->load->module('templates');
$this->templates->header();
$this->templates->onenet_header();
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
                        <h1 class="normal fs24" style="width:880px; border-bottom:1px #ccc solid; padding:0 0 10px 0; margin:0 auto; line-height:32px;"> Buzzin Official Badge </h1>
                        <div style="width:880px; padding:0 0 5px 0; margin:20px 0 0 0; line-height:24px;" class="bold borderbottom">
                            <span> <a href="#"> Promotions </a> &nbsp;&nbsp;&gt;&nbsp;&nbsp; </span> <span> <a href="#"> Tunnel </a> &nbsp;&nbsp;&gt;&nbsp;&nbsp; </span>
                            <span> <a href="#"> Category </a> &nbsp;&nbsp;&gt;&nbsp;&nbsp;</span> <span> <a href="#"> Channel </a></span>
                        </div>
                        <p class="fs18 fll mat30 bgcolor3 wi100pstg"> <span class="fll"> <img  src="<?PHP echo base_url() . 'assets/images/next.png'; ?>" width="22" height="22"> </span> <span class="fll mal10"> Complete your Compaign </span>  </p>
                        <?php if ($officialbadgedata[0]['rec_aid'] == 0) { ?>
                            <div class="mat20 fll" style="width:500px;">
                                <div class="click_tabs_wrap">
                                    <ul id="tabs">
                                        <li><a id="current" name="#tab1" class="oneiddev_budbase" href="<?PHP echo base_url() . 'budget_page' ?>" name="#tab1"> 1 </a> <p style="float:left; font-weight:bold; padding:0 0 0 0; margin:65px 0px 10px -85px;"> BASIC INFORMATION </p> </li>
                                        <li><a href="" name="#tab3" id="oneiddev_budthrd"> 2 </a> <p style="float:left; font-weight:bold; padding:0 0 0 0; margin:65px 0 10px -50px;"> PAYMENT</p>   </li>
                                    </ul>
                                </div>
                                <div id="content">
                                    <div style="display: block; margin-left:80px;" id="tab1">
                                        <p class="bold fs12 mat20">  BASIC INFORMATION  </p>
                                        <div class="basic_info">
                                            <div class="mab10 mat10 form_width">
                                                <p class="label_name"> Popularity Type </p>
                                                <p>
                                                    <select name="onenetwork_popularity_type" id="onenetwork_popularity_type" class="flight_searchfield_adult_and_childcontainer" onchange="removeerror(this.id)">
                                                        <option value="">select</option>
                                                        <option value="NATIONAL">NATIONAL</option>
                                                        <option value="INTERNATIONAL">INTERNATIONAL</option>
                                                    </select>
                                                </p>
                                            </div>
                                            <div class="mab10 mat10 form_width">
                                                <p class="label_name"> Work Known for </p>
                                                <p>     <select name="onenetwork_field_of_popularity" id="onenetwork_field_of_popularity" class="flight_searchfield_adult_and_childcontainer" onchange="removeerror(this.id)">
                                                        <option value="">select</option>
                                                        <option value="Actor/Director">Actor/Director</option>
                                                        <option value="Artist">Artist</option>
                                                        <option value="Athlete">Athlete</option>
                                                        <option value="Author">Author</option>
                                                        <option value="Business Person">Business Person</option>
                                                        <option value="Chef">Chef</option>
                                                        <option value="Coach">Coach</option>
                                                        <option value="Comedian">Comedian</option>
                                                        <option value="Dancer">Dancer</option>
                                                        <option value="Doctor">Doctor</option>
                                                        <option value="Editor">Editor</option>
                                                        <option value="Government Official">Government Official</option>
                                                        <option value="Journalist">Journalist</option>
                                                        <option value="Lawyer">Lawyer</option>
                                                        <option value="Monarch">Monarch</option>
                                                        <option value="Musician/Band">Musician/Band</option>
                                                        <option value="News Personality">News Personality</option>
                                                        <option value="photographer">photographer</option>
                                                        <option value="Politician">Politician</option>
                                                        <option value="Producer">Producer</option>
                                                        <option value="Teacher">Teacher</option>
                                                        <option value="Writer">Writer</option>
                                                    </select>
                                                </p>
                                            </div>
                                            <div class=" mab10 mat10 form_width">
                                                <p class="label_name mat20 fll"> Screen Name </p>
                                                <p> <input type="text" class="oneshop_productfield_textbox" name="onenetwork_screenname" id="onenetwork_screenname" onfocus="removeerror(this.id)"> </p>
                                            </div>
                                            <div class=" mab10 mat10 form_width">
                                                <p class="label_name mat20 fll"> Description </p>
                                                <p> <input type="text" class="oneshop_productfield_textbox" name="onenetwork_description" id="onenetwork_description" onfocus="removeerror(this.id)"> </p>
                                            </div>
                                            <div class=" mab10 mat10 form_width">
                                                <p class="label_name mat20 fll"> Website </p>
                                                <p> <input type="text" class="oneshop_productfield_textbox" name="onenetwork_website" id="onenetwork_website" onfocus="removeerror(this.id)" > </p>
                                            </div>
                                            <div class=" mab10 mat10 form_width">
                                                <p class="label_name mat20 fll"> Official Emailid </p>
                                                <p> <input type="text" class="oneshop_productfield_textbox" name="onenetwork_emailid" id="onenetwork_emailid" onfocus="removeerror(this.id)" > </p>
                                            </div>
                                            <div class=" mab10 mat10 form_width">
                                                <p class="label_name mat20 fll"> Official Mobile Number </p>
                                                <p> <input type="text" class="oneshop_productfield_textbox" name="onenetwork_mobileno" id="onenetwork_mobileno" onfocus="removeerror(this.id)" maxlength="15"> </p>
                                            </div>
                                            <div class=" mab10 mat10 form_width">
                                                <p class="label_name mat20 fll"> Address Line1</p>
                                                <p> <input type="text" class="oneshop_productfield_textbox" name="onenetwork_addressline1" id="onenetwork_addressline1" onfocus="removeerror(this.id)" maxlength="80"> </p>
                                            </div>
                                            <div class=" mab10 mat10 form_width">
                                                <p class="label_name mat20 fll"> Address Line2 </p>
                                                <p> <input type="text" class="oneshop_productfield_textbox" name="onenetwork_addressline2" id="onenetwork_addressline2" onfocus="removeerror(this.id)" maxlength="80"> </p>
                                            </div>
                                            <div class="mab10 mat10 form_width">
                                                <p class="label_name"> Country </p>
                                                <p>
                                                    <select name="onenetwork_countries" id="onenetwork_countries"  class="flight_searchfield_adult_and_childcontainer" onchange="removeerror(this.id)">
                                                        <option value="">select country</option>
                                                        <?php foreach ($countriesList as $countrydata) { ?>
                                                            <option value="<?php echo $countrydata[country_id]; ?>"><?php echo $countrydata['country_name']; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </p>
                                            </div>
                                            <div class="mab10 mat10 form_width">
                                                <p class="label_name"> State </p>
                                                <p>
                                                    <select name="onenetwork_states" id="onenetwork_states" class="flight_searchfield_adult_and_childcontainer" onchange="removeerror(this.id)">
                                                        <option value="">select state</option>
                                                    </select>
                                                </p>
                                            </div>
                                            <div class="mab10 mat10 form_width">
                                                <p class="label_name"> City</p>
                                                <p>
                                                    <select name="onenetwork_cities" id="onenetwork_cities" class="flight_searchfield_adult_and_childcontainer" onchange="removeerror(this.id)">
                                                        <option value="">select city</option>
                                                    </select>
                                                </p>
                                            </div>
                                            <div class="fll  form_width">
                                                <p class="label_name"> Zipcode </p>
                                                <p> <input type="text" class="oneshop_productfield_textbox" name="onenetwork_zipcode" id="onenetwork_zipcode" onfocus="removeerror(this.id)"> </p>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="mat20 mar10"> <input type="button" value="NEXT" class="np_des_checkout_btn" name="button" id="onenetwork_official_badgesubmit">  </div>
                                    </div>
                                    <div  id="tab3">
                                        <p class="bold fs12 mat20" style="margin-left:50px;">   CONFIRM COMPAIGN DETAILS </p>
                                        <div class="details">
                                            <div class="details_left_nox">
                                                <div class="fll mab10 mat10 form_width_cards_new">
                                                    <p class="label_name"> <strong>Age</strong> </p>
                                                    <p> 15-30 Years</p>
                                                </div>
                                                <div class="fll mab10 mat10 form_width_cards_new">
                                                    <p class="label_name"> <strong>Age</strong> </p>
                                                    <p> 15-30 Years</p>
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
                                                <div class="amount_msg"> The domain lpsum.com may be for sale. Click here to make an offer may be for sale. Click here to make an offer or call 877-588-1085 to speak with one of our domain experts. You have to <span class="red bold"> Pay INR 2,000/- </span> towards ONEIDNET account. </div>
                                                <div class="amount_msg_clarity">Are you ready to pay? <span class="red bold"> Pay INR 2,000/- </span></div>
                                                <div class="clearfix"></div>
                                                <div class="amount_msg_buttons"> <a href="yes_page.html"><button name=" " class="button_new_payeebtn" value="YES" type="button">YES</button></a>
                                                    <button name=" " class="button_new_payeebtn" value="NO" type="button">NO</button>
                                                </div>
                                            </div>
                                        </div>
                                        <p class="bold fs12 mat30 fll" style="margin-left:0px;">   CONFIRM COMPAIGN DETAILS </p>
                                        <div class="onenetwork_homepage_right_box_payment">
                                            <div class="fll mab10 mat10 form_width">
                                                <p class="label_name"> Choose Card </p>
                                                <p> <select name="privacy" class="flight_searchfield_adult_and_childcontainer">
                                                        <option value="">New Card</option>
                                                    </select> </p>
                                            </div>
                                            <div class="cards_here">
                                                <div class="card_left">
                                                    <div class="fll mab10 mat10 form_width_cards">
                                                        <p class="label_name"> <strong>Card Number</strong> </p>
                                                        <p> XXXX XXXX XXXX XXXX</p>
                                                    </div>
                                                    <div class="fll mab10 mat10 form_width_cards">
                                                        <p class="label_name"> <strong>Usage Type</strong> </p>
                                                        <p> INR</p>
                                                    </div>
                                                </div>
                                                <div class="card_right">
                                                    <div class="fll mab10 mat10 form_width_cards">
                                                        <p class="label_name"> <strong>Card Number</strong> </p>
                                                        <p> XXXX XXXX XXXX XXXX</p>
                                                    </div>
                                                    <div class="fll mab10 mat10 form_width_cards">
                                                        <p class="label_name"> <strong>Usage Type</strong> </p>
                                                        <p> INR</p>
                                                    </div>
                                                </div>
                                                <div class="clearfix"></div>
                                                <div class="button_right clearfix fll">
                                                    <button name=" " class="button_new2 clearfix flr" value="Confirm" type="button">Confirm</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="onedev_content" class="hotel_pachagesummary_box mab10 mat40 fll">
                                <div id="tab1right">
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
                                    </ul>
                                </div>
                                <div class="details_agebetween_box mab10 fll" id="tab2right" style="display:none">
                                    <p class="bold fs12 mab30">  ODIYANS MONITOR  </p>
                                    <div class="details_agebetween_loadingbox">
                                        <div class="normal wi100pstg fs12"> People with Age between 30 - 500 </div>
                                        <div class="details_agebetween_loadingbox_leftone">&nbsp;</div>
                                        <div class="details_agebetween_loadingbox_lefttwobox">&nbsp;</div>
                                        <div class="details_agebetween_loadingbox_rightbox_count"> <div class="fll oneshop_overview_countbox mar10"> 321 </div><div class="fs12 mat5"> Out Of </div> <div> 3500 </div> </div>
                                    </div>
                                    <div class="details_agebetween_loadingbox">
                                        <div class="normal wi100pstg fs12"> People with Age between 30 - 500 </div>
                                        <div class="details_agebetween_loadingbox_leftone">&nbsp;</div>
                                        <div class="details_agebetween_loadingbox_lefttwobox">&nbsp;</div>
                                        <div class="details_agebetween_loadingbox_rightbox_count"> <div class="fll oneshop_overview_countbox mar10"> 321 </div><div class="fs12 mat5"> Out Of </div> <div> 3500 </div> </div>
                                    </div>
                                    <div class="details_agebetween_loadingbox">
                                        <div class="normal wi100pstg fs12"> People with Age between 30 - 500 </div>
                                        <div class="details_agebetween_loadingbox_leftone">&nbsp;</div>
                                        <div class="details_agebetween_loadingbox_lefttwobox">&nbsp;</div>
                                        <div class="details_agebetween_loadingbox_rightbox_count"> <div class="fll oneshop_overview_countbox mar10"> 321 </div><div class="fs12 mat5"> Out Of </div> <div> 3500 Specified </div> </div>
                                    </div>
                                    <div class="details_agebetween_grapgbg">
                                        <div class="grapgbg_image"> <img src="<?php echo base_url() . 'assets/images/gr.jpg' ?>"></div>
                                        <div class="grapgbg_content">
                                            <span class="fs18 bold"> 30% of 1002 </span>
                                            <span class="fs18 mat10 fll bold"> 2000k Out of 300 </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } else {
                            echo "Your already register";
                        } ?>
                    </div>
                </div>
            </div>
            <!--wrapper inner closed here-->
        </div>
        <!--module container end here-->
    </div>
    <!--wrapper main closed here-->
    <?php
    $this->templates->right_container();
    ?>
</div>


<div class="clr"></div>

<!--footer start here-->
<?php
$this->templates->footer();
?>

<!--footer closed here-->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/tab.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/microjs/tunnelchannel.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/microjs/officialbadge.js"></script>

