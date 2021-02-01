<?php
$this->load->module("cookies");
$this->load->module('templates');
$this->templates->app_header();
$this->templates->os_mainmenu();
//print_r($user_details);
?>
<div class="oneshop_container_sectionnew">
    <div class="oneshop_container_middle_section mat10">
        <input type="hidden" id="huser_id" value="<?php echo $user_details[0]["profile_id"]?>"/>
        <div class="oneshop_left_newcontainer pab10">
 <div class="hd_heading">
            	<h1>  <?php echo ucfirst($user_details[0]['profile_name']) . " profile " ?> <span></span></h1>
            </div>
      

            <div class="np_des_company_specific_profile_imagewrap">

                <p class="np_des_company_promises_imgbox" style="margin-left: 0px;">


                    <?php if ($user_details[0]["profile_img"]) { ?>
                        <img src="<?php echo PROFILE_LOGO . "mi/" . $user_details[0]["profile_img"]; ?>" class="oneshop_ppProfilePic" style="width: 120px;position: absolute; z-index: 100;" id="osdev_user_pp">
                        <?php
                    } else {
                        ?>
                        <img src="<?php echo base_url() . "assets/"; ?>images/avatar.png" class="oneshop_ppProfilePic" style="width: 120px;position: absolute; z-index: 100;" id="osdev_user_pp">
                        <?php
                    }
                    ?>
                </p>


                <p style="width:100%;height: 235px;overflow: hidden;text-align: center;">

                    <?php if ($user_details[0]["profile_cover_img"]) {
                        ?>
                        <img src="<?php echo PROFILE_COVER . "li/" . $user_details[0]["profile_cover_img"]; ?>" style="width: 100%;transform: translateY(-30%);" id="osdev_display_cover_pic">
                        <?php
                    } else {
                        ?>
                        <img src="<?php echo base_url() . "assets/"; ?>images/banner.jpg" style="width: 100%;transform: translateY(-30%);" id="osdev_display_cover_pic">
                        <?php
                    }
                    ?>
                </p>
            </div>

            <div class="np_des_company_profilename" style="width: 80%">
                <span style="font-size: 17px"><?php echo ucwords($user_details[0]['profile_name']); ?></span>
                <?php
                if($user_details[0]["profile_id"]!=$loggedin_user){
                ?>
                
                <span  style="float:right">
                    <button value="follow" id="oneshop_follow" <?php if ($follow_details[0]["cnt"] == 0) {
                    echo "style='display:block'";
                } else {
                    echo "style='display:none'";
                } ?>  onclick="userFollow(<?php echo $user_details[0]["profile_id"] ?>)"   class="btn-suggestion">Follow</button>
                    <button value="Unfollow" id="oneshop_unfollow" <?php if ($follow_details[0]['cnt'] == 0) {
                    echo "style='display:none'";
                } else {
                    echo "style='display:block'";
                } ?>   onclick="userUnfollow(<?php echo $user_details[0]["profile_id"] ?>)" class="btn-suggestion">Unfollow</button>


                </span>
                <?php if($myfollower!=0){
                    ?>
                <span  style="float:right">
                    <button class="btn-suggestion" onclick="message_popUpVisibility_profile('sendmessage_profile',<?php echo $user_details[0]["profile_id"];?>,'<?php echo ucwords($user_details[0]['profile_name']); ?>');">Message</button>
                    <button class="btn-suggestion amid">Ask For Email id </button>
                    <button class="btn-suggestion mid" style="display: none"><?php echo $myfollower[0]["email"]; ?> </button>
                </span>
                <script>
                $(document).on("click",".amid",function(){
                    $(this).hide();
                    $(".mid").show();
                }); </script>
                        <?php
                }?>
                
                
                
                <?php
                }
                ?>
            </div>



            <div class="wi100pstg mat20 fll">

                <div class="click_tabs_wrap"> 
                    <ul id="tabs">
                        <li><a name="#tab1" href="#" id="current"> Activity </a></li>
                        <li><a name="#tab2" href="#"> Stores </a></li>

                    </ul>
                </div>

                <div id="content">




                    <div id="tab1" style="display: block;">

                        <h1 class="wi100pstg fs14 fll borderbottom pab5"> Activity   </h1>

                        <div class="fll wi100pstg mat10">


                            <div class="wi100pstg overflow">



                            </div>
                            <div class="wi100pstg" id="activity_tpl_div">


                            </div>

                        </div>



                    </div>





                    <div id="tab2" style="display: none;">

                        <h1 class="wi100pstg fs14 fll borderbottom pab5"> Stores  </h1>

                        <div class="wi100pstg borderbottom pab10 fll overflow mat10">

                            <div class="flr mal15" style="margin-top:3px;"> 

                            </div>
                            <div class="flr">
                            </div>

                        </div>
                        <div class="fll wi100pstg mat20">
                            <div class="fll mab10">
                                <ul style="float:left; list-style:none; width:620px;" id="pstores_div">

                                </ul>
                            </div>

                        </div>
                    </div>
                </div>

            </div>

        </div>
        <div class="oneshop_right_newcontainer">
          <?php
          $onenetwork_url=  str_replace("oneshop", "onenetwork", base_url());
          ?>
          <a href="<?php echo $onenetwork_url.'oneshopinfo';  ?>" target="_self"><img src="<?php echo base_url() . "assets/"; ?>images/ad1.jpg" class="hotel_news_imgbox"></a>
        </div>
    </div>

</div>          
<?php $this->templates->app_footer(); ?>
<script type="text/javascript" src="<?php echo base_url().'assets/microjs/pprofile.js'?>"></script>
<script type="text/javascript">
  $.get(oneshop_url+"/pprofile/profileActivityTpl",{userid:$("#huser_id").val()},function(data){
    $("#activity_tpl_div").html(data);
});

$.get(oneshop_url+"/pprofile/getUserStoreTpl",{userid:$("#huser_id").val()},function(data){
    $("#pstores_div").html(data);
});
  </script> 

