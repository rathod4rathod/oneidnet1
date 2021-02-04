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
<?php if($select_product_posting == 'no')
{
?>
<form id="edit_product_info" method="post">
	<input type="hidden" value="<?php echo $store_code; ?>" id="store_code" name="store_code">
	<input type="hidden" value="<?php echo $product_detail[0]["product_aid"]; ?>" id="product_id" name="product_id">
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
            
            <div class="hd_heading"><h2>Edit Product <span></span> </h2></div>
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
							<input type="text" placeholder="Product Name" id="osdev_Product_Name" name="Product_Name" class="input" value="<?php echo $product_detail[0]["product_name"];?>">
						</div>
						<p class="wi100pstg fs11 red clearfix jsError" id="osdev_Product_NameError"> Please write your product name </p>
					</div>
					<div class="oneshop_fieldsbox">
						<label> Retail Price  </label>
						<div class="wi100pstg">
							<input type="text" onkeypress="return isNumberKey(event)" placeholder="Retail Price" name="Cost_Price" id="osdev_CostPrice" class="input" value="<?php echo $product_detail[0]["cost_price"];?>">
						</div>
						<p class="wi100pstg fs11 red clearfix jsError" id="osdev_CostPriceError"> Please Enter Retail Price </p>
						<p class="wi100pstg fs11 red clearfix jsError" id="osdev_validCostPriceError"> Please Enter Valid Retail Price </p>
					</div>

					<div class="oneshop_fieldsbox">
						<label> Sales Price  </label>
						<div class="wi100pstg">
							<input type="text" onkeypress="return isNumberKey(event)" placeholder="Sales Price" name="Sell_Price" id="osdev_SellPrice" class="input" value="<?php echo $product_detail[0]["sale_price"];?>">
						</div>
						<p class="wi100pstg fs11 red clearfix jsError" id="osdev_SellPriceError"> Please Enter Sales Price </p>
					</div>
					<div class="oneshop_fieldsbox">
						<p class="orange bold">Paid to you : (Exclude Oneidnet Charge <?php echo $store_oneidcharge[0]["oneidnet_charge"] * 100 ?>%)<input type="text" id="osdev_PaidtoYou" class="input gray-bg" readonly></p>
						<input type="hidden" id="osdev_PaidtoYouPer" class="input red" value="<?php echo $store_oneidcharge[0]["oneidnet_charge"]?>">
					</div>
					<div class="oneshop_fieldsbox">
                      <label>  Bulk Quantity </label>
                      <div class="wi100pstg" id="category_div">
                        <input type="number" class="input" name="bulk_quantity" placeholder="Enter bulk quantity" id="bulk_quantity" value="<?php echo $product_detail[0]["bulk_quantity"];?>"/>
                      </div>
                      <p class="wi100pstg fs11 red clearfix jsError" id="osdev_bulkqtyerror"> Please enter numeric value only.</p>
					</div>
                    <div class="oneshop_fieldsbox">
                      <label>  Bulk Price </label>
                      <div class="wi100pstg" id="category_div">
                        <input type="text" onkeypress="return isNumberKey(event)" class="input" name="bulk_price" placeholder="Enter bulk price" value="<?php echo $product_detail[0]["bulk_price"];?>" id="bulk_price"/>
                      </div>
                      <p class="wi100pstg fs11 red clearfix jsError" id="osdev_bulkpriceerror"> Please enter numeric value only.</p>
					</div>
					<div class="oneshop_fieldsbox">
						<label> Quantity  </label>
						<div class="wi100pstg">
							<input type="number" placeholder="Quantity" name="Quantity" value="<?php echo $product_detail[0]["quantity"];?>" id="osdev_Quantity" class="input">
						</div>
						<p class="wi100pstg fs11 red clearfix jsError" id="osdev_QuantityError"> Please Enter Quantity </p>
					</div>
                    <div class="oneshop_fieldsbox">
						<label> Discount  </label>
						<div class="wi100pstg discount">
							<input type="text" placeholder="Ex : 20" name="Discount" id="osdev_Discount" class="input" value="<?php echo $product_detail[0]["discount"];?>">
						</div>
						<p class="wi100pstg fs11 red clearfix jsError" id="osdev_DiscountError"> Please Enter Valid Discount </p>
					</div>
					<div class="oneshop_fieldsbox">
					<div class="" style="width: 45%;">
							<label> Warranty Type </label>
							<div class="wi100pstg select" id="warranty_type1">
								<select class="oneshop_selectbox_field" name="warranty_type" id="warranty_type">
									<option value="1" <?php echo ($product_detail[0]["warranty_type"] == 1)?'selected':'';?>Days</option>								
									<option  value="2"<?php echo ($product_detail[0]["warranty_type"] == 2)?'selected':'';?> >Months</option>								
									<option value="3" <?php echo ($product_detail[0]["warranty_type"] == 3)?'selected':'';?>>Years</option>								
								</select>
							</div>                      
							<p class="wi100pstg fs11 red clearfix jsError" id="warranty_typeError"> Please Select Warranty Type</p>
						</div>
						<div class="" style="width: 45%; float: right; margin-top: -23px;">
							<label> Warranty (in Months,Days and Years)  </label>
							<div class="wi100pstg">
							<input type="text" placeholder="1 Months or 1 Days or 1 Years any one)" name="Warranty" id="osdev_warrenty" class="input" value="<?php echo $product_detail[0]["warranty"];?>">
						</div>
						<p class="wi100pstg fs11 red clearfix jsError" id="osdev_warrentyError"> Please Enter Warranty Period </p>

							
						</div>
					</div>
				      <div class="oneshop_fieldsbox">
						<label> Product Group </label>
						<div class="wi100pstg">
							<input type="text" name="Group" id="osdev_Group" class="input" value="<?php echo $store_details[0]["store_category"];?>" readonly>
						</div>
                        <p class="wi100pstg fs11 red clearfix jsError" id="osdev_GroupError"> Please select Product Group </p>
					</div>
					<div class="oneshop_fieldsbox">
						<label> Product Category  </label>
						<div class="wi100pstg select" id="category_div">
							<select class="oneshop_selectbox_field" name="Category" id="osdev_Category">

								<option value='<?php echo $product_detail[0]["others_cateogry_name"];?>'><?php echo $product_detail[0]["others_cateogry_name"];?></option>
								<option value="">--Select Category--</option>
								<option value='others'>Others</option>

							</select>
						</div>
                        <div class="wi100pstg" id="category_txt_div" style="display:none">
                          <input type="text" class="input" name="category_name" placeholder="Enter category name" value="" id="category_txt"/>
                        </div>
						<p class="wi100pstg fs11 red clearfix jsError" id="osdev_CategoryError"> Please Enter Category Name  </p>
					</div>
					<div class="oneshop_fieldsbox">
						<label> Product Subcategory  </label>
						<div class="wi100pstg select" id="subcategory_div">
							<select class="oneshop_selectbox_field" name="Sub_Category" id="osdev_SubCategory">
								<option value='<?php echo $product_detail[0]["others_subcategory_name"];?>'><?php echo $product_detail[0]["others_subcategory_name"];?></option>
								<option value="">--Select Subcategory--</option>
								<option value='others'>Others</option>

							</select>
						</div>
                        <div class="wi100pstg" id="subcategory_txt_div" style="display:none">
                          <input type="text" class="input" name="subcategory_name" placeholder="Enter Sub category name" value="" id="subcategory_txt"/>
                        </div>
						<p class="wi100pstg fs11 red clearfix jsError" id="osdev_SubCategoryError"> Please Enter Subcategory </p>
					</div>
                    <div  id="osdev_Brands">
                    
                    </div>
                    <div class="oneshop_fieldsbox">
						<label> Shipping  </label>
						<div class="wi100pstg">
							<input type="text" onkeypress="return isNumberKey(event)" placeholder="Shipping" name="Shipping" id="osdev_Shipping" class="input" value="<?php echo $product_detail[0]["shipping"];?>">
						</div>
					</div>
                    <div class="oneshop_fieldsbox">
						<label> Handling  </label>
						<div class="wi100pstg">
							<input type="text" onkeypress="return isNumberKey(event)" placeholder="Handling" name="Handling" id="osdev_Handling" class="input" value="<?php echo $product_detail[0]["handling"];?>">
						</div>
					</div>
<!-- 					<div class="oneshop_fieldsbox">
						<label> Tax Detail : </label>&nbsp;
							<table id="dynamic_field">  
                                    <tr>  
                                         <td><input type="text" name="tid[]" placeholder="Tax Id (ex.GSTIN)" class="input" /></td>
                                         <td><input type="text" name="tname[]" placeholder="Tax Name (ex.VAT,CGST,SGST)" class="input" /></td>
                                         <td><input type="number" name="tperc[]" placeholder="Tax % (ex.18,28)" class="input" /></td>
                                         <td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>  
                                    </tr>  
                    		</table> 
					</div> -->
                    <div class="oneshop_fieldsbox">
						<label> Tags  </label>
						<div class="wi100pstg">
							<input type="text" placeholder="Eg:Pink,XL" name="product_tags" id="product_tags" class="input" value="<?php echo $product_detail[0]["product_tags"];?>">
						</div>
					</div>
					<div class="oneshop_fieldsbox">
                                            <label> Description  </label>
                                            <div class="wi100pstg"> <textarea class="input" name="Description" id="osdev_Description"><?php echo $product_detail[0]["description"];?></textarea>  </div>
					</div>
					<p class="wi100pstg fs11 red clearfix jsError" id="osdev_DescriptionError"> Please Enter Product Description </p>
                    <div style="display:none" id="product_add_loading"><img src="<?php echo base_url().'assets/images/ajax-loader.gif'?>"/></div>
					<div style="color:green;display:none" id="product_add_suc">Product Added Successfully! </div>
                    <div class="oneshop_fieldsbox">
						<div class="wi100pstg">
							 <input type="submit" name="button" class="np_des_addaccess_btn" id="prod_save_btn" value="Update">
					   <!-- <input type="button" name="button" class="np_des_addaccess_btn" id="prod_reset_btn" value="Reset"> -->
						</div>
					</div>
			</div> 
				<div class="oneshop_right_newcontainer productimg_wrap">
					<div class="oneshop_product_images">
						<h5> Product Images </h5>
						<p class="wi100pstg fs11 red clearfix jsError" id="osdev_imageError"> Primary image is mandatory</p>
						<ul>
							<li>
								<div id="imagePreview1" class="imagePreview" style="background-image: url('<?php echo base_url().'stores/'.$store_code.'/products/'.$product_detail[0]["product_aid"].'/mi/'.$product_detail[0]["primary_image"].'';?>');"><input id="uploadFile1" name="productImg[]" type="file" name="image1" class="img uploadFile" /></div>
							</li>
							<li>
								<div id="imagePreview2" class="imagePreview" style="background-image: url('<?php echo base_url().'stores/'.$store_code.'/products/'.$product_detail[0]["product_aid"].'/mi/'.$product_detail[0]["secondary_image"].'';?>');"><input id="uploadFile2" name="productImg[]" type="file" name="image2" class="img uploadFile" /></div>
							</li>
							<li>
								<div id="imagePreview3" class="imagePreview" style="background-image: url('<?php echo base_url().'stores/'.$store_code.'/products/'.$product_detail[0]["product_aid"].'/mi/'.$product_detail[0]["tertiary_image"].'';?>');"><input id="uploadFile3" name="productImg[]" type="file" name="image3" class="img uploadFile" /></div>
							</li>
							<li>
								<div id="imagePreview4" class="imagePreview" style="background-image: url('<?php echo base_url().'stores/'.$store_code.'/products/'.$product_detail[0]["product_aid"].'/mi/'.$product_detail[0]["quaternary_image"].'';?>');"><input id="uploadFile4" name="productImg[]" type="file" name="image4" class="img uploadFile" /></div>
							</li>
						</ul>
					</div>
				</div>
            </div>
		</div> 
	</div> 
</form>
<?php }else{?>
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
							<input type="text" onkeypress="return isNumberKey(event)" placeholder="Product Manufacturer Price" name="Product_Market_Price" id="osdev_Product_Market_Price" class="input">
						</div>
						<p class="wi100pstg fs11 red clearfix jsError" id="osdev_Product_Market_PriceError"> Enter Valid Product Manufacturer Price ( ex: 3.45 ) </p>
						<p class="wi100pstg fs11 red clearfix jsError" id="osdev_Product_Market_ValidPrice"> Enter Valid Product Manufacturer Price ( ex: 3.45 ) </p>
					</div>

					<div class="oneshop_fieldsbox">
						<label> Retail Price  </label>
						<div class="wi100pstg">
							<input type="text" onkeypress="return isNumberKey(event)" placeholder="Retail Price" name="Cost_Price" id="osdev_CostPrice" class="input">
						</div>
						<p class="wi100pstg fs11 red clearfix jsError" id="osdev_CostPriceError"> Please Enter Retail Price </p>
						<p class="wi100pstg fs11 red clearfix jsError" id="osdev_validCostPriceError"> Please Enter Valid Retail Price </p>
					</div>

					<div class="oneshop_fieldsbox">
						<label> Sales Price  </label>
						<div class="wi100pstg">
							<input type="text" onkeypress="return isNumberKey(event)" placeholder="Sales Price" name="Sell_Price" id="osdev_SellPrice" class="input">
						</div>
						<!-- <p class="wi100pstg fs11 red clearfix jsError" id="osdev_SellPriceError"> Please Enter Sales Price </p> -->
					</div>
					<div class="oneshop_fieldsbox">
						<p class="orange bold">Paid to you : (Exclude Oneidnet Charge <?php echo $store_oneidcharge[0]["oneidnet_charge"] * 100 ?>%)<input type="text" id="osdev_PaidtoYou" class="input gray-bg" readonly></p>
						<input type="hidden" id="osdev_PaidtoYouPer" class="input red" value="<?php echo $store_oneidcharge[0]["oneidnet_charge"]?>">
					</div>
					<div class="oneshop_fieldsbox">
                      <label>  Bulk Quantity </label>
                      <div class="wi100pstg" id="category_div">
                        <input type="number" class="input" name="bulk_quantity" placeholder="Enter bulk quantity" value="" id="bulk_quantity"/>
                      </div>
                      <p class="wi100pstg fs11 red clearfix jsError" id="osdev_bulkqtyerror"> Please enter numeric value only.</p>
					</div>
                    <div class="oneshop_fieldsbox">
                      <label>  Bulk Price </label>
                      <div class="wi100pstg" id="category_div">
                        <input type="text" onkeypress="return isNumberKey(event)" class="input" name="bulk_price" placeholder="Enter bulk price" value="" id="bulk_price"/>
                      </div>
                      <p class="wi100pstg fs11 red clearfix jsError" id="osdev_bulkpriceerror"> Please enter numeric value only.</p>
					</div>
					<div class="oneshop_fieldsbox">
						<label> Quantity  </label>
						<div class="wi100pstg">
							<input type="number" placeholder="Quantity" name="Quantity" value="2" id="osdev_Quantity" class="input">
						</div>
						<p class="wi100pstg fs11 red clearfix jsError" id="osdev_QuantityError"> Please Enter Quantity </p>
					</div>
                    <div class="oneshop_fieldsbox">
						<label> Discount  </label>
						<div class="wi100pstg discount">
							<input type="text" placeholder="Ex : 20" name="Discount" id="osdev_Discount" class="input">
						</div>
						<p class="wi100pstg fs11 red clearfix jsError" id="osdev_DiscountError"> Please Enter Valid Discount </p>
					</div>
                    <div class="oneshop_fieldsbox">
					<div class="" style="width: 45%;">
							<label> Warranty Type </label>
							<div class="wi100pstg select" id="warranty_type1">
								<select class="oneshop_selectbox_field" name="warranty_type" id="warranty_type">
									<option value="" disabled selected>--Warrnaty Type--</option>								
									<option value="1">Days</option>								
									<option value="2">Months</option>								
									<option value="3">Years</option>								
								</select>
							</div>                      
							<p class="wi100pstg fs11 red clearfix jsError" id="warranty_typeError"> Please Select Warranty Type</p>
						</div>
						<div class="" style="width: 45%; float: right; margin-top: -23px;">
							<label> Warranty (in Months,Days and Years)  </label>
							<div class="wi100pstg">
								<input type="text" placeholder="1  Months or 1 Days or 1 Years any one) " name="Warranty" id="osdev_warrenty" class="input">
							</div>
							<p class="wi100pstg fs11 red clearfix jsError" id="osdev_warrentyError"> Please Enter Warranty Period </p>
						</div>
					</div>
<!--					<div class="oneshop_fieldsbox">
						<label> Specifications  </div>
						<div class="wi100pstg"> <textarea class="subcategory_textarea" name="Specifications" id="osdev_Specifications" value=""></textarea></textarea>  </div>
					</div>-->
                      <div class="oneshop_fieldsbox">
						<label> Product Group </label>
						<div class="wi100pstg">
							<input type="text" name="Group" id="osdev_Group" class="input" value="<?php echo $store_details[0]["store_category"];?>" readonly>
							<!-- <select class="select" name="Group" id="osdev_Group">
								<option value="">Select Group</option>
								<option value="Electronics">Electronics</option>
								<option value="Men">Men</option>
								<option value="Women">Women</option>
								<option value="Kids">Kids</option>
								<option value="Books">Books</option>
								<option value="Furniture">Furniture</option>
								<option value="Sports">Sports</option>
								<option value="Movies">Movies</option>
								<option value="Jewelry">Jewellery</option>
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
							</select> -->
						</div>
                        <p class="wi100pstg fs11 red clearfix jsError" id="osdev_GroupError"> Please select Product Group </p>
					</div>
					<div class="oneshop_fieldsbox">
						<label> Product Category  </label>
						<div class="wi100pstg select" id="category_div">
							<select class="oneshop_selectbox_field" name="Category" id="osdev_Category">
								<option value="">--Select Category--</option>
								<option value='others'>Others</option>
							</select>
						</div>
                        <div class="wi100pstg" id="category_txt_div" style="display:none">
                          <input type="text" class="input" name="category_name" placeholder="Enter category name" value="" id="category_txt"/>
                        </div>
						<p class="wi100pstg fs11 red clearfix jsError" id="osdev_CategoryError"> Please Enter Category Name  </p>
					</div>
					<div class="oneshop_fieldsbox">
						<label> Product Subcategory  </label>
						<div class="wi100pstg select" id="subcategory_div">
							<select class="oneshop_selectbox_field" name="Sub_Category" id="osdev_SubCategory">
								<option value="">--Select Subcategory--</option>
								<option value='others'>Others</option>
							</select>
						</div>
                        <div class="wi100pstg" id="subcategory_txt_div" style="display:none">
                          <input type="text" class="input" name="subcategory_name" placeholder="Enter Sub category name" value="" id="subcategory_txt"/>
                        </div>
						<p class="wi100pstg fs11 red clearfix jsError" id="osdev_SubCategoryError"> Please Enter Subcategory </p>
					</div>
                    <div  id="osdev_Brands">
                    
                    </div>
                    <div class="oneshop_fieldsbox">
						<label> Shipping  </label>
						<div class="wi100pstg">
							<input type="text" onkeypress="return isNumberKey(event)" placeholder="Shipping" name="Shipping" value="" id="osdev_Shipping" class="input">
						</div>
						<!-- <p class="wi100pstg fs11 red clearfix jsError" id="osdev_ShipError"> Please Enter Shipping Charge </p> -->
					</div>
                    <div class="oneshop_fieldsbox">
						<label> Handling  </label>
						<div class="wi100pstg">
							<input type="text" onkeypress="return isNumberKey(event)" placeholder="Handling" name="Handling" value="" id="osdev_Handling" class="input">
						</div>
						<!-- <p class="wi100pstg fs11 red clearfix jsError" id="osdev_HandleError"> Please Enter Handling Charge </p> -->
					</div>
					<div class="oneshop_fieldsbox">
						<label> Tax Detail : </label>&nbsp;
							<table id="dynamic_field">  
                                    <tr>  
                                         <td><input type="text" name="tid[]" placeholder="Tax Id (ex.GSTIN)" class="input" /></td>
                                         <td><input type="text" name="tname[]" placeholder="Tax Name (ex.VAT,CGST,SGST)" class="input" /></td>
                                         <td><input type="number" name="tperc[]" placeholder="Tax % (ex.18,28)" class="input" /></td>
                                         <td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>  
                                    </tr>  
                    		</table> 
						<!-- <p class="wi100pstg fs11 red clearfix jsError" id="osdev_HandleError"> Please Enter Handling Charge </p> -->
					</div>
<!-- 					<div class="oneshop_fieldsbox">
						<label> Tax Detail  </label>
						<div class="wi100pstg">
							<input type="text" placeholder="Tax id" name="Taxid" value="" id="osdev_Tax" class="input">
						</div>
						<br>
						<div class="wi100pstg">
							<input type="text" placeholder="Tax Name" name="Taxname" value="" id="osdev_Taxname" class="input">
						</div>
						<br>
						<div class="wi100pstg discount">
							<input type="text" placeholder="Tax(%)" name="Taxperc" value="" id="osdev_Taxperc" class="input">
						</div>
						<p class="wi100pstg fs11 red clearfix jsError" id="osdev_TaxError"> Please Enter Tax Details </p>
					</div> -->
                    <div class="oneshop_fieldsbox">
						<label> Tags  </label>
						<div class="wi100pstg">
							<input type="text" placeholder="Eg:Pink,XL" name="product_tags" id="product_tags" class="input">
						</div>
<!--						<p class="wi100pstg fs11 red clearfix jsError" id="osdev_warrentyError"> Please Enter Warranty Period </p>-->
					</div>
					<div class="oneshop_fieldsbox">
                                            <label> Description  </label>
                                            <div class="wi100pstg"> <textarea class="input" name="Description" id="osdev_Description"></textarea>  </div>
					</div>
					<p class="wi100pstg fs11 red clearfix jsError" id="osdev_DescriptionError"> Please Enter Product Description </p>
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
<?php } ?>
<!--Oneshop Content ends Here(vinod 19-05-2015)-->
<?php
$this->templates->app_footer();
?>
    <script language=Javascript>
       <!--
       function isNumberKey(evt)
       {
          var charCode = (evt.which) ? evt.which : evt.keyCode;
          if (charCode != 46 && charCode > 31 
            && (charCode < 48 || charCode > 57))
             return false;

          return true;
       }
       //-->
    </script>
<script type="text/javascript">
 $(document).ready(function(){  
      var i=1;  
      $('#add').click(function(){  
           i++;  
           $('#dynamic_field').append('<tr id="row'+i+'"> <td><input type="text" name="tid[]" placeholder="Tax Id (ex.GSTIN)" class="input" /></td><td><input type="text" name="tname[]" placeholder="Tax Name (ex.VAT,CGST,SGST)" class="input" /></td><td><input type="text" name="tperc[]" placeholder="Tax % (ex.18%,28%)" class="input" /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');  
      });  
      $(document).on('click', '.btn_remove', function(){  
           var button_id = $(this).attr("id");   
           $('#row'+button_id+'').remove();  
      });  
      // $('#submit').click(function(){            
      //      $.ajax({  
      //           url:"name.php",  
      //           method:"POST",  
      //           data:$('#add_name').serialize(),  
      //           success:function(data)  
      //           {  
      //                alert(data);  
      //                $('#add_name')[0].reset();  
      //           }  
      //      });  
      // });  
 });  
</script>
