<?php require('application/libraries/oneshopconfig.php'); ?>
<div id="fstores_search_result">
<?php
//var_dump($stores_data);
foreach($stores_data as $list){
  $store_name=$list["store_name"];
  if($store_name!=""){
    $store_url=base_url()."home/mystore_profile_page/".$list["store_aid"];
?>
<div class="oneshop_myFrienddStoreItem">
  <div class="oneshop_friendStoreFriendDetails">
    <img src="<?php echo STORE_PATH.$list["store_aid"]."/logo/mi/".$list["store_logo_path"];?>">
      <h3><?php echo $list["store_name"]?></h3>
  </div>
    <div class="oneshop_myFriendStoreImageSection">
        <img src="<?php echo STORE_PATH.$list["store_aid"]."/cover/mi/".$list["store_cover_path"];?>">
      </div>
      <div class="oneshop_myFriendStoreDetailSection">
        <h3><?php echo $store_name;?></h3>
          <span class="oneshop_ratingSection">
              <h4>Views :</h4>
              <!--<div class="oneshop_rating"></div>-->
              <h3><?php echo $list["reported_count"]; ?></h3>
          </span>
        <a href="<?php echo $store_url;?>"> <button class="oneshop_basicInfoBtn oneshop_storeViewBtn">View</button></a>
      </div>
  </div>
<?php
  }
}
?>
</div>
