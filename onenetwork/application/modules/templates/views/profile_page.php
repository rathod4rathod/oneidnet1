<?php
$this->load->module('templates');
$this->templates->header();
$this->templates->onenet_header();
//print_r($profiles_data);
$logo_url = str_replace("onenetwork", "oneidnet", base_url());
if ($clist["img_path"] != "") {
  $profile_img_url = $logo_url . "/data/" . $clist["img_path"];
} else {
  $profile_img_url = base_url() . "assets/images/avatar.png";
}
$points_earned = ($profiles_data[0]["all_dev_bugs"] * 8) + ($profiles_data[0]["design_issue"] * 4) + ($profiles_data[0]["feedback"] * 6) + ($profiles_data[0]["security_loophole"] * 10);
$level_name=displayLevels($points_earned);
$click_base_url=  str_replace("onenetwork", "click", base_url());
$netpro_base_url=  str_replace("onenetwork", "netpro", base_url());
$click_url=$click_base_url."pviews/public_profile?odndlt=".base64_encode(base64_encode($profiles_data[0]["profile_id"]));
$netpro_url=$netpro_base_url."pprofile/profilepage/".$profiles_data[0]["user_id"];
?>
<div class="new_wrapper">

    <div class="wrapper-inner">
        <div class="left_oontainer">
<!--            <h2 class="fs18 wi100pstg  pab10 borderbottom   mab30"> Investment </h2>-->
            <div class="container">

                <div class="contributors-unique">
                    <div class="contributors-info">
                        <img src="<?php echo $profile_img_url?>" alt="profile" />
                        <div class="contributors-info-right">
                            <p class="contributors-title"><?php echo ucwords($profiles_data[0]["first_name"]." ".$profiles_data[0]["last_name"]);?></p>
                            <p class="contributors-subtitle mat10 fs14"><strong><?php echo $level_name;?></strong></p>
                        </div>

                    </div><!--contributors info closed here-->
                    <div class="clr"></div>

                    <div class="social-profiles">
                        <ul>
                            <li><a href="<?php echo $click_url;?>"><img src="<?php echo base_url() . 'assets/images/click.png' ?>" alt="facebook" /></a></li>
                            <li><a href="<?php echo $netpro_url?>"><img src="<?php echo base_url() . 'assets/images/netpro.png' ?>" alt="googleplus" /></a></li>
                        </ul>
                    </div><!--social profiles end here-->

                    <div class="profile-desc">
                        <div class="profile-desc-box">
<!--                            <p class="left-desc-box">Products:</p>-->
                            <div class="right-desc-box">
                                <ul>
                                    <li class="green-cont"><span class="lh20 mar10"> Developer Bugs </span> <span class="bubble2"><?php echo $profiles_data[0]["all_dev_bugs"]?></span></li>
                                    <li class="blue-cont"><span class="lh20 mar10"> Design Issues </span> <span class="bubble2"><?php echo $profiles_data[0]["design_issue"]?></span></li>
                                    <li class="red-cont"><span class="lh20 white mar10"> Security Loop Hole </span> <span class="bubble2"><?php echo $profiles_data[0]["feedback"]?></span></li>
                                    <li class="orange-cont"><span class="lh20 mar10"> Feedback </span> <span class="bubble2"><?php echo $profiles_data[0]["security_loophole"]?></span></li>
                                </ul>
                            </div>
                            <div class="clr"></div>
                        </div>

                    </div><!--profile description closed here-->
                </div><!--contributors unique end here-->
            </div>
        </div>
    </div>
</div>

<?php
$this->templates->footer();
function displayLevels($pts) {
  if ($pts > 0 && $pts <= 24) {
    return "Prisage";
  } elseif ($pts <= 48 && $pts >= 25) {
    return "Secsage";
  } elseif ($pts >= 98 && $pts <= 49) {
    return "Tersage";
  } elseif ($pts >= 99 && $pts <= 148) {
    return "Quasage";
  } elseif ($pts >= 149 && $pts <= 198) {
    return "Quisage";
  } elseif ($pts >= 199 && $pts <= 248) {
    return "Sensage";
  } elseif ($pts >= 249 && $pts <= 398) {
    return "Sepsage";
  } elseif ($pts >= 399 && $pts <= 548) {
    return "Octsage";
  } elseif ($pts >= 549 && $pts <= 698) {
    return "Nonsage";
  } elseif ($pts >= 699) {
    return "Densage";
  }
}
?>