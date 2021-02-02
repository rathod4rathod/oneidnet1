
<?php
$this->load->module('templates');
$this->templates->os_Store_Header();
$this->templates->mystore_Menu();
$this->load->module("home");
//Imp $warn_msg=$this->home->displayWarn();
?>      

<!--Oneshop Content starts Here(vinod 19-05-2015)-->
<div class="oneshop_contentSection">
    <div class="oneshop_leftSection">
        <?php
          if($warn_msg!=""){
           echo "<h1 style='color:red;font-size:18px;'>$warn_msg</h1>";
          }
        ?>
        <span class="oneshop_leftHead">
            <h3>Sell Your Product</h3>
        </span>
        <form id="add_product">
            <div class="oneshop_myStoreSettings">
                <div class="oneshop_myStoreBasicInfo">
                    <div class="oneshop_mystoreSettinsField">
                        <span class="onshop_formsFieldLables"><h5>Product Name   :</h5></span>
                        <input type="text" class="oneshop_mystoreField" placeholder="Enter Store Name Here" name="Product_Name" id="osdev_Product_Name">
                    </div> 
                    <div class="oneshop_mystoreSettinsField">
                        <span class="onshop_formsFieldLables"><h5>Brand Name <span style="color:red;">*</span> :</h5></span>
                        <input type="text" class="oneshop_mystoreField" placeholder="Enter Store Name Here" name="Brand_Name" id="osdev_Brand_Name">
                    </div> 
                    <div class="oneshop_mystoreSettinsField">
                        <span class="onshop_formsFieldLables"><h5>Category <span style="color:red;">*</span> :</h5></span>
                        <select class="oneshop_mystoreField selectType" name="Category" id="osdev_Category">
                            <option value="">--Select--</option>
<?php foreach ($catagories as $catagories_info) {
  ?>
                              <option value="<?php echo $catagories_info["category_aid"]; ?>"><?php echo $catagories_info["name"]; ?></option>
                              <?php }
                            ?>

                        </select>
                    </div> 
                    <div class="oneshop_mystoreSettinsField">
                        <span class="onshop_formsFieldLables"><h5>Sub Category :</h5></span>
                        <select class="oneshop_mystoreField selectType" name="Sub_Category" id="osdev_SubCategory">
                            <option value="">--Select--</option>
                        </select>
                    </div> 
                    <div class="oneshop_mystoreSettinsField">
                        <span class="onshop_formsFieldLables"><h5>Warranty :</h5></span>
                        <input type="text" class="oneshop_mystoreField" placeholder="1 year" name="Warranty" id="osdev_warrenty">
                    </div> 
                    <div class="oneshop_mystoreSettinsField">
                        <span class="onshop_formsFieldLables"><h5>Cost Price <span style="color:red;">*</span> :</h5></span>
                        <input type="text" class="oneshop_mystoreField" placeholder="" name="Cost_Price" id="osdev_CostPrice">
                    </div> 
                    <div class="oneshop_mystoreSettinsField">
                        <span class="onshop_formsFieldLables"><h5>Sell Price <span style="color:red;">*</span> :</h5></span>
                        <input type="text" class="oneshop_mystoreField" placeholder="" name="Sell_Price" id="osdev_SellPrice">
                    </div>
                    <div class="oneshop_mystoreSettinsField">
                        <span class="onshop_formsFieldLables"><h5>Discount :</h5></span>
                        <input type="number" min="0" class="oneshop_mystoreField" placeholder="" name="Discount" id="osdev_Discount">
                    </div>  
                    <div class="oneshop_mystoreSettinsField">
                        <span class="onshop_formsFieldLables"><h5>Quantity <span style="color:red;">*</span> :</h5></span>
                        <input type="number" min="0" class="oneshop_mystoreField" placeholder="" name="Quantity" value="2" id="osdev_Quantity">
                    </div>
                    <div class="oneshop_mystoreSettinsField">
                        <span class="onshop_formsFieldLables"><h5>Upload Product Images <span style="color:red;">*</span> :</h5></span>
                        <input type="file" class="oneshop_mystoreField" name="productImg[]" id="osdev_productImg" multiple="multiple" > 
                    </div>                                                                                           
                    <div class="oneshop_mystoreSettinsField">
                        <span class="onshop_formsFieldLables"><h5>Specifications <span style="color:red;">*</span> :</h5></span>
                        <textarea class="oneshop_mystoreField textAreaType" name="Specifications" id="osdev_Specifications" value=""></textarea>
                    </div>                         
                    <div class="oneshop_mystoreSettinsField">
                        <span class="onshop_formsFieldLables"><h5>Description <span style="color:red;">*</span> :</h5></span>
                        <textarea class="oneshop_mystoreField textAreaType" name="Description" id="osdev_Description"></textarea>
                    </div> 
                    <div style="color:green;display:none" id="product_add_suc">Product successfully added </div>  
                    <!--<button class="oneshop_basicInfoBtn">Proceed</button>-->
                    <input type="submit" class="oneshop_basicInfoBtn" value="Proceed">
                    <!--<button class="oneshop_basicInfoBtn">Add More Products</button>-->
                </div>

            </div>
        </form>

    </div>
<?php
$this->load->module("ads");
$this->ads->ads_view();
?>                  
</div>          
</div>
<!--Oneshop Content ends Here(vinod 19-05-2015)-->            

<?php
$this->templates->app_footer();
?>