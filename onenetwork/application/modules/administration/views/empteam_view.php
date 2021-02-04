<?php
$this->load->module('templates');
$this->templates->header();
$this->templates->onenet_header("administration");
//echo "<pre>";
//print_r($team_details);
$team_name = $team_details[0]["team_name"];
$team_id_fk = $team_details[0]["team_id_fk"];
if($team_id_fk == "")$team_id_fk  = 1;

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
    
    <div class="db-container fll">
        <div class="big-cont-six">

        <div class="fll wi100pstg borderbottom pab10 mab30">
        <h2 class="fs24 fll"> <?php echo $team_name;?> </h2>
        <p class="flr np_des_mar10"><input type="button" name="add_emp" id="add_emp" onclick="addemployees()" class="np_des_addaccess_btn_save" value="+ Add New"> </p>
        </div>


        <div class="wi100pstg overflow fll">
            <?php
                if(count($team_details) > 0){
                    foreach($team_details as $team_data){
                        ?>
                          <div class="db-user-profile-team-box">
                            <p class="fll checkbox_margins"> <!--<input type="checkbox">--></p>
                              <a href="<?php echo base_url(); ?>admprofile/<?php echo $team_data["employee_code"] ?>"><img width="50" height="50" class="db-user-team-profile-image" src="<?php echo base_url(); ?>assets/images/avatar-3.jpg"></a>
                            <div class="db-user-team-username"> <p class="acenter wi100pstg bold"> <?php echo $team_data["emp_name"];?>  </p> 
                            <p class="acenter mat5 wi100pstg gray fs14 bold"> <?php echo $team_data["designation"];?>  </p> </div>
                        </div>
                        <?php
                    }
                }else{
                  echo "No Team Found";
                }
            ?>
        </div>


        </div>



    </div>



</div>
 <div class="clr"></div>
<!--module container end here-->
<?php
$this->templates->footer();
?>
<script type="text/javascript">
   
    function addemployees(){
       location.href = "<?php echo base_url();?>addempprofile/<?php echo $team_id_fk;?>";
    }
</script>
