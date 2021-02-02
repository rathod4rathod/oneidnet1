<?php

define("PAYPAL_CLIENT_ID", "ATjYo-0Qub7dC2afIBOgcM6BWTGeMouRf1HLcexhBNEtAoBT1P8GkWWAwSrI9rbgkMTGPEXyBex7lHaV");
define("PAYPAL_CLIENT_SECRET","EEkHPhtQe_273x3qo1sOrOIHnmk-SeZfJkopG6UDbAmcbLtA-8wrR77W9NABL6kiSOoA3p4eJi8C5kFS");
define("PAYPAL_TOKEN_URL", "https://api.sandbox.paypal.com/v1/oauth2/token");
define("PYPAL_PAYOUTS_URL", "https://api.sandbox.paypal.com/v1/payments/payouts");

define('WEB_ROOT_PATH','/var/www/oneidnetsys');
require_once WEB_ROOT_PATH.'/oneshop/application/modules/payout/Paypal_lib.php';
require_once 'crud.php';
new PayoutClass;
class PayoutClass {
	function __construct() {
     	$this->payout();
    }

    function payout(){
       
        $orderstatus = custom("select * from oshop_orders where status  IN ('JUST_PLACED','DELIVERED','PROCESSING') and order_status = 0");

        $timediff = time() - strtotime($orderstatus[0]['time']);

        if(!empty($orderstatus) && $timediff >= 86400){
            $headers[] = "Accept: application/json";
            $headers[] = "Content-Type: application/x-www-form-urlencoded";

            //--- Data field for our token request
            $data = "grant_type=client_credentials";

            //--- Pass client id & client secrent for authorization
            $curl_options[CURLOPT_USERPWD] = PAYPAL_CLIENT_ID . ":" . PAYPAL_CLIENT_SECRET;
            $paypal_lib = new paypal_lib();
            $token_request = $paypal_lib->curl_request(PAYPAL_TOKEN_URL, "POST", $headers, $data, $curl_options);
            $token_request = json_decode($token_request);
            if(isset($token_request->error)){
                die("Paypal Token Error: ". $token_request->error_description);
            }
            else
            {
                // echo var_dump($token_request);
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
                $receiver["receiver"] = "sb-dw6523386168@business.example.com";
                $receiver["amount"]["value"] = 2.00;
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
                $paypal_lib = new paypal_lib();
                $payout = $paypal_lib->curl_request(PYPAL_PAYOUTS_URL, "POST", $headers, json_encode($data));
                update(array('order_status'=>1),'oshop_orders','status IN ("JUST_PLACED","DELIVERED","PROCESSING") and order_status = 0');
            }	
        }
        else {
            echo 'no data';
        }
    }
}

