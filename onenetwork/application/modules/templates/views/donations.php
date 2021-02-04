<?php
$this->load->module('templates');
$this->templates->header();
$this->templates->onenet_header();
?>
<style>
    .jus{
        text-align: justify;
    }
    form.ble-form_danation {
        width: 60%;
        margin: auto;
    }
    .ble-alert p{
        background: #56B555;
        width: 100%;
        margin:0 0 16px;
        color: #fff;
        padding: 7px 0px;
        text-align: center;
        line-height: 19px;    
        font-weight: normal;
    }
    .ble-alert img{
        vertical-align: middle;
    }
    .ble-fg-dantion input,.ble-fg-dantion select,.ble-fg-dantion textarea{
        background: #fff;
        float: left;
        margin-bottom: 30px;
        padding: 13px 0px;
        width: 100%;
        text-indent: 10px;
        border: none;
        border: 1px solid #ccc;
    }
    .ble-fg-dantion label{
        width: 100%;
        float: left;
        font-size:18px;
        margin-bottom: 10px;
        font-weight: normal;
        color:#333;
        position:inherit !important;
    }
    .case-btn-donation button {
        background: #fb6e52 none repeat scroll 0 0;
        border: 0 solid #ccc;
        color: #fff;
        cursor: pointer;
        font-size: 14px;
        padding: 10px 15px;
        font-weight:bold;
    }
    .case-btn-donation button:hover ,.case-btn-disabled button{
        background: #666666 none repeat scroll 0 0;
        border: 0 solid #ccc;
        border-radius: 2px;
    }
    .case-btn-disabled button{
        color: #fff;
        cursor: pointer;
        font-size: 14px;
        padding: 10px 15px;
        font-weight:bold;
    }

</style>

<div class="np_des_module_container_wrap"> <!--module_container start here-->

    <div class="np_des_wrapper-inner"><!--wrapper inner start here-->

        <div class="np_des_left_container fll">
            <h2 class="fs18 wi100pstg  pab10 borderbottom   mab30"> DONATIONS & INVESTMENTS </h2>

            <div class="container">
                <div class="ble-content mat20">
                    <div class="ble-paragraph acenter">
                        
                        <p class="jus">We at ONEIDNET extend our most sincere appreciation for your valuable interest in investing with us!</p>	</br>
                        <p class="jus">ONEIDNET is currently seeking investors from all sectors of applicable markets related to our business. ONEIDNET is a leader in our new and innovative business model, which comprises our unique Internet Operating System.  We are certain you have made the right decision to contact us regarding your valuable choices for investment.</p>	</br>
                        <p class="jus">If you haven’t already done so, we invite you to register and explore our amazing system for yourself to be witness to the infinite opportunities it has to offer.</p>	</br>
                        <p class="jus">We at ONEIDNET are confident that you can envision the substantial revenue the ONEIDNET is targeted to generate in the short term and the infinite possibilities for the long term. There is no doubt that returns will yield your desired results!</p>	</br>
                        
                        
                        
                    </div>

                    <div class="mat40">

                        <form class="ble-form_danation" id="form_donate"  method="POST">
                            <div class="ble-alert success" id="success" style="display:none;">
                                <p>Your query has submitted successfully</p>
                            </div>
                            <div class="ble-alert error_div" style="display:none;">
                                <p class="error">Please fill all the required(*) fields</p>
                            </div>
                            <div class="ble-alert success" id="loading" style="display:none;">
                                <p class="error"><img src="<?php echo base_url(); ?>assets/images/load.gif" width="20" height="20"> Please wait while your query is submitting....</p>
                            </div>
                            <div class="ble-fg ble-fg-dantion">
                                <label> Email <span style="color:red;">*</span></label>
                                <input type="text" name="donation_email" placeholder="Please enter email here" id="donation_email" />
                                <span id="donation_email_error"></span>
                            </div>
                            <div class="ble-fg ble-fg-dantion">
                                <label> Subject <span style="color:red;">*</span></label>
                                <input type="text" name="donation_subject" placeholder="Please enter subject here" id="donation_subject" />
                            </div>

                            <div class="ble-fg ble-fg-dantion">
                                <label>Message <span style="color:red;">*</span></label>
                                <textarea rows="6" name="donation_message" placeholder="Please enter message here" id="donation_message"></textarea>
                            </div>
                            <div class="ble-fg ble-fg-dantion">
                                <label>Contact number </label>
                                <input type="text" name="donation_contactnumber" placeholder="Please enter contact number here" id="donation_contactnumber">
                            </div>

                            <div class="case-btn-donation">
                                <button type="button" class="case-btn-donation aright" value="SUBMIT" id="don_submit" >SUBMIT</button>
<!--					<input type="sumit" name="submit" class="case-btn-donation aright" id="don_submit" value="SUBMIT">-->
                            </div>
                            <div class="case-btn-disabled" style="display:none;">
                                <button  class="case-btn-disabled aright" value="SUBMIT" id="button_disabled" disabled >SUBMIT</button>


<!--					<input type="sumit" name="submit" class="case-btn-donation aright" id="don_submit" value="SUBMIT">-->
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
        <div class="np_des_right_container flr">
        </div>
        <!--right container end here-->
    </div> <!--wrapper inner closed here-->
</div> <!--module container end here-->

<?php
$this->load->module('templates');
$this->templates->footer();
?>
