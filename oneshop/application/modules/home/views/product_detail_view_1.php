<?php
$this->load->module('templates');
$this->templates->app_header();
$this->templates->os_mainmenu();
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
//echo "<span style='color:#fff'>store owner:".$store_owner."-order manager:".$order_manager."-product manager:".$product_manager."</span>";
/*echo "<pre>";
print_r($product_details);
echo "</pre>";*/
?>     
<script type="text/javascript" src="<?php echo base_url() . "assets/" ?>scripts/jquery.js"></script>
<script type="text/javascript" src="<?php echo base_url() . "assets/" ?>scripts/jquery.easyzoom-modified.min.js"></script>
<link rel="stylesheet" href="<?php echo base_url() . "assets/" ?>css/easyzoom.css" type="text/css">
<script type="text/javascript" src="<?php echo base_url() . "assets/" ?>scripts/jRating.jquery.js"></script>
<link rel="stylesheet" href="<?php echo base_url() . "assets/" ?>css/jRating.jquery.css" type="text/css" />
<link rel="stylesheet" href="<?php echo base_url() . "assets/" ?>css/model.css" type="text/css" />
<!--Oneshop Content starts Here(vinod 19-05-2015)-->
<div class="oneshop_container_sectionnew">
    <?php $this->templates->os_oneshopheader(); ?>
    <input type="hidden" name="prodcut_id" id="product_id" value="<?php echo $product_details[0]['product_aid'] ?>"/>
    <input type="hidden" name="hstore_id" id="hstore_id" value="<?php echo $product_details[0]['store_id'] ?>"/>
    <input type="hidden" name="hmode" id="hmode" value="<?php echo $product_details[0]['mode'] ?>"/>
    <input type="hidden" name="hstore_cnt" id="hstore_cnt" value="<?php echo $store_cnt?>"/>
    <input type="hidden" name="hcurrency_code" id="hcurrency_code" value="<?php echo $product_details[0]['currency_code']?>"/>
    <?php  
    foreach ($product_details as $product_details_info) {
      $mode=$product_details_info["mode"];
      $category_id = $product_details_info["Category"];
      $subcategory_id = $product_details_info["subcategory_id"];
      $img=$product_details_info["prod_img1"];
      $store_name=$product_details_info["store_name"];
      $img_url=$zoom_img_url=base_url() . "stores/".$product_details_info["store_code"] ."/products/". $product_details[0]['product_aid'];
      ?>
      
      <div class="oneshop_leftSection">
          <div class="oneshop_productDetailedView">
              <div class="oneshop_findProductStoreDetails">
                  <?php
                  if($product_details_info["logo_path"]!=""){
                  ?>
                  <img src="<?php echo STORE_PATH . $product_details_info["store_code"] . "/logo/li/" .$product_details_info["logo_path"] ; ?>">
                  <?php
                  }else{
                  ?>
                  <img src="<?php echo base_url() . "/assets/images/avatar.png" ; ?>">
                  <?php
                  }
                  ?>                  
                  
                  <h3><?php echo $store_name; ?></h3>
              </div>            
              <div class="oneshop_productImageSection">

                  <div id="site-wrapper" style="">
                      <div id="demo" class="zoom resize<?php echo $product_details_info["product_aid"]; ?>" data-image="<?php echo $zoom_img_url."/li/".$img; ?>"> 
                          <img src="<?php echo $img_url."/li/".$img; ?>" class="oneshop_productMainImage" id="mainimg<?php echo $product_details_info["product_aid"]; ?>">
                          <div id="preview-zoom"></div>
                      </div>
                      <div id="container-zoom">
                          <div id="window-zoom" style="display:none;"></div>
                      </div>
                  </div>


                  <div class="oneshop_productDetailedViewImageViews">
                      <ul>
                          <?php
                          $imgs_gallery=array("prod_img1","prod_img2","prod_img3","prod_img4");
                            for ($i = 0; $i < count($imgs_gallery); $i++) {
                                $img_arry=$imgs_gallery[$i];
                                $img=$product_details_info[$img_arry];
                                $img_path_url=$img_url."/si/" .$img;                            
                                if($img!=""){
                            ?>
                            <li><img src="<?php echo $img_path_url; ?>" class="product_dv" id="<?php echo $product_details_info["product_aid"]; ?>"></li>
                            <script>
                              //02-06-2015 by venkatesh
                              $(document).on("click", ".product_dv", function () {
                                  var product_image_id = $(this).attr("id");
                                  var imgpath = $(this).attr("src");
                                  var res = imgpath.split("/");
                                  res[res.length - 2] = "li";
                                  var change_path = res.join("/");
                                  $('#window-zoom img').attr("src", change_path);
                                  $("#mainimg" + product_image_id).attr("src", change_path);
                                  $(".resize" + product_image_id).attr("data-image", change_path);

                              });
                            </script>

                                <?php }}
                          ?>

                      </ul>
                  </div>
                  <span class="oneshop_productDetailedViewRatingSection">
                        <h4>Rating :</h4>
                        <div class="oneshop_productDetailedViewRating">
                        	<img src="<?php echo base_url(). "assets/"; ?>images/Favorite.png">
                            <img src="<?php echo base_url(). "assets/"; ?>images/Favorite.png">
                            <img src="<?php echo base_url(). "assets/"; ?>images/Favorite.png">
                            <img src="<?php echo base_url(). "assets/"; ?>images/Favorite.png">
                            <img src="<?php echo base_url(). "assets/"; ?>images/Favorite-Half.png">
                        </div>
                        <h3>4.5</h3>
                    </span> 
                  <!--<span class="oneshop_productDetailedViewRatingSection">
                      <h4>Rating :</h4>
                       <?php  //$rating=number_format($product_details_info["rank_weitage"] / $product_details_info["review_count"], 1); ?>
                    
<!--                      <div data-id="6" data-average="4.3" class="exemple6" style="height: 20px; float:left;width: 115px; overflow: hidden; z-index: 1; position: relative; cursor: default;">
                  <div class="os_productRatingColor" style="width: <?php //echo $rating*20;?>%;"></div>
                  <div class="os_productRatingAverage" style="width: 0px; top: -20px;"></div>
                  <div class="os_productStar" style="height: 20px; top: -40px; background: url(&quot;<?php echo base_url();?>assets/images/stars.png&quot;) repeat-x scroll 0% 0% transparent; width: 115px;"></div>
              </div>-->
                      <h3> <?php //echo $rating." / 5"; ?> </h3>
                  </span>                  
              </div>
              <div class="oneshop_productDetailedViewDetails">
                  <div class="oneshop_productDetailedViewHeader">
                      <h3><?php echo $product_details_info["product_name"]; ?></h3>
                      <span class="oneshop_prouctDetailedViewViews"><h5>Views :</h5><h4><?php echo $product_details_info["viewed_count"];?></h4></span>
                  </div> 
                  <span class="oneshop_productDetailedViewSections">
                      <h4>Category :</h4>
                      <h3><?php echo $product_details_info["category_name"]; ?></h3>
                  </span>            
                  <span class="oneshop_productDetailedViewSections">
                      <h4>Sub Category :</h4>
                      <h3><?php echo $product_details_info["subcategory_name"]; ?></h3>
                  </span>                                         
                  <span class="oneshop_productDetailedViewSections">
                      <h4>In Stock :</h4>
                      <h3><?php echo $product_details_info["quantity"]; ?></h3>
                  </span>  
                  
                  <span class="oneshop_productDetailedViewSections">
                      <h4>Price:</h4>
                      <?php if($product_details_info["discount"]!=0){
                        ?>
                      <h3><strike><?php echo $product_details_info["cost_price"]; ?> </strike> </h3>
                          <?php
                      } else{
                        ?>
                      <h3><?php echo $product_details_info["cost_price"]; ?>  </h3>    
                          <?php
                      }?>
                      
                  </span>
                  
                  <span class="oneshop_productDetailedViewSections">
                      <h4>Discount :</h4>
                      <h3><?php echo $product_details_info["discount"]; ?>%</h3>
                  </span>                       
                  
                  <span class="oneshop_productDetailedViewSections">
                      <h4>Sale :</h4>
                      <?php 
                      $sell_price= $product_details_info["sale_price"]-(($product_details_info["sale_price"]*$product_details_info["discount"])/100); 
                      ?>
                      <h3 id="os_sell_price"><?php echo $sell_price;?></h3>
                      <a href="javascript:void(0)" style="float:right;font:13px Arial;text-decoration: underline" id="convert_link">Convert</a>
                  </span>                                                                             
                  <span class="oneshop_productDetailedViewSpecifications">
                      <h4>Specifications</h4>
  <!--<p>This document contains detailed information about the design and development specifications of each module which were decided over numerous sessions that were convened by Mr. Jaime Martinez along with Mr. Ameen and Mr. Ahmed. These sessions were held with the.</p>-->
                      <p><?php echo $product_details_info["specification"]; ?></p>

                  </span>
                  <span class="oneshop_productDetailedViewDescription">
                      <h4>Description</h4>
  <!--                    	<p>This document contains detailed information about the design and development specifications of each module which were decided over numerous sessions that were convened by Mr. Jaime Martinez along with Mr. Ameen and Mr. Ahmed. These sessions were held with the.</p>-->
                      <p><?php echo $product_details_info["description"]; ?></p>
                  </span> 
                  <div class="exemple6" data-average="<?php echo number_format($product_details_info["rank_weitage"] / $product_details_info["review_count"], 1); ?>" data-id="6"></div>
                  <div class="datasSent" style="display:none;"></div>
<input type="hidden" name="item_number" id="dev_os_p_id" value="<?php echo $product_details[0]['product_aid'] ?>">	 
 <?php
 if($store_owner=="no" && $store_manager=="no"){
?>
<button class="oneshop_basicInfoBtn oneshop_productBuyBtn" id="dev_os_product_detail_view1">Buy</button>
 <img src="<?php echo base_url() . "assets/" ?>images/cart.png" class="oneshop_cartIcon" id="addcart">                                       
 <img src="<?php echo base_url() . "assets/" ?>images/Wishlist.png" class="oneshop_wishlist" id="os_Wishlist">                                       
                  <a href="#pavani"><img src="<?php echo base_url() . "assets/" ?>images/Share.png" class="oneshop_wishlist" style="width:28px;"></a>                                       
 <?php
 }
 ?>               
                  
                 

<div id="pavani" class="modalbg">
  <div class="dialog">
    <a href="#close" title="Close" class="close">X</a>
  	<h2><img  src="<?php echo STORE_PATH . $product_details_info["store_id"] . "/products/si/" . $img[0]; ?>"> <?php echo $product_details_info["name"]; ?></h2>
    </br>
    <input id="os_prd_shr_img" type="hidden" value="<?php echo STORE_PATH . $product_details_info["store_id"] . "/products/mi/" . $img[0]; ?>">
    <p>Share to <input type="radio" name="os_product_share" value="Buzzin" id="bin"> Buzzin <input type="radio" name="os_product_share" value="Click" > Click </p>
    <p>Privacy 
        <select id="os_share_privacy">
            <option value="Public">Public</option>
            <option value="Friends">Friends</option>
            <option value="Private">Private</option>
        </select>
    </p>
    <p id='os_success_msg'></p>
    <p><input type="button" value="Share" id="os_product_share"> <a href="javascript:void(0)"><input type="button" value="Cancel" href="#close" id="os_sh_popup"  > </a></p>    
    

	</div>
</div>
              </div>
          </div>

          <?php
        }
        ?>
    </div>
    <?php
    $this->load->module("ads");
    $this->ads->fixed_Width_Ads_View();
    ?>         
    <div class="oneshop_left_newcontainer pab10">    
