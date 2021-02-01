<?php if($orderhistory[0]['order_aid']!="") {?>



<div class="ttdes_flightsearch_topheadings_box fll">
        <div class="ttdes_flight_departure_box"> ORDER ID </div>
        <div class="ttdes_flight_arrival_box"> DATE </div>
        <div class="ttdes_flight_duration_box"> STATUS </div>
        </div>
        <?php  foreach ($orderhistory as $orderhistorydata){?>
        <div class="ttdes_flightsearch_history_content fll">
            <div class="ttdes_stores_orderid pat5"> <span style="margin-top:2px;" class="fll mar10"><input type="checkbox" style="display: none;"></span> <a class="blue" href="#"> <?php echo $orderhistorydata['order_code'];?> </a> </div>
        <div class="ttdes_stores_date pat5">
           <?php  $triggerOn = $orderhistorydata['time'];
                  $user_tz = $timezone;
                  $schedule_date = new DateTime($triggerOn, new DateTimeZone($user_tz) );
                  $schedule_date->setTimeZone(new DateTimeZone('UTC'));
                  $odate =  $schedule_date->format('M d Y  g:i A');
                  echo  $odate; // echoes 2013-04-01 22:08:00
?>





             </div>
        <div class="ttdes_flight_duration_box">
            <label><?php echo $orderhistorydata['status'];?></label>
         </div>
        </div>
<?php } } else {

    echo "No Orders";
} ?>