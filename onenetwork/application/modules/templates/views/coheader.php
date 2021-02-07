<?php if(!isset($_SESSION)){
    session_start();	
}
//print_r($_SESSION);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Welcome to Co-Office!</title>
        <!--<script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>-->
        <script src="<?php echo base_url(); ?>assets/js/jquerymin.js" type="text/javascript"></script>
        
        <link href="<?php echo base_url(); ?>assets/nd/css/style.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/coffice_custom.css" type="text/css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/font-awesome.min.css" type="text/css">
        <link href="<?php echo base_url(); ?>assets/css/spinner.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>assets/css/coheader.css" rel="stylesheet" type="text/css">
        <link rel="icon" href="<?php echo base_url(); ?>assets/nd/images/favicon.png" type="image/png">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/clickmenu.css" type="text/css">
        <script src="<?php echo base_url(); ?>assets/js/genericfunctions.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/js/coheader.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/nd/scripts/moduleHeaderScript.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/js/compnyuprofile.js" type="text/javascript"></script>
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/coffice_header.css" type="text/css">
    </head>
    <body>
      <div  class="click_popUp" id="click_ReportAProblemPopUp">
            <div class="click_createGroupPopUpWrapper">
                <a href="javascript: void(0)" onClick="toggle_popUpVisibility('click_ReportAProblemPopUp');">
                    <span class="click_popUpCloseBtn"><h2>X</h2></span></a>  
                <form id="reportproblem">
                    <div class="click_popUpSection"> 
                        <div class="click_popUpHeader"><h4>Report Your Problem</h4></div>
                        <div id="reportmsg" class="reportmsg" style="display: none;">Successfully Reported</div>
                        <div class="click_reportProblemForm">
                            <div class="click_reportProblemFormField">
                                <span class="click_reportProblemFormFieldLable"><h4>Problem Name :&nbsp;<span class="mustgive"></span></h4></span>
                                <input type="text"  name="title" maxlength="50" id="title"  class="click_reportProblemFormFieldInput" onkeypress="return noSpecialCharacters(event);" ondrop="return false;">
                            </div>
                            <div class="click_reportProblemFormField">
                                <span class="click_reportProblemFormFieldLable"><h4>Problem SnapShot :&nbsp;<span class="mustgive"></span></h4></span>
                                <input type="file"  name="logo" id="logo" class="click_reportProblemFormFieldInput">
                            </div>
                            <div class="click_reportProblemFormField">
                                <span class="click_reportProblemFormFieldLable"><h4>Description :&nbsp;<span class="mustgive"></span></h4></span>
                                <textarea class="click_reportProblemFormFieldInput click_textAreaType"  id="description" name="description"  onkeypress="return noSpecialCharacters(event);" ondrop="return false;"></textarea>
                            </div>
                        </div>
                        <div class="click_PopUpFooter">
                            <span class="click_PopUpFooterOptions">
                                <!--<button class="click_reportProblemBtn">Cancel</button>-->
                                <input type="reset" value="Cancel" onClick="toggle_popUpVisibility('click_ReportAProblemPopUp');" class="click_reportProblemBtn">
                                <input type="submit" name="report" id="reportproblem" value="Ok" class="click_reportProblemBtn">                        
                                <!--<button class="click_reportProblemBtn">Ok</button>-->
                            </span>
                        </div>
                    </div>
                </form>    
            </div>
        </div>
    <div style="display: none;" id="sendmessage" class="click_popUp">
       <div class="click_createGroupPopUpWrapper">
        <a onclick="message_popUpVisibility('sendmessage');" href="javascript: void(0)">
            <span class="click_createGroupPopUpCloseBtn"><h2>X</h2></span></a>
        <form id="messagePopUp_form">
            <div class="np_newpopuup_bgcontainer">
                
                <div class="np_popupheadingnew_box"><h4>Compose message</h4></div>
                                    <div class="np_popupcontainer_middlebox">
                    
                    <div class="fll wi100pstg mab5">
                        <p class="fs14"> To </p>

                        <select class="tokenize-sample block_user_id oneshop_compose_selectbox" multiple="multiple" id="connectids">
                                                            <option value="1">Craig Ferguson</option>
                                    
    
                        </select>
                        

                        <div id="to_field">
                            <ul id="removeConfirmationTags">
                            </ul></div>
                         <!--   <p> <input type="text"  name="report_problem_title" class="np_popupcontainer_inputfield_box"> </p>-->
                    </div>
                    <input type="hidden" id="msg_recipient" name="msg_recipient">
                    <div class="fll wi100pstg np_des_mat15 mab5">
                        <p class="fs14">  Subject </p>
                        <p> <input type="text" id="subject" class="oneshop_compose_subject" name="report_problem_title"> </p>
                    </div>

                    <div class="fll wi100pstg np_des_mat15">
                        <p class="fs14">  Message </p>
                        <p> <textarea id="message" class="oneshop_compose_textarea"></textarea> </p>
                    </div>
                    <div class="fll wi100pstg np_des_mat15">
                        <strong id="m_s_r" style="color:green;display:none">Message successfully sent</strong>
                    </div>

                    <p class="flr np_des_mat10">
                        <button class="np_des_addaccess_btn_save">Send</button>
                    </p>
                </div>
                   
            </div>
        </form>
    </div>
