<?php
$this->load->module('templates');
$this->templates->app_header(  ); 
$this->templates->os_mainmenu( ); 
?>
      

    <!--Oneshop Content starts Here(vinod 19-05-2015)-->
    	<div class="oneshop_contentSection">
<!--Page Content End-->
<!-- for quick sell starts here-->
<div class="Banner-oneshop"> <!--banner start here-->
<?php
  $home=$this->load->module("home");
  $category_list=$home->os_category_list();
      //var_dump($category_list);
?>
<div class="left_banner"><!--left banner start here-->
<div class="left_top_banner"><!--left-top-banner start here-->
<div class="banner-form"><!--banner-form start here-->
<p class="fs28 ftwt mab20 mal20 white">Sell your Product Now...</p>
<div class="left-banner-form"><!--left-banner form start here-->
    <form id="quick_sell_form">
<input type="text" class="txt-banner" placeholder="Product name" name="productname" id="product_name">
<select class="slct-banner gray" id="category_select" name="category_name">
    <option value="">Select category</option>
    <?php
      for($i=0;$i<count($category_list);$i++){
    ?>
    <option value="<?php echo $category_list[$i]["category_aid"]?>"><?php echo $category_list[$i]["name"]?></option>
    <?php
      }
    ?>
</select>
<select class="slct-banner gray" id="subcategory_select" name="subcategory_name"><option name="Location /local Area"> Sub category </option></select>
<input type="text" class="txt-banner" placeholder="Cost" name="cost_price" id="cost_price">
<input type="text" class="txt-banner" placeholder="Discount" name="discount" id="discount" value="0">
<input type="file" class="txt-banner" placeholder="Discount" name="product_img[]" id="product_img" multiple="multiple">
</div><!--left banner form closed here-->

<div class="middle-banner-form"><!--middle-banner form start here-->
<textarea class="txtarea-banner" placeholder="Specifications" name="specs"></textarea>
<input type="button" value="Cancel" name="buy" class="flr btn_buy">
<input type="submit" value="Submit" name="Sell" id="quick_sell" class="flr btn_buy">

</div><!--middle-banner form closed here-->
</form>
</div><!--banner-form closed here-->
</div><!--left-top-banner closed here-->
<!--<span>serwerwe</span>-->
</div><!--left banner closed here-->
<div class="Right_banner"><!--right banner start here-->
<div class="right_sale_pic"><img alt="sale" src="<?php echo base_url().'assets/images/sale-img.png'?>"></div>
</div>

</div>
<!-- for quick sell ends here-->
		<div class="oneshop_logoPage">
            
			<div class="oneshop_lpSections">
            	<span class="oneshop_lpSectionHeader"><h3>International Brands</h3></span>
                <div class="oneshop_lpSectionContent">
                	<div class="oneshop_lpscItemsListWrapper">
                    
    <!-- Jssor Slider Begin -->
    <!-- To move inline styles to css file/block, please specify a class name for each element. --> 
    <div id="slider1_container" class="oneshop_corouselContent">
     
<!--Slides Container-->						
<?php 
$this->load->module("stores");
$this->stores->International_Brands();
?>
<!--Slides Container-->	


        
        <!--#region Arrow Navigator Skin Begin -->
        <!-- Help: http://www.jssor.com/development/slider-with-arrow-navigator-jquery.html -->
        
<!-- Arrow Left -->
        <span u="arrowleft" class="jssora03l" style=" float: left; top: 123px; left: 0px;">
        </span>
        <!-- Arrow Right -->
        <span u="arrowright" class="jssora03r" style="top: 123px; right: 8px;">
        </span>
        <!--#endregion Arrow Navigator Skin End -->
    </div>
    <!-- Jssor Slider End -->        
					        
                        
                    </div>
                </div>
            </div>
            
         	
            <?php 
            $this->stores->Friends_Stores();
            ?>

            
            
            <div class="oneshop_lpSections">
            	<span class="oneshop_lpSectionHeader"><h3>Recomended Stores</h3></span>
                <div class="oneshop_lpSectionContent">
                	<div class="oneshop_lpscItemsListWrapper">
                    
    <!-- Jssor Slider Begin -->
    <!-- To move inline styles to css file/block, please specify a class name for each element. --> 
    <div id="slider3_container" class="oneshop_corouselContent">
     
        <?php 
            $this->stores->Recomended_Stores();
            ?>
<!--Slides Container-->						


        
<!-- Arrow Left -->
        <span u="arrowleft" class="jssora03l" style=" float: left; top: 123px; left: 0px;">
        </span>
        <!-- Arrow Right -->
        <span u="arrowright" class="jssora03r" style="top: 123px; right: 8px;">
        </span>
        <!--#endregion Arrow Navigator Skin End -->
    </div>
    
    <!-- Jssor Slider End -->        
					        
                        
                    </div>
                </div>
            </div> 
<!--  store promotions Srujan --> 
<div class="oneshop_lpSections">
            	<span class="oneshop_lpSectionHeader"><h3>Sponsored Stores</h3></span>
                <div class="oneshop_lpSectionContent">
                	<div class="oneshop_lpscItemsListWrapper">
                    
    <!-- Jssor Slider Begin -->
    <!-- To move inline styles to css file/block, please specify a class name for each element. --> 
    <div id="slider4_container" class="oneshop_corouselContent">
     
        <?php
            $this->stores->promoted_Stores();
            ?>
<!--Slides Container-->						
<!-- Arrow Left -->
        <span u="arrowleft" class="jssora03l" style=" float: left; top: 123px; left: 0px;">
        </span>
        <!-- Arrow Right -->
        <span u="arrowright" class="jssora03r" style="top: 123px; right: 8px;">
        </span>
        <!--#endregion Arrow Navigator Skin End -->
    </div>
    
    <!-- Jssor Slider End -->        
					        
                        
                    </div>
                </div>
            </div>    
<!-- end of store promotions Srujan -->  
        <div class="oneshop_lpSections">
            	<span class="oneshop_lpSectionHeader"><h3>Public Stores</h3></span>
                <div class="oneshop_lpSectionContent">
                	<div class="oneshop_lpscItemsListWrapper">
                    
    <!-- Jssor Slider Begin -->
    <!-- To move inline styles to css file/block, please specify a class name for each element. --> 
    <div id="slider2_container" class="oneshop_corouselContent">
     
<!--Slides Container-->	
<?php
$this->stores->publicStores();
?>


<!--Slides Container-->	
<!-- Arrow Left -->
        <span u="arrowleft" class="jssora03l" style=" float: left; top: 123px; left: 0px;">
        </span>
        <!-- Arrow Right -->
        <span u="arrowright" class="jssora03r" style="top: 123px; right: 8px;">
        </span>
        <!--#endregion Arrow Navigator Skin End -->
    </div>
    <!-- Jssor Slider End -->        
					        
                        
                    </div>
                </div>
            </div>
            
            
		</div>
<!--Page Content End-->
            
            
        </div>
    <!--Oneshop Content ends Here(vinod 19-05-2015)-->            

   
   <?php
$this->templates->app_footer(  ); 
?>
