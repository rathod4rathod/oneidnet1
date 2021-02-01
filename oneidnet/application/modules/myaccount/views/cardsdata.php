
<?php 
if($cardsdata[0]['card_id']!=''){
foreach($cardsdata as $cdata ){?>
        <div class="ttdes_login_control_content fll">
        <div class="ttdes_stores_orderid pat5 os_des_pab5"> <?php echo $cdata['card_name'] ?> </div>
        <div class="ttdes_flight_browser pat5 os_des_pab5"> <?php echo $cdata['card_number'] ?>  </div>
        <div class="ttdes_flight_ipaddress pat5 os_des_pab5">  <?php echo $cdata['usage_purpose'] ?> </div>
        <div class="ttdes_flight_browser os_des_pab5 pat5"><?php echo $cdata['card_type'] ?> </div>
        <div class="ttdes_flight_browser pat5 os_des_pab5"> <?php echo $cdata['usage_scope'] ?> </div>
        <div class="ttdes_flight_reset os_des_pab5 pat5"> <a href="javascript:void(0);" class="oneshop_curencyConvertor" cardid=<?php echo $cdata['card_id'] ?>>Edit</a> &nbsp;&nbsp;&nbsp;&nbsp; <a href="javascript:void(0);" onclick="deletecards(<?php  echo $cdata['card_id']  ?>)">Delete</a> </div>
        </div>
        <?php } }else{ ?>
			  <div class="ttdes_login_control_content fll">
       
			<?php echo "No data found ";?>
			</div>
			<?php }?>
