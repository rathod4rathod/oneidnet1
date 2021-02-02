<?php
//var_dump($cancellations);
if($cancellations==0){
  echo "<h1>No cancelled orders in your store.</h1>";
}
else{ 
  $i=1; 
  //var_dump($cancellations);
  foreach($cancellations as $items){
    $products_arry=$items["prod_names"];
    $products=explode("|",$products_arry);    
    $amt=0;
    $price_str=$products[2];
    if(strpos($price_str,"~")>0){
      $price_arry=explode("~",$price_str);
      for($k=0;$k<count($price_arry);$k++){
        $amt=$amt+$products[1];
      }
    }else{
      if($products[1]!=""){
        $amt=$products[1];
      }
    }
    $order_datetime=explode(" ",$items["ordered_on"]);
    $order_date=$order_datetime[0];
    $cancel_datetime=explode(" ",$items["order_cancel_date"]);
    $cancelled_date=$cancel_datetime[0];
?>
<div class="oneshop_orderItem">
  <input type="hidden" name="order_number" id="order_num_value_<?php echo $i;?>" value="<?php echo $items["order_num"];?>">
    <input type="hidden" name="hcquantity" id="hcquantity<?php echo $i?>" value="<?php echo $products[2];?>"/>
    <input type="hidden" name="hcamount" id="hcamount<?php echo $i?>" value="<?php echo $products[1];?>"/>
    <input type="hidden" name="hcproducts" id="hcproducts<?php echo $i?>" value="<?php echo $products[0];?>"/>
    <input type="hidden" name="hcstoreid" id="hcstoreid<?php echo $i?>" value="<?php echo $items['store_id_fk'];?>"/>
    <ul class="oneshop_pphHead">
      <li><h4>Order Number</h4></li>
      <li><h4>Order Date</h4></li>
      <li><h4>Amount</h4></li>
      <li><h4>Cancellation Date</h4></li>
    </ul>
    <ul class="oneshop_pphBody">
      <li><h4><a href="javascript:void(0);" id="corder_id<?php echo $i?>"><?php echo $items["order_num"];?></a></h4></li>
      <li><h4 title="<?php echo $items["ordered_on"];?>"><?php echo $order_date;?></h4></li>
      <li><h4><?php echo $amt;?></h4></li>
      <li><h4 title="<?php echo $items["order_cancel_date"];?>"><?php echo $cancelled_date;?></h4></li>
    </ul>
</div> 
<script type="text/javascript">
  $('#corder_id<?php echo $i?>').click(function(){
    var cquantity=$("#hcquantity<?php echo $i?>").val();
    var camount=$("#hcamount<?php echo $i?>").val();
    var cproducts=$("#hcproducts<?php echo $i?>").val();
    var cstoreid=$("#hcstoreid<?php echo $i?>").val();
    var cdata_append="";
    if(cquantity.indexOf("~")>0){
      var qty_arry=cquantity.split("~");
      var amt_arry=camount.split("~");
      var prods_arry=cproducts.split("~");      
      for(var i=0;i<qty_arry.length;i++){
        var prods_items=prods_arry[i].split(":");
        var prods_img_url=oneshop_url+"/stores/"+cstoreid+"/products/si/"+prods_items[1];
        cdata_append+='<div class="click_createGroupFormField"><span class="click_createGroupFormFieldLable"><img src="'+prods_img_url+'"/></span><span class="click_createGroupFormFieldLable"><h4>'+prods_items[0]+'</h4></span><span class="click_createGroupFormFieldLable"><h4>'+qty_arry[i]+'</h4></span><span class="click_createGroupFormFieldLable"><h4>'+amt_arry[i]+'</h4></span></div>';
      }
    }else{
      //alert("not found");
      var prods_items=cproducts.split(":");
      var prods_img_url=oneshop_url+"/stores/"+cstoreid+"/products/si/"+prods_items[1];
      cdata_append+='<div class="click_createGroupFormField"><span class="click_createGroupFormFieldLable"><img src="'+prods_img_url+'"/></span><span class="click_createGroupFormFieldLable"><h4>'+prods_items[0]+'</h4></span><span class="click_createGroupFormFieldLable"><h4>'+cquantity+'</h4></span><span class="click_createGroupFormFieldLable"><h4>'+cquantity+'</h4></span></div>';
    }  
    $('#click_createAlbumPopUp').fadeIn(300);
    $("#click_createAlbumPopUp .click_createGroupForm").html(cdata_append);
	});
  function toggle_popUpVisibility(id){
    var myPopUp = document.getElementById(id);
    myPopUp.style.display = 'none';
	}
</script>
<?php
    $i++;
  }
}
?>
<style type="text/css">
    .oneshop_orderItem ul.oneshop_pphHead li:nth-child(2){
      width:180px;
    }
    .oneshop_orderItem ul.oneshop_pphBody li:nth-child(2){
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