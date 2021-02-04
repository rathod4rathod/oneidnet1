<?php
$this->load->module('templates');
$this->templates->header();
$this->templates->onenet_header("static_pages");
?>
<div class="clr">&nbsp;</div>
<div class="new_wrapper">
    <div class="wrapper-inner">

<div class="left_oontainer">


<div class="big-cont-banner-linescontent">
<h2 class="fs25 wi100pstg  pab10 mab10"> COMPETITIONS ARENA </h2>
<p class="fs14 lh20 mab10"> Competitions Arena gives user a platform to showcase their talent, view, skill, art, model & creative unforeseen talent to the world by means of putting the Short Video and Pictures in <strong>Video Arena</strong> and <strong>Snappers Arena</strong> respectively. The registration date to enroll starts 25th of every running month and last till the month end. The entries received from 12:00 AM 25th of Month to 11:59:59 PM of Months last date.</p>
<p class="fs14 lh20 mab10"> Competitions runs for 10 Days and Winner Announcement is decided by total number of likes received in the span of 10 days by other users. Each Category will have a winner.  </p>

<div class="bgborder_box"> 

<h2 class="fs25 fll mat30  pab10 mab10"> Video Arena </h2>
<p class="flr"><input type="submit" value="Get Started" class="np_des_sharebtn flr" name="formpost" id="video_arena"></p>
<div class="winning_leftbox mab10">
<div class="wi100pstg">
<div class="winning_leftimage"> <img src="<?php echo base_url().'assets/images/VideoCompetitions.png'?>"> </div>
<div class="winning_rightcontent">
<h2 class="fs16 mat10"> Compete in Video Arena </h2>
<p class="lh20 mat10 fs14"> If you think, you have a unique video which has a potential to gain praise from around the world than register yourself today to compete in <strong>VIDEO ARENA</strong>. Get Started by picking up a theme for your short video. The themes for competitions are as follows... </p>
<p class="lh20 mat10 fs14" style='color:green;'> <i>Funniest</i>, <i>Emotional</i>, <i>Documentary</i>, <i>Science Fiction</i>, <i>Strategy</i>, <i>Cultural</i>, <i>Dance</i>, <i>Shows</i>, <i>Games</i>, <i>Nature</i>, <i>Awareness</i>, <i>Inspirations</i>, <i>Ideas</i>, <i>Politics</i>, <i>Fashion</i>, <i>Promo<i>, <i>Beauty</i>, <i>Landscape</i> </p>
</div>
</div>
</div>
<h3 class="fs25 fll wi100pstg mat30  pab10 mab10"> Guidelines </h3>
<ul>
<li> Use High Resolution Video with maximum duration betwwen 2-7 minutes.  </li>
<li> The enrollment for One short video is applicable for one theme</li>
<li> The Short Video must not be copyrighted of another user  </li>
<li> ONEIDNET has a rights to take down video found offensive content or copyrighted claim by another user    </li>

</ul>
</div>
</div>



<div class="big-cont-banner-linescontent">


<div class="bgborder_box"> 

