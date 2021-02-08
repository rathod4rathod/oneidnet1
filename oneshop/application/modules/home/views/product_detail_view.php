<?php
$this->load->module('templates');
$this->templates->app_header();
$this->templates->os_mainmenu();
$this->load->module('stores');
$this->load->module("mycart");
$store_cnt=5;
$store_owner="no";
$store_manager="no";
$store_owner_details=$this->templates->get_store_ownerId();
$user_id=$this->templates->get_UserId();
if($store_owner_details!=""){
    $store_owner="yes";
}else{
    $manager_details=$this->templates->store_manager_return($user_id);
    if($manager_details["role"]=="ORDER_MANAGER" || $manager_details["role"]=="PRODUCT_MANAGER"){
        $store_manager="yes";
    }
}
//print_r($product_details);
 $store_code=$this->uri->segment(2);
$banner_path = base_url() . "assets/images/store_banners/";
 $theme_selected = $this->stores->getthemeselected($store_code);

if($theme_selected!=''){ 
     $sideimage =  base_url().'/assets/images/store_banners/'.$theme_selected.'.png';
     $midimage = base_url().'/assets/images/store_banners/mid'.$theme_selected.'.png'; 
 }else{ 
     $sideimage = base_url().'/assets/images/store_banners/1.png';
      $midimage = base_url().'/assets/images/store_banners/mid1.png'; 
     }
     //end store theme  selected
?>
<style>
.tooltip {
  position: relative;
  display: inline-block;
  border-bottom: 1px dotted black;
}

.tooltip .tooltiptext {
  visibility: hidden;
  width: 290px;
  background-color: black;
  color: #fff;
  text-align: center;
  border-radius: 6px;
  padding: 5px;
  overflow-y: auto;
  max-height: 200px;
  /* Position the tooltip */
  position: absolute;
  z-index: 1;
}

.tooltip:hover .tooltiptext {
  visibility: visible;
}
</style>
<script type="text/javascript" src="<?php echo base_url() . "assets/" ?>scripts/jquery.elevatezoom.js"></script>


<div class="oneshop_wrapper">
    <div class="oneshop_innerWrapper">  
    <!--Oneshop Content starts Here(vinod 19-05-2015)-->
    	<div class="oneshop_container_sectionnew">
            
       <div class="oneshop_banner_stip_newbox click_importantNotifications">

    <div class="oneshop_banner_left_box"  <?php echo "style= 'background-image: url($sideimage)'"; ?> >&nbsp;</div>
    <div class="oneshop_banner_stip_middle_content"  <?php echo "style= 'background-image: url($midimage)'"; ?> > 
        <?php $this->templates->os_oneshopheader("store_staff"); ?>
    </div>
    <div class="oneshop_banner_right_box"  <?php echo "style= 'background-image: url($sideimage)'"; ?> >&nbsp;</div>
