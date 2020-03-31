<?php

function confirmQuery($query){
    global $connection;
    $result = mysqli_query($connection, $query);
    if (!$result) {
        die("QUERY FAILED" . mysqli_error($connection)) ;
    }
    return $result;
}

function secureInput($input){
    global $connection;
    $input = mysqli_real_escape_string($connection, $input);
    $input = trim($input);
    $input = htmlspecialchars($input);
    $input = stripslashes($input);
    
    return $input;
}

function authorizePayment(){
    global $connection;
    
    global $firstName ;
	global $lastName;
	global $eMail;
	global $phoneNumber;
	global $checkInDate;
	global $checkOutDate;
	global $country;
	global $gender;
	global $residentialAddress;
 
	global $checkIn;
	global $checkOut;
	
	global $nightDifference;	
	global $nights;
    global $payStackAmount;
    global $referenceId;

    // validate and save the order posted

    // craft a reference for the payment, here we are using the ID from saving it earlier
    $reference = $referenceId;

    // Get this from https://github.com/yabacon/paystack-class
    // require 'Paystack.php'; 
    // if using https://github.com/yabacon/paystack-php
    require 'paystack/autoload.php';

    $paystack = new Paystack('sk_test_xxx');
    // the code below throws an exception if there was a problem completing the request, 
    // else returns an object created from the json response
    $trx = $paystack->transaction->initialize(
    [
        'amount'=>$payStackAmount, /* 20 naira */
        'email'=>$eMail,
        // 'callback_url'=>'http://your-site.tld/folder/anotherfolder/verify.php',
        'metadata'=>json_encode([
        'cart_id'=>$referenceId,
        'reference'=>$referenceId,
        'custom_fields'=> [
            [
            'display_name'=> "Paid on",
            'variable_name'=> "paid_on",
            'value'=> 'Website'
            ],
            [
            'display_name'=> "Paid via",
            'variable_name'=> "paid_via",
            'value'=> 'Standard'
            ]
        ]
        ])
    ]
    );
    // status should be true if there was a successful call
    if(!$trx['status']){
    exit($trx->message);
    }
    // full sample initialize response is here: https://developers.paystack.co/docs/initialize-a-transaction
    // Get the user to click link to start payment or simply redirect to the url generated
    header('Location: ' . $trx->data->authorization_url);
}

