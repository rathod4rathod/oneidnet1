r<?php require('application/libraries/oneshopconfig.php');  
if(!$_SESSION)
{
  session_start();
}


?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="description" content="<?php echo $meta_description;?>">
        <meta name="keywords" content="<?php echo $meta_keywords;?>">
        <title><?php echo $store_title;?></title>
        <link rel="stylesheet" href="<?php echo base_url() . "assets/" ?>css/oneshopStyles.css" type="text/css">
        <link rel="stylesheet" href="<?php echo base_url() . "assets/" ?>css/clickmenu.css" type="text/css">        
         <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url() . "assets/" ?>scripts/script.js"></script>
        <script type="text/javascript" src="<?php echo base_url() . "assets/" ?>scripts/os_custom.js"></script>
        <link rel="stylesheet" href="<?php echo base_url() . "assets/" ?>css/os_custom.css" type="text/css">
        <link rel="stylesheet" href="<?php echo base_url() . "assets/" ?>css/font-awesome.min.css" type="text/css">
       
    </head>

    <body>
 <!-- overlay code on 11-06-2015 for display of products-->
  <div class="click_popUp" id="click_createAlbumPopUp">
	<div class="click_createGroupPopUpWrapper">
    <a href="javascript: void(0)" onClick="toggle_popUpVisibility('click_createAlbumPopUp');">
    <span class="click_createGroupPopUpCloseBtn"><h2>X</h2></span></a>  
    <div class="click_popUpSection"> 
	    <div class="click_createGroupPopUpHeader"><h4>Create Album</h4></div>        
        <div class="click_createGroupForm">
        </div>
    </div>
  </div>
  </div>
    <!-- overlay code on 11-06-2015 -->
        <div class="oneshop_wrapper">
            <div class="oneshop_innerWrapper">
                <!--Oneshop Module Header starts Here(vinod 19-05-2015)-->
                <div class="oneshop_moduleHeader">
                    <a href="<?php echo base_url(); ?>"><img src="<?php echo base_url() . "assets/" ?>images/oneshop.png" class="oneshop_logo"></a>    
                    <a href="<?php echo base_url() . "home/mystore_profile_page/"; ?>">
                        <span class="oneshop_profile">
                            <img src="<?php echo STORE_PATH.$str_dtl[0]["store_id"]."/logo/mi/".$str_dtl[0]["store_logo"];?>" class="oneshop_profilePic">
                            <h4><?php echo $str_dtl[0]["store_name"];?></h4>
                        </span>
                    </a>

                    <div class="maildes_headerOptions">
                        <ul>
                            <li>
                                <img src="<?php echo base_url() . "assets/" ?>images/settings.png" class="maildes_headerIcon">
                                <ul>
                                    <li class="maildes_bubble"><img src="<?php echo base_url() . "assets/" ?>images/bubble.png"></li>
<!--                                    <li class="maildes_settingOption"><a class="menu_item" href="<?php echo base_url() . "mystore_settings"; ?>">My Store Settings</a></li>-->
                                    <?php if($_SESSION["user_id"]==$_SESSION["store_owner_id"]){ ?>
                                      <li class="maildes_settingOption"><a class="menu_item" id="osdev_mystore_settings">My Store Settings</a></li>
                                    <?php } ?>
                                    <li class="maildes_settingOption">Customer Care</li>                                                     
                                    <li class="maildes_settingOption">Report A Problem</li>                            
                                    <li class="maildes_settingOption">Help</li>
                                </ul>
                            </li>
                        </ul>
                    </div>
<div class="click_headerOptions">
                        <ul>
                            <li><img src="<?php echo base_url() . "assets/" ?>images/friendRequestNotification.png" class="click_headerIcon">
                                   <div id="ntf_code">
                                    <?php if ($notification_count != 0) {
                                      ?>
                                      <span class="click_friendRequestNotificationCount"><h6><?php
                                              if ($notification_count < 10) {
                                                echo $notification_count;
                                              } else {
                                                echo "10+";
                                              }
                                              ?></h6></span>
                                    <?php }
                                    ?>
                                </div>
                              
                                <ul><li class="click_bubble"><img src="<?php echo base_url() . "assets/" ?>images/bubble.png"></li>
                                    <div class="shadow" id="os_store_notification_append">
                                        <li class="click_friendRequest">
                                            <img src="<?php echo base_url() . "assets/" ?>images/procs.gif" width="100px">

                                        </li>
                                        <!--    <li class="click_friendRequest">
                                                <img src="<?php echo base_url() . "assets/" ?>images/attachclose.png" class="click_friendSuggessionsCloseBtn">
                                                <span class="click_friendSuggessionsPic"><img src="<?php echo base_url() . "assets/" ?>images/profilePic.png"></span>
                                                <span class="click_friendSuggessionsName"><h5>Navya Krishna</h5></span>
                                            </li>
                                            <li class="click_friendRequest">
                                                <img src="<?php echo base_url() . "assets/" ?>images/attachclose.png" class="click_friendSuggessionsCloseBtn">
                                                <span class="click_friendSuggessionsPic"><img src="<?php echo base_url() . "assets/" ?>images/profilePic.png"></span>
                                                <span class="click_friendSuggessionsName"><h5>Navya Krishna sdfsd jsd fsjadhf asjhf sa shdjf sajkdfh sdjfh sajkdf  </h5></span>
                                            </li>-->

                                    </div>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <img src="#" class="oneshop_restoreIcon">
                </div>
                <!--Oneshop Module Header ends Here(vinod 19-05-2015)-->
                <input type="hidden" id="CURRENT_URL" value="<?PHP echo CURRENT_URL; ?>" >
<style type="text/css">
        .click_popUp{
	display: none;
	position: fixed;
	width: 100%;
	height: 100%;
	background-color: rgba(0, 0, 0, 0.6);
	z-index: 1015;}
.click_popUpWrapper, .click_createGroupPopUpWrapper{

	margin: 50px 0 0 250px;
	box-shadow: 0 0 5px #000;
	width: 850px;
	height: 500px;
	background-color: #f5f5f5;
	border-radius: 5px;}
.click_createGroupPopUpWrapper{
	width: 500px;
	height: 300px;
	margin: 100px auto;}
.click_popUpCloseBtn, .click_createGroupPopUpCloseBtn{
	cursor: pointer;
	position: absolute;
	z-index: 10;
	width: 25px;
	height: 25px;
	margin: -10px 0 0 830px;
	box-shadow: 0 0 3px #333;
	border-radius: 15px;
	background-color: #555;
	border: solid 1px white;}
.click_createGroupPopUpCloseBtn{
	margin: -10px 0 0 485px;}	
.click_popUpCloseBtn h2, .click_createGroupPopUpCloseBtn h2{
	float: left;
	margin: 3px 0 0 8px;
	font: 15px Arial;
	color: white;}
        </style>
<script>
                  var attrt = 0;
                  $(".click_headerIcon").hover(function () {
                      if (attrt == 0)
                      {
                          $.ajax({
                              async: false,
                              type: 'POST',
                              url: oneshop_url + "/notification/get_sotre_notification",
                              success: function (data) {                                
                                  
                                    $("#os_store_notification_append").html(data);
                                    $("#ntf_code").html("");
                                    attrt=1;
                                  
                              }
                          });
                      }

                  })
                </script>
