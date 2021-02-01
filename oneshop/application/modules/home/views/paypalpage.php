<?php
/*
 * Example page to make payment from paypal account
 * Login with buyer account details
*/
?>
<form name="_xclick" action="https://api-3t.sandbox.paypal.com/nvp" method="post">
<input type="hidden" name="cmd" value="_cart">
<input type="hidden" name="business" value="sravya.n526-facilitator@gmail.com"><!--  sravya.n526@gmail.com  /  sravya.n526-facilitator@gmail.com merchant account details-->
<input type="hidden" name="currency_code" value="USD">
<input type="hidden" name="upload" value="1">
<!--<input type="hidden" name="quantity1" id="quantity1" value="500">
<input type="hidden" name="quantity2" id="quantity2" value="500">
<input type="hidden" name="custom" value="20">-->
<input type="hidden" name="amount_1" value="2">
<input type="hidden" name="item_number_1" value="20">
<input type="hidden" name="item_name_1" value="samsung-galaxy-s5">
<input type="hidden" name="amount_2" value="1">
<input type="hidden" name="item_number_2" value="25">
<input type="hidden" name="item_name_2" value="samsung-galaxy-s5">
<input type="hidden" name="return" value="<?php echo base_url().'home/buynow'?>">
<input type="hidden" name="notify_url" value="paypal/ipn.php">
<input type="hidden" name="cancel_return" value="<?php echo base_url().'home/cancel'?>">
<!--<input type="image" src="http://www.paypal.com/en_US/i/btn/btn_buynow_LG.gif" 
        border="0" name="submit" class="buyingprd" alt="Make payments with PayPal - it's fast, free and secure!">-->
<input type="submit" border="0" name="submit" value="Buy">
</form>
