<?php
$this->load->module("templates");
$this->templates->coheader();
?>

<div class="clearfix"></div>

<div class="codes_module_container_wrap">
    <div class="wrapper-inner">



        <div class="j-left-container mab50">
            <div class="fll overflow wi100pstg mab15"> <h2 class="mat8 border_bottom wi100pstg fll pab10 overflow"> Interview Over Pose </h2> </div>
            <div class="wi100pstg overflow">

                <div class="wi100pstg fll overflow">
                    <div class="Comp_profile_banner_wrap">
                        <div class="dealer-cover-logo-newbox"> <img class="dealer-cover-logo-image-newimage" src="<?php echo base_url()."assets/"?>images/avatar-3.jpg"> </div>
                        <div class="Comp_profile_companynamewrap"> Amazon Company </div>
                    </div>
                    <div class="Comp_profile_banner_shadow"> <img src="<?php echo base_url()."assets/"?>images/shadow.png"> </div>
                </div>

                <div class="wi100pstg border_bottom pab5 mat20 fll overflow">
                    &nbsp;
                </div>

                <div class="wi100pstg mat20 fll overflow">
                    <p class="acenter mat20 fs24"> Thank You for ... </p>
                    <p class="fs14 wi90 acenter mat20 lh18">  Mercedes-Benz is a global automobile manufacturer global automobile manufactu\company Daimler AG. The brand is known for luxury vehicles, buses, coaches, and trucks. The headquarters of Mercedes-Benz is in Stuttgart, of Mercedes-Benz is in Stuttgart, Baden-Württemberg, Germany. Wikipedia  </p>


                    <div class="wi70 mat20 mat50 overflow" style="margin:0 auto;">
                        <p class="mab10 wi100pstg acenter"> Give interview feedback </p>
                        <textarea class="interview_overtextarea">why we kept meeting...</textarea>
                        <p class="wi100pstg flr mar10 mat5 aright"> 
                            <img src="<?php echo base_url()."assets/"?>images/rate.png" width="20" height="20">
                            <img src="<?php echo base_url()."assets/"?>images/rate.png" width="20" height="20">
                            <img src="<?php echo base_url()."assets/"?>images/rate.png" width="20" height="20">
                            <img src="<?php echo base_url()."assets/"?>images/rate.png" width="20" height="20">
                            <img src="<?php echo base_url()."assets/"?>images/rate.png" width="20" height="20">
                        </p>
                        <input type="button" value="SUBMIT" class="button_new mat10  flr mar10">

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