<!--        <div class="titlecontainer acenter">
            <div class="titledeco">
                <h4 class="title-text fkinlineblock black">  Heading Goes Here  </h4>
            </div>
        </div>-->
<?php
if($store_manager=="no" && $store_owner=="no"){    
?>
<div class="comment-box mat10 fll"><!--comment box start here-->
    
    <div class="incomment-box"><!--in-comment box start here-->
        <p class="commenthead">Comments</p>                                 
        <div class="left-commentbox"><!--leftcomment box start here--> 
            <?php
            $limg_url=ONEIDNETURL."data/".$loggedinuser_img;
            ?>
            <img class="imgitem" alt="icon" src="<?php echo $limg_url;?>">  
        </div><!--leftcomment closed here-->
        <div class="right-commentbox"><!--rightcomment box start here-->
            <textarea class="txt-area" id="review_txt"></textarea>
        </div><!--rightcomment closed here-->
        <div class="flr mar10 mat5">                              
            <span><input type="button" value="Post Now" class="np_des_addaccess_btn" name="button" id="post_btn"></span>
        </div>
    </div><!--in-comment box closed here-->
</div> <!--comment box end here-->
<?php
}
?>
<div id="more_reviews">
    <input type="hidden" name="hreviews_cnt" id="hreviews_cnt" value=""/>
        <?php
            $product_aid=$product_details[0]['product_aid'];
            $this->load->module("products");
            $this->products->productReviewsTpl($product_aid);
        ?>
    </div>
