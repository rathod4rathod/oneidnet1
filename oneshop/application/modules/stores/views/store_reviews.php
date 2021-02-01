<?php
$this->load->module('templates');
$this->templates->app_header();
$this->templates->os_mainmenu();
$store_code=$this->uri->segment(2);
$banner_path = base_url() . "assets/images/store_banners/";
$theme_selected = $this->load->module("stores")->getthemeselected($store_code);
if($theme_selected!=''){ 
     $sideimage =  base_url().'/assets/images/store_banners/'.$theme_selected.'.png';
     $midimage = base_url().'/assets/images/store_banners/mid'.$theme_selected.'.png'; 
 }else{ 
     $sideimage = base_url().'/assets/images/store_banners/1.png';
      $midimage = base_url().'/assets/images/store_banners/mid1.png'; 
     }
?>    
<!--Oneshop Content starts Here(Anil 07-01-2016)-->
<div class="oneshop_container_sectionnew">
          
<div class="oneshop_banner_stip_newbox click_importantNotifications">

    <div class="oneshop_banner_left_box"  <?php echo "style= 'background-image: url($sideimage)'"; ?> >&nbsp;</div>
    <div class="oneshop_banner_stip_middle_content"  <?php echo "style= 'background-image: url($midimage)'"; ?> > 
        <?php $this->templates->os_oneshopheader("store_reviews"); ?>
    </div>
    <div class="oneshop_banner_right_box"  <?php echo "style= 'background-image: url($sideimage)'"; ?> >&nbsp;</div>
</div> 

   <div class="" style="margin:0 4%;width:92%;display:table;">
   <div class="oneshop_container_middle_section" style="width:100%;margin:0px;">
        <div class="oneshop_left_newcontainer pab10">
       <div class="hd_heading">
            	<h1>STORE REVIEWS  <span></span></h1>
            </div>
                
                <?php
                        $this->load->module("stores");
                        $this->stores->storeReviewsTpl($store_code);
                ?>
        </div>
        <div class="oneshop_right_newcontainer">
                <a href="<?php echo ONENETWORKURL.'oneshopinfo';  ?>" target="_blank"><img src="<?php echo base_url() . "assets/"; ?>images/ad2.jpg" class="hotel_news_imgbox"></a>
        </div>
    </div>
    </div>
</div>
<!--Oneshop Content ends Here(Anil 07-01-2016)-->            

<?php
$this->templates->app_footer();
?>
