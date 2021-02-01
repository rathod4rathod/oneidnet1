<div u="slides" class="oneshop_corouselSlides" style="cursor: move; position: absolute; left: 0px; top: 0px; width: 809px; height: 150px; overflow: hidden;">
    <?php
    foreach ($promoted_stores as $recomended_stores_info) {
      ?>
      <div class="oneshop_corouselSlide">
          <img src="<?php echo STORE_PATH . $recomended_stores_info[0]["store_id"] . "/logo/li/" . $recomended_stores_info[0]["logo_path"]; ?>" class="oneshop_lpscItemPic">
          <span class="oneshop_lpcsItemDetails" id="promote_store_view<?php echo $recomended_stores_info[0]["store_aid"]; ?>"><h4><?php echo $recomended_stores_info[0]["campaign_name"]; ?></h4></span></div>
      <script>
        $("#promote_store_view<?php echo $recomended_stores_info[0]["store_aid"]; ?>").click(function () {
            location.replace(oneshop_url+ "/home/mystore_profile_page/<?php echo $recomended_stores_info[0]["store_id"]; ?>");
        });
      </script>

      <?php
    }
    ?>
</div>