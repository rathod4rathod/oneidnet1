
<?php require('application/libraries/oneshopconfig.php'); 
//echo "count:".$products_cnt;
?>

<?php
//  var_dump($results_products);
//echo count($results_products);
if(!$results_products){
  //echo"No data Found";
}else{
foreach($results_products as $results_products_info)
{
//echo  $results_products_info["product_aid"];
//echo  $results_products_info["name"];
// echo  $results_products_info["store_id"];
//echo  $results_products_info["image_path"];
// echo  $results_products_info["sell_price"];
// echo  $results_products_info["category"];
// echo  $results_products_info["category_name"];
 ?>
<?php 
$img=explode(",", $results_products_info["image_path"]) ; ?>
<div id="<?php echo $results_products_info["product_aid"];?>" class="oneshop_myFindProductItem">
    <div class="oneshop_myFindProductImageSection">
        <img src="<?php echo STORE_PATH.$store_uid."/products/mi/".$img[0]; ?>" id="mainimg<?php echo $results_products_info["product_aid"]; ?>">
      </div>
      <div class="oneshop_myFindProductImageViews">
        <input type="hidden"  name="image_count_path" value="<?php echo count($img);?>">
        <ul>
          <?php  
         // echo count($img);
          for($i=0;$i<4;$i++){
            ?>
             <li><img id="<?php echo $results_products_info["product_aid"];?>" src="<?php echo STORE_PATH.$store_uid."/products/si/".$img[$i]; ?>"></li>
              <?php
          }?>
         
          
          </ul>
      </div>
      <div class="oneshop_myFindProductDetailSection">
        <p class="store_name" title="<?php echo $results_products_info["name"]; ?>"><?php echo $results_products_info["name"]; ?></p>
          <h2><?php echo $results_products_info["sell_price"]; ?></h2>
          <h4><?php echo $results_products_info["catname"]; ?></h4>
          <span class="oneshop_ratingSection">
              <h4>Rating :</h4>
              <div class="oneshop_rating"></div>
              <h3><?php echo $results_products_info["review_count"];?></h3>
          </span>
          <input type="hidden" id="product_id" value=" <?php echo $results_products_info["product_aid"];?>">
          <a href="<?php echo base_url()."home/product_edit?id=".base64_encode(base64_encode(base64_encode($results_products_info["product_aid"])));?>"><button class="oneshop_basicInfoBtn oneshop_productViewBtn">Edit</button></a>
      
          <input type="hidden" name="pid" value="<?php echo $results_products_info["product_aid"];?>">
      </div>
  </div> 
<input type="hidden" value="<?php echo $count_products[0]['cnt'];?>" id="load_product_count_more"> 
<input type="hidden" value="<?php echo $count_products_search[0]['cnt'];?>" id="search_count"> 

<?php

echo $count_products_search[0]['cnt'];
}
}
?>


