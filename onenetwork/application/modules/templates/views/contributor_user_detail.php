<?php
$this->load->module('templates');
$this->templates->header();
$this->templates->onenet_header();
?>

<style>
    
    
    .contributors-title
{
	font-size:24px;
	color:#333;
	padding:5px 0px;
	
}
    
    .contributors-unique
{
	width:100%;
	min-height:650px;
	margin:0 auto;
	background:#f5f5f5;
	overflow:hidden;
}
.contributors-info
{
	width:100%;
	height:200px;
	background:#f00;
	overflow:hidden;
}
.contributors-info img
{
	float:left;
	width:20%;
	max-height:220px;
	height:200px;
}
.contributors-info .contributors-info-right
{
	width:74%;
	background:#17aa66;
	float:left;
	height:200px;
	padding:2% 3%;

}

.contributors-subtitle
{
	color:#fff;
}
.social-profiles
{
	width:200px;
	height:60px;
	float:right;
	margin-top:-30px;
	overflow:hidden;
		
}
.social-profiles ul li
{
	float:left;
	margin-left:10px;
	list-style:none;
}
.social-profiles ul li img
{
	max-width:48px;
	max-height:48px;
}
.profile-desc
{
	
	width:880px;
	padding:10px;
	overflow:hidden;
	
}
.profile-desc-box
{
	width:100%;
	padding:10px 0px;
	overflow:hidden;
	margin:7px 0px;
}
.left-desc-box
{
	float:left;
	width:12%;
	font-size:20px;
	color:#818181;
}
.right-desc-box
{
	float:left;
	width:85%;
	font-size:16px;
}
.right-desc-box ul li
{
	float:left;
	list-style:none;
	padding:5px 7px;
	font-size:18px;
	
	margin:0px 5px;
	color:#fff;
}
.green
{
	background:#17aa66;
}
.blue
{
	background:#45a9ff;
	
}
.red2
{
	background:#ff0d00;
}

    
</style>

<div class="np_des_module_container_wrap"> <!--module_container start here-->

<div class="np_des_wrapper-inner"><!--wrapper inner start here-->


<div class="np_des_left_container fll"> <!--left container start here-->
 <br><br>
 
 
 <p class="contributors-title">  Top-contributors </p>
 
  
  <div class="contributors-unique">	
    <div class="contributors-info">
        <img src="<?php echo base_url(); ?>assets/images/p3.jpg" class="person-pp" alt="profile-picture" >
    	 
   
        <div class="contributors-info-right">
            <p class="contributors-title">David Cameron</p>
            <p class="contributors-subtitle">Webmaster</p>
         </div>
        
    </div><!--contributors info closed here-->
     <div class="clr"></div>
    
    <div class="social-profiles">
		<ul>
            <li><a href="#"><img src="<?php echo base_url(); ?>assets/images/buzzin.png" class="person-pp" alt="profile-picture" > </a></li>
            <li><a href="#"><img src="<?php echo base_url(); ?>assets/images/click.png" class="person-pp" alt="profile-picture" ></a></li>
            <li><a href="#"><img src="<?php echo base_url(); ?>assets/images/netpro.png" class="person-pp" alt="profile-picture" ></a></li>
        </ul>
	</div><!--social profiles end here-->
    
    <div class="profile-desc">
    	<div class="profile-desc-box">
        	<p class="left-desc-box">Products:</p>
            <div class="right-desc-box">
            
              <ul>
              	<li class="green">Gmail</li>
                <li class="green">Google plus</li>
                <li class="green">Pinterest</li>
                <li class="green">Hangouts</li>
              </ul>
            	
            </div>
            <div class="clr"></div>
        </div>
        
        
        
        <div class="profile-desc-box">
        	<p class="left-desc-box">Languages:</p>
            <div class="right-desc-box">
            
              <ul>
              	<li class="blue">English</li>
                <li class="blue">Arabic</li>
                <li class="blue">Telugu</li>
                <li class="blue">Spanish</li>
              </ul>
            	
            </div>
            <div class="clr"></div>
            
            
        
        <div class="profile-desc-box">
        	<p class="left-desc-box">Skills:</p>
            <div class="right-desc-box">
            
              <ul>
              	<li class="red2">Html5</li>
                <li class="red2">Css3</li>
                <li class="red2">Angular js</li>
                <li class="red2">Php</li>
                <li class="red2">Ruby on rails</li>
                <li class="red2">Networking</li>
              </ul>
            	
            </div>
            <div class="clr"></div>
        </div>
   </div>
</div> 
</div><!--contributors unique end here-->

</div> <!--left container end here-->



<div class="np_des_right_container flr"> <!--right container start here-->

   

</div>
<!--right container end here-->

</div> <!--wrapper inner closed here-->
</div> <!--module container end here-->
<div class="clearfix"></div>
<?php
$this->load->module('templates');
$this->templates->footer();
?>
