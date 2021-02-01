<?php
$this->load->module("templates");
$this->templates->basic_info_header();
//print_r($account_data);
//echo strtotime($account_data[0]["auto_reactivation_time"]);
$activation_id=base64_encode(base64_encode($account_data[0]["rec_aid"]));
$encoded_str=base64_encode(base64_encode("#".$account_data[0]["profile_id"]."#"));
if ($account_data[0]["status"] == "TEMPORARY_SUSPEND") {
  $current_date = date("Y-m-d");
  $reactive_date = explode(" ", $account_data[0]["auto_reactivation_time"]);
  $diff = strtotime($reactive_date[0]) - strtotime($current_date);
  if ($diff > 0) {
    $days_ago = abs($diff / (60 * 60 * 24));
    $hm_arry = explode(":", $reactive_date[1]);
    $hh_mm = $hm_arry[0] . ":" . $hm_arry[1];
    $datetime = new DateTime($account_data[0]["auto_reactivation_time"], new DateTimeZone($_SESSION["tz"]));
    $week_of_day = date('D', strtotime($reactive_date[0]));
    $formatted_date = date("d M,Y", strtotime($reactive_date[0]));
  }
  else{
    $formatted_date="";
  }
} else {
  $week_of_day = "";
  $days_ago = "";
  $formatted_date = "";
  $hh_mm = "";
}

?>
</div>
<div class="clearfix"></div>
<div class="container_wrapper minheight700 mat75"> <!--module_container start here-->
    <div class="account_suspended_wrappee np_des_mab40">
        <div class="wi100pstg np_des_mat35 np_des_mab30"> <p class="normal fs30 red"> Temporary Account Suspended!! </p> </div>

        <p class="fs14 gray2 lh24"> The ONEIDNET Administration has found one or more of your account activities in violation of our Policies, Terms of Use (ToU), and/or Terms of Service (ToS) or someone has attempted an illegal login to your user account. Because your user account security is a high priority to ONEIDNET, we have temporarily suspended your account.</p><br>
        <p class="fs14 gray2 lh24"> We at ONEIDNET utilize the account suspension mechanism to ensure that users understand the privilege of having a ONEIDNET account and user obligations of the same. It may be the case that suspicious activities were detected in your account by ONEIDNET or reported by other users. Either way, we will make sure that you are able to verify your user account so that it can be reactivated and you can be on your way.</p><br>
        <p class="fs14 gray2 lh24">ONEIDNET provides users with temporarily suspended accounts with information regarding proper use of the ONEIDNET System through the User Activity Improvement Program (UAIP) made for users to increase their awareness and understanding on proper use of the ONEIDNET System.</p>
        <br><br>
        <div class="wi100pstg np_des_mat45">
            <?php
            if ($formatted_date != "") {
              ?>
              <p class="fs22 acenter blue"> Account Reactivating in <span class="bold gray"> <?php echo $days_ago ?> Days </span> <span class="gray bold"> on <?php echo $formatted_date ?>  </span>  </p>
              <?php
            }
            ?>
            <p class="fs18 acenter wi100pstg np_des_mat45"><a href="#claim"> Contest Claim </a> <span>&nbsp;&nbsp; | &nbsp;&nbsp; </span> <a href="#account"> Why is My Account Suspended? </a> </p>
        </div>

        <!--        <div class="wi100pstg np_des_mat45">
                    <p class="fs18 acenter wi100pstg np_des_mat45"> <a class="btn btn-primary btn-large" href="#"> Yes, Activate Now </a> <span>&nbsp;&nbsp; | &nbsp;&nbsp; </span> <a class="btn btn-primary btn-large" href="#"> Don't Activate </a> </p>
                </div>-->


        <p class="fs14 gray2 np_des_mat45 lh24"> To prevent User Account Suspension from happening again, users should adhere to our ONEIDNET policies, terms or use and user agreements.  Users should refrain from performing any of the following activities in the ONEIDNET System:</p>

        <div class="wi100pstg fs14">
            <ul style="line-height:24px; margin:30px 0 0 15px; padding:0 0 0 10px; list-style:decimal-leading-zero;">
                <li>  1. Use of profanity insults  </li>
                <li>  2.Use of pornographic content  </li>
                <li>  3. Use of drugs content  </li>
                <li>  4. Use of religious derogatory posts to other users  </li>
                <li>  5. Use of racial derogatory posts to other users  </li>
                <li>  6. Distribution of spam content  </li>
                <li>  7. Soliciting via scams  </li>
                <li>  8. False accounts </li>
            </ul>
        </div>



        <div class="wi100pstg np_des_mat45" id="account">
            <p class="fs18 blue"> Why is My Account Suspended? </p>
            <p class="fs14 gray2 np_des_mat15 lh24"> Your user account was suspended because you are suspected of performing activities in the ONEIDNET System, which do not conform with the ONEIDNET policies, terms of use, terms of service and/or user agreement(s).
            </p>
            <p class="fs14 gray2 lh24 np_des_mat15"> ONEIDNET takes these types of activities very seriously as these activities can negatively impact the stability, safety and security of other users in the ONEIDNET System.
            </p>

            <p class="fs14 gray2 lh24 np_des_mat15"> If you performed the suspected activities, you must refrain from performing these types of activities again. If you did not perform the suspected activities, in this case you are required to go through the process to reactivate your account. Otherwise, your account suspension will be for the standard period specified and you must adhere to the ONEIDNET System policies, terms of use, terms of service and/or user agreement(s) in order to prevent further user account actions.
            </p>
        </div>

        <div class="wi100pstg np_des_mat45" id="claim">
            <p class="fs18 np_des_mab20 blue" style="padding-top:20px;"> Contest Claim </p>

            <p class="fs14 gray2 lh24"> I further declare that I the activities I am suspected of performing in the ONEIDNET System were not performed by me or with my knowledge
            </p>

            <p class="fs14 gray2 np_des_mat10 lh24"> The user must understand that if there are any further discovered activities or reports on their account regarding improper activities by other users, the user’s account will then be deactivated for a period of 5 days
            </p>


            <div class="wi100pstg np_des_mab40 fll np_des_mat35">

                <p class="fs14 gray2 bold np_des_mab20 np_des_mat10 lh24">
                    To reactivate your account prior to our standard reactivation period for suspended accounts, users must complete the following declaration form:
                </p>

                <div class="fll np_des_mat15 wi100pstg">
                    <p class="fll os_des_mal10 fs14"> I used profanity insults against another user </p>
                    <p class="fll radio_p"> <input type="radio" id="profanity_yes" name="profanity" value="Yes"><span>Yes</span> </p>
                    <p class="fll radio_p"> <input type="radio" id="profanity_no" name="profanity" value="No"><span>No</span> </p>
                </div>
                <div class="fll np_des_mat15 wi100pstg">
