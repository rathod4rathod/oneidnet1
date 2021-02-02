<?php
$this->load->module('templates');
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
 
<link rel="stylesheet" href="<?php echo base_url() . "assets/" ?>css/jquery-ui.css">
<script src="<?php echo base_url() . "assets/" ?>scripts/jquery-ui.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    var s = $(".click_importantNotifications");
    var pos = s.position();                    
    $(window).scroll(function() {
        var windowpos = $(window).scrollTop();
        if (windowpos > pos.top) {
            s.addClass("stick");
        } else {
            s.removeClass("stick"); 
        }
    });
});
</script>

<script type="text/javascript" src="<?php echo base_url() . "assets/" ?>scripts/canvasjs.min.js"></script>
<!--Oneshop Content starts Here(vinod 19-05-2015)-->
<div class="oneshop_container_sectionnew">
        <div class="oneshop_banner_stip_newbox click_importantNotifications">

    <div class="oneshop_banner_left_box"  <?php echo "style= 'background-image: url($sideimage)'"; ?> >&nbsp;</div>
    <div class="oneshop_banner_stip_middle_content"  <?php echo "style= 'background-image: url($midimage)'"; ?> > 
        <?php $this->templates->os_oneshopheader("store_reports"); ?>
    </div>
    <div class="oneshop_banner_right_box"  <?php echo "style= 'background-image: url($sideimage)'"; ?> >&nbsp;</div>
</div> 
    
    
    
    	<div class="oneshop_ReportsPage">
            <input type="hidden" id="hstore_code" name="hstore_code" value="<?php echo $store_code;?>"/>
<!--		<div class="oneshop_ReportsPageHead">
			<h4>My Store Reports</h4>
		</div>-->

		<div class="wi100pstg mab10 minheight600 fll">
<div class="titlecontainer acenter">
                        <div class="titledeco">
                                <h4 class="title-text fkinlineblock black">  REPORTS  </h4>
                        </div>
                </div>
		  <?php 
		  $this->load->module("store_reports");
		  $this->store_reports->order_recieved_chart($store_code);
		  $this->store_reports->order_cancelation_chart($store_code);
		  //$this->store_reports->category_wise_sale_chart($store_code);
		  $this->store_reports->product_wise_sale_chart($store_code);		  
		  ?>
		   
			
<!--                <div class="oneshop_reports">report4</div>-->
			
		</div>
	</div>
</div>
<!--Oneshop Content ends Here(vinod 19-05-2015)-->            
     <?php
$this->templates->app_footer(  ); 
?>
    
    
<script>
       //08-june-2015 by venaktesh:
    var category_id = $("#osdev_Category_id_forsale").val();
    var store_code=$("#hstore_code").val();
    $.ajax({
        type: 'POST',
        data: {category_id: category_id},
        url: oneshop_url + "/store_reports/category_wise_sale/"+store_code,
        success: function (data) {          
            $("#osdev_chart_append").html(data);
        }
    });
    
    
    
    //09-june-2015 by venkatesh :
    var product_id_forsale = $("#osdev_product_id_forsale").val();
    $.ajax({
        type: 'POST',
        data: {product_id_forsale : product_id_forsale},
        url: oneshop_url + "/store_reports/product_wise_sale/"+store_code,
        success: function (data) {
            $("#osdev_productsale_chart_append").html(data,function (){  });
        }
    });
 //09-june-2015 by venkatesh :
    $("#osdev_product_id_forsale").change(function () {        
        $("#orc_datepicker6").val("");
        $("#orc_datepicker7").val("");
        var product_id_forsale = $("#osdev_product_id_forsale").val();
        $.ajax({
            type: 'POST',
            data: {product_id_forsale: product_id_forsale},
            url: oneshop_url+ "/store_reports/product_wise_sale/"+store_code,
            success: function (data) {
                //alert(data);
                $("#osdev_productsale_chart_append").html(data);
            }
        });
    });
  
  
    </script>
