<?php
//echo "<pre>";print_R($savedjobdata);echo "</pre>";
$this->load->module("templates");
$this->templates->coheader();
?>
<?php // echo "<pre>";print_R($jobdata);echo "</pre>";?>
<div class="clearfix"></div>

<div class="codes_module_container_wrap">
    <div class="wrapper-inner">

        <div class="j-left-container">
            <div class="fll overflow wi100pstg mab15"> <h2 class="mat8 border_bottom wi100pstg fll pab10 overflow"> My Saved Jobs  </h2> </div>

<?php if($savedjobdata!=0){
    foreach($savedjobdata as $savedjobdatainfo){
        ?>
            <div class="big-cont-banner-content-activity-leftbox">
                <div class="wi70 fll mat10">
                    <a href="<?php echo base_url()."home/jobview/".bin2hex($savedjobdatainfo["job_id"]);?>">
                        <p class="wi100pstg fs18 mab5"><?php echo $savedjobdatainfo["role"]; ?></p></a>
                    <a href="<?php echo base_url()."profile/companyProfile/".bin2hex($savedjobdatainfo["company_aid"]);?>">
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
                ?>               </div>
            </div>
            <?php
    }
}?>




        </div>
        <div class="j-right-container mat30">
            <?php 
$sugobj=$this->load->module("suggestions");
$sugobj->companySuggestion();
$sugobj->jobSuggestion();
?>
        </div>
    </div>
    <?php
    $this->templates->footer();
    ?>
