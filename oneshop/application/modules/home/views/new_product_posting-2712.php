<?php
$this->load->module('templates');
$this->templates->app_header();
$this->templates->os_mainmenu();
//for theme selected
$banner_path = base_url() . "assets/images/store_banners/";
$theme_selected = $this->load->module("stores")->getthemeselected($store_code);
if($theme_selected!=''){ 
     $sideimage =  base_url().'/assets/images/store_banners/'.$theme_selected.'.png';
     $midimage = base_url().'/assets/images/store_banners/mid'.$theme_selected.'.png'; 
 }else{ 
     $sideimage = base_url().'/assets/images/store_banners/1.png';
      $midimage = base_url().'/assets/images/store_banners/mid1.png'; 
     }
?>      
<!--Oneshop Content starts Here(Raviteja 19-05-2015)-->
<form id="add_product" method="post">
	<input type="hidden" value="<?php echo $store_code; ?>" id="store_code" name="store_code">
	<div class="oneshop_container_sectionnew">
            <div class="oneshop_banner_stip_newbox click_importantNotifications">

    <div class="oneshop_banner_left_box"  <?php echo "style= 'background-image: url($sideimage)'"; ?> >&nbsp;</div>
    <div class="oneshop_banner_stip_middle_content"  <?php echo "style= 'background-image: url($midimage)'"; ?> > 
        <?php $this->templates->os_oneshopheader("add-products"); ?>
    </div>
    <div class="oneshop_banner_right_box"  <?php echo "style= 'background-image: url($sideimage)'"; ?> >&nbsp;</div>
</div> 
<div class="clearfix"></div>
          	<div class="store_mainwrap"> 	
            
            <div class="hd_heading"><h2>Add Product <span></span> </h2></div>

            <div class="oneshop_container_middle_section mat15">

			<div class="oneshop_left_newcontainer mat15">
				<?php
				  if($warn_msg!=""){
				   echo "<h1 style='color:red;font-size:18px;'>$warn_msg</h1>";
				  }
				?>
					<div class="oneshop_fieldsbox">
						<label> Product Name  </label>
						<div class="wi100pstg">
							<input type="text" placeholder="Product Name" id="osdev_Product_Name" name="Product_Name" class="input">
						</div>
						<p class="wi100pstg fs11 red clearfix jsError" id="osdev_Product_NameError"> Please write your product name </p>
					</div>
					<div class="oneshop_fieldsbox">
						<label> Product Manufacturer Price  </label>
						<div class="wi100pstg">
							<input type="text" placeholder="Product Manufacturer Price" name="Product_Market_Price" id="osdev_Product_Market_Price" class="input">
						</div>
						<p class="wi100pstg fs11 red clearfix jsError" id="osdev_Product_Market_PriceError"> Enter Valid Product Manufacturer Price ( ex: 3.45 ) </p>
						<p class="wi100pstg fs11 red clearfix jsError" id="osdev_Product_Market_ValidPrice"> Enter Valid Product Manufacturer Price ( ex: 3.45 ) </p>
					</div>

					<div class="oneshop_fieldsbox">
						<label> Retail Price  </label>
						<div class="wi100pstg">
							<input type="text" placeholder="Retail Price" name="Cost_Price" id="osdev_CostPrice" class="input">
						</div>
						<p class="wi100pstg fs11 red clearfix jsError" id="osdev_CostPriceError"> Please Enter Retail Price </p>
						<p class="wi100pstg fs11 red clearfix jsError" id="osdev_validCostPriceError"> Please Enter Valid Retail Price </p>
					</div>
					<div class="oneshop_fieldsbox">
						<label> Sales Price  </label>
						<div class="wi100pstg">
							<input type="text" placeholder="Sales Price" name="Sell_Price" id="osdev_SellPrice" class="input" readonly>
						</div>
						<p class="wi100pstg fs11 red clearfix jsError" id="osdev_SellPriceError"> Please Enter Sales Price </p>
					</div>

					<div class="oneshop_fieldsbox">
						<label> Quantity  </label>
						<div class="wi100pstg">
							<input type="text" placeholder="Quantity" name="Quantity" value="2" id="osdev_Quantity" class="input">
						</div>
						<p class="wi100pstg fs11 red clearfix jsError" id="osdev_QuantityError"> Please Enter Quantity </p>
					</div>
                    <div class="oneshop_fieldsbox">
						<label> Discount  </label>
						<div class="wi100pstg discount">
							<input type="text" placeholder="Ex : 20" name="Discount" id="osdev_Discount" class="input" maxlength="2">
						</div>
						<p class="wi100pstg fs11 red clearfix jsError" id="osdev_DiscountError"> Please Enter Valid Discount </p>
					</div>
                    <div class="oneshop_fieldsbox">
						<label> Warranty  </label>
						<div class="wi100pstg">
							<input type="text" placeholder="1 year" name="Warranty" id="osdev_warrenty" class="input">
						</div>
						<p class="wi100pstg fs11 red clearfix jsError" id="osdev_warrentyError"> Please Enter Warranty Period </p>
					</div>
