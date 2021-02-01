<?php
$this->load->module("templates");
$this->templates->basic_info_header();
$this->templates->basic_info_subheader()
?>
</div>
<script>
$(document).ready(function(){
    $("#praveen").keypress(function(){
        $("#searchsugbox").show();
    });
	$(".suggession-close").click(function(){
        $(this).parent().hide();
    });
});
</script>

<style type="text/css">

label {
	color: #999;
	font-size: 12px;
	font-weight: normal;
	position: absolute;
	pointer-events: none;
	left: 5px;
	top: 10px;
	transition: 0.2s ease all;
	-moz-transition: 0.2s ease all;
	-webkit-transition: 0.2s ease all;
}
</style>




<div class="clearfix"></div>



<div class="np_des_module_container_wrap"> <!--module_container start here-->


    <div class="hotel_pachagesummary_box fll">



        <div id="documenter_sidebar">


            <a id="documenter_logo" href="#documenter_cover"></a>
          
            <ul id="documenter_nav">
                <div style="margin-top:-80px; width: 280PX;" class="overflow"> <span class="fll np_des_mar5 np_des_mat10"><img src="assets/basic_info/images/GENERAL_INFORMATION.png"> </span>
              <h2 class="fs18 normal np_des_mab30 np_des_mat20"> General Information </h2>
            </div>

                <li><a href="#documenter_cover" class="current"> Edit Personal Information </a></li>

                <li><a title="Ajax Contact Form" href="#ajax_contact_form" > System Basic Settings </a></li>
                <li><a title="Google Map" href="#google_map"> Change System Themes </a></li>
                <li><a title="HTML" href="#html"> Change Password </a></li>

            </ul>

        </div>
    </div>



    <div class="leftpro_imagebox">
        <div class="left_imagediv">
 <img src="" id="bppic" alt="icon"> 
