
<div u="slides" class="oneshop_corouselSlides" style="cursor: move; position: absolute; left: 0px; top: 0px; width: 809px; height: 150px; overflow: hidden;">
    <?php foreach ($public_stores as $pstores_list) {
      $imgs_url=$pstores_list["product_image_str"];
      $imgs_arry=explode("/",$imgs_url);
      $prods_img_url=base_url().$imgs_arry[0]."/".$imgs_arry[1]."/li/".$imgs_arry[2];
      $page_url=base64_encode(base64_encode($pstores_list["product_aid"]));
      ?>
      <div class="oneshop_corouselSlide">
          <img src="<?php echo $prods_img_url; ?>" class="oneshop_lpscItemPic">
          <span class="oneshop_lpcsItemDetails" id="pproduct_aid<?php echo $pstores_list["product_aid"]; ?>"><h4><?php echo $pstores_list["product_name"]; ?></h4></span></div>
      <script>
        $("#pproduct_aid<?php echo $pstores_list["product_aid"]; ?>").click(function () {
            location.replace(oneshop_url+ "/home/product_Detail_View?product_id=<?php echo $page_url; ?>&mode=public");
        });
      </script>
      <?php }
    ?>
</div>