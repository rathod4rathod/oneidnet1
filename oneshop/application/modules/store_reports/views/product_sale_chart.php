
<?PHP // echo "<pre>";print_R($category_wise_sale);  echo "</pre>"; 
?>

<script type="text/javascript">
function chartrv () {
	var chart = new CanvasJS.Chart("product_wise_sale",
	{
		animationEnabled: true,
		title:{
			text: "Monthly Sales By Product"
		},
		data: [
		{
			type: "column", //change type to bar, line, area, pie, etc
			dataPoints: [
        <?php foreach($product_wise_sale as $product_wise_sale_info ){
                                  ?>
                                      {label: "<?php echo $product_wise_sale_info["MONTH"]; ?>", y: <?php echo $product_wise_sale_info["COUNT"]; ?>},
                                    <?php
                                }?>
			]
		}
		]
		});

	chart.render();
}
chartrv();
</script>
<div id="product_wise_sale" style="height: 300px; width: 100%;"></div>


