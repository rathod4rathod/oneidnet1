<?php //require('application/libraries/oneshopconfig.php');    ?>
<div class="featured_product_product_mainwrap">
<div >
    <?php // echo "<pre>";  print_R($stores_data); echo "</pre>";?>
    <?php
//var_dump($stores_data);
    if($store!=0){
    foreach ($store as $rows) {
        $store_url = base_url() . "store_home/" . $rows['store_code'];
        ?>
    
    
        <div class="oneshop_myFindStoreItem" id="store_unfollow<?php  echo $rows['store_aid']  ?>">
            <a href="<?php echo $store_url; ?>" title="<?php echo $rows["store_name"]; ?>">   <div class="oneshop_myFindStoreImageSection">
<?php if( $rows['profile_image_path']!='' && file_exists(STORE_WEB_ROOT.$rows['store_code'] . '/logo/li/' . $rows['profile_image_path'])!==false){?>
                    <img src="<?php echo STORE_PATH . $rows['store_code'] . '/logo/li/' . $rows['profile_image_path']; ?>">
               
<?php }else{ ?>
 <img src="<?php echo base_url().'assets/images/default_store_100.png' ?>">
               
<?php }?> </div>
            </a>
            <div class="oneshop_myFindStoreDetailSection">
                <a href="<?php echo $store_url; ?>" title="<?php echo $rows["store_name"]; ?>">  <h3 style="width: 100%"><?php 
                if(strlen($rows["store_name"])<=15){
                 echo $rows["store_name"];
                }else{
					echo substr($rows["store_name"],0,16).'..'; 
					}?></h3></a>
                <span class="oneshop_ratingSection">
                    <h4>Rating :</h4>
                    <!--                  <div class="oneshop_rating"></div>-->
                    <h3><?php echo round($rows["rating"],2).'/5'; ?></h3>
                </span>
                <a href="javascript:void(0);" onclick="store_unfollow(<?php  echo $rows['store_aid'] ?>)">     <button class="oneshop_basicInfoBtn oneshop_storeViewBtn">Unfollow</button></a>
            </div>
        </div>

    <?php }
    }
    else{
      echo "You are not following any stores yet.";
    }
    ?>
</div>
    </div>
<script>
function store_unfollow(storeid){
 $.ajax({
                url: oneshop_url + "/stores/store_unfollow/",
                type: "post",
                data: {store_id:storeid },
                success: function (data) {
					
                   if(data){
                    $("#store_unfollow"+storeid).css("display","none");
				 }
                },
                
            });

}
</script>
