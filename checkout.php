<?php

require __DIR__ . "/vendor/autoload.php";

$stripe_secret_key = "Place your Stripe secret key here";

\Stripe\Stripe::setApiKey($stripe_secret_key);

$checkout_session = \Stripe\Checkout\Session::create([
    "mode" => "payment",
    "success_url" => "http://localhost/stripeApp/success.php",
    "cancel_url" => "http://localhost/stripeApp/index.php",
    "locale" => "auto",
    "line_items" => [
        [
            "quantity" => 1,
            "price_data" => [
                "currency" => "jmd",
                "unit_amount" => 1200012,
                "product_data" => [
                    "name" => "Manchester United Home Jersey 24/25"
                ]
            ]
        ]       
    ]
]);

http_response_code(303);
header("Location:  $checkout_session->url");
