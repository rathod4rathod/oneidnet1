<?php
if ($userstores != 0) {
  foreach ($userstores as $store) {
    $store_url = base_url() . "store_home/" . $store["store_code"];
    if ($store['profile_image_path'] != '') {

      $store_img_url = base_url() . 'stores/' . $store['store_code'] . '/logo/mi/' . $store['profile_image_path'];
      ?>
      <li class="mar5" style="float:left; width: 150px; border: 1px #ccc solid; margin: 0;" title='<?php echo $store["store_name"] ?>'> <p class="fll" style="margin: 0 0 5px 0;"><img src="<?php echo $store_img_url ?>" style="width:150px; height: 120px;"><p class="fll" style="width:140px; margin: 0 0 5px 0; padding: 0 5px 0 5px"><a href="<?php echo $store_url ?>"><?php echo ucfirst($store["store_name"]) ?></a></p></li>
      <?php
    } else {
      $store_img_url = base_url() . 'assets/images/default_store_100.png';
      ?>
      <li class="mar5" style="float:left; width: 150px; border: 1px #ccc solid; margin: 0;" title='<?php echo ucfirst($store["store_name"]); ?>'><p class="fll" style="margin: 0 0 5px 0;"><img src="<?php echo $store_img_url ?>" style="width:150px; height: 120px;"><p class="fll" style="width:140px; margin: 0 0 5px 0; padding: 0 5px 0 5px"><a href="<?php echo $store_url ?>"><?php echo ucfirst($store["store_name"]) ?></a></p></li>
    <?php } ?>
  <?php
  }
} else {
  ?>

  <div class="osdes_rightbar_headingsbg_wrap mat20"   >
      <div class="nodata_found_bgwrap">
          <p>  No  Stores </p>
      </div>
  </div>
<?php }
?>