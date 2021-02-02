<?php require('application/libraries/oneshopconfig.php'); ?>
<div id="products_search_result">
<?php 
foreach($products_data as $rows){  
  $img=explode(",", $rows["product_images"]) ; 
  $s_len=strlen($rows["product_name"]);
  //echo $s_len;
  $product_name=$rows["product_name"];
  if($s_len>12){    
    $prod_name=substr($product_name,0,12)."..";
  }else{
    $prod_name=$product_name;
  }  
  $store_url = base_url() . "home/mystore_profile_page/" . $rows['store_id'];
  
?>
    
<div class="oneshop_myFindProductItem">
    <div class="oneshop_findProductStoreDetails">
        <a href="<?php echo $store_url; ?> "> <img src="<?php echo STORE_PATH.$rows["store_unique_id"]."/logo/mi/".$rows["store_log"]; ?>"></a>
        <a href="<?php echo $store_url; ?> "> <h3><?php echo $rows["store_name"];?></h3></a>
    </div>            
    <div class="oneshop_myFindProductImageSection">
        <img src="<?php echo STORE_PATH.$rows["store_unique_id"]."/products/mi/".$img[0]; ?>" id="mainimg<?php echo $rows["product_aid"]; ?>">
    </div>
    <div class="oneshop_myFindProductImageViews">
        <ul>
             <?php for($i=0;$i<count($img);$i++){
            ?>
             <li><img src="<?php echo STORE_PATH.$rows["store_unique_id"]."/products/si/".$img[$i]; ?>" id="<?php echo $rows["product_aid"]; ?>"></li>
              <?php
          }?>
           
        </ul>
    </div>
    <div class="oneshop_myFindProductDetailSection">
        <h3><?php echo $prod_name;?></h3>
        <h2><?php echo $rows["price"]?></h2>
        <h4>Category</h4>
        
        
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
            <?php $rating=number_format($rows["rank_weitage"]/$rows["review_count"],1); ?>
             <!-- <div data-id="6" data-average="4.3" class="exemple6" style="height: 20px; float:left;width: 115px; overflow: hidden; z-index: 1; position: relative; cursor: default;">
                  <div class="os_productRatingColor" style="width: <?php echo $rating*20;?>%;"></div>
                  <div class="os_productRatingAverage" style="width: 0px; top: -20px;"></div>
                  <div class="os_productStar" style="height: 20px; top: -40px; background: url(&quot;<?php echo base_url();?>assets/images/stars.png&quot;) repeat-x scroll 0% 0% transparent; width: 115px;"></div>
              </div>
            <h3><?php echo $rating; ?></h3>
        </span>-->
        <a href="<?php echo base_url() . "home/product_detail_view?product_id=".base64_encode(base64_encode($rows["product_aid"])); ?>">  <button class="oneshop_basicInfoBtn oneshop_productViewBtn">View</button></a>
<!--        <a href="<?php echo base_url() . "shipping_address"; ?>"> <button class="oneshop_basicInfoBtn oneshop_productBuyBtn">Buy</button></a>
        <img src="<?php echo base_url() . "assets/"; ?>images/cart.png" class="oneshop_cartIcon">-->
    </div>
</div>
<?php
}
?>
</div>