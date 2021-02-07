<?php
$this->load->module('templates');
$this->templates->header();
$this->templates->onenet_header("administration");
$employee_code = $emp_details['employee_code'];
?>
<div class="clr">&nbsp;</div>
<div class="new_wrapper">


    <div class="db-nav fll">

    <div class="nav-profile">
    <div class="fll">
    <img width="50" height="50" class="db-pro-img" src="<?php echo base_url(); ?>assets/images/avatar-1.jpg">
    </div>
    <div class="db-pro-info fll">
    <p class="white"><?php echo $emp_details['full_name']; ?></p>
    <p> Administrator </p>
    <p><span class="white">EMPID :</span> <span>ID# <?php echo $emp_details['employee_code']; ?> </span> </p>
    </div>
    </div>


    <ul class="db-sidebar-nav">
                                   <li><a href="<?php echo base_url(); ?>admCases"><img title="settings" alt="settings" src="<?php echo base_url(); ?>assets/images/settings.png"> CASES HISTORY </a></li>
                                   <li><a href="#"><img alt="maximize" src="<?php echo base_url(); ?>assets/images/restore.png"> TEAM </a></li>
                                   <li><a href="#"><img title="settings" alt="settings" src="<?php echo base_url(); ?>assets/images/privacy.png"> CHAT LOGS </a></li>
                                   <li><a href="<?php echo base_url();?>admteam/<?php echo $employee_code;?>"><img title="settings" alt="settings" src="<?php echo base_url(); ?>assets/images/help.png"> MY TEAM </a></li>
                                   <li><a href="#"><img title="settings" alt="settings" src="<?php echo base_url(); ?>assets/images/onenet.png"> REPORT </a></li>
                                   <li><a href="#"><img title="settings" alt="settings" src="<?php echo base_url(); ?>assets/images/help.png"> ESCALATIONS </a></li>                                                                      
                                </ul>


    </div>



    <div class="db-container fll">


    <div class="big-cont-six">
    <h2 class="fs24 wi100pstg borderbottom  pab10 mab30"> Employee Profile -  <?php echo $emp_details['full_name']; ?> </h2>

    <div class="wi100pstg">
    <div class="db-user-profile-leftbox">
    <img width="50" height="50" src="<?php echo base_url(); ?>assets/images/avatar-1.jpg" class="db-user-profile-img"><br>

    <div class="big-active-content-four wi100pstg">
     <p class="fs14 acenter bold"> TEAM </p> 
    <p class="fs14 mat10 gray acenter bold"> ZETA </p> 
    </div>

    <div class="big-active-content-four wi100pstg">
     <p class="fs14 acenter bold"> REPORTS TO </p> 
    <p class="fs14 mat10 gray acenter bold"> <?php
        $campaigns = $this->load->module('campaigns');
        $rep_id = $emp_details['reporting_manager_id'];
        $result = $campaigns->getReportingManager($rep_id);
        echo $result['first_name']." ".$result['last_name']; 
    ?> </p> 
    </div>


    </div>

    <div class="db-user-profile-right-div">
    <div class="right-div-lebelcontent">

    <div class="wi46 fll m-15">
    <p class="fs14 bold"> Full Name </p>
    <p class="fs12 gray mat5"> <?php echo $emp_details['full_name']; ?> </p>
    </div>

    <div class="wi46 fll m-15">
    <p class="fs14 bold"> Employee ID </p>
    <p class="fs12 gray mat5"> <?php echo $emp_details['employee_code']; ?>  </p>
    </div>

    <div class="wi46 fll m-15">
    <p class="fs14 bold"> Department </p>
    <p class="fs12 gray mat5"> <?php echo $emp_details['department']; ?> </p>
    </div>

    <div class="wi46 fll m-15">
    <p class="fs14 bold"> Job Role </p>
    <p class="fs12 gray mat5"> <?php echo $emp_details['designation']; ?> </p>
    </div>

    <div class="wi46 fll m-15">
    <p class="fs14 bold"> Email Address </p>
    <p class="fs12 gray mat5"> <?php echo $emp_details['email']; ?> </p>
    </div>

    <div class="wi46 fll m-15">
    <p class="fs14 bold"> Work Phone Number   </p>
    <p class="fs12 gray mat5"> <?php echo $emp_details['mobile_no']; ?> </p>
    </div>

    <div class="wi46 fll m-15">
    <p class="fs14 bold"> Gender </p>
    <p class="fs12 gray mat5"> <?php echo $emp_details['gender']; ?></p>
    </div>

    <div class="wi46 fll m-15">
    <p class="fs14 bold"> Date Of Birth </p>
    <p class="fs12 gray mat5"> <?php echo $emp_details['dob']; ?> </p>
    </div>

    <div class="wi46 fll m-15">
    <p class="fs14 bold"> Blood Group </p>
    <p class="fs12 gray mat5"><?php echo $emp_details['blood_group']; ?> </p>
    </div>


    <div class="wi46 fll m-15">
    <p class="fs14 bold"> Passport Number </p>
    <p class="fs12 gray mat5"> <?php echo $emp_details['passport_number']; ?> </p>
    </div>



    <div class="wi46 fll m-15">
    <p class="fs14 bold"> Tax Code </p>
    <p class="fs12 gray mat5"> XTTX10786 </p>
    </div>

    <div class="wi46 fll m-15">
    <p class="fs14 bold"> Joined On </p>
    <p class="fs12 gray mat5"> <?php echo $emp_details['employed_since']; ?>  </p>
    </div>



    <div class="wi46 fll m-15">
    <p class="fs14 bold"> Relieving Data </p>
    <p class="fs12 gray mat5"> <?php echo $emp_details['job_relieving_date']; ?> </p>
    </div>

    <div class="wi46 fll m-15">
    <p class="fs14 bold"> Employement Status </p>
    <p class="fs12 gray mat5"> <?php echo $emp_details['status']; ?> </p>
    </div>


    <div class="wi46 fll m-15">
    <p class="fs14 bold"> Work Base Location </p>
    <p class="fs12 gray mat5"> <?php echo $emp_details['duty_location']; ?> </p>
    </div>

    <div class="wi46 fll m-15">
    <p class="fs14 bold"> Nationality </p>
    <p class="fs12 gray mat5"> <?php echo $emp_details['nationality']; ?> </p>
    </div>


    <div class="wi46 fll m-15">
    <p class="fs14 bold"> Address </p>
    <p class="fs12 gray mat5"> 
        <?php 
        
        $contry_name = $campaigns->getCountryName($emp_details['country_id']);
        $city_name = $campaigns->getCityName($emp_details['city_id']);
        $state_name = $campaigns->getStateName($emp_details['state_id']);
        echo $emp_details['address_line1'].", ".$emp_details['address_line2'].", ".$city_name.", ".$state_name.", ".$contry_name." - ".$emp_details['zip_code'] ; ?> </p>
    </div>

    </div>


    <div class="db-user-profile-right-btns-box pab10 pat10">

    <div class="wi100pstg">
    <input type="button" value="MESSAGE" class="btn-normal" name=" "> 
    <input type="button" value="BIODATA" class="btn-normal" name=" "> 
    </div>

    <div class="db-boxes-main-content">
    <div class="db-boxes-div"> <p class="db-boxes-circles-div"> 50% </p> </div>
    <div class="db-boxes-div-left-cont-box"> 
    <p class="colorsecondary"> <?php echo $emp_details['total_case_resolutions']; ?> </p>
    <p class="fs12 mat5"> Case Resolved </p>
    </div>
    </div>

    <div class="db-boxes-main-content">
    <div class="db-boxes-div"> <p class="db-boxes-circles-div"> 50% </p> </div>
    <div class="db-boxes-div-left-cont-box"> 
    <p class="colorsecondary"> <?php echo $emp_details['total_calls_attend']; ?> </p>
    <p class="fs12 mat5"> Call Attends </p>
    </div>
    </div>

    <div class="db-boxes-main-content">
    <div class="db-boxes-div"> <p class="db-boxes-circles-div"> 50% </p> </div>
    <div class="db-boxes-div-left-cont-box"> 
    <p class="colorsecondary"> <?php echo $emp_details['total_tkt_generated']; ?> </p>
    <p class="fs12 mat5"> Ticket Generated </p>
    </div>
    </div>

    <div class="db-boxes-main-content">
    <div class="db-boxes-div"> <p class="db-boxes-circles-div"> 50% </p> </div>
    <div class="db-boxes-div-left-cont-box"> 
    <p class="colorsecondary"> 56% </p>
    <p class="fs12 mat5"> Productivity </p>
    </div>
    </div>



    </div>

    </div>



    <div class="clr"></div>

    </div>


    </div>



    </div>
</div>
 <div class="clr"></div>
<!--module container end here-->
<?php
$this->templates->footer();
?>
