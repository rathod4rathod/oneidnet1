<?php
$this->load->module("templates");
$this->templates->app_header();
$this->templates->os_mainmenu();
$store_code=$this->uri->segment(2);
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
<div class="oneshop_container_sectionnew">
  
    <div class="oneshop_banner_stip_newbox click_importantNotifications">

    <div class="oneshop_banner_left_box"  <?php echo "style= 'background-image: url($sideimage)'"; ?> >&nbsp;</div>
    <div class="oneshop_banner_stip_middle_content"  <?php echo "style= 'background-image: url($midimage)'"; ?> > 
        <?php $this->templates->os_oneshopheader("store_activities"); ?>
    </div>
    <div class="oneshop_banner_right_box"  <?php echo "style= 'background-image: url($sideimage)'"; ?> >&nbsp;</div>
</div> 
   
    <div class="oneshop_container_middle_section mat10">
        <div class="store_mainwrap">
        <div class="oneshop_left_newcontainer pab10">    
         <div class="hd_heading">
            	<h1>Store Activity Log  <span></span></h1>
            </div>         
            
            <div class="click_fromdatetodate_wrap">
                <p class="fll"> 
                    <span class="fll mat5 mar10"> FILTER BY: </span> 
                    <span> 
                        <select class="oneshop_specifiedselect_new" id="filter_by">
                            <option value="">--Filter by --</option>
                            <option value="orders">Orders Received </option>
                            <option value="order_cancellations">Order Cancellations </option>
                            <option value="store_reviews">Store Reviews</option>
                            <option value="product_reviews">Product Reviews</option>
                            <option value="cart_items">Cart items</option>
                            <option value="wishlist">Wish list</option>
                        </select>
                    </span> 
                </p>
            </div>
            <div id="store_activity_div">                 
                <?php
                    $this->load->module("stores");
                    $this->stores->storeActivityLogTpl($store_code);
                ?>
            </div>
	</div>
        <div class="oneshop_right_newcontainer">
            
        </div>
        </div>
    </div>
</div>
<?php
$this->templates->app_footer();
?>
<script type="text/javascript">
    $("#filter_by").change(function(){
        var store_code='<?php echo $store_code?>';
        var filter_val=$(this).val();
        $.ajax({
            type:"post",
            url: oneshop_url+"/stores/storeActivityLogTpl/"+store_code,
            data:{filter_by:filter_val},
            success:function(data){
                $("#store_activity_div").html(data);
            }
        });
        //alert(filter_val);
    });
    </script>