</div>
        <p class="left_proimageborder">&nbsp;</p>
    </div>


    <div class="right_container_boxdiv">

        <div id="documenter_content">
            <section id="documenter_cover">
                <div class="fll overflow">
                    <h1 class="wi100pstg os_des_borderbottom os_des_pab5 normal np_des_mab10"> Edit Personal Information </h1>
                    <div id="personal_info">
                    </div>
                </div>
            </section>
            <section id="ajax_contact_form">

                <div class="fll overflow wi100pstg">

                    <h1 class="wi100pstg os_des_borderbottom os_des_pab5 normal np_des_mab10"> System Basic Settings </h1>

                    <div id="system_settings"> </div>
                </div>


                <p>&nbsp;</p>
                <p>&nbsp;</p>
                <p>&nbsp;</p>
                <p>&nbsp;</p>
                <p>&nbsp;</p>

            </section>








            <section id="google_map" class="minheight450">
                <h1 class="wi100pstg os_des_borderbottom os_des_pab5 normal np_des_mab10"> Change System Themes  </h1>

                <div class="theme_maincontent_wrap np_des_mat25">

                    <div class="theme_one">
                        <div class="click_photoOptionsbooks">   <h5> Clouds </h5></div>
                        <img alt="icon" tname="Clouds" class="<?php if( $theme[0]["theme"]=="Clouds"){ echo "activetheme"; }?>" src="<?php echo BASEINFO_PATH; ?>images/theme1.jpg">
                    </div>

                    <div class="theme_one">
                        <div class="click_photoOptionsbooks">   <h5> Default : Matrix </h5></div>
                        <img alt="icon" tname="Fallingballs" class="<?php if( $theme[0]["theme"]=="Fallingballs"){ echo "activetheme"; }?>" src="<?php echo BASEINFO_PATH; ?>images/theme3.jpg">
                    </div>

                    <div class="theme_one">
                        <div class="click_photoOptionsbooks">   <h5> Falling Balls</h5></div>
                        <img alt="icon" tname="Matrix" class="<?php if( $theme[0]["theme"]=="Matrix"){ echo "activetheme"; }?>" src="<?php echo BASEINFO_PATH; ?>images/theme4.jpg">
                    </div>
                    <div class="theme_one">
                        <div class="click_photoOptionsbooks">   <h5> Black </h5></div>
                        <img alt="icon" tname="Black" class="<?php if( $theme[0]["theme"]=="Black"){ echo "activetheme"; }?>" src="<?php echo BASEINFO_PATH; ?>images/Black.png">
                    </div>
                    <div class="theme_one">
                        <div class="click_photoOptionsbooks">   <h5> Grey </h5></div>
                        <img alt="icon" tname="Grey" class="<?php if( $theme[0]["theme"]=="Grey"){ echo "activetheme"; }?>" src="<?php echo BASEINFO_PATH; ?>images/Grey.png">
                    </div>
                    <div class="theme_one">
                        <div class="click_photoOptionsbooks">   <h5> Hunter Green</h5></div>
                        <img alt="icon" tname="HunterGreen" class="<?php if( $theme[0]["theme"]=="HunterGreen"){ echo "activetheme"; }?>" src="<?php echo BASEINFO_PATH; ?>images/HunterGreen.png">
                    </div>
                    <div class="theme_one">
                        <div class="click_photoOptionsbooks">   <h5> Navy Blue </h5></div>
                        <img alt="icon" tname="NavyBlue" class="<?php if( $theme[0]["theme"]=="NavyBlue"){ echo "activetheme"; }?>" src="<?php echo BASEINFO_PATH; ?>images/NavyBlue.png">
                    </div>
                    <div class="theme_one">
                        <div class="click_photoOptionsbooks">   <h5> Buzzin </h5></div>
                        <img alt="icon" tname="Buzzin" class="<?php if( $theme[0]["theme"]=="Buzzin"){ echo "activetheme"; }?>" src="<?php echo BASEINFO_PATH; ?>images/buz.jpg">
                    </div>
                    <div class="theme_one">
                        <div class="click_photoOptionsbooks">   <h5> Click </h5></div>
                        <img alt="icon" tname="Click" class="<?php if( $theme[0]["theme"]=="Click"){ echo "activetheme"; }?>" src="<?php echo BASEINFO_PATH; ?>images/clk.jpg">
                    </div>
                    <div class="theme_one">
                        <div class="click_photoOptionsbooks">   <h5> Mail </h5></div>
                        <img alt="icon" tname="Mail" class="<?php if( $theme[0]["theme"]=="Mail"){ echo "activetheme"; }?>" src="<?php echo BASEINFO_PATH; ?>images/360mail.jpg">
                    </div>
                    <div class="theme_one">
                        <div class="click_photoOptionsbooks">   <h5> Cooffice </h5></div>
                        <img alt="icon" tname="Cooffice" class="<?php if( $theme[0]["theme"]=="Coffice"){ echo "activetheme"; }?>" src="<?php echo BASEINFO_PATH; ?>images/cof.jpg">
                    </div>
                    <div class="theme_one">
                        <div class="click_photoOptionsbooks">   <h5> Cv Bank </h5></div>
                        <img alt="icon" tname="Cvbank" class="<?php if( $theme[0]["theme"]=="Cvbank"){ echo "activetheme"; }?>" src="<?php echo BASEINFO_PATH; ?>images/cvb.jpg">
                    </div>
                    <div class="theme_one">
                        <div class="click_photoOptionsbooks">   <h5> DealerX </h5></div>
                        <img alt="icon" tname="Dealerx" class="<?php if( $theme[0]["theme"]=="Dealerx"){ echo "activetheme"; }?>" src="<?php echo BASEINFO_PATH; ?>images/dx.jpg">
                    </div>
                    <div class="theme_one">
                        <div class="click_photoOptionsbooks">   <h5> Find It </h5></div>
                        <img alt="icon" tname="Findit" class="<?php if( $theme[0]["theme"]=="Findit"){ echo "activetheme"; }?>" src="<?php echo BASEINFO_PATH; ?>images/fi.jpg">
                    </div>
                    <div class="theme_one">
                        <div class="click_photoOptionsbooks">   <h5> IsNews </h5></div>
                        <img alt="icon" tname="Isnews" class="<?php if( $theme[0]["theme"]=="Isnews"){ echo "activetheme"; }?>" src="<?php echo BASEINFO_PATH; ?>images/isnews.jpg">
                    </div>
                    <div class="theme_one">
                        <div class="click_photoOptionsbooks">   <h5> Netpro </h5></div>
                        <img alt="icon" tname="Netpro" class="<?php if( $theme[0]["theme"]=="Netpro"){ echo "activetheme"; }?>" src="<?php echo BASEINFO_PATH; ?>images/netpro.jpg">
                    </div>
                    <div class="theme_one">
                        <div class="click_photoOptionsbooks">   <h5> OneNetwork </h5></div>
                        <img alt="icon" tname="Onetwork" class="<?php if( $theme[0]["theme"]=="Onetwork"){ echo "activetheme"; }?>" src="<?php echo BASEINFO_PATH; ?>images/onet.jpg">
                    </div>
                    <div class="theme_one">
                        <div class="click_photoOptionsbooks">   <h5> OneIDShip </h5></div>
                        <img alt="icon" tname="Oship" class="<?php if( $theme[0]["theme"]=="Oship"){ echo "activetheme"; }?>" src="<?php echo BASEINFO_PATH; ?>images/oship.jpg">
                    </div>
                    <div class="theme_one">
                        <div class="click_photoOptionsbooks">   <h5> Oneshop </h5></div>
                        <img alt="icon" tname="Oneshop" class="<?php if( $theme[0]["theme"]=="Oneshop"){ echo "activetheme"; }?>" src="<?php echo BASEINFO_PATH; ?>images/oshop.jpg">
                    </div>
                    <div class="theme_one">
                        <div class="click_photoOptionsbooks">   <h5> OneVision </h5></div>
                        <img alt="icon" tname="Ovision" class="<?php if( $theme[0]["theme"]=="Ovision"){ echo "activetheme"; }?>" src="<?php echo BASEINFO_PATH; ?>images/ovision.jpg">
                    </div>
                    <div class="theme_one">
                        <div class="click_photoOptionsbooks">   <h5> Travel time </h5></div>
                        <img alt="icon" tname="Ttime" class="<?php if( $theme[0]["theme"]=="Ttime"){ echo "activetheme"; }?>" src="<?php echo BASEINFO_PATH; ?>images/ttime.jpg">
                    </div>
                    <div class="theme_one">
                        <div class="click_photoOptionsbooks">   <h5> Tunnel </h5></div>
                        <img alt="icon" tname="Tunnel" class="<?php if( $theme[0]["theme"]=="Tunnel"){ echo "activetheme"; }?>" src="<?php echo BASEINFO_PATH; ?>images/tunnel.jpg">
                    </div>
                    <div class="theme_one">
                        <div class="click_photoOptionsbooks">   <h5> Vcom </h5></div>
                        <img alt="icon" tname="Vcom" class="<?php if( $theme[0]["theme"]=="Vcom"){ echo "activetheme"; }?>" src="<?php echo BASEINFO_PATH; ?>images/vcom.jpg">
                    </div>

                <p class="flr mat5" id="tprogress">
                    <input type="button" value="Apply" id='theam_appy' class="button_new os_des_mal10">
                </p>

                </div>
            </section>
            <section id="html">
                <h1 class="wi100pstg os_des_borderbottom os_des_pab5 normal np_des_mab10 np_des_mab40"> Change Password </h1>

                <div id="pwchsec">
               
                </div>

            </section>
        </div>
    </div> 

</div> <!--module container end here-->

<div class="clearfix"></div>

<?php $this->templates->basic_info_footer();?>

<script src="<?php echo base_url();?>/assets/microjs/basicinfo.js"></script>
