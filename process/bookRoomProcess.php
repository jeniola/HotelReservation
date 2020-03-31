<?php 

// include 'db.php';

require ('vendor/autoload.php');

if (isset($_POST['payNow'])) {
	
	$theRoomId = $_POST['theRoomId'];
	$theRoomPrice = $_POST['theRoomPrice'];
	$theRoomType = $_POST['theRoomType'];
	
	$firstName = secureInput($_POST['firstName']);
	$lastName = secureInput($_POST['lastName']);
	$eMail = secureInput($_POST['eMail']);
	$phoneNumber = secureInput($_POST['phoneNumber']);
	$checkInDate = $_POST['checkInDate'];
	$checkOutDate = $_POST['checkOutDate'];
	$country = secureInput($_POST['country']);
	$gender = secureInput($_POST['gender']);
	$residentialAddress = secureInput($_POST['residentialAddress']);

	$checkIn = date_create($_POST['checkInDate']);
	$checkOut = date_create($_POST['checkOutDate']);
	
	$nightDifference = date_diff($checkIn, $checkOut);	
	$nights = $nightDifference->format("%a");

	foreach ($_POST as $key => $value) {
		if (empty($_POST[$key])) {
			$error = "Please fill out all  fields";
			break;
		}
	}

	if (empty($error)) {
		if (!filter_var($eMail, FILTER_VALIDATE_EMAIL)) {
			$error = "Invalid email";
		}
	}

	if (empty($error)) {
		if (!is_numeric($phoneNumber)) {
			$error = "Phone number must be digits";
		}
	}


	if (empty($error)) {
		// $roomTypeQuery = "SELECT * FROM allrooms WHERE roomId = '{$theRoomId}' ";	
		// $sendQuery = mysqli_query($connection, $roomTypeQuery);
		
		// while ($row = (mysqli_fetch_assoc($sendQuery))) {
		// 	// $theRoomTypeId = $row['roomId'];
		// 	$roomType = $row['roomType'];
		// 	$roomPrice = $row['roomPrice'];
		// }

		
		$amount = $theRoomPrice * $nights ;
		$payStackAmount = $amount * 100;
		
		// use email username as reference id
		$referenceId = strtolower(strstr($eMail, '@', true));
		$referenceId = $referenceId . '-room-' . $theRoomId;

		// initialize Paystack
		$paystack = new Yabacon\Paystack("sk_test_6452cd224f1cb55144d1a17dffd9aff642e18a05");
		try
		{
		  $tranx = $paystack->transaction->initialize([
			'amount'=>$payStackAmount,       // in kobo
			'email'=>$eMail,         // unique to customers
			'reference'=>$referenceId, // unique to transactions
		  ]);
		} catch(\Yabacon\Paystack\Exception\ApiException $e){
		  print_r($e->getResponseObject());
		  die($e->getMessage());
		}

		// store transaction reference so we can query in case user never comes back
		// perhaps due to network issue
		// save_last_transaction_reference($tranx->data->reference);

		// redirect to page so User can pay
		header('Location: ' . $tranx->data->authorization_url);





		// $query="INSERT INTO reservations (roomType, referenceId, bookingTime, firstName, lastName, eMail, phoneNumber, checkInDate, checkOutDate, nights, country, gender, residentialAddress, amount) ";
		// $query.= "VALUES ('$roomType', '$referenceId', now(), '$firstName', '$lastName', '$eMail',  '$phoneNumber', '$checkInDate', '$checkOutDate', '$nights', '$country', '$gender', '$residentialAddress', '$amount')";
		// confirmQuery($query);
		
		// after payment, update payment status, amount paid
		/** Amount paid should be  */
	}

}
 ?>
