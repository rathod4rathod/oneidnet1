<?php require('application/libraries/oneshopconfig.php'); ?>
<div id="store_search_result">
    <?php // echo "<pre>";  print_R($stores_data); echo "</pre>";?>
    <?php
//var_dump($stores_data);
    foreach ($stores_data as $rows) {
      $prod_url = base_url() . "home/mystore_profile_page/" . $rows['store_id'];
      ?>
      <div class="oneshop_myFindStoreItem">
          <div class="oneshop_myFindStoreImageSection">
              <img src="<?php echo STORE_PATH . $rows["store_id"] . "/logo/li/" . $rows["logo_path"]; ?>">
          </div>
          <div class="oneshop_myFindStoreDetailSection">
              <h3><?php echo $rows["name"]; ?></h3>
              <span class="oneshop_ratingSection">
                  <h4>Views :</h4>
<!--                  <div class="oneshop_rating"></div>-->
                  <h3><?php echo $rows["visit_count"]; ?></h3>
              </span>
              <a href="<?php echo $prod_url; ?>">     <button class="oneshop_basicInfoBtn oneshop_storeViewBtn">View</button></a>
          </div>
      </div>
      <?php
    }
    ?>
</div>
