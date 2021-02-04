<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/jquery-ui.css"> 
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-ui.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/microjs/payment.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/microjs/promotionPayment.js"></script>
<script type="text/javascript" src="<?php echo base_url() . 'assets/js/jquery.tokenize.js' ?>"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/canvasjs.min.js"></script>
<link href="<?php echo base_url() . 'assets/css/jquery.tokenize.css'; ?>" rel="stylesheet" type="text/css">



<div class="mat20 fll" style="width:500px;">
    <div class="click_tabs_wrap"> 
        <ul id="tabs">
            <li><a id="current" name="#tab1" class="oneiddev_budbase" href="<?PHP echo base_url() . 'budget_page' ?>" name="#tab1"> 1 </a> <p style="float:left; font-weight:bold; padding:0 0 0 0; margin:65px 0px 10px -85px;"> BASIC INFORMATION </p> </li>
            
             <!--<li><a href="" name="#tab4" id="oneiddev_budfourth"> 4 </a> <p style="float:left; font-weight:bold; padding:0 0 0 0; margin:65px 0 10px -50px;"> ADD STUDIO</p>   </li>-->
            <li><a href="#" name="#tab2" id="oneiddev_budsec"> 2 </a> <p style="float:left; font-weight:bold; padding:0 0 0 0; margin:65px 0 10px -70px;"> AUDIENCE LAB </p>  </li>
            <li><a href="" name="#tab3" id="oneiddev_budthrd"> 3 </a> <p style="float:left; font-weight:bold; padding:0 0 0 0; margin:65px 0 10px -50px;"> PAYMENT</p>   </li>
        </ul>
    </div>
    <div id="content">
        <?PHP
        $genericobj = $this->load->module("generic");
        $genericobj->basicinfo_tab($promotion_type);
        $genericobj->getAudienceLabTab();
        $genericobj->getPaymentTab();
        ?>                                
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
<!--                                <div class="details_agebetween_loadingbox" id="nationality_div">
                                    <div class="normal wi100pstg fs12" id="marital_title"> Nationality </div>
                                    <div class="details_agebetween_loadingbox_leftone" id="nationality_bar">
                                        <span class="details_agebetween_loadingbox_lefttwobox">&nbsp;</span>
                                    </div> 
                                    <div class="details_agebetween_loadingbox_rightbox_count"> 
                                        <div class="fll oneshop_overview_countbox mar10" id="subtotal">  <?= $total; ?> </div>
                                        <div class="fs12 mat5"> Out Of </div> <div id="total"> 3500 Specified </div> 
                                    </div>
                                </div>-->
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

<script type="text/javascript" src="<?php echo base_url(); ?>assets/microjs/genericBasicForm.js"></script>
