<?php
$this->load->module("templates");
$this->templates->coheader();

?>
<div class="clearfix cdtl" jid="<?php echo $jobid;?>" chatpartnerid="<?php echo $chatpartnerid;?>" ></div>
<div class="codes_module_container_wrap">
    <div class="wrapper-inner">
        <div class="popupbox_new_wrapper">
            <div class="popupbox_new_leftboxer">
                <div class="wi100pstg mab15 border_bottom fll overflow"> 
                    <p class="popupleft_logo">  <img src="<?php echo base_url()."data/images/logo/mi/".$cmpdetails[0]["logo_path"]; ?>" width="150" height="37"> </p>
                    <p class="flr fs18 bold mat15 wi75 acenter"><?php echo $cmpdetails[0]["company_name"];?> </p>
                </div>

                <div class="wi100pstg fll mab15"> 
                    <ol class="discussion" id="vchatwindow">

                    </ol>
                </div>
            </div>

            <div class="popupbox_new_rightboxer"> 
                <div class="fll mab15"> 
                    
                    <p class="counter_box" id="hur">00 </p>
                    <p class="counter_box" id="min"> 00 </p> 
                    <p class="counter_box" id="sec"> 00 </p>
                </div>
                    
                
                <p class="flr mat10"> <img src="<?php echo base_url()."assets/"?>images/endcall2.png" width="30" height="31" name="End Call"> </p>
                <div class="chatconversation_users_wrapper">
                    <div style="width:100%; position:inherit;" class="cssmenu">
                        <ul style="background:#fff;">

                            <li class="active has-sub">
                                <div class="chat_usermaindiv-box">  
                                    <div class="chatconversation_users_singlemaindiv">
                                        <p class="chatconversation_users_leftimage_online"> <img class="chatconversation_image" src="<?php  if($empdetails[0]["img_path"]) echo ONEIDNET_URL."data/".$empdetails[0]["img_path"]; else echo base_url()."assets/images/noimage.png"?>"> </p>
                                        <p class="chatconversation_user_name"><a class="class1"><?php print_R($empdetails[0]["epmloyername"]); ?> </a> 
<!--                                            <span class="fs12 normal mat5 wi100pstg fll white "> Recruiter at Airlines </span>
                                            <span class="fs12 normal mat5 fll white "> Airlines </span>-->
                                        </p>
                                    </div>
                                </div>
                            </li>
                            <div class="wi100pstg fll mab15 overflow mat15 black">
                                <textarea class="write_textarea_box" placeholder="write your message" id="messagebox"></textarea>
                            
                                    <p class="flr">  <button id="msgsend" class="btn_box"> SEND </button>  </p>
                                </div> 
                            </div>
                            <p style="margin:0 auto; text-align:center; padding:0px 0 0 0;"><a href="#" class="btn btn-primary btn-large"> ATTACHMENT </a></p>
                            <p style="margin:0 auto; text-align:center; padding:10px 0 0 0;"><a href="#" class="btn btn-primary btn-large"> Request Profile Access </a></p>
                            

                        </ul>
                    </div>
                </div>
            </div>     
        </div>
    </div>
    <input type="hidden" id="settime" value="">
    <?php
    $this->templates->footer();
    ?>


<script src="<?php echo base_url()."assets/microjs/interviewchat.js"; ?>" type="text/javascript"></script>
<script></script>
