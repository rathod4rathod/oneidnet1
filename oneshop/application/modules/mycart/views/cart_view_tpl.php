<?php
$this->load->module('stores');
$subtotal_price=0;
$tstore = array();
$j=1;
$cart_cnt=count($cart_details);
$ccnt=count($cart_count);
if($ccnt == 1 && $cart_cnt > 1){
?>
<div class="flr mat5">
  <span class="button button1"><a href="javascript:void(0)" class="white" id="tcheckout?>">Full Checkout</a></span>
</div>
<?php }?>
<?php
if($cart_details!=0){
  foreach($cart_details as $clist){
    $currency=$clist["currency"];
    $currencysy=$clist["symbol"];
    $store_url=base_url()."store_home/".$clist["store_code"];
?>
  <div id="store_dv_<?php echo $clist['store_aid']?>">
    <div class="borderbottom wi100pstg overflow bgRed">
        <div class="np_des_netpro_settings_tabbg fll">
            <div class="np_des_contbox_safebox_topdiv fll"> <a href="<?php echo $store_url;?>"><?php echo $clist["store_name"];?></a> </div>
            <div class="np_des_curner fll">&nbsp;</div>
        </div>
        <p class="flr mat5">
            <span><a href="javascript:void(0)" class="white mar10" id="remove_<?php echo $clist['store_aid'];?>"> <b>Remove</b> </a> </span>
            <span><a href="javascript:void(0)" class="white" id="checkout_<?php echo $clist['store_aid']?>"> <b>Checkout</b> </a> </span>
        </p>
    </div>
      <?php
      //print_r($clist["products"]);
      $p=0;
      $subtotal_price=0;
      foreach($clist["products"] as $plist){
        $product_detail_url=base_url()."product_detail_view/".$clist['store_code']."/".$plist['product_code'];
        if($plist["primary_image"]!=""){
          $product_img_url=base_url()."stores/".$clist["store_code"]."/products/".$plist["product_aid"]."/li/".$plist["primary_image"];
        }
        else{
          $product_img_url=base_url()."assets/images/default_product_60.png";
        }
      ?>
        <div class="historyResultsMainDiv" id="product_div_<?php echo $plist['product_aid']?>">
          <div class="tumbnail"><img src="<?php echo $product_img_url;?>"></div>
          <div class="searchText overflow">
            <div class="cart_heading">
              <a href="<?php echo $product_detail_url?>">
                  <?php echo $plist["product_name"];?>
              </a>
            </div>
            <div class="fll">
                <p class="fll mat10 fs14"> <span class="bold gray"> Price: </span> 
                <?php
                  if($plist["discount"]==0){
                    echo'<span class="bold">' .$currencysy." ".number_format($plist["cost_price"], 2).' </span>';
                    echo'<input type="hidden" class="product_price" value="'.number_format($plist["cost_price"], 2).'">';
                    }
                  else
                  {
                    echo'<span class="bold">' .$currencysy." ".number_format($plist["sale_price"], 2).'</span>';
                    echo'<input type="hidden" class="product_price" value="'.number_format($plist["sale_price"], 2).'">';
                  }
                  ?>

<!--Edited By Mitesh => get currency symbol for paybook -->
                <input type="hidden" class="prod_currency" value="<?php echo $currencysy;?>">
                <input type="hidden" class="prod_shipping" value="<?php echo number_format($plist["shipping"], 2);?>">
                <input type="hidden" class="prod_handling" value="<?php echo number_format($plist["handling"], 2);?>">
                <p class="fll mat10 mal20 green"><a href="javascript:void(0)" id="delete_<?php echo $plist["product_aid"];?>"> Remove </a>  </h2></p>
            </div>
            <p class="flr mat10">
              <span class="fll mar10 lh20"> Quantity: </span>
              <select name="privacy" class="oneshop_cartquantity">
                  <?php
                  for($i=1;$i<=100;$i++){
                      echo "<option value='".$i."'>".$i."</option>";
                  }
                  ?>
              </select>
            </p>
          </div>
      <?php
        if($plist["discount"]!=0){
          // $oneidnet_charge=+($plist["sale_price"]*5/100);
          ?>
            <p class="flr mat10">
              <span class="fll mar10 lh20"> Charges (Shipping, Handling, TAX): </span>
              <br/>
              <span class="red bold">Shipping : </span><span class="bold"><?php echo number_format($plist["shipping"], 2);?></span>
              <br/> 
              <span class="red bold">Handling : </span><span class="bold"><?php echo number_format($plist["handling"], 2);?></span>
            <!--   <span class="red bold">ONEIDNET (5%) : </span><span class="bold"><?php echo number_format($oneidnet_charge, 2);?></span> -->
              <!-- <input type="hidden" class="prod_oneidnet" value="<?php echo number_format($oneidnet_charge, 2);?>"> -->
               <br/>
               <span class="red bold">TAX ( 
               <?php foreach ($cart_pdetails as $cplist) {
                     foreach ($cplist["tax"] as $tlist) {
                $ttax+=$tlist["tax_perc"];?>
                <?php echo $tlist["tax_name"];?>(<?php echo number_format($tlist["tax_perc"]).'%';?>)
               <?php } }?>
             ) : </span><span class="bold"><?php echo number_format($plist["sale_price"]*$ttax/100, 2);?></span>
              <input type="hidden" class="prod_tax" value="<?php echo number_format($plist["sale_price"]*$ttax/100, 2);?>">
            </p>
          <?php }else {
          $oneidnet_charge=+($plist["cost_price"]*5/100);
            ?>
            <p class="flr mat10">
              <span class="fll mar10 lh20"> Charges (Shipping,Handling,ONEIDNET,TAX): </span>
              <br/>
              <span class="red bold">Shipping : </span><span class="bold"><?php echo number_format($plist["shipping"], 2);?></span>
              <br/> 
              <span class="red bold">Handling : </span><span class="bold"><?php echo number_format($plist["handling"], 2);?></span>
              <!-- <span class="red bold">ONEIDNET (5%) : </span><span class="bold"><?php echo number_format($oneidnet_charge, 2);?></span>
              <input type="hidden" class="prod_oneidnet" value="<?php echo number_format($oneidnet_charge, 2);?>"> -->
              <br/> 
              <span class="red bold">TAX (
               <?php foreach ($cart_pdetails as $cplist) {
                     foreach ($cplist["tax"] as $tlist) {
                $ttax+=$tlist["tax_perc"];?>
                <?php echo $tlist["tax_name"];?>(<?php echo number_format($tlist["tax_perc"]).'%';?>)
               <?php } } ?>
               ) : </span><span class="bold"><?php echo number_format($plist["cost_price"]*$ttax/100, 2);?></span>
                <input type="hidden" class="prod_tax" value="<?php echo number_format($plist["cost_price"]*$ttax/100, 2);?>">
            </p>
          <?php }?>
        </div>
      <?php
        if($plist["discount"]!=0){
          $oneidnet_charge=+($plist["sale_price"]*5/100);
          $tax_amt=+($plist["sale_price"]*$ttax/100);
          $subtotal_price+=$plist["sale_price"] + +$plist["shipping"] + +$plist["handling"]+ +$tax_amt;
          $p++;
        }
        else
        {
          $oneidnet_charge=+($plist["cost_price"]*5/100);
          $tax_amt=+($plist["cost_price"]*$ttax/100);
          $subtotal_price+=$plist["cost_price"] + +$plist["shipping"] + +$plist["handling"]+ +$tax_amt;
          $p++;
        }
      }
      ?>
    <div class="wi100pstg borderbottom mat10 flr">
       <p class="flr red fs20 bold mab15">
        <span id='subtotal_items'> Subtotal (<span><?php echo $p;?></span> items): </span>
        <span class="gray mar10"> <?php echo $currency;?> <span class="subtotal_price"><?php echo number_format($subtotal_price,2)?></span> 
      </span>
      </p>
    </div>
    <input type="hidden" id="tc_store[]" class="tc_store[]" value="<?php echo $clist['store_aid'] ?>">
    </div>
<?php
  $tcart+=$subtotal_price;
  $tstore[]=$clist['store_aid'];
  $j++;
  }
?>
<?php 
  $cart_store = implode(',', $tstore);
?>
  <input type="hidden" id="totalc_price" class="totalc_price" value="<?php echo $tcart ?>">
  <input type="hidden" id="totalc_price" class="totalc_price" value="<?php echo $cart_store ?>">
  <input type="hidden" id="tcurr" class="tcurr" value="<?php echo $currencysy ?>">
<?php }
else{
  echo '<div class="nodata_found_bgwrap"><p> Your cart list is empty </p></div>';
}
?>

