<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
 
class Paypal extends CI_Controller{ 
     
     function  __construct(){ 
        parent::__construct(); 
         
        // Load paypal library 
        $this->load->library('paypal_lib'); 
         
        // Load product model 
        // $this->load->model('product'); 
         
        // Load payment model 
        $this->load->model('payment'); 
     } 
      
    function success(){ 
        // Get the transaction data 
        $paypalInfo = $this->input->get(); 
         
        $productData = $paymentData = array(); 
        if(!empty($paypalInfo['item_number']) && !empty($paypalInfo['tx']) && !empty($paypalInfo['amt']) && !empty($paypalInfo['cc']) && !empty($paypalInfo['st'])){ 
            $item_name = $paypalInfo['item_name']; 
            $item_number = $paypalInfo['item_number']; 
            $txn_id = $paypalInfo["tx"]; 
            $payment_amt = $paypalInfo["amt"]; 
            $currency_code = $paypalInfo["cc"]; 
            $status = $paypalInfo["st"]; 
             
            // Get product info from the database 
            // $productData = $this->product->getRows($item_number); 
             
            // Check if transaction data exists with the same TXN ID 
            $paymentData = $this->payment->getPayment(array('txn_id' => $txn_id)); 
        } 
         
        // Pass the transaction data to view 
        // $data['product'] = $productData; 
        $data['payment'] = $paymentData; 
        if(!empty($paymentData)){
            //--- Headers for our token request
            $headers[] = "Accept: application/json";
            $headers[] = "Content-Type: application/x-www-form-urlencoded";

            //--- Data field for our token request
            $data = "grant_type=client_credentials";

            //--- Pass client id & client secrent for authorization
            $curl_options[CURLOPT_USERPWD] = PAYPAL_CLIENT_ID . ":" . PAYPAL_CLIENT_SECRET;

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
        $this->load->view('paypal/success', $data); 
    } 
      
     function cancel(){ 
        // Load payment failed view 
        $this->load->view('paypal/cancel'); 
     } 
      
     function ipn(){ 
        // Retrieve transaction data from PayPal IPN POST 
        $paypalInfo = $this->input->post(); 
         
        if(!empty($paypalInfo)){ 
            // Validate and get the ipn response 
            $ipnCheck = $this->paypal_lib->validate_ipn($paypalInfo); 
 
            // Check whether the transaction is valid 
            if($ipnCheck){ 
                // Check whether the transaction data is exists 
                $prevPayment = $this->payment->getPayment(array('txn_id' => $paypalInfo["txn_id"])); 
                if(!$prevPayment){ 
                    // Insert the transaction data in the database 
                    $data['user_id']    = $paypalInfo["custom"]; 
                    $data['product_id']    = $paypalInfo["item_number"]; 
                    $data['txn_id']    = $paypalInfo["txn_id"]; 
                    $data['payment_gross']    = $paypalInfo["mc_gross"]; 
                    $data['currency_code']    = $paypalInfo["mc_currency"]; 
                    $data['payer_name']    = trim($paypalInfo["first_name"].' '.$paypalInfo["last_name"], ' '); 
                    $data['payer_email']    = $paypalInfo["payer_email"]; 
                    $data['status'] = $paypalInfo["payment_status"]; 
     
                    $this->payment->insertTransaction($data); 
                } 
            } 
        } 
    } 
}