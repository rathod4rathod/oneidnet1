$(window).on('load',function () {
	//Raviteja - product search events - 03012016
	finaljson = "{";
    $('#filter_product :checkbox').click(function() {
		finaljson = "{";
		var filters = [];
		var $this = $(this);
		filters.push(this.value);
		var selected = [];
		console.log(this.name);
		
		filtername= '"'+this.name+'":[';
		var values = $('input:checkbox[name="'+this.name+'"]:checked').map(function() {
			var val = '"'+this.value+'"';
			return val; 
	    }).get();
	
		valstr = filtername + values + "]";
		
		$("#"+this.name).val(valstr);
		
		$('#filter_product').find("input[type='hidden']").each(function(){
			 if($(this).val() != "" && this.name != "osdev_filters"  && this.name != "osdev_subcatid" && this.name != "osdev_itemid"  && this.name != "osdev_category") {
				if(finaljson != "{") {
					finaljson = finaljson + "," + $(this).val();
				} else {
					finaljson = finaljson + $(this).val();
				}
			 }
		});
		finaljson = finaljson + "}";                
		$("#osdev_filters").val(finaljson);
		var filter = $("#osdev_filters").val();
		
		var categid = $("#osdev_category").val();
		var subcatid = $("#osdev_subcatid").val();
		var itemid = $("#osdev_itemid").val();
		$.ajax({
				type: 'post',
				url: oneshop_url+'/products/products_search_result',
				data: {osdev_filters: filter,subcatid: subcatid, categid: categid, itemid:itemid},
				success: function (data) {
				$("#search_result").html(data);
			}
		});
	});
});
