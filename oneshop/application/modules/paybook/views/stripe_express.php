<?php 
require_once('../vendor/autoload.php');
         // More info about this on setup.php
    $stripe = new \Stripe\StripeClient('sk_test_51HqXE5IIelCwrUfqj2KqeSuXLlS3qYxU4vdcvN075v37Dl80gjmz0xloua7dMHt09VphfQzaVc0x84MkitxDHNQ000ZbUOc044');
          // Create a new Stripe Connect Account object.
          // For more info: https://stripe.com/docs/api#create_account
    $account = $stripe->accounts->create([
        "type" => "express",
        "country" => "US",
        "capabilities" => [
	        'card_payments' => ['requested' => true],
	        'transfers' => ['requested' => true],
            ],
        ]);
        echo var_dump($account['id']);
        $result = $stripe->accountLinks->create([
            'account' => $account['id'],
            'refresh_url' => 'http://localhost/stripe/setup.php',
            'return_url' => 'http://localhost/stripe/setup.php',
            'type' => 'account_onboarding',
        ]);
?>