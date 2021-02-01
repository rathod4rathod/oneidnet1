<?php
    $this->load->module('templates');
    $this->templates->introduction_header( );
?>
<body onLoad="change()"> 
	<div class="introdes_mainWrapper">
    
        <div class="reg_leftSectionWrapper">
            <div id="slogans">
                <img src="<?php  echo base_url().'assets/Images/oneidlogo.png'?>" class="sloganLogo">
                    <h2 id="slogan">World as One</h2>
            </div>        
        </div>        
    
    <div class="introdes_innerWrapper">
    
             <div class="reg_rightSectionWrapper">
        	<div class="reg_rightSectionOptions">
            	<ul>
                    <li><a href="<?php echo base_url().'home/aboutus'?>" class="active_link"><img src="<?php echo base_url() . 'assets/' ?>Images/aboutus.png"><span>About Us</span></a></li>
                    <li><a href="<?php echo base_url().'home/policies'?>"><img src="<?php echo base_url() . 'assets/' ?>Images/regImages/policy.png"><span>Policies</span></a></li>
                    <li><a href="<?php echo base_url().'home/foundation'?>"><img src="<?php echo base_url() . 'assets/' ?>Images/regImages/foundation.png"><span>Foundation</span></a></li>
                    <li><a href="<?php echo base_url().'home/privacy'?>"><img src="<?php echo base_url() . 'assets/' ?>Images/regImages/privacy.png"><span>Privacy</span></a></li>
                    <li><a href="<?php echo base_url().'home/termsconditions'?>"><img src="<?php echo base_url() . 'assets/' ?>Images/regImages/tc.png"><span>Terms & Conditions</span></a></li>
                    <li><a href="<?php echo base_url().'home/customersupport'?>"><img src="<?php echo base_url() . 'assets/' ?>Images/regImages/cs.png"><span>Customer Support</span></a></li>
                    <li><a href="<?php echo base_url().'home/contactus'?>"><img src="<?php echo base_url() . 'assets/' ?>Images/regImages/contactus.png"><span>Contact Us</span></li></a>
                    <li><a href="<?php echo base_url().'home/allinone'?>"><img src="<?php echo base_url() . 'assets/' ?>Images/regImages/allinone.png"><span>All in one</span></a></li>
                </ul>
            </div>
        </div>
    
    	<div class="introdes_videoSection">
            <iframe width="100%" height="100%" src="https://www.youtube.com/embed/X-wf3iyYhDc" frameborder="0" allowfullscreen></iframe>            
<!--            
            <video controls class="introVideo">
            	<source src="<?php //echo base_url().'assets/videos/oneidnet_registration_video.mp4'?>" type="video/mp4">
            </video>
Danish-->


        </div>
        <div class="introdes_text">
        	<span class="introdes_Activation">
                    <p style=''>We have sent you an activation link to your existing e-mail.</p>
            <p>In case you did not receive an e-mail, <a href="" id="resend_activation" style="color:yellow; text-decoration:none;">Click here</a> to request new Activation link.<br></p>
            <span id="oneidnet_verfimsg" style="display: none;  margin: 5px 0 0 0; font-size:20px;  color: hsla(60,43%,50%,1);"></span> <!-- Don't delete this status label-->
            
            </span>
            <form method="post" action="">
            <span class="introdes_otp">
            </span>  
                 </form>
            
            
        </div>
        
          
	</div>
    
    </div>
</body>
</html>
