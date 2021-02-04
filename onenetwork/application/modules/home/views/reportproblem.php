<?php
$this->load->module('templates');
$this->templates->header();
$obj = $this->load->module('home');
$obj->onenet_header();
?>
<div class="ondes_module_container_wrap"> <!--module_container start here-->

    <div class="ondes_wrapper_inner"><!-- images/modern-mailbox-1.jpg wrapper inner start here-->
        <div class="ondes_rightSection">
            <div id="adevertisements">
                <div class="add_top">
                    <div class="add_logo"><img src="<?php echo base_url() . 'assets/' ?>images/modern-mailbox-1.jpg"></div>
                    <div class="add_text"><h2>Page Name</h2></div>
                    <span class="add_closeBtn">X</span>
                </div>
                <div class="add2_content">
                    <div class="add2Content_image"><img src="<?php echo base_url() . 'assets/' ?>images/1610919_549397668531820_1477355238521494907_n.jpg"></div>
                </div>
            </div>

        </div>
        <div class="ondes_Header">
            <h2>Report Problem</h2>
        </div>
        <div class="on_des_left_container fll"> <!--left container start here-->
            <div class="np_des_findjobs_contentbox">

                <div id="reportProblemSection">
                    <form  id="one_net_report_form"   method="POST" action="">
                        <p id="response" style="color:#FFFFF; font-size: 13pt"></p>
                        <div class="np_des_editpro_contentboxtransprent_wrap">



                            <div class="np_des_wi580 fll np_des_mab5">
                                <div class="np_des_experiencetextbox_wraprightbox fll lh24"> Title </div>
                                <div class="np_des_editpro_leftbox flr"> <input type="text" class="np_des_groupfield_textbox" name="report_problem_title" id="report_problem_title"> </div>
                            </div>


                            <div class="np_des_wi580 fll np_des_mab5">
                                <div class="np_des_experiencetextbox_wraprightbox fll lh24"> Description </div>
                                <div class="np_des_editpro_leftbox flr"> 
                                    <span class="fll">
                                        <textarea class="np_texttarea_experienceselectbox" rows="" cols="" name="report_problem_description" id="report_problem_description"></textarea>
                                    </span>
                                </div>
                            </div>


                            <div class="np_des_wi580 fll np_des_mab5">
                                <div class="np_des_experiencetextbox_wraprightbox fll lh24"> Location </div>
                                <div class="np_des_editpro_leftbox flr"> 
                                    <span class="fll">
                                        <select class="np_experienceselectbox" name="location" id="country_id">
                                            <option value="">Select your Location</option>
                                            <?php foreach ($country_info as $country_infoormation) {
                                                ?>
                                                <option value="<?php echo $country_infoormation["country_id"]; ?>"><?php echo $country_infoormation["country_name"]; ?></option>
                                            <?php }
                                            ?>
                                        </select>
                                    </span>
                                </div>
                            </div>

                            <div class="np_des_wi580 fll np_des_mab5">
                                <div class="np_des_experiencetextbox_wraprightbox fll lh24"> Snapshot </div>
                                <div class="np_des_editpro_leftbox flr"> <input type="file" class="np_des_groupfield_textbox" name="report_problem_snapshot" id="report_problem_snapshot"> </div>
                            </div>


                            <span>
                                <input type="submit" name="submit" value="Submit" class="np_des_edit_add_btn np_des_mar5 flr" >
                            </span>
                    </form>
                </div>
            </div>
        </div> <!--left container end here-->
        <div class="np_des_right_container flr"> <!--right container start here-->
        </div> <!--right container end here-->
    </div> <!--wrapper inner closed here--> 
</div> <!--module container end here-->

<div class="clearfix"></div>
</div> <!--module container end here-->
<?php
$this->templates->footer();
?>