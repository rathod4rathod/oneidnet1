    <div class="date_submit">
              <div class="d_d"><span class="fd_n">From Date : </span><input type="text" id="orc_datepicker2" placeholder="From date"></div>
              <div class="d_d"><span class="fd_n">To Date : </span><input type="text" id="orc_datepicker3" placeholder="To date"></div>
              <div class="d_b"><input type="button" value="Submit" id="orc_cancel_submit"></div>
              <div class="d_m" style=""><img class="rp_dwnld" id="ocnl_dwnld_excel" src="<?php echo base_url() . "assets/images/download_down_arrow.png"; ?>" width="30px;"></div>
 <script>
$(function() {
$( "#orc_datepicker2" ).datepicker();
$( "#orc_datepicker3" ).datepicker();
});
</script>

            </div>

<div class="oneshop_reports"  id="order_can_div">
    <?php //echo "<pre>";print_R($store_products);echo "</pre>";?>
    <div id="osdev_cancel_chart_append">
        <?php include("order_cancelation_chart.php");?>
    </div>
    
</div>


<script>
  
</script>
