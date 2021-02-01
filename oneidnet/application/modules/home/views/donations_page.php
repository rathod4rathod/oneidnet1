<?php
$this->load->module('templates');
$this->templates->content_header();
//$this->session->userdata('user_id');
?>

<div class="middle_content">
    <!-- Start Left -->
  
    <!-- End Left -->


    <!-- Start Right -->
    <div class="main_content_right">
        <div class="heading_content">INVESTMENTS & DONATIONS</div>
        <div class="main_content_right_scroll">
            <a name="top"></a>
            <div class="main_content">
            We at ONEIDNET extend our most sincere appreciation for your valuable interest in investing

with us!

ONEIDNET is currently seeking investors from all sectors of applicable markets related to our

business. ONEIDNET is a leader in our new and innovative business model, which comprises our

unique Internet Operating System. We are certain you have made the right decision to contact

us regarding your valuable choices for investment.

If you haven’t already done so, we invite you to register and explore our amazing system for

yourself to be witness to the infinite opportunities it has to offer.

We at ONEIDNET are confident that you can envision the substantial revenue the ONEIDNET is

targeted to generate in the short term and the infinite possibilities for the long term. There is

no doubt that returns will yield your desired results!</div>            

            <div class="form_area">

                <div class="mat40 wi90 fll">
                    <form class="ble-form_danation" id="donation_form">
                       <div class="ble-fg ble-fg-dantion">
                            <label>Email</label>
                            <input type="text"  name="donation_email" onfocus="fun_Remove(this.id)" placeholder="Please enter email here" id="donation_email" >
                            <span id="donation_email_error"></span>
                        </div>
                        <div class="ble-fg ble-fg-dantion">
                            <label>  SUBJECT  </label>
                            <input type="text" placeholder="Please enter subject here" onfocus="fun_Remove(this.id)" id="donation_subject" name="donation_subject">
                            <span id="donation_subject_error"></span>
                        </div>                        
                        <div class="ble-fg ble-fg-dantion">
                            <label>Message</label>
                            <textarea rows="6" placeholder="Please enter message here" onfocus="fun_Remove(this.id)" name="donation_message" id="donation_message"></textarea>
                            <span id="donation_message_error"></span>
                        </div>
                         <div class="ble-fg ble-fg-dantion">
                            <label>CONTACT NUMBER</label>
                            <input type="text"  name="contact_number" placeholder="Please enter contact number here" id="contact_number" >
                            <span id="contact_number_error"></span>
                        </div>
                        <div class="arrows_box" style="color:#fff;display:none">
                            
                        </div>
                        <div class="ble-submit">
                            <p class="fll"><a class="btn btn-primary btn-large" href="javascript:void(0)" id="donation_submit">SUBMIT</a></p>
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
<script type="text/javascript" src="<?php echo base_url().'assets/microjs/donations.js'?>"></script>