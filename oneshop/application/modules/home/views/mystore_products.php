<?php
$this->load->module('templates');
$this->templates->app_header(  ); 
$this->templates->os_mainmenu(  ); 
?>      

    <!--Oneshop Content starts Here(vinod 19-05-2015)-->
    	<div class="oneshop_contentSection">
        	<div class="oneshop_StoreProductsPage">
            <div class="oneshop_storeLogoandName">
	                    <img src="<?php echo base_url()."assets/";?>images/profilePic.png" class="oneshop_storeProfilePic">
                        <span class="oneshop_storeName"><h2>Store Name</h2></span>
                    </div>
           <div class="oneshop_profileSection oneshop_MyStoreProfileSection oneshop_storeProductsSection">
                    <div class="oneshop_storeProductsHeading">
                              <h4>Top sold Products</h4>
                            </div>
                    <div class="oneshop_profileSectionContent oneshop_MyStoreProfileSectionContent">
                     <?php 
                     $this->load->module("storeproducts");
                     $this->storeproducts->top_Sold_Products();
                     ?>
                    </div>
               
               
               
               
                </div>
              
              
              
                
                
                <div class="oneshop_profileSection oneshop_MyStoreProfileSection oneshop_storeProductsSection">
				<div class="oneshop_storeProductsHeading">
                	<h4>Featured Products</h4>
                </div>
                    <div class="oneshop_profileSectionContent oneshop_MyStoreProfileSectionContent">
                     <?php 
                              $this->storeproducts->featured_Products();
                     ?>
                    </div>
                </div>
                
                
              
              
              
              
              
              
              
<div class="oneshop_profileSection oneshop_MyStoreProfileSection oneshop_storeProductsSection">
				<div class="oneshop_storeProductsHeading">
                	<h4>Products</h4>
                </div>
                    <div class="oneshop_profileSectionContent oneshop_MyStoreProfileSectionContent">
                    <?php 
                              $this->storeproducts->os_store_Products();
                     ?>
            
                    </div>
                </div>                
            </div>
        </div>
    <!--Oneshop Content ends Here(vinod 19-05-2015)-->            

  <?php
$this->templates->app_footer(  ); 
?>