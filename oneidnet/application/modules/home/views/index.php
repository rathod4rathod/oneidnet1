<?php
$this->load->module('templates');
$this->templates->index_header();
$this->session->userdata('user_id');
if ($gender == "MALE") {
    $img = base_url() . "assets/Images/contentImages/person.png";
} else {
    $img = base_url() . "assets/Images/contentImages/female.png";
}
?>
<body>
    <div class="oneidsystemPopup trashPopup">
        <span class="oneidsystemPopupCloseBtn">X</span>
        <div class="trashpopUpWrapper">
            <ul></ul>
            <div class="trashPopUpFooter">
                <span class="trashFooterOptions">
                    <button class="selectAll">Select All</button>
                    <button>Cancel</button>
                    <button>Restore</button>
                    <button class="restoreAll">Restore All</button>
                </span>
            </div>
        </div>
    </div>

    <div class="oneidsystemPopup settingsPopup">
        <span class="oneidsystemPopupCloseBtn">X</span>
        <div class="trashpopUpWrapper">
            <ul></ul>
            <div class="trashPopUpFooter">
                <span class="trashFooterOptions">
                    <button>Cancel</button>
                    <button>Save</button>
                </span>
            </div>
        </div>
    </div>



    <div class="oneidsystemPopup aboutMePopup">
        <span class="oneidsystemPopupCloseBtn">X</span>
        <div class="trashpopUpWrapper">
            <ul></ul>
        </div>
    </div>


    <div class="mainWrapper">


        <div class="bg_trans"></div>

        <!--System Top Section Ends Here Vinod (18-08-2015)-->
        <div class="systemWrapper">

            <div class="topheader_newicons"> 
                <div class="logoleft_newbox">
                    <img src="<?php echo base_url(); ?>assets/Images/oneidlogo.png" class="oneidLogo_topheader">   
                </div>

                <div class="moduleProfileInfoWrap">
                    <span class="moduleProfileInfoPicWrap">
                        <a href="#">
                            <img id="nhpfpath" alt="Viewprofile" src="<?php if ($img_path) {
    echo base_url() . 'data/' . $img_path;
} else {
    echo $img;
} ?>">
                        </a>
                    </span>
                    <span class="moduleProfileInfoNameWrap">
                        <a href="#">
                            <h4 style="margin-left: 10px; margin-top: 5PX;" id="nhpname"><?php echo $first_name . " " . $last_name; ?></h4>
                        </a>
                    </span>     
                </div>

                <div class="overflow mar1pstg">
                    <p class="uparrow_div fullIframe flr"><a href="#" > <img src="assets/Images/uparrow.png">   </a></p>
                    <p class="uparrow_div minimizeIframe flr"><a href="#"> <img src="assets/Images/minicollapse.png">  </a></p> 

                </div>   

            </div>

            <div class="topheader_linewrap"> 
                <p class="pullTopMenu flr"><a href="#"> <img src="<?php echo base_url() . 'assets/' ?>Images/down3.png">  </a></p> 
            </div>     



            <div class="systemTopWrapper">
                <div class="topLeftWrapper">
                    <i class="sprite sprite-OD088_logo oneidLogo"></i>
                    <div class="logo_text">  one<br>id net</div>

                    </h1></span>
                </div>

                <div class="systemTopOuterWrapper">
                    <div class="globalInfoWrapper">
                        <div class="globalInfoContent">

                            <div class="btns expandIframe themeIcon_expand fll sprite-029-minimise sprite sprite-OD073_fullscreen " id="expanddiv" title="Full Screen">
                        <!--<img src="<?php echo base_url() . 'assets/' ?>Images/minimise.png" title ="Expand" class="themeIcon_expand" id="expanddiv">-->
                            </div>

                            <div class="logoutBtn" title="Logout">
                                <!--<a href="<?php echo base_url() . 'index.php/login/doLogout' ?>" style="color: white;" class="oneidnetlogout" ></a>-->

                                <a href="<?php echo base_url() . 'index.php/login/doLogout'?>" style="color: white;width: 25px;height: 25px;display:inline-block;" > <i class="sprite sprite-OD075_logout"></i></a>

                            </div>



                            <span class="globalProfileInfoWrapper">
                                <span class="profilePic">

                                    <img src="<?php if ($img_path) {
    echo base_url() . 'data/' . $img_path;
} else {
    echo $img;
} ?>" id="profile_image_tag" title="User Profile Picture">
                                </span>
                                <h1 id="userFullName_home"><?php echo $first_name . " " . $last_name; ?></h1>
                                <h4 id="email_homepg"><?php echo $email; ?></h4>
                            </span>
                            <span class="globalWeather">
                                <i class="sprite sprite-OD074_weather1 weatherIcon"></i>
                                <span class="weather"><h1 id="tempDeg_home">Loading ...</h1></span>
                                <span class="location"><h4 id="city_home">Loading ...</h4></span>

                            </span>

                            <span class="globalDate">
                                <i class="sprite sprite-OD075_oneidCalendar" style="float: left;margin-top: 7px;margin-right: 4px;"></i><h1><?php echo date("d"); ?></h1><h2><?php echo date("D"); ?></br><?php echo date("M"); ?></h2>

                            </span>


                            <span class="globalTime"><h1>
                                    <div id="clock"></div></h1>
                            </span> 
                            <span class="oneiduser">
                                <img src="<?php echo base_url()."assets/Images/search.png";?>" id="search"/>
                                <input type="text" placeholder="ONEIDNET USERS" id="oneidet_user_search"/>
                                <div style="display: none;" id="searchsugbox" class="">
                                  <ul class="findcontact_sugg" id="systemSuggestion">
                                    <li id="313239" class="usersug"> <img src="https://localhost/oneidnet/data/profile_photo_1292016-09-02-15-49-58.jpg">
                                      <h3>shiva jyothi</h3>
                                    </li>
                                    
                                  </ul>
                                </div>
                            </span>

                        </div>
                    </div>


                    <!--System Top Module Container Starts Here vinod(18-08-2015)-->
                    <div class="topModulesContainer">


                        <div class="topMicroModuleWrapper mmw" id="oneshop">
                            <div class="mmHeader oneshop sprite-005-oneshop" onClick="mmRestore(this)">
                                <span class="mmhoptions">
                                    <ul>
                                        <li class="mmhoDelete"><img src="<?php echo base_url() . 'assets/' ?>Images/delete.png"></li>
                                        <li class="mmhoRestore ntosstore" style="display:none;" ><p id="os_notify_count" ></p></li>

                                    </ul>
                                </span>
                            </div>

                            <div class="mmContainer" id="oneshopContainer">
                                <div class="microOneshopContentWrapper oneshop">
                                    <div class="mmContentWrapperType1">
                                        <div class="mmcMainWrapper" id="os_notify_slider">

                                        </div>
                                    </div>
                                </div>
                            </div>



                        </div>

                        <div class="topMicroModuleWrapper mmw" id="netpro">
                            <div class="mmHeader netpro sprite-002-netpro" onClick="mmRestore(this)">
                                <span class="mmhoptions">
                                    <ul>
                                        <li class="mmhoDelete"><img src="<?php echo base_url() . 'assets/Images/delete.png' ?>"></li>
                                        <li class="mmhoRestore"><p id="ntpntcnt"></p></li>
                                    </ul>
                                </span>
                            </div>

                            <div class="mmContainer" id="netproContainer">
                                <div class="microNetproContentWrapper netpro">
                                    <div class="mmContentWrapperType1">
                                        <div class="mmcMainWrapper" id="netpro_notify_slider">
                                            <div class="mmcMainSlideWrapper" id="netpronotifications">




                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="topMicroModuleWrapper mmw" id="cooffice">
                            <div class="mmHeader cooffice sprite-006-cooffice" onClick="mmRestore(this)">
                                <span class="mmhoptions">
                                    <ul>
                                        <li class="mmhoDelete"><img src="<?php echo base_url() . 'assets/' ?>Images/delete.png"></li>
                                        <li class="mmhoRestore"><p id="co_notify_cnt"></p></li>
                                    </ul>
                                </span>
                            </div>
                            <div class="mmContainer" id="coofficeContainer">
                                <div class="microCoofficeContentWrapper cooffice">
                                    <div class="mmContentWrapperType1">
                                        <div class="mmcMainWrapper" id="co_notify_slider">

                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>


                        <div class="topMicroModuleWrapper mmw" id="cvbank">
                            <div class="mmHeader cvbank sprite-003-cvbank" onClick="mmRestore(this)">
                                <span class="mmhoptions">
                                    <ul>
                                        <li class="mmhoDelete"><img src="Images/delete.png"></li>
                                        <li class="mmhoRestore"><p id="cvbank_cnt"></p></li>
                                    </ul>
                                </span>
                            </div>

                            <div class="mmContainer" id="cvbankContainer">
                                <div class="microCvbankContentWrapper cvbank">
                                    <div class="mmContentWrapperType1">
                                        <div class="mmcMainWrapper" id="cvbank_notify_slider">
                                            <div class="mmcMainSlideWrapper">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="topMicroModuleWrapper mmw" id="traveltime">
                            <div class="mmHeader traveltime sprite-014-traveltime" onClick="mmRestore(this)">
                                <span class="mmhoptions">
                                    <ul>
                                        <li class="mmhoDelete"><img src="<?php echo base_url() . 'assets/' ?>Images/delete.png"></li>
                                        <li class="mmhoRestore1"><p></p></li>
                                    </ul>
                                </span>
                            </div>
                            <div class="mmContainer">
                                <div class="microTraveltimeContentWrapper">
                                    <div class="mmContentWrapperType1 cmng-soon">
                                        <div class="mmcMainWrapper">
                                            <div class="mmcMainSlideWrapper">
                                                <div class="mmcMainInnerWrapper">
                                                    <span class="mmciconWrapper3 icon"><i class="sprite sprite-OD089_banned" style="margin:0 auto 4px;"></i></span>
                                                    <span class="mmcTextWrapper3 text">
                                                        <h2>Module deactivated</h2>
                                                    </span>
                                                </div>
                                            </div>
                                        </div> </div>
                                </div>
                            </div>
                        </div>



                        <div class="topMicroModuleWrapper mmw" id="oneidship">
                            <div class="mmHeader oneidship sprite-016-oneidship" onClick="mmRestore(this)">
                                <span class="mmhoptions">
                                    <ul>
                                        <li class="mmhoDelete"><img src="<?php echo base_url() . 'assets/' ?>Images/delete.png"></li>
                                        <li class="mmhoRestore1"><p></p></li>
                                    </ul>
                                </span>
                            </div>
                            <div class="mmContainer">
                                <div class="microOneidshipContentWrapper">
                                    <div class="mmContentWrapperType1 cmng-soon">
                                        <div class="mmcMainWrapper">
                                            <div class="mmcMainSlideWrapper">
                                                <div class="mmcMainInnerWrapper">
                                                    <span class="mmciconWrapper3 icon"><i class="sprite sprite-OD089_banned" style="margin:0 auto 4px;"></i></span>
                                                    <span class="mmcTextWrapper3 text">
                                                        <h2>Module deactivated</h2>
                                                    </span>
                                                </div>
                                            </div>
                                        </div> </div></div>
                            </div>
                        </div>









                    </div>
                    <!--System Top Module Container Ends Here vinod(18-08-2015)-->


                </div>


                <div class="topRighttWrapper">



                    <div class="btns expandAll"><span class="oneidnetexpand" title="Expand All"></span>
                    </div>
                    <div class="btns collapseAll"><span class="oneidnetcollapse" title="Collapse All"></span>
                    </div>
                    <a href="<?php echo base_url() . "myaccount"; ?>"><div class="btns"><span class="oneidnetpaybook" title="Paybook"></span><p>Pay Book</p></div></a>                   

 <!--<span class="btns settings">                        <img src="<?php //echo base_url() . 'assets/'  ?>Images/settings.png" title ="Settings" class="systemIcons"><p>Settings</p></span>-->
                    <a href="<?php echo base_url() . "basic_info"; ?>"><div class="btns"> <span class="oneidnetsettings" text="settings" title="Settings"> </span>                      <p>Settings</p></div></a>
                    <a href="<?php echo base_url() . 'home/aboutus' ?>" title="About Us" class="active_link">
                        <span class="btns aboutUs sprite-017-aboutus">



                        </span>
                    </a> 



                    <a href="<?php echo base_url() . 'home/policies' ?>" title="Policies">
                        <span class="btns edbtn enable sprite-026-policy">

                        </span>
                    </a>


                    <a href="<?php echo base_url() . 'home/foundation' ?>" title="Foundation">
                        <span class="btns edbtn enable sprite-023-foundation">
                        </span>
                    </a>

                    <a href="<?php echo base_url() . 'home/privacy' ?>" title="Privacy">
                        <span class="btns edbtn enable sprite-027-privacy">
                        </span></a>

                    <span class="btns edbtn enable">
                        <a href="<?php echo base_url() . "home/termsconditions"; ?>"><img src="<?php echo base_url() . "assets/Images/regImages/tc.png"; ?>" title="Terms &amp; Conditions" class="themeIcons"> </a>
                    </span>
                    <a href="<?php echo base_url() . 'home/customersupport' ?>" title="Customer Support">
                        <span class="btns edbtn enable sprite-021-cs">

                        </span>
                    </a>

                    <a href="<?php echo base_url() . 'home/contactus' ?>" title="Contact Us">
                        <span class="btns edbtn enable sprite-020-contactus">

                        </span>
                        <a href="<?php echo base_url() . 'home/allinone' ?>" title="All In One">
                            <span class="btns edbtn enable sprite-018-allinone ">
                            </span></a>









                </div>




            </div>


            <!--System Top Section Ends Here Vinod (18-08-2015)-->

            <div class="systemBottomWrapper">

                <div class="systemContainerWrapper1" id="moduleSectionContainer">
                    <div id="contentcolumn" style="margin-left: 140px; margin-right: 144px;">
                        <div class="innertube">
                            <iframe id='main_iframe'  allowfullscreen="true" webkitallowfullscreen="true" mozallowfullscreen="true" class="middle_bg" width="100%" height="100%" style="border: 0px;" src="load"></iframe>
                            <script type="text/javascript">filltext(40)</script>
                        </div>
                    </div> 
                </div>

                <div id="leftcolumn">
                    <div class="innertube">

                        <div class="bottomLeftWrapper1">
                            <div class="leftSideOptionsWrapper">
                                <ul>
                                    <!-- <li class="expandSelected">Expand Selected</li>
                                     <li class="collapseSelected">Collapse Selected</li>
                                     <li class="reset">Reset</li>
                                     <li class="delete">Delete</li>-->
                                </ul>
                                <!--<div class="leftSideOptions"></div>-->
                                <span class="systemTrash"><img src="<?php echo base_url() . 'assets/' ?>Images/Trash.png"></span>
                            </div>

                            <div class="leftModulesContainer">




                                <div class="leftMicroModuleWrapper mmw" id="vcom">
                                    <div class="mmHeader vcom sprite-013-vcom" onClick="mmRestore(this)">
                                        <span class="mmhoptions">
                                            <ul>
                                                <li class="mmhoDelete"><img src="<?php echo base_url() . 'assets/' ?>Images/delete.png"></li>
                                                <li class="mmhoRestore1"><p></p></li>
                                            </ul>
                                        </span>
                                    </div>
                                    <div class="mmContainer">
                                        <div class="microVcomContentWrapper">
                                            <div class="mmContentWrapperType1 cmng-soon">
                                                <div class="mmcMainWrapper">
                                                    <div class="mmcMainSlideWrapper">
                                                        <div class="mmcMainInnerWrapper">
                                                            <span class="mmciconWrapper3 icon"><i class="sprite sprite-OD090_warning" style="margin:0 auto 4px;"></i></span>
                                                            <span class="mmcTextWrapper3 text">
                                                                <h2>Broadcasting<br/>not enabled</h2>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div> </div>
                                        </div>
                                    </div>
                                </div>



                                <div class="leftMicroModuleWrapper mmw" id="tunnel_notify">
                                    <div class="mmHeader tunnel sprite-009-tunnel" onClick="mmRestore(this)">
                                        <span class="mmhoptions">
                                            <ul>
                                                <li class="mmhoDelete"><img src="<?php echo base_url() . 'assets/' ?>Images/delete.png"></li>
                                                <li class="mmhoRestore tmmhoRestore" style="display:none"><p id="oneid_tundev_nft_count"></p></li>
                                            </ul>
                                        </span>
                                    </div>
                                    <div class="mmContainer" id="tunnelContainer">
                                        <div class="microTunnelContentWrapper tunnel">
                                            <div class="mmContentWrapperType1">
                                                <div class="mmcMainWrapper" id="tunnel_slider_notify">
                                                    <div class="mmcMainSlideWrapper" id="tun_ntf_count">



                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                </div>

                                <div class="leftMicroModuleWrapper mmw" id="buzzin">


                                    <div class="mmHeader buzzin sprite-008-buzzin" onClick="mmRestore(this)">
                                        <span class="mmhoptions">
                                            <ul>
                                                <li class="mmhoDelete"><img src="<?php echo base_url() . 'assets/' ?>Images/delete.png"></li>
                                                <li class="mmhoRestore bzntf_count" style="display:none"><p id="buzzin_notification_cnt"></p></li>
                                            </ul>
                                        </span>
                                    </div>

                                    <div class="mmContainer" id="buzzinContainer">
                                        <div class="microBuzzinContentWrapper buzzin">
                                            <div class="mmContentWrapperType1">
                                                <div class="mmcMainWrapper">

                                                    <div class="mmcMainSlideWrapper" id="buzz_notify_slider">


                                                    </div>

                                                </div>            
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="leftMicroModuleWrapper mmw" id="click">

                                    <div class="mmHeader click sprite-007-click" onClick="mmRestore(this)">
                                        <span class="mmhoptions">
                                            <ul>
                                                <li class="mmhoDelete"><img src="<?php echo base_url() . 'assets/' ?>Images/delete.png"></li>
                                                <li class="mmhoRestore cnotify_cnt" style="display:none;"><p id="click_notification_cnt"></p></li>
                                            </ul>
                                        </span>
                                    </div>                

                                    <div class="mmContainer" id="clickContainer">
                                        <div class="microClickContentWrapper click">
                                            <div class="mmContentWrapperType1">
                                                <div class="mmcMainWrapper" id="click_slider_view">
                                                    <div class="mmcMainSlideWrapper" id="click_notification_slider">

                                                    </div>
                                                </div>            
                                            </div>
                                        </div>
                                    </div>




                                </div>

                                <div class="leftMicroModuleWrapper mmw" id="mail">
                                    <div class="mmHeader mail sprite-001-mail" onClick="mmRestore(this)">
                                        <span class="mmhoptions">
                                            <ul>
                                                <li class="mmhoDelete"><img src="Images/delete.png"></li>
                                                <li class="mmhoRestore1"><p>
