<?php
$i=1;
$this->load->helper("url");
$store_id=$this->uri->segment(3);
//echo "store id:".$store_id;
?>
<div class="oneshop_recentOrdersList" style="margin: 5px 0 0 35px;">
                        <span class="oneshop_recentOrdersHeader"><h4>Canceled Orders</h4></span>
               
        

						 <?php 
             //  echo "this is  ".$store_id;
             if($results_canceled==0){
               
               echo'<h5>No canceled Orders are Found</h5>';
             }
             else{
             

              ?>   
                        </div> 
<div class="oneshop_chancelOrdersListWrapper">
         <div class="order_details">
           <?php foreach($results_canceled as $dev_canceled_values){
             $timestamp=$dev_canceled_values["order_cancel_date"];
               $splitTimeStamp = explode(" ",$timestamp);
                $date = $splitTimeStamp[0];
                 $time = $splitTimeStamp[1];
?>
            <div class="oneshop_orderItem" style="margin: 0 55px 0 0px;width: 800px;">
     <ul class="oneshop_pphHead">
      <li><h4>Order Number</h4></li>
      <li><h4>Order Date</h4></li>
      <li><h4>Amount</h4></li>
      <li><h4>Cancel_Date</h4></li>
    </ul>
    <ul class="oneshop_pphBody">
        <li><h4><a href="javascript:void(0);" id="orderid_<?php echo $i;?>"><?php echo $dev_canceled_values["order_num"];?></a></h4></li>
      <li><h4><?php echo $dev_canceled_values["ordered_on"];?></h4></li>
      <li><h4><?php echo $dev_canceled_values["total_amount_str"];?></h4></li>
      <li  title="<?php echo $timestamp;?>"><h4><?php echo $date?></h4></li>
    </ul>
</div>  
           <input type="hidden" id="ordered_date" value="<?php echo $dev_canceled_values["ordered_on"];?>">
<input type="hidden" value="<?php echo $dev_canceled_values["total_amount_str"];?>" id="hsamount<?php echo $i?>">
<input type="hidden" value="<?php echo $dev_canceled_values["product_id_str"];?>" id="hsproducts<?php echo $i?>">    
<input type="hidden" value="<?php echo $dev_canceled_values["quantity_str"];?>" id="hsquantity<?php echo $i?>">
<input type="hidden" id="dev_store_u_id" value="<?php echo $store_id;?>">
<input type="hidden" value="" id="inputUrl" />
<input type="hidden" value="" id="product_name" />
<script type="text/javascript">
        $('#orderid_<?php echo $i?>').click(function(){
          var ordered_date=$("#ordered_date").val();
          
              var squantity=$("#hsquantity<?php echo $i?>").val();
              var samount=$("#hsamount<?php echo $i?>").val();
              var sproducts=$("#hsproducts<?php echo $i?>").val();
              var sstoreid=$("#dev_store_u_id").val().trim();
              var sdata_append="";
               var image_path;
               if(squantity.indexOf("~")>0){
                        var qty_arry=squantity.split("~");
                        var amt_arry=samount.split("~");
                        var prods_arry=sproducts.split("~");      
     
                         for(var j=0;j<qty_arry.length;j++){
                                var prods_items=prods_arry[j].split(",");     
                                image_path=getProductData(prods_items);
                                var product_path=image_path.split(",")[0];
                                var product_name=image_path.split(",")[1];
                               
                               // alert(product_path);
                               //  image_path = $("#inputUrl").val();
                                 var prods_img_url=oneshop_url+"/stores/"+sstoreid+"/products/si/"+product_path;
                                 sdata_append+='<div class="click_createGroupFormField"><span class="click_createGroupFormFieldLable"><img src="'+prods_img_url+'"/></span><span class="click_createGroupFormFieldLable"><h4>'+product_name+'</h4></span><span class="click_createGroupFormFieldLable"><h4>'+qty_arry[j]+'</h4></span><span class="click_createGroupFormFieldLable"><h4>'+amt_arry[j]+'</h4></span><span class="click_createGroupFormFieldLable"><h4>'+ordered_date+'</h4></span></div>';
                          }
               }else{
                                 var prods_items=sproducts.split(",");
                                image_path=getProductData(prods_items);
                                var product_path=image_path.split(",")[0];
                                var product_name=image_path.split(",")[1];
                               
                    //  image_path = $("#inputUrl").val();
                      var prods_img_url=oneshop_url+"/stores/"+sstoreid+"/products/si/"+product_path;
                      sdata_append+='<div class="click_createGroupFormField"><span class="click_createGroupFormFieldLable"><img src="'+prods_img_url+'"/></span><span class="click_createGroupFormFieldLable"><h4>'+product_name+'</h4></span><span class="click_createGroupFormFieldLable"><h4>'+squantity+'</h4></span><span class="click_createGroupFormFieldLable"><h4>'+samount+'</h4></span><span class="click_createGroupFormFieldLable"><h4>'+ordered_date+'</h4></span></div>';
                } 
                $('#click_createAlbumPopUp').fadeIn(300);
                $("#click_createAlbumPopUp .click_createGroupForm").html(sdata_append);
        });
        
        
  function toggle_popUpVisibility(id){
    var myPopUp = document.getElementById(id);
   
    
    myPopUp.style.display = 'none';
	}
  //var p_id;
  
  function getProductData(p_id){
    var result;
   $.ajax({
            type: 'GET',
            url: oneshop_url+"/home/productData/"+p_id,
            data: p_id,
            cache: false,
            dataType: 'text',
            async: false,
            success: function (data) {
             
             // $("#inputUrl").val(data.trim());
           result=data;
             // $("#product_name").val(data);
             
              
    }
           
        });
       
       return result;
  }
</script>

       

  <?php  
  $i++;
           }
         echo'</div>';
         
             } ?> 
        
        </div>
</div>
<style type="text/css">
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
	width: 80px;
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
	margin: 1px;}		
/*---PopUp Style Starts Here(Vinod 04-06-2015)---*/
</style>

