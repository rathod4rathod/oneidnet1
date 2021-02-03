<?php
if (empty($product)) {
	$url = base_url() . "mycart/myCartView/";
	header("Location:".$url);
	exit();
}
$db_api=$this->load->module("db_api");
$pr_array = explode("-", $product);
for($p=0;$p<count($pr_array);$p++){
    $chk_item=$pr_array[$p];
    $pr_array[$p]=explode("-",$chk_item);
    $query = $db_api->custom('SELECT * FROM oshop_products WHERE product_aid = "'.$pr_array[$p][1].'"');
    // $currquery = $db_api->custom('SELECT * FROM iws_currencies where symbol = "'.$curr.'"');
    $pname = $query[0]['product_name'];
    $pqnty = $pr_array[$p][2];
    $pprice = $pr_array[$p][0];
    $lineitems = array('name' => $query[0]['product_name'],'amount' => $pr_array[$p][0], 'currency' => 'usd', 'quantity' => $pr_array[$p][2]);
  }
  echo var_dump($lineitems);
  $str_acc = $sacc[0]['s_account'];
// echo var_dump($pname);
// // echo var_dump(strtolower($currquery[0]['sc']));
// exit();
$curr = strtolower($currquery[0]['sc']);

require './vendor/autoload.php';

  // Set your secret key. Remember to switch to your live secret key in production!
  // See your keys here: https://dashboard.stripe.com/account/apikeys
  \Stripe\Stripe::setApiKey('sk_test_51HqXE5IIelCwrUfqj2KqeSuXLlS3qYxU4vdcvN075v37Dl80gjmz0xloua7dMHt09VphfQzaVc0x84MkitxDHNQ000ZbUOc044');
  try {
    $session = \Stripe\Checkout\Session::create([
      'success_url' => base_url().'mycart/myCartView',
      'cancel_url' => base_url().'mycart/myCartView',
      'payment_method_types' => ['card','alipay'],
      'line_items' => [
        [$lineitems]
      ],  
      'payment_intent_data' => [
        'application_fee_amount' => round(($pprice * 7 / 100) * 100),
        'transfer_data' => [
          'destination' => $str_acc,
        ],
      ],
    ]);
    $success = 1;
  }
 catch(\Stripe\Exception\CardException $e) {
  // Since it's a decline, \Stripe\Exception\CardException will be caught
  $card_error = $e->getError()->message;
} catch (\Stripe\Exception\RateLimitException $e) {
  // Too many requests made to the API too quickly
} catch (\Stripe\Exception\InvalidRequestException $e) {
  // Invalid parameters were supplied to Stripe's API
  $invali_error = $e->getError()->message;
} catch (\Stripe\Exception\AuthenticationException $e) {
  // Authentication with Stripe's API failed
  // (maybe you changed API keys recently)
} catch (\Stripe\Exception\ApiConnectionException $e) {
  // Network communication with Stripe failed
} catch (\Stripe\Exception\ApiErrorException $e) {
  // Display a very generic error to the user, and maybe send
  // yourself an email
} catch (Exception $e) {
  echo 'Error :'.$e->getError()->message;
  // Something else happened, completely unrelated to Stripe
}
$carturl = base_url()."mycart/myCartView";
if($success != 1){
  $_SESSION["check"]["time"] = time();
  $_SESSION["check"]["invalid"] = $invali_error;
  header('Location: '. $carturl);
}

?>

<script src="https://js.stripe.com/v3/"></script>
 <script type="text/javascript">
      // Create an instance of the Stripe object with your publishable API key
      var stripe = Stripe('pk_test_51HqXE5IIelCwrUfqk4CcP1jdDNLl8dClBflwa2pyzTcYcsFTq3VTznk075nTuP9kbqtJrwKMgLJOv7bEAUwXZ709007J2nFdX3');
      var session = '<?php echo $session['id'] ?>';

        stripe.redirectToCheckout({ sessionId: session })      

        .then(function(result) {
          // If `redirectToCheckout` fails due to a browser or network
          // error, you should display the localized error message to your
          // customer using `error.message`.
          if (result.error) {
            alert(result.error.message);
          }
        })
        .catch(function(error) {
          console.error('Error:', error);
        });
    </script>