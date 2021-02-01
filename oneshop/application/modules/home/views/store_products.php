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
    
<!--Oneshop Content starts Here(Raviteja 31-12-2015)-->
<div class="oneshop_container_sectionnew">
    
    <div class="oneshop_banner_stip_newbox click_importantNotifications">

    <div class="oneshop_banner_left_box"  <?php echo "style= 'background-image: url($sideimage)'"; ?> >&nbsp;</div>
    <div class="oneshop_banner_stip_middle_content"  <?php echo "style= 'background-image: url($midimage)'"; ?> > 
        <?php $this->templates->os_oneshopheader("view-products"); ?>
    </div>
    <div class="oneshop_banner_right_box"  <?php echo "style= 'background-image: url($sideimage)'"; ?> >&nbsp;</div>
</div> 
   <div class="oneshop_container_middle_section mat10">
		
		<div class="store_mainwrap">
            <div class="oneshop_right_newcontainer mat15" style="float:left;">
                    
			<a href="<?php echo ONENETWORKURL.'oneshopinfo';  ?>" target="_self"><img src="<?php echo base_url() . "assets/"; ?>images/ad1.jpg" class="hotel_news_imgbox"></a>
                        <a href="<?php echo ONENETWORKURL.'oneshopinfo';  ?>" target="_self"><img src="<?php echo base_url() . "assets/"; ?>images/ad2.jpg" class="hotel_news_imgbox"></a>

            </div>
    		<div class="oneshop_left_newcontainer mat15 pab10" id="search_result" style="float:right;">
                <div class="hd_heading">
                    <h2>Products Lists<span></span></h2>
                </div>
                <div>	
                    <?php
        			    $this->load->module('products');
        				$this->products->store_products_result($store_id);
        			?> 
                </div>
    		</div>
        </div>
	</div>
</div>
    

    <!--Oneshop Content ends Here(vinod 19-05-2015)-->            
<script src="<?php echo base_url() . "application/modules/home/microjs/" ?>filterproducts.js"></script>
<?php
$this->templates->app_footer(  ); 
?>
