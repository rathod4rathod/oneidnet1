<div>
    <?php
    foreach ($storedta as $rows) {
        $store_name=  substr($rows["store_name"], 0, 15);
        //print_r($rows);
        $store_url = base_url() . "home/mystore_profile_page/" . $rows['store_id'];
        ?>
        <div class="oneshop_myFindStoreItem">
            <a href="<?php echo $store_url; ?>">   <div class="oneshop_myFindStoreImageSection">
                    <img src="<?php echo base_url() . 'stores/' . $rows["store_code"] . "/logo/li/" . $rows["profile_image_path"]; ?>">
                </div>
            </a>
            <div class="oneshop_myFindStoreDetailSection">
                <h3><?php echo $store_name; ?></h3>
                <span class="oneshop_ratingSection">
                    <h4>Views :</h4>
                    <!--                  <div class="oneshop_rating"></div>-->
                    <h3><?php echo $rows["reported_count"]; ?></h3>
                </span>
                
            </div>
        </div>
    <?php } ?>
</div>

