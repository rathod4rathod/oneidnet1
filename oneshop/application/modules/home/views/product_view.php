
<?php
$this->load->module('templates');
$this->templates->app_header(  ); 
$this->templates->os_mainmenu(  ); 
?>     
    <!--Oneshop Content starts Here(vinod 19-05-2015)-->
    	<div class="oneshop_contentSection">
         <?php
            $this->load->module('products');
            //$this->products->products_search(  ); 
        ?> 
        	<div class="oneshop_findProductsPage">
            <div class="oneshop_cartItemsPageHead" id="navcontainer">
            	<span id="prd_name"><?php echo str_replace("%27","'",str_replace("%20"," ",$product_name));  ?></span> 
              <input type="hidden" value="<?php echo str_replace("%20"," ",$product_name); ?>" id="CATEGORY_NAME" >
             <?php 
             //echo "<pre>"; print_R($subcategory_name); die();
             ?>
              <div class="oneshop_categories">
                  <?php foreach($subcategory_name as $subcategory_name_info){
                    ?>
                  <span class="click_productCategories"><a href="" class="os_subcat_id" id="<?php echo $subcategory_name_info["subcategory_aid"]; ?>"><?php echo $subcategory_name_info["sub_category_name"];?></a></span>
                      <?php
                  }?>
              </div>
            </div>
              <input type="hidden" value="" id="product_subcategory_limit_count">
              <input type="hidden" value="" id="product_subcategory_id">
              <input type="hidden" value="8" id="product_limit_count">
              <div id="category_productappend">
                 <?php
            $this->load->module('products');
            $product_name=str_replace("%20"," ",$product_name);
            $product_name=str_replace("%27","'",$product_name);
            
            $this->products->product_view_tpl($product_name); 
        ?> 
              
              </div>
                   
            </div>
        </div>
    <!--Oneshop Content ends Here(vinod 19-05-2015)-->            

         <?php
$this->templates->app_footer(  ); 
?>