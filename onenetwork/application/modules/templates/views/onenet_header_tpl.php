<div class="click_popUp" id="reportproblemPopUp">
	<div class="click_createGroupPopUpWrapper">
    <a href="javascript: void(0)" onClick="reportProblem_popUpVisibility('reportproblemPopUp');">
    <span class="click_createGroupPopUpCloseBtn"><h2>X</h2></span></a> 
    <form  id="reportproblemPopUp_form">
    <div class="click_popUpSection"> 
       
	    <div class="click_createGroupPopUpHeader"><h4>Report Your Problem</h4></div>
        
        <div class="click_createGroupForm">
        	<div class="click_createGroupFormField">
            	<span class="click_createGroupFormFieldLable"><h4>Problem Name :</h4></span>
                <input type="text" class="click_createGroupFormFieldInput" name="report_prob_name" id="report_prob_name">
            </div>
            <div class="click_createGroupFormField">
            	<span class="click_createGroupFormFieldLable"><h4>Problem SnapShot :</h4></span>
                <input type="file" class="click_createGroupFormFieldInput" name="report_snap" id="report_snap">
            </div>
            <div class="click_createGroupFormField">
            	<span class="click_createGroupFormFieldLable"><h4>Description :</h4></span>
                <textarea class="click_createGroupFormFieldInput click_textAreaType" name="report_desc" id="report_desc"></textarea>
            </div>
             <span id="response" style="display:none"></span>
        </div>
        
        <div class="click_createGroupPopUpFooter">
        	<div class="click_createGroupPopUpFooterOptions">
            	<button class="click_reportProblemBtn" onclick="reportProblem_popUpVisibility('reportproblemPopUp')" id="report_cancel">Cancel</button>
            	<button class="click_reportProblemBtn" id="report_btn">Ok</button>
            </div>
        </div>
            
    </div>
    </form>
    </div>
</div>

<div class="ondes_module_bgmain_wrapper">    
    <div class="ondes_header_main"><!--header main start here-->
        <div class="ondes_headermain_sub"><!--headermain-sub start here-->
            <!--logocv start here-->
<?php
//print_r($userdata);
$profile_id="##".$userdata[0]["profile_id"]."##";
$encoded_profile=base64_encode(base64_encode($profile_id));
?>
            <div class="moduleLogo">
                <a href="<?php echo base_url(); ?>"><img class="moduleLogoImg" src="<?php echo base_url() . 'assets/images/onenetwork.png' ?>">
                    <span class="moduleName"><b>one <br>network</b></span>
                </a>
            </div>
            <!--logocv closed here-->
            <div class="moduleProfileInfoWrap">
                <span class="moduleProfileInfoPicWrap">
                    <?php
                    $img_path = base_url() . "assets/images/avatar.png";
                    if ($userdata[0]["img_path"] != "" ) {
                      $oneidnet_url= ONEIDNETURL;
                      $img_path = $oneidnet_url."data/" . $userdata[0]["img_path"];
                    }
                    ?>
                    <a href="javascript:void(0)">
                        <img id="nhpfpath" alt="View profile" src="<?php echo $img_path ?>">
                    </a>
                </span>
                <span class="moduleProfileInfoNameWrap">
                    <a href="javascript:void(0)"><h4><?php echo ucwords($userdata[0]["first_name"] . " " . $userdata[0]["last_name"]); ?></h4></a>
                </span>
            </div>
            <div class="moduleOptionsWrapper">
                <span id="netprosetting" class="moduleOption">
                    <span id="settings" class="moduleHeaderIcon" title="Settings" ></span>
                    <div id="wrappersettings" class="notificationWrapper settingsWrapper">
                        <img class="notifyBubble" src="<?php echo base_url() . 'assets/images/notifyBubble.png' ?>">
                        <div id="settingdata" class="notificationContent settingsContent">
                            <ul>