<h2 class="fs25 fll mat30  pab10 mab10"> Snappers Arena </h2>
<p class=" flr"><input type="submit" value="Get Started" class="np_des_sharebtn flr" name="formpost" id="snappers_arena"></p>
<div class="winning_leftbox mab10">
<div class="wi100pstg">
<div class="winning_leftimage"> <img src="<?php echo base_url().'assets/images/SnappersCompetitions.png'?>"> </div>
<div class="winning_rightcontent">
<h2 class="fs16 mat10"> Compete in Snappers Arena </h2>
<p class="lh20 mat10 fs14"> If you think, your photography skill has a potential to gain praise from around the world than register yourself today to compete in <strong>SNAPPERS ARENA</strong>. Get Started by picking up a theme for your Snapped Image. The Themes are as follows ... </p>
<p class="lh20 mat10 fs14" style='color:green;'> <i>Art</i>, <i>Social Engineering</i>, <i>Fashion</i>, <i>Beauty</i>, <i>Nature</i>, <i>Wedding</i>, <i>Wildlife</i>, <i>Time Lapse</i>, <i>Travel</i>, <i>Macro</i>, <i>Under Water</i>, <i>High Speed Photography</i>, <i>Panoramic</i>, <i>Motion</i>, <i>Infrared</i>, <i>Baby<i>, <i>Rain</i>, <i>Birds</i>, <i>Landscape</i>, <i>Illusion</i> </p>
</div>
</div>
</div>
<h3 class="fs25 fll wi100pstg mat30  pab10 mab10"> Guidelines </h3>
<ul>
<li> Use High Resolution Image with jpg or png extensions  </li>
<li> The enrollment for One short video is applicable for one theme</li>
<li> The Short Video must not be copyrighted of another user  </li>
<li> ONEIDNET has a rights to take down video found offensive content or copyrighted claim by another user    </li>

</ul>
</div>
</div>



</div>


</div>

</div>
<!--module container end here-->
<?php
$this->templates->footer();
?>
<style type="text/css">
    .big-cont-banner-linescontent{
	float: left;
	width:95%;
	margin:3% 0 0 3%;
	}

.np_des_sharebtn {
    background: #1d93d3  none repeat scroll 0 0;
    color: #fff;
	padding:10px 15px;
	font-weight:bold;
    margin: 20px 0 0 0px;
	border-radius:2PX;
	border:none;
}
.np_des_sharebtn:hover {
    background: #0066FF none repeat scroll 0 0;
}
.winning_leftbox {
    border-radius: 3px;
    height: 110px;
    padding: 1% 0 1% 0;
    width: 98%;
	float:left;
	margin:0 0 0 1%;
}
.winning_leftimage {
    background: #30f none repeat scroll 0 0;
    float: left;
    height: 110px;
    width: 14%;
}
.winning_rightcontent {
    float: left;
    margin: 0 0 0 2%;
    width: 84%;
}
.winning_leftimage img {
    height: 100%;
    width: 100%;
}

.bgborder_box{
	float: left;
	width:98%;
	padding:0 1% 1% 1%;
	margin:20px 0 0 0;
	overflow:hidden;
	border:1px #ccc solid;
	}

.big-cont-banner-linescontent ul{
	float: left;
	width:100%;
	}
	
.big-cont-banner-linescontent ul li{
	float: none;
	margin: 5px 0px 18px 20px;
	padding:0 0 0 25px;
	list-style:none;
	font-size:14px;
	line-height:18px;
	text-align:justify;
	background-image:url(../images/tick.png);
	background-repeat:no-repeat;
	background-position:left top;
	}
	
.db-user-profile-leftbox-leftimg{
    width: 12%;
	float:left;
}

.db-user-profile-img-leftimagenew {
    border: 1px solid #ccc;
    height: 120px;
    width: 100%;
	background:#fff;
	padding:1%;
	}
.db-user-profile-right-div-image-contentright-div{
    width: 86%;
	margin:0 0 0 2%;
	float:left;
}
.db-user-profile-right-div-image-contentright-div p{ font-size:16px; margin:0px 0 0 0; line-height:20px; }


.wi48 {
    width: 48%;
}
.form_width {
    width: 400px;
}
.label_name {
    margin-bottom: 6px;
    text-align: left;
}
.fs18 {
    font-size: 18px;
}
.gray {
    color: #787979 !important;
}
.fs12 {
    font-size: 12px !important;
}

    </style>
    <script type="text/javascript">
        $("#video_arena").click(function(){
            window.location=onenetwork_url+"/videoCompitationpromoitions";            
        });
        $("#snappers_arena").click(function(){
            window.location=onenetwork_url+"/snapCompitationpromotions";            
        });
        </script>