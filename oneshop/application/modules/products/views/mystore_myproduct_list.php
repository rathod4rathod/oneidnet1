<?php require('application/libraries/oneshopconfig.php'); ?>
<?php //echo "<pre>"; print_R($results_products); echo"</pre>"; ?>
<?php
foreach($results_products as $results_products_info)
{
// echo  $results_products_info["product_aid"];// echo  $results_products_info["name"];// echo  $results_products_info["store_id"];// echo  $results_products_info["image_path"];// echo  $results_products_info["sell_price"];// echo  $results_products_info["category"];// echo  $results_products_info["category_name"];
 ?>
<?php  $img=explode(",", $results_products_info["image_path"]) ; ?>
<div class="oneshop_myFindProductItem">
    <div class="oneshop_myFindProductImageSection">
        <img src="<?php echo STORE_PATH.$store_uid."/products/mi/".$img[0]; ?>" id="mainimg<?php echo $results_products_info["product_aid"]; ?>" >
      </div>
      <div class="oneshop_myFindProductImageViews">
        <ul>
          <?php for($i=0;$i<count($img);$i++){
            ?>
             <li><img src="<?php echo STORE_PATH.$store_uid."/products/si/".$img[$i]; ?>" id="<?php echo $results_products_info["product_aid"]; ?>"></li>
              <?php
          }?>
          </ul>
     </div>
      <div class="oneshop_myFindProductDetailSection">
        <p class="store_name"><?php echo $results_products_info["name"]; ?></p>
          <h2><?php echo $results_products_info["sell_price"]; ?></h2>
          <h4><?php echo $results_products_info["catname"]; ?></h4>
          <span class="oneshop_ratingSection">
              <h4>Rating :</h4>
              <!--<div class="oneshop_rating"></div>-->
              <?php $rating= number_format($results_products_info["rank_weitage"]/$results_products_info["review_count"],1); ?>
              <div data-id="6" data-average="4.3" class="exemple6" style="height: 20px; float:left;width: 115px; overflow: hidden; z-index: 1; position: relative; cursor: default;">
                  <div class="os_productRatingColor" style="width: <?php echo $rating*20;?>%;"></div>
                  <div class="os_productRatingAverage" style="width: 0px; top: -20px;"></div>
                  <div class="os_productStar" style="height: 20px; top: -40px; background: url(&quot;<?php echo base_url();?>assets/images/stars.png&quot;) repeat-x scroll 0% 0% transparent; width: 115px;"></div>
              </div>
              <h3><?php echo $rating; ?></h3>
          </span>
<!--          <button class="oneshop_basicInfoBtn oneshop_productViewBtn">Edit</button>-->
          <a href="#"> <button class="oneshop_basicInfoBtn oneshop_productBuyBtn product_view" id="<?php echo base64_encode(base64_encode($results_products_info["product_aid"]));?>">View</button></a>
<!--          <img src="<?php echo base_url()."assets/"?>images/trash.png" class="oneshop_cartIcon">-->
      </div>
  </div>

<?php
}
?>


