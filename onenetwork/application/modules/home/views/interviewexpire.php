<?php
$this->load->module("templates");
$this->templates->coheader();
?>
<div class="clearfix"></div>

<div class="codes_module_container_wrap">
    <div class="wrapper-inner">
        <div class="j-left-container mab50">
            <div class="fll overflow wi100pstg mab15"> <h2 class="mat8 border_bottom wi100pstg fll pab10 overflow"> Page Title </h2> </div>
            <div class="wi100pstg overflow">

                <div class="wi100pstg fll">
                    <div class="dealer-cover-banner">
                        <div class="dealer-cover-logo"> <img src="<?php echo base_url()."assets/";?>images/avatar-3.jpg" class="dealer-cover-logo-image"> </div>
                        <div class="dealer-cover-name">
                            <div class="fll">
                                <h2 class="white"> Mercedes-Benz India </h2>
                                <div class="wi100pstg white mat5"> <p class="fll bold"> Followers : </p> <p class="fll"> 2400 </p> </div>
                            </div>
                            <div class="flr">
                                <input type="button" name="button" class="follow2 aleft" value="FOLLOW">
                            </div>
                        </div>
                        <img src="<?php echo base_url()."assets/";?>images/mercedes.jpg" class="dealer-cover-image">
                    </div>
                    <div class="Comp_profile_banner_shadow"> <img src="<?php echo base_url()."assets/";?>images/shadow.png"> </div>
                </div>

                <div class="wi100pstg border_bottom pab5 mat20 fll overflow">
                    &nbsp;
                </div>

                <div class="wi100pstg mat20 fll overflow">
                    <p class="acenter mat30 fs36"> Welcome to Amazon!!! </p>

                    <div class="mat50 acenter" style="width:250px; margin:0 auto;">
                        <p class="fs16 mab10 mat10 acenter">( Time Left for interview )</p>
                        <img src="<?php echo base_url()."assets/";?>images/time.png" width="150" height="45">
                    </div>

                    <div class="oneshop_overview_countbox mat50">
                        <p class="fs24 acenter red"> Interview Link is expire </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="j-right-container mat30">
<?php 
$sugobj=$this->load->module("suggestions");
$sugobj->companySuggestion();
$sugobj->jobSuggestion();
?>
        </div>
    </div>
    <?php
    $this->templates->footer();
    ?>
