<?php 
function charlimit($string, $limit) {
    return substr($string, 0, $limit) . (strlen($string) > $limit ? "..." : '');
}
//require('application/libraries/oneshopconfig.php');
$i=0;
//print_r($products_data);
if($products_data!=0) {
	foreach($products_data as $rows){
	  $img=$rows["primary_image"];
          $cart_cnt=$rows["cart_cnt"];
		  if($rows["product_name"]!="") {
		  $s_len=strlen($rows["product_name"]);
		  //echo $s_len;
		  $product_name=$rows["product_name"];
		  if($s_len>12){    
			$prod_name=substr($product_name,0,12)."..";
		  }else{
			$prod_name=$product_name;
		  } 
                  $store_code=$rows['store_code'];
		  $store_url = base_url() . "home/mystore_profile_page/" . $rows['store_id'];
		  $product_url=  base_url()."product_detail_view/".$rows['store_code']."/".$rows["product_code"];
		?>
                <div class="oneshop_products_storebox" style="width: 25%">
                    <div class="oneshop_products_storeboxtop_div" id="product_div<?php echo $rows['product_aid']?>"> 
                        <?php
                            if($cart_cnt==0){
                        ?>
                            <span class="oneshop_setting_icon"><a href="javascript:additemtocart('<?php echo $rows["product_aid"];?>','<?php echo $store_code;?>')"><img src="<?php echo base_url() . "assets/" ?>images/products/setting2.png"></a></span>
                        <?php
                            }else{
                        ?>
                            <span class="oneshop_setting_icon"><a href="javascript:removeitemfromcart('<?php echo $rows["product_aid"];?>','<?php echo $store_code;?>')"><img src="<?php echo base_url() . "assets/" ?>images/cat/setting2_hover.png"></a></span>
                        <?php
                            }

                        $product_img_path=STORE_WEB_ROOT.$store_code."/products/".$rows["product_aid"]."/mi/".$img;
                        //echo file_exists($product_img_path);
                        if(file_exists($product_img_path)&&$img!=""){
                            $product_img_url=STORE_PATH."".$store_code."/products/".$rows["product_aid"]."/mi/".$img;
                        }else{
                            $product_img_url=base_url().'assets/images/default_product_60.png';
                        }                        
                            ?>
                            <p class="acenter mat20">
                                <a href="<?php echo $product_url;?>">
                                    <img src="<?php echo $product_img_url; ?>" width="140" height='148'>
                                </a>
                            </p>
                    </div>
                    <div class="oneshop_products_storebox_bottomdiv">
                        <a href="<?php echo $product_url;?>"><?php echo charlimit(ucfirst($product_name),20); ?></a>
                    </div>
                </div>
		<?php
		}
			$i++;
	} 
} else {
	?>
    
    <div class="notfound">
		<p><i class="fa fa-ban"></i> No Product Data Found</p>
	</div>
		
<?php
}
?>

