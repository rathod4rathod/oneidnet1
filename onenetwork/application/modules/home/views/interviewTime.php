<?php
$this->load->module("templates");
$this->templates->coheader();
//$data=0;
//$data=2;
?>
<script src="<?php echo base_url() . "assets/js/responsivevoice.js" ?>"></script>
    <script>

        if ("<?php echo $rec_gender; ?>" == "Male") {
            responsiveVoice.speak("<?php echo $speak_lines; ?>", "UK English Female");
            responsiveVoice.speak("<?php echo $rec_lines; ?>", "UK English Male");
        }
        else {
            responsiveVoice.speak("<?php echo $speak_lines; ?>", "UK English Female");
            responsiveVoice.speak("<?php echo $rec_lines; ?>", "UK English Female");
        }

    </script>
<div class="clearfix"></div>

<div class="codes_module_container_wrap">
    <div class="wrapper-inner">
        <div class="j-left-container mab50">
            <!--<div class="fll overflow wi100pstg mab15"> <h2 class="mat8 border_bottom wi100pstg fll pab10 overflow"> Your Notifications </h2> </div>-->
            <div class="wi100pstg overflow">
                <div class="wi100pstg fll">
                    <div class="dealer-cover-banner">
                        <div class="dealer-cover-logo">
                            
                            <img style="width:100%;height:100%;" src="<?php if ($logo_path == '')
        echo base_url() . 'data/images/logo/si/noimage.png';    else        echo base_url() . 'data/images/logo/si/' . $logo_path;
    ?>" alt="<?php echo $company_name;?> " id="company_logo" width="140" height="150">
                        </div>
                        <div class="dealer-cover-name">
                            <div class="fll">
                                <h2 class="white"> <?php echo $company_name;?> </h2>
                            </div>
                            <div class="flr">
                            </div>
                        </div>
                        <img style="width:100%" id="company_bannerv" class="codes_bannerImg" src="<?php if ($cover_path == '')
                                                           echo base_url() . 'data/images/banner/mi/noimage.png'; else  echo base_url() . 'data/images/banner/mi/' .$cover_path;
                                                       ?>" alt="bannerpic" >
                    </div>
                    <div class="Comp_profile_banner_shadow"> <img src="<?php echo base_url()."assets/"?>images/shadow.png"> </div>
                </div>
                <div class="wi100pstg border_bottom pab5 mat20 fll overflow"> &nbsp;
                </div>
                
                <?php  if ($data != 0 && $data != 2) {
                    ?>

                
                <div class="wi100pstg mat20 fll overflow chid" chid="<?php  echo bin2hex($userid."###".$recruiterid."###".$job_id_fk."###".$company_id_fk); ?>">
                    <p class="acenter mat30 fs36"> Welcome </br></br></br><?php echo $company_name;?> </p>

                    <div class="mat50 acenter" style="width:250px; margin:0 auto;">
                        <p class="fs16 mab10 mat10 acenter">( Time Left for interview )</p>
                        
                        <input type="hidden" id="tottime" value="<?php echo $totremtime; ?>">
                    <input type="hidden" id="remtime" value="<?php echo $remtime; ?>">                    
                    
                    
                    <h1  id="timecounter">00:00:00</h1>                    
                    </div>
                    <div class="oneshop_overview_countbox mat50">
                        <p class="fs24 acenter red" id="intstatus"> Your interview is Scheduled </p>
                        <p class="fs25 mat10 acenter">
                                <?php
                                $date = new DateTime($live_from);
                                echo $date->format('h:i A, d F Y ');
                                ?>
                             </p>
                    </div>
                    </div>
                
                        <?php
                }else  if ($data == 2){
                   ?>
                <div class="wi100pstg mat20 fll overflow">
                    <p class="acenter mat30 fs36"><?php echo $company_name;?></p>
                    <div class="mat50 acenter" style="width:250px; margin:0 auto;">
                        <p class="fs16 mab10 mat10 acenter">( Time Left for interview )</p>
                        <h1>00 : 00 :  00</h1>
                        <!--<img src="<?php echo base_url()."assets/";?>images/time.png" width="150" height="45">-->
                    </div>
                    <div class="oneshop_overview_countbox mat50">
                        <p class="fs24 acenter red">No Such Interview Request</p>
                    </div>
                </div>        
                      <?php 
                } else{
                    ?>
                        
                <div class="wi100pstg mat20 fll overflow">
                    <p class="acenter mat30 fs36"><?php echo $company_name;?></p>
                    <div class="mat50 acenter" style="width:250px; margin:0 auto;">
                        <p class="fs16 mab10 mat10 acenter">( Time Left for interview )</p>
                        <h1>00 : 00 :  00</h1>
                        <!--<img src="<?php echo base_url()."assets/";?>images/time.png" width="150" height="45">-->
                    </div>
                    <div class="oneshop_overview_countbox mat50">
                        <p class="fs24 acenter red"> Interview Link is expire </p>
                    </div>
                </div>        
                        <?php
                }  ?>
                
                
                
                
                
                
            </div>
        </div>

        <div class="j-right-container mat30">
            <?php
            $sugobj = $this->load->module("suggestions");
            $sugobj->companySuggestion();
            $sugobj->jobSuggestion();
            ?>
        </div>
    </div>
    <?php
    $this->templates->footer();
    ?>

    <script>        
        
//                $(document).ready(function () {
//                    $("#chatArea").hide();
//                });
                function totWatch() {
                    var clock;
                    var stoptime = $("#tottime").val();
                    clock = setInterval(stopWatch, 1000);
                    var sec = stoptime;
                    function stopWatch() {
                        sec--;
                        if (sec < 1)
                        {
                            $("#chatAreaTot").remove();
                            $("#expire").show();
                            window.clearInterval(clock);
                        }
                        document.getElementById("timerun").innerHTML = secondstotime(sec);
                    }
                }
                function secondstotime(secs)
                {
                    var t = new Date(1970, 0, 1);
                    t.setSeconds(secs);
                    var s = t.toTimeString().substr(0, 8);
                    if (secs > 86399)
                        s = Math.floor((t - Date.parse("1/1/70")) / 3600000) + s.substr(2);
                    return s;
                }
                    var clock;
                    var stoptime1 = $("#remtime").val();

                    clock = setInterval(stopWatch, 1000);
                    var sec1 = stoptime1;
                    function stopWatch() {
                        sec1--;
                        if (sec1 <= 0)
                        {
                            var chaturl=baseUrl+"home/chatroom/"+$(".chid").attr("chid");
                            window.open(chaturl);
                            window.clearInterval(clock);
                            $("#intstatus").html("<a href='"+chaturl+"'>Your Interview Link</a>");
//                            totWatch();
                        }
                        if (sec1 <= 0) {
                            document.getElementById("timecounter").innerHTML = "00:00:00";
                        }
                        else {
                            document.getElementById("timecounter").innerHTML = secondstotime(sec1);
                        }
                    }



                
                $("#closemeeting1").click(function () {
                    $.ajax({
                        'type': "POST",
                        'url': '../../closemeeting',
                        'datatype': "json",
                        success: function (res)
                        {
                            if (res == 1) {
                                $("#chatArea").hide();
                                $("#expire").show();
                            }
                        }
                    });

                });
</script>
