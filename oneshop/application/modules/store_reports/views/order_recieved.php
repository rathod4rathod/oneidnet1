
<div class="date_submit">
    <div class="d_d"><span class="fd_n">From Date : </span><input type="text" id="orc_datepicker" placeholder="From date"></div>
    <div class="d_d"><span class="fd_n">To Date : </span><input type="text" id="orc_datepicker1" placeholder="To date"></div>
    <div class="d_b"><input type="button" value="Submit" id="orc_submit"></div>
    <div class="d_m" style=""><img class="rp_dwnld" id="orc_dwnld_excel" src="<?php echo base_url() . "assets/images/download_down_arrow.png"; ?>" width="30px;"></div>
    <script>
      $(function () {
          $("#orc_datepicker").datepicker();
          $("#orc_datepicker1").datepicker();
      });
    </script>
</div>

<div class="oneshop_reports"  id="order_recieved_div">
    <?php //echo "<pre>";print_R($store_products);echo "</pre>";?>
    <div id="osdev_orc_chart_append">
        <?php include("order_recieved_chart.php"); ?>
    </div>
</div>

<script>
</script>
