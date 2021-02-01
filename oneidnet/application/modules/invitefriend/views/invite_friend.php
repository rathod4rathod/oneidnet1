<?php
$this->load->module("templates");
$this->templates->basic_info_header();
$this->templates->basic_info_subheader()
?>
</div>
<script>
	
	$(function(){
		$( ".invite-blocks" ).click(function() {
		  $( "#test" ).fadeIn( "slow" );
		});
		$( "#closeit" ).click(function() {
		 $( "#test" ).fadeOut( "slow" );
		});
	
	});
	
	</script>
	<style type="text/css">
 
</style>
	<style>
	.invite-btn {
    cursor: pointer;
    float: left;
    margin: 2.5px 0px 0px 2.5px;
    margin: 0;
    margin-top: -40px;
    margin-right: 40px;
}
.fs22{font-size:22px !important;}
	label {
    color:#999;
    font-size:12px;
    font-weight:normal;
    position:absolute;
    pointer-events:none;
    left:5px;
    top:10px;
    transition:0.2s ease all;
    -moz-transition:0.2s ease all;
    -webkit-transition:0.2s ease all;
}
.close {
    float: right;
    margin-top: 15px;
    margin-right: 15px;
}
	.invite-popup {
  position: fixed;
  width: 100%;
  height: 100%;
  top: 0;
  left: 0px;
  background-color: rgba(50, 50, 50, 0.9);
  display: none;
}

	.invite-popup .inner-popup {
  overflow-y: auto;
  min-height: 400px;
  background-color: #f2f2f2;
  width: 90%;
  max-width: 600px;
  margin: 15em auto 0;
  padding-bottom: 1.5em;
  border-radius: 2px;
  box-shadow: 0 0 1em rgba(0, 0, 0, 0.6);
}
	#test{display:none;}
.invite-blocks {
    width: 135px;
    font-size: 14px;
    background: none;
    color: #000;
    line-height: 40px;
    height: 65px;
    border: 1px solid transparent;
    /* padding: 0 0 0 0px; */
    margin: 10px;
    padding: 10px;
	float:left;
	cursor:pointer;
}
.invite-blocks:visited, .invite-blocks:active, .invite-blocks:focus {
    border: 1px solid #000;
}
.mat15{
	margin-top:15px !important;
}
	</style>








<div class="np_des_module_container_wrap"> <!--module_container start here-->


<div class="hotel_pachagesummary_box fll">



<div id="documenter_sidebar">
		
		<ul id="documenter_nav">
         <div class="overflow"> <span class="fll np_des_mar5"><img src="<?php echo BASEINFO_PATH;?>images/INVITE-FRIENDS.png"> </span> <h2 class="fs18 normal np_des_mab40 np_des_mat10"> INVITE FRIENDS </h2> </div>
        
			
  			<li><a href="#" class="current"> Invite Friends </a></li>
			<li><a href="#"> Manage Apps </a></li>
		</ul>
		
	</div>
    
    
    </div>
    
    
       
       
       
       
       <div class="right_container_wrap2">
       
       <div id="documenter_content" style="margin-top:-65px;">
       
       <h1 class="wi100pstg os_des_borderbottom os_des_pab5 normal np_des_mab10"> INVITE FRIENDS </h1>
       
       
       <div class="right_cont_newwrapper np_des_mat25 demo">
       <a id="invite" class="invite-blocks">
		<span class="fll">
		 <img width="75" height="60" alt="icon" class="fll os_des_margin_auto" src="<?php echo BASEINFO_PATH;?>images/gmail-logo.png"> 
		</span> 
		<span class="fll mat15">Gmail</span> 
	   </a>
	   <a class="invite-blocks">
		<span class="fll">
		 <img width="75" height="60" alt="icon" class="fll os_des_margin_auto" src="<?php echo BASEINFO_PATH;?>images/yahoo-logo.jpg"> 
		</span> 
		<span class="fll mat15">Yahoo</span> 
	   </a>
	   <a class="invite-blocks">
		<span class="fll">
		 <img width="75" height="60" alt="icon" class="fll os_des_margin_auto" src="<?php echo BASEINFO_PATH;?>images/outlook.jpg"> 
		</span> 
		<span class="fll mat15">Outlook</span> 
	   </a>
	   <a class="invite-blocks">
		<span class="fll">
		 <img width="75" height="60" alt="icon" class="fll os_des_margin_auto" src="<?php echo BASEINFO_PATH;?>images/hotmail.jpg"> 
		</span> 
		<span class="fll mat15">Hotmail</span> 
	   </a>
	   <a class="invite-blocks">
		<span class="fll">
		 <img width="75" height="60" alt="icon" class="fll os_des_margin_auto" src="<?php echo BASEINFO_PATH;?>images/rediff-logo.png"> 
		</span> 
		<span class="fll mat15">Rediff</span> 
	   </a>