<div style="border:0px solid red;" id="load_more_div"><a href="javascript:void(0)" id="load_more">View More</a></div>
    </div>
    
</div>          
<!--Oneshop Content ends Here(vinod 19-05-2015)-->            

<?php
$this->templates->app_footer();
$this->load->module("home");
$list=$this->home->getCurrencyList();
?>
<script>
// activate the jQuery plugin
  $("div.zoom").easyZoom({
      selector: {
          preview: "#preview-zoom",
          window: "#window-zoom"
      }
  });
</script>


<script type="text/javascript">
  $(document).ready(function () {
      $(".exemple6").jRating({
          length: 5,
          decimalLength: 1,
          showRateInfo: false
      });
  });  
  $(document).on("click","#convert_link",function(){
    var currency_code=$("#hcurrency_code").val();
    var amt=<?php echo $sell_price;?>;
    var sdata_append='<div class="click_createGroupFormField"><span class="click_createGroupFormFieldLable"><h4>From :<span class="mustgive"></span></h4></span><input type="text" class="click_createGroupFormFieldInput" id="from_currency" name="from_currency" value="'+currency_code+'" readonly></div>';
    sdata_append+='<div class="click_createGroupFormField"><span class="click_createGroupFormFieldLable"><h4>To :<span class="mustgive"></span></h4></span><select class="click_createGroupFormFieldInput" id="to_currency" name="to_currency"><?php echo $list; ?></select></div>';
    sdata_append+='<div class="click_createGroupFormField"><span class="click_createGroupFormFieldLable"><h4>Amount :<span class="mustgive"></span></h4></span><input type="text" class="click_createGroupFormFieldInput" id="amount" name="amount" value="'+amt+'" readonly></div>';
    sdata_append+='<div class="click_createGroupFormField"><span class="click_createGroupFormFieldLable" id="result" style="display:none;"></span></div>';
    var footer_append='<div class="click_createGroupPopUpFooter"><div class="click_createGroupPopUpFooterOptions"><input type="button" name="convert_btn" id="convert_btn" value="Convert" class="click_reportProblemBtn"></div></div>';
    $("#click_createAlbumPopUp .click_createGroupForm").html(sdata_append);
    $("#click_createAlbumPopUp .click_popUpSection").append(footer_append);
    $("#click_createAlbumPopUp .click_createGroupPopUpHeader h4").text("Currency Converter");
    toggle_visibility("click_createAlbumPopUp");
  });
  $(document).on("click","#convert_btn",function(){
    var from=$("#from_currency").val();
                    var to=$("#to_currency").val();
                    var amount=$("#amount").val();
                    $.ajax({
                      type:"post",
                      url: oneshop_url+"/home/currencyCalc/",
                      data:{from_currency:from,to_currency:to,amount:amount},
                      success:function(data){
                        var result=data.trim();
                        $("#os_sell_price").html(result);
                        toggle_visibility("click_createAlbumPopUp");
                      }
                    });
  });
      //10-june-2015 by venkatesh
    $(document).on("click", ".jStar", function () {
        var rating = $(".datasSent").html();
        var product_id = $("#product_id").val();
        $.ajax({
            type: 'POST',
            url: oneshop_url + "/products/update_product_rating",
            data: {rating: rating, product_id: product_id},
            success: function (data) {
                //alert(data);
            }
        });
    });
  $("#post_btn").click(function(){
        var review_txt=$("#review_txt").val();
        var product_id=<?php echo $product_id;?>;
        //alert(review_txt);
        $.ajax({
            type:"post",
            url:oneshop_url+"products/insertReviews",
            data:{comment_txt:review_txt,product_id:product_id},
            success:function(data){
                alert(data);
            }        
        });
    });
  
