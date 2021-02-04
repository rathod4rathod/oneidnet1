
<link type="text/css" rel="stylesheet" href="<?php echo base_url();?>assets/css/virtualOfficeStyle.css">
<script type="text/javascript" src="<?php echo base_url();?>assets/js/coofcVirtualScript.js"></script>

<script type="text/javascript">
$(document).ready(function(){
    $('.coofc_votsFooterOptions').css({display: 'none'});
	$('.coofc_vrowItem').click(function(){
		var myVirtualOption = $(this).attr('class').split(' ');
		
                if(myVirtualOption[1]=="office_package")
                    $('.coofc_votsFooterOptions').css({display: 'none'});
                else
                    $('.coofc_votsFooterOptions').css({display: 'block'});
		$('.coofc_viewWrapper').css({display: 'none'});
                
                 $('.coofc_vosRSOptions').removeClass('activetabsPacks');
		$('.coofc_sectionViewsWrapper').css({display: 'none'});
                $('.coofc_vosContentSection').css({display: 'none'});
		$('.' + myVirtualOption[1] + 'Content').fadeIn(300);
		$('.' + myVirtualOption[1]).fadeIn(300);
                $('.coofc_vosRightSection .' + myVirtualOption[1]).addClass('activetabsPacks');
		});
		
	$('.coofc_sectionViewsWrapper ul li').click(function(){
		var imgView = $(this).children().attr('src');
		var mySeciton = $(this).parents('.coofc_sectionViewsWrapper').attr('class').split(" ");
		//alert(imgView);
		//alert('.' + mySeciton[1] + 'Content');
		$('.' + mySeciton[1] + 'Content').children().attr('src', imgView);
		$()
		});
		
	});
</script>


<div class="coofc_mainWrapper">

	<div class="coofc_virtualWrapper2">
    	<div class="coofc_virtualInnerWrapper">
        
       
        	<div class="coofc_selectOfcType">
            	<span class="coofc_selectOfcTypeLable">Select your Office :</span>
                <span class="coofc_selectOfcTypeField">
                	<select class="coofc_selectVirtualOfcTemplate" name="officeType" id="codev_packsnames">
                    	<option value="">-- Choose your office --</option>
                    	<?php foreach($pack_names as $packnames)    
                        echo '<option value="'.$packnames.'">'.$packnames.'</option>'; 
                      ?>  
                    </select>
                </span>
            </div>
            
            <div class="coofc_virtualOfcThemeSelectionWrapper">
	            <div class="coofc_vosRightSection">
                	<span class="coofc_vosRSOptions ofcExterior coofc_vrowItem">
                    	<img src="<?php echo base_url();?>assets/images/s_office1.jpg"><span class="coofc_vosRSOText">Office Exterior</span>
                        </span>
                    <span class="coofc_vosRSOptions ofcMap coofc_vrowItem">
                    	<img src="<?php echo base_url();?>assets/images/s_office2.jpg"><span class="coofc_vosRSOText">Office Map</span>
                        </span>
                    <span class="coofc_vosRSOptions ofcInterior coofc_vrowItem">
                    	<img src="<?php echo base_url();?>assets/images/s_office3.jpg"><span class="coofc_vosRSOText">Office Interior</span>
                        </span>
                    <span class="coofc_vosRSOptions office_package coofc_vrowItem">
                    	<img src="<?php echo base_url();?>assets/images/s_office4.jpg"><span class="coofc_vosRSOText">Office Package</span>
                        </span>
                    <span class="coofc_vosRSOptions meetingRoom coofc_vrowItem">
                    	<img src="<?php echo base_url();?>assets/images/s_office5.jpg"><span class="coofc_vosRSOText">Office Meeting Room</span>
                        </span>
                    <span class="coofc_vosRSOptions hrRoom coofc_vrowItem">
                    	<img src="<?php echo base_url();?>assets/images/s_office6.jpg"><span class="coofc_vosRSOText">Office H.R. Room</span>
                        </span>  
                    <span class="coofc_vosRSOptions hrRoom2 coofc_vrowItem">
                    	<img src="<?php echo base_url();?>assets/images/s_office7.jpg"><span class="coofc_vosRSOText">Office Exterior</span>
                        </span>                                            
                </div>
            	<div class="coofc_votsContainer">
                 <?php $this->load->view('officetypes');?>
					<div class="coofc_votscOfficeExteriorWrapper coofc_viewWrapper ofcExteriorContent">
                    	<img src="<?php echo base_url();?>assets/images/oe02.jpg">
