<?php 
	include 'db.php';
	

if (isset($_POST['payNow'])) {
	
	
	// $roomTypeId = $_POST['roomTypeId'];
	// echo $roomTypeId;

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
	
	$nights = date_diff($checkIn, $checkOut);	
	// echo $nights->format("%a");
	
	


	// foreach ($_POST as $key => $value) {
	// 	if (empty($_POST[$key])) {
	// 		$error = "All fields are required";
	// 		break;
	// 	}
	// }


	// if (empty($error)) {
	// 	if (!filter_var($eMail, FILTER_VALIDATE_EMAIL)) {
	// 		$error = "Invalid email";
	// 	}
	// }

	// if (empty($error)) {
	// 	if (!is_numeric($phoneNumber)) {
	// 		$error = "Phone number must be digits";
	// 	}
	// }

	

	// if (empty($error)) {
		// $query="INSERT INTO reservations (roomType, firstName, lastName, eMail, phoneNumber, checkInDate, checkOutDate, nights, country, gender, residentialAddress, bookingTime)";
		//confirmQuery($query);
		// $referenceId = "LEXUS" .time()	;
		// echo $referenceId;	
	// }

}
 ?>
