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
$dev_oneshop_product_id=$_GET["id"] ;
    ?>
<script type="text/javascript">
$(document).ready(function(){
	$('.oneshop_editProductImage').hover(
		function(){$(this).find('.oneshop_editIcon').fadeIn(500).css({display: 'block'});},
		function(){$(this).find('.oneshop_editIcon').fadeOut(500).css({display: 'none'});});
    
$("#os_category").on("change",function(){
        var selectedVal=$( "#os_category option:selected" ).val();
      $.ajax({
              type: 'POST',
              url: oneshop_url+ "/products/subcatagory_ids",
              data: {Category_id:selectedVal},
              success: function (data) {
                               $("#os_sub_category").html(data);
                              }
              });
      });
});


 
function upload_img(){
    $("#my_file").trigger('click');
    $("#my_file").change(function(){
        readURL(this);
    }); 
  }
  function readURL(input) {
    if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#imagePreview').attr('src', e.target.result);
            }
            
            reader.readAsDataURL(input.files[0]);
        }
    }
    
  function upload_img1(id){
   // alert(id);
  
    $("#"+id).trigger('click');
   
    $("#"+id).change(function(){
        readURL1(this,id);
    }); 
  }
  function readURL1(input,id) {
  
    if (input.files && input.files[0]) {
            var reader = new FileReader();
            
           reader.onload = function (e) {
              
                $('#image_Id'+id).attr('src', e.target.result);
                //console.log(e.target.result);
            }
            
            reader.readAsDataURL(input.files[0]);
        }
    }  
    
    function update_info(){
       $.ajax({
         type: 'POST',
         url: "<?php echo base_url()."/home/update_product_info"?>",
         data: new FormData(this),
         processData: false,
         contentType: false,
         success: function (data) {
            // alert(data);
             if(data==1)
             {
                 $('#product_add_suc').show().delay(5000).fadeOut();
                 document.getElementById("add_product").reset();
             }
            }
         });
      
      
    }
    
  
</script>
<?php 

$product_images=explode(",",$store_prod[0]['primary_image']);

?>
    <!--Oneshop Content starts Here(vinod 19-05-2015)-->
    	<div class="oneshop_contentSection">
        	<div class="oneshop_leftSection">
            	<span class="oneshop_leftHead">
                	<h3>Update Your Product</h3>
                </span>
            
                <div class="oneshop_myStoreSettings">
                <div class="oneshop_editProductImages">
                 
               
                  <?php
                  for($i=0;$i<4;$i++){
                    $val=($product_images[$i]!="")?$product_images[$i]:"";
                    if($val==""){
                     //echo "this is";
                      ?>
                 	<div class="oneshop_editProductImage">
                   
                      <form id="add_image">
                    <img class="oneshop_editProductPic"  id="imagePreview"  onclick="upload_img();" >
                  
      <input type="file" id="my_file" value=""style="display: none;" name="add_img12" class="add_img" />   
      <input type="hidden"  name ="product_name" value="<?php echo $store_prod[0]['product_name'];?>">
      <input type="hidden" id="pid" name ="add_product_aid" value="<?php echo $prod_res[0]['product_aid'];?>">
      <input type="hidden" value="<?php echo $store_prod[0]['image_path']; ?>" name="add_total_img">
      <input type="hidden" value="<?php echo $store_prod[0]['store_unique_id']; ?>" name="add_store_unique_id">                  
                  
                    </form>
                    </div>                 
                  
                 <?php   }
                 else{
            ?>
               	<div class="oneshop_editProductImage">
<form id="cunnent_img<?php echo $i;?>"> 
       <input type="hidden" id="sid"  name ="product_aid" value="<?php echo $prod_res[0]['product_aid'];?>">
      <input type="file" id="<?php echo $i;?>" value="" style="display: none;" name="updatedimae" class="update_img" /> 
      <input type="hidden" value="<?php echo $product_images[$i]; ?>" name="current_image">
      <input type="hidden" value="<?php echo $store_prod[0]['image_path']; ?>" name="total_img">
      <input type="hidden" value="<?php echo $results_products[0]['store_unique_id']; ?>" name="store_unique_id">
      <img class="oneshop_editProductPic"  id="image_Id<?php echo $i;?>" value="" src="<?php echo STORE_PATH.$results_products[0]['store_unique_id']."/products/mi/".$product_images[$i]; ?>">
      <img  id="OpenImgUpload" onclick="upload_img1(<?php echo $i;?>);" value=""  src="<?php echo base_url()."assets/images/editIcon.jpg"?>" class="oneshop_editIcon">
</form> 
                  </div>
                 <script>
                   $("#cunnent_img<?php echo $i;?>").submit(function(){
                    
                        $.ajax({
                type: 'POST',
                url: oneshop_url+"/products/product_image_update",
                data: new FormData(this),
                processData: false,
                contentType: false,
               
                success: function (data) {
                }
            });
                     return false;
                   });
                 </script>
                   
                  <?php 
                  }
                  }
                 ?>
                   
              
                                                                                        
                </div>
                  <form id="edit_product">
                     <input type="hidden" id="sid"  name ="product_aid" value="<?php echo $prod_res[0]['product_aid'];?>">
                	<div class="oneshop_myStoreBasicInfo">
                        <div class="oneshop_mystoreSettinsField">
                        <span class="onshop_formsFieldLables"><h5>Product Name:</h5></span>
                            <input type="text" class="oneshop_mystoreField" name="Product_name" id="os_product_name"  placeholder="<?php echo $store_prod[0]['product_name'];?>" readonly>
                        </div> 
                        <div class="oneshop_mystoreSettinsField">
                          
                        <span class="onshop_formsFieldLables"><h5>Category</h5></span>
                            <select class="oneshop_mystoreField selectType" name="product_category" id="os_category">
                              
                            	<option  value="">--select--</option>
                               <?php foreach($os_category_list as $catagories_info){
                                  ?>
                                <option    value="<?php echo $catagories_info["category_aid"]; ?>"         <?PHP  if($catagories_info["category_aid"]==$results_products[0]['Category']){ echo "selected";}?>>
                                    <?php echo $catagories_info["name"];  ?></option>
                                    <?php
                                } ?>
                            </select>
                        </div> 
                        <div class="oneshop_mystoreSettinsField">
                        <span class="onshop_formsFieldLables"><h5>Sub Category :</h5></span>
                        
                        <select class="oneshop_mystoreField selectType" name="product_sub_category" id="os_sub_category">
                              <option value="<?php echo $store_prod[0]['others_category_name']?> "><?php echo $prod_res[0]['other_category_name']?></option>    
                            </select>
                        
                        </div> 
