<?php $store_code=$store_details[0]["store_code"];
//For store theme  selected
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
 <div class="oneshop_banner_stip_newbox click_importantNotifications">

    <div class="oneshop_banner_left_box"  <?php echo "style= 'background-image: url($sideimage)'"; ?> >&nbsp;</div>
    <div class="oneshop_banner_stip_middle_content"  <?php echo "style= 'background-image: url($midimage)'"; ?> > 
        <?php $this->templates->os_oneshopheader("$store_ptype"); ?>
    </div>
    <div class="oneshop_banner_right_box"  <?php echo "style= 'background-image: url($sideimage)'"; ?> >&nbsp;</div>
</div> 

<div class="" style="margin:0 4%;width:92%;display:table;">
	<div class="oneshop_left_newcontainer pab10 minheight700">
		<?php 
			if($store_ptype == "store_agreement"){
				$dispPage = "Purchase Agreement";
			}
		?>
		<div class="mar10 mat15">
        <div class="hd_heading">
            	<h1><?php echo $dispPage; ?>  <span></span></h1>
            </div>
        
			<!--<h4 class="mat10 black borderbottom wi100pstg mab10 pab5 fll"><?php echo $dispPage; ?></h4> -->
		
			<p class="ajustify">
				<?php if($store_details[0]["store_agreement"] != ""){ echo $store_details[0]["store_agreement"]; }else{ ?> 
                <div class="notfound">
                    <p><i class="fa fa-ban"></i> No data found</p>
                </div>
			<?php } ?>
			</p>
		</div>
	</div>
	<div class="oneshop_right_newcontainer mat15">
 
<a href="<?php echo ONENETWORKURL.'oneshopinfo';  ?>" target="_blank"><img src="<?php echo base_url() . "assets/"; ?>images/ad2.jpg" class="hotel_news_imgbox"></a>

	</div>
      </div>