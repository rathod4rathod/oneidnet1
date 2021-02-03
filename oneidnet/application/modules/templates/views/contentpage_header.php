
<!DOCTYPE html>
<html lang="en">

    <head>
           <meta charset="utf-8">
	<title><?php echo $tittle ?></title>
	<meta name="keywords" content="Click, Buzzin, vCom, OneIDship, 360 Mail, FindIt, Tunnel, Corporate Office, DealerX, Paybook, OneShop, OneVision, TravelTime, ISNews, cvbank, OneNetwork, Click, Buzzin, vCom, OneIDship, 360 Mail, FindIt, Tunnel, Corporate Office, DealerX, Paybook, OneShop, OneVision, TravelTime, ISNews, cvbank, OneNetwork, Create a Online Store, Sale Product, Purchase Product, Open Malls, Join Malls, Join with Professionals, Create Professional Groups, Professional Activities, Manage Safebox, Buzz with your Buzzers, Socialize with Your Buzzers, Watch Video, Download Videos, Create Tunnel, Socialize with Your Clickers, Create Clicks, Register Your Company, Post a Jobs, Post Your Services/Products, Create Auction, Post Your Products for Biddings, Bidding Games, Create Your CV, Hire Candidates, Maintain Company Presence, Get Shortlisted, Get Noticed By Employers, Find Jobs, Search Engine Site, Keyword Marketing, Website Marketing, Flash Marketing, Email Marketing, Apply for A Jobs, Post Your Own News, Get Fact News, Conduct Interviews Online, Do Video & Voice Communication via vCom, Messaging With Your Friends, Hotels Reservations, Flights Reservations, Car Rentals, Ship Your Items, Shipment of Your Packages, Make Campaigns, Watch Your Episodes, Share Events, Create Page, Picture Competitions, Video Competitions, Surf Quick Pics, Surf Quick Vids, Make Virtual Offices, Compose Emails, Send Emails, Get Email ID, Paybook, Make Payments">
	<meta name="description" content="Sign up today to this amazing whole new Internet Web Operating System. Get your world in ONE Tab with just ONE Username and Password and Get access to more than hundred lines of services all in one here in ONEIDNET">  
	<meta name="author" content="ONEIDNET">
	<meta property="og:title" content="<?php echo $tittle  ;?>" /> 
	<meta property="og:description" content="A Whole New Personalized Internet Web Operating System" /> 
	<meta property="og:image" content="<?php echo base_url()."assets/Images/oneidlogo.png"?>" />
	<meta property="og:type" content="product"/>
<meta http-Equiv="Cache-Control" Content="no-cache" />
    <meta http-Equiv="Pragma" Content="no-cache" />
    <meta http-Equiv="Expires" Content="0" />
    <link rel="icon" href="<?php echo base_url()."assets/Images/oneidlogo.png"?>" type="image/gif" sizes="16x16">
        <link href="<?php echo base_url() . 'assets/css/steps.css' ?>" rel="stylesheet" type="text/css">
        <link rel="icon" href="<?php echo base_url() . 'assets/images/favicon.png' ?>" type="image/png">
        <script src="<?php echo base_url(); ?>assets/js/path.js"></script>
        <!--<script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>-->
		<script src="<?php echo base_url().'assets/js/jquery-1.11.2.min.js'?>"></script>
        <style>

            .steps-footer{
                width: 100%;
                position: absolute;
                bottom: 0;
                margin: auto;

            }
            .footer-block{
                width: 90%;
                height: 40px;
                margin: auto;
                background: rgba(0, 0, 0, 0.75);
            }
            .footer-text{

                color: #fff;
                text-decoration: blink;
                padding: 5px;
                margin: 10px;
                margin-top: 10px;
            }
            .header{
                color: #fff;
                font-weight: 100;
                float: left;
                margin-top: 50px;
            }
            .transactions {
                width: 80%;
                margin: auto;
            }

            span.trcard{
                float: left;
            }
            span.trlastused{
                float: right;
            }
            .steps{
                height: 230px;
            }
            .trtop{
                border-bottom: 1px dotted #fff;
            }
            .globalTime{
              left:40px;
              margin-top:35px;
            }
        </style>

    </head>

    <body>
<?php
//echo "<pre>";
//print_r($userdetails);
?>



        <div class="overlay-wrapper" style="height: 130%;">

            <div class="systemTopWrapper">
                <div class="topLeftWrapper">
                    <a href="<?php echo base_url(); ?>"> <img src="<?php echo base_url() . 'assets/Images/oneidlogo2.png' ?>" class="oneidLogo2">
                        <!--<div class="logo_text"> One ID Net</div>--></a>
                </div>
<?php
if($uid){
    ?>
                                    <span class="logoutBtn flr">
<a href="<?php echo base_url() . 'index.php/login/doLogout' ?>" style="color: white;"><img src="<?php echo base_url() . 'assets/Images/logOutBtn.png' ?>" class="logoutIcon"></a>
</span>
<div class="systemTopOuterWrapper">
<div class="globalInfoWrapper">
<div class="globalInfoContent">

<span class="globalProfileInfoWrapper">
<span class="profilePic">
<?php
                                    if($userdetails[0]['gender']=="MALE")
                                    {
                                     $img=base_url()."assets/Images/contentImages/person.png";   
                                    }
                                    else
                                    {
                                     $img=base_url()."assets/Images/contentImages/female.png";
                                    }
                                    ?>
                                    <img src="<?php if($userdetails[0]['img_path']){echo base_url().'data/'.$userdetails[0]['img_path'];}else{echo $img;}?>" id="profile_image_tag" title="User Profile Picture">
                                </span>
                                <h1 id="userFullName_home"><?php echo $userdetails[0]['first_name']." ".$userdetails[0]['last_name']; ?></h1>
                                <h4 id="email_homepg"><?php echo $userdetails[0]['email'];?></h4>

</span>
<span class="globalWeather">
<img src="<?php echo base_url() . 'assets/Images/weather1.png' ?>" class="weatherIcon">
<span class="weather"><h1 id="tempDeg_home"></h1></span>
<span class="location"><h4 id="city_home"></h4></span>
</span>
<span class="globalDate">
<img src="<?php echo base_url() . 'assets/Images/oneidCalendar1.png' ?>"><h1><?php echo date("d"); ?></h1><h2><?php echo date("D"); ?></br><?php echo date("M"); ?></h2>
</span>
<span class="globalTime"><h1>
                                    <div id="clock"></div></h1></span> 

</div>
</div>

</div>
        <?php
}
?>

            </div>
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

</script>            <script src="<?php echo base_url() . 'assets/microjs/prototype.js' ?>"></script>
            <script src="<?php echo base_url() . 'assets/microjs/homepage.js' ?>"></script>
    <p>&nbsp;</p>
