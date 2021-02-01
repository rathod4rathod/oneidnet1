<?php //echo "<pre>"; print_R($similar_products); echo "</pre>";  ?>


<?php
foreach ($similar_products as $similar_products_info) {
  $img = explode(",", $similar_products_info["image_path"]);
  ?>
  <div class="oneshop_myFindProductItem">
      <div class="oneshop_myFindProductImageSection">
          <img src="<?PHP echo STORE_PATH . $similar_products_info["store_unique_id"] . "/products/li/" . $img[0]; ?>" id="mainimg<?php echo $similar_products_info["product_aid"]; ?>">
      </div>
      <div class="oneshop_myFindProductImageViews">
          <ul>
              <?php for ($a = 0; $a < count($img); $a++) {
                ?>
                <li><img src="<?PHP echo STORE_PATH . $similar_products_info["store_unique_id"] . "/products/si/" . $img[$a]; ?>" id="<?php echo $similar_products_info["product_aid"]; ?>"></li>
                <?php }
              ?>
  <!--                    	<li><img src="<?php echo base_url() . "assets/" ?>images/left.png"></li>
                <li><img src="<?php echo base_url() . "assets/" ?>images/bottom.png"></li>
                <li><img src="<?php echo base_url() . "assets/" ?>images/right.png"></li>
                <li><img src="<?php echo base_url() . "assets/" ?>images/top.png"></li>-->

          </ul>
      </div>
      <div class="oneshop_myFindProductDetailSection">
          <p class="store_name"><?php echo $similar_products_info["name"]; ?></p>
  <!--                	<h3><?php echo $similar_products_info["name"]; ?></h3>-->
          <h2><?php echo $similar_products_info["sell_price"]; ?></h2>
          <h4><?php echo $similar_products_info["Category_name"]; ?></h4>
           <span class="oneshop_ratingSection">
                        <h4>Rating :</h4>
                        <div class="oneshop_rating">
                        	<img src="<?php echo base_url(). "assets/"; ?>images/Favorite.png">
                            <img src="<?php echo base_url(). "assets/"; ?>images/Favorite.png">
                            <img src="<?php echo base_url(). "assets/"; ?>images/Favorite.png">
                            <img src="<?php echo base_url(). "assets/"; ?>images/Favorite-Half.png">
                            <img src="<?php echo base_url(). "assets/"; ?>images/Favorite-Full.png">
                        </div>
                        <h3>3.5</h3>
                    </span>
          
          <!--<span class="oneshop_ratingSection">
              <h4>Rating :</h4>-->
        <!-- <div class="oneshop_rating"></div>-->
        <?php $rating=number_format($similar_products_info["rank_weitage"]/$similar_products_info["review_count"],1); ?> 
        <!--<div data-id="6" data-average="4.3" class="exemple6" style="height: 20px; float:left;width: 115px; overflow: hidden; z-index: 1; position: relative; cursor: default;">
                  <div class="os_productRatingColor" style="width: <?php echo $rating*20;?>%;"></div>
                  <div class="os_productRatingAverage" style="width: 0px; top: -20px;"></div>
                  <div class="os_productStar" style="height: 20px; top: -40px; background: url(&quot;<?php echo base_url();?>assets/images/stars.png&quot;) repeat-x scroll 0% 0% transparent; width: 115px;"></div>
              </div>-->

              <!--<h3><?php echo $rating; ?> </h3>
          </span>-->
          <button class="oneshop_basicInfoBtn oneshop_productViewBtn product_view" id="<?php echo base64_encode(base64_encode($similar_products_info["product_aid"]));
            ; ?>">View</button>
<!--          <button class="oneshop_basicInfoBtn oneshop_productBuyBtn">Buy</button>
          <img src="<?php echo base_url() . "assets/" ?>images/cart.png" class="oneshop_cartIcon">-->
      </div>
  </div>

  <?php }
?>
