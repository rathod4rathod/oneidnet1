<?php
//print_r($store_products);
?>
<div class="date_submit">
              <div class="d_d"><span class="fd_n">From Date : </span><input type="text" id="orc_datepicker4" placeholder="From date"></div>
              <div class="d_d"><span class="fd_n">To Date : </span><input type="text" id="orc_datepicker5" placeholder="To date"></div>
               <div class="d_d">
        <select id='osdev_Category_id_forsale'>
            <?php foreach($store_products as $store_products_info) 
            {
              ?>
            <option value="<?php echo $store_products_info["groups"]?>"><?php echo $store_products_info["groups"]?></option>
                <?php
            }?>
        </select>
    </div>
              <div class="d_b"><input type="button" id="cat_wise_sub" value="Submit"></div>
 <script>
$(function() {
$( "#orc_datepicker4" ).datepicker();
$( "#orc_datepicker5" ).datepicker();
});
</script>
<div class="d_m" style=""><img  clas="rp_dwnld" id="ctws_dwnld_excel" src="<?php echo base_url()."assets/images/download_down_arrow.png";?>" width="30px;"></div>
            </div>
<div class="oneshop_reports">
    <?php //echo "<pre>";print_R($store_products);echo "</pre>";?>
    <div id="osdev_chart_append">
    </div>
</div>


<script>
  
</script>
