<?php
$this->load->module('templates');
$this->templates->header();
$this->templates->onenet_header("promotions");
$total = $total_data[0]["cnt"];
?>
<script type="text/javascript" src="<?php echo base_url() . 'assets/js/jquery.tokenize.js' ?>"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'assets/css/jquery.tokenize.css' ?>">
<div class="clr">&nbsp;</div>
<div class="new_wrapper">
    <div class="ondes_wrapper_main">
        <div class="ondes_module_container_wrap"> <!--module_container start here-->            
            <div class="ondes_wrapper_inner minheight600"> <!--wrapper inner start here-->                
                <div class="oneshop_getstarted mat30">
                    <div class="oneshop_getstarted_bgwrap mat40 mab30" style="position:relative; margin-top:-5%;">
                        <h1 class="normal fs24" style="width:880px; border-bottom:1px #ccc solid; padding:0 0 10px 0; margin:0 auto; line-height:32px;"> Oneshop Store Promotion </h1>
                        <div style="width:880px; padding:0 0 5px 0; margin:20px 0 0 0; line-height:24px;" class="bold borderbottom"> 
                            <span> <a href="#"> Promotions </a> &nbsp;&nbsp;&gt;&nbsp;&nbsp; </span> <span> <a href="#"> Oneshop </a> &nbsp;&nbsp;&gt;&nbsp;&nbsp; </span> 
                            <span> <a href="#"> Category </a> &nbsp;&nbsp;&gt;&nbsp;&nbsp;</span> <span> <a href="#"> Stores </a></span>
                        </div>
                        <p class="fs18 fll mat30 bgcolor3 wi100pstg"> <span class="fll"> <img  src="<?PHP echo base_url() . 'assets/images/next.png'; ?>" width="22" height="22"> </span> <span class="fll mal10"> Complete your Compaign </span>  </p>
                        <div class="mat20 fll" style="width:500px;">
                            <div class="click_tabs_wrap"> 
                                <ul id="tabs">
                                    <li><a id="current" name="#tab1" class="oneiddev_budbase" href="<?PHP echo base_url() . 'budget_page' ?>" name="#tab1"> 1 </a> <p style="float:left; font-weight:bold; padding:0 0 0 0; margin:65px 0px 10px -85px;"> BASIC INFORMATION </p> </li>
                                    <li><a href="#" name="#tab2" id="oneiddev_budsec"> 2 </a> <p style="float:left; font-weight:bold; padding:0 0 0 0; margin:65px 0 10px -70px;"> AUDIENCE LAB </p>  </li>
                                    <li><a href="" name="#tab3" id="oneiddev_budthrd"> 3 </a> <p style="float:left; font-weight:bold; padding:0 0 0 0; margin:65px 0 10px -50px;"> PAYMENT</p>   </li>
                                </ul>
                            </div>
                            <div id="content">
                                <div style="display: block; margin-left:80px;" id="tab1">
                                    <p class="bold fs12 mat20">  BASIC INFORMATION  </p>
                                    <div class="basic_info">
                                        <div class="mab10 mat10 form_width">
                                            <p class="label_name"> Choose Store </p>
                                            <p> <select name="privacy" class="flight_searchfield_adult_and_childcontainer">
                                                    <option value="">Store1</option>
                                                    <option value="Public">Store2</option>
                                                    <option value="Private">Store3</option>
                                                </select> </p>
                                        </div>
                                        <div class=" mab10 mat10 form_width">
                                            <p class="label_name mat20 fll"> Campaign Name </p>
                                            <p> <input type="text" class="oneshop_productfield_textbox"> </p>
                                        </div>
                                        <div class=" mab10 mat10 form_width">
                                            <p class="label_name label_heading"><strong> Duration </strong></p>
                                            <div class="form_width_half">
                                                <p class="label_name"> Start  </p>
                                                <p> <input type="text" class="oneshop_productfield_textbox_date"> </p>
                                            </div>
                                            <div class="form_width_half1">
                                                <p class="label_name"> End  </p>
                                                <p> <input type="text" class="oneshop_productfield_textbox_date"> </p>
                                            </div>
                                        </div>
                                        <div class="fll  form_width">
                                            <p class="label_name"> Total Budget </p>
                                            <p> <input type="text" class="oneshop_productfield_textbox"> </p>
                                        </div>
                                        <div class=" form_width">
                                            <p class="label_name fll"> Total days </p>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="mat20 mar10"> <input type="button" value="NEXT" class="np_des_checkout_btn" name="button">  </div>
                                </div>
                                <div style="margin-left:80px;" id="tab2" class="audience_div">
                                    <input type="hidden" id="hinterests_val" value=""/>
                                    <input type="hidden" id="hlanguages_val" value=""/>
                                    <input type="hidden" id="hpages_val" value=""/>
                                    <input type="hidden" id="hnationality_val" value=""/>
                                    <p class="bold fs12 mat20">  AUDIENCE LAB  </p>
                                    <div class="audience_lab">
                                        <div class="fll form_width">
                                            <p class="label_name"> Age </p>
                                            <p> <select name="privacy" class="flight_searchfield_adult_and_childcontainer" id="age">
                                                    <option value=""></option>
                                                    <option value="15-20">15-20</option>
                                                    <option value="20-35">20-35</option>
                                                    <option value="35-50">35-50</option>
                                                    <option value="50-70">50-70</option>
                                                    <option value="70+">70+</option>
                                                </select> </p>
                                        </div>
                                        <div class="fll form_width">
                                            <p class="label_name mat20 fll"> Gender </p>
                                            <p> <select name="privacy" class="flight_searchfield_adult_and_childcontainer" id="gender">
                                                    <option value=""></option>
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>
                                                </select> 
                                            </p>
                                        </div>
                                        <div class="fll form_width">
                                            <p class="label_name mat20 fll"> Relation Status </p>
                                            <p> <select name="privacy" class="flight_searchfield_adult_and_childcontainer" id="marital_status">
                                                    <option value=""></option>
                                                    <option value="Single">Single</option>
                                                    <option value="Married">Married</option>
                                                </select> 
                                            </p>
                                        </div>
                                        <div class="fll form_width">
                                            <p class="label_name mat20 fll" style="width:300px">Interest </p>
                                            <p> 
                                                <!--<textarea style=" resize: none;" maxlength="70" cols="54" rows="4"></textarea>--> 
                                                <!--<div style="height:80px;border:1px solid red;">-->
                                                <select id="tokenize" multiple="multiple" class="tokenize-sample">
                                                    <?php
                                                    $interests = array('Airport', 'Attractions/Things to Do', 'Automotive', 'Bar', 'Book Store', 'Business Services', 'Church/Religious Organization', 'Club', 'Computers', 'Concert Venue', 'electronics', 'Event Planning/Event Services', 'Food/Grocery', 'Furniture', 'Health/Medical/Pharmacy', 'Home Improvement', 'Hospital/Clinic', 'Hotel', 'Museum/Art Gallery', 'Outdoor Gear/Sporting Goods', 'Pet Services', 'Professional Services', 'Real Estate', 'Restaurant/Cafe', 'Shopping/Retail', 'Spas/Beauty/Personal Care', 'Sports/Recreation/Activities', 'Tours/Sightseeing', 'Transportation', 'Community/Government', 'Album', 'Movie', 'Movie Theater', 'Music Award', 'Performance Art', 'Radio Station', 'TV Channel', 'TV Network', 'TV Show', 'TV/Movie Award', 'Aerospace/Defense', 'Automobiles and Parts', 'Bank/Financial Institution', 'Biotechnology', 'Chemicals', 'Community Organization', 'Computers/Technology', 'Consulting/Business Services', 'Engineering/Construction', 'Farming/Agriculture', 'Government Organization', 'Health/Medical/Pharmaceuticals', 'Industrials', 'Insurance Company', 'Internet/Software', 'Legal/Law', 'Middle school', 'Media/News/Publishing', 'Mining/Materials', 'Non-Governmental Organization (NGO)', 'Non-Profit Organization', 'Political Organization', 'Political Party', 'Training Institution', 'College', 'School', 'Telecommunication', 'University', 'Actor/Director', 'Artist', 'Athlete', 'Author', 'Business Person', 'Chef', 'Coach', 'Comedian', 'Dancer', 'Doctor', 'Editor', 'Government Official', 'Journalist', 'Lawyer', 'Monarch', 'Musician/Band', 'News Personality', 'photographer', 'Politician', 'Producer', 'Teacher', 'Writer', 'Appliances', 'Baby Goods/Kids Goods', 'Bags/Luggage', 'Camera/Photo', 'Cars', 'Clothing', 'Commercial Equipment', 'Drugs', 'Electronics', 'Food/Beverages', 'Games/Toys', 'Health/Beauty', 'Home Decor', 'Household Supplies', 'Jewelry/Watches', 'Kitchen/Cooking', 'Movies/Music', 'Musical Instrument', 'Office Supplies', 'Pet Supplies', 'Product/Service', 'Software', 'Vitamins/Supplements', 'Wine/Spirits', 'Music', 'Sports', 'Book');
                                                    for ($i = 0; $i < count($interests); $i++) {
                                                        ?>
                                                        <option value="<?php echo $interests[$i]; ?>">
                                                            <?php echo $interests[$i] ?>
                                                        </option>
                                                    <?php }
                                                    ?>
                                                </select>
                                                <!--</div>-->
                                            </p>
                                        </div>
                                        <div class="fll form_width">
                                            <p class="label_name mat20 fll" style="width:300px">Pages </p>
                                            <p> 
                                                <!--<textarea style=" resize: none;" maxlength="70" cols="54" rows="4"></textarea>--> 
                                                <!--<div style="height:80px;border:1px solid red;">-->
                                                <select id="pages" multiple="multiple" class="tokenize-sample">
                                                    <option value=""></option>
                                                </select>
                                                <!--</div>-->
                                            </p>
                                        </div>
                                        <div class="fll form_width">
                                            <p class="label_name mat20 fll" style="width:300px">Languages known </p>
                                            <p> 
                                                <!--<textarea style=" resize: none;" maxlength="70" cols="54" rows="4"></textarea>--> 
                                                <!--<div style="height:80px;border:1px solid red;">-->
                                                <select id="languages" multiple="multiple" class="tokenize-sample">
                                                    <?php                                                    
                                                    foreach($languages as $lang_info){
                                                        ?>
                                                        <option value="<?php echo $lang_info["language_id"]; ?>">
                                                            <?php echo $lang_info["language_name"] ?>
                                                        </option>
                                                    <?php }
                                                    ?>
                                                </select>
                                                <!--</div>-->
                                            </p>
                                        </div>
                                        <div class="fll form_width">
                                            <p class="label_name mat20 fll" style="width:300px">Nationality </p>
                                            <p> 
                                                <!--<textarea style=" resize: none;" maxlength="70" cols="54" rows="4"></textarea>--> 
                                                <!--<div style="height:80px;border:1px solid red;">-->
                                                <select id="nationality" multiple="multiple" class="tokenize-sample">
                                                    <option value="American">American</option>
                                                    <option value="Indian">Indian</option>
                                                    <option value="African">African</option>
                                                    <option value="Australian">Australian</option>
                                                </select>
                                                <!--</div>-->
                                            </p>
                                        </div>
                                        <div class="fll form_width">
                                            <p class="label_name mat10 fll"> Location </p>
                                            <p> <textarea style=" resize: none;" maxlength="70" cols="54" rows="4"></textarea> </p>
                                        </div>
                                        <div class="fll form_width">
                                            <p class="label_name">Potential Reach(Impression) </p>
                                        </div>
                                        <div class="fll form_width">
                                            <p class="label_name"><strong>Daily Reach </strong></p>
                                            <p>15,000 Out of 50,000 People </p>
                                        </div>
                                        <div class="fll form_width">
                                            <p class="label_name"> Total Reach </p>
                                        </div>
                                    </div>
                                    <div class="mat20 mar10"> 
                                        <input type="button" value="SUBMIT" class="np_des_checkout_btn" name="button" id="audience_btn"> 
                                    </div>
                                </div>

                                <div id="tab3">
                                    <p class="bold fs12 mat20" style="margin-left:50px;">   CONFIRM CAMPAIGN DETAILS </p>
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
                                <p class="bold fs12 mab30">  AUDIENCE MONITOR  </p>
                                <div class="details_agebetween_loadingbox" id="age_div">
                                    <div class="normal wi100pstg fs12" id="age_title"> People under age </div>
                                    <div class="details_agebetween_loadingbox_leftone" id="age_bar">
                                        <span class="details_agebetween_loadingbox_lefttwobox">&nbsp;</span>
                                    </div>                                    
                                    <div class="details_agebetween_loadingbox_rightbox_count"> 
                                        <div class="fll oneshop_overview_countbox mar10" id="subtotal"> <?= $total; ?> </div>
                                        <div class="fs12 mat5"> Out Of </div> <div id="total"> 3500 </div> 
                                    </div>
                                </div>

                                <div class="details_agebetween_loadingbox" id="gender_div">
                                    <div class="normal wi100pstg fs12" id="gender_title"> People </div>
                                    <div class="details_agebetween_loadingbox_leftone" id="gender_bar">
                                        <span class="details_agebetween_loadingbox_lefttwobox">&nbsp;</span>
                                    </div> 
                                    <div class="details_agebetween_loadingbox_rightbox_count"> 
                                        <div class="fll oneshop_overview_countbox mar10" id="subtotal">  <?= $total; ?> </div>
                                        <div class="fs12 mat5"> Out Of </div> <div id="total"> 3500 </div> 
                                    </div>
                                </div>
                                <div class="details_agebetween_loadingbox" id="marital_div">
                                    <div class="normal wi100pstg fs12" id="marital_title"> People </div>
                                    <div class="details_agebetween_loadingbox_leftone" id="marital_bar">
                                        <span class="details_agebetween_loadingbox_lefttwobox">&nbsp;</span>
                                    </div> 
                                    <div class="details_agebetween_loadingbox_rightbox_count"> 
                                        <div class="fll oneshop_overview_countbox mar10" id="subtotal">  <?= $total; ?> </div>
                                        <div class="fs12 mat5"> Out Of </div> <div id="total"> 3500 Specified </div> 
                                    </div>
                                </div>
                                <div class="details_agebetween_loadingbox" id="interests_div">
                                    <div class="normal wi100pstg fs12" id="marital_title"> Interests </div>
                                    <div class="details_agebetween_loadingbox_leftone" id="marital_bar">
                                        <span class="details_agebetween_loadingbox_lefttwobox">&nbsp;</span>
                                    </div> 
                                    <div class="details_agebetween_loadingbox_rightbox_count"> 
                                        <div class="fll oneshop_overview_countbox mar10" id="subtotal">  <?= $total; ?> </div>
                                        <div class="fs12 mat5"> Out Of </div> <div id="total"> 3500 Specified </div> 
                                    </div>
                                </div>
                                <div class="details_agebetween_loadingbox" id="pages_div">
                                    <div class="normal wi100pstg fs12" id="marital_title"> Total Pages </div>
                                    <div class="details_agebetween_loadingbox_leftone" id="marital_bar">
                                        <span class="details_agebetween_loadingbox_lefttwobox">&nbsp;</span>
                                    </div> 
                                    <div class="details_agebetween_loadingbox_rightbox_count"> 
                                        <div class="fll oneshop_overview_countbox mar10" id="subtotal">  <?= $total; ?> </div>
                                        <div class="fs12 mat5"> Out Of </div> <div id="total"> 3500 Specified </div> 
                                    </div>
                                </div>
                                <div class="details_agebetween_loadingbox" id="languages_div">
                                    <div class="normal wi100pstg fs12" id="marital_title"> Languages </div>
                                    <div class="details_agebetween_loadingbox_leftone" id="marital_bar">
                                        <span class="details_agebetween_loadingbox_lefttwobox">&nbsp;</span>
                                    </div> 
                                    <div class="details_agebetween_loadingbox_rightbox_count"> 
                                        <div class="fll oneshop_overview_countbox mar10" id="subtotal">  <?= $total; ?> </div>
                                        <div class="fs12 mat5"> Out Of </div> <div id="total"> 3500 Specified </div> 
                                    </div>
                                </div>
                                <div class="details_agebetween_loadingbox" id="nationality_div">
                                    <div class="normal wi100pstg fs12" id="marital_title"> Nationality </div>
                                    <div class="details_agebetween_loadingbox_leftone" id="marital_bar">
                                        <span class="details_agebetween_loadingbox_lefttwobox">&nbsp;</span>
                                    </div> 
                                    <div class="details_agebetween_loadingbox_rightbox_count"> 
                                        <div class="fll oneshop_overview_countbox mar10" id="subtotal">  <?= $total; ?> </div>
                                        <div class="fs12 mat5"> Out Of </div> <div id="total"> 3500 Specified </div> 
                                    </div>
                                </div>
                                <div class="details_agebetween_grapgbg" id="ichart_div">                                    
                                    <!--<div class="grapgbg_image"> <img src="<?php echo base_url() . 'assets/images/gr.jpg' ?>"></div>-->
                                    <!--<div class="grapgbg_content">--> 
