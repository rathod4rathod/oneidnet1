<?php require('application/libraries/oneshopconfig.php');
$i=0;
// $store_code=$this->uri->segment(2);
if(is_array($products_data)) {
	?>


	<?php
	foreach($products_data as $rows){
		
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
			$prod_qry = "SELECT product_code FROM oshop_products WHERE product_aid = '".$rows['product_aid']."'";
			$prod_res = $this->db_api->custom($prod_qry);
			$product_code = $prod_res[0]["product_code"];
			$store_url = base_url() . "home/mystore_profile_page/" . $rows['store_id'];
			$product_url=  base_url()."product_detail_view/".$store_code."/".$product_code;
			$product_edit_url=  base_url()."product_updating/".$store_code."/".$product_code;
//Edited By Mitesh => delete module added here;
		  $product_delete_url=  base_url()."home/product_delete/".$store_code."/".$product_code;
		  
		?>

		<div class="myproductList oneshop_products_storebox">
			<div class="oneshop_products_storeboxtop_div" id="<?php echo "product_div".$rows["product_aid"]?>">
			<?php
                if($store_owner=="yes"){
            ?>
			<div class="action-wrap" style="bottom: -83px;">
				<a class="edit-icon" href="<?php echo  $product_edit_url ?>" >Edit</a>
				<a class="delelte-icon" href="<?php echo  $product_delete_url ?>" >Delete</a>
			</div>	
			<?php  } ?>
                            <?php
                            if($store_owner!="yes"){
                            ?>
				<span class="oneshop_setting_icon"><a href="javascript:additemtocart('<?php echo $rows["product_aid"];?>','<?php echo $store_code;?>')"><img src="<?php echo base_url() . "assets/" ?>images/products/setting2.png"></a></span>
                                <?php                            
                            }
                            //echo $store_code."/products/".$rows["product_aid"]."/mi/".$img."<br>";
                                ?>
							<?php
							if($img!=""){
								$img_url=base_url()."/mi/".$img;
								?>
<!--Edited By Mitesh => change class to mat0 for avoid over lapping -->
								 <p class="acenter mat0">
									 <a href="<?php echo $product_url;?>">
									 <img src="<?php echo STORE_PATH."".$store_code."/products/".$rows["product_aid"]."/mi/".$img; ?>" width="140" height='148'>
									</a>
								</p>
								<?php
							}else{
								?>
								<p class="acenter mat0"> <img src="<?php echo base_url().'assets/images/default_product_60.png'?>"> </p>
								<?php
							}
							?>			
			</div>
			<p class="mycat_name cagetory-name"><?=($rows["category_name"] != '')?$rows["category_name"]:'No Category'?></p>               
				<div class="oneshop_products_storebox_bottomdiv"><a href="<?php echo $product_url;?>" title="<?php echo ucfirst($product_name)?>"><?php echo ucfirst($prod_name) ?></a>
					<div class="mycat_name price-wrap">
						<p class="actual-price"><?php echo $currency.''.$rows["price"]; ?></p>
						<p class="off-price"><?php echo $currency.''.$rows["sale_price"]; ?></p>
					</div>
				</div>
				
		</div>
		<?php
		}
			$i++;
	}
} else {
	?>
	<div class="cvdes_rightbar_headingsbg_wrap mat20">
		<div style="width:200px; margin:0 auto; overflow:hidden;"><span class="fll mat3"> <img src="<?php echo base_url().'assets/images/nodata.png'?>" alt="nodata"> </span><span class="fll mat3 mal10 bold gray"> No Product Data Found </span></div>
	</div>
<?php
}
?>
<!-- <script type="text/javascript">
	
    $("#searchparam").keydown(function(e){
        var search_val=$(this).val();
        var store_code=$("#store").val();
        var category_id=$("#catid").val();
        var subcategory_id=$("#subcatid").val();
        var item_id=$("#itemid").val();

        if(e.keyCode==13){
            if(search_val.trim()!=""){
                $.ajax({
                    type:"post",
                    url: oneshop_url+"/products/products_search_result/"+category_id+"/"+subcategory_id+"/"+item_id+"/"+search_val+"/"+store_code,
                    success:function(data){
                    	// alert(data);
                        // $("#list_products").html(data);
                    }
                });           
            }
            else{
                alert("Please enter some text in the search field");
                return false;
            }
        }
    });	

</script> -->