<?php
$this->load->module('templates');
$this->templates->app_header();
$this->templates->os_mainmenu();

?>
<script type="text/javascript" src="<?php echo base_url() . "assets/" ?>scripts/jquery.elevatezoom.js"></script>

<div class="oneshop_wrapper">
    <div class="oneshop_innerWrapper">  
    <!--Oneshop Content starts Here(vinod 19-05-2015)-->
    	<div class="oneshop_container_sectionnew">
        
            <div class="oneshop_banner_stip_newbox click_importantNotifications">
    <div class="oneshop_banner_left_box">&nbsp;</div>
    <div class="oneshop_banner_stip_middle_content">  
        <?php
        $this->templates->os_oneshopheader("product_reviews",$product_details[0]["store_code"]);
        ?>
    </div>
    <div class="oneshop_banner_right_box">&nbsp;</div>
            <div class="clearfix"></div>
            
    </div>
    
    
    <div class="fll wi100pstg mat30  pab5">
        <?php
       
         if($product_details[0]["primary_image"]!="" && file_exists('stores/'.$product_details[0]["store_code"].'/products/'.$product_details[0]["product_aid"].'/mi/'.$product_details[0]["primary_image"])){
            $img_url= base_url().'stores/'.$product_details[0]["store_code"].'/products/'.$product_details[0]["product_aid"].'/mi/'.$product_details[0]["primary_image"];
        }else{
			$img_url=base_url().'assets/images/default_product_60.png';
			}
        
        ?>
        <p class="fll" style="width:45px; float:left;">
			<img src="<?php echo $img_url?>" class="oneshop_profilePic"></p>
        <div class="fll mal10">
            <h1 class="normal mab20 lh26 fll" style="width:560px;"> <?php echo ucfirst($product_details[0]["product_name"])?></h1>
        </div>
    </div>
          
          
        <div class="addtowashlist_wrap mat5">          
            <ul>            
            <li>
            <span class="fll mat5"><img src="<?php echo base_url().'assets/images/view.png'?>" width="20" height="20"></span> 
            <a href="javascript:void(0);"> <span> Total Views </span> </a> <br> <span class="bold mal10 fs14"> <?php echo $product_details[0]["total_views"]?>  </span>  
            </li>
            
            <li>
            <span class="fll mat5"><img src="<?php echo base_url().'assets/images/rate.png'?>" width="20" height="20"></span> 
            <a href="javascript:void(0);"> <span> Average Rating </span> </a> <br> <span class="bold mal10 fs14">  <?php if(is_null($productavg[0]['avgrating']) ){ echo "0"; }else{ echo ceil($productavg[0]['avgrating'] ) ;} ?> </span>  
            </li>
            <?php
            if($store_owner!=1){
              ?>
            <li class="fll">
            <span class="fll mat5"><img src="<?php echo base_url().'assets/images/Interest.png'?>" width="20" height="20"></span>
            <a href="javascript:void(0);"> <span class="add-to-wishlist-text">Add to <br> WISHLIST</span>  </a>
            </li>
            <?php
            }
            ?>
            </ul>
    	</div>

<div class="clearfix"></div>

 <?php
    //echo $store_owner;
    if($store_owner==0){
    ?>
<div class="standalone_reviewbox mat30 mab10 fll"><!--comment box start here-->

<div class="incomment-box"><!--in-comment box start here-->

<div class="fll overflow wi100pstg">
<p class="commenthead fs14 fll"> Write Your Review for <?php echo "<b>".ucfirst($product_details[0]["product_name"])."</b>"?>  </p>                             
<p class="flr mar20 mat10" id="rating_p"> 
<span class="fll rate-btn-1 rate-btn" id="1"></span> 
<span class="fll rate-btn-2 rate-btn" id="2"></span> 
<span class="fll rate-btn-3 rate-btn" id="3"></span> 
<span class="fll rate-btn-4 rate-btn" id="4"></span> 
<span class="fll rate-btn-5 rate-btn" id="5"></span> 

</p>
</div>
    <?php
    if($order_details!=0){
    ?>
    <div>
        <select id="order_select">
            <option value="">Select Order</option>
            <?php
            foreach($order_details as $olist){
              echo "<option value='".$olist["order_code"]."'>".$olist["order_code"]."</option>";
            }
            ?>
        </select>
    </div>
    <?php
    }
    ?>
<div class="left-commentbox"><!--leftcomment box start here-->
 
  <img src="<?php echo $img_url;?>" alt="icon" class="imgitem">
  
  </div><!--leftcomment closed here-->
  <div class="right-commentbox"><!--rightcomment box start here-->
      <textarea class="writwareview_textarea" id="review_txt" maxlength="150"></textarea>
  <input type="hidden" name="pr_rating" id="pr_rating" value="" >
					
  </div><!--rightcomment closed here--> 
   
   <div class="clearfix"></div>
                                
  <p class="fll fs11" style="margin-left:80px;">
      <span id="text_count">150</span> Characters left
  </p>
  
  <div class="flr mar10 mat5">                              
   <span><input type="button" name="button" class="np_des_addaccess_btn mar5" id="post_btn" value="SUBMIT"></span>
   </div>
   
  </div><!--in-comment box closed here-->
</div>
<?php
  }
  ?>

<div class="fll wi100pstg" id="reviews_div">
<?php
$product_id=$product_details[0]["product_aid"];
$this->load->module("products");
$this->products->productReviewsTpl($product_id);
?>
</div>

</div>
  
<div class="oneshop_right_newcontainer">

       

</div> 
            
            </div>
</div>
<?php
$this->templates->app_footer();
?>
<script type="text/javascript">
    $("#post_btn").click(function(){
        var error =0;
        var review_txt=$("#review_txt").val();
         if(review_txt==''){
          $("#review_txt").addClass("redfoucusclass");
          error++;
        }
        if($("#order_select").length){
          var order_no=$("#order_select").val();
          if(order_no===""){
            $("#order_select").addClass("redfoucusclass");
            error++;
          }else{
            $("#order_select").removeClass("redfoucusclass");
          }
        }
        else{
          alert("You are not authorized to send review as you haven't purchased this product from this store");
          error++;
        }
        //alert(error);
       if(error==0){
        var rating = $('#pr_rating').val();
        var product_id=<?php echo $product_id;?>;
        $.ajax({
            type:"post",
            url: oneshop_url+"/products/insertReviews",
            data:{comment_txt:review_txt,rating:rating ,product_id:product_id},
            success:function(data){
                var result=data.trim();
                if(result==1){
                    $("#review_txt").text("");
                    window.location.reload();
                }
            }        
        });
	 }else{
		 return false;
		 }
        
    });
    $("#review_txt").keyup(function(){
      var cnt=150-$(this).val().length;
      $("#text_count").html(cnt);
    });
        $(function(){
            $('.rate-btn').hover(function(){
                $('.rate-btn').removeClass('rate-btn-hover');
                var therate = $(this).attr('id');
                 $('#pr_rating').val(therate);
                for (var i = therate; i >= 0; i--) {
                    $('.rate-btn-'+i).addClass('rate-btn-hover');
                };
            });           
                            
            $('.rate-btn').click(function(){    
                var therate = $(this).attr('id');
                var product_id=<?php echo $product_id;?>;
                //var dataRate = 'post_id=<?php echo $post_id; ?>&rate='+therate; //
                $('.rate-btn').removeClass('rate-btn-active');
                for (var i = therate; i >= 0; i--) {
                    $('.rate-btn-'+i).addClass('rate-btn-active');
                };
                $('#pr_rating').val(therate);
                
            });
        });
</script>