<!--                                        <span class="fs18 bold"> 30% of 1002 </span>
                                        <span class="fs18 mat10 fll bold"> 2000k Out of 300 </span>-->
                                    <!--</div>-->
                                    <div id="chartContainer" style="width: 200px; height: 280px;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!--wrapper inner closed here-->
        </div> <!--module container end here-->
    </div> <!--wrapper main closed here-->
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
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/promotions.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/canvasjs.min.js"></script>
<script type="text/javascript">
    var token = "";
    var language_token="";
    var nationality_token="";
    var page_token="";
    $('#tokenize').tokenize({
        onAddToken: function (value, text, e) {
            token += "," + text.trim();
            callAJAX(onenet_url+"promotions/getPageOptions",{val:token},dispPagesOptions);
            $("#hinterests_val").val(token);
        },
        onRemoveToken: function (value, e) {
            var rep = token.replace("," + value, "");
            token = rep;
            $("#hinterests_val").val(token);
        }
    });
    $('#pages').tokenize({
        onAddToken: function (value, text, e) {
            page_token += "," + text.trim();
            alert(page_token);
            displayToken(page_token);
            $("#hpages_val").val(page_token);
        },
        onRemoveToken: function (value, e) {
            var rep = page_token.replace("," + value, "");
            page_token = rep;
            $("#hpages_val").val(page_token);
        }
    });
    function dispPagesOptions(data){
        var result=data.trim();
        var res_arry=result.split("~");
        for(var i=0;i<res_arry.length;i++){
            var option=res_arry[i];
            var opt_arry=option.split(":");
            $("#pages").append("<option value='"+opt_arry[0]+"'>"+opt_arry[1]+"</option>");
        }
        //$('#pages').tokenize();
    }
    $('#languages').tokenize({
        onAddToken: function (value, text, e) {
            language_token += "," + value.trim();
            displayToken(language_token);
            $("#hlanguages_val").val(language_token);
        },
        onRemoveToken: function (value, e) {
            var rep = language_token.replace("," + value, "");
            language_token = rep;
            displayToken(language_token);
            $("#hlanguages_val").val(language_token);
        }
    });
    $('#nationality').tokenize({
        onAddToken: function (value, text, e) {
            nationality_token += "," + value.trim();
            displayToken(nationality_token);
            $("#hnationality_val").val(nationality_token);
        },
        onRemoveToken: function (value, e) {
            var rep = nationality_token.replace("," + value, "");
            nationality_token = rep;
            displayToken(nationality_token);
            $("#hnationality_val").val(nationality_token);
        }
    });
    function displayToken(data){
        var age_val=$("#age").val();
        var gender_val=$("#gender").val();
        var marital_val=$("#marital_status").val();
        $.getJSON(onenet_url+"promotions/getInterestsCnt",{val:page_token,language_token:language_token,nationality_token:nationality_token,gender:gender_val,age:age_val,marital_val:marital_val}, function (result) {
            var chart = new CanvasJS.Chart("chartContainer", {
                width:300,
                data: [
                    {
                        type:"pie",
                        indexLabelPlacement:"inside",
                        indexLabelFontColor: "yellow",
                        dataPoints: result
                    }
                ]
            });
            chart.render();
        });
    }
     $(document).ready(function () {
        $.getJSON(onenet_url+"promotions/getChartData", function (result) {
            var chart = new CanvasJS.Chart("chartContainer", {
                width:300,
                data: [
                    {
                        type:"pie",
                        indexLabelPlacement:"inside",
                        indexLabelFontColor: "yellow",
                        dataPoints: result
                    }
                ]
            });
            chart.render();
        });
    });
</script>