<!--                         <div class="oneshop_mystoreSettinsField">
                        <span class="onshop_formsFieldLables"><h5>Manufacture Price :</h5></span>
                            <input type="text" class="oneshop_mystoreField" name="product_mdate"  maxlength="10" id="os_product_mDate" value="<?php echo $prod_res[0]['manufactering_date'];?>">
                        </div>  -->
                        <div class="oneshop_mystoreSettinsField">
                        <span class="onshop_formsFieldLables"><h5>Cost Price:</h5></span>
                            <input type="text" class="oneshop_mystoreField" name="product_costprice" id="os_product_costprice" value="<?php echo $store_prod[0]['cost_price'];?>">
                        </div> 
                        <div class="oneshop_mystoreSettinsField">
                        <span class="onshop_formsFieldLables"><h5>Sell Price:</h5></span>
                            <input type="text" class="oneshop_mystoreField" id="os_product_sellprice" name="product_sellprice"  value="<?php echo $store_prod[0]['sale_price'];?>">
                        </div>
						<div class="oneshop_mystoreSettinsField">
                        <span class="onshop_formsFieldLables"><h5>Discount :</h5></span>
                            <input type="text" class="oneshop_mystoreField" name="product_discount"  id="os_product_discount" value="<?php echo $store_prod[0]['discount'];?>">
                        </div>  
						<div class="oneshop_mystoreSettinsField">
                        <span class="onshop_formsFieldLables"><h5>Quantity:</h5></span>
                            <input type="text" class="oneshop_mystoreField" name="product_quantity" id="os_product_quantity" value="<?php echo $store_prod[0]['quantity'];?>">
                        </div>
						                                                                                       
                        <div class="oneshop_mystoreSettinsField">
                        <span class="onshop_formsFieldLables"><h5>Product Tags :</h5></span>
                        <textarea class="oneshop_mystoreField textAreaType"  name="product_specification" id="os_product_specification"><?php echo trim($store_prod[0]['product_tags']," ");?></textarea>
                        </div>                         
                        <div class="oneshop_mystoreSettinsField">
                        <span class="onshop_formsFieldLables"><h5>Description :</h5></span>
                        <textarea class="oneshop_mystoreField textAreaType" name="product_description"  id="os_product_description"><?php echo trim($store_prod[0]['description'],' ');?></textarea>
                        </div>                                                      
                        <button onlick="update_info();" class="oneshop_basicInfoBtn">Proceed</button>
                        </div>
                    
                        
					  
                               <div style="color:green;display:none" id="product_update_suc">Product updated successfully </div>                                                                                          
				</div>
			</div>
        	<div class="oneshop_rightSection">
            </div>  
        </form>
            </div>          

    <!--Oneshop Content ends Here(vinod 19-05-2015)-->            

    <!--Oneshop Footer starts Here(vinod 19-05-2015)-->
     <?php
$this->templates->app_footer(  ); 
?>
