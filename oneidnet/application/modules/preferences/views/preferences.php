<?php
$this->load->module("templates");
$this->templates->basic_info_header();
$this->templates->basic_info_subheader()
?>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        $('.click_hoverFriendSuggessions ul li').hover(
                function () {
                    $(this).find('h4').fadeIn(50);
                },
                function () {
                    $(this).find('h4').fadeOut(50);
                });

        $('.click_searchField').focus(function () {
            $('.click_suggesionsList').css({display: 'block'});
        });
        $('.click_searchField').blur(function () {
            $('.click_suggesionsList').css({display: 'none'});
        });

        $('.click_album').hover(
                function () {
                    $(this).find('.click_photoOptionsTop').fadeIn(300);
                },
                function () {
                    $(this).find('.click_photoOptionsTop').fadeOut(20);
                }
        );
        $('.click_album').hover(
                function () {
                    $(this).find('.click_photoOptionsBottom').fadeIn(300);
                },
                function () {
                    $(this).find('.click_photoOptionsBottom').fadeOut(20);
                }
        );
        $('.click_interests').click(function () {
            $('.click_interestsList').slideToggle(300);
        });

    });
    function showFriendList(id) {
        var list = document.getElementById(id);
        list.style.display = 'block';
    }
    function hideFriendList(id) {
        var list = document.getElementById(id);
        list.style.display = 'none';
    }
</script>

<script type="text/javascript">
    $(document).ready(function () {

        $('.click_photoWrapper').click(function () {
            $('#click_photosPopUp').fadeIn(300);
        });

        $('.click_createAlbumBtn').click(function () {
            $('#click_createAlbumPopUp').fadeIn(300);
        });
        $('.notify').click(function () {
            $(this).parent().find('.click_NotificationListWrapper').fadeToggle(300);
        });

    });

    function toggle_popUpVisibility(id) {
        var myPopUp = document.getElementById(id);
        myPopUp.style.display = 'none';
    }

    function showFriendList(id) {
        var list = document.getElementById(id);
        list.style.display = 'block';
    }
    function hideFriendList(id) {
        var list = document.getElementById(id);
        list.style.display = 'none';
    }
</script>




