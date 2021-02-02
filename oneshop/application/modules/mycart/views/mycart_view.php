<?php
if($cart_items!=0){
  $styl="style='display:none'";
}
else{
  $styl="style='display:block'";
}
?>
<input type="hidden" id="hstoreid" name="hstoreid" value="<?php echo $store_id;?>"/>
<div class="osdev_noitems" <?php echo $styl;?>>
    <h2 style="text-align:center">No items in your cart.</h2>
</div>
<?php
$k=0;
$s_hproduct="";
$s_hamount="";
$s_hqty="";
//var_dump($cart_items);
foreach($cart_items as $rows){
  if($k==0){
    $s_hproduct.=$rows["product_aid"];
    $s_hamount.=$rows["sell_price"];
    $s_hqty.="1";
  }else{
    $s_hproduct.="~".$rows["product_aid"];
    $s_hamount.="~".$rows["sell_price"];
    $s_hqty.="~1";
  }
  $total_amount=$total_amount+$rows["sell_price"];
  //$total_quantity=$total_quantity+$rows["sell_price"];
  $imgpath=explode(',',$rows["image_path"]);
  $imgurl=base_url()."stores/".$store_uid."/products/si/".$imgpath[0];
  $discount=$rows["discount"];
  $divStyl=($discount!=0)?"priceWithDiscountStyl":"priceDetails";
?>

<div class="oneshop_cartItem" id="cart_item_<?php echo $rows['product_aid'];?>">    
    <img src="<?php echo $imgurl;?>" class="oneshop_cartItemImage">
      <span class="oneshop_cartItemDetails"><h4><?php echo $rows["name"];?></h4></span>
      <span class="oneshop_cartItemDetails <?php echo $divStyl;?>"><h4>Price</h4>
        <h3 name="price"><?php echo $rows["sell_price"];?></h3>
      </span>
      <span class="oneshop_cartItemDetails <?php echo $divStyl;?>"><h4>Quantity</h4>
        <input type="hidden" name="hprice" id="hprice_<?php echo $rows["product_aid"]?>" value="<?php echo $rows["sell_price"];?>"/>
        <input type="hidden" name="hamount" id="hamount_<?php echo $rows['product_aid']?>" value="<?php echo $rows["sell_price"];?>"/>
        <input type="hidden" name="hquantity" id="hquantity_<?php echo $rows["product_aid"]?>" value=""/>
        <input type="number" name="quantity" id="quantity_<?php echo $rows['product_aid']?>" min="1" max="10" class="oneshop_cartItemsQuantity" value="1">
      </span> 
      <?php
      if($discount!=0){
      ?>
      <span class="oneshop_cartItemDetails priceWithDiscountStyl"><h4>Discount</h4>          
          <h3><?php echo $discount;?></h3>
      </span>
              <?php
      }?>
      <span class="oneshop_cartItemDetails <?php echo $divStyl;?>"><h4>Total Price</h4><h3 name="price" id="price_<?php echo $rows['product_aid']?>"><?php echo $rows["sell_price"];?></h3></span>
      <a href="javascript:void(0)" id="delete_cart_<?php echo $rows['product_aid']?>"><span id="product_span" style="display:none;"><?=$rows['product_aid']?></span>delete</a>
</div>
<script type="text/javascript">
  $("#delete_cart_<?php echo $rows['product_aid']?>").click(function(){
    var thisid=$(this).attr("id");
    var idarry=thisid.split("_");
    var product_id=idarry[2];
    $.ajax({
      type:'post',
      url: oneshop_url+'/mycart/deleteCart',
      data:{productid:product_id},
      success:function(data){
        var res=data.trim();
        var item_id="cart_item_"+product_id;
        $("#"+item_id).fadeOut(500,function(){
          if(res==0){  
            $(".oneshop_BuyCartItems").css("display","none");
            $(".oneshop_cartItemsPage div.osdev_noitems").css("display","block");  
            $("#cart_items_cnt").css("display","none");            
          }else{
            $("#cart_items_cnt").text(res);
          }
        });
      }
    });
  });
  $("#quantity_<?php echo $rows['product_aid']?>").bind('keyup mouseup', function () {
    var quantity_val=$(this).val();
    var input_id=$(this).attr("id");
    var price_id=input_id.split("_");
    var i_price_val=$("#hprice_"+price_id[1]).val();     
    var price=(i_price_val*quantity_val);
    $("#price_"+price_id[1]).text(price);
    $("#hamount_"+price_id[1]).val(price);
    var qty_str="";
    var i=0; 
    var price_str=0;
    var j=0;
    var total_quantity=0;
    var total_amount=0;
    $(".oneshop_cartItem input[name=quantity]").each(function(){
      if(i==0){
        qty_str=qty_str+$(this).val();        
      }else{
        qty_str=qty_str+"~"+$(this).val();        
      }
      total_quantity=total_quantity+parseInt($(this).val());
      i++;
    });
    $(".oneshop_cartItem input[name=hamount]").each(function(){      
      if(j==0){
        price_str=price_str+parseInt($(this).val());        
      }else{
        price_str=price_str+"~"+parseInt($(this).val());        
      }
      //alert(price_str);
      //total_amount=total_amount+parseInt($(this).val());
      j++;
    });
    var s_custom=$("input[name=custom]").val();
    var custom_arry=s_custom.split("-");
    var custom_len=custom_arry.length;
    $.each(custom_arry, function(idx, value) {
      if(idx==custom_len-1){
        custom_arry[idx]=price_str;
      }
      if(idx==custom_len-2){
        custom_arry[idx]=qty_str;
      }      
    });
    var s_mcustom=custom_arry.join("-"); 
    $("#custom").val(s_mcustom);
    $("#quantity").val(total_quantity);
    $("#hamount").val(total_amount);
  });
    
</script>
<?php
$k++;
}
if($cart_items!=0){
  $custom=$store_id."-".$s_hproduct."-".$s_hqty."-".$s_hamount;
  //$buy_url=base_url()."home/shippingAddress/".$s_hproduct."/".$storeid;
  //$buy_url=base_url()."mycart/cartBuyAll";
  ?>
  <div class="oneshop_BuyCartItems">
    <input type="hidden" name="custom" id="custom" value="<?php echo $custom;?>"/>
    <input type="hidden" id="hqty_str" value="<?php echo $s_hqty?>"/>   
    <input type="hidden" id="hproducts_str" value="<?php echo $s_hproduct;?>"/>
    <button class="oneshop_basicInfoBtn oneshop_productBuyBtn" id="buyall_btn">Buy All</button>
  </div>
<?php
}
?>