</div> 
    
    <div class="clearfix">&nbsp;</div>
    
    <div class="oneshop_left_newcontainer pab10">
    
    <?php  
    $category_id=0;
    $product_category="";
    $product_aid=0;
    foreach ($product_details as $product_details_info) {
      $currency = $this->stores->getCurrency($product_details_info["store_code"]);
      // edited by mitesh -> currencyname; 
      $currencyname = $this->stores->getCurrencyName($product_details_info["store_code"]); 

      $mode=$product_details_info["mode"];
      $category_id = $product_details_info["product_category_id_fk"];
      //$subcategory_id = $product_details_info["subcategory_id"];
      $img=$product_details_info["prod_img1"];
      // echo $img;
      $store_name=$product_details_info["store_name"];
      $img_url=$zoom_img_url=base_url() . "stores/".$product_details_info["store_code"] ."/products/". $product_details[0]['product_aid'];
      $product_category=$product_details_info["category"];
      $product_aid=$product_details_info["product_aid"];
      ?>
        <input type="hidden" name="product_aid" id="dev_os_p_id" value="<?php echo $product_details[0]['product_aid'] ?>">	 
<input type="hidden" name="hstore_id" id="hstore_code" value="<?php echo $product_details[0]['store_code'] ?>"/>
    <div class="fll wi100pstg  pab5">

        <div class="fll mal10">
            <h1 class="normal lh26 fll" style="width:560px;"> <?php echo ucwords($product_details[0]["product_name"])?></h1>
        </div>

    </div>
          
          
        <div class="addtowashlist_wrap mat5">          
            <ul>
            <li>
            <span class="fll mat5"><img src="<?php echo base_url().'assets/images/view.png'?>" width="20" height="20"></span> 
            <a href="#"> <span> Total Views </span> </a> <br> <span class="bold mal10 fs14">  <?php echo $product_details[0]["total_views"]?>  </span>  
            </li>
            
            <li>
            <span class="fll mat5"><img src="<?php echo base_url().'assets/images/rate.png'?>" width="20" height="20"></span> 
             <span style="margin-left:10px;"> Average Rating </span>  <br> <span class="bold mal10 fs14"> <?php if(is_null($productavg[0]['avgrating']) ){ echo "0"; }else{ echo ceil($productavg[0]['avgrating'] ) ;} ?>  </span>  
            </li>
            
            <li>
            <span class="fll mat5"><img src="<?php echo base_url().'assets/images/Edit.png'?>" width="20" height="20"></span>
            <a href="<?php echo base_url().'product_reviews?product_id='.  base64_encode(base64_encode($product_aid))?>"> <span>Write a <br> REVIEW</span>  </a>
            </li>

            <li class="fll">
            <span class="fll mat5"><img src="<?php echo base_url().'assets/images/Interest.png'?>" width="20" height="20"></span>
            <a href="javascript:void(0)" id="os_Wishlist"> <span class="add-to-wishlist-text">Add to <br> WISHLIST</span>  </a>
            </li>
            </ul>
        </div>
          

<div class="clearfix"></div>


<div class="oneshop_product_bigimage_total_wrap mat20">

<!--<div class="oneshop_product_bigimage">-->

<!--</div>-->
<div class="oneshop_product_small_image" id="zoom_div">

<ul>
<?php
    $imgs_gallery=array("prod_img1","prod_img2","prod_img3","prod_img4");
      for ($i = 0; $i < count($imgs_gallery); $i++) {
          $img_arry=$imgs_gallery[$i];
          $img=$product_details_info[$img_arry];
          $img_path_url=$img_url."/mi/" .$img;
          $img_zoom_url=$img_url."/li/" .$img;
          $img_thumb_url=$img_url."/si/" .$img;
          if($img!=""){
      ?>
    <li><a href="#" data-image="<?php echo $img_path_url;?>" data-zoom-image="<?php echo $img_zoom_url;?>"><img src="<?php echo $img_thumb_url; ?>" class="product_dv" id="img_01"></a></li>  
    <?php 
    }}
    ?>
</ul>
</div>   
<?php 
  $img=$product_details_info['prod_img1'];
?>
<img src="<?php echo $img_url."/mi/".$img;?>" id="zoom_03" data-zoom-image="<?php echo $img_url."/li/".$img;?>" width="200" height="200"> 

</div>


<div class="product_rightbox_pricebox">
<div class="product_price box_sizing">
<div class="discount_wrap fll">
<?php
if($product_details_info["discount"]!=0){
  //edited by mitesh -> cost_price,sel_price,Discount format;
    $cost_price=$product_details_info["cost_price"];
    echo '<span class="price fll"> '.$currencyname.' '.number_format($cost_price, 2).' </span>  <span class="green mal5 fll"> ('.round($product_details_info["discount"],0).'% ) off </span> ';
}
?>
</div>
<div class="price_wrap fll">
<span class="fll mar5"> Price </span>
<?php
if($product_details_info["discount"]==0){
echo'<span class="fll price">' . $currencyname." ".number_format($product_details_info["cost_price"], 2).' </span>';
}
else
{
  echo'<span class="fll price">' . $currencyname." ".number_format($product_details_info["sale_price"], 2).' </span>';
}
?>
</div>
</div>


<div class="oneshop_product_images mat20">
            <h5 class="heading wi100pstg fll bold mab10"> Set Specifications </h5>
           
           <div class="wi100pstg mab10"> 
           <p class="fll wi100pstg bold">  Category  </p>
           <p class="gray">  <?php echo $product_details_info["category_name"];?>  </p>
           </div>
           
           <div class="wi100pstg mab10"> 
           <p class="fll wi100pstg bold">  Sub category  </p>
           <p class="gray">  <?php echo $product_details_info["subcategory_name"];?>  </p>
           </div>
           <?php if($product_details_info["warranty"] > 0) { ?>
           <div class="wi100pstg mab10"> 
           <p class="fll wi100pstg bold">  Warranty  </p>
           <p class="gray">  
           <?php echo ($product_details_info["warranty"] > 0)?$product_details_info["warranty"]:0;?>
            <?php echo ($product_details_info["warranty_type"] == 1)?'Day':'';?>
            <?php echo ($product_details_info["warranty_type"] == 2)?'Month':'';?>
            <?php echo ($product_details_info["warranty_type"] == 3)?'Year':'';?>
             </p>
           </div>
            <?php 
             }
             ?>
          <?php if($product_details_info["bulk_quantity"] > 0) { ?>
             <div class="wi100pstg mab10"> 
             <p class="fll wi100pstg bold">Bulk Quantity</p>
             <p class="gray">  <?php echo $product_details_info["bulk_quantity"];?>  </p>
             </div>
            <?php 
             }
            ?>
             <?php if($product_details_info["bulk_price"] > 0) { ?>
             <div class="wi100pstg mab10"> 
             <p class="fll wi100pstg bold">Bulk Price</p>
             <p class="gray">  <?php echo $product_details_info["bulk_price"];?>  </p>
             </div>
            <?php 
             }
            ?>
             <?php if($product_details_info["quantity"] > 0) { ?>
             <div class="wi100pstg mab10"> 
             <p class="fll wi100pstg bold">Total Quantity</p>
             <p class="gray">  <?php echo $product_details_info["quantity"];?>  </p>
             </div>
            <?php 
             }
            ?>
             <!-- <?php if($product_details_info["Discount"] > 0) { ?>
             <div class="wi100pstg mab10"> 
             <p class="fll wi100pstg bold">Total Discount</p>
             <p class="gray">  <?php echo $product_details_info["Discount"];?>  </p>
             </div>
            <?php 
             }
            ?> -->
             <?php if($product_details_info["shipping"] > 0) { ?>
             <div class="wi100pstg mab10"> 
             <p class="fll wi100pstg bold">Shipping Charge</p>
             <p class="gray">  <?php echo $product_details_info["shipping"];?>  </p>
             </div>
            <?php 
             }
            ?>
             <?php if($product_details_info["handling"] > 0) { ?>
             <div class="wi100pstg mab10"> 
             <p class="fll wi100pstg bold">Handling  Charge</p>
             <p class="gray">  <?php echo $product_details_info["handling"];?>  </p>
             </div>
            <?php 
             }
            ?>
             <?php if($product_details_info["product_tags"] != '') { ?>
             <div class="wi100pstg mab10"> 
             <p class="fll wi100pstg bold">Product Tags</p>
             <p class="gray">  <?php echo $product_details_info["product_tags"];?>  </p>
             </div>
            <?php 
             }
            ?>

<!--           <div class="wi100pstg mab10">
           <p class="fll wi100pstg bold">  Color  </p>
           <p class="gray">  Green  </p>
           </div>
           
           <div class="wi100pstg mab10"> 
           <p class="fll wi100pstg bold">  Space  </p>
           <p class="gray">  Texthere </p>
           </div>
           
           <div class="wi100pstg mab10"> 
           <p class="fll wi100pstg bold">  Color  </p>
           <p class="gray">  Green  </p>
           </div>
           
           <div class="wi100pstg mab10"> 
           <p class="fll wi100pstg bold">  Space  </p>
           <p class="gray">  Texthere </p>
           </div>-->
          <div class="price_box_datadiv box_sizing">
            <p class="fs14 pat5"> Change Currency </p>
            <div class="price_box_usdbox">
              <span class="fs11 fll"> <?php echo $currencyname?> </span>
              <p class="flr">
              <select id="currency_conv" class="price_box_usdbox_droupbox">
                  <option value="">Select Currency</option>
                <?php
                $clist_arry=explode("~",$currencies_list);
                for($c=0;$c<count($clist_arry);$c++){
                  $carray=explode("-",$clist_arry[$c]);
                  echo "<option value='".$carray[0]."'>".$carray[1]."</option>";
                }
                ?>
              </select>
              </p>

              <div class="acenter mat20 wi100pstg fll overflow">
                  <span class="fs14" id="curr_sym"> <?php echo $currencyname?> </span>
                  <input type="hidden" name="scurre" id="scurre" value="<?php echo $currencyname?>">
                  <?php
                    if($product_details_info["discount"]==0){
                      echo'<span class="price_box_usdbox_inrpricediv" id="conv_price">' .number_format($product_details_info["cost_price"],2).' </span>';
                    }
                    else
                    {
                      echo'<span class="price_box_usdbox_inrpricediv" id="conv_price">' .number_format($product_details_info["sale_price"],2).' </span>';
                    }
                  ?>
              </div>
            </div>
          </div>
    </div>
   <input type="checkbox" name="Terms" id="osdev_Terms">  
    <span class="bold">I agree to STORE'S Purchase Policy</span>
    <div class="tooltip" style="margin-top: 10px;"><img src="<?php echo base_url()."assets/images/infoo.png";?>">
    <span class="tooltiptext"><?php echo $product_details_info["purchase_policy"];?></span> 
    </div> 
<p class="wi100pstg fs11 red clearfix" id="osdev_term_error" style="display: none;"> Please accept the store's purchase policy by check the box!</p>
<div class="mat10 fll wi100pstg add_to_cart">

<span class="fll mat10"><input type="button" name="button" class="np_des_buy" id="addcart" value="ADD TO CART"> </span>
<span class="flr mat10 mal10"><input type="button" name="button" class="np_des_addtocart" value="BUY" id="buy_btn"> </span>
</div>

</div>

<div class="clearfix"></div>

<div class="wi100pstg mab10 fll">
<h3 class="mat10 fll wi100pstg heading_1"> Description </h3>
<p class="mat10"> 
    <?php echo $product_details_info["description"];?>
</p>
</div>

<?php
    }