<!--                                <li><a href="#"><img src="<?php echo base_url() . 'assets/images/innerSettings.png' ?>"><p>Settings</p></a></li>-->

                                <li><img src="<?php echo base_url() . 'assets/images/reportProblem.png' ?>"><p onclick="reportProblem_popUpVisibility('reportproblemPopUp')">Report Problem</p></li>
                               
                                <li><img src="<?php echo base_url() . 'assets/images/privacy.png' ?>"><p><a href="<?php echo base_url().'templates/privacyPage'?>">Privacy Policy</a></p></li>
                                
                                <li><img src="<?php echo base_url() . 'assets/images/help.png' ?>"><p><a href="<?php echo base_url().'templates/helppage'?>"> Help </a></p></li>
                                <li><a href="<?php echo base_url().'templates/servicespage'?>"><img src="<?php echo base_url() . 'assets/images/innerSettings.png' ?>"><p>Services</p></a></li>
                            </ul>
                        </div>
                    </div>
                </span>
                <span id="notification_span" class="moduleOption" title="Notifications: Not functional">
                    <div class="mmhoptions">
                        <ul>
                            <li style="display:none" id="mmhoRestore" class="mmhoRestore"><p id="npnotfcount"></p></li>
                        </ul>
                    </div>
                    <img id="notifications" class="moduleHeaderIcon" src="<?php echo base_url() . 'assets/images/30-30Trans.png' ?>">
                    <div id="wrappernotification" class="notificationWrapper">
                        <img class="notifyBubble" src="<?php echo base_url() . 'assets/images/notifyBubble.png' ?>">
                        <div id="contentnotification" class="notificationContent">
                            <span><a href="#"></a></span>
                            <div class="cvdes_notification_drop"><!--notification drop down start here-->
                                <ul>
                                    <li><span class="small_icons">&nbsp;</span><a href="javascript:void(0)">No notifications </a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </span>
                
                <!--connection request start -->
                                    <span id="notification_span1" class="moduleOption">
                                            <span class="ntfcntspan" id="cvfr_ntf_count" style="display:none;"></span>
                                            <img  id="cvbankfr" src="<?php echo base_url(); ?>assets/images/crequests.png" class="moduleHeaderIcon" title="Connection Requests">

                                            <div id="wrappernotification" class="notificationWrapper">
                                                <img class="notifyBubble" src="<?php echo base_url() . "assets/" ?>images/notifyBubble.png">

                                                <div id="contentnotification" class="notificationContent">
                                                    <span>
                                                        <a href="#">                                        </a></span>
                                                    <div class="cvdes_notification_drop"><!--notification drop down start here-->
                                                        <ul id="cvbfr">
                                                        </ul>
                                                    </div>

                                                </div>
                                            </div>
                                        </span>
                        <!--connection request end -->
                <span id="notificationmessages" class="moduleOption">
                    <img id="messages" class="moduleHeaderIcon" title="Messages: Not functional" src="<?php echo base_url() . 'assets/images/30-30Trans.png' ?>">
                    <div id="wrappermessages" class="notificationWrapper">
                        <img class="notifyBubble" src="<?php echo base_url() . 'assets/images/notifyBubble.png' ?>">

                        <div class="notificationContent">
                            <div class="np_messages_imageandtext_wrapper">
                                <div class="wi100pstg os_des_borderbottom overflow np_des_mab10 np_des_mat10">
                                    <p onclick="message_popUpVisibility('sendmessage')">
                                        <input type="button" name="button" class="np_des_newbutton_csshere  np_des_mab5 flr" value="Compose Message">
                                    </p>
                                </div>
                                <ul>
                                    <li>
                                        <div class="np_messages_leftimagediv"> 
                                            <img src="<?php echo base_url() . 'assets/images/profilepic.jpg' ?>"> 
                                        </div>
                                        <div class="np_messages_rightcontentmaindiv fll">
                                            <div class="fll" style="width:260px;">
                                                <p style="width: 345px;" class="fs12 bold"> <span>Jaime Martenez </span> <span class="fs10 flr">22-12-2015</span>  </p>
                                                <p class="wi100pstg mat3"> Message on : </p>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </span>
                <span class="moduleOption">
                    <img id="requests" class="moduleHeaderIcon"  title="Refresh"src="<?php echo base_url() . 'assets/images/30-30Trans.png' ?>">
                </span>
                <span class="moduleOption">
                    <img id="register" class="moduleHeaderIcon" title="Register"src="<?php echo base_url() . 'assets/images/reg.png' ?>">
                </span>
                </div>
            <div class="moduleSearchWrapper withCategory">
                <form id="ui_element">
                    <input type="hidden" value="" id="hsearch_txt">
                    <p></p>
                    <div class="categorySelection">
                        <img class="moduleSearchIcon" id="search_icon" src="<?php echo base_url() . 'assets/images/searchIcon.png' ?>">
                    </div>
                    <span class="moduleSearchBarField">
                        <select class="sb_select categorySelectionField" id="search_type">
                            <option value="Promotions">Promotions</option>
                            <option value="Packages">Packages</option>
                            <option value="GMA">GMA</option>
                        </select>
                        <input type="text" autocomplete="off" id="search_box" placeholder="Find Promotions, Packages, General Marketing" class="moduleSearchField">
                        <ul style="display:none;" id="search_options"></ul>
                    </span>
                    <p></p>
                </form>
            </div>
        </div>
    </div>
    <div class="click_importantNotifications">
        <div class='menu'>
            <a class='hover-link'><span class="main_menu_icon"><i class="fa fa-navicon"></i></span></a>
            <div class='sub'>
                <ul class='sub-options'>
                    <li class="wi100pstg"><span class="fll mar10 mal5"><img src="<?php echo base_url() . 'assets/images/dashboard.png' ?>" class="fll mat6" width="22" height="22"></span><a href="<?php echo base_url() . 'uDashboard';?>"> Dashboard </a></li>
                 <!--    <li class="wi100pstg"><span class="fll mar5 mal5"><img src="<?php echo base_url() . 'assets/images/OneID-U.png' ?>" class="fll mat6" width="22" height="22"></span><a href='#'> ONEIDNET & You </a></li>-->
                    <li class="wi100pstg"><span class="fll mar10 mal5"><img src="<?php echo base_url() . 'assets/images/Contributions.png' ?>" class="fll mat6" width="22" height="22"></span><a href="<?php echo base_url().'templates/contribution'?>"> Contributions Insights </a></li>                    
