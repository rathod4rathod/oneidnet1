<div class="fll wi100pstg">
<?php
$this->load->module('stores');
?>
<?php
// $similar_products=0;
if($similar_products!=0){
foreach($similar_products as $prodslist){
  $currency=$prodslist["currency"];
  if($prodslist["prod_img"]!="" && file_exists('stores/'.$prodslist["store_code"]."/products/".$prodslist["product_aid"]."/mi/".$prodslist["prod_img"])){
      $product_img_url=base_url().'stores/'.$prodslist["store_code"]."/products/".$prodslist["product_aid"]."/mi/".$prodslist["prod_img"];
  }
  else
  {
    $product_img_url=base_url()."assets/images/default_product_60.png";
  }
  $product_url=base_url().'product_detail_view/'.$prodslist["store_code"].'/'.$prodslist["product_code"]; // bug fixing on 30-03-2016
  $product_review_url=base_url().'product_reviews?product_id='.base64_encode(base64_encode($prodslist["product_aid"]));
?>

<div class="oneshop_pro_total_wrapper_div sm_products mat10">
    <div class="oneshop_proimagebox">
    	<span class="img_middile">
        	<img src="<?php echo $product_img_url?>"> 
        </span>
    </div>
    <div class="oneshop_product_ratebg_box">
        <p><a href="<?php echo $product_url;?>"><?php echo ucfirst($prodslist["product_name"]);?></a></p>
        <?php
          if($prodslist["sale_price"] != 0){
            echo '<p class="bold fs14">'.$currency.' '.number_format($prodslist["sale_price"],2).'</p>';
          }
          else
          {
          echo '<p class="bold fs14">'.$currency.' '.number_format($prodslist["cost_price"],2).'</p>';
          }
        ?>
        <!-- <p class="bold fs14"><?php echo $currency." ".number_format($prodslist["sale_price"],2);?></p> -->
        <p><a href="<?php echo $product_review_url;?>">See Product Reviews</a></p>
    </div>
</div>
<?php
}}else{
echo "<div class='no_data'>EMPTY</div>"; }
?>
</div>