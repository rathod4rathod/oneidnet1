<?php
if (!defined('BASEPATH'))   exit('No direct script access allowed');
class paybook extends CI_Controller {
	function __construct() {
        parent::__construct();
        /* session and cookies check */
        
      if ($_REQUEST) {
            $sobj= $this->load->module("session_restart");
            if (isset($_REQUEST["skey"])) {
                $sobj->key_check($_REQUEST["skey"]);
            }
        }
        /* session and cookies check */
    }



    function get_UserId() {
        $cookies_obj=$this->load->module("cookies");
        $user_id=$cookies_obj->getUserID();
        return $user_id;
    }

    function myPaybook(){
        $db_api=$this->load->module("db_api");
        $user_id=$this->get_UserId();
        $query="SELECT * FROM pb_cards WHERE user_id_fk='".$user_id."' ORDER BY card_id DESC";
        $paybook_result=$db_api->custom($query);
        $counrty="SELECT * FROM global_countries_info";
        $country_result=$db_api->custom($counrty);
        $cities="SELECT * FROM global_cities_info WHERE country_code = 'IND'";
        $cities_result=$db_api->custom($cities);
        // $states="SELECT * FROM global_states_info WHERE country_code = 'IND'";
        // $states_result=$db_api->custom($states);
        $data["paybook_details"]=$paybook_result;
        $data["country_result"]=$country_result;
        $data["cities_result"]=$cities_result;
      $this->load->view("paybook/paybook_view",$data);
    }

    function stripeConnect(){
        $db_api=$this->load->module("db_api");
        $user_id=$this->get_UserId();
        require_once('./vendor/autoload.php');
         // More info about this on setup.php
        $stripe = new \Stripe\StripeClient('sk_test_51HqXE5IIelCwrUfqj2KqeSuXLlS3qYxU4vdcvN075v37Dl80gjmz0xloua7dMHt09VphfQzaVc0x84MkitxDHNQ000ZbUOc044');
        $id = $this->input->post("id");
                      // Create a new Stripe Connect Account object.
              // For more info: https://stripe.com/docs/api#create_account
        $account = $stripe->accounts->create([
            "type" => "express",
            "country" => $id,
            "capabilities" => [
                'card_payments' => ['requested' => true],
                'transfers' => ['requested' => true],
                ],
        ]);
        $query="UPDATE iws_profiles SET s_account = '".$account['id']."' WHERE profile_id='".$user_id."'";
        $db_api->custom($query);
        // echo var_dump($account['id']);
        $result = $stripe->accountLinks->create([
            'account' => $account['id'],
            'refresh_url' => 'http://localhost/stripe/setup.php',
            'return_url' => 'http://localhost/stripe/setup.php',
            'type' => 'account_onboarding',
        ]);
        echo '<script type="text/javascript" language="Javascript">window.open("'.$result['url'].'");</script>';
    }

    function stripeINConnect(){

        require_once('./vendor/autoload.php');
         // More info about this on setup.php
        $stripe = new \Stripe\StripeClient('sk_test_51HqXE5IIelCwrUfqj2KqeSuXLlS3qYxU4vdcvN075v37Dl80gjmz0xloua7dMHt09VphfQzaVc0x84MkitxDHNQ000ZbUOc044');
        // echo var_dump($_POST['Aholder_Name']);
        // $file = $_FILES["Id_Front"]['name'];
        // var_dump($file);
        // exit();
        if ($_POST['token-account']) {
            $token = $_POST['token-account'];
            $account = $stripe->accounts->create([
                    'country' => 'IN',
                    'type' => 'custom',
                    'capabilities' => [
                          'card_payments' => ['requested' => true],
                          'transfers' => ['requested' => true],
                    ],
                  'account_token' => $token,
            ]);
            $bank_account = $stripe->tokens->create([
                'bank_account' => [
                    'country' => 'IN',
                    'currency' => 'inr',
                    'account_holder_name' => $_POST['Aholder_Name'],
                    'account_holder_type' => 'individual',
                    'routing_number' => $_POST['Ifsc_Code'],
                    'account_number' => $_POST['Acc_No'],
                ],
            ]);
            // var_dump($bank_account['id']);
            $created_bacc = $stripe->accounts->createExternalAccount(
                $account['id'],
                [
                  'external_account' => $bank_account['id'],
                ]
            );

            $db_api=$this->load->module("db_api");
            $user_id=$this->get_UserId();
            $query="SELECT * FROM pb_cards WHERE user_id_fk='".$user_id."' ORDER BY card_id DESC";
            $paybook_result=$db_api->custom($query);
            $counrty="SELECT * FROM global_countries_info";
            $country_result=$db_api->custom($counrty);
            $cities="SELECT * FROM global_cities_info WHERE country_code = 'IND'";
            $cities_result=$db_api->custom($cities);
            // $states="SELECT * FROM global_states_info WHERE country_code = 'IND'";
            // $states_result=$db_api->custom($states);
            $data["paybook_details"]=$paybook_result;
            $data["country_result"]=$country_result;
            $data["cities_result"]=$cities_result;
            $data['stripe_account'] = $account;
            $_SESSION['saccount'] = $account['id'];
            $this->load->view("paybook/paybook_view",$data);
        } 
        else {
          die('Invalid action type.');
        }
    }
}