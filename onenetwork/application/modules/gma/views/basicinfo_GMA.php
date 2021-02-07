<?php
$this->load->module('templates');
$this->templates->header();

?>
<div class="click_popUp" id="os_popup">
</div>
<?php
$this->templates->onenet_header();
?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/jquery-ui.css"> 
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-ui.js"></script>
<script type="text/javascript" src="<?php echo base_url() . 'assets/js/jquery.tokenize.js' ?>"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/canvasjs.min.js"></script>
<link href="<?php echo base_url() . 'assets/css/jquery.tokenize.css'; ?>" rel="stylesheet" type="text/css">

<div style="width:880px; padding:0 0 5px 0; margin:20px 0 0 0; line-height:24px;" class="bold borderbottom"> 
 <span> <a href="#"> Marketing </a> &nbsp;&nbsp;&gt;&nbsp;&nbsp; </span> <span> <a href="#"> <?php $compaign = explode("_",$campaign_type); echo $compaign[0]  ?> </a> &nbsp;&nbsp;&gt;&nbsp;&nbsp; </span> 
 </div>

<div class="mat20 fll" style="width:500px;">
    <div class="click_tabs_wrap_newcontent"> 
        <ul id="tabs">
            <li><a id="current" name="#tab1" class="oneiddev_budbase" href="<?PHP echo base_url() . 'budget_page' ?>" > 1 </a> <p style="float:left; font-weight:bold; padding:0 0 0 0; margin:65px 0px 10px -85px;"> BASIC INFORMATION </p> </li>
            <li><a href=""  name="#tab4" id="oneiddev_budfourth"> 2 </a> <p style="float:left; font-weight:bold; padding:0 0 0 0; margin:65px 0 10px -50px;"> ADS STUDIO</p>   </li>
            <li><a href="" name="#tab2" id="oneiddev_budsec"> 3 </a> <p style="float:left; font-weight:bold; padding:0 0 0 0; margin:65px 0 10px -70px;"> AUDIENCE LAB </p>  </li>
            <li><a href=""  name="#tab3" id="oneiddev_budthrd"> 4 </a> <p style="float:left; font-weight:bold; padding:0 0 0 0; margin:65px 0 10px -50px;"> PAYMENT</p>   </li>
        
        </ul>
    </div>
     <div id="content">
        <?PHP
//        echo "venkatesh";
        
        $gmaobj = $this->load->module("gma");
      
        $gmaobj->basicinfo_tab();
        $gmaobj->adsStudio_tab();
        $genericobj = $this->load->module("generic");
        $genericobj->getAudienceLabTab();
        $genericobj->getPaymentTab();
        ?>                                
    </div>
</div>


<div class="hotel_pachagesummary_box mab10 mat40 fll" style="display:none;" id="tab1right">
    <div class="sponsored_content_wrap mab10" id="perfect_square" style="display:none;">
		<div class="sponsored_close"><a href="#"> <img src="<?php echo base_url() . 'assets/images/no.png'; ?>" width="18" height="18" > </a> </div>
		<h3> Default image for perfect square </h3>
		<div class="sponsored_imagebox">
			<img src="<?php echo base_url() . 'assets/images/onenetwork_AdBanner_s.png'; ?>" >
		</div>
		
	</div>  
    <div class="sponsored_content_wrap mab10 pab10" id="preview" style="display:none;">
		<div class="sponsored_close"><a href="#"> <img src="<?php echo base_url() . 'assets/images/no.png'; ?>" width="18" height="18" > </a> </div>
		<h4> Preview </h4>
		<div class="fll wi100pstg">
			<p> " TWO ipsum dolor sit amet, consectetur adipisicing elit. Quam totam nulla est, illo molestiae maxime. " </p>
		</div>
		<div class="flr" style="margin-right:25px;"><span class="fll"><img src="<?php echo base_url() . 'assets/images/Interest.png'; ?>" width="16" height="16" ></span>&nbsp;&nbsp;<span class="bold">Like</span> </div>
	</div> 

	<div class="sponsored_content_wrap mab10 pab10" id="half_verticular" style="display:none;">
		<div class="sponsored_close"><a href="#"> <img src="<?php echo base_url() . 'assets/images/no.png'; ?>" width="18" height="18" > </a> </div>
		<h4> Preview </h4>
		<div class="sponsored_imagebox_two">
			<img src="<?php echo base_url() . 'assets/images/onenetwork_AdBanner_v.png'; ?>" >
		</div>
		
	</div> 
        
        </div>  

