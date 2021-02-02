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
        <?php $this->templates->os_oneshopheader("services"); ?>
    </div>
    <div class="oneshop_banner_right_box"  <?php echo "style= 'background-image: url($sideimage)'"; ?> >&nbsp;</div>
</div> 

    <div class="" style="margin:0 4%;width:92%;display:table;"><div class="oneshop_left_newcontainer pab10">
<div class="hd_heading">
            	<h1>Services <span></span></h1>
            </div>
        <?php
		//print_r($store_details);
        if ($store_details[0]["services"] != "") {
            $savedServArr = explode(",", $store_details[0]["services"]);
        }
        if (count($savedServArr) > 0 && $savedServArr!="") {
            foreach ($savedServArr as $serviceVal) {                
				if($serviceVal!=="NONE"){
				?>
                <p class="wi100pstg fll">
                    <span class="fll">
                        <img src="<?php echo base_url() . "assets/images/Yes.png"; ?> " width="22" height="22">
                    </span>
                    <span class="fll mat5 mal5 fs14"> <?php echo ucwords(strtolower($serviceVal)); ?>  </span>
                </p>
				<?php
                }else{
				?>
                	<div class="notfound">
	<p><i class="fa fa-ban"></i> No Services Found </p>
  </div>
                <?php
				}
			}
        }
        ?>
        <div class="clearfix"></div>
        

        <div class="oneshop_products_main_wrap mat20">
        <div class="hd_heading">
            	<h1>Recent Products  <span></span></h1>
            </div>
            <!--<h4 class="mat10 wi100pstg mab10 black fll"> Recent Products </h4>   -->

            <?php
            $this->load->module('products');
            $this->products->getrecentproducts($store_details[0]['store_code']);
            ?>
        </div>

    </div>

    <div class="oneshop_right_newcontainer mat15">

        <img class="hotel_news_imgbox" src="<?php echo base_url() . "assets/images/ad2.jpg"; ?>">

    </div></div>

</div>