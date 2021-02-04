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
                        <h1 class="normal fs24" style="width:880px; border-bottom:1px #ccc solid; padding:0 0 10px 0; margin:0 auto; line-height:32px;"> Oneshop Store Promotion </h1>
                        <div style="width:880px; padding:0 0 5px 0; margin:20px 0 0 0; line-height:24px;" class="bold borderbottom"> 
                            <span> <a href="#"> Campaigns </a> &nbsp;&nbsp;&gt;&nbsp;&nbsp; </span> <span> <a href="#"> Create Cmapaign </a> </span> 
                        </div>
                        <p class="fs18 fll mat30 bgcolor3 wi100pstg"> <span class="fll"> <img  src="<?php echo base_url() . 'assets/images/next.png'; ?>" width="22" height="22"> </span> <span class="fll mal10"> Complete your Compaign </span>  </p>
                        <div class="mat20 fll" style="width:620px;">
                            <div class="click_tabs_wrap"> 
                                <ul id="tabs">
                                    <li id="tab_frst"><a id="current" href="#" name="#tab1"> 1 </a> <p style="float:left; font-weight:bold; padding:0 0 0 0; margin:65px 0 10px -85px;"> BASIC INFORMATION </p> </li>
                                    <li id="select_tab2" style="display:none;"><a href="#"  name="#tab2"> 2 </a> <p style="float:left; font-weight:bold; padding:0 0 0 0; margin:65px 0 10px -70px; "> AUDIENCE LAB </p>  </li>
                                    <li id="select_tab3" style=""><a href="#"  name="#tab3"> 3 </a> <p style="float:left; font-weight:bold; padding:0 0 0 0; margin:65px 0 10px -50px; "> PAYMENT</p>   </li>
                                </ul>
                            </div>
                            <div id="content">
                                <div style="display: block; margin-left:80px; width:820px;" id="tab1">
                                    <p class="bold fs12 mat20">  BASIC INFORMATION  </p>
                                    <div class="basic_info">
                                        <div class=" mab10 mat10 form_width">
                                            <p class="label_name mat20 fll"> Campaign Name </p>
                                            <p> <input type="text" id="on_campaignname" name="on_campaignname" class="oneshop_productfield_textbox"> </p>
                                            <p class="wi100pstg fs11 red clearfix jsError" id="osdev_Campaign_NameError"> Please Select Campaign </p>
                                        </div>

                                        <div class="mab10 mat10 form_width">
                                            <p class="label_name"> Choose Celebrity </p>
                                            <p> <select name="on_storename" id="on_storename" class="flight_searchfield_adult_and_childcontainer">
                                                    <option value="">Select Celebrity</option>
                                                   
                                                </select> </p>
                                            <p class="wi100pstg fs11 red clearfix jsError" id="osdev_Store_NameError"> Please Select Store </p>
                                        </div>

                                        <div class="fll  form_width">
                                            <p class="label_name"> Total Budget </p>
                                            <p> <input type="text" id="on_campaignbudget" name="on_campaignbudget" class="oneshop_productfield_textbox"> </p>
                                            <p class="wi100pstg fs11 red clearfix jsError" id="on_Budget_NameError"> Please Select Total Budget </p>
                                        </div>

                                        <div class=" mab10 mat10 form_width">
                                            <p class="label_name label_heading"><strong> Duration </strong></p>
                                            <div class="form_width_half">
                                                <p class="label_name"> Start  </p>
                                                <p> <input type="text" readonly=""  id="on_campaignstart" name="on_campaignstart" class="oneshop_productfield_textbox_date"> </p>
                                            </div>
                                            <div class="form_width_half1">
                                                <p class="label_name"> End  </p>
                                                <p> <input type="text" readonly="" id="on_campaignend" name="on_campaignend" class="oneshop_productfield_textbox_date"> </p>
                                            </div>
                                            <p class="wi100pstg fs11 red clearfix jsError" id="on_Date_NameError"> Please Select Date </p>
                                        </div>

                                        <div class=" form_width">
                                            <p class="label_name fll"> Total days </p>
                                            &nbsp;<span id="totDaysDispSpan" class="bold"></span>
                                        </div>
                                    </div> 
                                    <div class="hotel_pachagesummary_box fll">
                                        <div class="bgcolor3 bold fs14"> Quick Links ! </div>
                                        <ul>
                                            <li><div class="fll mat3 mar5"> <img width="10" height="14" src="<?php echo base_url() . 'assets/images/downarrow2.png'; ?>"> </div> Initiated Yet. </li>
                                            <li><div class="fll mat3 mar5"> <img width="10" height="14" src="<?php echo base_url() . 'assets/images/downarrow2.png'; ?>"> </div> This Shipment. </li>
                                            <li><div class="fll mat3 mar5"> <img width="10" height="14" src="<?php echo base_url() . 'assets/images/downarrow2.png'; ?>"> </div> Hasn't Initiated Yet. </li>
                                            <li><div class="fll mat3 mar5"> <img width="10" height="14" src="<?php echo base_url() . 'assets/images/downarrow2.png'; ?>"> </div> Initiated Yet. </li>
                                            <li><div class="fll mat3 mar5"> <img width="10" height="14" src="<?php echo base_url() . 'assets/images/downarrow2.png'; ?>"> </div> This Shipment. </li>
                                            <li><div class="fll mat3 mar5"> <img width="10" height="14" src="<?php echo base_url() . 'assets/images/downarrow2.png'; ?>"> </div> Hasn't Initiated Yet. </li>
                                            <li><div class="fll mat3 mar5"> <img width="10" height="14" src="<?php echo base_url() . 'assets/images/downarrow2.png'; ?>"> </div> Initiated Yet. </li>
                                            <li><div class="fll mat3 mar5"> <img width="10" height="14" src="<?php echo base_url() . 'assets/images/downarrow2.png'; ?>"> </div> This Shipment. </li>
                                            <li><div class="fll mat3 mar5"> <img width="10" height="14" src="<?php echo base_url() . 'assets/images/downarrow2.png'; ?>"> </div> Hasn't Initiated Yet. </li>
                                            <li><div class="fll mat3 mar5"> <img width="10" height="14" src="<?php echo base_url() . 'assets/images/downarrow2.png'; ?>"> </div> Initiated Yet. </li>
                                            <li><div class="fll mat3 mar5"> <img width="10" height="14" src="<?php echo base_url() . 'assets/images/downarrow2.png'; ?>"> </div> This Shipment. </li>
                                            <li><div class="fll mat3 mar5"> <img width="10" height="14" src="<?php echo base_url() . 'assets/images/downarrow2.png'; ?>"> </div> Hasn't Initiated Yet. </li>
                                            <li><div class="fll mat3 mar5"> <img width="10" height="14" src="<?php echo base_url() . 'assets/images/downarrow2.png'; ?>"> </div> Initiated Yet. </li>
                                            <li><div class="fll mat3 mar5"> <img width="10" height="14" src="<?php echo base_url() . 'assets/images/downarrow2.png'; ?>"> </div> This Shipment. </li>
                                            <li><div class="fll mat3 mar5"> <img width="10" height="14" src="<?php echo base_url() . 'assets/images/downarrow2.png'; ?>"> </div> Hasn't Initiated Yet. </li>
                                        </ul>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="mat20 mar10"> <input type="button" value="NEXT" class="np_des_checkout_btn" name="button" id="step1">  </div>
                                </div>
                                
                                <div style="display: none;width:900px;" id="tab3">
                                    <p class="bold fs12 mat20" >   CONFIRM COMPAIGN DETAILS </p>
                                    <div class="fll" style="width:640px;">
                                        <div class="details">
                                            <div class="details_left_nox">
                                                <div class="fll mab10 mat10 form_width_cards_new">
                                                    <p class="label_name"> <strong>Age</strong> </p>
                                                    <p> 15-30 Years</p>
                                                </div>

