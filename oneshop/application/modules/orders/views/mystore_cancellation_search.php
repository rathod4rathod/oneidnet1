<?php
echo "<input type='hidden' name='hstoreid' id='hstoreid' value='$store_id'/>";
?>
<div class="oneshop_filter">
			<div class="oneshop_filterFields">
            <h5>Find Order :</h5>
            	<input type="text" class="oneshop_mystoreField oneshop_filterFieldsText" placeholder="Find by Order Number" id="order_num">
              <input type="text" style="height:30px;" class="oneshop_mystoreField oneshop_filterFieldsText" placeholder="Find Order By Date" id="order_date">
              <input type="text" style="height:30px;" class="oneshop_mystoreField oneshop_filterFieldsText" placeholder="Find Order By Cancellation Date" id="cancel_date">
              <button class="oneshop_basicInfoBtn oneshop_storeFindBtn" id="find_order_btn">Find Order</button>
			</div>             
</div>
<script type="text/javascript">
  $( "#order_date" ).datepicker();
  $( "#cancel_date" ).datepicker();
 
</script>
<style type="text/css">
    #order_num{
      width:150px;
    }
</style>