</div>
        
        
        

        
        <div class="codes_module_bgmain_wrapper"><!--image wrapper background start here-->


            <div class="co-ofc-popup" id="co-ofc-popup" style="display:none">
                <div class="popup-div">
                    <div class="db-box-title pu-bb">
                        <span id="prof_tag"><h5>Company Profile Panel</h5></span>
                        <span id="forgot_tag" style="display:none;"><h5>Forgot Token or Password</h5></span>
                        <span id="login_tag"  style="display:none;"><h5>Update Login Details</h5></span>
                        <span id="success_tag"  style="display:none;"><h5>Updated Successfully</h5></span>
                        <div class="db-box-tools">
                            <a href="#" style="float:right;" id="forgot"><h4>Forgot Token or Password??</h4></a>
                        </div>
                        <div class="db-box-tools" id="close_me" style="display:none;">
                            <a href="#" class=" top-info-btn close" id="alrdregclose">CLOSE ME</a>
                        </div>
                    </div>
                    <div id="comapany_login"> 
                    <form class="pu-form" role="form" id="com_login">
                        <div id="error_div"></div>
                        <div class="pu-fg">
                            <label class="pu-label wi16 fll" for="m-subject"> Token No:</label>
                            <div class="wi75 fll">
                                <input type="text" id="token_id" class="pu-input" placeholder="Token No">
                            </div>
                        </div>

                        <div class="pu-fg">
                            <label class="pu-label wi16 fll" for="m-whome"> Password:</label>
                            <div class="wi75 fll">          
                                <input type="password" class="pu-input" id="pwd" placeholder="Password">
                            </div>
                        </div>
                        <div id="loading"></div>
                        
                        
                    </form>
                    </div>
                     <div id="comapany_email" style="display:none;">
                    <form class="pu-form" role="form" id="email">
                        <div id="error_div_email" ></div>
                        <div class="pu-fg">
                            <label class="pu-label wi16 fll" for="m-subject"> Company email ID:</label>
                            <div class="wi75 fll">
                                <input type="text" id="company_email" class="pu-input" placeholder="Enter company email address">
                            </div>
                        </div>
                        
                        
                     </form>
                    </div>
                    
                 <div id="update_login" style="display:none;"> 
                    <form class="pu-form" role="form" id="update_cre">
                        <input type="hidden" id="com_email" value="">
                        <div id="error_div_update"></div>
                        <div class="pu-fg">
                            <label class="pu-label wi16 fll" for="m-subject">Token No:</label>
                            <div class="wi75 fll">
                                <input type="text" id="token_id_update" class="pu-input" placeholder="Token No">
                            </div>
                        </div>

                        <div class="pu-fg">
                            <label class="pu-label wi16 fll" for="m-whome">New Password:</label>
                            <div class="wi75 fll">          
                                <input type="password" class="pu-input" id="create_pwd" placeholder="Create Password">
                            </div>
                        </div>
                        <div class="pu-fg">
                            <label class="pu-label wi16 fll" for="m-whome">Retype Password:</label>
                            <div class="wi75 fll">          
                                <input type="password" class="pu-input" id="confirm_pwd" placeholder="Confirm Password">
                            </div>
                         </div>
                        
                        
                        
                    </form>
                  </div>
                  <div class="flr mar20 overflow mat30">
                        <div class="db-box-tools" id="enter">
                            <a href="#" class="top-info-btn" id="login_enter"> ENTER </a>
                            <a href="#" class="top-info-btn close" > CLOSE </a>
                        </div>
                        <div class="db-box-tools"  id="send" style="display:none;">
                            <a href="#" class="top-info-btn" id="email_send" > VERIFY </a>
                            <a href="#" class="top-info-btn close"  > CLOSE </a>
                        </div>
                        <div class="db-box-tools"  id="update" style="display:none;">
                            <a href="#" class="top-info-btn" id="login_update"> UPDATE </a>
                            <a href="#" class="top-info-btn close" > CLOSE </a>
                        </div>
                    </div>
                    <div  id="update_success" style="display: none;">
                        <p class="mal50 mat20" style="text-align:CENTER; word-wrap: break-word;"><span class="blue bold">You have updated the credentials successfully.If you want to login with new credentials <a href="javascript:void(0)" id="click_here">click here</a></span><br><span></span></p>
                    </div>
                </div>
            </div>
           
                

            <div class="co-ofc-popup" id="alreadyRegisterPopup" style="display: none;">
                <div class="popup-div">
                    <div class="db-box-title pu-bb">
                        <h5>ALREADY REGISTERED</h5>
                        <div class="db-box-tools">
                            <a href="#" class=" top-info-btn" id="alrdregclose">CLOSE ME</a>
                        </div>
                    </div>

                    <p class="mal50 mat20" style="text-align:CENTER; word-wrap: break-word;"><span class="blue bold">It seems you already have registered one company in Corporate Office. In Upcoming Update this limitation will be revoked.</span><br><span><a href="#">Forgot Your Token or Password?</a></span></p>
                </div>
            </div>

            <div class="codes_wrapper-main"><!--wrapper main start here-->
                <div class="codes_header-main"><!--header main start here-->
                    <div class="codes_headermain-sub"><!--headermain-sub start here-->
                        <div class="moduleLogo" >
                            <a href="<?php echo base_url() ?>"><img src="<?php echo base_url() ?>assets/images/coofficeLogo.png" class="moduleLogoImg">
                                <span class="moduleName"><b>CORPORATE OFFICE</b></span></a>
                        </div>
                        <!--logocodes closed here-->
                        <div class="codes_profileedit"><!--profileedit start here-->

                            <?php if (!isset($_SESSION['logged_company'])) { ?>
                            <a href="<?php echo base_url()."home/userprofile"?>">
                                <div class="codes_profilepic"><img src="<?php if ($_SESSION['user_image'] != '') {
                                echo ONEIDNET_URL."data/" . $_SESSION['user_image'];
                            } else {
                                echo base_url() . 'data/images/logo/vsi/noimage.png';
                            } ?>" alt="profilepicture"  id="topcompanylogo"></div>
                                                                <div class="codes_pname"><h4><?php echo $_SESSION['user_full_name']; ?></h4> </div>
                            </a>
                                
                            <?php } else { ?>

                                <div class="codes_profilepic"><?php if (isset($_SESSION['logged_company']["company_logo"])) { ?>                <a href="<?php echo base_url() . 'profile/userProfile'; ?>">                    <img src="<?php if ($_SESSION['logged_company']["company_logo"] != '') {
                                    echo base_url() . 'data/images/logo/vsi/' . $_SESSION['logged_company']["company_logo"];
                                } else {
                                    echo base_url() . 'data/images/logo/vsi/noimage.png';
                                } ?>" alt="profilepicture" id="topcompanylogo"></a><?php } ?></div>
                                <div class="codes_pname"><?php if (isset($_SESSION['logged_company']["company_name"])) { ?><a href="<?php echo base_url() . 'profile/userProfile'; ?>"><h4><?php if (isset($_SESSION['logged_company']["company_name"])) print_R($_SESSION['logged_company']["company_name"]); ?></h4></a><?php } ?></div>
<?php } ?>

                        </div>
                        <!--profileedit closed here-->
                        <div class="codes_generalicons"><!--generalicons start here-->
                            <div class="codes_left_generalicons">
                                <span class="fll mat10"><a href="#" class="codes_setting_btn"><img src="<?php echo base_url(); ?>assets/nd/images/settings.png" alt="icon"></a></span>
                                <div class="codes_settings_drop" style="display:none" ><!--settings drop down start here-->
                                    <div class="toparrow"></div>
                                    <div class="clearfix"></div>
                                    <ul>

                                        <li class="codes_myset"><a >My Settings</a></li>
                                        <li class="reportpopup"><a >Report a Problem</a></li>
                                        <a href="<?php echo base_url()."templates/helpPage"?>>">
                                            <li>Help</li>      
                                        </a>
                                    </ul>
                                </div><!--settings drop down closed here-->

                                <div class="moduleOptionsWrapper">
                        <span id="netprosetting" class="moduleOption">
                            <span id="settings"title="Settings" class="moduleHeaderIcon">&nbsp; </span>
                            <div id="wrappersettings" class="notificationWrapper settingsWrapper">
                                <img class="notifyBubble" src="<?php echo base_url()."assets/"?>images/notifyBubble.png">
                                <div id="settingdata" class="notificationContent settingsContent">
                                    <ul>
                                        <?php
                        if (isset($_SESSION['logged_company']['company_id'])) {?>
                                        <li class="click_settingOption" onclick="window.location.href = '<?php echo base_url();?>settings/mysettings';"><a><img src="<?php echo base_url(); ?>assets/images/innerSettings.png"><p>Settings</p></a></li>
                        <?php }; ?>   
                                        
                                        <li class="reportPblm"><img src="<?php echo base_url(); ?>assets/images/reportProblem.png" class="fll"><p>Report a Problem</p></li>