<!--                                                <div class="fll mab10 mat10 form_width_cards_new">
                                                    <p class="label_name"> <strong>Age</strong> </p>
                                                    <p> 15-30 Years</p>
                                                </div>-->

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
                                                </div
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
                                                                      


                                    <div class="hotel_sumbox mab10 fll">
                                        <div class="bgcolor3 bold fs14"> Quick Links ! </div>
                                        <ul>
                                            <li><div class="fll mat3 mar5"> <img width="10" height="14" src="<?php echo base_url() . 'assets/images/downarrow2.png'; ?>"> </div> Initiated Yet. </li>
                                            <li><div class="fll mat3 mar5"> <img width="10" height="14" src="<?php echo base_url() . 'assets/images/downarrow2.png'; ?>"> </div> This Shipment. </li>
                                            <li><div class="fll mat3 mar5"> <img width="10" height="14" src="<?php echo base_url() . 'assets/images/downarrow2.png'; ?>"> </div> Hasn't Initiated Yet. </li>
                                            <li><div class="fll mat3 mar5"> <img width="10" height="14" src="<?php echo base_url() . 'assets/images/downarrow2.png'; ?>"> </div> Initiated Yet. </li>
                                            <li><div class="fll mat3 mar5"> <img width="10" height="14" src="<?php echo base_url() . 'assets/images/downarrow2.png'; ?>"> </div> This Shipment. </li>
                                            <li><div class="fll mat3 mar5"> <img width="10" height="14" src="<?php echo base_url() . 'assets/images/downarrow2.png'; ?>"> </div> Hasn't Initiated Yet. </li>
                                            <li><div class="fll mat3 mar5"> <img width="10" height="14" src="<?php echo base_url() . 'assets/images/downarrow2.png'; ?>"> </div> Initiated Yet. </li>
                                            <li><div class="fll mat3 mar5"> <img width="10" height="14" src="<?php echo base_url() . 'assets/images/downarrow2.png'; ?>"> </div> This Shipment. </li>
                                            <li><div class="fll mat3 mar5"> <img width="10" height="14" src="<?php echo base_url() . 'assets/images/downarrow2.png'; ?>"> </div> Hasn't Initiated Yet. </li>
                                            <li><div class="fll mat3 mar5"> <img width="10" height="14" src="<?php echo base_url() . 'assets/images/downarrow2.png'; ?>"> </div> Initiated Yet. </li>
                                            <li><div class="fll mat3 mar5"> <img width="10" height="14" src="<?php echo base_url() . 'assets/images/downarrow2.png'; ?>"> </div> This Shipment. </li>
                                            <li><div class="fll mat3 mar5"> <img width="10" height="14" src="<?php echo base_url() . 'assets/images/downarrow2.png'; ?>"> </div> Hasn't Initiated Yet. </li>
                                            <li><div class="fll mat3 mar5"> <img width="10" height="14" src="<?php echo base_url() . 'assets/images/downarrow2.png'; ?>"> </div> Initiated Yet. </li>
                                            <li><div class="fll mat3 mar5"> <img width="10" height="14" src="<?php echo base_url() . 'assets/images/downarrow2.png'; ?>"> </div> This Shipment. </li>
                                            <li><div class="fll mat3 mar5"> <img width="10" height="14" src="<?php echo base_url() . 'assets/images/downarrow2.png'; ?>"> </div> Hasn't Initiated Yet. </li>

                                        </ul>
                                    </div>
                                        </div>
                                </div>
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
<script src="<?php echo base_url() . "application/modules/campaigns/views/mjs/" ?>campaigns.js"></script>

