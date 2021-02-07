<?php
$this->load->module("templates");
$this->templates->coheader();
?>
<link rel="stylesheet" href="<?php echo base_url()."assets/css/"?>autocmt.css">
  <script src="<?php echo base_url()."assets/js/"?>jquery-ui.js"></script>
<div class="clearfix"></div>
<div class="codes_module_container_wrap">
    <div class="wid100">
        <div class="left_banner">
            <div class="wid100 fll overflow acenter" style="margin-top:30px;">
                <h2 class="mat30 mab10 fs30 normal letter-spacing ff lh25"> Create a Great Office to Suit Your Business Needs!</h2>
            </div>
            <div class="clearfix"></div>
            <div class="fi_form_mainbox" style="margin-top:45px;"><!--form mainbox start here-->
                <div class="fi_mainformrow"><!--form main row start here-->
                    <div class="fi_mainformleft"><!--form main left start here-->
                        <input type="search" contenteditable="true" spellcheck="true" autocorrect="on"  placeholder="Find Here" name="fi_search" class="fi_srch fll" id="home_seach_sug_id">
<script>
    $( "#home_seach_sug_id" ).autocomplete({
      source: '<?php echo base_url();?>profile/cosearch',
	  minLength: 2
    });
    </script>
                    </div><!--form main left closed here-->
                    <div class="fi_mainformright"><!--form main right start here-->
                        <select class="SlectBox fll" name="selectType" placeholder="Context" id="cosearchtype">
                            <option value="COMPANIES">Companies</option>
                        <option value="JOBS">Jobs</option>
                        </select>
                        <input type="submit" class="fi_btn flr" id="cosearchsubmit" value="FINDIT" name="submit">
                    </div><!--main form right closed here-->
                </div><!--form main row closed here-->
            </div>
            <div class="wi30 overflow mat30">

                <?php if (!isset($_SESSION['logged_company'])) {
                    if ($hascompany == 1) { ?>
                        <span class="codes_wanttoregister_btn  fll" id="alreadybelongstocompany"> <a href="#">Register Your Company Now</a></span>
                    <?php } else { ?>
                        <span class="codes_wanttoregister_btn fll"> <a href="<?php echo ONENETWORKURL. 'os_package/copackages'; ?>">Register Your Company Now</a></span>

                    <?php } ?>
                    <span class="codes_wanttoregister_btn2 flr"> <a href="#" id="meeting-popup">Company Login</a></span>
                <?php } ?>
            </div>  
        </div>
    <div id="searchresult">
        <div class="wi90 mab10 mat20">
            <div class="wi90 overflow mat30">
                
                <div class="circle_outsidebox">
                <div class="circle1">
                    <img src="<?php echo base_url(); ?>assets/images/jobs.png" class="" width="60" height="60">
                    <p class="acenter bold fs16 mat10">  </p>
                </div>
                <p class="acenter2 fll wi100pstg  fs20 mat30"> JOBS  </p>  
                </div>
                
                
                <div class="circle_outsidebox">
                <div class="circle1">
                    <img src="<?php echo base_url(); ?>assets/images/1466693339_03.Office.png" class="" width="60" height="60">
                    <p class="acenter bold fs16 mat10">  </p>
                </div>
                <p class="acenter2 fll wi100pstg  fs20 mat30"> COMPANIES  </p>  
                </div>
                
                <div class="circle_outsidebox">
                <div class="circle1">
                    <img src="<?php echo base_url(); ?>assets/images/cvs.png" class="" width="60" height="60">
                    <p class="acenter bold fs16 mat10">  </p>
                </div>
                <p class="acenter2 fll wi100pstg  fs20 mat30"> CV'S  </p>  
                </div>
                
                 <div class="circle_outsidebox">
                <div class="circle1">
                    <img src="<?php echo base_url(); ?>assets/images/rep.png" class="" width="60" height="60">
                    <p class="acenter bold fs16 mat10">  </p>
                </div>
                <p class="acenter2 fll wi100pstg  fs20 mat30"> REPRESENTATIVES  </p>  
                </div>
                
                
               
                
            </div>
        </div> 
        <div class="wi70 border_bottom mab10 overflow acenter mat30">
            <h2 class="mat30 red lh30"> RUN YOUR BUSINESS EASIER WITH CORPORATE OFFICE! </h2>
            <p class="fs14 mat15 mab10 lh20"> SIMPLIFY YOUR RECRUITMENT PROCESS / APPLY TO A JOB / CREATE VIRTUAL OFFICES & MUCH MORE </p>
        </div>
        <div class="wi90 mab50 overflow mat50 bussiness_wrap">

            <div class="box1">
                <p class="fll mab10 mat5 mar10"><img src="<?php echo base_url(); ?>assets/images/virtualization.png" width="30" height="30"></p> 
                <h2> Virtualization </h2>
                <p class="fll">Get a Virtual Office, Virtual Assistance, Add HR Representatives, Corporate Representatives & Much More</p>
            </div>
            <div class="box1">
                <p class="fll mab10 mat5 mar10"><img width="30" height="30" src="<?php echo base_url(); ?>assets/images/gethired.png"></p>
                <h2> Get Hired </h2>
                <p class="fll"> Average 200+ candidates hired every month through Corporate Office across the world </p>
            </div>
            <div class="box1">
                <p class="fll mab10 mat5 mar10"><img width="30" height="30" src="<?php echo base_url(); ?>assets/images/simplify.png"></p> 
                <h2> Simplicity </h2>
                <p class="fll"> Manage Your Operations Effectively and Define the Effectiveness of Your Business  </p>
            </div>
            <div class="box1">
                <p class="fll mab10 mat5 mar10"><img width="30" height="30" src="<?php echo base_url(); ?>assets/images/qualitymatch.png"></p>
                <h2> Quality Match </h2>
                <p class="fll"> Find Exact Matches for Your Business Needs Among the Millions..</p>
            </div>
        </div>
    </div>
    </div>
    <?php
    $this->templates->footer();
    ?>
    <script src="<?php echo base_url(); ?>assets/microjs/homejs.js" type="text/javascript"></script>



