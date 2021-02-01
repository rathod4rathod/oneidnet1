
<?php
// echo "<pre>";echo STORE_PATH; print_R($international_brand);die();
?>

<div u="slides" class="oneshop_corouselSlides" style="cursor: move; position: absolute; left: 0px; top: 0px; width: 809px; height: 150px; overflow: hidden;">
      
    <?php foreach($international_brand as $international_brands) {
      $product_img=current(explode(",",$international_brands["image_path"]));
     
      
      ?>
        <div class="oneshop_corouselSlide">
        <img src="<?php echo STORE_PATH.$international_brands["store_id"]."/products/mi/".$product_img;?>" class="oneshop_lpscItemPic" title="<?php echo ucfirst($international_brands["brand_name"]); ?>">
          <span class="oneshop_lpcsItemDetails" id="os_int_brand<?php echo $international_brands["product_aid"];?>">
			<h4>
			<?php 
					$international_brands_name = ucfirst($international_brands["brand_name"]);
					if(strlen($international_brands_name) <=20) 
						echo $international_brands_name;
					else 
						echo substr($international_brands_name,0,20).'...';
			?>
			<?php //echo $international_brands["brand_name"];?>
			</h4>
		  </span></div>
          <script>
            $("#os_int_brand<?php echo $international_brands["product_aid"];?>").click(function(){
              location.replace(oneshop_url+"/home/intbrnads?brnd_name=<?php echo base64_encode(base64_encode(base64_encode( $international_brands["brand_name"])));?>");
            });
          </script>
        <?php
    }?>
    
</div>

<!--<div u="slides" class="oneshop_corouselSlides" style="cursor: move; position: absolute; left: 0px; top: 0px; width: 809px; height: 150px; overflow: hidden;">
      <div class="oneshop_corouselSlide">
        <img src="<?php echo base_url()."assets/";?>images/ancient-lady/005.jpg" class="oneshop_lpscItemPic">
          <span class="oneshop_lpcsItemDetails"><h4>Brand Name 1</h4></span></div>
          
      <div class="oneshop_corouselSlide">
        <img src="<?php echo base_url()."assets/";?>images/ancient-lady/006.jpg" class="oneshop_lpscItemPic">
          <span class="oneshop_lpcsItemDetails"><h4>Brand Name 2</h4></span></div>
          
      <div class="oneshop_corouselSlide">
        <img src="<?php echo base_url()."assets/";?>images/ancient-lady/013.jpg" class="oneshop_lpscItemPic">
          <span class="oneshop_lpcsItemDetails"><h4>Brand Name 3</h4></span></div>
          
      <div class="oneshop_corouselSlide">
        <img src="<?php echo base_url()."assets/";?>images/ancient-lady/011.jpg" class="oneshop_lpscItemPic">
          <span class="oneshop_lpcsItemDetails"><h4>Brand Name 4</h4></span></div>
          
      <div class="oneshop_corouselSlide">
        <img src="<?php echo base_url()."assets/";?>images/ancient-lady/014.jpg" class="oneshop_lpscItemPic">
          <span class="oneshop_lpcsItemDetails"><h4>Brand Name 5</h4></span></div>
          
      <div class="oneshop_corouselSlide">
        <img src="<?php echo base_url()."assets/";?>images/ancient-lady/019.jpg" class="oneshop_lpscItemPic">
          <span class="oneshop_lpcsItemDetails"><h4>Brand Name 6</h4></span></div>
          
      <div class="oneshop_corouselSlide">
        <img src="<?php echo base_url()."assets/";?>images/ancient-lady/020.jpg" class="oneshop_lpscItemPic">
          <span class="oneshop_lpcsItemDetails"><h4>Brand Name 7</h4></span></div>
          
      <div class="oneshop_corouselSlide">
        <img src="<?php echo base_url()."assets/";?>images/ancient-lady/021.jpg" class="oneshop_lpscItemPic">
          <span class="oneshop_lpcsItemDetails"><h4>Brand Name 8</h4></span></div>                                
          
  </div>-->