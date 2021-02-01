<?php
define("PAYPAL_CLIENT_ID", "AQjEDPHl1-cU9_1GnZ90h9iEKv0_Vk7oWxjg-o7js-OINQaSwIhLIeZe1M46LNHow6HkkBX1y4lRu14t");
define("PAYPAL_CLIENT_SECRET","ECWp1QRiDxbGF9IOl5UiEssca-7NX-LXKyYU_4CpRISHNSzZ-UzV05zBqfyUsWPNmemKK3xNGmfVUBri");
define("PAYPAL_TOKEN_URL", "https://api.sandbox.paypal.com/v1/oauth2/token");
define("PYPAL_PAYOUTS_URL", "https://api.sandbox.paypal.com/v1/payments/payouts");

define('WEB_ROOT_PATH','/var/www/oneidnetsys');

new PayoutClass;
class PayoutClass {
	function __construct() {

     	$this->payout();

    }

    function payout(){
	//--- Headers for our token request
	$headers[] = "Accept: application/json";
	$headers[] = "Content-Type: application/x-www-form-urlencoded";

	//--- Data field for our token request
	$data = "grant_type=client_credentials";

	//--- Pass client id & client secrent for authorization
	$curl_options[CURLOPT_USERPWD] = PAYPAL_CLIENT_ID . ":" . PAYPAL_CLIENT_SECRET;
   
    require_once WEB_ROOT_PATH.'/oneshop/application/libraries/Paypal_lib.php';
	$token_request = curl_request(PAYPAL_TOKEN_URL, "POST", $headers, $data, $curl_options);
	$token_request = json_decode($token_request);
	if(isset($token_request->error)){
	    die("Paypal Token Error: ". $token_request->error_description);
	}
	else
    {
        $headers = $data = [];
                //--- Headers for payout request
        $headers[] = "Content-Type: application/json";
        $headers[] = "Authorization: Bearer $token_request->access_token";

        $time = time();
                //--- Prepare sender batch header
        $sender_batch_header["sender_batch_id"] = $time;
        $sender_batch_header["email_subject"]   = "Payout Received";
        $sender_batch_header["email_message"]   = "You have received a payout, Thank you for using our services";

                //--- First receiver
        $receiver["recipient_type"] = "EMAIL";
        $receiver["note"] = "Thank you for your services";
        $receiver["sender_item_id"] = $time++;
        $receiver["receiver"] = "sb-qbgel3308672@business.example.com";
        $receiver["amount"]["value"] = 67.05;
        $receiver["amount"]["currency"] = "USD";
        $items[] = $receiver;

        //--- Second receiver
        // $receiver["recipient_type"] = "EMAIL";
        // $receiver["note"] = "You received a payout for your services";
        // $receiver["sender_item_id"] = $time++;
        // $receiver["receiver"] = "buyer2@example.com";
        // $receiver["amount"]["value"] = 15.00;
        // $receiver["amount"]["currency"] = "USD";
        // $items[] = $receiver;

        $data["sender_batch_header"] = $sender_batch_header;
        $data["items"] = $items;

        //--- Send payout request
        $payout = curl_request(PYPAL_PAYOUTS_URL, "POST", $headers, json_encode($data));
    }
	}

    
}