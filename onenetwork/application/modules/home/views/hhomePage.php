<?php
$this->load->module('templates');
$this->templates->header();
?>
<script type="text/javascript">
$('.slider_home').cycle({
	fx:			'scrollHorz',
	next:		'.isdes_nextbtn_h',
	prev:		'.isdes_prevbtn_h',
	timeout:     3000,
	pause:		1
});
</script>
<style>
/*    Need for this page only*/
.SlectBox {
    width: 185px;
}
.codes_btn_up:hover {
    cursor:none;
    background: #8cc152;
}
.codes_upgradethumb_top {
    height: 90px;
}
.codes_upgradepackage_wrap {
    padding-bottom: 20px;
}
.codes_banner_topimagebox {
    box-shadow: 0px 0px 4px 1px #555555;
}
 .upperDiv{
    background: rgba(186,186,186,0.5);
    text-align: center;
    padding: 5px;
    text-align:center;
}
</style>
<div class="codes_module_container_wrap"> <!--module_container start here-->
    <div class="codes_wrapper-inner"><!--wrapper inner start here-->
        <div class="leftbar_slider_te"></div>
        <div class="codes_banner_topimagebox">
            <div class="codes_banner_jobsplaced_totalwrapdiv">    
                <div class="codes_banner_jobsplaced_inmonth">
                    <p>  1000's employees placed in Companies every month! </p>
                </div>
                <div class="codes_alreadyegister_box"><!--pop up box for already registered-->
                    <img src="<?php echo base_url(); ?>assets/images/close.png" style="float:right" class="closeLoginPopup"/>   
                    <p class="mat10"><span class="fll mat5 mar5 mal10 blue bold">Token No:</span><span class="fll"><input type="text" class="codes_txtbox_shortc mal10" id="token_id" name="token_id"></span></p><br>
                    <p class="mat15"><span class="fll mat5  mal10 blue bold">Password:</span><span class="fll"><input type="password" class="codes_txtbox_shortc mal10" id="pwd" name="pwd"></span></p>
                    <div class="clearfix" ></div>
                    <div id="error_div" style="color:red; padding-left:30px; padding-top:3px; font-size:11px;"></div>
                    <div class="mal50 mat5"><input type="button" class="codes_btn mal55" value="Enter" id="enter" ></div>
                </div><!--pop up box for already registered end here-->
                <div class="codes_alreadyegister_boxMessage"><!--pop up box for already registered-->
                    <img src="<?php echo base_url(); ?>assets/images/closeicon.png" style="float:right" class="closeregPopup"/>   
                    <p class="mal50 mat20"><span class="blue bold">Already belongs to a company.</span></p>
                </div><!--pop up box for already registered end here-->
                <?php if(!isset($_SESSION['logged_company'])){ if($hascompany==1){    ?>
                    <span class="codes_wanttoregister_btn alreadyregd fll"> <a href="javascript:void(0)">Register Now!</a></span>    
                <?php }else{  ?>
                    <span class="codes_wanttoregister_btn fll"> <a href="<?php echo base_url().'home/createCompany'; ?>">Register Now!</a></span>
                <?php } ?>
                    <span class="codes_wanttoregister_btn2 flr"> <a href="javascript:void(0)">Already Register ?</a></span>
                <?php } ?>
            </div>
            <img src="<?php echo base_url();?>assets/images/slide2.jpg" alt="image">
        </div><!--end slider-->
        <div class="clearfix"></div>
        <!--searchbar start here-->
        <script src="<?php echo base_url();?>assets/multiselect/jquery.sumoselect.js"></script>
        <link href="<?php echo base_url();?>assets/multiselect/sumoselect.css" rel="stylesheet" />
    <!--/*
    ************************   Purpose: Ckeditor Placing for job description  ********************
    */-->
        <script>
        $( document ).ready( function() {
            window.asd = $('.SlectBox').SumoSelect({ csvDispCount: 3 ,placeholder:'Select Skills Here'});
        });
        </script>
        <div class="">
            <div class="">
                <form  action="<?php echo base_url(); ?>home/searchResults" method="post">
                    <div class="upperDiv">    
                        <select class="codes_slct_co" id="selection"><option value="jobs">Jobs</option><option value="companies">Companies</option></select>
                        <input type="search" class="codes_searchbar" name="companyname" id="companyname" placeholder="Search here">
                        <select class="codes_slct_co" name="countryid" id="countryid"><option value="">Country</option>
                            <?php foreach($countries as $cinfo){?>
                            <option value="<?php echo $cinfo['country_id'];?>"><?php echo $cinfo['country_name'];?></option>
                            <?php } ?>
                        </select>
                        <input type="submit" id="companysearch" name="companywise" class="codes_btn" value="Findit">
                    </div>
                    <div class="codes_jobs_box">
                    <p>
                        <select class="codes_slct_co mal10" name="lacs">
                            <option value="">Select Salary</option> 
                            <option value="1">  < 1 Lac </option>  
                            <?php for($i=2;$i<=100;$i++){ ?>
                             <option value="<?php echo $i;?>"> <?php echo $i;?>  </option>  
                            <?php } ?>
                        </select>
                        <select class="codes_slct_co homeExp" name="years">
                            <option value="">Select Experience</option> 
                            <option value="1">< 1 Year </option>  
                            <?php for($i=2;$i<=50;$i++){ ?>
                                <option value="<?php echo $i;?>"> <?php echo $i;?>  </option>  
                            <?php } ?>
                        </select>
                        <span class="skillset">
                            <select multiple="multiple" name="skills[]" id="multiple_skills" class="SlectBox">
                                 <?php foreach($skills as $skillRes){?>
                                 <option value="<?php echo $skillRes['skill_name'];?>"><?php echo $skillRes['skill_name'];?></option>
                                 <?php } ?>
                            </select>
                        </span>
                    </p>
                    <p  class="mat10 buttonHome">
                    <!--<label class="lh30 black fs14 mal5 " style="padding-left: 44px;">Experience&nbsp;&nbsp;:&nbsp;&nbsp;</label>-->
                        <input type="submit" id="companysearch" name="jobwise" class="codes_btn" style="margin-left:13px;" value="Findit">
                    </p>
                    </div>
            <!--home slider start here-->
                </form>
            </div>
        <script>
            $("#companysearch").hide();
        </script>
        </div>
        <!--searchbar end here-->
        <p class="codes_head_home acenter">1000 Companies connected with oneidnet!!</p>
        <div class="codes_home_slider">
        <div class="isdes_nextbtn_h"><span class="pat10">&rsaquo;</span></div>
        <div class="isdes_prevbtn_h"><span>&lsaquo;</span></div>            
        <div class="leftbar_slider_te"></div>
            <div class="slider_home">
                <?php if($slidecmpny){
                    for($i=0;$i<2;$i++){ 
                        if($i==0){ $j=0;$end=8; }
                        if($i==1){ $j=9;$end=17; }
                        ?>
                     <!--slider thumb start here-->
                    <div class="codes_slider_box_thumb">
                        <ul>
                            <?php  for($j;$j<$end;$j++){
                            if(isset($slidecmpny[$j]['logo_path'])){ ?>
                               <li><a href="<?php echo base_url().'profile/companyProfile/'.$slidecmpny[$j]['company_aid'];?>"><img src="<?php echo base_url().'data/images/logo/si/'.$slidecmpny[$j]['logo_path'];?>" alt="logo"></a></li>
                            <?php }else{ ?> 
                                <li><a href="javascript:void(0);"><img src="<?php echo base_url().'data/images/logo/si/noimage.png';?>" alt="logo"></a></li>
                            <?php } } ?>
                       </ul>  
                    </div>
                    <!--slider thumb closed here--> 
                <?php } }else{ 
                    for($i=0;$i<2;$i++){ 
                        if($i==0){ $j=0;$end=8; }
                        if($i==1){ $j=9;$end=17; }
                        ?>
                     <!--slider thumb start here-->
                    <div class="codes_slider_box_thumb">
                       <ul>
                            <?php  for($j;$j<$end;$j++){ ?>
                                <li><a href="javascript:void(0);"><img src="<?php echo base_url().'data/images/logo/si/noimage.png';?>" alt="logo"></a></li>
                            <?php  } ?>
                       </ul>  
                    </div>
                   <!--slider thumb closed here--> 
                <?php }
                } ?>
            </div><!--end slider-->
            <div class="clearfix"></div>
        </div>
