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
    <div class="oneshop_container_middle_section mat10">
        
    <div class="oneshop_banner_stip_newbox click_importantNotifications">

    <div class="oneshop_banner_left_box"  <?php echo "style= 'background-image: url($sideimage)'"; ?> >&nbsp;</div>
    <div class="oneshop_banner_stip_middle_content"  <?php echo "style= 'background-image: url($midimage)'"; ?> > 
        <?php $this->templates->os_oneshopheader("store-themes"); ?>
    </div>
    <div class="oneshop_banner_right_box"  <?php echo "style= 'background-image: url($sideimage)'"; ?> >&nbsp;</div>
</div> 
         <div class="store_mainwrap">
        
        <div class="oneshop_left_newcontainer pab10">
         <div class="hd_heading">
            	<h1>STORE THEMES<span></span></h1>
            </div>
			
			<form id="edit_store_theme" action = "<?php echo base_url();?>stores/savetheme/" method="post">
				<input type="hidden" value="1" id="imgselected" name="imgselected">
				<input type="hidden" value="<?php echo $store_code; ?>" id="store_code" name="store_code">
				<div class="wi100pstg fll">
					<div class="packagedat_admin">
						<p class="bold fll fs14"> Choose Store Theme </p>
						<p class="flr"><input type="submit" value="Apply" class="np_des_addaccess_btn" name="button"> </p>
					</div>
					<div class="bannersMainDiv">
						<div class="banner-caption">
							<h5>Red Blaze </h5>
						</div>
						<img class="banner <?php if($theme_selected == 1) { echo "banborder"; }?>" id="img1" value="1" src="<?php echo $banner_path; ?>1.png">
					</div>
					<div class="bannersMainDiv">
						<div class="banner-caption">
							<h5> Baby Blue </h5>
						</div>
						<img class="banner <?php if($theme_selected == 2) { echo "banborder"; }?>" id="img2"  value="2" src="<?php echo $banner_path; ?>/2.png">
					</div>

					<div class="bannersMainDiv">
						<div class="banner-caption">
							<h5> Green Rock </h5>
						</div>
						<img class="banner <?php if($theme_selected == 3) { echo "banborder"; }?>"  id="img3" value="3"  src="<?php echo $banner_path; ?>/3.png">
					</div>

					<div class="bannersMainDiv">
						<div class="banner-caption">
							<h5>  Deep Violet </h5>
						</div>
						<img class="banner <?php if($theme_selected == 4) { echo "banborder"; }?>"  id="img4"  value="4" src="<?php echo $banner_path; ?>/4.png">
					</div>

					<div class="bannersMainDiv">
						<div class="banner-caption">
						<h5>   Ocean Deep Blue. </h5></div>
						<img class="banner <?php if($theme_selected == 5) { echo "banborder"; }?>"  id="img5"  value="5" src="<?php echo $banner_path; ?>/5.png">
					</div>
				</div>
			</form>
        </div>
        <div class="oneshop_right_newcontainer">
         <?php  $url = str_replace('/oneshop', '/onenetwork', base_url());?>
    <a href="<?php echo $url.'oneshopinfo';  ?>" target="_self"><img src="<?php echo base_url() . "assets/"; ?>images/ad1.jpg" class="hotel_news_imgbox"></a>

        </div>
        </div>
    </div>
</div>
<!--Oneshop Content ends Here(Anil 07-01-2016)-->            

<?php
$this->templates->app_footer();
?>
<script type="text/javascript" src="<?php echo base_url() . "/application/modules/stores/microjs/"; ?>store_theme.js"></script>