<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/jquery-ui.css"> 
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-ui.js"></script>


<script type="text/javascript">
    $(function () {
        $("#on_campaignstart").datepicker({
            dateFormat: 'mm/dd/yy',
            onSelect: function (dateText, inst) {
                compareCampigns('on_campaignstart');
                var caldays = calculateCampDays();
                $("#totDaysDispSpan").html(caldays);
            }
        });
        $("#on_campaignend").datepicker({dateFormat: 'mm/dd/yy',
            onSelect: function (dateText, inst) {
                compareCampigns('on_campaignend');
                var caldays = calculateCampDays();
                $("#totDaysDispSpan").html(caldays);
            }
        });


    });

    function compareCampigns(chkDate) {
        if ($('#on_campaignstart').val() != "" && $('#on_campaignend').val() != "") {
            var on_campaignstart = $("#on_campaignstart").val();
            var on_campaignend = $("#on_campaignend").val();
            if (Date.parse(on_campaignend) <= Date.parse(on_campaignstart)) {
                $("#" + chkDate).val('');
                alert("End Date should be later date.");
            }
        }
    }

    function daydiff(first, second) {
        return (second - first) / (1000 * 60 * 60 * 24);
    }

    function calculateCampDays() {
        if ($('#on_campaignstart').val() != "" && $('#on_campaignstart').val() != "") {
            return daydiff(Date.parse($('#on_campaignstart').val()), Date.parse($('#on_campaignend').val()));
        }
    }


$(".np_des_checkout_btn").click(function (){
    $("#tab3").show();
    $("#tab1").hide();  
     $("#tab_frst a").removeAttr('id');
    $("#select_tab3 a").attr('id', 'current');
});
$("#tab_frst a").click(function (){
    $("#tab1").show();
    $("#select_tab3 a").removeAttr('id');
    $("#tab3").hide();
});
$("#select_tab3 a").click(function (){
     $("#tab3").show();
    $("#tab1").hide();
    $("#tab_frst a").removeAttr('id');
});
</script>    
<?php
$this->templates->footer();
?>