<!--home slider closed here-->
        <div class="codes_upgradepackage_wrap">
         <!--upgrade left start here-->
            <?php if($parti_pckgs){  foreach($parti_pckgs as $pkgs){  ?>
         <!--upgrade thumb  start here-->                 
            <div class="codes_upgradethumb" id="home_upgrade_package">               
                <div class="codes_upgradethumb_top">         
                    <h2 class="white acenter pat10"><?php echo $pkgs['package_name']; ?></h2>
                    <p class="white acenter fs25 mat20 wwp"><?php echo $pkgs['price']; ?>/-only</p>
                </div>         
                <div class="codes_upgradethumb_bottom">         
                    <p class="paall black fs14 acenter bold">Admins<span class="pal5"><?php echo $pkgs['admin']; ?></span></p>
                    <p class="paall black fs14 acenter bold">HRs<span class="pal5"><?php echo $pkgs['hr']; ?></span></p>
                    <p class="paall black fs14 acenter bold"><?php if(($pkgs['virtualization']=='No') || ($pkgs['virtualization']=='')){ echo $pkgs['virtualization']; } ?> Virtualization</p>
                    <p class="paall black fs14 acenter bold">JOB Postings<span class="pal5"><?php echo $pkgs['job_post']; ?></span></p>
                    <p class="paall black fs14 acenter bold">CV Downloads<span class="pal5"><?php echo $pkgs['cv_download']; ?></span></p>
                    <p class="paall black fs14 acenter bold"><?php if(($pkgs['search_tool']=='No') || ($pkgs['search_tool']=='')){ echo $pkgs['search_tool']; } ?> Search Candidates</p>
                    <p class="paall black fs14 acenter bold">Vcom Call Duration<span class="pal5"><?php echo $pkgs['vcom_max_call_duration']; ?></span></p>
                    <p class="paall black fs14 acenter bold">Vcom Redial Attempt<span class="pal5"><?php echo $pkgs['vcom_redial_attempt']; ?></span></p>
                    <p class="paall black fs14 acenter bold">Request For Interviews<span class="pal5"><?php echo $pkgs['total_request_for_interview']; ?></span></p>
                </div>
            </div>
         <!--upgrade thumb closed here-->
        <?php } } ?>
    </div>
</div>
<?php
$this->load->module('templates');
$this->templates->footer();
?>
