<?php
$this->load->module('templates');
$this->templates->app_header(  ); 
$this->templates->os_mainmenu(  ); 
?>      
    <!--Oneshop Content starts Here(vinod 19-05-2015)-->
    	<div class="oneshop_contentSection">
         	<div class="oneshop_friendStorePage">
            <div class="oneshop_cartItemsPageHead">
            	<h4><?php echo $brand_name;?> Stores</h4>
            </div>
              <input type="hidden" id="brand_name_id" value="<?php echo $brand_name;?>">
              <div id="inb_store_load">
           <?php
           $this->load->module("stores");
             $this->stores->brand_store_results($brand_name); 
           ?>
              </div>
            </div>
        </div>
    <!--Oneshop Content ends Here(vinod 19-05-2015)-->            
      <?php
$this->templates->app_footer(  ); 
?>

     <script>
    var cnt = '';
    var load_product_count = 0;
    $(window).scroll(function () {
      
        if ((($(window).scrollTop() + $(window).height()) >= $(document).height())) { 
               load_product_count=load_product_count+8;
            var brand_name = $("#brand_name_id").val();
                $.ajax({
                    type: 'POST',
                    url: oneshop_url+ "/stores/brand_store_results",
                    data: {load_product_count: load_product_count, brand_name: brand_name},
                    success: function (data) {
                        $("#inb_store_load").append(data);
                    }
                });
            }

    });
    </script>