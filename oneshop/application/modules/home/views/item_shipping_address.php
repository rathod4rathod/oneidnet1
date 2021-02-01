<?php
$this->load->module('templates');
$this->templates->app_header();
$this->templates->os_mainmenu();
?>       

<!--Oneshop Content starts Here(vinod 19-05-2015)-->
<div class="oneshop_contentSection">
    <div class="oneshop_leftSection">
        <span class="oneshop_leftHead">
            <h3>Shipping address</h3>
        </span>
        <div class="oneshop_myStoreSettings">
                    <?php
          //var_dump($product_details);
           $cart_item_details=$this->uri->segment(5);
   ///  echo $cart_item_details;
           $product_details=explode("-",$cart_item_details);
           $store_aid=$product_details[0];
         $product_ids=$product_details[1];
         $product_quantitys=$product_details[2];
         $product_prices=$product_details[3];
       $a_product_ids=explode("~",$product_ids);
       $a_product_quatity=explode("~",$product_quantitys);
       $a_product_price=explode("~",$product_prices);
      // print_r($a_product_ids);
       $totalAmount=0;
    //  print_r($profile_id_address);
        $dev_billing_address1=$profile_id_address[0]['addressline1'];
            $dev_billing_address2=$profile_id_address[0]['addressline2'];
       if($product_ids!=''){?>
          <div class="oneshop_shippingaddressProductListHeader">
            <span class="oneshop_shippingAddressHeaderTitle">
              <ul><li style="width: 250px;">Product Name</li>
                  <li style="width: 100px;">Quantity</li>
                  <li style="width: 100px;">Price</li></ul>
            </span>
          </div>
           <?php
           $prods_obj=$this->load->module("products");        
    $store_unique_id=$prods_obj->store_unique_id($store_aid);
        for($i=0;$i<count($a_product_ids);$i++){
          $totalAmount=$a_product_price[$i]+$totalAmount;
          $product_id_val=$a_product_ids[$i];
          //cho $product_id_val;
         $obj= $this->load->module('home');
        $a_result=$obj->cartProductsMore($product_id_val);
        
        $img_arry=explode(",",$a_result[0]['image_path']);
        ?>
       <div class="oneshop_shippingAddressHeader">
            <span class="oneshop_shippingAddressHeaderImage">
              <image src="<?php echo base_url()."stores/".$store_unique_id."/products/si/".$img_arry[0];?>"/></span>
            <span class="oneshop_shippingAddressHeaderDetails">
                  <div class="productDetails" style="width: 250px;"><?php echo $a_result[0]['name'];?></div>
                  <div class="productDetails" style="width: 100px;"><?php echo $a_product_quatity[$i];?></div>
                  <div class="productDetails" style="width: 100px;"><?php echo $a_product_price[$i];?></div>
            </span>
          </div>
          
       <?php
       }?>
       <div>
         <span class="oneshop_shippingAddressHeaderDetails" style="float:left;height:20px;width:545px">Total Amount:
              <div class="productDetails" style="float:right;border-right: none;padding:5px 10px 0"><h3 style="font: 14px Arial;"><?php echo $totalAmount;?></h3></div>
            </span>
          </div>
        
      <?php
      }else{
    //   print_r($a_product_ids);
        // print_r($product_quantitys);
        // print_r($product_prices);
        
           $dev_billing_address1=$profile_id_address[0]['addressline1'];
            $dev_billing_address2=$profile_id_address[0]['addressline2'];
            $img_arry=explode(",",$product_results[0]['image_path']);
        ?>
          <div class="oneshop_shippingAddressHeader">
            <span class="oneshop_shippingAddressHeaderImage">
              <img src="<?php echo base_url()."stores/".$store_unique_id."/products/si/".$img_arry[0];?>"/></span>
            <span class="oneshop_shippingAddressHeaderDetails">
              <div class="productDetails" ><?php echo $product_results[0]['name'];?></div>
                  <div class="productDetails" ><?php echo $product_results[0]['sell_price'];?></div>
                  <div class="productDetails" ><?php echo $product_results[0]['quantity'];?></div>
                  <div class="productDetails">Amount</div>
            </span>
          </div>
       <?php
       
       }
       ?>
            <div class="oneshop_myStoreManageStaff">       
                
              <!--  <button class="oneshop_basicInfoBtn">Save</button>-->
              <div class=" oneshop_shippingAddress">
                <h4>Delivery Type :</h4>
                <span class="oneshop_delivaryType"><input type="radio" id="standard_delivery" class="radioBtnClass"name="deliver_type" value="Standard" checked="true"><h5>Standard Delivery</h5></span>
                 <span class="oneshop_delivaryType"><input type="radio" id="quick_delivery" class="radioBtnClass"name="deliver_type" value="Quick"><h5>Quick Delivery</h5></span>

              </div>
              <?php if($dev_billing_address1==''||$dev_billing_address2==''){
               //echo'<h4>Billing Address Details :</h4>';
              
                ?>
             <form id="address_userdetails">
               <input type="hidden" type="radio" id="standard_delivery" class="radioBtnClass"name="deliver_type" value="Standard" checked="true">
<input type="hidden" value="insert_shipping" id="insert_shipping" name="insert_shipping">
               <input type="hidden" type="radio" id="standard_delivery" class="radioBtnClass"name="deliver_type" value="Quick" checked="true">
             <div class="oneshop_mystoreSettinsField">
                    <span class="onshop_formsFieldLables" ><h5>Address Line 1 :</h5></span>                        
                    <textarea class="oneshop_mystoreField textAreaType" name="user_details_addres1" id="user_details_addres1"></textarea>
                </div>
                <div class="oneshop_mystoreSettinsField">
                    <span class="onshop_formsFieldLables"><h5>Address Line 2 :</h5></span>
                    <textarea class="oneshop_mystoreField textAreaType" name="user_details_addres2"id="user_details_addres2"></textarea>
                </div>                                                
                <div class="oneshop_mystoreSettinsField">
                    <span class="onshop_formsFieldLables"><h5>Country :</h5></span>
                    <select class="oneshop_mystoreField selectType" name="dev_billing_os_country" id="dev_billing_os_country">
<!--                        <option value="<?php echo $country_info[0]['country_id'];?>"><?php echo $country_info[0]['country_name'];?></option>-->
                        <option value="">--Select Country--</option>
                        <?php
                        $countries_arry=explode(",",$country_info);
                        foreach($countries_arry as $clist){
                            $clist_arry=explode("-",$clist);
                            echo '<option value="'.$clist_arry[0].'">'.$clist_arry[1].'</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="oneshop_mystoreSettinsField">
                    <span class="onshop_formsFieldLables"><h5>State :</h5></span>
                    <select class="oneshop_mystoreField selectType" name="dev_billing_os_state_list" id="dev_billing_os_state_list">
                       <option value=''>--Select State--</option>
                       <?php foreach($states_list as $dev_os_billing_states_list){?>
                 <option value="<?php echo $dev_os_billing_states_list['state_id'] ?>"><?php echo $dev_os_billing_states_list['state_name'] ?>
                   </option>  
                   <?php  }?>
                    </select>
                </div>
                <div class="oneshop_mystoreSettinsField">
                    <span class="onshop_formsFieldLables"><h5>City :</h5></span>
                    <select id="dev_os_billing_citieslist" name="dev_os_billing_citieslist" class="oneshop_mystoreField selectType">
                        <option value=''>--Select city--</option>
                    </select>
                </div>                              

                <div class="oneshop_mystoreSettinsField">
                    <span class="onshop_formsFieldLables"><h5>Zip Code :</h5></span>
                    <input type="text" class="oneshop_mystoreField" name="user_details_zipcode"  id="user_details_zipcode" value="">
                </div>  
                <button class="oneshop_basicInfoBtn" id="dev_os_userAddressSave1">Save</button>
              
                 <div class="oneshop_mystoreSettinsField">
                 <span class="onshop_formsFieldLables"><h5>Save this address as Permanent</h5></span>
                 <input type="checkbox" id="chkbx_confirmation_billingAddr" checked="true">
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
  if(isset($product_results[0]['store_id'])){
    $store_id=$product_results[0]['store_id'];
  }else{
    $store_id="public";
    //$product_results[0]["sell_price"]
  }
?>
<input type="hidden" name="custom" value="<?php echo  $store_id?>">
<input type="hidden" name="amount" value="10">
<input type="hidden" name="item_number" value="<?php echo $product_results[0]['product_aid'] ?>">
<input type="hidden" name="return" value="<?php echo base_url().'home/buynow'?>">
<?php
}
?>
<input type="hidden" name="notify_url" value="paypal/ipn.php">
<input type="hidden" name="cancel_return" value="<?php echo base_url().'home/cancel'?>">
<button class="oneshop_basicInfoBtn" id="dev_os_userAddressProceed1" style="display:none">Proceed</button>                
            </form>  
  <?php 
    }else{
  ?>
              <div class=" oneshop_shippingAddress">
                <h4>Billing Address Details :</h4>
               <span class="oneshop_delivaryType"><input type="radio" id="saved_address"  checked="true" name="billing_address" value=""><h5>Deliver to the existing address</h5></span>
                 <span class="oneshop_delivaryType"><input type="radio" id="another_address" name="billing_address" value=""><h5>Deliver to another address</h5></span>

              </div>
                  <div class="oneshop_myStoreBasicInfo" id="saved_address_div">
                <h4>Address Information</h4>
                <div class="oneshop_mystoreSettinsField">
                    <span class="onshop_formsFieldLables"><h5>Address Line 1 :</h5></span>                        
                    <textarea class="oneshop_mystoreField textAreaType" readonly><?php echo $profile_id_address[0]['addressline1'];?></textarea>
                </div>
                <div class="oneshop_mystoreSettinsField">
                    <span class="onshop_formsFieldLables"><h5>Address Line 2 :</h5></span>
                    <textarea class="oneshop_mystoreField textAreaType" readonly><?php echo $profile_id_address[0]['addressline2'];?></textarea>
                </div>                                                
                <div class="oneshop_mystoreSettinsField">
                    <span class="onshop_formsFieldLables"><h5>Country :</h5></span>
                    <select class="oneshop_mystoreField selectType">
                        <option value="<?php echo $country_info[0]['country_id'];?>"><?php echo $country_info[0]['country_name'];?></option>
                    </select>
                </div>
                <div class="oneshop_mystoreSettinsField">
                    <span class="onshop_formsFieldLables"><h5>State :</h5></span>
                    <select class="oneshop_mystoreField selectType">
                       <option value=''><?php echo $state_name[0]['state_name'];?></option>
                    </select>
                </div>
                <div class="oneshop_mystoreSettinsField">
                    <span class="onshop_formsFieldLables"><h5>City :</h5></span>
                    <select class="oneshop_mystoreField selectType">
                        <option value=''><?php echo $city_name[0]['city_name'];?></option>
                    </select>
                </div>                              

                <div class="oneshop_mystoreSettinsField">
                    <span class="onshop_formsFieldLables"><h5>Zip Code :</h5></span>
                    <input type="text" class="oneshop_mystoreField" value="<?php echo $profile_id_address[0]['zip_code'];?>" readonly>
                </div>  
                <form name="_xclick" action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
<input type="hidden" name="cmd" value="_xclick">
<input type="hidden" name="business" value="sravya.n526-facilitator@gmail.com"><!--  sravya.n526@gmail.com  /  sravya.n526-facilitator@gmail.com merchant account details-->
<input type="hidden" name="currency_code" value="USD">
<?php
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
<input type="hidden" name="quantity" id="quantity" value="<?php echo $total_qty;?>">
<input type="hidden" name="custom" value="<?php echo $custom ?>">
<input type="hidden" name="amount" value="<?php echo $total_amount; ?>">
<input type="hidden" name="return" value="<?php echo base_url().'mycart/cartBuyAll'?>">

<?php
}else{
?>
<input type="hidden" name="quantity" id="quantity" value="1">
<input type="hidden" name="custom" value="<?php echo $product_results[0]['store_id'] ?>">
<input type="hidden" name="amount" value="<?php echo $product_results[0]["sell_price"]; ?>">
<input type="hidden" name="item_number" value="<?php echo $product_results[0]['product_aid'] ?>">
<input type="hidden" name="return" value="<?php echo base_url().'home/buynow'?>">
<?php
}
?>
<input type="hidden" name="notify_url" value="paypal/ipn.php">
<input type="hidden" name="cancel_return" value="<?php echo base_url().'home/cancel'?>">
                <button class="oneshop_basicInfoBtn">Proceed</button>
                </form>
            </div>
            
              <?php
              }?>
            </div> 
         
        </div>
      <div  class="oneshop_myStoreBasicInfo" id="new_address_div" style="display:none">
            <?php
            $this->load->module('home');
           $this->home->newBillingAddress();
            ?>
          </div>
    </div>
    <?php
    $this->load->module("ads");
    $this->ads->ads_view();
    ?>
