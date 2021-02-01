<?php
require('application/libraries/oneshopconfig.php');
if (!isset($_SESSION)) {
    session_start();
}
?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
        <meta name="description" content="<?php echo $meta_description; ?>">
        <meta name="keywords" content="<?php echo $meta_keywords; ?>">
        <title><?php echo $title ?></title>
        <link rel="stylesheet" href="<?php echo base_url() . "assets/"; ?>css/oneshopStyles.css" type="text/css">
        <link rel="stylesheet" href="<?php echo base_url() . "assets/"; ?>css/clickmenu.css" type="text/css">        
        <link rel="stylesheet" href="<?php echo base_url() . "assets/"; ?>css/tabs.css" type="text/css">
        <link rel="stylesheet" href="<?php echo base_url() . "assets/" ?>css/font-awesome.min.css" type="text/css">
        <link rel="stylesheet" href="<?php echo base_url() . "assets/"; ?>css/dropMenu.css" type="text/css">
        <link rel="stylesheet" href="<?php echo base_url() . "assets/"; ?>css/headerTemplateStyle.css" type="text/css">
        <script type="text/javascript" src="<?php echo base_url() . "assets/"; ?>scripts/jquery-1.11.2.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url() . "assets/"; ?>scripts/generic.js"></script>
        <script type="text/javascript" src="<?php echo base_url() . "assets/" ?>scripts/moduleHeaderScript.js"></script>
        <script type="text/javascript" src="<?php echo base_url() . "assets/"; ?>scripts/script.js"></script>

        <script type="text/javascript" src="<?php echo base_url() . "assets/" ?>scripts/os_custom.js"></script>
        <script type="text/javascript" src="<?php echo base_url() . "assets/" ?>scripts/tabs.js"></script>
        <script type="text/javascript" src="<?php echo base_url() . "assets/" ?>scripts/oshopheader.js"></script>

        <link rel="stylesheet" href="<?php echo base_url() . "assets/" ?>css/os_custom.css" type="text/css">
 
        <script type="text/javascript" src="<?php echo base_url() . "/assets/"; ?>scripts/jssor.js"></script>
        <script src="<?php echo base_url() . 'assets/scripts/danish_pbar.js' ?>" type="text/javascript" charset="utf-8"></script>
        <link href="<?php echo base_url() . 'assets/css/jquery.tokenize.css' ?>" rel="stylesheet" type="text/css">
        <script src="<?php echo base_url() . 'assets/scripts/jquery.tokenize.js'; ?>" type="text/javascript"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"/>
