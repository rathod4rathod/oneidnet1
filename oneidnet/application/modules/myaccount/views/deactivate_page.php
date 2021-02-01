<?php
$this->load->module("templates");
$this->templates->basic_info_header();
$this->templates->basic_info_subheader()
?>
</div>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/jquery-ui.css">
<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery-ui.js'?>"></script>
<div class="np_des_module_container_wrap"> <!--module_container start here-->

    <div class="hotel_pachagesummary_box fll">
        <div id="documenter_sidebar">
            <a id="documenter_logo" href="#documenter_cover"></a>
            <ul id="documenter_nav">
                <div class="overflow" style="margin-top:-80px;"> <span class="fll np_des_mar5"><img src="<?php echo base_url().'assets/basic_info/images/PEOPLE.png'?>"> </span> <h2 class="fs18 normal np_des_mab40 np_des_mat10"> ACCOUNTS </h2> </div>
                <li><a href="#documenter_cover" classid="documenter_cover"  class="manageaccount  current"> Deactivate Account </a></li>
                <li><a title="Ajax Contact Form" classid="#ajax_contact_form"  class="manageaccount " href="#ajax_contact_form" > Archive Your Account </a></li>
<!--                <li><a title="Google Map" href="#google_map"> Celebrities </a></li>-->
            </ul>

        </div>
    </div>

    <div class="right_container_rightnew_wrapper">

        <div id="documenter_content">

            <section id="documenter_cover">
                <h1 class="wi100pstg os_des_borderbottom os_des_pab5 normal np_des_mab10"> Deactivate Your Account </h1>
                <p class="fs12 lh18">Regarding the user's decision to deactivate or delete his/her account in ONEIDNET, please be informed that being the owner of your ONEIDNET account, you have the right to deactivate or delete your account either temporary or permanently. The difference between temporary and permanent deactivation is that with temporary deletion we provide you with the flexibility to reactivate your ONEIDNET account automatically within 5 days after temporary deactivation, permanent deletion of a user's account does not prompt our system to enter a date for reactivation.</p>
                <br><br>
                <p class="fs12 lh18">Although, ONEIDNET provides its users with the flexibility to access their account at any point later in the future should the user decide to reactivate his/her account. This flexibility is possible by allowing permanently deleted accounts to be accessible and renewed by its authenticated owner the next time the user accesses ONEIDNET to sign in again.</p>
                <br><br>
                <br><br>
                <div class="wi100pstg mat20 fll">
                    <p class="fll wi100pstg  np_des_mat5"><span style="font-weight: bold">Type of Deletion:</span></p>
                    <p class="fll wi100pstg  np_des_mat5">
                        <span class="fll">
                            <select id="deletion_type" style="border:1px solid #ddd;padding:2px;">
                                <option value="">Select deletion type</option>
                                <option value="TEMPORARY_DELETION">Temporary Deletion</option>
                                <option value="PERMANENT_DELETION">Permanent Deletion</option>
                            </select>
                        </span>
                        <span id="deletion_error"></span>
                    </p>
                </div>
                <div class="wi100pstg mat20 fll" id="subopt_deletion">
<!--                    <p class="fll wi100pstg  np_des_mat5"> <span class="fll"><input type="radio" checked="" name="sys_option" value="Access to the Internet through ONEIDNET is a privilege"></span> <span class="bp_des_mat3 fll os_des_mal5"> Access to the Internet through ONEIDNET is a privilege </span></p>
                    <p class="fll wi100pstg np_des_mat5"> <span class="fll"><input type="radio" checked="" name="sys_option" value="Internet through ONEIDNET is a privilege"></span> <span class="bp_des_mat3 fll os_des_mal5"> Internet through ONEIDNET is a privilege </span></p>
                    <p class="fll wi100pstg np_des_mat5"> <span class="fll"><input type="radio" checked="" name="sys_option" value="through ONEIDNET is a privilege"></span> <span class="bp_des_mat3 fll os_des_mal5"> through ONEIDNET is a privilege </span></p>-->
                </div>
                <div class="clearfix">&nbsp;</div>
                <div class="wi100pstg fll">
                    <textarea cols="50" class="deactivete_textarea" id="reason"> </textarea>
                    <span id="reason_error"></span>
                </div>

                <div class="clearfix">&nbsp;</div>
                <div class="wi100pstg mat20 fll">
                    <p class="fll  np_des_mat5">
<!--                        <span class="fll"><input type="checkbox" checked="" value="Auto"></span> -->
                        <span class="bp_des_mat3 fll os_des_mal5"> Auto reactivate on </span>
                    </p>
                    <p class="fll np_des_mat5 os_des_mal10"> <input class="deactiv_textbox" type="text" id="auto_reactivation_date"><span id="reactive_date_error"></span> </p>
                </div>
                <div class="wi100pstg np_des_mat10 fll">
                    <p class="fll  np_des_mat10"> <span class="fll"><input type="checkbox" checked="" value="Auto"></span> <span class="bp_des_mat3 fll os_des_mal5"> Send account re-activation reminder to my alternate e-mail </span></p>
                    <p class="fll np_des_mat5 os_des_mal10"> <input class="button_new" type="button" value="Deactivate" id="deactivate">  </p>
                </div>
            </section>
            <section id="ajax_contact_form">
                <h1 class="wi100pstg os_des_borderbottom os_des_pab5 normal np_des_mab10"> Archive  Your Account </h1>
                <p class="fs12 lh18">This functionality is temporarily  deactivated!  </p><br>
                <br><br>
                <br><br>
            </section>
        </div>
    </div>
</div> <!--module container end here-->

<div class="clearfix"></div>
<script type="text/javascript">
$("#auto_reactivation_date" ).datepicker();
$("#logout_btn").click(function(){
  location(oneidnet_url);
});
$( ".manageaccount").click(function(){
    var classid = $(this).attr('classid');
    $( ".manageaccount").removeClass('current')
    $("#"+classid).addClass('current')
})
</script>
<script src="<?php echo base_url(); ?>assets/microjs/accounts.js"></script>
<style type="text/css">
    #subopt_deletion{
      display:none;
    }
</style>
<?php $this->templates->basic_info_footer(); ?>