<!--                                            <li onclick="window.location.href = '<?php echo base_url();?>settings/upgradePackage';"><img src="<?php echo base_url(); ?>assets/images/privacy.png" class="fll"><p>Upgrade Package</p></li>-->
                                      <?php if (isset($_SESSION['logged_company']['company_id'])) {?>     <li onclick="window.location.href = '<?php echo base_url();?>settings/myPackages';"><img src="<?php echo base_url(); ?>assets/images/help.png" class="fll"><p>My Package Details</p></li><?php }; ?>
                                    </ul>
                                </div>
                            </div>
                        </span>
                        
                        <?php
                        if (isset($_SESSION['logged_company']['company_id'])) {
                            ?>
                                    <span id="companynotification_span"  class="moduleOption">
                                        <div class="mmhoptions">
                                            <ul>
                                                <span class="codes_noti_icon" <?php if ($notificationcount[0]["notificationcount"] == 0) {
                                        echo "style='display:none;'";
                                    } ?> >
                                                    <span class="noti_txt" id="conotifycount" >
                                                        <?php
                                                        if ($notificationcount[0]["notificationcount"] != 0) {
                                                            echo $notificationcount[0]["notificationcount"];
                                                        }
                                                        ?></span></span>
                                            </ul>
                                        </div>

                                        <span id="notifications"  class="moduleHeaderIcon">&nbsp; </span>

                                        <div id="wrappernotification" class="notificationWrapper">
                                            <img class="notifyBubble" src="<?php echo base_url() . "assets/" ?>images/notifyBubble.png">

                                            <div id="contentnotification" class="notificationContent">
                                                <span>
                                                    <a href="#">                                        </a></span>
                                                <div class="cvdes_notification_drop"><!--notification drop down start here-->
                                                    <ul id="companyconotifydisplay">
                                                    </ul>
                                                </div>

                                            </div>
                                        </div>
                                    </span>
                        
                                <?php
                        }else{
                            ?>
                                <span id="notification_span" class="moduleOption">
                                        <div class="mmhoptions">
                                            <ul>
                                                <span class="codes_noti_icon" <?php if ($notificationcount[0]["notificationcount"] == 0) {
                                        echo "style='display:none;'";
                                    } ?> >
                                                    <span class="noti_txt" id="conotifycount" >
                                                        <?php
                                                        if ($notificationcount[0]["notificationcount"] != 0) {
                                                            echo $notificationcount[0]["notificationcount"];
                                                        }
                                                        ?></span></span>
                                            </ul>
                                        </div>

                                    <span id="notifications" class="moduleHeaderIcon" title="Notifications">&nbsp; </span>

                                        <div id="wrappernotification" class="notificationWrapper">
                                            <img class="notifyBubble" src="<?php echo base_url() . "assets/" ?>images/notifyBubble.png">

                                            <div id="contentnotification" class="notificationContent">
                                                <span>
                                                    <a href="#">                                        </a></span>
                                                <div class="cvdes_notification_drop"><!--notification drop down start here-->
                                                    <ul id="conotifydisplay">
                                                    </ul>
                                                </div>

                                            </div>
                                        </div>
                                    </span>
                                    
                                    
                                    <!--connection request start -->
                                    <!--connection request start -->
                                    <!--connection request start -->
                                    <span id="notification_span" class="moduleOption">
                                            <span class="ntfcntspan" id="cvfr_ntf_count" style="display:none"></span>
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
                                    <!--connection request end -->
                                    <!--connection request end -->
                                
                                <?php
                        }
                        ?>

                       
