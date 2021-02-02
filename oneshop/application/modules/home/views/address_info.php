<form id="newbilling_address">
  <input type="hidden" type="radio" id="standard_delivery" class="radioBtnClass"name="deliver_type" value="Standard" checked="true">
  <input type="hidden" type="radio" id="standard_delivery" class="radioBtnClass"name="deliver_type" value="Quick" checked="true">
<input type="hidden" value="insert_shipping" id="insert_shipping" name="insert_shipping">
                <h4>Billing Address Information</h4>
                <div class="oneshop_mystoreSettinsField">
                    <span class="onshop_formsFieldLables"><h5>Address Line 1 :</h5></span>                        
                    <textarea class="oneshop_mystoreField textAreaType"  name="user_details_addres1" id="os_billing_address1" value=""></textarea>
                </div>
                <div class="oneshop_mystoreSettinsField">
                    <span class="onshop_formsFieldLables"><h5>Address Line 2 :</h5></span>
                    <textarea class="oneshop_mystoreField textAreaType" name="user_details_addres2" id="os_billing_address2" value=""></textarea>
                </div>                                                
                <div class="oneshop_mystoreSettinsField">
                    <span class="onshop_formsFieldLables"><h5>Country :</h5></span>
                    <select class="oneshop_mystoreField selectType"  name="dev_billing_os_country" id="dev_billing_os_country">
                        <option value="<?php echo $country_info[0]['country_id'];?>"><?php echo $country_info[0]['country_name'];?></option>
                    </select>
                </div>
                <div class="oneshop_mystoreSettinsField">
                    <span class="onshop_formsFieldLables"><h5>State :</h5></span>
                    <select class="oneshop_mystoreField selectType" name="dev_billing_os_state_list" id="dev_billing_os_state_list">
                      <option value="null">--Select State--</option>
                    </select>
                </div>
                <div class="oneshop_mystoreSettinsField">
                    <span class="onshop_formsFieldLables"><h5>City :</h5></span>
                    <select id="dev_os_billing_citieslist" name="dev_os_billing_citieslist" class="oneshop_mystoreField selectType">
                        <option>--Select city--</option>
                    </select>
                </div>                                                    

                <div class="oneshop_mystoreSettinsField">
                    <span class="onshop_formsFieldLables"><h5>Zip Code :</h5></span>
                    <input type="text" class="oneshop_mystoreField"  name="user_details_zipcode" value="" id="dev_os_billing_zipcode">
                </div>  
                <button class="oneshop_basicInfoBtn" id="billing_address_save">Save</button>
                 
                 <div class="oneshop_mystoreSettinsField">
                    <span class="onshop_formsFieldLables"><h5>Save this address as perminent address</h5></span>
                    <input type="checkbox" class="oneshop_mystoreField"  name="chkbox_address_user" value="" id="chkbox_address_user">
                </div>  
            </form>
<form name="_xclick" action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
<input type="hidden" name="cmd" value="_xclick">
<input type="hidden" name="business" value="sravya.n526-facilitator@gmail.com"><!--  sravya.n526@gmail.com  /  sravya.n526-facilitator@gmail.com merchant account details-->
<input type="hidden" name="currency_code" value="USD">
<input type="hidden" name="quantity" id="quantity" value="1">
<?php
//echo $custom;
if($custom!=""){
  $custom_arry=explode("-",$custom);
  $storeid=$custom_arry[0];
  $prods=explode("~",$custom_arry[1]);
  $qty=explode("~",$custom_arry[2]);
  $price=explode("~",$custom_arry[3]);
  $total_qty=0;
  $total_amount=0;
  for($j=0;$j<count($prods);$j++){
    $total_amount=$total_amount+$price[$j];
    $total_qty=$total_qty+$qty[$j];
  }
  
?>
<input type="hidden" name="custom" value="<?php echo $custom ?>">
<input type="hidden" name="amount" value="<?php echo $total_amount; ?>">
<input type="hidden" name="return" value="<?php echo base_url().'mycart/cartBuyAll'?>">

<?php
}else{
?>
<input type="hidden" name="custom" value="<?php echo $product_results[0]['store_id'] ?>">
<input type="hidden" name="amount" value="<?php echo $product_results[0]["sell_price"]; ?>">
<input type="hidden" name="item_number" value="<?php echo $product_results[0]['product_aid'] ?>">
<input type="hidden" name="return" value="<?php echo base_url().'home/buynow'?>">
<?php
}?>
<input type="hidden" name="notify_url" value="paypal/ipn.php">
<input type="hidden" name="cancel_return" value="<?php echo base_url().'home/cancel'?>">
<button class="oneshop_basicInfoBtn" id="billing_address_Proceed" style="display:none">Proceed</button>
</form>