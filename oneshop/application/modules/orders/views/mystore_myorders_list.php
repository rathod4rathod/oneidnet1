<?php
if($orders==0){
  echo "<h1>No orders in your store.</h1>";
}
else{ 
  $i=1;  
  foreach($orders as $items){
    $total_amount=0;
    $products_arry=$items["prods_name"];
    $products=explode("|",$products_arry);
    if(strpos($products[1],"~")>0){
      $amt_arry=explode("~",$products[1]);
      for($k=0;$k<count($amt_arry);$k++){
        $total_amount=$total_amount+(int)$amt_arry[$k];
      }
    }else{
      $total_amount=(int)$products[1];
    }
    $order_datetime=explode(" ",$items["order_date"]);
    $order_date=$order_datetime[0];
    $status=($items["status"]=="Got Request")?"Request":$items["status"];
?>
<div class="oneshop_orderItem">
  <input type="hidden" name="order_number" id="order_num_value_<?php echo $i;?>" value="<?php echo $items["order_num"];?>">
    <input type="hidden" name="hsquantity" id="hsquantity<?php echo $i?>" value="<?php echo $products[2];?>"/>
    <input type="hidden" name="hsamount" id="hsamount<?php echo $i?>" value="<?php echo $products[1];?>"/>
    <input type="hidden" name="hsproducts" id="hsproducts<?php echo $i?>" value="<?php echo $products[0];?>"/>
    <input type="hidden" name="hsstoreid" id="hsstoreid<?php echo $i?>" value="<?php echo $items['store_id'];?>"/>
    <ul class="oneshop_pphHead">
      <li><h4>Order Number</h4></li>
      <li><h4>Order Date</h4></li>
      <li><h4>Amount</h4></li>
      <li><h4>Status</h4></li>
    </ul>
    <ul class="oneshop_pphBody">
        <li><h4><a href="javascript:void(0);" id="order_id<?php echo $i?>"><?php echo $items["order_num"];?></a></h4></li>
      <li><h4 title="<?php echo $items["order_date"]?>"><?php echo $order_date;?></h4></li>
      <li><h4><?php echo $total_amount;?></h4></li>
      <li><h4 id="status_orders_<?php echo $i;?>"><?php echo $status;?></h4>          
      </li>
      <?php 
      if($mode!="recent"){
        $styl="";        
        if($items["status"]=="Delivered"||$items["status"]=="Cancel"){
          $styl="display:none;";
        }else{
          $styl="";
        }
      ?>     
      <button id="edit_order_status_<?php echo $i;?>" style="<?php echo $styl;?>">Edit</button><button id="submit_btn_<?php echo $i;?>" style="display:none;float:left;">Submit</button>
      <?php
      }
      ?>
    
    </ul>
</div>      
<script type="text/javascript">
  $('#order_id<?php echo $i?>').click(function(){
    var order_id=$("#order_num_value_<?php echo $i?>").val();
    var squantity=$("#hsquantity<?php echo $i?>").val();
    var samount=$("#hsamount<?php echo $i?>").val();
    var sproducts=$("#hsproducts<?php echo $i?>").val();
    var sstoreid=$("#hsstoreid<?php echo $i?>").val();
    var sdata_append="";
    if(squantity.indexOf("~")>0){
      var qty_arry=squantity.split("~");
      var amt_arry=samount.split("~");
      var prods_arry=sproducts.split("~");      
      for(var i=0;i<qty_arry.length;i++){
        var prods_items=prods_arry[i].split(":");
        var prods_img_url=oneshop_url+"/stores/"+sstoreid+"/products/si/"+prods_items[1];
        sdata_append+='<div class="click_createGroupFormField"><span class="click_createGroupFormFieldLable"><img src="'+prods_img_url+'"/></span><span class="click_createGroupFormFieldLable"><h4>'+prods_items[0]+'</h4></span><span class="click_createGroupFormFieldLable"><h4>'+qty_arry[i]+'</h4></span><span class="click_createGroupFormFieldLable"><h4>'+amt_arry[i]+'</h4></span></div>';
      }
    }else{
      //alert("not found");
      var prods_items=sproducts.split(":");
      var prods_img_url=oneshop_url+"/stores/"+sstoreid+"/products/si/"+prods_items[1];
      sdata_append+='<div class="click_createGroupFormField"><span class="click_createGroupFormFieldLable"><img src="'+prods_img_url+'"/></span><span class="click_createGroupFormFieldLable"><h4>'+prods_items[0]+'</h4></span><span class="click_createGroupFormFieldLable"><h4>'+squantity+'</h4></span><span class="click_createGroupFormFieldLable"><h4>'+samount+'</h4></span></div>';
    }  
    $('#click_createAlbumPopUp').fadeIn(300);
    $("#click_createAlbumPopUp .click_createGroupForm").html(sdata_append);
    $("#click_createAlbumPopUp .click_createGroupPopUpHeader h4").html("<b>Order No:</b>"+order_id);
	});
  function toggle_popUpVisibility(id){
    var myPopUp = document.getElementById(id);
    myPopUp.style.display = 'none';
	}
//by ramadevi on 18 june 2015. 
  var status;
   $('#edit_order_status_<?php echo $i;?>').click(function(){
         document.getElementById("submit_btn_<?php echo $i;?>").style.display="block";
       $('#edit_order_status_<?php echo $i;?>').hide();
            $("#status_orders_<?php echo $i;?>").html('<select id="orders_status_change"><option>--select--</option><option value="Got Request">Got Request</option><option value="Delivered">Delivered</option><option value="Processing">Processing</option><option value="Cancel">Cancel</option></select>');
      $("#orders_status_change").change( function() {
      status=$("select option:selected").val(); 
      });
    });   
    $('#submit_btn_<?php echo $i;?>').click(function(){
     if(status==''){
       alert("plz select value");
     }else{
         
      var order_num_status=$("#order_num_value_<?php echo $i;?>").val();
      var sstoreid=$("#hsstoreid<?php echo $i?>").val();
      // alert(order_num_status);
        $.ajax({
            type: 'POST',
            url:oneshop_url + "/orders/updateStatusOrder",
            data: {order_id:order_num_status,status_change:status},
            success: function (data) {
             if(data==505)
              {
                location.replace(oneshop_url);
              }else{
              var result=data.trim();  
              window.location=oneshop_url+"/home/mystore_myorders/";              
              }           
            }
        });
         $('#submit_btn_<?php echo $i;?>').hide();
          $("#status_orders_<?php echo $i;?>").html(status);
            $('#edit_order_status_<?php echo $i;?>').show();
  
      }
    });
   
</script>
<?php
$i++;
  }
}
?>
<style type="text/css">
    .oneshop_orderItem ul.oneshop_pphHead li:nth-child(1){
      width:180px;
    }
    .oneshop_orderItem ul.oneshop_pphBody li:nth-child(1){
      width:180px;
    }
  .click_popUpSection{
    position: absolute;
    float: left;
    overflow-X: hidden;
    overflow-Y: none;
    width: 850px;
    height: 500px;
    border-radius: 5px;}	
  .click_createGroupPopUpHeader{
	float: left;
	width: 500px;
	height: 40px;
	background-color: #ddd;
	border-bottom: solid 1px #ccc;
	border-top-right-radius: 5px;
	border-top-left-radius: 5px;}	
.click_createGroupPopUpHeader h4{
	float: left;
	font: 16px Arial;
	color: #777;
	margin: 10px;}
.click_createGroupForm{
	float: left;
	width: 500px;
	background-color: #f9f9f9;
	height: 218px;}	
.click_createGroupFormField{
	float: left;
	margin: 5px 0 0 25px;}
.click_createGroupFormFieldLable{
	float: left;
	width: 150px;
	height: 30px;
	overflow: hidden;}	
.click_createGroupFormFieldInput{
	float: left;
	width: 290px;
	height: 30px;
	margin: 0px;
	padding: 0 5px 0 5px;
	background-color: #f5f5f5;
	border: solid 1px #ccc;}
	
.click_createGroupFormFieldLable h4{
	float: right;
	font: 13px Arial;
	color: #555;
	margin: 5px;}		
/*---PopUp Style Starts Here(Vinod 04-06-2015)---*/
</style>