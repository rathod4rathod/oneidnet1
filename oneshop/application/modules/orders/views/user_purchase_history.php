<?php
if($orders_list!=0){
  $i=1;
  foreach($orders_list as $list){ 
    $ostatus='';
    $order_dt_arry=explode(" ",$list["order_date"]);
    $order_dt=$order_dt_arry[0]; 
    $products_arry=$list["prod_names"];
    $products=explode("|",$products_arry);
    if($list["status"]=="Got Request"){
      $ostatus="Request";
    }else{
      $ostatus=$list["status"];
    }
    //echo $products[0];
?>
<div class="oneshop_profilePurchaseHistoryItem" id="purchase_history_list"> 
    <input type="hidden" name="hquantity" id="hquantity<?php echo $i?>" value="<?php echo $products[1];?>"/>
    <input type="hidden" name="hamount" id="hamount<?php echo $i?>" value="<?php echo $products[2];?>"/>
    <input type="hidden" name="hstorename" id="hstorename<?php echo $i?>" value="<?php echo $list['name'];?>"/>
    <input type="hidden" name="hproducts" id="hproducts<?php echo $i?>" value="<?php echo $products[0];?>"/>
    <input type="hidden" name="hstoreid" id="hstoreid<?php echo $i?>" value="<?php echo $list['store_id'];?>"/>    
    <input type="hidden" name="hstore_id" id="hstoreid<?php echo $i?>" value="<?php echo $list["store_id_fk"];?>"/>
    <ul class="oneshop_pphHead">
      <li><h4>Order Number</h4></li>
      <li><h4>Store name</h4></li>
      <li><h4>Order Date</h4></li>
      <li><h4>Amount</h4></li>
      <li><h4>Status</h4></li>
      <!--<li><h4>&nbsp;</h4></li>-->
    </ul>
    <ul class="oneshop_pphBody">
        <li><h4><a id="order_no_link<?php echo $i;?>"><?php echo $list["order_num"]?></a></h4></li>
      <li><h4><?php echo $list["name"]?></h4></li>
      <li><h4><span id="span_dt<?php echo $i?>" style="display:none;"><?php echo $list["order_date"]?></span><?php echo date('d-m-Y',strtotime($order_dt));?></h4></li>
      <li><h4><?php echo $list["total_amount_str"]?></h4></li>
      <li><h4><?php echo $ostatus?></h4></li>
      <?php
      $styl="enabled=false";
      if($list["status"]=="Delivered" || $list["status"]=="Cancel"){
        $styl="margin-top:-14px;display:none";
      }else{
        $styl="margin-top:-14px;";
      }
      ?>
      <li><a id="cancel_btn<?php echo $i;?>" name="cancel_btn" style="<?php echo $styl;?>" href="javascript:void(0)">C</a></li>
    </ul>                                
</div>
<script type="text/javascript">
  $('#cancel_btn<?php echo $i?>').click(function(){    
    var order_no=$("#order_no_link<?php echo $i?>").text();   
    //alert(order_no+"->"+order_date);
    $.ajax({
      type:"post",
      url:oneshop_url+"/orders/cancelOrder",
      data:{order_num:order_no},
      success:function(data){
        var result=data.trim();
        if(result.indexOf("SUCCESS")>0){
          //alert("Your order has been cancelled");          
          location.reload();
        }
      }
    });
  });
  $('#order_no_link<?php echo $i?>').click(function(){
    var quantity=$("#hquantity<?php echo $i?>").val();
    var amount=$("#hamount<?php echo $i?>").val();
    var products=$("#hproducts<?php echo $i?>").val();
    var storeid=$("#hstoreid<?php echo $i?>").val();
    var data_append="";
    if(quantity.indexOf("~")>0){
      //alert("found");
      var quantity_arry=quantity.split("~");
      var amt_arry=amount.split("~");
      var prods_arry=products.split("~");      
      for(var i=0;i<quantity_arry.length;i++){
        var prods_items=prods_arry[i].split(":");
        var prods_img_url= oneshop_url+"/stores/"+storeid+"/products/si/"+prods_items[1];
        data_append+='<div class="click_createGroupFormField"><span class="click_createGroupFormFieldLable"><img src="'+prods_img_url+'"/></span><span class="click_createGroupFormFieldLable"><h4>'+prods_items[0]+'</h4></span><span class="click_createGroupFormFieldLable"><h4>'+quantity_arry[i]+'</h4></span><span class="click_createGroupFormFieldLable"><h4>'+amt_arry[i]+'</h4></span></div>';
      }
    }else{
      //alert("not found");
      var prods_items=products.split(":");
      var prods_img_url=oneshop_url+"/stores/"+storeid+"/products/si/"+prods_items[1];
      data_append+='<div class="click_createGroupFormField"><span class="click_createGroupFormFieldLable"><img src="'+prods_img_url+'"/></span><span class="click_createGroupFormFieldLable"><h4>'+prods_items[0]+'</h4></span><span class="click_createGroupFormFieldLable"><h4>'+quantity+'</h4></span><span class="click_createGroupFormFieldLable"><h4>'+amount+'</h4></span></div>';
    }
    //var data_append='<div class="click_createGroupFormField"><span class="click_createGroupFormFieldLable"><h4><?php echo $list["name"]?></h4></span><input type="text" class="click_createGroupFormFieldInput"></div>';
    $('#click_createAlbumPopUp').fadeIn(300);
    $("#click_createAlbumPopUp .click_createGroupForm").html(data_append);
	});
</script>
<?php
$i++;
}
}else{
  echo "<h2>No orders in your list</h2>";
}
?>

<style type="text/css">
    #purchase_history_list ul.oneshop_pphHead li{
      width:110px;
    }
    #purchase_history_list ul.oneshop_pphHead li:nth-child(1){
      width:170px;
    }
    #purchase_history_list ul.oneshop_pphHead li:nth-child(4){
      width:80px;
    }
    #purchase_history_list ul.oneshop_pphHead li:nth-child(5){
      width:80px;
    }
    #purchase_history_list ul.oneshop_pphBody li{
      width:110px;
    }
    #purchase_history_list ul.oneshop_pphBody li:nth-child(1){
      width:170px;
    }
    #purchase_history_list ul.oneshop_pphBody li:nth-child(4){
      width:80px;
    }
    #purchase_history_list ul.oneshop_pphBody li:nth-child(5){
      width:80px;
    }
    #purchase_history_list ul.oneshop_pphBody li:nth-child(6){
      width:15px;
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
<script type="text/javascript">
function toggle_popUpVisibility(id){
	var myPopUp = document.getElementById(id);
	myPopUp.style.display = 'none';
	}
  
  </script>
