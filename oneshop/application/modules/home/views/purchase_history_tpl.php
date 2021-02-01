<style>
.tooltip {
  position: relative;
  display: inline-block;
  border-bottom: 1px dotted black;
}

.tooltip .tooltiptext {
  visibility: hidden;
  width: 150px;
  background-color: black;
  color: #fff;
  text-align: center;
  border-radius: 6px;
  padding: 5px;

  /* Position the tooltip */
  position: absolute;
  z-index: 1;
}

.tooltip:hover .tooltiptext {
  visibility: visible;
}
</style>
<div class="wi100pstg" id="tab1data">
<?php if($orderhistory[0]['order_aid']!=''){ ?>
		<div class="ttdes_flightsearch_topheadings_box fll">
        <div class="ttdes_flight_departure_box"> ORDER ID </div>
        <div class="ttdes_flight_arrival_box"> DATE </div>
         <?php
            if($is_accessible=="yes"){
            ?>
        <div class="ttdes_flight_duration_box"> STATUS </div>
        <?php
            }
        ?>
        <div class="ttdes_flight_delivery_box"> Contact Detail </div>
        </div>
        <?php  
        foreach ($orderhistory as $orderhistorydata){
    		$order_url=  base_url().'order_view?order_id='.base64_encode(base64_encode($orderhistorydata['order_code']));
    		?>
        <div class="ttdes_flightsearch_history_content fll">
          <div class="ttdes_stores_orderid"><span class="fll mar10"><input type="checkbox" style="display: none;"></span> <a class="blue" href="<?php echo $order_url;?>"> <?php echo $orderhistorydata['order_code'];?> </a> </div>
        <div class="ttdes_stores_date">
        <?php $triggerOn = $orderhistorydata['time'];
              $user_tz = $timezone;
              $schedule_date = new DateTime($triggerOn, new DateTimeZone($user_tz) );
              $schedule_date->setTimeZone(new DateTimeZone('UTC'));
              $odate =  $schedule_date->format('M d Y  g:i A');
              echo  $odate; // echoes 2013-04-01 22:08:00
			 ?>
        </div>
            <?php
            if($is_accessible=="yes"){                
            ?>
            <div class="ttdes_flight_duration_box">
                <label><?php echo $orderhistorydata['status'];?></label>
            </div>      
            <?php
            }
             foreach ($owner_contact as $ownercontact){
              ?> 
               <div class="ttdes_flight_delivery_box">
                <div class="tooltip" style="margin-right: 15px;"><img src="<?php echo base_url()."assets/images/mail.png";?>">
                  <span class="tooltiptext">Store Owner Contact Email: <?php echo $ownercontact['email'];?></span>
                </div>
                <a href="<?php echo base_url()."store_home/".$storeid;?>">
                <div class="tooltip"><img src="<?php echo base_url()."assets/images/message.png";?>">
                  <span class="tooltiptext">Drop Your Query To Store Owner: <?php echo $ownercontact['username'];?></span>
                </div></a>
                  <!-- <label><?php echo $ownercontact['email'];?></label> -->
                </div>     
            <?php }
        ?>

        </div>
        <?php  }
        }else{ ?>
  			<div class="osdes_rightbar_headingsbg_wrap box_sizing">
            <p>No  Data</p>	
        </div>
  			<?php } ?>

		</div>
