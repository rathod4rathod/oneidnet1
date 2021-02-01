<?php
$this->load->module('templates');
$this->templates->content_header();
//$this->session->userdata('user_id');
?>

<div class="middle_content">
    <!-- Start Left -->
    <div class="main_content_left">

        <div class="left_links">

            <ul>
                <li class="about_img"><a href="<?php echo base_url() . 'home/aboutus' ?>" ></a></li>
                <li class="policies_img"><a href="<?php echo base_url() . 'home/policies' ?>" ></a></li>
                <li class="foundation_img"><a href="<?php echo base_url() . 'home/foundation' ?>"></a></li>
                <li class="privacy_img"><a href="<?php echo base_url() . 'home/privacy' ?>"></a></li>
                <li class="tc_img"><a href="<?php echo base_url() . 'home/termsconditions' ?>"></a></li>
                <li class="cs_img"><a href="<?php echo base_url() . 'home/customersupport' ?>"></a></li>
                <li class="cu_img_active"><a href="<?php echo base_url() . 'home/contactus' ?>"></a></li>
                <li class="all_img"><a href="<?php echo base_url() . 'home/allinone' ?>"></a></li>
            </ul>

        </div>

    </div>
    <!-- End Left -->


    <!-- Start Right -->
    <div class="main_content_right">
        <div class="heading_content">  CONTACT US  </div>
        <div class="main_content_right_scroll">
            <a name="top"></a>
            <div class="main_content">
                In our approach decisions should be taken with reflection and prudence. That is, to realize that the results decisionsmade could impact greatly a person or others involved in the decision and more importantly, how the decision impacts the world.
            </div>            

            <div class="form_area">

                <div class="mat40 wi90 fll">
                    <form class="ble-form_danation" id="contactus_form">
                        <div class="ble-fg ble-fg-dantion">
                            <label>  SUBJECT  </label>
                            <input type="text" placeholder="Please enter subject here" id="contact_subject" name="contact_subject">
                            <span id="contact_subject_error"></span>
                        </div>

                        <div class="ble-fg ble-fg-dantion">
                            <label>  EMAIL ID </label>
                            <input type="text" placeholder="Please enter email address here" id="contact_email" name="contact_email">
                            <span id="contact_email_error"></span>
                        </div>

                        <div class="ble-fg ble-fg-dantion">
                            <label>Message</label>
                            <textarea rows="6" name="contact_message" id="contact_message"></textarea>
                            <span id="contact_message_error"></span>
                        </div>
                        <div class="ble-fg ble-fg-dantion" style="margin-bottom:20px; width:200px; margin-top:20px; display:inline-table;">
                            <span class="fll" style="line-height:30px;"> <label id="captcha_label">  <?php echo rand(0,9)?> + <?php echo rand(0,9)?> </label> </span>
<!--                            <span class="fll cont_box"> 450 </span>-->
                            <input type="text" class="fll cont_box" id="contact_captcha" value=""/>
                            <span id="contact_captcha_error"></span>
                        </div>
                        <div class="arrows_box" style="color:#fff;display:none">
                            
                        </div>
                        <div class="ble-submit">
                            <p class="fll"><a class="btn btn-primary btn-large" href="javascript:void(0)" id="contact_submit"> SUBMIT </a></p>
                        </div>
                    </form>
                </div>
            </div>

        </div>
        <!-- End Right -->
    </div>

</div>

</body>

</html>
<script type="text/javascript" src="<?php echo base_url().'assets/microjs/contactus.js'?>"></script>