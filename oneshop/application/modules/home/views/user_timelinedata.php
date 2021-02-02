<?php
if($timelinedata!=0){
foreach($timelinedata as $data){
  $producturl=base_url().'product_detail_view/'.$data['store_code'].'/'.$data['product_code'];
  $store_url=base_url().'store_home/'.$data['store_code'];
  $title=ucwords($data["product_name"])." posted by ".  ucwords($data['store_name']);
  $label="<a href='".$producturl."'>".ucwords(substr($data["product_name"],0,15))."</a> posted by <a href='".$store_url."'>".  ucwords(substr($data['store_name'], 0, 12))."</a>";
  ?>
    <div class="oneshop_products_storebox">
    <div class="oneshop_products_storeboxtop_div">
     <input class="oneshop_setting_icon2" type="button">
     <p class="acenter mat30"><a href="<?php  echo $producturl ?>">
<?php if($data['primary_image']!='' && file_exists('stores/'. $data['store_code'].'/products/'.$data['product_aid'].'/mi/'.$data['primary_image'])){?>
        <img src="<?php echo base_url().'stores/'. $data['store_code'].'/products/'.$data['product_aid'].'/mi/'.$data['primary_image']; ?>" class="pro_img_one" title="<?php echo $title?>">
<?php }else{ ?>
<img src="<?php echo base_url().'assets/images/default_product_60.png'?>" title="<?php echo $title?>"/>
<?php } ?>
</a></p>
    </div>
      <div class="oneshop_products_storebox_bottomdiv">
          <?php echo $label?>
      </div>
    </div>
<?php } }
else{
    echo "There is no updates from any store(s)";
}
?>
