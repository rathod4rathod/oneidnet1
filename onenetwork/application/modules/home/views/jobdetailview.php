<?php       
$this->load->module("templates");
$this->templates->coheader();
?>
<?php $jobdatainfo=$jobdata[0];?>
<div class="clearfix"></div>
<div class="codes_module_container_wrap_two">
    <div class="wrapper-inner">

        <div class="j-right-container-two mat30">
            <div class="jobdetail-leftimagebox">
                <!--<img src="<?php echo base_url()."assets/"?>images/mercedes.jpg" class="imagebox">-->
                <img src="<?php echo base_url()."data/images/logo/mi/".$jobdatainfo["logo_path"];?>" class="imagebox">
            </div>

            <div class="jobdetail-leftbox-leftcontent">
                <a href="<?php echo base_url().'profile/companyProfile/'.bin2hex($jobdatainfo["company_id_fk"]);?>">
                <h2 class="normal mat20"> <?php echo $jobdatainfo["company_name"];?> </h2>
                </a>
                
                <!--<p class="gray mab15"> Sub Heading Here </p>-->

                <div class="wi100pstg mat5 overflow">
                    <p class="fll wi35 bold"> Industry Type </p>
                    <p class="fll wi35"> <?php echo $jobdatainfo["industry_type"];?>  </p>
                </div>

                <div class="wi100pstg mat5 overflow">
                    <p class="fll wi35 bold"> Company Size </p>
                    <p class="fll wi35"> <?php echo $jobdatainfo["company_size"];?> </p>
                </div>

<!--                <div class="wi100pstg mat5 overflow">
                    <p class="fll wi35 bold"> Contact </p>
                    <p class="fll wi35"><?php echo $jobdatainfo["company_phone"];?></p>
                </div>-->
                <div class="wi100pstg mat5 overflow">
                    <p class="fll wi35 bold"> Landline  </p>
                    <p class="fll wi35"><?php echo $jobdatainfo["landline_no"];?></p>
                </div>

<?php $full_name=""; if($jobdatainfo["first_name"]!="")
        $full_name.=$jobdatainfo["first_name"];
        if($jobdatainfo["middle_name"]!="")
            $full_name.=" ".$jobdatainfo["middle_name"];
        if($jobdatainfo["last_name"]!="")
            $full_name.=" ".$jobdatainfo["last_name"];
        if($full_name!=""){
            ?>

                <div class="wi100pstg mat5 overflow">
                    <p class="fll wi35 bold"> Recruiter Name </p>
                    <p class="fll wi35"> <?php echo $full_name;?></p>
                </div>
        <?php } ?>

                <div class="wi100pstg mat5 overflow">
                    <p class="fll wi35 bold">Web Site </p>
                    <p class="fll wi35"><?php echo $jobdatainfo["website"];?> </p>
                </div>

                <div class="wi100pstg overflow"> <p style="margin:0 auto; width:100%;"><?php if(!isset($owncmpny)){
                    ?>
                        <input type="hidden" id="cmpaid" value="<?php echo $jobdatainfo["company_aid"];?>">
                <a class="follow-big flr co-f-btn mar10" id="<?php if($follow_status[0]["user_id_cnt"]==1){ echo "cmpUnFallow"; } else{ echo "cmpFallow"; }?>"><?php if($follow_status[0]["user_id_cnt"]==1){  echo "Unfollow"; } else{ echo "Follow"; }?></a>
                        <?php
                } ?> </p>  </div>


            </div>





        </div> 




        <div class="j-left-container-two">
            <div class="fll overflow wi100pstg mat15 mab15"> <h1 class="mat8 wi100pstg fll normal pab10 overflow"><?php echo $jobdatainfo["role"];?> </h1> </div>

            <div class="jobs-detail-box">
                <h1 class="wi18 mat5 green fll">  <?php echo $jobdatainfo["status"];?>  </h1>

                <div class="wi18 fll">
                    <h1 class="normal fs16">  <?php echo $jobdatainfo["candidate_applied"];?>   </h1>
                    <p class="gray mat5"> Applied </p>
                </div>

                <div class="wi18 fll">
                    <h1 class="normal fs16">  <?php echo $jobdatainfo["total_views"];?>  </h1>
                    <p class="gray mat5"> Views </p>
                </div>

                <div class="wi18 fll">
                    <h1 class="normal fs16"> 
                    <?php
                $start_date = new DateTime();
                $since_start = $start_date->diff(new DateTime($jobdatainfo["posted_on"]));
                if ($since_start->y == 1) {
                  echo $since_start->y . " year ago";
                }else  if ($since_start->y >= 1) {
                  echo $since_start->y . " years ago";
                } else if ($since_start->m == 1) {
                  echo $since_start->m . "month ago";
                }else if ($since_start->m >= 1) {
                  echo $since_start->m . "months ago";
                } else if ($since_start->d == 1) {
                  echo $since_start->d . " day ago";
                }else if ($since_start->d >= 1) {
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
                    
                    </h1>
                    <p class="gray mat5"> Posted On</p>
                </div>

                <div class="wi25 fll">
                    <input type="button" class="button_new mal10 flr" id="<?php if($saved[0]["saved_count"]==1){ echo "savedjob"; }else{ echo "savejob";}  ?>" value="<?php if($saved[0]["saved_count"]==1){ echo "Saved job"; }else{ echo "Save Job";}  ?>">
                    
                    <input type="hidden" value=" <?php echo $jobdatainfo["job_id"];?>" id="jobaid">

                    <input type="button" class="button_new mal10 flr" id="<?php if($applied[0]["applied_count"]==1){ echo "job_applied"; }else{ echo "job_apply"; } ?>" value="<?php if($applied[0]["applied_count"]==1){ echo "Applied"; }else{ echo "Apply"; } ?>">
                </div>




            </div>


            <div class="jobs-detail-box-discription mat20">
                <h2 class="wi14 wi100pstg normal mat5 gray fll"> Skills </h2>
                <p class="fs14 fll wi100pstg ajustify lh20 mat10">
                    <?php echo $jobdatainfo["skills_str"];?>
                </p>
                <h2 class="wi14 wi100pstg normal mat30 gray fll"> Experience </h2>
                <p class="fs14 fll wi100pstg ajustify lh20 mat10">
                    <?php echo $jobdatainfo["min_exp"]."-".$jobdatainfo["max_exp"]." years";?>
                </p>


                <h2 class="wi14 wi100pstg normal mat30 gray fll"> Salary </h2>
                <p class="fs14 fll wi100pstg ajustify lh20 mat10">
                  <?php echo $jobdatainfo["min_sal"]."-".$jobdatainfo["max_sal"]." ".$jobdatainfo["currency"];?>
                </p>
                <h2 class="wi14 wi100pstg normal mat30 gray fll"> Description </h2>
                <p class="fs14 fll wi100pstg ajustify lh20 mat10">
                    <?php echo $jobdatainfo["description"];?>
                </p>
                
            </div>

        </div>     

    </div>



    <?php
    $this->templates->footer();
    ?>
    <script src="<?php echo base_url(); ?>assets/microjs/jobdetailview.js" type="text/javascript"></script>