<!--                    <p class="fll"> <input type="checkbox" /> </p>-->
                    <p class="fll os_des_mal10 fs14"> I used pornographic content </p>
                    <p class="fll radio_p"> <input type="radio" name="prono" id="porno_yes" value="Yes"><span>Yes</span> </p>
                    <p class="fll radio_p"> <input type="radio" name="prono" id="porno_no" value="No"><span>No</span> </p>
                </div>
                <div class="fll np_des_mat15 wi100pstg">
<!--                    <p class="fll"> <input type="checkbox" /> </p> -->
                    <p class="fll os_des_mal10 fs14"> I used drugs content </p>
                    <p class="fll radio_p"> <input type="radio" name="drugs" id="drugs_yes" value="Yes"><span>Yes</span> </p>
                    <p class="fll radio_p"> <input type="radio" name="drugs" id="drugs_no" value="No"><span><span>No</span></span> </p>
                </div>
                <div class="fll np_des_mat15 wi100pstg">
<!--                    <p class="fll"> <input type="checkbox" /> </p> -->
                    <p class="fll os_des_mal10 fs14"> I used religious derogatory posts </p>
                    <p class="fll radio_p"> <input type="radio" name="religious" id="religious_yes" value="Yes"><span>Yes</span> </p>
                    <p class="fll radio_p"> <input type="radio" name="religious" id="religious_no" value="No"><span><span>No</span></span> </p>
                </div>
                <div class="fll np_des_mat15 wi100pstg">
<!--                    <p class="fll"> <input type="checkbox" /> </p> -->
                    <p class="fll os_des_mal10 fs14"> I used racial derogatory posts </p>
                    <p class="fll radio_p"> <input type="radio" name="racial" id="racial_yes" value="Yes"><span>Yes</span> </p>
                    <p class="fll radio_p"> <input type="radio" name="racial" id="racial_no" value="No"><span>No</span> </p>
                </div>
                <div class="fll np_des_mat15 wi100pstg">
<!--                    <p class="fll"> <input type="checkbox" /> </p> -->
                    <p class="fll os_des_mal10 fs14"> I sent spam content </p>
                    <p class="fll radio_p"> <input type="radio" name="spam_content" id="spam_yes" value="Yes"><span>Yes</span> </p>
                    <p class="fll radio_p"> <input type="radio" name="spam_content" id="spam_no" value="No"><span>No</span> </p>
                </div>
                <div class="fll np_des_mat15 wi100pstg">
<!--                    <p class="fll"> <input type="checkbox" /> </p> -->
                    <p class="fll os_des_mal10 fs14"> I sent scams to other users </p>
                    <p class="fll radio_p"> <input type="radio" name="scam" id="scam_yes" value="Yes"><span>Yes</span> </p>
                    <p class="fll radio_p"> <input type="radio" name="scam" id="scam_no" value="No"><span>No</span> </p>
                </div>
                <div class="fll np_des_mat15 wi100pstg">
<!--                    <p class="fll"> <input type="checkbox" /> </p> -->
                    <p class="fll os_des_mal10 fs14"> I am the legitimate user of this account </p>
                    <p class="fll radio_p"> <input type="radio" name="dlegitimate" id="dlegitimate_yes" value="Yes"><span>Yes</span> </p>
                    <p class="fll radio_p"> <input type="radio" name="dlegitimate" id="dlegitimate_no" value="No"><span>No</span> </p>
                </div>
                <div class="fll np_des_mat15 wi100pstg">
                    <input type="checkbox" name="agree_cb"/>I agree to the above stated terms
                </div>
                <div class="wi100pstg np_des_mat45" id="submit_div">
                    <p class="fs18 acenter wi100pstg np_des_mat45"> <a class="btn btn-primary btn-large submit_btn" href="javascript:void()"> Submit </a> </p>
                </div>
            </div>

        </div>

<!--        <div class="wi100pstg np_des_mat35">
            <p class="fs22 aright np_des_mar15 green"> Learn to be a good Use </span>  </p>
        </div>-->

    </div>
</div> <!--module container end here-->

<div class="clearfix"></div>
<?php
$this->load->module("templates");
$this->templates->basic_info_footer();
?>
<script src="<?php echo base_url(); ?>assets/microjs/baseinfofooter.js"></script>
<script src="<?php echo base_url(); ?>assets/microjs/accounts.js"></script>