<!--                        <span id="notificationmessages" class="moduleOption">
                            <span id="messages" title="Messages" class="moduleHeaderIcon"> &nbsp;</span>
                            <div id="wrappermessages" class="notificationWrapper">
                               <img class="notifyBubble" src="<?php echo base_url()."assets/"?>images/notifyBubble.png">

                                <div class="notificationContent">
                                    <div class="np_messages_imageandtext_wrapper">
                                        
                                        <div class="wi100pstg os_des_borderbottom overflow np_des_mab10 np_des_mat10">
                                            <p onclick="message_popUpVisibility('sendmessage')">
                                                <input type="button" name="button" class="btn-suggestion  np_des_mab5 flr" value="Compose Message">
                                            </p></div>
                                        
                                        <ul style="list-style:none;">

                                            <li>
                                                        <div class="np_messages_leftimagediv">  <img class="fll" src="<?php echo base_url();?>data/profile/si/196377.jpg"> </div>
                                                        <div class="np_messages_rightcontentmaindiv fll">
                                                            <div style="width:260px;" class="fll">
                                                                <p style="width: 345px;" class="fs12 bold"> <span>Ricky  Ponting </span> <span class="fs10 flr">2016-05-11 21:00:46</span>  </p>
                                                            <p class="wi100pstg mat3"> <a href="javascript:golivechat('4','f0c4ae41-6796-4b2a-a086-21dc635b5846')">hiiii</a> </p>
                                                            </div>

                                                        </div>
                                                    </li>
                                                    
                                                    
                                                    
                                                    
                                            
                                        </ul>
                                    </div>

                                </div>
                            </div>
                        </span>-->


                        <span class="moduleOption">
                            <span id="requests" class="moduleHeaderIcon" title="Refresh"> &nbsp; </span>
                         
                        </span>
                                    <span class="moduleOption">
                                        
                                        <a href="<?php echo ONENETWORKURL. 'coofficeinfo'; ?>"><span id="register" class="moduleHeaderIcon" title="Register"> &nbsp; </span></a>
                                    </span>

                        
                    </div>
                           
                                <div class="codes_notification_drop"><!--notification drop down start here-->
                                    <div class="toparrow"></div>
                                    <div class="clearfix"></div>
                                    <ul>

