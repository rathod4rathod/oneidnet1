<?php
$this->load->module('stores');
?>

<div class="hd_heading"><h2>Product Suggestions   <span></span> </h2></div>

<div class="clearfix"></div>
<div class="featured_product_product_mainwrap">
<?php require('application/libraries/oneshopconfig.php');
$i=0; 
if(is_array($products_data)) {
	foreach($products_data as $rows){
	  $currency = $this->stores->getCurrency($rows["store_code"]); 
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


                <div class="oneshop_products_storebox">
                    <div class="oneshop_products_storeboxtop_div" id="product_div<?php echo $rows['product_aid']?>"> 
                        <?php
                        if($mode!="home"){
                            if($cart_cnt==0){
                        ?>
                        <span class="oneshop_setting_icon"><a href="javascript:additemtocart('<?php echo $rows["product_aid"];?>','<?php echo $store_code;?>')"><img src="<?php echo base_url() . "assets/" ?>images/products/setting2.png"></a></span>
                        <?php
                            }else{
                        ?>
                            <span class="oneshop_setting_icon"><a href="javascript:removeitemfromcart('<?php echo $rows["product_aid"];?>','<?php echo $store_code;?>')"><img src="<?php echo base_url() . "assets/" ?>images/cat/setting2_hover.png"></a></span>
                            <?php
                            }
                        }                        
                        $product_img_path="stores/".$store_code."/products/".$rows["product_aid"]."/mi/".$img;
                        //echo file_exists($product_img_path);
                        if(file_exists($product_img_path)&&$img!=""){
                            $product_img_url=STORE_PATH."".$store_code."/products/".$rows["product_aid"]."/mi/".$img;
                        }else{
                            $product_img_url=base_url().'assets/images/default_product_60.png';
                        }
                            ?>
                            <p class="acenter mat20">
                                <a href="<?php echo $product_url;?>">
                                    <img src="<?php echo $product_img_url; ?>" class="pro_img_one" title="<?php echo $product_name?>">
                                </a>
                            </p>
                    </div>
                    <div class="oneshop_products_storebox_bottomdiv">
                        <a href="<?php echo $product_url;?>" title="<?php echo $product_name?>"><?php echo ucfirst($prod_name) ?></a>
                    </div>
                </div>
            
		<?php
		}
			$i++;
	} 
} else {
	?>
    </div>
	<div class="cvdes_rightbar_headingsbg_wrap mat20">
		<div style="width:200px; margin:0 auto; overflow:hidden;"><span class="fll mat3"> <img src="<?php echo base_url().'assets/images/nodata.png'?>" alt="nodata"> </span><span class="fll mat3 mal10 bold gray"> No Product Data Found </span></div>
	</div>
<?php
}
?>