<?php
//$obj = $this->load->module('mail_notifications');
// $obj->notificationsCount();
?></p></li>
                                            </ul>
                                        </span>
                                    </div>
                                    <div class="mmContainer" id="mailContainer">
                                        <div class="microMailContentWrapper mail">
                                            <div class="mmContentWrapperType1">
                                                <div class="mmcMainWrapper">
                                                    <div class="mmcMainSlideWrapper">
                                                        <div class="mmcMainInnerWrapper">
                                                            <span class="mmciconWrapper">
                                                                <i class="sprite sprite-OD001_mail"></i></span>
                                                            <span class="mmcTextWrapper">
                                                                <h2>
<?php
//$obj = $this->load->module('mail_notifications');
//echo $obj->getNewMails();
?></h2>
                                                                <p>New Mails</p>
                                                            </span>
                                                            <div class="mmcMarqueWrapper">
                                                                <marquee class="mmcmarqueClass">
<?php
//$obj = $this->load->module('mail_notifications');
//echo $obj->emNotifsGet();
?>
                                                                </marquee>
                                                            </div>
                                                        </div>
                                                        <div class="mmcMainInnerWrapper">
                                                            <span class="mmciconWrapper3"><img src="<?php echo base_url(); ?>assets/Images/contentImages/events.png"></span>
                                                            <span class="mmcTextWrapper3">
                                                                <h2>
