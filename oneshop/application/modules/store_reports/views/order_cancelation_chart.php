    
    <script type="text/javascript">
     function order_recieve() {
          var chart = new CanvasJS.Chart("order_recieved_container1",
                  {
                      animationEnabled: true,
                      title: {
                          text: "Cancelled Orders"
                      },
                      data: [
                          {
                              type: "column", //change type to bar, line, area, pie, etc
                              dataPoints: [
                                <?php foreach($Order_cancelation_data as $Order_recive_data_info ){
                                  ?>
                                      {label: "<?php echo $Order_recive_data_info["MONTH"]; ?>", y: <?php echo $Order_recive_data_info["COUNT"]; ?>},
                                    <?php
                                }?>
                              ]
                          }
                      ]
                  });
                  
 chart.render();
          
      }
        window.onload = function () {    order_recieve(); order_recieved_function(); }
 order_recieve();
    </script>
    <div id="order_recieved_container1" style="height: 300px; width: 100%;"></div>