<!--  -->

        <script type="text/javascript">
            function toggle_visibility(id) {
                var e = document.getElementById(id);
                if (e.style.display == 'block') {
                    e.style.display = 'none';
                } else {
                    e.style.display = 'block';
                }
            }
        </script>
                <style>  
           body  
           {  
                margin:0;  
                padding:0;  
                background-color:#f1f1f1;  
           }  
           .box  
           {  
                width:900px;  
                padding:20px;  
                background-color:#fff;  
                border:1px solid #ccc;  
                border-radius:5px;  
                margin-top:10px;  
           }  
      </style>
        <style>
        .button {
          border: none;
          color: white;
          padding: 5px 10px;
          text-align: center;
          text-decoration: none;
          display: inline-block;
          font-size: 16px;
          margin: 4px 2px;
          cursor: pointer;
        }

        .button1 {background-color: #4CAF50;} /* Green */
        .button2 {background-color: #008CBA;} /* Blue */
        </style>

    </head>

    <body id="modopn">

        <?php
        $this->load->module('oshop_popup');
        $this->oshop_popup->sendmessage();
        ?>
       
        <div id="oneshop_reportProblemPopupBg">               
            <div class="oneshop_reportProblemPopup" id="oneshopReportProblemPopUp">
                <?php
                $this->load->module('reportproblem');
                $this->reportproblem->report_problem();
                ?>
            </div>
        </div>    

        <!-- overlay code on 11-06-2015 for display of products-->
        <div class="click_popUp" id="click_createAlbumPopUp">
            <div class="click_createGroupPopUpWrapper">
                <a href="javascript: void(0)" onClick="toggle_visibility('click_createAlbumPopUp');">
                    <span class="click_createGroupPopUpCloseBtn"><h2>X</h2></span></a>  
                <div class="click_popUpSection"> 
                    <div class="click_createGroupPopUpHeader"><h4>Create Album</h4></div>        
                    <div class="click_createGroupForm">

                    </div>
                </div>
            </div>
        </div>
        <div class="click_popUp" id="os_popup">

        </div>
        <!-- overlay code on 11-06-2015 -->
        <div class="oneshop_wrapper">
            <input type="hidden" id="cid" value="<?php echo $userid; ?>">
            <div class="oneshop_innerWrapper">
                <!--Oneshop Module Header starts Here(vinod 19-05-2015)-->

                <!--One Shop Module Header Starts Here-->    
                <div class="moduleHeaderWrapper oneshop">
                    <div class="moduleLogo">
                            <a href="<?php echo base_url(); ?>"><img src="<?php echo base_url() . "assets/" ?>images/oneshopLogo.png" class="moduleLogoImg"></a>
                            <a href="<?php echo base_url(); ?>"><span class="moduleName"><b>OneShop</b></span></a>
                        </div>

                    <div class="moduleProfileInfoWrap">
                        <span class="moduleProfileInfoPicWrap">
                            <a href="<?php echo base_url() . "user_profile_page"; ?>"><img id="osprfpic" src="<?php
                                if ($profile_img) {
                                    echo PROFILE_LOGO . "mi/" . $profile_img;
                                } else {
                                    echo base_url() . "/assets/images/avatar.png";
                                }
                                ?>"></a>
                        </span>
                        <span class="moduleProfileInfoNameWrap">
                            <a href="<?php echo base_url() . "user_profile_page"; ?>"><h4><?php echo ucfirst($_SESSION["user_full_name"]); ?></h4></a>
                        </span>
                    </div>

                    <div class="moduleOptionsWrapper">


                        <span class="moduleOption">
                            <span id="settings" title="Settings" class="sprite-Settings" ></span>
                            <div class="notificationWrapper settingsWrapper">
                                <img class="notifyBubble" src="<?php echo base_url() . 'assets/images/notifyBubble.png'; ?>">
                                <div class="notificationContent settingsContent">
                                    <ul>
<!--                                        <li class="click_settingOption"><a href=""><img src="<?php echo base_url() . 'assets/images/innerSettings.png'; ?>"><p>Settings</p></a></li>-->
                                        <li><img src="<?php echo base_url(); ?>assets/images/hr.png" class="fll"><p onClick="toggle_visibility('oneshop_reportProblemPopupBg')">Report Problem</p></li>


                                        <li><img src="<?php echo base_url(); ?>assets/images/privacy.png" class="fll"><p><a href="<?php echo base_url() . 'templates/privacyPage' ?>">Privacy Policy</a></p></li>

                                        <li><img src="<?php echo base_url(); ?>assets/images/help.png" class="fll"><p><a href="<?php echo base_url() . 'templates/helpPage' ?>">Help</a></p></li>
                                        <li><img src="<?php echo base_url(); ?>assets/images/help.png" class="fll"><p><a href="<?php echo base_url() . 'templates/servicePage' ?>">Services</a></p></li>

                                    </ul>
                                </div>
                            </div>
                        </span>


                        <span id="alerts" class="moduleOption">
                            <span class="ntfcntspan" id="oneshopntfcount" style="display: none;"></span>
                            <span id="notifications" title="Notifications" class="sprite-Notification" src=""></span>
                            <div class="notificationWrapper">
                                <img class="notifyBubble" src="<?php echo base_url() . 'assets/images/notifyBubble.png'; ?>">
                                <div class="notificationContent" id="os_notification">    </div>
                            </div>
                        </span>

                        
                        <span  class="moduleOption">
                            <img id="cvbankfr" src="<?php echo base_url() . "assets/images/crequests.png" ?>" class="moduleHeaderIcon" title="Connection Requests">
                              <span class="ntfcntspan" id="cvfr_ntf_count" style="display: none;"></span>
                            <div class="notificationWrapper">
                                <img class="notifyBubble" src="<?php echo base_url() . 'assets/images/notifyBubble.png'; ?>">
                                <div class="notificationContent" >    
                                        <ul id="cvbfr">
                                        </ul>
                                </div>
                            </div>
                        </span>

                        <span id="notify_msgs" class="moduleOption">
                            <span class="ntfcntspan" id="msgnotification" style="margin: -6px 0px 0px 20px; display: none;"></span>
                            <span id="messages" title="Messages"  class="sprite-Messages" src=""></span>
                            <div class="notificationWrapper">
                                <img class="notifyBubble" src="<?php echo base_url() . 'assets/images/notifyBubble.png'; ?>">
                                <div class="notificationContent">   
                                    <div class="np_messages_imageandtext_wrapper">
                                        <div class="wi100pstg os_des_borderbottom overflow np_des_mab10 np_des_mat10">
                                            <span class="fll os_des_mal10 np_des_mat5"><a href="<?php echo VCOMURL . "commercial/?mdc=4f4e4553484f50"; ?>" class="blue"> See All </a> </span>
                                            <p onClick="message_popUpVisibility('sendmessage');">
                                                <input type="button" name="button" class="btn-suggestion  np_des_mab5 flr" value="Compose Message">
                                            </p></div>
                                        <ul id="oshopmsglist">


                                        </ul>
                                    </div>   
                                </div>
                            </div>
                        </span>

                        <span class="moduleOption" id="refresh_page">
                            <div class="sprite-Request" title="Refresh" id="requests"></div>
                        </span>

                        <span class="moduleOption">

                            <a href="<?php echo ONENETWORKURL . 'oneshopinfo'; ?>"><div class="sprite-Register" title="Register" id="register"></div></a>			 
                        </span>

                        <div class="notificationWrapper">
                            <img class="notifyBubble " src="<?php echo base_url() . 'assets/images/notifyBubble.png'; ?>">
                            <div class="notificationContent"></div>
                        </div>

                        </span>
                    </div>
                    <div class="moduleSearchWrapper withOutCategory">
                        <i id="search_btn" class="fa fa-search click_searchIcon moduleSearchIcon" aria-hidden="true"></i>
                            <!--<img id="search_btn" class="moduleSearchIcon click_searchIcon" src="<?php echo base_url() . '/assets/images/searchIcon.png'; ?>">-->
                        <span class="moduleSearchBarField">

                            <span class="moduleSearchBarField">
                                <select id="click_search" class="sb_select categorySelectionField">
                                    <option value="Stores">Stores</option>
                                    <option value="Products">Products</option>
                                    <option value="People">People</option>
                                    <option value="Category">Category</option>
                                    <option value="Group">Groups</option>
                                </select>

                            </span>
                            <input type="text" placeholder="Search Product or Store here...." id="search_bar" class="moduleSearchField click_searchField">

                            <div class="searchSuggessions" style="display: none;">
                                <ul name="search" class="click_suggesionsList">

                                </ul>
                            </div>
                        </span>
                    </div>
                </div>
                <!--One Shop Module Header Starts Here-->     

                <input type="hidden" id="CURRENT_URL" value="<?php echo CURRENT_URL; ?>">
                <!--Oneshop Module Header ends Here(vinod 19-05-2015)-->

                
                