<?php
//$obj = $this->load->module('mail_notifications');
//echo $obj->newevents();
?></h2>
                                                            </span>
                                                        </div>
                                                        <div class="mmcMainInnerWrapper">
                                                            <span class="mmciconWrapper3"><img src="<?php echo base_url(); ?>assets/Images/contentImages/group.png"></span>
                                                            <span class="mmcTextWrapper3">
                                                                <h2>
<?php
//$obj = $this->load->module('mail_notifications');
//echo $obj->newmeetings();
?></h2>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </ul>
                                <script type="text/javascript">filltext(20)</script>
                            </div>
                        </div>    </div>
                </div>


                <!-- right side -->
                <div id="rightcolumn">
                    <div class="innertube">
                        <div class="bottomRightWrapper1">
                            <div class="rightModulesContainer">




                                <div class="rightMicroModuleWrapper mmw" id="findit">
                                     <div class="mmHeader findit sprite-004-findit" onClick="mmRestore(this)">
                                        <span class="mmhoptions">
                                            <ul>
                                                <li class="mmhoDelete"><img src="<?php echo base_url() . 'assets/' ?>Images/delete.png"></li>
                                                <li class="mmhoRestore fntnotify_cnt" style="display: none;"><p id="finditnotify"></p></li>
                                            </ul>
                                        </span>
                                    </div>

                                    <div class="mmContainer" id="finditContainer">
                                        <div class="microFinditContentWrapper findit">
                                            <div class="mmContentWrapperType1">
                                                <div class="mmcMainWrapper">
                                                    <div class="mmcMainSlideWrapper">
                                                        <div class="mmcMainInnerWrapper">
                                                            <span class="mmciconWrapper3"><i class="sprite sprite-OD015_find" style="margin:2px 0 0 17px;"></i></span>
                                                            <span class="mmcTextWrapper3">
                                                                <h2>Index your page with us</h2>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="rightMicroModuleWrapper mmw" id="isnews">
                                    <div class="mmHeader isnews sprite-012-isnews" onClick="mmRestore(this)">
                                        <span class="mmhoptions">
                                            <ul class="isnews">
                                                <li class="mmhoDelete"><img src="<?php echo base_url() . 'assets/' ?>Images/delete.png"></li>
                                                <li class="mmhoRestore" style="display:none"><p id="isn_notify_cnt"></p></li> <!-- Originally it looks like <li class="mmhoRestore"><p>2</p></li> -->
                                            </ul>
                                        </span>
                                    </div>
                                    <div class="mmContainer">
                                        <div class="microIsnewsContentWrapper">
                                            <div class="mmContentWrapperType1">
                                                <div class="mmcMainWrapper" id="isnews_notify_slider">

                                                </div> </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="rightMicroModuleWrapper mmw" id="onevision">
                                    <div class="mmHeader onevision sprite-015-onevision" onClick="mmRestore(this)">
                                        <span class="mmhoptions">
                                            <ul>
                                                <li class="mmhoDelete"><img src="<?php echo base_url() . 'assets/' ?>Images/delete.png"></li>
                                                <li class="mmhoRestore1"><p></p></li>
                                            </ul>
                                        </span>
                                    </div>
                                    <div class="mmContainer">
                                        <div class="microOnevisionContentWrapper">
                                            <div class="mmContentWrapperType1 cmng-soon">
                                                <div class="mmcMainWrapper">
                                                    <div class="mmcMainSlideWrapper">
                                                        <div class="mmcMainInnerWrapper">
                                                            <span class="mmciconWrapper3 icon"><i class="sprite sprite-OD089_banned" style="margin:0 auto 4px;"></i></span>
                                                            <span class="mmcTextWrapper3 text">
                                                                <h2>Module deactivated</h2>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div> </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="rightMicroModuleWrapper mmw" id="dealerx">


                                    <div class="mmHeader dealerx sprite-010-dealerx" onClick="mmRestore(this)">
                                        <span class="mmhoptions">
                                            <ul>
                                                <li class="mmhoDelete"><img src="<?php echo base_url() . 'assets/' ?>Images/delete.png"></li>
                                                <li class="mmhoRestore"><p id="dx_notify_cnt"></p></li>
                                            </ul>
                                        </span>
                                    </div>

                                    <div class="mmContainer" id="dealerxContainer">
                                        <div class="microDealerxContentWrapper dealerx">
                                            <div class="mmContentWrapperType1">
                                                <div class="mmcMainWrapper" id="dx_notify_slider">


                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>



                                <div class="rightMicroModuleWrapper mmw" id="onenetwork">
                                    <div class="mmHeader onenetwork sprite-011-onenetwork" onClick="mmRestore(this)">
                                        <span class="mmhoptions">
                                            <ul>
                                                <li class="mmhoDelete"><img src="<?php echo base_url() . 'assets/' ?>Images/delete.png"></li>
                                                <li class="mmhoRestore onenetworkntfcnt" style="display:none;"><p id="ontnotify"></p></li>
                                            </ul>
                                        </span>
                                    </div>

                                    <div class="mmContainer" id="onenetworkContainer">
                                        <div class="microOnenetworkContentWrapper onenetwork">
                                            <div class="mmContentWrapperType1">
                                                <div class="mmcMainWrapper">
                                                    <div class="mmcMainSlideWrapper" id="onenetworkntfBulk">



                                                        <div class="mmcMainInnerWrapper">
                                                            <span class="mmciconWrapper"><i class="sprite sprite-OD042_persons"></i></span>
                                                            <span class="mmcTextWrapper">
                                                                <h2></h2>
                                                                <p> campaigns </p>
                                                            </span>
                                                            <div class="mmcMarqueWrapper">
                                                                <marquee class="mmcmarqueClass"><?php
