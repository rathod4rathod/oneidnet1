<?php require('application/libraries/oneshopconfig.php'); ?>
<?php
// echo"<pre>"; print_R($category_products);  echo"</pre>"; ?>
<?php foreach($category_products as $category_products_info){
  ?>
<?php  $img=explode(",", $category_products_info["image_path"]) ; ?>
    <div class="oneshop_myFindProductItem">
            <div class="oneshop_findProductStoreDetails">
            	<img src="<?php echo STORE_PATH.$category_products_info["store_unique_id"]."/logo/si/".$category_products_info["store_logo_path"];?>">
              <p class="store_name"><?php echo $category_products_info["store_name"]; ?></p>
            </div>
            	<div class="oneshop_myFindProductImageSection">
                	<img src="<?php echo STORE_PATH.$category_products_info["store_unique_id"]."/products/mi/".$img[0];?>" id="mainimg<?php echo $category_products_info["product_aid"];?>" >
                </div>
                <div class="oneshop_myFindProductImageViews">
                	<ul>
                      <?php for($a=0;$a<count($img);$a++)
                      {
                        ?>
                      <li><img src="<?php echo STORE_PATH.$category_products_info["store_unique_id"]."/products/si/".$img[$a];?>" id="<?php echo $category_products_info["product_aid"];?>"></li>
                          <?php
                      }?>

                  </ul>
                </div>
                <div class="oneshop_myFindProductDetailSection">
                	<p class="store_name"><?php echo $category_products_info["product_name"];?></p>
                    <h2>$<?php echo $category_products_info["sell_price"];?></h2>
                    <h4><?php echo $category_products_info["category_name"];?></h4>


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
                        <?php  $rating=number_format($category_products_info["rank_weitage"]/$category_products_info["review_count"],1); ?>
<!--                        <div class="oneshop_rating"></div>-->
<!--<div data-id="6" data-average="4.3" class="exemple6" style="height: 20px; float:left;width: 115px; overflow: hidden; z-index: 1; position: relative; cursor: default;">
                  <div class="os_productRatingColor" style="width: <?php echo $rating*20;?>%;"></div>
                  <div class="os_productRatingAverage" style="width: 0px; top: -20px;"></div>
                  <div class="os_productStar" style="height: 20px; top: -40px; background: url(&quot;<?php echo base_url();?>assets/images/stars.png&quot;) repeat-x scroll 0% 0% transparent; width: 115px;"></div>
              </div>
                        <h3> <?php echo $rating;?> </h3>
                    </span>-->
                    <a href="<?php echo base_url()."product_detail_view";?>">  <button class="oneshop_basicInfoBtn oneshop_productViewBtn product_view" id="<?php echo base64_encode(base64_encode($category_products_info["product_aid"]));?>">View</button></a>

                 <!-- <a href="<?php echo base_url()."shipping_address";?>"> <button class="oneshop_basicInfoBtn oneshop_productBuyBtn">Buy</button></a>
                    <img src="<?php echo base_url()."assets/";?>images/cart.png" class="oneshop_cartIcon">-->

                </div>
            </div>
    <?php
} ?>



