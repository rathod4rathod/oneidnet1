
    <script type="text/javascript">
     function order_recieved_function() {
          var chart = new CanvasJS.Chart("order_recieved_container",
                  {
                      animationEnabled: true,
                      title: {
                          text: "Recieved Orders"
                      },
                      data: [
                          {
                              type: "column", //change type to bar, line, area, pie, etc
                              dataPoints: [
                                <?php foreach($Order_recive_data as $Order_recive_data_info ){
                                  ?>
                                      {label: "<?php echo $Order_recive_data_info["MONTH"]; ?>", y: <?php echo $Order_recive_data_info["COUNT"]; ?>},
                                    <?php
                                }?>
                              ]
                          }
                      ]
                  });
rnd(chart);
          
      }
      function rnd(chart){
          chart.render();
      }
 order_recieved_function();
    </script>
    <div id="order_recieved_container" style="height: 300px; width: 100%;"></div>
    