<?php
$this->load->module('templates');
$this->templates->app_header();
$this->templates->os_mainmenu();
?>
<script src="<?php echo base_url().'assets/scripts/jquery.cycle.all.js';?>" type="text/javascript"></script>

<script type="text/javascript">
$('.slider').cycle({
    fx:		'scrollHorz',
    next:	'.isdes_nextbtn',
    prev:	'.isdes_prevbtn',
    timeout:     3000,
    pause:       1
});
</script>

<!--Oneshop Content starts Here(vinod 19-05-2015)-->
<div class="oneshop_container_sectionnew ">
<div class="maincontianer_wrap">
	<div class="oneshop_container_middle_section">
		<div class="oneshop_left_newcontainer">
			<div class="oisdes_leftbanner_box">
				<div class="slider_wrap"><div class="isdes_nextbtn btnarrow"><i class="fa fa-angle-right"></i></div>
				<div class="isdes_prevbtn btnarrow"><i class="fa fa-angle-left"></i></div>
				<div class="slider">
					<img src="<?php echo base_url().'assets/images/bed1.jpg';?>" alt="image">
					<img src="<?php echo base_url().'assets/images/bed4.jpg';?>" alt="image">
					<img src="<?php echo base_url().'assets/images/bed5.jpg';?>" alt="image">
				</div></div>
			</div>
			<div class="oneshop_products_main_wrap">
				<?php
					$this->load->module('products');
					$this->products->getfeaturedproducts();
				?>
			</div>


			<div class="fll wi100pstg">
<!--                            <h3 class="mab10"> Store Suggestions  </h3>-->
<div class="hd_heading"><h2>Store Suggestions  <span></span> </h2></div>
<!--<div class="titlecontainer acenter">
	<div class="titledeco">
		<h4 class="title-text fkinlineblock black">  Store Suggestions   </h4>
	</div>
</div>-->

                            <div class="fll mab10">

                                <div class="featured_product_product_mainwrap">
                               <?php
                         $this->load->module("stores");
                              $stores_list=$this->stores->getStoresList();
                          foreach($stores_list as $stlist){
                            // print_r($stlist["store_name"]);
                            $store_name=ucfirst($stlist["store_name"]);
                            $store_img_path=base_url()."stores/".$stlist["store_code"];
                            //echo file_exists($product_img_path);
                            $store_url=base_url()."store_home/".$stlist["store_code"];
                            //echo $store_img_path."/logo/si/".$stlist["profile_image_path"];
                            $img=$stlist["profile_image_path"];
                            if($img!=""){
                              $store_img_url=base_url()."stores/".$stlist["store_code"]."/logo/li/".$stlist["profile_image_path"];
                            }else{
                              $store_img_url=base_url().'assets/images/default_store_100.png';
                            }
                            if(strlen($stlist["store_name"])>15){
                              $store_name_label=ucwords(substr($stlist["store_name"],0,15))."..";
                            }
                            else{
                              $store_name_label=ucwords($stlist["store_name"]);
                            }
                         ?>
                      <div class="oneshop_products_storebox">
                    <div class="oneshop_products_storeboxtop_div" id="product_div<?php echo $rows['product_aid']?>">

                            <p class="acenter mat20">
                                <a href="<?php echo $store_url;?>">
                                    <img src="<?php echo $store_img_url; ?>" class="pro_img_one" title="<?php echo $store_name?>">
                                </a>
                            </p>
                    </div>
                    <div class="oneshop_products_storebox_bottomdiv">
                        <a href="<?php echo $store_url;?>" title="<?php echo $store_name?>"><?php echo $store_name_label; ?></a>
                    </div>
                </div>
                          <?php
                         }
                         ?>
                                    </div>
                            </div>
			</div>
		</div>
            </div>



		<div class="oneshop_right_newcontainer">

			<div class="hotel_pachagesummary_box quicklinkwrap">
				<h3> Quick Links! </h3>
				<ul>
                                    <li><a href="<?php echo base_url().'templates/quicklink'?>"><i class="fa fa-angle-right "></i> How to open a store?</a> </li>
                                    <li><a href="<?php echo base_url().'templates/linkstore'?>"><i class="fa fa-angle-right "></i> Link Store to ONEIDSHIP</a></li>
                                    <li><a href="<?php echo base_url().'templates/storepolicy'?>"><i class="fa fa-angle-right "></i> Stores' Policies</a> </li>
                                    <li><a href="<?php echo base_url().'templates/storeresponce'?>"><i class="fa fa-angle-right "></i> Stores' Responsibilities</a> </li>
                                    <li><a href="<?php echo base_url().'templates/customeright'?>"><i class="fa fa-angle-right "></i> Customer's Rights</a> </li>
                                    <li><a href="<?php echo base_url().'templates/ontop'?>"><i class="fa fa-angle-right "></i> How to Get to the Top?</a></li>
                                    <li><a href="<?php echo base_url().'templates/trending'?>"><i class="fa fa-angle-right "></i> Trending Products </a></li>
                                    <li><a href="<?php echo base_url().'templates/compareprices'?>"><i class="fa fa-angle-right "></i> Compare Prices</a> </li>
                                    <li><a href="<?php echo base_url().'templates/price'?>"><i class="fa fa-angle-right "></i> Price Reduction Notifications</a> </li>
                                    <li><a href="<?php echo base_url().'templates/deals'?>"><i class="fa fa-angle-right "></i> Best Deals</a> </li>
                                    <li><a href="<?php echo base_url().'templates/malls'?>"><i class="fa fa-angle-right "></i> Creating Malls</a> </li>
				</ul>
			</div>

            <?php
                $this->load->module("suggestions");
                $this->suggestions->getStoreSuggestions();
                $this->suggestions->getProductSuggestions();
            ?>
		</div>
	<div class="clearfix"></div>
    </div>
</div>
<!--Oneshop Content ends Here(vinod 19-05-2015)-->

<?php
$this->templates->app_footer();
?>
