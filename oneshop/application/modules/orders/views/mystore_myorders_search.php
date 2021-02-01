<?php
//$store_id=$this->uri->segment(3);

echo "<input type='hidden' id='hstoreid' name='hstoreid' value='$store_id'/>";
?>
<div class="oneshop_filter">
			<div class="oneshop_filterFields">
            <h5>Find Order :</h5>
            	<input type="text" class="oneshop_mystoreField oneshop_filterFieldsText" placeholder="Find by Order Number" id="order_num">
              <input type="text" style="height:30px;" class="oneshop_mystoreField oneshop_filterFieldsText" placeholder="Find Order By Date" id="order_date">
              <button class="oneshop_basicInfoBtn oneshop_storeFindBtn" id="find_order_btn">Find Order</button>
			</div>             
</div>

<script type="text/javascript">
  $( "#order_date" ).datepicker();
 
</script>