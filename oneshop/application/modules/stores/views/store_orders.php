<?php
$store_code=$this->uri->segment(2);
$banner_path = base_url() . "assets/images/store_banners/";
$theme_selected = $this->load->module("stores")->getthemeselected($store_code);
if($theme_selected!=''){ 
     $sideimage =  base_url().'/assets/images/store_banners/'.$theme_selected.'.png';
     $midimage = base_url().'/assets/images/store_banners/mid'.$theme_selected.'.png'; 
 }else{ 
     $sideimage = base_url().'/assets/images/store_banners/1.png';
      $midimage = base_url().'/assets/images/store_banners/mid1.png'; 
     }
?>
<link rel="stylesheet" href="<?php echo base_url() . "assets/" ?>css/jquery-ui.css">
<script src="<?php echo base_url() . "assets/" ?>scripts/jquery-ui.js"></script>  
<div class="oneshop_banner_stip_newbox click_importantNotifications">

    <div class="oneshop_banner_left_box"  <?php echo "style= 'background-image: url($sideimage)'"; ?> >&nbsp;</div>
    <div class="oneshop_banner_stip_middle_content"  <?php echo "style= 'background-image: url($midimage)'"; ?> > 
        <?php $this->templates->os_oneshopheader("store_orders"); ?>
    </div>
    <div class="oneshop_banner_right_box"  <?php echo "style= 'background-image: url($sideimage)'"; ?> >&nbsp;</div>
</div> 

<div class="oneshop_container_middle_section">
<div class="clearfix"></div>
          	<div class="store_mainwrap"> 	
<div class="hd_heading">
            	<h1>Manage Orders <span></span></h1>
            </div>
<!--Edited By Mitesh => change class for 100% wdth-->
	<div class="oneshop_container_middle_section pab10">
		
            <select name="oneshop_orders" id="oneshop_orders"><option value="">Select</option><option value="all">All</option><option value="oneday">Yesterday</option><option value="oneweek">Last 7 Days </option><option value="onemonth">Last 30 Days</option></select>

            &nbsp;&nbsp;<span class="bold"> | </span>&nbsp;&nbsp;

            <select name="oneshop_orders_status" id="oneshop_orders_status"><option value="">Select</option><option value="JUST_PLACED">JUST_PLACED</option><option value="PROCESSING">PROCESSING</option><option value="CANCELLED">CANCELLED </option><option value="DELIVERED">DELIVERED</option></select>

            <button class="button button1" id="Update" name="Update"> Update </button>

            &nbsp;&nbsp;<span class="bold"> | </span>&nbsp;&nbsp;
            <span class="bold"> Filter(by status) : </span>

            <select name="oneshop_os_status" id="oneshop_os_status"><option value="">Select</option><option value="JUST_PLACED">JUST_PLACED</option><option value="PROCESSING">PROCESSING</option><option value="CANCELLED">CANCELLED </option><option value="DELIVERED">DELIVERED</option></select>

            &nbsp;&nbsp;<span class="bold"> | </span>&nbsp;&nbsp;
            <span class="bold"> Filter(by Date) : </span>
            <input type="text" id="ord_datepicker" placeholder="select date">

        	</div>


			<div class="wi100pstg" id="order_result"  >
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
					<!-- <span class="fll mar10" style="margin-top:2px;">
						<input type="checkbox" style="display: none;">
					</span>  -->
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
					<input type="button" value="Save" onclick="orderupdate(<?php echo $orderdata['order_aid'];?>)" id="orderupdate<?php echo $orderdata['order_aid'];?>" style="display: none;">
				</div>
			</div>
			<?php } } else { echo "No Order History is Available!"; }?>
		</div>
	</div>
	<div class="oneshop_right_newcontainer">
		
	</div>
    </div>
    
    </div>
    
<!--</div>-->

<script>
	$(function () {
		$("#ord_datepicker").datepicker();
	});
	$('#ord_datepicker').on('change',function(){
		var odate = $(this).val(); 
        if(odate.length>0){
        var storecode = '<?php echo $store_code ?>';
        $.ajax({
		type: 'POST',
		url:  oneshop_url+'/home/searchOrderBydate',
		data:{ storecode :storecode ,odate:odate },
                success: function (data) {
                    if($.trim(data)!=0){
                      $('#order_result').html(data);  
                    }else{
                         $('#order_result').html("No Order History is Available!");
                    }
                }
                });
            }

	})
    $('#oneshop_orders').on('change',function(){
        var searchtxt = $(this).val();
        if(searchtxt.length>0){
        var storecode = '<?php echo $store_code ?>';
        $.ajax({
		type: 'POST',
		url:  oneshop_url+'/home/searchOrder',
		data:{ storecode :storecode ,searchtxt:searchtxt },
                success: function (data) {
                
                    if($.trim(data)!=0){
                      $('#order_result').html(data);  
                    }else{
                         $('#order_result').html("No Order History is Available!");
                    }
                }
                });
            }
    })
    $('#oneshop_os_status').on('change',function(){
        var searchtxt = $(this).val();
        if(searchtxt.length>0){
        var storecode = '<?php echo $store_code ?>';
        $.ajax({
		type: 'POST',
		url:  oneshop_url+'/home/searchOrderBystatus',
		data:{ storecode :storecode ,searchtxt:searchtxt },
                success: function (data) {
                
                    if($.trim(data)!=0){
                      $('#order_result').html(data);  
                    }else{
                         $('#order_result').html("No Order History is Available!");
                    }
                }
                });
        }
    })
    $('#checkall').on('change',function(){
    	$('.checkitem').prop("checked",$(this).prop("checked"))
    })
    $('#Update').click(function(){
    	var orderstatus = $("#oneshop_orders_status").val();
    	var id = $('.checkitem:checked').map(function(){
    		return $(this).val()
    	}).get().join(',');
    	$.ajax({
		type: 'POST',
		url:  oneshop_url+'/home/updateOrder',
		data:{ id:id,orderstatus:orderstatus },
                success: function (data) {
                	window.location.reload(true);
                }
    		// alert(data);
    	});
    })
function editorder(oid){
	$('#editorder'+oid).css('display','none');
	$('#labelstatus'+oid).css('display','none');
	$('#labeldd'+oid).css('display','none');
	$('#orderupdate'+oid).css('display','block');
	$('#status'+oid).css('display','block');
	$('#ddstatus'+oid).css('display','block');

}
function orderupdate(sid){
	var status = $('#status'+sid).val();
	var ddstatus = $('#ddstatus'+sid).val();
	$.ajax({
		type: 'POST',
		url:  oneshop_url+'/stores/updateorder',
		data:{ sid :sid ,status:status,ddstatus:ddstatus },

		success: function (data) {
			alert('Order Status Updated Sucessfully');
			$('#labelstatus'+sid).text($.trim(data));
			$('#editorder'+sid).css('display','block');
			$('#labelstatus'+sid).css('display','block');
			$('#labeldd'+sid).css('display','block');
			$('#orderupdate'+sid).css('display','none');
			$('#status'+sid).css('display','none');
			$('#ddstatus'+sid).css('display','none');
		}
	});
}
</script>