<div class="coofc_ofcInfoWrapper">
	<span class="coofc_roomTitleWrapper">Conference Hall</span>
    <span class="coofc_roomDescriptionWrapper">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span>
</div>                        
                    </div>
                    
					<div class="coofc_votscOfficeMapWrapper coofc_viewWrapper ofcMapContent">
                    	<img src="<?php echo base_url();?>assets/images/om01.jpg">
                    </div>                    

					<div class="coofc_votscOfficeInteriorWrapper coofc_viewWrapper ofcInteriorContent">
                    	<img src="<?php echo base_url();?>assets/images/oi01.jpg">
                    </div>
                <div id="office_packageDtlsLft" class="coofc_votscOfficeInteriorWrapper coofc_viewWrapper office_packageContent">
                   <div class="coofc_packageTypeWrapper">
    
                        <div class="coofc_packageHeader">Please Select Your Office Type</div>
                   </div>
                    </div>
                	<div class="coofc_votscMeetingRoomWrapper coofc_viewWrapper meetingRoomContent">
                    	<img src="<?php echo base_url();?>assets/images/mr02.jpg">
                    </div>
                    
					<div class="coofc_votscHRroomWrapper coofc_viewWrapper hrRoomContent">
                    	<img src="<?php echo base_url();?>assets/images/hr01.jpg">
                    </div>                    
                   
                </div>
                <div class="coofc_votsFooterOptions">
                	
                    <div class="coofc_sectionViewsWrapper ofcExterior">
                    	<ul>
                        	<li><img src="<?php echo base_url();?>assets/images/oe01.jpg"></li>
                            <li><img src="<?php echo base_url();?>assets/images/oe02.jpg"></li>
                        </ul>
                    </div>
                    
                    <div class="coofc_sectionViewsWrapper ofcMap">
                    	<ul>
                        	<li><img src="<?php echo base_url();?>assets/images/om01.jpg"></li>
                            <li><img src="<?php echo base_url();?>assets/images/om02.jpg"></li>
                        </ul>
                    </div> 
                    
                    <div class="coofc_sectionViewsWrapper ofcInterior">
                    	<ul>
                        	<li><img src="<?php echo base_url();?>assets/images/oi01.jpg"></li>
                            <li><img src="<?php echo base_url();?>assets/images/oi02.jpg"></li>
                            <li><img src="<?php echo base_url();?>assets/images/oi03.jpg"></li>
                        </ul>
                    </div> 
                    
                    <div class="coofc_sectionViewsWrapper meetingRoom">
                    	<ul>
                        	<li><img src="<?php echo base_url();?>assets/images/mr01.jpg"></li>
                            <li><img src="<?php echo base_url();?>assets/images/mr02.jpg"></li>
                        </ul>
                    </div>
                    
                    <div class="coofc_sectionViewsWrapper hrRoom">
                    	<ul>
                        	<li><img src="<?php echo base_url();?>assets/images/hr01.jpg"></li>
                            <li><img src="<?php echo base_url();?>assets/images/hr02.jpg"></li>
                        </ul>
                    </div>  
                    <div class="coofc_sectionViewsWrapper hrRoom2">
                    	<ul>
                        	<li><img src="<?php echo base_url();?>assets/images/hr01.jpg"></li>
                            <li><img src="<?php echo base_url();?>assets/images/hr02.jpg"></li>
                        </ul>
                    </div>
                    
                </div>
            </div>
            
  
<?php if(isset($from)){?>
 <div class="mal40" id="checkbox_s_upgrd">
        <div class="fs14 mat20"><span class="fll mar10" id="liseAgreeupd" ><input type="checkbox" name="licenseagree" id="licenseagree"></span>You will be liable to pay the amount</div>
        </div>
        <div class="mal40 mab10" id="agree_upgrad_btn">
            <input type="submit" name="" id="upgradepkg_proceed" class="codes_btn" value="Confirm To Pay">
            
        </div>
         <div class=" mat30 mal40"></div>

 <?php  
    $this->load->module('paypal');
    $this->paypal->displayPaypalPage();
    ?>   
    
</div>
<?php } ?>
      </div>
    </div>