</script>
<style type="text/css">
  .click_popUpSection{
    position: absolute;
    float: left;
    overflow-X: hidden;
    overflow-Y: none;
    width: 850px;
    height: 500px;
    border-radius: 5px;}	
  .click_createGroupPopUpHeader{
	float: left;
	width: 500px;
	height: 40px;
	background-color: #ddd;
	border-bottom: solid 1px #ccc;
	border-top-right-radius: 5px;
	border-top-left-radius: 5px;}	
.click_createGroupPopUpHeader h4{
	float: left;
	font: 16px Arial;
	color: #777;
	margin: 10px;}
.click_createGroupForm{
	float: left;
	width: 500px;
	background-color: #f9f9f9;
	height: 218px;}	
.click_createGroupFormField{
	float: left;
	margin: 5px 0 0 25px;}
.click_createGroupFormFieldLable{
	float: left;
	width: 150px;
	height: 30px;
	overflow: hidden;}	
.click_createGroupFormFieldInput{
	float: left;
	width: 290px;
	height: 30px;
	margin: 0px;
	padding: 0 5px 0 5px;
	background-color: #f5f5f5;
	border: solid 1px #ccc;}
	
.click_createGroupFormFieldLable h4{
	float: right;
	font: 13px Arial;
	color: #555;
	margin: 5px;}		
/*---PopUp Style Starts Here(Vinod 04-06-2015)---*/
</style>
<script type="text/javascript">
    var cnt=1;
    $("#load_more").click(function(){
        var product_id=$("#product_id").val();
        $.ajax({
            type:"post",
            data:{counter:cnt},
            url: oneshop_url+"/products/productReviewsTpl/"+product_id,
            success:function(data){
                //alert(data);
                $("#more_reviews").append(data);
                cnt++;
            }
        });
    });
</script>
