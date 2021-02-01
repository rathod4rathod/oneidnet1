<?php 
                        //print_r($order_details);
			$order_url=  base_url()."order_view?order_id=";
			if($order_details[0]['order_code']!="")
			{?>
			<div class="ttdes_flightsearch_topheadings_box fll">
				<div class="ttdes_flight_select_box">
					<input type="checkbox" id="checkall"></div>
				<div class="ttdes_flight_departure_box"> ORDER ID </div>
				<div class="ttdes_flight_arrival_box"> DATE </div>
				<div class="ttdes_flight_duration_box"> STATUS </div>
				<div class="ttdes_flight_delivery_box"> TRACKING DETAIL </div>
				<div class="ttdes_flight_edit_box"> EDIT / UPDATE </div>
			</div>
			<?php foreach($order_details as $orderdata) { 
			$order_view = $order_url.base64_encode(base64_encode($orderdata['order_code']));
			?>
			<div class="ttdes_flightsearch_history_content fll">
				<div class="ttdes_flight_select_box">
					<input type="checkbox" class="checkitem" value="<?php echo $orderdata['order_aid']?>"></div>
				<div class="ttdes_stores_orderid pat5"> 
					<span class="fll mar10" style="margin-top:2px;">
						<input type="checkbox" style="display: none;">
					</span> 
					<a href="<?php echo $order_view;?>" class="blue"> <?php echo $orderdata['order_code'];?> </a> 
				</div>
				<div class="ttdes_stores_date pat5"><?php echo date('M d Y  g:i A',strtotime($orderdata['time'])) ;?>  </div>
				<div class="ttdes_flight_duration_box">
					<label id="labelstatus<?php echo $orderdata['order_aid'];?>"><?php echo $orderdata['status'];?> </label>
					<select class="oneshop_cartquantity" style="width:100px;display: none;" name="privacy" id="status<?php echo $orderdata['order_aid'];?>" >
						<option value="JUST_PLACED" <?php if($orderdata['status']=='JUST_PLACED') echo "selected";?>> JUST PLACED </option>
						<option value="PROCESSING" <?php if($orderdata['status']=='PROCESSING') echo "selected";?>> PROCESSING </option>
						<option value="CANCELLED" <?php if($orderdata['status']=='CANCELLED') echo "selected";?>> CANCELLED </option>
						<option value="DELIVERED" <?php if($orderdata['status']=='DELIVERED') echo "selected";?>> DELIVERED </option>
					</select>
				</div>
				<div class="ttdes_flight_delivery_box"> 
					<label id="labeldd<?php echo $orderdata['order_aid'];?>"><?php echo $orderdata['order_delivery_detail'];?> </label>
					
					<textarea id="ddstatus<?php echo $orderdata['order_aid'];?>" style="display: none;" class="oneshop_about_textareabox wi100pstg" name="store_about" id="store_about"><?php echo $orderdata[0]["order_delivery_detail"];?></textarea>
				
				</div>
				<div class="ttdes_flight_edit_box">
				<input type="button" value="Edit" onclick="editorder(<?php echo $orderdata['order_aid'];?>)" id="editorder<?php echo $orderdata['order_aid'];?>">
				<input type="button" value="Save" onclick="orderupdate(<?php echo $orderdata['order_aid'];?>)" id="orderupdate<?php echo $orderdata['order_aid'];?>" style="display: none;"></div>
			</div>
			<?php } } else { echo 0; }?>