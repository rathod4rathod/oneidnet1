<?php
$this->load->module("templates");
$this->templates->basic_info_header();
//print_r($account_data);
$formatted_date="";
if($account_data!=0){
  $activation_id = base64_encode(base64_encode($account_data[0]["rec_aid"]));
  $encoded_str = base64_encode(base64_encode("#" . $account_data[0]["profile_id"] . "#"));
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
}
if ($account_data[0]["status"] == "PERMANENT_DELETION") {
  $title = "Your account is deleted permanently";
} else {
  $title = "Your account is deleted temporarily";
}
?>
</div>
<div class="clearfix"></div>
<div class="container_wrapper minheight700 mat75"> <!--module_container start here-->
    <div class="account_suspended_wrappee np_des_mab40">
        <div class="wi100pstg np_des_mat35 np_des_mab30">
          <p class="normal fs22 red"> <?php echo $title ?>!! </p>
        </div>

        <p class="fs14 gray2 lh24"> I further declare that I the activities I am suspected of performing in the ONEIDNET System were not performed by me or with my knowledge
        </p>

        <p class="fs14 gray2 np_des_mat10 lh24"> The user must understand that if there are any further discovered activities or reports on their account regarding improper activities by other users, the user’s account will then be deactivated for a period of 5 days
        </p>

        <div class="wi100pstg np_des_mat45">
            <h2 class="fs30 acenter gray normal"> Would like to activate your account? </h2>
        </div>

        <div class="wi100pstg np_des_mat45">
            <p class="fs18 acenter wi100pstg np_des_mat45"> <a class="btn btn-primary btn-large" href="javascript:void(0)" id="activate_now_btn"> Activate Now </a> <span>&nbsp;&nbsp; | &nbsp;&nbsp; </span> <a class="btn btn-primary btn-large" href="javascript:void(0)"> Don't Activate </a> </p>
        </div>
    </div>
</div> <!--module container end here-->

<div class="clearfix"></div>
<?php
$this->load->module("templates");
$this->templates->basic_info_footer();
?>
<script src="<?php echo base_url(); ?>assets/microjs/baseinfofooter.js"></script>
<script type="text/javascript">
  $("#activate_now_btn").click(function(){
    var encodedid='<?php echo $encoded_str?>';
    var activation_id='<?php echo $activation_id?>';
    $.ajax({
      type:"post",
      url:oneidnet_url+"home/updateProfile",
      data:{pid:encodedid,aid:activation_id},
      success:function(data){
        if(data.trim()=="ISNT1"){
          window.location.href=oneidnet_url;
        }
        else{
          alert("There might be some problem...please try again");
        }
      }
    });
  });
  </script>