<!--                                        <li><a href="#">preferences</a></li>-->
<!--                                        <li><a href="#">Security</a></li>-->
                                        <li><a href="#">Privacy policy</a></li>
                                        <li><a href="#">Report a problem</a></li>
<!--                                        <li><a href="#">Technical Problem</a></li>-->
                                        <li><a href="#">Help</a></li>
                                    </ul>

                                </div><!--notification drop down closed here-->

                                <a href="#" class="flr mat10"><img src="<?php echo base_url(); ?>assets/nd/images/restore.png" alt="restore"></a>
                            </div><!--generalicons closed here-->
                        </div><!--headermain-sub closed here-->
                    </div><!--headermain closed here-->
                    <div class="clearfix"></div>
                    


                    <div class="click_importantNotifications">

                        <div class='menu'>
                            <a class='hover-link'><i class="fll"><img src="<?php echo base_url(); ?>assets/nd/images/menu.png" width="29" height="29"> </i> <span class="lh30 pal5 fll"> CORPORATE OFFICE MENU</span> </a>
                            <div class='sub'>
                                <ul class='sub-options'>
                                    <?php if (isset($_SESSION['logged_company']["company_id"])) {
                                        ?>
                                        <li class="wi100pstg"><span class="fll mar5 mal5"><img src="<?php echo base_url(); ?>assets/nd/images/Meetings.png" class="fll mat6" width="22" height="22"></span><a href='<?php echo base_url(); ?>events/meetingsPage'>Meetings </a></li>
                                        <li class="wi100pstg"><span class="fll mar5 mal5"><img src="<?php echo base_url(); ?>assets/nd/images/Calls.png" class="fll mat6" width="22" height="22"></span><a href='<?php echo base_url(); ?>events/callsPage'> Calls</a></li>

                                        <li class="wi100pstg"><span class="fll mar5 mal5"><img src="<?php echo base_url(); ?>assets/nd/images/PublicProfile.png" class="fll mat6" width="22" height="22"></span><a href='<?php echo base_url(); ?>profile/companyProfile/<?php echo bin2hex($_SESSION['logged_company']['company_id']); ?>'>Public Profile</a></li>
                                        <?php
                                    } else {
                                        ?>
                                        <li class="wi100pstg"><span class="fll mar5 mal5"><img src="<?php echo base_url(); ?>assets/nd/images/myappliedjobs.png" class="fll mat6" width="22" height="22"></span><a href='<?php echo base_url(); ?>home/appliedjobs'>My Job Applications</a></li>    
                                        <li class="wi100pstg"><span class="fll mar5 mal5"><img src="<?php echo base_url(); ?>assets/nd/images/mysavedjobs.png" class="fll mat6" width="22" height="22"></span><a href='<?php echo base_url(); ?>home/savedjobs'> My Saved Jobs</a></li>    
                                        <li class="wi100pstg"><span class="fll mar5 mal5"><img src="<?php echo base_url(); ?>assets/nd/images/myfollowingcompanies.png" class="fll mat6" width="22" height="22"></span><a href='<?php echo base_url(); ?>home/MyfollowingCompanies'>Companies I Follow</a></li>    
                                        <li class="wi100pstg"><span class="fll mar5 mal5"><img src="<?php echo base_url(); ?>assets/nd/images/myfollowingcompanies.png" class="fll mat6" width="22" height="22"></span><a href='<?php echo base_url(); ?>explorecompany/exploredata'>Explore Companies</a></li>    
                                        <li class="wi100pstg"><span class="fll mar5 mal5"><img src="<?php echo base_url(); ?>assets/nd/images/myfollowingcompanies.png" class="fll mat6" width="22" height="22"></span><a href='<?php echo base_url(); ?>explore/exploreproducts'>Explore Products</a></li>    
                                        <li class="wi100pstg"><span class="fll mar5 mal5"><img src="<?php echo base_url(); ?>assets/nd/images/myfollowingcompanies.png" class="fll mat6" width="22" height="22"></span><a href='<?php echo base_url(); ?>explore/exploreservices'>Explore Services</a></li>    
                                        <?php }
                                    ?>
