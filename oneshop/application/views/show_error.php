<?php
$this->load->module("templates");
$this->templates->app_header();
?>


<div class="module_bgmain_wrapper">

<div class="wrapper-main"><!--wrapper main start here-->
<div class="header-main"><!--header main start here-->
<div class="headermain-sub"><!--headermain-sub start here-->
<div class="logocv"><!--logocv start here-->
    <a href="<?php base_url();?>"><img src="<?php echo base_url().'assets/images/tunnellogo.png';?>" alt="logo"></a></div>
<!--logocv closed here-->
<div class="profileedit"><!--profileedit start here-->
<ul>
<li><a href="#"><img src="<?php echo base_url().'assets/images/profilepic.jpg';?>" alt="profilepicture"></a></li>
<li><a href="#"></a>
<p class="pname"> Brayden Jacob </p>
</li>
</ul>
</div>
<!--profileedit closed here-->
<div class="generalicons"><!--generalicons start here-->
<div class="commonIcons">
	<ul>
    	<li><img src="<?php echo base_url().'assets/images/privacy.png';?>"></li>
        <li><img src="<?php echo base_url().'assets/images/settings.png'?>">
        	<ul>
            	<li>Help</li>
                <li>Report Problem</li>
            </ul>
        </li>
    </ul>
</div>
<!--leftgeneralicons closed here-->

			<div class="box">
				 <form id="ui_element" class="sb_wrapper">
       <input type="hidden" id="hsearch_txt" value=""/>
<p>	
<select class="sb_select">
<option value="channels">Channels</option>
<option value="videos">Video</option>
</select>


<input class="sb_input" type="text" placeholder="Find in Tunnel" id="search_box" />
<!--<div id="search_div" style="border:1px solid black;height:12px;width:100px;margin-left:10px;">sdfds</div>-->
<input class="sb_search" type="button" value="" id="search_btn"/>
<ul id="search_options" style="display:none;"></ul>
</p>


</form>
            </div>

<!--rightgeneralicons closed here-->
</div>
<!--generalicons closed here--></div>
<!--headermain-sub closed here--></div>
<!--headermain closed here-->
<div class="clearfix"></div>
<div class="topmenu"><!--topmenu start here-->
<div class="topmenu-left"><!--topmenuleft start here-->
<div class="cssmenu">
    <ul>
        <li class='active has-sub'>
<a href='#'><img src="<?php echo base_url().'assets/images/menubg.jpg'; ?>" alt="icon"></a>
<ul>
<li>
<a href="<?php echo base_url()."myTunnelProfilePage"; ?>"><img src="<?php echo base_url().'assets/images/sub%20menu%2015x15/latestupdates.png'; ?>" class="c1" alt="icon">
<span>My Profile</span>
</a>
</li>
<li>
<a href='<?php echo base_url()."favorite_video"; ?>'><img src="<?php echo base_url().'assets/images/sub%20menu%2015x15/mytunnel.png'; ?>" class="c1" alt="icon">
<span>Fav Video</span>
</a>
</li>
<li>
<a href='<?php echo base_url()."history_search"; ?>'><img src="<?php echo base_url().'assets/images/sub%20menu%2015x15/Messages.png'; ?>" class="c1" alt="icon">
<span>History</span>
</a>
</li>

<li>
<a href='<?php echo base_url()."my_subscription"; ?>'><img src="<?php echo base_url().'assets/images/sub%20menu%2015x15/friendschannel.png'; ?>" class="c1" alt="icon">
<span>Subscriptions</span>
</a>
</li>

<li>
<a href='<?php echo base_url()."myplaylist_page"; ?>'><img src="<?php echo base_url().'assets/images/sub%20menu%2015x15/history.png'; ?>" class="c1" alt="icon">
<span>Play list</span>
</a>
</li>

<li class="has-sub">
<a href='#'><img src="<?php echo base_url().'assets/images/sub%20menu%2015x15/history.png'; ?>" class="c1" alt="icon">
<span>My private</span>
</a>
<ul>
<li><a href="#"><img src="<?php echo base_url().'assets/images/fs/dot.png'; ?>" alt="Icon" class="iconl">Social</a></li>
<li><a href="#"><img src="<?php echo base_url().'assets/images/fs/dot.png'; ?>" alt="Icon" class="iconl">Professional</a></li>
</ul>
</li>

<li>
<a href='<?php echo base_url()."mytunnel"; ?>'><img src="<?php echo base_url().'assets/images/sub%20menu%2015x15/history.png'; ?>" class="c1" alt="icon">
<span>My tunnel</span>
</a>
</li>

</ul>
</li>
    </ul>
</div>
<div class="leftmenuvertical"><!--leftmenuvertical start here--></div>
<!--leftmenuvertical closed here--></div>
<!--topmenuleft closed here-->

</div><!--topmenu closed here-->
<div class="clearfix"></div>

<div class="module_container_wrap"> <!--module_container start here-->

<div class="wrapper-inner"><!--wrapper inner start here-->

<div class="error">
	<img src="<?php echo base_url().'assets/images/sad.png';?>">
	<h2>OOPS...! Sorry Page not Found</h2>
    <p>Something went wrong please mail us your problem. Something went wrong please mail us your problem.Something went wrong pleas mail us your problem.Something went wrong pleas mail us your problem.Something went wrong pleas mail us your problem.Something went wrong pleas mail us your problem.Something went wrong pleas mail us your problem.Something went wrong pleas mail us your problem.Something went wrong pleas mail us your problem.</p>
</div>



<!--left_channel_wrap closed here-->


</div> <!--wrapper inner closed here-->
</div> <!--module container end here-->

<div class="clearfix"></div>

<div class="footer"><!--footer start here-->
<div class="footerleft"><span> copyright &copy; oneidnet 2015 </span></div>
<div class="footerright mat10 aright mar10"><span><a href="#"><img src="<?php echo base_url().'assets/images/onenet.png';?>" alt="logo"></a></span></div>
</div><!--footer closed here-->




</div><!--wrapper main closed here-->


</div> 
<?php $this->templates->app_footer(); ?>