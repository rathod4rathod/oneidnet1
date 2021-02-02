<div class="date_submit">
              <div class="d_d"><span class="fd_n">From Date : </span><input type="text" id="orc_datepicker6" placeholder="From date"></div>
              <div class="d_d"><span class="fd_n">To Date : </span><input type="text" id="orc_datepicker7" placeholder="To date"></div>
               <div class="d_d">
        <Select id='osdev_product_id_forsale'>
            <?php foreach($own_store_products as $own_store_products_info) 
            {
              ?>
            <option value="<?php echo $own_store_products_info["product_aid"]?>"><?php echo $own_store_products_info["product_name"]?></option>
                <?php
            }?>
        </select>
    </div>
              <div class="d_b"><input type="button" id="product_w_s" value="Submit"></div>
 <script>
$(function() {
$( "#orc_datepicker6" ).datepicker();
$( "#orc_datepicker7" ).datepicker();
});
</script>
<div class="d_m"  style=""><img  clas="rp_dwnld" id="prtws_dwnld_excel" src="<?php echo base_url()."assets/images/download_down_arrow.png";?>" width="30px;"></div>
            </div>

<div class="oneshop_reports">
    <?php //echo "<pre>";print_R($store_products);echo "</pre>";?>
   
    <div id="osdev_productsale_chart_append">
        
    </div>
    
</div>


<script>
 
</script>

