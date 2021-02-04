<?php
$this->load->module('templates');
$this->templates->header();
$this->templates->onenet_header();
?>

<style>

    .contribute-user
    {
        border-bottom:1px solid #ccc;

    }
    .contributors, .contribute-user
    {
        background:#f1f1f1;
        width:100%;
        padding:30px 0px;
        margin: 0 auto;
        overflow:hidden;

    }
    .contributors-topheading
    {
        text-align:center;
        font-size:32px;
        color:#929191;
        text-transform:capitalize;
        line-height:40px;
    }
    .col-md-4
    {
        width:30%;
        margin:10px 1.5%;
        float:left;
        min-height: 320px;
        background:#fff;
        border:1px solid #fcfcfc;
        box-shadow:1px 1px 2px #ccc;
        overflow:hidden;
    }

    .image_colmd
    {
        width:100%;
        height: 200px;
    }

    .contributors-title
    {
        font-size:24px;
        color:#333;
        padding:5px 10px;

    }
    .contributors-subtitle
    {
        color:#616161;
        padding:5px 10px;
        font-size:18px;

    }
    .contributors-paragraph
    {
        padding: 7px;
        color:#666;
        font-size:12px;
        line-height:18px;
    }
    .contributors-note
    {
        padding:5px 15px;
        color:#636363;
        font-size:16px;
        line-height:26px;
    }
    .contributors-options
    {
        margin:15px;
        list-style:none;
    }
    .contributors-options li
    {
        font-size:16px;
        line-height:28px;
        color:	#616161;
    }

    .clr
    {
        clear:both;
    }
    .all-contributor, .all-contributor-members
    {
        text-align:center;
        background:#069;
        border-radius:20px;
        width:200px;
        margin:10px auto;
        padding:10px 20px;



    }
    .all-contributor a, .all-contributor-members a
    {
        color:#fff;
        text-decoration:none;
    }

    .all-contributor-members { padding: 10px 30px 10px 30px; width: auto; }



</style>

<div class="np_des_module_container_wrap"> <!--module_container start here-->

    <div class="np_des_wrapper-inner"><!--wrapper inner start here-->


        <div class="np_des_left_container fll"> <!--left container start here-->
            <p class="contributors-title" style="margin-top:40px"> CONTRIBUTIONS INSIGHT</p>


            <div class="contribute-user">
                <!--        <h2 class="np_des_mab10 fll mal20 wi100pstg" style="color:red">   Ps  </h2><br><br>-->
                <p class="contributors-note">We are now performing a soft launch of the ONEIDNET Internet Operating System prior to our Alpha launch and
                    our team is still working hard to take the system up to BETA level.</p>

                <p class="contributors-note">There is a probability that you may encounter functionality break-ups,
                    bugs, glitches and design issue in the system while using it.</p>

                <p class="contributors-note">We issue this open invite as an opportunity for our end-users to
                    participate in using the system and reporting to us about
                    inconsistencies, bugs, glitches and general problems.</p>

                <p class="contributors-note">The inconsistencies can be reported to us from the "Report a Problem" option
                    available in every system modules' header under the Gear Icon.</p>

                <p class="contributors-note">We will review your reports and tag them as
                    development issue, design Issue, feedback and security loopholes.
                    Each successful report will be awarded by credit points depending
                    upon the nature of issue.</p>

                <ul class="contributors-options">
                    <p class="contributors-subtitle" style="color:#069">The points and the nature of issue are as follows:</p>

                    <li>1) Security Loopholes (Weitage: 10 Points) </li>
                    <li>2) Development Issue (Weitage: 8 Points)</li>
                    <li>3) Feedbacks (Weitage: 6 Points)</li>
                    <li>3) Design Issue (Weitage: 4 Points)</li>
                </ul>
                <p class="contributors-note"> Every week these rankings will be calculated and updated in ONEIDNET.
                    The names of contributors will be visible to all ONEIDNET users. The
                    top three contributors will be published in the contributions' main
                    page.</p>
                <p class="contributors-note">  Enjoy ONEIDNET!</p>
            </div>
            <?php
            //print_r($top_contributors);
            if ($top_contributors != 0) {
              $logo_url = str_replace("onenetwork", "oneidnet", base_url());
              ?>
              <div class="contributors">
                  <p class="contributors-topheading"> Meet Top contributors</p>
                  <?php
                  foreach ($top_contributors as $list) {
                    $points=$list["security_loophole"]+$list["feedback"]+$list["design_issue"]+$list["all_dev_bugs"];
                    $level=displayLevels($points);
                    $profile_name1 = $list["first_name"] . " " . $list["last_name"];
                    if ($top_contributors[0]["img_path"] != "") {
                      $profile_pic_url1 = $logo_url . "data/" . $top_contributors["img_path"];
                    } else {
                      $profile_pic_url1 = base_url() . "assets/images/avatar.png";
                    }
                    $profile_url=base_url()."templates/pprofile?user_id=".$list["user_id"];
                    ?>
                    <div class="col-md-4">
                        <img src="<?php echo $profile_pic_url1; ?>" class="image_colmd">
                        <p class="contributors-title" style="margin-top:20px"><a href="<?php echo $profile_url?>"><?php echo ucfirst($profile_name1) ?></a></p>
                        <p class="contributors-subtitle"><?php echo $level?></p>
                <!--        <p class="contributors-paragraph">Chromest,  This is to inform you that about our system bugs and issues Google, pinterest</p>-->
                    </div>
                    <?php
                  }
                  ?>

                  <div class="clr"></div>
                  <p class="all-contributor"> <a href="<?php echo base_url() . 'templates/contributors' ?>">  View all Contributors </a></p>

              </div>
              <?php
              //}
            }
            ?>

        </div> <!--left container end here-->



        <div class="np_des_right_container flr"> <!--right container start here-->


        </div>
        <!--right container end here-->

    </div> <!--wrapper inner closed here-->
</div> <!--module container end here-->
<div class="clearfix"></div>
<?php
$this->load->module('templates');
$this->templates->footer();
function displayLevels($pts){
  if($pts>0&&$pts<=24){
    return "Prisage";
  }
  elseif($pts<=48&&$pts>=25){
    return "Secsage";
  }
  elseif($pts>=98&&$pts<=49){
    return "Tersage";
  }
  elseif($pts>=99&&$pts<=148){
    return "Quasage";
  }
  elseif($pts>=149&&$pts<=198){
    return "Quisage";
  }
  elseif($pts>=199&&$pts<=248){
    return "Sensage";
  }
  elseif($pts>=249&&$pts<=398){
    return "Sepsage";
  }
  elseif($pts>=399&&$pts<=548){
    return "Octsage";
  }
  elseif($pts>=549&&$pts<=698){
    return "Nonsage";
  }
  elseif($pts>=699){
    return "Densage";
  }
}
?>