</div>          
</div>
<!--Oneshop Content ends Here(vinod 19-05-2015)-->            

<?php
$this->templates->app_footer();
?>


<style type="text/css">
  .oneshop_shippingAddressHeader{
    float: left;
    width: 625px;
  }
  .oneshop_shippingAddressHeaderImage{
    float: left;
    width: 140px;
    height:  150px;
    background-color: #eee;
    overflow:  hidden;
    padding:  3px;
    border: solid 1px #777;
    margin: 5px;
  }
  .oneshop_shippingAddressHeaderImage img{
    float: left;
    width: 140px;
  }
  .oneshop_shippingAddressHeaderDetails{
    float: left;
    width: 400px;
    height: 40px;
    background-color: #eee;
    margin: 5px 0 0 0;
  }
  .productDetails{
    float: left;
    font: 13px Arial;
    width: 70px;
    height: 30px;
    color: #444;
    text-align: center;
    border-right: solid 1px #777;
    padding: 10px 10px 0 10px;
  }
  .productDetails:nth-child(4){
    border-right: solid 0px #777;
  }
  .oneshop_shippingAddress{
    float: left;
    background-color: #eee;
    border-bottom: solid 1px #bbb;
  }
  .oneshop_shippingAddress h4{
    float: left;
    font: 16px Arial;
    color: #333;
  }
  .oneshop_delivaryType{
    float: left;
    font: 14px Arial;
    color: #555;
    width: 500px;
  }
  .oneshop_delivaryType input{
    float: left;
    margin: 5px;
  }
  .oneshop_delivaryType h5{
    float: left;
    margin:  5px;
  }
  /*25 june 2015*/
  .oneshop_shippingaddressProductListHeader{
    float: left;
    width: 625px;
    height: 50px;
    margin-top: 10px;
    border-top-right-radius:  10px;
    border-top-left-radius:  10px;
    border-bottom: solid 1px #aaa;
    background-color: #ddd;
  }
  .oneshop_shippingAddressHeader{
    float: left;
    height: 50px;
    background-color: #eee;
    border-bottom: solid 1px #ccc;
  }
  .oneshop_shippingAddressHeaderTitle{
    float: left;
    width: 500px;
    height: 40px;
    margin: 5px 0 0 50px;
  }
  .oneshop_shippingAddressHeaderTitle ul{
    list-style: none;
  }
  .oneshop_shippingAddressHeaderTitle ul li{
    width: 160px;
    float: left;
    height: 30px;
    padding-top: 10px;
    text-align: center;
    font: bold 14px Arial;
    color: #777;
  }
  .oneshop_shippingAddressHeaderImage{
    float: left;
    padding: 0px;
    margin: 3px;
    height: 44px;
    width: 44px;
    border: 0px;
    overflow: hidden;
    background-color: #ccc;
  }
  .oneshop_shippingAddressHeaderImage img{
    float: left;
    width: 44px;
  }
  .oneshop_shippingAddressHeaderDetails{
    float: left;
    width: 500px;
    height: 44px;
    margin: 3px 0 0 5px;
  }
  .productDetails{
    float: left;
    width: 160px;
    height: 30px;
    font: 14px Arial;
    color: #555;
    border: 0px;
    padding: 15px 0 0 0;
  }
  .oneshop_proName{
    float: left;
    width: 120px;
    background-color: #999;
    color: white;
    font: 13px Arial;
  }
</style>