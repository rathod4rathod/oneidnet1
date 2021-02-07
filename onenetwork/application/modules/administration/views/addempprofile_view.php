<?php
$this->load->module('templates');
$this->templates->header();
$this->templates->onenet_header("administration");
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
            <li><a href="#"><img title="settings" alt="settings" src="<?php echo base_url(); ?>assets/images/settings.png"> Staffs</a></li>
            <li><a href="#"><img alt="maximize" src="images/restore.png"> Edit Company Details</a></li>
            <li><a href="#"><img title="settings" alt="settings" src="<?php echo base_url(); ?>assets/images/privacy.png"> Jobs</a></li>
            <li><a href="#"><img title="settings" alt="settings" src="<?php echo base_url(); ?>assets/images/onenet.png"> Meetings</a></li>
            <li><a href="#"><img title="settings" alt="settings" src="<?php echo base_url(); ?>assets/images/help.png"> Calls</a></li>
        </ul>

    </div>
    <form name="emp_frm" method="post" id="emp_frm">
        <input type="hidden" name="team_id" id="team_id" value="<?php echo $team_id;?>">
        <input type="hidden" name="profile_user_id" id="profile_user_id">
    <div class="db-container fll">
        <div class="big-cont-six">
            <h2 class="fs24 wi100pstg borderbottom  pab10 mab30"> Add Employee </h2>

            <div class="wi100pstg">

            <div class="wi100pstg mal20 flr">
                    <input type="submit" value="CONFIRM" class="np_des_checkout_btn_new aright" name="button">  
                    </div>
            <span id="err_disp"></span>
             <div class="group mat30 wi65 fll">
            <input type="text" class="wi100pstg" id="emp_email" name="emp_email" required="">
            <span class="highlight"></span> <span class="bar"></span>
            <label class="bold"> Email ID </label>
            </div>
                
            <div class="group mat30 wi65 fll">
            <input type="text" class="wi100pstg" id="full_name" name="full_name" required="">
            <span class="highlight"></span> <span class="bar"></span>
            <label class="bold"> Full Name </label>
            </div>

            <div class="group mat20 wi65 fll">
                <p class="class-one mab10">Department </p>
                <select name="department" id="department" class="oneshop_selectbox_field">
                    <option value="DEVELOPMENT">DEVELOPMENT</option>
                    <option value="EXECUTIVES">EXECUTIVES</option>
                    <option value="MANAGEMENT">MANAGEMENT</option>
                    <option value="CUSTOMER_SUPPORT">CUSTOMER SUPPORT</option>
                    <option value="INVESTIGATION">INVESTIGATION</option>
                    <option value="LOGISTICS">LOGISTICS</option>
                    <option value="RESEARCH">RESEARCH</option>
                </select>
            </div>

            <div class="group mat20 wi65 fll">
            <input type="text" class="wi100pstg" name="designation" id="designation" required="">
            <span class="highlight"></span> <span class="bar"></span>
            <label class="bold"> Designation </label>
            </div>

            <div class="group mat20 wi65 fll">
            <input type="text" class="wi100pstg" id="duty_location" name="duty_location" required="">
            <span class="highlight"></span> <span class="bar"></span>
            <label class="bold"> Duty Location </label>
            </div>

            <div class="group mat20 wi65 fll">
            <input type="text" class="wi100pstg" id="work_mobile_number" name="work_mobile_number" required="">
            <span class="highlight"></span> <span class="bar"></span>
            <label class="bold"> Mobile Number </label>
            </div>
            
            <div class="group mat20 wi65 fll">
                <p class="class-one mab10">Blood Group </p>
                <select name="blood_group" id="blood_group" class="oneshop_selectbox_field">
                    <option value="A+">A+</option>
                    <option value="B+">B+</option>
                    <option value="A-">A-</option>
                    <option value="B-">B-</option>
                    <option value="O+">O+</option>
                    <option value="O-">O-</option>
                    <option value="AB+">AB+</option>
                    <option value="AB-">AB-</option>
                </select>
            </div>
                
            <div class="group mat30 wi65 fll">
            <input type="text" class="wi100pstg" id="total_experience" name="total_experience" required="">
            <span class="highlight"></span> <span class="bar"></span>
            <label class="bold"> Total Experience </label>
            </div>
                
            <div class="group mat30 wi65 fll">
            <input type="text" class="wi100pstg" id="passport_number" name="passport_number" required="">
            <span class="highlight"></span> <span class="bar"></span>
            <label class="bold"> Passport Number </label>
            </div>
            
            <div class="group mat30 wi65 fll">
             <p> <input type="text"  id="nationality" name="nationality" class="wi100pstg"> </p>
            <span class="highlight"></span> <span class="bar"></span>
            <label class="bold"> Nationality </label>
            </div>
                
            <div class="group mat30 wi65 fll">
            <input type="text" class="wi100pstg" id="highest_degree" name="highest_degree" required="">
            <span class="highlight"></span> <span class="bar"></span>
            <label class="bold"> Highest Degree </label>
            </div>
                            
            <div class="group mat30 wi65 fll">
                <input type="text" readonly="" class="oneshop_productfield_textbox_date" id="employed_since" name="employed_since" required="">
            <span class="highlight"></span> <span class="bar"></span>
            <label class="bold"> Employed Since </label>
            </div>
                
            <div class="group mat30 wi65 fll">
                <input type="text" readonly="" class="oneshop_productfield_textbox_date" id="job_relieving_date" name="job_relieving_date" required="">
            <span class="highlight"></span> <span class="bar"></span>
            <label class="bold">Job Relieving Date </label>
            </div>
                
            <div class="group mat30 wi65 fll">
            <input type="text" class="wi100pstg" id="total_work_days" name="total_work_days" required="">
            <span class="highlight"></span> <span class="bar"></span>
            <label class="bold"> Total Work Days </label>
            </div>

            <div class="wi100pstg mal20 mab15 flr">
                    <input type="submit" value="CONFIRM" class="np_des_checkout_btn_new aright" name="button">  
                    </div>

            </div>

        </div>



</div>
        <input type="hidden" name="base_url" id="base_url" value="<?php echo base_url();?>">
</form>


</div>
 <div class="clr"></div>
 <script type="text/javascript" src="<?php echo base_url() . "/application/modules/administration/microjs/"; ?>employee.js"></script>
<script src="<?php echo base_url() . "assets/js/prototype.js" ?>"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/jquery-ui.css"> 
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-ui.js"></script>
<script type="text/javascript">
   $(function () {
        $("#employed_since,#job_relieving_date").datepicker({
            dateFormat: 'yy-mm-dd'
        });
       

    });
</script>
<!--module container end here-->
<?php
$this->templates->footer();
?>