<?php
$this->load->module('home');
$packdata = $this->home->checkFindCandLink();
if ($packdata[0]['search_tool'] == '1') {
?> 
                                        <li class="wi100pstg"><span class="fll mar5 mal5"><img src="<?php echo base_url(); ?>assets/nd/images/CandidateZone.png" class="fll mat6" width="22" height="22"></span><a href='<?php echo base_url(); ?>findcandidates/candidateszone'>Candidate Zone</a></li>

                                <?php } ?>

                                </ul>
                            </div>
                        </div>
                        <div class="oneshop_services_store_menu_wrap">
                            <ul>


                                <?php if (isset($_SESSION['logged_company']["company_id"])) {
                                    ?>
                                    <?php if ($packdata[0]['search_tool'] == '1') { ?> 
                                <li><a href="<?php echo base_url(); ?>findcandidates/findcandidatespage"><img src="<?php echo base_url() ?>assets/images/30-30Trans.png" class="coofficeHome"><h4>FIND CANDIDATES</h4></a> </li>
    <?php } ?>                    
                                    <li><a href="<?php echo base_url(); ?>todaysevents/todaysData"><img src="<?php echo base_url() ?>assets/images/30-30Trans.png" class="cooptions1"><h4>TODAY'S EVENT</h4></a></li>
                                    <li><a href="<?php echo base_url(); ?>job/postjob"><img src="<?php echo base_url() ?>assets/images/30-30Trans.png" class="cooptions2"><h4>POST JOBS</h4> </a> </li>
                                    <li><a href="<?php echo base_url(); ?>viewapplicant/viewapplicantPage"><img src="<?php echo base_url() ?>assets/images/30-30Trans.png" class="cooptions3"><h4>VIEW APPLICANTS</h4></a> </li>
    <?php }
?>


                                <!--                    <li><a href="#"> BUSINESS LEAD / ENQUIRY </a> </li>
                                                    <li>
                                                        <B><a href="#"> ADMINISTRATION </a></B>
                                                    </li>-->
                            </ul>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div><!--header main closed here-->
                <script>
                    $("#requests").click(function () {
                        location.reload();
                    });
                </script>
