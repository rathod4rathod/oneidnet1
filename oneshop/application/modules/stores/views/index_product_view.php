 <div class="oneshop_lpSections">
            	<span class="oneshop_lpSectionHeader"><h3>Products</h3></span>
                <div class="oneshop_lpSectionContent">
                	<div class="oneshop_lpscItemsListWrapper">
                    
    <!-- Jssor Slider Begin -->
    <!-- To move inline styles to css file/block, please specify a class name for each element. --> 
    <div id="slider2_container" class="oneshop_corouselContent">
     
<!--Slides Container-->	

<div u="slides" class="oneshop_corouselSlides" style="cursor: move; position: absolute; left: 0px; top: 0px; width: 809px; height: 150px; overflow: hidden;">
    <?php foreach ($index_products as $index_products_info) {
      $pr_img= current(explode(",",$index_products_info["image_path"]));
      ?>
    
      <div class="oneshop_corouselSlide">
          <img src="<?php echo STORE_PATH . $index_products_info["store_id"] . '/products/mi/' . $pr_img; ?>" class="oneshop_lpscItemPic">
          <span class="oneshop_lpcsItemDetails" id="product_aid<?php echo $index_products_info["product_aid"]; ?>"><h4><?php echo $index_products_info["name"]; ?></h4></span></div>
     <script>
        $("#product_aid<?php echo $index_products_info["product_aid"]; ?>").click(function () {
            location.replace(oneshop_url+ "/home/product_Detail_View?product_id=<?php echo base64_encode(base64_encode($index_products_info["product_aid"]));?>");
        });
      </script>
      <?php }
    ?>
</div>


<!--Slides Container-->	
<!-- Arrow Left -->
        <span u="arrowleft" class="jssora03l" style=" float: left; top: 123px; left: 0px;">
        </span>
        <!-- Arrow Right -->
        <span u="arrowright" class="jssora03r" style="top: 123px; right: 8px;">
        </span>
        <!--#endregion Arrow Navigator Skin End -->
    </div>
    <!-- Jssor Slider End -->        
					        
                        
                    </div>
                </div>
            </div>