<?php  // extra code  ?>
 <a class="invite-blocks">
		<span class="fll">
		 <img width="75" height="60" alt="icon" class="fll os_des_margin_auto" src="<?php echo BASEINFO_PATH;?>images/aol.png"> 
		</span> 
		<span class="fll mat15">Aol</span> 
	   </a> <a class="invite-blocks">
		<span class="fll">
		 <img width="75" height="60" alt="icon" class="fll os_des_margin_auto" src="<?php echo BASEINFO_PATH;?>images/zoho.jpg"> 
		</span> 
		<span class="fll mat15">Zoho</span> 

</a>
<a class="invite-blocks">
		<span class="fll">
		 <img width="75" height="60" alt="icon" class="fll os_des_margin_auto" src="<?php echo BASEINFO_PATH;?>images/yandex.png"> 
		</span> 
		<span class="fll mat15">Yandex</span> 
	   </a> <a class="invite-blocks">
		<span class="fll">
		 <img width="75" height="60" alt="icon" class="fll os_des_margin_auto" src="<?php echo BASEINFO_PATH;?>images/mail.png"> 
		</span> 
		<span class="fll mat15">Mail.com</span> 

</a><a class="invite-blocks">
		<span class="fll">
		 <img width="75" height="60" alt="icon" class="fll os_des_margin_auto" src="<?php echo BASEINFO_PATH;?>images/gmx.jpg"> 
		</span> 
		<span class="fll mat15">Gmx</span> 
	   </a>
<a class="invite-blocks">
		<span class="fll">
		 <img width="75" height="60" alt="icon" class="fll os_des_margin_auto" src="<?php echo BASEINFO_PATH;?>images/icloud.jpg"> 
		</span> 
		<span class="fll mat15">Icloud</span> 
	   </a>
<?php  // extra code  end ?>

       
       </div>
      
       </div>
       
	   
	   
       </div> 
       
      

	  
</div> <!--module container end here-->

<div class="clearfix"></div>

<!--footer start here-->
<?php $this->templates->basic_info_footer();?>
<!--footer closed here-->




</div><!--wrapper main closed here-->


</div> 

<div id="test" class="invite-popup">
    <div class="inner-popup">	<a title="Close" id="closeit" class="close">X</a>
        	
                <a class="invite-blocks">
		<span class="fll">
		 <img width="75" height="60" alt="icon" class="fll os_des_margin_auto" src="<?php echo BASEINFO_PATH;?>images/gmail-logo.png"> 
		</span> 
		<span class="fll mat15 fs22">Gmail</span> 
	   </a>
        
                <div class="group np_des_wi420 fll" style="padding:46px;">
				<input type="text" required="" id="FirstName" class="np_des_wi420">
                <!-- <span class="highlight"></span> -->
                <span class="bar"></span>
                <label style="padding:46px;"> Write Your Email Address </label>
				</div>
				
				
				<input type="button" class="button_new os_des_mal10 invite-btn notify flr" value="Invite">
            </div>
    </div>
</div>
</body>
</html>
