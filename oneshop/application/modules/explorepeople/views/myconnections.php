<?php
$this->load->module('templates');
$this->templates->app_header();
$this->templates->os_mainmenu();
?>
<script type="text/javascript" src="<?php echo base_url() . "assets/"; ?>microjs/explorepeople.js"></script>
 
<style type="text/css">
    .result {
        background: #F4F4F4;
        box-shadow: 0 0 5px #222;
        float: left;
        height: 75px;
        margin: 10px;
        width: 31%;
    }
    .pImage {
        float: left;
        height: 60px;
        margin: 5px;
        width: 60px;
    }
    .pImage img {
        height: 60px;
        width: 60px;
    }
    .pName {
        float: left;
        height: 60px;
        margin: 5px 0 0;
        width: 170px;
    }
    .pName h3 {
        font: bold 14px Arial;
        margin: 5px;
    }
    .followBtns {
        float: left;
        height: 18px;
        margin: 12px 5px 5px;
        width: 160px;
    }
</style>
<!--Oneshop Content starts Here(vinod 19-05-2015)-->
<div class="oneshop_container_sectionnew">
    <div class="oneshop_container_middle_section mat10">
      
       
         <div class="left_oontainer">
            <div class="fll borderbottom wi100pstg">
                <h2 class="fs25 pab5 mat10"> Followings </h2>
            </div>
            <div class="wi100pstg" id="user_following">
                
            </div>
            <div class="fll borderbottom wi100pstg">
                <h2 class="fs25 pab5 mat10"> Followers </h2>
            </div>
            <div class="wi100pstg" id="user_followers">
                
            </div>
            
        </div>
        <div class="right_container">
            <?php
            $this->load->module("suggestions");
            $this->suggestions->getStoreSuggestions();
            $this->suggestions->getProductSuggestions();
            ?>
        </div>
    </div>
</div>
       <?php
$this->templates->app_footer();
?>