<div id="onedev_content" class="hotel_pachagesummary_box mab10 mat40 fll">
    <div class="details_agebetween_box mab10 fll" style="display:none;" id="tab2right">
                                <p class="bold fs12 mab30">  AUDIENCE MONITOR  </p>
                                <div class="details_agebetween_loadingbox" id="age_div">
                                    <div class="normal wi100pstg fs12" id="age_title"> People under age </div>
                                    <div class="details_agebetween_loadingbox_leftone" id="age_bar">
                                        <span class="details_agebetween_loadingbox_lefttwobox">&nbsp;</span>
                                    </div>                                    
                                    <div class="details_agebetween_loadingbox_rightbox_count"> 
                                        <div class="fll oneshop_overview_countbox mar10" id="subtotal"> <?= $total; ?> </div>
                                        <div class="fs12 mat5"> Out Of </div> <div id="total"> 3500 </div> 
                                    </div>
                                </div>

                                <div class="details_agebetween_loadingbox" id="gender_div">
                                    <div class="normal wi100pstg fs12" id="gender_title"> People </div>
                                    <div class="details_agebetween_loadingbox_leftone" id="gender_bar">
                                        <span class="details_agebetween_loadingbox_lefttwobox">&nbsp;</span>
                                    </div> 
                                    <div class="details_agebetween_loadingbox_rightbox_count"> 
                                        <div class="fll oneshop_overview_countbox mar10" id="subtotal">  <?= $total; ?> </div>
                                        <div class="fs12 mat5"> Out Of </div> <div id="total"> 3500 </div> 
                                    </div>
                                </div>
                                <div class="details_agebetween_loadingbox" id="marital_div">
                                    <div class="normal wi100pstg fs12" id="marital_title"> People </div>
                                    <div class="details_agebetween_loadingbox_leftone" id="marital_bar">
                                        <span class="details_agebetween_loadingbox_lefttwobox">&nbsp;</span>
                                    </div> 
                                    <div class="details_agebetween_loadingbox_rightbox_count"> 
                                        <div class="fll oneshop_overview_countbox mar10" id="subtotal">  <?= $total; ?> </div>
                                        <div class="fs12 mat5"> Out Of </div> <div id="total"> 3500 Specified </div> 
                                    </div>
                                </div>
                                <div class="details_agebetween_loadingbox" id="pages_div">
                                    <div class="normal wi100pstg fs12" id="marital_title"> Total Pages </div>
                                    <div class="details_agebetween_loadingbox_leftone" id="pages_bar">
                                        <span class="details_agebetween_loadingbox_lefttwobox">&nbsp;</span>
                                    </div> 
                                    <div class="details_agebetween_loadingbox_rightbox_count"> 
                                        <div class="fll oneshop_overview_countbox mar10" id="subtotal">  <?= $total; ?> </div>
                                        <div class="fs12 mat5"> Out Of </div> <div id="total"> 3500 Specified </div> 
                                    </div>
                                </div>
                                <div class="details_agebetween_loadingbox" id="languages_div">
                                    <div class="normal wi100pstg fs12" id="marital_title"> Languages </div>
                                    <div class="details_agebetween_loadingbox_leftone" id="languages_bar">
                                        <span class="details_agebetween_loadingbox_lefttwobox">&nbsp;</span>
                                    </div> 
                                    <div class="details_agebetween_loadingbox_rightbox_count"> 
                                        <div class="fll oneshop_overview_countbox mar10" id="subtotal">  <?= $total; ?> </div>
                                        <div class="fs12 mat5"> Out Of </div> <div id="total"> 3500 Specified </div> 
                                    </div>
                                </div>
                                <div class="details_agebetween_loadingbox" id="nationality_div">
                                    <div class="normal wi100pstg fs12" id="marital_title"> Nationality </div>
                                    <div class="details_agebetween_loadingbox_leftone" id="nationality_bar">
                                        <span class="details_agebetween_loadingbox_lefttwobox">&nbsp;</span>
                                    </div> 
                                    <div class="details_agebetween_loadingbox_rightbox_count"> 
                                        <div class="fll oneshop_overview_countbox mar10" id="subtotal">  <?= $total; ?> </div>
                                        <div class="fs12 mat5"> Out Of </div> <div id="total"> 3500 Specified </div> 
                                    </div>
                                </div>
                                <div class="details_agebetween_loadingbox" id="location_div">
                                    <div class="normal wi100pstg fs12" id="marital_title"> Location </div>
                                    <div class="details_agebetween_loadingbox_leftone" id="location_bar">
                                        <span class="details_agebetween_loadingbox_lefttwobox">&nbsp;</span>
                                    </div> 
                                    <div class="details_agebetween_loadingbox_rightbox_count"> 
                                        <div class="fll oneshop_overview_countbox mar10" id="subtotal">  <?= $total; ?> </div>
                                        <div class="fs12 mat5"> Out Of </div> <div id="total"> 3500 Specified </div> 
                                    </div>
                                </div>
                                <div class="details_agebetween_grapgbg" id="ichart_div">                                    
                                    <!--<div class="grapgbg_image"> <img src="<?php echo base_url() . 'assets/images/gr.jpg' ?>"></div>-->
                                    <!--<div class="grapgbg_content">--> 
<!--                                        <span class="fs18 bold"> 30% of 1002 </span>
                                        <span class="fs18 mat10 fll bold"> 2000k Out of 300 </span>-->
                                    <!--</div>-->
                                    <div id="chartContainer" style="width: 200px; height: 280px;"></div>
                                </div>
                            </div>
							
</div>
<?php
$this->templates->footer();
?>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/microjs/generalMarketing.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/microjs/promotionPayment.js"></script>