<div class="np_des_module_container_wrap"> <!--module_container start here-->


    <div class="hotel_pachagesummary_box fll">


        <div id="documenter_sidebar">

            <ul id="documenter_nav">
                <div class="overflow"> <span class="fll np_des_mar5"><img src="<?php echo BASEINFO_PATH; ?>images/PREFERENCES.png"> </span> <h2 class="fs18 normal np_des_mab40 np_des_mat10"> PREFERENCES </h2> </div>

                <li><a href="#documenter_cover" class="current"> Module Privacy Matrix </a></li>
                <li><a title="Ajax Contact Form" href="#ajax_contact_form" > Login Semantics </a></li>
                <li><a title="Google Map" href="#control_login_activities"> Control Login Activities</a></li>
            </ul>

        </div>


    </div>






    <div class="right_container_rightnew_wrapper">

        <div id="documenter_content">
            <section id="documenter_cover">

                <h1 class="wi100pstg os_des_borderbottom os_des_pab5 normal np_des_mab10"> Module Privacy Matrix </h1>


                <div class="statistics_total_wqrap np_des_mat25">

                    <div class="preference_top_heading_wrap">
                        <div class="statistics_preference_box1"> MODULES </div>
                        <div class="statistics_preference_box2"> Public </div>
                        <div class="statistics_preference_box2"> Friends </div>
                        <div class="statistics_preference_box2"> Private </div>
                    </div>

                    
                                        <div class="preference_bottom_content_wrap">
                        <a href="redirection/?url=<?php echo TUNNELURL; ?>">
                            <div class="preference_module_names"><span style="margin-left:3px;margin-top:6px;" class="fll"><img width="30" height="30" alt="icon" class="fll os_des_margin_auto" src="<?php echo base_url(); ?>assets/Images/front/Tunnel.png"> </span> <span class="fll">Tunnel</span> </div>
                        </a>
                        <div class="statistics_preference_box_content">
                            <p class="fll checkbox_margins"> <input type="radio" name="tunnel" id="radio46" class="css-checkbox tunnel" value="Public"<?php if ($tunnel[0]['profile_privacy'] == 'Public'): ?>checked="checked"<?php endif; ?>/>
                                <label for="radio46" class="css-label radGroup1"></label> </p> </div>
                        <div class="statistics_preference_box_content">
                            <p class="fll checkbox_margins"> <input type="radio" name="tunnel" id="radio47" class="css-checkbox tunnel" value="Friends"<?php if ($tunnel[0]['profile_privacy'] == 'Friends'): ?>checked="checked"<?php endif; ?>/>
                                <label for="radio47" class="css-label radGroup1"></label> </p> </div>

                        <div class="statistics_preference_box_content">
                            <p class="fll checkbox_margins"> <input type="radio" name="tunnel" id="radio48" class="css-checkbox tunnel" value="Private"<?php if ($tunnel[0]['profile_privacy'] == 'Private'): ?>checked="checked"<?php endif; ?>/>
                                <label for="radio48" class="css-label radGroup1"></label> </p>
                            <p class="flr np_des_mat5"> <input type="button" class="button_new" value="Save" id="tunnel_save" style="display: none;"> </p>
                        </div>
                    </div>


                    

                    <div class="preference_bottom_content_wrap">
                        <a href="redirection/?url=<?php echo NETPROURL; ?>"> <div class="preference_module_names"><span style="margin-left:3px;margin-top:6px;" class="fll"><img width="30" height="30" alt="icon" class="fll os_des_margin_auto" src="<?php echo base_url(); ?>assets/Images/front/NetPro.png"> </span> <span class="fll">Netpro</span> </div></a>
                        <div class="statistics_preference_box_content">
                            <p class="fll checkbox_margins"><input type="radio" name="netpro" id="radio4" class="css-checkbox netpro" value="Public"<?php if ($netpro[0]['profile_privacy'] == 'Public'): ?>checked="checked"<?php endif; ?>/>
                                <label for="radio4" class="css-label radGroup1"></label> </p> </div>


                        <div class="statistics_preference_box_content">
                            <p class="fll checkbox_margins"> <input type="radio" name="netpro" id="radio5" class="css-checkbox netpro" value="Friends"<?php if ($netpro[0]['profile_privacy'] == 'Friends'): ?>checked = "checked"<?php endif; ?> />
                                <label for="radio5" class="css-label radGroup1"></label> </p> </div>

                        <div class="statistics_preference_box_content">
                            <p class="fll checkbox_margins"> <input type="radio" name="netpro" id="radio6" class="css-checkbox netpro" value="Private"<?php if ($netpro[0]['profile_privacy'] == 'Private'): ?>checked = "checked"<?php endif; ?> />
                                <label for="radio6" class="css-label radGroup1"></label> </p>
                            <p class="flr np_des_mat5"> <input type="button" class="button_new" value="Save" id="netpro_save" style="display: none;"> </p>
                        </div>
                    </div>

                    <div class="preference_bottom_content_wrap">
                        <a href="redirection/?url=<?php echo BUZZINURL; ?>">  <div class="preference_module_names"><span style="margin-left:3px;margin-top:6px;" class="fll"><img width="30" height="30" alt="icon" class="fll os_des_margin_auto" src="<?php echo base_url(); ?>assets/Images/front/Buzzin.png"> </span> <span class="fll">Buzzin</span> </div></a>



                        <div class="statistics_preference_box_content">
                            <p class="fll checkbox_margins"> <input type="radio" name="buzzin" id="radio7" class="css-checkbox buzzin" value="Public"<?php if ($buzzin[0]['privacy'] == 'Public'): ?>checked="checked"<?php endif; ?>/>
                                <label for="radio7" class="css-label radGroup1"></label> </p> </div>


                        <div class="statistics_preference_box_content">
                            <p class="fll checkbox_margins"> <input type="radio" name="buzzin" id="radio8" class="css-checkbox buzzin" value="Friends"<?php if ($buzzin[0]['privacy'] == 'Friends'): ?>checked="checked"<?php endif; ?>/>
                                <label for="radio8" class="css-label radGroup1"></label> </p> </div>

                        <div class="statistics_preference_box_content">
                            <p class="fll checkbox_margins"> <input type="radio" name="buzzin" id="radio9" class="css-checkbox buzzin" value="Private"<?php if ($buzzin[0]['privacy'] == 'Private'): ?>checked="checked"<?php endif; ?>/>
                                <label for="radio9" class="css-label radGroup1"></label> </p>
                            <p class="flr np_des_mat5"> <input type="button" class="button_new" value="Save" id="buzzin_save" style="display: none;"> </p>
                        </div>
                    </div>

                    <div class="preference_bottom_content_wrap">
                        <a href="redirection/?url=<?php echo CLICKURL; ?>"> <div class="preference_module_names"><span style="margin-left:3px;margin-top:6px;" class="fll"><img width="30" height="30" alt="icon" class="fll os_des_margin_auto" src="<?php echo base_url(); ?>assets/Images/front/click.png"> </span> <span class="fll">Click</span> </div></a>



                        <div class="statistics_preference_box_content">
                            <p class="fll checkbox_margins"> <input type="radio" name="uclick" id="radio10" class="css-checkbox uclick" value="Public"<?php if ($click[0]['profile_privacy'] == 'Public'): ?>checked="checked"<?php endif; ?>/>
                                <label for="radio10" class="css-label radGroup1"></label> </p> </div>


                        <div class="statistics_preference_box_content">
                            <p class="fll checkbox_margins"> <input type="radio" name="uclick" id="radio11" class="css-checkbox uclick" value="Friend"<?php if ($click[0]['profile_privacy'] == 'Friend'): ?>checked="checked"<?php endif; ?>/>
                                <label for="radio11" class="css-label radGroup1"></label> </p> </div>

                        <div class="statistics_preference_box_content">
                            <p class="fll checkbox_margins"> <input type="radio" name="uclick" id="radio12" class="css-checkbox uclick" value="Private"<?php if ($click[0]['profile_privacy'] == 'Private'): ?>checked="checked"<?php endif; ?>/>
                                <label for="radio12" class="css-label radGroup1"></label> </p>
                            <p class="flr np_des_mat5"> <input type="button" class="button_new" value="Save" id="click_save" style="display: none;"> </p>
                        </div>
                    </div>

                    <div class="preference_bottom_content_wrap">
                            <div class="preference_module_names"><span style="margin-left:3px;margin-top:6px;" class="fll"><img width="30" height="30" alt="icon" class="fll os_des_margin_auto" src="<?php echo base_url(); ?>assets/Images/front/360.png"> </span> <span class="fll">360 mail</span> </div>
                        <div class="statistics_preference_box_content">
                            <p class="fll checkbox_margins"> <input type="radio" name="360mail" id="radio1" disabled="disabled" class="css-checkbox" />
                                <label for="radio1" class="css-label radGroup1"></label> </p> </div>
                        <div class="statistics_preference_box_content">
                            <p class="fll checkbox_margins"> <input type="radio" name="360mail" id="radio2"  disabled="disabled" class="css-checkbox" />
                                <label for="radio2" class="css-label radGroup1"></label> </p> </div>
                        <div class="statistics_preference_box_content">
                            <p class="fll checkbox_margins"> <input type="radio" name="360mail" id="radio3"  disabled="disabled" class="css-checkbox" />
                                <label for="radio3" class="css-label radGroup1"></label> </p>
                            <p class="flr np_des_mat5"> <input type="button" class="button_new" value="Save" style="display: none;"> </p>
                        </div>
                    </div>
                    

                    <div class="preference_bottom_content_wrap">
                        <a href="redirection/?url=<?php echo COFFICEURL; ?>">  <div class="preference_module_names"><span style="margin-left:3px;margin-top:6px;" class="fll"><img width="30" height="30" alt="icon" class="fll os_des_margin_auto" src="<?php echo base_url(); ?>assets/Images/front/Cooffice.png"> </span> <span class="fll">Co - Office</span> </div></a>



                        <div class="statistics_preference_box_content">
                            <p class="fll checkbox_margins"> <input type="radio" name="sravani" id="radio13"  disabled="disabled" class="css-checkbox" />
                                <label for="radio13" class="css-label radGroup1"></label> </p> </div>


                        <div class="statistics_preference_box_content">
                            <p class="fll checkbox_margins"> <input type="radio" name="sravani" id="radio14"  disabled="disabled" class="css-checkbox" />
                                <label for="radio14" class="css-label radGroup1"></label> </p> </div>

                        <div class="statistics_preference_box_content">
                            <p class="fll checkbox_margins"> <input type="radio" name="sravani" id="radio15"  disabled="disabled" class="css-checkbox" />
                                <label for="radio15" class="css-label radGroup1"></label> </p>
                            <p class="flr np_des_mat5"> <input type="button" class="button_new" value="Save" style="display: none;"> </p>
                        </div>
                    </div>


                    <div class="preference_bottom_content_wrap">
                        <a href="redirection/?url=<?php echo CVBANKURL; ?>"> <div class="preference_module_names"><span style="margin-left:3px;margin-top:6px;" class="fll"><img width="30" height="30" alt="icon" class="fll os_des_margin_auto" src="<?php echo base_url(); ?>assets/Images/front/CV_bank.png"> </span> <span class="fll">CVBank</span> </div></a>
                        <div class="statistics_preference_box_content">
                            <p class="fll checkbox_margins"> <input type="radio" name="cooffice" id="radio16"  disabled="disabled" class="css-checkbox" />
                                <label for="radio16" class="css-label radGroup1"></label> </p> </div>
                        <div class="statistics_preference_box_content">
                            <p class="fll checkbox_margins"> <input type="radio" name="cooffice" id="radio17"  disabled="disabled" class="css-checkbox" />
                                <label for="radio17" class="css-label radGroup1"></label> </p> </div>

                        <div class="statistics_preference_box_content">
                            <p class="fll checkbox_margins"> <input type="radio" name="cooffice" id="radio18"  disabled="disabled" class="css-checkbox" />
                                <label for="radio18" class="css-label radGroup1"></label> </p>
                            <p class="flr np_des_mat5"> <input type="button" class="button_new" value="Save" style="display: none;"> </p>
                        </div>
                    </div>


                    <div class="preference_bottom_content_wrap">
                        <a href="redirection/?url=<?php echo DEALERXURL; ?>"> <div class="preference_module_names"><span style="margin-left:3px;margin-top:6px;" class="fll"><img width="30" height="30" alt="icon" class="fll os_des_margin_auto" src="<?php echo base_url(); ?>assets/Images/front/DealerX.png"> </span> <span class="fll">Dealerx</span> </div></a>
                        <div class="statistics_preference_box_content">
                            <p class="fll checkbox_margins"> <input type="radio" name="dealerx" id="radio19"  disabled="disabled" class="css-checkbox" />
                                <label for="radio19" class="css-label radGroup1"></label> </p> </div>


                        <div class="statistics_preference_box_content">
                            <p class="fll checkbox_margins"> <input type="radio" name="dealerx" id="radio20"  disabled="disabled" class="css-checkbox" />
                                <label for="radio20" class="css-label radGroup1"></label> </p> </div>

                        <div class="statistics_preference_box_content">
                            <p class="fll checkbox_margins"> <input type="radio" name="dealerx" id="radio21"  disabled="disabled" class="css-checkbox" />
                                <label for="radio21" class="css-label radGroup1"></label> </p>
                            <p class="flr np_des_mat5"> <input type="button" class="button_new" value="Save" style="display: none;"> </p>
                        </div>
                    </div>


                    <div class="preference_bottom_content_wrap">
                        <a href="redirection/?url=<?php echo FINDITURL; ?>">  <div class="preference_module_names"><span style="margin-left:3px;margin-top:6px;" class="fll"><img width="30" height="30" alt="icon" class="fll os_des_margin_auto" src="<?php echo base_url(); ?>assets/Images/front/Findit.png"> </span> <span class="fll">Findit</span> </div></a>
                        <div class="statistics_preference_box_content">
                            <p class="fll checkbox_margins"> <input type="radio" name="findit" id="radio22"  disabled="disabled" class="css-checkbox" />
                                <label for="radio22" class="css-label radGroup1"></label> </p> </div>


                        <div class="statistics_preference_box_content">
                            <p class="fll checkbox_margins"> <input type="radio" name="findit" id="radio23"  disabled="disabled" class="css-checkbox" />
                                <label for="radio23" class="css-label radGroup1"></label> </p> </div>

                        <div class="statistics_preference_box_content">
                            <p class="fll checkbox_margins"> <input type="radio" name="findit" id="radio24"  disabled="disabled" class="css-checkbox" />
                                <label for="radio24" class="css-label radGroup1"></label> </p>
                            <p class="flr np_des_mat5"> <input type="button" class="button_new" value="Save" style="display: none;"> </p>
                        </div>
                    </div>


                    <div class="preference_bottom_content_wrap">
                        <a href="redirection/?url=<?php echo ISNEWSURL; ?>">
                            <div class="preference_module_names"><span style="margin-left:3px;margin-top:6px;" class="fll"><img width="30" height="30" alt="icon" class="fll os_des_margin_auto" src="<?php echo base_url(); ?>assets/Images/front/ISNews.png"> </span> <span class="fll">ISNews</span> </div></a>
                        <div class="statistics_preference_box_content">
                            <p class="fll checkbox_margins"> <input type="radio" name="isnews" id="radio25"  disabled="disabled" class="css-checkbox" />
                                <label for="radio25" class="css-label radGroup1"></label> </p> </div>
                        <div class="statistics_preference_box_content">
                            <p class="fll checkbox_margins"> <input type="radio" name="isnews" id="radio26"  disabled="disabled" class="css-checkbox" />
                                <label for="radio26" class="css-label radGroup1"></label> </p> </div>

                        <div class="statistics_preference_box_content">
                            <p class="fll checkbox_margins"> <input type="radio" name="isnews" id="radio27"  disabled="disabled" class="css-checkbox" />
                                <label for="radio27" class="css-label radGroup1"></label> </p>
                            <p class="flr np_des_mat5"> <input type="button" class="button_new" value="Save" style="display: none;"> </p>
                        </div>
                    </div>



                    <div class="preference_bottom_content_wrap">
                        <a href="redirection/?url=<?php echo ONENETWORKURL; ?>">  <div class="preference_module_names"><span style="margin-left:3px;margin-top:6px;" class="fll"><img width="30" height="30" alt="icon" class="fll os_des_margin_auto" src="<?php echo base_url(); ?>assets/Images/front/onenetwork.png"> </span> <span class="fll">Onenetwork</span> </div></a>
                        <div class="statistics_preference_box_content">
                            <p class="fll checkbox_margins"> <input type="radio" name="onenetwork" id="radio31"  disabled="disabled" class="css-checkbox" />
                                <label for="radio31" class="css-label radGroup1"></label> </p> </div>


                        <div class="statistics_preference_box_content">
                            <p class="fll checkbox_margins"> <input type="radio" name="onenetwork" id="radio32"  disabled="disabled" class="css-checkbox" />
                                <label for="radio32" class="css-label radGroup1"></label> </p> </div>

                        <div class="statistics_preference_box_content">
                            <p class="fll checkbox_margins"> <input type="radio" name="onenetwork" id="radio33"  disabled="disabled" class="css-checkbox" />
                                <label for="radio33" class="css-label radGroup1"></label> </p>
                            <p class="flr np_des_mat5"> <input type="button" class="button_new" value="Save" style="display: none;"> </p>
                        </div>
                    </div>

                    <div class="preference_bottom_content_wrap">
                        <a href="redirection/?url=<?php echo ONESHOPURL; ?>"> <div class="preference_module_names"><span style="margin-left:3px;margin-top:6px;" class="fll"><img width="30" height="30" alt="icon" class="fll os_des_margin_auto" src="<?php echo base_url(); ?>assets/Images/front/Oneshop.png"> </span> <span class="fll">OneShop</span> </div></a>
                        <div class="statistics_preference_box_content">
                            <p class="fll checkbox_margins"> <input type="radio" name="oneshop" id="radio34"  disabled="disabled" class="css-checkbox" />
                                <label for="radio34" class="css-label radGroup1"></label> </p> </div>
                        <div class="statistics_preference_box_content">
                            <p class="fll checkbox_margins"> <input type="radio" name="oneshop" id="radio35"  disabled="disabled" class="css-checkbox" />
                                <label for="radio35" class="css-label radGroup1"></label> </p> </div>

                        <div class="statistics_preference_box_content">
                            <p class="fll checkbox_margins"> <input type="radio" name="oneshop" id="radio36"  disabled="disabled" class="css-checkbox" />
                                <label for="radio36" class="css-label radGroup1"></label> </p>
                            <p class="flr np_des_mat5"> <input type="button" class="button_new" value="Save" style="display: none;"> </p>
                        </div>
                    </div>



                    <div class="preference_bottom_content_wrap">
                        <a href="redirection/?url=<?php echo TRAVELTIMEURL; ?>">
                            <div class="preference_module_names"><span style="margin-left:3px;margin-top:6px;" class="fll"><img width="30" height="30" alt="icon" class="fll os_des_margin_auto" src="<?php echo base_url(); ?>assets/Images/front/Traveltime.png"> </span> <span class="fll">Traveltime</span> </div>
                        </a>


                        <div class="statistics_preference_box_content">
                            <p class="fll checkbox_margins"> <input type="radio" name="traveltime" id="radio40"  disabled="disabled" class="css-checkbox" />
                                <label for="radio40" class="css-label radGroup1"></label> </p> </div>


                        <div class="statistics_preference_box_content">
                            <p class="fll checkbox_margins"> <input type="radio" name="traveltime" id="radio41"  disabled="disabled" class="css-checkbox" />
                                <label for="radio41" class="css-label radGroup1"></label> </p> </div>

                        <div class="statistics_preference_box_content">
                            <p class="fll checkbox_margins"> <input type="radio" name="traveltime" id="radio42"  disabled="disabled" class="css-checkbox" />
                                <label for="radio42" class="css-label radGroup1"></label> </p>
                            <p class="flr np_des_mat5"> <input type="button" class="button_new" value="Save" style="display: none;"> </p>
                        </div>
                    </div>

                    <div class="preference_bottom_content_wrap">
                        <a href="redirection/?url=<?php echo ONEVISIONURL; ?>">
                            <div class="preference_module_names"><span style="margin-left:3px;margin-top:6px" class="fll"><img width="30" height="30" alt="icon" class="fll os_des_margin_auto" src="<?php echo base_url(); ?>assets/Images/front/OneVision.png"> </span> <span class="fll">OneVision</span> </div></a>
                        <div class="statistics_preference_box_content">
                            <p class="fll checkbox_margins"> <input type="radio" name="onevision" id="radio37" disabled="disabled" class="css-checkbox" />
                                <label for="radio37" class="css-label radGroup1"></label> </p> </div>
                        <div class="statistics_preference_box_content">
                            <p class="fll checkbox_margins"> <input type="radio" name="onevision" id="radio38" disabled="disabled" class="css-checkbox" />
                                <label for="radio38" class="css-label radGroup1"></label> </p> </div>

                        <div class="statistics_preference_box_content">
                            <p class="fll checkbox_margins"> <input type="radio" name="onevision" id="radio39" disabled="disabled" class="css-checkbox" />
                                <label for="radio39" class="css-label radGroup1"></label> </p>
                            <p class="flr np_des_mat5"> <input type="button" class="button_new" value="Save" style="display: none;"> </p>
                        </div>
                    </div>



                    <div class="preference_bottom_content_wrap">
                        <a href="redirection/?url=<?php echo ONEIDSHIPURL; ?>"><div class="preference_module_names"><span style="margin-left:3px;margin-top:6px;" class="fll "><img width="30" height="30" alt="icon" class="fll os_des_margin_auto " src="<?php echo base_url(); ?>assets/Images/front/OneIDship.png"> </span> <span class="fll">Oneidship</span> </div></a>
                        <div class="statistics_preference_box_content">
                            <p class="fll checkbox_margins"> <input type="radio" name="oneidship" id="radio28" disabled="disabled" class="css-checkbox" />
                                <label for="radio28" class="css-label radGroup1"></label> </p> </div>
                        <div class="statistics_preference_box_content">
                            <p class="fll checkbox_margins"> <input type="radio" name="oneidship" id="radio29" disabled="disabled" class="css-checkbox" />
                                <label for="radio29" class="css-label radGroup1"></label> </p> </div>

                        <div class="statistics_preference_box_content">
                            <p class="fll checkbox_margins"> <input type="radio" name="oneidship" id="radio30" disabled="disabled" class="css-checkbox" />
                                <label for="radio30" class="css-label radGroup1"></label> </p>
                            <p class="flr np_des_mat5"> <input type="button" class="button_new" value="Save" style="display: none;"> </p>
                        </div>
                    </div>

                    <div class="preference_bottom_content_wrap">
                        <a href="redirection/?url=<?php echo VCOMURL; ?>"> <div class="preference_module_names"><span style="margin-left:3px;margin-top:6px;" class="fll"><img width="30" height="30" alt="icon" class="fll os_des_margin_auto" src="<?php echo base_url(); ?>assets/Images/front/Vcom.png"> </span> <span class="fll">Vcom</span> </div></a>



                        <div class="statistics_preference_box_content">
                            <p class="fll checkbox_margins"> <input type="radio" name="vcom" id="radio49" disabled="disabled" class="css-checkbox" />
                                <label for="radio49" class="css-label radGroup1"></label> </p> </div>


                        <div class="statistics_preference_box_content">
                            <p class="fll checkbox_margins"> <input type="radio" name="vcom" id="radio50" disabled="disabled" class="css-checkbox" />
                                <label for="radio50" class="css-label radGroup1"></label> </p> </div>

                        <div class="statistics_preference_box_content">
                            <p class="fll checkbox_margins"> <input type="radio" name="vcom" id="radio51" disabled="disabled" class="css-checkbox" />
                                <label for="radio51" class="css-label radGroup1"></label> </p>
                            <p class="flr np_des_mat5"> <input type="button" class="button_new" value="Save" style="display: none;"> </p>
                        </div>
                    </div>

                </div>
            </section>
            <section id="ajax_contact_form" class="minheight600">

                <div class="fll overflow wi100pstg os_des_borderbottom">

                    <h1 class="fll normal np_des_mab10"> Login Semantics  </h1>

                    <div class="flr mat5">
                        <input type="button" class="button_new os_des_mal10 click_headerIcon notify" value="+ Edit Rules">

                        <div class="click_NotificationListWrapper">
                            <img src="assets/basic_info/images/notifyBubble.png" class="click_NotifyBubble">
                            <div class="click_NotifyWrapper">

                                <form>
                                    <div class="fll np_des_wi420 os_des_mal20">


                                        <div class="group np_des_wi420 fll np_des_mat10">
                                            <p class="fs14 np_des_mab2 np_des_mab10"> Location Access </p>
                                            <select class="oneshop_select_newfield_with_border" id="location_access" name="location_access">
                                                <option value="ANY"<?php if ($symanticsdata[0]['location_access'] === 'ANY') echo ' selected="selected"' ?>> Any </option>
                                                <option value="PARTICULAR"<?php if ($symanticsdata[0]['location_access'] === 'PARTICULAR') echo ' selected="selected"' ?>>Particular </option>
                                            </select>
                                        </div>
                                        <?php if ($symanticsdata[0]['location_access'] != "ANY") { ?>
                                            <div class="group np_des_wi420 fll"  id="countries_list">

                                                <?php $country_values = explode(",", $symanticsdata[0]['country_str']); ?>

                                                <p class="fs14 np_des_mab2 np_des_mab10"> Choose City / Country </p>
                                                <select class="oneshop_select_newfield_with_border1" multiple="multiple" id="multi_countries">
                                                    <?php foreach ($countrydata as $cdatalist) { ?>
                                                        <?php $cid = $cdatalist['country_id']; ?>
                                                        <option value="<?php echo $cdatalist['country_id']; ?>"<?php
                                                        if (in_array($cid, $country_values)) {
                                                            echo 'selected';
                                                        }
                                                        ?>><?php echo $cdatalist['country_name']; ?> </option>
                                                            <?php } ?>
                                                </select>
                                            </div>
                                        <?php } else { ?>
                                            <div class="group np_des_wi420 fll"  id="countries_list" style="display: none;">
                                                <p class="fs14 np_des_mab2 np_des_mab10"> Choose City/Country </p>
                                                <select class="oneshop_select_newfield_with_border1" multiple="multiple" id="multi_countries">
                                                    <?php foreach ($countrydata as $cdatalist) { ?>
                                                        <option value="<?php echo $cdatalist['country_id']; ?>"> <?php echo $cdatalist['country_name']; ?> </option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        <?php } ?>

                                        <div class="group np_des_wi420 fll">
                                            <p class="fs14 np_des_mab2 np_des_mab10"> Device Type </p>
                                            <select class="oneshop_select_newfield_with_border" id="device_access" name="device_access">
                                                <option value="ANY"<?php if ($symanticsdata[0]['device_type'] === 'ANY') echo ' selected="selected"' ?>> Any </option>
                                                <option value="PARTICULAR"<?php if ($symanticsdata[0]['device_type'] === 'PARTICULAR') echo ' selected="selected"' ?>>Particular </option>
                                            </select>
                                        </div>
                                        <?php if ($symanticsdata[0]['device_type'] != "ANY") { ?>

                                            <div class="group np_des_wi420 fll" id="device_list"  >
                                                <?php $device_values = explode(",", $symanticsdata[0]['device_str']); ?>
                                                <p class="fs14 np_des_mab2 np_des_mab10">Choose Device Type </p>
                                                <select class="oneshop_select_newfield_with_border1" multiple="multiple" id="multi_devices">
                                                    <option value="TABLET"<?php
                                                    if (in_array('TABLET', $device_values)) {
                                                        echo 'selected';
                                                    }
                                                    ?>>Tablet </option>
                                                    <option value="COMPUTER"<?php
                                                    if (in_array('COMPUTER', $device_values)) {
                                                        echo 'selected';
                                                    }
                                                    ?>>Computer </option>
                                                    <option value="MOBILE"<?php
                                                    if (in_array('MOBILE', $device_values)) {
                                                        echo 'selected';
                                                    }
                                                    ?>>Mobile </option>
                                                </select>
                                            </div>
                                        <?php } else { ?>
                                            <div class="group np_des_wi420 fll" id="device_list" style="display: none;" >
                                                <p class="fs14 np_des_mab2 np_des_mab10">Choose Device Type </p>
                                                <select class="oneshop_select_newfield_with_border1" multiple="multiple" id="multi_devices">
                                                    <option value="TABLET">Tablet </option>
                                                    <option value="COMPUTER">Computer</option>
                                                    <option value="MOBILE">Mobile</option>

                                                </select>
                                            </div>
                                        <?php } ?>

                                        <div class="group np_des_wi420 fll">
                                            <p class="fs14 np_des_mab2 np_des_mab10"> Browser Type </p>
                                            <select class="oneshop_select_newfield_with_border" id="browser_access" name="browser_access">
                                                <option value="ANY"<?php if ($symanticsdata[0]['browsers'] === 'ANY') echo ' selected="selected"' ?>> Any </option>
                                                <option value="PARTICULAR"<?php if ($symanticsdata[0]['browsers'] === 'PARTICULAR') echo ' selected="selected"' ?>>Particular </option>

                                            </select>
                                        </div>
                                        <?php if ($symanticsdata[0]['browsers'] != "ANY") { ?>

                                            <div class="group np_des_wi420 fll" id="browser_list" >
                                                <?php $browser_values = explode(",", $symanticsdata[0]['browser_str']); ?>
                                                <p class="fs14 np_des_mab2 np_des_mab10">Choose Browser Type </p>
                                                <select class="oneshop_select_newfield_with_border1" multiple="multiple" id="multi_browsers" >
                                                    <option value="CHROME"<?php
                                                    if (in_array('CHROME', $browser_values)) {
                                                        echo 'selected';
                                                    }
                                                    ?>>Chrome </option>
                                                    <option value="FIREFOX"<?php
                                                    if (in_array('FIREFOX', $browser_values)) {
                                                        echo 'selected';
                                                    }
                                                    ?>>Firefox</option>
                                                    <option value="OPERA"<?php
                                                    if (in_array('OPERA', $browser_values)) {
                                                        echo 'selected';
                                                    }
                                                    ?>>Opera</option>
                                                    <option value="IE"<?php
                                                    if (in_array('IE', $browser_values)) {
                                                        echo 'selected';
                                                    }
                                                    ?>>IE</option>
                                                    <option value="NETSCAPE"<?php
                                                    if (in_array('NETSCAPE', $browser_values)) {
                                                        echo 'selected';
                                                    }
                                                    ?>>Netscape</option>
                                                    <option value="SAFARI"<?php
                                                    if (in_array('SAFARI', $browser_values)) {
                                                        echo 'selected';
                                                    }
                                                    ?>>Safari</option>
                                                </select>
                                            </div>
                                        <?php } else { ?>
                                            <div class="group np_des_wi420 fll" id="browser_list" style="display: none;">
                                                <p class="fs14 np_des_mab2 np_des_mab10"> Choose Browser Type </p>
                                                <select class="oneshop_select_newfield_with_border1" multiple="multiple" id="multi_browsers" >

                                                    <option value="CHROME">Chrome </option>
                                                    <option value="FIREFOX">Firefox</option>
                                                    <option value="OPERA">Opera</option>
                                                    <option value="IE">IE</option>
                                                    <option value="NETSCAPE">Netscape</option>
                                                    <option value="SAFARI">Safari</option>
                                                </select>
                                            </div>
                                        <?php } ?>
                                        <div class="group np_des_wi420 fll">
                                            <p class="fs14 np_des_mab2 np_des_mab10"> Operating System Based </p>
                                            <select class="oneshop_select_newfield_with_border" id="os_access" name="os_access">
                                                <option value="ANY"<?php if ($symanticsdata[0]['operating_system'] === 'ANY') echo ' selected="selected"' ?>> Any </option>
                                                <option value="PARTICULAR"<?php if ($symanticsdata[0]['operating_system'] === 'PARTICULAR') echo ' selected="selected"' ?>>Particular </option>


                                            </select>
                                        </div>
                                        <?php if ($symanticsdata[0]['operating_system'] != "ANY") { ?>

                                            <div class="group np_des_wi420 fll" id="os_list" >
                                                <?php $os_values = explode(",", $symanticsdata[0]['operatingsystem_str']); ?>

                                                <p class="fs14 np_des_mab2 np_des_mab10"> Choose Operating System  </p>
                                                <select class="oneshop_select_newfield_with_border1" multiple="multiple" id="multi_operatingsystems" >
                                                    <option value="BLACKBERRY"<?php
                                                    if (in_array('BLACKBERRY', $os_values)) {
                                                        echo 'selected';
                                                    }
                                                    ?>>Blackberry </option>
                                                    <option value="WINDOWS"<?php
                                                    if (in_array('WINDOWS', $os_values)) {
                                                        echo 'selected';
                                                    }
                                                    ?>>Windows </option>
                                                    <option value="SYMBIAN"<?php
                                                    if (in_array('SYMBIAN', $os_values)) {
                                                        echo 'selected';
                                                    }
                                                    ?>>Symbian </option>
                                                    <option value="BADA"<?php
                                                    if (in_array('BADA', $os_values)) {
                                                        echo 'selected';
                                                    }
                                                    ?>>Bada </option>
                                                    <option value="IOS"<?php
                                                    if (in_array('IOS', $os_values)) {
                                                        echo 'selected';
                                                    }
                                                    ?>>Ios </option>
                                                    <option value="PLMOS"<?php
                                                    if (in_array('PLMOS', $os_values)) {
                                                        echo 'selected';
                                                    }
                                                    ?>>Plmos </option>
                                                    <option value="LINUX"<?php
                                                    if (in_array('LINUX', $os_values)) {
                                                        echo 'selected';
                                                    }
                                                    ?>>Linux </option>
                                                    <option value="UNIX"<?php
                                                    if (in_array('UNIX', $os_values)) {
                                                        echo 'selected';
                                                    }
                                                    ?>>Unix </option>
                                                    <option value="DOS"<?php
                                                    if (in_array('DOS', $os_values)) {
                                                        echo 'selected';
                                                    }
                                                    ?>>Dos </option>
                                                    <option value="ANDROID"<?php
                                                    if (in_array('ANDROID', $os_values)) {
                                                        echo 'selected';
                                                    }
                                                    ?>>Android </option>
                                                </select>
                                            </div>
                                        <?php } else { ?>
                                            <div class="group np_des_wi420 fll" id="os_list" style="display: none;"  >
                                                <p class="fs14 np_des_mab2 np_des_mab10"> Choose Operating System  </p>
                                                <select class="oneshop_select_newfield_with_border1" multiple="multiple" id="multi_operatingsystems" >


                                                    <option value="BLACKBERRY">Blackberry </option>
                                                    <option value="WINDOWS">Windows</option>
                                                    <option value="SYMBIAN">Symbian</option>
                                                    <option value="BADA">Bada</option>
                                                    <option value="IOS">IOS</option>
                                                    <option value="PLMOS">Plmos</option>
                                                    <option value="LINUX">Linux</option>
                                                    <option value="UNIX">Unix</option>
                                                    <option value="DOS">Dos</option>
                                                    <option value="ANDROID">Android</option>
                                                </select>
                                            </div>
                                        <?php } ?>
                                    </div>

                                    <div class="flr">
                                        <input type="button" class="button_new os_des_mal10" value="Save" id="symantics_save">
                                        <input type="button" class="button_new os_des_mal10" value="Cancel" id="symantics_cancel">
                                    </div>

                            </div>

                            </form>
                        </div>

                    </div>
                </div>

                <div class="clearfix">&nbsp;</div>



                <div class="fll wi100pstg">





                    <div class="clearfix">&nbsp;</div>

                    <div class="fll overflow">

                        <div class="ttdes_flightsearch_topheadings_box fll">
                            <div class="ttdes_flight_departure_box"> Restricition </div>
                            <div class="ttdes_flight_arrival_box"> Any/Particular</div>
                            <div class="ttdes_flight_duration_box"> Details </div>
                        </div>

                        <div class="ttdes_flightsearch_history_content fll">
                            <div class="ttdes_stores_orderid pat5 os_des_pab5"> Device Type Restriction </div>
                            <div class="ttdes_stores_date pat5 os_des_pab5">
                                <?php echo $symanticsdata[0]['device_type']; ?>

                            </div>
                            <div class="ttdes_flight_duration_box pat5 os_des_pab5">
                                <?php
                                if ($symanticsdata[0]['device_type'] != "ANY")
                                    echo $symanticsdata[0]['device_str'];
                                else
                                    echo "No Restricitions";
                                ?>  </div>
                        </div>

                        <div class="ttdes_flightsearch_history_content fll">
                            <div class="ttdes_stores_orderid pat5 os_des_pab5"> Browser Based Restriction </div>
                            <div class="ttdes_stores_date pat5 os_des_pab5">
                                <?php echo $symanticsdata[0]['browsers']; ?>
                            </div>
                            <div class="ttdes_flight_duration_box pat5 os_des_pab5">
                                <?php
                                if ($symanticsdata[0]['browsers'] != "ANY")
                                    echo $symanticsdata[0]['browser_str'];
                                else
                                    echo "No Restricitions";
                                ?> </div>
                        </div>


                        <div class="ttdes_flightsearch_history_content fll">
                            <div class="ttdes_stores_orderid pat5 os_des_pab5"> Location Based Restriction </div>
                            <div class="ttdes_stores_date pat5 os_des_pab5">
                                <?php echo $symanticsdata[0]['location_access']; ?>

                            </div>
                            <div class="ttdes_flight_duration_box pat5 os_des_pab5"> <?php
                                if ($symanticsdata[0]['location_access'] != "ANY") {
                                    foreach ($countrynames as $cnames) {
                                        $cunnames = strtoupper($cnames['country_name']) . ",";
                                        echo $cunnames;
                                    }
                                } else {
                                    echo "No Restricitions";
                                }
                                ?> </div>
                        </div>
                        <div class="ttdes_flightsearch_history_content fll">
                            <div class="ttdes_stores_orderid pat5 os_des_pab5"> Operating System Restriction </div>
                            <div class="ttdes_stores_date pat5 os_des_pab5">
<?php echo $symanticsdata[0]['operating_system']; ?>

                            </div>
                            <div class="ttdes_flight_duration_box pat5 os_des_pab5">
<?php
if ($symanticsdata[0]['operating_system'] != "ANY")
    echo $symanticsdata[0]['operatingsystem_str'];
else
    echo "No Restricitions";
?>
                            </div>
                        </div>
                    </div>

                </div>








            </section>
            <section id="control_login_activities" class="minheight600">
                <h1 class="wi100pstg os_des_borderbottom os_des_pab5 normal np_des_mab10"> Control Login Activities  </h1>

                <div class="right_cont_newwrapper np_des_mat25">


                    <div class="fll np_des_mab10">
                        <p class="fll np_des_mar10 np_des_mat10"> Filter : </p>
                        <select class="flight_selectbox_one fll " id="device">
                            <option value="">Select</option>
                            <option value="Computer">Computer</option>;
                            <option value="Mobile">Mobile</option>
                            <option value="Tablet">Tablet</option>
                        </select>
                        <select class="flight_selectbox_one fll" id="os">
                            <option value="" >Select</option>
                            <option value="Windows">Windows</option>;
                            <option value="Linux">Linux</option>
                            <option value="Mac">Mac</option>
                            <option value="Android">Android</option>
                            
                            
                        </select>
                       <!-- <input type="button" value="GO" class="button_go flr">-->
                    </div>

                    <div class="fll overflow">

                        <div class="ttdes_login_control fll">
                            <div class="ttdes_flight_departure_box"> Device </div>
                            <div class="ttdes_flight_browser"> Browser </div>
                            <div class="ttdes_flight_ipaddress">  Login </div>
                              <div class="ttdes_flight_browser">  Time </div>
                            <div class="ttdes_flight_browser"> IP Address </div>
                            <div class="ttdes_flight_browser"> Status </div>
                            <div class="ttdes_flight_reset"> Action </div>
                        </div>




<?php
//                        echo "<pre>";                        print_R($activitydata);                        echo "</pre>";

foreach ($activitydata as $activdata) {
    $useragent = explode('/', $activdata['user_agent']);
    $countrydata = json_decode($activdata['loc_dump']);
    ?>
                        <?php
                        if (preg_match("/Windows/i", $useragent[1])) {
                            $os= "Windows";
                        } else if (preg_match("/Linux; Android/i", $useragent[1])) {
                            $os="Android";
                        } else if (preg_match("/Linux/i", $useragent[1])) {
                            $os= "Linux";
                        }
    ?>
                            <div class="ttdes_login_control_content login_details fll <?php echo ucfirst(strtolower($activdata['device_type']))." ".$os." ".ucfirst(strtolower($activdata['device_type'])).$os; ?>">
                                <div class="ttdes_stores_orderid pat5 os_des_pab5"> <?php echo ucfirst(strtolower($activdata['device_type'])); ?> </div>
                                <div class="ttdes_flight_browser pat5 os_des_pab5"> <?php echo $useragent[0] ?>  </div>
                                <div class="ttdes_flight_browser pat5 os_des_pab5"> <?php echo $os; ?>  </div>

                                <div class="ttdes_flight_ipaddress pat5 os_des_pab5"> <?php echo date('d-M,Y ', strtotime($activdata['login_time'])) ?>  </div>
                                <div class="ttdes_flight_browser os_des_pab5 pat5"> <?php echo $activdata['ip_address'] ?> </div>
                                <div class="ttdes_flight_browser pat5 os_des_pab5 logstatus<?php echo $activdata["login_id"]; ?>"  > <?php
                                    if ($activdata['is_active'] == 1) {
                                        echo 'Login';
                                    } else {
                                        echo "Logout";
                                    }
                                    ?>  </div>
                                <?php if ($activdata['is_active'] == 1) {
                                    ?>
                                    <div class="ttdes_flight_reset os_des_pab5 pat5 loged_update" lgid="<?php echo $activdata['login_id']; ?>"> <a href="">Reset</a> </div>
                                    <?php }
                                ?>

  </div>

<?php } ?>
                                 </div>
            </section>
        </div>
    </div>
</div> <!--module container end here-->

<div class="clearfix"></div>

<?php $this->templates->basic_info_footer(); ?>


<script src="<?php echo base_url(); ?>/assets/microjs/preferences.js"></script>