$obj_onenetworknot = $this->load->module('onenetworkNotifs');
$obj_onenetworknot->getOnenetworkNotifs();
?></marquee>
                                                            </div>
                                                        </div>

                                                        <script type="text/javascript">filltext(20)</script>
                                                    </div></div>

                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>


                        </div>



                    </div>


                </div>

            </div>
        </div>

    </div>
</body>
<script src="<?php echo base_url() . 'assets/microjs/prototype.js' ?>"></script>
<script src="<?php echo base_url() . 'assets/microjs/homepage.js' ?>"></script>
</html>



<script>
                                                            //for oneidnet profile pic edit
                                                            $('input[type="file"]#profile_image_path').bind('change', function (e) {

                                                                e.preventDefault();
                                                                var files = e.originalEvent.target.files;
                                                                var file_name = files[0].name;
                                                                var file_size = files[0].size;
                                                                var file_type = files[0].type;
                                                                if (file_size <= 512000 && (file_type == 'image/gif' || file_type == 'image/jpg' || file_type == 'image/png' || file_type == 'image/jpeg')) {
                                                                    $('#profile_image').submit();

                                                                } else {

                                                                    if (file_size > 512000) {
                                                                        alert("Allow file size should be below 500kb");
                                                                    } else {
                                                                        alert("Allow file type should be jpg|png|gif|jpeg");
                                                                    }
                                                                }
                                                            });

                                                            $('#profile_image').submit(function () {
                                                                $.ajax({
                                                                    type: 'POST',
                                                                    url: oneidnet_url + "index.php/home/profile_image_update",
                                                                    data: new FormData(this),
                                                                    processData: false,
                                                                    contentType: false,
                                                                    success: function (data) {
                                                                        var data_path = $.trim(data);
                                                                        var profilepic_path = oneidnet_url + data_path;
                                                                        $('#profile_image_tag').attr('src', profilepic_path);

                                                                    }
                                                                });
                                                                return false;
                                                            });



</script>
<script type="text/javascript">
    function startTime()
    {
        var today = new Date()
        var h = today.getHours()
        var m = today.getMinutes()
        var s = today.getSeconds()
        var ap = "AM";

//to add AM or PM after time

        if (h > 11)
            ap = "PM";
        if (h > 12)
            h = h - 12;
        if (h == 0)
            h = 12;

//to add a zero in front of numbers<10

        m = checkTime(m)
        s = checkTime(s)

        document.getElementById('clock').innerHTML = h + ":" + m + " " + ap
        t = setTimeout('startTime()', 500)
    }

    function checkTime(i)
    {
        if (i < 10)
        {
            i = "0" + i
        }
        return i
    }

    window.onload = startTime;

</script>
<script src="<?php echo base_url(); ?>assets/microjs/notification.js"></script>