<!--                    <li class="wi100pstg"><span class="fll mar5 mal5"><img src="<?php echo base_url() . 'assets/images/MyActivities.png' ?>" class="fll mat6" width="22" height="22"></span><a href='#'> My Activities </a></li>-->
                    <li class="wi100pstg"><span class="fll mar10 mal5"><img src="<?php echo base_url() . 'assets/images/SavedCampaign.png' ?>" class="fll mat6" width="22" height="22"></span><a href="<?php echo base_url() . 'campaigns/campaignmonitor'; ?>"> Promotions Monitor </a></li>
                    <li class="wi100pstg"><span class="fll mar10 mal5"><img src="<?php echo base_url() . 'assets/images/marketing_ads.png' ?>" class="fll mat6" width="22" height="22"></span><a href="<?php echo base_url() . 'gma/gmamonitor'; ?>"> General Marketing & Ads </a></li>
                    <li class="wi100pstg"><span class="fll mar10 mal5"><img src="<?php echo base_url() . 'assets/images/badges.png' ?>" class="fll mat6" width="22" height="22"></span><a href="<?php echo base_url() . 'official_badge/officialbadgeMonitor'; ?>"> Official Badges </a></li>

<!--                    <li class="wi100pstg"><span class="fll mar5 mal5"><img src="<?php //echo base_url() . 'assets/images/SavedCampaign.png' ?>" class="fll mat6" width="22" height="22"></span><a href="<?php //echo base_url() . 'campaigns'; ?>"> Campaigns Detailed View </a></li>
                    <li class="wi100pstg"><span class="fll mar5 mal5"><img src="<?php //echo base_url() . 'assets/images/ReportAnalysis.png' ?>" class="fll mat6" width="22" height="22"></span><a href='#'> Reports Analysis </a></li>-->
                    </ul>
            </div>
        </div>
        <?php
            $admnUrl = base_url()."administration";
            $admObj = $this->load->module('administration');
            $empCode = $admObj->getAdministrationEmployCode();
            if($empCode != ""){
                $admnUrl = base_url()."admprofile/".$empCode;
            }
        ?>
        <div class="oneshop_services_store_menu_wrap">
            <ul>
                <?php
                $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
                ?>
                 <li <?php if ($active_menu_item == "packages") { echo "class='active_menu'";} ?>><a href="<?php echo base_url() . 'packages'; ?>"> PACKAGES </a> </li>
                <li <?php if ($active_menu_item == "promotions") { echo "class='active_menu'";} ?>><a href="<?php echo base_url() . 'promotions'; ?>"> PROMOTIONS </a> </li>
                <li><a href="#" id="CUSTOMERSUPPORT" > CUSTOMER SUPPORT </a> </li>
                <li   <?php if ($active_menu_item == "businesslead") { echo "class='active_menu'";} ?>><a href="<?php echo base_url() . 'businesslead'; ?>"> BUSINESS LEAD / ENQUIRY </a> </li>
            </ul>
        </div>
        <div class="cssmenu" style="float:right;">
                                          <ul>
                                            <li class="active has-sub"> <a href="#" style=""><span class="dropMenuHead">
                                              <i class="fa fa-ellipsis-v"></i> </span></a>
                                              <ul style="">
                                                <li> <a href="https://blogs.oneidnet.com/home/discussionPage?mod=onenetwork"><span>Browse Discussions</span></a></li>
                                                <li> <a href="https://blogs.oneidnet.com/home/createtopic?mod=onenetwork"><span>Create Topic</span></a></li>
                                                <li> <a href="https://blogs.oneidnet.com/useractivity/user_activity?mod=onenetwork"><span>Cronoline</span></a></li>
                                                <li> <a href="https://blogs.oneidnet.com/home/profilepage?mod=onenetwork&amp;profile_id=<?php echo $encoded_profile?>"><span>Community Profile</span></a></li>
						<li> <a href="https://blogs.oneidnet.com/home/explorepeople?mod=onenetwork"><span>Explore Member</span></a></li>
                                              </ul>
                                            </li>
                                          </ul>
                                        </div>
                                        
                                        
                                        
            </div>
    <div class="clr">&nbsp;</div>
<script>
	$("#requests").click(function () {
		location.reload();
	});
	$("#CUSTOMERSUPPORT").click(function () {
	window.parent.location.href = oneidnet_url+"home/customersupport";
	});        
</script>
<style type="text/css">
  ul#search_options{
    position: absolute;
    margin-top: 26px;
    background-color: #f5f5f5;
    margin-left: 0px;
    box-shadow: 0 0 3px #666;
    width: 290px;
    z-index: 10000;
  }
  ul#search_options li{
    padding:6px;
  }
</style>