?>
<div class="fll mat20 pab10 wi100pstg">
<h3 class="mat10 mab10 wi100pstg heading_1">Similar Products</h3>
    
<?php
$this->load->module("products");
//echo $product_category."->".$category_id;

$this->products->similar_Products($category_id,$product_category,$product_aid);
?>
<!--<div class="oneshop_pro_total_wrapper_div mat10">
    <div class="oneshop_proimagebox"> 
    <img src="<?php echo base_url().'assets/images/aa.jpeg'?>"> 
    </div>
    <div class="oneshop_product_ratebg_box">
    <p class="aleft"> ACCORE 3d Enlarged Screen With Speaker ... </p>
    <p class="bold fs14 aleft">Rs. 249</p>
    </div>
    </div>
   

<div class="oneshop_pro_total_wrapper_div mat10">
    <div class="oneshop_proimagebox"> 
    <img src="<?php echo base_url().'assets/images/ab.jpeg'?>"> 
    </div>
    <div class="oneshop_product_ratebg_box">
    <p class="aleft"> ACCORE 3d Enlarged Screen With Speaker ... </p>
    <p class="bold fs14 aleft">Rs. 249</p>
    </div>
    </div>
    
 
 <div class="oneshop_pro_total_wrapper_div mat10">
    <div class="oneshop_proimagebox"> 
    <img src="<?php echo base_url().'assets/images/ac.jpg'?>"> 
    </div>
    <div class="oneshop_product_ratebg_box">
    <p class="aleft"> ACCORE 3d Enlarged Screen With Speaker ... </p>
    <p class="bold fs14 aleft">Rs. 249</p>
    </div>
    </div>-->

    
