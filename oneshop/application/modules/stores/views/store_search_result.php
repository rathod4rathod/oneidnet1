<?php
if($store!=0){
foreach ($store as $rows) {
    $store_url = base_url() . "store_home/" . $rows["store_code"];
    $store_nam = $rows["store_name"];
    if (strlen($rows["store_name"]) > 12) {
        $store_name = substr($rows["store_name"], 0, 12) . "..";
    } else {
        $store_name = $rows["store_name"];
    }
    $store_logo=base_url().'assets/images/default_store_100.png';
    if($rows["profile_image_path"]!="" && file_exists(STORE_WEB_ROOT.$rows['store_code']."/logo/li/".$rows["profile_image_path"])!==false){
        $store_logo=base_url()."stores/".$rows['store_code']."/logo/li/".$rows["profile_image_path"];
    }    
    //$store_url = base_url() . "home/mystore_profile_page/" . $rows['store_code'];
    ?>
    <div class="oneshop_myFindStoreItem" style="max-height:176px">
        <a href="<?php echo $store_url; ?>" title="<?php echo $store_nam; ?>">
            <div class="oneshop_myFindStoreImageSection">
                <img src="<?php echo $store_logo?>">
            </div>
        </a>
        <div class="oneshop_myFindStoreDetailSection">
            <h3 title="<?php echo ucfirst($store_nam); ?>" style="width:100%;"><a href="<?php echo $store_url ?>"><?php echo ucfirst($store_name); ?></a></h3>
            <span class="oneshop_ratingSection">
                <!--  <h4>Views :</h4>
                                <div class="oneshop_rating"></div>
                <h3><?php // echo $rows["reported_count"]; ?></h3>-->
            </span>                
        </div>
    </div>
    
<?php } }else{ echo"0"; }?>
