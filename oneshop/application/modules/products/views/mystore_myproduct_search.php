
<?php
require('application/libraries/oneshopconfig.php');
//echo $store_id;
//print_R($results_category);
?>
<div class="oneshop_filter">
        <div class="oneshop_filterFields">
              <h5>Find Product :</h5>
                <input type="text" id="p_search" class="oneshop_mystoreField oneshop_filterFieldsText" style="width:160px" placeholder="Find Product" value="">
                <select id="find_product_category" class="oneshop_mystoreField oneshop_filterFieldsText"> 
                  <option value="">Find product by category</option>
                  <?php foreach($results_category as $category){?>
                  <option value="<?php echo $category['category_aid'];?>"><?php echo $category['name'];?></option>
                  <?php
                  
                  }?>
                </select>
                <select id="find_product_sub_category" class="oneshop_mystoreField oneshop_filterFieldsText" style="display:none"> 
                  
                </select>
 
                  <button id="find_myproduct" class="oneshop_basicInfoBtn oneshop_storeFindBtn">Find Product</button>
       
                  <input type="hidden"  id="store_u_id" value="<?php echo $store_id;?>">
        </div> 
      </div>

<input type="hidden" name="hproducts_cnt" id="hproducts_cnt" value="<?php echo $products_cnt?>"/>