</div>

</div>
    <div class="oneshop_right_newcontainer">
        

        <a href="<?php echo ONENETWORKURL.'oneshopinfo';  ?>" target="_self"><img src="<?php echo base_url() . "assets/"; ?>images/ad1.jpg" class="hotel_news_imgbox"></a>

   <a href="<?php echo ONENETWORKURL.'oneshopinfo';  ?>" target="_self"><img src="<?php echo base_url() . "assets/"; ?>images/ad2.jpg" class="hotel_news_imgbox"></a>

   </div>
            
            
        	                  
            </div>          
        </div>
    
</div>
<?php
    $this->templates->app_footer();
?>
<script type="text/javascript">
    $("#buy_btn").click(function(){
        var product_id = $("#dev_os_p_id").val();
        var store_code=$("#hstore_code").val();
        var scurr=$("#scurre").val();
        var term=document.getElementById('osdev_Terms');
        if(term.checked){
          document.getElementById('osdev_term_error').style.display = "none";
          $.ajax({
              type:"post",
              data:{product_id: product_id,store_code:store_code,scurr:scurr,mode:"buy"},
              url: oneshop_url+"/products/addItemsToCart/",
              success:function(data){
                var result=data.trim();
                if(result.indexOf("INSERTED")!=-1)
                {
                    var result_arry=result.split("-");
                    window.location.href= oneshop_url+"/mycart/myCartView?mode=buy&cart_id="+result_arry[1];
                }
              }
          });
        }
        else
        {
          document.getElementById('osdev_term_error').style.display = "block";
        }
    });
     //initiate the plugin and pass the id of the div containing gallery images 
   $("#zoom_03").elevateZoom({
	   gallery:'zoom_div', 
	   cursor: 'pointer', 
	   galleryActiveClass: 'active', 
	   imageCrossfade: true, 
	   loadingIcon: 'http://www.elevateweb.co.uk/spinner.gif',
	   zoomWindowOffetx: 10
   });
   //pass the images to Fancybox 
   $("#zoom_03").bind("click", function(e) { 
	   var ez = $('#zoom_03').data('elevateZoom');   
	   $.fancybox(ez.getGalleryList());
	   return false; 
   });
   // currency conversion by Pavani on 19-07-2016
  $("#currency_conv").change(function(){
    var price=<?php echo $product_details_info["sale_price"]?>;
    var to_currency=$(this).val();
    //edited by mitesh -> currencyname
    var from_currency='<?php echo $currencyname?>';
    // alert(round(price));
    callAJAX(oneshop_url+"/home/getCurrencyData",{current_price:price,from:from_currency,to:to_currency},function(data){
      // alert(data.trim());
      $("#curr_sym").text(to_currency);
      $("#conv_price").text(data);
    });
  });
    </script>
    <style type="text/css">
/*set a border on the images to prevent shifting*/ 
#zoom_div img{border:2px solid white;} 
/*Change the colour*/ 
.active img{border:2px solid #333 !important;}
</style>
