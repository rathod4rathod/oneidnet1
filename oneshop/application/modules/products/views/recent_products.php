<?php require('application/libraries/oneshopconfig.php');
$this->load->module('stores');
$i=0;
if(is_array($products_data)) {
	foreach($products_data as $rows){
	  $currency = $this->stores->getCurrency($rows["store_code"]); 
	  $img=$rows["primary_image"];
		  if($rows["product_name"]!="") {
		  $s_len=strlen($rows["product_name"]);
		  //echo $s_len;
		  $product_name=$rows["product_name"];
		  if($s_len>12){    
			$prod_name=substr($product_name,0,12)."..";
		  }else{
			$prod_name=$product_name;
		  }
//		  $store_code = $this->load->module("home")->getStorecode($rows['store_id']);
//		  $store_code=$store_code[0]["store_code"];
		  $store_url = base_url() . "home/mystore_profile_page/" . $rows['store_id'];
		  $product_url=  base_url()."product_detail_view/".$rows["store_code"]."/".$rows["product_code"];
          $product_img_path=$_SERVER["DOCUMENT_ROOT"]."/oneshop/stores/".$rows["store_code"]."/products/".$rows["product_aid"]."/mi/".$img;
          $product_img_url=base_url()."assets/images/default_product_60.png";
          if(file_exists($product_img_path)!=false && $img!=""){
            $product_img_url=base_url()."stores/".$rows["store_code"]."/products/".$rows["product_aid"]."/mi/".$img;
          }
		?>
		<div class="oneshop_homepage_products_container">
			<div class="oneshop_home_products">
				<a href="<?php echo $product_url;?>"><img src="<?php echo $product_img_url; ?>"></a>
			</div>
			<div class="oneshop_home_products_ratebg_box">
				<p class="bold fs14 acenter red"><?php echo $currency." ".$rows["price"]; ?></p>
				<p class="acenter"><a href="<?php echo $product_url;?>"><?php echo $product_name ?></a></p>
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
