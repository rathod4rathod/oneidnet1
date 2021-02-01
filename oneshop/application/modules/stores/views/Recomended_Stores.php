<?php // print_R($recomended_stores); die(); ?>
<div u="slides" class="oneshop_corouselSlides" style="cursor: move; position: absolute; left: 0px; top: 0px; width: 809px; height: 150px; overflow: hidden;">

    <?php
    foreach ($recomended_stores as $recomended_stores_info) {
      ?>
      <div class="oneshop_corouselSlide">
         <a href="<?php echo base_url().'home/mystore_profile_page/'.$recomended_stores_info['store_code']; ?>"> <img src="<?php echo STORE_PATH . $recomended_stores_info["store_code"] . "/logo/li/" . $recomended_stores_info["profile_image_path"]; ?>" class="oneshop_lpscItemPic" title="<?php echo ucfirst($recomended_stores_info["store_name"]); ?>"></a>
          <span class="oneshop_lpcsItemDetails" id="store_view<?php echo $recomended_stores_info["store_aid"]; ?>">
			<h4><a href="<?php echo base_url().'home/mystore_profile_page/'.$recomended_stores_info['store_code']; ?>"> 
				<?php 
					$recomended_store_name = ucfirst($recomended_stores_info["name"]);
					if(strlen($recomended_store_name) <=20) 
						echo $recomended_store_name;
					else 
						echo substr($recomended_store_name,0,20).'...';
				?>
			</h4></a>
		  </span></div>
      <script>
      /*  $("#store_view<?php echo $recomended_stores_info["store_aid"]; ?>").click(function () {
alert("dvdvbdsb");
            location.replace("http://" + window.location.hostname + "/oneshop/home/mystore_profile_page/<?php echo $recomended_stores_info["store_id"]; ?>");
        });*/
      </script>

      <?php
    }
    ?>
</div>