<!--					<div class="oneshop_fieldsbox">
						<label> Specifications  </div>
						<div class="wi100pstg"> <textarea class="subcategory_textarea" name="Specifications" id="osdev_Specifications" value=""></textarea></textarea>  </div>
					</div>-->
                      <div class="oneshop_fieldsbox">
						<label> Product Group </label>
						<div class="wi100pstg select">
							<select class="select" name="Group" id="osdev_Group">
								<option value="">Select Group</option>
								<option value="Electronics">Electronics</option>
								<option value="Men">Men</option>
								<option value="Women">Women</option>
								<option value="Kids">Kids</option>
								<option value="Books">Books</option>
								<option value="Furniture">Furniture</option>
								<option value="Sports">Sports</option>
								<option value="Movies">Movies</option>
								<option value="Jewelry">Jewelry</option>
								<option value="Toys">Toys</option>
								<option value="Fitness">Fitness</option>
								<option value="Food">Food</option>
								<option value="Households">Households</option>
								<option value="Pets">Pets</option>
								<option value="Gifts">Gifts</option>
								<option value="Automobiles">Automobiles</option>
								<option value="Rentals">Rentals</option>
								<option value="Building Materials">Building Materials</option>
								<option value="Tools">Tools</option>
								<option value="Security">Security</option>
								<option value="Heavy Machinery">Heavy Machineries</option>
								<option value="NetWorking">NetWorking</option>
								<option value="Software">Softwares</option>
								<option value="Decoration">Decoration</option>
								<option value='others'>Others</option>
							</select>
						</div>
					</div>
					<div class="oneshop_fieldsbox">
						<label> Product Category  </label>
						<div class="wi100pstg select">
							<select class="select" name="Category" id="osdev_Category">
								<option value="">--Select Category--</option>
								<option value='others'>Others</option>
							</select>
						</div>
						<p class="wi100pstg fs11 red clearfix jsError" id="osdev_CategoryError"> Please Enter Category Name  </p>
					</div>
					<div class="oneshop_fieldsbox">
						<label> Product Subcategory  </label>
						<div class="wi100pstg select">
							<select class="oneshop_selectbox_field" name="Sub_Category" id="osdev_SubCategory">
								<option value="">--Select Subcategory--</option>
								<option value='others'>Others</option>
							</select>
						</div>
						<p class="wi100pstg fs11 red clearfix jsError" id="osdev_SubCategoryError"> Please Enter Subcategory </p>
					</div>
                    <div  id="osdev_Brands">
                    
                    </div>
					<div class="oneshop_fieldsbox">
                                            <label> Description  </label>
                                            <div class="wi100pstg"> <textarea class="input" name="Description" id="osdev_Description"></textarea>  </div>
					</div>
                    <div style="display:none" id="product_add_loading"><img src="<?php echo base_url().'assets/images/ajax-loader.gif'?>"/></div>
					<div style="color:green;display:none" id="product_add_suc">Product Added Successfully! </div>
					<!--<button class="oneshop_basicInfoBtn">Proceed</button>-->
                    <div class="oneshop_fieldsbox">
						<div class="wi100pstg">
							 <input type="submit" name="button" class="np_des_addaccess_btn" id="prod_save_btn" value="Save">
					   <input type="button" name="button" class="np_des_addaccess_btn" id="prod_reset_btn" value="Reset">
						</div>
					</div>
			</div> 
			<div class="oneshop_right_newcontainer productimg_wrap">
				<div class="oneshop_product_images">
					<h5> Product Images </h5>
					<p class="wi100pstg fs11 red clearfix jsError" id="osdev_imageError"> Primary image is mandatory</p>
					<ul>
						<li>
							<div id="imagePreview1" class="imagePreview"><input id="uploadFile1" name="productImg[]" type="file" name="image1" class="img uploadFile" /></div>
						</li>
						<li>
							<div id="imagePreview2" class="imagePreview"><input id="uploadFile2" name="productImg[]" type="file" name="image2" class="img uploadFile" /></div>
						</li>
						<li>
							<div id="imagePreview3" class="imagePreview"><input id="uploadFile3" name="productImg[]" type="file" name="image3" class="img uploadFile" /></div>
						</li>
						<li>
							<div id="imagePreview4" class="imagePreview"><input id="uploadFile4" name="productImg[]" type="file" name="image4" class="img uploadFile" /></div>
						</li>
					</ul>
				</div>
			</div>

                </div>

			</div> 

	</div> 
</form>
<!--Oneshop Content ends Here(vinod 19-05-2015)-->
<?php
$this->templates->app_footer();
?>
