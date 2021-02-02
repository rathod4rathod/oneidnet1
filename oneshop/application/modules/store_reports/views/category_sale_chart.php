
<?PHP // echo "<pre>";print_R($category_wise_sale);  echo "</pre>"; 
?>

<script type="text/javascript">
function chartll () {
	var chart = new CanvasJS.Chart("chartContainer",
	{
		animationEnabled: true,
		title:{
			text: "Monthly Sales By Category"
		},
		data: [
		{
			type: "column", //change type to bar, line, area, pie, etc
			dataPoints: [
        <?php foreach($category_wise_sale as $Order_recive_data_info ){
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
chartll();
</script>
<div id="chartContainer" style="height: 300px; width: 100%;"></div>


