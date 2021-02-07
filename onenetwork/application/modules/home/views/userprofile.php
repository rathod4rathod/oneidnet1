<?php
$this->load->module("templates");
$this->templates->coheader();
?>




<div class="clearfix"></div>

<div class="codes_module_container_wrap_bgimages_fixed">
    <div class="codes_module_container_wrap_transparent_wrap">
        <div class="wrapper-inner">

            <div class="j-left-container">
                <!--<div class="fll overflow wi100pstg mab15"> <h2 class="mat8 border_bottom wi100pstg fll white pab10 overflow"> My Applied Jobs  </h2> </div>-->

                <div class="wi100pstg fll overflow">


                    <div class="dealer-cover-banner">
                        <div class="dealer-cover-logo"> 
                            <?php if($_SESSION['user_image']!=""){
                                ?>
                            <img class="dealer-cover-logo-image" src="<?php echo ONEIDNET_URL."data/" . $_SESSION['user_image']?>">
                                    <?php
                            }else{
                                ?>
                            <img class="dealer-cover-logo-image" src="<?php // echo base_url()."assets/"?>images/noimage.png"> 
                                    <?php
                            } ?>
                            
                            
                            
                        </div>
                            
                        <div class="dealer-cover-name">
                            <div class="fll">
                                <h2 class="white"><?php echo $_SESSION['user_full_name']; ?></h2>
                                <!--<div class="wi100pstg white mat5"> <p class="fll bold"> Followers : </p> <p class="fll"> 2400 </p> </div>-->
                            </div>

                        </div>
                        <img class="dealer-cover-image" src="<?php echo base_url()."assets/"?>images/mercedes.jpg">
                    </div>

                    <div class="fll wi100pstg mat20">

                        <div class="company-nav">
                            <ul>
                                <li class="active" id="myappliedjobs" sec="myappliedjobssec"><a>MY JOB APPLICATIONS</a> </li>
                                <li id="mysavedjobs" sec="mysavedjobssec"> <a>My Saved Jobs</a> </li>
                                <li id="myfollowingjobs" sec="myfollowingjobssec"><a>COMPANIES I FOLLOW</a> </li>
                            </ul>
                        </div>
                        
                        <div class="fll wi100pstg mat20" id="myappliedjobssec">
                            <div class="fll wi100pstg">
                                <h2 class="dx_des_mab10 wi100pstg white mab15 dx_des_borderbottom2 fll dx_des_pab10"> My Applied Jobs  </h2>

                                <?php if ($jobdata != 0) {
                                    foreach ($jobdata as $jobdatainfo) {
                                        ?>
                                        <div class="big-cont-banner-content-activity-leftbox">
                                            <div class="wi70 fll mat10">
                                                <a href="<?php echo base_url() . "home/jobview/" . bin2hex($jobdatainfo["job_id"]); ?>">
                                                    <p class="wi100pstg fs18 mab5"><?php echo $jobdatainfo["role"]; ?> </p></a>
                                                <a href="<?php echo base_url() . "profile/companyProfile/" . bin2hex($jobdatainfo["company_aid"]); ?>">
                                                    <p class="wi100pstg gray fs14"><?php echo $jobdatainfo["company_name"]; ?>  </p>
                                                </a>
                                            </div>
                                            <div class="wi22 flr">
                                                <p class="mal5"> Status</p>
                                                <strong> <?php echo $jobdatainfo["status"]; ?>  </strong> 
                                            </div>
                                            <div class="wi22 flr">
                                                <p class="mal5"> Applied on </p>
                                                <?php
                                                $start_date = new DateTime();
                                                $since_start = $start_date->diff(new DateTime($jobdatainfo["applied_on"]));
                                                if ($since_start->y == 1) {
                                                    echo $since_start->y . " year ago";
                                                } else if ($since_start->y >= 1) {
                                                    echo $since_start->y . " years ago";
                                                } else if ($since_start->m == 1) {
                                                    echo $since_start->m . "month ago";
                                                } else if ($since_start->m >= 1) {
                                                    echo $since_start->m . "months ago";
                                                } else if ($since_start->d == 1) {
                                                    echo $since_start->d . " day ago";
                                                } else if ($since_start->d >= 1) {
                                                    echo $since_start->d . " days ago";
                                                } else if ($since_start->h == 1) {
                                                    echo $since_start->h . " hour ago";
                                                } else if ($since_start->h >= 1) {
                                                    echo $since_start->h . " hours ago";
                                                } else if ($since_start->i >= 1) {
                                                    echo $since_start->i . " Minutes ago";
                                                } else if ($since_start->s >= 0) {
                                                    echo "few Seconds ago";
                                                }
                                                ?>
                                            </div>

                                        </div>   

                                        <?php }
                                }
                                ?>


                            </div>
                        </div>

            <div class="fll wi100pstg mat20" id="myfollowingjobssec"  style="display:none;">
                <div class="fll wi100pstg">
                    <h2 class="dx_des_mab10 wi100pstg white mab15 dx_des_borderbottom2 fll dx_des_pab10"> My Fallowing Companies </h2>
                    <div class="wi100pstg fll">

                        <?php
                        if ($falloingcompanies != 0) {
                            foreach ($falloingcompanies as $falloingcompaniesinfo) {
                                ?>
                                <div class="auction_box_leftimage cmpdiv<?php echo $falloingcompaniesinfo["company_aid"]; ?>">
                                    <div class="auction_box">
                                        <div class="auction_box_inside">
                                            <a href="<?php echo base_url() . "profile/companyProfile/" . bin2hex($falloingcompaniesinfo["company_aid"]); ?>">
                                                <div class="auction_box_inside_bottom_wrap"> <?php echo $falloingcompaniesinfo["company_name"]; ?>  </div>
                                            </a>
                                            <p class="auction_box_inside_imagediv"> 
                                                <a href="<?php echo base_url() . "profile/companyProfile/" . bin2hex($falloingcompaniesinfo["company_aid"]); ?>">
                                                    <img src="<?php
                                                    if ($falloingcompaniesinfo["logo_path"]) {
                                                        echo base_url() . "data/images/logo/orig/" . $falloingcompaniesinfo["logo_path"];
                                                    } else {
                                                        echo base_url() . "assets/images/noimage.png";
                                                    }
                                                    ?>">
                                                </a>   
                                            </p>

                                            <div class="followandunfollow_box">
                                                <!--<p class="fll"><input class="button_new" value="Follow" type="button"> </p>--> 

                                                <p class="flr"><input class="button_new uncmpnyfallow" value="Unfollow " ccid="<?php echo $falloingcompaniesinfo["company_aid"]; ?>" type="button"> </p> 
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>

                        
                        
                        

                        <div class="fll wi100pstg mat20"  id="mysavedjobssec" style="display:none;">
                            <div class="fll wi100pstg">
                                <h2 class="dx_des_mab10 wi100pstg white mab15 dx_des_borderbottom2 fll dx_des_pab10"> My saved jobs  </h2>
                                <?php
                                if ($savedjobdata != 0) {
                                    foreach ($savedjobdata as $savedjobdatainfo) {
                                        ?>
                                        <div class="big-cont-banner-content-activity-leftbox">
                                            <div class="wi70 fll mat10">
                                                <a href="<?php echo base_url() . "home/jobview/" . bin2hex($savedjobdatainfo["job_id"]); ?>">
                                                    <p class="wi100pstg fs18 mab5"><?php echo $savedjobdatainfo["role"]; ?></p></a>
                                                <a href="<?php echo base_url() . "profile/companyProfile/" . bin2hex($savedjobdatainfo["company_aid"]); ?>">
                                                    <p class="wi100pstg gray fs14"><?php echo $savedjobdatainfo["company_name"]; ?>  </p>
                                                </a>

                                            </div>
                                            <div class="wi22 flr">
                                                <p class="mal5"> Saved on </p>
                                                <?php
                                                $start_date = new DateTime();
                                                $since_start = $start_date->diff(new DateTime($savedjobdatainfo["saved_on"]));
                                                if ($since_start->y == 1) {
                                                    echo $since_start->y . " year ago";
                                                } else if ($since_start->y >= 1) {
                                                    echo $since_start->y . " years ago";
                                                } else if ($since_start->m == 1) {
                                                    echo $since_start->m . "month ago";
                                                } else if ($since_start->m >= 1) {
                                                    echo $since_start->m . "months ago";
                                                } else if ($since_start->d == 1) {
                                                    echo $since_start->d . " day ago";
                                                } else if ($since_start->d >= 1) {
                                                    echo $since_start->d . " days ago";
                                                } else if ($since_start->h == 1) {
                                                    echo $since_start->h . " hour ago";
                                                } else if ($since_start->h >= 1) {
                                                    echo $since_start->h . " hours ago";
                                                } else if ($since_start->i >= 1) {
                                                    echo $since_start->i . " Minutes ago";
                                                } else if ($since_start->s >= 0) {
                                                    echo "few Seconds ago";
                                                }
                                                ?>               </div>
                                        </div>
                                        <?php
                                    }
                                }
                                ?>
                            </div>
                        </div>

                        
                    </div>
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
